<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Resumen Historial Clínico - Paciente</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            background: #f0f8ff; /* Azul muy suave */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 1.2rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);
            margin-bottom: 30px;
            border-radius: 0 0 15px 15px;
        }

        header h1 {
            margin: 0;
            font-weight: 700;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
        }

        header h1 i {
            font-size: 2rem;
            color: #e0f0ff;
        }

        .container {
            max-width: 900px;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        h2 {
            font-weight: 600;
            color: #003366;
            margin-bottom: 0.3rem;
        }

        p {
            color: #555;
            font-size: 0.95rem;
            margin-bottom: 1.4rem;
        }

        table.table {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        table thead.table-dark {
            background-color: #0056b3;
            color: #fff;
        }

        table tbody tr:hover {
            background-color: #e9f5ff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-weight: 600;
            box-shadow: 0 3px 6px rgba(0, 123, 255, 0.3);
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>

<body>
    <header>
        <h1><i class="bi bi-tooth"></i> Consultorio Odontológico OdontoMandy</h1>
    </header>

    <div class="container">
        <h2>Historial Clínico de <?= htmlspecialchars($datosPaciente->nombres_apellidos) ?></h2>
        <p><strong>ID Paciente:</strong> <?= htmlspecialchars($datosPaciente->id) ?></p>

        <a href="<?= base_url('SelectCasos') ?>" class="btn btn-secondary mb-4"><i class="bi bi-arrow-left-circle"></i> Volver a lista de casos</a>

        <?php if (!empty($historial)): ?>
            <table class="table table-striped table-bordered shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>Diagnóstico</th>
                        <th>Tratamiento</th>
                        <th>Indicaciones</th>
                        <th>Fecha de registro</th>
                        <th>Estado del paciente</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($historial as $detalle): ?>
                        <tr>
                            <td><?= htmlspecialchars($detalle->diagnostico) ?></td>
                            <td><?= htmlspecialchars($detalle->tratamiento) ?></td>
                            <td><?= htmlspecialchars($detalle->indicaciones) ?></td>
                            <td><?= htmlspecialchars($detalle->fecha_del_registro) ?></td>
                            <td><?= htmlspecialchars($detalle->estado) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= base_url('MostrarCD/' . $datosPaciente->id) ?>" class="btn btn-primary mt-4"><i class="bi bi-plus-circle"></i> Agregar nuevo detalle</a>
        <?php else: ?>
            <p class="fs-5 text-muted">No hay registros en el historial clínico para este paciente.</p>
            <a href="<?= base_url('MostrarCD/' . $datosPaciente->id) ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Agregar primer detalle</a>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
