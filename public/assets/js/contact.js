$(document).ready(function() {
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
                name: "Nome",
                lastName: "Sobrenome",
                email: "E-mail",
                company: "Empresa",
                description: "Descrição"
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
                showAlert('error', "Preencha todos os campos obrigatórios");
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
})
