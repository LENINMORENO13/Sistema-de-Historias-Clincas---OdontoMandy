<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casos Clínicos</title>
</head>
<body>

    <h1>Lista de Casos Clínicos</h1>

    <!-- Mostrar los casos clínicos -->
    <table border="1">
        <thead>
            <tr>
                <th>ID Caso Clínico</th>
                <th>Paciente</th>
                <th>Diagnóstico</th>
                <th>Fecha</th>
                <!-- Agrega más columnas según tus datos -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($casos as $caso): ?>
                <tr>
                    <td><?= esc($caso['ID_CASO_CLINICO']) ?></td>
                    <td><?= esc($caso['PA_NOMBRE']) ?> <?= esc($caso['PA_APELLIDO']) ?></td>
                    <td><?= esc($caso['DIAGNOSTICO']) ?></td>
                    <td><?= esc($caso['FECHA_CASO']) ?></td>
                    <!-- Agrega más datos según tus columnas -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
