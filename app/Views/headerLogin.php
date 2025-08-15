<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Iniciar Sesión - Sistema Odontológico</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        /* Estilos generales y fondo */
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://www.neosalut.com/wp-content/uploads/image-65.jpeg') no-repeat center center fixed;
            background-size: cover;
            color: #003366;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.45);
            z-index: 0;
        }

        /* Contenedor principal */
        .login-container {
            position: relative;
            z-index: 1;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            text-align: center;
        }

        /* Caja del formulario */
        .login-box {
            background-color: rgba(255, 255, 255, 0.95); 
            border-radius: 15px;
            padding: 3rem 3.5rem;
            max-width: 420px;
            width: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3); 
        }

        /* Títulos */
        .login-box h2 {
            font-weight: 700;
            color: #003366;
            margin-bottom: 0.5rem;
        }
        .login-box h2:first-of-type {
            font-size: 1.5rem;
            opacity: 0.7;
        }

        .login-box h2:last-of-type {
            font-size: 2.2rem;
            margin-bottom: 1.5rem;
        }

        .login-box p.lead {
            color: #007bff;
            margin-bottom: 2.5rem;
            font-size: 1rem;
        }

        /* Inputs con iconos */
        .input-group-custom {
            margin-bottom: 1.5rem;
        }

        .input-group-custom .input-group-text {
            background-color: #f8f9fa;
            border-right: none;
            border-color: #007bff;
            color: #007bff;
            border-radius: 10px 0 0 10px;
        }

        input.form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
            border-color: #007bff;
            padding: 12px 14px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input.form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.25);
            outline: none;
        }
        
        .password-toggle {
            background-color: #f8f9fa;
            border-color: #007bff;
            border-left: none;
            color: #007bff;
            cursor: pointer;
            border-radius: 0 10px 10px 0;
            padding: 0.75rem;
        }

        /* Botón */
        button.btn-primary {
            background-color: #007bff;
            border: none;
            font-weight: 700;
            width: 100%;
            padding: 14px 0;
            font-size: 1.2rem;
            border-radius: 12px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.2);
        }

        button.btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.3);
        }

        /* Mensajes de error */
        .invalid-feedback {
            display: block;
            font-size: 0.9rem;
            color: #dc3545;
            text-align: left;
            margin-top: -1rem; /* Ajustar el margen para que no ocupe tanto espacio */
            margin-bottom: 1.5rem;
        }
        
        /* Oculta los mensajes de error por defecto */
        .form-control:invalid ~ .invalid-feedback {
            display: none;
        }
        .form-control.is-invalid ~ .invalid-feedback {
            display: block;
        }
        
        /* Alerta de sesión */
        .alert-dismissible {
            opacity: 0.95;
            border-radius: 8px;
            border-left: 5px solid;
        }
    </style>
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