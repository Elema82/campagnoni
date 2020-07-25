-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jul 25, 2020 at 04:25 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `r0000571_newcamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `root` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `root`) VALUES
(2, 'Ventilacion', 'productos', 1),
(3, 'Riego', 'productos', 1),
(4, 'Motores', 'productos', 1),
(5, 'Calefaccion', 'productos', 1),
(6, 'Jardin bordeadoras', 'productos', 1),
(7, 'Jardin cortadoras', 'productos', 1),
(8, 'Novedades', 'novedades', 1);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int UNSIGNED NOT NULL,
  `attachable_id` int NOT NULL,
  `attachable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `attachable_id`, `attachable_type`, `original_name`, `file_name`, `folder_name`, `mime_type`, `size`, `url_path`, `created_at`, `updated_at`) VALUES
(14, 5, 'App\\V1\\Products\\Model\\Product', 'Captura de pantalla de 2017-08-01 19-48-45.png', '1501644446.png', 'images/products', 'image/png', '219559', 'http://campagnoni.com.ar/public/images/products/1501644446.png', '2017-08-02 06:27:26', '2017-08-02 06:27:26'),
(15, 5, 'App\\V1\\Products\\Model\\Product', 'expensas-julio.png', '1501644447.png', 'images/products', 'image/png', '238011', 'http://campagnoni.com.ar/public/images/products/1501644447.png', '2017-08-02 06:27:27', '2017-08-02 06:27:27'),
(17, 6, 'App\\V1\\Products\\Model\\Product', '100_1364 (1).JPG', '1501645154.JPG', 'images/products', 'image/jpeg', '1454629', 'http://campagnoni.com.ar/public/images/products/1501645154.JPG', '2017-08-02 06:39:14', '2017-08-02 06:39:14'),
(18, 6, 'App\\V1\\Products\\Model\\Product', '100_1365.JPG', '1501645154.JPG', 'images/products', 'image/jpeg', '1824969', 'http://campagnoni.com.ar/public/images/products/1501645154.JPG', '2017-08-02 06:39:14', '2017-08-02 06:39:14'),
(19, 7, 'App\\V1\\Products\\Model\\Product', '100_1364 (1).JPG', '1501645273.JPG', 'images/products', 'image/jpeg', '1454629', 'http://campagnoni.com.ar/public/images/products/1501645273.JPG', '2017-08-02 06:41:13', '2017-08-02 06:41:13'),
(20, 7, 'App\\V1\\Products\\Model\\Product', '01-Diego MARADONA  - Coupe du monde Argentine 1986.jpg', '1501645273.jpg', 'images/products', 'image/jpeg', '216084', 'http://campagnoni.com.ar/public/images/products/1501645273.jpg', '2017-08-02 06:41:13', '2017-08-02 06:41:13'),
(21, 7, 'App\\V1\\Products\\Model\\Product', '59429-orlaith-mcallister-1024x768-24806.png', '1501645273.png', 'images/products', 'image/png', '358346', 'http://campagnoni.com.ar/public/images/products/1501645273.png', '2017-08-02 06:41:13', '2017-08-02 06:41:13'),
(22, 7, 'App\\V1\\Products\\Model\\Product', '402435_10200175323250764_1203355065_n.jpg', '1501646718.jpg', 'images/products', 'image/jpeg', '112942', 'http://campagnoni.com.ar/public/images/products/1501646718.jpg', '2017-08-02 07:05:18', '2017-08-02 07:05:18'),
(23, 16, 'App\\V1\\Products\\Model\\Product', 'extractor-airtec_main.jpg', '1502316900.jpg', 'images/products', 'image/jpeg', '190946', 'http://campagnoni.com.ar/public/images/products/1502316900.jpg', '2017-08-10 01:15:00', '2017-08-10 01:15:00'),
(34, 16, 'App\\V1\\Products\\Model\\Product', 'extractor-airtec_thumb.png', '1502323146.png', 'images/products', 'image/png', '109397', 'http://campagnoni.com.ar/public/images/products/1502323146.png', '2017-08-10 02:59:06', '2017-08-10 02:59:06'),
(66, 16, 'App\\V1\\Products\\Model\\Product', 'extractor-airtec_slide1.jpg', '1502324166113173548.jpg', 'images/products', 'image/jpeg', '153311', 'http://campagnoni.com.ar/public/images/products/1502324166113173548.jpg', '2017-08-10 03:16:06', '2017-08-10 03:16:06'),
(67, 16, 'App\\V1\\Products\\Model\\Product', 'extractor-airtec_slide2.jpg', '1502324166589791565.jpg', 'images/products', 'image/jpeg', '313808', 'http://campagnoni.com.ar/public/images/products/1502324166589791565.jpg', '2017-08-10 03:16:06', '2017-08-10 03:16:06'),
(68, 16, 'App\\V1\\Products\\Model\\Product', 'extractor-airtec_slide3.jpg', '1502324166968306057.jpg', 'images/products', 'image/jpeg', '382886', 'http://campagnoni.com.ar/public/images/products/1502324166968306057.jpg', '2017-08-10 03:16:06', '2017-08-10 03:16:06'),
(69, 16, 'App\\V1\\Products\\Model\\Product', 'extractor-airtec_slide4.jpg', '1502324166846882574.jpg', 'images/products', 'image/jpeg', '183972', 'http://campagnoni.com.ar/public/images/products/1502324166846882574.jpg', '2017-08-10 03:16:06', '2017-08-10 03:16:06'),
(70, 17, 'App\\V1\\Products\\Model\\Product', 'ventilador-airtec_thumb.png', '1502406168257661208.png', 'images/products', 'image/png', '138403', 'http://campagnoni.com.ar/public/images/products/1502406168257661208.png', '2017-08-11 02:02:48', '2017-08-11 02:02:48'),
(71, 17, 'App\\V1\\Products\\Model\\Product', 'ventilador-airtec_main.jpg', '1502406169931118492.jpg', 'images/products', 'image/jpeg', '196865', 'http://campagnoni.com.ar/public/images/products/1502406169931118492.jpg', '2017-08-11 02:02:49', '2017-08-11 02:02:49'),
(72, 17, 'App\\V1\\Products\\Model\\Product', 'ventilador-airtec_slide1.jpg', '1502406169109917125.jpg', 'images/products', 'image/jpeg', '337568', 'http://campagnoni.com.ar/public/images/products/1502406169109917125.jpg', '2017-08-11 02:02:49', '2017-08-11 02:02:49'),
(73, 17, 'App\\V1\\Products\\Model\\Product', 'ventilador-airtec_slide2.jpg', '1502406169430612983.jpg', 'images/products', 'image/jpeg', '291769', 'http://campagnoni.com.ar/public/images/products/1502406169430612983.jpg', '2017-08-11 02:02:49', '2017-08-11 02:02:49'),
(74, 17, 'App\\V1\\Products\\Model\\Product', 'ventilador-airtec_slide3.jpg', '1502406169695031325.jpg', 'images/products', 'image/jpeg', '294883', 'http://campagnoni.com.ar/public/images/products/1502406169695031325.jpg', '2017-08-11 02:02:49', '2017-08-11 02:02:49'),
(75, 18, 'App\\V1\\Products\\Model\\Product', 'vent-rccg915_thumb.png', '150240624570889661.png', 'images/products', 'image/png', '95054', 'http://campagnoni.com.ar/public/images/products/150240624570889661.png', '2017-08-11 02:04:05', '2017-08-11 02:04:05'),
(76, 18, 'App\\V1\\Products\\Model\\Product', 'rccg915_main.jpg', '1502406245455176027.jpg', 'images/products', 'image/jpeg', '61705', 'http://campagnoni.com.ar/public/images/products/1502406245455176027.jpg', '2017-08-11 02:04:05', '2017-08-11 02:04:05'),
(77, 18, 'App\\V1\\Products\\Model\\Product', 'rccg915_slide1.jpg', '1502406245519765720.jpg', 'images/products', 'image/jpeg', '149009', 'http://campagnoni.com.ar/public/images/products/1502406245519765720.jpg', '2017-08-11 02:04:05', '2017-08-11 02:04:05'),
(78, 18, 'App\\V1\\Products\\Model\\Product', 'rccg915_slide2.jpg', '1502406245342161166.jpg', 'images/products', 'image/jpeg', '187933', 'http://campagnoni.com.ar/public/images/products/1502406245342161166.jpg', '2017-08-11 02:04:05', '2017-08-11 02:04:05'),
(79, 18, 'App\\V1\\Products\\Model\\Product', 'rccg915_slide3.jpg', '150240624563453093.jpg', 'images/products', 'image/jpeg', '99276', 'http://campagnoni.com.ar/public/images/products/150240624563453093.jpg', '2017-08-11 02:04:05', '2017-08-11 02:04:05'),
(80, 19, 'App\\V1\\Products\\Model\\Product', 'vent-rccg1215_thumb.png', '150240627758391396.png', 'images/products', 'image/png', '131257', 'http://campagnoni.com.ar/public/images/products/150240627758391396.png', '2017-08-11 02:04:37', '2017-08-11 02:04:37'),
(82, 20, 'App\\V1\\Products\\Model\\Product', 'vent-rccg915r_thumb.png', '1502406331168079095.png', 'images/products', 'image/png', '65880', 'http://campagnoni.com.ar/public/images/products/1502406331168079095.png', '2017-08-11 02:05:31', '2017-08-11 02:05:31'),
(84, 32, 'App\\V1\\Products\\Model\\Product', 'estufa-vertical_thumb.png', '1502411849892073466.png', 'images/products', 'image/png', '83231', 'http://campagnoni.com.ar/public/images/products/1502411849892073466.png', '2017-08-11 03:37:29', '2017-08-11 03:37:29'),
(85, 32, 'App\\V1\\Products\\Model\\Product', 'estufa-vertical_main.jpg', '1502411849511705543.jpg', 'images/products', 'image/jpeg', '45019', 'http://campagnoni.com.ar/public/images/products/1502411849511705543.jpg', '2017-08-11 03:37:29', '2017-08-11 03:37:29'),
(86, 33, 'App\\V1\\Products\\Model\\Product', 'estufa-horizontal_thumb.png', '1502411870534190523.png', 'images/products', 'image/png', '87821', 'http://campagnoni.com.ar/public/images/products/1502411870534190523.png', '2017-08-11 03:37:50', '2017-08-11 03:37:50'),
(87, 33, 'App\\V1\\Products\\Model\\Product', 'estufa-horizontal_main.jpg', '1502411871293577223.jpg', 'images/products', 'image/jpeg', '58671', 'http://campagnoni.com.ar/public/images/products/1502411871293577223.jpg', '2017-08-11 03:37:51', '2017-08-11 03:37:51'),
(88, 28, 'App\\V1\\Products\\Model\\Product', 'ae32_thumb.png', '1502412850404820649.png', 'images/products', 'image/png', '138185', 'http://campagnoni.com.ar/public/images/products/1502412850404820649.png', '2017-08-11 03:54:10', '2017-08-11 03:54:10'),
(89, 28, 'App\\V1\\Products\\Model\\Product', 'ae32_main.jpg', '1502412850121824539.jpg', 'images/products', 'image/jpeg', '73430', 'http://campagnoni.com.ar/public/images/products/1502412850121824539.jpg', '2017-08-11 03:54:10', '2017-08-11 03:54:10'),
(90, 28, 'App\\V1\\Products\\Model\\Product', 'ae32_slide1.jpg', '1502412850959490474.jpg', 'images/products', 'image/jpeg', '121113', 'http://campagnoni.com.ar/public/images/products/1502412850959490474.jpg', '2017-08-11 03:54:10', '2017-08-11 03:54:10'),
(91, 28, 'App\\V1\\Products\\Model\\Product', 'ae32_slide2.jpg', '1502412850527895324.jpg', 'images/products', 'image/jpeg', '157594', 'http://campagnoni.com.ar/public/images/products/1502412850527895324.jpg', '2017-08-11 03:54:10', '2017-08-11 03:54:10'),
(92, 28, 'App\\V1\\Products\\Model\\Product', 'ae32_slide3.jpg', '15024128518514253.jpg', 'images/products', 'image/jpeg', '113226', 'http://campagnoni.com.ar/public/images/products/15024128518514253.jpg', '2017-08-11 03:54:11', '2017-08-11 03:54:11'),
(93, 29, 'App\\V1\\Products\\Model\\Product', 'ae36_thumb.png', '1502412881735913224.png', 'images/products', 'image/png', '147323', 'http://campagnoni.com.ar/public/images/products/1502412881735913224.png', '2017-08-11 03:54:41', '2017-08-11 03:54:41'),
(94, 29, 'App\\V1\\Products\\Model\\Product', 'ae36_main.jpg', '150241288189231533.jpg', 'images/products', 'image/jpeg', '84891', 'http://campagnoni.com.ar/public/images/products/150241288189231533.jpg', '2017-08-11 03:54:41', '2017-08-11 03:54:41'),
(95, 29, 'App\\V1\\Products\\Model\\Product', 'ae36_slide1.jpg', '150241288163588990.jpg', 'images/products', 'image/jpeg', '130666', 'http://campagnoni.com.ar/public/images/products/150241288163588990.jpg', '2017-08-11 03:54:41', '2017-08-11 03:54:41'),
(96, 29, 'App\\V1\\Products\\Model\\Product', 'ae36_slide2.jpg', '1502412881672454677.jpg', 'images/products', 'image/jpeg', '157739', 'http://campagnoni.com.ar/public/images/products/1502412881672454677.jpg', '2017-08-11 03:54:41', '2017-08-11 03:54:41'),
(97, 29, 'App\\V1\\Products\\Model\\Product', 'ae36_slide3.jpg', '1502412881901058400.jpg', 'images/products', 'image/jpeg', '123131', 'http://campagnoni.com.ar/public/images/products/1502412881901058400.jpg', '2017-08-11 03:54:41', '2017-08-11 03:54:41'),
(98, 30, 'App\\V1\\Products\\Model\\Product', 'ae45_thumb.png', '1502412905258722944.png', 'images/products', 'image/png', '130696', 'http://campagnoni.com.ar/public/images/products/1502412905258722944.png', '2017-08-11 03:55:05', '2017-08-11 03:55:05'),
(99, 30, 'App\\V1\\Products\\Model\\Product', 'ae45_main.jpg', '1502412906462126879.jpg', 'images/products', 'image/jpeg', '75591', 'http://campagnoni.com.ar/public/images/products/1502412906462126879.jpg', '2017-08-11 03:55:06', '2017-08-11 03:55:06'),
(100, 30, 'App\\V1\\Products\\Model\\Product', 'ae45_slide1.jpg', '1502412906757587305.jpg', 'images/products', 'image/jpeg', '117164', 'http://campagnoni.com.ar/public/images/products/1502412906757587305.jpg', '2017-08-11 03:55:06', '2017-08-11 03:55:06'),
(101, 30, 'App\\V1\\Products\\Model\\Product', 'ae45_slide2.jpg', '1502412906997233882.jpg', 'images/products', 'image/jpeg', '157594', 'http://campagnoni.com.ar/public/images/products/1502412906997233882.jpg', '2017-08-11 03:55:06', '2017-08-11 03:55:06'),
(102, 30, 'App\\V1\\Products\\Model\\Product', 'ae45_slide3.jpg', '1502412906607306015.jpg', 'images/products', 'image/jpeg', '113226', 'http://campagnoni.com.ar/public/images/products/1502412906607306015.jpg', '2017-08-11 03:55:06', '2017-08-11 03:55:06'),
(103, 31, 'App\\V1\\Products\\Model\\Product', 'ae54_thumb.png', '1502412928586960714.png', 'images/products', 'image/png', '154991', 'http://campagnoni.com.ar/public/images/products/1502412928586960714.png', '2017-08-11 03:55:28', '2017-08-11 03:55:28'),
(104, 31, 'App\\V1\\Products\\Model\\Product', 'ae54_main.jpg', '1502412928337757914.jpg', 'images/products', 'image/jpeg', '79180', 'http://campagnoni.com.ar/public/images/products/1502412928337757914.jpg', '2017-08-11 03:55:28', '2017-08-11 03:55:28'),
(105, 31, 'App\\V1\\Products\\Model\\Product', 'ae54_slide1.jpg', '1502412928792488231.jpg', 'images/products', 'image/jpeg', '119426', 'http://campagnoni.com.ar/public/images/products/1502412928792488231.jpg', '2017-08-11 03:55:28', '2017-08-11 03:55:28'),
(106, 31, 'App\\V1\\Products\\Model\\Product', 'ae54_slide2.jpg', '1502412928154754416.jpg', 'images/products', 'image/jpeg', '157608', 'http://campagnoni.com.ar/public/images/products/1502412928154754416.jpg', '2017-08-11 03:55:28', '2017-08-11 03:55:28'),
(107, 31, 'App\\V1\\Products\\Model\\Product', 'ae54_slide3.jpg', '1502412928867577418.jpg', 'images/products', 'image/jpeg', '123131', 'http://campagnoni.com.ar/public/images/products/1502412928867577418.jpg', '2017-08-11 03:55:28', '2017-08-11 03:55:28'),
(108, 8, 'App\\V1\\Products\\Model\\Product', 'a400_thumb.png', '1502413141334048124.png', 'images/products', 'image/png', '119389', 'http://campagnoni.com.ar/public/images/products/1502413141334048124.png', '2017-08-11 03:59:01', '2017-08-11 03:59:01'),
(109, 8, 'App\\V1\\Products\\Model\\Product', 'a400_main.jpg', '150241314222836092.jpg', 'images/products', 'image/jpeg', '37638', 'http://campagnoni.com.ar/public/images/products/150241314222836092.jpg', '2017-08-11 03:59:02', '2017-08-11 03:59:02'),
(110, 8, 'App\\V1\\Products\\Model\\Product', 'a400_slide1.jpg', '1502413142700763799.jpg', 'images/products', 'image/jpeg', '113245', 'http://campagnoni.com.ar/public/images/products/1502413142700763799.jpg', '2017-08-11 03:59:02', '2017-08-11 03:59:02'),
(111, 8, 'App\\V1\\Products\\Model\\Product', 'a400_slide2.jpg', '1502413142179891301.jpg', 'images/products', 'image/jpeg', '44647', 'http://campagnoni.com.ar/public/images/products/1502413142179891301.jpg', '2017-08-11 03:59:02', '2017-08-11 03:59:02'),
(112, 8, 'App\\V1\\Products\\Model\\Product', 'a400_slide3.jpg', '1502413142101660310.jpg', 'images/products', 'image/jpeg', '83161', 'http://campagnoni.com.ar/public/images/products/1502413142101660310.jpg', '2017-08-11 03:59:02', '2017-08-11 03:59:02'),
(113, 9, 'App\\V1\\Products\\Model\\Product', 'a500_thumb.png', '1502413195123274101.png', 'images/products', 'image/png', '112529', 'http://campagnoni.com.ar/public/images/products/1502413195123274101.png', '2017-08-11 03:59:55', '2017-08-11 03:59:55'),
(114, 9, 'App\\V1\\Products\\Model\\Product', 'a500_main.jpg', '1502413195897414084.jpg', 'images/products', 'image/jpeg', '41294', 'http://campagnoni.com.ar/public/images/products/1502413195897414084.jpg', '2017-08-11 03:59:55', '2017-08-11 03:59:55'),
(115, 9, 'App\\V1\\Products\\Model\\Product', 'a500_slide1.jpg', '1502413195128420492.jpg', 'images/products', 'image/jpeg', '42701', 'http://campagnoni.com.ar/public/images/products/1502413195128420492.jpg', '2017-08-11 03:59:55', '2017-08-11 03:59:55'),
(116, 9, 'App\\V1\\Products\\Model\\Product', 'a500_slide2.jpg', '1502413195131196370.jpg', 'images/products', 'image/jpeg', '98999', 'http://campagnoni.com.ar/public/images/products/1502413195131196370.jpg', '2017-08-11 03:59:55', '2017-08-11 03:59:55'),
(117, 9, 'App\\V1\\Products\\Model\\Product', 'a500_slide3.jpg', '1502413195154879738.jpg', 'images/products', 'image/jpeg', '60513', 'http://campagnoni.com.ar/public/images/products/1502413195154879738.jpg', '2017-08-11 03:59:55', '2017-08-11 03:59:55'),
(118, 9, 'App\\V1\\Products\\Model\\Product', 'a500_slide4.jpg', '1502413195106899372.jpg', 'images/products', 'image/jpeg', '57839', 'http://campagnoni.com.ar/public/images/products/1502413195106899372.jpg', '2017-08-11 03:59:55', '2017-08-11 03:59:55'),
(119, 10, 'App\\V1\\Products\\Model\\Product', 'ae35_thumb.png', '1502413263824826016.png', 'images/products', 'image/png', '114934', 'http://campagnoni.com.ar/public/images/products/1502413263824826016.png', '2017-08-11 04:01:03', '2017-08-11 04:01:03'),
(120, 10, 'App\\V1\\Products\\Model\\Product', 'ae35_main.jpg', '1502413263685875746.jpg', 'images/products', 'image/jpeg', '54323', 'http://campagnoni.com.ar/public/images/products/1502413263685875746.jpg', '2017-08-11 04:01:03', '2017-08-11 04:01:03'),
(121, 10, 'App\\V1\\Products\\Model\\Product', 'ae35_slide1.jpg', '1502413263775793625.jpg', 'images/products', 'image/jpeg', '65589', 'http://campagnoni.com.ar/public/images/products/1502413263775793625.jpg', '2017-08-11 04:01:03', '2017-08-11 04:01:03'),
(122, 10, 'App\\V1\\Products\\Model\\Product', 'ae35_slide2.jpg', '1502413263195205698.jpg', 'images/products', 'image/jpeg', '59726', 'http://campagnoni.com.ar/public/images/products/1502413263195205698.jpg', '2017-08-11 04:01:03', '2017-08-11 04:01:03'),
(123, 10, 'App\\V1\\Products\\Model\\Product', 'ae35_slide3.jpg', '1502413263760860120.jpg', 'images/products', 'image/jpeg', '107761', 'http://campagnoni.com.ar/public/images/products/1502413263760860120.jpg', '2017-08-11 04:01:03', '2017-08-11 04:01:03'),
(124, 11, 'App\\V1\\Products\\Model\\Product', 'ae45_thumb.png', '1502413292639862156.png', 'images/products', 'image/png', '112179', 'http://campagnoni.com.ar/public/images/products/1502413292639862156.png', '2017-08-11 04:01:32', '2017-08-11 04:01:32'),
(125, 11, 'App\\V1\\Products\\Model\\Product', 'ae45_main.jpg', '1502413292465941655.jpg', 'images/products', 'image/jpeg', '54323', 'http://campagnoni.com.ar/public/images/products/1502413292465941655.jpg', '2017-08-11 04:01:32', '2017-08-11 04:01:32'),
(126, 11, 'App\\V1\\Products\\Model\\Product', 'ae45_slide1.jpg', '1502413292727286057.jpg', 'images/products', 'image/jpeg', '65589', 'http://campagnoni.com.ar/public/images/products/1502413292727286057.jpg', '2017-08-11 04:01:32', '2017-08-11 04:01:32'),
(127, 11, 'App\\V1\\Products\\Model\\Product', 'ae45_slide2.jpg', '1502413292711462067.jpg', 'images/products', 'image/jpeg', '59726', 'http://campagnoni.com.ar/public/images/products/1502413292711462067.jpg', '2017-08-11 04:01:32', '2017-08-11 04:01:32'),
(128, 11, 'App\\V1\\Products\\Model\\Product', 'ae45_slide3.jpg', '1502413292555908615.jpg', 'images/products', 'image/jpeg', '107761', 'http://campagnoni.com.ar/public/images/products/1502413292555908615.jpg', '2017-08-11 04:01:32', '2017-08-11 04:01:32'),
(129, 12, 'App\\V1\\Products\\Model\\Product', 'ae55_main.jpg', '1502413325307619876.jpg', 'images/products', 'image/jpeg', '54323', 'http://campagnoni.com.ar/public/images/products/1502413325307619876.jpg', '2017-08-11 04:02:05', '2017-08-11 04:02:05'),
(130, 12, 'App\\V1\\Products\\Model\\Product', 'ae55_thumb.png', '1502413326959703484.png', 'images/products', 'image/png', '109704', 'http://campagnoni.com.ar/public/images/products/1502413326959703484.png', '2017-08-11 04:02:06', '2017-08-11 04:02:06'),
(131, 12, 'App\\V1\\Products\\Model\\Product', 'ae55_slide1.jpg', '1502413326935989716.jpg', 'images/products', 'image/jpeg', '65589', 'http://campagnoni.com.ar/public/images/products/1502413326935989716.jpg', '2017-08-11 04:02:06', '2017-08-11 04:02:06'),
(132, 12, 'App\\V1\\Products\\Model\\Product', 'ae55_slide2.jpg', '1502413326674428859.jpg', 'images/products', 'image/jpeg', '59726', 'http://campagnoni.com.ar/public/images/products/1502413326674428859.jpg', '2017-08-11 04:02:06', '2017-08-11 04:02:06'),
(133, 12, 'App\\V1\\Products\\Model\\Product', 'ae55_slide3.jpg', '1502413326303891067.jpg', 'images/products', 'image/jpeg', '107761', 'http://campagnoni.com.ar/public/images/products/1502413326303891067.jpg', '2017-08-11 04:02:06', '2017-08-11 04:02:06'),
(134, 13, 'App\\V1\\Products\\Model\\Product', 'ae65_thumb.png', '1502413358707517659.png', 'images/products', 'image/png', '107932', 'http://campagnoni.com.ar/public/images/products/1502413358707517659.png', '2017-08-11 04:02:38', '2017-08-11 04:02:38'),
(135, 13, 'App\\V1\\Products\\Model\\Product', 'ae65_main.jpg', '150241335911659707.jpg', 'images/products', 'image/jpeg', '56139', 'http://campagnoni.com.ar/public/images/products/150241335911659707.jpg', '2017-08-11 04:02:39', '2017-08-11 04:02:39'),
(136, 13, 'App\\V1\\Products\\Model\\Product', 'ae65_slide1.jpg', '1502413359247127889.jpg', 'images/products', 'image/jpeg', '120526', 'http://campagnoni.com.ar/public/images/products/1502413359247127889.jpg', '2017-08-11 04:02:39', '2017-08-11 04:02:39'),
(137, 13, 'App\\V1\\Products\\Model\\Product', 'ae65_slide2.jpg', '1502413359887151337.jpg', 'images/products', 'image/jpeg', '67448', 'http://campagnoni.com.ar/public/images/products/1502413359887151337.jpg', '2017-08-11 04:02:39', '2017-08-11 04:02:39'),
(138, 13, 'App\\V1\\Products\\Model\\Product', 'ae65_slide3.jpg', '1502413359318703805.jpg', 'images/products', 'image/jpeg', '134255', 'http://campagnoni.com.ar/public/images/products/1502413359318703805.jpg', '2017-08-11 04:02:39', '2017-08-11 04:02:39'),
(139, 14, 'App\\V1\\Products\\Model\\Product', 'cortadora-rae35_thumb.png', '1502413403386952655.png', 'images/products', 'image/png', '86705', 'http://campagnoni.com.ar/public/images/products/1502413403386952655.png', '2017-08-11 04:03:23', '2017-08-11 04:03:23'),
(140, 14, 'App\\V1\\Products\\Model\\Product', 'cortadora-rae35_main.jpg', '1502413403439092336.jpg', 'images/products', 'image/jpeg', '66828', 'http://campagnoni.com.ar/public/images/products/1502413403439092336.jpg', '2017-08-11 04:03:23', '2017-08-11 04:03:23'),
(141, 14, 'App\\V1\\Products\\Model\\Product', 'cortadora-rae35_slide4.jpg', '150241340324264649.jpg', 'images/products', 'image/jpeg', '130821', 'http://campagnoni.com.ar/public/images/products/150241340324264649.jpg', '2017-08-11 04:03:23', '2017-08-11 04:03:23'),
(142, 15, 'App\\V1\\Products\\Model\\Product', 'cortadora-rae45_thumb.png', '1502413436864896048.png', 'images/products', 'image/png', '94770', 'http://campagnoni.com.ar/public/images/products/1502413436864896048.png', '2017-08-11 04:03:56', '2017-08-11 04:03:56'),
(144, 15, 'App\\V1\\Products\\Model\\Product', 'cortadora-rae45_slide1.jpg', '1502413436527227485.jpg', 'images/products', 'image/jpeg', '106313', 'http://campagnoni.com.ar/public/images/products/1502413436527227485.jpg', '2017-08-11 04:03:56', '2017-08-11 04:03:56'),
(145, 15, 'App\\V1\\Products\\Model\\Product', 'cortadora-rae45_slide2.jpg', '1502413436993576505.jpg', 'images/products', 'image/jpeg', '78848', 'http://campagnoni.com.ar/public/images/products/1502413436993576505.jpg', '2017-08-11 04:03:56', '2017-08-11 04:03:56'),
(146, 15, 'App\\V1\\Products\\Model\\Product', 'cortadora-rae45_slide3.jpg', '1502413436170536365.jpg', 'images/products', 'image/jpeg', '74201', 'http://campagnoni.com.ar/public/images/products/1502413436170536365.jpg', '2017-08-11 04:03:56', '2017-08-11 04:03:56'),
(147, 15, 'App\\V1\\Products\\Model\\Product', 'cortadora-rae45_slide4.jpg', '1502413436616284685.jpg', 'images/products', 'image/jpeg', '146948', 'http://campagnoni.com.ar/public/images/products/1502413436616284685.jpg', '2017-08-11 04:03:56', '2017-08-11 04:03:56'),
(157, 15, 'App\\V1\\Products\\Model\\Product', 'cortadora-rae45_main.jpg', '1502765906627710287.jpg', 'images/products', 'image/jpeg', '65122', 'http://campagnoni.com.ar/public/images/products/1502765906627710287.jpg', '2017-08-15 05:58:26', '2017-08-15 05:58:26'),
(158, 34, 'App\\V1\\Products\\Model\\Product', 'e400_thumb.png', '1502922140112487098.png', 'images/products', 'image/png', '118369', 'http://campagnoni.com.ar/public/images/products/1502922140112487098.png', '2017-08-17 01:22:21', '2017-08-17 01:22:21'),
(159, 34, 'App\\V1\\Products\\Model\\Product', 'e400_main.jpg', '1502922212900976520.jpg', 'images/products', 'image/jpeg', '40019', 'http://campagnoni.com.ar/public/images/products/1502922212900976520.jpg', '2017-08-17 01:23:32', '2017-08-17 01:23:32'),
(160, 34, 'App\\V1\\Products\\Model\\Product', 'e400_slide1.jpg', '1502922212552900379.jpg', 'images/products', 'image/jpeg', '121357', 'http://campagnoni.com.ar/public/images/products/1502922212552900379.jpg', '2017-08-17 01:23:32', '2017-08-17 01:23:32'),
(161, 34, 'App\\V1\\Products\\Model\\Product', 'e400_slide2.jpg', '1502922212902035222.jpg', 'images/products', 'image/jpeg', '45661', 'http://campagnoni.com.ar/public/images/products/1502922212902035222.jpg', '2017-08-17 01:23:32', '2017-08-17 01:23:32'),
(162, 34, 'App\\V1\\Products\\Model\\Product', 'e400_slide3.jpg', '1502922212195524906.jpg', 'images/products', 'image/jpeg', '86436', 'http://campagnoni.com.ar/public/images/products/1502922212195524906.jpg', '2017-08-17 01:23:32', '2017-08-17 01:23:32'),
(163, 20, 'App\\V1\\Products\\Model\\Product', '7_915R.12 frontal.jpg', '1513369433924046881.jpg', 'images/products', 'image/jpeg', '345231', 'http://campagnoni.com.ar/public/images/products/1513369433924046881.jpg', '2017-12-15 23:23:53', '2017-12-15 23:23:53'),
(166, 20, 'App\\V1\\Products\\Model\\Product', '7_915R.12 frontal.jpg', '1513369841578003862.jpg', 'images/products', 'image/jpeg', '345231', 'http://campagnoni.com.ar/public/images/products/1513369841578003862.jpg', '2017-12-15 23:30:41', '2017-12-15 23:30:41'),
(167, 20, 'App\\V1\\Products\\Model\\Product', 'Isometrica_915r.jpg', '1513369841169728914.jpg', 'images/products', 'image/jpeg', '314676', 'http://campagnoni.com.ar/public/images/products/1513369841169728914.jpg', '2017-12-15 23:30:41', '2017-12-15 23:30:41'),
(168, 20, 'App\\V1\\Products\\Model\\Product', 'Lateral_915r.jpg', '151336984193944217.jpg', 'images/products', 'image/jpeg', '163537', 'http://campagnoni.com.ar/public/images/products/151336984193944217.jpg', '2017-12-15 23:30:41', '2017-12-15 23:30:41'),
(169, 19, 'App\\V1\\Products\\Model\\Product', 'Render_RCCG1215 con logo.64.jpg', '1524782694545120439.jpg', 'images/products', 'image/jpeg', '510120', 'http://campagnoni.com.ar/public/images/products/1524782694545120439.jpg', '2018-04-27 01:44:54', '2018-04-27 01:44:54'),
(179, 19, 'App\\V1\\Products\\Model\\Product', '2.jpg', '152478421691443052.jpg', 'images/products', 'image/jpeg', '349728', 'http://campagnoni.com.ar/public/images/products/152478421691443052.jpg', '2018-04-27 02:10:16', '2018-04-27 02:10:16'),
(180, 19, 'App\\V1\\Products\\Model\\Product', 'Render_RCCG1215.54.jpg', '1524784216242847647.jpg', 'images/products', 'image/jpeg', '695919', 'http://campagnoni.com.ar/public/images/products/1524784216242847647.jpg', '2018-04-27 02:10:16', '2018-04-27 02:10:16'),
(181, 19, 'App\\V1\\Products\\Model\\Product', 'Vista Trasera.jpg', '1524784216494129714.jpg', 'images/products', 'image/jpeg', '254942', 'http://campagnoni.com.ar/public/images/products/1524784216494129714.jpg', '2018-04-27 02:10:16', '2018-04-27 02:10:16'),
(182, 22, 'App\\V1\\Products\\Model\\Product', '1390-2489-medium.jpg', '1528913325759631759.jpg', 'images/products', 'image/jpeg', '30995', 'http://campagnoni.com.ar/public/images/products/1528913325759631759.jpg', '2018-06-13 21:08:45', '2018-06-13 21:08:45'),
(183, 22, 'App\\V1\\Products\\Model\\Product', '1390-2489-medium.jpg', '1528914126458304253.jpg', 'images/products', 'image/jpeg', '30995', 'http://campagnoni.com.ar/public/images/products/1528914126458304253.jpg', '2018-06-13 21:22:06', '2018-06-13 21:22:06'),
(184, 22, 'App\\V1\\Products\\Model\\Product', '1390-2489-medium.jpg', '1528914126632480999.jpg', 'images/products', 'image/jpeg', '30995', 'http://campagnoni.com.ar/public/images/products/1528914126632480999.jpg', '2018-06-13 21:22:06', '2018-06-13 21:22:06'),
(185, 23, 'App\\V1\\Products\\Model\\Product', 'picos-riego-por-aspersion-x25-unidades-D_NQ_NP_717846-MLA26891268296_022018-F.jpg', '1528914671425352532.jpg', 'images/products', 'image/jpeg', '21154', 'http://campagnoni.com.ar/public/images/products/1528914671425352532.jpg', '2018-06-13 21:31:12', '2018-06-13 21:31:12'),
(186, 21, 'App\\V1\\Products\\Model\\Product', 'Tablero.jpg', '1536580955758765402.jpg', 'images/products', 'image/jpeg', '1843710', 'http://campagnoni.com.ar/public/images/products/1536580955758765402.jpg', '2018-09-10 15:02:36', '2018-09-10 15:02:36'),
(187, 21, 'App\\V1\\Products\\Model\\Product', 'Tablero.jpg', '1536580956580962211.jpg', 'images/products', 'image/jpeg', '1843710', 'http://campagnoni.com.ar/public/images/products/1536580956580962211.jpg', '2018-09-10 15:02:36', '2018-09-10 15:02:36'),
(188, 2, 'App\\V1\\News\\Model\\News', 'perfil.jpeg', '1561821772933129458.jpeg', 'task-attachment', 'image/jpeg', '85237', 'http://localhost/public/task-attachment/1561821772933129458.jpeg', '2019-06-29 15:22:52', '2019-06-29 15:22:52'),
(189, 3, 'App\\V1\\News\\Model\\News', 'perfil.jpeg', '156182189579828165.jpeg', 'task-attachment', 'image/jpeg', '85237', 'http://localhost/public/task-attachment/156182189579828165.jpeg', '2019-06-29 15:24:55', '2019-06-29 15:24:55'),
(190, 4, 'App\\V1\\News\\Model\\News', 'perfil.jpeg', '1561821985252479135.jpeg', 'task-attachment', 'image/jpeg', '85237', 'http://localhost/public/task-attachment/1561821985252479135.jpeg', '2019-06-29 15:26:25', '2019-06-29 15:26:25'),
(193, 9, 'App\\V1\\News\\Model\\News', 'Captura de Pantalla 2019-07-24 a la(s) 19.14.53.png', '1564006665784011371.png', 'task-attachment', 'image/png', '4149533', 'http://localhost/public/task-attachment/1564006665784011371.png', '2019-07-24 22:17:46', '2019-07-24 22:17:46'),
(194, 9, 'App\\V1\\News\\Model\\News', 'Captura de Pantalla 2019-08-12 a la(s) 11.59.35.png', '1566003027317419788.png', 'task-attachment', 'image/png', '81741', 'http://localhost/public/task-attachment/1566003027317419788.png', '2019-08-17 00:50:27', '2019-08-17 00:50:27'),
(195, 9, 'App\\V1\\News\\Model\\News', 'Captura de Pantalla 2019-08-13 a la(s) 13.55.47.png', '1566003027186869638.png', 'task-attachment', 'image/png', '88143', 'http://localhost/public/task-attachment/1566003027186869638.png', '2019-08-17 00:50:27', '2019-08-17 00:50:27'),
(196, 9, 'App\\V1\\News\\Model\\News', 'Captura de Pantalla 2019-08-13 a la(s) 15.50.51.png', '1566003027734201920.png', 'task-attachment', 'image/png', '133722', 'http://localhost/public/task-attachment/1566003027734201920.png', '2019-08-17 00:50:27', '2019-08-17 00:50:27'),
(197, 9, 'App\\V1\\News\\Model\\News', 'Captura de Pantalla 2019-08-13 a la(s) 17.32.04.png', '1566003027689869016.png', 'task-attachment', 'image/png', '240202', 'http://localhost/public/task-attachment/1566003027689869016.png', '2019-08-17 00:50:27', '2019-08-17 00:50:27'),
(198, 9, 'App\\V1\\News\\Model\\News', 'Captura de Pantalla 2019-08-14 a la(s) 09.42.48.png', '1566003027269939045.png', 'task-attachment', 'image/png', '571748', 'http://localhost/public/task-attachment/1566003027269939045.png', '2019-08-17 00:50:28', '2019-08-17 00:50:28'),
(199, 9, 'App\\V1\\News\\Model\\News', 'Captura de Pantalla 2019-08-14 a la(s) 11.23.58.png', '1566003028591419002.png', 'task-attachment', 'image/png', '258622', 'http://localhost/public/task-attachment/1566003028591419002.png', '2019-08-17 00:50:28', '2019-08-17 00:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_07_25_202146_create_categories_table', 2),
(4, '2017_07_25_202204_create_settings_table', 2),
(5, '2017_07_25_202212_create_news_table', 2),
(6, '2017_07_25_202305_create_files_table', 2),
(9, '2017_08_02_014257_create_files_table', 4),
(10, '2017_07_31_202146_create_products_table', 5),
(11, '2017_08_02_052534_create_products_attributes_table', 6),
(12, '2017_08_02_053120_create_products_category_attributes_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_principal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `short_description`, `description`, `status`, `video`, `img_principal`, `img_thumbnail`) VALUES
(9, 'Control de clima', '#ControldeClima #Ordenador #GranjaAvicola #AvicolaArgentina #Campagnoni #IndustriaArgentina #ControlClima #ControlAvicola\r\n#Extractoresavicolas #Panelesevaporativos', '¿Sabías que controlando correctamente la temperatura de manera constante dentro de tú granja avícola logras tener mejores resultados de conversión?\r\n🙌Nuestro nuevo controlador de clima CÉFIRO🇦🇷️ es el encargado de lograrlo, \r\nadaptándose a las más altas exigencias, con un manejo super sencillo e intuitivo.\r\n\r\n¿Sabías que controlando correctamente la temperatura de manera constante dentro de tú granja avícola logras tener mejores resultados de conversión?\r\n🙌Nuestro nuevo controlador de clima CÉFIRO🇦🇷️ es el encargado de lograrlo, \r\nadaptándose a las más altas exigencias, con un manejo super sencillo e intuitivo.\r\n\r\n\r\n¿Sabías que controlando correctamente la temperatura de manera constante dentro de tú granja avícola logras tener mejores resultados de conversión?\r\n🙌Nuestro nuevo controlador de clima CÉFIRO🇦🇷️ es el encargado de lograrlo, \r\nadaptándose a las más altas exigencias, con un manejo super sencillo e intuitivo.\r\n\r\n\r\n¿Sabías que controlando correctamente la temperatura de manera constante dentro de tú granja avícola logras tener mejores resultados de conversión?\r\n🙌Nuestro nuevo controlador de clima CÉFIRO🇦🇷️ es el encargado de lograrlo, \r\nadaptándose a las más altas exigencias, con un manejo super sencillo e intuitivo.', 1, 'https://www.youtube.com/embed/XdkNICbZaQs', '193', '191');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category` int NOT NULL,
  `img_principal` int DEFAULT NULL,
  `img_thumbnail` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category`, `img_principal`, `img_thumbnail`) VALUES
