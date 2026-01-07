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
    <div class="container">
        <h2 class="text-center mb-4"><i class="bi bi-person-lines-fill me-2"></i> Filtro de Búsqueda de Casos Clínicos</h2>

        <div class="form-section">
            <form method="get" action="<?= site_url('CasosPacientes') ?>">
                <div class="row g-4">
                    <div class="col-md-4">
                        <label for="buscar_caso_nombre">Nombre o Apellido del Paciente</label>
                        <input type="text" id="buscar_caso_nombre" name="buscar_caso_nombre" class="form-control" placeholder="Ej: Jorge Rodriguez" value="<?= esc($buscar_caso_nombre ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="buscar_caso_cedula">Cédula del Paciente</label>
                        <input type="text" id="buscar_caso_cedula" name="buscar_caso_cedula" class="form-control" placeholder="Ej: 1234567890" value="<?= esc($buscar_caso_cedula ?? '') ?>" minlength="10" maxlength="10">
                    </div>
                    <div class="col-md-4">
                        <label for="buscar_caso_fecha">Fecha de Registro (Caso)</label> 
                        <input type="date" id="buscar_caso_fecha" name="buscar_caso_fecha" class="form-control" value="<?= esc($buscar_caso_fecha ?? '') ?>">
                    </div>
                </div>
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search me-2"></i> Buscar Casos</button>
                </div>
            </form>
        </div>

        <?php if (isset($mensaje_error)): ?>
            <div class="alert alert-warning mt-4"><i class="bi bi-exclamation-triangle-fill me-2"></i><?= esc($mensaje_error) ?></div>
        <?php endif; ?>

        <?php if (!empty($casosPacientes)): ?>
            <h3 class="mt-5"><i class="bi bi-clipboard2-data-fill me-2"></i>Resultados de la Búsqueda</h3>

            <div class="table-responsive mt-3">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th><i class="bi bi-person-fill me-2"></i>Nombres y Apellidos</th>
                            <th><i class="bi bi-geo-alt-fill me-2"></i>Dirección</th>
                            <th><i class="bi bi-calendar-date-fill me-2"></i>Fecha Nacimiento</th>
                            <th><i class="bi bi-person-fill-up me-2"></i>Edad</th>
                            <th><i class="bi bi-telephone-fill me-2"></i>Teléfono</th>
                            <th><i class="bi bi-file-earmark-person-fill me-2"></i>Cédula</th>
                            <th><i class="bi bi-chat-dots-fill me-2"></i>Motivo de Consulta</th>
                            <th><i class="bi bi-capsule-fill me-2"></i>Ant. Personal 1</th>
                            <th><i class="bi bi-capsule-fill me-2"></i>Ant. Personal 2</th>
                            <th><i class="bi bi-people-fill me-2"></i>Ant. Familiar 1</th>
                            <th><i class="bi bi-people-fill me-2"></i>Ant. Familiar 2</th>
                            <th><i class="bi bi-calendar-check-fill me-2"></i>Fecha de Registro</th>
                            <th><i class="bi bi-eye-fill me-2"></i>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($casosPacientes as $caso): ?>
                            <tr>
                                <td class="text-nowrap"><?= esc($caso->nombres_apellidos) ?></td>
                                <td><?= esc($caso->direccion) ?></td>
                                <td class="text-nowrap"><?= esc($caso->fecha_nacimiento) ?></td>
                                <td><?= calcularEdad($caso->fecha_nacimiento) ?></td>
                                <td class="text-nowrap"><?= esc($caso->telefono) ?></td>
                                <td class="text-nowrap"><?= esc($caso->cedula) ?></td>
                                <td><?= esc($caso->motivo_consulta) ?></td>
                                <td><?= esc($caso->antecedente_personal_1) ?></td>
                                <td><?= esc($caso->antecedente_personal_2) ?></td>
                                <td><?= esc($caso->antecedente_familiar_1) ?></td>
                                <td><?= esc($caso->antecedente_familiar_2) ?></td>
                                <td class="text-nowrap"><?= esc($caso->fecha_registro) ?></td>
                                <td class="px-4 text-center text-nowrap">
                                    <a href="<?= site_url('ResumenHistorial/' . $caso->id) ?>" class="btn btn-sm btn-outline-info" title="Ver Detalles del Caso">
                                        <i class="bi bi-eye"></i> Ver
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="card-list mt-3">
                <?php foreach ($casosPacientes as $caso): ?>
                    <div class="patient-card">
                        <div class="card-title"><i class="bi bi-person-fill me-2"></i><?= esc($caso->nombres_apellidos) ?></div>
                        <div class="card-text-item"><strong>Cédula:</strong> <?= esc($caso->cedula) ?></div>
                        <div class="card-text-item"><strong>Dirección:</strong> <?= esc($caso->direccion) ?></div>
                        <div class="card-text-item"><strong>Fecha de Nacimiento:</strong> <?= esc($caso->fecha_nacimiento) ?></div>
                        <div class="card-text-item"><strong>Edad:</strong> <?= calcularEdad($caso->fecha_nacimiento) ?></div>
                        <div class="card-text-item"><strong>Teléfono:</strong> <?= esc($caso->telefono) ?></div>
                        <div class="card-text-item"><strong>Motivo de Consulta:</strong> <?= esc($caso->motivo_consulta) ?></div>
                        <div class="card-text-item"><strong>Ant. Personal 1:</strong> <?= esc($caso->antecedente_personal_1) ?></div>
                        <div class="card-text-item"><strong>Ant. Personal 2:</strong> <?= esc($caso->antecedente_personal_2) ?></div>
                        <div class="card-text-item"><strong>Ant. Familiar 1:</strong> <?= esc($caso->antecedente_familiar_1) ?></div>
                        <div class="card-text-item"><strong>Ant. Familiar 2:</strong> <?= esc($caso->antecedente_familiar_2) ?></div>
                        <div class="card-text-item"><strong>Fecha de Registro:</strong> <?= esc($caso->fecha_registro) ?></div>
                        <div class="text-end mt-3">
                            <a href="<?= site_url('ResumenHistorial/' . $caso->id) ?>" class="btn btn-sm btn-outline-info" title="Ver Detalles del Caso">
                                <i class="bi bi-eye"></i> Ver Historial
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <?php if (!isset($mensaje_error) && (isset($_GET['buscar_caso_nombre']) || isset($_GET['buscar_caso_cedula']) || isset($_GET['buscar_caso_fecha']))): ?>
                <div class="alert alert-info mt-5 text-center" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>No se encontraron resultados para su búsqueda.
                </div>
            <?php else: ?>
                <div class="alert alert-info mt-5 text-center" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>Utilice los filtros de arriba para buscar casos clínicos.
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>