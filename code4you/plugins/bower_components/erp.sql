-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 03 2020 г., 10:53
-- Версия сервера: 10.1.26-MariaDB
-- Версия PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `erp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `academic_syllabus`
--

CREATE TABLE `academic_syllabus` (
  `id` int(11) NOT NULL,
  `academic_syllabus_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `uploader_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `uploader_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `session` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `academic_syllabus`
--

INSERT INTO `academic_syllabus` (`id`, `academic_syllabus_code`, `title`, `class_id`, `subject_id`, `description`, `uploader_type`, `uploader_id`, `session`, `timestamp`, `file_name`) VALUES
(1, 'dfeabee', 'Pam pam', 1, 2, 'smth', 'admin', '1', '2021-2022', 1591909566, '3.pdf'),
(2, 'f9e01da', 'smth2', 0, 0, '', 'admin', '1', '2021-2022', 1591909677, 'To DO2.pdf'),
(3, 'c8659bb', 'smth2', 1, 2, '', 'admin', '1', '2021-2022', 1591909750, 'Mathcad - W min.pdf'),
(4, '27e325e', '3err', 1, 2, '', 'admin', '1', '2021-2022', 1591910373, 'notite licenta.docx'),
(5, '515f18a', 'err', 1, 2, '', 'admin', '1', '2021-2022', 1591910613, 'Adapost de animale.docx');

-- --------------------------------------------------------

--
-- Структура таблицы `accountant`
--

