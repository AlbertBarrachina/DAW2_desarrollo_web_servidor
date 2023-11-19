-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2023 a las 20:26:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `daw2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(16) NOT NULL,
  `usuario` int(16) NOT NULL,
  `producto` int(16) NOT NULL,
  `cantidad` int(3) NOT NULL,
  `precio_total` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `carrito`
--
DELIMITER $$
CREATE TRIGGER `before_insert_carrito` BEFORE INSERT ON `carrito` FOR EACH ROW BEGIN
    DECLARE new_id INT;
    
    -- Calculate the new numeric value based on the current auto-incremented ID
    SELECT IFNULL(MAX(id), 0) + 1 INTO new_id FROM carrito;

    -- Set the new numeric value for the inserted row
    SET NEW.id = new_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(3) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`) VALUES
(1, 'muebles', 'muebles variados'),
(2, 'electrodomesticos', 'electrodomésticos para el hogar y la oficina'),
(3, 'electronica', 'productos como ordenadores, telefonos mobil y cables');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(16) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `stock` int(3) NOT NULL,
  `precio_unitario` float(5,2) NOT NULL,
  `categoria` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `stock`, `precio_unitario`, `categoria`) VALUES
(1, 'mesa ikea', 34, 42.00, 1),
(2, 'silla oficina', 15, 32.57, 1),
(3, 'microondas', 30, 79.99, 2),
(4, 'pc torre', 200, 563.59, 3),
(5, 'portatil  ALIENWARE', 37, 899.99, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(16) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `contrasenya` varchar(100) NOT NULL,
  `confirmacion_contrasenya` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `email`, `contrasenya`, `confirmacion_contrasenya`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$LY/eXmDpARI1m8pVINH6be4LsZsPVCRKfCjTsihEVvLtaa/oCgAt2', '$2y$10$WEIopQWi3k2hXPanenzCkOtlADc4JY.cBsVxi5B8vzr7IXncXAFNS'),
(2, 'user', 'user@gmail.com', '$2y$10$KgAeUQtIRlsqLDN2/7Hqx.KScAoiCUEyK4xrmNA.V1bZOkKV1wSfm', '$2y$10$ADQ3EbIh8WY/8l1aB0EbxuRldMUvRl4ykOEYR3SPaA9t.b1R/jEOq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_producto` (`producto`),
  ADD KEY `FK_usuario` (`usuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_categoria` (`categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `FK_producto` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
