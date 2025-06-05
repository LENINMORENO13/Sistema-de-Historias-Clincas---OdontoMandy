<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes - Oracle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Fondo de odontología sutil */
        body {
            background-image: url('https://img.freepik.com/vector-premium/cuidado-dental-lindo-diente-patrones-fisuras-fondo-dentista_513640-1155.jpg?semt=ais_hybrid');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco semi-transparente */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        h1 {
            color: #007bff;
            text-align: center;
        }

        .form-control {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Lista de Pacientes</h1>

        <!-- Formulario de Filtro -->
        <form action="<?= site_url('COracle/index') ?>" method="get" class="mb-3">
            <div class="row">
                <div class="col">
                    <input type="text" name="nombre" class="form-control" placeholder="Filtrar por nombre" value="<?= esc($nombre) ?>">
                </div>
                <div class="col">
                    <select name="estado" class="form-control">
                        <option value="">Filtrar por estado</option>
                        <option value="Activo" <?= ($estado == 'Activo' ? 'selected' : '') ?>>Activo</option>
                        <option value="Inactivo" <?= ($estado == 'Inactivo' ? 'selected' : '') ?>>Inactivo</option>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>

        <!-- Tabla de Pacientes -->
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID Paciente</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pacientes as $paciente): ?>
                    <tr>
                        <td><?= $paciente['ID_PACIENTE'] ?></td>
                        <td><?= $paciente['PA_NOMBRES'] ?></td>
                        <td><?= $paciente['PA_APELLIDOS'] ?></td>
                        <td><?= $paciente['PA_EDAD'] ?></td>
                        <td><?= $paciente['PA_TELEFONO'] ?></td>
                        <td><?= $paciente['PA_DIRECCION'] ?></td>
                        <td><?= $paciente['PA_CORREO'] ?></td>
                        <td><?= $paciente['PA_ESTADO'] ?></td>
                        <td><?= $paciente['PA_FECHA_REGISTRO'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
