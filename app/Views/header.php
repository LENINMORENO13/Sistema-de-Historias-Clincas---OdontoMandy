<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Odontológico OdontoMandy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Estilos generales del cuerpo para asegurar el layout full-height */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar personalizado */
        .navbar {
            background-color: #007bff !important; 
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); 
            padding: 0.8rem 1.5rem; 
        }

        .navbar-brand {
            display: flex; 
            align-items: center;
            font-weight: 600; 
            font-size: 1.35rem; 
            color: #ffffff !important; 
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: #e0f0ff !important; 
        }

        .navbar-brand img {
            height: 40px; 
            margin-right: 12px; 
            border-radius: 50%; 
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.3); 
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.3); /* Borde más claro para el botón del toggle */
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Estilos para los elementos de navegación */
        .navbar-nav .nav-item {
            margin-left: 15px; 
        }

        .navbar-nav .nav-link {
            color: #ffffff !important; 
            font-weight: 500; 
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.2s ease;
            display: flex; 
            align-items: center;
            gap: 8px; 
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active { /* Estilo para el enlace activo */
            background-color: rgba(255, 255, 255, 0.2); /* Fondo ligeramente transparente al pasar el mouse/activo */
            color: #ffffff !important;
            transform: translateY(-2px); /* Pequeño efecto de elevación */
        }

        .navbar-nav .nav-link i {
            font-size: 1.1em; 
        }

        /* Contenido principal */
        .main-content {
            flex-grow: 1; /* Permite que el contenido crezca y empuje el footer hacia abajo */
            padding: 20px;
        }

        /* Media queries para responsividad */
        @media (max-width: 991.98px) {
            .navbar {
                padding: 0.5rem 1rem;
            }
            .navbar-brand {
                font-size: 1.2rem;
            }
            .navbar-brand img {
                height: 35px;
                margin-right: 10px;
            }
            .navbar-nav .nav-item {
                margin-left: 0; /* Eliminar margen horizontal en móviles */
                border-bottom: 1px solid rgba(255, 255, 255, 0.1); 
            }
            .navbar-nav .nav-link {
                padding: 0.75rem 1.5rem; 
                justify-content: flex-start; 
            }
            .navbar-collapse {
                background-color: #0069d9; 
                border-radius: 0 0 10px 10px;
                margin-top: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            }
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('Inicio') ?>">
                <img src="<?= base_url('O.MANDY.png') ?>" alt="Logo OdontoMandy">
                OdontoMandy | Sistema Clínico
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Inicio'); ?>">
                            <i class="bi bi-house-door-fill"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('VistaCC'); ?>">
                            <i class="bi bi-journal-plus"></i> Registrar Caso
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('CasosPacientes'); ?>">
                            <i class="bi bi-search"></i> Buscar Casos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('SelectCasos'); ?>">
                            <i class="bi bi-journal-check"></i> Revisar Casos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/'); ?>">
                            <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4 main-content">
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>