-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2024 a las 23:54:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `barbieboutique`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarServicio` (IN `p_idservicio` INT, IN `p_descripcionservicio` VARCHAR(50), IN `p_estadoservicio` VARCHAR(20))   BEGIN
    UPDATE servicio
    SET descripcionservicio = p_descripcionservicio,
        estadoservicio = p_estadoservicio
    WHERE idservicio = p_idservicio;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idcita` int(11) NOT NULL,
  `fechacita` date NOT NULL,
  `horacita` time NOT NULL,
  `estadocita` varchar(20) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idcita`, `fechacita`, `horacita`, `estadocita`, `idempleado`, `idcliente`, `idservicio`) VALUES
(1, '2024-01-10', '16:30:00', 'activo', 16, 17, 5),
(3, '2023-02-20', '11:30:00', 'activo', 3, 4, 1),
(4, '2023-04-05', '10:15:00', 'activo', 7, 8, 4),
(5, '2023-05-12', '14:30:00', 'activo', 9, 10, 5),
(6, '2023-06-25', '16:00:00', 'activo', 11, 12, 6),
(7, '2023-07-08', '13:45:00', 'activo', 13, 14, 7),
(8, '2023-08-14', '11:00:00', 'activo', 15, 16, 3),
(9, '2024-01-05', '10:30:00', 'activo', 17, 18, 2),
(11, '2024-03-22', '12:45:00', 'activo', 21, 22, 5),
(12, '2024-04-30', '14:00:00', 'activo', 23, 24, 4),
(13, '2024-05-08', '09:30:00', 'activo', 25, 1, 6),
(14, '2024-06-17', '16:30:00', 'activo', 2, 3, 7),
(15, '2024-07-29', '11:15:00', 'activo', 4, 5, 2),
(16, '2024-08-02', '10:00:00', 'activo', 6, 7, 3),
(17, '2024-09-10', '14:45:00', 'activo', 8, 9, 1),
(18, '2024-10-15', '11:30:00', 'activo', 10, 11, 4),
(19, '2024-02-29', '17:00:00', 'activo', 18, 19, 7),
(20, '2024-03-05', '09:15:00', 'activo', 8, 12, 3),
(21, '2024-04-15', '13:30:00', 'activo', 19, 5, 2),
(22, '2024-05-20', '17:45:00', 'activo', 7, 14, 1),
(23, '2024-06-30', '10:00:00', 'activo', 11, 20, 4),
(24, '2024-07-10', '14:15:00', 'activo', 16, 9, 5),
(25, '2024-10-30', '14:30:00', 'activo', 9, 21, 2),
(26, '2024-09-25', '11:45:00', 'activo', 18, 10, 6),
(27, '2024-09-25', '11:45:00', 'inactivo', 18, 10, 6),
(28, '2024-02-20', '11:30:00', 'activo', 3, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `numdoccliente` varchar(15) NOT NULL,
  `tipodoccliente` varchar(20) NOT NULL,
  `nombrecliente` varchar(50) NOT NULL,
  `apellidocliente` varchar(50) NOT NULL,
  `direccioncliente` varchar(50) NOT NULL,
  `telefonocliente` varchar(20) NOT NULL,
  `estadocliente` varchar(20) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `numdoccliente`, `tipodoccliente`, `nombrecliente`, `apellidocliente`, `direccioncliente`, `telefonocliente`, `estadocliente`, `idusuario`) VALUES
(1, '1234567890', 'CC', 'luis', 'molina', 'Calle A #123', '555-123-4567', 'activo', 2),
(2, '9876543210', 'CC', 'juan', 'martinez', 'Avenida B #456', '555-987-6543', 'activo', 2),
(3, '3103124506', 'TI', 'Milito', 'miamor', 'bajoelmar', '20938437', 'pasivo', 2),
(4, '6789012345', 'CC', 'diana', 'rojas', 'Avenida D #1011', '555-876-5432', 'activo', 2),
(5, '9876543210', 'CC', 'alberto', 'gutierrez', 'Calle E #1213', '555-345-6789', 'activo', 2),
(6, '2468135790', 'CC', 'clara', 'martinez', 'Calle F #567', '555-567-8901', 'activo', 2),
(7, '1357924680', 'CC', 'javier', 'lopez', 'Avenida G #890', '555-890-1234', 'activo', 2),
(8, '8642097531', 'CC', 'martha', 'perez', 'Calle H #234', '555-234-5678', 'activo', 2),
(9, '9753184206', 'CC', 'sergio', 'ramos', 'Avenida I #567', '555-567-2345', 'activo', 2),
(10, '3216549870', 'CC', 'lucia', 'molina', 'Calle J #890', '555-890-5678', 'activo', 2),
(11, '7890321654', 'CC', 'eduardo', 'garcia', 'Avenida K #123', '555-123-8901', 'activo', 2),
(12, '6549870321', 'CC', 'ana', 'santos', 'Calle L #456', '555-456-2345', 'activo', 2),
(13, '7894561230', 'CC', 'oscar', 'torres', 'Calle M #123', '555-123-8901', 'activo', 2),
(14, '6543219870', 'CC', 'isabel', 'gutierrez', 'Avenida N #456', '555-456-2345', 'activo', 2),
(15, '6543219870', 'CC', 'manuel', 'santos', 'Avenida N #456', '555-456-2345', 'activo', 2),
(16, '9517538024', 'CC', 'carla', 'perez', 'Calle O #567', '555-567-8901', 'activo', 2),
(17, '7531598620', 'CC', 'pablo', 'ramos', 'Avenida P #890', '555-890-1234', 'activo', 2),
(18, '3698527410', 'CC', 'lucia', 'torres', 'Calle Q #123', '555-123-8901', 'activo', 2),
(19, '2587413690', 'CC', 'andres', 'lopez', 'Avenida R #456', '555-456-2345', 'activo', 2),
(20, '1473698520', 'CC', 'marta', 'garcia', 'Calle S #567', '555-567-8901', 'activo', 2),
(21, '9876543210', 'CC', 'lucas', 'martinez', 'Avenida T #890', '555-890-1234', 'activo', 2),
(22, '1234567890', 'CC', 'jose', 'gomez', 'Calle U #123', '555-123-8901', 'activo', 2),
(23, '4567891230', 'CC', 'elena', 'silva', 'Avenida V #456', '555-456-2345', 'activo', 2),
(24, '7890123456', 'CC', 'veronica', 'martinez', 'Calle W #567', '555-567-8901', 'inactivo', 2),
(25, '2468013579', 'CC', 'ricardo', 'gonzalez', 'Calle X #123', '555-123-5678', 'inactivo', 2),
(28, '9876543', 'TI', 'mamishula', 'bronx', '12345678', '98653', 'activo', 2),
(29, '9876543', 'TI', 'mamishula', 'bronx', '12345678', '98653', 'activo', 2),
(30, '12345678', 'CC', 'magalyta', 'Lozano', 'Calle 123', '3052525001', 'activo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL,
  `numdocempleado` varchar(15) NOT NULL,
  `tipodocempleado` varchar(20) NOT NULL,
  `nombreempleado` varchar(50) NOT NULL,
  `apellidoempleado` varchar(50) NOT NULL,
  `direccionempleado` varchar(50) NOT NULL,
  `telefonoempleado` varchar(20) NOT NULL,
  `estadoempleado` varchar(20) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idempleado`, `numdocempleado`, `tipodocempleado`, `nombreempleado`, `apellidoempleado`, `direccionempleado`, `telefonoempleado`, `estadoempleado`, `idusuario`) VALUES
