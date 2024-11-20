<section id="hoveView" class="m-0 p-0">
    <div class="cover-image container-fluid" style="background-image: url('<?= $coverImage ?>');">
        <div class="container-fluid d-flex align-items-center justify-content-center">
            <form action="<?= PATH_LISTAGENS ?>" method="post" id="formSearchHome" class="row justify-content-center gap-2">
                <div class="col-12 mb-4">
                    <h1 class="text-light text-center fw-bolder mb-4"><?= SEARCH_HERE ?></h1>
                    <h3 class="text-light text-center"><?= WHAT_LOOKING ?></h3>
                </div>
                <div class="col-12 col-sm-5 mb-2 p-0 px-3 p-sm-0">
                    <input type="text" name="keywords" id="keywords" class="form-control custom_focus rounded-1 custom_placeholder" placeholder="<?= PLACEHOLDER_SEARCH_LOCATIONS ?>" />
                </div>
                <div class="col-12 col-sm-2 px-3 p-sm-0">
                    <button class="btn btn-primary rounded-1 w-100 fs-6" type="primary"><?= BTN_SEARCH ?></button>
                </div>
            </form>
        </div>
    </div>
</section>
