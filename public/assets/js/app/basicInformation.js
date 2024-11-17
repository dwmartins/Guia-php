$(document).ready(function() {
    const fileValidator = new FileValidator();

    function setupImageUploader(fieldId, previewId, loadingClass, selectedContainerId, uploadContainerId) {
        const originalSrc = $(`#${previewId}`).attr('src');

        $(`#${fieldId}`).on('change', function() {
            const file = this.files[0];

            if (!file) return;

            if(fieldId === "icon") {
                // max 2mb
                if(!fileValidator.icon(file, 2)) {
                    $(this).val(''); 
                    return;
                }
            } else {
                if (!fileValidator.img(file)) {
                    $(this).val(''); 
                    return;
                }
            }

            $(`.${loadingClass}`).removeClass('d-none');
            $(`#${selectedContainerId} .fileName`).text(file.name);

            const reader = new FileReader();
            reader.onload = function(e) {
                $(`#${previewId}`).attr('src', e.target.result);
            };
            reader.readAsDataURL(file);

            $(`.${loadingClass}`).addClass('d-none');
            $(`#${selectedContainerId}`).removeClass('d-none');
            $(`#${uploadContainerId}`).addClass('d-none');
        });

        $(`#${selectedContainerId} .btn-danger`).on('click', function() {
            $(`#${fieldId}`).val('');
            $(`#${previewId}`).attr('src', originalSrc);

            $(`#${selectedContainerId}`).addClass('d-none');
            $(`#${uploadContainerId}`).removeClass('d-none');
        });
    }

    // Configure the fields
    setupImageUploader('logo', 'current_logo', 'loadingLogo', 'logoSelected', 'uploadBtnLogo');
    setupImageUploader('cover', 'current_cover', 'loadingCover', 'coverSelected', 'uploadBtnCover');
    setupImageUploader('icon', 'current_icon', 'loadingIcon', 'iconSelected', 'uploadBtnIcon');
    setupImageUploader('default', 'current_defaultImg', 'loadingDefaultImg', 'defaultImgSelected', 'uploadBtnDefaultImg');

    $('.formImages').on('submit', function(e) {
        let hasFile = false;

        $(this).find('input').each(function() {
            if($(this).val()) {
                hasFile = true;
            }
        });

        if(!hasFile) {
            e.preventDefault();
            showAlert('info', MESSAGE_SELECT_IMAGE);
            return;
        }

        disableEmptyImageFields();
        showLoadingState('#btnSaveImages', true);
    });

    function disableEmptyImageFields() {
        $('.formImages').find('input').each(function() {
            if(!$(this).val()) {
                $(this).attr('disabled', true);
            }
        });
    }

    // Basic infos
    function updateTextareaCount(textareaSelector, countSelector) {
        const textarea = $(textareaSelector);
        const count_msg = $(countSelector);

        count_msg.text(textarea.val().length);

        textarea.on('input', function() {
            if (textarea.val().length > 600) {
                textarea.val(textarea.val().substring(0, 600));
            }
            count_msg.text(textarea.val().length);
        });
    }

    updateTextareaCount('.formBasicInfo #description', '.formBasicInfo .count_description');
    updateTextareaCount('.formBasicInfo #keywords', '.formBasicInfo .count_keywords');

    $('.formBasicInfo').on('submit', function(e) {
        showLoadingState('#btnSaveBasicInfo', true);
    });
});
