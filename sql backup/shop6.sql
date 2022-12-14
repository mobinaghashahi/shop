-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2020 at 01:38 PM
-- Server version: 5.7.31-cll-lve
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `univir_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` int(20) NOT NULL,
  `date` int(10) NOT NULL,
  `state` int(11) NOT NULL,
  `idPerson_fk` int(20) NOT NULL,
  `idCourse_fk` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(20) NOT NULL,
  `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `price` int(10) NOT NULL DEFAULT '0',
  `time` int(5) NOT NULL DEFAULT '0',
  `size` int(11) NOT NULL DEFAULT '0',
  `idProfessor_fk` int(20) NOT NULL DEFAULT '0',
  `description` varchar(1000) COLLATE utf8_persian_ci NOT NULL DEFAULT 'نامعلوم',
  `degreeOfEducation` varchar(20) COLLATE utf8_persian_ci DEFAULT 'نامعلوم',
  `state` int(2) NOT NULL DEFAULT '0',
  `idMajor_fk` int(20) NOT NULL DEFAULT '0',
  `titles` varchar(1000) COLLATE utf8_persian_ci NOT NULL DEFAULT 'نامعلوم',
  `idGroup_fk` int(20) NOT NULL DEFAULT '0',
  `idGrayesh_fk` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `price`, `time`, `size`, `idProfessor_fk`, `description`, `degreeOfEducation`, `state`, `idMajor_fk`, `titles`, `idGroup_fk`, `idGrayesh_fk`) VALUES
(1, 'آموزش تخصصی و پروژه محور GIS', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 6, 1),
(2, 'آموزش تخصصی و پروژه محور data mine', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 6, 2),
(3, 'آموزش تخصصی و پروژه محور surpac', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 6, 2),
(4, 'آموزش جامع و تخصصی نرم افزار UDEC', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 6, 3),
(6, 'آموزش تخصصی و جامع نرم افزار  FLAC 3D', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 6, 3),
(7, 'آموزش تخصصی و جامع PLAXIS 2D ', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 6, 3),
(8, 'آموزش تخصصی و جامع PLAXIS 3D Tunnel', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 6, NULL),
(9, 'آموزش جامع و تخصصی نرم افزار PLAXIS 3D', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 6, NULL),
(10, 'آموزش جامع و تخصصی نرم افزار 3DEC ', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 6, 3),
(11, 'آموزش جامع و تخصصی نرم افزار FLAC 3D', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 6, NULL),
(12, 'آموزش جامع و تخصصی نرم افزار ABAQUS', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 6, 3),
(13, 'آموزش تخصصی و جامع PFC', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 6, 3),
(14, 'آموزش تخصصی نرم افزار اتوکد ', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 6, 3),
(15, 'آموزش پروژه محور نرم افزار دیگسایلنت ', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 4),
(16, 'آموزش پروژه محور نرم افزار pvsyst', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 4),
(17, 'آموزش پروژه محور نرم افزار etap ', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 4),
(18, 'آموزش پروژه محور نرم افزار Eplan', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 4),
(19, 'آموزش پروژه محور نرم افزار اتوکد الکتریکال', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 4),
(20, 'آموزش نرم افزار متلب برای رشته مهندسی برق قدرت', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 4),
(21, 'آموزش نرم افزار انسیس ماکسول (ANSIS MAXWELL)', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 4),
(22, 'آموزش جامع گمز برای گرایش قدرت و ارتباط با متلب', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 4),
(23, 'آموزش نرم افزار PS CAD', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 4),
(24, 'آموزش  پروژه محور نرم افزار HFSS', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 5),
(25, 'آموزش پروژه محور طراحی مدارات مخابراتی در محیط layout با نرم افزار ADS', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 5),
(26, 'آموزش تخصصی متلب برای مهندسی مخابرات', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 5),
(27, 'آموزش پروژه محور نرم افزار Advanced design system ', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 5),
(28, 'آموزش پروژه محور نرم افزار AWR microwave office ', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 5),
(29, 'آموزش تخصصی هوش مصنوعی', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 5),
(30, 'آموزش تخصصی جعبه ابزار یادگیری ماشین', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 5),
(31, 'آموزش تخصصی پروتئوس', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 5),
(32, 'آموزش تخصصی نرم افزار CST', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 5),
(33, 'آموزش تخصصی متلب برای مهندسی کنترل', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 6),
(34, 'آموزش تخصصی و پروژه محور TIA PORTAL', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 6),
(35, 'آموزش تخصصی و پروژه محور PLC', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 6),
(36, 'آموزش تخصصی و پروؤه محور کد نویسی میکرو کنترلر ها  بصورت تفکیک شده', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 7),
(37, 'آموزش تخصصی و پروژه محور FPGA', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 7),
(38, 'آموزش تخصصی و پروژه محور طراحی بردهای الکترونیکی با نرم افزار Altium designer', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 7),
(39, 'آموزش تخصصی و پروژه محور آردوینو', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 7),
(40, 'آموزش تخصصی و پروژه محور هوشمند سازی خانه ها BMS', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 7, 7),
(41, 'آموزش تخصصی و پروژه محور 3D MAX', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 4, 'نامعلوم', 8, NULL),
(42, 'آموزش تخصصی و پروژه محور اتوکد ', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 4, 'نامعلوم', 8, 0),
(43, 'آموزش تخصصی و پروژه محور ETABS', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 4, 'نامعلوم', 8, NULL),
(44, 'آموزش تخصصی و پروژه محور SAP', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 4, 'نامعلوم', 8, NULL),
(45, 'آموزش تخصصی و پروژه محور رویت Revit', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 4, 'نامعلوم', 8, NULL),
(46, 'دوره آموزش جامع C++', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 9, NULL),
(47, 'دوره آموزش جامع فوتوشاپ (photoshop)', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 9, NULL),
(48, 'دوره آموزش جامع illustrator', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 9, NULL),
(49, 'دوره آموزش جامع پریمیرpremier ', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 9, NULL),
(50, 'دوره آموزش جامع coreldraw', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 9, NULL),
(51, 'دوره آموزش جامع هوش مصنوعی', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 9, NULL),
(52, 'دوره جامع آموزش پروژه محور پایتون', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 9, NULL),
(53, 'دوره آموزش جامع برنامه نویسی c', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 9, NULL),
(54, 'دوره جامع آموزش php storm', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 9, NULL),
(55, 'دوره جامع آموزش my SQL ', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 9, NULL),
(56, 'دوره جامع آموزش متلب ', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 9, NULL),
(57, 'آموزش تخصصی و پروژه محور سالیدورک', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 10, NULL),
(58, 'آموزش تخصصی و پروژه محور اتوکد', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 10, NULL),
(59, 'آموزش تخصصی پروژه محور Ansys', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 10, NULL),
(60, 'آموزش تخصصی و پروژه محور Comsol multiphysics', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 10, NULL),
(61, 'آموزش تخصصی متلب برای مهندسی مکانیک', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 10, NULL),
(62, 'آموزش تخصصی و پروژه محور Catia', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 10, NULL),
(63, 'آموزش تخصصی و پروژه محور Design Builder ', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 10, NULL),
(64, 'آموزش تخصصی و پروژه محور ABAQUS', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 10, NULL),
(65, 'آموزش تخصصی و پروژه محور گمز', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 6, 'نامعلوم', 11, NULL),
(66, 'آموزش تخصصی و پروژه محور Msp', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 6, 'نامعلوم', 11, NULL),
(67, 'آموزش تخصصی و پروژه محور متلب برای مهندسی صنایع', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 6, 'نامعلوم', 11, NULL),
(68, 'آموزش تخصصی متلب برای مهندسی مواد', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 7, 'نامعلوم', 12, NULL),
(69, 'آموزش تخصصی و پروژه محور ایویوز', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 13, NULL),
(70, 'آموزش تخصصی و پروژه محور استاتا', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 13, NULL),
(71, 'آموزش تخصصی و پروژه محور SPSS', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 13, NULL),
(72, 'آموزش تخصصی و پروژه محور هلو', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 13, NULL),
(73, 'آموزش تخصصی و پروژه محور محک', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 13, NULL),
(74, 'آموزش تخصصی و پروژه محور ماندگار', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 13, NULL),
(75, 'آموزش تخصصی و پروژه محور ماتریس', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 13, NULL),
(76, 'آموزش تخصصی و پروژه محور همکاران سیستم', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 13, NULL),
(77, 'آموزش درس ریاضی 1 عمومی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 14, NULL),
(78, 'آموزش درس فیزیک 1 عمومی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 14, NULL),
(79, 'آموزش درس ریاضی 2 عمومی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 14, NULL),
(80, 'آموزش درس فیزیک 2 عمومی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 14, NULL),
(81, 'آموزش درس معادلات  با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 14, NULL),
(82, 'آموزش درس محاسبات عددی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 14, NULL),
(83, 'آموزش درس ریاضی مهندسی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 14, NULL),
(84, 'آموزش درس برنامه نویسی کامپیوتر عمومی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانش', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 14, NULL),
(85, 'آموزش آمار و احتمال مهندسی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معت', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 14, NULL),
(86, 'آموزش درس مدارهای الکتریکی 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(87, 'آموزش درس مدارهای الکتریکی 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(88, 'آموزش درس ماشین های الکتریکی 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(89, 'آموزش درس ماشین های الکتریکی 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(90, 'آموزش درس تحلیل سیستم انرژی 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(91, 'آموزش درس تحلیل سیستم انرژی 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(92, 'آموزش درس تاسیسات الکتریکی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(93, 'آموزش درس الکترونیک 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(94, 'آموزش درس الکترونیک 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(95, 'آموزش درس الکترومغناطیس با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(96, 'آموزش درس مخابرات 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(97, 'آموزش درس کنترل سیستم های خطی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(98, 'آموزش درس مدارهای منطقی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(99, 'آموزش درس الکترونیک صنعتی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(100, 'آموزش درس ماشین های الکتریکی 3 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(101, 'آموزش درس مدارهای مخابراتی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(102, 'آموزش درس مبانی تحقیق در عملیات با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(103, 'آموزش درس عایق و فشارقوی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(104, 'آموزش درس حفاظت سیستم های الکتریکی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(105, 'آموزش درس طراحی پست با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 3, 'نامعلوم', 15, NULL),
(106, 'آموزش درس استاتیک با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 16, NULL),
(107, 'آموزش درس شیمی عمومی  با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 16, NULL),
(108, 'آموزش درس شیمی فیزیک با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 16, NULL),
(109, 'آموزش درس مقاومت مصالح با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 16, NULL),
(110, 'آموزش درس مبانی کانه آرایی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 16, NULL),
(111, 'آموزش درس فیزیک3 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 16, NULL),
(112, 'آموزش درس مکانیک سیالات با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 2, 'نامعلوم', 16, NULL),
(113, 'آموزش درس مبانی مهندسی برق 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 17, NULL),
(114, 'آموزش درس مبانی مهندسی برق 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 17, NULL),
(115, 'آموزش درس استاتیک با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 17, NULL),
(116, 'آموزش درس دینامیک  با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 17, NULL),
(117, 'آموزش درس مقاومت مصالح 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 17, NULL),
(118, 'آموزش درس علم مواد  با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 17, NULL),
(119, 'آموزش درس ترمودینامیک 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 17, NULL),
(120, 'آموزش درس ترمودینامیک 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 17, NULL),
(121, 'آموزش درس مکانیک سیالات 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 17, NULL),
(122, 'آموزش درس مکانیک سیالات 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 17, NULL),
(123, 'آموزش درس طراحی اجزا 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 17, NULL),
(124, 'آموزش درس طراحی اجزا 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 17, NULL),
(125, 'آموزش درس دینامیک ماشین با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 5, 'نامعلوم', 17, NULL),
(126, 'آموزش درس مقاومت مصالح 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 4, 'نامعلوم', 18, NULL),
(127, 'آموزش درس مقاومت مصالح 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 4, 'نامعلوم', 18, NULL),
(128, 'آموزش درس مکانیک سیالات با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 4, 'نامعلوم', 18, NULL),
(129, 'آموزش درس تحلیل سازه 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 4, 'نامعلوم', 18, NULL),
(130, 'آموزش درس تحلیل سازه 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 4, 'نامعلوم', 18, NULL),
(131, 'آموزش درس سازه های بتن آرمه 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 4, 'نامعلوم', 18, NULL),
(132, 'آموزش درس سازه های بتن آرمه 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 4, 'نامعلوم', 18, NULL),
(133, 'آموزش درس اصول مهندسی زلزله با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 4, 'نامعلوم', 18, NULL),
(134, 'آموزش درس مبانی کامپیوتر و برنامه سازی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 19, NULL),
(135, 'آموزش درس برنامه سازی پیشرفته با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 19, NULL),
(136, 'آموزش درس مدارهای الکتریکی 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 19, NULL),
(137, 'آموزش درس ساختمان داده با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 19, NULL),
(138, 'آموزش درس زبان ماشین و اسمبلی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 19, NULL),
(139, 'آموزش درس هوش مصنوعی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 1, 'نامعلوم', 19, NULL),
(140, 'آموزش درس جبر خطی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 6, 'نامعلوم', 20, NULL),
(141, 'آموزش درس تحقیق در عملیات 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 6, 'نامعلوم', 20, NULL),
(142, 'آموزش درس تحقیق در عملیات 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 6, 'نامعلوم', 20, NULL),
(143, 'آموزش درس مبانی مهندسی برق با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 6, 'نامعلوم', 20, NULL),
(144, 'آموزش درس علم مواد  با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 6, 'نامعلوم', 20, NULL),
(145, 'آموزش درس شیمی عمومی با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 7, 'نامعلوم', 21, NULL),
(146, 'آموزش درس شیمی فیزیک با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 7, 'نامعلوم', 21, NULL),
(147, 'آموزش درس خواص مکانیکی مواد با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 7, 'نامعلوم', 21, NULL),
(148, 'آموزش درس اصول حسابداری 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 22, NULL),
(149, 'آموزش درس اصول حسابداری 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 22, NULL),
(150, 'آموزش درس اصول حسابداری 3 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 22, NULL),
(151, 'آموزش درس حسابداری صنعتی 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 22, NULL),
(152, 'آموزش درس حسابداری صنعتی 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 22, NULL),
(153, 'آموزش درس اصول علم اقتصاد کلان 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 22, NULL),
(154, 'آموزش درس اصول علم اقتصاد کلان 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 22, NULL),
(155, 'آموزش درس حسابداری پیشرفته 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 22, NULL),
(156, 'آموزش درس حسابداری پیشرفته 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 8, 'نامعلوم', 22, NULL),
(157, 'آموزش درس طرح معماری 1 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 10, 'نامعلوم', 23, NULL),
(158, 'آموزش درس طرح معماری 2 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 10, 'نامعلوم', 23, NULL),
(159, 'آموزش درس طرح معماری 3 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 10, 'نامعلوم', 23, NULL),
(160, 'آموزش درس طرح معماری 4 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 10, 'نامعلوم', 23, NULL),
(161, 'آموزش درس طرح معماری 5 با حل مثال‌ها و تمرینات  کاربردی با استفاده از  کتاب مرجع دانشگاه های معتبر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 10, 'نامعلوم', 23, NULL),
(162, 'آموزش تخصصی نوشتن مقاله در ژورنالهای داخلی ', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 24, NULL),
(163, 'آموزش تخصصی نوشتن مقالات در ژورنال الزویر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 25, NULL),
(164, 'آموزش تخصصی  نوشتن مقالات در ژورنال IEEE', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 25, NULL),
(165, 'آموزش تخصصی نوشتن مقالات در ژورنال اشپرینگر', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 25, NULL),
(166, 'آموزش تخصصی همراه با نمونه پروپوزال جهت تدوین کامل پروپوزال ارشد', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 26, NULL),
(167, 'آموزش تخصصی همراه با نمونه پروپوزال جهت تدوین کامل پروپوزال دکترا', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 26, NULL),
(168, 'آموزش تدوین و نوشتن کامل پایان نامه کارشناسی همراه با نمونه پایان نامه', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 27, NULL),
(169, 'آموزش تدوین و نوشتن کامل پایان نامه ارشد', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 28, NULL),
(170, 'آموزش کامل نحوه همانند جویی مقالات توسط نرم افزار', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 29, NULL),
(171, 'آموزش تخصصی و پیشرفته ورد', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 38, NULL),
(172, 'آموزش تخصصی ویرایش کامل پایان نامه', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 38, NULL),
(173, 'آموزش تخصصی ویرایش کامل مقالات', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 38, NULL),
(174, 'آموزش تخصصی و پیشرفته پاور پوینت', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 39, NULL),
(175, 'آموزش تخصصی تدوین پاورپوینت جهت ارائه های دفاع و کلاسی', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 39, NULL),
(176, 'آموزش تخصصی فن بیان جهت ارائه ها و سخنرانی ها بدون هیچگونه استرس', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 40, NULL),
(177, 'آموزش تخصصی برای آمادگی آزمون آیلتس ', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 41, NULL),
(178, 'آموزش تخصصی برای آمادگی آزمون تافل', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 41, NULL),
(179, 'آموزش تخصصی و پیشرفته ارائه یک رزومه عالی جهت شرکت ها و صنایع', 0, 0, 0, 0, 'نامعلوم', 'نامعلوم', 0, 9, 'نامعلوم', 42, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grayesh`
--

