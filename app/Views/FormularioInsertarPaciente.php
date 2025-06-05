<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Paciente</title>
    <!-- Puedes incluir CSS aquí si lo necesitas -->
</head>
<body>
    <h1>Formulario de Inserción de Paciente</h1>

    <?php if(session()->getFlashdata('success')): ?>
        <div style="color: green;"><?= session()->getFlashdata('success') ?></div>
    <?php elseif(session()->getFlashdata('error')): ?>
        <div style="color: red;"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="/insertar-paciente" method="post">
        <?= csrf_field() ?>

        <label for="nombres">Nombres:</label>
        <input type="text" name="nombres" id="nombres" required><br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" required><br><br>

        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" required><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" required><br><br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" required><br><br>

        <label for="estado">Estado:</label>
        <select name="estado" id="estado" required>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select><br><br>

        <button type="submit">Registrar Paciente</button>
    </form>

</body>
</html>
