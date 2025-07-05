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
                    <label for="buscar_caso_nombre">Nombre o Apellido</label>
                    <input type="text" id="buscar_caso_nombre" name="buscar_caso_nombre" class="form-control" placeholder="Ingresa nombre o apellido">
                </div>
                <div class="col-md-6">
                    <label for="buscar_caso_cedula">Cédula</label>
                    <input type="text" id="buscar_caso_cedula" name="buscar_caso_cedula" class="form-control" placeholder="Ingresa cédula">
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
                        <th>Nombres y Apellidos</th>
                        <th>Direccion</th>
                        <th>Fecha de nacimiento</th>
                        <th>Edad</th>
                        <th>Teléfono</th>
                        <th>Cedula</th>
                        <th>Motivo de Consulta</th>
                        <th>Antecedente Personal 1</th>
                        <th>Antecedente Personal 2</th>
                        <th>Antecedente Familiar 1</th>
                        <th>Antecedente Familiar 2</th>
                        <th>Fecha de Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($casosPacientes as $caso): ?>
                        <tr>
                            <td><?= esc($caso->nombres_apellidos) ?></td>
                            <td><?= esc($caso->direccion) ?></td>
                            <td><?= esc($caso->fecha_nacimiento) ?></td>
                            <td><?= esc($caso->edad) ?></td>
                            <td><?= esc($caso->telefono) ?></td>
                            <td><?= esc($caso->cedula) ?></td>
                            <td><?= esc($caso->motivo_consulta) ?></td>
                            <td><?= esc($caso->antecedente_personal_1) ?></td>
                            <td><?= esc($caso->antecedente_personal_2) ?></td>
                            <td><?= esc($caso->antecedente_familiar_1) ?></td>
                            <td><?= esc($caso->antecedente_familiar_2) ?></td>
                            <td><?= esc($caso->fecha_registro) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>