(8, 'Modelo A-400', 'Bordeadora Eléctrica Linea Americana de 400 W con carrete de salida a dos tanzas.\r\nCon empuñadura regulable, el manijón intermedio es regulable, esto permite que el usuario adapte la bordeadora para lograr una mejor postura de acuerdo a sus necesidades.\r\nSE RECOMIENDA DE FÁBRICA EXCLUSIVAMENTE PARA BORDES Y CANTEROS.', 6, 109, 108),
(9, 'Modelo A-500', 'Bordeadora Eléctrica Linea Americana de 500 W con carrete de salida a dos tanzas.\r\nCon empuñadura regulable, el manijón intermedio es regulable, esto permite que el usuario adapte la bordeadora para lograr una mejor postura de acuerdo a sus necesidades.\r\nSE RECOMIENDA DE FÁBRICA EXCLUSIVAMENTE PARA BORDES Y CANTEROS', 6, 114, 113),
(10, 'Modelo AE35', 'La línea AE de Cortadoras de Cesped fue pensada, diseñada y fabricada para todo tipo de exigencias.\r\nCon doble gatillo de encendido para mayor seguridad, altura regulable de dos posiciones y descarga lateral mediante deflector plástico.\r\nFacilidad de uso y potencia que su jardín necesita.', 7, 120, 119),
(11, 'Modelo AE45', 'La línea AE de cortadoras de cesped fue pensada, diseñada y fabricada para todo tipo de exigencias.\r\nCon doble gatillo de encendido para mayor seguridad, altura regulable de dos posiciones y descarga lateral mediante deflector plástico.\r\nFacilidad de uso y potencia que su jardín necesita.', 7, 125, 124),
(12, 'Modelo AE55', 'La línea AE de Cortadoras de Cesped fue pensada, diseñada y fabricada para todo tipo de exigencias.\r\nCon doble gatillo de encendido para mayor seguridad, altura regulable de dos posiciones y descarga lateral mediante deflector plástico.\r\nFacilidad de uso y potencia que su jardín necesita.', 7, 130, 129),
(13, 'Modelo AE65', 'La línea AE de cortadoras de césped fue pensada, diseñada y fabricada para todo tipo de exigencias.\r\nCuenta doble gatillo de encendido para mayor seguridad, altura regulable de dos posiciones y descarga lateral mediante deflector plástico.\r\nFacilidad de uso y potencia que su jardín necesita.', 7, 135, 134),
(14, 'Modelo RAE45', 'La línea RAE de cortadoras de césped fue pensada, diseñada y fabricada para todo tipo de exigencias.\r\nCuenta con recolector plástico, doble gatillo de encendido para mayor seguridad, altura regulable de dos posiciones y descarga lateral mediante deflector plástico.\r\nFacilidad de uso y potencia que su jardín necesita.', 7, 140, 139),
(15, 'Modelo RAE55', 'La línea RAE de cortadoras de césped fue pensada, diseñada y fabricada para todo tipo de exigencias.\r\nCuenta con recolector plástico, doble gatillo de encendido para mayor seguridad, altura regulable de dos posiciones y descarga lateral mediante deflector plástico.\r\nFacilidad de uso y potencia que su jardín necesita.', 7, 157, 142),
(16, 'Extractor Industrial AIRTEC', 'El extractor industrial AIRTEC se presenta como una alternativa de gran eficiencia para aquellos ambientes donde es necesario alto caudal de aire con una distribución uniforme, gran alcance y bajo nivel sonoro en condiciones de contrapresión.\r\nIDEAL PARA USO EN INDUSTRIAS DE:\r\n-Alimentos, Bebidas y Tabaco\r\n-Almacenes de Cadena\r\n-Avícola y Agropecuario\r\n-Cosméticos y Aseo\r\n-Cuero y Calzado\r\n-Empresas de Transportes\r\n-Empresas Publicas\r\n-Hidrocarburos y servicios Petroleros\r\n-Hoteles y Restaurantes\r\n-Industria Grafica, Papel y Cartón.\r\n-Instituciones Educativas\r\n-Madera\r\n-Materiales de Construcción y Ferretería\r\n-Minería\r\n-Muebles y Accesorios\r\n-Plásticos y Caucho\r\n-Productos Farmacéuticos y Laboratorios\r\n-Químicos, Pinturas, Abonos\r\n-Siderúrgicas, Hierro y Aceros\r\n-Telecomunicaciones y TI\r\n-Textiles, Confección y Moda\r\n-Automotrices, Vehículos y Partes\r\n-Vidrio y Productos de Vidrio\r\n-Depósitos', 2, 23, 34),
(17, 'Ventilador AIRTEC', 'Con doble rejilla de protección el ventilador AIRTEC se presenta como una alternativa de alto rendimiento, durabilidad y bajo nivel sonoro para ambientes concurridos.\r\nCuenta con un marco íntegramente de acero galvanizado que posee acoplada la unidad de ventilación, permitiendo un gran caudal de aire.', 2, 71, 70),
(18, 'Ventilador RCCG915', 'El ventilador RCCG915 está diseñado con el objetivo de brindar al cliente un gran caudal de aire, para lo cual se emplean en su construcción materiales de inobjetable calidad, controlados periódicamente y sobredimensionados a su esfuerzo, lo que garantiza su duración y rendimiento a lo largo del tiempo.', 2, 76, 75),
(19, 'Ventilador RCCG1215', 'Diseñado con el objetivo de brindar al cliente un gran caudal de aire, para lo cual se emplean en su construcción materiales de inobjetable calidad, controlados periódicamente y sobredimensionados a su esfuerzo, lo que garantiza su duración y rendimiento a lo largo del tiempo.\r\nRecomendado para establecimientos tamberos y avícolas.', 2, 169, 80),
(20, 'Ventilador RCCG915r', 'La línea de ventiladores redondos RCCG915r está diseñada con el objetivo de brindar al cliente un gran caudal de aire, para lo cual se emplean en su construcción materiales de inobjetable calidad, controlados periódicamente y sobredimensionados a su esfuerzo, lo que garantiza su duración y rendimiento a lo largo del tiempo.', 2, 163, 82),
(21, 'Tableros Para Comando Automático y Manual', 'Desarrollados junto a Ingenieros y técnicos electrónicos la linea CAMPAGNONI de tableros está destinada para el manejo simple y de forma automática los sistemas de riego  y ventilación dentro de las granjas avícolas y porcinos.\r\n<li>Consúltenos por modelos estandarizados<li>', 3, 187, 186),
(22, 'Electrobombas Periféricas / Centrífugas / Trifásicas / Monofásicas', '<li>Ideales para instalaciones avícolas, porcinas y tamberas</li>\r\n<li>Alimentación hídrica</li>\r\n<li>Pequeña jardinería</li>\r\n<li>Aumento de la presión en redes de suministro de agua.</li> \r\n<li>Aseguran una mínima pérdida hidráulica y, al estar diseñadas y fabricadas en Italia, son garantía de alta calidad</li>', 3, 183, 182),
(23, 'Microaspersores y Aspersores', 'Ofrecemos una gama completa de microaspersores y aspersores para usos  en granjas avicolas, porcinas y tambos.\r\n\r\nConsulte por los modelos disponibles.\r\n\r\n¡Asesoramiento personalizado!', 3, 185, 0),
(24, 'Accesorios de Riego', '</li>Cuplas</li>\r\n</li>Valvulas</li>\r\n</li>Codos</li>\r\n</li>Tee</li>\r\ny más accesorios para la instalación completa del sistema de riego.', 3, 0, 0),
(25, 'Manómetros', NULL, 3, 0, 0),
(26, 'Filtros', NULL, 3, 0, 0),
(27, 'Cabezales de riego completo', NULL, 3, 0, 0),
(28, 'Motor AE 32', NULL, 4, 89, 88),
(29, 'Motor AE 36', NULL, 4, 94, 93),
(30, 'Motor AE 45', 'asdfasdf', 4, 99, 98),
(31, 'Motor AE 54', NULL, 4, 104, 103),
(32, 'Estufa Vertical de Cuarzo', 'En la parte inferior presenta su sistema de calefacción infrarroja, de 600 a 1200 watts, con frente mallado y mayor poder radiante para resaltar el sistema de calefacción eléctrico.\r\nIdeal para climatizar su hogar.', 5, 85, 84),
(33, 'Estufa Horizontal de Cuarzo', 'En la parte inferior presenta su sistema de calefacción infrarroja, de 600 a 1200 watts, con frente mallado y mayor poder radiante para resaltar el sistema de calefacción eléctrico.\r\nIdeal para climatizar su hogar.', 5, 87, 86),
(34, 'Modelo E-400', 'Bordeadora Eléctrica  Linea Económica de 400 W con carrete de salida a dos tanzas.\r\nCon empuñadura regulable, el manijón intermedio es regulable, esto permite que el usuario adapte la bordeadora para lograr una mejor postura de acuerdo a sus necesidades.', 6, 159, 158);

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `key`, `value`) VALUES
(5, 6, '1', 'un modelo'),
(6, 6, '2', 'una potencia'),
(7, 6, '3', '1234'),
(370, 32, '11', 'VERTICAL'),
(371, 32, '12', '1200 W'),
(372, 32, '13', '2'),
(373, 32, '14', '28x62x28'),
(374, 32, '15', '1,2 kg'),
(375, 33, '11', 'HORIZONTAL'),
(376, 33, '12', '1200 W'),
(377, 33, '13', '2'),
(378, 33, '14', '62x28x28'),
(379, 33, '15', '1,2 kg'),
(380, 28, '37', 'AE 32'),
(381, 28, '38', '700 W'),
(382, 28, '39', '3.2 A'),
(383, 28, '40', '12.5 mF 400V'),
(384, 28, '41', '2840'),
(385, 28, '42', '32 mm'),
(386, 29, '37', 'AE 36'),
(387, 29, '38', '1000 W'),
(388, 29, '39', '3.8 A'),
(389, 29, '40', '12.5 mF 400V'),
(390, 29, '41', '2840'),
(391, 29, '42', '36 mm'),
(398, 31, '37', 'AE 54'),
(399, 31, '38', '1600 W'),
(400, 31, '39', '5.5 A'),
(401, 31, '40', '20 mF 400V'),
(402, 31, '41', '2840'),
(403, 31, '42', '54mm'),
(494, 30, '37', 'AE 45'),
(495, 30, '38', '1400 W'),
(496, 30, '39', '4.5 A'),
(497, 30, '40', '16 mF 400V'),
(498, 30, '41', '2840'),
(499, 30, '42', '45 mm'),
(823, 13, '24', 'Standart AE65'),
(824, 13, '25', '1 1/2 HP'),
(825, 13, '26', 'Si'),
(826, 13, '27', 'Doble Rodamiento'),
(827, 13, '28', 'Acero'),
(828, 13, '29', '470 mm'),
(829, 13, '30', '160 mm'),
(830, 13, '31', '2'),
(831, 13, '32', '30-50 mm'),
(832, 13, '33', 'Lateral con Protección'),
(833, 13, '35', '15,2'),
(834, 13, '36', '16,2'),
(835, 11, '24', 'Standart AE45'),
(836, 11, '25', '3/4 HP'),
(837, 11, '26', 'Consultar'),
(838, 11, '27', 'Doble Rodamiento'),
(839, 11, '28', 'Acero'),
(840, 11, '29', '360 mm'),
(841, 11, '30', '135 mm'),
(842, 11, '31', '2'),
(843, 11, '32', '30-50 mm'),
(844, 11, '33', 'Lateral c/ Protección'),
(845, 11, '35', '10,5'),
(846, 11, '36', '11,5'),
(847, 10, '24', 'Standart AE35'),
(848, 10, '25', '1/2 HP'),
(849, 10, '26', 'Consultar'),
(850, 10, '27', 'Doble Rodamiento'),
(851, 10, '28', 'Acero'),
(852, 10, '29', '360 mm'),
(853, 10, '30', '135 mm'),
(854, 10, '31', '2'),
(855, 10, '32', '30-50 mm'),
(856, 10, '33', 'Lateral con Protección'),
(857, 10, '35', '10,5'),
(858, 10, '36', '11'),
(859, 12, '24', 'Standart AE55'),
(860, 12, '25', '1 HP'),
(861, 12, '26', 'Consultar'),
(862, 12, '27', 'Doble Rodamiento'),
(863, 12, '28', 'Acero'),
(864, 12, '29', '360 mm'),
(865, 12, '30', '135 mm'),
(866, 12, '31', '2'),
(867, 12, '32', '30-50 mm'),
(868, 12, '33', 'Lateral c/Proteccion'),
(869, 12, '35', '11'),
(870, 12, '36', '12'),
(965, 18, '1', 'RCCG915'),
(966, 18, '3', '1,4'),
(967, 18, '4', '1,10x1,10'),
(968, 18, '6', 'A51'),
(969, 18, '7', '29.600'),
(970, 18, '43', '12 meses'),
(971, 20, '1', 'RCCG915r'),
(972, 20, '3', '1,4'),
(973, 20, '4', '0,915'),
(974, 20, '6', 'A51'),
(975, 20, '7', '29.600'),
(976, 20, '43', '6 meses'),
(977, 19, '1', 'RCCG1215'),
(978, 19, '3', '2'),
(979, 19, '4', '1,40x1,40'),
(980, 19, '5', '486'),
(981, 19, '6', 'A63'),
(982, 19, '7', '51.480'),
(983, 19, '10', '45'),
(984, 19, '43', '12 meses'),
(995, 34, '16', 'E-400'),
(996, 34, '17', '400'),
(997, 34, '18', 'Plastico'),
(998, 34, '19', '260'),
(999, 34, '20', '2,2'),
(1000, 34, '21', 'Hogareño'),
(1001, 34, '22', 'Regulable'),
(1002, 34, '23', '1,5'),
(1003, 8, '16', 'A-400'),
(1004, 8, '17', '400'),
(1005, 8, '18', 'Plastico'),
(1006, 8, '19', '260'),
(1007, 8, '20', '2.4'),
(1008, 8, '21', 'Hogareño'),
(1009, 8, '22', 'Regulable'),
(1010, 8, '23', '1.5'),
(1011, 9, '16', 'A-500'),
(1012, 9, '17', '500'),
(1013, 9, '18', 'Plastico'),
(1014, 9, '19', '260'),
(1015, 9, '20', '2.4'),
(1016, 9, '21', 'Hogareño'),
(1017, 9, '22', 'Regulable'),
(1018, 9, '23', '1.5'),
(1019, 17, '1', 'AIRTEC'),
(1020, 17, '3', '2'),
(1021, 17, '4', '1,40x1,40'),
(1022, 17, '5', '489'),
(1023, 17, '6', 'A93'),
(1024, 17, '7', '51.480'),
(1025, 17, '10', '76'),
(1026, 17, '43', '12 meses'),
(1027, 16, '1', 'AIRTEC 1215'),
(1028, 16, '3', '2.9'),
(1029, 16, '4', '1,40x1,40'),
(1030, 16, '5', '451'),
(1031, 16, '6', 'A93'),
(1032, 16, '7', '54.700'),
(1033, 16, '8', '24'),
(1034, 16, '9', '75'),
(1035, 16, '10', '90'),
(1036, 16, '43', '12 meses'),
(1063, 14, '24', 'Standart RAE45'),
(1064, 14, '25', '3/4 HP'),
(1065, 14, '26', 'Si'),
(1066, 14, '27', 'Doble Rodamiento'),
(1067, 14, '28', 'Acero'),
(1068, 14, '29', '400 mm'),
(1069, 14, '30', '135 mm//160 mm'),
(1070, 14, '31', '2'),
(1071, 14, '32', '30-50 mm'),
(1072, 14, '33', 'Posterior'),
(1073, 14, '34', '30 litros'),
(1074, 14, '35', '13,5'),
(1075, 14, '36', '14,5'),
(1076, 15, '24', 'Standart RAE55'),
(1077, 15, '25', '1 HP'),
(1078, 15, '26', 'Si'),
(1079, 15, '27', 'Doble Rodamiento'),
(1080, 15, '28', 'Acero'),
(1081, 15, '29', '400 mm'),
(1082, 15, '30', '135 mm//160 mm'),
(1083, 15, '31', '2'),
(1084, 15, '32', '30-50 mm'),
(1085, 15, '33', 'Posterior'),
(1086, 15, '34', '30 litros'),
(1087, 15, '35', '14,3'),
(1088, 15, '36', '15,3');

