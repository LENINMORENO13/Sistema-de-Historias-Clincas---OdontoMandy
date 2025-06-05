<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Caso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
  /* Estilos generales del cuerpo */
body {
    background-color: #f1f1f1;
    font-family: 'Arial', sans-serif;
}

/* Estilo del contenedor */
.container {
    margin-top: 50px;
    max-width: 800px;
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Título principal */
h2 {
    color: #007bff;
    margin-bottom: 30px;
}

/* Estilo de las etiquetas */
.form-group label {
    font-weight: bold;
    color: #555;
}

/* Estilo de las celdas de la tabla */
.table th,
.table td {
    vertical-align: middle;
    border: 1px solid #ddd;
    padding: 15px;
}

/* Fondo de los encabezados de la tabla */
.table th {
    background-color: #007bff;
    color: white;
}

/* Fondo de las celdas */
.table td {
    background-color: #f9f9f9;
}

/* Estilo de los campos de formulario */
.form-control {
    border-radius: 5px;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
}

/* Efecto al hacer focus en los campos de formulario */
.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Estilo del botón principal */
.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    width: 100%;
}

/* Efecto de hover en el botón */
.btn-primary:hover {
    background-color: #0056b3;
    transition: background-color 0.3s ease;
}

/* Estilo del select */
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
        <h2 class="text-center mb-4">Actualizar Caso</h2>

        <form action="<?php base_url() ?>Actualizado" method="post">
            <input type="hidden" name="VId" value="<?= $VectorDatos[0]->id_casos; ?>">

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" class="form-control" name="VDescripcion" value="<?= $VectorDatos[0]->cc_descripcion ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Diagnóstico</label>
                <input type="text" class="form-control" name="VDiagnostico" value="<?= $VectorDatos[0]->cc_diagnostico ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Tratamiento</label>
                <input type="text" class="form-control" name="VTratamiento" value="<?= $VectorDatos[0]->cc_tratamiento ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha de consulta</label>
                <input type="date" class="form-control" name="VFechaConsulta" value="<?= $VectorDatos[0]->cc_fecha_consulta ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Estado</label>
                <td>
                    <select class="form-control" name="VEstado">
                        <option value="Pendiente" <?= ($VectorDatos[0]->cc_estado == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                        <option value="En tratamiento" <?= ($VectorDatos[0]->cc_estado == 'En tratamiento') ? 'selected' : ''; ?>>En tratamiento</option>
                        <option value="Finalizado" <?= ($VectorDatos[0]->cc_estado == 'Finalizado') ? 'selected' : ''; ?>>Finalizado</option>
                    </select>
                </td>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Actualizar Caso</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>