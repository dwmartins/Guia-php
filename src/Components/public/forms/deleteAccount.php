<form action="/user/delete" method="post" class="mt-5">
    <p class="fs-5 custom_dark mb-3"><?= DELETE_ACCOUNT ?></p>

    <div class="alert-danger alert border-0 d-flex flex-nowrap gap-4">
        <div>
            <i class="fa-solid fa-triangle-exclamation text-danger fs-1"></i>
        </div>
        <div>
            <p class="text-danger fw-semibold mb-0 fs-7"><?= DELETE_ACCOUNT_TEXT ?></p>
            <p class="text-danger mb-0 fs-7"><?= ACTION_CANNOT_UNDONE ?></p>
        </div>
    </div>

    <label for="confirmAccountDeletion" class="form-check-label text-secondary fs-7 mb-3 cursor_pointer">
        <input
            type="checkbox"
            name="confirmAccountDeletion"
            class="form-check-input custom_focus"
            id="confirmAccountDeletion">
        <?= CONFIRM_DELETE_ACCOUNT ?>
    </label>

    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-sm btn-danger"><?= DELETE_ACCOUNT ?></button>
    </div>

</form>