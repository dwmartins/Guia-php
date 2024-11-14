<?php
if (isAdmin()): ?>
    <section id="adminBarComponent" class="container-fluid position-sticky top-0 bg-dark z-3">
        <div class="container py-2 d-flex align-items-center justify-content-between">
            <a href="/app" class="text-white-50 outline_none hover_primary">
                <i class="fa-solid fa-house me-1"></i>
                <span class="d-none d-sm-inline-block">Dashboard</span>
            </a>

            <?php if (MAINTENANCE): ?>
                <div class="item_center gap-2 publish">
                    <p class="m-0 text-white-50 fs-7"><?= MAINTENANCE_ALERT ?></p>
                    <a href="/app/configurações/configurações-gerais" class="btn btn-sm btn-outline-primary"><?= PUBLISH ?></a>
                </div>
            <?php endif ?>

            <a href="/logout" class="text-white-50 outline_none hover_primary">
                <span class="d-none d-sm-inline-block"><?= LOGOUT_PAGE ?></span>
                <i class="fa-solid fa-right-from-bracket ms-1"></i>
            </a>
        </div>
    </section>
<?php endif ?>