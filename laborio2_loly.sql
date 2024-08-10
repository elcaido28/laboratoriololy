-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-08-2020 a las 17:47:08
-- Versión del servidor: 5.6.41-84.1
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laborio2_loly`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabecera_examen`
--

CREATE TABLE `cabecera_examen` (
  `cabecera_exa_id` int(11) NOT NULL,
  `fecha_ingreso_exa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion_exa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_examen` varchar(300) NOT NULL,
  `precio_examen` varchar(15) NOT NULL,
  `doctor_externo` varchar(150) NOT NULL,
  `tipo_pago` varchar(30) NOT NULL,
  `abono` varchar(30) NOT NULL,
  `estado_exa_id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cabecera_examen`
--

INSERT INTO `cabecera_examen` (`cabecera_exa_id`, `fecha_ingreso_exa`, `fecha_modificacion_exa`, `tipo_examen`, `precio_examen`, `doctor_externo`, `tipo_pago`, `abono`, `estado_exa_id`, `id_paciente`) VALUES
(1, '2020-08-17 22:18:40', '2020-08-17 22:18:40', 'Examen Orina*Examen Físico - Químico de Orina*Examen de Sangre*Examen de Sangre - Embarazo*Examen de Secreción*Examen Biometría Hemática', '59', 'Doctor Externo', '2', '30', 1, 11),
(2, '2020-08-18 00:36:51', '2020-08-18 00:37:47', 'Examen de Sangre - Embarazo', '32', 'Asdasd Asdasdasd', '1', '0', 1, 15),
(3, '2020-08-18 00:43:58', '2020-08-18 00:43:58', 'Examen Orina', '12', 'Doctor Nuieov', '1', '0', 1, 4),
(4, '2020-08-18 21:46:18', '2020-08-18 21:46:18', 'Examen de Secreción', '12', 'Dr Bryan Veliz', '1', '0', 1, 4),
(5, '2020-08-23 11:14:01', '2020-08-23 11:14:01', 'Examen de Sangre', '20', 'Doctor', '1', '0', 2, 11),
(6, '2020-08-23 11:15:29', '2020-08-23 11:15:29', 'Examen de Sangre*Examen de Secreción', '20', 'Doctor', '1', '0', 2, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabecera_resultado`
--

CREATE TABLE `cabecera_resultado` (
  `cabecera_resultado_id` int(11) NOT NULL,
  `cabecera_resultado_fechai` date NOT NULL,
  `cabecera_resultado_fecham` date NOT NULL,
  `cabecera_tipo_formato` varchar(10) NOT NULL,
  `privacidad` int(5) NOT NULL,
  `cabecera_exa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cabecera_resultado`
--

INSERT INTO `cabecera_resultado` (`cabecera_resultado_id`, `cabecera_resultado_fechai`, `cabecera_resultado_fecham`, `cabecera_tipo_formato`, `privacidad`, `cabecera_exa_id`) VALUES
(1, '2020-08-18', '2020-08-18', '3', 1, 1),
(2, '2020-08-18', '2020-08-18', '1', 1, 1),
(3, '2020-08-18', '2020-08-18', '2', 1, 1),
(4, '2020-08-18', '2020-08-18', '4', 1, 1),
(5, '2020-08-18', '2020-08-18', '5', 1, 1),
(6, '2020-08-18', '2020-08-18', '6', 1, 1),
(7, '2020-08-18', '2020-08-18', '4', 1, 2),
(8, '2020-08-18', '2020-08-18', '1', 1, 3),
(9, '2020-08-18', '2020-08-18', '5', 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_examen`
--

CREATE TABLE `detalle_examen` (
  `detalle_examen_id` int(11) NOT NULL,
  `detalle_examen_dscrp` varchar(200) NOT NULL,
  `cabecera_exa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_examen`
--

INSERT INTO `detalle_examen` (`detalle_examen_id`, `detalle_examen_dscrp`, `cabecera_exa_id`) VALUES
(1, 'Hematies', 1),
(2, 'Plaquetas', 1),
(3, 'V.D.R. tantit', 1),
(4, 'Glicemia', 1),
(5, 'Eritrosedimentación', 2),
(6, 'Reticulocitos', 2),
(7, 'Fibrinógeno', 2),
(8, 'Hematies', 3),
(9, 'Hemotócrito', 3),
(10, 'R.A. (Turb.)', 4),
(11, 'R. de Widal', 4),
(12, 'Strep A.', 4),
(13, 'lgG', 5),
(14, 'Vitamina D', 5),
(15, 'IGFBP-3', 6),
(16, 'lgG', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_resultado`
--

CREATE TABLE `detalle_resultado` (
  `detalle_resultado_id` int(11) NOT NULL,
  `detalle_resultado_seccion` varchar(300) NOT NULL,
  `detalle_resultado_tipoexa` text NOT NULL,
  `detalle_resultado_resul` text NOT NULL,
  `cabecera_resultado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_resultado`
--

INSERT INTO `detalle_resultado` (`detalle_resultado_id`, `detalle_resultado_seccion`, `detalle_resultado_tipoexa`, `detalle_resultado_resul`, `cabecera_resultado_id`) VALUES
(1, 'Perfil Bioquimicos', 'Glucosa', '1*ml*110 a 130', 1),
(2, 'Perfil Bioquimicos', 'Null', '', 1),
(3, 'Perfil Bioquimicos', 'Trigliceridos', '1*mg/dl*30 a 60', 1),
(4, 'Examen Fisico-Quimico de Orina', 'Color', 'Amarillo', 1),
(5, 'Examen Fisico-Quimico de Orina', 'Aspecto', 'Transparente', 1),
(6, 'Examen Fisico-Quimico de Orina', 'Densidad', '2', 1),
(7, 'Examen Fisico-Quimico de Orina', 'PH', '2', 1),
(8, 'Examen Fisico-Quimico de Orina', 'Glucosaplus', 'Positivo', 1),
(9, 'Examen Fisico-Quimico de Orina', 'Nitritos', 'Positivo', 1),
(10, 'Examen Fisico-Quimico de Orina', 'C. Cetonicos', 'Positivo', 1),
(11, 'Examen Fisico-Quimico de Orina', 'Proteínas', 'Positivo', 1),
(12, 'Examen Fisico-Quimico de Orina', 'Uroblinogeno', 'Positivo', 1),
(13, 'Examen Fisico-Quimico de Orina', 'Bilirrubinas', 'Positivo', 1),
(14, 'Examen Fisico-Quimico de Orina', 'Sangre', 'Positivo', 1),
(15, 'Examen Fisico-Quimico de Orina', 'Acido Ascorbico', 'Positivo', 1),
(16, 'Examen Fisico-Quimico de Orina', 'Leucocitos', 'Positivo', 1),
(17, 'Sedimento', 'Cell Epiteliales Escamosas', 'Moderadas', 1),
(18, 'Sedimento', 'Bacterias Bacilares', 'Moderadas', 1),
(19, 'Sedimento', 'Procitos', '3', 1),
(20, 'Sedimento', 'C. Oxalato de Calcio', '3', 1),
(21, 'Sedimento', 'Filamentos Mucosos', '3', 1),
(22, 'Examen de Heces', 'Colorhe', 'Cafe', 1),
(23, 'Examen de Heces', 'Aspectohe', 'Duras', 1),
(24, 'Examen de Heces', 'Reaccion', '4', 1),
(25, 'Observacion Microscopica', 'Parásitos', '5', 1),
(26, 'Observacion Microscopica', 'Predominio Bacterias Bacilares', '5', 1),
(27, 'Observacion Microscopica', 'Granulos de almidon', '5', 1),
(28, 'Bacteriologia Cultivo - Antibiograma de Orina', 'Contaje de Colonias', '22', 2),
(29, 'Bacteriologia Cultivo - Antibiograma de Orina', 'Null', '', 2),
(30, 'Antibiograma', 'Acido Nalidixico', 'Sensible', 2),
(31, 'Antibiograma', 'Amikacina', 'Sensible', 2),
(32, 'Antibiograma', 'Ampicilina Sulbactam', 'Sensible', 2),
(33, 'Antibiograma', 'Amoxicilina + AC Clavulanico', 'Sensible', 2),
(34, 'Antibiograma', 'Nitrofurantoina', 'Sensible', 2),
(35, 'Fisico-Quimico', 'Color', 'Amarillo', 3),
(36, 'Fisico-Quimico', 'Aspecto', 'Transparente', 3),
(37, 'Fisico-Quimico', 'Densidad', '11', 3),
(38, 'Fisico-Quimico', 'PH', '1', 3),
(39, 'Fisico-Quimico', 'Glucosaplus', 'Positivo', 3),
(40, 'Fisico-Quimico', 'Nitritos', 'Positivo', 3),
(41, 'Fisico-Quimico', 'C. Cetonicos', 'Positivo', 3),
(42, 'Fisico-Quimico', 'Proteínas', 'Positivo', 3),
(43, 'Fisico-Quimico', 'Uroblinogeno', 'Positivo', 3),
(44, 'Fisico-Quimico', 'Bilirrubinas', 'Positivo', 3),
(45, 'Fisico-Quimico', 'Sangre', 'Positivo', 3),
(46, 'Fisico-Quimico', 'Acido Ascorbico', 'Positivo', 3),
(47, 'Fisico-Quimico', 'Leucocitos', 'Positivo', 3),
(48, 'Sedimento', 'Cel. Epiteliales Escamosas', 'Moderadas', 3),
(49, 'Sedimento', 'Bacterias', 'Moderadas', 3),
(50, 'Sedimento', 'Piocitos', '2', 3),
(51, 'Sedimento', 'Hematies', '2', 3),
(52, 'Sedimento', 'Filamentos Mucosos', '2', 3),
(53, 'Examen de Sangre - Embarazo', 'Prueba de Embarazo', 'NEGATIVO*-*-', 4),
(54, 'secrecion', 'Otros', '', 5),
(55, 'En fresco', 'Microorganismos', '123', 5),
(56, 'En fresco', 'Celulas Epiteliales Escamosas', 'Moderadas', 5),
(57, 'En fresco', 'Bacterias', 'Moderadas', 5),
(58, 'En fresco', 'Piocitos', '32', 5),
(59, 'En fresco', 'Filamentos Mucosos', '23', 5),
(60, 'Antibiograma', 'Ac Nalidixico', 'Sensible', 5),
(61, 'Antibiograma', 'Amikacina', 'Sensible', 5),
(62, 'Antibiograma', 'Amox +AC Clavulanico', 'Sensible', 5),
(63, 'Antibiograma', 'Cefalexina', 'Sensible', 5),
(64, 'Antibiograma', 'Ceftriaxona', 'Sensible', 5),
(65, 'Antibiograma', 'Levofloxacina', 'Sensible', 5),
(66, 'Antibiograma', 'Tetraciclina', 'Sensible', 5),
(67, 'Biometria', 'Globulos Blancos', '2*10^3/ul*4,0 - 10,0', 6),
(68, 'Biometria', 'Linfocitos #', '2*10^3/ul*0,8 - 4,0', 6),
(69, 'Biometria', 'Celulas Intermedias #', '2*10^3/ul*0,1 - 0,9', 6),
(70, 'Biometria', 'Segmentados #', '2*10^3/ul*2,0 - 7,0', 6),
(71, 'Biometria', 'Linfocitos %', '2*%*20,0 - 40,0', 6),
(72, 'Biometria', 'Celulas Intermedias %', '2*%*3,0 - 9,0', 6),
(73, 'Biometria', 'Null', '', 6),
(74, 'Celulas Atipicas', 'Hemoglobina', '3*g/dl*11,0 - 15,0', 6),
(75, 'Celulas Atipicas', 'Glóbulos Rojos', '3*10^6/ul*3,50 - 5,00', 6),
(76, 'Celulas Atipicas', 'Hematocrito', '3*%*37,0 - 48,0', 6),
(77, 'Celulas Atipicas', 'VCM', '3*fL*82,0 - 95,0', 6),
(78, 'Celulas Atipicas', 'HCM', '3*pg*27,0 - 31,0', 6),
(79, 'Celulas Atipicas', 'CHCM', '3*g/dL*32,0 - 36,0', 6),
(80, 'Celulas Atipicas', 'WDR-VC', '3*%*11,5 - 14,5', 6),
(81, 'Celulas Atipicas', 'WDR-DS', '3*fL*35,0 - 56,0', 6),
(82, 'Celulas Atipicas', 'Plaquetas', '3*10^3/uL*150 - 450', 6),
(83, 'Celulas Atipicas', 'MPV', '3*fL*7,0 - 11,0', 6),
(84, 'Celulas Atipicas', 'WDP', '3*%*15,0 - 17,0', 6),
(85, 'Celulas Atipicas', 'PCT', '3*%*0,108 - 0,282', 6),
(86, 'Extendido Sanguineo', 'SEGMENTADOS', '4*%', 6),
(87, 'Extendido Sanguineo', 'LINFOCITOS', '4*%', 6),
(88, 'Extendido Sanguineo', 'MONOCITOS', '4*%', 6),
(89, 'Extendido Sanguineo', 'NEUTROFILOS', '4*%', 6),
(90, 'Extendido Sanguineo', 'EOSINOFILOS', '4*%', 6),
(91, 'Extendido Sanguineo', 'BASOFILOS', '4*%', 6),
(92, 'Examen de Sangre - Embarazo', 'Prueba de Embarazo', 'POSITIVO*-*-', 7),
(93, 'Bacteriologia Cultivo - Antibiograma de Orina', 'Contaje de Colonias', '12', 8),
(94, 'Bacteriologia Cultivo - Antibiograma de Orina', 'Microorganismo', '15', 8),
(95, 'Antibiograma', 'Acido Nalidixico', 'Sensible', 8),
(96, 'Antibiograma', 'Amikacina', 'Sensible', 8),
(97, 'Antibiograma', 'Ampicilina Sulbactam', 'Sensible', 8),
(98, 'Antibiograma', 'Amoxicilina + AC Clavulanico', 'Sensible', 8),
(99, 'Antibiograma', 'Nitrofurantoina', 'Sensible', 8),
(100, 'secrecion', 'Vaginal', '', 9),
(101, 'En fresco', 'Microorganismos', 'eed', 9),
(102, 'En fresco', 'Celulas Epiteliales Escamosas', 'Moderadas', 9),
(103, 'En fresco', 'Bacterias', 'Moderadas', 9),
(104, 'En fresco', 'Piocitos', '12', 9),
(105, 'En fresco', 'Filamentos Mucosos', '2323', 9),
(106, 'Antibiograma', 'Ac Nalidixico', 'Sensible', 9),
(107, 'Antibiograma', 'Amikacina', 'Sensible', 9),
(108, 'Antibiograma', 'Amox +AC Clavulanico', 'Sensible', 9),
(109, 'Antibiograma', 'Cefalexina', 'Sensible', 9),
(110, 'Antibiograma', 'Ceftriaxona', 'Sensible', 9),
(111, 'Antibiograma', 'Levofloxacina', 'Sensible', 9),
(112, 'Antibiograma', 'Tetraciclina', 'Sensible', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `nombres` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `cedula` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `fecha_ingreso`, `fecha_modificacion`, `nombres`, `apellidos`, `cedula`, `telefono`, `celular`, `correo`, `direccion`, `id_rol`, `id_perfil`, `id_estado`) VALUES
(1, '2020-03-08', '2020-03-09', 'Admin', 'Admin', '0000000000', '000000', '0000000000', 'admin@admin.com', 'direccion admin', 1, 1, 1),
(10, '2020-03-09', '2020-07-16', 'JosÃ© Miguel', 'PÃ©rez Mendes', '0919191923', '2123123', '0123123123', 'jperez@gmail.com', 'Direccion de jose', 2, 2, 1),
(11, '2020-03-10', '2020-03-10', 'nombre prueba', 'apellido prueba', '0993939393', '2502729', '0939393993', 'prueba@correo.com', 'direccion prueba', 2, 2, 2),
(12, '2020-07-02', '2020-07-16', 'Virginia ConcepciÃ³n', 'Velez Arteaga', '0929061901', '564154646', '9849849848', 'asasd@asdasd.com', 'Direccion de la doctora', 4, 4, 1),
(13, '2020-07-03', '2020-07-17', 'Luis Ariolfo', 'Caisaguano Pincaya', '0929061901', '99393383', '0199129302', 'asasd@asdasd.com', 'Direccion del nuevo empleado', 2, 2, 1),
(14, '2020-07-04', '2020-07-04', 'Miguel Angel', 'CedeÃ±o Castro', '1800000000', '0292939393', '0912313123', 'asasd@asdasd.com', 'Asdmad', 2, 5, 2),
(15, '2020-07-04', '2020-07-04', 'Aasd Asdasd', 'Qe Qweqwewq', '1800000000', '3129319321', '0193012931', 'asasd@asdasd.com', 'Asdasdsad', 2, 2, 2),
(16, '2020-08-14', '2020-08-14', 'Maria', 'Mendoza', '0929111557', '2525252525', '0980701329', 'mariamendozau@gmail.com', 'Bastion', 4, 2, 1),
(17, '2020-08-14', '2020-08-14', 'Roger', 'Barcia', '0950683268', '043006577', '0985136532', 'rdbarcia@gmail.com', 'Fortin bl 1 mz 1621 sl5', 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre_estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_examen`
--

CREATE TABLE `estado_examen` (
  `estado_exa_id` int(11) NOT NULL,
  `estado_exa_dscrp` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_examen`
--

INSERT INTO `estado_examen` (`estado_exa_id`, `estado_exa_dscrp`) VALUES
(1, 'Resultados'),
(2, 'Sin Resultados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `nombres` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `tipo_identificacion` int(11) NOT NULL,
  `identificacion` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(11) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `observacion` text NOT NULL,
  `paciente_usuario` varchar(250) NOT NULL,
  `paciente_clave` varchar(50) NOT NULL,
  `sexo` int(11) NOT NULL,
  `tipo_paciente` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `fecha_ingreso`, `fecha_modificacion`, `nombres`, `apellidos`, `tipo_identificacion`, `identificacion`, `fecha_nacimiento`, `edad`, `telefono`, `celular`, `correo`, `direccion`, `observacion`, `paciente_usuario`, `paciente_clave`, `sexo`, `tipo_paciente`, `estado`) VALUES
(4, '2020-06-12', '2020-07-13', 'Hillary Tahiz', 'Murillo Miranda', 1, '0930974704', '2001-07-14', 20, '24493883', '0912121213', 'tahiz@gmail.com', 'sauces 3', 'observacion1', '0930974704', 'paci123', 2, 1, 1),
(11, '2020-07-02', '2020-08-17', 'Carlos Andres', 'Vera Pérez', 1, '0950039982', '1990-12-15', 29, '65465416', '1954195419', 'asasd@asdasd.com', 'direccion del 11', 'observacion del 11', '0950039982', 'paci111', 1, 1, 1),
(14, '2020-07-02', '2020-07-13', 'Dina Mariela', 'Chiliquinga Pilay', 1, '0929061901', '1965-04-15', 55, '0425187963', '0959552346', 'chili@hotmail.com', 'dioreccion', 'Obserrvacion', '0929061901', 'paci222', 2, 1, 1),
(15, '2020-08-14', '2020-08-14', 'Allison', 'Palma', 1, '0952364297', '1996-11-08', 23, '2525252525', '0980701329', 'allisonpalma@gmail.com', 'samanes', 'Ninguna', '0952364297', '1UF9wpcuMW', 2, 1, 2),
(16, '2020-08-20', '2020-08-20', 'Asdasd As', 'Asdasd Asd', 1, '0929061919', '1995-12-12', 24, '123123123', '0199129302', '', 'asdasdasd', 'Asdasdasd', '0929061919', '8EN09xeqm', 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nombre_perfil` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nombre_perfil`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `userId` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`userId`, `id`, `title`, `body`) VALUES
(1, 1, 'prueba1', 'prueba 1 objeto'),
(2, 2, 'prueba2', 'prueba 2 objeto'),
(3, 3, 'prueba3', 'prueba 3 objeto'),
(4, 4, 'prueba4', 'prueba 4 objeto'),
(5, 5, 'prueba5', 'prueba 5 objeto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reactivo`
--

CREATE TABLE `reactivo` (
  `id_reactivo` int(11) NOT NULL,
  `nombre_reactivo` varchar(300) NOT NULL,
  `precio_reactivo` varchar(30) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reactivo`
--

INSERT INTO `reactivo` (`id_reactivo`, `nombre_reactivo`, `precio_reactivo`, `id_estado`) VALUES
(2, 'Leucocitos', '0.76', 1),
(3, 'Hemotócrito', '0.77', 1),
(4, 'Hemoglobina', '0.78', 1),
(5, 'H. de Schilling', '0.79', 1),
(6, 'Eritrosedimentación', '0.80', 1),
(7, 'Plaquetas', '0.81', 1),
(8, 'Reticulocitos', '0.82', 1),
(9, 'HT. de sangría ', '0.83', 1),
(10, 'Coagulación', '0.84', 1),
(11, 'T. de protombina', '0.85', 1),
(12, 'Tromboplastina', '0.86', 1),
(13, 'Fibrinógeno', '0.87', 1),
(14, 'Grupo y R.h.', '0.88', 1),
(15, 'Widal', '0.89', 1),
(16, 'Proteos O x 19', '0.90', 1),
(17, 'V.D.R. tant', '0.91', 1),
(18, 'V.D.R. tantit', '0.92', 1),
(19, 'Plasmodium', '0.93', 1),
(20, 'R.A. test', '0.94', 1),
(21, 'A.S.T.O', '85', 1),
(22, 'P.C. reactiva', '0.75', 1),
(23, 'Toxoplasmosis', '0.76', 1),
(24, 'Dengue', '0.77', 1),
(25, 'A.S.T.O (Turb.)', '0.78', 1),
(26, 'P.C.R. (Turb.)', '0.79', 1),
(27, 'R.A. (Turb.)', '0.80', 1),
(28, 'Calculas L.E.', '0.81', 1),
(29, 'Mononucleosis', '0.82', 1),
(30, 'R. de Hudlesson', '0.83', 1),
(31, 'R. de Weill Felix', '0.84', 1),
(32, 'R. de Widal', '0.85', 1),
(33, 'Strep A. ', '0.86', 1),
(34, 'V.D.R.L.', '0.87', 1),
(35, 'Ac. urico', '0.88', 1),
(36, 'Urea', '0.89', 1),
(37, 'Creatinina', '0.90', 1),
(38, 'Glucosa', '0.91', 1),
(39, 'Colesterol', '0.92', 1),
(40, 'L.D.L. colesterol', '0.93', 1),
(41, 'H.D.L. colesterol', '0.94', 1),
(42, 'Triglicéridos', '0.95', 1),
(43, 'Lípidos totales', '0.96', 1),
(44, 'Sodio', '0.97', 1),
(45, 'Cloro', '0.98', 1),
(46, 'Potasio', '0.99', 1),
(47, 'Calcio', '0.10', 1),
(48, 'Glicemia', '0.11', 1),
(49, 'Glicemia Post-Prandial', '0.12', 1),
(50, 'Glicemia Tolerancia', '0.13', 1),
(51, 'BUN', '0.14', 1),
(52, 'Colesterol Total', '0.15', 1),
(53, 'Lípidos', '0.16', 1),
(54, 'Fosfolipidos', '0.17', 1),
(55, 'Beta Lipoproteína', '0.18', 1),
(56, 'Proteínas y Fracciones', '0.19', 1),
(57, 'Bilirrubinas y Fracciones', '0.20', 1),
(58, 'Indice icterico', '0.21', 1),
(59, 'GOT', '0.22', 1),
(60, 'GPT', '0.23', 1),
(61, 'LDH', '0.24', 1),
(62, 'CHE (Colinesferasa)', '0.25', 1),
(63, 'GGT (gamma GT)', '0.26', 1),
(64, 'Fof. Alcalina', '0.27', 1),
(65, 'Fosf. Acida Total', '0.28', 1),
(66, 'Fosf. Acida Prostática', '0.29', 1),
(67, 'Amilasa', '0.30', 1),
(68, 'Lipasa', '0.31', 1),
(69, 'C.P.K. (Nac)', '0.32', 1),
(70, 'C.K.K. (Mb)', '0.33', 1),
(71, 'Bilirrubina directa', '0.34', 1),
(72, 'Ind. ictérica', '0.35', 1),
(73, 'Bilirrubina indirecta', '0.36', 1),
(74, 'Prot. totales', '0.37', 1),
(75, 'Seroalbúmina', '0.38', 1),
(76, 'S.G.P.T', '0.39', 1),
(77, 'S.G.O.T', '0.40', 1),
(78, 'Colinesterasa', '0.41', 1),
(79, 'D.L.H', '0.42', 1),
(80, 'Fosfat alcalina', '0.43', 1),
(81, 'Fosfat. acid. total', '0.44', 1),
(82, 'Fosfat. acid. prost.', '0.45', 1),
(83, 'G.G.T.P', '0.46', 1),
(84, 'C.P.K.MB.', '0.47', 1),
(85, 'Amilasa orina', '0.48', 1),
(86, 'Amilasa sérica', '0.49', 1),
(87, 'Lipasa sérica', '0.50', 1),
(88, 'Físico', '0.51', 1),
(89, 'Químico', '0.52', 1),
(90, 'Sedimento', '0.53', 1),
(91, 'Cultivo antibiograma', '0.54', 1),
(92, 'Gravindex', '0.55', 1),
(93, 'Urinalisis EMO (F.Q.S.)', '0.56', 1),
(94, 'Albumina 24h', '0.57', 1),
(95, 'Albumina Ocasional', '0.58', 1),
(96, 'Cloro en Orina', '0.59', 1),
(97, 'Cocaína', '0.60', 1),
(98, 'Creatinina 24h', '0.61', 1),
(99, 'Creatinina Ocasional', '0.62', 1),
(100, 'Depuración de Creatinina', '0.63', 1),
(101, 'Directo de B.K. (BAAR)', '0.64', 1),
(102, 'Drogas Panel', '0.65', 1),
(103, 'Embarazo', '0.66', 1),
(104, 'Fósforo de Orina', '0.67', 1),
(105, 'Magnesio', '0.68', 1),
(106, 'Marihuana', '0.69', 1),
(107, 'Microalbuminuria', '0.70', 1),
(108, 'Potasio en Orina', '0.71', 1),
(109, 'Proteina de Bence Jones', '0.72', 1),
(110, 'Pyrilinks - D', '0.73', 1),
(111, 'Recuento de ADDIS', '0.74', 1),
(112, 'Sodio en 24h', '0.75', 1),
(113, 'Sodio Ocacional', '0.76', 1),
(114, 'Tinción de Gram', '0.77', 1),
(115, 'Parasitológico', '0.78', 1),
(116, 'Estudio del moco fecal', '0.79', 1),
(117, 'Sangre oculta', '0.80', 1),
(118, 'Tinición de Gram', '0.81', 1),
(119, 'Coprocultivo', '0.82', 1),
(120, 'Heces: Parásitos por Concent', '0.83', 1),
(121, 'Sudan III-Grasas', '0.84', 1),
(122, 'Citología Moco Fecal', '0.85', 1),
(123, 'Funcional', '0.86', 1),
(124, 'Heces Adenovirus', '0.87', 1),
(125, 'Heces H. Pylori', '0.88', 1),
(126, 'Heces Nickerson', '0.89', 1),
(127, 'Heces Rotavirus', '0.90', 1),
(128, 'Heces Sangre Oculta', '0.91', 1),
(129, 'Oxiuroa Tec. Graham', '0.92', 1),
(130, 'Parásitos', '0.93', 1),
(131, 'Tinición de Gram', '0.94', 1),
(132, 'Ziel (B de K)', '0.95', 1),
(133, 'Cultivo antibiograma', '0.96', 1),
(134, 'Esputo de B.k. (B.A.A.R.)', '0.11', 1),
(135, 'Tinción de Gram', '0.12', 1),
(136, 'Espermatograma', '0.13', 1),
(137, 'Cultivo antibiograma', '0.14', 1),
(138, 'Hemograma', '0.15', 1),
(139, 'Trombocitos', '0.16', 1),
(140, 'Reticulocitos', '0.17', 1),
(141, 'Hematozoarios (Crom)', '0.18', 1),
(142, 'Prolactina', '0.19', 1),
(143, 'Entrosedimentación', '0.20', 1),
(144, 'Frag. Osmótica', '0.21', 1),
(145, 'Grupo Sanguíneo y Rh.', '0.22', 1),
(146, 'T. de Sangría', '0.23', 1),
(147, 'T. de Coagulación', '0.24', 1),
(148, 'T.P.', '0.25', 1),
(149, 'T.T.P.', '0.26', 1),
(150, 'R.I.N.', '0.27', 1),
(151, 'Fibrinógino', '0.28', 1),
(152, 'Frotis Sangre Periférica', '0.29', 1),
(153, 'Coombs Directa', '0.30', 1),
(154, 'Retracción de Coágulo', '0.31', 1),
(155, 'Coombs Directa', '0.32', 1),
(156, 'Coombs Indirecta', '0.33', 1),
(157, 'Cloro', '0.34', 1),
(158, 'Sodio', '0.35', 1),
(159, 'Potasio', '0.36', 1),
(160, 'Calcio Total', '0.37', 1),
(161, 'Calcio Lónico', '0.38', 1),
(162, 'Amonio', '0.39', 1),
(163, 'Fósforo', '0.40', 1),
(164, 'Hierro', '0.41', 1),
(165, 'Litio', '0.42', 1),
(166, 'Magnesio', '0.43', 1),
(167, 'Plomo', '0.44', 1),
(168, 'Reserva Alcalina', '0.45', 1),
(169, 'Coprocultivo', '0.46', 1),
(170, 'Esperma Secreción', '0.47', 1),
(171, 'Esputo', '0.48', 1),
(172, 'Exudado Faringeo', '0.49', 1),
(173, 'Hemocultivo', '0.50', 1),
(174, 'Rinofaringeo', '0.51', 1),
(175, 'Uretral Secreción', '0.52', 1),
(176, 'Urocultivo', '0.53', 1),
(177, 'Vaginal Secreción', '0.54', 1),
(178, 'P. embarazo en sangre', '0.55', 1),
(179, 'T3-T4', '0.56', 1),
(180, 'Clamudia', '0.57', 1),
(181, 'Progresivos', '0.58', 1),
(182, 'Prolactina', '0.59', 1),
(183, 'Sera ameba', '0.60', 1),
(184, 'Complemento C3-C4', '0.61', 1),
(185, '17 Beta-Estradiol', '0.62', 1),
(186, 'Ac Anti DNA', '0.63', 1),
(187, 'Ac Anti-Nucleares (ANA)', '0.64', 1),
(188, 'Ac Anti-RNP/SM', '0.65', 1),
(189, 'Ac Anti-TB', '0.66', 1),
(190, 'Ac Anti-Tiroglobulina (ATG)', '0.67', 1),
(191, 'Ac. SS-A(Ro)/SS-B(La)B', '0.68', 1),
(192, 'Acido Fólico', '0.69', 1),
(193, 'Acido Valproico', '0.70', 1),
(194, 'ACTH', '0.71', 1),
(195, 'AFP (Alfa Feto Proteína)', '0.72', 1),
(196, 'Alergias Alergenos Específico', '0.73', 1),
(197, 'Alergias Panel', '0.74', 1),
(198, 'AMA - Antimitoncondrial', '0.75', 1),
(199, 'Anca C', '0.76', 1),
(200, 'Anca P', '0.77', 1),
(201, 'Anti - ENA', '0.78', 1),
(202, 'Antitrombina III', '0.79', 1),
(203, 'Apolipoproteína A1', '0.80', 1),
(204, 'Apolipoproteína B', '0.81', 1),
(205, 'ASMA - Anti musculo liso', '0.82', 1),
(206, 'Beta-2 microglobulina', '0.83', 1),
(207, 'Ca 125', '0.84', 1),
(208, 'CA 15-3', '0.85', 1),
(209, 'CA 19-9', '0.86', 1),
(210, 'CA 72-4', '0.87', 1),
(211, 'Calcitonina (Tirocal)', '0.88', 1),
(212, 'Cálculo Renal', '0.89', 1),
(213, 'Carbamazepina', '0.90', 1),
(214, 'Cardiolipina lgG', '0.91', 1),
(215, 'Cardiolipina lgM', '0.92', 1),
(216, 'CEA', '0.93', 1),
(217, 'Chagas (Ac. Anti-Chagas)', '0.94', 1),
(218, 'Chlamydia Ac. Anti-C lgG', '0.95', 1),
(219, 'Chlamydia Ac. Anti-C lgM', '0.96', 1),
(220, 'Cistatina C', '0.97', 1),
(221, 'Cisticercosis (Ac. Anti)', '0.98', 1),
(222, 'Citomegalovirus (Ac. anti-lgG)', '0.5', 1),
(223, 'Citomegalovirus (Ac. anti-lgM)', '0.6', 1),
(224, 'Complemento C3', '0.7', 1),
(225, 'Complemento C4', '0.11', 1),
(226, 'Cortisol', '0.12', 1),
(227, 'Cyfra 21-1', '0.13', 1),
(228, 'Dengue (Ac. Anti-lgG)', '0.14', 1),
(229, 'Dengue (Ac. Anti-lgM)', '0.15', 1),
(230, 'DHEAS', '0.16', 1),
(231, 'Digoxina', '0.17', 1),
(232, 'Dimero D', '0.18', 1),
(233, 'Embarazo en sangre', '0.19', 1),
(234, 'Epstein Barr-lgG', '0.20', 1),
(235, 'Epstein Barr-lgM', '0.21', 1),
(236, 'Eritopoyetina', '0.22', 1),
(237, 'Estriol no Conjugado', '0.23', 1),
(238, 'Factor Reumatoideo', '0.24', 1),
(239, 'Factor de Von Willebrand', '0.25', 1),
(240, 'Factor V', '0.26', 1),
(241, 'Factor VII', '0.27', 1),
(242, 'Factor VIII', '0.28', 1),
(243, 'Factor IX', '0.29', 1),
(244, 'Factor X', '0.30', 1),
(245, 'Factor XI', '0.31', 1),
(246, 'Factor XII', '0.32', 1),
(247, 'Fenitoina', '0.33', 1),
(248, 'Fenobarbital', '0.34', 1),
(249, 'Ferritina', '0.35', 1),
(250, 'Fructosamina', '0.36', 1),
(251, 'FSH', '0.37', 1),
(252, 'FTA Absorción', '0.38', 1),
(253, 'Glucosa 6 Fosfato deshidrogenasa', '0.39', 1),
(254, 'Haptoglobina', '0.40', 1),
(255, 'HbA1c Hemog. Glicosilada', '0.41', 1),
(256, 'HCG cuantitativa', '0.42', 1),
(257, 'Hepatitis A (Ac. Anti-lgG)', '0.43', 1),
(258, 'Hepatitis A (Ac. Anti-lgM)', '0.44', 1),
(259, 'Hepattitis B (Ac. Anti-HBS)', '0.45', 1),
(260, 'Hepattitis B (Ac. Anti-HBcore lgG)', '0.46', 1),
(261, 'Hepattitis B (Ac. Anti-HBcore lgM)', '0.47', 1),
(262, 'Hepatitis B HBeAg', '0.48', 1),
(263, 'Hepatitis B HBsAg', '0.49', 1),
(264, 'Hepatitis C (Ac. Anti)', '0.50', 1),
(265, 'Herpes 1 lgG', '0.51', 1),
(266, 'Herpes 1 lgM', '0.52', 1),
(267, 'Herpes 2 lgG', '0.53', 1),
(268, 'Herpes 2 lgM', '0.54', 1),
(269, 'HGH', '0.55', 1),
(270, 'HIV (Ac. Anti-1 y 2)', '0.56', 1),
(271, 'HLA-B27', '0.57', 1),
(272, 'Homa IR', '0.58', 1),
(273, 'Homocisteína', '0.59', 1),
(274, 'lgA', '0.60', 1),
(275, 'lgE', '0.61', 1),
(276, 'IGF-1', '0.62', 1),
(277, 'IGFBP-3', '0.63', 1),
(278, 'lgG', '0.64', 1),
(279, 'lgM', '0.65', 1),
(280, 'Insulina', '0.66', 1),
(281, 'LH', '0.67', 1),
(282, 'Leptospirosis lgG', '0.68', 1),
(283, 'Leptospirosis lgM', '0.69', 1),
(284, 'Lipoproteína (a) LP(a)', '0.70', 1),
(285, 'Mioglobina', '0.71', 1),
(286, 'Neuro-enolasa', '0.72', 1),
(287, 'Péptido C', '0.73', 1),
(288, 'Ac. Anti-Péptido Citrulinado', '0.74', 1),
(289, 'Péptido Natriurético BNP', '0.75', 1),
(290, 'P.P.D.', '0.76', 1),
(291, 'Prealbúmina', '0.77', 1),
(292, 'Progesterona', '0.78', 1),
(293, 'Prolactina', '0.79', 1),
(294, 'PRP (Plasma Rico en Plaquetas)', '0.80', 1),
(295, 'PSA', '0.81', 1),
(296, 'PSA libre porcentaje', '0.82', 1),
(297, 'PTH', '0.83', 1),
(298, 'Pilory lgA', '0.84', 1),
(299, 'Pilory lgG', '0.85', 1),
(300, 'Pilory lgM', '0.86', 1),
(301, 'Rubeola (Ac. Anti-lgG)', '0.87', 1),
(302, 'Rubeola (Ac. Anti-lgM)', '0.88', 1),
(303, 'Sarampión lgM', '0.89', 1),
(304, 'Scl 70', '0.90', 1),
(305, 'Serameba (Ac. Anti-ameba)', '0.91', 1),
(306, 'S.H.B.G', '0.92', 1),
(307, 'Suero Autólogo (Oftálmico)', '0.93', 1),
(308, 'T3 libre', '0.94', 1),
(309, 'T3 total', '0.95', 1),
(310, 'T4 libre', '0.96', 1),
(311, 'T4 total', '0.97', 1),
(312, 'Testosterona', '0.98', 1),
(313, 'Testosterona libre (calc)', '0.25', 1),
(314, 'Tiroglobulin', '0.26', 1),
(315, 'Toxoplasma (Ac. Anti-lgG)', '0.27', 1),
(316, 'Toxoplasma (Ac. Anti-lgM)', '0.28', 1),
(317, 'TPO (Ac.- Microsomales TPO)', '0.29', 1),
(318, 'Transferina', '0.30', 1),
(319, 'Transferina Saturación', '0.31', 1),
(320, 'Troponina I', '0.32', 1),
(321, 'Troponina T', '0.33', 1),
(322, 'TSH', '0.34', 1),
(323, 'Varicela lgG', '0.35', 1),
(324, 'Varicela lgM', '0.36', 1),
(325, 'Vitamina B 12', '0.37', 1),
(326, 'Vitamina D', '0.38', 1),
(1, 'Hematies', '0.30', 1),
(327, 'Prueba de embarazo cualitativa', '5', 1),
(328, 'Prueba de embarazo cuantitativa', '15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Químicofarmacéutico'),
(3, 'Auxiliar'),
(4, 'Secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL,
  `abreviatura` varchar(20) NOT NULL,
  `sexo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `abreviatura`, `sexo`) VALUES
(1, 'M', 'Masculino'),
(2, 'F', 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_formato`
--

CREATE TABLE `tipo_formato` (
  `formato_id` int(11) NOT NULL,
  `formato_nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_formato`
--

INSERT INTO `tipo_formato` (`formato_id`, `formato_nombre`) VALUES
(1, 'Examen Orina'),
(2, 'Examen FÃ­sico - QuÃ­mico de Orina'),
(3, 'Examen de Sangre'),
(4, 'Examen de Sangre - Embarazo'),
(5, 'Examen de SecreciÃ³n'),
(6, 'Examen BiometrÃ­a HemÃ¡tica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_identificacion`
--

CREATE TABLE `tipo_identificacion` (
  `id_tipoidentificacion` int(11) NOT NULL,
  `tipo_identificacion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_identificacion`
--

INSERT INTO `tipo_identificacion` (`id_tipoidentificacion`, `tipo_identificacion`) VALUES
(1, 'Cedula'),
(2, 'Pasaporte'),
(3, 'Representante\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_paciente`
--

CREATE TABLE `tipo_paciente` (
  `id_tipopaciente` int(11) NOT NULL,
  `tipo_paciente` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_paciente`
--

INSERT INTO `tipo_paciente` (`id_tipopaciente`, `tipo_paciente`) VALUES
(1, 'Natural'),
(2, 'Familiar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `clave` varchar(250) NOT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `id_empleado`) VALUES
(1, 'admin', 'admin', 1),
(2, 'jose', '123', 10),
(7, 'miguel', '123', 14),
(8, 'prueba', '123', 12),
(9, 'mariam', '12345', 16),
(10, 'rbarcia', '123456', 17);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cabecera_examen`
--
ALTER TABLE `cabecera_examen`
  ADD PRIMARY KEY (`cabecera_exa_id`),
  ADD KEY `estado_exa_id` (`estado_exa_id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `cabecera_resultado`
--
ALTER TABLE `cabecera_resultado`
  ADD PRIMARY KEY (`cabecera_resultado_id`),
  ADD KEY `cabecera_exa_id` (`cabecera_exa_id`);

--
-- Indices de la tabla `detalle_examen`
--
ALTER TABLE `detalle_examen`
  ADD PRIMARY KEY (`detalle_examen_id`),
  ADD KEY `cabecera_exa_id` (`cabecera_exa_id`);

--
-- Indices de la tabla `detalle_resultado`
--
ALTER TABLE `detalle_resultado`
  ADD PRIMARY KEY (`detalle_resultado_id`),
  ADD KEY `cabecera_resultado_id` (`cabecera_resultado_id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_perfil` (`id_perfil`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estado_examen`
--
ALTER TABLE `estado_examen`
  ADD PRIMARY KEY (`estado_exa_id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `sexo` (`sexo`,`tipo_paciente`),
  ADD KEY `tipo_identificacion` (`tipo_identificacion`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`userId`);

--
-- Indices de la tabla `reactivo`
--
ALTER TABLE `reactivo`
  ADD PRIMARY KEY (`id_reactivo`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `tipo_formato`
--
ALTER TABLE `tipo_formato`
  ADD PRIMARY KEY (`formato_id`);

--
-- Indices de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  ADD PRIMARY KEY (`id_tipoidentificacion`);

--
-- Indices de la tabla `tipo_paciente`
--
ALTER TABLE `tipo_paciente`
  ADD PRIMARY KEY (`id_tipopaciente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cabecera_examen`
--
ALTER TABLE `cabecera_examen`
  MODIFY `cabecera_exa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cabecera_resultado`
--
ALTER TABLE `cabecera_resultado`
  MODIFY `cabecera_resultado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalle_examen`
--
ALTER TABLE `detalle_examen`
  MODIFY `detalle_examen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `detalle_resultado`
--
ALTER TABLE `detalle_resultado`
  MODIFY `detalle_resultado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_examen`
--
ALTER TABLE `estado_examen`
  MODIFY `estado_exa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reactivo`
--
ALTER TABLE `reactivo`
  MODIFY `id_reactivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_formato`
--
ALTER TABLE `tipo_formato`
  MODIFY `formato_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  MODIFY `id_tipoidentificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_paciente`
--
ALTER TABLE `tipo_paciente`
  MODIFY `id_tipopaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
