-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2023 a las 19:50:08
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hackathon`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_item` (`_id` INT, `_id_mochila` INT, `_tipo` VARCHAR(500), `_nombre` VARCHAR(500), `_cantidad` DECIMAL(8,2), `_fecha` DATE, `_estado` CHAR(1), INOUT `_msj` VARCHAR(200))   BEGIN		
	IF(_id=0) THEN
		IF((SELECT COUNT(*) FROM tbl_items WHERE nombre = _nombre and id_mochila = _id_mochila and tipo = _tipo and fecha_vencimiento = _fecha) > 0) THEN
			set _msj = 'Item ya se encuentra registrada.';			
		ELSE			
			INSERT INTO tbl_items (id_mochila, tipo,nombre,cantidad, fecha_vencimiento,estado)
			VALUES(_id_mochila, _tipo,_nombre,_cantidad,_fecha,_estado);                   
          
			SET _msj =  'Registro Exitoso.';
		END IF;
	ELSE 
		IF((SELECT COUNT(*) FROM tbl_items WHERE nombre = _nombre and id_mochila = _id_mochila and tipo = _tipo and fecha_vencimiento = _fecha and id <> _id) > 0) THEN
			set _msj =  'Item ya se encuentra registrada.';			
		ELSE			
			UPDATE tbl_items 
			SET 
				nombre = _nombre, tipo = _tipo, cantidad = _cantidad, fecha_vencimiento = _fecha, estado = _estado
			WHERE id=_id;		
			SET _msj =  'Edición Exitosa.';
		END IF;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_login` (`_email` VARCHAR(500), `_contrasena` LONGTEXT, INOUT `_msj` VARCHAR(200))   BEGIN
	IF((SELECT COUNT(*) FROM tbl_usuario WHERE email = _email  or nrodoc = _email ) = 0) THEN
		SET _msj = 'Email no existe.'; 
	ELSEIF((SELECT COUNT(*) FROM tbl_usuario WHERE (email = _email  or nrodoc = _email ) and contrasena = md5(_contrasena )) = 0) THEN
		SET _msj = 'Contraseña erronea.';
	ELSEIF((SELECT COUNT(*) FROM tbl_usuario WHERE (email = _email  or nrodoc = _email ) and contrasena = md5(_contrasena ) and (estado in('A', 'R'))) = 0) THEN
		SET _msj = 'Usuario se encuentra inactivo.';
	ELSE
		set @datausu=(select concat(cast(u.id as char),'|',u.apellidos,', ', u.nombres,'|',u.email,'|',u.nrodoc,'|',cast(u.id_familia as char),'|',ifnull((select f.codigo from tbl_familia f where f.id = u.id_familia limit 1),'')
    ,'|',ifnull((select f.nombre from tbl_familia f where f.id = u.id_familia limit 1),'') ) as DataUsu
			 FROM tbl_usuario u
             WHERE (contrasena = md5(_contrasena) and (u.email = _email  or u.nrodoc = _email )));
		SET _msj = concat('Bienvenido$',@datausu);
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mochila` (`_id` INT, `_id_familia` INT, `_descripcion` VARCHAR(500), `_peso` DECIMAL(8,2), `_estado` CHAR(1), INOUT `_msj` VARCHAR(200))   BEGIN		
	IF(_id=0) THEN
		IF((SELECT COUNT(*) FROM tbl_mochila WHERE descripcion = _descripcion and id_familia = _id_familia) > 0) THEN
			set _msj = 'Mochila ya se encuentra registrada.';			
		ELSE			
			INSERT INTO tbl_mochila (id_familia,descripcion,peso,estado)
			VALUES(_id_familia,_descripcion,_peso,_estado);                    
          
			SET _msj =  'Registro Exitoso.';
		END IF;
	ELSE 
		IF((SELECT COUNT(*) FROM tbl_mochila WHERE descripcion = _descripcion and id_familia = _id_familia and id <> _id) > 0) THEN
			set _msj =  'Mochila ya se encuentra registrada.';			
		ELSE			
			UPDATE tbl_mochila 
			SET 
				descripcion=_descripcion, peso = _peso, estado = _estado
			WHERE id=_id;		
			SET _msj =  'Edición Exitosa.';
		END IF;
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_familia` (`_id_usuario` INT, `_codigo` VARCHAR(20), `_nombre` VARCHAR(500), INOUT `_msj` VARCHAR(200))   BEGIN 
	set @idfam = 0;
    IF(( SELECT COUNT(*) FROM tbl_familia WHERE codigo = _codigo ) > 0 ) THEN
		set @idfam = (select id from tbl_familia where codigo = _codigo limit 1);
    elseIF(( SELECT COUNT(*) FROM tbl_familia WHERE codigo = _codigo ) = 0 ) THEN
        insert into tbl_familia(codigo, nombre, estado) values(_codigo, _nombre, 'A');
        set @idfam = (SELECT LAST_INSERT_ID());
	END IF;
    IF( @idfam = 0 ) THEN
        SET _msj = 'Ocurrió un error, por favor vuelva a intentarlo luego de refrescar la página.';        
    ELSE
        update tbl_usuario set id_familia = @idfam where  id = _id_usuario;
        SET _msj = concat('Registro exitoso.$',@idfam,'|',_codigo,'|',_nombre);
    END IF;   
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_usuario` (`_id_familia` INT, `_nrodoc` VARCHAR(25), `_apellidos` VARCHAR(500), `_nombres` VARCHAR(500), `_email` VARCHAR(550), `_contrasena` LONGTEXT, INOUT `_msj` VARCHAR(200))   BEGIN 
    IF(( SELECT COUNT(*) FROM tbl_usuario WHERE email = _email ) > 0 ) THEN
        SET _msj = 'Email ya se encuentra registrado.';
    ELSEIF(( SELECT COUNT(*) FROM tbl_usuario WHERE nrodoc = _nrodoc  ) > 0 ) THEN
        SET _msj = 'Número de documento ya registrado.';        
    ELSE
        insert into tbl_usuario(id_familia, nrodoc, apellidos, nombres, email, contrasena, estado, fechareg)
        values (_id_familia, _nrodoc, _apellidos, _nombres , _email, md5(_contrasena), 'R', now());
        set @datausu=(select concat(cast(u.id as char),'|',u.apellidos,', ', u.nombres,'|',u.email,'|',u.nrodoc,'|',cast(u.id_familia as char),'|',ifnull((select f.codigo from tbl_familia f where f.id = u.id_familia limit 1),'')
    ,'|',ifnull((select f.nombre from tbl_familia f where f.id = u.id_familia limit 1),'') ) as DataUsu
			 FROM tbl_usuario u
             WHERE id = (SELECT LAST_INSERT_ID()));
        SET _msj = concat('Bienvenido$',@datausu);   
    END IF;   
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_familia`
--

CREATE TABLE `tbl_familia` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_familia`
--

