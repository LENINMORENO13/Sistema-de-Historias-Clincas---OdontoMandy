<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Nuevo Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Estilos generales y fondo */
        body {
            background: url('https://www.neosalut.com/wp-content/uploads/image-65.jpeg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Capa oscura sobre la imagen de fondo */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.45);
            z-index: -1;
        }

        /* Contenedor principal con efecto de tarjeta */
        .register-container {
            width: 100%;
            max-width: 450px;
            padding: 3rem 2.5rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(5px);
            text-align: center;
        }

        .register-container h3 {
            font-weight: 700;
            color: #003366;
            margin-bottom: 2rem;
        }
        
        /* Estilo de los inputs y select */
        .form-control,
        .form-select {
            border-radius: 8px;
            border-color: #007bff;
            padding: 12px 14px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0056b3;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.25);
            outline: none;
        }

        /* Botón de registro */
        .btn-primary {
            background-color: #007bff;
            border: none;
            font-weight: 600;
            width: 100%;
            padding: 14px 0;
            font-size: 1.1rem;
            border-radius: 10px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.2);
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.3);
        }
        
        /* Botón de volver al inicio */
        .btn-secondary {
            border: 1px solid #6c757d;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background-color: #6c757d;
            color: #fff;
        }

        /* Estilo de los mensajes de alerta */
        .alert {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1050;
            border-radius: 8px;
            opacity: 0.95;
            min-width: 250px;
        }
        
        .back-to-login {
            display: block;
            margin-top: 1.5rem;
            font-size: 0.95rem;
            color: #6c757d;
            text-decoration: none;
        }

        .back-to-login:hover {
            color: #007bff;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger fade show" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                }, 5000);
            });
        });
    </script>   

</body>

</html>