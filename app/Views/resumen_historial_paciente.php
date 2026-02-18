<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Resumen Historial Clínico - Paciente | Dental Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('public/css/resumen_historial_paciente.css') ?>">
</head>

<body>

    <header class="header-app">
        <div class="container d-flex align-items-center justify-content-center justify-content-md-start">
            <i class="bi bi-tooth fs-3 me-2"></i>
            <h1 class="h4 m-0 fw-bold">Dental Manager</h1>
        </div>
    </header>

    <div class="container mb-5">
        
        <?php if (session()->getFlashdata('mensaje_exito')): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> <?= session()->getFlashdata('mensaje_exito'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Patient Info Card -->
        <div class="card card-custom mb-4">
            <div class="card-body p-4">
                <div class="patient-info">
                    <div class="row align-items-center">
                        <div class="col-md-7 mb-3 mb-md-0">
                            <small class="text-uppercase text-muted fw-bold label-small">
                                <i class="bi bi-folder2-open me-1"></i> Expediente Médico
                            </small>
                            <h2 class="fw-bold text-primary mb-2 mt-1">
                                <?= htmlspecialchars($datosPaciente->nombres_apellidos) ?>
                            </h2>
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <span class="badge bg-white text-dark border shadow-sm">
                                    <i class="bi bi-hash me-1"></i> ID: <?= htmlspecialchars($datosPaciente->id) ?>
                                </span>
                                <span class="badge bg-white text-dark border shadow-sm">
                                    <i class="bi bi-calendar3 me-1"></i> Registrado
                                </span>
                            </div>
                        </div>

                        <div class="col-md-5 text-md-end">
                            <div class="d-flex flex-column flex-md-row justify-content-md-end gap-2">
                                <a href="<?= base_url('SelectCasos') ?>" class="btn btn-outline-secondary btn-action">
                                    <i class="bi bi-arrow-left"></i> Volver
                                </a>
                                
                                <?php if (!empty($historial)): ?>
                                    <a href="<?= base_url('MostrarCD/' . $datosPaciente->id) ?>" class="btn btn-primary btn-action shadow-sm">
                                        <i class="bi bi-plus-lg"></i> Nuevo Historial
                                    </a>
                                <?php else: ?>
                                    <a href="<?= base_url('MostrarCD/' . $datosPaciente->id) ?>" class="btn btn-primary btn-action shadow-sm">
                                        <i class="bi bi-plus-lg"></i> Primer Registro
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- History Table -->
        <?php if (!empty($historial)): ?>
            <div class="card card-custom overflow-hidden">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="m-0 fw-bold text-gray-800">
                        <i class="bi bi-journal-medical me-2 text-primary"></i>
                        Historial Clínico
                        <span class="badge bg-primary bg-opacity-10 text-primary ms-2 fs-6">
                            <?= count($historial) ?> <?= count($historial) == 1 ? 'registro' : 'registros' ?>
                        </span>
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-custom mb-0">
                        <thead>
                            <tr>
                                <th width="25%"><i class="bi bi-clipboard-pulse me-1"></i> Diagnóstico</th>
                                <th width="25%"><i class="bi bi-bandaid me-1"></i> Tratamiento</th>
                                <th width="25%"><i class="bi bi-chat-text me-1"></i> Indicaciones</th>
                                <th width="15%"><i class="bi bi-calendar3 me-1"></i> Fecha</th>
                                <th width="10%"><i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i> Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($historial as $detalle): ?>
                                <?php 
                                    $esActivo = (strtolower($detalle->estado) == 'activo'); 
                                ?>
                                <tr class="<?= !$esActivo ? 'row-inactive' : '' ?>">
                                    <td class="fw-semibold">
                                        <i class="bi bi-clipboard2-pulse text-primary me-2"></i>
                                        <?= htmlspecialchars($detalle->diagnostico) ?>
                                    </td>
                                    <td>
                                        <i class="bi bi-bandaid text-success me-2"></i>
                                        <?= htmlspecialchars($detalle->tratamiento) ?>
                                    </td>
                                    <td class="small fst-italic text-muted">
                                        <i class="bi bi-chat-text text-secondary me-2"></i>
                                        <?= htmlspecialchars($detalle->indicaciones) ?>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center text-nowrap">
                                            <i class="bi bi-calendar3 me-2 text-muted"></i>
                                            <?= htmlspecialchars($detalle->fecha_del_registro) ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if ($esActivo): ?>
                                            <span class="badge-status bg-success">
                                                <i class="bi bi-check-circle-fill"></i> Activo
                                            </span>
                                        <?php else: ?>
                                            <span class="badge-status bg-danger">
                                                <i class="bi bi-x-circle-fill"></i> Inactivo
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        
        <!-- Empty State -->
        <?php else: ?>
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="bi bi-folder-plus"></i>
                </div>
                <h4 class="text-dark fw-bold mb-2">Sin historial clínico</h4>
                <p class="text-muted mb-4">Comienza agregando el primer diagnóstico para este paciente.</p>
                
                <a href="<?= base_url('MostrarCD/' . $datosPaciente->id) ?>" class="btn btn-primary btn-action px-4 shadow-sm">
                    <i class="bi bi-plus-lg"></i> Crear Primer Registro
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
            }, 4000);
        }
    </script>
</body>

</html>
