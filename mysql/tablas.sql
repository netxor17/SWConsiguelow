-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 03:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `nombreUsuario` varchar(15) NOT NULL,
  `password` varchar(80) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `ciudad` varchar(12) NOT NULL,
  `codigo postal` varchar(5) NOT NULL,
  `carrito` int(15) NOT NULL,
  `tarjeta credito` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;



--
-- Dumping data for table `usuario`
--
INSERT INTO `usuarios` (`dni`, `nombre`, `nombreUsuario`, `password`, `direccion`, `email`, `telefono`, `ciudad`, `codigo postal`, `carrito`, `tarjeta credito`) VALUES
('50258495', 'Nestor', 'nestorUser', 'nestorpass', 'C/Abaco 25, 3ºD.', 'nestor@ucm.es', '917588789', 'Madrid', '20080', 0, 45121545);



-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2020 a las 13:13:37
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` int(10) NOT NULL,
  `idProducto` int(10) UNSIGNED NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  `talla` varchar(3) NOT NULL,
  `color` varchar(12) NOT NULL,
  `unidades` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `tipo` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`tipo`, `descripcion`) VALUES
('comida', 'Categoria dedicada a comida'),
('electronica', 'Categoria dedicada a electronica'),
('ropa', 'Categoria dedicada a prendas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallespedido`
--

CREATE TABLE `detallespedido` (
  `idDetalles` int(11) NOT NULL,
  `idProducto` int(10) UNSIGNED NOT NULL,
  `nombreProducto` varchar(50) NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioTotal` decimal(6,2) NOT NULL,
  `talla` varchar(12) NOT NULL,
  `color` varchar(15) NOT NULL,
  `fechaPedido` date NOT NULL,
  `idPedido` int(10) UNSIGNED NOT NULL,
  `idDistribuidor` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallespedido`
--

INSERT INTO `detallespedido` (`idDetalles`, `idProducto`, `nombreProducto`, `precio`, `cantidad`, `precioTotal`, `talla`, `color`, `fechaPedido`, `idPedido`, `idDistribuidor`) VALUES
(1, 1, '', '40.99', 1, '40.99', 'DEF', 'negro', '2020-03-12', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidores`
--

CREATE TABLE `distribuidores` (
  `idDistribuidor` int(9) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `felefono` varchar(9) NOT NULL,
  `email` varchar(25) NOT NULL,
  `direccion` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `distribuidores`
--

INSERT INTO `distribuidores` (`idDistribuidor`, `nombre`, `felefono`, `email`, `direccion`) VALUES
(1, 'distribuidor1', '915555555', 'vendedor1@ucm.es', 'C/Pajaro silvestre,155');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idPago` int(15) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`idPago`, `tipo`) VALUES
(1, 'tarjeta'),
(2, 'tarjeta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `numero` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `cliente` varchar(9) NOT NULL,
  `producto` int(10) UNSIGNED NOT NULL,
  `nombreProducto` varchar(50) NOT NULL,
  `idPago` int(15) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idMensajero` int(9) NOT NULL,
  `pagado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`numero`, `fecha`, `cliente`, `producto`, `nombreProducto`, `idPago`, `cantidad`, `idMensajero`, `pagado`) VALUES
(1, '2020-03-12', '50258495', 1, '', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `idVendedor` int(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  `unidades` int(10) UNSIGNED NOT NULL,
  `unidadesDisponibles` int(10) NOT NULL,
  `tallasDisponibles` varchar(12) NOT NULL,
  `coloresDisponibles` varchar(15) NOT NULL,
  `talla` varchar(3) NOT NULL,
  `color` varchar(12) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `agotado` tinyint(1) NOT NULL,
  `reseña` text DEFAULT NULL,
  `numEstrellas` tinyint(3) DEFAULT NULL,
  `imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `idVendedor`, `nombre`, `descripcion`, `precio`, `unidades`, `unidadesDisponibles`, `tallasDisponibles`, `coloresDisponibles`, `talla`, `color`, `categoria`, `agotado`, `reseña`, `numEstrellas`, `imagen`) VALUES
 (1, 1, 'Cascos Sanson', 'Cascos musica', '40.99', 0, 15, '1', '3', 'DEF', 'Blanco', 'electronica', 0, 'ninguna', 0, 0x0);