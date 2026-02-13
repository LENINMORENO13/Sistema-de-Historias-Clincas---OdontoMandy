<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Técnica de Admisión - SisOdontoMandy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/css/VistaCC.css') ?>">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css">
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Header Profesional -->
    <header class="clinic-header">
        <div class="container">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-tooth"></i>
                </div>
                <div class="logo-text">
                    <h1>Dental Manager</h1>
                    <p>Sistema de Gestión Odontológica</p>
                </div>
            </div>
        </div>
        <div class="header-divider"></div>
    </header>

    <div class="container main-container">
        <!-- Título de la página -->
        <div class="page-title">
            <h2>Ficha Técnica de Admisión Odontológica</h2>
            <p class="subtitle">Complete todos los campos para registrar un nuevo caso clínico</p>
        </div>

        <form action="<?= base_url() ?>/InsertCC" method="post" id="form-caso-clinico" novalidate>
            <?= csrf_field() ?>

            <!-- Sección 1: Datos del Paciente -->
            <div class="section-card fade-in">
                <div class="card-header">
                    <span class="section-icon"><i class="fas fa-user-injured"></i></span>
                    1. DATOS DE IDENTIFICACIÓN DEL PACIENTE
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6 form-floating">
                            <input type="text" name="nombres_apellidos" class="form-control" id="nombres" placeholder="Nombres y Apellidos" required>
                            <label for="nombres"><i class="fas fa-user me-2"></i>Nombres y Apellidos Completos</label>
                        </div>
                        <div class="col-md-6 form-floating">
                            <input type="text" name="cedula" class="form-control" id="cedula" placeholder="Cédula de Identidad" required>
                            <label for="cedula"><i class="fas fa-id-card me-2"></i>Cédula de Identidad</label>
                            <div class="invalid-feedback">Cédula inválida - Debe tener 10 dígitos</div>
                        </div>
                        <div class="col-md-6 form-floating">
                            <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" placeholder="Fecha de Nacimiento" required>
                            <label for="fecha_nacimiento"><i class="fas fa-calendar-alt me-2"></i>Fecha de Nacimiento</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección 2: Información de Contacto -->
            <div class="section-card fade-in">
                <div class="card-header">
                    <span class="section-icon"><i class="fas fa-address-book"></i></span>
                    2. INFORMACIÓN DE CONTACTO
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6 form-floating">
                            <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección Domiciliaria" required>
                            <label for="direccion"><i class="fas fa-map-marker-alt me-2"></i>Dirección Domiciliaria</label>
                        </div>
                        <div class="col-md-6 form-floating">
                            <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Número de Teléfono" required>
                            <label for="telefono"><i class="fas fa-phone me-2"></i>Teléfono de Contacto</label>
                            <div class="invalid-feedback">Teléfono inválido - Debe tener 10 dígitos y comenzar con 0</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección 3: Motivo de Consulta -->
            <div class="section-card fade-in">
                <div class="card-header">
                    <span class="section-icon"><i class="fas fa-comment-medical"></i></span>
                    3. MOTIVO DE CONSULTA
                </div>
                <div class="card-body">
                    <div class="form-floating">
                        <textarea name="motivo_consulta" class="form-control" id="motivo" placeholder="Describa el motivo principal de la visita." style="height: 120px" required></textarea>
                        <label for="motivo"><i class="fas fa-clipboard-list me-2"></i>Descripción del Motivo de Consulta</label>
                    </div>
                </div>
            </div>

            <!-- Sección 4: Antecedentes Médicos Personales -->
            <div class="section-card fade-in">
                <div class="card-header">
                    <span class="section-icon"><i class="fas fa-file-medical-alt"></i></span>
                    4. ANTECEDENTES MÉDICOS PERSONALES
                </div>
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <textarea name="antecedente_personal_1" class="form-control" id="antecedente_personal_1" style="height: 100px" required></textarea>
                        <label for="antecedente_personal_1"><i class="fas fa-notes-medical me-2"></i>Antecedente Médico Personal 1</label>
                    </div>
                    <div class="form-floating">
                        <textarea name="antecedente_personal_2" class="form-control" id="antecedente_personal_2" style="height: 100px" required></textarea>
                        <label for="antecedente_personal_2"><i class="fas fa-notes-medical me-2"></i>Antecedente Médico Personal 2</label>
                    </div>
                </div>
            </div>

            <!-- Sección 5: Antecedentes Familiares -->
            <div class="section-card fade-in">
                <div class="card-header">
                    <span class="section-icon"><i class="fas fa-users"></i></span>
                    5. ANTECEDENTES FAMILIARES RELEVANTES
                </div>
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <textarea name="antecedente_familiar_1" class="form-control" id="antecedente_familiar_1" style="height: 100px" required></textarea>
                        <label for="antecedente_familiar_1"><i class="fas fa-family me-2"></i>Antecedente Familiar 1</label>
                    </div>
                    <div class="form-floating">
                        <textarea name="antecedente_familiar_2" class="form-control" id="antecedente_familiar_2" style="height: 100px" required></textarea>
                        <label for="antecedente_familiar_2"><i class="fas fa-family me-2"></i>Antecedente Familiar 2</label>
                    </div>
                </div>
            </div>

            <!-- Sección 6: Odontograma -->
            <div class="section-card fade-in">
                <div class="card-header">
                    <span class="section-icon"><i class="fas fa-teeth"></i></span>
                    6. ODONTOGRAMA
                </div>
                <div class="card-body">
                    <div class="odontograma-section">
                        <div class="odontograma-header">
                            <h5><i class="fas fa-teeth-open me-2"></i>Seleccione la condición del diente</h5>
                            <div class="color-selector-wrapper">
                                <label for="colorSelector">Estado:</label>
                                <select id="colorSelector" class="form-select">
                                    <option value="ninguno" selected><i class="fas fa-minus-circle"></i> Sin Marca</option>
                                    <option value="rojo"><i class="fas fa-circle" style="color: #dc3545;"></i> Extracciones (Rojo)</option>
                                    <option value="azul"><i class="fas fa-circle" style="color: #17a2b8;"></i> Restauraciones (Azul)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Dentición Permanente -->
                        <h5 class="text-center mt-4 mb-3 text-muted"><i class="fas fa-user-graduate me-2"></i>Dentición Permanente</h5>
                        <div class="fila-label">Maxilar Superior</div>
                        <div class="fila" id="fila-superior"></div>
                        <div class="fila-label">Maxilar Inferior</div>
                        <div class="fila" id="fila-inferior"></div>

                        <!-- Dentición Temporal -->
                        <h5 class="text-center mt-4 mb-3 text-muted"><i class="fas fa-child me-2"></i>Dentición Temporal</h5>
                        <div class="fila-label">Maxilar Superior</div>
                        <div class="fila" id="fila-ninos-superior"></div>
                        <div class="fila-label">Maxilar Inferior</div>
                        <div class="fila" id="fila-ninos-inferior"></div>

                        <!-- Leyenda -->
                        <div class="color-legend">
                            <div class="legend-item">
                                <div class="legend-color red"></div>
                                <span>Extracciones</span>
                            </div>
                            <div class="legend-item">
                                <div class="legend-color blue"></div>
                                <span>Restauraciones</span>
                            </div>
                            <div class="legend-item">
                                <div class="legend-color gray"></div>
                                <span>Sin Marca</span>
                            </div>
                            <div class="legend-item">
                                <span style="color: var(--primary-color);"><i class="fas fa-info-circle"></i> Click en el diente para marcar</span>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="odontograma" id="odontograma_estado" />
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="sticky-bottom-container">
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save me-2"></i>REGISTRAR CASO CLÍNICO
                    </button>
                    <a href="<?= base_url('Inicio') ?>" class="btn btn-secondary btn-lg">
                        <i class="fas fa-arrow-left me-2"></i>VOLVER AL INICIO
                    </a>
                </div>
            </div>
        </form>

        <!-- Modal de Confirmación Personalizado -->
        <div id="modal-confirm" class="modal-confirm-custom" role="dialog" aria-modal="true" aria-labelledby="modal-title" tabindex="-1">
            <div class="modal-content-custom">
                <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div>
                <h3 id="modal-title">¡Éxito!</h3>
                <p>El caso clínico ha sido registrado correctamente.</p>
                <button id="btn-cerrar-modal" class="btn btn-success">
                    <i class="fas fa-check me-2"></i>Aceptar
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Variables globales
        const colorSelector = document.getElementById("colorSelector");
        const dientesEstado = {};
        const form = document.getElementById("form-caso-clinico");
        const cedulaInput = document.getElementById("cedula");
        const telefonoInput = document.getElementById("telefono");
        const modalConfirm = document.getElementById("modal-confirm");
        const btnCerrarModal = document.getElementById("btn-cerrar-modal");

        // Mapeo de colores para mostrar
        const colorLabels = {
            'rojo': { label: 'Extracción', color: '#dc3545', icon: 'fa-trash-alt' },
            'azul': { label: 'Restauración', color: '#17a2b8', icon: 'fa-fill-drip' },
            'ninguno': { label: 'Sin Marca', color: '#6c757d', icon: 'fa-minus-circle' }
        };

        // ============================================
        // FUNCIONES DE VALIDACIÓN
        // ============================================

        function showInputError(inputElement, message) {
            inputElement.classList.add('is-invalid');
            inputElement.classList.remove('is-valid');
            let errorDiv = inputElement.parentElement.querySelector('.invalid-feedback');
            if (errorDiv) errorDiv.textContent = message;
        }

        function clearInputError(inputElement) {
            inputElement.classList.remove('is-invalid', 'is-valid');
        }

        function validateCedula() {
            const cedula = cedulaInput.value.trim();
            clearInputError(cedulaInput);

            if (cedula.length !== 10 || !/^\d{10}$/.test(cedula)) {
                showInputError(cedulaInput, "La Cédula debe tener exactamente 10 dígitos numéricos.");
                return false;
            }

            cedulaInput.classList.add('is-valid'); 
            return true;
        }

        function validateTelefono() {
            const telefono = telefonoInput.value.trim();
            clearInputError(telefonoInput);

            if (telefono.length !== 10 || !/^\d{10}$/.test(telefono) || !telefono.startsWith('0')) {
                showInputError(telefonoInput, "El Teléfono debe tener 10 dígitos y comenzar con '0'.");
                return false;
            }

            telefonoInput.classList.add('is-valid');
            return true;
        }

        function restrictToDigits(event) {
            if (event.key.length === 1 && (event.key < '0' || event.key > '9')) {
                event.preventDefault();
            }
        }

        // Eventos en campos
        cedulaInput.addEventListener('input', validateCedula);
        cedulaInput.addEventListener('keypress', restrictToDigits);
        telefonoInput.addEventListener('input', validateTelefono);
        telefonoInput.addEventListener('keypress', restrictToDigits);

        // ============================================
        // GENERACIÓN DEL ODONTOGRAMA
        // ============================================

        const filaSuperior = document.getElementById("fila-superior");
        const filaInferior = document.getElementById("fila-inferior");
        const filaNinosSuperior = document.getElementById("fila-ninos-superior");
        const filaNinosInferior = document.getElementById("fila-ninos-inferior");

        // Crear dientes permanentes y temporales
        for (let i = 18; i >= 11; i--) crearDiente(filaSuperior, i);
        for (let i = 21; i <= 28; i++) crearDiente(filaSuperior, i);
        for (let i = 48; i >= 41; i--) crearDiente(filaInferior, i);
        for (let i = 31; i <= 38; i++) crearDiente(filaInferior, i);
        for (let i = 55; i >= 51; i--) crearDiente(filaNinosSuperior, i);
        for (let i = 61; i <= 65; i++) crearDiente(filaNinosSuperior, i);
        for (let i = 85; i >= 81; i--) crearDiente(filaNinosInferior, i);
        for (let i = 71; i <= 75; i++) crearDiente(filaNinosInferior, i);

        function crearDiente(fila, numero) {
            const diente = document.createElement("div");
            diente.className = "diente";
            diente.textContent = numero;
            diente.dataset.num = numero;
            diente.dataset.color = "ninguno";

            dientesEstado[numero] = { color: "ninguno", nota: "" };

            diente.addEventListener("click", () => {
                const color = colorSelector.value;
                const colorInfo = colorLabels[color];

                // Toggle del estado
                if (dientesEstado[numero].color === color && color !== 'ninguno') {
                    dientesEstado[numero] = { color: "ninguno", nota: "" };
                    diente.dataset.color = "ninguno";
                } else {
                    dientesEstado[numero].color = color;
                    diente.dataset.color = color;
                }

                // Mostrar modal profesional para la nota ( SweetAlert2 )
                if (color !== "ninguno") {
                    showToothNoteModal(numero, color);
                }

                actualizarEstilosDiente(diente, numero);
            });

            fila.appendChild(diente);
        }

        // ============================================
        // MODAL PROFESIONAL PARA NOTAS DE DIENTES
        // ============================================

        function showToothNoteModal(numero, color) {
            const colorInfo = colorLabels[color];
            const currentNote = dientesEstado[numero].nota || '';

            Swal.fire({
                title: `<span class="tooth-number-badge">Diente ${numero}</span><br><span style="color: ${colorInfo.color};"><i class="fas ${colorInfo.icon}"></i> ${colorInfo.label}</span>`,
                html: `
                    <div style="text-align: left; padding: 10px 0;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #495057;">
                            <i class="fas fa-sticky-note me-2"></i>Observaciones del diente:
                        </label>
                        <textarea 
                            id="tooth-note-input" 
                            class="tooth-note-textarea" 
                            placeholder="Ingrese detalles sobre el tratamiento, condición o indicación específica para este diente..."
                        >${currentNote}</textarea>
                        <small style="color: #6c757d; font-size: 0.85em;">
                            <i class="fas fa-info-circle"></i> Este campo es opcional. Puede dejar vacío si no tiene observaciones adicionales.
                        </small>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-check me-2"></i>Guardar',
                cancelButtonText: '<i class="fas fa-times me-2"></i>Cancelar',
                confirmButtonColor: '#1a5f7a',
                cancelButtonColor: '#6c757d',
                customClass: {
                    popup: 'swal-tooth-modal',
                    title: 'swal-tooth-title',
                    htmlContainer: 'swal-tooth-html'
                },
                didOpen: () => {
                    document.getElementById('tooth-note-input').focus();
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const nota = document.getElementById('tooth-note-input').value.trim();
                    dientesEstado[numero].nota = nota;
                    
                    // Actualizar indicador visual
                    const diente = document.querySelector(`.diente[data-num="${numero}"]`);
                    if (nota) {
                        diente.classList.add('has-note');
                    } else {
                        diente.classList.remove('has-note');
                    }
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Si canceló, revertir el cambio
                    const diente = document.querySelector(`.diente[data-num="${numero}"]`);
                    if (dientesEstado[numero].color === color && color !== 'ninguno') {
                        dientesEstado[numero] = { color: "ninguno", nota: "" };
                        diente.dataset.color = "ninguno";
                        actualizarEstilosDiente(diente, numero);
                    }
                }
            });
        }

        function actualizarEstilosDiente(diente, numero) {
            const color = dientesEstado[numero].color;

            // Resetear estilos
            diente.style.backgroundColor = "";
            diente.style.color = "";

            // Aplicar estilos según el color
            switch (color) {
                case 'rojo':
                    diente.style.backgroundColor = '#dc3545';
                    diente.style.color = 'white';
                    break;
                case 'azul':
                    diente.style.backgroundColor = '#17a2b8';
                    diente.style.color = 'white';
                    break;
                default:
                    diente.style.backgroundColor = '#f8f9fa';
                    diente.style.color = '#2c3e50';
            }
        }

        // ============================================
        // ENVÍO DEL FORMULARIO
        // ============================================

        form.addEventListener("submit", function(e) {
            const isCedulaValid = validateCedula();
            const isTelefonoValid = validateTelefono();
            
            if (!(isCedulaValid && isTelefonoValid)) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: '<i class="fas fa-exclamation-triangle me-2"></i>Errores de validación',
                    html: 'Por favor, corrige los errores en <strong>Cédula</strong> y <strong>Teléfono</strong>.',
                    confirmButtonText: '<i class="fas fa-check me-2"></i>Entendido',
                    confirmButtonColor: '#1a5f7a'
                });
                return;
            }

            // Serializar odontograma antes de enviar
            document.getElementById("odontograma_estado").value = JSON.stringify(dientesEstado);

            // Mostrar indicador de carga
            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Guardando...';
            submitBtn.disabled = true;
        });

        // ============================================
        // MODAL DE CONFIRMACIÓN DE ÉXITO
        // ============================================

        // Mostrar modal si hay un mensaje de éxito en la sesión
        <?php if (session()->getFlashdata('success')): ?>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '<i class="fas fa-check-circle me-2"></i>¡Éxito!',
                html: '<?= session()->getFlashdata('success') ?>',
                confirmButtonText: '<i class="fas fa-check me-2"></i>Aceptar',
                confirmButtonColor: '#28a745'
            });
        });
        <?php endif; ?>

        btnCerrarModal.addEventListener('click', () => {
            modalConfirm.classList.remove('show');
            form.reset();
            // Resetear odontograma
            Object.keys(dientesEstado).forEach(key => {
                dientesEstado[key] = { color: "ninguno", nota: "" };
            });
            document.querySelectorAll('.diente').forEach(diente => {
                diente.dataset.color = "ninguno";
                diente.classList.remove('has-note');
                actualizarEstilosDiente(diente, diente.dataset.num);
            });
        });
    </script>
</body>

</html>
