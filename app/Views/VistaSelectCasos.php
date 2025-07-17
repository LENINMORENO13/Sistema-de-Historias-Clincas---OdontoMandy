<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Casos Clínicos - Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: rgb(194, 217, 241);
        }

        .container {
            margin-top: 30px;
        }

        h2 {
            color: #495057;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        .card {
            margin-bottom: 20px;
            box-shadow: 0 2px 6px rgb(0 0 0 / 0.15);
        }

        .odontograma-box {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
            max-width: 250px;
        }

        .odontograma-diente {
            width: 24px;
            height: 24px;
            border: 1px solid #333;
            border-radius: 4px;
            text-align: center;
            font-size: 10px;
            line-height: 24px;
            color: white;
            cursor: default;
        }

        /* Colores para estado del diente */
        .rojo {
            background-color: #dc3545;
        }

        .amarillo {
            background-color: #ffc107;
            color: #212529;
        }

        .verde {
            background-color: #28a745;
        }

        .ninguno {
            background-color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Lista de Casos Clínicos</h2>

        <?php foreach ($VectorDatos as $caso): ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($caso->paciente) ?> (<?= htmlspecialchars($caso->edad) ?> años)</h5>
                    <p class="card-text">
                        <strong>Dirección:</strong> <?= htmlspecialchars($caso->direccion) ?><br />
                        <strong>Fecha de nacimiento:</strong> <?= htmlspecialchars($caso->fecha_nacimiento) ?><br />
                        <strong>Teléfono:</strong> <?= htmlspecialchars($caso->telefono) ?><br />
                        <strong>Cédula:</strong> <?= htmlspecialchars($caso->cedula) ?><br />
                        <strong>Motivo de Consulta:</strong> <?= htmlspecialchars($caso->motivo_consulta) ?><br />
                        <strong>Antecedentes Personales:</strong> <?= htmlspecialchars($caso->antecedente_personal_1) ?>, <?= htmlspecialchars($caso->antecedente_personal_2) ?><br />
                        <strong>Antecedentes Familiares:</strong> <?= htmlspecialchars($caso->antecedente_familiar_1) ?>, <?= htmlspecialchars($caso->antecedente_familiar_2) ?><br />
                        <strong>Fecha de Registro:</strong> <?= htmlspecialchars($caso->fecha_registro) ?><br />
                    </p>

                    <div>
                        <strong>Odontograma:</strong>
                        <div class="odontograma-box mt-2">
                            <?php
                            $odontograma = json_decode($caso->odontograma, true);
                            if ($odontograma && is_array($odontograma)) {
                                foreach ($odontograma as $diente => $estado) {
                                    $clase_color = 'ninguno'; // color por defecto
                                    if ($estado === 'rojo') $clase_color = 'rojo';
                                    else if ($estado === 'amarillo') $clase_color = 'amarillo';
                                    else if ($estado === 'verde') $clase_color = 'verde';

                                    echo '<div class="odontograma-diente ' . $clase_color . '" title="Diente ' . htmlspecialchars($diente) . ': ' . htmlspecialchars($estado) . '">' . htmlspecialchars($diente) . '</div>';
                                }
                            } else {
                                echo '<span>No hay odontograma disponible</span>';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="<?= base_url() . 'ActualizarCaso/' . $caso->id ?>" class="btn btn-warning btn-sm me-2">Actualizar</a>
                        <!-- <a href="<?= base_url() . 'EliminarCasos/' . $caso->id ?>" class="btn btn-danger btn-sm">Eliminar</a> -->
                        <a href="<?= base_url('ResumenHistorial/' . $caso->id) ?>" class="btn btn-sm btn-primary">
                            Ver Historial Clínico
                        </a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>