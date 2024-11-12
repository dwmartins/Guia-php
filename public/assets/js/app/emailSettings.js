$(document).ready(function() {
    const btnSwitch = $(".switch");
    const formFieldset = $("#formFieldset");
    const formActive = btnSwitch.prop('checked');
    const filedEmailStatus = $('.emailStatus');
    
    formFieldset.find(':input').not('#btnSave, #emailActive').prop('disabled', !formActive);
    $("#btnSave").prop('disabled', false);

    btnSwitch.on('change', function(event) {
        const isChecked = btnSwitch.prop('checked');

        formFieldset.find(':input').not('#btnSave, #emailActive').prop('disabled', !isChecked);

        $("#btnSave").prop('disabled', false);
        updateEmailStatus(isChecked);
    });

    $("#formEmailSettings").on('submit', function(event) {
        showLoadingState("#btnSave", true);
    });

    function updateEmailStatus(isChecked) {
        if (isChecked) {
            filedEmailStatus.text(STATUS_EMAIL_ACTIVE);
        } else {
            filedEmailStatus.text(STATUS_EMAIL_INACTIVE);
        }
    }
});
