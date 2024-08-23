<?php require ROOT_COMPONENTS . "public/header.php"; ?>

<section id="contactView">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-7 p-3">
                <h1 class="fw-semibold mb-1">Contate-nos</h1>
                <div class="divider-lg"></div>
                <p class="text-secondary mt-4">Você pode entrar em contato conosco da maneira que for conveniente para você. Estamos disponíveis 24/7 via fax ou e-mail.
                    Você também pode usar um formulário de contato rápido abaixo ou visitar nosso salão pessoalmente.</p>


                <form id="contactForm" method="post" action="/contato" class="row mt-5">
                    <div class="col-12 col-sm-6 mb-4">
                        <input type="text" class="form-control form-control-lg rounded-4" name="name" placeholder="Nome">
                    </div>

                    <div class="col-12 col-sm-6 mb-4">
                        <input type="text" class="form-control form-control-lg rounded-4" name="lastName" placeholder="Sobrenome">
                    </div>

                    <div class="col-12 col-sm-6 mb-4">
                        <input type="number" class="form-control form-control-lg rounded-4" name="phone" placeholder="Telefone">
                    </div>

                    <div class="col-12 col-sm-6 mb-4">
                        <input type="email" class="form-control form-control-lg rounded-4" name="email" placeholder="E-mail">
                    </div>

                    <div class="col-12 mb-4">
                        <textarea class="form-control form-control-lg rounded-4" name="message" rows="5"></textarea>
                    </div>

                    <div class="col-12" id="contactInvalidMessage"></div>

                    <div class="col-12 mb-4">
                        <button type="submit" id="btn_submit_contact" class="btn btn-brand rounded-4 fw-semibold">
                            ENVIAR MENSAGEM <i class="fa-regular fa-paper-plane ms-1"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-4 col-lg-5 p-3 d-flex flex-column justify-content-center">
                <h5 class="mb-4">Endereço</h5>
                <p class="text-secondary">
                    <i class="fa-solid fa-location-dot text-brand me-1 fs-5"></i>
                    Nivaldo Bertolo, 542, Parque Santo Antonio, Agudos, SP
                </p>

                <hr class="text-secondary">

                <h5 class="mb-4">Telefone</h5>
                <a href="#" class="text-secondary d-flex align-items-center link_outline_none">
                    <i class="fa-brands fa-whatsapp text-brand me-2 fs-5"></i>
                    14 99101-7725
                </a>

                <hr class="text-secondary">

                <h5 class="mb-4">E-mail</h5>
                <p class="text-secondary d-flex align-items-center">
                    <i class="fa-regular fa-envelope text-brand me-2 fs-5"></i>
                    teste@gmail.com
                </p>
            </div> 
        </div>
    </div>
</section>

<?php require ROOT_COMPONENTS . "public/footer.php"; ?>