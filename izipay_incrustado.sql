-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2022 a las 00:51:48
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `izipay_incrustado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_transaccion`
--

CREATE TABLE `tb_transaccion` (
  `id` int(11) NOT NULL,
  `id_transaction` varchar(20) NOT NULL,
  `order_Id` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `uuid` varchar(200) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `fechaCreacion` varchar(50) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `card` varchar(20) DEFAULT NULL,
  `pan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_transaccion`
--

INSERT INTO `tb_transaccion` (`id`, `id_transaction`, `order_Id`, `email`, `uuid`, `amount`, `fechaCreacion`, `token`, `card`, `pan`) VALUES
(12, '9gzimm', 'orderId62750c35b5c0d', 'example@gmail.com', '81ddf24b3a4d4880a38af8f968ed9e9a', '2', '2022-05-06:07:01:34', '087945c0f93c4737bbd623719fa00dd0', 'AMEX', '378282XXXXX0008'),
(13, '9izgck', 'orderId62755abf73102', 'example@gmail.com', '782a878f266e4b1a9282467e5ce5d810', '12', '2022-05-06:12:28:46', 'a3b2c429144d4cfbac254c0d5b73133d', 'MASTERCARD', '597010XXXXXX0026'),
(14, '9bmjce', 'orderId62755aee96f1b', 'taipejerson4@gmail.com', '69c24f40119b43f29b8e96be3cd6f8bb', '5', '2022-05-06:12:29:27', NULL, 'AMEX', '378282XXXXX0008');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_transaccion`
--
ALTER TABLE `tb_transaccion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_transaccion`
--
ALTER TABLE `tb_transaccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
