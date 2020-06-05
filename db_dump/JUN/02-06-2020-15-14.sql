-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 02:14 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `passport` longblob,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bursary_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `rec_amount` decimal(12,2) DEFAULT NULL,
  `recommendation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque` int(10) UNSIGNED DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `ward_id` int(11) DEFAULT NULL,
  `serial` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `box` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` int(11) DEFAULT NULL,
  `approved` int(11) DEFAULT NULL,
  `subcounty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sublocation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kcpeMarks` decimal(8,2) DEFAULT NULL,
  `indexNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resultslip` longblob,
  `kcpeYear` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repeatQuiz` text COLLATE utf8mb4_unicode_ci,
  `kcpeQuiz` text COLLATE utf8mb4_unicode_ci,
  `secSchoolName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `passport`, `name`, `email`, `id_no`, `reg_no`, `bursary_type`, `application_year`, `dob`, `amount`, `rec_amount`, `recommendation`, `gender`, `status`, `tel`, `cheque`, `year`, `ward_id`, `serial`, `firstName`, `middleName`, `lastName`, `parentName`, `box`, `alt_tel`, `county`, `approved`, `subcounty`, `location`, `sublocation`, `kcpeMarks`, `indexNo`, `resultslip`, `kcpeYear`, `repeatQuiz`, `kcpeQuiz`, `secSchoolName`, `classification`, `created_at`, `updated_at`) VALUES
(8, 80, NULL, NULL, 'srongo@baza.co.ke', '30918819', 'WAT1370', 'County', '2020', '2020-05-20', '180000.00', NULL, 'Yes', 'male', 3, '0704 539108', NULL, 2020, 6, '801589873107', 'Mac', 'otieno', 'atis', NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 07:25:07', '2020-05-19 07:50:00'),
(10, 80, NULL, NULL, NULL, NULL, NULL, 'scholarship', '2020', '2020-05-19', NULL, NULL, NULL, 'male', 0, '0704 539108', NULL, 2020, 6, '801589878484', 'mac', 'mac', 'mac', 'mac', '3090005', '0704 539108', 6, NULL, '30100', 'mac', 'mac', '230.00', '234', NULL, '2000', 'mac', 'mac', 'mac', 'County', '2020-05-19 08:54:44', '2020-05-19 08:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `county` int(11) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `remaining` decimal(16,2) NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`id`, `county`, `ward_id`, `amount`, `remaining`, `year`, `created_at`, `updated_at`) VALUES
(5, 6, 6, '900000.00', '540000.00', '2020', '2020-05-19 07:37:05', '2020-05-19 07:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `year`, `county`, `type`, `status`, `created_at`, `updated_at`) VALUES
(9, '2020', 6, 2, 1, '2020-05-19 07:07:25', '2020-05-19 07:07:25'),
(10, '2020', 6, 1, 1, '2020-05-19 07:07:46', '2020-05-19 07:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'Migori', '2020-02-19 05:28:52', '2020-02-19 05:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `evidence`
--

CREATE TABLE `evidence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inheritance` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `whyApply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `finSupport` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialNeeds` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherSpecialNeeds` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyConflict` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyHouse` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `otherDisabilities` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `siblingsInfo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hear` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hearDetails` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relationship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `living` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income` decimal(8,2) DEFAULT NULL,
  `cert` longblob,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `applicationId` int(11) DEFAULT NULL,
  `who` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `box` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `G_relationship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` int(11) DEFAULT NULL,
  `ward` int(11) DEFAULT NULL,
  `subcounty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sublocation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`id`, `user_id`, `name`, `relationship`, `living`, `occupation`, `income`, `cert`, `tel`, `year`, `status`, `applicationId`, `who`, `firstName`, `middleName`, `lastName`, `idNumber`, `alt_tel`, `box`, `G_relationship`, `county`, `ward`, `subcounty`, `location`, `sublocation`, `created_at`, `updated_at`) VALUES
(22, 80, 'Mac', 'Father', 'Alive', 'mac', '130000.00', NULL, '0704 539108', 2020, 3, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 07:25:07', '2020-05-19 07:49:53'),
(23, 80, 'mac atis', 'Mother', 'Alive', 'mac', '140000.00', NULL, '0704 539108', 2020, 3, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 07:25:07', '2020-05-19 07:49:53'),
(24, 80, 'mac', 'Guardian', 'Alive', 'mac', '160000.00', NULL, '0704 539108', 2020, 3, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 07:25:07', '2020-05-19 07:49:53'),
(25, 80, NULL, NULL, 'Alive', 'mac', NULL, NULL, '0704 539108', 2020, 0, 9, 'Father', 'mac', 'maxc', 'mac', '343656', '0704 539108', 'Eldorert', NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 08:29:45', '2020-05-19 08:29:45'),
(26, 80, NULL, NULL, 'Alive', 'mac', NULL, NULL, '0704 539108', 2020, 0, 9, 'Mother', 'mac', 'mac', 'mac', '3094000', '0704 539108', 'Eldorert', NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 08:29:45', '2020-05-19 08:29:45'),
(27, 80, NULL, NULL, 'Alive', 'mac', NULL, NULL, '0704 539108', 2020, 0, 10, 'Father', 'mac', 'mac', 'mac', '30949006', '0704 539108', '30100', NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 08:54:44', '2020-05-19 08:54:44'),
(28, 80, NULL, NULL, 'Alive', 'mac', NULL, NULL, '0704 539108', 2020, 0, 10, 'Mother', 'mac', 'mac', 'mac', '3095990', '0704 539108', '30100', NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 08:54:44', '2020-05-19 08:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `applicationId`, `path`, `type`, `kind`, `status`, `year`, `created_at`, `updated_at`) VALUES
(1, 7, 'uploads/1589866382order 355661575.docx', 'county', 'Recommendation letter', 0, 2020, '2020-05-19 05:33:02', '2020-05-19 05:33:02'),
(2, 7, 'uploads/1589866382WEEK ONE SEO REPORT[1182].pdf', 'county', 'Passport photo', 0, 2020, '2020-05-19 05:33:02', '2020-05-19 05:33:02'),
(3, 7, 'uploads/1589866382WEEK ONE SEO REPORT[1182].pdf', 'county', 'Mother’s ID/Death Cert', 0, 2020, '2020-05-19 05:33:02', '2020-05-19 05:33:02'),
(4, 7, 'uploads/1589866383WEEK ONE SEO REPORT[1182].pdf', 'county', 'Father’s ID/Death Cert', 0, 2020, '2020-05-19 05:33:03', '2020-05-19 05:33:03'),
(5, 7, 'uploads/1589866383WEEK ONE SEO REPORT[1182].pdf', 'county', 'Guardian’s ID/Death Cert', 0, 2020, '2020-05-19 05:33:03', '2020-05-19 05:33:03'),
(6, 8, 'uploads/1589873108WEEK ONE SEO REPORT[1182].pdf', 'county', 'Recommendation letter', 0, 2020, '2020-05-19 07:25:08', '2020-05-19 07:25:08'),
(7, 8, 'uploads/1589873108carlos-muza-hpjSkU2UYSU-unsplash.jpg', 'county', 'Passport photo', 0, 2020, '2020-05-19 07:25:08', '2020-05-19 07:25:08'),
(8, 8, 'uploads/1589873108croppedImage-Edit-2.jpg', 'county', 'Mother’s ID/Death Cert', 0, 2020, '2020-05-19 07:25:08', '2020-05-19 07:25:08'),
(9, 8, 'uploads/1589873109webaroo-em37kS8WJJQ-unsplash.jpg', 'county', 'Father’s ID/Death Cert', 0, 2020, '2020-05-19 07:25:09', '2020-05-19 07:25:09'),
(10, 8, 'uploads/1589873109croppedImage-Edit-2.jpg', 'county', 'Guardian’s ID/Death Cert', 0, 2020, '2020-05-19 07:25:09', '2020-05-19 07:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `geographical`
--

CREATE TABLE `geographical` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicationId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `County` int(11) NOT NULL,
  `Ward` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `Division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sublocation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `Village` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polling` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `geographical`
--

INSERT INTO `geographical` (`id`, `applicationId`, `user_id`, `County`, `Ward`, `status`, `Division`, `Location`, `Sublocation`, `year`, `Village`, `polling`, `created_at`, `updated_at`) VALUES
(21, 8, 80, 6, 6, 3, 'rongo', 'rongo', 'rongo', 2020, 'rongo', 'rongo', '2020-05-19 07:25:08', '2020-05-19 07:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicationId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearofstudy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `fees` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `amount_paid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`id`, `applicationId`, `user_id`, `name`, `branch`, `class`, `yearofstudy`, `status`, `fees`, `year`, `amount_paid`, `balance`, `bank`, `account`, `bank_branch`, `created_at`, `updated_at`) VALUES
(3, 8, 80, 'Rongo uni', 'main', 'comp', '2', 3, '53000', 2020, '23000', '30000', 'kcb', '3983873882', 'rongo', '2020-05-19 07:25:08', '2020-05-19 07:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_09_090308_create_counties_table', 1),
(9, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(10, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(11, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(12, '2016_06_01_000004_create_oauth_clients_table', 2),
(13, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(16, '2019_08_09_090123_create_wards_table', 5),
(20, '2019_08_10_175519_add_ward_to_users', 6),
(27, '2019_08_09_090642_create_geographical_table', 7),
(29, '2019_08_09_090735_create_institution_table', 7),
(30, '2019_08_11_110605_create_morefamily_table', 7),
(31, '2019_08_13_100511_create_notifications_table', 7),
(32, '2019_08_14_091216_create_configurations_table', 8),
(33, '2019_09_10_092753_add_county_to_users', 9),
(35, '2019_09_23_104221_create_budgets_table', 11),
(36, '2019_09_26_053005_add_county_to_budgets', 12),
(37, '2019_09_30_114132_add_application_id_to_family', 13),
(38, '2019_09_30_114438_add_application_id_to_morefamily', 13),
(39, '2019_09_30_114614_add_application_id_to_geographical', 13),
(40, '2019_09_30_114628_add_application_id_to_institution', 13),
(41, '2019_11_16_091607_add_county_to_configurations_table', 14),
(42, '2019_11_16_104413_add_type_to_configurations_table', 15),
(43, '2019_11_16_130357_create_evidence_table', 16),
(44, '2019_11_16_131606_create_more_evidence_table', 16),
(45, '2019_11_16_151030_create_siblings_table', 16),
(46, '2019_11_17_052826_create_files_table', 16),
(47, '2019_11_17_065741_add_polling_to_geographical_table', 16),
(48, '2019_11_17_074034_add_polling_to_institution_table', 17),
(49, '2019_08_09_090534_create_applications_table', 18),
(50, '2019_08_09_090700_create_family_table', 19),
(51, '2019_11_17_135019_add_approved_to_applications', 20),
(52, '2019_11_21_183257_add_type_to_files', 21),
(53, '2019_12_01_075931_add_cheque_to_applications', 22),
(54, '2020_02_20_122038_add__application_year_to_applications', 23),
(55, '2020_02_21_103415_add_kind_to_files', 24);

-- --------------------------------------------------------

--
-- Table structure for table `morefamily`
--

CREATE TABLE `morefamily` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicationId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `totalSiblings` int(11) NOT NULL,
  `schoolSiblings` int(11) NOT NULL,
  `workingSiblings` int(11) NOT NULL,
  `pFees` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pFeesRelationship` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `morefamily`
--

INSERT INTO `morefamily` (`id`, `applicationId`, `user_id`, `totalSiblings`, `schoolSiblings`, `workingSiblings`, `pFees`, `pFeesRelationship`, `status`, `year`, `created_at`, `updated_at`) VALUES
(3, 8, 80, 2, 2, 0, 'mac', 'Mother', 3, 2020, '2020-05-19 07:25:07', '2020-05-19 07:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `more_evidence`
--

CREATE TABLE `more_evidence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `age` int(11) NOT NULL,
  `disability` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ailment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `abandon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `employment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `business` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `land` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `assets` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `who` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'tSwKTMwCURShezmjC1Nm5rQ5iW9MFJGF9Qmco0Lp', 'http://localhost', 1, 0, 0, '2019-08-10 08:30:12', '2019-08-10 08:30:12'),
(2, NULL, 'Laravel Password Grant Client', '3tXlDTNvzMYS5yFL07nvuv9D3wXcERM32NdgA0fC', 'http://localhost', 0, 1, 0, '2019-08-10 08:30:12', '2019-08-10 08:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-08-10 08:30:12', '2019-08-10 08:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siblings`
--

CREATE TABLE `siblings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(10) UNSIGNED NOT NULL,
  `schoolOrEmployer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classOrSalary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `others` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ward_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ward` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `county`, `remember_token`, `created_at`, `updated_at`, `ward_id`, `ward`) VALUES
(1, 'shem nduati', 'admin', 'nduatishem@gmail.com', '2019-08-09 21:00:00', '$2y$10$X/eLrX9hvqo.zWtpqxclUOo/SXTQElSwHopioIQ5vhf5kfXR7Wu1a', 1, 'aV2xG92ImwpVnfYmJhhIlxhiJEVrmhe2uaEV10zDpXi1ozPwytCgisHPHDPD', '2019-08-09 08:41:01', '2019-08-13 08:06:41', NULL, 2),
(75, 'official', 'official', 'official@baza.co.ke', '2020-05-19 06:59:53', '$2y$10$XYCUhAAHAiL9EnJodlgwd.0pNVr6n8lUwM05CK7MKazLhb.CQb7Sy', 6, NULL, '2020-05-19 06:59:53', '2020-05-19 06:59:53', NULL, NULL),
(76, 'subofficial', 'sub-official', 'subofficial@baza.co.ke', '2020-05-19 07:00:43', '$2y$10$JVfB7W8eIlVcNbZn1EgQE.XvB7m8tkJS4ZZgsYTX8I1gs8sJsfIDq', 6, NULL, '2020-05-19 07:00:43', '2020-05-19 07:00:43', NULL, NULL),
(77, 'awendo', 'sub-admin', 'awendo@baza.co.ke', '2020-05-19 07:01:30', '$2y$10$nlpAWREMOj2Wk3hvoD2nD.NX8sPY1wqhxmmn2yC1JGN5vSVLiK7be', NULL, NULL, '2020-05-19 07:01:30', '2020-05-19 07:01:30', NULL, 5),
(78, 'Rongo', 'sub-admin', 'rongo@baza.co.ke', '2020-05-19 07:02:05', '$2y$10$laLFsDvYpgA0M1zaNXB5m.YLjxtXbkyAdL5k1EdMI64fzeXcrzcOC', 6, 'vgmoIhRoadkbw4Rseu6rDHDSnjfdsVsETzhiCeaZmcd58oPFkpilwhxgbs9B', '2020-05-19 07:02:05', '2020-05-20 07:46:37', NULL, 6),
(79, 'suna east', 'sub-admin', 'sunaeast@gmail.com', '2020-05-19 07:02:42', '$2y$10$jG6vxV7l45XqBrf0mXsT0OfZsr2Z0bMFhq9QmCngKfZkOVR9H/JvO', NULL, NULL, '2020-05-19 07:02:42', '2020-05-19 07:02:42', NULL, 7),
(80, 'srongo', 'student', 'srongo@baza.co.ke', '2020-05-19 07:04:53', '$2y$10$hXSI78Z9qfs8lXDqiQnKcuLB2U.igb4MiaYsQhVhED/ieTEx96hkG', NULL, NULL, '2020-05-19 07:04:30', '2020-05-19 07:04:53', NULL, NULL),
(81, 'Uriri', 'sub-admin', 'uriri@baza.co.ke', '2020-05-19 07:13:12', '$2y$10$YUP7zjgSDVsSLxCIjakCgOt6QXoCwsrSfS34W1wvQ6/7Q4MmHPKDW', 6, NULL, '2020-05-19 07:13:12', '2020-05-19 07:13:12', NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `county_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `county_id`, `name`, `created_at`, `updated_at`) VALUES
(5, 6, 'Awendo', '2020-05-19 05:58:56', '2020-05-19 05:58:56'),
(6, 6, 'Rongo', '2020-05-19 05:59:16', '2020-05-19 05:59:16'),
(7, 6, 'suna east', '2020-05-19 05:59:30', '2020-05-19 05:59:30'),
(8, 6, 'Suna West', '2020-05-19 05:59:49', '2020-05-19 05:59:49'),
(9, 6, 'Uriri', '2020-05-19 06:00:02', '2020-05-19 06:00:02'),
(10, 6, 'Kuria East', '2020-05-19 06:00:21', '2020-05-19 06:00:21'),
(11, 6, 'Nyatike', '2020-05-19 06:00:38', '2020-05-19 06:00:38'),
(12, 6, 'Kuria West', '2020-05-19 06:00:57', '2020-05-19 06:00:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_user_id_index` (`user_id`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budgets_ward_id_index` (`ward_id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evidence`
--
ALTER TABLE `evidence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_user_id_index` (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `geographical`
--
ALTER TABLE `geographical`
  ADD PRIMARY KEY (`id`),
  ADD KEY `geographical_user_id_index` (`user_id`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `institution_user_id_index` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `morefamily`
--
ALTER TABLE `morefamily`
  ADD PRIMARY KEY (`id`),
  ADD KEY `morefamily_user_id_index` (`user_id`);

--
-- Indexes for table `more_evidence`
--
ALTER TABLE `more_evidence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `siblings`
--
ALTER TABLE `siblings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_ward_id_foreign` (`ward_id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wards_county_id_index` (`county_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `evidence`
--
ALTER TABLE `evidence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `geographical`
--
ALTER TABLE `geographical`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `morefamily`
--
ALTER TABLE `morefamily`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `more_evidence`
--
ALTER TABLE `more_evidence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siblings`
--
ALTER TABLE `siblings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ward_id_foreign` FOREIGN KEY (`ward_id`) REFERENCES `wards` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
