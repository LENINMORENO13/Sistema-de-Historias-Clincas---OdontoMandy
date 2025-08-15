<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Casos Clínicos - OdontoMandy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Estilos generales del cuerpo */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom, #e0eafc, #cfdef3);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        /* Contenedor principal */
        .container {
            max-width: 1200px;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            margin-top: 0;
            margin-bottom: 50px;
            flex-grow: 1;
        }

        h2,
        h3 {
            color: #0056b3;
            font-weight: bold;
            text-align: center;
            margin-bottom: 3rem;
        }

        h3 {
            margin-top: 3rem;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            text-align: left;
        }

        label {
            font-weight: 600;
            color: #0056b3;
            margin-bottom: .5rem;
        }

        /* Campos de entrada */
        input.form-control {
            border: 1px solid #007bff;
            border-radius: 8px;
            background-color: #ffffff;
            padding: 0.75rem 1rem;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        input.form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
            outline: none;
        }

        /* Botón de Buscar */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 8px;
            padding: 10px 30px;
            font-weight: bold;
            font-size: 1.1rem;
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        }


        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .table {
            border-collapse: separate;
            border-spacing: 0;
            margin-bottom: 0;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table thead {
            background-color: #007bff;
            color: white;
        }

        .table th {
            padding: 1rem 1.25rem;
            text-align: left;
            font-weight: 700;
            border-bottom: 2px solid #0056b3;
            border-color: #0056b3 !important;
        }

        .table td {
            padding: 0.85rem 1.25rem;
            text-align: left;
            vertical-align: middle;
            border-color: #e9ecef;
        }

        .table tbody tr:nth-of-type(odd) {
            background-color: #ffffff;
        }

        .table tbody tr:nth-of-type(even) {
            background-color: #f8f9fa;
        }

        .table-hover tbody tr:hover {
            background-color: #e2f2ff;
            cursor: pointer;
        }

        .alert-warning {
            border: 1px solid #ffda6a;
            background-color: #fff3cd;
            color: #664d03;
            border-radius: 8px;
            padding: 1rem 1.5rem;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(255, 193, 7, 0.2);
        }

        .form-section {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-top: 2rem;
            margin-bottom: 3rem;
        }

        .card-list {
            display: none;
        }
        
        .patient-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 20px;
            margin-bottom: 20px;
            border-left: 5px solid #007bff; 
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .patient-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
        }

        .card-title {
            font-weight: bold;
            color: #0056b3;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        
        .card-text-item {
            margin-bottom: 5px;
            font-size: 0.95rem;
        }
        
        .card-text-item strong {
            color: #007bff;
        }

        /* Media Queries para Responsividad */
        @media (min-width: 769px) {
            .card-list {
                display: none;
            }
        }
        @media (max-width: 768px) {
            /* Ocultar la tabla en pantallas pequeñas */
            .table-responsive {
                display: none;
            }
            /* Mostrar la vista de tarjetas en pantallas pequeñas */
            .card-list {
                display: block;
            }
            .container {
                padding: 20px;
                margin-top: 20px;
                margin-bottom: 20px;
            }
            h2 {
                font-size: 1.8rem;
                margin-bottom: 2rem;
            }
            h3 {
                font-size: 1.5rem;
                margin-top: 2rem;
                margin-bottom: 1rem;
            }
            .form-section {
                padding: 20px;
                margin-top: 1rem;
                margin-bottom: 1.5rem;
            }
            .btn-primary {
                width: 100%;
                justify-content: center;
            }
        }
        
        @media (max-width: 576px) {
            .container {
                padding: 15px;
            }
            h2 {
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
            }
            h3 {
                font-size: 1.3rem;
                margin-top: 1.5rem;
                margin-bottom: 0.8rem;
            }
            .form-section {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <?= $this->include('header') ?>
    <div class="container">
        <h2 class="text-center mb-4"><i class="bi bi-person-lines-fill me-2"></i> Filtro de Búsqueda de Casos Clínicos</h2>

        <div class="form-section">
            <form method="get" action="<?= site_url('CasosPacientes') ?>">
                <div class="row g-4">
                    <div class="col-md-4">
                        <label for="buscar_caso_nombre">Nombre o Apellido del Paciente</label>
                        <input type="text" id="buscar_caso_nombre" name="buscar_caso_nombre" class="form-control" placeholder="Ej: Jorge Rodriguez" value="<?= esc($buscar_caso_nombre ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="buscar_caso_cedula">Cédula del Paciente</label>
                        <input type="text" id="buscar_caso_cedula" name="buscar_caso_cedula" class="form-control" placeholder="Ej: 1234567890" value="<?= esc($buscar_caso_cedula ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="buscar_caso_fecha">Fecha de Registro (Caso)</label>
                        <input type="date" id="buscar_caso_fecha" name="buscar_caso_fecha" class="form-control" value="<?= esc($buscar_caso_fecha ?? '') ?>">
                    </div>
                </div>
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search me-2"></i> Buscar Casos</button>
                </div>
            </form>
        </div>

        <?php if (isset($mensaje_error)): ?>
            <div class="alert alert-warning mt-4"><i class="bi bi-exclamation-triangle-fill me-2"></i><?= esc($mensaje_error) ?></div>
        <?php endif; ?>

        <?php if (!empty($casosPacientes)): ?>
            <h3 class="mt-5"><i class="bi bi-clipboard2-data-fill me-2"></i>Resultados de la Búsqueda</h3>

            <div class="table-responsive mt-3">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th><i class="bi bi-person-fill me-2"></i>Nombres y Apellidos</th>
                            <th><i class="bi bi-geo-alt-fill me-2"></i>Dirección</th>
                            <th><i class="bi bi-calendar-date-fill me-2"></i>Fecha Nacimiento</th>
                            <th><i class="bi bi-person-fill-up me-2"></i>Edad</th>
                            <th><i class="bi bi-telephone-fill me-2"></i>Teléfono</th>
                            <th><i class="bi bi-file-earmark-person-fill me-2"></i>Cédula</th>
                            <th><i class="bi bi-chat-dots-fill me-2"></i>Motivo de Consulta</th>
                            <th><i class="bi bi-capsule-fill me-2"></i>Ant. Personal 1</th>
                            <th><i class="bi bi-capsule-fill me-2"></i>Ant. Personal 2</th>
                            <th><i class="bi bi-people-fill me-2"></i>Ant. Familiar 1</th>
                            <th><i class="bi bi-people-fill me-2"></i>Ant. Familiar 2</th>
                            <th><i class="bi bi-calendar-check-fill me-2"></i>Fecha de Registro</th>
                            <th><i class="bi bi-eye-fill me-2"></i>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($casosPacientes as $caso): ?>
                            <tr>
                                <td class="text-nowrap"><?= esc($caso->nombres_apellidos) ?></td>
                                <td><?= esc($caso->direccion) ?></td>
                                <td class="text-nowrap"><?= esc($caso->fecha_nacimiento) ?></td>
                                <td><?= esc($caso->edad) ?></td>
                                <td class="text-nowrap"><?= esc($caso->telefono) ?></td>
                                <td class="text-nowrap"><?= esc($caso->cedula) ?></td>
                                <td><?= esc($caso->motivo_consulta) ?></td>
                                <td><?= esc($caso->antecedente_personal_1) ?></td>
                                <td><?= esc($caso->antecedente_personal_2) ?></td>
                                <td><?= esc($caso->antecedente_familiar_1) ?></td>
                                <td><?= esc($caso->antecedente_familiar_2) ?></td>
                                <td class="text-nowrap"><?= esc($caso->fecha_registro) ?></td>
                                <td class="px-4 text-center text-nowrap">
                                    <a href="<?= site_url('ResumenHistorial/' . $caso->id) ?>" class="btn btn-sm btn-outline-info" title="Ver Detalles del Caso">
                                        <i class="bi bi-eye"></i> Ver
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="card-list mt-3">
                <?php foreach ($casosPacientes as $caso): ?>
                    <div class="patient-card">
                        <div class="card-title"><i class="bi bi-person-fill me-2"></i><?= esc($caso->nombres_apellidos) ?></div>
                        <div class="card-text-item"><strong>Cédula:</strong> <?= esc($caso->cedula) ?></div>
                        <div class="card-text-item"><strong>Dirección:</strong> <?= esc($caso->direccion) ?></div>
                        <div class="card-text-item"><strong>Fecha de Nacimiento:</strong> <?= esc($caso->fecha_nacimiento) ?></div>
                        <div class="card-text-item"><strong>Edad:</strong> <?= esc($caso->edad) ?></div>
                        <div class="card-text-item"><strong>Teléfono:</strong> <?= esc($caso->telefono) ?></div>
                        <div class="card-text-item"><strong>Motivo de Consulta:</strong> <?= esc($caso->motivo_consulta) ?></div>
                        <div class="card-text-item"><strong>Ant. Personal 1:</strong> <?= esc($caso->antecedente_personal_1) ?></div>
                        <div class="card-text-item"><strong>Ant. Personal 2:</strong> <?= esc($caso->antecedente_personal_2) ?></div>
                        <div class="card-text-item"><strong>Ant. Familiar 1:</strong> <?= esc($caso->antecedente_familiar_1) ?></div>
                        <div class="card-text-item"><strong>Ant. Familiar 2:</strong> <?= esc($caso->antecedente_familiar_2) ?></div>
                        <div class="card-text-item"><strong>Fecha de Registro:</strong> <?= esc($caso->fecha_registro) ?></div>
                        <div class="text-end mt-3">
                            <a href="<?= site_url('ResumenHistorial/' . $caso->id) ?>" class="btn btn-sm btn-outline-info" title="Ver Detalles del Caso">
                                <i class="bi bi-eye"></i> Ver Historial
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <?php if (!isset($mensaje_error) && (isset($_GET['buscar_caso_nombre']) || isset($_GET['buscar_caso_cedula']) || isset($_GET['buscar_caso_fecha']))): ?>
                <div class="alert alert-info mt-5 text-center" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>No se encontraron resultados para su búsqueda.
                </div>
            <?php else: ?>
                <div class="alert alert-info mt-5 text-center" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>Utilice los filtros de arriba para buscar casos clínicos.
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>