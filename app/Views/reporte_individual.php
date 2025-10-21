<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Individual de Paciente</title>
    <style>
        /* Estilos generales compatibles con TCPDF */
        body {
            font-family: 'dejavusans', sans-serif;
            font-size: 10pt;
            line-height: 1.5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        /* --- Header Principal --- */
        .header {
            text-align: center;
            padding-bottom: 10px;
            border-bottom: 4px solid #1a4f94; 
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 20pt;
            margin: 0;
            color: #1a4f94; 
            font-weight: 600;
        }

        .header p {
            color: #555;
            font-size: 10pt;
            margin: 5px 0 0 0;
            font-style: italic;
        }
        
        /* --- Títulos de Sección --- */
        h2 {
            font-size: 14pt;
            color: #007bff; 
            background-color: #f0f8ff; 
            padding: 8px 15px;
            margin-top: 30px;
            margin-bottom: 15px;
            border-left: 5px solid #007bff;
        }

        .info-card {
            padding: 15px;
            margin-bottom: 25px;
            background-color: #ffffff; 
            border: 1px solid #d1e0e8;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05); 
        }

        .info-grid {
            width: 100%;
            border-collapse: collapse;
        }

        .info-grid td {
            padding: 8px 15px;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: top;
            width: 25%; 
        }
        
        .info-grid tr:last-child td {
            border-bottom: none;
        }

        .info-label {
            font-weight: bold;
            color: #1a4f94; 
            display: block;
            font-size: 9pt;
        }

        .info-value {
            display: block;
            margin-top: 2px;
            font-size: 10pt;
        }

        .section-separator {
            border-top: 1px dashed #ced4da;
            margin: 15px 0;
        }

        .history-section {
            margin-top: 20px;
        }

        .history-item {
            border: 1px solid #e9ecef;
            padding: 20px;
            margin-bottom: 25px;
            background-color: #ffffff;
            border-left: 5px solid #1a4f94;
        }

        .history-date {
            font-style: normal;
            font-weight: bold;
            color: #007bff;
            text-align: right;
            font-size: 10pt;
            text-transform: uppercase;
            display: block;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .history-item h3 {
            font-size: 11pt;
            color: #333;
            margin: 10px 0 5px 0;
            font-weight: bold;
            text-transform: uppercase;
        }

        .history-item p {
            margin: 0 0 15px 0;
            white-space: pre-wrap;
            text-align: justify;
            padding-left: 10px;
            border-left: 2px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>REPORTE ODONTOLÓGICO INDIVIDUAL</h1>
            <p>Historial Clínico del Paciente - Generado el: <?= date('Y-m-d H:i:s'); ?></p>
        </div>

        <!-- SECCIÓN 1: DATOS DEL PACIENTE -->
        <h2>Datos Generales y Antecedentes</h2>

        <?php if (!empty($paciente)): ?>
            <div class="info-card">
                <h3>Información de Contacto</h3>
                <table class="info-grid">
                    <tr>
                        <td style="width: 25%;"><span class="info-label">Paciente:</span></td>
                        <td style="width: 25%;"><span class="info-value"><?= esc($paciente['nombres_apellidos']); ?></span></td>
                        <td style="width: 25%;"><span class="info-label">Cédula:</span></td>
                        <td style="width: 25%;"><span class="info-value"><?= esc($paciente['cedula']); ?></span></td>
                    </tr>
                    <tr>
                        <td><span class="info-label">Teléfono:</span></td>
                        <td><span class="info-value"><?= esc($paciente['telefono']); ?></span></td>
                        <td><span class="info-label">Dirección:</span></td>
                        <td><span class="info-value"><?= esc($paciente['direccion']); ?></span></td>
                    </tr>
                </table>

                <div class="section-separator"></div>
                
                <h3>Motivo de la Consulta Inicial</h3>
                <p style="padding: 0 15px; font-style: italic; color: #555;"><?= esc($paciente['motivo_consulta'] ?? 'No registrado'); ?></p>

                <div class="section-separator"></div>

                <h3>Antecedentes Médicos Relevantes</h3>
                <table class="info-grid">
                    <tr>
                        <td style="width: 25%;"><span class="info-label">Antecedente Personal 1:</span></td>
                        <td style="width: 25%;"><span class="info-value"><?= esc($paciente['antecedente_personal_1'] ?? 'Ninguno'); ?></span></td>
                        <td style="width: 25%;"><span class="info-label">Antecedente Familiar 1:</span></td>
                        <td style="width: 25%;"><span class="info-value"><?= esc($paciente['antecedente_familiar_1'] ?? 'Ninguno'); ?></span></td>
                    </tr>
                    <tr>
                        <td><span class="info-label">Antecedente Personal 2:</span></td>
                        <td><span class="info-value"><?= esc($paciente['antecedente_personal_2'] ?? 'Ninguno'); ?></span></td>
                        <td><span class="info-label">Antecedente Familiar 2:</span></td>
                        <td><span class="info-value"><?= esc($paciente['antecedente_familiar_2'] ?? 'Ninguno'); ?></span></td>
                    </tr>
                </table>
            </div>
        <?php else: ?>
            <p>No se encontró información del paciente.</p>
        <?php endif; ?>

        <!-- SECCIÓN 2: DETALLE DE HISTORIAL CLÍNICO -->
        <div class="history-section">
            <h2>Detalle de Historial Clínico (Visitas)</h2>
            <?php if (!empty($detalles_casos)): ?>
                <?php $i = 0; foreach ($detalles_casos as $caso): $i++; ?>
                    <div class="history-item">
                        <p class="history-date">Visita registrada el: <?= esc($caso['fecha_del_registro']); ?></p>

                        <h3>Diagnóstico:</h3>
                        <p><?= esc($caso['diagnostico']); ?></p>

                        <h3>Tratamiento Realizado:</h3>
                        <p><?= esc($caso['tratamiento']); ?></p>

                        <h3>Indicaciones Post-Tratamiento:</h3>
                        <p><?= esc($caso['indicaciones']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay historial clínico registrado para este paciente.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
