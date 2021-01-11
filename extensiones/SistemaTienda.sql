-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-01-2021 a las 22:52:04
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `SistemaTienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `img` text NOT NULL,
  `titulo1` text NOT NULL,
  `titulo2` text NOT NULL,
  `titulo3` text NOT NULL,
  `estilo` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `ruta`, `img`, `titulo1`, `titulo2`, `titulo3`, `estilo`, `fecha`) VALUES
(1, 'sin-categoria', 'vistas/img/banner/default.jpg', '{\r\n\"texto\":\"OFERTAS ESPECIALES\",\r\n\"color\":\"#fff\"\r\n}', '{\r\n\"texto\":\"50 %\",\r\n\"color\":\"#fff\"\r\n}', '{\r\n\"texto\":\"termina el 31\",\r\n\"color\":\"#fff\"\r\n}', 'textoDer', '2020-12-09 18:01:04'),
(2, 'articulor-gratis', 'vistas/img/banner/ropa.jpg', '{\r\n\"texto\":\"OFERTASESPECIALES\",\r\n\"color\":\"#fff\"\r\n}', '{\r\n\"texto\":\"50 %\",\r\n\"color\":\"#fff\"\r\n}', '{\r\n\"texto\":\"termina el 31\",\r\n\"color\":\"#fff\"\r\n}', 'textoDer', '2020-12-09 18:25:05'),
(3, 'articulos-oferta', 'vistas/img/banner/ropaHombre.jpg', '{\r\n\"texto\":\"OFERTAS ESPECIALES\",\r\n\"color\":\"#fff\"\r\n}', '{\r\n\"texto\":\"50 %\",\r\n\"color\":\"#fff\"\r\n}', '{\r\n\"texto\":\"termina el 31\",\r\n\"color\":\"#fff\"\r\n}', 'textoDer', '2020-12-09 21:39:25'),
(4, 'cursos', 'vistas/img/banner/web.jpg', '{\r\n\"texto\":\"OFERTAS ESPECIALES\",\r\n\"color\":\"#fff\"\r\n}', '{\r\n\"texto\":\"50 %\",\r\n\"color\":\"#fff\"\r\n}', '{\r\n\"texto\":\"termina el 31\",\r\n\"color\":\"#fff\"\r\n}', 'textoDer', '2020-12-09 21:37:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `ruta` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `ruta`, `fecha`) VALUES
(1, 'ROPA', 'ropa', '0000-00-00 00:00:00'),
(2, 'CALSADO', 'calsado', '2020-11-28 02:19:16'),
(3, 'ACCESORIOS', 'accesorios', '0000-00-00 00:00:00'),
(4, 'TECNOLOGIA', 'tecnologia', '0000-00-00 00:00:00'),
(5, 'CURSOS', 'cursos', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `calificacion` float NOT NULL,
  `comentario` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_usuario`, `id_producto`, `calificacion`, `comentario`, `fecha`) VALUES
(3, 12, 6, 5, 'aaaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaaa aaaaaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaaaa aaaaaaaaaaa aaaaaaaaaaaa aaaaaaaaaa', '2021-01-02 03:04:24'),
(4, 12, 6, 3.5, 'me paree bien las aplicaciones quye estan  para brindar nuiesopba asdf safda  sadf sadf asdf  asfsadf ', '2021-01-02 00:20:33'),
(5, 12, 6, 5, 'me paree bien las aplicaciones quye estan haciendo para brindar nuiesopba asdf safda  sadf sadf asdf  asfsadf ', '2021-01-02 02:36:51'),
(6, 12, 6, 3.5, 'Excelente', '2021-01-02 00:20:33'),
(7, 12, 6, 3.5, 'Excelente', '2021-01-02 00:20:33'),
(8, 12, 6, 3.5, 'mal', '2021-01-02 00:20:33'),
(9, 12, 6, 5, 'mal', '2021-01-02 00:20:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  `id` int(11) NOT NULL,
  `impuesto` float NOT NULL,
  `envioLocal` float NOT NULL,
  `envioNacional` float NOT NULL,
  `tasaMinimaLocal` float NOT NULL,
  `tasaMinimaNacional` float NOT NULL,
  `region` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`id`, `impuesto`, `envioLocal`, `envioNacional`, `tasaMinimaLocal`, `tasaMinimaNacional`, `region`, `fecha`) VALUES
