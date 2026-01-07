<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte Individual de Paciente</title>
    <style>
        /* AUMENTAMOS EL ESPACIADO GENERAL DE LÍNEA */
        body {
            font-family: 'helvetica', sans-serif;
            font-size: 10pt;
            color: #333;
            line-height: 1.4; /* Texto más separado verticalmente */
        }

        /* CABECERA */
        .header-table {
            width: 100%;
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px; /* Más espacio abajo de la línea azul */
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
            line-height: 1.4;
        }

        /* TÍTULOS DE SECCIÓN CON MÁS AIRE */
        .section-title {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            padding: 8px 10px; /* Más gordito el título azul */
            font-size: 11pt;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        /* ESPACIADOR MANUAL (TCPDF a veces ignora margin-bottom) */
        .spacer {
            height: 20px;
            font-size: 0;
            line-height: 0;
        }

        /* TABLAS DE DATOS */
        .patient-info-table {
            width: 100%;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
        }
        .info-label {
            font-weight: bold;
            color: #0056b3;
            width: 20%;
        }
        .info-value {
            color: #333;
            width: 30%;
        }

        /* HISTORIAL CLÍNICO */
        .visit-container {
            border: 1px solid #cccccc;
        }
        .visit-header {
            background-color: #e9ecef;
            color: #333;
            font-weight: bold;
            border-bottom: 1px solid #ccc;
        }
        
        .visit-label {
            width: 22%; /* Un poco más ancho para que no se apriete */
            font-weight: bold;
            color: #555;
            vertical-align: top;
        }
        .visit-text {
            width: 78%;
            text-align: justify;
        }

        /* ANTECEDENTES */
        .antecedentes-header {
            background-color: #f0f0f0;
            font-weight: bold;
            font-size: 9pt;
            color: #444;
            text-align: center;
        }
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

    <div class="spacer"></div>

    <div style="text-align: center; font-size: 14pt; font-weight: bold; margin-bottom: 5px;">
        HISTORIA CLÍNICA INDIVIDUAL
    </div>
    <div style="text-align: center; font-size: 9pt; color: #777;">
        Fecha de reporte: <?php echo date('d/m/Y H:i'); ?>
    </div>

    <div class="spacer"></div>

    <div class="section-title">DATOS DEL PACIENTE</div>
    
    <?php if (!empty($paciente)): ?>
        <table class="patient-info-table" cellpadding="8">
            <tr>
                <td class="info-label">Paciente:</td>
                <td class="info-value" colspan="3"><b><?php echo htmlspecialchars($paciente['nombres_apellidos']); ?></b></td>
            </tr>
            <tr>
                <td class="info-label">Cédula:</td>
                <td class="info-value"><?php echo htmlspecialchars($paciente['cedula']); ?></td>
                <td class="info-label">Teléfono:</td>
                <td class="info-value"><?php echo htmlspecialchars($paciente['telefono']); ?></td>
            </tr>
            <tr>
                <td class="info-label">Dirección:</td>
                <td class="info-value" colspan="3"><?php echo htmlspecialchars($paciente['direccion']); ?></td>
            </tr>
            <tr>
                <td class="info-label">Motivo Consulta:</td>
                <td class="info-value" colspan="3"><i><?php echo htmlspecialchars($paciente['motivo_consulta'] ?? 'No especificado'); ?></i></td>
            </tr>
        </table>

        <div class="spacer"></div>

        <table cellpadding="8" border="1" bordercolor="#cccccc" style="width: 100%;">
            <tr style="background-color: #e9ecef;">
                <td width="50%" align="center"><b>ANTECEDENTES PERSONALES</b></td>
                <td width="50%" align="center"><b>ANTECEDENTES FAMILIARES</b></td>
            </tr>
            <tr>
                <td width="50%" valign="top">
                    1. <?php echo htmlspecialchars($paciente['antecedente_personal_1'] ?? '-'); ?><br>
                    2. <?php echo htmlspecialchars($paciente['antecedente_personal_2'] ?? '-'); ?>
                </td>
                <td width="50%" valign="top">
                    1. <?php echo htmlspecialchars($paciente['antecedente_familiar_1'] ?? '-'); ?><br>
                    2. <?php echo htmlspecialchars($paciente['antecedente_familiar_2'] ?? '-'); ?>
                </td>
            </tr>
        </table>

    <?php else: ?>
        <p>No se encontró información del paciente.</p>
    <?php endif; ?>

    <div class="spacer"></div>

    <div class="section-title">EVOLUCIÓN Y TRATAMIENTOS</div>

    <?php if (!empty($detalles_casos)): ?>
        <?php foreach ($detalles_casos as $caso): ?>
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <table class="visit-container" cellpadding="8" cellspacing="0" width="100%">
                            <tr style="background-color: #e9ecef;">
                                <td colspan="2" style="border-bottom: 1px solid #ccc;">
                                    <b>FECHA DE VISITA: <?php echo date('d/m/Y', strtotime($caso['fecha_del_registro'])); ?></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="visit-label">DIAGNÓSTICO:</td>
                                <td class="visit-text">
                                    <?php echo nl2br(htmlspecialchars($caso['diagnostico'])); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="visit-label">TRATAMIENTO:</td>
                                <td class="visit-text">
                                    <?php echo nl2br(htmlspecialchars($caso['tratamiento'])); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="visit-label">INDICACIONES:</td>
                                <td class="visit-text">
                                    <?php echo nl2br(htmlspecialchars($caso['indicaciones'])); ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <div class="spacer"></div>
        <?php endforeach; ?>
    <?php else: ?>
        <div style="border: 1px dashed #ccc; padding: 15px; text-align: center; color: #777; margin-top: 10px;">
            No se han registrado visitas o tratamientos adicionales para este paciente.
        </div>
    <?php endif; ?>

    <br><br><br>
    <div style="text-align: center;">
        <div style="border-top: 1px solid #000; width: 40%; margin: 0 auto; padding-top: 5px; font-size: 8pt;">
            Firma del Profesional Tratante
        </div>
    </div>

</body>
</html>