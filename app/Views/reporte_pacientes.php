<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Historiales Clínicos</title>
    <style>
        /* ESTILOS GENERALES */
        body {
            font-family: 'helvetica', sans-serif; /* Helvetica se ve mejor en PDF */
            font-size: 9pt;
            color: #444;
        }

        /* CABECERA (Membrete) */
        .header-table {
            width: 100%;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            font-family: 'helvetica', sans-serif;
        }
        .clinic-name {
            font-size: 16pt;
            font-weight: bold;
            color: #007bff;
            text-transform: uppercase;
        }
        .clinic-info {
            font-size: 8pt;
            color: #666;
            text-align: right;
        }

        /* TÍTULO DEL REPORTE */
        .report-title {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            color: #333;
            margin-top: 20px;
            margin-bottom: 5px;
        }
        .report-date {
            text-align: center;
            font-size: 9pt;
            color: #777;
            margin-bottom: 20px;
        }

        /* TABLA DE DATOS */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        /* Encabezados de tabla */
        .data-table th {
            background-color: #007bff; /* Azul Odontológico */
            color: #ffffff;
            font-weight: bold;
            padding: 8px;
            border: 1px solid #0069d9;
            text-align: center;
            font-size: 9pt;
        }

        /* Celdas */
        .data-table td {
            border: 1px solid #cccccc;
            padding: 8px;
            text-align: left;
            vertical-align: top;
            font-size: 9pt;
            color: #333;
        }

        /* Fila par (Efecto cebra) */
        .even-row {
            background-color: #f2f8ff; /* Azul muy clarito */
        }

        /* ANCHOS DE COLUMNA (Para que no se amontone) */
        .col-paciente { width: 22%; }
        .col-diagnostico { width: 34%; text-align: justify; }
        .col-tratamiento { width: 34%; text-align: justify; }
        .col-fecha { width: 10%; text-align: center; }

    </style>
</head>
<body>

    <table class="header-table" cellpadding="5">
        <tr>
            <td width="50%">
                <span class="clinic-name">OdontoMandy</span><br>
                <span style="font-size: 8pt; color: #555;">Consultorio Dental</span>
            </td>
            <td width="50%" class="clinic-info">
                Dirección: Calle Principal #123<br>
                Teléfono: (09) 123-4567<br>
                Email: contacto@odontomandy.com
            </td>
        </tr>
    </table>

    <h2 class="report-title">REPORTE GENERAL DE CASOS</h2>
    <div class="report-date">Generado el: <?php echo date('d/m/Y H:i'); ?></div>

    <table class="data-table" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th class="col-paciente">PACIENTE</th>
                <th class="col-diagnostico">DIAGNÓSTICO</th>
                <th class="col-tratamiento">TRATAMIENTO</th>
                <th class="col-fecha">FECHA</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 0;
            foreach ($casos as $caso): 
                $i++;
                $bg_color = ($i % 2 == 0) ? '#f2f8ff' : '#ffffff'; 
            ?>
                <tr style="background-color: <?php echo $bg_color; ?>;">
                    <td class="col-paciente">
                        <b><?php echo htmlspecialchars($caso->nombres_apellidos); ?></b>
                    </td>
                    <td class="col-diagnostico">
                        <?php echo nl2br(htmlspecialchars($caso->diagnostico)); ?>
                    </td>
                    <td class="col-tratamiento">
                        <?php echo nl2br(htmlspecialchars($caso->tratamiento)); ?>
                    </td>
                    <td class="col-fecha">
                        <?php echo date('d/m/Y', strtotime($caso->fecha_del_registro)); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br><br>
    <div style="text-align: right; border-top: 1px solid #ccc; padding-top: 5px; font-size: 8pt; color: #777;">
        Total de registros: <b><?php echo count($casos); ?></b>
    </div>

</body>
</html>