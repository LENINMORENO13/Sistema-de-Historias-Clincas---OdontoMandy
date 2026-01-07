<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pacientes - OdontoMandy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('public/css/VistaSelectCasos.css') ?>">
</head>

<body>

    <div class="header-line"></div>

    <main class="py-5 px-3">
        <div class="container-xl">

            <div class="row align-items-center mb-5 g-3">
                <div class="col-md-5">
                    <h2 class="fw-bold text-dark m-0 d-flex align-items-center">
                        <i class="bi bi-people-fill text-primary me-2"></i> Mis Pacientes
                    </h2>
                    <p class="text-muted mb-0 small ps-1">Gestión de expedientes e historias clínicas.</p>
                </div>

                <div class="col-md-7">
                    <div class="d-flex gap-3 justify-content-md-end align-items-center flex-wrap">
                        <div class="search-wrapper flex-grow-1">
                            <i class="bi bi-search search-icon"></i>
                            <input type="text" id="buscador" class="form-control search-input" placeholder="Buscar por nombre o cédula...">
                        </div>
                        <a href="<?= base_url('InsertCC') ?>" class="btn btn-primary btn-new-case shadow-sm">
                            <i class="bi bi-plus-lg"></i> <span>Nuevo Caso</span>
                        </a>
                    </div>
                </div>
            </div>

            <?php if (empty($VectorDatos)): ?>
                <div class="empty-state-card text-center">
                    <div class="icon-box mb-3"><i class="bi bi-folder2-open"></i></div>
                    <h5 class="fw-bold text-secondary">Base de datos vacía</h5>
                    <p class="text-muted">No hay pacientes registrados en el sistema.</p>
                    <a href="<?= base_url('InsertCC') ?>" class="btn btn-outline-primary mt-2">Registrar el primero</a>
                </div>
            <?php else: ?>

                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4" id="contenedorCasos">
                    <?php foreach ($VectorDatos as $caso): ?>
                        <div class="col caso-item" data-nombre="<?= strtolower($caso->paciente) ?>" data-cedula="<?= $caso->cedula ?>">

                            <div class="card patient-card h-100">
                                <div class="card-body p-0 d-flex flex-column">

                                    <div class="p-4 pb-3">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-box me-3">
                                                    <?= strtoupper(substr($caso->paciente, 0, 1)) ?>
                                                </div>
                                                <div>
                                                    <h6 class="fw-bold text-dark mb-0 text-truncate" style="max-width: 160px;">
                                                        <?= htmlspecialchars($caso->paciente) ?>
                                                    </h6>
                                                    <span class="id-badge">ID #<?= $caso->id ?></span>
                                                </div>
                                            </div>
                                            <span class="badge bg-light text-dark border">
                                                <?= calcularEdad($caso->fecha_nacimiento) ?> años
                                            </span>
                                        </div>
                                        <div class="mt-3 d-flex justify-content-between text-muted small">
                                            <span title="Cédula"><i class="bi bi-person-vcard me-1"></i> <?= htmlspecialchars($caso->cedula) ?></span>
                                            <span title="Teléfono"><i class="bi bi-telephone me-1"></i> <?= htmlspecialchars($caso->telefono) ?></span>
                                        </div>
                                    </div>

                                    <div class="border-bottom border-light"></div>

                                    <div class="p-4 pt-3 flex-grow-1 bg-soft-gray">

                                        <div class="diagnosis-box mb-3">
                                            <small class="text-uppercase text-primary fw-bold" style="font-size: 0.65rem; letter-spacing: 0.5px;">Motivo de Consulta</small>
                                            <p class="mb-0 text-dark small text-clamp-2" title="<?= htmlspecialchars($caso->motivo_consulta) ?>">
                                                "<?= htmlspecialchars($caso->motivo_consulta) ?>"
                                            </p>
                                        </div>

                                        <div class="mb-1">
                                            <small class="text-muted fw-bold d-block mb-2" style="font-size: 0.7rem;">ODONTOGRAMA RESUMIDO</small>

                                            <div class="d-flex flex-wrap gap-1">
                                                <?php
                                                $odontograma = json_decode($caso->odontograma, true);
                                                $count = 0;
                                                $max_display = 6; // Máximo de cuadritos a mostrar

                                                if ($odontograma && is_array($odontograma)) {
                                                    foreach ($odontograma as $diente => $data) {
                                                        // Extraer color y nota
                                                        $color = is_array($data) ? ($data['color'] ?? '') : $data;
                                                        $nota = is_array($data) ? ($data['nota'] ?? '') : '';

                                                        if (($color == 'rojo' || $color == 'azul') && $count < $max_display) {
                                                            // Estilos según color
                                                            $bgClass = ($color == 'rojo') ? 'bg-danger text-white' : 'bg-primary text-white';

                                                            // Crear el Tooltip con la nota
                                                            $tooltipText = "Diente $diente: " . ucfirst($color);
                                                            if (!empty($nota)) {
                                                                $tooltipText .= " - Nota: " . $nota;
                                                            }

                                                            // Renderizar el cuadrito
                                                            echo "<div class='tooth-square $bgClass' 
                                                                       data-bs-toggle='tooltip' 
                                                                       title='" . htmlspecialchars($tooltipText) . "'>
                                                                       $diente
                                                                  </div>";
                                                            $count++;
                                                        }
                                                    }
                                                }

                                                if ($count == 0) echo '<small class="text-muted fst-italic" style="font-size:0.75rem">Sin hallazgos registrados.</small>';
                                                if ($count >= $max_display) echo '<div class="tooth-square bg-light text-muted border" title="Ver ficha completa para más detalles">+</div>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-3 d-flex gap-2 border-top">
                                        <a href="<?= base_url('ResumenHistorial/' . $caso->id) ?>" class="btn btn-action-primary flex-grow-1">
                                            Ver Ficha
                                        </a>
                                        <a href="<?= base_url('reporte/paciente/' . $caso->id) ?>" target="_blank" class="btn btn-action-secondary" title="Descargar PDF" data-bs-toggle="tooltip">
                                            <i class="bi bi-file-pdf-fill text-danger"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div id="noResults" class="text-center py-5 d-none">
                    <p class="text-muted">No encontramos pacientes con ese nombre o cédula.</p>
                </div>

                <nav class="mt-5 d-flex justify-content-center">
                    <ul class="pagination" id="paginacion"></ul>
                </nav>

            <?php endif; ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })

            const inputBuscador = document.getElementById('buscador');
            const items = document.querySelectorAll('.caso-item');
            const noResults = document.getElementById('noResults');
            const paginacionContainer = document.getElementById('paginacion');
            const ITEMS_POR_PAGINA = 9;
            let paginaActual = 1;
            let itemsVisibles = Array.from(items);

            function renderizarPaginacion() {
                paginacionContainer.innerHTML = '';
                const totalPaginas = Math.ceil(itemsVisibles.length / ITEMS_POR_PAGINA);
                if (totalPaginas <= 1) return;

                const crearBoton = (texto, activo, disabled, clickFn) => {
                    let li = document.createElement('li');
                    li.className = `page-item ${activo ? 'active' : ''} ${disabled ? 'disabled' : ''}`;
                    li.innerHTML = `<a class="page-link" href="#">${texto}</a>`;
                    li.onclick = clickFn;
                    paginacionContainer.appendChild(li);
                };

                crearBoton('«', false, paginaActual === 1, (e) => {
                    e.preventDefault();
                    if (paginaActual > 1) {
                        paginaActual--;
                        updateView();
                    }
                });
                for (let i = 1; i <= totalPaginas; i++) {
                    crearBoton(i, i === paginaActual, false, (e) => {
                        e.preventDefault();
                        paginaActual = i;
                        updateView();
                    });
                }
                crearBoton('»', false, paginaActual === totalPaginas, (e) => {
                    e.preventDefault();
                    if (paginaActual < totalPaginas) {
                        paginaActual++;
                        updateView();
                    }
                });
            }

            function updateView() {
                items.forEach(item => item.classList.add('d-none'));
                const start = (paginaActual - 1) * ITEMS_POR_PAGINA;
                const end = start + ITEMS_POR_PAGINA;
                itemsVisibles.slice(start, end).forEach(item => item.classList.remove('d-none'));
            }

            inputBuscador.addEventListener('keyup', function(e) {
                const texto = e.target.value.toLowerCase();
                itemsVisibles = Array.from(items).filter(item => {
                    return item.dataset.nombre.includes(texto) || item.dataset.cedula.includes(texto);
                });
                paginaActual = 1;
                noResults.classList.toggle('d-none', itemsVisibles.length > 0);
                updateView();
                renderizarPaginacion();
            });

            updateView();
            renderizarPaginacion();
        });
    </script>
</body>

</html>