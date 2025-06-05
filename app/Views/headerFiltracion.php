

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Odontológico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="Public/Css/disenioHeader.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Logo con texto -->
            <a class="navbar-brand" href="<?= base_url('Inicio') ?>">
                <img src="https://ccm.org.ec/wp-content/uploads/2021/07/LOGOS-PUCE-PNG-02.png" alt="Logo" style="max-height: 40px;">
                Sistema Odontológico
            </a>

            <!-- Botón de navegación para dispositivos móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url('VistaCC') ?>">
                            <i class="bi bi-plus-circle"></i> Añadir nuevo Caso clínico
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url('CasosPacientes') ?>">
                            <i class="bi bi-search"></i> Búsqueda de caso por filtro
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url('SelectCasos') ?>">
                            <i class="bi bi-search"></i> Revisar casos clínicos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url('InsertPaciente') ?>">
                            <i class="bi bi-person-plus"></i> Insertar paciente
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?= base_url('Select') ?>">
                            <i class="bi bi-list"></i> Listado de pacientes
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-4">
        <!-- Aquí se agrega el contenido dinámico -->
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
