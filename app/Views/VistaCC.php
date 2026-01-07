<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Técnica de Admisión - Caso Clínico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= base_url('public/css/VistaCC.css') ?>">
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">FICHA TÉCNICA DE ADMISIÓN ODONTOLÓGICA</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php endif; ?>

        <form action="<?= base_url() ?>/InsertCC" method="post" id="form-caso-clinico" novalidate>
            <?= csrf_field() ?>

            <!-- Sección 1 -->
            <div class="card">
                <div class="card-header">1. DATOS DE IDENTIFICACIÓN DEL PACIENTE</div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6 form-floating">
                            <input type="text" name="nombres_apellidos" class="form-control" id="nombres" placeholder="Nombres y Apellidos" required>
                            <label for="nombres">Nombres y Apellidos Completos</label>
                        </div>
                        <div class="col-md-6 form-floating">
                            <input type="text" name="cedula" class="form-control" id="cedula" placeholder="Cédula de Identidad" required>
                            <label for="cedula">Cédula de Identidad</label>
                            <div class="invalid-feedback">Cédula inválida</div>
                        </div>
                        <div class="col-md-6 form-floating">
                            <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" placeholder="Fecha de Nacimiento" required>
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección 2 -->
            <div class="card">
                <div class="card-header">2. INFORMACIÓN DE CONTACTO</div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6 form-floating">
                            <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección Domiciliaria" required>
                            <label for="direccion">Dirección Domiciliaria</label>
                        </div>
                        <div class="col-md-6 form-floating">
                            <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Número de Teléfono" required>
                            <label for="telefono">Teléfono de Contacto</label>
                            <div class="invalid-feedback">Número inválido</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección 3 -->
            <div class="card">
                <div class="card-header">3. MOTIVO DE CONSULTA</div>
                <div class="card-body">
                    <div class="form-floating">
                        <textarea name="motivo_consulta" class="form-control" id="motivo" placeholder="Describa el motivo principal de la visita." style="height: 120px" required></textarea>
                        <label for="motivo">Descripción del Motivo de Consulta</label>
                    </div>
                </div>
            </div>

            <!-- Sección 4 -->
            <div class="card">
                <div class="card-header">4. ANTECEDENTES MÉDICOS PERSONALES</div>
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <textarea name="antecedente_personal_1" class="form-control" id="antecedente_personal_1" style="height: 100px" required></textarea>
                        <label for="antecedente_personal_1">Antecedente Médico Personal 1</label>
                    </div>
                    <div class="form-floating">
                        <textarea name="antecedente_personal_2" class="form-control" id="antecedente_personal_2" style="height: 100px" required></textarea>
                        <label for="antecedente_personal_2">Antecedente Médico Personal 2</label>
                    </div>
                </div>
            </div>

            <!-- Sección 5 -->
            <div class="card">
                <div class="card-header">5. ANTECEDENTES FAMILIARES RELEVANTES</div>
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <textarea name="antecedente_familiar_1" class="form-control" id="antecedente_familiar_1" style="height: 100px" required></textarea>
                        <label for="antecedente_familiar_1">Antecedente Familiar 1</label>
                    </div>
                    <div class="form-floating">
                        <textarea name="antecedente_familiar_2" class="form-control" id="antecedente_familiar_2" style="height: 100px" required></textarea>
                        <label for="antecedente_familiar_2">Antecedente Familiar 2</label>
                    </div>
                </div>
            </div>

            <!-- Sección 6: Odontograma -->
            <div class="card">
                <div class="card-header">6. ODONTOGRAMA</div>
                <div class="card-body">
                    <label class="form-label fw-bold">Seleccione un color para marcar la condición del diente:</label>
                    <select id="colorSelector" class="form-select mb-3" style="max-width: 250px;">
                        <option value="ninguno" selected>Sin Marca</option>
                        <option value="rojo">Extracciones (Rojo)</option>
                        <option value="azul">Restauraciones (Azul)</option>
                    </select>

                    <div id="odontograma" class="mt-4">
                        <h5 class="text-center">Dentición Permanente</h5>
                        <div class="fila mb-2" id="fila-superior"></div>
                        <div class="fila mb-4" id="fila-inferior"></div>
                        <h5 class="text-center">Dentición Temporal</h5>
                        <div class="fila mb-2" id="fila-ninos-superior"></div>
                        <div class="fila mb-4" id="fila-ninos-inferior"></div>
                    </div>

                    <input type="hidden" name="odontograma" id="odontograma_estado" />
                </div>
            </div>

            <!-- Botones -->
            <div class="d-grid sticky-bottom mt-4">
                <button type="submit" class="btn btn-primary btn-lg">REGISTRAR CASO CLÍNICO</button>
            </div>

            <div class="text-center mt-3 mb-5">
                <a href="<?= base_url('Inicio') ?>" class="btn btn-secondary">VOLVER AL INICIO</a>
            </div>
        </form>

        <!-- Modal de Confirmación -->
        <div id="modal-confirm" role="dialog" aria-modal="true" aria-labelledby="modal-title" tabindex="-1">
            <p id="modal-title">Caso clínico agregado con éxito ✅</p>
            <button id="btn-cerrar-modal" type="button" class="btn btn-success mt-2">Cerrar</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    const colorSelector = document.getElementById("colorSelector");
    const dientesEstado = {};
    const form = document.getElementById("form-caso-clinico");
    const cedulaInput = document.getElementById("cedula");
    const telefonoInput = document.getElementById("telefono");
    const modalConfirm = document.getElementById("modal-confirm");
    const btnCerrarModal = document.getElementById("btn-cerrar-modal");

    // --- FUNCIONES DE VALIDACIÓN ---

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

    // --- EVENTOS EN CAMPOS ---
    cedulaInput.addEventListener('input', validateCedula);
    cedulaInput.addEventListener('keypress', restrictToDigits);
    telefonoInput.addEventListener('input', validateTelefono);
    telefonoInput.addEventListener('keypress', restrictToDigits);

    // --- GENERACIÓN DEL ODONTOGRAMA ---

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

        dientesEstado[numero] = { color: "ninguno", nota: "" };

        diente.addEventListener("click", () => {
            const color = colorSelector.value;

            if (dientesEstado[numero].color === color && color !== 'ninguno') {
                dientesEstado[numero] = { color: "ninguno", nota: "" };
            } else {
                dientesEstado[numero].color = color;
            }

            // Actualizar estilos
            diente.style.backgroundColor = "#f0f0f0";
            diente.style.color = "#444";

            if (color === "rojo") {
                diente.style.backgroundColor = "red";
                diente.style.color = "white";
            } else if (color === "azul") {
                diente.style.backgroundColor = "blue";
                diente.style.color = "white";
            }

            // Solicita nota solo si se marcó el diente
            if (color !== "ninguno") {
                const nota = prompt(`Ingrese nota para el diente ${numero} (${color.toUpperCase()}):`, dientesEstado[numero].nota || "");
                dientesEstado[numero].nota = nota ? nota.trim() : "";
            }
        });

        fila.appendChild(diente);
    }

    // --- ENVÍO DEL FORMULARIO ---

    form.addEventListener("submit", function(e) {
        const isCedulaValid = validateCedula();
        const isTelefonoValid = validateTelefono();
        
        if (!(isCedulaValid && isTelefonoValid)) {
            e.preventDefault();
            alert("Por favor, corrige los errores en Cédula y Teléfono.");
            return;
        }

        // Serializar odontograma antes de enviar
        document.getElementById("odontograma_estado").value = JSON.stringify(dientesEstado);

    });

    // --- MODAL DE CONFIRMACIÓN ---

    function showSuccessModal() {
        modalConfirm.classList.add('show');
        modalConfirm.focus();
    }

    btnCerrarModal.addEventListener('click', () => {
        modalConfirm.classList.remove('show');
        form.reset();
    });
</script>

</body>

</html>