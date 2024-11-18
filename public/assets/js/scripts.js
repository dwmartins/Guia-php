$(document).ready(function () {

    // Check for an alert
    if (localStorage.getItem('alert')) {
        const alert = JSON.parse(localStorage.getItem('alert'));
        showAlert(alert.type, alert.message);
        localStorage.removeItem('alert');
    }

    // Remove the spinner from the page when it finishes loading
    $('#spinnerLoadPage').css('display', 'none');

    /**
     * Sidebar toggle
     */
    if ($('.toggle-sidebar-btn').length) {
        $('.toggle-sidebar-btn').on('click', function() {
        $('body').toggleClass('toggle-sidebar');
        });
    }
    
    /**
     * Toggle .header-scrolled class to #header when page is scrolled
     */
    let selectHeader = $('#header');
    if (selectHeader.length) {
        const headerScrolled = () => {
        if ($(window).scrollTop() > 100) {
            selectHeader.addClass('header-scrolled');
        } else {
            selectHeader.removeClass('header-scrolled');
        }
        };
        $(window).on('load scroll', headerScrolled);
    }

    /**
     * Back to top button
     */
    var $backtotop = $('.back-to-top');
    if ($backtotop.length) {
        var toggleBacktotop = function () {
            if ($(window).scrollTop() > 100) {
                $backtotop.addClass('active');
            } else {
                $backtotop.removeClass('active');
            }
        };

        // Call the function on page load and on scroll
        $(window).on('load scroll', toggleBacktotop);
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

    $('.forgotPasswordView form').on('submit', function(e) {
        e.preventDefault();
        const currentTextButton = $('.forgotPasswordView button').text();

        if(!$('.forgotPasswordView #email').val()) {
            showAlert('info', MESSAGE_ADD_YOUR_EMAIL);
            return;
        }

        showLoadingState('.forgotPasswordView button', true);

        $.ajax({
            url: '/reset-password-link',
            method: 'POST',
            data: $('.forgotPasswordView form').serialize(),
            success: function(response) {
                showAlert('success', response.message);
                $('.forgotPasswordView #email').val('');
                showLoadingState('.forgotPasswordView button', false, currentTextButton); 
            },
            error: function(error) {
                showError(error);
                showLoadingState('.forgotPasswordView button', false, currentTextButton); 
            }
        })

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


