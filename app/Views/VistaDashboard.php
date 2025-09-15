<?= $this->include('header') ?>

<div class="container mt-4">
    <h2 class="mb-4 text-primary">
        <i class="bi bi-speedometer2 me-2"></i> Panel de Inicio
    </h2>

    <div class="row g-4 mb-5">
        <div class="col-md-5 col-lg-4">
            <div class="card text-white bg-danger bg-gradient shadow-lg border-0 rounded-4 h-100">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="card-subtitle mb-2 text-white opacity-75">Total Casos Clínicos</h6>
                        <h3 class="card-title fw-bold display-5"><?= $totalCasos ?></h3>
                    </div>
                    <i class="bi bi-clipboard2-pulse-fill text-white opacity-50 display-1"></i>
                </div>
            </div>
        </div>

        </div>

    <h4 class="mb-3 text-dark">
        <i class="bi bi-journal-medical me-2"></i> Últimos Casos Clínicos
    </h4>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-primary text-center">
                        <tr class="align-middle">
                            <th scope="col" class="py-3 text-start">
                                <i class="bi bi-person-fill me-2"></i> Paciente
                            </th>
                            <th scope="col" class="py-3 text-start">
                                <i class="bi bi-chat-left-dots-fill me-2"></i> Descripción
                            </th>
                            <th scope="col" class="py-3 text-start">
                                <i class="bi bi-calendar-event-fill me-2"></i> Fecha
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ultimosCasos)): ?>
                            <?php foreach ($ultimosCasos as $caso): ?>
                                <tr class="table-row-hover">
                                    <td class="fw-semibold text-dark">
                                        <?= esc($caso->nombres_apellidos) ?>
                                    </td>
                                    <td class="text-muted">
                                        <?= esc($caso->motivo_consulta) ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            <?= date('d/m/Y', strtotime($caso->fecha_registro)) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">
                                    <i class="bi bi-info-circle me-2"></i> No hay casos clínicos registrados aún.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>