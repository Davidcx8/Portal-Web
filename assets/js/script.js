/**
 * Script principal para el portal web
 * Incluye validación de formularios y mejoras de UX
 */

document.addEventListener('DOMContentLoaded', function() {
    // Animar elementos al cargar
    animateElements();
    
    // Validación del formulario de contacto
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', validateContactForm);
    }
    
    // Agregar tooltips de Bootstrap si existen
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

/**
 * Animar elementos con clase fade-in
 */
function animateElements() {
    const elements = document.querySelectorAll('.card, .page-title');
    elements.forEach((el, index) => {
        el.classList.add('fade-in');
        el.style.animationDelay = `${index * 0.1}s`;
    });
}

/**
 * Validar formulario de contacto
 * @param {Event} e - Evento de submit
 */
function validateContactForm(e) {
    const form = e.target;
    let isValid = true;
    let errorMessage = '';
    
    // Obtener valores
    const nombre = form.querySelector('#nombre').value.trim();
    const correo = form.querySelector('#correo').value.trim();
    const asunto = form.querySelector('#asunto').value.trim();
    const comentario = form.querySelector('#comentario').value.trim();
    
    // Validar nombre
    if (nombre.length < 3) {
        isValid = false;
        errorMessage += '• El nombre debe tener al menos 3 caracteres\n';
    }
    
    // Validar correo
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(correo)) {
        isValid = false;
        errorMessage += '• Ingrese un correo electrónico válido\n';
    }
    
    // Validar asunto
    if (asunto.length < 5) {
        isValid = false;
        errorMessage += '• El asunto debe tener al menos 5 caracteres\n';
    }
    
    // Validar comentario
    if (comentario.length < 10) {
        isValid = false;
        errorMessage += '• El comentario debe tener al menos 10 caracteres\n';
    }
    
    // Si no es válido, prevenir envío y mostrar errores
    if (!isValid) {
        e.preventDefault();
        showAlert('error', 'Por favor corrija los siguientes errores:\n\n' + errorMessage);
        return false;
    }
    
    return true;
}

/**
 * Mostrar alerta personalizada
 * @param {string} type - Tipo de alerta (success, error, warning)
 * @param {string} message - Mensaje a mostrar
 */
function showAlert(type, message) {
    const alertClass = type === 'success' ? 'alert-success' : 
                      type === 'error' ? 'alert-danger' : 'alert-warning';
    
    const alertHTML = `
        <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
            <strong>${type === 'success' ? '✓' : '✗'}</strong> ${message.replace(/\n/g, '<br>')}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    
    const container = document.querySelector('.container');
    if (container) {
        container.insertAdjacentHTML('afterbegin', alertHTML);
        
        // Scroll to alert
        window.scrollTo({ top: 0, behavior: 'smooth' });
        
        // Auto-remove after 5 seconds
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.remove();
            }
        }, 5000);
    }
}

/**
 * Filtrar tabla en tiempo real
 * @param {string} inputId - ID del input de búsqueda
 * @param {string} tableId - ID de la tabla
 */
function filterTable(inputId, tableId) {
    const input = document.getElementById(inputId);
    const table = document.getElementById(tableId);
    
    if (!input || !table) return;
    
    input.addEventListener('keyup', function() {
        const filter = this.value.toLowerCase();
        const rows = table.getElementsByTagName('tr');
        
        for (let i = 1; i < rows.length; i++) {
            const row = rows[i];
            const cells = row.getElementsByTagName('td');
            let found = false;
            
            for (let j = 0; j < cells.length; j++) {
                const cell = cells[j];
                if (cell.textContent.toLowerCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
            
            row.style.display = found ? '' : 'none';
        }
    });
}

/**
 * Confirmación antes de enviar formulario
 * @param {string} message - Mensaje de confirmación
 */
function confirmSubmit(message) {
    return confirm(message || '¿Está seguro de enviar este formulario?');
}
