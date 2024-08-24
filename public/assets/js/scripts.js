$(document).ready(function() {

    // Check for an alert
    if (localStorage.getItem('alert')) {
        const alert = JSON.parse(localStorage.getItem('alert'));
        showAlert(alert.type, alert.message);
        localStorage.removeItem('alert');
    }

    // Remove the spinner from the page when it finishes loading
    $('#spinnerLoadPage').css('display', 'none');

    // Validate the contact form
    const formContact = document.getElementById('contactForm');
    if(formContact) {
        formContact.addEventListener('submit', function(event) {
            let isValid = true;
            const fields = document.querySelectorAll('#contactForm input, #contactForm textarea');
    
            fields.forEach(function(field) {
                const value = field.value.trim();
    
                if(!value) {
                    isValid = false;  
                }
            });
    
            if(!isValid) {
                $('#contactInvalidMessage').empty();
                $('#contactInvalidMessage').prepend('<p class= "text-danger">Preencha os campos! </p>');
    
                event.preventDefault();
    
                setTimeout(function() {
                    $('#contactInvalidMessage').empty()
                }, 3000);
            } else {
                $('#btn_submit_contact').empty();
                $('#btn_submit_contact').prepend('Aguarde...');
            }
        });
    }

    // Validate the loginAdmin form
    const formLoginAdmin = document.getElementById('formLoginAdmin');
    if(formLoginAdmin) {
        formLoginAdmin.addEventListener('submit', function(event) {
            let isValid = true;

            const fields = document.querySelectorAll('#formLoginAdmin input');

            fields.forEach(function(field) {
                const value = field.value.trim();

                if(!value) {
                    isValid = false;
                    console.log(field)
                    $(field).addClass('field_invalid');
                }
            });

            if(!isValid) {
                event.preventDefault();
                showAlert('error', 'Preencha todos os campos obrigatórios');
            } else {
                $('#btnLoginAdmin').empty();
                $('#btnLoginAdmin').prepend('Aguarde...');
            }
        });

        $('#loginAdmin input').on('input', function() {
            $(this).removeClass('field_invalid');
        });

        $('#loginAdmin input').on('blur', function() {
            const value = $(this).val().trim();
            if (!value) {
                $(this).addClass('field_invalid');
            }
        });
    }
});