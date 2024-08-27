<form id="formUserAddress" action="/user/address" method="post" class="row">
    <h5 class="text-secondary mb-3"><?= ADDRESS ?></h5>

    <hr class="text-secondary">

    <div class="mb-3 col-12 col-md-6">
        <label for="address" class="text-secondary mb-2"><?= LABEL_ADDRESS ?></label>
        <input type="text" name="address" id="address" autocomplete="address" value="<?= $user->getAddress() ?>" class="form-control custom_focus text-secondary">
    </div>
    <div class="mb-3 col-12 col-md-3">
        <label for="complement" class="text-secondary mb-2"><?= LABEL_COMPLEMENT ?></label>
        <input type="text" name="complement" id="complement" autocomplete="complement" value="<?= $user->getComplement() ?>" class="form-control custom_focus text-secondary">
    </div>
    <div class="mb-3 col-12 col-md-3">
        <label for="city" class="text-secondary mb-2"><?= LABEL_CITY ?></label>
        <input type="text" name="city" id="city" autocomplete="city" value="<?= $user->getCity() ?>" class="form-control custom_focus text-secondary">
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="zipCode" class="text-secondary mb-2"><?= LABEL_ZIP_CODE ?></label>
        <input type="number" name="zipCode" id="zipCode" autocomplete="zipCode" value="<?= $user->getZipCode() ?>" class="form-control custom_focus text-secondary">
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="state" class="text-secondary mb-2"><?= LABEL_STATE ?></label>
        <input type="text" name="state" id="state" autocomplete="state" value="<?= $user->getState() ?>" class="form-control custom_focus text-secondary">
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="country" class="text-secondary mb-2"><?= LABEL_COUNTRY ?></label>
        <input type="text" name="country" id="country" autocomplete="country" value="<?= $user->getCountry() ?>" class="form-control custom_focus text-secondary">
    </div>

    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-sm btn-outline-primary"><?= SALVE_CHANGES ?></button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formUserAddress = $('#formUserAddress');

        formUserAddress.on('submit', function(event) {
            const fields = $('#formUserAddress input');

            const formFields = {
                address: LABEL_ADDRESS,
                complement: LABEL_COMPLEMENT,
                city: LABEL_CITY,
                zipCode: LABEL_ZIP_CODE,
                state: LABEL_STATE,
                country: LABEL_COUNTRY
            }

            fields.each(function() {
                const fieldName = $(this).attr('name');
                const value = $(this).val();

                if(!validString(value)) {
                    const errorMessage = FIELD_INVALID.replace('{field}', formFields[fieldName]);
                    showAlert('error', errorMessage);
                    $(this).addClass('field_invalid');
                    event.preventDefault();
                } else {
                    $(this).removeClass('field_invalid');
                }
            })
        });
    })
</script>