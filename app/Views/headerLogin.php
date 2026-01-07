<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Iniciar Sesión - Sistema Odontológico</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    
    <link rel="stylesheet" href="<?= base_url('public/css/headerLogin.css') ?>">
</head>

<body>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 m-3" style="z-index: 1050;" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <?= session()->getFlashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <main class="login-container" role="main" aria-label="Formulario de inicio de sesión">
        <div class="login-box">
            <h2>Consultorio OdontoMandy</h2>
            <h2 class="mb-2">Iniciar Sesión</h2>
            <p class="lead">Por favor ingresa tus datos para acceder</p>

            <form action="<?= base_url('login/verificacionlogin') ?>" method="post" novalidate>
                <?= csrf_field() ?>

                <div class="input-group input-group-custom">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="email" id="correo" name="correo" class="form-control" required placeholder="Correo electrónico" autocomplete="username" />
                </div>
                <div class="invalid-feedback">
                    Por favor ingrese un correo válido.
                </div>

                <div class="input-group input-group-custom">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" id="contrasena" name="contrasena" class="form-control" required placeholder="Contraseña" autocomplete="current-password" />
                    <button class="btn btn-outline-secondary password-toggle" type="button" id="togglePassword">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                <div class="invalid-feedback">
                    Por favor ingrese su contraseña.
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">Iniciar Sesión</button>
            </form>
            
            <a href="<?= base_url('admin/registrar') ?>" class="register-link">¿No tienes una cuenta? Registra un nuevo usuario aquí.</a>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        (() => {
            'use strict'
            const form = document.querySelector('form');
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('contrasena');

            form.addEventListener('submit', e => {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            togglePassword.addEventListener('click', function (e) {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.querySelector('i').classList.toggle('bi-eye');
                this.querySelector('i').classList.toggle('bi-eye-slash');
            });
        })();
    </script>
</body>

</html>