<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Agregar el CSS de Bootstrap para mejorar el diseño -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background-color:rgb(170, 185, 201);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);

        }

        table th,
        table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;

        }

        table th {
            background-color:rgb(52, 187, 187);
            color: white;
            font-weight: bold;
        }

        table td {
            background-color: #f9f9f9;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Estilo para los botones */
        .btn {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .btn-update {
            background-color:rgb(113, 194, 167);
            color: white;
        }

        .btn-delete {
            background-color:rgb(238, 100, 114);
            color: white;
        }

        .btn-update:hover {
            background-color: #218838;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="container">
        <!-- Título de la tabla -->
        <h2 class="my-4 text-center">Lista de Pacientes</h2>

        <table>
            <thead>
                <tr>
                    <th style="display: none;">ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Telefono</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th>Fecha ultima modificacion</th>
                    <th>Acciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($VectorDatos as $llave): ?>
                    <tr>
                        <td style="display: none;"><?= $llave->id_paciente ?></td>
                        <td><?= $llave->pa_nombres ?></td>
                        <td><?= $llave->pa_apellidos ?></td>
                        <td><?= $llave->pa_edad ?></td>
                        <td><?= $llave->pa_telefono ?></td>
                        <td><?= $llave->pa_direccion ?></td>
                        <td><?= $llave->pa_correo ?></td>
                        <td><?= $llave->pa_estado ?></td>
                        <td><?= $llave->pa_fecha_modificacion ?></td>
                        <td>
                            <a href="<?= base_url() . 'Actualizar/' . $llave->id_paciente ?>" class="btn btn-update">Actualizar</a>

                        </td>
                        <td>
                            <a href="<?= base_url() . 'Eliminar/' . $llave->id_paciente ?>" class="btn btn-delete">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>