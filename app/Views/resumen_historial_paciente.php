<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Resumen Historial Clínico - Paciente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    
    <link rel="stylesheet" href="<?= base_url('public/css/resumen_historial_paciente.css') ?>">
</head>

<body>
    <?php if (session()->getFlashdata('mensaje_exito')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('mensaje_exito'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <header class="header-app">
        <h1><i class="bi bi-tooth"></i> Consultorio Odontológico OdontoMandy</h1>
    </header>

    <div class="container">
        <div class="card-patient-details">
            <h2>Historial Clínico de <?= htmlspecialchars($datosPaciente->nombres_apellidos) ?></h2>
            <p class="text-muted">ID Paciente: <?= htmlspecialchars($datosPaciente->id) ?></p>
        </div>

        <div class="btn-action-group mb-4">
            <a href="<?= base_url('SelectCasos') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left-circle me-2"></i> Volver a la lista de casos</a>
            <?php if (!empty($historial)): ?>
                <a href="<?= base_url('MostrarCD/' . $datosPaciente->id) ?>" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i> Agregar nuevo historial</a>
            <?php else: ?>
                <a href="<?= base_url('MostrarCD/' . $datosPaciente->id) ?>" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i> Agregar primer detalle</a>
            <?php endif; ?>
        </div>

        <?php if (!empty($historial)): ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-custom">
                    <thead class="table-dark">
                        <tr>
                            <th>Diagnóstico</th>
                            <th>Tratamiento</th>
                            <th>Indicaciones</th>
                            <th>Fecha de registro</th>
                            <th>Estado del paciente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($historial as $detalle): ?>
                            <tr>
                                <td><?= htmlspecialchars($detalle->diagnostico) ?></td>
                                <td><?= htmlspecialchars($detalle->tratamiento) ?></td>
                                <td><?= htmlspecialchars($detalle->indicaciones) ?></td>
                                <td><?= htmlspecialchars($detalle->fecha_del_registro) ?></td>
                                <td><?= htmlspecialchars($detalle->estado) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center mt-5" role="alert">
                <i class="bi bi-info-circle-fill me-2"></i> No hay registros en el historial clínico para este paciente.
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var alerta = document.querySelector('.alert');

        if (alerta) {
            setTimeout(function() {
                alerta.style.display = 'none';
            }, 2000);
        }
    </script>
</body>

</html>