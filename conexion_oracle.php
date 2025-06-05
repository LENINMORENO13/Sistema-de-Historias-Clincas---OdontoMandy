<?php
$conn = oci_connect('CURSOS', 'CURSOS', 'localhost/XE');

if (!$conn) {
    $e = oci_error();
    echo "Error de conexión: " . $e['message'];
} else {
    echo "¡Conexión exitosa a Oracle! Ya sacamos 15";
    oci_close($conn);
}
?>
