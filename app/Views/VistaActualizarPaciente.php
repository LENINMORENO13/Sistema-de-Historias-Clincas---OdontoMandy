<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Información del Paciente</title>

    <!-- Agregar Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f1f1f1;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
            max-width: 800px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
            margin-bottom: 30px;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
        }

        .table th,
        .table td {
            vertical-align: middle;
            border: 1px solid #ddd;
            padding: 15px;
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .table td {
            background-color: #f9f9f9;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transition: background-color 0.3s ease;
        }

        /* Estilos para el select */
        select.form-control {
            border-radius: 5px;
            padding: 10px;
        }

        /* Asegurar que la tabla se vea limpia */
        .table-bordered {
            border-collapse: collapse;
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-center mb-4">Actualizar Información del Paciente</h2>

        <form action="<?php base_url() ?>Actualizado" method="post">
            <input style="display: none;" type="text" name="VId" value="<?= $VectorDatos[0]->id_paciente; ?>">

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><label for="VNombres">Nombre</label></td>
                        <td><input type="text" class="form-control" name="VNombres" value="<?= $VectorDatos[0]->pa_nombres ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="VApellidos">Apellido</label></td>
                        <td><input type="text" class="form-control" name="VApellidos" value="<?= $VectorDatos[0]->pa_apellidos ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="VEdad">Edad</label></td>
                        <td><input type="number" class="form-control" name="VEdad" value="<?= $VectorDatos[0]->pa_edad ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="VTelefono">Teléfono</label></td>
                        <td><input type="text" class="form-control" name="VTelefono" value="<?= $VectorDatos[0]->pa_telefono ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="VDireccion">Dirección</label></td>
                        <td><input type="text" class="form-control" name="VDireccion" value="<?= $VectorDatos[0]->pa_direccion ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="VCorreo">Correo</label></td>
                        <td><input type="text" class="form-control" name="VCorreo" value="<?= $VectorDatos[0]->pa_correo ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="VEstado">Estado</label></td>
                        <td>
                            <select name="VEstado" class="form-control">
                                <option value="Activo" <?= ($VectorDatos[0]->pa_estado == 'Activo') ? 'selected' : ''; ?>>Activo</option>
                                <option value="Inactivo" <?= ($VectorDatos[0]->pa_estado == 'Inactivo') ? 'selected' : ''; ?>>Inactivo</option>
                                <option value="Pendiente" <?= ($VectorDatos[0]->pa_estado == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
            </div>
        </form>
    </div>

    <!-- Agregar scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>