INSERT INTO `tbl_familia` (`id`, `codigo`, `nombre`, `estado`) VALUES
(1, '75R2N77O26M614531PCO', 'Fam Calderon Becerra', 'A'),
(2, '1D98888S4I2H0758J782', 'Fam. Vilchez Sanchez', 'A'),
(3, '8236Y86DG01O73483478', 'Fam Calderon Becerra temporal', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_items`
--

CREATE TABLE `tbl_items` (
  `id` int(11) NOT NULL,
  `id_mochila` int(11) DEFAULT NULL,
  `tipo` varchar(500) DEFAULT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `cantidad` decimal(8,2) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_items`
--

INSERT INTO `tbl_items` (`id`, `id_mochila`, `tipo`, `nombre`, `cantidad`, `fecha_vencimiento`, `estado`) VALUES
(1, 1, 'Medicamento', 'Aspirinas', '10.00', '2024-12-12', 'A'),
(2, 1, 'Alimento', 'Galletas', '5.00', '2024-06-14', 'A'),
(3, 2, 'Medicamento', 'Curitas', '90.00', '2024-02-22', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mochila`
--

CREATE TABLE `tbl_mochila` (
  `id` int(11) NOT NULL,
  `id_familia` int(11) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `peso` decimal(8,2) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_mochila`
--

INSERT INTO `tbl_mochila` (`id`, `id_familia`, `descripcion`, `peso`, `estado`) VALUES
(1, 2, 'Mochila mochila', '20.00', 'A'),
(2, 2, 'Con todo!', '1.00', 'A'),
(3, 2, 'Tercera mochila', '10.00', 'A'),
(4, 1, 'Otra mochila aqui!', '15.00', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mochila_item`
--

CREATE TABLE `tbl_mochila_item` (
  `id` int(11) NOT NULL,
  `id_mochila` int(11) DEFAULT NULL,
  `nombre_producto` varchar(500) DEFAULT NULL,
  `cantidad` decimal(8,2) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id` int(11) NOT NULL,
  `id_familia` int(11) DEFAULT NULL,
  `nrodoc` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombres` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrasena` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechareg` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `id_familia`, `nrodoc`, `apellidos`, `nombres`, `email`, `contrasena`, `celular`, `telefono`, `estado`, `fechareg`) VALUES
(1, 2, '75730672', 'F. Calderón', 'Jefrinsson J', 'jefrinssonjfcalderon@gmail.com', '93e94a8d8af48fc7afe5d04d5ff9e90a', NULL, NULL, 'R', '2023-04-19 14:54:27'),
(2, 0, '00000000', 'Temporal', 'Temporal', 'temporal@gmail.com', '93e94a8d8af48fc7afe5d04d5ff9e90a', NULL, NULL, 'R', '2023-04-19 15:13:06'),
(3, 0, '65959595', 'Apellidos Temporal', 'Usuario Temporal', 'usuariotemporal@gmail.com', '93e94a8d8af48fc7afe5d04d5ff9e90a', NULL, NULL, 'R', '2023-04-21 07:38:14'),
(4, 0, '75859565', 'User3', 'User2', 'user2@gmail.com', '93e94a8d8af48fc7afe5d04d5ff9e90a', NULL, NULL, 'R', '2023-04-21 08:46:51'),
(5, 1, '6565651', 'jhsada', 'hola', 'nobucix@gmail.com', '93e94a8d8af48fc7afe5d04d5ff9e90a', NULL, NULL, 'R', '2023-04-21 12:12:11'),
(6, 2, '32659865', 'BleBle Bleleee', 'Blablabla', 'admin@gmail.com', '93e94a8d8af48fc7afe5d04d5ff9e90a', NULL, NULL, 'R', '2023-04-21 12:18:02'),
(7, 1, '45784512', 'Vnokasdm', 'Blejilln', 'adminnnn@link.com', '93e94a8d8af48fc7afe5d04d5ff9e90a', NULL, NULL, 'R', '2023-04-21 12:20:58'),
(8, 2, '32659861', 'EmptyEmpty', 'Empty', 'empty@email.com', '93e94a8d8af48fc7afe5d04d5ff9e90a', NULL, NULL, 'R', '2023-04-21 12:21:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_familia`
--
ALTER TABLE `tbl_familia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_mochila`
--
ALTER TABLE `tbl_mochila`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_mochila_item`
--
ALTER TABLE `tbl_mochila_item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_familia`
--
ALTER TABLE `tbl_familia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_mochila`
--
ALTER TABLE `tbl_mochila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_mochila_item`
--
ALTER TABLE `tbl_mochila_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
