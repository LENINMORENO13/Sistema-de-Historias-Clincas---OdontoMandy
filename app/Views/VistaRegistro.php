<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Nuevo Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= base_url('public/css/VistaRegistro.css') ?>">
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
</head>

<body>

    <div class="register-container">
        <h3 class="text-center">Registro de Nuevo Usuario</h3>

        <form action="<?= base_url('admin/guardarUsuario') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol del Usuario</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <select name="rol" id="rol" class="form-select" required>
                        <option value="">Seleccione un rol</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Doctor">Doctor</option>
                    </select>
                </div>
            </div>
            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="<?= base_url('/') ?>" class="btn btn-secondary">Volver al Inicio</a>
            </div>
        </form>
        
        <a href="<?= base_url('/') ?>" class="back-to-login mt-4">¿Ya tienes una cuenta? Inicia sesión aquí.</a>
    </div>
    
    <!-- SweetAlert2 - Mostrar alertas desde PHP -->
    <?php if ($error = session()->getFlashdata('error')): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '<?= str_replace(["'", "\n"], ["\\'", " "], $error) ?>',
                    timer: 4000,
                    timerProgressBar: true,
                    showConfirmButton: true,
                    confirmButtonText: 'Entendido'
                });
            });
        </script>
    <?php endif; ?>

    <?php if ($success = session()->getFlashdata('success')): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '<?= str_replace(["'", "\n"], ["\\'", " "], $success) ?>',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            });
        </script>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>  

</body>

</html>