CREATE TABLE `grayesh` (
  `id` int(20) NOT NULL,
  `name` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `grayesh`
--

INSERT INTO `grayesh` (`id`, `name`) VALUES
(0, 'ندارد'),
(1, 'اکتشاف'),
(2, 'استخراج'),
(3, 'مکانیک سنگ'),
(4, ' قدرت'),
(5, ' مخابرات'),
(6, ' کنترل'),
(7, ' الکترونیک');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(20) NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `describtion` varchar(1000) CHARACTER SET utf32 COLLATE utf32_persian_ci NOT NULL,
  `idTitle_fk` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `describtion`, `idTitle_fk`) VALUES
(1, 'نیازمندی های بازار کار مهندسی', 'امروزه بازار کار رشته های مهندسی به دلیل قیمت بالای منابع و ادوات به شدت نیاز به مهندسان دارای متخصص داشته و این امر بخصوص در این رشته ها به علت عدم وجود متخصصان کاربلد و فقط دارای مدرک مهندسی بصورت یک رشته اشباع شده، مهندسی را در مدار قرار داده است. درحالیکه واقعیت امر چیز دیگری است و با چندین مصاحبه با افراد متخصص به نتایج مهمی دست یافته ایم که در قالب وبینارهای مختلف ارائه میگردند. بازار کار نیاز شدید به افراد متخصص دارد. صرفا با مدرک دانشگاهی نمیتوان جذب امور صنعتی شد و نیاز به تخصص‌های عملی نرم افزاری دارد. باید به این نکته توجه داشت که نیاز به دریافت مدارک فنی حرفه ای نبوده و فقط تخصص و کارکرد با نرم افزار مهم میباشد. با توجه به این نکات هیچ مهندسی که دارای تخصص نرم افزاری و صنعتی باشد بیکار نمانده و جذب میشود.', 1),
(2, 'خلاءهای موجود در دانشگاه', 'امروزه سیستم دانشگاهی رشته های مهندسی به علت عدم وجود ارتباط مناسب با صنعت دارای نواقص مهمی بوده و محدود بودن این مرکز آموزش به پاس شدن و ارائه مقاله و پایان نامه محدودیت های زیادی برای فارغ التحصیلان این رشته ها ایجاد کرده است و این عدم ارتباط بازار این رشته ها را برای افراد غیرمتخصص اشباع نموده و لذا با توجه به اینکه برگزاری دوره‌های صنعتی در رشته های مختلف در مراکز فنی حرفه ای و آموزشگاه ها نیازمند هزینه های گزاف حتی در حد چند میلیون می باشد ما در این موضوع با یک بررسی جامع درصدد ارائه آموزشهای پروژه محوری برای رشته های مختلف جهت ورود به بازار کار با توجه به جامعه آماری بالا و کاهش هزینه ها بر آمده ایم لذا از شما دوستان خواستاریم آموزش ها فقط از طریق سایت و با خرید قانونی مورد استفاده قرار گیرد تا بتوانیم دوره های کاربردی بیشتری برای شما مهندسان عزیز ارائه دهیم.', 1),
(4, 'راهکارهایی جهت بهبود بازارکار رشته های مهندسی ', 'ایجاد رابطه مستقیم از ترم های اخر با صنعت و اضافه کردن دروس عملی در صنایع مختلف<br>\r\nارائه مشکلات صنعتی به دانشگاه ها و حل توسط متخصصین و دانشجویان دانشگاه<br>\r\nحذف دروس بسیار عمومی و یا تلفیق واحدهای درسی تئوری و بجای آنها اضافه کردن دروس عملی<br>\r\nهمانند رشته های علوم پزشکی، رشته های مهندسی هم در آستانه ورود به صنعت قرار گرفته و ورودی این رشته ها کنترل گردد<br>\r\nحذف موضوعات خیلی قدیمی از کتب و ارائه موضوعات و معضلات جدید در صنعت در قالب واحدهای درسی و پایان نامه<br>\r\nبوجود آوردن دوره های آموزش نرم افزاری با دید پروژه محور در دانشگاه ها<br>', 1),
(5, 'آزمون های نظام مهندسی', 'آزمونهای نظام مهندسی یکی از آزمونهای جامع و راه ورود به بازارهای مهندسی بوده که البته نیاز به دانش نرم افزاری و تخصص در این خصوص را دارد این آزمونها بصورت دو بار در سال برگزار شده و آزمون از طرف سازمان سنجش بصورت کتاب باز ارائه میشود و هرساله سیل عظیمی از مهندسان را به حیطه های عملی مربوطه وارد میکند. لذا با توجه به این مباحث در صدد ارائه سمینارهایی جهت ارائه نوع و نحوه برگزاری آزمون در رشته های مختلف هستیم.', 1),
(6, 'رشته مهندسی معدن', '', 2),
(7, 'رشته مهندسی برق', '', 2),
(8, 'رشته مهندسی عمران', '', 2),
(9, 'رشته مهندسی کامپیوتر', '', 2),
(10, 'رشته مهندسی مکانیک', '', 2),
(11, 'رشته مهندسی صنایع', '', 2),
(12, 'رشته مهندسی مواد', '', 2),
(13, 'رشته حسابداری', '', 2),
(14, 'دروس عمومی رشته ها', '', 6),
(15, 'دروس تخصصی رشته برق', '', 6),
(16, 'دروس تخصصی رشته معدن', '', 6),
(17, 'دروس تخصصی رشته مکانیک', '', 6),
(18, 'دروس تخصصی رشته عمران', '', 6),
(19, 'دروس تخصصی رشته کامپیوتر', '', 6),
(20, 'دروس تخصصی رشته مهندسی صنایع', '', 6),
(21, 'دروس تخصصی رشته مهندسی مواد', '', 6),
(22, 'دروس تخصصی رشته حسابداری', '', 6),
(23, 'دروس تخصصی رشته معماری', '', 6),
(24, 'مقاله داخلی', '', 3),
(25, 'مقاله ISI', '', 3),
(26, 'پروپوزال نویسی', '', 3),
(27, 'پایان نامه کارشناسی', '', 3),
(28, 'پایان نامه ارشد', '', 3),
(29, 'همانندجویی مقالات', '', 3),
(30, 'مشاوره رشته برق', '', 4),
(31, 'مشاوره رشته معدن', '', 4),
(32, 'مشاوره رشته عمران', '', 4),
(33, 'مشاوره رشته کامپیوتر', '', 4),
(34, 'مشاوره رشته مکانیک', '', 4),
(35, 'مشاوره رشته صنایع', '', 4),
(36, 'مشاوره رشته مواد', '', 4),
(37, 'مشاوره رشته حسابداری', '', 4),
(38, 'دوره جامع آموزش Word', '', 5),
(39, 'دوره جامع آموزش Power Point', '', 5),
(40, 'دوره جامع آموزش فن بیان', '', 5),
(41, 'دوره جامع آزمون های تافل و آیلتس', '', 5),
(42, 'دوره جامع آموزش رزومه نویسی', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `id` int(20) NOT NULL,
  `name` varchar(20) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`id`, `name`) VALUES
