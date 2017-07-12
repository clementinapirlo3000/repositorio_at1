-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-01-2017 a las 11:18:41
-- Versión del servidor: 5.7.16-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sis_cif`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scf_cnt_02`
--

CREATE TABLE `scf_cnt_02` (
  `scfcnt_id` int(11) NOT NULL,
  `scfcnt_cr` longtext NOT NULL,
  `scfcnt_us` longtext NOT NULL,
  `scfcnt_ct` longtext NOT NULL,
  `scfcnt_dsc` longtext NOT NULL,
  `scfcnt_ob` longtext NOT NULL,
  `scfcnt_st` int(1) NOT NULL,
  `fk_scfus_id` int(11) NOT NULL,
  `fk_scfprc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scf_lg_03`
--

CREATE TABLE `scf_lg_03` (
  `scflg_id` int(11) NOT NULL,
  `scflg_dn` longtext NOT NULL,
  `scflg_dv` longtext NOT NULL,
  `scflg_fc` varchar(60) NOT NULL,
  `scflg_dscp` longtext NOT NULL,
  `scflg_evnt` char(10) NOT NULL,
  `fk_scfus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scf_prc_04`
--

CREATE TABLE `scf_prc_04` (
  `scfprc_id` int(11) NOT NULL,
  `scfprc_ds` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scf_us_01`
--

CREATE TABLE `scf_us_01` (
  `scfus_id` int(11) NOT NULL,
  `scfus_nom` varchar(80) NOT NULL,
  `scfus_ape` varchar(80) NOT NULL,
  `scfus_nac` char(10) NOT NULL,
  `scfus_fec` date NOT NULL,
  `scfus_em` varchar(100) NOT NULL,
  `scfus_ctlf` int(4) NOT NULL,
  `scfus_tlf` int(7) NOT NULL,
  `scfus_nus` varchar(50) NOT NULL,
  `scfus_clci` longtext NOT NULL,
  `scfus_cllg` longtext NOT NULL,
  `scfus_cd` varchar(10) NOT NULL,
  `scfus_act` varchar(40) NOT NULL,
  `scfus_st` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `scf_cnt_02`
--
ALTER TABLE `scf_cnt_02`
  ADD PRIMARY KEY (`scfcnt_id`),
  ADD KEY `fk_scfus_id` (`fk_scfus_id`),
  ADD KEY `fk_scfprc_id` (`fk_scfprc_id`);

--
-- Indices de la tabla `scf_lg_03`
--
ALTER TABLE `scf_lg_03`
  ADD PRIMARY KEY (`scflg_id`),
  ADD KEY `fk_scfus_id` (`fk_scfus_id`);

--
-- Indices de la tabla `scf_prc_04`
--
ALTER TABLE `scf_prc_04`
  ADD PRIMARY KEY (`scfprc_id`);

--
-- Indices de la tabla `scf_us_01`
--
ALTER TABLE `scf_us_01`
  ADD PRIMARY KEY (`scfus_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `scf_cnt_02`
--
ALTER TABLE `scf_cnt_02`
  MODIFY `scfcnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `scf_lg_03`
--
ALTER TABLE `scf_lg_03`
  MODIFY `scflg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `scf_prc_04`
--
ALTER TABLE `scf_prc_04`
  MODIFY `scfprc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `scf_us_01`
--
ALTER TABLE `scf_us_01`
  MODIFY `scfus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `scf_cnt_02`
--
ALTER TABLE `scf_cnt_02`
  ADD CONSTRAINT `scf_cnt_02_ibfk_1` FOREIGN KEY (`fk_scfprc_id`) REFERENCES `scf_prc_04` (`scfprc_id`),
  ADD CONSTRAINT `scf_cnt_02_scf_us_01_fk_scfus_id` FOREIGN KEY (`fk_scfus_id`) REFERENCES `scf_us_01` (`scfus_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `scf_lg_03`
--
ALTER TABLE `scf_lg_03`
  ADD CONSTRAINT `scf_lg_03_scf_us_01_fk_scfus_id` FOREIGN KEY (`fk_scfus_id`) REFERENCES `scf_us_01` (`scfus_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
