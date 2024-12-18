function showAlert(type, message) {
    const toastContainer = document.getElementById('toastContainer');

    const toastEl = document.createElement('div');
    toastEl.className = 'toast align-items-center border-0';
    toastEl.setAttribute('role', 'alert');
    toastEl.setAttribute('aria-live', 'assertive');
    toastEl.setAttribute('aria-atomic', 'true');

    let iconClass = '';
    let toastClass = 'bg-white';

    switch (type) {
        case 'success':
            iconClass = 'fa-regular fa-circle-check text-success';
            break;
        case 'error':
            iconClass = 'fa-solid fa-circle-exclamation text-danger';
            break;
        case 'info':
            iconClass = 'fa-solid fa-triangle-exclamation text-warning';
            break;
        default:
            break;
    }

    toastEl.classList.add(toastClass);

    toastEl.innerHTML = `
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center gap-2">
                <i class="${iconClass} fs-5"></i>
                <span class="text-secondary-emphasis">${message}</span>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    `;

    toastContainer.appendChild(toastEl);

    const toast = new bootstrap.Toast(toastEl);
    toast.show();

    toastEl.addEventListener('hidden.bs.toast', function () {
        toastEl.remove();
    });
}

function validString(string) {
    const safeCharRegex = /^[A-Za-zÀ-ÖØ-Ýà-öø-ÿ0-9\s,.'\"!?()\-@#&*:+]+$/;
    return safeCharRegex.test(string);
}

function showError(error) {
    console.log('ERROR', error);

    const message = error.responseJSON.message;

    if(message) {
        showAlert('error', message);
        return;
    } 

    showAlert('error', FATAL_ERROR);
}