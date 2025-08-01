<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Iniciar Sesión - Sistema Odontológico</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        /* Fondo grande con imagen */
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://www.neosalut.com/wp-content/uploads/image-65.jpeg') no-repeat center center fixed;
            background-size: cover;
            color: #003366;
        }

        /* Capa semitransparente para oscurecer un poco el fondo */
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.45);
            z-index: 0;
        }

        /* Contenedor principal centrado */
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
            background-color: rgba(255, 255, 255, 0.92);
            border-radius: 15px;
            padding: 3rem 3.5rem;
            max-width: 420px;
            width: 100%;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        }

        /* Logo arriba */
        .login-logo {
            max-width: 140px;
            margin-bottom: 1.8rem;
        }

        /* Títulos */
        .login-box h2 {
            font-weight: 700;
            margin-bottom: 1rem;
            color: #003366;
        }

        .login-box p.lead {
            color: #007bff;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        /* Labels y inputs */
        label {
            font-weight: 600;
            color: #004080;
            text-align: left;
            display: block;
        }

        input.form-control {
            border-radius: 10px;
            border: 1.5px solid #007bff;
            padding: 12px 14px;
            font-size: 1rem;
            margin-bottom: 1.5rem;
            transition: border-color 0.3s ease;
        }

        input.form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 10px #80bdff;
            outline: none;
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
            transition: background-color 0.3s ease;
        }

        button.btn-primary:hover {
            background-color: #0056b3;
        }

        /* Mensajes de error */
        .invalid-feedback {
            display: block;
            font-size: 0.9rem;
            color: #dc3545;
            margin-top: -1rem;
            margin-bottom: 1rem;
            text-align: left;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-box {
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>

<body>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 m-3" style="z-index: 1050;" role="alert">
            <?= session()->getFlashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <main class="login-container" role="main" aria-label="Formulario de inicio de sesión">
        <img src="O.MANDY.png" alt="Logo Odontológico" class="login-logo" />
        <div class="login-box">
            <h2>Iniciar Sesión</h2>
            <p class="lead">Por favor ingresa tus datos para acceder</p>

            <form action="<?= base_url('login/verificacionlogin') ?>" method="post" novalidate>
                <?= csrf_field() ?>

                <div>
                    <label for="correo">Correo</label>
                    <input type="email" id="correo" name="correo" class="form-control" required />
                    <div class="invalid-feedback">Por favor ingrese un correo válido.</div>
                </div>

                <div>
                    <label for="contrasena">Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" class="form-control" required />
                    <div class="invalid-feedback">Por favor ingrese su contraseña.</div>
                </div>

                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        (() => {
            'use strict'
            const form = document.querySelector('form');
            form.addEventListener('submit', e => {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        })();
    </script>
</body>

</html>
