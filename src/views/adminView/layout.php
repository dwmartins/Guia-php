<section id="adminLayout" class="d-flex m-0 p-0">
    <nav class="sidebar">
        <div class="logo px-2 mb-2">
            <img src="/assets/img/default/defaultLogo.png" alt="WEBSITE_LOGO">
            <i class="fa-solid fa-xmark me-2 fs-5" id="toggleMenu"></i>
        </div>
        <ul class="menu fw-semibold">
            <!-- Dashboard -->
            <li class="menu-item">
                <i class="fa-solid fa-chart-line"></i>
                <a href="/app" class="menu-link w-100">Dashboard</a>
            </li>

            <!-- Contents with submenu -->
            <li class="menu-item d-flex flex-column align-items-start">
                <div class="d-flex align-items-center w-100" id="toggleContents">
                    <i class="fa-solid fa-list"></i>
                    <a href="javascript:void(0);" class="menu-text cursor_pointer d-flex justify-content-between align-items-center w-100">
                        Contents
                        <i class="fa-solid fa-chevron-right fs-7" id="chevronContents"></i>
                    </a>
                </div>
                <div class="submenu my-3" id="submenuContents">
                    <a href="/app/advertisements" class="submenu-link">Advertisements</a>
                    <a href="/app/events" class="submenu-link">Events</a>
                    <a href="/app/blog" class="submenu-link">Blog</a>
                </div>
            </li>

            <!-- Configs with submenu -->
            <li class="menu-item d-flex flex-column align-items-start">
                <div class="d-flex align-items-center w-100" id="toggleConfigs">
                    <i class="fa-solid fa-gears"></i>
                    <a href="javascript:void(0);" class="menu-text cursor_pointer d-flex justify-content-between align-items-center w-100">
                        Settings
                        <i class="fa-solid fa-chevron-right fs-7" id="chevronConfigs"></i>
                    </a>
                </div>
                <div class="submenu my-3" id="submenuConfigs">
                    <a href="/app/basic-information" class="submenu-link">Basic Information</a>
                    <a href="/app/settings" class="submenu-link">General Settings</a>
                    <a href="/app/language" class="submenu-link">Language</a>
                    <a href="/app/email" class="submenu-link">Email</a>
                </div>
            </li>

            <!-- Users -->
            <li class="menu-item">
                <i class="fa-regular fa-user"></i>
                <a href="/app/users" class="menu-link w-100">Users</a>
            </li>
        </ul>
    </nav>
    <div class="content w-100">
        <header class="px-0 mx-0 shadow-sm d-flex align-items-center">
            <button class="btn border-0 mx-2" id="toggleSidebar">
                <i class="fa-solid fa-bars fs-4"></i>
            </button>
            <a href="/">
                <button class="btn btn-sm btn-outline-primary">
                    Site
                </button>
            </a>
        </header>
        <main class="px-3 bg-body-tertiary h-100 w-100">
            <!-- Router view or main content goes here -->
            <?php require ROOT_VIEWS . "$view"; ?>
        </main>
    </div>
</section>