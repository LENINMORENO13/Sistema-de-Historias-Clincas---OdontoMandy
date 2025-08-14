<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="Public/Css/disenioPA.css">
</head>


<body>

    <div class="container">
        <form action="<?php base_url() ?>Paciente" method="post">
            <h1>Agregar Paciente</h1>
            <div class="mb-3">
                <label for="VNombres" class="form-label">Nombres:</label>
                <input type="text" class="form-control" id="VNombres" name="VNombres" required>
            </div>

            <div class="mb-3">
                <label for="VApellidos" class="form-label">Apellidos:</label>
                <input type="text" class="form-control" id="VApellidos" name="VApellidos" required>
            </div>

            <div class="mb-3">
                <label for="VEdad" class="form-label">Edad:</label>
                <input type="number" class="form-control" id="VEdad" name="VEdad" required>
            </div>

            <div class="mb-3">
                <label for="VTelefono" class="form-label">Teléfono:</label>
                <input type="text" class="form-control" id="VTelefono" name="VTelefono" required>
            </div>

            <div class="mb-3">
                <label for="VDireccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="VDireccion" name="VDireccion" required>
            </div>

            <div class="mb-3">
                <label for="VCorreo" class="form-label">Correo Electrónico:</label>
                <input type="email" class="form-control" id="VCorreo" name="VCorreo" required>
            </div>

            <div class="mb-3">
                <label for="VEstado" class="form-label">Estado:</label>
                <select class="form-select" name="VEstado" id="VEstado" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                    <option value="Pendiente">Pendiente</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Registrar</button>
        </form>
    </div>
    
</body>

</html>