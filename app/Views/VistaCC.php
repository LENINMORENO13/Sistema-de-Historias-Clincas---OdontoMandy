<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Caso Clínico</title>
    <link rel="stylesheet" href="Public/Css/disenioCC.css">

</head>

<body>
    <div class="container">
        <h1>Nuevo Caso Clínico</h1>
        <form action="<?php echo base_url() ?>/InsertCC" method="post" id="form-caso-clinico">
            <div class="form-group">
                <label for="id_paciente">Nombres y Apellidos:</label>
                <input type="text" name="nombres_apellidos" required />
            </div>

            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" required />
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" required />
            </div>

            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" name="edad" required />
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="number" name="telefono" required />
            </div>

            <div class="form-group">
                <label for="cedula">Cédula:</label>
                <input type="number" name="cedula" required />
            </div>

            <div class="form-group" style="flex-basis: 100%;">
                <label for="motivo_consulta">Motivo de la consulta:</label>
                <textarea name="motivo_consulta" required></textarea>
            </div>

            <div class="form-group" style="flex-basis: 100%;">
                <label for="antecedente_personal_1">Antecedentes Personales 1:</label>
                <textarea name="antecedente_personal_1" required></textarea>
            </div>

            <div class="form-group" style="flex-basis: 100%;">
                <label for="antecedente_personal_2">Antecedentes Personales 2:</label>
                <textarea name="antecedente_personal_2" required></textarea>
            </div>

            <div class="form-group" style="flex-basis: 100%;">
                <label for="antecedente_familiar_1">Antecedentes Familiares 1:</label>
                <textarea name="antecedente_familiar_1" required></textarea>
            </div>

            <div class="form-group" style="flex-basis: 100%;">
                <label for="antecedente_familiar_2">Antecedentes Familiares 2:</label>
                <textarea name="antecedente_familiar_2" required></textarea>
            </div>

            <label for="colorSelector" style="width: 100%; margin-top: 20px;">Selecciona color para marcar el diente:</label>
            <select id="colorSelector" style="margin-bottom: 15px; width: 220px;">
                <option value="ninguno" selected>Sin color</option>
                <option value="rojo">Rojo</option>
                <option value="azul">Azul</option>
            </select>

            <!-- Odontograma visual en filas -->
            <div id="odontograma">
                <div class="fila" id="fila-superior"></div>
                <div class="fila" id="fila-inferior"></div>
            </div>

            <div id="espacio-separador"></div>
            <div id="odontograma">
                <div class="fila" id="fila-ninos-superior"></div>
                <div class="fila" id="fila-ninos-inferior"></div>
            </div>

            <!-- Campo oculto para enviar el JSON -->
            <input type="hidden" name="odontograma" id="odontograma_estado" />

            <button type="submit">Guardar Caso Clí  nico</button>
        </form>
    </div>

    <a href="<?= base_url('Inicio') ?>" class="boton-regresar">Regresar</a>

    <!-- Modal confirmación -->
    <div id="modal-confirm" role="dialog" aria-modal="true" aria-labelledby="modal-title" tabindex="-1">
        <p id="modal-title">Caso clínico agregado con éxito ✅</p>
        <button id="btn-cerrar-modal" type="button" aria-label="Cerrar mensaje de confirmación">Cerrar</button>
    </div>

    <script>
        const colorSelector = document.getElementById("colorSelector");
        const dientesEstado = {};

        const filaSuperior = document.getElementById("fila-superior");
        const filaInferior = document.getElementById("fila-inferior");
        const filaNinosSuperior = document.getElementById("fila-ninos-superior");
        const filaNinosInferior = document.getElementById("fila-ninos-inferior");

        // Dientes adultos superiores: 18 al 11 y 21 al 28
        for (let i = 18; i >= 11; i--) crearDiente(filaSuperior, i);
        for (let i = 21; i <= 28; i++) crearDiente(filaSuperior, i);

        // Dientes adultos inferiores: 48 al 41 y 31 al 38
        for (let i = 48; i >= 41; i--) crearDiente(filaInferior, i);
        for (let i = 31; i <= 38; i++) crearDiente(filaInferior, i);

        // Dientes de niño superiores (temporales): 55 al 51 y 61 al 65
        for (let i = 55; i >= 51; i--) crearDiente(filaNinosSuperior, i);
        for (let i = 61; i <= 65; i++) crearDiente(filaNinosSuperior, i);

        // Dientes de niño inferiores (temporales): 85 al 81 y 71 al 75
        for (let i = 85; i >= 81; i--) crearDiente(filaNinosInferior, i);
        for (let i = 71; i <= 75; i++) crearDiente(filaNinosInferior, i);

        function crearDiente(fila, numero) {
            const diente = document.createElement("div");
            diente.className = "diente";
            diente.textContent = numero;
            diente.dataset.num = numero;
            dientesEstado[numero] = "ninguno";

            diente.addEventListener("click", () => {
                const color = colorSelector.value;
                dientesEstado[numero] = color;

                diente.style.backgroundColor = "";
                diente.style.color = "black";

                if (color === "rojo") {
                    diente.style.backgroundColor = "red";
                    diente.style.color = "white";
                } else if (color === "azul") {
                    diente.style.backgroundColor = "blue";
                    diente.style.color = "white";
                }
            });

            fila.appendChild(diente);
        }

        // Al enviar el formulario, actualizar el campo oculto y mostrar modal
        document
            .getElementById("form-caso-clinico")
            .addEventListener("submit", function (e) {
                // Actualizar el JSON del odontograma
                document.getElementById("odontograma_estado").value =
                    JSON.stringify(dientesEstado);

                // Mostrar modal de confirmación
                mostrarModalConfirmacion();
            });

        // Modal control
        const modal = document.getElementById("modal-confirm");
        const btnCerrarModal = document.getElementById("btn-cerrar-modal");

        function mostrarModalConfirmacion() {
            modal.classList.add("show");
            modal.focus();
        }

        btnCerrarModal.addEventListener("click", () => {
            modal.classList.remove("show");
        });

        // Cerrar modal con ESC
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape" && modal.classList.contains("show")) {
                modal.classList.remove("show");
            }
        });
    </script>
</body>
</html>