CREATE TABLE `accountant` (
  `accountant_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `accountant_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `facebook` longtext COLLATE utf8_unicode_ci NOT NULL,
  `twitter` longtext COLLATE utf8_unicode_ci NOT NULL,
  `googleplus` longtext COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `qualification` longtext COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `login_status` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `accountant`
--

INSERT INTO `accountant` (`accountant_id`, `name`, `accountant_number`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `facebook`, `twitter`, `googleplus`, `linkedin`, `qualification`, `marital_status`, `file_name`, `password`, `login_status`) VALUES
(1, 'Vladlena Parolea', 'efa07a4ab6', '2020-06-03', 'Male', 'csri', 'smt', 'som', '78092130', 'new@admin.com', 'fb', '', '', '', 'asd', 'Married', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', ''),
(2, 'vladlenaarad', '51be1b635c', '2020-06-03', 'Male', '', '', '', '', '', '', '', '', '', '', 'Married', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', ''),
(9, 'Parolea Vlada', 'a25ee288ef', '2020-06-03', 'Male', '', '', '', '', '', '', '', '', '', '', 'Married', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '');

-- --------------------------------------------------------

--
-- Структура таблицы `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `icon` longtext COLLATE utf8_unicode_ci NOT NULL,
  `colour` longtext COLLATE utf8_unicode_ci NOT NULL,
  `club_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `activity`
--

INSERT INTO `activity` (`activity_id`, `name`, `icon`, `colour`, `club_id`, `description`, `date`) VALUES
(1, 'Teacher', 'fa-bell-o', 'primary', 1, 'fh', '2020-06-15');

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `login_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `login_status`) VALUES
(1, 'Admin', 'admin@admin.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `applicant_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `apply_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`application_id`, `applicant_name`, `vacancy_id`, `apply_date`, `status`) VALUES
(1, 'Vladlena', 2, '1596650400', 'applied');

-- --------------------------------------------------------

--
-- Структура таблицы `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `name`, `subject_id`, `class_id`, `teacher_id`, `description`, `file_name`, `file_type`, `timestamp`) VALUES
(1, 'smth', 2, 1, 1, 'pam pam', 'Mathcad - G min.pdf', 'pdf', '2018-08-19'),
(2, 'Teacher', 2, 1, 1, '', '1.pdf', 'pdf', '2018-08-19');

-- --------------------------------------------------------

--
-- Структура таблицы `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 present, 2 absent, 3 late',
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id`, `status`, `date`) VALUES
(1, 1, 1, '2020-06-16'),
(2, 1, 1, '2020-06-15'),
(3, 1, 1, '2020-06-14'),
(4, 1, 1, '2020-06-12'),
(5, 1, 1, '2020-06-24');

-- --------------------------------------------------------

--
-- Структура таблицы `award`
--

CREATE TABLE `award` (
  `award_id` int(11) NOT NULL,
  `award_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `gift` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `award`
--

INSERT INTO `award` (`award_id`, `award_code`, `name`, `gift`, `amount`, `date`, `user_id`) VALUES
(2, '7b34afd', 'Teacher', 'Best Award', '5000', '2020-06-08', 'admin-1');

-- --------------------------------------------------------

--
-- Структура таблицы `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `account_holder_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `account_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `branch` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `bank`
--

INSERT INTO `bank` (`bank_id`, `account_holder_name`, `account_number`, `bank_name`, `branch`) VALUES
(1, 'Instructor Vlada', '123456', 'BCR', 'Arad'),
(2, 'Instructor Vlada', '123456', 'BCR', 'Arad');

-- --------------------------------------------------------

--
-- Структура таблицы `banner_table`
--

CREATE TABLE `banner_table` (
  `banner_id` int(11) NOT NULL,
  `banner_image` longtext COLLATE utf8_unicode_ci NOT NULL,
  `banner_text` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `banner_table`
--

INSERT INTO `banner_table` (`banner_id`, `banner_image`, `banner_text`) VALUES
(1, 'logo2.jpg', 'Welcome to the best school...');

-- --------------------------------------------------------

--
-- Структура таблицы `circular`
--

CREATE TABLE `circular` (
  `circular_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `reference` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0tfscv55etcbmguec5e2e01nr76qtqso', '::1', 1593722013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732323031313b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('1b3c5mgm8ct6i4sov12g54me058ros33', '::1', 1593721007, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732313030373b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('1mmluj32t7ifuc6mavg9fomavkedjjf2', '::1', 1593730356, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333733303335313b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('1u79o1eb9qbot6ere77mftelpp808tkm', '::1', 1593759640, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333735393634303b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('37hf08pntf83fc3irb64doprqm75gr7e', '::1', 1593732481, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333733313934313b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('48vvkghms5c76fgc8kje2mg80c759lfc', '::1', 1593728537, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732383533373b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('4b6t7udvk08lp9v3cio0m01icmmjqttd', '::1', 1593761813, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333736313831333b),
('5qcf0t4vgv2u1j5gkeunn28n0c4vaq3j', '::1', 1593724822, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732343832323b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('5tp8jhvu6qate0p96fgh5e3vkqj6t20c', '::1', 1593721672, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732313637323b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('7adpd9hfectmlhhaflua9m6ejr5g5a2u', '::1', 1593724497, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732343438363b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('7t4287j07evamlo6akjhn0fmpb4dfmb6', '::1', 1593758638, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333735383633373b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('7umc7hi2ehrk8pfeia8m86qngm29lcjg', '::1', 1593726569, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732363536333b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('81rghpssl7f5mj44u19jtcgv92jqkg7d', '::1', 1593725566, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732353536363b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('a0qm5qvloq4bhsonin3k7d094br5oe50', '::1', 1593725870, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732353837303b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('ab7dho9d24hf61n3dala9totb1320mss', '::1', 1593722430, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732323432383b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('bc3c97gc2m3mshpgr4pspkgcf7jm0tka', '::1', 1593765405, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333736353430353b6572726f725f6d6573736167657c733a32333a2257726f6e6720456d61696c204f722050617373776f7264223b5f5f63695f766172737c613a313a7b733a31333a226572726f725f6d657373616765223b733a333a226e6577223b7d),
('bh209uqoch28hit0m4aatm9te4dm8uoe', '::1', 1593761344, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333736313334343b),
('c50hi4bfm27aatc7ql8qda12asfhvloo', '::1', 1593759811, ''),
('ehbhr46rdn6t9v0crq6ae53m748ucrp6', '::1', 1593721324, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732313332343b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('eu0ajdudeh01hbvm5mgbh6eonvghuutp', '::1', 1593765421, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333736353430353b),
('f9npcbmat00s6u36b93tnib35lov783r', '::1', 1593762175, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333736323137353b),
('htqsovv7kt81j2n4a7n7th2f0fj1usb1', '::1', 1593722958, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732323935343b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('huaq62h58r0qpg94smbc9177ut5u0r5c', '::1', 1593764391, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333736343339313b),
('iedkr90kc4331l1acl7n6bjncfhq3tig', '::1', 1593760180, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333736303138303b),
('ij7fc1calb87sn0ig5rfcve9v8rftvf2', '::1', 1593723796, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732333739363b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('kss8177fbd7bpskv49inpv9u42em2m00', '::1', 1593733247, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333733333036313b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('nukhv9tjitdmhrgouuphdn4maa6h8nen', '::1', 1593726204, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732363230343b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('ocnor45i93ipc6amb0i7tbrisq92f41t', '::1', 1593729148, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732393134333b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('p3nts32344neo2tsceru477taui88sg3', '::1', 1593723348, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732333334333b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('p4aqmbef4cf4ca82gne5acdjecvph4r9', '::1', 1593729679, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732393637393b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('p7ukbnfdao0ijjc6cf8bth0mv8enfch2', '::1', 1593724148, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732343134383b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('qee314iv0jsu04rirmn1rbrm1nvfr4mh', '::1', 1593725123, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333732353132333b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b),
('qern7k2rjp2qd7qf6dohroqmleus3dnm', '::1', 1593731941, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539333733313934313b6c6f67696e5f747970657c733a353a2261646d696e223b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a2241646d696e223b);

-- --------------------------------------------------------

--
-- Структура таблицы `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name_numeric` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `class`
--

INSERT INTO `class` (`class_id`, `name`, `name_numeric`, `teacher_id`) VALUES
(1, 'EV3', 'EV3', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `class_routine`
--

CREATE TABLE `class_routine` (
  `class_routine_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `time_start` longtext COLLATE utf8_unicode_ci NOT NULL,
  `time_end` longtext COLLATE utf8_unicode_ci NOT NULL,
  `time_start_min` longtext COLLATE utf8_unicode_ci NOT NULL,
  `time_end_min` longtext COLLATE utf8_unicode_ci NOT NULL,
  `day` longtext COLLATE utf8_unicode_ci NOT NULL,
  `year` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `class_routine`
--

INSERT INTO `class_routine` (`class_routine_id`, `class_id`, `section_id`, `subject_id`, `time_start`, `time_end`, `time_start_min`, `time_end_min`, `day`, `year`) VALUES
(1, 1, 1, 2, '8', '10', '50', '55', 'wednesday', '2021-2022');

-- --------------------------------------------------------

--
-- Структура таблицы `club`
--

CREATE TABLE `club` (
  `club_id` int(11) NOT NULL,
  `club_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `club`
--

INSERT INTO `club` (`club_id`, `club_name`, `description`, `date`) VALUES
(1, 'Robotics', 'Like lego', '2020-06-02');

-- --------------------------------------------------------

--
-- Структура таблицы `contact_table`
--

CREATE TABLE `contact_table` (
  `contact_id` int(11) NOT NULL,
  `visitor_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `visitor_email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `visitor_content` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `contact_table`
--

INSERT INTO `contact_table` (`contact_id`, `visitor_name`, `visitor_email`, `visitor_content`) VALUES
(1, 'Vlada', 'vladaparolea@gmail.com', 'more information');

-- --------------------------------------------------------

--
-- Структура таблицы `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department_code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `department`
--

INSERT INTO `department` (`department_id`, `name`, `department_code`) VALUES
(2, 'lessons', 'aed7c689d676c7c'),
(5, 'vlada', 'd41d8cd98f00b20');

-- --------------------------------------------------------

--
-- Структура таблицы `designation`
--

CREATE TABLE `designation` (
  `designation_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `designation`
--

INSERT INTO `designation` (`designation_id`, `name`, `department_id`) VALUES
(5, 'Tutorial', 2),
(14, 'smtt', 5),
(15, 'smth2', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `enquiry`
--

CREATE TABLE `enquiry` (
  `enquiry_id` int(11) NOT NULL,
  `category` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mobile` longtext COLLATE utf8_unicode_ci NOT NULL,
  `purpose` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `whom_to_meet` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `enquiry_category`
--

CREATE TABLE `enquiry_category` (
  `enquiry_category_id` int(11) NOT NULL,
  `category` longtext COLLATE utf8_unicode_ci NOT NULL,
  `purpose` longtext COLLATE utf8_unicode_ci NOT NULL,
  `whom` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `exam`
--

INSERT INTO `exam` (`exam_id`, `name`, `comment`, `timestamp`) VALUES
(1, 'Exam for EV3', 'will be about robotics', '2020-06-18');

-- --------------------------------------------------------

--
-- Структура таблицы `exam_question`
--

CREATE TABLE `exam_question` (
  `exam_question_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `exam_question`
--

INSERT INTO `exam_question` (`exam_question_id`, `name`, `teacher_id`, `subject_id`, `description`, `class_id`, `file_name`, `file_type`, `timestamp`, `status`) VALUES
(2, 'Test for EV3', '1', '2', '', '1', '3.pdf', 'pdf', '2020-06-17', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `expense_category`
--

CREATE TABLE `expense_category` (
  `expense_category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `expense_category`
--

INSERT INTO `expense_category` (`expense_category_id`, `name`) VALUES
(2, 'smthing');

-- --------------------------------------------------------

--
-- Структура таблицы `general_message`
--

CREATE TABLE `general_message` (
  `general_message_id` int(11) NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `general_message`
--

INSERT INTO `general_message` (`general_message_id`, `message`, `user_id`, `timestamp`) VALUES
(1, 'i like this course a lot and', 'student-1', ''),
(2, 'how can i help you', 'admin-1', ''),
(4, ' ', 'admin-1', ''),
(3, 'name?', 'admin-1', '');

-- --------------------------------------------------------

--
-- Структура таблицы `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `creation_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `year` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_number`, `student_id`, `title`, `description`, `amount`, `discount`, `amount_paid`, `due`, `creation_timestamp`, `payment_method`, `status`, `year`) VALUES
(1, '812032', 1, 'new payment for smth', 'payment for smth', 5000, 0, 1200, 3800, '2020-06-20', '1', 2, '2020-2021');

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext,
  `russian` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `russian`) VALUES
(1, 'Manage Language', 'Manage Language', 'Языки');

-- --------------------------------------------------------

--
-- Структура таблицы `language_list`
--

CREATE TABLE `language_list` (
  `language_list_id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `db_field` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `language_list`
--

INSERT INTO `language_list` (`language_list_id`, `name`, `db_field`, `status`) VALUES
(1, 'English', 'english', 'ok'),
(2, 'Russian', 'russian', 'ok');

-- --------------------------------------------------------

--
-- Структура таблицы `leave`
--

CREATE TABLE `leave` (
  `leave_id` int(11) NOT NULL,
  `leave_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `start_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `end_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `reason` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `live_class`
--

CREATE TABLE `live_class` (
  `live_class_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `meeting_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `meeting_password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `remarks` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `end_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `live_class`
--

INSERT INTO `live_class` (`live_class_id`, `title`, `meeting_id`, `meeting_password`, `class_id`, `section_id`, `remarks`, `date`, `start_time`, `end_time`, `created_by`) VALUES
(1, 'economic', '96757795600', 'M1lkNUMxTkxWdnFDeHozYXNkc3ZoUT09', 1, 1, '', '1593712800', '22:00', '22:40', 'admin-1');

-- --------------------------------------------------------

--
-- Структура таблицы `material`
--

CREATE TABLE `material` (
  `material_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `material`
--

INSERT INTO `material` (`material_id`, `name`, `class_id`, `subject_id`, `teacher_id`, `description`, `file_name`, `file_type`, `timestamp`) VALUES
(1, 'aa', 1, 2, 1, '', '1.pdf', 'pdf', '2018-08-19'),
(2, 'bb', 1, 2, 1, '', '3.pdf', 'pdf', '2018-08-19');

-- --------------------------------------------------------

--
-- Структура таблицы `noticeboard`
--

CREATE TABLE `noticeboard` (
  `noticeboard_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `location` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `noticeboard`
--

INSERT INTO `noticeboard` (`noticeboard_id`, `title`, `location`, `timestamp`, `description`) VALUES
(1, 'title event', 'barcelona', 1592676000, 'do know');

-- --------------------------------------------------------

--
-- Структура таблицы `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `profession` longtext COLLATE utf8_unicode_ci NOT NULL,
  `login_status` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `parent`
--

INSERT INTO `parent` (`parent_id`, `name`, `email`, `password`, `phone`, `address`, `profession`, `login_status`) VALUES
(1, 'Vlada', 'vlada@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '78092130', 'somewhere', 'teacher', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `expense_category_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `student_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `discount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `year` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`payment_id`, `expense_category_id`, `title`, `payment_type`, `invoice_id`, `student_id`, `method`, `description`, `amount`, `discount`, `timestamp`, `year`) VALUES
(1, '2', 'Purchase of something', 'expense', '', '', 'cash', 'description', '5000', '', '2020-06-02', '2020-2021'),
(2, '2', 'dfygbjn', 'expense', '', '', '1', '', '100', '', '2020-06-06', '2020-2021'),
(4, '', 'payment for smth', 'income', '1', '1', '1', 'payment for smth', '5000', '0', '1592589600', '2020-2021'),
(5, '', 'payment for smth', 'income', '2', '1', '2', '', '5000', '0', '1592589600', '2020-2021'),
(6, '', 'payment for smth', 'income', '1', '1', '1', 'payment for smth', '1200', '', '1592676000', '2020-2021'),
(7, '2', 'new cholocate', 'expense', '', '', '3', '', '1000', '', '2020-06-23', '2020-2021');

-- --------------------------------------------------------

--
-- Структура таблицы `payroll`
--

CREATE TABLE `payroll` (
  `payroll_id` int(11) NOT NULL,
  `payroll_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `allowances` longtext COLLATE utf8_unicode_ci NOT NULL,
  `deductions` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `payroll`
--

INSERT INTO `payroll` (`payroll_id`, `payroll_code`, `user_id`, `allowances`, `deductions`, `date`, `status`) VALUES
(1, 'd41d8cd', '1', '[{\"type\":\"food\",\"amount\":\"10\"},{\"type\":\"house\",\"amount\":\"20\"},{\"type\":\"trasportation\",\"amount\":\"20\"}]', '[{\"type\":\"tax1\",\"amount\":\"200\"},{\"type\":\"tax2\",\"amount\":\"70\"}]', '4,2020', '0'),
(2, 'd41d8cd', '1', '[{\"type\":\"smth\",\"amount\":\"50\"}]', '[{\"type\":\"smth\",\"amount\":\"30\"}]', '1,2020', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nick_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`section_id`, `name`, `nick_name`, `class_id`, `teacher_id`) VALUES
(1, 'first', 'ff1n', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`setting_id`, `type`, `description`) VALUES
(1, 'system_name', 'Code4you'),
(2, 'system_title', 'Code4you'),
(3, 'language', 'english'),
(5, 'skin_colour', 'megna'),
(6, 'text_align', 'left-to-right'),
(8, 'address', 'Ursului 2-4, Arad, Romania'),
(9, 'phone', '0754939261'),
(10, 'paypal_email', 'vladaparolea@gmail.com'),
(11, 'currency', 'USD'),
(12, 'system_email', 'code4you@gmail.com'),
(13, 'footer', 'Developed with love'),
(14, 'session', '2020-2021'),
(15, 'paypal_setting', '[{\"paypal_active\":\"1\",\"paypal_mode\":\"production\",\"sandbox_client_id\":\"client id\",\"production_client_id\":\"client production\"}]'),
(19, 'zoom_api_key', 'RwCLJfkxSkqjQtbbnmj97w'),
(20, 'zoom_api_secret_key', 'yBTkTH3eS6Sbq3bTDA4OTORoga4RJGONsTnZ');

-- --------------------------------------------------------

--
-- Структура таблицы `sms_settings`
--

CREATE TABLE `sms_settings` (
  `sms_settings_id` int(11) NOT NULL,
  `type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `info` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `sms_settings`
--

INSERT INTO `sms_settings` (`sms_settings_id`, `type`, `info`) VALUES
(1, 'clickatell_username', 'username'),
(2, 'clickatell_password', 'pass'),
(6, 'msg91_authentication_key', 'ath key'),
(5, 'clickatell_apikey', 'api'),
(7, 'msg91_sender_id', 'id'),
(8, 'msg91_route', 'route'),
(9, 'active_sms_gateway', 'clickatell'),
(11, 'msg91_country_code', 'code');

-- --------------------------------------------------------

--
-- Структура таблицы `social_category`
--

CREATE TABLE `social_category` (
  `social_category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `colour` longtext COLLATE utf8_unicode_ci NOT NULL,
  `icon` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `social_category`
--

INSERT INTO `social_category` (`social_category_id`, `name`, `colour`, `icon`, `description`) VALUES
(1, 'Social', 'success', 'fa-instagram', 'smth social and again');

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `age` longtext COLLATE utf8_unicode_ci NOT NULL,
  `place_birth` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `m_tongue` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `city` longtext COLLATE utf8_unicode_ci NOT NULL,
  `country` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nationality` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `physical_h` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `roll` longtext COLLATE utf8_unicode_ci NOT NULL,
  `club_id` int(11) NOT NULL,
  `session` longtext COLLATE utf8_unicode_ci NOT NULL,
  `card_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `issue_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `expire_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `more_entries` longtext COLLATE utf8_unicode_ci NOT NULL,
  `login_status` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`student_id`, `name`, `birthday`, `age`, `place_birth`, `sex`, `m_tongue`, `address`, `city`, `country`, `nationality`, `phone`, `email`, `physical_h`, `password`, `class_id`, `section_id`, `parent_id`, `roll`, `club_id`, `session`, `card_number`, `issue_date`, `expire_date`, `more_entries`, `login_status`) VALUES
(1, 'Bolun Valentina', '06/08/2005', '15', 'Moldova', 'female', 'english', 'Ursului', 'Arad', 'Moldova', 'romanian', '78092130', 'student@student.com', 'No', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1', 0, 1, 'e75gf6', 1, '2020-2021', '', '', '', '', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `class_id`, `teacher_id`) VALUES
(2, 'Teacher', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `subscriber_table`
--

CREATE TABLE `subscriber_table` (
  `subscriber_id` int(11) NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `subscriber_table`
--

INSERT INTO `subscriber_table` (`subscriber_id`, `email`) VALUES
(1, 'optimul@mm.com'),
(2, 'hjk'),
(3, '///][]/'),
(4, '///][]'),
(5, '///][');

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `role` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_number` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `religion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `facebook` longtext COLLATE utf8_unicode_ci NOT NULL,
  `twitter` longtext COLLATE utf8_unicode_ci NOT NULL,
  `googleplus` longtext COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `qualification` longtext COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `date_of_joining` longtext COLLATE utf8_unicode_ci NOT NULL,
  `joining_salary` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `date_of_leaving` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bank_id` int(11) NOT NULL,
  `login_status` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `role`, `teacher_number`, `birthday`, `sex`, `religion`, `blood_group`, `address`, `phone`, `email`, `facebook`, `twitter`, `googleplus`, `linkedin`, `qualification`, `marital_status`, `file_name`, `password`, `department_id`, `designation_id`, `date_of_joining`, `joining_salary`, `status`, `date_of_leaving`, `bank_id`, `login_status`) VALUES
(1, 'Teacher new', '1', 'ab5f170', '2000-11-22', 'male', 'csri', 'smt', 'Ursului 2-4', '78092130', 'teacher@teacher.com', 'fb', 'tw', 'gp', 'li', 'asd', 'Divorced', '3.pdf', '7c4a8d09ca3762af61e59520943dc26494f8941b', 5, 15, '2020-06-02', '1000', 1, '2020-06-28', 2, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `testimony_table`
--

CREATE TABLE `testimony_table` (
  `testimony_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `testimony_table`
--

INSERT INTO `testimony_table` (`testimony_id`, `parent_id`, `content`, `status`) VALUES
(1, 1, 'something', 'Approved');

-- --------------------------------------------------------

--
-- Структура таблицы `vacancy`
--

CREATE TABLE `vacancy` (
  `vacancy_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number_of_vacancies` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_date` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `vacancy`
--

INSERT INTO `vacancy` (`vacancy_id`, `name`, `number_of_vacancies`, `last_date`) VALUES
(2, 'Teacher', '2', '2020-06-08');

-- --------------------------------------------------------

--
-- Структура таблицы `website_settings`
--

CREATE TABLE `website_settings` (
  `id` int(11) NOT NULL,
  `type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `website_settings`
--

INSERT INTO `website_settings` (`id`, `type`, `description`) VALUES
(1, 'about_us', '<p>Our school is the best school</p>'),
(2, 'video_link', 'https://www.youtube.com/watch?v=V1E-weflOsA'),
(3, 'mission', ''),
(4, 'vission', ''),
(5, 'goal', ''),
(6, 'testimony_message', ''),
(7, 'map_code', ''),
(8, 'facebook_link_code', 'https://www.facebook.com/paroleavladlenaph'),
(9, 'contact_message', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `academic_syllabus`
--
ALTER TABLE `academic_syllabus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`accountant_id`);

--
-- Индексы таблицы `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`);

--
-- Индексы таблицы `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Индексы таблицы `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Индексы таблицы `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`award_id`);

--
-- Индексы таблицы `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Индексы таблицы `banner_table`
--
ALTER TABLE `banner_table`
  ADD PRIMARY KEY (`banner_id`);

--
-- Индексы таблицы `circular`
--
ALTER TABLE `circular`
  ADD PRIMARY KEY (`circular_id`);

--
-- Индексы таблицы `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Индексы таблицы `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Индексы таблицы `class_routine`
--
ALTER TABLE `class_routine`
  ADD PRIMARY KEY (`class_routine_id`);

--
-- Индексы таблицы `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`club_id`);

--
-- Индексы таблицы `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`contact_id`);

--
-- Индексы таблицы `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Индексы таблицы `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Индексы таблицы `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Индексы таблицы `enquiry_category`
--
ALTER TABLE `enquiry_category`
  ADD PRIMARY KEY (`enquiry_category_id`);

--
-- Индексы таблицы `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Индексы таблицы `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`exam_question_id`);

--
-- Индексы таблицы `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`expense_category_id`);

--
-- Индексы таблицы `general_message`
--
ALTER TABLE `general_message`
  ADD PRIMARY KEY (`general_message_id`);

--
-- Индексы таблицы `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Индексы таблицы `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Индексы таблицы `language_list`
--
ALTER TABLE `language_list`
  ADD PRIMARY KEY (`language_list_id`);

--
-- Индексы таблицы `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Индексы таблицы `live_class`
--
ALTER TABLE `live_class`
  ADD PRIMARY KEY (`live_class_id`);

--
-- Индексы таблицы `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`);

--
-- Индексы таблицы `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`noticeboard_id`);

--
-- Индексы таблицы `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`);

--
-- Индексы таблицы `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Индексы таблицы `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`payroll_id`);

--
-- Индексы таблицы `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Индексы таблицы `sms_settings`
--
ALTER TABLE `sms_settings`
  ADD PRIMARY KEY (`sms_settings_id`);

--
-- Индексы таблицы `social_category`
--
ALTER TABLE `social_category`
  ADD PRIMARY KEY (`social_category_id`);

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Индексы таблицы `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Индексы таблицы `subscriber_table`
--
ALTER TABLE `subscriber_table`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- Индексы таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Индексы таблицы `testimony_table`
--
ALTER TABLE `testimony_table`
  ADD PRIMARY KEY (`testimony_id`);

--
-- Индексы таблицы `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`vacancy_id`);

--
-- Индексы таблицы `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `academic_syllabus`
--
ALTER TABLE `academic_syllabus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `accountant`
--
ALTER TABLE `accountant`
  MODIFY `accountant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `award`
--
ALTER TABLE `award`
  MODIFY `award_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `banner_table`
--
ALTER TABLE `banner_table`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `circular`
--
ALTER TABLE `circular`
  MODIFY `circular_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `class_routine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `club`
--
ALTER TABLE `club`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `designation`
--
ALTER TABLE `designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `enquiry_category`
--
ALTER TABLE `enquiry_category`
  MODIFY `enquiry_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `exam_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `expense_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `general_message`
--
ALTER TABLE `general_message`
  MODIFY `general_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `language_list`
--
ALTER TABLE `language_list`
  MODIFY `language_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `leave`
--
ALTER TABLE `leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `live_class`
--
ALTER TABLE `live_class`
  MODIFY `live_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `noticeboard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `payroll`
--
ALTER TABLE `payroll`
  MODIFY `payroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `sms_settings`
--
ALTER TABLE `sms_settings`
  MODIFY `sms_settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `social_category`
--
ALTER TABLE `social_category`
  MODIFY `social_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subscriber_table`
--
ALTER TABLE `subscriber_table`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `testimony_table`
--
ALTER TABLE `testimony_table`
  MODIFY `testimony_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `vacancy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
