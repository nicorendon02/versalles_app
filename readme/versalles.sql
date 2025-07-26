-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2025 at 01:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `versalles`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplicaciones`
--

CREATE TABLE `aplicaciones` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `profesion` varchar(100) DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `perfil` text DEFAULT NULL,
  `tarjeta_profesional` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `trabaja_icbf` tinyint(1) DEFAULT NULL,
  `tiempo_grado` varchar(100) DEFAULT NULL,
  `firma_digital` varchar(255) DEFAULT NULL,
  `fecha_aplicacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificados_antecedentes`
--

CREATE TABLE `certificados_antecedentes` (
  `id` int(11) NOT NULL,
  `id_aplicacion` int(11) NOT NULL,
  `certificado_judicial` varchar(255) DEFAULT NULL,
  `certificado_fiscal` varchar(255) DEFAULT NULL,
  `certificado_disciplinario` varchar(255) DEFAULT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `id_aplicacion` int(11) DEFAULT NULL,
  `nombre_evento` varchar(255) DEFAULT NULL,
  `organizacion` varchar(255) DEFAULT NULL,
  `fecha_evento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experiencia_academica`
--

CREATE TABLE `experiencia_academica` (
  `id` int(11) NOT NULL,
  `id_aplicacion` int(11) DEFAULT NULL,
  `nombre_experiencia` varchar(255) DEFAULT NULL,
  `institucion` varchar(255) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `archivo_certificado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experiencia_icbf`
--

CREATE TABLE `experiencia_icbf` (
  `id` int(11) NOT NULL,
  `id_aplicacion` int(11) NOT NULL,
  `nombre_empresa` varchar(255) DEFAULT NULL,
  `nombre_programa` varchar(255) DEFAULT NULL,
  `funciones_generales` text DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `certificado_pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experiencia_laboral`
--

CREATE TABLE `experiencia_laboral` (
  `id` int(11) NOT NULL,
  `id_aplicacion` int(11) DEFAULT NULL,
  `empresa` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `jefe_inmediato` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `archivo_certificado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formacion_academica`
--

CREATE TABLE `formacion_academica` (
  `id` int(11) NOT NULL,
  `id_aplicacion` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `institucion` varchar(255) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `archivo_certificado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formacion_profesional`
--

CREATE TABLE `formacion_profesional` (
  `id` int(11) NOT NULL,
  `id_aplicacion` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `institucion` varchar(255) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `archivo_certificado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `observaciones`
--

CREATE TABLE `observaciones` (
  `id` int(11) NOT NULL,
  `id_aplicacion` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referencias`
--

CREATE TABLE `referencias` (
  `id` int(11) NOT NULL,
  `id_aplicacion` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `rol`) VALUES
(1, 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplicaciones`
--
ALTER TABLE `aplicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificados_antecedentes`
--
ALTER TABLE `certificados_antecedentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aplicacion` (`id_aplicacion`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aplicacion` (`id_aplicacion`);

--
-- Indexes for table `experiencia_academica`
--
ALTER TABLE `experiencia_academica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aplicacion` (`id_aplicacion`);

--
-- Indexes for table `experiencia_icbf`
--
ALTER TABLE `experiencia_icbf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aplicacion` (`id_aplicacion`);

--
-- Indexes for table `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aplicacion` (`id_aplicacion`);

--
-- Indexes for table `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aplicacion` (`id_aplicacion`);

--
-- Indexes for table `formacion_profesional`
--
ALTER TABLE `formacion_profesional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aplicacion` (`id_aplicacion`);

--
-- Indexes for table `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aplicacion` (`id_aplicacion`);

--
-- Indexes for table `referencias`
--
ALTER TABLE `referencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aplicacion` (`id_aplicacion`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplicaciones`
--
ALTER TABLE `aplicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `certificados_antecedentes`
--
ALTER TABLE `certificados_antecedentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `experiencia_academica`
--
ALTER TABLE `experiencia_academica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `experiencia_icbf`
--
ALTER TABLE `experiencia_icbf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `formacion_academica`
--
ALTER TABLE `formacion_academica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `formacion_profesional`
--
ALTER TABLE `formacion_profesional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `referencias`
--
ALTER TABLE `referencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificados_antecedentes`
--
ALTER TABLE `certificados_antecedentes`
  ADD CONSTRAINT `certificados_antecedentes_ibfk_1` FOREIGN KEY (`id_aplicacion`) REFERENCES `aplicaciones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_aplicacion`) REFERENCES `aplicaciones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `experiencia_academica`
--
ALTER TABLE `experiencia_academica`
  ADD CONSTRAINT `experiencia_academica_ibfk_1` FOREIGN KEY (`id_aplicacion`) REFERENCES `aplicaciones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `experiencia_icbf`
--
ALTER TABLE `experiencia_icbf`
  ADD CONSTRAINT `experiencia_icbf_ibfk_1` FOREIGN KEY (`id_aplicacion`) REFERENCES `aplicaciones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  ADD CONSTRAINT `experiencia_laboral_ibfk_1` FOREIGN KEY (`id_aplicacion`) REFERENCES `aplicaciones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `formacion_academica`
--
ALTER TABLE `formacion_academica`
  ADD CONSTRAINT `formacion_academica_ibfk_1` FOREIGN KEY (`id_aplicacion`) REFERENCES `aplicaciones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `formacion_profesional`
--
ALTER TABLE `formacion_profesional`
  ADD CONSTRAINT `formacion_profesional_ibfk_1` FOREIGN KEY (`id_aplicacion`) REFERENCES `aplicaciones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `observaciones_ibfk_1` FOREIGN KEY (`id_aplicacion`) REFERENCES `aplicaciones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `referencias`
--
ALTER TABLE `referencias`
  ADD CONSTRAINT `referencias_ibfk_1` FOREIGN KEY (`id_aplicacion`) REFERENCES `aplicaciones` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
