-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-12-2021 a las 05:03:48
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_v2.1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
CREATE TABLE IF NOT EXISTS `cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto` decimal(65,0) NOT NULL,
  `id_huesped` int(11) NOT NULL,
  `creado_el` date NOT NULL,
  `actualizado_el` date NOT NULL,
  `creado_por` int(11) NOT NULL,
  `actualizado_por` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_huesped` (`id_huesped`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_limpieza` int(11) NOT NULL,
  `id_ocupacion` int(11) NOT NULL,
  `creado_el` date NOT NULL,
  `actualizado_el` date NOT NULL,
  `creado_por` int(11) NOT NULL,
  `actualizado_por` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_limpieza` (`id_limpieza`),
  KEY `id_ocupacion` (`id_ocupacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `id_limpieza`, `id_ocupacion`, `creado_el`, `actualizado_el`, `creado_por`, `actualizado_por`) VALUES
(1, 1, 1, '2021-12-06', '2021-12-06', 2, 2),
(2, 2, 2, '2021-12-06', '2021-12-06', 9, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estancia`
--

DROP TABLE IF EXISTS `estancia`;
CREATE TABLE IF NOT EXISTS `estancia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_entrada` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estancia`
--

INSERT INTO `estancia` (`id`, `fecha_entrada`, `fecha_salida`) VALUES
(1, '2021-12-12 00:00:00', '2021-12-14 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

DROP TABLE IF EXISTS `habitacion`;
CREATE TABLE IF NOT EXISTS `habitacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_habitacion` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo_habitacion` (`id_tipo_habitacion`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id`, `id_tipo_habitacion`, `id_estado`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huesped`
--

DROP TABLE IF EXISTS `huesped`;
CREATE TABLE IF NOT EXISTS `huesped` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `id_estancia` int(11) NOT NULL,
  `creado_el` date NOT NULL,
  `actualizado_el` date NOT NULL,
  `creado_por` int(11) NOT NULL,
  `actualizado_por` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estancia` (`id_estancia`),
  KEY `id_habitacion` (`id_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `huesped`
--

INSERT INTO `huesped` (`id`, `nombre`, `telefono`, `correo`, `id_habitacion`, `id_estancia`, `creado_el`, `actualizado_el`, `creado_por`, `actualizado_por`) VALUES
(1, 'Lizbeth', '984 145 2466', 'lizbethteextrañoxd@gmail.com', 1, 1, '2021-12-06', '2021-12-06', 9, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `limpieza`
--

DROP TABLE IF EXISTS `limpieza`;
CREATE TABLE IF NOT EXISTS `limpieza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `limpieza`
--

INSERT INTO `limpieza` (`id`, `titulo`) VALUES
(1, 'Limpio'),
(2, 'Sucio'),
(3, 'barrido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1634069155),
('m130524_201442_init', 1634069169),
('m190124_110200_add_verification_token_column_to_user_table', 1634069169);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ocupacion`
--

DROP TABLE IF EXISTS `ocupacion`;
CREATE TABLE IF NOT EXISTS `ocupacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ocupacion`
--

INSERT INTO `ocupacion` (`id`, `titulo`) VALUES
(1, 'Ocupado'),
(2, 'Desocupado'),
(3, 'mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`, `apellidos`, `telefono`, `sexo`, `id_user`) VALUES
(2, 'Jose Eduin', 'Nahuat Noh', '9988971095', 'Macho Alfa Lomo Plateado', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(0, 'recepcionista'),
(1, 'Limpieza'),
(2, 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_habitacion`
--

DROP TABLE IF EXISTS `tipo_habitacion`;
CREATE TABLE IF NOT EXISTS `tipo_habitacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `precio` decimal(65,0) NOT NULL,
  `numero` int(11) NOT NULL,
  `planta` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_habitacion`
--

INSERT INTO `tipo_habitacion` (`id`, `tipo`, `precio`, `numero`, `planta`) VALUES
(1, 'compartido', '2500', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `id_rol`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(7, 'cecilio', 'Cm86rHf9yEo5g0AfWs3wVvLpvq1m-Jd-', '$2y$13$2JNSaF1RJvOeX/wsPt5sTOdyWYN/Zo6GjmLSo38OqA5T.NdwmJ3kK', NULL, 'cecilio@gmail.com', 0, 10, 1638760348, 1638760348, '-j50x_797EYcU4Y9o6h5d7OYcAyIj-5s_1638760348'),
(9, 'jose.nn', 'o52n7KgCpdVqLN9zCxkNFzjqrRZQ1uQ6', '$2y$13$MeZnaz/EWAeGthA05JnUm.S88F28P3GOi0Szy4X7xykjBsgrTemP.', NULL, 'fresterdui98@gmail.com', 0, 10, 1638822369, 1638822369, 'xC3U22E_E6jPKS5TWUMP6RiSIMX1MQKV_1638822369');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`id_huesped`) REFERENCES `huesped` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`id_limpieza`) REFERENCES `limpieza` (`id`),
  ADD CONSTRAINT `estado_ibfk_2` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupacion` (`id`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`id_tipo_habitacion`) REFERENCES `tipo_habitacion` (`id`),
  ADD CONSTRAINT `habitacion_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`);

--
-- Filtros para la tabla `huesped`
--
ALTER TABLE `huesped`
  ADD CONSTRAINT `huesped_ibfk_3` FOREIGN KEY (`id_estancia`) REFERENCES `estancia` (`id`),
  ADD CONSTRAINT `huesped_ibfk_4` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id`);

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
