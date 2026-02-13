<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Directorio de Pacientes - SisOdontoMandy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('public/css/VistaSelectCasos.css') ?>">
</head>

<body>

    <div class="top-accent"></div>

    <main class="py-5 px-3">
        <div class="container-xl">

            <div class="page-header mb-5">
                <div class="row align-items-center g-4">
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center">
                            <div class="header-icon-wrapper">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div>
                                <h1 class="fw-bold text-dark m-0">Pacientes</h1>
                                <p class="text-muted mb-0">Directorio general de expedientes</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="search-container">
                            <div class="search-wrapper">
                                <i class="bi bi-filter search-icon"></i> <input type="text" id="buscador" class="form-control search-input" placeholder="Filtrar lista rápida por nombre...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (empty($VectorDatos)): ?>
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="bi bi-folder-plus"></i>
                    </div>
                    <div class="empty-state-content">
                        <h3 class="fw-bold text-secondary">Comienza tu Directorio</h3>
                        <p class="text-muted mb-4">Aún no has registrado pacientes. Crea el primero ahora.</p>
                        <a href="<?= base_url('VistaCC') ?>" class="btn btn-primary btn-lg shadow-sm">
                            <i class="bi bi-plus-lg me-2"></i>Nuevo Paciente
                        </a>
                    </div>
                </div>
            <?php else: ?>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="stat-badge">
                        <i class="bi bi-database-check me-2"></i>
                        <strong><?= count($VectorDatos) ?></strong> Pacientes registrados
                    </div>
                    <a href="<?= base_url('CasosPacientes') ?>" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-sliders me-1"></i> Búsqueda Avanzada
                    </a>
                </div>

                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4" id="contenedorCasos">
                    <?php foreach ($VectorDatos as $caso): ?>
                        <div class="col caso-item" data-nombre="<?= strtolower($caso->paciente) ?>" data-cedula="<?= $caso->cedula ?>">
                            <div class="patient-card h-100">
                                <div class="card-body p-0 d-flex flex-column h-100">
                                    
                                    <div class="card-header-section">
                                        <div class="d-flex align-items-start justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <?= strtoupper(substr($caso->paciente, 0, 1)) ?>
                                                </div>
                                                <div class="ms-3">
                                                    <h5 class="fw-bold text-dark mb-0 patient-name" title="<?= htmlspecialchars($caso->paciente) ?>">
                                                        <?= htmlspecialchars($caso->paciente) ?>
                                                    </h5>
                                                    <span class="patient-id">Expediente #<?= $caso->id ?></span>
                                                </div>
                                            </div>
                                            <span class="age-pill"><?= calcularEdad($caso->fecha_nacimiento) ?> años</span>
                                        </div>
                                    </div>

                                    <div class="card-info-section flex-grow-1">
                                        <div class="info-item">
                                            <i class="bi bi-postcard"></i> <?= htmlspecialchars($caso->cedula) ?>
                                        </div>
                                        <div class="info-item">
                                            <i class="bi bi-phone"></i> <?= htmlspecialchars($caso->telefono) ?>
                                        </div>
                                        
                                        <div class="diagnosis-box mt-3">
                                            <small class="d-block text-uppercase fw-bold text-primary mb-1" style="font-size: 0.65rem;">Motivo</small>
                                            <p class="text-muted small mb-0 text-truncate">
                                                "<?= htmlspecialchars($caso->motivo_consulta) ?>"
                                            </p>
                                        </div>
                                    </div>

                                    <div class="card-actions">
                                        <a href="<?= base_url('ResumenHistorial/' . $caso->id) ?>" class="btn btn-primary w-100">
                                            Ver Ficha
                                        </a>
                                        <a href="<?= base_url('reporte/paciente/' . $caso->id) ?>" target="_blank" class="btn btn-light border" title="PDF">
                                            <i class="bi bi-file-earmark-pdf text-danger"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div id="noResults" class="text-center py-5 d-none">
                    <div class="text-muted opacity-50 mb-2" style="font-size: 3rem;"><i class="bi bi-filter-circle"></i></div>
                    <h5 class="text-muted">No se ven pacientes con ese nombre.</h5>
                    <p class="small text-muted">Intenta con la búsqueda avanzada si no aparece aquí.</p>
                </div>

                <nav class="pagination-wrapper mt-5">
                    <ul class="pagination custom-pagination" id="paginacion"></ul>
                </nav>

            <?php endif; ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

                crearBoton('<i class="bi bi-chevron-left"></i>', false, paginaActual === 1, (e) => {
                    e.preventDefault(); if(paginaActual > 1) { paginaActual--; updateView(); }
                });

                for (let i = 1; i <= totalPaginas; i++) {
                    crearBoton(i, i === paginaActual, false, (e) => {
                        e.preventDefault(); paginaActual = i; updateView();
                    });
                }

                crearBoton('<i class="bi bi-chevron-right"></i>', false, paginaActual === totalPaginas, (e) => {
                    e.preventDefault(); if(paginaActual < totalPaginas) { paginaActual++; updateView(); }
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