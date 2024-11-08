<section id="userPanelView" class="container-fluid">
    <div class="container my-2 my-md-5">
        <div class="row">
            <div class="col-12 col-lg-3 p-2">
                <!-- user info -->
                <div class="bg-gray-200 item_center flex-column p-3 shadow rounded rounded-2">
                    <div class="position-relative">
                        <img src="<?= $userImg ?>" alt="<?= ALT_USER_IMG ?>" id="current_user_photo" class="user_photo">
                    </div>

                    <div class="d-flex flex-column align-items-center">
                        <p class="custom_dark fw-semibold mt-2 mb-0"><?= $user->getFullName() ?></p>
                        <p class="text-secondary fs-8 text-break"><?= $user->getEmail() ?></p>
                        <p class="custom_dark fw-semibold fs-8 text-break mb-0"><?= MEMBER_SINCE ?>:</p>
                        <p class="text-secondary fs-8 text-break"><?= getDateAsString($user->getCreatedAt()) ?></p>

                        <?php if ($user->getCity() && $user->getState()): ?>
                            <p class="text-secondary fs-8 text-break"><?= $user->getCity() . ', ' . $user->getState() ?></p>
                        <?php endif ?>

                        <a href="<?= PATH_PROFILE ?>" class="btn btn-sm btn-primary"><?= EDIT_PROFILE ?><i class="fa-solid fa-user-pen ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9 p-2">
                <!-- Contents -->
                <div class="p-3">
                    <h5 class="custom_dark fw-semibold"><?= setGreeting() . ' ' . $user->getName() ?></h5>
                    <p class="text-secondary"><?= WELCOME_TO_YOU_AREA ?></p>
                </div>

                <hr class="text-secondary">

                <div class="d-flex flex-column align-items-center">
                    <img src="/assets/svg/empty.svg" class="img_no_ads" alt="<?= ALT_NOT_LISTING ?>">
                    <p class="text-secondary text-center"><?= DONT_HAVE_ADS ?></p>
                    <a href="<?= PATH_PLANS ?>" class="btn btn-outline-primary"><?= ADVERTISE_NOW ?><i class="fa-solid fa-arrow-up-right-from-square ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>