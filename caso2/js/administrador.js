document.addEventListener('DOMContentLoaded', function () {
    initDeleteConfirmation();
    initSearchSolicitud();
});

function initDeleteConfirmation() {
    const deleteButtons = document.querySelectorAll('.delete-solicitud');

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            const confirmar = confirm('¿Seguro que deseas eliminar esta solicitud?');
            if (!confirmar) {
                event.preventDefault();
            }
        });
    });
}

function initSearchSolicitud() {
    const searchInput = document.getElementById('searchSolicitud');
    const table = document.getElementById('solicitudesTable');

    if (!searchInput || !table) {
        return;
    }

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.trim().toLowerCase();
        const rows = table.querySelectorAll('tbody tr');

        rows.forEach(function (row) {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(query) ? '' : 'none';
        });
    });
}