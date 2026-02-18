<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - OdontoMandy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= base_url('public/css/VistaRegistro.css') ?>">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
</head>

<body>

    <div class="register-container">
        <div class="register-card">
            <div class="register-content">
                <div class="register-header">
                    <div class="logo-container">
                        <div class="logo-wrapper">
                            <div class="logo-background">
                                <img src="https://cdn-icons-png.flaticon.com/512/3004/3004458.png"
                                     class="logo-img"
                                     alt="Logo Dental"
                                     onerror="this.style.display='none'; this.parentElement.innerHTML='<i class=\'bi bi-tooth-fill\' style=\'font-size: 2rem; color: #0d6efd;\'></i>'">
                            </div>
                        </div>
                        <h3 class="fw-bold text-dark mb-1" style="font-size: 1.5rem;">Dental Manager</h3>
                        <div class="welcome-message">
                            <span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1 rounded-pill" style="font-size: 0.75rem;">
                                <i class="bi bi-person-plus me-1"></i>Nuevo usuario
                            </span>
                        </div>
                    </div>
                </div>

                <div class="register-body">
                    <!-- Mostrar errores desde PHP -->
                    <?php if ($error = session()->getFlashdata('error')): ?>
                        <div class="alert-custom d-flex align-items-center p-2 mb-3" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2 fs-6 text-danger"></i>
                            <div class="small"><?= $error ?></div>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/guardarUsuario') ?>" method="post" class="needs-validation" novalidate>
                        <?= csrf_field() ?>
                        
                        <div class="mb-3">
                            <label for="correo" class="form-label small fw-bold text-secondary mb-2">
                                <i class="bi bi-envelope me-1"></i>CORREO ELECTRÓNICO
                            </label>
                            <div class="input-with-icon">
                                <i class="bi bi-envelope"></i>
                                <input type="email" class="form-control" id="correo" name="correo" 
                                    placeholder="ejemplo@consultorio.com" required>
                            </div>
                            <div class="invalid-feedback small">Correo electrónico válido es requerido.</div>
                        </div>

                        <div class="mb-3">
                            <label for="contrasena" class="form-label small fw-bold text-secondary mb-2">
                                <i class="bi bi-key me-1"></i>CONTRASEÑA
                            </label>
                            <div class="password-container">
                                <input type="password" class="form-control" id="contrasena" name="contrasena" 
                                    placeholder="••••••••" required minlength="6">
                                <button type="button" class="toggle-password" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback small">Mínimo 6 caracteres requeridos.</div>
                        </div>

                        <div class="mb-3">
                            <label for="rol" class="form-label small fw-bold text-secondary mb-2">
                                <i class="bi bi-person-badge me-1"></i>ROL DEL USUARIO
                            </label>
                            <div class="input-with-icon">
                                <i class="bi bi-person-check"></i>
                                <select name="rol" id="rol" class="form-select" required>
                                    <option value="">Seleccione un rol</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Doctor">Doctor</option>
                                </select>
                            </div>
                            <div class="invalid-feedback small">Debe seleccionar un rol.</div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-register">
                                <i class="bi bi-person-plus me-2"></i>
                                REGISTRAR USUARIO
                                <span class="spinner-border spinner-border-sm ms-2 d-none" id="loadingSpinner"></span>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="register-footer">
                    <div class="text-center mt-4 pt-3 border-top">
                        <span class="text-muted small">¿Ya tienes una cuenta?</span>
                        <a href="<?= base_url('/') ?>"
                           class="text-primary small fw-bold text-decoration-none ms-1">
                            Iniciar sesión
                        </a>
                    </div>

                    <div class="security-footer">
                        <div class="row text-center">
                            <div class="col-6">
                                <small class="text-muted">
                                    <i class="bi bi-shield-check text-success me-1"></i>
                                    Sistema seguro
                                </small>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">
                                    <i class="bi bi-heart-pulse text-danger me-1"></i>
                                    Salud dental
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="system-version">
        <small>OdontoMandy v1.0</small>
    </div>

    <!-- SweetAlert2 - Mostrar alertas desde PHP -->
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle Password
            const toggleBtn = document.getElementById('togglePassword');
            const pwdInput = document.getElementById('contrasena');
            if (toggleBtn && pwdInput) {
                toggleBtn.addEventListener('click', function() {
                    const type = pwdInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    pwdInput.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('bi-eye');
                    this.querySelector('i').classList.toggle('bi-eye-slash');
                });
            }

            // Validación y Loading
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        const btn = form.querySelector('.btn-register');
                        const spinner = document.getElementById('loadingSpinner');
                        if (btn && spinner) {
                            btn.disabled = true;
                            spinner.classList.remove('d-none');
                        }
                    }
                    form.classList.add('was-validated');
                }, false);
            });

            // Auto-focus en el primer campo
            const emailInput = document.getElementById('correo');
            if(emailInput) setTimeout(() => emailInput.focus(), 300);
        });
    </script>

</body>

</html>
