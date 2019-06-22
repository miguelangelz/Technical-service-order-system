-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2018 a las 18:40:24
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tecnicos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cli_id` int(11) NOT NULL,
  `cli_cedula` varchar(11) NOT NULL,
  `cli_nombre` varchar(50) NOT NULL,
  `cli_apellido` varchar(50) NOT NULL,
  `cli_empresa` varchar(50) NOT NULL,
  `cli_direccion` varchar(50) NOT NULL,
  `cli_telefono` varchar(50) NOT NULL,
  `cli_correo` varchar(50) NOT NULL,
  `cli_celular` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cli_id`, `cli_cedula`, `cli_nombre`, `cli_apellido`, `cli_empresa`, `cli_direccion`, `cli_telefono`, `cli_correo`, `cli_celular`) VALUES
(1, '0106417645', 'Ana Maria', 'gonzalez pizarro', 'jajaja', 'el batan 11-20', '2458652', 'agonzalez@hotmail.com', '0978565211'),
(2, '0106523256', 'hugo mauricio', 'sacaquirin moscoso', 'rimihost', 'san joaquin 5-89', '2485265', 'hsacaquirin@gmail.live', '0956254215'),
(3, '0125365566', 'jorge luis', 'nacipucha garcia', 'ingetec', 'don bosco 8-96', '4025265', 'jnacipucha@hotmail.com', '0952452585'),
(15, '564564545', 'Pedro José', 'Serrano Gonzalez', 'Sin Empresa', 'nose', '6575645', 'Sinem@il', 'Sin Celular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `equ_id` int(11) NOT NULL,
  `equ_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`equ_id`, `equ_nombre`) VALUES
(1, 'PC DE ESCRITORIO'),
(2, 'IMPRESORA LASER'),
(3, 'LAPTOP'),
(4, 'TONER'),
(5, 'Netbook'),
(7, 'tostadora'),
(8, 'olla arrozera'),
(9, 'celular'),
(10, 'celular'),
(11, 'aaaaaaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_cliente`
--

CREATE TABLE `equipo_cliente` (
  `ecl_id` int(11) NOT NULL,
  `cli_id` int(11) NOT NULL,
  `ecl_marca` varchar(50) NOT NULL,
  `ecl_modelo` varchar(50) NOT NULL,
  `ecl_numero_serie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo_cliente`
--

INSERT INTO `equipo_cliente` (`ecl_id`, `cli_id`, `ecl_marca`, `ecl_modelo`, `ecl_numero_serie`) VALUES
(1, 2, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(2, 1, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(3, 3, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(4, 1, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(5, 2, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(6, 3, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(7, 1, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(8, 1, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(9, 1, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(10, 1, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(11, 1, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(12, 1, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(13, 1, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(14, 1, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(15, 1, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(16, 1, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(17, 3, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(18, 2, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(19, 2, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(20, 1, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(21, 1, 'Hp', 'Paviloon', 'Nsjsu'),
(22, 1, 'Dell', 'INSPIROn', 'Yhu'),
(23, 2, 'Jdjd', 'Jdjdj', 'Jdjd'),
(24, 2, 'dell', 'inspiron 6t6t', '3434ttt-7'),
(25, 1, 'asd', 'asd', 'asd'),
(26, 1, 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_domicilio`
--

CREATE TABLE `orden_domicilio` (
  `ord_id` int(11) NOT NULL,
  `cli_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `ord_numero` varchar(10) NOT NULL,
  `ord_cliente` varchar(50) NOT NULL,
  `ord_tecnico` varchar(50) NOT NULL,
  `ord_direccion` varchar(50) NOT NULL,
  `ord_telefono` varchar(10) NOT NULL,
  `ord_fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ord_defecto` varchar(500) NOT NULL,
  `ord_total` double(8,2) DEFAULT NULL,
  `ord_subtotal` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orden_domicilio`
--

INSERT INTO `orden_domicilio` (`ord_id`, `cli_id`, `usu_id`, `ord_numero`, `ord_cliente`, `ord_tecnico`, `ord_direccion`, `ord_telefono`, `ord_fecha`, `ord_defecto`, `ord_total`, `ord_subtotal`) VALUES
(1, 1, 8, '001', 'Ana Maria gonzalez pizarro', 'Jose Perez', 'el batan 11-20', '2458652', '2018-06-20 01:35:34', 'virus', 35.00, 32.00),
(2, 1, 8, '0002', 'Ana Maria gonzalez pizarro', 'Jose Perez', 'el batan 11-20', '2458652', '2018-07-13 00:07:47', 'virus', 3.00, 3.00),
(3, 1, 8, '0003', 'Ana Maria gonzalez pizarro', 'Jose Perez', 'el batan 11-20', '2458652', '2018-07-13 00:19:22', 'virus', 137.00, 123.00),
(4, 2, 8, '0004', 'hugo mauricio sacaquirin moscoso', 'Jose Perez', 'san joaquin 5-89', '2485265', '2018-07-13 00:20:50', 'virus', 3.00, 3.00),
(5, 2, 10, '0005', 'hugo mauricio sacaquirin moscoso', 'Pedro Serrano', 'san joaquin 5-89', '2485265', '2018-07-13 10:44:55', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 137.00, 123.00),
(6, 2, 10, '0006', 'hugo mauricio sacaquirin moscoso', 'Pedro Serrano', 'san joaquin 5-89', '2485265', '2018-07-13 10:44:55', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 137.00, 123.00),
(7, 1, 8, '0007', 'Ana Maria gonzalez pizarro', 'Jose Perez', 'el batan 11-20', '2458652', '2018-07-17 10:15:16', 'ds', 3.00, 3.00),
(8, 3, 8, '0008', 'jorge luis nacipucha garcia', 'Jose Perez', 'don bosco 8-96', '4025265', '2018-07-17 10:22:11', 'sdfdsfds', 73.00, 66.00),
(9, 3, 8, '0009', 'jorge luis nacipucha garcia', 'Jose Perez', 'don bosco 8-96', '4025265', '2018-07-17 10:24:23', 'adasdsadsad', 5.00, 5.00),
(10, 2, 8, '00010', 'hugo mauricio sacaquirin moscoso', 'Jose Perez', 'san joaquin 5-89', '2485265', '2018-07-17 12:57:40', 'Jcjjfjchc', 75.00, 67.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_garantia`
--

CREATE TABLE `orden_garantia` (
  `org_id` int(11) NOT NULL,
  `cli_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `org_numero` varchar(10) NOT NULL,
  `org_fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `org_lugar` varchar(50) NOT NULL,
  `org_num_factura` varchar(50) NOT NULL,
  `org_cedula` varchar(10) NOT NULL,
  `org_cliente` varchar(50) NOT NULL,
  `org_direccion` varchar(50) NOT NULL,
  `org_telefono` varchar(10) DEFAULT NULL,
  `org_celular` varchar(10) DEFAULT NULL,
  `org_mail` varchar(50) DEFAULT NULL,
  `org_equipo` varchar(50) NOT NULL,
  `org_marca` varchar(50) NOT NULL,
  `org_serie_equipo` varchar(50) NOT NULL,
  `org_serie_cargador` varchar(50) NOT NULL,
  `org_danio` varchar(200) NOT NULL,
  `org_observaciones` varchar(200) NOT NULL,
  `org_dism` varchar(20) NOT NULL,
  `org_disc` varchar(20) NOT NULL,
  `org_diss` varchar(20) NOT NULL,
  `org_batm` varchar(20) NOT NULL,
  `org_batc` varchar(20) NOT NULL,
  `org_bats` varchar(20) NOT NULL,
  `org_memm` varchar(20) NOT NULL,
  `org_memc` varchar(20) NOT NULL,
  `org_mems` varchar(20) NOT NULL,
  `org_adam` varchar(20) NOT NULL,
  `org_adac` varchar(20) NOT NULL,
  `org_adas` varchar(20) NOT NULL,
  `org_otros` varchar(50) NOT NULL,
  `org_diagnostico` varchar(200) NOT NULL,
  `org_vendedor` varchar(50) NOT NULL,
  `org_garantia` varchar(50) NOT NULL,
  `org_transportista` varchar(50) NOT NULL,
  `org_proveedor` varchar(50) NOT NULL,
  `org_fac_empresa` varchar(50) NOT NULL,
  `org_numero_guia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orden_garantia`
--

INSERT INTO `orden_garantia` (`org_id`, `cli_id`, `usu_id`, `org_numero`, `org_fecha`, `org_lugar`, `org_num_factura`, `org_cedula`, `org_cliente`, `org_direccion`, `org_telefono`, `org_celular`, `org_mail`, `org_equipo`, `org_marca`, `org_serie_equipo`, `org_serie_cargador`, `org_danio`, `org_observaciones`, `org_dism`, `org_disc`, `org_diss`, `org_batm`, `org_batc`, `org_bats`, `org_memm`, `org_memc`, `org_mems`, `org_adam`, `org_adac`, `org_adas`, `org_otros`, `org_diagnostico`, `org_vendedor`, `org_garantia`, `org_transportista`, `org_proveedor`, `org_fac_empresa`, `org_numero_guia`) VALUES
(1, 1, 8, '1', '2018-06-19 23:28:31', 'CORNELIO MERCHAN', '1234', '0106417645', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', 'agonzalez@hotmail.com', '3', 'dell', '3434ttt-7', '1234', 'virus', 'rayones en case', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'cargador', 'formateo', 'ADRIAN CORDOVA', 'JUAN CARLOS YUNGA', 'POCOYON', 'HP', '1234', '1234'),
(2, 2, 8, '0002', '2018-06-20 01:30:53', 'CORNELIO MERCHAN', '12345', '0106523256', 'hugo mauricio sacaquirin moscoso', 'san joaquin 5-89', '2485265', '0956254215', 'hsacaquirin@gmail.com', 'PC DE ESCRITORIO', 'dell', '3434ttt-7', '1234', 'virus', 'rayones en case', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'cargador', 'formateo', 'ADRIAN CORDOVA', 'JUAN CARLOS YUNGA', 'POCOYON', 'HP', '1234', '1234'),
(3, 1, 8, '0003', '2018-07-09 13:51:05', 'CORNELIO MERCHAN', '1234', '0106417645', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', 'agonzalez@hotmail.com', 'IMPRESORA LASER', 'dell', '3434ttt-7', '1234', 'virus', 'asdasdasd', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'cargador', 'asdasdsadsadsad', 'ADRIAN CORDOVA', 'JUAN CARLOS YUNGA', 'POCOYON', 'HP', '1234', '1234'),
(4, 1, 8, '0004', '2018-07-10 12:43:21', 'CORNELIO MERCHAN', '1234', '0106417645', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', 'agonzalez@hotmail.com', 'PC DE ESCRITORIO', 'dell', '3434ttt-7', '1234', 'virus', 'sdfsdfdsfsdf', 'ABC', 'ABC', '', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'cargador', 'sdafsdafsdf', 'ADRIAN CORDOVA', 'JUAN CARLOS YUNGA', 'POCOYON', 'HP', '1234', '1234'),
(5, 1, 8, '0004', '2018-07-10 12:43:22', 'CORNELIO MERCHAN', '1234', '0106417645', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', 'agonzalez@hotmail.com', 'PC DE ESCRITORIO', 'dell', '3434ttt-7', '1234', 'virus', 'sdfsdfdsfsdf', 'ABC', 'ABC', '', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'cargador', 'sdafsdafsdf', 'ADRIAN CORDOVA', 'JUAN CARLOS YUNGA', 'POCOYON', 'HP', '1234', '1234'),
(6, 1, 8, '0006', '2018-07-10 13:02:45', 'CORNELIO MERCHAN', '1234', '0106417645', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', 'agonzalez@hotmail.com', 'LAPTOP', 'dell', '3434ttt-7', '1234', 'virus', 'sadasd', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'cargador', 'dasdsadsad', 'ADRIAN CORDOVA', 'JUAN CARLOS YUNGA', 'POCOYON', 'HP', '1234', '1234'),
(7, 1, 8, '0006', '2018-07-10 13:02:45', 'CORNELIO MERCHAN', '1234', '0106417645', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', 'agonzalez@hotmail.com', 'LAPTOP', 'dell', '3434ttt-7', '1234', 'virus', 'sadasd', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'cargador', 'dasdsadsad', 'ADRIAN CORDOVA', 'JUAN CARLOS YUNGA', 'POCOYON', 'HP', '1234', '1234'),
(8, 2, 8, '0008', '2018-07-17 12:47:34', 'CORNELIO MERCHAN', '5654', '0106523256', 'hugo mauricio sacaquirin moscoso', 'san joaquin 5-89', '2485265', '0956254215', 'hsacaquirin@gmail.live', 'PC DE ESCRITORIO', 'gdgdf', 'fgfdg', 'fdgfdg', 'fggdfgfdg', 'fdgfdg', 'fgfd', 'gfdg', 'gdfgfd', 'dfgfdg', 'dfgfd', 'fgdfg', 'fdgfdg', 'fg', 'fdgfd', 'gdfg', 'dfgfd', 'gffdg', 'dfgfg', 'dfgfd', 'fgdfg', 'dfgdfg', 'dfgfdg', 'fdg', '', ''),
(9, 2, 8, '0009', '2018-07-17 12:49:36', 'CORNELIO MERCHAN', '234324', '0106523256', 'hugo mauricio sacaquirin moscoso', 'san joaquin 5-89', '2485265', '0956254215', 'hsacaquirin@gmail.live', 'PC DE ESCRITORIO', 'dfsdf', 'fdsf', 'dsfdsf', 'dsfdsf', 'dfdsfdsf', 'dfdsf', 'dsfdsfsd', 'dsfdsf', 'sfdsd', 'fdsfds', 'fdsfdsf', 'dsfdsf', 'dsfdsf', 'sdfdsf', 'sdfdsf', 'sdfdsf', 'sdfdsfd', 'sdfdsf', 'sdfdsfds', 'dsfdsf', 'sdfdsf', 'sdfdsf', 'sdfdsf', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_local`
--

CREATE TABLE `orden_local` (
  `orl_id` int(11) NOT NULL,
  `cli_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `orl_numero` varchar(10) NOT NULL,
  `orl_cliente` varchar(50) NOT NULL,
  `orl_direccion` varchar(50) NOT NULL,
  `orl_telefono` varchar(10) NOT NULL,
  `orl_celular` varchar(10) NOT NULL,
  `orl_fecha_entrega` varchar(50) NOT NULL,
  `orl_fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orl_articulo` varchar(50) NOT NULL,
  `orl_defecto` varchar(200) NOT NULL,
  `orl_diagnostico` varchar(200) NOT NULL,
  `orl_estado` varchar(50) NOT NULL DEFAULT 'POR ENTREGAR',
  `orl_marca` varchar(50) NOT NULL,
  `orl_modelo` varchar(50) NOT NULL,
  `orl_numero_Serie` varchar(50) NOT NULL,
  `orl_observacion` varchar(50) NOT NULL,
  `orl_tipo` varchar(50) NOT NULL,
  `orl_total` double(8,2) DEFAULT NULL,
  `orl_subtotal` double(8,2) DEFAULT NULL,
  `orl_iva` double(8,2) DEFAULT NULL,
  `orl_garantia` varchar(5) NOT NULL,
  `orl_software` varchar(100) NOT NULL,
  `orl_adam` varchar(20) DEFAULT NULL,
  `orl_adac` varchar(20) DEFAULT NULL,
  `orl_adas` varchar(20) DEFAULT NULL,
  `orl_batm` varchar(20) DEFAULT NULL,
  `orl_batc` varchar(20) DEFAULT NULL,
  `orl_bats` varchar(20) DEFAULT NULL,
  `orl_dism` varchar(20) DEFAULT NULL,
  `orl_disc` varchar(20) DEFAULT NULL,
  `orl_diss` varchar(20) DEFAULT NULL,
  `orl_memm` varchar(20) DEFAULT NULL,
  `orl_memc` varchar(20) DEFAULT NULL,
  `orl_mems` varchar(20) DEFAULT NULL,
  `orl_accesorios` varchar(50) NOT NULL,
  `orl_trabajado` varchar(100) DEFAULT NULL,
  `orl_reparado` varchar(100) DEFAULT NULL,
  `orl_repuestos` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orden_local`
--

INSERT INTO `orden_local` (`orl_id`, `cli_id`, `usu_id`, `orl_numero`, `orl_cliente`, `orl_direccion`, `orl_telefono`, `orl_celular`, `orl_fecha_entrega`, `orl_fecha`, `orl_articulo`, `orl_defecto`, `orl_diagnostico`, `orl_estado`, `orl_marca`, `orl_modelo`, `orl_numero_Serie`, `orl_observacion`, `orl_tipo`, `orl_total`, `orl_subtotal`, `orl_iva`, `orl_garantia`, `orl_software`, `orl_adam`, `orl_adac`, `orl_adas`, `orl_batm`, `orl_batc`, `orl_bats`, `orl_dism`, `orl_disc`, `orl_diss`, `orl_memm`, `orl_memc`, `orl_mems`, `orl_accesorios`, `orl_trabajado`, `orl_reparado`, `orl_repuestos`) VALUES
(1, 2, 8, '0001', 'hsacaquirin@gmail.com', 'san joaquin 5-89', '2485265', '0956254215', '2018-06-20', '2018-06-19 22:53:58', 'cargador', 'virus', 'formateo', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'LAPTOP', 137.00, 123.00, 14.00, 'no', 'windows 8,eset nod,pack básico', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'TAPA,CINTA,BASE,PAPELERA,PERILLA', '', '', ''),
(2, 1, 8, '0002', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-06-21', '2018-06-19 22:55:09', 'cargador', 'virus', 'formateo', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'PC DE ESCRITORIO', 137.00, 123.00, 14.00, 'no', 'windows 8,eset nod', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'TAPA,CINTA,BASE', '', '', ''),
(3, 3, 8, '0003', 'jnacipucha@gmail.com', 'don bosco 8-96', '4025265', '0952452585', '2018-06-21', '2018-06-19 22:57:06', 'cargador', 'virus', 'formateo', 'ENTREGADO', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'IMPRESORA LASER', 137.00, 123.00, 14.00, 'no', 'windows 8,eset nod', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'PERILLA,TRACTOR,CABLES,CARTUCHOS', 'cambio de pasta termica', 'chip de video', 'plug de carga'),
(4, 1, 8, '0004', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-06-21', '2018-06-20 01:12:42', 'cargador', 'virus', 'formateo', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'IMPRESORA LASER', 137.00, 123.00, 14.00, 'no', 'windows 8,eset nod', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'TAPA,CINTA,BASE', '', '', ''),
(5, 2, 8, '0005', 'hsacaquirin@gmail.com', 'san joaquin 5-89', '2485265', '0956254215', '2018-06-22', '2018-06-20 01:14:36', 'cargador', 'virus', 'formateo', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'PC DE ESCRITORIO', 137.00, 123.00, 14.00, 'no', 'eset nod', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'TAPA,CINTA,BASE', '', '', ''),
(6, 3, 8, '0006', 'jnacipucha@gmail.com', 'don bosco 8-96', '4025265', '0952452585', '2018-06-28', '2018-06-20 01:18:08', 'cargador', 'virus', 'formateo', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'IMPRESORA LASER', 137.00, 123.00, 14.00, 'no', 'windows 8', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'CINTA,BASE', '', '', ''),
(7, 1, 8, '0007', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-06-22', '2018-06-20 01:21:39', 'cargador', 'virus', 'formateo', 'ENTREGADO', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'LAPTOP', 137.00, 123.00, 14.00, 'no', 'windows 8,eset nod', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'PAPELERA,PERILLA,TRACTOR', 'formateada', '', ''),
(8, 1, 8, '0008', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-06-21', '2018-06-20 01:55:46', 'cargador', 'virus', 'formateo', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'IMPRESORA LASER', 137.00, 123.00, 14.00, 'no', 'eset nod', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'CINTA,BASE', '', '', ''),
(9, 1, 8, '0009', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-07-21', '2018-07-06 01:14:37', 'cargador', 'dsfsdf', 'sadfsdaf', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'PC DE ESCRITORIO', 0.00, 123.00, 0.00, 'no', 'eset nod', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', '', '', '', ''),
(10, 1, 8, '00010', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-07-11', '2018-07-09 11:57:28', 'cargador', 'asasd', 'asdfsdafasdf', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'LAPTOP', 0.00, 123.00, 0.00, 'no', 'windows 8,eset nod', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', '', '', '', ''),
(11, 1, 8, '00011', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-07-18', '2018-07-10 11:03:01', 'cargador', 'ASDSADASDSAD', 'ASDASDASDSA', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'LAPTOP', 0.00, 123.00, 0.00, 'no', 'PACK-', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', '', '', '', ''),
(12, 1, 8, '00011', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-07-18', '2018-07-10 11:03:01', 'cargador', 'ASDSADASDSAD', 'ASDASDASDSA', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'LAPTOP', 0.00, 123.00, 0.00, 'no', 'PACK-', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', '', '', '', ''),
(13, 1, 8, '00013', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-07-12', '2018-07-10 11:18:00', 'cargador', 'sadsad', 'sadasdsa', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'LAPTOP', 0.00, 123.00, 0.00, 'no', 'PACK', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', '', '', '', ''),
(14, 1, 8, '00013', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-07-12', '2018-07-10 11:18:01', 'cargador', 'sadsad', 'sadasdsa', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'LAPTOP', 0.00, 123.00, 0.00, 'no', 'PACK', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', '', '', '', ''),
(15, 1, 8, '00015', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-07-12', '2018-07-10 11:48:32', 'cargador', 'sadsa', 'asdsad', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'LAPTOP', 0.00, 123.00, 0.00, 'no', 'PACK', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', '', '', '', ''),
(16, 1, 8, '00015', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-07-12', '2018-07-10 11:48:32', 'cargador', 'sadsa', 'asdsad', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'LAPTOP', 0.00, 123.00, 0.00, 'no', 'PACK', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', '', '', '', ''),
(17, 3, 8, '00017', 'jorge luis nacipucha garcia', 'don bosco 8-96', '4025265', '0952452585', '2018-07-18', '2018-07-10 11:50:06', 'cargador', 'sdfdsfsadfds', 'fsdfsdf', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'PC DE ESCRITORIO', 0.00, 123.00, 0.00, 'no', 'PACK', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', '', '', '', ''),
(18, 2, 8, '00018', 'hugo mauricio sacaquirin moscoso', 'san joaquin 5-89', '2485265', '0956254215', '2018-07-27', '2018-07-10 11:51:28', 'cargador', 'sadsad', 'asdsadsad', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'PC DE ESCRITORIO', 0.00, 123.00, 0.00, 'no', 'PACK', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', '', '', '', ''),
(19, 2, 8, '00018', 'hugo mauricio sacaquirin moscoso', 'san joaquin 5-89', '2485265', '0956254215', '2018-07-27', '2018-07-10 11:51:28', 'cargador', 'sadsad', 'asdsadsad', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'PC DE ESCRITORIO', 0.00, 123.00, 0.00, 'no', 'PACK', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', '', '', '', ''),
(20, 1, 8, '00020', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-07-11', '2018-07-10 11:54:23', 'cargador', 'sdfsfds', 'dsfdsfsdfds', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'PC DE ESCRITORIO', 0.00, 123.00, 0.00, 'no', 'PACK', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', '', '', '', ''),
(21, 1, 8, '00021', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-07-14', '2018-07-10 12:02:10', 'Banana', 'Nada', 'Bueno', 'POR ENTREGAR', 'Hp', 'Paviloon', 'Nsjsu', 'Rayones', 'PC DE ESCRITORIO', 0.00, 87.00, 0.00, 'no', 'PACK', 'Dd', 'Aa', 'Aa', 'As', 'Ss', 'Aa', 'Ss', 'Dd', 'Dd', 'As', 'Dd', 'Ff', '', '', '', ''),
(22, 1, 8, '00022', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-07-16', '2018-07-10 12:22:18', 'Jsjdhdj', 'Hahahah', 'Bssj', 'POR ENTREGAR', 'Dell', 'INSPIROn', 'Yhu', 'Nxjxx', 'PC DE ESCRITORIO', 0.00, 67.00, 0.00, 'no', 'PACK', 'Zsjdj', 'Xdjd', 'Dhd', 'Djd', 'Jsz', 'Jssj', 'Jzjd', 'Jdjd', 'Jsjdu', '', '', '', '', '', '', ''),
(23, 2, 8, '00023', 'hugo mauricio sacaquirin moscoso', 'san joaquin 5-89', '2485265', '0956254215', '2018-07-14', '2018-07-10 12:48:02', 'Jdjdj', 'Bzjdjfjx', 'Nzjxjxnx', 'PENDIENTE', 'Jdjd', 'Jdjdj', 'Jdjd', 'Compra de flex', 'PC DE ESCRITORIO', 130.00, 124.00, 0.00, 'no', 'PACK', 'Xdd', 'D', 'Dx', 'Gg', 'Dd', 'Ss', 'Ccc', 'Xdd', 'Ccc', 'Xcc', 'Xff', 'Ccc', '', '', '', ''),
(24, 2, 10, '00024', 'hugo mauricio sacaquirin moscoso', 'san joaquin 5-89', '2485265', '0956254215', '2018-07-19', '2018-07-13 10:58:57', 'cargador', 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxcccccccccccccccccccccccccccccccccccccc', 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxcccccccccccccccccccccccccccccccccc', 'POR ENTREGAR', 'dell', 'inspiron 6t6t', '3434ttt-7', 'rayones en case', 'LAPTOP', 0.00, 123.00, 0.00, 'no', 'PACK', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', 'ABC', '', '', '', ''),
(25, 1, 8, '00025', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-07-18', '2018-07-16 15:50:59', 'sadf', 'sadsadsadasd', 'asdsafsdfds', 'PENDIENTE', 'asd', 'asd', 'asd', 'erw', 'aaaaaaaa', 13.44, 12.00, 0.00, 'no', 'PACK', 'asdfsdfsa', 'sadf', 'sadf', 'sadfsad', 'sdaf', 'sdf', 'asdf', 'sadf', 'sadf', 'sadfdsa', 'asdf', 'sdf', '', '', '', ''),
(26, 1, 8, '00025', 'Ana Maria gonzalez pizarro', 'el batan 11-20', '2458652', '0978565211', '2018-07-18', '2018-07-16 15:50:59', 'sadf', 'sadsadsadasd', 'asdsafsdfds', 'POR ENTREGAR', 'asd', 'asd', 'asd', 'asdsad', 'aaaaaaaa', 0.00, 3.00, 0.00, 'no', 'PACK', 'asdfsdfsa', 'sadf', 'sadf', 'sadfsad', 'sdaf', 'sdf', 'asdf', 'sadf', 'sadf', 'sadfdsa', 'asdf', 'sdf', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(50) NOT NULL,
  `usu_usuario` varchar(20) NOT NULL,
  `usu_password` varchar(50) NOT NULL,
  `usu_direccion` varchar(50) NOT NULL,
  `usu_tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`usu_id`, `usu_nombre`, `usu_usuario`, `usu_password`, `usu_direccion`, `usu_tipo`) VALUES
(8, 'Jose Perez', 'juan', '1234', 'CORNELIO MERCHAN', 'Técnico'),
(9, 'admin', 'admin', 'admin', '', 'Administrador'),
(10, 'Pedro Serrano', 'peter', '123', 'Tomas Ordoñez', 'Técnico'),
(11, 'fghfghgfhgf', 'asd', 'asd', 'dfhndfgg', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`equ_id`);

--
-- Indices de la tabla `equipo_cliente`
--
ALTER TABLE `equipo_cliente`
  ADD PRIMARY KEY (`ecl_id`);

--
-- Indices de la tabla `orden_domicilio`
--
ALTER TABLE `orden_domicilio`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `cli_id` (`cli_id`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `orden_garantia`
--
ALTER TABLE `orden_garantia`
  ADD PRIMARY KEY (`org_id`),
  ADD KEY `cli_id` (`cli_id`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `orden_local`
--
ALTER TABLE `orden_local`
  ADD PRIMARY KEY (`orl_id`),
  ADD KEY `cli_id` (`cli_id`),
  ADD KEY `usu_id` (`usu_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `equ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `equipo_cliente`
--
ALTER TABLE `equipo_cliente`
  MODIFY `ecl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `orden_domicilio`
--
ALTER TABLE `orden_domicilio`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `orden_garantia`
--
ALTER TABLE `orden_garantia`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `orden_local`
--
ALTER TABLE `orden_local`
  MODIFY `orl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orden_domicilio`
--
ALTER TABLE `orden_domicilio`
  ADD CONSTRAINT `orden_domicilio_ibfk_1` FOREIGN KEY (`cli_id`) REFERENCES `clientes` (`cli_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_domicilio_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `users` (`usu_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_garantia`
--
ALTER TABLE `orden_garantia`
  ADD CONSTRAINT `orden_garantia_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `users` (`usu_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_garantia_ibfk_2` FOREIGN KEY (`cli_id`) REFERENCES `clientes` (`cli_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_local`
--
ALTER TABLE `orden_local`
  ADD CONSTRAINT `orden_local_ibfk_1` FOREIGN KEY (`cli_id`) REFERENCES `clientes` (`cli_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_local_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `users` (`usu_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
