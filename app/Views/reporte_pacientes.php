<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Pacientes</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Reporte de Historiales Clínicos</h1>
    <table>
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Diagnóstico</th>
                <th>Tratamiento</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($casos as $caso): ?>
                <tr>
                    <td><?php echo $caso->nombres_apellidos; ?></td>
                    <td><?php echo $caso->diagnostico; ?></td>
                    <td><?php echo $caso->tratamiento; ?></td>
                    <td><?php echo $caso->fecha_del_registro; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html><!DOCTYPE html>
<html>
<head>
    <title>Reporte de Pacientes</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Reporte de Historiales Clínicos</h1>
    <table>
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Diagnóstico</th>
                <th>Tratamiento</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($casos as $caso): ?>
                <tr>
                    <td><?php echo $caso->nombres_apellidos; ?></td>
                    <td><?php echo $caso->diagnostico; ?></td>
                    <td><?php echo $caso->tratamiento; ?></td>
                    <td><?php echo $caso->fecha_del_registro; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>