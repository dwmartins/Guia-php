<section class="basicInfoView p-2">
    <div class="container bg-white pb-4">
        <div class="p-2 py-3">
            <h6 class="custom_dark"><?= VISUAL_IDENTITY ?></h6>
        </div>
        
        <form action="/app/settings/updateimages" method="post" enctype="multipart/form-data" class="formImages container-fluid my-3">
            <!-- Logo Image -->
            <div class="row">
                <div class="col-sm-12 col-lg-4 mb-4 item_center">
                    <img src="<?= $logoImage ?>" id="current_logo" alt="Logo" class="previewImg">
                    <div class="loadingLogo d-none">
                        <?php include ROOT_COMPONENTS . "shared/loader.php" ?>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <p class="custom_dark"><?= CHOOSE_YOUR_LOGO_IMAGE ?></p>
                    <p class="custom_dark opacity-75 fs-8"><?= FORMAT_LOGO_IMAGE ?></p>

                    <div id="logoSelected" class="d-none d-flex justify-content-between align-items-center gap-2 mt-4">
                        <p class="text-secondary m-0 fileName" id="fileName"></p>
                        <button type="button" class="btn btn-sm btn-danger" id="cancelLogo"><?= CANCEL ?></button>
                    </div>
                    
                    <div id="uploadBtnLogo" class="d-flex justify-content-center justify-content-lg-start mt-4">
                        <label for="logo" class="btn btn-sm btn-primary">
                            <?= CHOOSE_FILE ?><i class="fa-regular fa-file-image ms-1"></i>
                            <input type="file" id="logo" name="logo" class="d-none" accept="<?= ACCEPTED_IMAGE ?>">
                        </label>
                    </div>
                </div>
            </div>

            <hr class="text-secondary my-5">

            <!-- Cover Image -->
            <div class="row">
                <div class="col-sm-12 col-lg-4 mb-4 item_center">
                    <img src="<?= $coverImage ?>" id="current_cover" alt="Cover image" class="previewImg">
                    <div class="loadingCover d-none">
                        <?php include ROOT_COMPONENTS . "shared/loader.php" ?>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <p class="custom_dark"><?= CHOOSE_YOUR_COVER_IMAGE ?></p>
                    <p class="custom_dark opacity-75 fs-8"><?= FORMAT_IMAGE ?></p>

                    <div id="coverSelected" class="d-none d-flex justify-content-between align-items-center gap-2 mt-4">
                        <p class="text-secondary m-0 fileName" id="fileName"></p>
                        <button type="button" class="btn btn-sm btn-danger" id="cancelCover"><?= CANCEL ?></button>
                    </div>
                    
                    <div id="uploadBtnCover" class="d-flex justify-content-center justify-content-lg-start mt-4">
                        <label for="cover" class="btn btn-sm btn-primary">
                            <?= CHOOSE_FILE ?><i class="fa-regular fa-file-image ms-1"></i>
                            <input type="file" id="cover" name="cover" class="d-none" accept="<?= ACCEPTED_IMAGE ?>">
                        </label>
                    </div>
                </div>
            </div>

            <hr class="text-secondary my-5">

            <!-- icon -->
            <div class="row">
                <div class="col-sm-12 col-lg-4 mb-4 item_center">
                    <img src="<?= $icon ?>" id="current_icon" alt="Icon" class="previewIcon">
                    <div class="loadingIcon d-none">
                        <?php include ROOT_COMPONENTS . "shared/loader.php" ?>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <p class="custom_dark"><?= CHOOSE_YOUR_ICON ?></p>
                    <p class="custom_dark opacity-75 fs-8"><?= FORMAT_ICON ?></p>

                    <div id="iconSelected" class="d-none d-flex justify-content-between align-items-center gap-2 mt-4">
                        <p class="text-secondary m-0 fileName" id="fileName"></p>
                        <button type="button" class="btn btn-sm btn-danger" id="cancelIcon"><?= CANCEL ?></button>
                    </div>
                    
                    <div id="uploadBtnIcon" class="d-flex justify-content-center justify-content-lg-start mt-4">
                        <label for="icon" class="btn btn-sm btn-primary">
                            <?= CHOOSE_FILE ?><i class="fa-regular fa-file-image ms-1"></i>
                            <input type="file" id="icon" name="icon" class="d-none" accept="<?= ACCEPTED_ICON ?>">
                        </label>
                    </div>
                </div>
            </div>

            <hr class="text-secondary my-5">

            <!-- icon -->
            <div class="row">
                <div class="col-sm-12 col-lg-4 mb-4 item_center">
                    <img src="<?= $defaultImage ?>" id="current_defaultImg" alt="Icon" class="previewImg">
                    <div class="loadingDefaultImg d-none">
                        <?php include ROOT_COMPONENTS . "shared/loader.php" ?>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <p class="custom_dark"><?= CHOSE_YOUR_DEFAULT_IMAGE ?></p>
                    <p class="custom_dark opacity-75 fs-8 mb-0"><?= FORMAT_IMAGE ?></p>
                    <p class="custom_dark opacity-75 fs-8"><?= DEFAULT_IMAGE_MESSAGE ?></p>

                    <div id="defaultImgSelected" class="d-none d-flex justify-content-between align-items-center gap-2 mt-4">
                        <p class="text-secondary m-0 fileName" id="fileName"></p>
                        <button type="button" class="btn btn-sm btn-danger" id="cancelDefaultImg"><?= CANCEL ?></button>
                    </div>
                    
                    <div id="uploadBtnDefaultImg" class="d-flex justify-content-center justify-content-lg-start mt-4">
                        <label for="default" class="btn btn-sm btn-primary">
                            <?= CHOOSE_FILE ?><i class="fa-regular fa-file-image ms-1"></i>
                            <input type="file" id="default" name="default" class="d-none" accept="<?= ACCEPTED_ICON ?>">
                        </label>
                    </div>
                </div>
            </div>

            <hr class="text-secondary my-5">

            <div class="d-flex justify-content-end">
                <button type="submit" id="btnSaveImages" class="btn btn-sm btn-primary"><?= SAVE_CHANGES ?></button>
            </div>
        </form>
    </div>
</section>

<script src="/assets/js/app/basicInformation.js" defer></script>

