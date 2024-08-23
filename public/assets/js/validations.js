function showAlert(type, message) {
    const toastContainer = document.getElementById('toastContainer');

    const toastEl = document.createElement('div');
    toastEl.className = 'toast align-items-center border-0';
    toastEl.setAttribute('role', 'alert');
    toastEl.setAttribute('aria-live', 'assertive');
    toastEl.setAttribute('aria-atomic', 'true');

    let iconClass = '';
    let toastClass = '';

    switch (type) {
        case 'success':
            iconClass = 'fa-regular fa-circle-check';
            toastClass = 'text-bg-success';
            break;
        case 'error':
            iconClass = 'fa-solid fa-circle-exclamation';
            toastClass = 'text-bg-danger';
            break;
        case 'info':
            iconClass = 'fa-solid fa-triangle-exclamation';
            toastClass = 'text-bg-info';
            break;
        default:
            break;
    }

    toastEl.classList.add(toastClass);

    toastEl.innerHTML = `
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center gap-2">
                <i class="${iconClass} fs-5"></i>
                <span>${message}</span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    `;

    toastContainer.appendChild(toastEl);

    const toast = new bootstrap.Toast(toastEl);
    toast.show();

    toastEl.addEventListener('hidden.bs.toast', function () {
        toastEl.remove();
    });
}