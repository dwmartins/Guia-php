<?php

$userLogged = getLoggedUser();
$siteInfo = SITE_INFO;
$logo = empty($siteInfo->getLogoImage()) ? PATH_DEFAULT_LOGO : PATH_UPLOADS_SYSTEMIMAGES . $siteInfo->getLogoImage() . "?v=" . time();

?>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-center">
        <div class="logo">
            <img src="<?= $logo ?>" alt="Logo">
        </div>

        <a href="javascript:void(0);" class="text-black">
            <i class="fa-solid fa-bars toggle-sidebar-btn mt-1"></i>
        </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <a href="/" class="btn btn-sm btn-outline-primary visite-site" target="_blank">
                <i class="fa-solid fa-globe"></i>
                <span><?= VISITE_SITE ?></span>
            </a>
            
            <li class="nav-item dropdown">

                <a class="nav-link nav-icon mt-2" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="fa-regular fa-bell"></i>
                    <span class="badge bg-primary badge-number">4</span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have 4 new notifications
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                            <h4>Lorem Ipsum</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>30 min. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-x-circle text-danger"></i>
                        <div>
                            <h4>Atque rerum nesciunt</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>1 hr. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-check-circle text-success"></i>
                        <div>
                            <h4>Sit rerum fuga</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>2 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                            <h4>Dicta reprehenderit</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>4 hrs. ago</p>
                        </div>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="dropdown-footer">
                        <a href="#">Show all notifications</a>
                    </li>

                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            <li class="nav-item dropdown">

                <a class="nav-link nav-icon mt-2" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="fa-regular fa-message"></i>
                    <span class="badge bg-success badge-number">3</span>
                </a><!-- End Messages Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        You have 3 new messages
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                            <div>
                                <h4>Maria Hudson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                            <div>
                                <h4>Anna Nelson</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>6 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                            <div>
                                <h4>David Muldon</h4>
                                <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                <p>8 hrs. ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="dropdown-footer">
                        <a href="#">Show all messages</a>
                    </li>

                </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <img src="<?= empty($userLogged->getPhoto()) ? PATH_DEFAULT_USER_IMAGE : PATH_UPLOADS_USERS . $userLogged->getPhoto() . "?v=" . time(); ?>" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2 text-black fs-6"><?= $userLogged->getName() ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-profile shadow">
                    <li><a href="<?= PATH_USER_PANEL ?>" class="dropdown-item text-secondary"><i class="fa-solid fa-chart-line me-2"></i><?= PANEL_PAGE ?></a></li>
                    <li><a href="<?= PATH_PROFILE ?>" class="dropdown-item text-secondary"><i class="fa-regular fa-user me-2"></i><?= PROFILE_PAGE ?></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a href="<?= PATH_LOGOUT ?>" class="dropdown-item text-secondary"><i class="fa-solid fa-right-from-bracket me-2"></i><?= LOGOUT_PAGE ?></a></li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="/app">
                <i class="fa-solid fa-chart-line"></i>
                <span><?= DASHBOARD_PAGE ?></span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#contents-nav" data-bs-toggle="collapse" href="javascript:void(0);">
                <i class="fa-solid fa-list"></i><span><?= CONTENTS_PAGE ?></span><i class="fa-solid fa-chevron-down ms-auto"></i>
            </a>
            <ul id="contents-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#" class="outline_none">
                        <i class="fa-regular fa-circle"></i></i><span>Anúncios</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="outline_none">
                        <i class="fa-regular fa-circle"></i></i><span>Eventos</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="outline_none">
                        <i class="fa-regular fa-circle"></i></i><span>Blog</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Contents Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="javascript:void(0);">
                <i class="fa-solid fa-gears"></i><span><?= SETTINGS_PAGE ?></span><i class="fa-solid fa-chevron-down ms-auto"></i>
            </a>
            <ul id="settings-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= PATH_ADM_BASIC_INFORMATION ?>" class="outline_none">
                        <i class="fa-regular fa-circle"></i><span><?= BASIC_INFORMATION_PAGE ?></span>
                    </a>
                </li>
                <li>
                    <a href="#" class="outline_none">
                        <i class="fa-regular fa-circle"></i><span><?= GENERAL_SETTINGS_PAGE ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?= PATH_EMAIL_SETTINGS ?>" class="outline_none">
                        <i class="fa-regular fa-circle"></i><span><?= EMAIL_PAGE ?></span>
                    </a>
                </li>
            </ul>
        </li><!-- End Settings Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="/app">
                <i class="fa-regular fa-user"></i>
                <span><?= USERS_PAGE ?></span>
            </a>
        </li><!-- End Users Nav -->
    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">
    <?php require ROOT_VIEWS . "$view"; ?>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center outline_none"><i class="fa-solid fa-arrow-up"></i></a>