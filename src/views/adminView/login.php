<section id="loginAdmin" class="container vh-100 item_center">
    <form action="/app/entrar" method="post" id="formLoginAdmin">
        <h1 class="text-center custom_dark mb-3"><?= showText('PANEL') ?></h1>

        <div class="mb-3">
            <label for="email"><span class="text-danger me-1">*</span><?= showText('LABEL_EMAIL') ?></label>
            <input type="email" name="email" id="email" class="form-control custom_focus">
        </div>

        <div class="mb-3">
            <label for="password"><span class="text-danger me-1">*</span><?= showText('LABEL_PASSWORD') ?></label>
            <input type="password" name="password" id="password" class="form-control custom_focus">
        </div>

        <div class="d-flex justify-content-between align-items-center gap-1 mb-3">
            <label for="remember" class="form-check-label fs-7">
                <input type="checkbox" class="form-check-input custom_focus" id="remember">
                <?= showText('REMEMBER_ME') ?>
            </label>
            <a href="#" class="outline_none text-primary fs-7"><?= showText('FORGOT_PASSWORD') ?></a>
        </div>

        <button id="btnLoginAdmin" class="btn btn-primary w-100"><?= showText('LABEL_ENTER')?></button>
    </form>
</section>