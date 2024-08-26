<section id="profileView" class="container-fluid">
    <div class="container my-2 my-sm-5">
        <h4 class="custom_dark mb-3"><?= MY_ACCOUNT ?></h4>
        <div class="row position-relative">
            <div class="col-12 col-lg-3 py-2">
                <!-- user info -->
                <div class="bg-gray-200 item_center user_info_card flex-column shadow rounded rounded-2 position-sticky py-3">
                    <img src="<?= $userImg ?>" alt="<?= ALT_USER_IMG ?>" class="user_photo">

                    <div class="d-flex flex-column align-items-center p-3">
                        <p class="custom_dark fw-semibold mt-2 mb-0 fs-5 full_name"><?= $user->getFullName() ?></p>
                        <p class="text-secondary fs-8 text-break"><?= $user->getEmail() ?></p>
                        <p class="custom_dark fw-semibold fs-8 text-break mb-0"><?= MEMBER_SINCE ?>:</p>
                        <p class="text-secondary fs-8 text-break"><?= getDateAsString($user->getCreatedAt()) ?></p>

                        <?php if ($user->getCity() && $user->getState()): ?>
                            <p class="text-secondary fs-8 text-break"><?= $user->getCity() . ', ' . $user->getState() ?></p>
                        <?php endif ?>
                        <hr class="text-secondary opacity-25 w-100">
                    </div>


                    <div id="list_menu" class="w-100 d-flex flex-column gap-3 text-secondary">
                        <a href="#list-item-1" class="list-group-item"><i class="fa-regular fa-user"></i><?= BASIC_INFO ?></a>
                        <a href="#list-item-2" class="list-group-item"><i class="fa-solid fa-location-dot"></i><?= ADDRESS ?></a>
                        <a href="#list-item-3" class="list-group-item"><i class="fa-solid fa-lock"></i><?= PASSWORD ?></a>
                        <a href="#list-item-4" class="list-group-item"><i class="fa-solid fa-gears"></i><?= SETTINGS ?></a>
                        <a href="#list-item-5" class="list-group-item"><i class="fa-solid fa-trash-can"></i><?= DELETE_ACCOUNT ?></a>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-9 p-2 px-lg-4">
                <div data-bs-spy="scroll" data-bs-target="#list_menu" data-bs-smooth-scroll="true" tabindex="0">
                    <div id="list-item-1" class="container bg-gray-200 shadow rounded rounded-2 p-3 py-4 mb-4">
                        <?php require ROOT_COMPONENTS . "/public/forms/basicUserInfo.php" ?>
                    </div>
                    <div id="list-item-2" class="container bg-gray-200 shadow rounded rounded-2 p-3 py-4 mb-4">
                        <?php require ROOT_COMPONENTS . "/public/forms/userAddress.php" ?>
                    </div>
                    <div id="list-item-3" class="container bg-gray-200 shadow rounded rounded-2 p-3 py-4 mb-4">
                        <?php require ROOT_COMPONENTS . "/public/forms/resetPassword.php" ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>