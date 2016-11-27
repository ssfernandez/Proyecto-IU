-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-11-2016 a las 12:02:38
-- Versión del servidor: 5.5.44-0+deb8u1
-- Versión de PHP: 5.6.13-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mooveet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE IF NOT EXISTS `acciones` (
  `NOM_ACC` varchar(100) NOT NULL,
  `NOM_CONT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`NOM_ACC`, `NOM_CONT`) VALUES
('ADD', 'GEST_ACIONCONTR'),
('ADD', 'GEST_ACTIV'),
('ADD', 'GEST_CATEG'),
('ADD', 'GEST_CLI'),
('ADD', 'GEST_CLIEXT'),
('ADD', 'GEST_CONTR'),
('ADD', 'GEST_DESC'),
('ADD', 'GEST_ESP'),
('ADD', 'GEST_EVENT'),
('ADD', 'GEST_FACT'),
('ADD', 'GEST_HORARIO'),
('ADD', 'GEST_LESION'),
('ADD', 'GEST_NOTIF'),
('ADD', 'GEST_PAGO'),
('ADD', 'GEST_PERF'),
('ADD', 'GEST_RESERV'),
('ADD', 'GEST_SERV'),
('ADD', 'GEST_TRABAJ'),
('ADD', 'GEST_USR'),
('ADDAS','GEST_ASIST'),
('ADDAV','GEST_ASIST'),
('ADDC', 'GEST_CAJA'),
('ADDE', 'GEST_CAJA'),
('ADDH', 'GEST_FISIO'),
('ADDR', 'GEST_CAJA'),
('ADDR', 'GEST_FISIO'),
('SELECT', 'GEST_ACIONCONTR'),
('SELECT', 'GEST_ACTIV'),
('SELECT', 'GEST_CATEG'),
('SELECT', 'GEST_CLI'),
('SELECT', 'GEST_CLIEXT'),
('SELECT', 'GEST_CONTR'),
('SELECT', 'GEST_DESC'),
('SELECT', 'GEST_ESP'),
('SELECT', 'GEST_EVENT'),
('SELECT', 'GEST_FACT'),
('SELECT', 'GEST_HORARIO'),
('SELECT', 'GEST_LESION'),
('SELECT', 'GEST_PAGO'),
('SELECT', 'GEST_PERF'),
('SELECT', 'GEST_RESERV'),
('SELECT', 'GEST_SERV'),
('SELECT', 'GEST_TRABAJ'),
('SELECT', 'GEST_USR'),
('SELECTAS','GEST_ASIST'),
('SELECTAV','GEST_ASIST'),
('SELECTC', 'GEST_CAJA'),
('SELECTH', 'GEST_FISIO'),
('SELECTM', 'GEST_CAJA'),
('SELECTR', 'GEST_FISIO'),
('DELETE', 'GEST_ACIONCONTR'), 
('DELETE', 'GEST_ACTIV'), 
('DELETE', 'GEST_CATEG'), 
('DELETE', 'GEST_CLI'), 
('DELETE', 'GEST_CLIEXT'), 
('DELETE', 'GEST_CONTR'), 
('DELETE', 'GEST_DESC'), 
('DELETE', 'GEST_ESP'), 
('DELETE', 'GEST_EVENT'), 
('DELETE', 'GEST_FACT'), 
('DELETE', 'GEST_HORARIO'), 
('DELETE', 'GEST_LESION'), 
('DELETE', 'GEST_PAGO'), 
('DELETE', 'GEST_PERF'), 
('DELETE', 'GEST_RESERV'), 
('DELETE', 'GEST_SERV'), 
('DELETE', 'GEST_TRABAJ'), 
('DELETE', 'GEST_USR'), 
('DELETEAS','GEST_ASIST'),
('DELETEH', 'GEST_FISIO'), 
('DELETER', 'GEST_FISIO'), 
('EDIT', 'GEST_ACIONCONTR'),
('EDIT', 'GEST_ACTIV'),
('EDIT', 'GEST_CATEG'),
('EDIT', 'GEST_CLI'),
('EDIT', 'GEST_CLIEXT'),
('EDIT', 'GEST_CONTR'),
('EDIT', 'GEST_DESC'),
('EDIT', 'GEST_ESP'),
('EDIT', 'GEST_EVENT'),
('EDIT', 'GEST_FACT'),
('EDIT', 'GEST_LESION'),
('EDIT', 'GEST_PAGO'),
('EDIT', 'GEST_PERF'),
('EDIT', 'GEST_RESERV'),
('EDIT', 'GEST_SERV'),
('EDIT', 'GEST_TRABAJ'),
('EDIT', 'GEST_USR'),
('EDITAS','GEST_ASIST'),
('EDITH', 'GEST_FISIO'), 
('EDITR', 'GEST_FISIO'),
('SHOW', 'GEST_ACIONCONTR'),
('SHOW', 'GEST_ACTIV'),
('SHOW', 'GEST_CATEG'),
('SHOW', 'GEST_CLI'),
('SHOW', 'GEST_CLIEXT'),
('SHOW', 'GEST_CONTR'),
('SHOW', 'GEST_DESC'),
('SHOW', 'GEST_ESP'),
('SHOW', 'GEST_EVENT'),
('SHOW', 'GEST_FACT'),
('SHOW', 'GEST_LESION'),
('SHOW', 'GEST_PAGO'),
('SHOW', 'GEST_PERF'),
('SHOW', 'GEST_RESERV'),
('SHOW', 'GEST_SERV'),
('SHOW', 'GEST_TRABAJ'),
('SHOW', 'GEST_USR'),
('SHOWAS','GEST_ASIST'),
('SHOWH', 'GEST_FISIO'), 
('SHOWR', 'GEST_FISIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `NOMBRE` varchar(20) NOT NULL,
  `FECHA` date NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `PRECIO` float NOT NULL,
  `DURACION` int(1) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `ASIS_MONI` tinyint(1) NOT NULL,
  `NOMBRE_CAT` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_usu`
--

CREATE TABLE IF NOT EXISTS `asistencia_usu` (
  `NOMBRE_ACT` varchar(20) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `FECHA` date NOT NULL,
  `ASISTENCIA` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE IF NOT EXISTS `caja` (
  `DETALLES_CAJA` varchar(1000) NOT NULL,
  `FECHA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `NOMBRE_CAT` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `DNI_U` varchar(9) NOT NULL,
  `PROFESION` text NOT NULL,
  `PAGOS_PEND` int(2) NOT NULL,
  `NUMCUENTA_U` varchar(24) NOT NULL,
  `PROTEC_DATOS` varchar(30) NOT NULL,
  `ESPECIAL` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_ext`
--

CREATE TABLE IF NOT EXISTS `cliente_ext` (
  `EMAIL` varchar(20) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
  `NUMCONSUL` int(11) NOT NULL,
  `DNI_FISIO` varchar(9) NOT NULL,
  `FECHACONSUL` date NOT NULL,
  `DURACION` int(1) NOT NULL,
  `COMENTARIO` text NOT NULL,
  `PRECIO` decimal(3,3) NOT NULL,
  `DNI_PERSONA` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controlador`
--

CREATE TABLE IF NOT EXISTS `controlador` (
  `NOM_CONT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `controlador`
--

INSERT INTO `controlador` (`NOM_CONT`) VALUES
('GEST_ACIONCONTR'),
('GEST_ACTIV'),
('GEST_ASIST'),
('GEST_CAJA'),
('GEST_CATEG'),
('GEST_CLI'),
('GEST_CLIEXT'),
('GEST_CONTR'),
('GEST_DESC'),
('GEST_ESP'),
('GEST_EVENT'),
('GEST_FACT'),
('GEST_FISIO'),
('GEST_HORARIO'),
('GEST_LESION'),
('GEST_NOTIF'),
('GEST_PAGO'),
('GEST_PERF'),
('GEST_RESERV'),
('GEST_SERV'),
('GEST_TRABAJ'),
('GEST_USR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
  `NOMBRE` varchar(20) NOT NULL,
  `CLAVE` varchar(20) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `NOM_PER` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`NOMBRE`, `CLAVE`, `DNI`, `NOM_PER`) VALUES
('admin', 'admin', '12345678Z', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento`
--

CREATE TABLE IF NOT EXISTS `descuento` (
  `COLOR` tinyint(1) NOT NULL,
  `TIPO_DES` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `DNI_EMPLEADO` varchar(9) NOT NULL,
  `OCUPACION` text NOT NULL,
  `SUELDO` decimal(4,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacios`
--

CREATE TABLE IF NOT EXISTS `espacios` (
  `COD` varchar(20) NOT NULL,
  `AFORO` int(4) NOT NULL,
  `TIPO` tinyint(1) NOT NULL,
  `NOMBRE_EV` varchar(20) NOT NULL,
  `FECHA_RES` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `NOMBRE` varchar(20) NOT NULL,
  `FECHA` date NOT NULL,
  `DESCRIPCION` varchar(250) NOT NULL,
  `PRECIO` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fisio`
--

CREATE TABLE IF NOT EXISTS `fisio` (
  `DNI_FISIO` varchar(9) NOT NULL,
  `NUM_LICENCIA` int(10) NOT NULL,
  `NUMCUENTA_FISIO` varchar(24) NOT NULL,
  `SUELDO` decimal(6,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `HORA_INI` varchar(10) NOT NULL,
  `HORA_FIN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`HORA_INI`, `HORA_FIN`) VALUES
('10', '11'),
('11', '12'),
('12', '13'),
('13', '14'),
('14', '15'),
('15', '16'),
('16', '17'),
('17', '18'),
('18', '19'),
('19', '20'),
('20', '21'),
('21', '22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_act`
--

CREATE TABLE IF NOT EXISTS `horario_act` (
  `NOMBRE_ACT` varchar(20) NOT NULL,
  `HORARIO` varchar(20) NOT NULL,
  `FECHA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insc_ev`
--

CREATE TABLE IF NOT EXISTS `insc_ev` (
  `NOMBRE_EV` varchar(20) NOT NULL,
  `DNI` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lesion`
--

CREATE TABLE IF NOT EXISTS `lesion` (
  `CODLES` int(20) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `TIPO` text NOT NULL,
  `DURACION` int(4) NOT NULL,
  `COMENTARIO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitor`
--

CREATE TABLE IF NOT EXISTS `monitor` (
  `DNI_MONITOR` varchar(9) NOT NULL,
  `FOTO` text NOT NULL,
  `CONTRATO` int(11) NOT NULL,
  `NUMCUENTA` varchar(24) DEFAULT NULL,
  `SUELDO` decimal(6,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `COD_PAG` varchar(20) NOT NULL,
  `DETALLES` varchar(40) NOT NULL,
  `TIPO_FACT` tinyint(1) NOT NULL,
  `TIPO_TRANS` tinyint(1) NOT NULL,
  `NOMBRE_ACT` varchar(20) NOT NULL,
  `COD_RES` varchar(20) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `NUM_CONS` int(6) NOT NULL,
  `NOMBRE_EV` varchar(20) NOT NULL,
  `FECHA_PAG` date NOT NULL,
  `DNI_CLIENTE_EXT` varchar(9) NOT NULL,
  `DETALLES_CAJA` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `NOM_PER` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`NOM_PER`) VALUES
('admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `DNI` varchar(9) NOT NULL,
  `NOMBRE` text NOT NULL,
  `APELLIDOS` text NOT NULL,
  `FECHA_NAC` date NOT NULL,
  `CALLE` text NOT NULL,
  `NUMERO` int(3) NOT NULL,
  `PISO` varchar(2) NOT NULL,
  `CIUDAD` text NOT NULL,
  `CP` int(5) NOT NULL,
  `EMAIL` varchar(20) NOT NULL,
  `OBSERVACIONES` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `COD_RES` varchar(20) NOT NULL,
  `FECHA` date NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `COD_ESP` varchar(20) NOT NULL,
  `PRECIO` float NOT NULL,
  `DNI_CLIENTE_EXT` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telf_persona`
--

CREATE TABLE IF NOT EXISTS `telf_persona` (
  `DNI_PERSONA` varchar(9) NOT NULL,
  `TELF` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tel_emp_ext`
--

CREATE TABLE IF NOT EXISTS `tel_cli_ext` (
  `TELEFONO` int(9) NOT NULL,
  `DNI_CLIENTE_EXT` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene_acc`
--

CREATE TABLE IF NOT EXISTS `tiene_acc` (
  `NOM_PER` varchar(100) NOT NULL,
  `NOM_ACC` varchar(100) NOT NULL,
  `NOM_CONT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiene_acc`
--

INSERT INTO `tiene_acc` (`NOM_PER`, `NOM_ACC`, `NOM_CONT`) VALUES
('admin','ADD', 'GEST_ACIONCONTR'),
('admin','ADD', 'GEST_ACTIV'),
('admin','ADD', 'GEST_CATEG'),
('admin','ADD', 'GEST_CLI'),
('admin','ADD', 'GEST_CLIEXT'),
('admin','ADD', 'GEST_CONTR'),
('admin','ADD', 'GEST_DESC'),
('admin','ADD', 'GEST_ESP'),
('admin','ADD', 'GEST_EVENT'),
('admin','ADD', 'GEST_FACT'),
('admin','ADD', 'GEST_HORARIO'),
('admin','ADD', 'GEST_LESION'),
('admin','ADD', 'GEST_NOTIF'),
('admin','ADD', 'GEST_PAGO'),
('admin','ADD', 'GEST_PERF'),
('admin','ADD', 'GEST_RESERV'),
('admin','ADD', 'GEST_SERV'),
('admin','ADD', 'GEST_TRABAJ'),
('admin','ADD', 'GEST_USR'),
('admin','ADDAS','GEST_ASIST'),
('admin','ADDAV','GEST_ASIST'),
('admin','ADDC', 'GEST_CAJA'),
('admin','ADDE', 'GEST_CAJA'),
('admin','ADDH', 'GEST_FISIO'),
('admin','ADDR', 'GEST_CAJA'),
('admin','ADDR', 'GEST_FISIO'),
('admin','SELECT', 'GEST_ACIONCONTR'),
('admin','SELECT', 'GEST_ACTIV'),
('admin','SELECT', 'GEST_CATEG'),
('admin','SELECT', 'GEST_CLI'),
('admin','SELECT', 'GEST_CLIEXT'),
('admin','SELECT', 'GEST_CONTR'),
('admin','SELECT', 'GEST_DESC'),
('admin','SELECT', 'GEST_ESP'),
('admin','SELECT', 'GEST_EVENT'),
('admin','SELECT', 'GEST_FACT'),
('admin','SELECT', 'GEST_HORARIO'),
('admin','SELECT', 'GEST_LESION'),
('admin','SELECT', 'GEST_PAGO'),
('admin','SELECT', 'GEST_PERF'),
('admin','SELECT', 'GEST_RESERV'),
('admin','SELECT', 'GEST_SERV'),
('admin','SELECT', 'GEST_TRABAJ'),
('admin','SELECT', 'GEST_USR'),
('admin','SELECTAS','GEST_ASIST'),
('admin','SELECTAV','GEST_ASIST'),
('admin','SELECTC', 'GEST_CAJA'),
('admin','SELECTH', 'GEST_FISIO'),
('admin','SELECTM', 'GEST_CAJA'),
('admin','SELECTR', 'GEST_FISIO'),
('admin','DELETE', 'GEST_ACIONCONTR'), 
('admin','DELETE', 'GEST_ACTIV'), 
('admin','DELETE', 'GEST_CATEG'), 
('admin','DELETE', 'GEST_CLI'), 
('admin','DELETE', 'GEST_CLIEXT'), 
('admin','DELETE', 'GEST_CONTR'), 
('admin','DELETE', 'GEST_DESC'), 
('admin','DELETE', 'GEST_ESP'), 
('admin','DELETE', 'GEST_EVENT'), 
('admin','DELETE', 'GEST_FACT'), 
('admin','DELETE', 'GEST_HORARIO'), 
('admin','DELETE', 'GEST_LESION'), 
('admin','DELETE', 'GEST_PAGO'), 
('admin','DELETE', 'GEST_PERF'), 
('admin','DELETE', 'GEST_RESERV'), 
('admin','DELETE', 'GEST_SERV'), 
('admin','DELETE', 'GEST_TRABAJ'), 
('admin','DELETE', 'GEST_USR'), 
('admin','DELETEAS','GEST_ASIST'),
('admin','DELETEH', 'GEST_FISIO'), 
('admin','DELETER', 'GEST_FISIO'), 
('admin','EDIT', 'GEST_ACIONCONTR'),
('admin','EDIT', 'GEST_ACTIV'),
('admin','EDIT', 'GEST_CATEG'),
('admin','EDIT', 'GEST_CLI'),
('admin','EDIT', 'GEST_CLIEXT'),
('admin','EDIT', 'GEST_CONTR'),
('admin','EDIT', 'GEST_DESC'),
('admin','EDIT', 'GEST_ESP'),
('admin','EDIT', 'GEST_EVENT'),
('admin','EDIT', 'GEST_FACT'),
('admin','EDIT', 'GEST_LESION'),
('admin','EDIT', 'GEST_PAGO'),
('admin','EDIT', 'GEST_PERF'),
('admin','EDIT', 'GEST_RESERV'),
('admin','EDIT', 'GEST_SERV'),
('admin','EDIT', 'GEST_TRABAJ'),
('admin','EDIT', 'GEST_USR'),
('admin','EDITAS','GEST_ASIST'),
('admin','EDITH', 'GEST_FISIO'), 
('admin','EDITR', 'GEST_FISIO'),
('admin','SHOW', 'GEST_ACIONCONTR'),
('admin','SHOW', 'GEST_ACTIV'),
('admin','SHOW', 'GEST_CATEG'),
('admin','SHOW', 'GEST_CLI'),
('admin','SHOW', 'GEST_CLIEXT'),
('admin','SHOW', 'GEST_CONTR'),
('admin','SHOW', 'GEST_DESC'),
('admin','SHOW', 'GEST_ESP'),
('admin','SHOW', 'GEST_EVENT'),
('admin','SHOW', 'GEST_FACT'),
('admin','SHOW', 'GEST_LESION'),
('admin','SHOW', 'GEST_PAGO'),
('admin','SHOW', 'GEST_PERF'),
('admin','SHOW', 'GEST_RESERV'),
('admin','SHOW', 'GEST_SERV'),
('admin','SHOW', 'GEST_TRABAJ'),
('admin','SHOW', 'GEST_USR'),
('admin','SHOWAS','GEST_ASIST'),
('admin','SHOWH', 'GEST_FISIO'), 
('admin','SHOWR', 'GEST_FISIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene_contr`
--

CREATE TABLE IF NOT EXISTS `tiene_contr` (
  `NOM_PER` varchar(100) NOT NULL,
  `NOM_CONT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiene_contr`
--

INSERT INTO `tiene_contr` (`NOM_PER`, `NOM_CONT`) VALUES
('admin', 'GEST_ACIONCONTR'),
('admin', 'GEST_ACTIV'),
('admin', 'GEST_ASIST'),
('admin', 'GEST_CATEG'),
('admin', 'GEST_CLI'),
('admin', 'GEST_CLIEXT'),
('admin', 'GEST_CONTR'),
('admin', 'GEST_DESC'),
('admin', 'GEST_ESP'),
('admin', 'GEST_EVENT'),
('admin', 'GEST_FACT'),
('admin', 'GEST_HORARIO'),
('admin', 'GEST_LESION'),
('admin', 'GEST_NOTIF'),
('admin', 'GEST_PAGO'),
('admin', 'GEST_PERF'),
('admin', 'GEST_RESERV'),
('admin', 'GEST_SERV'),
('admin', 'GEST_TRABAJ'),
('admin', 'GEST_USR'),
('admin', 'GEST_CAJA'),
('admin', 'GEST_FISIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene_des`
--

CREATE TABLE IF NOT EXISTS `tiene_des` (
  `COD_PAG` int(11) NOT NULL,
  `TIPO_DES` enum('0.05','0.1','0.2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene_h_actividad`
--

CREATE TABLE IF NOT EXISTS `tiene_h_actividad` (
  `NOMBRE_A` varchar(20) NOT NULL,
  `HORA_INI` int(11) NOT NULL,
  `HORA_FIN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene_h_monitor`
--

CREATE TABLE IF NOT EXISTS `tiene_h_monitor` (
  `DNI_MONITOR` varchar(9) NOT NULL,
  `HORA_INI` varchar(10) NOT NULL,
  `HORA_FIN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usa_esp`
--

CREATE TABLE IF NOT EXISTS `usa_esp` (
  `NOMBRE_ACT` varchar(20) NOT NULL,
  `COD_ESP` varchar(20) NOT NULL,
  `PLAZAS_LIBRES` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
 ADD PRIMARY KEY (`NOM_ACC`,`NOM_CONT`);

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
 ADD PRIMARY KEY (`NOMBRE`);

--
-- Indices de la tabla `asistencia_usu`
--
ALTER TABLE `asistencia_usu`
 ADD PRIMARY KEY (`NOMBRE_ACT`,`DNI`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
 ADD PRIMARY KEY (`FECHA`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`NOMBRE_CAT`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`DNI_U`);

--
-- Indices de la tabla `cliente_ext`
--
ALTER TABLE `cliente_ext`
 ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
 ADD PRIMARY KEY (`NUMCONSUL`,`DNI_FISIO`,`FECHACONSUL`,`DNI_PERSONA`);

--
-- Indices de la tabla `controlador`
--
ALTER TABLE `controlador`
 ADD PRIMARY KEY (`NOM_CONT`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
 ADD PRIMARY KEY (`NOMBRE`);

--
-- Indices de la tabla `descuento`
--
ALTER TABLE `descuento`
 ADD PRIMARY KEY (`TIPO_DES`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
 ADD PRIMARY KEY (`DNI_EMPLEADO`);

--
-- Indices de la tabla `espacios`
--
ALTER TABLE `espacios`
 ADD PRIMARY KEY (`COD`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
 ADD PRIMARY KEY (`NOMBRE`);

--
-- Indices de la tabla `fisio`
--
ALTER TABLE `fisio`
 ADD PRIMARY KEY (`DNI_FISIO`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
 ADD PRIMARY KEY (`HORA_INI`,`HORA_FIN`);

--
-- Indices de la tabla `horario_act`
--
ALTER TABLE `horario_act`
 ADD PRIMARY KEY (`NOMBRE_ACT`,`HORARIO`);

--
-- Indices de la tabla `insc_ev`
--
ALTER TABLE `insc_ev`
 ADD PRIMARY KEY (`NOMBRE_EV`,`DNI`);

--
-- Indices de la tabla `lesion`
--
ALTER TABLE `lesion`
 ADD PRIMARY KEY (`CODLES`,`DNI`);

--
-- Indices de la tabla `monitor`
--
ALTER TABLE `monitor`
 ADD PRIMARY KEY (`DNI_MONITOR`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
 ADD PRIMARY KEY (`COD_PAG`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
 ADD PRIMARY KEY (`NOM_PER`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
 ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
 ADD PRIMARY KEY (`COD_RES`);

--
-- Indices de la tabla `telf_persona`
--
ALTER TABLE `telf_persona`
 ADD PRIMARY KEY (`DNI_PERSONA`,`TELF`);

--
-- Indices de la tabla `tel_emp_ext`
--
ALTER TABLE `tel_cli_ext`
 ADD PRIMARY KEY (`TELEFONO`,`DNI_CLIENTE_EXT`);

--
-- Indices de la tabla `tiene_acc`
--
ALTER TABLE `tiene_acc`
 ADD PRIMARY KEY (`NOM_PER`,`NOM_ACC`,`NOM_CONT`);

--
-- Indices de la tabla `tiene_contr`
--
ALTER TABLE `tiene_contr`
 ADD PRIMARY KEY (`NOM_PER`,`NOM_CONT`);

--
-- Indices de la tabla `tiene_des`
--
ALTER TABLE `tiene_des`
 ADD PRIMARY KEY (`COD_PAG`,`TIPO_DES`);

--
-- Indices de la tabla `tiene_h_actividad`
--
ALTER TABLE `tiene_h_actividad`
 ADD PRIMARY KEY (`NOMBRE_A`,`HORA_INI`,`HORA_FIN`);

--
-- Indices de la tabla `tiene_h_monitor`
--
ALTER TABLE `tiene_h_monitor`
 ADD PRIMARY KEY (`DNI_MONITOR`,`HORA_INI`,`HORA_FIN`);

--
-- Indices de la tabla `usa_esp`
--
ALTER TABLE `usa_esp`
 ADD PRIMARY KEY (`NOMBRE_ACT`,`COD_ESP`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
