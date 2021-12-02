-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2021 a las 23:48:28
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbmovieenjoyers`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_actor` (IN `_actor` VARCHAR(50))  BEGIN
 IF(_actor not in (select d.nombreActor from tbactores as d WHERE d.nombreActor = _actor)) THEN
 insert IGNORE into tbactores(nombreActor)VALUES (_actor);
 END IF; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_director` (IN `_director` VARCHAR(50))  BEGIN
 IF(_director not in (select d.nombreDirector from tbdirectores as d WHERE d.nombreDirector = _director)) THEN
 insert IGNORE into tbdirectores(nombreDirector)VALUES (_director);
 END IF; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_pelicula` (IN `_titulo` VARCHAR(50), IN `_fechaEstreno` DATE)  BEGIN
 IF(_titulo not in (select d.nombrePelicula from tbpeliculas as d WHERE d.nombrePelicula = _titulo )) THEN
 insert IGNORE into tbdirectores(nombrePelicula,fechaEstreno)VALUES (_titulo,_fechaEstreno);
 END IF; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_pelicula2` (IN `_titulo` VARCHAR(50), IN `_fechaEstreno` DATE)  BEGIN
INSERT INTO tbpeliculas(nombrePelicula,fechaEstreno) VALUES (_titulo,_fechaEstreno);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_review` (IN `_titulo` VARCHAR(50), IN `_fechaEstreno` DATE, IN `_director` VARCHAR(50), IN `_actor` VARCHAR(50), IN `_review` VARCHAR(1000), IN `_foto` BLOB)  BEGIN
   CALL insert_actor(_actor);
   CALL insert_director(_director);
   CALL insert_pelicula2(_titulo,_fechaEstreno);
   
    set @idActor = (select id from tbactores where tbactores.nombreActor = _actor);
    set @idDirector =  (select id from tbdirectores where tbdirectores.nombreDirector = _director);
      set @idPelicula = (select id from tbpeliculas where tbpeliculas.nombrePelicula = _titulo); 
   
   INSERT into tbreviews (foto,idActor,idDirector,idtitulo,review) VALUES(_foto, @idActor,@idDirector,@idPelicula,_review);                                                       
                                                                                 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbactores`
--

CREATE TABLE `tbactores` (
  `id` int(11) NOT NULL,
  `nombreActor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbactores`
--

INSERT INTO `tbactores` (`id`, `nombreActor`) VALUES
(1, 'Tom Cruise'),
(2, 'Daniel gomezx'),
(3, 'XABIER'),
(4, 'aaa'),
(5, 'Mel Gibson'),
(6, 'CHum lEE'),
(7, 'aaaa'),
(8, 'aaaa bbbb'),
(9, 'un wey'),
(10, 'Jane Doe'),
(11, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdirectores`
--

CREATE TABLE `tbdirectores` (
  `id` int(11) NOT NULL,
  `nombreDirector` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbdirectores`
--

INSERT INTO `tbdirectores` (`id`, `nombreDirector`) VALUES
(1, 'Jodorowsky'),
(2, 'Tarantino'),
(3, 'Martin Ramos'),
(4, 'YO'),
(5, 'Emmanuel Ruiz Vargas'),
(6, 'Shinji Chan CHun'),
(7, 'Eugenio derbez'),
(8, 'Carros Veloces a alta velocidad'),
(9, 'John patrol'),
(10, 'John Doe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpeliculas`
--

CREATE TABLE `tbpeliculas` (
  `id` int(11) NOT NULL,
  `nombrePelicula` varchar(50) NOT NULL,
  `fechaEstreno` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbpeliculas`
--

INSERT INTO `tbpeliculas` (`id`, `nombrePelicula`, `fechaEstreno`) VALUES
(1, 'Rapidos y furiosos', '2021-11-03'),
(2, 'Best action movie 2021', '2021-11-19'),
(3, 'Shrek 2', '2021-11-03'),
(4, 'Battle Royal', '2000-12-11'),
(5, 'aaaaa', '2021-12-08'),
(6, 'Martin Ramos Tapia', '2021-12-08'),
(7, 'Paw patrol Pelicula ', '2026-12-19'),
(8, 'Macario', '2021-12-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbreviews`
--

CREATE TABLE `tbreviews` (
  `id` int(11) NOT NULL,
  `idtitulo` int(50) NOT NULL,
  `idDirector` int(11) NOT NULL,
  `idActor` int(11) NOT NULL,
  `review` varchar(50) NOT NULL,
  `foto` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbreviews`
--

INSERT INTO `tbreviews` (`id`, `idtitulo`, `idDirector`, `idActor`, `review`, `foto`) VALUES
(3, 4, 6, 6, 'est una pelicula estilo battle royal antes que for', 0x3234323437313934395f343433373932313333393631373233335f363738393634363136313638353638393439395f6e2e6a7067),
(4, 5, 7, 7, 'asdafsdfa', 0x3234323437313934395f343433373932313333393631373233335f363738393634363136313638353638393439395f6e2e6a7067),
(5, 6, 8, 8, 'asdafsdfaasdfasdf ', 0x3234323437313934395f343433373932313333393631373233335f363738393634363136313638353638393439395f6e2e6a7067),
(6, 7, 9, 9, 'ok epic', ''),
(7, 8, 10, 10, 'aaasdfsdfsdf', 0x3234323437313934395f343433373932313333393631373233335f363738393634363136313638353638393439395f6e2e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuarios`
--

CREATE TABLE `tbusuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correoElectronico` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbusuarios`
--

INSERT INTO `tbusuarios` (`id`, `nombre`, `correoElectronico`, `password`) VALUES
(1, 'Francisco Castillo', 'castilloxavier49@gmail.com', '123'),
(4, 'Javier Colin', 'pruebaEmail@gmail.com', '234'),
(5, 'John Doe', 'correoPrueba@gmail.com', '123'),
(6, 'Macario', 'usuarioNuevo20@yahoo.com', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbactores`
--
ALTER TABLE `tbactores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbdirectores`
--
ALTER TABLE `tbdirectores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbpeliculas`
--
ALTER TABLE `tbpeliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbreviews`
--
ALTER TABLE `tbreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbusuarios`
--
ALTER TABLE `tbusuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbactores`
--
ALTER TABLE `tbactores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tbdirectores`
--
ALTER TABLE `tbdirectores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tbpeliculas`
--
ALTER TABLE `tbpeliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbreviews`
--
ALTER TABLE `tbreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbusuarios`
--
ALTER TABLE `tbusuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
