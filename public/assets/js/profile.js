$(document).ready(async function() {
    const currentUserImg = $('#current_user_photo').attr('src');
    const btnSaveImg = $('#btn_save_img');
    const btnCancelImg = $('#btn_cancel_img');
    const fileValidator = new FileValidator();

    // Check if image compression is enabled
    let compressImage = false;

    const response = await $.ajax({
        url: '/settings?name=compressImage',
        method: 'GET',
        dataType: 'json'
    });
    
    compressImage = response.value === "on";

    $('#new_img').on('change', async function() {
        let file = this.files[0];

        if(!file) return;

        if(!fileValidator.img(file)) {
            $(this).val('');
            return;
        }

        $('.loadingImg').removeClass('d-none');
        $('.btn_change_img').addClass('d-none');
        $('.options').removeClass('d-none');

        if(compressImage) {
            file = await handleImageUpload(file);
        }

        const reader = new FileReader();

        reader.onload = function(e) {
            $('#current_user_photo').attr('src', e.target.result);
        }

        reader.readAsDataURL(file);
        $('.loadingImg').addClass('d-none');
        $('.btn_change_img').removeClass('d-none');

        $('#userPanelView .options').removeClass('d-none');
    });

    btnCancelImg.on('click', function() {
        $('.options').addClass('d-none');
        $('#current_user_photo').attr('src', currentUserImg);
    });

    btnSaveImg.on('click', saveImage);
});

async function saveImage() {
    const newImg = $('#new_img')[0];

    let formData = new FormData();
    formData.append('photo', newImg.files[0]);

    $('.btn_change_img').addClass('d-none');
    $('#btn_cancel_img').addClass('d-none');

    showLoadingState('#btn_save_img', true);

    try {
        const response = await $.ajax({
            url: '/user/update-image',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false
        });

        $('.options').addClass('d-none');
        $('.btn_change_img').removeClass('d-none');
        $('#btn_save_img').prop('disabled', false).text(SAVE);

        showAlert('success', response.message);
    } catch (error) {
        showError(error);

        $('.btn_change_img').removeClass('d-none');
        $('#btn_cancel_img').removeClass('d-none');
        $('#btn_save_img').prop('disabled', false).text(SAVE);
    }
}