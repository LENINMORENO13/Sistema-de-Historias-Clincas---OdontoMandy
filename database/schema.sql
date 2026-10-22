-- ---------------------------------------------------------------------------
-- DentalManager / OdontoMandy - Esquema de base de datos
-- ---------------------------------------------------------------------------
-- Reconstruido a partir del codigo de la aplicacion (app/Models/ModeloGeneral.php).
-- No estaba versionado en el repositorio original; contrastar contra la base
-- de datos real antes de usar en produccion.
--
-- MySQL / MariaDB 10.4+
-- ---------------------------------------------------------------------------

CREATE DATABASE IF NOT EXISTS `odontomandy_db`
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE `odontomandy_db`;

-- ---------------------------------------------------------------------------
-- tbl_usuarios
-- ---------------------------------------------------------------------------
-- El campo `contrasena` almacena un hash bcrypt (password_hash de PHP).
-- El campo `rol` toma valores de: admin, odontologo, recepcion.
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `correo_electronico` VARCHAR(150) NOT NULL,
  `contrasena`        VARCHAR(255) NOT NULL,
  `rol`               VARCHAR(30)  NOT NULL DEFAULT 'odontologo',
  `created_at`        TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_usuarios_correo` (`correo_electronico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------------
-- casos_clinicos
-- ---------------------------------------------------------------------------
-- Registro principal del paciente (cabecera de la historia clinica).
--
-- `odontograma` guarda el estado dental como JSON serializado. Es una
-- decision de diseño del proyecto original y no es consultable por SQL:
-- un odontograma normalizado seria una fila por pieza (32) con sus estados.
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `casos_clinicos` (
  `id`                     INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombres_apellidos`      VARCHAR(200) NOT NULL,
  `direccion`              VARCHAR(255) DEFAULT NULL,
  `fecha_nacimiento`       DATE         DEFAULT NULL,
  `telefono`               VARCHAR(40)  DEFAULT NULL,
  `cedula`                 VARCHAR(30)  DEFAULT NULL,
  `motivo_consulta`        TEXT         DEFAULT NULL,
  `antecedente_personal_1` TEXT         DEFAULT NULL,
  `antecedente_personal_2` TEXT         DEFAULT NULL,
  `antecedente_familiar_1` TEXT         DEFAULT NULL,
  `antecedente_familiar_2` TEXT         DEFAULT NULL,
  `odontograma`            LONGTEXT     DEFAULT NULL,
  `estado`                 VARCHAR(30)  NOT NULL DEFAULT 'pendiente',
  `fecha_registro`         DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_casos_cedula` (`cedula`),
  KEY `idx_casos_nombre` (`nombres_apellidos`),
  KEY `idx_casos_fecha` (`fecha_registro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------------
-- historial_clinico_detalle
-- ---------------------------------------------------------------------------
-- Cada fila es una entrada de la historia clinica de un paciente.
-- `id` actua como clave foranea hacia casos_clinicos.id (uno a muchos).
-- ---------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `historial_clinico_detalle` (
  `id`                 INT UNSIGNED NOT NULL,
  `diagnostico`        TEXT         DEFAULT NULL,
  `tratamiento`        TEXT         DEFAULT NULL,
  `indicaciones`       TEXT         DEFAULT NULL,
  `estado`             VARCHAR(30)  NOT NULL DEFAULT 'pendiente',
  `fecha_del_registro` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`, `fecha_del_registro`),
  CONSTRAINT `fk_historial_caso`
    FOREIGN KEY (`id`) REFERENCES `casos_clinicos` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
