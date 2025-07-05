<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia Clinica Detallada</title>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
        }

        body {
            background: linear-gradient(white);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #e0e0e0;
            text-align: center;
            box-sizing: border-box;
            margin: auto;
            padding: 20px;
            max-width: 500px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Detalles</h1>
        <form action="<?php echo base_url() ?>/InsertarCD" method="post" id="form_caso_detallado">
            <div class="form-group">
                <label for="id_paciente">ID del paciente</label>
                <input type="number" name="id_paciente" id="id_paciente" required>
            </div>
            <div class="form-group">
                <label for="diagnostico">Diagnóstico</label>
                <input type="text" name="diagnostico" id="diagnostico" required>
            </div>
            <div class="form-group">
                <label for="tratamiento">Tratamiento</label>
                <input type="text" name="tratamiento" id="tratamiento" required>
            </div>
            <div class="form-group">
                <label for="indicaciones">Indicaciones</label>
                <input type="text" name="indicaciones" id="indicaciones" required>
            </div>
            <button type="submit">Agregar Caso Clínico Detallado</button>
        </form>
    </div>
</body>

</html>