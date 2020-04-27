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


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consiguelowdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

/*CREATE TABLE `carrito` (
  `idCarrito` int(10) NOT NULL,
  `idProducto` int(10) UNSIGNED NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  `talla` varchar(3) NOT NULL,
  `color` varchar(12) NOT NULL,
  `unidades` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `tipo` varchar(20) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`tipo`, `descripcion`) VALUES
('comida', 'Categoria dedicada a comida'),
('electronica', 'Categoria dedicada a electronica'),
('ropa', 'Categoria dedicada a prendas');

-- --------------------------------------------------------

--
-- Table structure for table `detallespedido`
--

CREATE TABLE `detallespedido` (
  `idDetalles` int(11) NOT NULL,
  `idProducto` int(10) UNSIGNED NOT NULL,
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
-- Dumping data for table `detallespedido`
--

INSERT INTO `detallespedido` (`idDetalles`, `idProducto`, `precio`, `cantidad`, `precioTotal`, `talla`, `color`, `fechaPedido`, `idPedido`, `idDistribuidor`) VALUES
(1, 1, '40.99', 1, '40.99', 'DEF', 'negro', '2020-03-12', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `distribuidores`
--

CREATE TABLE `distribuidores` (
  `idDistribuidor` int(9) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `felefono` varchar(9) NOT NULL,
  `email` varchar(25) NOT NULL,
  `direccion` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distribuidores`
--

INSERT INTO `distribuidores` (`idDistribuidor`, `nombre`, `felefono`, `email`, `direccion`) VALUES
(1, 'distribuidor1', '915555555', 'vendedor1@ucm.es', 'C/Pajaro silvestre,155');

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `idPago` int(15) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`idPago`, `tipo`) VALUES
(1, 'tarjeta'),
(2, 'tarjeta');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `numero` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `cliente` int(11) NOT NULL,
  `producto` int(10) UNSIGNED NOT NULL,
  `idPago` int(15) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idMensajero` int(9) NOT NULL,
  `pagado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`numero`, `fecha`, `cliente`, `producto`, `idPago`, `cantidad`, `idMensajero`, `pagado`) VALUES
(1, '2020-03-12', '50258495', 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `idVendedor` int(9) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `precio` decimal(4,2) NOT NULL,
  `unidadesDisponibles` int(10) NOT NULL,
  `tallasDisponibles` varchar(12) NOT NULL,
  `coloresDisponibles` varchar(15) NOT NULL,
  `talla` varchar(3) NOT NULL,
  `color` varchar(12) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `agotado` tinyint(1) NOT NULL,
  `reseña` text DEFAULT NULL,
  `numEstrellas` tinyint(3) DEFAULT NULL,
  `imagen` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `idVendedor`, `nombre`, `descripcion`, `precio`, `unidadesDisponibles`, `tallasDisponibles`, `coloresDisponibles`, `talla`, `color`, `categoria`, `agotado`, `reseña`, `numEstrellas`, `imagen`) VALUES
(1, 1, 'Cascos Sanson', 'Cascos musica', '40.99', 15, '1', '3', 'DEF', '3', 'electronica', 0, 'ninguna', 0, '');

-- --------------------------------------------------------
*/
--
-- Table structure for table `usuario`
--

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

-- --------------------------------------------------------

/*
--
-- Table structure for table `vendedores`
--

CREATE TABLE `vendedores` (
  `idVendededor` int(9) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(20) NOT NULL,
  `url` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendedores`
--

INSERT INTO `vendedores` (`idVendededor`, `nombre`, `telefono`, `email`, `url`) VALUES
(1, 'VendeBBB', '918788925', 'vendebbb@ucm.es', 'https://www.vendebbb.es');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idCarrito`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `precio` (`precio`),
  ADD KEY `color` (`color`),
  ADD KEY `talla` (`talla`,`unidades`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`tipo`);

--
-- Indexes for table `detallespedido`
--
ALTER TABLE `detallespedido`
  ADD PRIMARY KEY (`idDetalles`),
  ADD KEY `idProducto` (`idProducto`,`idPedido`),
  ADD KEY `fechaPedido` (`fechaPedido`),
  ADD KEY `color` (`color`),
  ADD KEY `talla` (`talla`),
  ADD KEY `cantidad` (`cantidad`),
  ADD KEY `precio` (`precio`),
  ADD KEY `idDistribuidor` (`idDistribuidor`),
  ADD KEY `detallespedido_ibfk_2` (`idPedido`);

--
-- Indexes for table `distribuidores`
--
ALTER TABLE `distribuidores`
  ADD PRIMARY KEY (`idDistribuidor`),
  ADD KEY `nombre` (`nombre`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idPago`),
  ADD KEY `idPago` (`idPago`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `fecha` (`fecha`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `producto` (`producto`),
  ADD KEY `idMensajero` (`idMensajero`),
  ADD KEY `idPago` (`idPago`),
  ADD KEY `cantidad` (`cantidad`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `idVendedor` (`idVendedor`),
  ADD KEY `numEstrellas` (`numEstrellas`);



--
-- Indexes for table `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`idVendededor`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `url` (`url`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idCarrito` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detallespedido`
--
ALTER TABLE `detallespedido`
  MODIFY `idDetalles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `distribuidores`
--
ALTER TABLE `distribuidores`
  MODIFY `idDistribuidor` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idPago` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `numero` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `idVendededor` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `detallespedido`
--
ALTER TABLE `detallespedido`
  ADD CONSTRAINT `detallespedido_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detallespedido_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`numero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detallespedido_ibfk_3` FOREIGN KEY (`fechaPedido`) REFERENCES `pedidos` (`fecha`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detallespedido_ibfk_4` FOREIGN KEY (`idDistribuidor`) REFERENCES `distribuidores` (`idDistribuidor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detallespedido_ibfk_5` FOREIGN KEY (`cantidad`) REFERENCES `pedidos` (`cantidad`) ON UPDATE CASCADE;

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`idMensajero`) REFERENCES `distribuidores` (`idDistribuidor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_4` FOREIGN KEY (`idPago`) REFERENCES `pagos` (`idPago`) ON UPDATE CASCADE;

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`tipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`idVendedor`) REFERENCES `vendedores` (`idVendededor`) ON UPDATE CASCADE;
COMMIT;
*/
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;