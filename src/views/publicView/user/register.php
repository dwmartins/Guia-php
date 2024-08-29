<section id="registerView" class="container d-flex align-items-center show">
    <div class="row w-100 m-0">
        <div class="col-sm-12 col-md-5 col-xl-5 d-flex flex-column justify-content-center align-items-center">
            <h4 class="text-secondary"><?= NEW_ACCOUNT ?></h4>

            <form id="formRegister" action="/register" method="post" class="w-100 p-0 p-sm-3">
                <div class="mb-3">
                    <label for="name" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LABEL_NAME ?></label>
                    <input type="text" name="name" id="name" autocomplete="name" class="form-control custom_focus">
                </div>

                <div class="mb-3">
                    <label for="lastName" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LABEL_LAST_NAME ?></label>
                    <input type="text" name="lastName" id="lastName" autocomplete="lastName" class="form-control custom_focus">
                </div>

                <div class="mb-3">
                    <label for="email" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LABEL_EMAIL ?></label>
                    <input type="email" name="email" id="email" autocomplete="email" class="form-control custom_focus">
                </div>

                <div class="mb-3">
                    <label for="password" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LABEL_PASSWORD ?></label>
                    <div class="position-relative">
                        <input type="password" name="password" id="password" class="form-control custom_focus">
                        <i class="fa-regular icon_show_password fa-eye text-secondary"></i>
                    </div>
                </div>

                <div class="fs-8 text-secondary text-center mb-3">
                    <?= PRIVACY ?>
                    <a href="<?= PATH_PRIVACY ?>" class="text-primary outline_none"><?= PRIVACY_PAGE ?></a>
                </div>

                <button id="btnLogin" class="btn btn-primary w-100">
                    <?= NEW_ACCOUNT ?>
                </button>

                <hr class="text-secondary">

                <p class="text-secondary text-center">
                    <?= HAVE_ACCOUNT ?>
                    <a href="<?= PATH_LOGIN ?>" class="text-primary outline_none"><?= LOGIN_PAGE ?></a>
                </p>
            </form>
        </div>
        <div class="col-md-7 col-xl-7 d-none d-md-flex justify-content-center align-items-center">
            <img src="/assets/svg/signUp.svg" alt="<?= ALT_REGISTER_IMG ?>">
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formRegister = $('#formRegister');

        formRegister.on('submit', function(event) {
            const fields = $('#formRegister input');
            let isValid = true;

            const fieldLabels = {
                name: LABEL_NAME,
                lastName: LABEL_LAST_NAME,
                email: LABEL_EMAIL,
                password: LABEL_PASSWORD
            }

            for (let label in fieldLabels) {
                const field = formRegister.find(`[name="${label}"]`);
                const value = field.val().trim();

                if(!value) {
                    isValid = false;
                    $(field).addClass('field_invalid');

                } else if(!validString(value)) {
                    const errorMessage = FIELD_INVALID.replace('{field}', fieldLabels[label]);
                    showAlert('error', errorMessage);
                    $(field).addClass('field_invalid');
                    isValid = false;
    
                } else {
                    $(field).removeClass('field_invalid');
                }
            }

            if(!isValid) {
                showAlert('error', ALL_FIELDS_INVALID);
                event.preventDefault();
                return;
            }

            $('#formRegister button').empty();
            $('#formRegister button').html(`
                <div id="spinnerLoading" class="item_center gap-2">
                    <div class="spinner-border" role="status"></div>
                    <p class="m-0">${WAIT}</p>
                </div>
            `).prop('disabled', true);
        });

        $('#formRegister input').on('input', function () {
            $(this).removeClass('field_invalid');
        });

        $('#formRegister input').on('blur', function () {
            const value = $(this).val().trim();
            if (!value) {
                $(this).addClass('field_invalid');
            }
        });
    })
</script>