(1, '1234567890', 'CC', 'juan', 'perez', 'Calle A #123', '555-123-4567', 'activo', 1),
(2, '9876543210', 'CC', 'maria', 'gonzales', 'Avenida B #456', '555-987-6543', 'activo', 1),
(3, '98765', 'CC', 'te mete una Y', 'q no es yeye', 'mi nombre es Yasuri', '9876543', 'inactivo', 1),
(4, '6789012345', 'CC', 'laura', 'martinez', 'Avenida D #1011', '555-876-5432', 'activo', 1),
(5, '9876543210', 'CC', 'carlos', 'sanchez', 'Calle E #1213', '555-345-6789', 'activo', 1),
(6, '1357924680', 'CC', 'ana', 'rodriguez', 'Calle F #567', '555-678-9012', 'activo', 1),
(7, '8642097531', 'CC', 'sergio', 'mendoza', 'Avenida G #890', '555-123-4567', 'activo', 1),
(8, '2468013579', 'CC', 'luis', 'gutierrez', 'Calle H #234', '555-987-6543', 'activo', 1),
(9, '9753184206', 'CC', 'claudia', 'fernandez', 'Avenida I #567', '555-234-5678', 'activo', 1),
(10, '3216549870', 'CC', 'david', 'ortiz', 'Calle J #890', '555-876-5432', 'activo', 1),
(11, '7890321654', 'CC', 'carlos', 'smith', 'Avenida K #123', '555-345-6789', 'activo', 1),
(12, '6549870321', 'CC', 'laura', 'marin', 'Calle L #456', '555-678-9012', 'activo', 1),
(13, '1472583690', 'CC', 'natalia', 'rodriguez', 'Avenida M #789', '555-123-4567', 'activo', 1),
(14, '3698521470', 'CC', 'andrea', 'diaz', 'Calle N #1011', '555-987-6543', 'activo', 1),
(15, '2583691470', 'CC', 'luan', 'sanchez', 'Avenida O #1213', '555-234-5678', 'inactivo', 1),
(16, '1029384756', 'CC', 'roberto', 'martinez', 'Calle P #567', '555-567-1234', 'inactivo', 1),
(17, '5768493021', 'CC', 'jose', 'ramirez', 'Avenida Q #890', '555-890-5678', 'activo', 1),
(18, '3147258690', 'CC', 'sandra', 'garcia', 'Calle R #234', '555-234-8901', 'activo', 1),
(19, '9081726354', 'CC', 'fernando', 'gomez', 'Avenida S #567', '555-567-2345', 'activo', 1),
(20, '6247381950', 'CC', 'amanda', 'torres', 'Calle T #890', '555-890-1234', 'activo', 1),
(21, '2536478901', 'CC', 'miguel', 'gonzales', 'Avenida U #123', '555-123-5678', 'activo', 1),
(22, '7192836450', 'CC', 'lucia', 'ramirez', 'Calle V #456', '555-456-8901', 'activo', 1),
(23, '8374651920', 'CC', 'pablo', 'sanchez', 'Avenida W #789', '555-789-2345', 'activo', 1),
(24, '4061829375', 'CC', 'raul', 'diaz', 'Calle X #1011', '555-1011-5678', 'activo', 1),
(25, '8642097531', 'CC', 'oscar', 'gomez', 'Calle BB #234', '555-234-9012', 'activo', 1),
(26, '1357924680', 'CC', 'mariana', 'rodriguez', 'Avenida AA #901', '555-901-5678', 'activo', 1),
(27, '3698521470', 'CC', 'andrea', 'diaz', 'Calle N #1011', '555-987-6563', 'inactivo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `descripcionrol` varchar(30) NOT NULL,
  `estadorol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `descripcionrol`, `estadorol`) VALUES
(1, 'empleado', 'activo'),
(2, 'cliente', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL,
  `descripcionservicio` varchar(50) NOT NULL,
  `estadoservicio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idservicio`, `descripcionservicio`, `estadoservicio`) VALUES
(1, 'vestidos', 'activo'),
(2, 'Bolsos', 'activo'),
(3, 'Collares', 'activo'),
(4, 'Anillos', 'activo'),
(5, 'Regalo especial', 'activo'),
(6, 'Tratamiento de uñas de gel', 'inactivo'),
(7, 'Maquillaje para ocasiones especiales', 'inactivo'),
(8, 'Tinte y permanente de pestañas', 'inactivo'),
(9, 'Exfoliación corporal', 'inactivo'),
(10, 'Maquillaje para ocasiones toda ocasion', 'activo'),
(12, 'velas', 'activo'),
(13, '1', '22222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `correousuario` varchar(50) NOT NULL,
  `passwordusuario` varchar(20) NOT NULL,
  `estadousuario` varchar(20) NOT NULL,
  `idrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `correousuario`, `passwordusuario`, `estadousuario`, `idrol`) VALUES
