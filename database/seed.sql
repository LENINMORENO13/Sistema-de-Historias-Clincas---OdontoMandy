-- ---------------------------------------------------------------------------
-- DentalManager / OdontoMandy - Datos de demostracion
-- ---------------------------------------------------------------------------
-- Usuario de prueba de la demo. Las credenciales son publicas a proposito:
-- solo.accesso este entorno con datos ficticios.
--
--   Correo:    admin@gmail.com
--   Contrasena: admin123
--
-- La contrasena se guarda como hash bcrypt.
-- ---------------------------------------------------------------------------

USE `odontomandy_db`;

INSERT INTO `tbl_usuarios` (`correo_electronico`, `contrasena`, `rol`)
VALUES (
    'admin@gmail.com',
    '$2y$10$iDcIrkPAxATgOtiDx0x2j.jyA/ExQeelooG.JqnLL3mN5.fVlXUM.',
    'admin'
)
ON DUPLICATE KEY UPDATE
    `contrasena` = VALUES(`contrasena`),
    `rol`        = VALUES(`rol`);
