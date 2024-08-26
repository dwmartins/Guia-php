<form action="#" method="post" class="row">
    <h5 class="text-secondary mb-3"><?= BASIC_INFO ?></h5>

    <hr class="text-secondary">

    <div class="mb-3 col-12 col-md-4">
        <label for="name" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LABEL_NAME ?></label>
        <input type="text" name="name" id="name" autocomplete="name" value="<?= $user->getName() ?>" class="form-control custom_focus text-secondary">
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="lastName" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= LAST_NAME ?></label>
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