(1, 'مهندسی کامپبوتر'),
(2, 'مهندسی معدن'),
(3, 'مهندسی برق'),
(4, 'مهندسی عمران'),
(5, 'مهندسی مکانیک'),
(6, 'مهندسی صنایع'),
(7, 'مهندسی مواد'),
(8, 'حسابداری'),
(9, 'عمومی'),
(10, 'معماری');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `id` int(20) NOT NULL,
  `name` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `family` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `cv` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `evidence` varchar(20) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`id`, `name`, `family`, `cv`, `evidence`) VALUES
(0, 'نامعلوم', 'نامعلوم', 'نامعلوم', 'نامعلوم'),
(1, 'مبین', 'آقاشاهی', 'دانشگاه صنعتی سیرجان', 'کارشناسی');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `name`) VALUES
(1, 'خانه'),
(2, 'آموزش تخصصی نرم افزار'),
(3, 'مقاله و پایان نامه نویسی'),
(4, 'مشاوره امور صنعتی و بازار کار رشته ها'),
(5, 'دوره های عمومی'),
(6, 'آموزش دروس دانشگاه');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL DEFAULT 'کاربر',
  `family` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(20) NOT NULL,
  `access` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `family`, `number`, `password`, `access`) VALUES
(1, 'mobinaghashahi13@gmail.com', 'مبین', 'آقاشاهی', '09132618917', '00981920', 1),
(4, 'Talagolzar@gmail.com', 'کاربر', '', '', 'Asd1234_@@', 0),
(5, 'a@a.com', 'کاربر', '', '', '456123789', 0),
(6, 'hassanpsk@gmail.com', 'کاربر', '', '', '11111111', 0),
(7, 'ida.jahansha@gmail.com', 'کاربر', '', '', '09120327495', 0),
(8, 'reyhane.vaziri@aut.ac.ir', 'کاربر', '', '', 'mobinmobin', 0),
(9, 'danyel.bagheri3113@gmail.com', 'دانیال', 'باقری', '09129231997', '6770016842', 1),
(10, 'h@h', 'کاربر', '', '', '12345678', 0),
(11, 'j@gmail.com', 'مبین', '', '', '00981920', 0),
(13, '09132616941', 'محمد مهدی', 'رضاپور', '', '00981920', 0),
(14, 'aw@s', 'متین', 'رضاپور', '112', '00981920', 0),
(15, 'aeee@ss', '', 'کیوان', '0913548798', '00981920', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCourse_fk` (`idCourse_fk`),
  ADD KEY `idPerson_fk` (`idPerson_fk`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idGroup_fk` (`idGroup_fk`),
  ADD KEY `idMajor_fk` (`idMajor_fk`),
  ADD KEY `idProfessor_fk` (`idProfessor_fk`),
  ADD KEY `idGrayesh_fk` (`idGrayesh_fk`);

--
-- Indexes for table `grayesh`
--
ALTER TABLE `grayesh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTitle_fk` (`idTitle_fk`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `grayesh`
--
ALTER TABLE `grayesh`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `buy_ibfk_1` FOREIGN KEY (`idCourse_fk`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buy_ibfk_2` FOREIGN KEY (`idPerson_fk`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`idGroup_fk`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`idMajor_fk`) REFERENCES `major` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_ibfk_3` FOREIGN KEY (`idProfessor_fk`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_ibfk_4` FOREIGN KEY (`idGrayesh_fk`) REFERENCES `grayesh` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`idTitle_fk`) REFERENCES `title` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
