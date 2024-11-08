<section id="profileView" class="container-fluid">
    <div class="container my-2 my-sm-5">
        <h2 class="custom_dark fw-bolder"><?= PERSONAL_INFO ?></h2>
        <p class="text-secondary m-0"><?= MANAGE_PERSONAL_HERE ?></p>

        <div class="row mt-sm-3">
            <div class="col-12 col-lg-7 col-xxl-6">
                <div class="item_center d-flex flex-wrap gap-3 p-3 rounded rounded-2 my-sm-2 mb-sm-5">
                    <div>
                        <div class="position-relative">
                            <img src="<?= $userImg ?>" alt="<?= ALT_USER_IMG ?>" id="current_user_photo" class="user_photo">
                            <label for="new_img" class="btn_change_img"><i class="fa-solid fa-pencil"></i></label>
                            <input type="file" id="new_img" class="d-none" accept="image/jpeg, image/jpg, image/png">
                            <div class="loadingImg d-none">
                                <?php include ROOT_COMPONENTS . "shared/loader.php" ?>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center gap-2 my-2 options d-none">
                            <button id="btn_save_img" class="btn btn-sm btn-outline-primary"><?= SAVE ?></button>
                            <button id="btn_cancel_img" class="btn btn-sm btn-outline-danger"><?= CANCEL ?></button>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center">
                        <p class="custom_dark fw-semibold mt-2 mb-0"><?= $user->getFullName() ?></p>
                        <p class="text-secondary fs-8 text-break"><?= $user->getEmail() ?></p>
                        <p class="custom_dark fw-semibold fs-8 text-break mb-0"><?= MEMBER_SINCE ?>:</p>
                        <p class="text-secondary fs-8 text-break"><?= getDateAsString($user->getCreatedAt()) ?></p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="fs-5 custom_dark mb-0"><?= BASIC_INFO ?></p>
                    <button class="btn link-primary fs-7 fw-semibold letter-spacing text-uppercase p-0" data-toggle="basic_info_form"><?= UPDATE_TEXT ?></button>
                </div>

                <div class="basic_info">
                    <!-- form basic info -->
                    <p class="text-secondary fs-7 mb-0">
                        <i class="fa-regular fa-address-card me-2"></i>
                        <?= $user->getFullName() ?>
                    </p>

                    <?php if ($user->getDateOfBirth()): ?>
                        <p class="text-secondary fs-7 mb-0">
                            <i class="fa-solid fa-cake-candles me-2"></i>
                            <?= getSimpleDate($user->getDateOfBirth()) ?>
                        </p>
                    <?php endif ?>

                    <p class="text-secondary fs-7 mb-0">
                        <i class="fa-regular fa-envelope me-2"></i>
                        <?= $user->getEmail() ?>
                    </p>

                    <?php if ($user->getPhone()): ?>
                        <p class="text-secondary fs-7 mb-0">
                            <i class="fa-solid fa-phone me-2"></i>
                            <?= $user->getPhone() ?>
                        </p>
                    <?php endif ?>

                    <div id="basic_info_form" class="my-4">
                        <?php require ROOT_COMPONENTS . "/public/forms/basicUserInfo.php" ?>
                    </div>

                    <hr class="text-secondary">
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="fs-5 custom_dark mb-0"><?= ADDRESS ?></p>
                    <button class="btn link-primary fs-7 fw-semibold letter-spacing text-uppercase p-0" data-toggle="address_form"><?= UPDATE_TEXT ?></button>
                </div>

                <div class="address">
                    <!-- form address -->
                    <?php if ($user->getDateOfBirth()): ?>
                        <p class="text-secondary fs-7 mb-0">
                            <i class="fa-solid fa-location-dot me-2"></i>
                            <?= $user->getAddress() ?>
                        </p>
                        <p class="text-secondary fs-7 mb-0">
                            <?php

                            if ($user->getCity()) {
                                echo $user->getCity();
                            }

                            if ($user->getState()) {
                                echo ($user->getCity() ? ', ' : '') . $user->getState();
                            }

                            if ($user->getZipCode()) {
                                echo ($user->getCity() || $user->getState() ? ', ' : '') . $user->getZipCode();
                            }

                            ?>
                        </p>
                    <?php endif ?>

                    <div id="address_form" class="my-4">
                        <?php require ROOT_COMPONENTS . "/public/forms/userAddress.php" ?>
                    </div>

                    <hr class="text-secondary">
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="fs-5 custom_dark mb-0"><?= PASSWORD ?></p>
                    <button class="btn link-primary fs-7 fw-semibold letter-spacing text-uppercase p-0" data-toggle="password_form"><?= UPDATE_TEXT ?></button>
                </div>

                <div>
                    <!-- form password -->
                    <div id="password_form" class="my-4">
                        <?php require ROOT_COMPONENTS . "/public/forms/resetPassword.php" ?>
                    </div>

                    <hr class="text-secondary">
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="fs-5 custom_dark mb-0"><?= SETTINGS ?></p>
                    <button class="btn link-primary fs-7 fw-semibold letter-spacing text-uppercase p-0" data-toggle="settings_form"><?= UPDATE_TEXT ?></button>
                </div>

                <div>
                    <!-- form settings -->
                    <div id="settings_form" class="my-4">
                        <?php require ROOT_COMPONENTS . "/public/forms/settingsUser.php" ?>
                    </div>

                    <hr class="text-secondary">
                </div>

                <!-- Form delete account -->
                <?php require ROOT_COMPONENTS . "/public/forms/deleteAccount.php" ?>

            </div>
            <div class="col-12 col-lg-5 col-xxl-6 p-3 pt-0 d-none d-lg-flex justify-content-center align-items-baseline">
                <img src="/assets/svg/account.svg" alt="<?= ALT_ACCOUNT ?>" class="w-100">
            </div>
        </div>
    </div>
</section>

<script src="/assets/js/profile.js" defer></script>