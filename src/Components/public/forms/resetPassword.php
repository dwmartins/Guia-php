<form id="formResetPassword" action="/user/password" method="post" class="row">
    <h5 class="text-secondary mb-3"><?= PASSWORD ?></h5>

    <hr class="text-secondary">

    <div class="mb-3 col-12 col-md-4">
        <label for="currentPassword" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LABEL_CURRENT_PASSWORD ?></label>
        <input type="password" name="currentPassword" id="currentPassword" class="form-control custom_focus text-secondary">
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="newPassword" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LABEL_NEW_PASSWORD ?></label>
        <div class="position-relative">
            <input type="password" name="newPassword" id="newPassword" class="form-control custom_focus text-secondary">
            <i class="fa-regular icon_show_password fa-eye text-secondary"></i>
        </div>
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="confirmPassword" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LABEL_CONFIRM_PASSWORD ?></label>
        <div class="position-relative">
            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control custom_focus text-secondary">
            <i class="fa-regular icon_show_password fa-eye text-secondary"></i>
        </div>
    </div>

    <p class="text-secondary fs-7 my-0"><?= MINIMUM_CHARACTERS_PASSWORD ?></p>

    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-sm btn-outline-primary"><?= SALVE_CHANGES ?></button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formResetPassword = $("#formResetPassword");
        const newPassword = $('#newPassword');
        const confirmPassword = $('#confirmPassword');

        formResetPassword.on('submit', function(event) {
            let isValid = true;
            
            const fields = $('#formResetPassword input');
            
            fields.each(function() {
                const value = $(this).val().trim();
                
                if(!value) {
                    isValid = false;
                    $(this).addClass('field_invalid');
                }
            });

            if (!isValid) {
                event.preventDefault();
                showAlert('error', ALL_FIELDS_INVALID);
                return;
            }

            if(newPassword.val() !== confirmPassword.val()) {
                event.preventDefault();
                showAlert('error', PASSWORDS_NOT_MATCH);
                return;
            }

            if(newPassword.val().length < 6) {
                event.preventDefault();
                showAlert('error', PASSWORD_MIN_LENGTH_REQUIREMENT);
                return;
            }

        });

        $('#formResetPassword input').on('input', function() {
            $(this).removeClass('field_invalid');
        });

        $('#formResetPassword input').on('blur', function() {
            const value = $(this).val().trim();
            if(!value) {
                $(this).addClass('field_invalid');
            }
        });
    });
</script>