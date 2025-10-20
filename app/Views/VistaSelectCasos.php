            <!DOCTYPE html>
            <html lang="es">

            <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <title>Gestión de Casos Clínicos - OdontoMandy</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
                <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
                
                <link rel="stylesheet" href="<?= base_url('public/css/VistaSelectCasos.css') ?>">
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