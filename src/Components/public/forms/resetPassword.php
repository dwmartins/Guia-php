<form action="/user/password" method="post" class="row">
    <h5 class="text-secondary mb-3"><?= PASSWORD ?></h5>

    <hr class="text-secondary">

    <div class="mb-3 col-12 col-md-4">
        <label for="currentPassword" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LABEL_CURRENT_PASSWORD ?></label>
        <input type="password" name="currentPassword" id="currentPassword" class="form-control custom_focus text-secondary">
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="newPassword" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LABEL_NEW_PASSWORD ?></label>
        <input type="password" name="newPassword" id="newPassword" class="form-control custom_focus text-secondary">
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="confirmPassword" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LABEL_CONFIRM_PASSWORD ?></label>
        <input type="password" name="confirmPassword" id="confirmPassword" class="form-control custom_focus text-secondary">
    </div>

    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-sm btn-outline-primary"><?= SALVE_CHANGES ?></button>
    </div>
</form>