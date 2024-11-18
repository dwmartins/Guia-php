<section class="forgotPasswordView w-100 item_center">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-5 d-none d-md-flex justify-content-center align-items-center">
                <img src="/assets/svg/forgotPassword.svg" class="image_forgot_password" alt="forgot password">
            </div>
            <div class="col-sm-12 col-md-6 col-xl-7 item_center">
                <form method="post">
                    <h4 class="custom_dark"><?= FORGOT_YOUR_PASSWORD ?></h4>
                    <p class="text-secondary"><?= ENTER_YOUR_EMAIL ?></p>

                    <input type="email" name="email" id="email" placeholder="<?= PLACEHOLDER_EMAIL_ADDRESS ?>" class="form-control custom_focus text-secondary custom_placeholder mb-3">

                    <button class="btn btn-primary w-100"><?= SEND_RESET_LINK ?></button>
                </form>
            </div>
        </div>
    </div>
</section>