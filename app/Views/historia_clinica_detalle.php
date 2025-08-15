<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detalles de Caso Clínico - Continuación</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #e0eafc, #cfdef3);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .container {
            max-width: 700px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            margin-bottom: 30px;
        }

        h1 {
            font-weight: bold;
            color: #2c3e50;
            padding-bottom: 15px;
            border-bottom: 2px solid #3498db;
            margin-bottom: 30px;
            text-align: center;
            font-size: 2em;
        }

        .card {
            border: none;
            /* Eliminar borde predeterminado de la tarjeta */
            margin-bottom: 25px;
        }

        .card-header {
            font-weight: bold;
            background-color: #3498db !important;
            color: white !important;
            padding: 12px 20px;
            border-radius: 8px 8px 0 0 !important;
            font-size: 1.1em;
        }

        .card-body {
            padding: 25px;
            border: 1px solid #dcdcdc;
            border-top: none;
            border-radius: 0 0 8px 8px;
        }

        /* Estilos para los campos de formulario */
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: .5rem;
        }

        .form-control,
        .form-select {
            border: 1px solid #ced4da;
            border-radius: .4rem;
            padding: .75rem 1rem;
            font-size: 1rem;
            transition: all 0.2s ease-in-out;
            box-shadow: none;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
            outline: none;
        }

        .form-control[readonly] {
            background-color: #e9ecef;
            cursor: not-allowed;
            border-color: #ced4da;
        }

        /* Botones */
        .btn-primary {
            background-color: #2980b9;
            border-color: #2980b9;
            font-size: 1.1em;
            padding: 12px 25px;
            transition: background-color 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
            width: 100%;
            border-radius: 8px;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #5fa5eaff;
            border-color: #4961ebff;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            font-size: 1em;
            padding: 10px 20px;
            transition: background-color 0.2s ease, border-color 0.2s ease;
            border-radius: 8px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .btn-primary i {
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .container {
                margin: 20px auto;
                padding: 25px 20px;
            }

            h1 {
                font-size: 1.6em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><i class="bi bi-journal-medical"></i> Continuación del Registro Clínico</h1>
        <form action="<?= base_url('/InsertarCD') ?>" method="post" id="form_caso_detallado">
            <?= csrf_field() ?>

            <div class="card">
                <div class="card-header">1. IDENTIFICACIÓN DEL PACIENTE</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="id_paciente" class="form-label">ID del Paciente</label>
                        <input type="number" name="id_paciente" id="id_paciente" class="form-control" value="<?= esc($id_paciente) ?>" readonly>
                        <small class="form-text text-muted">Este campo se rellena automáticamente.</small>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">2. DETALLES DE DIAGNÓSTICO</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="diagnostico" class="form-label">Diagnóstico Principal</label>
                        <input type="text" name="diagnostico" id="diagnostico" class="form-control" required placeholder="Ej: Caries dental, Gingivitis, Periodontitis, etc.">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">3. PLAN DE TRATAMIENTO</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="tratamiento" class="form-label">Tratamiento Propuesto</label>
                        <input type="text" name="tratamiento" id="tratamiento" class="form-control" required placeholder="Ej: Obturación, Endodoncia, Exodoncia, Limpieza.">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">4. INDICACIONES AL PACIENTE</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="indicaciones" class="form-label">Instrucciones Post-Tratamiento</label>
                        <textarea name="indicaciones" id="indicaciones" class="form-control" required placeholder="Instrucciones para el paciente (ej: dieta blanda, higiene, citas de control)." rows="4"></textarea>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">5. ESTADO DEL CASO</div>
                <div class="card-body">
                    <div class="mb-4">
                        <label for="estado" class="form-label">Estado Actual del Caso Clínico</label>
                        <select name="estado" id="estado" class="form-select" required>
                            <option value="activo" selected>Activo (En tratamiento)</option>
                            <option value="inactivo">Inactivo (Pendiente)</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i> GUARDAR DETALLES DEL CASO</button>
        </form>
        <div class="text-center mt-3">
            <a href="<?= base_url('Inicio') ?>" class="btn btn-secondary">VOLVER AL INICIO</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>