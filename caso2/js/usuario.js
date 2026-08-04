/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

document.addEventListener('DOMContentLoaded', function () {
    initSolicitudForm();
});

/* Función para la validación de hacer una solicitud */
function initSolicitudForm() {
    const form = document.getElementById('solicitudForm');
    if (!form) {
        return;
    }

    form.addEventListener('submit', function (event) {
        clearValidationErrors(form);
        const nombre = form.querySelector('[name="nombre"]');
        const email = form.querySelector('[name="email"]');
        const telefono = form.querySelector('[name="telefono"]');
        const descripcion = form.querySelector('[name="descripcion"]');
        const errors = [];
        if (!nombre.value.trim()) {
            errors.push({ field: nombre, message: 'El nombre es obligatorio.' });
        }
        if (!email.value.trim() || !isValidEmail(email.value.trim())) {
            errors.push({ field: email, message: 'Ingrese un correo válido.' });
        }
        if (!telefono.value.trim()) {
            errors.push({ field: telefono, message: 'El teléfono es obligatorio.' });
        }
        if (!descripcion.value.trim()) {
            errors.push({ field: descripcion, message: 'La descripción es obligatoria.' });
        }
        if (errors.length > 0) {
            event.preventDefault();
            showValidationErrors(errors);
        }
    });
}

/* Función para validar el correo electrónico */
function isValidEmail(value) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
}

/* Función para mostrar los errores de validación */
function showValidationErrors(errors) {
    errors.forEach(function (error) {
        const field = error.field;
        field.classList.add('input-error');
        const message = document.createElement('div');
        message.className = 'error-message';
        message.textContent = error.message;
        if (field.parentNode) {
            field.parentNode.appendChild(message);
        }
    });
}

/* Función para limpiar los errores */
function clearValidationErrors(form) {
    form.querySelectorAll('.input-error').forEach(function (field) {
        field.classList.remove('input-error');
    });
    form.querySelectorAll('.error-message').forEach(function (message) {
        message.remove();
    });
}