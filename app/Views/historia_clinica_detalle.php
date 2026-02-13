<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detalles del Caso - SisOdontoMandy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('public/css/historia_clinica_detalle.css') ?>">

</head>

<body>

    <header class="clinic-header">
        <div class="container">
            <div class="header-content">
                <div class="header-icon"><i class="fas fa-file-medical"></i></div>
                <div>
                    <h1 class="h4 m-0 fw-bold">Dental Manager</h1>
                    <p class="m-0 small opacity-75">Gestión Clínica Integral</p>
                </div>
            </div>
        </div>
    </header>

    <div class="main-container">
        
        <div class="page-title">
            <h2><i class="fas fa-stethoscope me-2"></i>Detalles del Tratamiento</h2>
            <p class="text-muted mb-0">Complete la información técnica del caso clínico</p>
        </div>

        <form action="<?= base_url('/InsertarCD') ?>" method="post" id="form_caso_detallado">
            <?= csrf_field() ?>

            <div class="section-card">
                <div class="card-header">
                    <i class="fas fa-id-badge"></i> 1. Identificación del Paciente
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <label for="id_paciente" class="form-label mb-0">ID de Expediente:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-hashtag text-secondary"></i></span>
                                <input type="number" name="id_paciente" id="id_paciente" class="form-control input-readonly-custom border-start-0 ps-0" value="<?= esc($id_paciente) ?>" readonly>
                            </div>
                            <small class="text-muted mt-1 d-block"><i class="fas fa-lock me-1"></i>Dato vinculado automáticamente</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-card">
                <div class="card-header">
                    <i class="fas fa-search-plus"></i> 2. Diagnóstico Clínico
                </div>
                <div class="card-body">
                    <label for="diagnostico" class="form-label">Diagnóstico Principal</label>
                    <div class="input-group">
                        <input type="text" name="diagnostico" id="diagnostico" class="form-control" required placeholder="Ej: Caries dental profunda en pieza 18...">
                        <span class="input-group-text bg-white"><i class="fas fa-pen text-secondary opacity-50"></i></span>
                    </div>
                </div>
            </div>

            <div class="section-card">
                <div class="card-header">
                    <i class="fas fa-tools"></i> 3. Plan de Tratamiento
                </div>
                <div class="card-body">
                    <label for="tratamiento" class="form-label">Procedimiento a realizar</label>
                    <input type="text" name="tratamiento" id="tratamiento" class="form-control" required placeholder="Ej: Endodoncia monorradicular y reconstrucción...">
                </div>
            </div>

            <div class="section-card">
                <div class="card-header">
                    <i class="fas fa-prescription"></i> 4. Indicaciones Post-Operatorias
                </div>
                <div class="card-body">
                    <label for="indicaciones" class="form-label">Instrucciones para el paciente</label>
                    <textarea name="indicaciones" id="indicaciones" class="form-control" required placeholder="- Tomar medicación cada 8 horas&#10;- Dieta blanda por 24 horas&#10;- Evitar irritantes" rows="4"></textarea>
                </div>
            </div>

            <div class="section-card">
                <div class="card-header">
                    <i class="fas fa-tasks"></i> 5. Estado del Caso
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <label for="estado" class="form-label">Situación actual:</label>
                        </div>
                        <div class="col-md-6">
                            <select name="estado" id="estado" class="form-select">
                                <option value="activo" selected>🔵 Activo (En tratamiento)</option>
                                <option value="inactivo">⚪ Inactivo (Finalizado/Pendiente)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-3 mt-4">
                <button type="submit" class="btn-action">
                    <i class="fas fa-save me-2"></i> GUARDAR Y FINALIZAR
                </button>
                
                <div class="text-center mt-2">
                    <a href="<?= base_url('Inicio') ?>" class="btn-back text-decoration-none">
                        <i class="fas fa-arrow-left me-2"></i>Volver al Inicio
                    </a>
                </div>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>