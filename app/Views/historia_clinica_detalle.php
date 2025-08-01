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
            /* Consistencia con la primera parte */
            background: linear-gradient(to bottom, #e0eafc, #cfdef3);
            /* Consistencia con la primera parte */
            margin: 0;
            padding: 20px;
            /* Padding general para no pegar al borde */
            display: flex;
            justify-content: center;
            align-items: flex-start;
            /* Alinear al inicio del contenedor, no al centro vertical */
            min-height: 100vh;
        }

        .container {
            max-width: 700px;
            /* Un poco más ancho para albergar los card */
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            /* Sombra para dar profundidad */
            margin-top: 30px;
            /* Separación de la parte superior */
            margin-bottom: 30px;
            /* Separación de la parte inferior */
        }

        h1 {
            font-weight: bold;
            color: #2c3e50;
            /* Color de título más oscuro */
            padding-bottom: 15px;
            border-bottom: 2px solid #3498db;
            /* Línea inferior para el título */
            margin-bottom: 30px;
            /* Mayor margen para el título principal */
            text-align: center;
            font-size: 2em;
            /* Tamaño de título más grande */
        }

        .card {
            border: none;
            /* Eliminar borde predeterminado de la tarjeta */
            margin-bottom: 25px;
        }

        .card-header {
            font-weight: bold;
            background-color: #3498db !important;
            /* Azul más vibrante para los encabezados */
            color: white !important;
            padding: 12px 20px;
            border-radius: 8px 8px 0 0 !important;
            /* Bordes redondeados superiores */
            font-size: 1.1em;
        }

        .card-body {
            padding: 25px;
            border: 1px solid #dcdcdc;
            /* Borde suave para los cuerpos de las tarjetas */
            border-top: none;
            /* Eliminar el borde superior para que se una al header */
            border-radius: 0 0 8px 8px;
            /* Bordes redondeados inferiores */
        }

        /* Estilos para los campos de formulario */
        .form-label {
            /* Usamos form-label de Bootstrap para consistencia */
            font-weight: 600;
            color: #495057;
            /* Un gris oscuro profesional */
            margin-bottom: .5rem;
        }

        .form-control,
        .form-select {
            border: 1px solid #ced4da;
            /* Borde más suave por defecto */
            border-radius: .4rem;
            /* Bordes ligeramente más redondeados */
            padding: .75rem 1rem;
            font-size: 1rem;
            transition: all 0.2s ease-in-out;
            box-shadow: none;
            /* Eliminar shadow por defecto */
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #3498db;
            /* Resaltar borde en foco con el color primario */
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
            /* Sombra de foco con el color primario */
            outline: none;
        }

        .form-control[readonly] {
            background-color: #e9ecef;
            /* Fondo diferente para campos de solo lectura */
            cursor: not-allowed;
            border-color: #ced4da;
        }

        /* Botones */
        .btn-primary {
            background-color: #28a745;
            /* Botón de guardar en verde (consistencia) */
            border-color: #28a745;
            font-size: 1.1em;
            /* Un poco más pequeño que el de la primera parte si es necesario, o igual */
            padding: 12px 25px;
            transition: background-color 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
            width: 100%;
            /* Ocupa todo el ancho */
            border-radius: 8px;
            /* Bordes más redondeados */
            margin-top: 20px;
            /* Espacio antes del botón */
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
            transform: translateY(-2px);
            /* Pequeño efecto de levantamiento */
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

        /* Alineación del icono en el botón */
        .btn-primary i {
            margin-right: 8px;
        }

        /* Estilos responsivos */
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
    <?php if (session()->getFlashdata('mensaje_exito')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('mensaje_exito'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('mensaje_error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('mensaje_error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

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