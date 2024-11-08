$(document).ready(function () {

    // Check for an alert
    if (localStorage.getItem('alert')) {
        const alert = JSON.parse(localStorage.getItem('alert'));
        showAlert(alert.type, alert.message);
        localStorage.removeItem('alert');
    }

    // Remove the spinner from the page when it finishes loading
    $('#spinnerLoadPage').css('display', 'none');

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
});

// Function to show or hide the button loading state
function showLoadingState(button, isLoading, label = SAVE, labelWait = WAIT) {
    const spinnerHTML = `
        <div id="spinnerLoading" class="item_center gap-2">
            <div class="spinner-border" role="status"></div>
            <p class="m-0">${WAIT}</p>
        </div>
    `;

    $(button).prop('disabled', isLoading).html(isLoading ? spinnerHTML : label);
}


