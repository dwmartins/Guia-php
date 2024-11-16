$(document).ready(function() {
    const fileValidator = new FileValidator();

    function setupImageUploader(fieldId, previewId, loadingClass, selectedContainerId, uploadContainerId) {
        const originalSrc = $(`#${previewId}`).attr('src');

        $(`#${fieldId}`).on('change', function() {
            const file = this.files[0];

            if (!file) return;

            if (!fileValidator.img(file)) {
                $(this).val(''); 
                return;
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
            $(`#${fieldId}`).val(''); // Resetar o campo
            $(`#${previewId}`).attr('src', originalSrc); // Voltar à imagem original

            $(`#${selectedContainerId}`).addClass('d-none');
            $(`#${uploadContainerId}`).removeClass('d-none');
        });
    }

    // Configure the fields
    setupImageUploader('logo', 'current_logo', 'loadingLogo', 'logoSelected', 'uploadBtnLogo');
    setupImageUploader('cover', 'current_cover', 'loadingCover', 'coverSelected', 'uploadBtnCover');
    setupImageUploader('icon', 'current_icon', 'loadingIcon', 'iconSelected', 'uploadBtnIcon');
    setupImageUploader('default', 'current_defaultImg', 'loadingDefaultImg', 'defaultImgSelected', 'uploadBtnDefaultImg');
});
