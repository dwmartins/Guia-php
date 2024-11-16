<section id="emailSettingsView" class="p-2">
    <form id="formEmailSettings" action="<?php PATH_EMAIL_SETTINGS ?>" method="post" class="bg-white container pb-4 email_settings">
        <div class="p-2 py-3 d-flex justify-content-between">
            <h6 class="custom_dark"><?= EMAIL_SETTINGS_TITLE ?></h6>

            <div class="d-flex justify-content-center gap-2">
                <span class="text-secondary emailStatus"><?= $emailActive ? STATUS_EMAIL_ACTIVE : STATUS_EMAIL_INACTIVE ?></span>
                <input class="switch" name="emailActive" id="emailActive" type="checkbox" <?= $emailActive ? 'checked' : '' ?>>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row" id="formFieldset">
                <div class="mb-4 col-sm-6">
                    <label for="server" class="form-label text-secondary text-secondary"><?= SERVER_LABEL ?></label>
                    <input type="text" name="server" class="form-control form-control-sm custom_focus text-secondary" id="server" value="<?= $emailConfig->getServer() ?>">
                </div>

                <div class="mb-4 col-sm-3">
                    <label for="port" class="form-label text-secondary"><?= PORT_LABEL ?></label>
                    <input type="number" name="port" class="form-control form-control-sm custom_focus text-secondary" id="port" value="<?= $emailConfig->getPort() ?>">
                </div>

                <div class="mb-4 col-sm-3">
                    <label class="form-label text-secondary fs-7"><?= AUTHENTICATION_LABEL ?></label>
                    <select class="form-select form-select-sm custom_focus text-secondary" name="authentication" id="authentication">
                        <option <?= $emailConfig->getAuthentication() === "SSL" ? 'selected' : '' ?> value="SSL">SSL</option>
                        <option <?= $emailConfig->getAuthentication() === "TLS" ? 'selected' : '' ?> value="TLS">TLS</option>
                    </select>
                </div>

                <div class="mb-4 col-sm-4">
                    <label for="emailAddress" class="form-label text-secondary"><?= EMAIL_ADDRESS_LABEL ?></label>
                    <input name="emailAddress" type="text" class="form-control form-control-sm custom_focus text-secondary" id="emailAddress" value="<?= $emailConfig->getEmailAddress() ?>">
                </div>

                <div class="mb-4 col-sm-4">
                    <label for="username" class="form-label text-secondary"><?= USERNAME_EMAIL_LABEL ?></label>
                    <input name="username" type="text" class="form-control form-control-sm custom_focus text-secondary" id="username" value="<?= $emailConfig->getUsername() ?>">
                </div>

                <div class="mb-4 col-sm-4">
                    <label for="password" class="form-label text-secondary"><?= LABEL_PASSWORD ?></label>
                    <div class="position-relative">
                        <input type="password" name="password" id="password" class="form-control form-control-sm custom_focus text-secondary">
                        <i class="fa-regular icon_show_password fa-eye text-secondary"></i>
                    </div>
                </div>

                <div class="mb-2 d-flex justify-content-end">
                    <button id="btnSave" class="btn btn-sm btn-primary"><?= SAVE_CHANGES ?></button>
                </div>
            </div>
        </div>
    </form>
</section>

<script src="/assets/js/app/emailSettings.js" defer></script>