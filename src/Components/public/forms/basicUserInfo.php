<form id="formUserBasicInfo" action="/user/basic-info" method="post" class="row">
    <h5 class="text-secondary mb-3"><?= BASIC_INFO ?></h5>

    <hr class="text-secondary">

    <div class="mb-3 col-12 col-md-4">
        <label for="name" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LABEL_NAME ?></label>
        <input type="text" name="name" id="name" autocomplete="name" value="<?= $user->getName() ?>" class="form-control custom_focus text-secondary">
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="lastName" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LABEL_LAST_NAME ?></label>
        <input type="text" name="lastName" id="lastName" autocomplete="lastName" value="<?= $user->getLastName() ?>" class="form-control custom_focus text-secondary">
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="dateOfBirth" class="text-secondary mb-2"><?= DATE_BIRTH ?></label>
        <input type="date" name="dateOfBirth" id="dateOfBirth" value="<?= $user->getDateOfBirth() ?>" class="form-control custom_focus text-secondary">
    </div>
    <div class="mb-3 col-12 col-md-6">
        <label for="email" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LABEL_EMAIL ?></label>
        <input type="email" name="email" id="email" autocomplete="email" value="<?= $user->getEmail() ?>" class="form-control custom_focus text-secondary">
    </div>
    <div class="mb-3 col-12 col-md-6">
        <label for="phone" class="text-secondary mb-2"><?= LABEL_PHONE ?></label>
        <input type="number" name="phone" id="phone" autocomplete="phone" value="<?= $user->getPhone() ?>" class="form-control custom_focus text-secondary">
    </div>
    <div class="mb-3 col-12">
        <label for="phone" class="text-secondary mb-2"><?= LABEL_DESCRIPTION ?></label>
        <textarea name="description" id="description" rows="7" class="form-control custom_focus text-secondary">
            <?= $user->getDescription() ?>
        </textarea>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-sm btn-outline-primary"><?= SALVE_CHANGES ?></button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formUserBasicInfo = $('#formUserBasicInfo');

        formUserBasicInfo.on('submit', function(event) {
            const fields = $('#formUserBasicInfo input, textarea');
            let isValid = true;
            
            const fieldLabels = {
                name: LABEL_NAME,
                lastName: LABEL_LAST_NAME,
                email: LABEL_EMAIL,
                phone: LABEL_PHONE,
                description: LABEL_DESCRIPTION
            }
            
            for (let label in fieldLabels) {
                const field = formUserBasicInfo.find(`[name="${label}"]`);
                const value = field.val().trim();
                
                if(!validString(value)) {
                    const errorMessage = FIELD_INVALID.replace('{field}', fieldLabels[label]);
                    showAlert('error', errorMessage);
                    $(field).addClass('field_invalid');
                    isValid = false;
                    event.preventDefault();
                } else {
                    $(field).removeClass('field_invalid');
                }
            }
            
            if(isValid) {
                $('#formUserBasicInfo button').empty();
                $('#formUserBasicInfo button').html(`
                    <div id="spinnerLoading" class="item_center gap-2">
                        <div class="spinner-border" role="status"></div>
                        <p class="m-0">${WAIT}</p>
                    </div>
                `).prop('disabled', true);
            }
        });
    })
</script>