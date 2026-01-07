<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Resumen Historial Clínico - Paciente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('public/css/resumen_historial_paciente.css') ?>">
</head>

<body>

    <header class="header-app">
        <div class="container d-flex align-items-center justify-content-center justify-content-md-start">
            <i class="bi bi-tooth fs-3 me-2"></i>
            <h1 class="h4 m-0 fw-bold">OdontoMandy</h1>
        </div>
    </header>

    <div class="container mb-5">
        
        <?php if (session()->getFlashdata('mensaje_exito')): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('mensaje_exito'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card card-custom mb-4">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-7 mb-3 mb-md-0">
                        <small class="text-uppercase text-muted fw-bold label-small">Expediente Médico</small>
                        <h2 class="fw-bold text-primary mb-1">
                            <?= htmlspecialchars($datosPaciente->nombres_apellidos) ?>
                        </h2>
                        <div class="d-flex align-items-center mt-2">
                            <span class="badge bg-light text-dark border me-2">
                                ID: <?= htmlspecialchars($datosPaciente->id) ?>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-5 text-md-end d-flex flex-column flex-md-row justify-content-end gap-2">
                        <a href="<?= base_url('SelectCasos') ?>" class="btn btn-outline-secondary btn-action">
                            <i class="bi bi-arrow-left me-1"></i> Volver
                        </a>
                        
                        <?php if (!empty($historial)): ?>
                            <a href="<?= base_url('MostrarCD/' . $datosPaciente->id) ?>" class="btn btn-primary btn-action shadow-sm">
                                <i class="bi bi-plus-lg me-1"></i> Nuevo Historial
                            </a>
                        <?php else: ?>
                            <a href="<?= base_url('MostrarCD/' . $datosPaciente->id) ?>" class="btn btn-primary btn-action shadow-sm">
                                <i class="bi bi-plus-lg me-1"></i> Primer Registro
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if (!empty($historial)): ?>
            <div class="card card-custom overflow-hidden">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="m-0 fw-bold text-gray-800"><i class="bi bi-journal-medical me-2 text-primary"></i>Detalle de Consultas</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-custom mb-0">
                        <thead>
                            <tr>
                                <th width="25%">Diagnóstico</th>
                                <th width="25%">Tratamiento</th>
                                <th width="25%">Indicaciones</th>
                                <th width="15%">Fecha</th>
                                <th width="10%">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($historial as $detalle): ?>
                                <?php 
                                    // Lógica de colores para Activo/Inactivo
                                    $esActivo = (strtolower($detalle->estado) == 'activo'); 
                                ?>
                                <tr class="<?= !$esActivo ? 'row-inactive' : '' ?>"> <td class="fw-medium text-dark">
                                        <?= htmlspecialchars($detalle->diagnostico) ?>
                                    </td>
                                    <td><?= htmlspecialchars($detalle->tratamiento) ?></td>
                                    <td class="small fst-italic text-muted"><?= htmlspecialchars($detalle->indicaciones) ?></td>
                                    <td>
                                        <div class="d-flex align-items-center text-nowrap">
                                            <i class="bi bi-calendar3 me-2 text-muted"></i>
                                            <?= htmlspecialchars($detalle->fecha_del_registro) ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if ($esActivo): ?>
                                            <span class="badge bg-success bg-opacity-10 text-success border border-success badge-status d-inline-flex align-items-center">
                                                <i class="bi bi-check-circle-fill me-1"></i> Activo
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger badge-status d-inline-flex align-items-center">
                                                <i class="bi bi-x-circle-fill me-1"></i> Inactivo
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-5 mt-4 card card-custom border-dashed">
                <div class="mb-3">
                    <i class="bi bi-folder-plus display-1 text-primary opacity-25"></i>
                </div>
                <h4 class="text-muted fw-bold">No hay historial clínico registrado</h4>
                <p class="text-secondary mb-4">Comienza agregando el primer diagnóstico para este paciente.</p>
                
                <a href="<?= base_url('MostrarCD/' . $datosPaciente->id) ?>" class="btn btn-primary btn-action px-4 shadow-sm">
                    <i class="bi bi-plus-lg me-2"></i> Crear Primer Registro
                </a>
            </div>
        <?php endif; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const alerta = document.querySelector('.alert');
        if (alerta) {
            setTimeout(() => {
                const bsAlert = new bootstrap.Alert(alerta);
                bsAlert.close();
            }, 3000);
        }
    </script>
</body>
</html>