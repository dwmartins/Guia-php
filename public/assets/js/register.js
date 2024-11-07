$(document).ready(function() {
    //Check for registration attempt data
    const urlParams = new URLSearchParams(window.location.search);

    if(urlParams) {
        urlParams.forEach((value, key) => {
            if(value && key !== "password") {
                const inputFiled = $(`input[name="${key}"]`);

                if(inputFiled.length) {
                    inputFiled.val(value);
                }
            }
        });
    }

    const formRegister = $('#formRegister');
    const password = $("#password");

    formRegister.on('submit', function(event) {
        const fields = $('#formRegister input');
        let isValid = true;
        let fieldsValid = true;

        const fieldLabels = {
            name: LABEL_NAME,
            lastName: LABEL_LAST_NAME,
            email: LABEL_EMAIL,
            password: LABEL_PASSWORD
        }

        for (let label in fieldLabels) {
            const field = formRegister.find(`[name="${label}"]`);
            const value = field.val().trim();

            if(!value) {
                isValid = false;
                $(field).addClass('field_invalid');

            } else if(!validString(value)) {
                const errorMessage = FIELD_INVALID.replace('{field}', fieldLabels[label]);
                showAlert('error', errorMessage);
                $(field).addClass('field_invalid');
                fieldsValid = false;

            } else {
                $(field).removeClass('field_invalid');
            }
        }

        if(password.val().length < 4) {
            showAlert('error', PASSWORD_MIN_LENGTH_REQUIREMENT);
            event.preventDefault();
            return;
        }

        if(!fieldsValid) {
            event.preventDefault();
            return;
        }

        if(!isValid) {
            showAlert('error', ALL_FIELDS_INVALID);
            event.preventDefault();
            return;
        }

        $('#formRegister button').empty();
        $('#formRegister button').html(`
            <div id="spinnerLoading" class="item_center gap-2">
                <div class="spinner-border" role="status"></div>
                <p class="m-0">${WAIT}</p>
            </div>
        `).prop('disabled', true);
    });

    $('#formRegister input').on('input', function () {
        $(this).removeClass('field_invalid');
    });

    $('#formRegister input').on('blur', function () {
        const value = $(this).val().trim();
        if (!value) {
            $(this).addClass('field_invalid');
        }
    });
})