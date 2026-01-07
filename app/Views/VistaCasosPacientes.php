<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Casos Clínicos - OdontoMandy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/css/VistaCasosPacientes.css') ?>">
</head>

<body>
    <?= $this->include('header') ?>

    <div class="container py-4">
        
        <div class="card search-card mb-5">
            <div class="card-body p-4">
                <h4 class="text-primary fw-bold mb-4">
                    <i class="bi bi-search me-2"></i>Buscador de Historial Clínico
                </h4>
                
                <form method="get" action="<?= site_url('CasosPacientes') ?>">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="buscar_caso_nombre" class="form-label">Paciente</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-person"></i></span>
                                <input type="text" id="buscar_caso_nombre" name="buscar_caso_nombre" class="form-control border-start-0 ps-0" 
                                       placeholder="Nombre o Apellido" value="<?= esc($buscar_caso_nombre ?? '') ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="buscar_caso_cedula" class="form-label">Cédula</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-card-heading"></i></span>
                                <input type="text" id="buscar_caso_cedula" name="buscar_caso_cedula" class="form-control border-start-0 ps-0" 
                                       placeholder="Número de Cédula" value="<?= esc($buscar_caso_cedula ?? '') ?>" minlength="10" maxlength="10">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="buscar_caso_fecha" class="form-label">Fecha Registro</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-calendar3"></i></span>
                                <input type="date" id="buscar_caso_fecha" name="buscar_caso_fecha" class="form-control border-start-0 ps-0" 
                                       value="<?= esc($buscar_caso_fecha ?? '') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4 gap-2">
                        <a href="<?= site_url('CasosPacientes') ?>" class="btn btn-light text-muted border">
                            <i class="bi bi-x-lg me-1"></i>Limpiar
                        </a>
                        <button type="submit" class="btn btn-primary px-4 shadow-sm">
                            <i class="bi bi-search me-2"></i>Buscar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <?php if (isset($mensaje_error)): ?>
            <div class="alert alert-warning border-0 shadow-sm d-flex align-items-center mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill fs-4 me-3 text-warning"></i>
                <div><?= esc($mensaje_error) ?></div>
            </div>
        <?php endif; ?>

        <?php if (!empty($casosPacientes)): ?>
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="text-secondary fw-bold"><i class="bi bi-list-check me-2"></i>Resultados Encontrados</h5>
                <span class="badge bg-white text-dark border shadow-sm"><?= count($casosPacientes) ?> registros</span>
            </div>

            <div class="card border-0 shadow-sm overflow-hidden desktop-table rounded-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="py-3 ps-4">Paciente</th>
                                <th class="py-3">Cédula</th>
                                <th class="py-3">Edad / Contacto</th>
                                <th class="py-3">Motivo Consulta</th>
                                <th class="py-3">Fecha</th>
                                <th class="py-3 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($casosPacientes as $caso): ?>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle">
                                                <?= strtoupper(substr($caso->nombres_apellidos, 0, 1)) ?>
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark"><?= esc($caso->nombres_apellidos) ?></div>
                                                <small class="text-muted d-block text-truncate" style="max-width: 150px;">
                                                    <i class="bi bi-geo-alt-fill me-1"></i><?= esc($caso->direccion) ?>
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="font-monospace text-dark"><?= esc($caso->cedula) ?></span></td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-medium"><?= calcularEdad($caso->fecha_nacimiento) ?> años</span>
                                            <small class="text-muted"><i class="bi bi-telephone me-1"></i><?= esc($caso->telefono) ?></small>
                                        </div>
                                    </td>
                                    <td style="max-width: 250px;">
                                        <span class="d-inline-block text-truncate w-100 text-secondary" title="<?= esc($caso->motivo_consulta) ?>">
                                            <?= esc($caso->motivo_consulta) ?>
                                        </span>
                                    </td>
                                    <td><span class="badge bg-light text-secondary border"><?= esc($caso->fecha_registro) ?></span></td>
                                    <td class="text-center">
                                        <a href="<?= site_url('ResumenHistorial/' . $caso->id) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                            Ver Detalles <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mobile-cards">
                <?php foreach ($casosPacientes as $caso): ?>
                    <div class="card card-patient bg-white p-3 mb-3 border-0 shadow-sm rounded-3">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div class="d-flex align-items-center">
                                <div class="avatar-circle-sm me-2"><?= strtoupper(substr($caso->nombres_apellidos, 0, 1)) ?></div>
                                <h6 class="fw-bold text-primary m-0"><?= esc($caso->nombres_apellidos) ?></h6>
                            </div>
                            <span class="badge bg-secondary"><?= calcularEdad($caso->fecha_nacimiento) ?> años</span>
                        </div>
                        
                        <div class="row g-2 mb-3 mt-1">
                            <div class="col-6 text-muted small"><i class="bi bi-card-heading me-1"></i><?= esc($caso->cedula) ?></div>
                            <div class="col-6 text-muted small"><i class="bi bi-telephone me-1"></i><?= esc($caso->telefono) ?></div>
                        </div>

                        <div class="bg-light p-2 rounded mb-3 border-start border-3 border-primary">
                            <small class="fw-bold d-block text-secondary text-uppercase" style="font-size: 0.7rem;">Motivo Consulta</small>
                            <span class="text-dark small"><?= esc($caso->motivo_consulta) ?></span>
                        </div>
                        
                        <details class="mb-3">
                            <summary class="text-primary small fw-bold" style="cursor: pointer;">Ver Antecedentes y Dirección</summary>
                            <div class="mt-2 p-2 bg-light rounded small">
                                <p class="mb-1"><strong><i class="bi bi-geo-alt"></i> Dirección:</strong> <?= esc($caso->direccion) ?></p>
                                <hr class="my-1">
                                <ul class="list-unstyled mb-0">
                                    <li><strong>Personal 1:</strong> <?= esc($caso->antecedente_personal_1) ?></li>
                                    <li><strong>Familiar 1:</strong> <?= esc($caso->antecedente_familiar_1) ?></li>
                                </ul>
                            </div>
                        </details>

                        <div class="d-grid">
                            <a href="<?= site_url('ResumenHistorial/' . $caso->id) ?>" class="btn btn-primary btn-sm">
                                <i class="bi bi-eye-fill me-2"></i>Ver Historial Completo
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php else: ?>
            <div class="text-center py-5 mt-4">
                <div class="mb-3 text-muted opacity-25">
                    <i class="bi bi-search" style="font-size: 4rem;"></i>
                </div>
                <?php if (!isset($mensaje_error) && (isset($_GET['buscar_caso_nombre']) || isset($_GET['buscar_caso_cedula']))): ?>
                    <h4 class="text-muted fw-bold">Sin resultados</h4>
                    <p class="text-secondary">No encontramos pacientes con esos datos. Intenta nuevamente.</p>
                <?php else: ?>
                    <h4 class="text-muted fw-bold">Inicia tu búsqueda</h4>
                    <p class="text-secondary">Utiliza los filtros superiores para encontrar historias clínicas.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>