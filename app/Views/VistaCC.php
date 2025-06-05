<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Caso Clínico</title>
    <link rel="stylesheet" href="Public/Css/disenioCC.css">

</head>

<body>
    
    <div class="container">
        <h1>Nuevo Caso Clínico</h1>
        <form action="<?php echo base_url()?>/InsertCC" method="post">
            <div class="form-group">
                <label for="id_paciente">ID del Paciente:</label>
                <input type="number" name="id_paciente" required>
            </div>

            <div class="form-group">
                <label for="cc_descripcion">Descripción:</label>
                <textarea name="cc_descripcion" required></textarea>
            </div>

            <div class="form-group">
                <label for="cc_diagnostico">Diagnóstico:</label>
                <textarea name="cc_diagnostico" required></textarea>
            </div>

            <div class="form-group">
                <label for="cc_tratamiento">Tratamiento:</label>
                <textarea name="cc_tratamiento" required></textarea>    
            </div>

            <div class="form-group">
                <label for="cc_fecha_consulta">Fecha de Consulta:</label>
                <input type="date" name="cc_fecha_consulta" required>
            </div>
            <div class="form-group">
                <label for="cc_estado">Estado:</label>
                <select name="cc_estado" required>
                    <option value="Pendiente">Pendiente</option>
                    <option value="En tratamiento">En tratamiento</option>
                    <option value="Finalizado">Finalizado</option>
                </select>
            </div>

            <button type="submit">Guardar Caso Clínico</button>
        </form>


    </div>
    <button>
    <a href="<?= base_url('Inicio') ?>" class="btn btn-secondary mt-3 px-4 py-2" style="border-radius: 20px; font-weight: bold; text-decoration: none;">Regresar</a>

    </button>

</body>

</html>
