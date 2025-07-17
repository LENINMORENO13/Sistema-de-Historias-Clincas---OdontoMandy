<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Agregar Detalle - Caso Clínico</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            background: #f0f8ff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 500px;
            background: white;
            margin: 40px auto;
            padding: 30px 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.15);
        }

        h1 {
            text-align: center;
            color: #003366;
            margin-bottom: 25px;
            font-weight: 700;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }

        h1 i {
            font-size: 2rem;
            color: #007bff;
        }

        label {
            font-weight: 600;
            color: #004080;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1.5px solid #007bff;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: #0056b3;
            outline: none;
            box-shadow: 0 0 6px #80bdff;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            font-weight: 700;
            padding: 12px 0;
            font-size: 1.1rem;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 3px 8px rgba(0, 123, 255, 0.4);
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><i class="bi bi-file-medical"></i> Agregar Detalle</h1>
        <form action="<?= base_url('/InsertarCD') ?>" method="post" id="form_caso_detallado">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="id_paciente">ID del paciente</label>
                <input type="number" name="id_paciente" id="id_paciente" value="<?= esc($id_paciente) ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="diagnostico">Diagnóstico</label>
                <input type="text" name="diagnostico" id="diagnostico" required placeholder="Ingrese diagnóstico">
            </div>
            <div class="mb-3">
                <label for="tratamiento">Tratamiento</label>
                <input type="text" name="tratamiento" id="tratamiento" required placeholder="Ingrese tratamiento">
            </div>
            <div class="mb-3">
                <label for="indicaciones">Indicaciones</label>
                <input type="text" name="indicaciones" id="indicaciones" required placeholder="Ingrese indicaciones">
            </div>
            <div class="mb-4">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" required>
                    <option value="activo" selected>Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>
            <button type="submit"><i class="bi bi-plus-circle"></i> Agregar Caso Clínico Detallado</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
