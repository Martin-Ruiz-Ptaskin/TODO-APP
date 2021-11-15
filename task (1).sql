-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2021 a las 21:55:22
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `task`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realizado`
--

CREATE TABLE `realizado` (
  `id` int(15) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `fecha` varchar(225) NOT NULL,
  `notas` longblob NOT NULL,
  `estado` varchar(225) NOT NULL,
  `fecha_in` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `realizado`
--

INSERT INTO `realizado` (`id`, `name`, `description`, `fecha`, `notas`, `estado`, `fecha_in`) VALUES
(2, 'APPSADE-21687', 'tramitacion infantil', '6, 9, 2021', '', '', ''),
(3, 'APPSADE-10795', 'Diario', '6, 9, 2021', '', '', ''),
(4, 'APPSADE-21803', 'EX-2021-25727681- -GCABA-DGROC Registro de Plano de Obra Civil\nTAD', '6, 9, 2021', '', '', ''),
(5, 'APPSADE-21789', 'PRD Error al abrir registro', '6, 9, 2021', '', '', ''),
(6, 'APPSADE-21789', 'RLM - PRD Error al abrir registro  \nJSON', '6, 9, 2021', '', '', ''),
(7, 'APSADE_21609', 'RLM', '7, 9, 2021', '', '', ''),
(8, 'APPSADE-21774', 'El ciudadano CUIT 20103904367, informa que no visualiza la BUI para abonar  para el EX-2021-23848320 -GCABA-DGROC (adjunto captura de pantalla) . verificamos en SADE y solo esta cargada la caratula y estado de Iniciación.', '7, 9, 2021', '', '', ''),
(9, 'APPSADE-21834', 'RCE PRD - No se visualiza registro', '7, 9, 2021', '', '', ''),
(10, 'APPSADE-21802', 'EXs en Autorizar Factura // C41 firmado y el expediente no avanza \nLOyS', '7, 9, 2021', '', '', ''),
(11, 'APPSADE-21820', 'EX-2020-15575580-GCABA- -DGROC // PermisoObraMenor0319A // Error al subsanar\nTAD', '7, 9, 2021', '', '', ''),
(20, 'APPSADE-21561', 'Cambio de sigla DGDAI a DGAII - Plan VIE - PSOC PRD', '8, 9, 2021', '', 'resuelto', ''),
(22, 'APPSADE-21790', 'No avanza de etapa EX-2021-02321858- -GCABA-DGAYDRH', '9, 9, 2021', '', 'Nosotros', ''),
(23, 'APPSADE-21728', 'No aparece repartición en menú de IFDJD', '9, 9, 2021', '', 'resuelto', ''),
(24, 'APPSADE-10795', 'DIARIO\nhttps://noc-mesa.buenosaires.gob.ar/WorkOrder.do?woMode=viewWO&woID=592686', '9, 9, 2021', '', 'Nosotros', ''),
(25, 'APPSADE-21515 ', 'TAD - PRD ERROR EN EL FORMULARIO', '9, 9, 2021', '', 'Nosotros', ''),
(26, 'APPSADE-21790', 'No avanza de etapa EX-2021-02321858- -GCABA-DGAYDRH\nLOYS', '9, 9, 2021', '', 'otros', ''),
(27, 'APPSADE-21895', 'Cambio de sigla DGNYA a DGDIYA - Plan ADL - PSOC PRD\nPSOC', '10, 9, 2021', '', 'resuelto', ''),
(28, 'APPSADE-21946', 'Cambio de sigla DGCPOR a DGPOLA y DGSSZO a DGABCO - Plan RPM - PSOC PRD', '13, 9, 2021', '', 'resuelto', ''),
(29, 'APPSADE-21820', 'EX-2020-15575580-GCABA- -DGROC // PermisoObraMenor0319A // Error al subsanar', '14, 9, 2021', '', 'Nosotros', ''),
(30, 'APPSADE-21947', 'Cambio de sigla DGCPOR a DGPOLA y DGSSZO a DGABCO - Plan EET - PSOC PRD', '15, 9, 2021', '', 'resuelto', ''),
(31, 'APPSADE-21919', 'CP no volvió a elegibilidad luego de recibir OP - PSOC PRD', '15, 9, 2021', '', 'resuelto', ''),
(32, 'APPSADE-22027', '637 no volvió a elegibilidad luego de recibir OP - PSOC PRD', '16, 9, 2021', '', 'Nosotros', ''),
(33, 'APPSADE-10795', 'https://noc-mesa.buenosaires.gob.ar/WorkOrder.do?woMode=viewWO&woID=596946', '16, 9, 2021', '', 'Nosotros', ''),
(34, 'APPSADE-21957', 'Cambio de sigla DGCPOR a DGPOLA y DGSSZO a DGABCO - Plan TS- PSOC PRD', '16, 9, 2021', '', 'Nosotros', ''),
(37, 'APPSADE-10795', 'Diario', '16, 9, 2021', '', 'resuelto', '16, 9, 2021');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task`
--

CREATE TABLE `task` (
  `id` int(15) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `notas` longtext NOT NULL,
  `estado` varchar(225) NOT NULL,
  `fecha` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `task`
--

INSERT INTO `task` (`id`, `name`, `description`, `date`, `notas`, `estado`, `fecha`) VALUES
(35, 'APPSADE-21861', 'RLM - PRD Faltante de datos', '0000-00-00', '', 'de-ayer', ''),
(41, 'APPSADE-21955', 'Cambio de sigla DGCPOR a DGPOLA y DGSSZO a DGABCO - Plan CP - PSOC PRD', '0000-00-00', '', 'Nosotros', ''),
(42, 'APPSADE-21820', 'EX-2020-15575580-GCABA- -DGROC // PermisoObraMenor0319A // Error al subsanar\n\nTAD', '0000-00-00', '', 'Nosotros', ''),
(51, 'APPSADE-22023', 'RLM - PRD Error de unicidad', '', '', 'Nosotros', '16, 9, 2021'),
(52, 'APPSADE-22032', 'Error al tramitar EX-2019-22552317- -GCABA-DGAYDRH Control de Documentación e Incompatibilidades', '', '', 'Nosotros', '16, 9, 2021');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `realizado`
--
ALTER TABLE `realizado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `realizado`
--
ALTER TABLE `realizado`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `task`
--
ALTER TABLE `task`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
