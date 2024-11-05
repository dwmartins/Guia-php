$(document).ready(function() {
    const formLogin = document.getElementById('formLogin');

    if(formLogin) {
        formLogin.addEventListener('submit', function(event) {
            let isValid = true;

            const fields = document.querySelectorAll('#formLogin input');

            fields.forEach(function(field) {
                const value = field.value.trim();

                if(!value) {
                    isValid = false;
                    $(field).addClass('field_invalid');
                }
            });

            if(!isValid) {
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
});