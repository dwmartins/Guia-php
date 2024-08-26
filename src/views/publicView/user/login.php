<section id="loginPublicView" class="container d-flex align-items-center justify-content-center">
    <div class="row w-100">
        <div class="col-sm-12 col-md-6 col-xl-7 d-flex justify-content-center align-items-center">
            <form action="<?= showText('PATH_LOGIN') ?>" method="post" id="formLogin">
                <h1 class="text-center text-secondary mb-3"><?= showText('LOGIN') ?></h1>

                <div class="mb-3">
                    <label for="email" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= showText('LABEL_EMAIL') ?></label>
                    <input type="email" name="email" id="email" autocomplete="email" class="form-control custom_focus">
                </div>

                <div class="mb-3">
                    <label for="password" class="text-secondary mb-2"><span class="text-danger me-1">*</span><?= showText('LABEL_PASSWORD') ?></label>
                    <input type="password" name="password" id="password" class="form-control custom_focus">
                </div>

                <div class="d-flex justify-content-between align-items-center gap-1 mb-3">
                    <label for="rememberMe" class="form-check-label text-secondary fs-7">
                        <input type="checkbox" name="rememberMe" class="form-check-input custom_focus" id="rememberMe">
                        <?= showText('REMEMBER_ME') ?>
                    </label>
                    <a href="<?= showText('PATH_FORGOT_PASSWORD') ?>" class="outline_none text-primary fs-7"><?= showText('FORGOT_PASSWORD') ?></a>
                </div>

                <button id="btnLogin" class="btn btn-primary w-100">
                    <?= showText('LABEL_ENTER') ?>
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </button>

                <hr class="text-secondary">

                <p class="text-secondary fs-7 text-center">
                    <?= showText('NOT_HAVE_ACCOUNT') ?>
                    <a href="<?= showText('PATH_CREATE_ACCOUNT') ?>" class="text-primary outline_none"><?= showText('CREATE_ACCOUNT_PAGE') ?></a>
                </p>
            </form>
        </div>
        <div class="col-md-6 col-xl-5 d-none d-md-flex justify-content-center align-items-center">
            <img src="/assets/svg/login.svg" alt="<?= showText('ALT_LOGIN') ?>" class="w-100">
        </div>
    </div>
</section>