(1, 18, 0, 20, 0, 15, 'JU', '2021-01-07 16:04:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `envio` int(11) NOT NULL,
  `metodo` text NOT NULL,
  `direccion` text NOT NULL,
  `region` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `id_usuario`, `id_producto`, `envio`, `metodo`, `direccion`, `region`, `fecha`) VALUES
(4, 12, 6, 0, 'paypal', 'asdfsd', 'huan', '2021-01-02 00:19:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE `deseos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `deseos`
--

INSERT INTO `deseos` (`id`, `id_usuario`, `id_producto`, `fecha`) VALUES
(1, 12, 28, '2021-01-02 20:43:29'),
(2, 12, 31, '2021-01-02 20:43:31'),
(3, 12, 31, '2021-01-02 20:43:33'),
(4, 12, 25, '2021-01-02 20:43:41'),
(5, 12, 22, '2021-01-02 20:45:32'),
(6, 12, 1, '2021-01-02 20:48:07'),
(7, 12, 1, '2021-01-02 20:48:08'),
(8, 12, 1, '2021-01-02 20:48:09'),
(9, 12, 21, '2021-01-02 20:50:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `id` int(11) NOT NULL,
  `barraSuperior` text NOT NULL,
  `textoSuperior` text NOT NULL,
  `colorFondo` text NOT NULL,
  `colorTexto` text NOT NULL,
  `logo` text NOT NULL,
  `icono` text NOT NULL,
  `redesSociales` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id`, `barraSuperior`, `textoSuperior`, `colorFondo`, `colorTexto`, `logo`, `icono`, `redesSociales`, `fecha`) VALUES
(1, '#3c5759', '#ffffff', '#46639f', '#ffffff', 'vistas/img/plantilla/logo.png', 'vistas/img/plantilla/icono.png', '[\r\n	{\"red\":\"fa-facebook\",\"estilo\":\"facebookColor\",\"url\":\"https://facebook.com/\"},\r\n	{\"red\":\"fa-instagram\",\"estilo\":\"instagramColor\",\"url\":\"https://instagram.com/\"},\r\n	{\"red\":\"fa-twitter\",\"estilo\":\"twitterColor\",\"url\":\"https://twitter.com/\"},\r\n	{\"red\":\"fa-youtube\",\"estilo\":\"youtubeColor\",\"url\":\"https://youtube.com/\"},\r\n\r\n	{\"red\":\"fa-google-plus\",\"estilo\":\"googleColor\",\"url\":\"https://google.com/\"}\r\n]', '2020-12-29 02:58:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `ruta` text NOT NULL,
  `titulo` text NOT NULL,
  `titular` text NOT NULL,
  `descripcion` text NOT NULL,
  `multimedia` text NOT NULL,
  `detalles` text NOT NULL,
  `precio` float NOT NULL,
  `portada` text NOT NULL,
  `vistas` int(11) NOT NULL,
  `ventas` int(11) NOT NULL,
  `vistasGratis` int(11) NOT NULL,
  `ventasGratis` int(11) NOT NULL,
  `ofertaPor Categoria` int(11) NOT NULL,
  `ofertadoPorSubCategoria` int(11) NOT NULL,
  `oferta` int(11) NOT NULL,
  `precioOferta` float NOT NULL,
  `descuentoOferta` int(11) NOT NULL,
  `imgOferta` text NOT NULL,
  `finOferta` datetime NOT NULL,
  `nuevo` int(11) NOT NULL,
  `peso` float NOT NULL,
  `entrega` float NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `id_subcategoria`, `tipo`, `ruta`, `titulo`, `titular`, `descripcion`, `multimedia`, `detalles`, `precio`, `portada`, `vistas`, `ventas`, `vistasGratis`, `ventasGratis`, `ofertaPor Categoria`, `ofertadoPorSubCategoria`, `oferta`, `precioOferta`, `descuentoOferta`, `imgOferta`, `finOferta`, `nuevo`, `peso`, `entrega`, `stock`, `fecha`) VALUES
(1, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 10, '2021-01-08 03:27:36'),
(2, 1, 1, 'fisico', 'vestido-jean-1', 'Vestido Jean', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 29, 'vistas/img/productos/ropa/ropa04.jpg', 2, 403, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 0, 1, 10, 10, '2020-12-11 22:00:37'),
(3, 1, 1, 'fisico', 'vestido-clasico-1', 'Vestido Clàsico', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 29, 'vistas/img/productos/ropa/ropa02.jpg', 7, 402, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 0, 1, 10, 10, '2021-01-03 23:57:10'),
(4, 1, 3, 'fisico', 'top-dama-1', 'Top Dama', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 29, 'vistas/img/productos/ropa/ropa06.jpg', 4, 401, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, 15, '2020-12-03 03:46:57'),
(5, 2, 2, 'fisico', 'semibotas-ejecutivas-1', 'Semibotas Ejecutivas', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 45, 'vistas/img/productos/calzado/calzado01.jpg', 8, 400, 0, 0, 0, 1, 1, 22, 50, 'vistas/img/ofertas/Calzado-para-hombre.jpg', '0000-00-00 00:00:00', 0, 1, 10, 5, '2021-01-07 00:26:39'),
(6, 2, 3, 'fisico', 'tennis-gris-1', 'Tennis Gris', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 55, 'vistas/img/productos/calzado/calzado02.jpg', 160, 399, 0, 0, 0, 0, 1, 25, 50, '', '0000-00-00 00:00:00', 1, 1, 10, 5, '2021-01-07 00:39:18'),
(7, 2, 5, 'fisico', 'zapatilla-clasica-1', 'Zapatilla Clàsica', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 45, 'vistas/img/productos/calzado/calzado03.jpg', 9, 398, 0, 0, 0, 1, 1, 25, 50, 'vistas/img/ofertas/Calzado-para-hombre.jpg', '0000-00-00 00:00:00', 0, 1, 10, 10, '2021-01-06 00:30:21'),
(8, 2, 1, 'fisico', 'tennis-verde-1', 'Tennis Verde', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '[ 	{\"foto\":\"vistas/img/multimedia/tennis-verde/img-01.jpg\"}, 	{\"foto\":\"vistas/img/multimedia/tennis-verde/img-02.jpg\"}, 	{\"foto\":\"vistas/img/multimedia/tennis-verde/img-03.jpg\"}, 	{\"foto\":\"vistas/img/multimedia/tennis-verde/img-04.jpg\"}, 	{\"foto\":\"vistas/img/multimedia/tennis-verde/img-05.jpg\"}  ]', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 55, 'vistas/img/productos/calzado/calzado04.jpg', 193, 397, 0, 0, 0, 0, 1, 25, 50, '', '0000-00-00 00:00:00', 0, 1, 10, 50, '2021-01-07 15:45:40'),
(9, 5, 20, 'fisico', 'tennis-rojo-1', 'Tennis Rojo', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 55, 'vistas/img/productos/calzado/calzado05.jpg', 12, 396, 0, 0, 0, 0, 1, 25, 50, '', '0000-00-00 00:00:00', 0, 1, 10, 8, '2021-01-05 21:54:09'),
(10, 5, 19, 'fisico', 'tennis-azul-1', 'Tennis Azul', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 55, 'vistas/img/productos/calzado/calzado06.jpg', 10, 395, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, 5, '2020-12-11 22:00:47'),
(11, 3, 2, 'fisico', 'pulsera-de-diamantes-1', 'Pulsera de diamantes', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 399, 'vistas/img/productos/accesorios/accesorio01.jpg', 15, 394, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, 7, '2021-01-07 00:28:59'),
(12, 3, 1, 'fisico', 'bolso-militar-1', 'Bolso Militar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 100, 'vistas/img/productos/accesorios/accesorio02.jpg', 21, 393, 0, 0, 0, 1, 1, 20, 80, 'vistas/img/ofertas/Bolsos.jpg', '0000-00-00 00:00:00', 0, 1, 10, 8, '2021-01-05 21:40:09'),
(13, 3, 1, 'fisico', 'bolso-deportivo-gris-1', 'Bolso Deportivo Gris', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 100, 'vistas/img/productos/accesorios/accesorio03.jpg', 13, 392, 0, 0, 0, 1, 1, 20, 80, 'vistas/img/ofertas/Bolsos.jpg', '0000-00-00 00:00:00', 0, 1, 10, 15, '2020-12-11 22:00:55'),
(14, 3, 1, 'fisico', 'collar-de-diamantes-1', 'Collar de diamantes', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 599, 'vistas/img/productos/accesorios/accesorio04.jpg', 14, 391, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, 4, '2020-12-11 22:00:58'),
(15, 4, 5, 'fisico', 'telefono-movil-iphone-1', 'Telèfono\r\n Mòvil Iphone', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 1500, 'vistas/img/productos/tecnologia/tecnologia01.jpg', 17, 390, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, 8, '2021-01-04 02:53:59'),
(16, 4, 5, 'fisico', 'telefono-movil-samsung-1', 'telefono\r\nmovil Smarfon', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 800, 'vistas/img/productos/tecnologia/tecnologia02.jpg', 27, 389, 0, 0, 0, 1, 1, 40, 40, '', '0000-00-00 00:00:00', 0, 1, 10, 5, '2021-01-07 00:40:23'),
(17, 4, 5, 'fisico', 'telefono-movil-lg-1', 'Telefono movil lg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 650, 'vistas/img/productos/tecnologia/tecnologia03.jpg', 20, 388, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 1, 10, 6, '2021-01-06 00:28:31'),
(18, 5, 19, 'fisico', 'telefono-movil-nexus-1', 'Telefono movil nexus', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\n}', 450, 'vistas/img/productos/tecnologia/tecnologia04.jpg', 24, 387, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, 7, '2021-01-07 00:54:03'),
(20, 3, 1, 'fisico', 'collar-de-diamantes-1', 'Collar de diamantes', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 599, 'vistas/img/productos/accesorios/accesorio04.jpg', 14, 391, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, 6, '2020-12-11 21:57:49'),
(21, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 3, '2021-01-08 03:27:36'),
(22, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 4, '2021-01-08 03:27:36'),
(23, 5, 19, 'fisico', 'telefono-movil-nexus-1', 'Telefono movil nexus', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 450, 'vistas/img/productos/tecnologia/tecnologia04.jpg', 24, 387, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, 8, '2021-01-07 00:54:03'),
(24, 5, 19, 'fisico', 'telefono-movil-nexus-1', 'Telefono movil nexus', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 450, 'vistas/img/productos/tecnologia/tecnologia04.jpg', 24, 387, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, 4, '2021-01-07 00:54:03'),
(25, 1, 1, 'fisico', 'falda-de-flores-2', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 3, 404, 15, 15, 15, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 100, 100, '2021-01-07 00:39:36'),
(26, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 5, '2021-01-08 03:27:36'),
(27, 1, 3, 'fisico', 'top-dama-1', 'Top Dama', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa06.jpg', 4, 401, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, 15, '2020-12-03 03:46:57'),
(28, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 50, '2021-01-08 03:27:36'),
(29, 5, 19, 'fisico', 'telefono-movil-nexus-1', 'Telefono movil nexus', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 450, 'vistas/img/productos/tecnologia/tecnologia04.jpg', 24, 387, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, 10, '2021-01-07 00:54:03'),
(30, 5, 19, 'fisico', 'telefono-movil-nexus-1', 'Telefono movil nexus', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 450, 'vistas/img/productos/tecnologia/tecnologia04.jpg', 24, 387, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, 10, '2021-01-07 00:54:03'),
(31, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 10, '2021-01-08 03:27:36'),
(32, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(33, 5, 19, 'fisico', 'telefono-movil-nexus-1', 'Telefono movil nexus', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 450, 'vistas/img/productos/tecnologia/tecnologia04.jpg', 24, 387, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, 0, '2021-01-07 00:54:03'),
(34, 5, 19, 'fisico', 'telefono-movil-nexus-1', 'Telefono movil nexus', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 450, 'vistas/img/productos/tecnologia/tecnologia04.jpg', 24, 387, 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, 0, '2021-01-07 00:54:03'),
(35, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(36, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(37, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(38, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(39, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(40, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(41, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(42, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(43, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(44, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(45, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(46, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(47, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(48, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(49, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(50, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(51, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(52, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(53, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(54, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(55, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(56, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(57, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(58, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(59, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(60, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(61, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(62, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(63, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(64, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36');
INSERT INTO `productos` (`id`, `id_categoria`, `id_subcategoria`, `tipo`, `ruta`, `titulo`, `titular`, `descripcion`, `multimedia`, `detalles`, `precio`, `portada`, `vistas`, `ventas`, `vistasGratis`, `ventasGratis`, `ofertaPor Categoria`, `ofertadoPorSubCategoria`, `oferta`, `precioOferta`, `descuentoOferta`, `imgOferta`, `finOferta`, `nuevo`, `peso`, `entrega`, `stock`, `fecha`) VALUES
(65, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(66, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(67, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(68, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(69, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(70, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(71, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(72, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(73, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(74, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(75, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(76, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(77, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(78, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(79, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(80, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(81, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(82, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(83, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(84, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(85, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(86, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(87, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(88, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(89, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(90, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(91, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(92, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(93, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(94, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(95, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(96, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(97, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(98, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(99, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(100, 1, 1, 'fisico', 'falda-de-flores-1', 'Falda de Flores', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 29, 'vistas/img/productos/ropa/ropa03.jpg', 130, 404, 0, 0, 0, 1, 1, 11, 40, 'vistas/img/ofertas/Ropa-para-dama.jpg', '0000-00-00 00:00:00', 1, 1, 10, 0, '2021-01-08 03:27:36'),
(101, 5, 18, 'virtual', 'curso-de-bootstrap-1', 'Curso de Bootstrap', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'HAPfBM-DxaI', '{ \"Clases\": \"121 Clases\",\"Tiempo\": \"24 horas de estudio\",\"Nivel\": \"Nivel B?sico\", \"Acceso\": \"Acceso de por vida\",\"Dispositivo\": \"Acceso en dispositivos m?viles y TV\",\"Certificado\": \"Certificado de finalizaci?n\"}', 100, 'vistas/img/productos/cursos/curso05.jpg', 128, 300, 0, 0, 1, 0, 1, 10, 90, 'vistas/img/ofertas/cursos.jpg', '0000-00-00 00:00:00', 0, 0, 0, 10, '2021-01-06 17:17:17'),
(102, 3, 9, 'fisico', 'bolso-militar-1', 'Bolso Militar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minus, consectetur beatae fugit odio iure repudiandae quia distinctio, id ducimus molestiae. Obcaecati, unde. Illo molestiae dolorum, saepe nisi enim iusto.', '', '{\"Talla\": [36,38,40],\"Color\": [\"rojo\",\"negro\",\"blanco\"],\"Marca\":null\r\n}', 100, 'vistas/img/productos/cursos/curso05.jpg', 21, 300, 0, 0, 0, 1, 1, 20, 80, 'vistas/img/ofertas/cursos.jpg', '0000-00-00 00:00:00', 0, 1, 10, 8, '2021-01-05 21:40:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `imgFondo` text NOT NULL,
  `tipoSlide` text NOT NULL,
  `imgProducto` text NOT NULL,
  `estiloImgProducto` text NOT NULL,
  `estiloTextoSlide` text NOT NULL,
  `titulo1` text NOT NULL,
  `titulo2` text NOT NULL,
  `titulo3` text NOT NULL,
  `boton` text NOT NULL,
  `url` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `slide`
--

INSERT INTO `slide` (`id`, `imgFondo`, `tipoSlide`, `imgProducto`, `estiloImgProducto`, `estiloTextoSlide`, `titulo1`, `titulo2`, `titulo3`, `boton`, `url`, `fecha`) VALUES
(1, 'vistas/img/slide/default/back_default.jpg', 'slideOpcion1', 'vistas/img/slide/slide1/calzado.png', '{\"top\": \"15%\" ,\"right\": \"10%\" ,\"width\": \"30%\", \"left\":\"\"}', '{\"top\": \"20%\" ,\"right\": \"\" ,\"width\": \"40%\", \"left\":\"10%\"}', '{\"texto\":\"lorem impsunss\", \"color\":\"#333\"}', '{\"texto\":\"lorem asdasdfsd\", \"color\":\"#333\"}', '{\"texto\":\"safdsdf qwewqewq\", \"color\":\"#333\"}', '<button class=\"btn btn-default backColor text-uppercase\">\r\n\r\n							VER PRODUCTO <span class=\"fa fa-chevron-right\"></span>\r\n\r\n							</button>', '#', '2020-11-18 23:24:43'),
(2, 'vistas/img/slide/default/back_default.jpg', 'slideOpcion1', 'vistas/img/slide/slide2/curso.png', '{\"top\": \"10%\" ,\"right\": \"10%\" ,\"width\": \"20%\", \"left\":\"\"}', '{\"top\": \"20%\" ,\"right\": \"\" ,\"width\": \"40%\", \"left\":\"10%\"}', '{\"texto\":\"lorem impsunss\", \"color\":\"#333\"}', '{\"texto\":\"lorem asdasdfsd\", \"color\":\"#333\"}', '{\"texto\":\"safdsdf qwewqewq\", \"color\":\"#333\"}', '<button class=\"btn btn-default backColor text-uppercase\">\r\n\r\n							VER PRODUCTO <span class=\"fa fa-chevron-right\"></span>\r\n\r\n							</button>', '#', '2020-11-18 23:35:11'),
(3, 'vistas/img/slide/default/back_default.jpg', 'slideOpcion1', 'vistas/img/slide/slide3/iphone.png', '{\r\n	\"width\": \"35%\",\r\n	\"top\": \"5%\",\r\n	\"left\": \"15%\",\r\n	\"right\": \"\"\r\n}', '{\r\n	\"width\": \"40%\",\r\n	\"top\": \"15%\",\r\n	\"left\": \"\",\r\n	\"right\": \"15%\"\r\n}', '{\"texto\":\"lorem impsunss\", \"color\":\"#333\"}', '{\"texto\":\"lorem asdasdfsd\", \"color\":\"#333\"}', '{\"texto\":\"safdsdf qwewqewq\", \"color\":\"#333\"}', '<button class=\"btn btn-default backColor text-uppercase\">\r\n\r\n							VER PRODUCTO <span class=\"fa fa-chevron-right\"></span>\r\n\r\n							</button>', '#', '2020-11-18 23:29:30'),
(4, 'vistas/img/slide/slide4/fondo3.jpg', 'slideOpcion1', '', '{\"top\": \"15%\" ,\"right\": \"10%\" ,\"width\": \"30%\", \"left\":\"35%\"}', '{\"top\": \"20%\" ,\"right\": \"\" ,\"width\": \"40%\", \"left\":\"10%\"}', '{\"texto\":\"lorem impsunss\", \"color\":\"#333\"}', '{\"texto\":\"lorem asdasdfsd\", \"color\":\"#333\"}', '{\"texto\":\"safdsdf qwewqewq\", \"color\":\"#333\"}', '', '', '2020-11-19 02:37:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `subcategoria` text NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `subcategoria`, `id_categoria`, `ruta`, `fecha`) VALUES
(1, 'Ropa para dama', 1, 'ropa-para-dama', '0000-00-00 00:00:00'),
(2, 'Ropa para hombre', 1, 'ropa-para-hombre', '2020-11-28 01:47:24'),
(3, 'Ropa deportiva', 1, 'ropa-deportiva', '0000-00-00 00:00:00'),
(4, 'Ropa infantil', 1, 'ropa-infantil', '2020-11-28 01:27:56'),
(5, 'Calzado para dama', 2, 'calzado-para-dama', '0000-00-00 00:00:00'),
(6, 'Calzado para hombre', 2, 'calzado-para-hombre', '0000-00-00 00:00:00'),
(7, 'Calzado deportivo', 2, 'calzado-deportivo', '0000-00-00 00:00:00'),
(8, 'Calzado infantil', 2, 'calzado-infantil', '0000-00-00 00:00:00'),
(9, 'Bolsos', 3, 'bolsos', '0000-00-00 00:00:00'),
(10, 'Relojes', 3, 'relojes', '0000-00-00 00:00:00'),
(11, 'Pulseras', 3, 'pulseras', '0000-00-00 00:00:00'),
(12, 'Collares', 3, 'collares', '0000-00-00 00:00:00'),
(13, 'Gafas de sol', 4, 'gafas-de-sol', '0000-00-00 00:00:00'),
(14, 'Telefonos Moviles', 4, 'telefonos-moviles', '0000-00-00 00:00:00'),
(15, 'Tablets Electronicas', 4, 'tablets-electronicas', '0000-00-00 00:00:00'),
(16, 'Computadoras', 4, 'computadoras', '0000-00-00 00:00:00'),
(17, 'Audiculares', 4, 'audiculares', '0000-00-00 00:00:00'),
(18, 'Diseño web', 5, 'diseno-web', '2020-11-12 03:02:49'),
(19, 'Marketing digital', 5, 'marketing-digital', '0000-00-00 00:00:00'),
(20, 'Diseño web', 5, 'diseno-web', '2020-11-12 03:02:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `modo` text NOT NULL,
  `foto` text NOT NULL,
  `verificacion` text NOT NULL,
  `emailEncriptado` text NOT NULL,
  `passwordNormal` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `email`, `modo`, `foto`, `verificacion`, `emailEncriptado`, `passwordNormal`, `fecha`) VALUES
(1, 'asd', '$2a$07$asxx54ahjppf45sd87a5au2n.FaDQfFWeTcUf.sI3RSpwJhLRrMuG', 'brayan@gmail.com', 'directo', '', '0', '27d1f42c957d4b73ca604201b028e6f6', 'ksvx7hkwyzq', '2021-01-08 18:09:46'),
(12, 'brayan Andres', '$2a$07$asxx54ahjppf45sd87a5auofkmXi3vpdzaCqeJFBi/NOJBb8rJxOy', 'brayanandres@gmail.com', 'directo', 'vistas/img/usuarios/12/766.jpg', '0', 'cfa2b4d7cefa864c8006090c92754d8f', 'brayanandres', '2021-01-02 20:29:32'),
(37, 'asd', '$2a$07$asxx54ahjppf45sd87a5au4ns8FiVvkvVBnFK8d0M8zSUyREGgcMm', 'brayaAn@gmail.com', 'directo', '', '0', 'cf75a23b784eede61901c954b35bbac9', 'BRAYAN', '2020-12-27 03:33:29'),
(38, 'BRYAN', '$2a$07$asxx54ahjppf45sd87a5auX3JxHpiUi395.6Khd8AwPqS0AAZ8Ele', 'PEPELUCHO@HOTMAIL.COM', 'directo', '', '0', 'b4d64621301f25c5947fc42cc267e14a', 'BRAYAN123', '2020-12-27 03:33:24'),
(41, 'bryan', '$2a$07$asxx54ahjppf45sd87a5auMXqKA/.BEMzbUSsG/EEASRXVdguOYDq', 'bandresctaipe2@hotmail.com', 'directo', '', '1', 'b868a3abdb17c58341f46e464cb88d0c', 'asd', '2020-12-27 03:36:58'),
(43, 'bryan', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'brayaasdn@gmail.com', 'directo', '', '1', '0ab535100455f92764050b977f0d6c03', '123', '2020-12-27 23:11:56'),
(44, 'Brayan CT', 'null', 'bandresctaipe@hotmail.com', 'facebook', 'http://graph.facebook.com/3659641447457050/picture?type=large', '0', 'null', 'null', '2020-12-28 01:35:47'),
(46, 'brayan capcha', 'null', 'digitalwebprofesional@gmail.com', 'google', 'https://lh5.googleusercontent.com/-ElSHTC3qYPY/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuclqKmaI7Q5vUlGwgOL44-Zgexbjag/s96-c/photo.jpg', '0', 'null', 'null', '2020-12-28 02:30:33'),
(47, 'JULIO CESAR VALLADOLID ACEVEDO', 'null', 'i1610426@continental.edu.pe', 'google', 'https://lh3.googleusercontent.com/a-/AOh14GidgwljGMoAqjpCVt74M4lgM2AwfmyQSDovPb13kw=s96-c', '0', 'null', 'null', '2020-12-28 02:46:59'),
(48, 'Brayan Capcha Taype', 'null', 'brayancapchataype@gmail.com', 'google', 'https://lh3.googleusercontent.com/a-/AOh14GgZ0_cyBjnruuaHVxhjZ0DHKG_lz3oHh0Xgth-kfw=s96-c', '0', 'null', 'null', '2020-12-28 02:55:39'),
(49, 'brayan pepe lucho', '$2a$07$asxx54ahjppf45sd87a5aucGkNdO4069K0pDmms3Rvoc/zmP0/vwK', 'bryanpepe@gmail.com', 'directo', '', '1', 'ec4158d23b1bd5ef557a4fa81d8c87ff', 'bryan', '2020-12-28 03:03:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deseos`
--
ALTER TABLE `deseos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `deseos`
--
ALTER TABLE `deseos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
