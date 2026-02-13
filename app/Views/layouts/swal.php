<?php
/**
 * SweetAlert2 Helper Functions
 * 
 * Funciones helper para mostrar alertas usando SweetAlert2
 */

/**
 * Mostrar alerta de éxito
 */
function swal_success(string $message, string $title = '¡Éxito!'): string
{
    return "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '" . esc($title) . "',
                text: '" . esc($message) . "',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        });
    </script>";
}

/**
 * Mostrar alerta de error
 */
function swal_error(string $message, string $title = '¡Error!'): string
{
    return "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: '" . esc($title) . "',
                text: '" . esc($message) . "',
                timer: 4000,
                timerProgressBar: true,
                showConfirmButton: true,
                confirmButtonText: 'Entendido',
                toast: true,
                position: 'top-end'
            });
        });
    </script>";
}

/**
 * Mostrar alerta de advertencia
 */
function swal_warning(string $message, string $title = '¡Advertencia!'): string
{
    return "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'warning',
                title: '" . esc($title) . "',
                text: '" . esc($message) . "',
                timer: 3500,
                timerProgressBar: true,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        });
    </script>";
}

/**
 * Mostrar alerta de información
 */
function swal_info(string $message, string $title = 'Información'): string
{
    return "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'info',
                title: '" . esc($title) . "',
                text: '" . esc($message) . "',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        });
    </script>";
}

/**
 * Mostrar confirmación (para delete/acciones críticas)
 */
function swal_confirm(
    string $message = '¿Estás seguro?',
    string $title = '¿Confirmar acción?',
    string $confirmText = 'Sí, continuar',
    string $cancelText = 'Cancelar'
): string {
    return "<script>
        function confirmAction(event, formId) {
            event.preventDefault();
            Swal.fire({
                icon: 'question',
                title: '" . esc($title) . "',
                text: '" . esc($message) . "',
                showCancelButton: true,
                confirmButtonText: '" . esc($confirmText) . "',
                cancelButtonText: '" . esc($cancelText) . "',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>";
}
