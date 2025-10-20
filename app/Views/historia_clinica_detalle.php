<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detalles de Caso Clínico - Continuación</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    
    <link rel="stylesheet" href="<?= base_url('public/css/historia_clinica_detalle.css') ?>">
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