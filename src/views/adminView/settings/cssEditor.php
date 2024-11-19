<section class="cssEditorView w-100">
    <div class="p-3 container">
        <h5 class="custom_dark mb-3"><?= SEO_TITLE_CSS_EDITOR ?></h5>

        <div class="alert alert-info fs-7" role="alert">
            <?= RECOMMENDED_CLEAR_CACHE_MESSAGE ?>
        </div>

        <form action="<?= PATH_ADM_CSS_EDITOR ?>" method="post" id="cssEditorForm">
            <div class="border">
                <textarea id="codeEditor" name="codeEditor" class="border"><?= $css_editor ?></textarea>
            </div>

            <div class="d-flex justify-content-end my-3">
                <button class="btn btn-sm btn-primary" type="submit"><?= SAVE_CHANGES ?></button>
            </div>
        </form>
    </div>
</section>

<!-- CodeMirror CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.12/codemirror.min.css">
<!-- Tema eclipse (claro) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.12/theme/eclipse.min.css">

<!-- CodeMirror JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.12/codemirror.min.js"></script>
<!-- Modo CSS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.12/mode/css/css.min.js"></script>

<script src="/assets/js/app/cssEditor.js" defer></script>

