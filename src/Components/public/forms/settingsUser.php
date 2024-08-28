<form id="formSettingsUser" action="/user/settings" method="post" class="row">
    <label for="acceptsEmails" class="form-check-label text-secondary fs-7 mb-3 cursor_pointer">
        <input
            type="checkbox"
            name="acceptsEmails"
            class="form-check-input custom_focus"
            id="acceptsEmails"
            <?php if ($user->getAcceptsEmails() === "Y"): ?> checked <?php endif; ?>
        >
        <?= AGREE_RECEIVE_MAIL ?>
    </label>

    <label for="publishContactInfo" class="form-check-label text-secondary fs-7 mb-3 cursor_pointer">
        <input
            type="checkbox"
            name="publishContactInfo"
            class="form-check-input custom_focus"
            id="publishContactInfo"
            <?php if ($user->getPublishContactInfo() === "Y"): ?> checked <?php endif; ?>
        >
        <?= CONTACT_PUBLIC ?>
    </label>

    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-sm btn-outline-primary"><?= SALVE_CHANGES ?></button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formSettingsUser = $('#formSettingsUser');

        formSettingsUser.on('submit', function(event) {
            $('#formSettingsUser button').empty();
            $('#formSettingsUser button').html(`
                    <div id="spinnerLoading" class="item_center gap-2">
                        <div class="spinner-border" role="status"></div>
                        <p class="m-0">${WAIT}</p>
                    </div>
            `).prop('disabled', true);
        });

    })
</script>