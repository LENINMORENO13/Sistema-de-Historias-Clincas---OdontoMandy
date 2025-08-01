<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Casos Clínicos - OdontoMandy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Estilos generales del cuerpo para asegurar el layout full-height */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom, #e0eafc, #cfdef3);
            /* Degradado suave para un fondo moderno */
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            /* Eliminar margen predeterminado del body */
        }

        /* Estilos para el contenedor principal, similar al dashboard */
        .container {
            max-width: 1200px;
            /* Ancho máximo para el contenido */
            background-color: #ffffff;
            /* Fondo blanco para el contenedor */
            padding: 40px;
            /* Más padding interno */
            border-radius: 15px;
            /* Bordes redondeados */
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            /* Sombra más suave y extendida */
            width: 0%;
            /*
             * CAMBIO: Hecho a 0 para corregir el width de la página
             */
            margin-top: 0;
            /* CAMBIO: Eliminar el margen superior que causaba la línea blanca */
            margin-bottom: 50px;
            /* Espacio inferior para el contenedor */
            flex-grow: 1;
            /* Permite que el contenedor crezca y empuje el footer hacia abajo */
        }

        /* Títulos */
        h2,
        h3 {
            color: #0056b3;
            /* Azul consistente con el header y dashboard */
            font-weight: bold;
            text-align: center;
            /* Centrar títulos */
            margin-bottom: 3rem;
            /* Más espacio debajo de los títulos principales */
        }

        h3 {
            margin-top: 3rem;
            /* Margen superior para el título de resultados */
            margin-bottom: 1.5rem;
            /* Margen inferior para el título de resultados */
            font-size: 1.8rem;
            /* Tamaño de fuente para el título de resultados */
            text-align: left;
            /* Alinear el título de resultados a la izquierda */
        }

        /* Labels */
        label {
            font-weight: 600;
            color: #0056b3;
            /* Color azul para labels */
            margin-bottom: .5rem;
            /* Pequeño margen inferior */
        }

        /* Campos de entrada */
        input.form-control {
            border: 1px solid #007bff;
            /* Borde azul para inputs */
            border-radius: 8px;
            /* Bordes más redondeados */
            background-color: #ffffff;
            padding: 0.75rem 1rem;
            /* Más padding para los inputs */
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
            /* Sombra interna sutil */
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        input.form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
            /* Sombra de enfoque de Bootstrap */
            outline: none;
        }

        /* Botón de Buscar */
        .btn-primary {
            background-color: #007bff;
            /* Azul primario */
            border-color: #007bff;
            border-radius: 8px;
            /* Bordes redondeados */
            padding: 10px 30px;
            /* Padding más generoso */
            font-weight: bold;
            font-size: 1.1rem;
            /* Tamaño de fuente ligeramente mayor */
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
            display: inline-flex;
            /* Para alinear el icono y el texto */
            align-items: center;
            gap: 8px;
            /* Espacio entre icono y texto */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* Azul más oscuro al pasar el mouse */
            border-color: #0056b3;
            transform: translateY(-2px);
            /* Pequeño efecto de elevación */
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
            /* Sombra al pasar el mouse */
        }

        /* Estilos de la tabla */
        .table-responsive {
            border-radius: 12px;
            /* Bordes redondeados para el contenedor de la tabla */
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            /* Sombra para la tabla */
        }

        .table {
            border-collapse: separate;
            /* Necesario para que border-radius funcione en las celdas */
            border-spacing: 0;
            margin-bottom: 0;
            /* Eliminar margen inferior de la tabla */
        }

        .table-bordered {
            border: 1px solid #dee2e6;
            /* Borde más suave */
        }

        .table thead {
            background-color: #007bff;
            /* Fondo del encabezado de la tabla azul primario */
            color: white;
        }

        .table th {
            padding: 1rem 1.25rem;
            /* Más padding en los encabezados */
            text-align: left;
            font-weight: 700;
            border-bottom: 2px solid #0056b3;
            /* Borde inferior más oscuro */
            border-color: #0056b3 !important;
            /* Asegurar el color del borde */
        }

        .table td {
            padding: 0.85rem 1.25rem;
            /* Más padding en las celdas de datos */
            text-align: left;
            vertical-align: middle;
            /* Centrar verticalmente el contenido de la celda */
            border-color: #e9ecef;
            /* Color de borde más claro para las celdas */
        }

        /* Filas alternas (efecto cebra) */
        .table tbody tr:nth-of-type(odd) {
            background-color: #ffffff;
        }

        .table tbody tr:nth-of-type(even) {
            background-color: #f8f9fa;
            /* Gris muy suave para filas pares */
        }

        /* Hover en filas */
        .table-hover tbody tr:hover {
            background-color: #e2f2ff;
            /* Resaltado azul claro al pasar el mouse */
            cursor: pointer;
        }

        /* Alerta de advertencia */
        .alert-warning {
            border: 1px solid #ffda6a;
            /* Borde más suave para la alerta */
            background-color: #fff3cd;
            /* Fondo más suave */
            color: #664d03;
            /* Texto más suave */
            border-radius: 8px;
            padding: 1rem 1.5rem;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(255, 193, 7, 0.2);
            /* Sombra sutil */
        }

        /* Sección del formulario */
        .form-section {
            background-color: #ffffff;
            padding: 30px;
            /* Más padding */
            border-radius: 12px;
            /* Bordes más redondeados */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            /* Sombra más pronunciada */
            margin-top: 2rem;
            /* Espacio superior para la sección del formulario */
            margin-bottom: 3rem;
            /* Espacio inferior para la sección del formulario */
        }

        /* Media Queries para Responsividad */
        @media (max-width: 992px) {
            .container {
                padding: 30px;
                margin-top: 30px;
                margin-bottom: 30px;
            }

            h2 {
                font-size: 2rem;
            }

            h3 {
                font-size: 1.6rem;
            }

            .form-section {
                padding: 25px;
                margin-top: 1.5rem;
                margin-bottom: 2rem;
            }

            .btn-primary {
                padding: 8px 20px;
                font-size: 1rem;
            }

            .table th,
            .table td {
                padding: 0.75rem 1rem;
                font-size: 0.9em;
            }
        }

        @media (max-width: 768px) {
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

            /* Botón ocupa todo el ancho */
            .table-responsive {
                border-radius: 8px;
            }

            .table th,
            .table td {
                padding: 0.6rem 0.8rem;
                font-size: 0.8em;
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
