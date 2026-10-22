-- ---------------------------------------------------------------------------
-- DentalManager / OdontoMandy - Procedimientos almacenados
-- ---------------------------------------------------------------------------
-- Reconstruidos a partir de los campos que consume la aplicacion.
-- El proyecto original no versionaba el SQL de la base de datos.
-- Si tu base tiene una version distinta, conserva la original: estos
-- procedimiento solo se invocan desde app/Models/ModeloGeneral.php
--
--   SelectCasosFM()          -> CALL SP_ListarCasosClinicos()
--   obtener_reporte()        -> CALL SP_GENERAR_REPORTE()
-- ---------------------------------------------------------------------------

USE `odontomandy_db`;

DROP PROCEDURE IF EXISTS `SP_ListarCasosClinicos`;
DROP PROCEDURE IF EXISTS `SP_GENERAR_REPORTE`;

DELIMITER //

-- Lista los casos con los campos que usa la vista de revision tecnica
-- (VistaSelectCasos) y el dashboard (VistaDashboard).
CREATE PROCEDURE `SP_ListarCasosClinicos`()
BEGIN
    SELECT
        c.`id`                AS `id`,
        c.`nombres_apellidos` AS `paciente`,
        c.`cedula`            AS `cedula`,
        c.`telefono`          AS `telefono`,
        c.`fecha_nacimiento`  AS `fecha_nacimiento`,
        c.`motivo_consulta`   AS `motivo_consulta`,
        c.`estado`            AS `estado`,
        c.`fecha_registro`    AS `fecha_registro`
    FROM `casos_clinicos` c
    ORDER BY c.`fecha_registro` DESC;
END //

-- Reporte consolidado que consume app/Views/reporte_pacientes.php
CREATE PROCEDURE `SP_GENERAR_REPORTE`()
BEGIN
    SELECT
        c.`nombres_apellidos`  AS `nombres_apellidos`,
        h.`diagnostico`        AS `diagnostico`,
        h.`tratamiento`        AS `tratamiento`,
        h.`fecha_del_registro` AS `fecha_del_registro`
    FROM `historial_clinico_detalle` h
    INNER JOIN `casos_clinicos` c ON c.`id` = h.`id`
    ORDER BY h.`fecha_del_registro` DESC;
END //

DELIMITER ;
