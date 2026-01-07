<?= $this->include('header') ?>

<style>
    :root {
        --primary-color: #0d6efd;
        --secondary-color: #6c757d;
        --success-color: #198754;
        --warning-color: #ffc107;
        --danger-color: #dc3545;
        --info-color: #0dcaf0;
        --light-bg: #f8f9fa;
        --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        --hover-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
        font-family: 'Segoe UI', 'Poppins', sans-serif;
        min-height: 100vh;
    }

    /* Mezcla de tarjetas de estadísticas */
    .stat-card {
        border: none;
        border-radius: 12px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        height: 100%;
        position: relative;
        z-index: 1;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--hover-shadow) !important;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), transparent);
        z-index: 2;
    }

    .stat-icon-wrapper {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        background: rgba(255, 255, 255, 0.9);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .stat-card:hover .stat-icon-wrapper {
        transform: scale(1.1) rotate(5deg);
    }

    /* Colores específicos para cada tarjeta */
    .stat-card-total .stat-icon-wrapper { background: rgba(220, 53, 69, 0.1); color: var(--danger-color); }
    .stat-card-mes .stat-icon-wrapper { background: rgba(25, 135, 84, 0.1); color: var(--success-color); }
    .stat-card-hoy .stat-icon-wrapper { background: rgba(255, 193, 7, 0.1); color: var(--warning-color); }

    .stat-card-sistema .stat-icon-wrapper { background: rgba(108, 117, 125, 0.1); color: var(--secondary-color); }

    /* Badge elegante */
    .stat-badge {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* Header mejorado */
    .dashboard-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #0b5ed7 100%);
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .dashboard-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transform: translate(50%, -50%);
    }

    .dashboard-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 150px;
        height: 150px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        transform: translate(-30%, 50%);
    }

    /* Tabla fusionada */
    .table-container {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: var(--card-shadow);
        background: white;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .table-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 1.5rem 1.5rem 0.5rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .table-content {
        padding: 0 1.5rem 1.5rem;
    }

    .table-custom {
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-custom thead th {
        border: none;
        font-weight: 600;
        color: #495057;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 1rem 1rem;
        background: transparent;
        border-bottom: 2px solid rgba(13, 110, 253, 0.1);
    }

    .table-custom tbody tr {
        transition: all 0.2s ease;
        border-radius: 8px;
    }

    .table-custom tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.03) !important;
        transform: translateX(2px);
    }

    .table-custom tbody td {
        padding: 1rem;
        vertical-align: middle;
        border-top: 1px solid rgba(0, 0, 0, 0.03);
    }

    /* Avatar circular mejorado */
    .patient-avatar {
        width: 42px;
        height: 42px;
        background: linear-gradient(135deg, var(--primary-color), #0b5ed7);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-right: 12px;
        font-size: 1rem;
        box-shadow: 0 4px 8px rgba(13, 110, 253, 0.2);
    }

    /* Badge de fecha */
    .date-badge {
        background: rgba(13, 110, 253, 0.1);
        color: var(--primary-color);
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.85rem;
        border: 1px solid rgba(13, 110, 253, 0.2);
    }

    /* Botones de acción mejorados */
    .btn-action-group {
        display: flex;
        gap: 6px;
    }

    .btn-action {
        width: 34px;
        height: 34px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        border: 1px solid;
        transition: all 0.2s ease;
    }

    .btn-view { border-color: rgba(13, 110, 253, 0.3); color: var(--primary-color); }
    .btn-edit { border-color: rgba(108, 117, 125, 0.3); color: var(--secondary-color); }
    .btn-delete { border-color: rgba(220, 53, 69, 0.3); color: var(--danger-color); }

    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-view:hover { background-color: rgba(13, 110, 253, 0.1); }
    .btn-edit:hover { background-color: rgba(108, 117, 125, 0.1); }
    .btn-delete:hover { background-color: rgba(220, 53, 69, 0.1); }

    /* Estado vacío */
    .empty-state {
        padding: 4rem 2rem;
        text-align: center;
        color: #6c757d;
    }

    .empty-state-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.3;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .dashboard-header {
            padding: 1.5rem;
            text-align: center;
        }
        
        .stat-card {
            margin-bottom: 1rem;
        }
        
        .table-header {
            padding: 1rem;
        }
        
        .table-content {
            padding: 0 1rem 1rem;
        }
        
        .btn-action-group {
            flex-direction: column;
        }
        
        .patient-avatar {
            width: 36px;
            height: 36px;
            font-size: 0.9rem;
        }
    }

    /* Animaciones sutiles */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeInUp 0.5s ease forwards;
    }

    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    .delay-4 { animation-delay: 0.4s; }
</style>

<div class="container mt-4 mb-5">
    <!-- Header Mejorado con Fusión -->
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

    <!-- Estadísticas Fusionadas - 5 Tarjetas -->
    <div class="row g-4 mb-5">
        <!-- Total Casos (Rojo) -->
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

        <!-- Casos del Mes (Verde) -->
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

        <!-- Casos de Hoy (Amarillo) -->
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

        <!-- Sistema (Gris) -->
        <div class="col-md-6 col-lg-4 col-xl">
            <div class="stat-card stat-card-sistema bg-dark bg-gradient text-white shadow-sm animate-fade-in">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="stat-badge bg-white bg-opacity-20">
                            <i class="bi bi-gear-wide-connected me-1"></i>Sistema
                        </span>
                        <i class="bi bi-shield-check opacity-75"></i>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <h2 class="fw-bold mb-1">OdontoMandy</h2>
                            <p class="opacity-75 mb-0 small">v1.0 Estable</p>
                        </div>
                        <div class="stat-icon-wrapper bg-dark bg-opacity-50">
                            <i class="bi bi-gear-wide-connected"></i>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-top border-white border-opacity-25">
                        <small class="opacity-75">
                            <i class="bi bi-circle-fill me-1 text-success" style="font-size: 8px;"></i>
                            Sistema operativo
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de Últimos Casos Mejorada -->
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
                                        <a href="<?= base_url('casos/nuevo') ?>" class="btn btn-primary">
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