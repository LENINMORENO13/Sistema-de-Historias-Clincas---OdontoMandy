<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Casos Clínicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Public/Css/disenioFiltro.css">
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Filtro de busqueda Casos Clínicos</h2>

        <!-- Formulario de búsqueda -->
        <form method="get" action="<?= site_url('CasosPacientes') ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="buscar_paciente">Nombre o Apellido del Paciente</label>
                        <input type="text" id="buscar_paciente" name="buscar_paciente" class="form-control" placeholder="Ingresa nombre o apellido">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estado">Estado del Caso</label>
                        <select id="estado" name="estado" class="form-control">
                            <option value="">Seleccione un estado</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="En tratamiento">En tratamiento</option>
                            <option value="Finalizado">Finalizado</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Buscar</button>
        </form>

        <!-- Mostrar mensaje de error si no se encuentran resultados -->
        <?php if (isset($mensaje_error)): ?>
        <div class="alert alert-warning mt-5"><?= $mensaje_error ?></div>
        <?php endif; ?>

        <!-- Mostrar resultados -->
        <?php if (!empty($casosPacientes)): ?>
        <h3 class="mt-5">Resultados de la Búsqueda</h3>
        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID Paciente</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Descripción</th>
                    <th>Diagnóstico</th>
                    <th>Tratamiento</th>
                    <th>Fecha de Consulta</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($casosPacientes as $caso): ?>
                <tr>
                    <td><?= esc($caso->id_paciente) ?></td>
                    <td><?= esc($caso->pa_nombres) ?></td>
                    <td><?= esc($caso->pa_apellidos) ?></td>
                    <td><?= esc($caso->pa_telefono) ?></td>
                    <td><?= esc($caso->cc_descripcion) ?></td>
                    <td><?= esc($caso->cc_diagnostico) ?></td>
                    <td><?= esc($caso->cc_tratamiento) ?></td>
                    <td><?= esc($caso->cc_fecha_consulta) ?></td>
                    <td><?= esc($caso->cc_estado) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
