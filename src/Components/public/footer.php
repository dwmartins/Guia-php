<?php

$siteInfo = SITE_INFO;
$logoFooter = empty($siteInfo->getLogoImage()) ? PATH_DEFAULT_LOGO : ROOT_UPLOADS_SYSTEMIMAGES . $siteInfo->getLogoImage();

function showSocialMedia() {
    $siteInfo = SITE_INFO;

    if(!empty($siteInfo->getFacebook()) || !empty($siteInfo->getInstagram() || !empty($siteInfo->getTwitter()))) {
        return true;
    }

    return false;
}

?>

<footer id="publicFooterComponent" class="bg-gray-200">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-sm-4 logo_footer py-2">
                <div class="h-100 w-100 d-flex flex-column justify-content-center text-center">
                    <a class="navbar-brand" href="#">
                        <div class="logo_image d-flex align-items-center justify-content-center">
                            <a href="/" class="navbar-brand">
                                <div class="d-flex align-items-center">
                                    <img src="<?= $logoFooter ?>" alt="<?= showText('ALT_LOGO_IMAGE') ?>" class="logoFooter">
                                </div>
                            </a>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 <?= showSocialMedia() ? 'col-sm-4' : 'col-sm-8' ?>">
                <div class="p-2">
                    <h4 class="custom_dark fs-5"><?= showText('NAVIGATION') ?></h4>

                    <div class="row align">
                        <ul class="navbar-nav col px-3">
                            <li class="nav-item">
                                <a href="/" class="nav-link">
                                    <?= showText('HOME_PAGE') ?>
                                </a>
                                <a href="<?= showText('PATH_LISTAGENS') ?>" class="nav-link">
                                    <?= showText('LISTAGENS_PAGE') ?>
                                </a>
                                <a href="<?= showText('PATH_EVENTS') ?>" class="nav-link">
                                    <?= showText('EVENTS_PAGE') ?>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav col px-3">
                            <li class="nav-item">
                                <a href="<?= showText('PATH_BLOG') ?>" class="nav-link">
                                    <?= showText('BLOG_PAGE') ?>
                                </a>
                                <a href="<?= showText('PATH_CONTACT') ?>" class="nav-link">
                                    <?= showText('CONTACT_PAGE') ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="text-secondary d-sm-none">
            <?php if (showSocialMedia()): ?>
                <div class="col-12 col-sm-4">
                    <div class="p-2">
                        <h4 class="custom_dark text-center fs-5"><?= showText('SOCIAL_MEDIA') ?></h4>
                        <div class="d-flex gap-3 justify-content-center p-2">
                            <?php if (!empty($siteInfo->getTwitter())): ?>
                                <a href="<?= $siteInfo->getTwitter() ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-x-twitter custom_dark fs-4"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($siteInfo->getFacebook())): ?>
                                <a href="<?= $siteInfo->getFacebook() ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-facebook custom_dark fs-4"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($siteInfo->getInstagram())): ?>
                                <a href="<?= $siteInfo->getInstagram() ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-instagram custom_dark fs-4"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="container-fluid gap-3 bg-gray-800 p-3">
        <div class="container">
            <div class="row">
                <p class="col-12 col-sm-6 text-light m-0 fs-7 text-center mb-2 mb-sm-0">
                    <?= showText('DEVELOPER_BY') ?>
                    <a href="https://br.linkedin.com/in/douglas-martins-a36a45185" target="_blank" rel="noopener noreferrer" class="text-white link-offset-2 link-underline link-underline-opacity-0 opacity-75">Douglas Wellington Martins</a>
                </p>
                <p class="col-12 col-sm-6 text-light m-0 fs-7 text-center">
                    <?= showText('ILLUSTRATIONS_BY') ?>
                    <a href="https://storyset.com" target="_blank" rel="noopener noreferrer" class="text-white link-offset-2 link-underline link-underline-opacity-0 opacity-75">Storyset</a>
                </p>
            </div>
        </div>
    </div>
</footer>