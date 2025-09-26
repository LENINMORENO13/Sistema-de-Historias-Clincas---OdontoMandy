            <!DOCTYPE html>
            <html lang="es">

            <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <title>Gestión de Casos Clínicos - OdontoMandy</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
                <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
                <style>
                    body {
                        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        background: linear-gradient(to bottom, #e0eafc, #cfdef3);
                        min-height: 100vh;
                        display: flex;
                        flex-direction: column;
                    }

                    header {
                        background-color: #007bff;
                        color: white;
                        padding: 1.5rem 0;
                        text-align: center;
                        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
                        margin-bottom: 30px;
                        border-radius: 0 0 15px 15px;
                        width: 100%;
                    }

                    header h1 {
                        margin: 0;
                        font-weight: 700;
                        font-size: 2.2rem;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 0.8rem;
                    }

                    header h1 i {
                        font-size: 2.4rem;
                        color: #e0f0ff;
                    }

                    main {
                        flex-grow: 1;
                        /* Permite que el contenido principal ocupe el espacio restante */
                        display: flex;
                        justify-content: center;
                        padding: 0 20px;

                    }

                    .container {
                        max-width: 1200px;
                        background-color: #ffffff;
                        padding: 30px;
                        border-radius: 12px;
                        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
                        width: 100%;
                        margin-bottom: 30px;
                    }

                    .page-title {
                        font-weight: bold;
                        color: #0056b3;
                        padding-bottom: 15px;
                        border-bottom: 2px solid #007bff;
                        margin-bottom: 30px;
                        text-align: center;
                        font-size: 1.8em;
                        display: flex;
                        /* Para el icono */
                        align-items: center;
                        justify-content: center;
                        gap: 0.5rem;
                    }

                    .header-actions {
                        margin-bottom: 30px;
                        display: flex;
                        justify-content: flex-end;
                        align-items: center;
                    }

                    .card.case-card {
                        margin-bottom: 25px;
                        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
                        border: 1px solid #dee2e6;
                        border-radius: 10px;
                        transition: transform 0.2s ease, box-shadow 0.2s ease;
                    }

                    .card.case-card:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
                    }

                    .card-body {
                        padding: 25px;
                    }

                    .card-title {
                        color: #003366;
                        font-weight: bold;
                        font-size: 1.3em;
                        margin-bottom: 15px;
                        padding-bottom: 10px;
                        border-bottom: 1px solid #e9ecef;
                    }

                    .card-text {
                        font-size: 0.95em;
                        color: #555;
                        margin-bottom: 15px;
                        line-height: 1.6;
                    }

                    .card-text strong {
                        color: #34495e;
                    }

                    .odontograma-section {
                        margin-top: 15px;
                        margin-bottom: 20px;
                        padding-top: 10px;
                        border-top: 1px dashed #ced4da;
                    }

                    .odontograma-box {
                        display: flex;
                        flex-wrap: wrap;
                        gap: 5px;
                        max-width: 280px;
                        background-color: #f0f8ff;
                        padding: 10px;
                        border-radius: 8px;
                        border: 1px solid #b0e0e6;
                    }

                    .odontograma-diente {
                        width: 28px;
                        height: 28px;
                        border: 1px solid #0004ffff;
                        border-radius: 5px;
                        text-align: center;
                        font-size: 11px;
                        line-height: 26px;
                        color: white;
                        font-weight: bold;
                        cursor: default;
                        flex-shrink: 0;
                    }

                    /* Colores para estado del diente */
                    .rojo {
                        background-color: #dc3545;
                        border-color: #c82333;
                    }

                    .amarillo {
                        background-color: #ffc107;
                        color: #212529;
                        border-color: #e0a800;
                    }

                    .verde {
                        background-color: #28a745;
                        border-color: #218838;
                    }

                    .azul {
                        background-color: #0056b3;
                        border-color: #004085;
                    }


                    .ninguno {
                        background-color: #e9ecef;
                        color: #6c757d;
                        border-color: #ced4da;
                    }

                    .card-actions {
                        display: flex;
                        justify-content: flex-end;
                        gap: 10px;
                        margin-top: 20px;
                        padding-top: 15px;
                        border-top: 1px solid #eee;
                    }

                    .btn {
                        border-radius: 0.5rem;
                        font-weight: 600;
                        padding: 0.5rem 1rem;
                        transition: background-color 0.2s ease, border-color 0.2s ease, transform 0.2s ease;
                    }

                    .btn-warning {
                        background-color: #ffc107;
                        border-color: #ffc107;
                        color: #212529;
                    }

                    .btn-warning:hover {
                        background-color: #e0a800;
                        border-color: #d39e00;
                        transform: translateY(-2px);
                    }

                    .btn-primary {
                        background-color: #007bff;
                        border-color: #007bff;
                    }

                    .btn-primary:hover {
                        background-color: #0056b3;
                        border-color: #004085;
                        transform: translateY(-2px);
                    }

                    .btn-add-new {
                        background-color: #28a745;
                        border-color: #28a745;
                        color: white;
                        padding: 10px 20px;
                        font-size: 1.05em;
                        display: inline-flex;
                        align-items: center;
                        gap: 8px;
                    }

                    .btn-add-new:hover {
                        background-color: #218838;
                        border-color: #1e7e34;
                        transform: translateY(-2px);
                    }

                    .alert-info-custom {
                        background-color: #d1ecf1;
                        border-color: #bee5eb;
                        color: #0c5460;
                        padding: 25px;
                        border-radius: 10px;
                        text-align: center;
                        font-size: 1.1em;
                        margin-bottom: 30px;
                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                    }

                    .row-cols-1.row-cols-md-2.row-cols-lg-3 .col {
                        display: flex;
                    }

                    .row-cols-1.row-cols-md-2.row-cols-lg-3 .col .card {
                        flex: 1;
                    }

                    /* Media Queries */
                    @media (max-width: 992px) {
                        .odontograma-box {
                            max-width: none;
                            justify-content: center;
                        }
                    }

                    @media (max-width: 768px) {
                        header h1 {
                            font-size: 1.8rem;
                            gap: 0.6rem;
                        }

                        header h1 i {
                            font-size: 2rem;
                        }

                        main {
                            padding: 0 15px;
                        }

                        .container {
                            padding: 20px;
                        }

                        .page-title {
                            font-size: 1.5em;
                            margin-bottom: 20px;
                        }

                        .header-actions {
                            justify-content: center;
                            margin-bottom: 20px;
                        }

                        .btn-add-new {
                            width: 100%;
                            text-align: center;
                        }

                        .card-title {
                            font-size: 1.1em;
                        }

                        .card-actions {
                            flex-direction: column;
                            gap: 10px;
                        }

                        .card-actions .btn {
                            width: 100%;
                        }

                        .odontograma-diente {
                            width: 25px;
                            height: 25px;
                            font-size: 9px;
                            line-height: 23px;
                        }
                    }

                    @media (max-width: 576px) {
                        main {
                            padding: 0 10px;
                        }

                        header {
                            padding: 1rem 0;
                        }

                        header h1 {
                            font-size: 1.5rem;
                        }

                        header h1 i {
                            font-size: 1.7rem;
                        }

                        .container {
                            padding: 10px;
                        }
                    }
                </style>
            </head>

            <body>
                <main>
                    <div class="container">
                        <h2 class="page-title"><i class="bi bi-folder-fill me-2"></i> Gestión de Casos Clínicos</h2>

                        <?php if (empty($VectorDatos)): ?>
                            <div class="alert alert-info-custom" role="alert">
                                <i class="bi bi-info-circle-fill me-2"></i> No se han encontrado casos clínicos registrados en el sistema. ¡Empiece a agregar uno nuevo!
                            </div>
                        <?php else: ?>
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                <?php foreach ($VectorDatos as $caso): ?>
                                    <div class="col">
                                        <div class="card case-card">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    Paciente: <?= htmlspecialchars($caso->paciente) ?> (<?= calcularEdad($caso->fecha_nacimiento) ?> años)
                                                </h5>
                                                <p class="card-text">
                                                    <strong>Cédula:</strong> <?= htmlspecialchars($caso->cedula) ?><br />
                                                    <strong>Teléfono:</strong> <?= htmlspecialchars($caso->telefono) ?><br />
                                                    <strong>Motivo de Consulta:</strong> <?= htmlspecialchars($caso->motivo_consulta) ?><br />
                                                    <strong>Fecha de Registro:</strong> <?= htmlspecialchars($caso->fecha_registro) ?>
                                                </p>

                                                <div class="odontograma-section">
                                                    <h6 class="mb-2" style="color: #007bff; font-weight: bold;">
                                                        <i class="bi bi-grid-3x3-gap-fill me-1"></i> Odontograma Resumido:
                                                    </h6>
                                                    <div class="odontograma-box">
                                                        <?php
                                                        $odontograma = json_decode($caso->odontograma, true);
                                                        if ($odontograma && is_array($odontograma)) {
                                                            $dientes_visibles = [];
                                                            foreach ($odontograma as $diente => $estado) {
                                                                $color = '';
                                                                if (is_array($estado) && isset($estado['color'])) {
                                                                    $color = $estado['color'];
                                                                } else {
                                                                    $color = $estado;
                                                                }
                                                                if ($color === 'rojo' || $color === 'azul') {
                                                                    $dientes_visibles[$diente] = $estado;
                                                                }
                                                            }
                                                            if (empty($dientes_visibles) && count($odontograma) > 0) {
                                                                $dientes_visibles = array_slice($odontograma, 0, 8, true);
                                                            } elseif (empty($dientes_visibles)) {
                                                                echo '<span class="text-muted fst-italic">No hay datos de odontograma específicos.</span>';
                                                            }
                                                            foreach ($dientes_visibles as $diente => $estado) {
                                                                $clase_color = 'ninguno';
                                                                $color = '';
                                                                $nota = '';
                                                                if (is_array($estado)) {
                                                                    $color = isset($estado['color']) ? $estado['color'] : 'ninguno';
                                                                    $nota = isset($estado['nota']) ? $estado['nota'] : '';
                                                                } else {
                                                                    $color = $estado;
                                                                }
                                                                if ($color === 'rojo') $clase_color = 'rojo';
                                                                else if ($color === 'azul') $clase_color = 'azul';


                                                                $titulo = 'Diente ' . htmlspecialchars($diente) . ': ' . htmlspecialchars($color);
                                                                if (!empty($nota)) {
                                                                    $titulo .= ' - Nota: ' . htmlspecialchars($nota);
                                                                }

                                                                echo '<div class="odontograma-diente ' . $clase_color . '" title="' . $titulo . '">' . htmlspecialchars($diente) . '</div>';
                                                            }
                                                        } else {
                                                            echo '<span class="text-muted fst-italic">No hay información de odontograma disponible.</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="card-actions">
                                                    <a href="<?= base_url('ResumenHistorial/' . $caso->id) ?>" class="btn btn-primary btn-sm">
                                                        <i class="bi bi-file-earmark-medical-fill"></i> Ver Historial
                                                    </a>
                                                    <a href="<?= base_url('reporte/paciente/' . $caso->id) ?>" class="btn btn-primary btn-sm">
                                                        <i class="bi bi-file-earmark-medical-fill"></i> Generar reporte individual
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </main>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
                        tooltipTriggerList.forEach(function(el) {
                            new bootstrap.Tooltip(el);
                        });
                    });
                </script>
            </body>

            </html>