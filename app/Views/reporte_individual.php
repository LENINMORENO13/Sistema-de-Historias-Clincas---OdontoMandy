<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Individual de Paciente</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 10pt;
            line-height: 1.6;
            color: #333;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            padding-bottom: 10px;
            border-bottom: 2px solid #1a4f94;
            margin-bottom: 15px;
        }
        .header h1 {
            font-size: 18pt;
            margin: 0;
            color: #1a4f94;
        }
        h2 {
            font-size: 14pt;
            color: #1a4f94;
            border-bottom: 2px solid #1a4f94;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }
        h3 {
            font-size: 12pt;
            color: #1a4f94;
            margin: 0 0 5px 0;
        }
        .info-section {
            padding: 10px 0;
            margin-bottom: 15px;
            border-bottom: 1px solid #d1e0e8;
        }
        .info-item {
            display: block;
            margin-bottom: 5px;
        }
        .info-label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            width: 200px; /* Ancho fijo para las etiquetas */
        }
        .info-value {
            display: inline-block;
        }
        .history-section {
            margin-top: 20px;
        }
        .history-item {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .history-date {
            font-style: italic;
            color: #777;
            text-align: right;
            font-size: 9pt;
            display: block;
            margin-bottom: 10px;
        }
        p {
            margin: 0 0 5px 0;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Encabezado del Reporte -->
        <div class="header">
            <h1>Reporte Odontológico Individual</h1>
            <p style="color:#555; font-size:10pt;">Historial Clínico del Paciente</p>
        </div>

        <!-- Sección de Información del Paciente -->
        <h2>Información del Paciente</h2>
        <div class="info-section">
            <?php if (!empty($paciente)): ?>
                <div class="info-item">
                    <span class="info-label">Nombre Completo:</span>
                    <span class="info-value"><?= esc($paciente['nombres_apellidos']); ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Cédula:</span>
                    <span class="info-value"><?= esc($paciente['cedula']); ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Teléfono:</span>
                    <span class="info-value"><?= esc($paciente['telefono']); ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Dirección:</span>
                    <span class="info-value"><?= esc($paciente['direccion']); ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Motivo de la Consulta:</span>
                    <span class="info-value"><?= esc($paciente['motivo_consulta']); ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Antecedente Personal 1:</span>
                    <span class="info-value"><?= esc($paciente['antecedente_personal_1']); ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Antecedente Personal 2:</span>
                    <span class="info-value"><?= esc($paciente['antecedente_personal_2']); ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Antecedente Familiar 1:</span>
                    <span class="info-value"><?= esc($paciente['antecedente_familiar_1']); ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Antecedente Familiar 2:</span>
                    <span class="info-value"><?= esc($paciente['antecedente_familiar_2']); ?></span>
                </div>
            <?php else: ?>
                <p>No se encontró información del paciente.</p>
            <?php endif; ?>
        </div>
        
        <!-- Sección de Historial Clínico -->
        <div class="history-section">
            <h2>Historial Clínico</h2>
            <?php if (!empty($detalles_casos)): ?>
                <?php foreach ($detalles_casos as $caso): ?>
                    <div class="history-item">
                        <p class="history-date">Fecha de Registro: <?= esc($caso['fecha_del_registro']); ?></p>
                        <h3>Diagnóstico:</h3>
                        <p><?= esc($caso['diagnostico']); ?></p>
                        <h3>Tratamiento:</h3>
                        <p><?= esc($caso['tratamiento']); ?></p>
                        <h3>Indicaciones:</h3>
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
