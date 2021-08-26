-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 03, 2021 at 12:03 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motordebusqueda`
--

-- --------------------------------------------------------

--
-- Table structure for table `docentes`
--

DROP TABLE IF EXISTS `docentes`;
CREATE TABLE IF NOT EXISTS `docentes` (
  `Documento` varchar(20) NOT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `Facultad` varchar(50) DEFAULT NULL,
  `Nivel_formacion` varchar(50) DEFAULT NULL,
  `Titulo` varchar(70) DEFAULT NULL,
  `Grupo_investigacion` varchar(15) DEFAULT NULL,
  `Institucion` varchar(50) DEFAULT NULL,
  `CvLAC` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`Documento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docentes`
--

INSERT INTO `docentes` (`Documento`, `Nombre`, `Facultad`, `Nivel_formacion`, `Titulo`, `Grupo_investigacion`, `Institucion`, `CvLAC`) VALUES
('259063', 'VESNA SRDANOVIC', 'Ingenieria', 'MAESTRiA O MAGISTER', 'Magister en Ingenieria con enfasis en Telecomunicaciones', 'GICEI', 'UNIVERSIDAD PONTIFICIA BOLIVARIANA', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001421561'),
('414211', 'GARY SCOTT VERNIER', 'Ingenieria', 'MAESTRiA O MAGISTER', 'No Asignado', 'GICEI', 'COLEGIO MAYOR DE ANTIOQUIA', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0000094076'),
('3351779', 'LUIS JORGE GOMEZ GALLON', 'Ingenieria', 'MAESTRiA O MAGISTER', 'MAGISTER EN ADMINISTACIÓN DE EMPRESAS', 'N/A', 'UNIVERSIDAD EAFIT-', 'https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0000375799');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
