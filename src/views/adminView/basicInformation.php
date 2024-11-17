<section class="basicInfoView p-2">
    <div class="container bg-white pb-4 mb-4">
        <div class="p-2 py-3">
            <h6 class="custom_dark"><?= VISUAL_IDENTITY ?></h6>
        </div>
        
        <form action="/app/settings/updateimages" method="post" enctype="multipart/form-data" class="formImages container-fluid my-2">
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

    <div class="container bg-white">
        <div class="p-2 py-3">
            <h6 class="custom_dark"><?= BASIC_INFO ?></h6>
        </div>

        <form action="/app/settings/basic-infos" method="post" class="formBasicInfo row p-2 pb-4">
            <div class="mb-3 col-md-4">
                <label for="webSiteName" class="form-label"><?= SITE_NAME_LABEL ?></label>
                <input name="webSiteName" type="text" value="<?= $siteInfo->getWebSiteName() ?>" class="form-control form-control-sm custom_focus text-secondary" id="webSiteName">
            </div>

            <div class="mb-3 col-md-4">
                <label for="email" class="form-label"><?= LABEL_EMAIL ?></label>
                <input name="email" type="text" value="<?= $siteInfo->getEmail() ?>" class="form-control form-control-sm custom_focus text-secondary" id="email">
            </div>

            <div class="mb-3 col-md-4">
                <label for="phone" class="form-label"><?= LABEL_PHONE ?></label>
                <input name="phone" type="number" value="<?= $siteInfo->getPhone() ?>" class="form-control form-control-sm custom_focus text-secondary" id="phone">
            </div>

            <div class="mb-3 col-md-4">
                <label for="city" class="form-label"><?= LABEL_CITY ?></label>
                <input name="city" type="text" value="<?= $siteInfo->getCity() ?>" class="form-control form-control-sm custom_focus text-secondary" id="city">
            </div>

            <div class="mb-3 col-md-4">
                <label for="state" class="form-label"><?= LABEL_STATE ?></label>
                <input name="state" type="text" value="<?= $siteInfo->getState() ?>" class="form-control form-control-sm custom_focus text-secondary" id="state">
            </div>

            <div class="mb-3 col-md-4">
                <label for="address" class="form-label"><?= LABEL_ADDRESS ?></label>
                <input name="address" type="text" value="<?= $siteInfo->getAddress() ?>" class="form-control form-control-sm custom_focus text-secondary" id="address">
            </div>

            <div class="mb-3 col-md-4">
                <label for="instagram" class="form-label"><?= INSTAGRAM_LABEL ?></label>
                <input name="instagram" type="text" value="<?= $siteInfo->getInstagram() ?>" class="form-control form-control-sm custom_focus text-secondary" id="instagram">
            </div>

            <div class="mb-3 col-md-4">
                <label for="facebook" class="form-label"><?= FACEBOOK_LABEL ?></label>
                <input name="facebook" type="text" value="<?= $siteInfo->getFacebook() ?>" class="form-control form-control-sm custom_focus text-secondary" id="facebook">
            </div>

            <div class="mb-3 col-md-4">
                <label for="twitter" class="form-label"><?= TWITTER_LABEL ?></label>
                <input name="twitter" type="text" value="<?= $siteInfo->getTwitter() ?>" class="form-control form-control-sm custom_focus text-secondary" id="twitter">
            </div>

            <div class="mb-3 col-md-6">
                <label for="description" class="form-label"><?= LABEL_DESCRIPTION ?> <span class="opacity-75 fs-8">(SEO)</span></label>
                <textarea name="description" id="description" rows="4" class="form-control custom_focus text-secondary" maxlength="300"><?= $siteInfo->getDescription() ?></textarea>
                <div class="d-flex justify-content-end mt-1">
                    <p class="fs-8 text-secondary opacity-75"><span class="count_description">0</span> | 300</p>
                </div>
            </div>

            <div class="mb-3 col-md-6">
                <label for="keywords" class="form-label"><?= KEYWORDS_LABEL ?> <span class="opacity-75 fs-8">(SEO)</span></label>
                <textarea name="keywords" id="keywords" rows="4" class="form-control custom_focus text-secondary" maxlength="300"><?= $siteInfo->getKeywords() ?></textarea>
                <div class="d-flex justify-content-end mt-1">
                    <p class="fs-8 text-secondary opacity-75"><span class="count_keywords">0</span> | 300</p>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" id="btnSaveBasicInfo" class="btn btn-sm btn-primary"><?= SAVE_CHANGES ?></button>
            </div>
        </form>
    </div>
</section>

<script src="/assets/js/app/basicInformation.js" defer></script>

