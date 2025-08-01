<?= $this->include('header') ?>
<div class="container mt-2">
    <h2 class="mb-4 text-primary"><i class="bi bi-speedometer2"></i> Panel de Inicio</h2>
    <div class="row g-3 mb-5">
        <div class="col-md-5">
            <div class="card text-white bg-gradient bg-danger shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="card-subtitle mb-2 text-white">Total Casos Clínicos</h6>
                        <h3 class="card-title fw-bold"><?= $totalCasos ?></h3>
                    </div>
                    <i class="bi bi-clipboard2-pulse-fill fs-1 opacity-75"></i>
                </div>
            </div>
        </div>
        <!-- Aquí podrías añadir más tarjetas si quieres -->
    <h4 class="mb-3 text-dark"><i class="bi bi-journal-medical"></i> Últimos Casos Clínicos</h4>
    <div class="table-responsive">
        <table class="table table-hover align-middle shadow-sm">
            <thead class="table-primary">
                <tr>
                    <th>🧑 Paciente</th>
                    <th>📝 Descripción</th>
                    <th>📅 Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ultimosCasos as $caso): ?>
                    <tr>
                        <td><?= esc($caso->paciente) ?></td>
                        <td><?= esc($caso->motivo_consulta) ?></td>
                        <td><?= esc($caso->fecha_registro) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
