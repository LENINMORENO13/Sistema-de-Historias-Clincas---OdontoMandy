<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Caso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="<?= base_url('public/css/VistaActualizarCaso.css') ?>">
</head>

<body>

    <div class="container">
        <h2 class="text-center mb-4">Actualizar Caso</h2>

        <form action="<?php base_url() ?>Actualizado" method="post">
            <input type="hidden" name="VId" value="<?= $VectorDatos[0]->id_casos; ?>">

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" name="VDescripcion" value="<?= $VectorDatos[0]->cc_descripcion ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Diagnóstico</label>
                <input type="text" class="form-control" name="VDiagnostico" value="<?= $VectorDatos[0]->cc_diagnostico ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Tratamiento</label>
                <input type="text" class="form-control" name="VTratamiento" value="<?= $VectorDatos[0]->cc_tratamiento ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha de consulta</label>
                <input type="date" class="form-control" name="VFechaConsulta" value="<?= $VectorDatos[0]->cc_fecha_consulta ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Estado</label>
                <td>
                    <select class="form-control" name="VEstado">
                        <option value="Pendiente" <?= ($VectorDatos[0]->cc_estado == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                        <option value="En tratamiento" <?= ($VectorDatos[0]->cc_estado == 'En tratamiento') ? 'selected' : ''; ?>>En tratamiento</option>
                        <option value="Finalizado" <?= ($VectorDatos[0]->cc_estado == 'Finalizado') ? 'selected' : ''; ?>>Finalizado</option>
                    </select>
                </td>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Actualizar Caso</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>