<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: helvetica;
            font-size: 10pt;
            color: #333;
        }
        .texto-azul { color: #1a5f7a; }
        .bg-azul { background-color: #1a5f7a; color: #ffffff; }
        .bg-gris { background-color: #f4f6f9; }
        
        .titulo-grande { font-size: 20pt; font-weight: bold; color: #1a5f7a; }
        .subtitulo { font-size: 9pt; color: #7f8c8d; }
        .seccion { font-size: 12pt; font-weight: bold; color: #1a5f7a; border-bottom: 2px solid #1a5f7a; line-height: 20px; }
        .label { font-weight: bold; color: #555555; }
        
        .text-center { text-align: center; }
        .text-right { text-align: right; }
    </style>
</head>
<body>

    <table width="100%" cellpadding="0" border="0">
        <tr>
            <td width="60%">
                <span class="titulo-grande">Dental Manager</span><br>
                <span class="subtitulo">Sistema de Gestión Odontológica</span>
            </td>
            <td width="40%" align="right">
                <br>
                <b>EXPEDIENTE N° <?php echo str_pad($paciente['id'] ?? 0, 4, '0', STR_PAD_LEFT); ?></b><br>
                <span style="font-size: 8pt; color: #777;">Impreso: <?php echo date('d/m/Y H:i'); ?></span>
            </td>
        </tr>
    </table>
    
    <div style="border-bottom: 2px solid #1a5f7a; height: 10px;"></div>
    <br><br>

    <table width="100%" cellpadding="8" border="0" style="background-color: #f4f6f9;">
        <tr>
            <td colspan="4" style="border-left: 4px solid #1a5f7a;">
                <b style="font-size: 11pt; color: #1a5f7a;">DATOS DEL PACIENTE</b>
            </td>
        </tr>
        <tr>
            <td width="15%" class="label">Paciente:</td>
            <td width="45%"><b><?php echo strtoupper($paciente['nombres_apellidos']); ?></b></td>
            <td width="15%" class="label">Cédula:</td>
            <td width="25%"><?php echo $paciente['cedula']; ?></td>
        </tr>
        <tr>
            <td class="label">Teléfono:</td>
            <td><?php echo $paciente['telefono']; ?></td>
            <td class="label">F. Nacim:</td>
            <td><?php echo date('d/m/Y', strtotime($paciente['fecha_nacimiento'])); ?></td>
        </tr>
        <tr>
            <td class="label">Dirección:</td>
            <td colspan="3"><?php echo $paciente['direccion']; ?></td>
        </tr>
    </table>

    <br><br>

    <div style="border-bottom: 2px solid #1a5f7a; font-size: 12pt; font-weight: bold; color: #1a5f7a; margin-bottom: 5px;">
        INFORMACIÓN CLÍNICA INICIAL
    </div>
    <br>

    <table width="100%" cellpadding="5" border="0">
        <tr>
            <td width="100%" style="background-color: #f4f6f9; border-left: 4px solid #1a5f7a;">
                <span style="font-weight: bold; color: #1a5f7a; font-size: 9pt;">MOTIVO DE CONSULTA:</span><br>
                <span style="font-size: 10pt; color: #333; font-style: italic;">
                    "<?php echo !empty($paciente['motivo_consulta']) ? $paciente['motivo_consulta'] : 'No especificado'; ?>"
                </span>
            </td>
        </tr>
    </table>
    
    <br><br>

    <table width="100%" cellpadding="6" cellspacing="0" border="1" bordercolor="#cccccc">
        <thead>
            <tr style="background-color: #1a5f7a; color: #ffffff;">
                <th width="50%" align="center" style="font-weight: bold;">ANTECEDENTES PERSONALES</th>
                <th width="50%" align="center" style="font-weight: bold;">ANTECEDENTES FAMILIARES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="50%" valign="top" height="60">
                    <table cellpadding="2" border="0">
                        <tr>
                            <td width="10px" style="color: #1a5f7a;">•</td>
                            <td><?php echo !empty($paciente['antecedente_personal_1']) ? $paciente['antecedente_personal_1'] : '<span style="color:#999">Ninguno</span>'; ?></td>
                        </tr>
                        <tr>
                            <td width="10px" style="color: #1a5f7a;">•</td>
                            <td><?php echo !empty($paciente['antecedente_personal_2']) ? $paciente['antecedente_personal_2'] : ''; ?></td>
                        </tr>
                    </table>
                </td>

                <td width="50%" valign="top">
                    <table cellpadding="2" border="0">
                        <tr>
                            <td width="10px" style="color: #1a5f7a;">•</td>
                            <td><?php echo !empty($paciente['antecedente_familiar_1']) ? $paciente['antecedente_familiar_1'] : '<span style="color:#999">Ninguno</span>'; ?></td>
                        </tr>
                        <tr>
                            <td width="10px" style="color: #1a5f7a;">•</td>
                            <td><?php echo !empty($paciente['antecedente_familiar_2']) ? $paciente['antecedente_familiar_2'] : ''; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <br><br>

    <div style="border-bottom: 2px solid #1a5f7a; font-size: 12pt; font-weight: bold; color: #1a5f7a; margin-bottom: 5px;">
        EVOLUCIÓN Y TRATAMIENTOS
    </div>
    <br>

    <?php if (!empty($detalles_casos)): ?>
        <?php foreach ($detalles_casos as $index => $caso): ?>
            <table width="100%" cellpadding="0" border="0">
                <tr>
                    <td style="border: 1px solid #cccccc;">
                        <table width="100%" cellpadding="5" style="background-color: #e9ecef; border-bottom: 1px solid #cccccc;">
                            <tr>
                                <td width="70%"><b>REGISTRO DE ATENCIÓN #<?php echo $index + 1; ?></b></td>
                                <td width="30%" align="right"><b><?php echo date('d/m/Y', strtotime($caso['fecha_del_registro'])); ?></b></td>
                            </tr>
                        </table>
                        <table width="100%" cellpadding="5">
                            <tr>
                                <td width="22%" class="texto-azul" style="font-weight:bold;">DIAGNÓSTICO:</td>
                                <td width="78%"><?php echo nl2br($caso['diagnostico']); ?></td>
                            </tr>
                            <tr>
                                <td width="22%" class="texto-azul" style="font-weight:bold;">TRATAMIENTO:</td>
                                <td width="78%"><b><?php echo nl2br($caso['tratamiento']); ?></b></td>
                            </tr>
                            <tr>
                                <td width="22%" class="label">INDICACIONES:</td>
                                <td width="78%" style="font-style: italic; color: #555;">
                                    <?php echo nl2br($caso['indicaciones']); ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <br>
        <?php endforeach; ?>
    <?php else: ?>
        <table width="100%" cellpadding="20">
            <tr>
                <td align="center" style="color: #999; border: 1px dashed #ccc;">
                    No existen registros de evolución para este paciente.
                </td>
            </tr>
        </table>
    <?php endif; ?>

    <br><br><br><br>

    <table width="100%" border="0">
        <tr>
            <td width="10%"></td>
            <td width="35%" align="center">
                <div style="border-top: 1px solid #000000;"></div>
                <b>Firma del Paciente</b><br>
                <span style="font-size: 8pt;">CI: <?php echo $paciente['cedula']; ?></span>
            </td>
            <td width="10%"></td>
            <td width="35%" align="center">
                <div style="border-top: 1px solid #000000;"></div>
                <b>Dr. Tratante</b><br>
                <span style="font-size: 8pt;">Dental Manager</span>
            </td>
            <td width="10%"></td>
        </tr>
    </table>

</body>
</html>