-- --------------------------------------------------------

--
-- Table structure for table `products_category_attributes`
--

CREATE TABLE `products_category_attributes` (
  `id` int UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_category_attributes`
--

INSERT INTO `products_category_attributes` (`id`, `category_id`, `key`) VALUES
(1, 2, 'Modelo'),
(3, 2, 'Consumo (A)'),
(4, 2, 'Dimensiones (m)'),
(5, 2, 'RPM'),
(6, 2, 'Correa'),
(7, 2, 'Caudal (m3/h)'),
(8, 2, 'Depresión Max (Pa)'),
(9, 2, 'Nivel presión Sonora (dB)'),
(10, 2, 'Peso (kg)'),
(11, 5, 'Modelo'),
(12, 5, 'Potencia'),
(13, 5, 'Niveles de temperatura'),
(14, 5, 'Dimensiones'),
(15, 5, 'Peso'),
(16, 6, 'Modelo'),
(17, 6, 'Potencia Máxima (W)'),
(18, 6, 'Material de Carcasa'),
(19, 6, 'Diametro Corte (mm)'),
(20, 6, 'Peso'),
(21, 6, 'Tipo de uso'),
(22, 6, 'Manija'),
(23, 6, 'Diametro de Tanza (mm)'),
(24, 7, 'Modelo'),
(25, 7, 'Potencia'),
(26, 7, 'Freno de seguridad'),
(27, 7, 'Motor'),
(28, 7, 'Chasis'),
(29, 7, 'Diametro de corte'),
(30, 7, 'Diametro ruedas'),
(31, 7, 'Posiciones'),
(32, 7, 'Altura de corte'),
(33, 7, 'Descarga'),
(34, 7, 'Capacidad recolector'),
(35, 7, 'Peso'),
(36, 7, 'Packaging'),
(37, 4, 'Modelo'),
(38, 4, 'Potencia'),
(39, 4, 'Corriente'),
(40, 4, 'Capacitor'),
(41, 4, 'RPM'),
(42, 4, 'Altura paco'),
(43, 2, 'Garantía'),
(44, 7, 'Garantía'),
(45, 3, 'Microaspersor 7 litros/hora tipo Israelí');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'contact_email', 'info@campagnoni.com.ar'),
(2, 'facebook_fan_page', 'https://www.facebook.com/campagnoni/'),
(3, 'youtube_fan_page', 'https://www.youtube.com/watch?v=jN2T5Vt3Q5o'),
(5, 'meta-title', 'Campagnoni motores, Campagnoni ventiladores, Campagnoni cortadoras de cesped, Campagnoni reparacion motores electricos'),
(6, 'meta-description', 'Fabrica de motores electricos, Fabrica de cortacesped electricas,cortadoras de cesped electricas, bordeadoras de cesped ventiladores avicolas industriales, reparacion bobinados de motores electricos, Campagnoni motores, Campagnoni Motores electricos, Motores electricos argentina, Motores electricos, ventiladores crespo entre rios, ventiladores para tambos, motores electricos Crespo entre rios');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `link`) VALUES
(1, 'Slider Home', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@campagnoni.com.ar', '$2y$10$B7T.HQD91EfgzfQCm/kcMOEZnG9NIwjxB1ZiyeuAXqHGCwt6aCuTi', 'wZDwWYAZ7zUZaHZOGBKBC9scvxPnJDmc9FW5rRPwBw42N2yYtfQEDoEvReg1', '2017-07-26 03:50:05', '2017-07-26 03:50:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_category_attributes`
--
ALTER TABLE `products_category_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1089;

--
-- AUTO_INCREMENT for table `products_category_attributes`
--
ALTER TABLE `products_category_attributes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
