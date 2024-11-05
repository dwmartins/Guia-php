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

    //Update Image user
    const currentUserImg = $('#current_user_photo').attr('src');
    const btnSaveImg = $('#userPanelView #btn_cancel_img');
    const btnCancelImg = $('#userPanelView #btn_cancel_img');

    $('#userPanelView .options').addClass('d-none');

    $('#new_img').on('change', async function() {
        let file = this.files[0];

        if(!file) return;

        let compressImage = false;

        const response = await $.ajax({
            url: '/settings?name=compressImage',
            method: 'GET',
            dataType: 'json'
        });

        compressImage = response.value === "on";

        if(compressImage) {
            file = await handleImageUpload(file);
        }

        const reader = new FileReader();

        reader.onload = function(e) {
            $('#current_user_photo').attr('src', e.target.result);
        }

        reader.readAsDataURL(file);
        $('#userPanelView .options').removeClass('d-none');
    });

    btnCancelImg.on('click', function() {
        $('#userPanelView .options').addClass('d-none');
        $('#current_user_photo').attr('src', currentUserImg);
    });

    btnSaveImg.on('click', async function() {
        const newImg = $('#new_img')[0];

        let formData = new FormData();
        formData.append('userPhoto', newImg.files[0]);

        const response = await $.ajax({
            url: '/user/update-image',
            method: 'POST',
            data: formData 
        });
    })
});


