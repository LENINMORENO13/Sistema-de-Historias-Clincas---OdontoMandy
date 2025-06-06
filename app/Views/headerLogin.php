<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Fondo para el header */
        body{
            background-image: url('https://img.freepik.com/vector-premium/cuidado-dental-lindo-diente-patrones-fisuras-fondo-dentista_513640-1155.jpg?semt=ais_hybrid');
        }
        .header-bg {
            background-color: #343a40;
            color: white;
            padding: 4px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        /* Estilo para la imagen del login */
        .login-image {
            width: 150px;           /* Tamaño pequeño de la imagen (puedes ajustarlo como desees) */
            height: 150px;           /* Mantiene la relación de aspecto */
            margin-bottom: 20px;    /* Espacio entre la imagen y el formulario */
            display: block;         /* Centra la imagen */
            margin-left: auto;
            margin-right: auto;
        }

        /* Logo del header */
        .header-logo img {
            max-height: 100px;
        }

        /* Contenedor de texto del header */
        .header-text {
            text-align: center;
        }

        /* Título del header */
        .header-text h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .container-login {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 75vh;
            background-color: #f7f7f7;
        }

        .card {
            width: 100%;
            max-width: 500px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: 1.5em 1.5em;
            padding: 10px;
            text-align: center;
        }

        .card-body {
            padding: 3rem;
        }

        .card-title {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Estilo para mensajes de error */
        .invalid-feedback {
            display: block;
            font-size: 0.875rem;
            color: #dc3545;
        }
    </style>
</head>

<body>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

    <header class="header-bg">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-3 header-logo">
                    <a href="">
                        <img src="O.MANDY.png" alt="Logo">
                    </a>
                </div>

                <div class="col-md-8 header-text">
                    <h1>Bienvenido al Sistema Odontológico</h1>
                    <p class="lead">Por favor ingresa tus datos para acceder</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container-login">
        <div class="card">

            <div class="card-body">
                <img src="odontomandy.png" alt="Login Image" class="login-image">   
                <h5 class="card-title">Iniciar Sesión</h5>
                <form action="<?= base_url('login/verificacionlogin') ?>" method="post">
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                        <div class="invalid-feedback">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
