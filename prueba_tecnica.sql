-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2024 a las 05:48:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_tecnica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `relevance` enum('alta','media','baja') NOT NULL,
  `approval_date` date NOT NULL,
  `upload_date` date NOT NULL,
  `pdf_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documents`
--

INSERT INTO `documents` (`id`, `name`, `description`, `relevance`, `approval_date`, `upload_date`, `pdf_path`, `created_at`, `updated_at`) VALUES
(1, 'Política de Privacidad', 'Documento que describe la política de privacidad de la empresa.', 'alta', '2024-01-10', '2024-01-15', 'documentos_corporativos/1 (1).pdf', '2024-01-15 09:30:00', '2024-01-15 09:30:00'),
(2, 'Reglamento Interno', 'Reglamento que regula el comportamiento de los empleados.', 'media', '2024-02-05', '2024-02-10', 'documentos_corporativos/1 (2).pdf', '2024-02-10 10:45:00', '2024-02-10 10:45:00'),
(3, 'Manual de Seguridad', 'Instrucciones de seguridad para evitar accidentes laborales.', 'alta', '2024-02-15', '2024-02-20', 'documentos_corporativos/1 (3).pdf', '2024-02-20 11:50:00', '2024-02-20 11:50:00'),
(4, 'Código Ético', 'Código que describe los principios éticos de la empresa.', 'alta', '2024-03-01', '2024-03-02', 'documentos_corporativos/1 (4).pdf', '2024-03-02 13:00:00', '2024-03-02 13:00:00'),
(5, 'Plan de Negocios', 'Proyecciones y objetivos estratégicos de la empresa.', 'media', '2024-03-10', '2024-03-15', 'documentos_corporativos/1 (5).pdf', '2024-03-15 14:30:00', '2024-03-15 14:30:00'),
(6, 'Memoria Anual', 'Informe financiero y operativo del año anterior.', 'alta', '2024-04-01', '2024-04-05', 'documentos_corporativos/1 (6).pdf', '2024-04-05 14:45:00', '2024-04-05 14:45:00'),
(7, 'Acta de Junta Directiva', 'Minuta de la reunión de la junta directiva.', 'baja', '2024-04-10', '2024-04-15', 'documentos_corporativos/1 (7).pdf', '2024-04-15 15:00:00', '2024-04-15 15:00:00'),
(8, 'Protocolo de Seguridad', 'Protocolo de respuesta ante incidentes de seguridad.', 'alta', '2024-05-01', '2024-05-05', 'documentos_corporativos/1 (8).pdf', '2024-05-05 16:15:00', '2024-05-05 16:15:00'),
(9, 'Informe Financiero', 'Estado financiero trimestral.', 'media', '2024-05-10', '2024-05-15', 'documentos_corporativos/1 (9).pdf', '2024-05-15 17:30:00', '2024-05-15 17:30:00'),
(10, 'Estatutos Sociales', 'Documento que define las normas de la empresa.', 'baja', '2024-06-01', '2024-06-05', 'documentos_corporativos/1 (10).pdf', '2024-06-05 18:45:00', '2024-06-05 18:45:00'),
(11, 'Política de Recursos Humanos', 'Guía para la gestión de los empleados.', 'media', '2024-06-10', '2024-06-15', 'documentos_corporativos/1 (11).pdf', '2024-06-15 08:00:00', '2024-06-15 08:00:00'),
(12, 'Manual de Convivencia', 'Normas de convivencia entre empleados.', 'baja', '2024-06-20', '2024-06-25', 'documentos_corporativos/1 (12).pdf', '2024-06-25 09:15:00', '2024-06-25 09:15:00'),
(13, 'Plan de Expansión', 'Estrategia para la expansión de la empresa.', 'alta', '2024-07-01', '2024-07-05', 'documentos_corporativos/1 (13).pdf', '2024-07-05 10:30:00', '2024-07-05 10:30:00'),
(14, 'Protocolo de Emergencias', 'Protocolo de respuesta a emergencias.', 'alta', '2024-07-10', '2024-07-15', 'documentos_corporativos/1 (14).pdf', '2024-07-15 11:45:00', '2024-07-15 11:45:00'),
(15, 'Informe de Sustentabilidad', 'Reporte de sustentabilidad anual.', 'media', '2024-07-20', '2024-07-25', 'documentos_corporativos/1 (15).pdf', '2024-07-25 12:00:00', '2024-07-25 12:00:00'),
(16, 'Manual de Proveedores', 'Guía para la gestión de proveedores.', 'baja', '2024-08-01', '2024-08-05', 'documentos_corporativos/1 (16).pdf', '2024-08-05 13:15:00', '2024-08-05 13:15:00'),
(17, 'Plan de Contingencia', 'Plan de acción ante contingencias.', 'alta', '2024-08-10', '2024-08-15', 'documentos_corporativos/1 (17).pdf', '2024-08-15 14:30:00', '2024-08-15 14:30:00'),
(18, 'Política de Inclusión', 'Documento sobre la política de inclusión.', 'media', '2024-08-20', '2024-08-25', 'documentos_corporativos/1 (18).pdf', '2024-08-25 15:45:00', '2024-08-25 15:45:00'),
(19, 'Acta de Asamblea', 'Minuta de la última asamblea general.', 'baja', '2024-09-01', '2024-09-05', 'documentos_corporativos/1 (19).pdf', '2024-09-05 16:00:00', '2024-09-05 16:00:00'),
(20, 'Protocolo Ambiental', 'Guía de actuación ante impactos ambientales.', 'alta', '2024-09-10', '2024-09-15', 'documentos_corporativos/1 (20).pdf', '2024-09-15 17:15:00', '2024-09-15 17:15:00'),
(21, 'Manual de Operaciones', 'Guía operativa de los procesos internos.', 'media', '2024-09-20', '2024-09-25', 'documentos_corporativos/1 (21).pdf', '2024-09-25 18:30:00', '2024-09-25 18:30:00'),
(22, 'Política Anticorrupción', 'Documento sobre las prácticas anticorrupción.', 'alta', '2024-10-01', '2024-10-05', 'documentos_corporativos/1 (22).pdf', '2024-10-05 08:45:00', '2024-10-05 08:45:00'),
(23, 'Guía de Cumplimiento Normativo', 'Guía para el cumplimiento normativo de la empresa.', 'baja', '2024-10-10', '2024-10-15', 'documentos_corporativos/1 (23).pdf', '2024-10-15 09:00:00', '2024-10-15 09:00:00'),
(24, 'Informe de Auditoría', 'Resultado de la auditoría anual interna.', 'media', '2024-10-20', '2024-10-25', 'documentos_corporativos/1 (24).pdf', '2024-10-25 10:15:00', '2024-10-25 10:15:00'),
(25, 'Política de Retención de Talento', 'Documento sobre la retención de empleados clave.', 'alta', '2024-11-01', '2024-11-05', 'documentos_corporativos/1 (25).pdf', '2024-11-05 12:30:00', '2024-11-05 12:30:00'),
(26, 'Informe de Riesgos', 'Evaluación de riesgos corporativos.', 'media', '2024-11-10', '2024-11-15', 'documentos_corporativos/1 (26).pdf', '2024-11-15 13:45:00', '2024-11-15 13:45:00'),
(27, 'Guía de Buenas Prácticas', 'Guía de mejores prácticas empresariales.', 'baja', '2024-11-20', '2024-11-25', 'documentos_corporativos/1 (27).pdf', '2024-11-25 14:00:00', '2024-11-25 14:00:00'),
(28, 'Protocolo de Manejo de Crisis', 'Protocolo ante situaciones de crisis.', 'alta', '2024-12-01', '2024-12-05', 'documentos_corporativos/1 (28).pdf', '2024-12-05 15:15:00', '2024-12-05 15:15:00'),
(29, 'Informe de Responsabilidad Social', 'Reporte de responsabilidad social anual.', 'media', '2024-12-10', '2024-12-15', 'documentos_corporativos/1 (29).pdf', '2024-12-15 16:30:00', '2024-12-15 16:30:00'),
(30, 'Informe de Capacitación', 'Registro de las capacitaciones realizadas.', 'baja', '2024-12-20', '2024-12-25', 'documentos_corporativos/1 (30).pdf', '2024-12-25 17:45:00', '2024-12-25 17:45:00'),
(31, 'Manual de Salud y Seguridad', 'Guía de normas de seguridad en el trabajo.', 'alta', '2024-12-27', '2024-12-28', 'documentos_corporativos/1 (31).pdf', '2024-12-28 18:00:00', '2024-12-28 18:00:00'),
(32, 'Protocolo de Comunicación', 'Protocolo para la comunicación interna y externa.', 'media', '2024-12-29', '2024-12-30', 'documentos_corporativos/1 (32).pdf', '2024-12-30 19:15:00', '2024-12-30 19:15:00'),
(33, 'Informe de Clima Laboral', 'Resultado de la encuesta de clima laboral.', 'baja', '2024-12-31', '2024-12-31', 'documentos_corporativos/1 (33).pdf', '2024-12-31 20:30:00', '2024-12-31 20:30:00'),
(34, 'Plan de Marketing', 'Estrategia de marketing anual.', 'alta', '2024-01-04', '2024-01-05', 'documentos_corporativos/1 (34).pdf', '2024-01-05 09:00:00', '2024-01-05 09:00:00'),
(35, 'Protocolo de Ética Empresarial', 'Guía de comportamiento ético empresarial.', 'media', '2024-01-06', '2024-01-07', 'documentos_corporativos/1 (35).pdf', '2024-01-07 10:15:00', '2024-01-07 10:15:00'),
(36, 'Informe de Auditoría Externa', 'Resultado de la auditoría externa anual.', 'baja', '2024-01-08', '2024-01-09', 'documentos_corporativos/1 (36).pdf', '2024-01-09 11:30:00', '2024-01-09 11:30:00'),
(37, 'Plan de Mejora Continua', 'Estrategia para la mejora continua en la empresa.', 'alta', '2024-01-10', '2024-01-11', 'documentos_corporativos/1 (37).pdf', '2024-01-11 12:45:00', '2024-01-11 12:45:00'),
(38, 'Política de Diversidad e Inclusión', 'Documento sobre la diversidad e inclusión en la empresa.', 'media', '2024-01-12', '2024-01-13', 'documentos_corporativos/1 (38).pdf', '2024-01-13 13:00:00', '2024-01-13 13:00:00'),
(39, 'Informe de Riesgos Ambientales', 'Evaluación de riesgos ambientales para la empresa.', 'alta', '2024-01-14', '2024-01-15', 'documentos_corporativos/1 (39).pdf', '2024-01-15 14:15:00', '2024-01-15 14:15:00'),
(40, 'Protocolo de Uso de Redes Sociales', 'Guía para el uso de redes sociales corporativas.', 'baja', '2024-01-16', '2024-01-17', 'documentos_corporativos/1 (40).pdf', '2024-01-17 15:30:00', '2024-01-17 15:30:00'),
(41, 'Informe de Cumplimiento Normativo', 'Informe sobre el cumplimiento de las normativas legales.', 'media', '2024-01-18', '2024-01-19', 'documentos_corporativos/1 (41).pdf', '2024-01-19 16:45:00', '2024-01-19 16:45:00'),
(42, 'Plan Estratégico Corporativo', 'Plan estratégico para el crecimiento de la empresa en los próximos años.', 'alta', '2024-01-20', '2024-01-21', 'documentos_corporativos/1 (42).pdf', '2024-01-21 17:00:00', '2024-01-21 17:00:00'),
(43, 'Política de Innovación', 'Documento sobre la promoción de la innovación en la empresa.', 'media', '2024-01-22', '2024-01-23', 'documentos_corporativos/1 (43).pdf', '2024-01-23 18:15:00', '2024-01-23 18:15:00'),
(44, 'Manual de Calidad', 'Guía para el mantenimiento de la calidad en los procesos.', 'baja', '2024-01-24', '2024-01-25', 'documentos_corporativos/1 (44).pdf', '2024-01-25 19:30:00', '2024-01-25 19:30:00'),
(45, 'Política de Comunicación', 'Documento que describe las políticas de comunicación de la empresa.', 'alta', '2024-01-26', '2024-01-27', 'documentos_corporativos/1 (45).pdf', '2024-01-27 20:45:00', '2024-01-27 20:45:00'),
(46, 'Protocolo de Capacitación', 'Guía para la gestión de programas de capacitación.', 'media', '2024-01-28', '2024-01-29', 'documentos_corporativos/1 (46).pdf', '2024-01-29 09:00:00', '2024-01-29 09:00:00'),
(47, 'Informe de Progreso', 'Reporte sobre el avance de los proyectos en curso.', 'baja', '2024-01-30', '2024-01-31', 'documentos_corporativos/1 (47).pdf', '2024-01-31 10:15:00', '2024-01-31 10:15:00'),
(48, 'Protocolo de Bienestar Laboral', 'Documento sobre el bienestar y la salud de los empleados.', 'alta', '2024-02-01', '2024-02-02', 'documentos_corporativos/1 (48).pdf', '2024-02-02 11:30:00', '2024-02-02 11:30:00'),
(49, 'Plan de Responsabilidad Social', 'Plan para la implementación de acciones sociales.', 'media', '2024-02-03', '2024-02-04', 'documentos_corporativos/1 (49).pdf', '2024-02-04 12:45:00', '2024-02-04 12:45:00'),
(50, 'Informe de Proyectos Finalizados', 'Resumen de los proyectos que han sido completados.', 'alta', '2024-02-05', '2024-02-06', 'documentos_corporativos/1 (50).pdf', '2024-02-06 13:00:00', '2024-02-06 13:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_28_164854_create_documents_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('wA1Nggj5cvHvdRbZSypABRx5rFEQLmrnOQSKZFdZ', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYktxUG53YzdiejdFMm1IenZsV0Zia1JXVHFMRVZubGpxY09RODVkbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3QvcHJ1ZWJhX3RlY25pY2EvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1727754466);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Juan Pérez', 'juan.perez1@example.com', '2024-09-15 08:30:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'admin', 'iwS7gqIJsDzu8mewGlu3WTDdtKtP3jli9F3ffB4oDIFppKvO9hxZkcnsdT8H', '2024-09-15 08:30:00', '2024-09-15 08:30:00'),
(2, 'María Gómez', 'maria.gomez2@example.com', '2024-09-16 09:00:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'responsable', 'token_2', '2024-09-16 09:00:00', '2024-09-16 09:00:00'),
(3, 'Carlos Ruiz', 'carlos.ruiz3@example.com', '2024-09-17 10:45:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'asignado', 'token_3', '2024-09-17 10:45:00', '2024-09-17 10:45:00'),
(4, 'Ana Martínez', 'ana.martinez4@example.com', '2024-09-18 12:20:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'admin', 'token_4', '2024-09-18 12:20:00', '2024-09-18 12:20:00'),
(5, 'Luis Fernández', 'luis.fernandez5@example.com', '2024-09-19 13:10:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'responsable', 'token_5', '2024-09-19 13:10:00', '2024-09-19 13:10:00'),
(6, 'Sofía López', 'sofia.lopez6@example.com', '2024-09-20 14:00:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'asignado', 'token_6', '2024-09-20 14:00:00', '2024-09-20 14:00:00'),
(7, 'Daniel Torres', 'daniel.torres7@example.com', '2024-09-21 15:30:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'admin', 'token_7', '2024-09-21 15:30:00', '2024-09-21 15:30:00'),
(8, 'Laura Ramírez', 'laura.ramirez8@example.com', '2024-09-22 16:45:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'responsable', 'token_8', '2024-09-22 16:45:00', '2024-09-22 16:45:00'),
(9, 'Pedro Vargas', 'pedro.vargas9@example.com', '2024-09-23 07:15:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'asignado', 'token_9', '2024-09-23 07:15:00', '2024-09-23 07:15:00'),
(10, 'Carmen Castillo', 'carmen.castillo10@example.com', '2024-09-24 09:00:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'admin', 'token_10', '2024-09-24 09:00:00', '2024-09-24 09:00:00'),
(11, 'Manuel Herrera', 'manuel.herrera11@example.com', '2024-09-25 10:10:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'responsable', 'token_11', '2024-09-25 10:10:00', '2024-09-25 10:10:00'),
(12, 'Isabel Ortiz', 'isabel.ortiz12@example.com', '2024-09-26 11:20:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'asignado', 'token_12', '2024-09-26 11:20:00', '2024-09-26 11:20:00'),
(13, 'Roberto Ramírez', 'roberto.ramirez13@example.com', '2024-09-27 12:30:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'admin', 'token_13', '2024-09-27 12:30:00', '2024-09-27 12:30:00'),
(14, 'Lucía Moreno', 'lucia.moreno14@example.com', '2024-09-28 13:40:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'responsable', 'token_14', '2024-09-28 13:40:00', '2024-09-28 13:40:00'),
(15, 'David Rojas', 'david.rojas15@example.com', '2024-09-29 14:50:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'asignado', 'token_15', '2024-09-29 14:50:00', '2024-09-29 14:50:00'),
(16, 'Cristina Flores', 'cristina.flores16@example.com', '2024-09-30 15:00:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'admin', 'token_16', '2024-09-30 15:00:00', '2024-09-30 15:00:00'),
(17, 'Raúl Torres', 'raul.torres17@example.com', '2024-09-30 16:10:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'responsable', 'token_17', '2024-09-30 16:10:00', '2024-09-30 16:10:00'),
(18, 'Alicia Serrano', 'alicia.serrano18@example.com', '2024-09-30 17:20:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'asignado', 'token_18', '2024-09-30 17:20:00', '2024-09-30 17:20:00'),
(19, 'Sergio Martín', 'sergio.martin19@example.com', '2024-09-30 18:30:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'admin', 'token_19', '2024-09-30 18:30:00', '2024-09-30 18:30:00'),
(20, 'Paula Jiménez', 'paula.jimenez20@example.com', '2024-09-30 19:40:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'responsable', 'token_20', '2024-09-30 19:40:00', '2024-09-30 19:40:00'),
(21, 'Miguel Suárez', 'miguel.suarez21@example.com', '2024-09-30 20:50:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'asignado', 'token_21', '2024-09-30 20:50:00', '2024-09-30 20:50:00'),
(22, 'Nuria Castillo', 'nuria.castillo22@example.com', '2024-09-30 21:00:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'admin', 'token_22', '2024-09-30 21:00:00', '2024-09-30 21:00:00'),
(23, 'Alberto Méndez', 'alberto.mendez23@example.com', '2024-09-30 21:10:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'responsable', 'dCtBkzefw2sL12ZfoZzMpVpeV7ULaVxLabeN3T5AqYdDTChavKPtz15QFlNm', '2024-09-30 21:10:00', '2024-09-30 21:10:00'),
(24, 'Claudia Vázquez', 'claudia.vazquez24@example.com', '2024-09-30 21:20:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'asignado', 'token_24', '2024-09-30 21:20:00', '2024-09-30 21:20:00'),
(25, 'Francisco Rivera', 'francisco.rivera25@example.com', '2024-09-30 21:30:00', '$2y$12$0f1h2k4vNzJMAFJPHZKxMOsYx2epahvMxZtHLyVabcBRRL0HGi2tS', 'admin', 'token_25', '2024-09-30 21:30:00', '2024-09-30 21:30:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
