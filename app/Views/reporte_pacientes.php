<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Historiales Clínicos</title>
    <link rel="stylesheet" href="css/reporte_clinico.css">
    <style>
        body {
            font-family: 'dejavusans', sans-serif;
            font-size: 10pt;
            margin: 0;
        }

        .header-box {
            background-color: #2c3e50;
            color: #fff;
            padding: 15px 10px;
            text-align: center;
            margin-bottom: 10px;
        }

        .header-box h1 {
            font-size: 16pt;
            margin: 0;
        }

        .info-bar {
            text-align: right;
            font-size: 9pt;
            color: #444;
            padding: 0 10px 10px 0;
            font-style: italic;
        }

        table {
            width: 100%;
            border-spacing: 0 6px;
            margin-top: 5px;
        }

        thead {
            background-color: #ecf0f1;
        }

        th {
            background-color: #f1f1f1;
            color: #333;
            font-size: 10pt;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        td {
            border: 1px solid #e6e6e6;
            padding: 12px 8px; 
            vertical-align: top;
            font-size: 9.5pt;
        }

        .even-row {
            background-color: #f9fcff;
        }

        .col-paciente {
            width: 26%;
            padding-left: 12px;
            padding-right: 10px;
        }

        .col-diagnostico,
        .col-tratamiento {
            width: 30%;
            text-align: justify;
        }

        .col-fecha {
            width: 14%;
            text-align: center;
            font-size: 8.5pt;
            color: #666;
        }
    </style>
</head>
<body>

    <div class="header-box">
        <h1>REPORTE GENERAL DE HISTORIALES CLÍNICOS</h1>
    </div>

    <div class="info-bar">
        Generado el: <?php echo date('d/m/Y H:i'); ?>
    </div>

    <table>
        <thead>
            <tr>
                <th class="col-paciente">Paciente</th>
                <th class="col-diagnostico">Diagnóstico</th>
                <th class="col-tratamiento">Tratamiento</th>
                <th class="col-fecha">Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 0;
            foreach ($casos as $caso): 
                $i++;
                $row_class = ($i % 2 == 0) ? 'even-row' : '';
            ?>
                <tr class="<?php echo $row_class; ?>">
                    <td class="col-paciente"><?php echo htmlspecialchars($caso->nombres_apellidos); ?></td>
                    <td class="col-diagnostico"><?php echo htmlspecialchars($caso->diagnostico); ?></td>
                    <td class="col-tratamiento"><?php echo htmlspecialchars($caso->tratamiento); ?></td>
                    <td class="col-fecha"><?php echo date('d/m/Y', strtotime($caso->fecha_del_registro)); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
