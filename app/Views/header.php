<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Manager - OdontoMandy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('public/css/header.css') ?>">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <?php 

    $uri = service('uri');
    $page = $uri->getSegment(1); 
    ?>

    <nav class="navbar navbar-expand-xl navbar-dark sticky-top">
        <div class="container-fluid px-lg-4">
            
            <a class="navbar-brand d-flex align-items-center gap-2" href="<?= base_url('Inicio') ?>">
                <div class="brand-icon">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>
                <span class="brand-text d-none d-sm-block">Dental Manager</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-1">

                    <li class="nav-item">
                        <a class="nav-link <?= ($page == 'Inicio' || $page == '') ? 'active' : '' ?>" 
                           href="<?= base_url('Inicio'); ?>">
                            <i class="bi bi-house-door-fill"></i> 
                            <span class="d-xl-none d-xxl-inline">Inicio</span>
                        </a>
                    </li>

                    <li class="nav-item d-none d-xl-block mx-1 opacity-25 text-white">|</li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($page == 'VistaCC') ? 'active' : '' ?>" 
                           href="<?= base_url('VistaCC'); ?>" title="Registrar Caso">
                            <i class="bi bi-plus-circle-fill"></i> Registrar
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($page == 'CasosPacientes') ? 'active' : '' ?>" 
                           href="<?= base_url('CasosPacientes'); ?>" title="Buscar Casos">
                            <i class="bi bi-search"></i> Buscar
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($page == 'SelectCasos') ? 'active' : '' ?>" 
                           href="<?= base_url('SelectCasos'); ?>" title="Revisión Técnica">
                            <i class="bi bi-clipboard-check-fill"></i> Revisar
                        </a>
                    </li>

                    <li class="nav-item d-none d-xl-block mx-1 opacity-25 text-white">|</li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($page == 'reportes') ? 'active' : '' ?>" 
                           href="<?= base_url('reportes/generar_reporte'); ?>">
                            <i class="bi bi-bar-chart-fill"></i> Reportes
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a class="nav-link btn-logout" href="<?= base_url('/'); ?>">
                            <i class="bi bi-box-arrow-right"></i> Salir
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>