<section id="contactView" class="container py-4">
    <div class="row my-5">
        <div class="col-12 col-lg-6">
            <h2 class="custom_dark fw-semibold ps-2">Contato</h2>

            <div class="container">
                <form id="formContact" action="/contact" method="post" class="row py-3">
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="name" class="text-secondary mb-2"><span class="text-danger me-1">*</span>Nome</label>
                        <input type="text" name="name" id="name" autocomplete="name" class="form-control custom_focus">
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="lastName" class="text-secondary mb-2"><span class="text-danger me-1">*</span>Sobrenome</label>
                        <input type="text" name="lastName" id="lastName" autocomplete="lastName" class="form-control custom_focus">
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="email" class="text-secondary mb-2"><span class="text-danger me-1">*</span>E-mail</label>
                        <input type="email" name="email" id="email" autocomplete="email" class="form-control custom_focus">
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="company" class="text-secondary mb-2">Empresa</label>
                        <input type="text" name="company" id="company" autocomplete="company" class="form-control custom_focus">
                    </div>
                    <div class="mb-3 col-12 mb-3">
                        <label for="description" class="text-secondary mb-2"><span class="text-danger me-1">*</span>Descrição</label>
                        <textarea name="description" id="description" rows="4" class="form-control custom_focus text-secondary"></textarea>
                        <div class="d-flex justify-content-end mt-1">
                            <p class="fs-8 text-secondary"><span class="count_msg">0</span> / 600</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                        <button type="submit" class="btn btn-outline-primary">Enviar Mensagem<i class="fa-regular fa-paper-plane ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-lg-6 d-none d-lg-flex justify-content-center align-items-center">
            <img src="/assets/svg/contact.svg" alt="">
        </div>
    </div>
</section>

<script src="/assets/js/contact.js" defer></script>