(1, 'juan.perez@gmail.com', 'claveSegura123', 'activo', 1),
(2, 'maria.gonzalez@hotmail.com', 'contraseñaAleatoria', 'activo', 1),
(3, 'pedro.lopez@yahoo.com', 'miClave567', 'activo', 1),
(4, 'laura.martinez@gmail.com', 'abcdef123', 'activo', 1),
(5, 'carlos.sanchez@hotmail.com', 'contraseña456', 'activo', 1),
(6, 'ana.rodriguez@gmail.com', 'clave1234', 'activo', 1),
(7, 'sergio.mendoza@hotmail.com', 'contraseñasegura', 'activo', 1),
(8, 'luis.gutierrez@yahoo.com', 'miclave5678', 'activo', 1),
(9, 'claudia.fernandez@gmail.com', 'abcdefg123', 'activo', 1),
(10, 'david.ortiz@hotmail.com', 'contraseña789', 'activo', 1),
(11, 'carlos_smith@hotmail.com', 'mysecurepwd789', 'activo', 1),
(12, 'laura_marin@yahoo.com', 'strongp@ss2022', 'activo', 1),
(13, 'natalia_rodriguez@gmail.com', 'myp@ss!2023', 'activo', 1),
(14, 'andrea_diaz@yahoo.com', 'p@ssw0rd!789', 'inactivo', 1),
(15, 'luan_sanchez@yahoo.com', 'pass123456', 'inactivo', 1),
(16, 'roberto_martinez@gmail.com', 'myp@ssw0rd123', 'activo', 1),
(17, 'jose_ramirez@yahoo.com', 'p@ssw0rd2023', 'activo', 1),
(18, 'sandra_garcia@hotmail.com', 'strongpassword456', 'activo', 1),
(19, 'fernando_gomez@gmail.com', 'secure12345', 'activo', 1),
(20, 'amanda_torres@hotmail.com', 'password!2023', 'activo', 1),
(21, 'miguel_gonzalez@gmail.com', 'p@ss1234', 'activo', 1),
(22, 'lucia_ramirez@yahoo.com', 'securepwd567', 'inactivo', 1),
(23, 'pablo_sanchez@yahoo.com', 'p@ssw0rd567', 'activo', 1),
(24, 'raul_diaz@gmail.com', 'secure123!@#', 'activo', 1),
(25, 'oscar_gomez@hotmail.com', 'strongpass!@#', 'inactivo', 1),
(26, 'mariana_rodriguez@gmail.com', 'mysecurepwd', 'inactivo', 1),
(27, 'luis_molina@hotmail.com', 'supersecret123', 'activo', 2),
(28, 'juan_martinez@gmail.com', 'strongp@ss2022', 'activo', 2),
(29, 'roberto_gonzalez@yahoo.com', 'newpass!2023', 'activo', 2),
(30, 'diana_rojas@gmail.com', 'strongpwd123', 'activo', 2),
(31, 'alberto_gutierrez@yahoo.com', 'securepass789', 'activo', 2),
(32, 'clara_martinez@hotmail.com', 'randomp@ss567', 'inactivo', 2),
(33, 'javier_lopez@gmail.com', 'bestpassword456', 'activo', 2),
(34, 'martha_perez@yahoo.com', 'superpwd!@#', 'activo', 2),
(35, 'sergio_ramos@hotmail.com', 'safepass2023', 'activo', 2),
(36, 'lucia_molina@gmail.com', 'newpass1234', 'activo', 2),
(37, 'eduardo_garcia@yahoo.com', 'secretpwd!2023', 'activo', 2),
(38, 'ana_santos@hotmail.com', 'uniquep@ss567', 'activo', 2),
(39, 'oscar_torres@gmail.com', 'random123!@#', 'activo', 2),
(40, 'isabel_gutierrez@gmail.com', 'secretpass2026', 'activo', 2),
(41, 'manuel_santos@hotmail.com', 'safepwd789', 'activo', 2),
(42, 'carla_perez@yahoo.com', 'random!@#456', 'inactivo', 2),
(43, 'pablo_ramos@gmail.com', 'newpassword123', 'activo', 2),
(44, 'lucia_torres@hotmail.com', 'uniquepass!2025', 'activo', 2),
(45, 'andres_lopez@yahoo.com', 'superpwd123', 'activo', 2),
(46, 'marta_garcia@gmail.com', 'randomp@ss!2024', 'activo', 2),
(47, 'lucas_martinez@hotmail.com', 'strongp@ss2023', 'inactivo', 2),
(48, 'jose_gomez@yahoo.com', 'bestp@ss456', 'inactivo', 2),
(49, 'elena_silva@gmail.com', 'securepwd567', 'activo', 2),
(50, 'veronica_martinez@yahoo.com', 'bestp@ss456', 'activo', 2),
(51, 'ricardo_gonzalez@hotmail.com', 'strongp@ss2023', 'activo', 2),
(52, 'felipe_rodriguez@gmail.com', 'securepwd789', 'activo', 2),
(53, 'pablo_ramos@gmail.com', 'chaseatalntic1', 'activo', 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistaempleadosyservicios`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vistaempleadosyservicios` (
`idempleado` int(11)
,`nombreempleado` varchar(50)
,`apellidoempleado` varchar(50)
,`descripcionservicio` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vistaempleadosyservicios`
--
DROP TABLE IF EXISTS `vistaempleadosyservicios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistaempleadosyservicios`  AS SELECT `e`.`idempleado` AS `idempleado`, `e`.`nombreempleado` AS `nombreempleado`, `e`.`apellidoempleado` AS `apellidoempleado`, `s`.`descripcionservicio` AS `descripcionservicio` FROM ((`empleado` `e` join `cita` `c` on(`e`.`idempleado` = `c`.`idempleado`)) join `servicio` `s` on(`c`.`idservicio` = `s`.`idservicio`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idcita`),
  ADD KEY `idempleado` (`idempleado`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `idservicio` (`idservicio`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idempleado`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idservicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`idservicio`) REFERENCES `servicio` (`idservicio`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
