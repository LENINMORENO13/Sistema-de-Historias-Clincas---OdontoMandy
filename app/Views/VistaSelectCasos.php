<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casos Clínicos - Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color:rgb(194, 217, 241);
        }

        .container {
            margin-top: 30px;
        }

        h2 {
            color: #495057;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Tabla más ancha y con mejor diseño */
        .table-container {
            max-width: 100%;
            margin: auto;
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #007bff;
            color: white;
            white-space: nowrap;
        }

        /* Diseño de botones */
        .btn-sm {
            margin: 2px;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-warning {
            background-color: #ffcc00;
            border-color: #ffcc00;
            color: #333;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Lista de Casos Clínicos</h2>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th style="display: none;">ID Caso</th>
                        <th style="display: none;">ID Paciente</th>
                        <th>Paciente</th>
                        <th>Descripción</th>
                        <th>Diagnóstico</th>
                        <th>Tratamiento</th>
                        <th>Fecha de Consulta</th>
                        <th>Fecha de Modificacion</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí entra el ciclo foreach para llenar la tabla con los datos de casos clínicos -->
                    <?php foreach ($VectorDatos as $caso): ?>
                        <tr>
                            <td style="display: none;"><?= $caso->id_casos ?></td>
                            <td style="display: none;"><?= $caso->id_paciente ?></td>
                            <td><?= $caso->Paciente ?></td>
                            <td><?= $caso->cc_descripcion ?></td>
                            <td><?= $caso->cc_diagnostico ?></td>
                            <td><?= $caso->cc_tratamiento ?></td>
                            <td><?= $caso->cc_fecha_consulta ?></td>
                            <td><?= $caso->cc_fecha_modificacion ?></td>
                            <td><?= $caso->cc_estado ?></td>
                            <td>
                                <a href="<?= base_url() . 'ActualizarCaso/' . $caso->id_casos ?>" class="btn btn-warning btn-sm">Actualizar</a>
                            </td>
                            <td>
                                <a href="<?= base_url() . 'EliminarCasos/' . $caso->id_casos ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>