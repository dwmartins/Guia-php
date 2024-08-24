<?php

$siteInfo = getSiteInfo();
$logoHeader = empty($siteInfo->getLogoImage()) ? "/assets/img/defaultLogo.png" : "/uploads/systemImages/" . $siteInfo->getLogoImage();

?>

<nav id="publicNavComponent" class="navbar navbar-expand-lg bg-body-tertiary mx-0 p-0">
    <div class="container">
        <a href="/">
            <img src="<?= $logoHeader ?>" alt="<?= showText('ALT_LOGO_IMAGE') ?>" class="logo_image">
        </a>

        <button @click="menuOnClick" class="btn border-0 navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navBar" aria-controls="navBar" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fa-solid fa-bars fs-4"></i>
        </button>

        <div id="navBar" class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Logged In -->
                <?php if (isLoggedIn()): ?>
                    <li class="nav-item logged_small mt-2">
                        <i class="bi bi-person-fill me-1"></i>
                        <p class="m-0 text-secondary"><i class="fa-regular fa-user me-2"></i><?= getLoggedUser()->getFulName() ?></p>
                    </li>
                    <hr>
                    <li class="nav-item logged_small">
                        <a href="<?= showText('PATH_USER_PANEL') ?>" class="nav-link"><?= showText('PANEL_PAGE') ?></a>
                    </li>
                    <li class="nav-item logged_small">
                        <a href="<?= showText('PATH_PROFILE') ?>" class="nav-link"><?= showText('PROFILE_PAGE') ?></a>
                    </li>
                    <li class="nav-item logged_small">
                        <a href="<?= showText('PATH_LOGOUT') ?>" class="nav-link"><?= showText('LOGOUT_PAGE') ?></a>
                    </li>
                <?php endif ?>
                <!-- End Logged In -->

                <hr>

                <li class="nav-item">
                    <a href="/" class="nav-link"><?= showText('HOME_PAGE') ?></a>
                </li>

                <li class="nav-item">
                    <a href="<?= showText('PATH_PLANS') ?>" class="nav-link"><?= showText('ADVERTISERS_PAGE') ?></a>
                </li>

                <li class="nav-item">
                    <a href="<?= showText('PATH_BLOG') ?>" class="nav-link"><?= showText('BLOG_PAGE') ?></a>
                </li>

                <li class="nav-item">
                    <a href="<?= showText('PATH_CONTACT') ?>" class="nav-link"><?= showText('CONTACT_PAGE') ?></a>
                </li>
                
                <hr>
                
                <li class="nav-item logged_small">
                    <a href="<?= showText('PATH_PLANS') ?>" class="nav-link"><?= showText('ADVERTISERS_PAGE') ?></a>
                </li>

                <?php if (!isLoggedIn()): ?>
                    <li class="nav-item logged_small">
                        <a href="<?= showText('PATH_LOGIN') ?>" class="nav-link"><?= showText('LOGIN_PAGE') ?></a>
                    </li>
                <?php endif ?>
            </ul>
            <!-- LoggedIn -->
            <?php if (isLoggedIn()): ?>
                <div class="logged_large dropdown_logged">
                    <a href="<?= showText('PATH_PLANS') ?>" class="btn btn-light border btn-sm me-2 fw-semibold text-dark opacity-75"><?= showText('ADVERTISERS_PAGE') ?></a>
                    <div class="dropdown-center">
                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= getLoggedUser()->getName() ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="<?= showText('PATH_USER_PANEL') ?>" class="dropdown-item"><?= showText('PANEL_PAGE') ?></a></li>
                            <li><a href="<?= showText('PATH_LOGOUT') ?>" class="dropdown-item"><?= showText('LOGOUT_PAGE') ?></a></li>
                        </ul>
                    </div>
                </div>
            <?php endif ?>
            <!-- End LoggedIn -->

            <?php if (!isLoggedIn()): ?>
                <div class="flex-column logged_large">
                    <a href="<?= showText('PATH_PLANS') ?>" class="btn btn-light border btn-sm me-2 fw-semibold text-dark opacity-75"><?= showText('ADVERTISERS_PAGE') ?></a>
                    <a href="<?= showText('PATH_LOGIN') ?>" class="btn btn-primary btn-sm fw-bold rounded-1"><?= showText('LOGIN_PAGE') ?></a>
                </div>
            <?php endif ?>
        </div>
    </div>
</nav>