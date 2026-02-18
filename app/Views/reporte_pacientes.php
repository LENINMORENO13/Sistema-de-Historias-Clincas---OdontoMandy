<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<style>
body {
    font-family: helvetica;
    font-size: 9.5pt;
    color: #333;
}



.titulo-grande {
    font-size: 20pt;
    font-weight: bold;
    color: #1a5f7a;
}

.subtitulo {
    font-size: 9pt;
    color: #7f8c8d;
}

.seccion {
    font-size: 12pt;
    font-weight: bold;
    color: #1a5f7a;
    border-bottom: 2px solid #1a5f7a;
    margin-bottom: 8px;
}

.label {
    font-weight: bold;
    color: #555;
}



.tabla-principal {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 15px;
    table-layout: fixed;
}

.tabla-principal th {
    background-color: #1a5f7a;
    color: #ffffff;
    font-weight: bold;
    font-size: 11pt;
    padding: 18px 15px;
    border: none;
}

.tabla-principal td {
    background-color: #ffffff;
    padding: 22px 18px;
    vertical-align: middle;
    word-wrap: break-word;
    line-height: 1.9;
    border-top: 1px solid #e0e0e0;
    border-bottom: 1px solid #e0e0e0;
}

.tabla-principal tbody tr {
    min-height: 70px;
}

.tabla-principal tbody tr:nth-child(even) td {
    background-color: #f9fbfd;
}

.resumen-box {
    background-color: #f4f6f9;
    border-left: 4px solid #1a5f7a;
    padding: 10px;
}
</style>
</head>

<body>

<?php
$totalCasos = count($casos);
$totalPacientes = count(array_unique(array_map(function($c){
    return $c->nombres_apellidos;
}, $casos)));
?>

<!-- HEADER -->
<table width="100%" border="0">
<tr>
    <td width="60%">
        <span class="titulo-grande">Dental Manager</span><br>
        <span class="subtitulo">Sistema General de Gestión Clínica</span>
    </td>
    <td width="40%" align="right">
        <b>REPORTE GENERAL</b><br>
        <span style="font-size:8pt; color:#777;">
            Generado: <?php echo date('d/m/Y H:i'); ?>
        </span>
    </td>
</tr>
</table>

<div style="border-bottom:2px solid #1a5f7a; margin-top:5px;"></div>

<br><br>

<div class="seccion">
    REPORTE GENERAL DE HISTORIALES CLÍNICOS
</div>

<br>

<!-- RESUMEN -->
<table width="100%" cellpadding="6" border="0" class="resumen-box">
<tr>
    <td width="33%" align="center">
        <span class="label">TOTAL CASOS</span><br>
        <span style="font-size:15pt; font-weight:bold; color:#1a5f7a;">
            <?php echo $totalCasos; ?>
        </span>
    </td>
    <td width="33%" align="center">
        <span class="label">PACIENTES</span><br>
        <span style="font-size:15pt; font-weight:bold; color:#1a5f7a;">
            <?php echo $totalPacientes; ?>
        </span>
    </td>
    <td width="33%" align="center">
        <span class="label">FECHA REPORTE</span><br>
        <span style="font-size:15pt; font-weight:bold; color:#1a5f7a;">
            <?php echo date('d/m/Y'); ?>
        </span>
    </td>
</tr>
</table>

<br><br>

<!-- TABLA -->
<table class="tabla-principal" cellpadding="0" cellspacing="0">

<thead>
<tr>
    <th width="5%" align="center">#</th>
    <th width="20%" align="center">PACIENTE</th>
    <th width="30%" align="center">DIAGNÓSTICO</th>
    <th width="30%" align="center">TRATAMIENTO</th>
    <th width="15%" align="center">FECHA</th>
</tr>
</thead>

<tbody>

<?php if ($totalCasos > 0): ?>
<?php $i = 1; ?>
<?php foreach ($casos as $caso): ?>
<tr>
    <td width="5%" align="center">
        <?php echo $i++; ?>
    </td>

    <td width="20%">
        <b><?php echo htmlspecialchars($caso->nombres_apellidos); ?></b>
    </td>

    <td width="30%">
        <?php echo nl2br(htmlspecialchars($caso->diagnostico)); ?>
    </td>

    <td width="30%">
        <b><?php echo nl2br(htmlspecialchars($caso->tratamiento)); ?></b>
    </td>

    <td width="15%" align="center">
        <?php echo date('d/m/Y', strtotime($caso->fecha_del_registro)); ?>
    </td>
</tr>
<?php endforeach; ?>

<?php else: ?>

<tr>
    <td colspan="5" align="center" style="color:#999; padding:15px;">
        No existen registros clínicos.
    </td>
</tr>

<?php endif; ?>

</tbody>
</table>

<br><br><br>

<!-- FIRMA -->
<table width="100%">
<tr>
    <td width="30%"></td>
    <td width="40%" align="center">
        <div style="border-top:1px solid #000;"></div>
        <b>Dirección General</b><br>
        <span style="font-size:8pt;">Dental Manager</span>
    </td>
    <td width="30%"></td>
</tr>
</table>

<br><br>

<!-- FOOTER -->
<table width="100%">
<tr>
    <td width="50%" style="font-size:8pt; color:#777;">
        Documento confidencial – Uso interno
    </td>
    <td width="50%" align="right" style="font-size:8pt; color:#777;">
        Página 1
    </td>
</tr>
</table>

</body>
</html>
