$(document).ready(function () {

    // Check for an alert
    if (localStorage.getItem('alert')) {
        const alert = JSON.parse(localStorage.getItem('alert'));
        showAlert(alert.type, alert.message);
        localStorage.removeItem('alert');
    }

    // Remove the spinner from the page when it finishes loading
    $('#spinnerLoadPage').css('display', 'none');
});

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
            $('#btnLoginAdmin').prepend(WAIT);
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
if(formSearchHome) {
    const validFormSearch = (event) => {
        const field = formSearchHome.querySelector('input');

        if(!field.value.trim()) {
            event.preventDefault();
        }
    }

    formSearchHome.addEventListener('submit', validFormSearch);
}