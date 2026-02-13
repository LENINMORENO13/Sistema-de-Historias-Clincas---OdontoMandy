<?= $this->include('header') ?>

<link rel="stylesheet" href="<?= base_url('public/css/dashboard.css') ?>">

<div class="container mt-4 mb-5">
    <div class="dashboard-header animate-fade-in">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="fw-bold mb-2">
                    <i class="bi bi-speedometer2 me-2"></i>Panel de Control Odontológico
                </h1>
                <p class="mb-0 opacity-90">
                    <i class="bi bi-info-circle me-1"></i>
                    Bienvenido al sistema de gestión dental 
                </p>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-6 col-lg-4 col-xl">
            <div class="stat-card stat-card-total bg-white shadow-sm animate-fade-in delay-1">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="stat-badge text-danger">
                            <i class="bi bi-activity me-1"></i>Total General
                        </span>
                        <i class="bi bi-graph-up-arrow text-danger opacity-75"></i>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <h2 class="fw-bold mb-1 text-dark"><?= $totalCasos ?></h2>
                            <p class="text-muted mb-0 small">Casos Clínicos</p>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="bi bi-clipboard2-pulse-fill"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-top">
                        <small class="text-muted">
                            <i class="bi bi-database me-1"></i>Registros totales del sistema
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl">
            <div class="stat-card stat-card-mes bg-white shadow-sm animate-fade-in delay-2">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="stat-badge text-success">
                            <i class="bi bi-calendar-week me-1"></i>Este Mes
                        </span>
                        <i class="bi bi-arrow-up-right text-success opacity-75"></i>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <h2 class="fw-bold mb-1 text-dark"><?= isset($casosMes) ? $casosMes : '0' ?></h2>
                            <p class="text-muted mb-0 small">Nuevos Casos</p>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="bi bi-plus-circle-fill"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-top">
                        <small class="text-muted">
                            <i class="bi bi-calendar-month me-1"></i>Registrados en <?= date('F') ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl">
            <div class="stat-card stat-card-hoy bg-white shadow-sm animate-fade-in delay-3">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="stat-badge text-warning">
                            <i class="bi bi-clock-history me-1"></i>Hoy
                        </span>
                        <i class="bi bi-bell text-warning opacity-75"></i>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <h2 class="fw-bold mb-1 text-dark"><?= isset($casosHoy) ? $casosHoy : '0' ?></h2>
                            <p class="text-muted mb-0 small">Registros Hoy</p>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="bi bi-clock-fill"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-top">
                        <small class="text-muted">
                            <i class="bi bi-calendar-day me-1"></i>Actualizado al día de hoy
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-container animate-fade-in">
        <div class="table-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="fw-bold mb-1 text-dark">
                        <i class="bi bi-journal-medical me-2 text-primary"></i>
                        Últimos Casos Registrados
                    </h4>
                    <p class="text-muted mb-0">
                        <i class="bi bi-info-circle me-1"></i>
                        Revisión de casos recientemente ingresados
                    </p>
                </div>
                <div class="d-flex gap-2">
                    <a href="<?= base_url('SelectCasos') ?>" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-list-ul me-1"></i>Ver Todos
                    </a>
                </div>
            </div>
        </div>

        <div class="table-content">
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th width="30%">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-circle me-2 text-primary"></i>
                                    <span>Paciente</span>
                                </div>
                            </th>
                            <th width="40%">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-chat-left-text me-2 text-primary"></i>
                                    <span>Motivo de Consulta</span>
                                </div>
                            </th>
                            <th width="20%">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar3 me-2 text-primary"></i>
                                    <span>Fecha Registro</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($ultimosCasos)): ?>
                            <?php foreach ($ultimosCasos as $index => $caso): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="patient-avatar">
                                                <?= strtoupper(substr($caso->paciente ?? 'P', 0, 1)) ?>
                                            </div>
                                            <div>
                                                <strong class="d-block"><?= esc($caso->paciente) ?></strong>
                                                <small class="text-muted">
                                                    ID: <?= isset($caso->id) ? $caso->id : 'N/A' ?>
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-truncate" style="max-width: 300px;" 
                                             title="<?= esc($caso->motivo_consulta) ?>">
                                            <?= esc($caso->motivo_consulta) ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="date-badge mb-1">
                                                <i class="bi bi-calendar3 me-1"></i>
                                                <?= date('d/m/Y', strtotime($caso->fecha_registro)) ?>
                                            </span>
                                            <small class="text-muted">
                                                <i class="bi bi-clock me-1"></i>
                                                <?= date('H:i', strtotime($caso->fecha_registro)) ?>
                                            </small>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">
                                    <div class="empty-state">
                                        <i class="bi bi-inbox empty-state-icon"></i>
                                        <h5 class="text-muted mb-3">No hay casos clínicos registrados</h5>
                                        <p class="text-muted mb-4">Comienza creando tu primer caso clínico</p>
                                        <a href="<?= base_url('VistaCC') ?>" class="btn btn-primary">
                                            <i class="bi bi-plus-circle me-1"></i>Crear primer caso
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="table-header border-top">
            <div class="d-flex justify-content-between align-items-center py-2">
                <div>
                    <small class="text-muted">
                        <i class="bi bi-info-circle me-1"></i>
                        Mostrando <?= count($ultimosCasos) ?> de <?= $totalCasos ?> casos totales
                    </small>
                </div>
            </div>
        </div>
    </div>


<script>
// Función para confirmar eliminación
function confirmarEliminacion(id, nombre) {
    document.getElementById('nombrePaciente').textContent = nombre;
    document.getElementById('btnEliminarConfirmado').href = '<?= base_url("casos/eliminar/") ?>' + id;
    
    const modal = new bootstrap.Modal(document.getElementById('modalConfirmarEliminar'));
    modal.show();
}

// Animación de entrada para elementos
document.addEventListener('DOMContentLoaded', function() {
    const elements = document.querySelectorAll('.animate-fade-in');
    elements.forEach((el, index) => {
        el.style.animationDelay = `${index * 0.1}s`;
    });
});

// Actualizar hora en tiempo real
function updateTime() {
    const now = new Date();
    const timeString = now.toLocaleTimeString('es-ES', { 
        hour: '2-digit', 
        minute: '2-digit',
        second: '2-digit'
    });
    
    const timeElement = document.getElementById('live-time');
    if (timeElement) {
        timeElement.textContent = timeString;
    }
}

// Inicializar y actualizar cada segundo
setInterval(updateTime, 1000);
updateTime();
</script>