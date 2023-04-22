CREATE TABLE `tbl_usuario` (
  `id` int NOT NULL,
  `id_familia` int NOT NULL,
  `nrodoc` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombres` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(550) CHARACTER SET utf8mb3 COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrasena` longtext CHARACTER SET utf8mb3 COLLATE utf8_spanish_ci,
  `celular` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8mb3 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechareg` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;


CREATE TABLE `tbl_items` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_mochila` INT NULL,
  `tipo` VARCHAR(500) NULL,
  `nombre` VARCHAR(500) NULL,
  `cantidad` DECIMAL(8,2) NULL,
  `fecha_vencimiento` DATE NULL,
  `estado` CHAR(1) NULL,
  PRIMARY KEY (`id`));
