$(document).ready(function () {

    // Check for an alert
    if (localStorage.getItem('alert')) {
        const alert = JSON.parse(localStorage.getItem('alert'));
        showAlert(alert.type, alert.message);
        localStorage.removeItem('alert');
    }

    // Remove the spinner from the page when it finishes loading
    $('#spinnerLoadPage').css('display', 'none');

    // Validate the loginAdmin form
    const formLoginAdmin = document.getElementById('formLoginAdmin');
    if (formLoginAdmin) {
        formLoginAdmin.addEventListener('submit', function (event) {
            let isValid = true;

            const fields = document.querySelectorAll('#formLoginAdmin input');

            fields.forEach(function (field) {
                const value = field.value.trim();

                if (!value) {
                    isValid = false;
                    $(field).addClass('field_invalid');
                }
            });

            if (!isValid) {
                event.preventDefault();
                showAlert('error', ALL_FIELDS_INVALID);
            } else {
                $('#btnLoginAdmin').empty();
                $('#btnLoginAdmin').html(`
                <div id="spinnerLoading" class="item_center gap-2">
                    <div class="spinner-border" role="status"></div>
                    <p class="m-0">${WAIT}</p>
                </div>
            `).prop('disabled', true);
            }
        });

        $('#loginAdmin input').on('input', function () {
            $(this).removeClass('field_invalid');
        });

        $('#loginAdmin input').on('blur', function () {
            const value = $(this).val().trim();
            if (!value) {
                $(this).addClass('field_invalid');
            }
        });
    }

    // Validate the login form
    const formLogin = document.getElementById('formLogin');
    if (formLogin) {
        formLogin.addEventListener('submit', function (event) {
            let isValid = true;

            const fields = document.querySelectorAll('#formLogin input');

            fields.forEach(function (field) {
                const value = field.value.trim();

                if (!value) {
                    isValid = false;
                    $(field).addClass('field_invalid');
                }
            });

            if (!isValid) {
                event.preventDefault();
                showAlert('error', ALL_FIELDS_INVALID);
            } else {
                $('#btnLogin').empty();
                $('#btnLogin').html(`
                <div id="spinnerLoading" class="item_center gap-2">
                    <div class="spinner-border" role="status"></div>
                    <p class="m-0">${WAIT}</p>
                </div>
            `).prop('disabled', true);
            }
        });

        $('#formLogin input').on('input', function () {
            $(this).removeClass('field_invalid');
        });

        $('#formLogin input').on('blur', function () {
            const value = $(this).val().trim();
            if (!value) {
                $(this).addClass('field_invalid');
            }
        });
    }

    // Validate the search form
    const formSearchHome = document.getElementById('formSearchHome');
    if (formSearchHome) {
        const validFormSearch = (event) => {
            const field = formSearchHome.querySelector('input');

            if (!field.value.trim()) {
                event.preventDefault();
            }
        }

        formSearchHome.addEventListener('submit', validFormSearch);
    }

    function adjustScroll() {
        const menuItems = document.querySelectorAll('#list_menu .list-group-item');
        menuItems.forEach(item => {
            item.addEventListener('click', function (event) {
                if (window.innerWidth <= 992) {
                    event.preventDefault();

                    const targetId = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 100,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    }

    adjustScroll();

    window.addEventListener('resize', function () {
        if (window.innerWidth <= 992) {
            document.querySelectorAll('#list_menu .list-group-item').forEach(item => {
                item.removeEventListener('click', adjustScroll);
            });
        } else {
            adjustScroll();
        }
    });

    // Click event to toggle password visibility and icon
    $('.icon_show_password').on('click', function () {
        var $icon = $(this);
        var $input = $(this).siblings('input');

        if ($input.attr('type') === 'password') {
            $input.attr('type', 'text');
            $icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            $input.attr('type', 'password');
            $icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

    // toggle user profile
    $('[data-toggle]').on('click', function() {
        let targetFormId  = $(this).data('toggle');
        $(`#${targetFormId}`).slideToggle(300);
    })

    // Form contact
    const formContact = $('#formContact');
    if(formContact) {
        const btnSubmit = formContact.find(`button[type="submit"]`);
        const btnSubmitContent = btnSubmit.html();

        $('#formContact textarea').on('input', function () {
            const textarea = $(this);
            const count_msg = $('#formContact .count_msg');

            if(textarea.val().length > 600) {
                textarea.val(textarea.val().substring(0, 600));
            }

            count_msg.text(textarea.val().length);
        });


        formContact.on('submit', function(event) {
            event.preventDefault();

            let isValid = true;

            const fieldLabels = {
                name: LABEL_NAME,
                lastName: LABEL_LAST_NAME,
                email: LABEL_EMAIL,
                company: LABEL_COMPANY,
                description: LABEL_DESCRIPTION
            }

            for (let label in fieldLabels) {
                const field = formContact.find(`[name="${label}"]`);
                const value = field.val().trim();

                if(value && !validString(value)) {
                    const errorMessage = FIELD_INVALID.replace('{field}', fieldLabels[label]);
                    showAlert('error', errorMessage);
                    $(field).addClass('field_invalid');
                    return;
                } else {
                    $(field).removeClass('field_invalid');
                }

                if(!value) {
                    if (label === "company") {
                        continue;
                    }

                    $(field).addClass('field_invalid');
                    isValid = false;
                }
            }

            if(!isValid) {
                showAlert('error', ALL_FIELDS_INVALID);
            } else {
                btnSubmit.prop('disabled', true).html(`
                    <div id="spinnerLoading" class="item_center gap-2">
                        <div class="spinner-border" role="status"></div>
                        <p class="m-0">${WAIT}</p>
                    </div>
                `);

                $.ajax({
                    url: '/contact',
                    method: 'POST',
                    data: formContact.serialize(),
                    success: function(response) {
                        showAlert('success', 'Mensagem enviada com sucesso!');
                        $('#formContact button').prop('disabled', false).text('Enviar');
                        formContact.get(0).reset();
                    },
                    error: function(error) {
                        showError(error);
                        $('#formContact button').prop('disabled', false).text('Enviar');
                    },
                    complete: function() {
                        btnSubmit.prop('disabled', false).html(btnSubmitContent);
                    }
                });
            }
        });
    }

    // Navbar Admin
    if(window.innerWidth <= 768) {
        $('.sidebar').toggleClass('collapsed');
        $('.submenu').hide();
    }

    $('.submenu').hide();

    $('#toggleMenu').click(function() {
        $('.sidebar').toggleClass('collapsed');
        $('.submenu').hide();
    });

    $('#toggleSidebar').click(function() {
        $('.sidebar').toggleClass('collapsed');
        $('.submenu').hide(); 
    });

    $('#toggleContents').click(function() {
        if($('.sidebar').hasClass('collapsed')) {
            $('.sidebar').toggleClass('collapsed');
        }

        $('#submenuContents').toggleClass('open');
        $('#submenuContents').slideToggle(200);
        $('#chevronContents').toggleClass('rotate');
    });

    $('#toggleConfigs').click(function() {
        if($('.sidebar').hasClass('collapsed')) {
            $('.sidebar').toggleClass('collapsed');
        }

        $('#submenuContents').toggleClass('open');
        $('#submenuConfigs').slideToggle(200);
        $('#chevronConfigs').toggleClass('rotate');
    });
});


