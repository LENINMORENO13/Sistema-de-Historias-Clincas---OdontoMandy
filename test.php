<?php
$host = "sql213.infinityfree.com";
$user = "if0_39797090";
$pass = "nV3SMtPPd@hLr9a";
$db   = "if0_39797090_odontomandy";

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Revisar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "¡Conexión exitosa a la base de datos!";
$conn->close();
?>




