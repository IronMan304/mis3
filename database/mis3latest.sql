-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2024 at 03:36 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mis3latest`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex_id` bigint UNSIGNED DEFAULT NULL,
  `position_id` bigint UNSIGNED DEFAULT NULL,
  `course_id` bigint UNSIGNED DEFAULT NULL,
  `college_id` bigint UNSIGNED DEFAULT NULL,
  `status_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`id`, `image`, `id_number`, `first_name`, `middle_name`, `last_name`, `contact_number`, `sex_id`, `position_id`, `course_id`, `college_id`, `status_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, '202001264', 'Jerecho Rey', 'Polot', 'Inatilleza', '09552816592', 1, 1, 13, 2, NULL, 4, NULL, '2024-01-19 18:25:40', '2024-01-19 21:25:27'),
(2, NULL, '202000001', 'John', 'Doe', 'Smith', '09551234567', 1, 1, 13, 2, NULL, NULL, NULL, '2024-01-19 18:25:40', '2024-01-19 21:15:12'),
(3, NULL, '202000002', 'Jane', 'Smith', 'Johnson', '09552345678', 2, 1, 12, 2, NULL, NULL, NULL, '2024-01-19 18:25:40', '2024-01-19 21:24:19'),
(4, NULL, '202000003', 'Michael', 'Johnson', 'Davis', '09553456789', 1, 1, 64, 8, NULL, NULL, NULL, '2024-01-19 18:25:40', '2024-01-19 21:24:25'),
(5, NULL, '202000004', 'Emily', 'Brown', 'Miller', '09554567890', 2, 1, 63, 8, NULL, NULL, NULL, '2024-01-19 18:25:40', '2024-01-19 21:24:30'),
(6, NULL, '202000005', 'David', 'Miller', 'Brown', '09555678901', 1, 1, 63, 8, NULL, NULL, NULL, '2024-01-19 18:25:40', '2024-01-19 21:24:35'),
(7, NULL, '45', 'fdb', 'cvb', 'vb', 'vcb', 2, 2, NULL, 8, NULL, NULL, NULL, '2024-01-19 21:19:05', '2024-01-19 21:19:05'),
(8, NULL, '123', 'G-mar', NULL, 'Banua', '09123', 1, 1, 13, 2, NULL, 7, NULL, '2024-01-20 22:52:09', '2024-01-20 22:52:51'),
(9, NULL, '2024567', 'Selarde', NULL, 'Erwin', '09', 1, 1, 13, 2, NULL, 8, NULL, '2024-02-02 05:49:03', '2024-02-02 05:49:31'),
(10, NULL, '2046438', 'ronver', NULL, 'amper', '09', 1, 1, 13, 2, NULL, 9, NULL, '2024-02-02 05:51:46', '2024-02-02 05:52:05'),
(11, NULL, '234234', 'sdf', NULL, 'sdf', '234', 2, 2, NULL, 8, NULL, NULL, NULL, '2024-02-02 06:57:28', '2024-02-02 06:57:28'),
(12, NULL, '234', 'remy', NULL, 'adonis', '09', 2, 8, NULL, 6, NULL, 12, NULL, '2024-02-02 08:10:13', '2024-02-03 04:05:24'),
(13, NULL, '2024143', 'bruce', NULL, 'wayne', '0924143', 1, 2, NULL, 2, NULL, 11, NULL, '2024-02-02 16:52:30', '2024-02-02 16:53:07'),
(14, NULL, '4653', 'jose', NULL, 'clarion', '091', 1, 2, 2, 2, NULL, 14, NULL, '2024-02-26 00:14:25', '2024-02-26 00:15:14'),
(15, NULL, '2027', 'daryl', NULL, 'etom', '09', 1, 1, 13, 2, NULL, 21, NULL, '2024-03-10 23:24:49', '2024-03-10 23:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `borrower_types`
--

CREATE TABLE `borrower_types` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'CICTSO', NULL, '2024-01-19 18:25:39', '2024-03-25 07:29:04'),
(2, 'Office Supplies', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(3, 'Lab Equipment', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(4, 'Stationery', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(5, 'Books and Publications', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(6, 'Furniture', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(7, 'Sports Equipment', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(8, 'Art Supplies', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(9, 'Audio-Visual Equipment', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(10, 'Safety Gear', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(11, 'Musical Instruments', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(12, 'Personal', NULL, '2024-03-25 07:28:41', '2024-03-25 07:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `description`, `code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'College of Agriculture and Fishery', 'CAFF', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(2, 'College of Arts and Sciences', 'CAS', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(3, 'College of Business Administration', 'CBA', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(4, 'College of Criminal Justice Education', 'CCJE', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(5, 'College of Engineering and Architecture', 'CEA', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(6, 'College of Industrial Technology', 'CIT', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(7, 'College of Nursing, Pharmacy, and Allied Health Services', 'CPAHS', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(8, 'College of Teacher Education', 'CTE', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `college_id` bigint UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `college_id`, `description`, `code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'BACHELOR OF SCIENCE IN AGRICULTURAL TECHNOLOGY Major in Animal Husbandry', 'BSAgriTech-AH', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(2, 1, 'BACHELOR OF SCIENCE IN AGRICULTURE Major in Animal Science', 'BSAgri-AS', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(3, 1, 'BACHELOR OF SCIENCE IN AGRICULTURE Major in Agribusiness', 'BSAgri-Agribiz', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(4, 1, 'BACHELOR OF SCIENCE IN AGRICULTURE Major in Agronomy', 'BSAgri-Agronomy', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(5, 1, 'BACHELOR OF SCIENCE IN FISHERIES', 'BSFisheries', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(6, 1, 'BACHELOR OF SCIENCE IN FORESTRY', 'BSForestry', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(7, 2, 'BACHELOR OF ARTS Major in General Curriculum', 'BA-GC', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(8, 2, 'BACHELOR OF ARTS Major in Social Science', 'BA-SocialSci', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(9, 2, 'BACHELOR OF MASS COMMUNICATION', 'BAMC', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(10, 2, 'BACHELOR OF SCIENCE IN BIOLOGY', 'BSBio', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(11, 2, 'BACHELOR OF SCIENCE IN CHEMISTRY', 'BSChem', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(12, 2, 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE', 'BSCS', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(13, 2, 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'BSInT', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(14, 2, 'BACHELOR OF SCIENCE IN MATHEMATICS', 'BSMath', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(15, 2, 'BACHELOR OF SCIENCE IN PSYCHOLOGY', 'BSPsych', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(16, 2, 'BACHELOR OF SCIENCE IN SOCIAL SCIENCE', 'BSSocialSci', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(17, 3, 'BACHELOR OF SCIENCE IN ACCOUNTANCY', 'BSAccountancy', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(18, 3, 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION Major in Financial Management', 'BSBA-FM', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(19, 3, 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION Major in Human Resource Management', 'BSBA-HRM', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(20, 3, 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION Major in Marketing Management', 'BSBA-MM', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(21, 3, 'BACHELOR OF SCIENCE IN HOSPITALITY MANAGEMENT', 'BSHM', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(22, 3, 'BACHELOR OF SCIENCE IN OFFICE ADMINISTRATION', 'BSOA', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(23, 3, 'BACHELOR OF SCIENCE IN TOURISM MANAGEMENT', 'BSTM', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(24, 4, 'BACHELOR OF SCIENCE IN CRIMINOLOGY (Revised)', 'BSCrim-Revised', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(25, 5, 'BACHELOR OF SCIENCE IN ARCHITECTURE', 'BSARCH', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(26, 5, 'BACHELOR OF SCIENCE IN CIVIL ENGINEERING', 'BSCE', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(27, 5, 'BACHELOR OF SCIENCE IN COMPUTER ENGINEERING', 'BSCOE', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(28, 5, 'BACHELOR OF SCIENCE IN ELECTRICAL ENGINEERING', 'BSEE', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(29, 5, 'BACHELOR OF SCIENCE IN ELECTRONICS ENGINEERING', 'BSECE', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(30, 5, 'BACHELOR OF SCIENCE IN GEODETIC ENGINEERING', 'BSGE', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(31, 5, 'BACHELOR OF SCIENCE IN AVIATION MAINTENANCE Major in Airframe and Maintenance', 'BSAM-AM', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(32, 5, 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION Major in Avionics (Aviation Electronics)', 'BSBA-Avionics', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(33, 6, 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Architectural Drafting Technology', 'BSIT-ADT', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(34, 6, 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Automotive Technology', 'BSIT-AutoTech', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(35, 6, 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Civil Technology', 'BSIT-CivilTech', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(36, 6, 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Computer Technology', 'BSIT-CompTech', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(37, 6, 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Electrical Technology', 'BSIT-ElecTech', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(38, 6, 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Food Technology', 'BSIT-FoodTech', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(39, 6, 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Garments Technology', 'BSIT-GarmentsTech', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(40, 6, 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Mechanical Technology', 'BSIT-MechTech', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(41, 6, 'BACHELOR OF SCIENCE IN INDUSTRIAL TECHNOLOGY Major in Refrigeration and Airconditioning Technology', 'BSIT-RATech', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(42, 6, 'BACHELOR OF TECHNOLOGICAL TECHNOLOGY Major in Computer Technology', 'BTT-CompTech', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(43, 7, 'ASSOCIATE IN MEDICAL-DENTAL-NURSING ASSISTANT', 'AMNA', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(44, 7, 'MIDWIFERY', 'MID', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(45, 7, 'BACHELOR OF SCIENCE IN NURSING', 'BSN', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(46, 7, 'BACHELOR OF SCIENCE IN PHARMACY', 'BSP', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(47, 8, 'BACHELOR OF CULTURE & ARTS EDUCATION', 'BCAE', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(48, 8, 'BACHELOR OF EARLY CHILDHOOD EDUCATION', 'BECE', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(49, 8, 'BACHELOR OF ELEMENTARY EDUCATION Major in General Curriculum', 'BEEd-GC', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(50, 8, 'BACHELOR OF PHYSICAL EDUCATION', 'BPE', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(51, 8, 'BACHELOR OF SECONDARY EDUCATION Major English', 'BSEd-English', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(52, 8, 'BACHELOR OF SPECIAL NEEDS EDUCATION Specialization Deaf and Hard-of-Hearing Learners', 'BSNED-DHH', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(53, 8, 'BACHELOR OF SPECIAL NEEDS EDUCATION Specialization Early Childhood Education', 'BSNED-ECE', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(54, 8, 'BACHELOR OF SPECIAL NEEDS EDUCATION Specialization Elementary School Teaching', 'BSNED-EST', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(55, 8, 'BACHELOR OF SPECIAL NEEDS EDUCATION Specialization General', 'BSNED-General', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(56, 8, 'BACHELOR OF SPECIAL NEEDS EDUCATION Specialization Teaching Learners with Visual Impairment', 'BSNED-TLVI', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(57, 8, 'BACHELOR OF TECHNOLOGY & LIVELIHOOD EDUCATION Specialization Agri-Fishery Arts', 'BTLAE-AFA', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(58, 8, 'BACHELOR OF TECHNOLOGY & LIVELIHOOD EDUCATION Specialization Home Economics', 'BTLAE-HE', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(59, 8, 'BACHELOR OF TECHNOLOGY & LIVELIHOOD EDUCATION Specialization Industrial Arts', 'BTLAE-IA', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(60, 8, 'BACHELOR OF SECONDARY EDUCATION Major in Values Education', 'BSEd-ValuesEd', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(61, 8, 'BACHELOR OF SECONDARY EDUCATION Major in Filipino', 'BSEd-Filipino', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(62, 8, 'BACHELOR OF SECONDARY EDUCATION Major in Mathematics', 'BSEd-Math', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(63, 8, 'BACHELOR OF SECONDARY EDUCATION Major in Sciences', 'BSEd-Sciences', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(64, 8, 'BACHELOR OF SECONDARY EDUCATION Major in Social Studies', 'BSEd-SocialStudies', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(65, 8, 'BACHELOR OF TECHNOLOGY & LIVELIHOOD EDUCATION Specialization Information & Communication Technology', 'BTLAE-ICT', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `honorifics`
--

CREATE TABLE `honorifics` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `honorifics`
--

INSERT INTO `honorifics` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Dr.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_05_074335_create_permission_tables', 1),
(6, '2023_12_07_135459_create_statuses_table', 1),
(7, '2023_12_07_135506_create_sexes_table', 1),
(8, '2023_12_07_135513_create_colleges_table', 1),
(9, '2023_12_07_135520_create_courses_table', 1),
(10, '2023_12_07_135530_create_sources_table', 1),
(11, '2023_12_07_135537_create_categories_table', 1),
(12, '2023_12_07_135544_create_types_table', 1),
(13, '2023_12_07_135551_create_tools_table', 1),
(14, '2023_12_07_135557_create_borrowers_table', 1),
(15, '2023_12_07_135604_create_requests_table', 1),
(16, '2023_12_07_155230_create_additional_columns_on_tools', 1),
(17, '2023_12_07_172132_create_additional_column_on_tools', 1),
(18, '2023_12_08_065728_create_tool_requests_table', 1),
(19, '2023_12_09_071748_create_additional_column_on_requests', 1),
(20, '2023_12_09_073951_create_additional_column_on_tool_requests', 1),
(21, '2024_01_02_003220_create_trials_table', 1),
(22, '2024_01_02_222630_create_additional_columns_on_requests', 1),
(23, '2024_01_03_190551_create_additional_column_on_tool_requests', 1),
(24, '2024_01_06_193209_create_change_column_on_tools', 1),
(25, '2024_01_07_054005_create_additional_columns_on_tool_requests', 1),
(26, '2024_01_15_110759_create_borrower_types_table', 1),
(27, '2024_01_15_115612_create_services_table', 1),
(28, '2024_01_16_030055_create_positions_table', 1),
(29, '2024_01_16_033228_create_additional_column_on_borrowers', 1),
(30, '2024_01_16_042747_create_operators_table', 1),
(31, '2024_01_20_010725_create_additional_column_on_borrowers', 1),
(32, '2024_01_20_022245_add_position_id_to_users_table', 1),
(33, '2024_01_20_184749_add_approval_at_to_tool_requests_table', 2),
(34, '2024_01_21_111509_create_request_operators_table', 3),
(35, '2024_02_02_095930_add_position_id_to_tools_table', 3),
(36, '2024_02_02_104444_create_tool_positions_table', 4),
(37, '2024_02_03_111101_create_tool_securities_table', 5),
(38, '2024_02_04_042222_create_options_table', 6),
(39, '2024_02_04_044731_additional_columns_on_requests_table', 7),
(40, '2024_02_04_145740_create_request_operators_table', 8),
(41, '2024_02_07_221500_create_request_tools_tool_securities_key_table', 9),
(42, '2024_02_10_224230_additional_columns_on_requests_table', 10),
(43, '2024_02_11_230008_add_status_id_to_rttsk_table', 11),
(44, '2024_02_13_025632_add_user_id_to_rttsk_table', 12),
(45, '2024_02_13_203703_add_request_id_to_rttsk_table', 13),
(46, '2024_02_22_132822_add_current_security_id_to_requests_table', 14),
(47, '2024_02_24_010533_add_max_sec_id_to_requests_table', 15),
(48, '2023_12_07_041715_create_venues_table', 16),
(49, '2014_10_11_145106_create_honorifics_table', 17),
(50, '2024_03_09_144959_add_honorific_id_to_users_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(1, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(6, 'App\\Models\\User', 16),
(5, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 18),
(3, 'App\\Models\\User', 21);

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex_id` bigint UNSIGNED DEFAULT NULL,
  `status_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `first_name`, `middle_name`, `last_name`, `contact_number`, `sex_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'operator', '1', '1', '091', 1, NULL, '2024-02-04 07:20:21', '2024-02-04 07:20:21'),
(4, 'Jake', NULL, 'Cuenca', '0923', 1, 18, '2024-02-04 12:09:24', '2024-02-04 12:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'with', '2024-02-03 20:32:45', '2024-02-03 20:32:45'),
(2, 'without', '2024-02-03 20:32:51', '2024-02-03 20:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 20, 'myapptoken', 'f99e6e0fbbb723102ca0450600b2ef3e98f6e1db02b47b934e46a12225edda86', '[\"*\"]', '2024-03-09 23:13:35', NULL, '2024-03-09 23:09:00', '2024-03-09 23:13:35'),
(3, 'App\\Models\\User', 20, 'myapptoken', '9b8b2c7f7ef1a74a84db5622594cca3673f94c45f9e64ef3b4920313a6934a1e', '[\"*\"]', NULL, NULL, '2024-03-09 23:16:07', '2024-03-09 23:16:07'),
(4, 'App\\Models\\User', 22, 'myapptoken', '54d9aec1db613cb440b50d4fdec2c9fc37a85711dabbd2a0a33de8d39e7924d0', '[\"*\"]', NULL, NULL, '2024-03-12 07:21:48', '2024-03-12 07:21:48'),
(5, 'App\\Models\\User', 22, 'myapptoken', '5588b546e8bd36f05a673cbc1bd9ad863e20c5dc231d0dea4581f95de16b6a4b', '[\"*\"]', '2024-03-17 01:03:33', NULL, '2024-03-17 00:29:32', '2024-03-17 01:03:33'),
(6, 'App\\Models\\User', 3, 'myapptoken', 'ed4f304b82bbff2a0f95e29c1b453006c56194462c141dabca96c46c0a5b3f4a', '[\"*\"]', '2024-03-17 02:22:12', NULL, '2024-03-17 02:20:06', '2024-03-17 02:22:12'),
(178, 'App\\Models\\User', 4, 'myapptoken', '15164bd10aae67b89a843584520c53e14b68d7091dc3f8ef5e981753ffd39a67', '[\"*\"]', '2024-03-25 06:54:49', NULL, '2024-03-25 06:46:31', '2024-03-25 06:54:49'),
(179, 'App\\Models\\User', 4, 'myapptoken', '7cf2b1fcb443c7e4e3c8a1cf3108485ea6996d98d09decfddcb8c3d7963909d3', '[\"*\"]', NULL, NULL, '2024-03-25 07:02:27', '2024-03-25 07:02:27'),
(180, 'App\\Models\\User', 4, 'myapptoken', '0106bd3f0c3055e1bba236824662b11ae533a8df5b51a0c0a83567ebf387f4e1', '[\"*\"]', '2024-03-25 07:07:18', NULL, '2024-03-25 07:07:12', '2024-03-25 07:07:18'),
(181, 'App\\Models\\User', 4, 'myapptoken', 'b77c01e3da544b3afd104f678bec8a7a4d54376a3b741cb96f459672ade33943', '[\"*\"]', '2024-03-25 07:24:38', NULL, '2024-03-25 07:17:16', '2024-03-25 07:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Student', '2024-01-19 18:48:24', '2024-01-19 18:48:24'),
(2, 'Faculty', '2024-01-19 18:48:30', '2024-01-19 19:03:46'),
(3, 'Head of Office', '2024-01-19 18:48:48', '2024-01-19 18:48:48'),
(5, 'VP Administration and Finance', '2024-02-02 03:42:09', '2024-03-09 06:38:23'),
(6, 'University President', '2024-02-02 03:42:17', '2024-03-09 06:37:54'),
(8, 'Guest', '2024-02-02 03:43:18', '2024-02-02 03:43:18'),
(9, 'Staff', '2024-02-02 08:16:55', '2024-02-02 08:16:55'),
(10, 'Operator', '2024-02-02 09:16:21', '2024-02-02 09:16:21'),
(11, 'Technician', '2024-02-02 09:16:39', '2024-02-02 09:16:39'),
(12, 'Administrator', '2024-02-03 06:07:14', '2024-02-03 06:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint UNSIGNED NOT NULL,
  `request_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tool_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `borrower_id` bigint UNSIGNED DEFAULT NULL,
  `status_id` bigint UNSIGNED DEFAULT NULL,
  `current_security_id` bigint UNSIGNED DEFAULT NULL,
  `max_security_id` bigint UNSIGNED DEFAULT NULL,
  `option_id` bigint UNSIGNED DEFAULT NULL,
  `date_needed` date DEFAULT NULL,
  `estimated_return_date` date DEFAULT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `request_number`, `tool_id`, `user_id`, `borrower_id`, `status_id`, `current_security_id`, `max_security_id`, `option_id`, `date_needed`, `estimated_return_date`, `purpose`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1, 1, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 23:15:28', '2024-01-19 23:15:28'),
(2, NULL, NULL, 4, 4, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 23:24:39', '2024-01-20 10:28:06'),
(3, NULL, NULL, 4, 1, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 23:35:25', '2024-01-20 10:29:28'),
(4, NULL, NULL, 1, 3, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 01:19:59', '2024-01-20 01:19:59'),
(5, NULL, NULL, 1, 2, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 01:22:46', '2024-01-20 01:22:46'),
(6, NULL, NULL, 1, 5, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 02:32:19', '2024-01-20 02:32:19'),
(7, NULL, NULL, 1, 4, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 03:01:39', '2024-01-20 03:01:39'),
(8, NULL, NULL, 1, 1, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 03:59:06', '2024-01-20 03:59:06'),
(9, NULL, NULL, 1, 1, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 04:04:10', '2024-01-20 04:04:10'),
(10, NULL, NULL, 1, 1, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 04:06:01', '2024-01-20 04:06:01'),
(11, NULL, NULL, 1, 1, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 04:06:54', '2024-01-20 05:12:36'),
(12, NULL, NULL, 1, 2, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 05:42:52', '2024-01-20 05:42:52'),
(13, NULL, NULL, 4, 1, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 05:45:31', '2024-01-20 05:45:31'),
(14, NULL, NULL, 5, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 10:01:46', '2024-01-20 10:01:46'),
(15, NULL, NULL, 5, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 10:19:22', '2024-01-20 10:19:22'),
(16, NULL, NULL, 5, NULL, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 10:43:27', '2024-01-20 10:45:14'),
(17, NULL, NULL, 5, NULL, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 10:54:06', '2024-01-20 10:54:53'),
(18, NULL, NULL, 1, 2, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 22:02:48', '2024-01-20 22:02:48'),
(19, NULL, NULL, 5, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 22:49:03', '2024-01-20 22:49:03'),
(20, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 22:53:34', '2024-01-20 23:10:40'),
(21, NULL, NULL, 1, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 22:59:26', '2024-01-20 22:59:26'),
(22, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:13:35', '2024-01-20 23:13:55'),
(23, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:15:49', '2024-01-20 23:16:05'),
(24, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:19:25', '2024-01-20 23:20:07'),
(25, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:28:30', '2024-01-20 23:29:12'),
(26, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:32:31', '2024-01-20 23:33:00'),
(27, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:42:56', '2024-01-20 23:43:19'),
(28, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:46:44', '2024-01-20 23:47:01'),
(29, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:58:37', '2024-01-20 23:59:02'),
(30, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:15:16', '2024-01-21 00:15:32'),
(31, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:16:54', '2024-01-21 00:17:18'),
(32, NULL, NULL, 7, 8, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:19:14', '2024-01-21 00:19:14'),
(33, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:19:27', '2024-01-21 00:20:23'),
(34, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:23:39', '2024-01-21 00:24:11'),
(35, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:25:25', '2024-01-21 00:25:40'),
(36, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:28:49', '2024-01-21 00:29:15'),
(37, NULL, NULL, 1, 1, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:35:53', '2024-01-27 22:35:53'),
(38, NULL, NULL, 1, 2, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:41:03', '2024-01-27 22:41:03'),
(39, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:44:37', '2024-01-27 22:45:06'),
(40, NULL, NULL, 7, 8, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:50:43', '2024-01-27 22:50:43'),
(41, NULL, NULL, 7, 8, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:55:23', '2024-01-27 22:55:23'),
(42, NULL, NULL, 7, 8, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:55:51', '2024-01-27 22:55:51'),
(43, NULL, NULL, 7, 8, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:58:02', '2024-01-27 22:58:02'),
(44, NULL, NULL, 7, 8, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:58:39', '2024-01-27 22:58:39'),
(45, NULL, NULL, 7, 8, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 23:00:51', '2024-01-27 23:00:51'),
(46, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 23:04:21', '2024-01-27 23:15:52'),
(47, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 23:05:16', '2024-01-27 23:16:43'),
(48, NULL, NULL, 1, 1, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 23:51:03', '2024-01-27 23:51:03'),
(49, NULL, NULL, 1, 1, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-02 09:06:34', '2024-02-02 09:06:34'),
(50, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-02 13:43:26', '2024-02-02 13:44:01'),
(51, NULL, NULL, 12, 12, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-03 04:28:24', '2024-02-03 07:04:27'),
(52, NULL, NULL, 13, 13, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-03 07:00:22', '2024-02-03 07:05:31'),
(53, NULL, NULL, 7, 8, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-03 07:28:06', '2024-02-03 07:28:29'),
(54, NULL, NULL, 7, 8, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-03 07:30:17', '2024-02-03 07:30:40'),
(55, NULL, NULL, 10, 13, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-03 12:40:14', '2024-02-03 12:40:59'),
(56, NULL, NULL, 10, 13, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-03 12:41:14', '2024-02-03 12:41:14'),
(57, NULL, NULL, 13, 12, 16, NULL, NULL, 2, NULL, '2024-02-05', NULL, NULL, '2024-02-04 06:40:45', '2024-02-04 07:30:46'),
(58, NULL, NULL, 13, 12, 16, NULL, NULL, 1, NULL, '2024-02-06', 'for school event', NULL, '2024-02-04 07:46:50', '2024-02-04 07:47:18'),
(59, NULL, NULL, 13, 12, 15, NULL, NULL, 2, NULL, '2024-02-06', 'try', NULL, '2024-02-04 10:58:32', '2024-02-04 11:02:52'),
(60, NULL, NULL, 13, 12, 15, NULL, NULL, 1, NULL, '2024-02-06', 'try with', NULL, '2024-02-04 11:03:17', '2024-02-04 11:18:07'),
(61, NULL, NULL, 13, 12, 6, NULL, NULL, 1, NULL, '2024-02-06', 'operator trial', NULL, '2024-02-04 17:20:51', '2024-02-04 17:23:01'),
(62, NULL, NULL, 13, 1, 15, NULL, NULL, 1, NULL, '2024-02-07', 'aho', NULL, '2024-02-04 17:30:08', '2024-02-04 17:48:56'),
(63, NULL, NULL, 10, 1, 16, NULL, NULL, 1, NULL, '2024-02-09', 'try for security_id in the RequestToolToolSecurityKey', NULL, '2024-02-07 14:39:53', '2024-02-07 14:39:53'),
(64, NULL, NULL, 10, 1, 16, NULL, NULL, 1, NULL, '2024-02-09', 'second try on saving to RequestToolToolSecurityKey', NULL, '2024-02-07 14:47:58', '2024-02-07 14:47:58'),
(65, NULL, NULL, 10, 1, 16, NULL, NULL, 1, NULL, '2024-02-09', 'third try on saving to RequestToolToolSecurityKey', NULL, '2024-02-07 14:53:08', '2024-02-07 14:53:08'),
(66, NULL, NULL, 13, 1, 16, NULL, NULL, 2, NULL, '2024-02-10', 'seccurity try', NULL, '2024-02-08 08:20:04', '2024-02-08 08:51:53'),
(67, NULL, NULL, 13, 8, 15, NULL, NULL, 1, '2024-02-12', '2024-02-13', 'personal', NULL, '2024-02-10 14:51:58', '2024-02-10 14:57:37'),
(68, NULL, NULL, 13, 1, 16, NULL, NULL, 1, '2024-02-12', '2024-02-13', 'try', NULL, '2024-02-10 15:08:27', '2024-02-10 15:15:09'),
(69, NULL, NULL, 7, 8, 11, NULL, NULL, 1, '2024-02-12', '2024-02-13', 'two requeter request trial', NULL, '2024-02-10 15:30:11', '2024-02-10 15:30:11'),
(70, NULL, NULL, 4, 1, 11, NULL, NULL, 1, '2024-02-13', '2024-02-12', 'two requester trial with the acc of gmar ', NULL, '2024-02-10 15:31:00', '2024-02-10 15:31:00'),
(71, NULL, NULL, 4, 1, 11, NULL, NULL, 1, '2024-02-12', '2024-02-13', '', NULL, '2024-02-10 15:38:46', '2024-02-10 15:38:46'),
(72, NULL, NULL, 7, 8, 11, NULL, NULL, 1, '2024-02-12', '2024-02-13', '3', NULL, '2024-02-10 15:39:07', '2024-02-10 15:39:07'),
(73, NULL, NULL, 4, 1, 11, NULL, NULL, 1, '2024-02-12', '2024-02-13', 'multiple user request 3rdtry', NULL, '2024-02-10 15:42:20', '2024-02-10 15:42:20'),
(74, NULL, NULL, 4, 1, 16, NULL, NULL, 1, '2024-02-12', '2024-02-13', 'multiple user request 3rdtry', NULL, '2024-02-10 15:46:05', '2024-02-10 15:53:38'),
(75, NULL, NULL, 7, 8, 11, NULL, NULL, 1, '2024-02-13', '2024-02-14', 'multiple user request 3rdtry', NULL, '2024-02-10 15:46:08', '2024-02-10 15:46:08'),
(76, NULL, NULL, 4, 1, 11, NULL, NULL, 1, '2024-02-13', '2024-02-14', '4th try', NULL, '2024-02-10 16:02:35', '2024-02-10 16:02:35'),
(77, NULL, NULL, 4, 1, 11, NULL, NULL, 1, '2024-02-12', '2024-02-13', '5th try', NULL, '2024-02-10 17:05:51', '2024-02-10 17:05:51'),
(78, NULL, NULL, 4, 1, 11, NULL, NULL, 1, '2024-02-12', '2024-02-13', '6th try', NULL, '2024-02-10 17:10:08', '2024-02-10 17:10:08'),
(79, NULL, NULL, 4, 1, 11, NULL, NULL, 1, '2024-02-12', '2024-02-13', '7th try', NULL, '2024-02-10 17:16:52', '2024-02-10 17:16:52'),
(80, NULL, NULL, 4, 1, 16, NULL, NULL, 1, '2024-02-12', '2024-02-13', '8th try', NULL, '2024-02-10 17:18:32', '2024-02-10 17:43:57'),
(81, NULL, NULL, 13, 1, 15, NULL, NULL, 1, '2024-02-13', '2024-02-14', NULL, NULL, '2024-02-11 14:08:03', '2024-02-11 14:11:59'),
(82, NULL, NULL, 13, 1, 16, NULL, NULL, 1, '2024-02-13', '2024-02-14', NULL, NULL, '2024-02-11 14:16:57', '2024-02-11 14:17:44'),
(83, NULL, NULL, 13, 1, 16, NULL, NULL, 2, '2024-02-13', '2024-02-14', NULL, NULL, '2024-02-11 14:51:25', '2024-02-11 14:51:49'),
(84, NULL, NULL, 13, 1, 11, NULL, NULL, 2, '2024-02-13', '2024-02-14', NULL, NULL, '2024-02-11 15:09:51', '2024-02-11 15:09:51'),
(85, NULL, NULL, 13, 1, 10, NULL, NULL, 2, '2024-02-14', '2024-02-15', NULL, NULL, '2024-02-12 12:30:51', '2024-02-12 13:32:09'),
(86, NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-12 13:37:20', '2024-02-12 13:37:20'),
(87, NULL, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-12 13:37:20', '2024-02-12 13:37:20'),
(88, NULL, NULL, 13, 1, 16, NULL, NULL, 1, '2024-02-15', '2024-02-16', NULL, NULL, '2024-02-13 11:38:21', '2024-02-13 11:38:49'),
(89, NULL, NULL, 13, 1, 16, NULL, NULL, 1, '2024-02-15', '2024-02-16', NULL, NULL, '2024-02-13 12:08:06', '2024-02-13 12:08:33'),
(90, NULL, NULL, 13, 1, 10, NULL, NULL, 1, '2024-02-15', '2024-02-15', NULL, NULL, '2024-02-13 12:40:52', '2024-02-13 15:53:26'),
(91, NULL, NULL, 13, 1, 16, NULL, NULL, 1, '2024-02-15', '2024-02-16', NULL, NULL, '2024-02-13 13:36:33', '2024-02-13 13:36:52'),
(92, NULL, NULL, 13, 1, 10, NULL, NULL, 1, '2024-02-15', '2024-02-16', NULL, NULL, '2024-02-13 16:01:56', '2024-02-13 16:03:35'),
(93, NULL, NULL, 13, 1, 16, 5, NULL, 1, '2024-02-23', '2024-02-23', 'ey', NULL, '2024-02-22 03:41:03', '2024-02-22 05:32:31'),
(94, NULL, NULL, 13, 1, 10, NULL, NULL, 1, '2024-02-23', '2024-02-24', 'ey', NULL, '2024-02-22 03:52:24', '2024-02-22 03:59:59'),
(95, NULL, NULL, 13, 1, 16, NULL, NULL, 1, '2024-02-23', '2024-02-24', NULL, NULL, '2024-02-22 04:03:22', '2024-02-22 04:03:39'),
(96, NULL, NULL, 13, 2, 10, 6, NULL, 1, '2024-02-23', '2024-02-24', NULL, NULL, '2024-02-22 05:57:54', '2024-02-22 06:03:54'),
(97, NULL, NULL, 13, 1, 10, 6, NULL, 1, '2024-02-23', '2024-02-24', NULL, NULL, '2024-02-22 05:58:53', '2024-02-22 06:03:09'),
(98, NULL, NULL, 13, 2, 10, 5, 6, 1, '2024-02-25', '2024-02-26', NULL, NULL, '2024-02-23 17:10:39', '2024-02-23 17:28:01'),
(99, NULL, NULL, 13, 2, 16, 5, 6, 1, '2024-02-25', '2024-02-26', NULL, NULL, '2024-02-23 17:33:42', '2024-02-23 17:33:57'),
(100, NULL, NULL, 13, 1, 10, 6, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-24 22:54:17', '2024-02-24 22:57:50'),
(101, NULL, NULL, 13, 1, 16, 3, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-24 22:59:54', '2024-02-24 23:00:18'),
(102, NULL, NULL, 13, 1, 16, 6, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-24 23:14:27', '2024-02-24 23:15:11'),
(103, NULL, NULL, 13, 1, 16, 6, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-24 23:16:58', '2024-02-24 23:17:15'),
(104, NULL, NULL, 13, 2, 16, 6, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-24 23:20:34', '2024-02-24 23:20:55'),
(105, NULL, NULL, 13, 2, 16, 5, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-24 23:22:31', '2024-02-24 23:22:57'),
(106, NULL, NULL, 13, 2, 10, 6, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-24 23:24:12', '2024-02-24 23:25:01'),
(107, NULL, NULL, 13, 1, 15, 3, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-24 23:49:11', '2024-02-25 00:02:17'),
(108, NULL, NULL, 13, 2, 15, 3, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-25 00:07:57', '2024-02-25 00:08:13'),
(109, NULL, NULL, 13, 2, 8, 3, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-25 00:18:18', '2024-02-25 00:18:31'),
(110, NULL, NULL, 13, 2, 15, 5, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-25 00:30:09', '2024-02-25 00:33:33'),
(111, NULL, NULL, 13, 2, 15, 5, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-25 00:36:52', '2024-02-25 00:37:24'),
(112, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-25 00:41:51', '2024-02-25 00:45:11'),
(113, NULL, NULL, 13, 1, 6, 3, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-25 01:23:02', '2024-02-25 03:50:02'),
(114, NULL, NULL, 13, 1, 6, 3, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-25 01:24:46', '2024-02-25 03:49:08'),
(115, NULL, NULL, 13, 1, 6, 6, 6, 1, '2024-02-26', '2024-02-27', NULL, NULL, '2024-02-25 01:26:14', '2024-02-25 03:46:26'),
(116, NULL, NULL, 13, 9, 6, 5, 5, 1, '2024-02-27', '2024-02-28', NULL, NULL, '2024-02-26 00:19:02', '2024-02-26 00:32:31'),
(117, NULL, NULL, 13, 1, 11, 6, 6, 1, '2024-02-28', '2024-02-29', NULL, NULL, '2024-02-27 00:26:34', '2024-02-27 00:26:34'),
(118, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-02-28', '2024-02-29', NULL, NULL, '2024-02-27 03:26:55', '2024-02-27 03:27:29'),
(119, NULL, NULL, 13, 1, 12, 6, 6, 1, '2024-02-28', '2024-02-29', NULL, NULL, '2024-02-27 03:32:46', '2024-02-27 03:41:55'),
(120, NULL, NULL, 13, 1, 12, 6, 6, 1, '2024-02-28', '2024-02-29', NULL, NULL, '2024-02-27 03:46:44', '2024-02-27 03:52:32'),
(121, NULL, NULL, 13, 1, 12, 6, 6, 2, '2024-03-06', '2024-03-07', NULL, NULL, '2024-03-04 19:38:03', '2024-03-04 19:53:33'),
(122, NULL, NULL, 13, 1, 12, 6, 6, 2, '2024-03-06', '2024-03-07', NULL, NULL, '2024-03-04 19:53:53', '2024-03-04 19:54:51'),
(123, NULL, NULL, 13, 1, 15, 5, 6, 2, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-05 12:44:04', '2024-03-05 12:46:50'),
(124, NULL, NULL, 13, 1, 12, 6, 6, 2, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-05 12:52:35', '2024-03-05 12:54:32'),
(125, NULL, NULL, 13, 1, 12, 6, 6, 2, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-05 13:09:47', '2024-03-05 13:28:16'),
(126, NULL, NULL, 13, 1, 16, 3, 6, 2, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-05 13:28:37', '2024-03-05 13:29:04'),
(127, NULL, NULL, 13, 1, 16, 3, 6, 2, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-05 13:35:49', '2024-03-05 13:36:07'),
(128, NULL, NULL, 13, 1, 16, 3, 6, 2, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-05 13:40:39', '2024-03-05 13:47:50'),
(129, NULL, NULL, 13, 1, 16, 3, 6, 2, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-05 13:49:09', '2024-03-05 13:50:21'),
(130, NULL, NULL, 13, 2, 12, 6, 6, 2, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-05 13:55:37', '2024-03-05 13:58:11'),
(131, NULL, NULL, 13, 1, 12, 6, 6, 2, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-05 16:55:02', '2024-03-06 02:59:48'),
(132, NULL, NULL, 13, 1, 12, 5, 6, 2, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-06 03:03:42', '2024-03-06 03:04:21'),
(133, NULL, NULL, 13, 1, 6, 5, 6, 2, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-06 03:11:59', '2024-03-06 03:12:34'),
(134, NULL, NULL, 13, 1, 12, 6, 6, 1, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-06 03:54:56', '2024-03-06 04:00:07'),
(135, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-06 04:05:32', '2024-03-06 04:12:01'),
(136, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-06 04:12:53', '2024-03-06 04:20:24'),
(137, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-06 04:28:09', '2024-03-06 04:29:48'),
(138, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-06 04:30:17', '2024-03-06 04:32:48'),
(139, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-03-07', '2024-03-08', NULL, NULL, '2024-03-06 04:33:05', '2024-03-06 04:33:37'),
(140, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-06 11:42:44', '2024-03-06 11:48:56'),
(141, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-06 11:49:19', '2024-03-06 11:51:37'),
(142, NULL, NULL, 13, 1, 16, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-06 11:51:57', '2024-03-06 11:52:14'),
(143, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-06 11:55:32', '2024-03-06 11:56:25'),
(144, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-06 11:56:44', '2024-03-06 12:01:26'),
(145, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-06 12:01:46', '2024-03-06 12:07:50'),
(146, NULL, NULL, 13, 1, 16, 6, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-06 12:08:10', '2024-03-06 12:09:02'),
(147, NULL, NULL, 13, 1, 12, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-06 12:17:40', '2024-03-07 00:44:54'),
(148, NULL, NULL, 13, 1, 6, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 00:51:10', '2024-03-07 00:59:26'),
(149, NULL, NULL, 13, 2, 6, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 01:00:38', '2024-03-07 01:01:35'),
(150, NULL, NULL, 13, 1, 6, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 01:06:35', '2024-03-07 01:07:05'),
(151, NULL, NULL, 13, 1, 12, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 01:14:14', '2024-03-07 01:16:24'),
(152, NULL, NULL, 13, 1, 12, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 01:16:46', '2024-03-07 01:18:48'),
(153, NULL, NULL, 13, 1, 12, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 01:19:24', '2024-03-07 01:23:42'),
(154, NULL, NULL, 13, 3, 12, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 01:26:39', '2024-03-07 01:27:51'),
(155, NULL, NULL, 13, 2, 12, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 01:33:15', '2024-03-07 01:34:36'),
(156, NULL, NULL, 13, 1, 6, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 01:57:00', '2024-03-07 01:57:47'),
(157, NULL, NULL, 13, 2, 6, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 01:59:25', '2024-03-07 02:01:52'),
(158, NULL, NULL, 13, 1, 6, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 02:06:44', '2024-03-07 02:07:51'),
(159, NULL, NULL, 13, 3, 6, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 02:13:35', '2024-03-07 02:16:09'),
(160, NULL, NULL, 13, 2, 12, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 02:18:23', '2024-03-07 02:21:20'),
(161, NULL, NULL, 13, 1, 12, 6, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 02:35:28', '2024-03-07 02:38:11'),
(162, NULL, NULL, 13, 2, 12, 6, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 02:53:25', '2024-03-07 18:53:03'),
(163, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-03-09', '2024-03-10', NULL, NULL, '2024-03-07 19:15:02', '2024-03-07 19:15:51'),
(164, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-03-08', '2024-03-09', NULL, NULL, '2024-03-07 19:24:34', '2024-03-07 21:17:15'),
(165, NULL, NULL, 13, 2, 15, 5, 6, 1, '2024-03-09', '2024-03-10', NULL, NULL, '2024-03-07 21:20:59', '2024-03-07 21:21:53'),
(166, NULL, NULL, 13, 2, 15, 5, 6, 1, '2024-03-09', '2024-03-10', NULL, NULL, '2024-03-07 21:26:01', '2024-03-07 21:26:32'),
(167, NULL, NULL, 13, 2, 15, 5, 6, 1, '2024-03-10', '2024-03-11', 'exam', NULL, '2024-03-09 04:26:03', '2024-03-09 04:28:25'),
(168, NULL, NULL, 13, 2, 15, 5, 6, 1, '2024-03-10', '2024-03-11', NULL, NULL, '2024-03-09 04:33:01', '2024-03-09 04:34:11'),
(169, NULL, NULL, 13, 1, 15, 5, 6, 1, '2024-03-10', '2024-03-11', NULL, NULL, '2024-03-09 04:39:32', '2024-03-09 04:41:59'),
(170, NULL, NULL, 13, 2, 12, 6, 6, 1, '2024-03-10', '2024-03-11', NULL, NULL, '2024-03-09 04:42:37', '2024-03-09 04:47:50'),
(171, NULL, NULL, 13, 2, 12, 5, 6, 1, '2024-03-10', '2024-03-11', NULL, NULL, '2024-03-09 05:03:43', '2024-03-09 05:19:57'),
(172, NULL, NULL, 13, 1, 11, 5, 6, 1, '2024-03-11', '2024-03-12', 'Intramurals', NULL, '2024-03-09 10:27:16', '2024-03-09 10:27:16'),
(173, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 19:27:59', '2024-03-09 19:27:59'),
(174, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 19:35:14', '2024-03-09 19:35:14'),
(175, NULL, NULL, 13, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 19:35:43', '2024-03-09 19:35:43'),
(176, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 19:40:19', '2024-03-09 19:40:19'),
(177, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 19:40:34', '2024-03-09 19:40:34'),
(178, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 19:42:25', '2024-03-09 19:42:25'),
(179, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 19:42:42', '2024-03-09 19:42:42'),
(180, NULL, NULL, 13, NULL, NULL, NULL, NULL, 1, '2024-03-10', '2024-03-10', NULL, NULL, '2024-03-09 19:52:13', '2024-03-09 19:52:13'),
(181, NULL, NULL, 13, NULL, NULL, NULL, NULL, 1, '2024-03-10', '2024-03-10', NULL, NULL, '2024-03-09 21:12:42', '2024-03-09 21:12:42'),
(182, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2024-03-10', '2024-03-10', NULL, '2024-03-09 21:31:05', '2024-03-09 21:24:47', '2024-03-09 21:31:05'),
(183, '202842', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2024-03-10', '2024-03-10', NULL, NULL, '2024-03-09 21:40:40', '2024-03-09 21:40:40'),
(184, NULL, NULL, 13, 15, 12, 5, 6, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-10 23:27:00', '2024-03-10 23:29:41'),
(185, NULL, NULL, 13, 2, 12, 5, 6, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-10 23:59:13', '2024-03-11 02:50:42'),
(186, NULL, NULL, 13, 1, 11, 5, 6, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 02:49:12', '2024-03-11 02:49:12'),
(187, NULL, NULL, 13, 1, 15, 5, 5, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 02:52:21', '2024-03-11 02:57:37'),
(188, NULL, NULL, 13, 1, 11, 5, 5, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 02:58:16', '2024-03-11 02:58:16'),
(189, NULL, NULL, 13, 4, 11, 5, 6, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 03:02:12', '2024-03-11 03:02:12'),
(190, NULL, NULL, 13, 4, 11, 6, 6, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 03:04:36', '2024-03-11 03:04:36'),
(191, NULL, NULL, 13, 1, 11, 5, 6, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 03:07:10', '2024-03-11 03:07:10'),
(192, NULL, NULL, 13, 1, 11, NULL, NULL, 2, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 03:11:13', '2024-03-11 03:11:13'),
(193, NULL, NULL, 13, 1, 11, 5, 6, 2, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 03:12:21', '2024-03-11 03:12:21'),
(194, NULL, NULL, 13, 1, 11, 5, 5, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 03:25:39', '2024-03-11 03:25:39'),
(195, NULL, NULL, 13, 1, 11, 5, 5, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 03:34:08', '2024-03-11 03:34:08'),
(196, NULL, NULL, 13, 1, 11, 5, 5, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 03:37:15', '2024-03-11 03:37:15'),
(197, NULL, NULL, 13, 1, 11, 5, 5, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 03:39:14', '2024-03-11 03:39:14'),
(198, NULL, NULL, 13, 1, 11, 5, 5, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 03:45:21', '2024-03-11 03:45:21'),
(199, NULL, NULL, 13, 2, 11, 5, 5, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 03:46:23', '2024-03-11 03:46:23'),
(200, NULL, NULL, 13, 1, 11, 5, 5, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 03:51:47', '2024-03-11 03:51:47'),
(201, NULL, NULL, 13, 1, 11, 5, 5, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 03:54:59', '2024-03-11 03:54:59'),
(202, NULL, NULL, 13, 1, 11, 5, 5, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 03:55:51', '2024-03-11 03:55:51'),
(203, NULL, NULL, 13, 1, 11, 5, 5, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 04:04:08', '2024-03-11 04:04:08'),
(204, NULL, NULL, 13, 1, 11, 5, 5, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 04:05:45', '2024-03-11 04:05:45'),
(205, NULL, NULL, 13, 1, 11, 5, 5, 1, '2024-03-12', '2024-03-13', NULL, NULL, '2024-03-11 04:07:26', '2024-03-11 04:07:26'),
(206, NULL, NULL, 22, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 00:40:53', '2024-03-17 00:40:53'),
(207, NULL, NULL, 22, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 00:43:39', '2024-03-17 00:43:39'),
(208, NULL, NULL, 22, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 00:57:44', '2024-03-17 00:57:44'),
(209, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 00:58:35', '2024-03-17 00:58:35'),
(210, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 00:59:06', '2024-03-17 00:59:06'),
(211, NULL, NULL, NULL, 1, 11, 5, 6, 2, '2024-03-20', '2024-03-25', 'Some purpose', NULL, '2024-03-17 01:00:06', '2024-03-17 01:00:06'),
(212, NULL, NULL, NULL, 1, 11, 5, 6, 2, '2024-03-20', '2024-03-25', 'Some purpose', NULL, '2024-03-17 01:03:33', '2024-03-17 01:03:33'),
(213, NULL, NULL, NULL, NULL, 11, 5, 6, 2, '2024-03-20', '2024-03-25', 'Some purpose', NULL, '2024-03-17 02:20:27', '2024-03-17 02:20:27'),
(214, NULL, NULL, NULL, NULL, 11, 5, 6, 2, '2024-03-20', '2024-03-25', 'Some purpose', NULL, '2024-03-17 02:22:12', '2024-03-17 02:22:12'),
(215, NULL, NULL, NULL, 1, 11, 5, 6, 2, '2024-03-20', '2024-03-25', 'Some purpose', NULL, '2024-03-17 02:24:45', '2024-03-17 02:24:45'),
(216, NULL, NULL, NULL, 1, 11, 5, 6, 2, '2024-03-20', '2024-03-25', 'Some purpose', NULL, '2024-03-17 02:26:30', '2024-03-17 02:26:30'),
(217, NULL, NULL, NULL, 1, 11, 5, 6, 2, '2024-03-20', '2024-03-25', 'Some purpose', NULL, '2024-03-17 02:28:21', '2024-03-17 02:28:21'),
(218, NULL, NULL, 4, 1, 12, 6, 6, 2, '2024-03-20', '2024-03-25', 'Some purpose', NULL, '2024-03-17 02:31:11', '2024-03-17 02:36:27'),
(219, NULL, NULL, 13, 12, 11, 2, 9, 1, '2024-03-18', '2024-03-19', NULL, NULL, '2024-03-17 02:34:40', '2024-03-17 02:34:40'),
(220, NULL, NULL, 13, 2, 11, 5, 5, 1, '2024-03-23', '2024-03-30', NULL, NULL, '2024-03-21 23:37:24', '2024-03-21 23:37:24'),
(221, NULL, NULL, 13, 9, 11, 5, 5, 1, '2024-03-23', '2024-03-25', NULL, NULL, '2024-03-21 23:49:23', '2024-03-21 23:49:23'),
(222, NULL, NULL, 4, 1, 11, NULL, NULL, 2, NULL, '2024-03-25', 'A', NULL, '2024-03-24 02:26:49', '2024-03-24 02:26:49'),
(223, NULL, NULL, 4, 1, 11, NULL, NULL, 2, NULL, '2024-03-25', NULL, NULL, '2024-03-24 02:40:55', '2024-03-24 02:40:55'),
(224, NULL, NULL, 4, 1, 11, 5, 5, 2, NULL, '2024-03-25', NULL, NULL, '2024-03-24 02:44:01', '2024-03-24 02:44:01'),
(225, NULL, NULL, 4, 1, 11, 5, 5, 2, NULL, '2024-03-25', NULL, NULL, '2024-03-24 02:44:43', '2024-03-24 02:44:43'),
(226, NULL, NULL, 4, 1, 11, 5, 5, 2, NULL, '2024-03-25', NULL, NULL, '2024-03-24 02:45:16', '2024-03-24 02:45:16'),
(227, NULL, NULL, 4, 1, 11, 5, 5, 2, NULL, '2024-03-25', NULL, NULL, '2024-03-24 02:49:36', '2024-03-24 02:49:37'),
(228, NULL, NULL, 4, 1, 11, 5, 5, 2, NULL, '2024-03-25', NULL, NULL, '2024-03-24 02:49:37', '2024-03-24 02:49:38'),
(229, NULL, NULL, 4, 1, 11, NULL, NULL, 2, '2024-03-24', '2024-03-25', NULL, NULL, '2024-03-24 02:50:35', '2024-03-24 02:50:35'),
(230, NULL, NULL, 4, 1, 11, NULL, NULL, 2, '2024-03-28', '2024-03-25', NULL, NULL, '2024-03-24 02:51:14', '2024-03-24 02:51:14'),
(231, NULL, NULL, 4, 1, 11, NULL, NULL, 2, '2024-04-28', '2024-03-25', NULL, NULL, '2024-03-24 02:53:53', '2024-03-24 02:53:53'),
(232, NULL, NULL, 4, 1, 11, NULL, NULL, 2, '2024-03-24', '2024-03-24', NULL, NULL, '2024-03-24 03:16:12', '2024-03-24 03:16:12'),
(233, NULL, NULL, 4, 1, 11, NULL, NULL, 2, '2024-04-24', '2024-03-24', NULL, NULL, '2024-03-24 03:16:40', '2024-03-24 03:16:40'),
(234, NULL, NULL, 4, 1, 11, 5, 5, 2, '2024-03-27', '2024-03-28', NULL, NULL, '2024-03-24 03:24:57', '2024-03-24 03:24:57'),
(235, NULL, NULL, 4, 1, 11, 5, 5, 2, '2024-03-27', '2024-03-28', 'A', NULL, '2024-03-24 03:25:15', '2024-03-24 03:25:15'),
(236, NULL, NULL, 4, 1, 11, NULL, NULL, 2, '2024-03-24', '2025-03-25', 'A', NULL, '2024-03-24 03:29:29', '2024-03-24 03:29:29'),
(237, NULL, NULL, 4, 1, 11, NULL, NULL, 2, '2024-03-25', '2024-03-26', NULL, NULL, '2024-03-24 03:47:34', '2024-03-24 03:47:34'),
(238, NULL, NULL, 4, 1, 11, NULL, NULL, 2, '2024-03-24', '2024-03-26', NULL, NULL, '2024-03-24 03:55:22', '2024-03-24 03:55:22'),
(239, NULL, NULL, 4, 1, 11, 5, 5, 2, '2024-03-24', '2024-03-24', NULL, NULL, '2024-03-24 04:43:13', '2024-03-24 04:43:14'),
(240, NULL, NULL, 4, 1, 11, 5, 5, 2, '2024-03-24', '2024-06-24', NULL, NULL, '2024-03-24 04:45:52', '2024-03-24 04:45:52'),
(241, NULL, NULL, 4, 1, 11, 5, 6, 2, '2024-03-24', '2024-06-24', NULL, NULL, '2024-03-24 04:56:37', '2024-03-24 04:56:37'),
(242, NULL, NULL, 4, 1, 11, 5, 5, 2, '2024-03-24', '2035-03-24', NULL, NULL, '2024-03-24 08:31:45', '2024-03-24 08:31:45'),
(243, NULL, NULL, 4, 1, 11, 5, 5, 2, '2024-03-25', '2024-03-27', 'From mibile', NULL, '2024-03-24 08:57:51', '2024-03-24 08:57:51'),
(244, NULL, NULL, 4, 1, 11, 5, 6, 2, '2024-03-24', '2024-03-25', 'Ey', NULL, '2024-03-24 09:01:52', '2024-03-24 09:01:52'),
(245, NULL, NULL, 4, 1, 11, 5, 5, 2, '2024-03-24', '2024-03-25', 'He', NULL, '2024-03-24 09:04:24', '2024-03-24 09:04:24'),
(246, NULL, NULL, 4, 1, 11, 5, 5, 2, '2024-03-24', '2024-03-24', 'R', NULL, '2024-03-24 09:20:04', '2024-03-24 09:20:05'),
(247, NULL, NULL, 4, 1, 11, 5, 5, 2, '2024-03-24', '2024-03-24', 'D', NULL, '2024-03-24 09:38:40', '2024-03-24 09:38:40'),
(248, NULL, NULL, 4, 1, 11, 5, 5, 2, '2024-03-24', '2024-03-24', 'T', NULL, '2024-03-24 09:42:05', '2024-03-24 09:42:05'),
(249, NULL, NULL, 4, 1, 11, 5, 6, 2, '2024-03-24', '2024-03-24', 'G', NULL, '2024-03-24 09:43:51', '2024-03-24 09:43:51'),
(250, NULL, NULL, 4, 1, 11, 5, 6, 2, '2024-03-24', '2024-03-24', 'F', NULL, '2024-03-24 09:48:22', '2024-03-24 09:48:22'),
(251, NULL, NULL, 4, 1, 11, 5, 5, 2, '2024-03-24', '2024-03-24', 'G', NULL, '2024-03-24 09:49:20', '2024-03-24 09:49:20'),
(252, NULL, NULL, 4, 1, 11, 5, 5, 2, '2024-03-24', '2024-03-24', 'F', NULL, '2024-03-24 09:50:16', '2024-03-24 09:50:16'),
(253, NULL, NULL, 4, 1, 11, 5, 5, 2, '2024-03-24', '2024-03-24', 'F', NULL, '2024-03-24 10:17:55', '2024-03-24 10:17:55'),
(254, NULL, NULL, 4, 1, 11, 5, 5, NULL, '2024-03-24', '2024-03-24', 'C', NULL, '2024-03-24 10:19:20', '2024-03-24 10:19:20'),
(255, NULL, NULL, 4, 1, 11, 5, 5, 1, '2024-03-24', '2024-03-24', 'G', NULL, '2024-03-24 10:20:54', '2024-03-24 10:20:54'),
(256, NULL, NULL, 4, 1, 11, 5, 5, 1, '2024-03-24', '2024-03-24', 'G', NULL, '2024-03-24 10:22:42', '2024-03-24 10:22:42'),
(257, NULL, NULL, 4, 1, 11, 5, 5, 1, '2024-03-24', '2024-03-24', 'H', NULL, '2024-03-24 10:23:43', '2024-03-24 10:23:43'),
(258, NULL, NULL, 4, 1, 11, 5, 5, 1, '2024-03-24', '2024-03-24', 'D', NULL, '2024-03-24 10:29:25', '2024-03-24 10:29:25'),
(259, NULL, NULL, 4, 1, 11, 5, 5, 1, '2024-03-24', '2024-03-24', 'F', NULL, '2024-03-24 10:29:37', '2024-03-24 10:29:37'),
(260, NULL, NULL, 4, 1, 11, 5, 5, 1, '2024-03-24', '2024-03-24', 'F', NULL, '2024-03-24 10:33:03', '2024-03-24 10:33:03'),
(261, NULL, NULL, 4, 1, 11, 5, 5, 1, '2024-03-24', '2024-03-24', 'F', NULL, '2024-03-24 10:37:30', '2024-03-24 10:37:30'),
(262, NULL, NULL, 4, 1, 11, 5, 5, 2, '2024-03-24', '2024-03-24', 'F', NULL, '2024-03-24 10:40:37', '2024-03-24 10:40:37'),
(263, NULL, NULL, 4, 1, 11, 5, 5, 1, '2024-03-25', '2024-03-26', 'A', NULL, '2024-03-25 03:42:57', '2024-03-25 03:42:57'),
(264, NULL, NULL, 4, 1, 11, 5, 5, 1, '2024-03-25', '2024-03-26', 'G', NULL, '2024-03-25 03:53:51', '2024-03-25 03:53:51'),
(265, NULL, NULL, 4, 1, 11, 5, 5, 1, '2024-03-25', '2024-03-25', 'F', NULL, '2024-03-25 03:56:03', '2024-03-25 03:56:03'),
(266, NULL, NULL, 4, 1, 12, 5, 5, 1, '2024-03-25', '2024-03-26', 'F', NULL, '2024-03-25 03:59:57', '2024-03-25 04:01:21'),
(267, NULL, NULL, 4, 1, 11, 5, 5, 1, '2024-03-25', '2024-03-25', 'G', NULL, '2024-03-25 04:14:54', '2024-03-25 04:14:54'),
(268, NULL, NULL, 4, 1, 11, 5, 5, 1, '2024-03-25', '2024-03-25', 'G', NULL, '2024-03-25 04:52:39', '2024-03-25 04:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `request_operators`
--

CREATE TABLE `request_operators` (
  `id` bigint UNSIGNED NOT NULL,
  `request_id` bigint UNSIGNED DEFAULT NULL,
  `operator_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_operators`
--

INSERT INTO `request_operators` (`id`, `request_id`, `operator_id`, `created_at`, `updated_at`) VALUES
(1, 58, 1, '2024-02-04 07:47:18', '2024-02-04 07:47:18'),
(2, 60, 1, '2024-02-04 11:13:51', '2024-02-04 11:13:51'),
(3, 60, 1, '2024-02-04 11:18:07', '2024-02-04 11:18:07'),
(4, 62, 1, '2024-02-04 17:48:56', '2024-02-04 17:48:56'),
(5, 62, 4, '2024-02-04 17:48:56', '2024-02-04 17:48:56'),
(6, 115, 1, '2024-02-25 03:11:37', '2024-02-25 03:11:37'),
(7, 115, 4, '2024-02-25 03:11:37', '2024-02-25 03:11:37'),
(18, 114, 1, '2024-02-25 03:49:08', '2024-02-25 03:49:08'),
(19, 113, 1, '2024-02-25 03:50:02', '2024-02-25 03:50:02'),
(20, 116, 1, '2024-02-26 00:32:31', '2024-02-26 00:32:31'),
(21, 119, 1, '2024-02-27 03:34:22', '2024-02-27 03:34:22'),
(22, 120, 1, '2024-02-27 03:47:45', '2024-02-27 03:47:45'),
(23, 134, 1, '2024-03-06 03:58:51', '2024-03-06 03:58:51'),
(24, 147, 1, '2024-03-07 00:44:32', '2024-03-07 00:44:32'),
(25, 148, 1, '2024-03-07 00:59:26', '2024-03-07 00:59:26'),
(26, 149, 1, '2024-03-07 01:01:35', '2024-03-07 01:01:35'),
(27, 150, 1, '2024-03-07 01:07:05', '2024-03-07 01:07:05'),
(28, 151, 1, '2024-03-07 01:15:14', '2024-03-07 01:15:14'),
(29, 152, 1, '2024-03-07 01:17:13', '2024-03-07 01:17:13'),
(30, 153, 4, '2024-03-07 01:20:18', '2024-03-07 01:20:18'),
(31, 154, 1, '2024-03-07 01:27:34', '2024-03-07 01:27:34'),
(32, 155, 1, '2024-03-07 01:33:54', '2024-03-07 01:33:54'),
(33, 156, 4, '2024-03-07 01:57:47', '2024-03-07 01:57:47'),
(34, 157, 1, '2024-03-07 02:00:00', '2024-03-07 02:00:00'),
(35, 157, 1, '2024-03-07 02:01:52', '2024-03-07 02:01:52'),
(36, 158, 1, '2024-03-07 02:07:51', '2024-03-07 02:07:51'),
(37, 159, 1, '2024-03-07 02:16:09', '2024-03-07 02:16:09'),
(38, 160, 4, '2024-03-07 02:18:53', '2024-03-07 02:18:53'),
(39, 161, 1, '2024-03-07 02:37:45', '2024-03-07 02:37:45'),
(40, 161, 4, '2024-03-07 02:37:45', '2024-03-07 02:37:45'),
(41, 162, 1, '2024-03-07 18:51:29', '2024-03-07 18:51:29'),
(42, 170, 1, '2024-03-09 04:47:01', '2024-03-09 04:47:01'),
(43, 171, 1, '2024-03-09 05:18:29', '2024-03-09 05:18:29'),
(44, 184, 1, '2024-03-10 23:29:15', '2024-03-10 23:29:15'),
(45, 184, 4, '2024-03-10 23:29:15', '2024-03-10 23:29:15'),
(46, 185, 1, '2024-03-11 00:06:12', '2024-03-11 00:06:12'),
(47, 266, 1, '2024-03-25 04:01:07', '2024-03-25 04:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `request_tools_tool_securities_key`
--

CREATE TABLE `request_tools_tool_securities_key` (
  `id` bigint UNSIGNED NOT NULL,
  `request_tools_id` bigint UNSIGNED DEFAULT NULL,
  `security_id` bigint UNSIGNED DEFAULT NULL,
  `status_id` bigint UNSIGNED DEFAULT NULL,
  `request_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_tools_tool_securities_key`
--

INSERT INTO `request_tools_tool_securities_key` (`id`, `request_tools_id`, `security_id`, `status_id`, `request_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, '2024-02-07 14:39:53', '2024-02-07 14:39:53'),
(2, NULL, NULL, NULL, NULL, NULL, '2024-02-07 14:39:53', '2024-02-07 14:39:53'),
(3, 100, 3, 15, NULL, NULL, '2024-02-07 14:47:58', '2024-03-05 13:50:21'),
(4, 101, 3, 15, NULL, NULL, '2024-02-07 14:47:58', '2024-03-05 13:50:21'),
(5, 102, 3, 15, NULL, NULL, '2024-02-07 14:53:08', '2024-03-05 13:50:21'),
(6, 103, 3, 15, NULL, NULL, '2024-02-07 14:53:08', '2024-03-05 13:50:21'),
(7, 103, 5, 15, NULL, NULL, '2024-02-07 14:53:08', '2024-03-06 11:52:14'),
(8, 103, 6, NULL, NULL, NULL, '2024-02-07 14:53:08', '2024-02-07 14:53:08'),
(9, 106, 3, 15, NULL, NULL, '2024-02-08 08:20:04', '2024-03-05 13:50:21'),
(10, 107, 3, 15, NULL, NULL, '2024-02-10 14:51:58', '2024-03-05 13:50:21'),
(11, 108, 3, 15, NULL, NULL, '2024-02-10 14:51:58', '2024-03-05 13:50:21'),
(12, 108, 5, 15, NULL, NULL, '2024-02-10 14:51:58', '2024-03-06 11:52:14'),
(13, 108, 6, NULL, NULL, NULL, '2024-02-10 14:51:58', '2024-02-10 14:51:58'),
(14, 109, 3, 15, NULL, NULL, '2024-02-10 15:08:27', '2024-03-05 13:50:21'),
(15, 110, 3, 15, NULL, NULL, '2024-02-10 15:08:27', '2024-03-05 13:50:21'),
(16, 110, 5, 15, NULL, NULL, '2024-02-10 15:08:27', '2024-03-06 11:52:14'),
(17, 110, 6, NULL, NULL, NULL, '2024-02-10 15:08:27', '2024-02-10 15:08:27'),
(18, 111, 3, 15, NULL, NULL, '2024-02-10 15:30:11', '2024-03-05 13:50:21'),
(19, 112, 3, 15, NULL, NULL, '2024-02-10 15:30:11', '2024-03-05 13:50:21'),
(20, 112, 5, 15, NULL, NULL, '2024-02-10 15:30:11', '2024-03-06 11:52:14'),
(21, 112, 6, NULL, NULL, NULL, '2024-02-10 15:30:11', '2024-02-10 15:30:11'),
(22, 113, 3, 15, NULL, NULL, '2024-02-10 15:31:00', '2024-03-05 13:50:21'),
(23, 114, 3, 15, NULL, NULL, '2024-02-10 15:31:00', '2024-03-05 13:50:21'),
(24, 114, 5, 15, NULL, NULL, '2024-02-10 15:31:00', '2024-03-06 11:52:14'),
(25, 114, 6, NULL, NULL, NULL, '2024-02-10 15:31:00', '2024-02-10 15:31:00'),
(26, 115, 3, 15, NULL, NULL, '2024-02-10 15:38:46', '2024-03-05 13:50:21'),
(27, 116, 3, 15, NULL, NULL, '2024-02-10 15:38:46', '2024-03-05 13:50:21'),
(28, 116, 5, 15, NULL, NULL, '2024-02-10 15:38:46', '2024-03-06 11:52:14'),
(29, 116, 6, NULL, NULL, NULL, '2024-02-10 15:38:46', '2024-02-10 15:38:46'),
(30, 117, 3, 15, NULL, NULL, '2024-02-10 15:39:07', '2024-03-05 13:50:21'),
(31, 118, 3, 15, NULL, NULL, '2024-02-10 15:39:07', '2024-03-05 13:50:21'),
(32, 118, 5, 15, NULL, NULL, '2024-02-10 15:39:07', '2024-03-06 11:52:14'),
(33, 118, 6, NULL, NULL, NULL, '2024-02-10 15:39:07', '2024-02-10 15:39:07'),
(34, 123, 3, 15, NULL, NULL, '2024-02-10 16:02:35', '2024-03-05 13:50:21'),
(35, 124, 3, 15, NULL, NULL, '2024-02-10 16:02:35', '2024-03-05 13:50:21'),
(36, 124, 5, 15, NULL, NULL, '2024-02-10 16:02:35', '2024-03-06 11:52:14'),
(37, 124, 6, NULL, NULL, NULL, '2024-02-10 16:02:35', '2024-02-10 16:02:35'),
(38, 125, 3, 15, NULL, NULL, '2024-02-10 17:05:51', '2024-03-05 13:50:21'),
(39, 126, 3, 15, NULL, NULL, '2024-02-10 17:05:51', '2024-03-05 13:50:21'),
(40, 126, 5, 15, NULL, NULL, '2024-02-10 17:05:51', '2024-03-06 11:52:14'),
(41, 126, 6, NULL, NULL, NULL, '2024-02-10 17:05:51', '2024-02-10 17:05:51'),
(42, 127, 3, 15, NULL, NULL, '2024-02-10 17:10:08', '2024-03-05 13:50:21'),
(43, 128, 3, 15, NULL, NULL, '2024-02-10 17:10:08', '2024-03-05 13:50:21'),
(44, 128, 5, 15, NULL, NULL, '2024-02-10 17:10:08', '2024-03-06 11:52:14'),
(45, 128, 6, NULL, NULL, NULL, '2024-02-10 17:10:08', '2024-02-10 17:10:08'),
(46, 129, 3, 15, NULL, NULL, '2024-02-10 17:16:52', '2024-03-05 13:50:21'),
(47, 130, 3, 15, NULL, NULL, '2024-02-10 17:16:52', '2024-03-05 13:50:21'),
(48, 130, 5, 15, NULL, NULL, '2024-02-10 17:16:52', '2024-03-06 11:52:14'),
(49, 130, 6, NULL, NULL, NULL, '2024-02-10 17:16:52', '2024-02-10 17:16:52'),
(50, 131, 3, 15, NULL, NULL, '2024-02-10 17:18:32', '2024-03-05 13:50:21'),
(51, 132, 3, 15, NULL, NULL, '2024-02-10 17:18:32', '2024-03-05 13:50:21'),
(52, 132, 5, 15, NULL, NULL, '2024-02-10 17:18:32', '2024-03-06 11:52:14'),
(53, 132, 6, NULL, NULL, NULL, '2024-02-10 17:18:32', '2024-02-10 17:18:32'),
(54, 133, 3, 15, NULL, 13, '2024-02-11 14:08:03', '2024-03-05 13:50:21'),
(55, 134, 3, 15, NULL, 13, '2024-02-11 14:08:03', '2024-03-05 13:50:21'),
(56, 134, 5, 15, NULL, NULL, '2024-02-11 14:08:03', '2024-03-06 11:52:14'),
(57, 134, 6, NULL, NULL, NULL, '2024-02-11 14:08:03', '2024-02-11 14:08:03'),
(58, 136, 3, 15, NULL, 13, '2024-02-11 14:16:57', '2024-03-05 13:50:21'),
(59, 137, 3, 15, NULL, 13, '2024-02-11 14:16:57', '2024-03-05 13:50:21'),
(60, 137, 5, 15, NULL, 13, '2024-02-11 14:16:57', '2024-03-06 11:52:14'),
(61, 137, 6, 10, NULL, 13, '2024-02-11 14:16:57', '2024-02-13 01:28:46'),
(62, 139, 3, 15, NULL, 13, '2024-02-11 14:51:25', '2024-03-05 13:50:21'),
(63, 140, 3, 15, NULL, 13, '2024-02-11 14:51:25', '2024-03-05 13:50:21'),
(64, 140, 5, 15, NULL, 13, '2024-02-11 14:51:25', '2024-03-06 11:52:14'),
(65, 140, 6, 11, NULL, 13, '2024-02-11 14:51:25', '2024-02-13 01:43:09'),
(66, 142, 3, 15, NULL, 13, '2024-02-11 15:09:52', '2024-03-05 13:50:21'),
(67, 143, 2, NULL, NULL, NULL, '2024-02-11 15:09:52', '2024-02-11 15:09:52'),
(68, 143, 3, 15, NULL, 13, '2024-02-11 15:09:52', '2024-03-05 13:50:21'),
(69, 143, 5, 15, NULL, NULL, '2024-02-11 15:09:52', '2024-03-06 11:52:14'),
(70, 143, 6, NULL, NULL, NULL, '2024-02-11 15:09:52', '2024-02-11 15:09:52'),
(71, 145, 3, 15, NULL, NULL, '2024-02-12 12:30:51', '2024-03-05 13:50:21'),
(72, 146, 2, NULL, NULL, NULL, '2024-02-12 12:30:51', '2024-02-12 12:30:51'),
(73, 146, 3, 15, NULL, NULL, '2024-02-12 12:30:51', '2024-03-05 13:50:21'),
(74, 146, 5, 15, NULL, NULL, '2024-02-12 12:30:51', '2024-03-06 11:52:14'),
(75, 146, 6, NULL, NULL, NULL, '2024-02-12 12:30:51', '2024-02-12 12:30:51'),
(76, NULL, NULL, 10, NULL, NULL, '2024-02-12 13:41:21', '2024-02-12 13:41:21'),
(77, NULL, NULL, 10, NULL, NULL, '2024-02-12 13:41:21', '2024-02-12 13:41:21'),
(78, 148, 3, 15, NULL, 13, '2024-02-13 11:38:21', '2024-03-05 13:50:21'),
(80, 149, 3, 15, NULL, 13, '2024-02-13 11:38:21', '2024-03-05 13:50:21'),
(81, 149, 5, 15, NULL, 13, '2024-02-13 11:38:21', '2024-03-06 11:52:14'),
(82, 149, 6, 10, NULL, 13, '2024-02-13 11:38:21', '2024-02-13 12:06:21'),
(83, 152, 3, 15, NULL, 13, '2024-02-13 12:08:06', '2024-03-05 13:50:21'),
(84, 153, 3, 15, NULL, 13, '2024-02-13 12:08:06', '2024-03-05 13:50:21'),
(85, 153, 5, 15, NULL, 13, '2024-02-13 12:08:06', '2024-03-06 11:52:14'),
(86, 153, 6, 11, NULL, 13, '2024-02-13 12:08:06', '2024-02-13 12:33:46'),
(87, 155, 3, 15, 90, 13, '2024-02-13 12:40:52', '2024-03-05 13:50:21'),
(88, 156, 3, 15, 90, 13, '2024-02-13 12:40:52', '2024-03-05 13:50:21'),
(89, 156, 5, 15, 90, 13, '2024-02-13 12:40:52', '2024-03-06 11:52:14'),
(90, 156, 6, 10, 90, 13, '2024-02-13 12:40:52', '2024-02-13 15:53:26'),
(91, 159, 3, 15, 92, 13, '2024-02-13 16:01:56', '2024-03-05 13:50:21'),
(92, 160, 3, 15, 92, 13, '2024-02-13 16:01:56', '2024-03-05 13:50:21'),
(93, 161, 3, 15, 93, 13, '2024-02-22 03:41:03', '2024-03-05 13:50:21'),
(94, 161, 5, 15, 93, 13, '2024-02-22 03:41:03', '2024-03-06 11:52:14'),
(95, 162, 3, 15, 93, 13, '2024-02-22 03:41:03', '2024-03-05 13:50:21'),
(96, 162, 5, 15, 93, 13, '2024-02-22 03:41:03', '2024-03-06 11:52:14'),
(97, 162, 6, 11, 93, NULL, '2024-02-22 03:41:03', '2024-02-22 03:41:03'),
(98, 163, 5, 15, 94, 13, '2024-02-22 03:52:24', '2024-03-06 11:52:14'),
(99, 164, 5, 15, 94, 13, '2024-02-22 03:52:24', '2024-03-06 11:52:14'),
(100, 164, 6, 10, 94, 13, '2024-02-22 03:52:24', '2024-02-22 03:59:58'),
(101, 165, 5, 15, 95, NULL, '2024-02-22 04:03:22', '2024-03-06 11:52:14'),
(102, 166, 5, 15, 95, NULL, '2024-02-22 04:03:22', '2024-03-06 11:52:14'),
(103, 166, 6, 10, 95, 13, '2024-02-22 04:03:22', '2024-02-22 04:03:46'),
(104, 167, 3, 15, 96, 13, '2024-02-22 05:57:54', '2024-03-05 13:50:21'),
(105, 168, 3, 15, 96, 13, '2024-02-22 05:57:54', '2024-03-05 13:50:21'),
(106, 168, 5, 15, 96, 13, '2024-02-22 05:57:54', '2024-03-06 11:52:14'),
(107, 169, 5, 15, 97, 13, '2024-02-22 05:58:53', '2024-03-06 11:52:14'),
(108, 170, 5, 15, 97, 13, '2024-02-22 05:58:53', '2024-03-06 11:52:14'),
(109, 170, 6, 10, 97, 13, '2024-02-22 05:58:53', '2024-02-22 06:03:09'),
(110, 171, 3, 15, 98, 13, '2024-02-23 17:10:39', '2024-03-05 13:50:21'),
(111, 172, 3, 15, 98, 13, '2024-02-23 17:10:39', '2024-03-05 13:50:21'),
(112, 172, 6, 10, 98, 13, '2024-02-23 17:10:39', '2024-02-23 17:28:01'),
(113, 173, 3, 15, 98, 13, '2024-02-23 17:10:39', '2024-03-05 13:50:21'),
(114, 173, 6, 10, 98, 13, '2024-02-23 17:10:39', '2024-02-23 17:28:01'),
(115, 173, 6, 10, 98, 13, '2024-02-23 17:10:39', '2024-02-23 17:28:01'),
(116, 174, 3, 15, 99, 13, '2024-02-23 17:33:42', '2024-03-05 13:50:21'),
(117, 175, 3, 15, 99, 13, '2024-02-23 17:33:42', '2024-03-05 13:50:21'),
(118, 175, 5, 15, 99, NULL, '2024-02-23 17:33:42', '2024-03-06 11:52:14'),
(119, 176, 3, 15, 99, 13, '2024-02-23 17:33:43', '2024-03-05 13:50:21'),
(120, 176, 5, 15, 99, NULL, '2024-02-23 17:33:43', '2024-03-06 11:52:14'),
(121, 176, 6, 11, 99, NULL, '2024-02-23 17:33:43', '2024-02-23 17:33:43'),
(122, 177, 3, 15, 100, 13, '2024-02-24 22:54:17', '2024-03-05 13:50:21'),
(123, 178, 3, 15, 100, 13, '2024-02-24 22:54:17', '2024-03-05 13:50:21'),
(124, 178, 5, 15, 100, 13, '2024-02-24 22:54:17', '2024-03-06 11:52:14'),
(125, 179, 3, 15, 100, 13, '2024-02-24 22:54:18', '2024-03-05 13:50:21'),
(126, 179, 5, 15, 100, 13, '2024-02-24 22:54:18', '2024-03-06 11:52:14'),
(127, 179, 6, 10, 100, 13, '2024-02-24 22:54:18', '2024-02-24 22:57:50'),
(128, 180, 3, 15, 101, NULL, '2024-02-24 22:59:54', '2024-03-05 13:50:21'),
(129, 181, 3, 15, 101, NULL, '2024-02-24 22:59:54', '2024-03-05 13:50:21'),
(130, 181, 5, 15, 101, NULL, '2024-02-24 22:59:54', '2024-03-06 11:52:14'),
(131, 182, 3, 15, 101, NULL, '2024-02-24 22:59:54', '2024-03-05 13:50:21'),
(132, 182, 5, 15, 101, NULL, '2024-02-24 22:59:54', '2024-03-06 11:52:14'),
(133, 182, 6, 11, 101, NULL, '2024-02-24 22:59:54', '2024-02-24 22:59:54'),
(134, 183, 3, 15, 102, 13, '2024-02-24 23:14:27', '2024-03-05 13:50:21'),
(135, 184, 3, 15, 102, 13, '2024-02-24 23:14:27', '2024-03-05 13:50:21'),
(136, 184, 5, 15, 102, NULL, '2024-02-24 23:14:27', '2024-03-06 11:52:14'),
(137, 185, 3, 15, 102, 13, '2024-02-24 23:14:27', '2024-03-05 13:50:21'),
(138, 185, 5, 15, 102, NULL, '2024-02-24 23:14:27', '2024-03-06 11:52:14'),
(139, 185, 6, 11, 102, NULL, '2024-02-24 23:14:27', '2024-02-24 23:14:27'),
(140, 186, 3, 15, 103, 13, '2024-02-24 23:16:59', '2024-03-05 13:50:21'),
(141, 187, 3, 15, 103, 13, '2024-02-24 23:16:59', '2024-03-05 13:50:21'),
(142, 187, 5, 15, 103, NULL, '2024-02-24 23:16:59', '2024-03-06 11:52:14'),
(143, 188, 3, 15, 103, 13, '2024-02-24 23:16:59', '2024-03-05 13:50:21'),
(144, 188, 5, 15, 103, NULL, '2024-02-24 23:16:59', '2024-03-06 11:52:14'),
(145, 188, 6, 11, 103, NULL, '2024-02-24 23:16:59', '2024-02-24 23:16:59'),
(146, 189, 3, 15, 104, 13, '2024-02-24 23:20:34', '2024-03-05 13:50:21'),
(147, 190, 3, 15, 104, 13, '2024-02-24 23:20:34', '2024-03-05 13:50:21'),
(148, 190, 5, 15, 104, 13, '2024-02-24 23:20:34', '2024-03-06 11:52:14'),
(149, 191, 3, 15, 104, 13, '2024-02-24 23:20:34', '2024-03-05 13:50:21'),
(150, 191, 5, 15, 104, 13, '2024-02-24 23:20:34', '2024-03-06 11:52:14'),
(151, 191, 6, 11, 104, NULL, '2024-02-24 23:20:34', '2024-02-24 23:20:34'),
(152, 192, 3, 15, 105, 13, '2024-02-24 23:22:31', '2024-03-05 13:50:21'),
(153, 193, 3, 15, 105, 13, '2024-02-24 23:22:31', '2024-03-05 13:50:21'),
(154, 193, 5, 15, 105, 13, '2024-02-24 23:22:31', '2024-03-06 11:52:14'),
(155, 194, 3, 15, 105, 13, '2024-02-24 23:22:31', '2024-03-05 13:50:21'),
(156, 194, 5, 15, 105, 13, '2024-02-24 23:22:31', '2024-03-06 11:52:14'),
(157, 194, 6, 11, 105, NULL, '2024-02-24 23:22:31', '2024-02-24 23:22:31'),
(158, 195, 3, 15, 106, 13, '2024-02-24 23:24:12', '2024-03-05 13:50:21'),
(159, 196, 3, 15, 106, 13, '2024-02-24 23:24:12', '2024-03-05 13:50:21'),
(160, 196, 5, 15, 106, 13, '2024-02-24 23:24:12', '2024-03-06 11:52:14'),
(161, 197, 3, 15, 106, 13, '2024-02-24 23:24:12', '2024-03-05 13:50:21'),
(162, 197, 5, 15, 106, 13, '2024-02-24 23:24:12', '2024-03-06 11:52:14'),
(163, 197, 6, 10, 106, 13, '2024-02-24 23:24:12', '2024-02-24 23:25:01'),
(164, 198, 3, 15, 107, 13, '2024-02-24 23:49:11', '2024-03-05 13:50:21'),
(165, 199, 3, 15, 107, 13, '2024-02-24 23:49:11', '2024-03-05 13:50:21'),
(166, 199, 5, 15, 107, NULL, '2024-02-24 23:49:11', '2024-03-06 11:52:14'),
(167, 200, 3, 15, 107, 13, '2024-02-24 23:49:11', '2024-03-05 13:50:21'),
(168, 200, 5, 15, 107, NULL, '2024-02-24 23:49:11', '2024-03-06 11:52:14'),
(169, 200, 6, 11, 107, NULL, '2024-02-24 23:49:11', '2024-02-24 23:49:11'),
(170, 201, 3, 15, 108, 13, '2024-02-25 00:07:57', '2024-03-05 13:50:21'),
(171, 202, 3, 15, 108, NULL, '2024-02-25 00:07:57', '2024-03-05 13:50:21'),
(172, 202, 5, 15, 108, NULL, '2024-02-25 00:07:57', '2024-03-06 11:52:14'),
(173, 203, 3, 15, 108, NULL, '2024-02-25 00:07:57', '2024-03-05 13:50:21'),
(174, 203, 5, 15, 108, NULL, '2024-02-25 00:07:57', '2024-03-06 11:52:14'),
(175, 203, 6, 11, 108, NULL, '2024-02-25 00:07:57', '2024-02-25 00:07:57'),
(176, 204, 3, 15, 109, 13, '2024-02-25 00:18:18', '2024-03-05 13:50:21'),
(177, 205, 3, 15, 109, 13, '2024-02-25 00:18:18', '2024-03-05 13:50:21'),
(178, 205, 5, 15, 109, NULL, '2024-02-25 00:18:18', '2024-03-06 11:52:14'),
(179, 206, 3, 15, 109, 13, '2024-02-25 00:18:18', '2024-03-05 13:50:21'),
(180, 206, 5, 15, 109, NULL, '2024-02-25 00:18:18', '2024-03-06 11:52:14'),
(181, 206, 6, 11, 109, NULL, '2024-02-25 00:18:18', '2024-02-25 00:18:18'),
(182, 207, 3, 15, 110, 13, '2024-02-25 00:30:09', '2024-03-05 13:50:21'),
(183, 208, 3, 15, 110, 13, '2024-02-25 00:30:09', '2024-03-05 13:50:21'),
(184, 208, 5, 15, 110, 13, '2024-02-25 00:30:09', '2024-03-06 11:52:14'),
(185, 209, 3, 15, 110, 13, '2024-02-25 00:30:09', '2024-03-05 13:50:21'),
(186, 209, 5, 15, 110, 13, '2024-02-25 00:30:09', '2024-03-06 11:52:14'),
(187, 209, 6, 11, 110, NULL, '2024-02-25 00:30:09', '2024-02-25 00:30:09'),
(188, 210, 3, 15, 111, 13, '2024-02-25 00:36:52', '2024-03-05 13:50:21'),
(189, 211, 3, 15, 111, 13, '2024-02-25 00:36:52', '2024-03-05 13:50:21'),
(190, 211, 5, 15, 111, 13, '2024-02-25 00:36:52', '2024-03-06 11:52:14'),
(191, 212, 3, 15, 111, 13, '2024-02-25 00:36:52', '2024-03-05 13:50:21'),
(192, 212, 5, 15, 111, 13, '2024-02-25 00:36:52', '2024-03-06 11:52:14'),
(193, 212, 6, 11, 111, NULL, '2024-02-25 00:36:52', '2024-02-25 00:36:52'),
(194, 213, 3, 15, 112, 13, '2024-02-25 00:41:51', '2024-03-05 13:50:21'),
(195, 214, 3, 15, 112, 13, '2024-02-25 00:41:51', '2024-03-05 13:50:21'),
(196, 214, 5, 15, 112, 13, '2024-02-25 00:41:51', '2024-03-06 11:52:14'),
(197, 215, 3, 15, 112, 13, '2024-02-25 00:41:51', '2024-03-05 13:50:21'),
(198, 215, 5, 15, 112, 13, '2024-02-25 00:41:51', '2024-03-06 11:52:14'),
(199, 215, 6, 11, 112, NULL, '2024-02-25 00:41:51', '2024-02-25 00:41:51'),
(200, 216, 3, 15, 113, 13, '2024-02-25 01:23:02', '2024-03-05 13:50:21'),
(201, 217, 3, 15, 113, 13, '2024-02-25 01:23:02', '2024-03-05 13:50:21'),
(202, 217, 5, 15, 113, NULL, '2024-02-25 01:23:02', '2024-03-06 11:52:14'),
(203, 218, 3, 15, 113, 13, '2024-02-25 01:23:02', '2024-03-05 13:50:21'),
(204, 218, 5, 15, 113, NULL, '2024-02-25 01:23:02', '2024-03-06 11:52:14'),
(205, 218, 6, 11, 113, NULL, '2024-02-25 01:23:02', '2024-02-25 01:23:02'),
(206, 219, 3, 15, 114, 13, '2024-02-25 01:24:46', '2024-03-05 13:50:21'),
(207, 220, 3, 15, 114, 13, '2024-02-25 01:24:46', '2024-03-05 13:50:21'),
(208, 220, 5, 15, 114, NULL, '2024-02-25 01:24:46', '2024-03-06 11:52:14'),
(209, 221, 3, 15, 114, 13, '2024-02-25 01:24:46', '2024-03-05 13:50:21'),
(210, 221, 5, 15, 114, NULL, '2024-02-25 01:24:46', '2024-03-06 11:52:14'),
(211, 221, 6, 11, 114, NULL, '2024-02-25 01:24:46', '2024-02-25 01:24:46'),
(212, 222, 3, 15, 115, 13, '2024-02-25 01:26:14', '2024-03-05 13:50:21'),
(213, 223, 3, 15, 115, 13, '2024-02-25 01:26:14', '2024-03-05 13:50:21'),
(214, 223, 5, 15, 115, 13, '2024-02-25 01:26:14', '2024-03-06 11:52:14'),
(215, 224, 3, 15, 115, 13, '2024-02-25 01:26:14', '2024-03-05 13:50:21'),
(216, 224, 5, 15, 115, 13, '2024-02-25 01:26:14', '2024-03-06 11:52:14'),
(217, 224, 6, 15, 115, 13, '2024-02-25 01:26:14', '2024-02-25 01:27:23'),
(218, 225, 3, 15, 116, 13, '2024-02-26 00:19:02', '2024-03-05 13:50:21'),
(219, 226, 3, 15, 116, 13, '2024-02-26 00:19:02', '2024-03-05 13:50:21'),
(220, 226, 5, 15, 116, 13, '2024-02-26 00:19:02', '2024-03-06 11:52:14'),
(221, 227, 3, 15, 117, NULL, '2024-02-27 00:26:34', '2024-03-05 13:50:21'),
(222, 227, 5, 15, 117, NULL, '2024-02-27 00:26:34', '2024-03-06 11:52:14'),
(223, 227, 6, 11, 117, NULL, '2024-02-27 00:26:34', '2024-02-27 00:26:34'),
(224, 228, 6, 11, 117, NULL, '2024-02-27 00:26:34', '2024-02-27 00:26:34'),
(225, 229, 5, 15, 118, 13, '2024-02-27 03:26:55', '2024-03-06 11:52:14'),
(226, 229, 6, 11, 118, NULL, '2024-02-27 03:26:55', '2024-02-27 03:26:55'),
(227, 230, 5, 15, 119, 13, '2024-02-27 03:32:46', '2024-03-06 11:52:14'),
(228, 230, 6, 10, 119, 13, '2024-02-27 03:32:46', '2024-02-27 03:33:22'),
(229, 231, 5, 15, 120, 13, '2024-02-27 03:46:44', '2024-03-06 11:52:14'),
(230, 231, 6, 10, 120, 13, '2024-02-27 03:46:44', '2024-02-27 03:47:24'),
(231, 232, 5, 15, 121, 13, '2024-03-04 19:38:03', '2024-03-06 11:52:14'),
(232, 232, 6, 10, 121, 13, '2024-03-04 19:38:03', '2024-03-04 19:42:44'),
(233, 233, 5, 15, 122, 13, '2024-03-04 19:53:53', '2024-03-06 11:52:14'),
(234, 233, 6, 10, 122, 13, '2024-03-04 19:53:53', '2024-03-04 19:54:14'),
(235, 234, 5, 15, 123, 13, '2024-03-05 12:44:04', '2024-03-06 11:52:14'),
(236, 234, 6, 11, 123, NULL, '2024-03-05 12:44:04', '2024-03-05 12:44:04'),
(237, 235, 5, 15, 124, 13, '2024-03-05 12:52:35', '2024-03-06 11:52:14'),
(238, 235, 6, 10, 124, 13, '2024-03-05 12:52:35', '2024-03-05 12:53:09'),
(239, 236, 5, 15, 125, 13, '2024-03-05 13:09:47', '2024-03-06 11:52:14'),
(240, 236, 6, 10, 125, 13, '2024-03-05 13:09:47', '2024-03-05 13:27:24'),
(241, 237, 3, 15, 125, 13, '2024-03-05 13:09:47', '2024-03-05 13:50:21'),
(242, 237, 5, 15, 125, 13, '2024-03-05 13:09:47', '2024-03-06 11:52:14'),
(243, 238, 3, 15, 125, 13, '2024-03-05 13:09:47', '2024-03-05 13:50:21'),
(244, 238, 5, 15, 125, 13, '2024-03-05 13:09:47', '2024-03-06 11:52:14'),
(245, 238, 6, 10, 125, 13, '2024-03-05 13:09:47', '2024-03-05 13:27:24'),
(246, 239, 5, 15, 126, NULL, '2024-03-05 13:28:37', '2024-03-06 11:52:14'),
(247, 239, 6, 11, 126, NULL, '2024-03-05 13:28:37', '2024-03-05 13:28:37'),
(248, 240, 3, 15, 126, NULL, '2024-03-05 13:28:37', '2024-03-05 13:50:21'),
(249, 240, 5, 15, 126, NULL, '2024-03-05 13:28:37', '2024-03-06 11:52:14'),
(250, 241, 3, 15, 126, NULL, '2024-03-05 13:28:37', '2024-03-05 13:50:21'),
(251, 241, 5, 15, 126, NULL, '2024-03-05 13:28:37', '2024-03-06 11:52:14'),
(252, 241, 6, 11, 126, NULL, '2024-03-05 13:28:37', '2024-03-05 13:28:37'),
(253, 242, 5, 15, 127, NULL, '2024-03-05 13:35:49', '2024-03-06 11:52:14'),
(254, 242, 6, 11, 127, NULL, '2024-03-05 13:35:49', '2024-03-05 13:35:49'),
(255, 243, 3, 15, 127, NULL, '2024-03-05 13:35:49', '2024-03-05 13:50:21'),
(256, 243, 5, 15, 127, NULL, '2024-03-05 13:35:49', '2024-03-06 11:52:14'),
(257, 244, 3, 15, 127, NULL, '2024-03-05 13:35:49', '2024-03-05 13:50:21'),
(258, 244, 5, 15, 127, NULL, '2024-03-05 13:35:49', '2024-03-06 11:52:14'),
(259, 244, 6, 11, 127, NULL, '2024-03-05 13:35:49', '2024-03-05 13:35:49'),
(260, 245, 5, 15, 128, NULL, '2024-03-05 13:40:39', '2024-03-06 11:52:14'),
(261, 245, 6, 11, 128, NULL, '2024-03-05 13:40:39', '2024-03-05 13:40:39'),
(262, 246, 3, 15, 128, NULL, '2024-03-05 13:40:39', '2024-03-05 13:50:21'),
(263, 246, 5, 15, 128, NULL, '2024-03-05 13:40:39', '2024-03-06 11:52:14'),
(264, 247, 3, 15, 128, NULL, '2024-03-05 13:40:39', '2024-03-05 13:50:21'),
(265, 247, 5, 15, 128, NULL, '2024-03-05 13:40:39', '2024-03-06 11:52:14'),
(266, 247, 6, 11, 128, NULL, '2024-03-05 13:40:39', '2024-03-05 13:40:39'),
(267, 248, 5, 15, 129, NULL, '2024-03-05 13:49:09', '2024-03-06 11:52:14'),
(268, 248, 6, 11, 129, NULL, '2024-03-05 13:49:09', '2024-03-05 13:49:09'),
(269, 249, 3, 15, 129, NULL, '2024-03-05 13:49:09', '2024-03-05 13:50:21'),
(270, 249, 5, 15, 129, NULL, '2024-03-05 13:49:09', '2024-03-06 11:52:14'),
(271, 250, 3, 15, 129, NULL, '2024-03-05 13:49:09', '2024-03-05 13:50:21'),
(272, 250, 5, 15, 129, NULL, '2024-03-05 13:49:09', '2024-03-06 11:52:14'),
(273, 250, 6, 11, 129, NULL, '2024-03-05 13:49:09', '2024-03-05 13:49:09'),
(274, 251, 5, 15, 130, 13, '2024-03-05 13:55:37', '2024-03-06 11:52:14'),
(275, 251, 6, 10, 130, 13, '2024-03-05 13:55:37', '2024-03-05 13:57:45'),
(276, 252, 3, 10, 130, 13, '2024-03-05 13:55:37', '2024-03-05 13:57:31'),
(277, 252, 5, 15, 130, 13, '2024-03-05 13:55:37', '2024-03-06 11:52:14'),
(278, 253, 3, 10, 130, 13, '2024-03-05 13:55:37', '2024-03-05 13:57:31'),
(279, 253, 5, 15, 130, 13, '2024-03-05 13:55:37', '2024-03-06 11:52:14'),
(280, 253, 6, 10, 130, 13, '2024-03-05 13:55:37', '2024-03-05 13:57:45'),
(281, 254, 5, 15, 131, 13, '2024-03-05 16:55:02', '2024-03-06 11:52:14'),
(282, 254, 6, 10, 131, 13, '2024-03-05 16:55:02', '2024-03-06 02:59:29'),
(283, 255, 5, 15, 131, 13, '2024-03-05 16:55:02', '2024-03-06 11:52:14'),
(284, 256, 5, 15, 131, 13, '2024-03-05 16:55:02', '2024-03-06 11:52:14'),
(285, 256, 6, 10, 131, 13, '2024-03-05 16:55:02', '2024-03-06 02:59:29'),
(286, 257, 5, 15, 132, NULL, '2024-03-06 03:03:42', '2024-03-06 11:52:14'),
(287, 257, 6, 11, 132, NULL, '2024-03-06 03:03:42', '2024-03-06 03:03:42'),
(288, 258, 5, 15, 132, NULL, '2024-03-06 03:03:42', '2024-03-06 11:52:14'),
(289, 259, 5, 15, 132, NULL, '2024-03-06 03:03:42', '2024-03-06 11:52:14'),
(290, 259, 6, 11, 132, NULL, '2024-03-06 03:03:42', '2024-03-06 03:03:42'),
(291, 260, 5, 15, 133, NULL, '2024-03-06 03:11:59', '2024-03-06 11:52:14'),
(292, 260, 6, 11, 133, NULL, '2024-03-06 03:11:59', '2024-03-06 03:11:59'),
(293, 261, 5, 15, 133, NULL, '2024-03-06 03:11:59', '2024-03-06 11:52:14'),
(294, 262, 5, 15, 133, NULL, '2024-03-06 03:11:59', '2024-03-06 11:52:14'),
(295, 262, 6, 11, 133, NULL, '2024-03-06 03:11:59', '2024-03-06 03:11:59'),
(296, 263, 5, 15, 134, 13, '2024-03-06 03:54:56', '2024-03-06 11:52:14'),
(297, 263, 6, 10, 134, 13, '2024-03-06 03:54:56', '2024-03-06 03:58:40'),
(298, 264, 5, 15, 134, 13, '2024-03-06 03:54:56', '2024-03-06 11:52:14'),
(299, 265, 5, 15, 134, 13, '2024-03-06 03:54:56', '2024-03-06 11:52:14'),
(300, 265, 6, 10, 134, 13, '2024-03-06 03:54:56', '2024-03-06 03:58:40'),
(301, 266, 5, 15, 135, 13, '2024-03-06 04:05:32', '2024-03-06 11:52:14'),
(302, 266, 6, 11, 135, NULL, '2024-03-06 04:05:32', '2024-03-06 04:05:32'),
(303, 267, 5, 15, 135, 13, '2024-03-06 04:05:32', '2024-03-06 11:52:14'),
(304, 268, 5, 15, 135, 13, '2024-03-06 04:05:32', '2024-03-06 11:52:14'),
(305, 268, 6, 11, 135, NULL, '2024-03-06 04:05:32', '2024-03-06 04:05:32'),
(306, 269, 5, 15, 136, NULL, '2024-03-06 04:12:53', '2024-03-06 11:52:14'),
(307, 269, 6, 11, 136, NULL, '2024-03-06 04:12:53', '2024-03-06 04:12:53'),
(308, 270, 5, 15, 136, NULL, '2024-03-06 04:12:53', '2024-03-06 11:52:14'),
(309, 271, 5, 15, 136, NULL, '2024-03-06 04:12:53', '2024-03-06 11:52:14'),
(310, 271, 6, 11, 136, NULL, '2024-03-06 04:12:53', '2024-03-06 04:12:53'),
(311, 272, 5, 15, 137, 13, '2024-03-06 04:28:09', '2024-03-06 11:52:14'),
(312, 272, 6, 11, 137, NULL, '2024-03-06 04:28:09', '2024-03-06 04:28:09'),
(313, 273, 5, 15, 137, 13, '2024-03-06 04:28:09', '2024-03-06 11:52:14'),
(314, 274, 5, 15, 137, 13, '2024-03-06 04:28:09', '2024-03-06 11:52:14'),
(315, 274, 6, 11, 137, NULL, '2024-03-06 04:28:09', '2024-03-06 04:28:09'),
(316, 275, 5, 15, 138, 13, '2024-03-06 04:30:17', '2024-03-06 11:52:14'),
(317, 275, 6, 11, 138, NULL, '2024-03-06 04:30:17', '2024-03-06 04:30:17'),
(318, 276, 5, 15, 138, 13, '2024-03-06 04:30:17', '2024-03-06 11:52:14'),
(319, 277, 5, 15, 138, 13, '2024-03-06 04:30:17', '2024-03-06 11:52:14'),
(320, 277, 6, 11, 138, NULL, '2024-03-06 04:30:17', '2024-03-06 04:30:17'),
(321, 278, 5, 15, 139, NULL, '2024-03-06 04:33:05', '2024-03-06 11:52:14'),
(322, 278, 6, 11, 139, NULL, '2024-03-06 04:33:05', '2024-03-06 04:33:05'),
(323, 279, 5, 15, 139, NULL, '2024-03-06 04:33:05', '2024-03-06 11:52:14'),
(324, 280, 5, 15, 139, NULL, '2024-03-06 04:33:05', '2024-03-06 11:52:14'),
(325, 280, 6, 11, 139, NULL, '2024-03-06 04:33:05', '2024-03-06 04:33:05'),
(326, 281, 5, 15, 140, 13, '2024-03-06 11:42:44', '2024-03-06 11:52:14'),
(327, 281, 6, 11, 140, NULL, '2024-03-06 11:42:44', '2024-03-06 11:42:44'),
(328, 282, 5, 15, 140, 13, '2024-03-06 11:42:44', '2024-03-06 11:52:14'),
(329, 283, 5, 15, 140, 13, '2024-03-06 11:42:44', '2024-03-06 11:52:14'),
(330, 283, 6, 11, 140, NULL, '2024-03-06 11:42:44', '2024-03-06 11:42:44'),
(331, 284, 5, 15, 141, 13, '2024-03-06 11:49:19', '2024-03-06 11:52:14'),
(332, 284, 6, 11, 141, NULL, '2024-03-06 11:49:19', '2024-03-06 11:49:19'),
(333, 285, 5, 15, 141, 13, '2024-03-06 11:49:19', '2024-03-06 11:52:14'),
(334, 286, 5, 15, 141, 13, '2024-03-06 11:49:19', '2024-03-06 11:52:14'),
(335, 286, 6, 11, 141, NULL, '2024-03-06 11:49:19', '2024-03-06 11:49:19'),
(336, 287, 5, 15, 142, NULL, '2024-03-06 11:51:57', '2024-03-06 11:52:14'),
(337, 287, 6, 11, 142, NULL, '2024-03-06 11:51:57', '2024-03-06 11:51:57'),
(338, 288, 5, 15, 142, NULL, '2024-03-06 11:51:57', '2024-03-06 11:52:14'),
(339, 289, 5, 15, 142, NULL, '2024-03-06 11:51:57', '2024-03-06 11:52:14'),
(340, 289, 6, 11, 142, NULL, '2024-03-06 11:51:57', '2024-03-06 11:51:57'),
(341, 290, 5, 11, 143, NULL, '2024-03-06 11:55:32', '2024-03-06 11:55:32'),
(342, 290, 6, 11, 143, NULL, '2024-03-06 11:55:32', '2024-03-06 11:55:32'),
(343, 291, 5, 15, 144, 13, '2024-03-06 11:56:44', '2024-03-06 12:01:26'),
(344, 291, 6, 11, 144, NULL, '2024-03-06 11:56:44', '2024-03-06 11:56:44'),
(345, 292, 5, 15, 144, 13, '2024-03-06 11:56:44', '2024-03-06 12:01:26'),
(346, 293, 5, 15, 144, 13, '2024-03-06 11:56:44', '2024-03-06 12:01:26'),
(347, 293, 6, 11, 144, NULL, '2024-03-06 11:56:44', '2024-03-06 11:56:44'),
(348, 294, 5, 15, 145, 13, '2024-03-06 12:01:46', '2024-03-06 12:07:50'),
(349, 294, 6, 11, 145, NULL, '2024-03-06 12:01:46', '2024-03-06 12:01:46'),
(350, 295, 5, 15, 145, 13, '2024-03-06 12:01:46', '2024-03-06 12:07:50'),
(351, 296, 5, 15, 145, 13, '2024-03-06 12:01:46', '2024-03-06 12:07:50'),
(352, 296, 6, 15, 145, NULL, '2024-03-06 12:01:46', '2024-03-06 12:02:26'),
(353, 297, 5, 10, 146, 13, '2024-03-06 12:08:10', '2024-03-06 12:09:02'),
(354, 298, 5, 10, 146, 13, '2024-03-06 12:08:10', '2024-03-06 12:09:02'),
(355, 299, 5, 10, 146, 13, '2024-03-06 12:08:10', '2024-03-06 12:09:02'),
(356, 299, 6, 15, 146, NULL, '2024-03-06 12:08:10', '2024-03-06 12:08:43'),
(357, 300, 5, 10, 147, 13, '2024-03-06 12:17:40', '2024-03-06 12:18:23'),
(358, 301, 5, 10, 147, 13, '2024-03-06 12:17:40', '2024-03-06 12:18:23'),
(361, 303, 5, 10, 148, 13, '2024-03-07 00:51:10', '2024-03-07 00:53:08'),
(362, 304, 5, 10, 148, 13, '2024-03-07 00:51:10', '2024-03-07 00:53:08'),
(365, 306, 5, 10, 149, 13, '2024-03-07 01:00:39', '2024-03-07 01:01:21'),
(366, 307, 5, 10, 149, 13, '2024-03-07 01:00:39', '2024-03-07 01:01:21'),
(369, 309, 5, 10, 150, 13, '2024-03-07 01:06:35', '2024-03-07 01:06:58'),
(370, 310, 5, 10, 150, 13, '2024-03-07 01:06:35', '2024-03-07 01:06:58'),
(373, 312, 5, 10, 151, 13, '2024-03-07 01:14:14', '2024-03-07 01:14:59'),
(374, 313, 5, 10, 151, 13, '2024-03-07 01:14:14', '2024-03-07 01:14:59'),
(377, 315, 5, 10, 152, 13, '2024-03-07 01:16:46', '2024-03-07 01:17:04'),
(378, 316, 5, 10, 152, 13, '2024-03-07 01:16:46', '2024-03-07 01:17:04'),
(381, 318, 5, 10, 153, 13, '2024-03-07 01:19:24', '2024-03-07 01:19:54'),
(382, 319, 5, 10, 153, 13, '2024-03-07 01:19:24', '2024-03-07 01:19:54'),
(385, 321, 5, 10, 154, 13, '2024-03-07 01:26:39', '2024-03-07 01:27:18'),
(386, 322, 5, 10, 154, 13, '2024-03-07 01:26:39', '2024-03-07 01:27:18'),
(389, 324, 5, 10, 155, 13, '2024-03-07 01:33:15', '2024-03-07 01:33:42'),
(390, 325, 5, 10, 155, 13, '2024-03-07 01:33:15', '2024-03-07 01:33:42'),
(393, 327, 5, 10, 156, 13, '2024-03-07 01:57:00', '2024-03-07 01:57:33'),
(394, 328, 5, 10, 156, 13, '2024-03-07 01:57:00', '2024-03-07 01:57:33'),
(397, 330, 5, 10, 157, 13, '2024-03-07 01:59:25', '2024-03-07 01:59:48'),
(398, 331, 5, 10, 157, 13, '2024-03-07 01:59:25', '2024-03-07 01:59:48'),
(401, 333, 5, 10, 158, 13, '2024-03-07 02:06:44', '2024-03-07 02:07:20'),
(402, 334, 5, 10, 158, 13, '2024-03-07 02:06:44', '2024-03-07 02:07:20'),
(405, 336, 5, 10, 159, 13, '2024-03-07 02:13:35', '2024-03-07 02:15:59'),
(406, 337, 5, 10, 159, 13, '2024-03-07 02:13:35', '2024-03-07 02:15:59'),
(409, 339, 5, 10, 160, 13, '2024-03-07 02:18:23', '2024-03-07 02:18:43'),
(410, 340, 5, 10, 160, 13, '2024-03-07 02:18:23', '2024-03-07 02:18:43'),
(414, 343, 5, 10, 161, 13, '2024-03-07 02:35:28', '2024-03-07 02:37:18'),
(415, 344, 5, 10, 161, 13, '2024-03-07 02:35:28', '2024-03-07 02:37:18'),
(416, 344, 6, 10, 161, 13, '2024-03-07 02:35:28', '2024-03-07 02:37:24'),
(417, 345, 5, 10, 162, 13, '2024-03-07 02:53:25', '2024-03-07 18:50:46'),
(418, 346, 5, 10, 162, 13, '2024-03-07 02:53:25', '2024-03-07 18:50:46'),
(419, 347, 5, 10, 162, 13, '2024-03-07 02:53:25', '2024-03-07 18:50:46'),
(420, 347, 6, 10, 162, 13, '2024-03-07 02:53:25', '2024-03-07 18:51:14'),
(421, 348, 5, 15, 163, 13, '2024-03-07 19:15:02', '2024-03-07 19:15:51'),
(422, 349, 5, 15, 163, 13, '2024-03-07 19:15:02', '2024-03-07 19:15:51'),
(425, 351, 5, 15, 164, 13, '2024-03-07 19:24:34', '2024-03-07 21:17:15'),
(427, 353, 5, 15, 164, 13, '2024-03-07 19:24:34', '2024-03-07 21:17:15'),
(428, 353, 6, 11, 164, NULL, '2024-03-07 19:24:34', '2024-03-07 19:24:34'),
(429, 354, 5, 15, 165, 13, '2024-03-07 21:20:59', '2024-03-07 21:21:53'),
(431, 356, 5, 15, 165, 13, '2024-03-07 21:20:59', '2024-03-07 21:21:53'),
(432, 356, 6, 11, 165, NULL, '2024-03-07 21:20:59', '2024-03-07 21:20:59'),
(433, 357, 5, 15, 166, 13, '2024-03-07 21:26:01', '2024-03-07 21:26:32'),
(435, 359, 5, 15, 166, 13, '2024-03-07 21:26:01', '2024-03-07 21:26:32'),
(436, 359, 6, 11, 166, NULL, '2024-03-07 21:26:01', '2024-03-07 21:26:01'),
(437, 360, 5, 15, 167, 13, '2024-03-09 04:26:03', '2024-03-09 04:28:25'),
(439, 362, 5, 15, 167, 13, '2024-03-09 04:26:03', '2024-03-09 04:28:26'),
(440, 362, 6, 11, 167, NULL, '2024-03-09 04:26:03', '2024-03-09 04:26:03'),
(441, 363, 5, 15, 168, 13, '2024-03-09 04:33:01', '2024-03-09 04:34:11'),
(443, 365, 5, 15, 168, 13, '2024-03-09 04:33:01', '2024-03-09 04:34:11'),
(444, 365, 6, 11, 168, NULL, '2024-03-09 04:33:01', '2024-03-09 04:33:01'),
(445, 366, 5, 15, 169, 13, '2024-03-09 04:39:32', '2024-03-09 04:41:59'),
(451, 371, 5, 10, 170, 13, '2024-03-09 04:42:37', '2024-03-09 04:43:59'),
(452, 371, 6, 10, 170, 13, '2024-03-09 04:42:37', '2024-03-09 04:46:29'),
(453, 372, 5, 10, 171, 13, '2024-03-09 05:03:43', '2024-03-09 05:06:35'),
(457, 375, 5, 11, 172, NULL, '2024-03-09 10:27:16', '2024-03-09 10:27:16'),
(458, 376, 5, 11, 172, NULL, '2024-03-09 10:27:16', '2024-03-09 10:27:16'),
(459, 377, 5, 11, 172, NULL, '2024-03-09 10:27:16', '2024-03-09 10:27:16'),
(460, 377, 6, 11, 172, NULL, '2024-03-09 10:27:16', '2024-03-09 10:27:16'),
(461, 378, 5, 10, 184, 13, '2024-03-10 23:27:00', '2024-03-10 23:28:43'),
(462, 379, 5, 10, 184, 13, '2024-03-10 23:27:00', '2024-03-10 23:28:43'),
(465, 381, 5, 10, 185, 13, '2024-03-10 23:59:13', '2024-03-11 00:04:20'),
(468, 383, 5, 11, 186, NULL, '2024-03-11 02:49:12', '2024-03-11 02:49:12'),
(469, 383, 6, 11, 186, NULL, '2024-03-11 02:49:12', '2024-03-11 02:49:12'),
(470, 384, 5, 11, 187, NULL, '2024-03-11 02:52:21', '2024-03-11 02:52:21'),
(471, 385, 5, 11, 188, NULL, '2024-03-11 02:58:16', '2024-03-11 02:58:16'),
(472, 386, 5, 11, 189, NULL, '2024-03-11 03:02:12', '2024-03-11 03:02:12'),
(473, 386, 6, 11, 189, NULL, '2024-03-11 03:02:12', '2024-03-11 03:02:12'),
(474, 387, 6, 11, 190, NULL, '2024-03-11 03:04:36', '2024-03-11 03:04:36'),
(475, 388, 5, 11, 191, NULL, '2024-03-11 03:07:10', '2024-03-11 03:07:10'),
(476, 388, 6, 11, 191, NULL, '2024-03-11 03:07:10', '2024-03-11 03:07:10'),
(477, 390, 5, 11, 193, NULL, '2024-03-11 03:12:21', '2024-03-11 03:12:21'),
(478, 390, 6, 11, 193, NULL, '2024-03-11 03:12:21', '2024-03-11 03:12:21'),
(479, 391, 5, 11, 194, NULL, '2024-03-11 03:25:39', '2024-03-11 03:25:39'),
(480, 392, 5, 11, 195, NULL, '2024-03-11 03:34:08', '2024-03-11 03:34:08'),
(481, 393, 5, 11, 196, NULL, '2024-03-11 03:37:15', '2024-03-11 03:37:15'),
(482, 394, 5, 11, 197, NULL, '2024-03-11 03:39:14', '2024-03-11 03:39:14'),
(483, 395, 5, 11, 198, NULL, '2024-03-11 03:45:21', '2024-03-11 03:45:21'),
(484, 396, 5, 11, 199, NULL, '2024-03-11 03:46:23', '2024-03-11 03:46:23'),
(485, 397, 5, 11, 200, NULL, '2024-03-11 03:51:47', '2024-03-11 03:51:47'),
(486, 398, 5, 11, 201, NULL, '2024-03-11 03:54:59', '2024-03-11 03:54:59'),
(487, 399, 5, 11, 202, NULL, '2024-03-11 03:55:51', '2024-03-11 03:55:51'),
(488, 400, 5, 11, 203, NULL, '2024-03-11 04:04:08', '2024-03-11 04:04:08'),
(489, 401, 5, 11, 204, NULL, '2024-03-11 04:05:45', '2024-03-11 04:05:45'),
(490, 402, 5, 11, 205, NULL, '2024-03-11 04:07:26', '2024-03-11 04:07:26'),
(491, 403, 5, 11, 211, NULL, '2024-03-17 01:00:06', '2024-03-17 01:00:06'),
(492, 404, 5, 11, 211, NULL, '2024-03-17 01:00:06', '2024-03-17 01:00:06'),
(493, 405, 5, 11, 211, NULL, '2024-03-17 01:00:06', '2024-03-17 01:00:06'),
(494, 405, 6, 11, 211, NULL, '2024-03-17 01:00:06', '2024-03-17 01:00:06'),
(495, 406, 5, 11, 212, NULL, '2024-03-17 01:03:33', '2024-03-17 01:03:33'),
(496, 407, 5, 11, 212, NULL, '2024-03-17 01:03:33', '2024-03-17 01:03:33'),
(497, 408, 5, 11, 212, NULL, '2024-03-17 01:03:33', '2024-03-17 01:03:33'),
(498, 408, 6, 11, 212, NULL, '2024-03-17 01:03:33', '2024-03-17 01:03:33'),
(499, 409, 5, 11, 213, NULL, '2024-03-17 02:20:27', '2024-03-17 02:20:27'),
(500, 410, 5, 11, 213, NULL, '2024-03-17 02:20:27', '2024-03-17 02:20:27'),
(501, 411, 5, 11, 213, NULL, '2024-03-17 02:20:27', '2024-03-17 02:20:27'),
(502, 411, 6, 11, 213, NULL, '2024-03-17 02:20:27', '2024-03-17 02:20:27'),
(503, 412, 5, 11, 214, NULL, '2024-03-17 02:22:12', '2024-03-17 02:22:12'),
(504, 413, 5, 11, 214, NULL, '2024-03-17 02:22:12', '2024-03-17 02:22:12'),
(505, 414, 5, 11, 214, NULL, '2024-03-17 02:22:12', '2024-03-17 02:22:12'),
(506, 414, 6, 11, 214, NULL, '2024-03-17 02:22:12', '2024-03-17 02:22:12'),
(507, 415, 5, 11, 215, NULL, '2024-03-17 02:24:45', '2024-03-17 02:24:45'),
(508, 416, 5, 11, 215, NULL, '2024-03-17 02:24:45', '2024-03-17 02:24:45'),
(509, 417, 5, 11, 215, NULL, '2024-03-17 02:24:45', '2024-03-17 02:24:45'),
(510, 417, 6, 11, 215, NULL, '2024-03-17 02:24:45', '2024-03-17 02:24:45'),
(511, 418, 5, 11, 216, NULL, '2024-03-17 02:26:30', '2024-03-17 02:26:30'),
(512, 419, 5, 11, 216, NULL, '2024-03-17 02:26:30', '2024-03-17 02:26:30'),
(513, 420, 5, 11, 216, NULL, '2024-03-17 02:26:30', '2024-03-17 02:26:30'),
(514, 420, 6, 11, 216, NULL, '2024-03-17 02:26:30', '2024-03-17 02:26:30'),
(515, 421, 5, 11, 217, NULL, '2024-03-17 02:28:21', '2024-03-17 02:28:21'),
(516, 422, 5, 11, 217, NULL, '2024-03-17 02:28:21', '2024-03-17 02:28:21'),
(517, 423, 5, 11, 217, NULL, '2024-03-17 02:28:21', '2024-03-17 02:28:21'),
(518, 423, 6, 11, 217, NULL, '2024-03-17 02:28:21', '2024-03-17 02:28:21'),
(519, 424, 5, 10, 218, 13, '2024-03-17 02:31:11', '2024-03-17 02:35:27'),
(520, 425, 5, 10, 218, 13, '2024-03-17 02:31:11', '2024-03-17 02:35:27'),
(521, 426, 5, 10, 218, 13, '2024-03-17 02:31:11', '2024-03-17 02:35:27'),
(522, 426, 6, 10, 218, 13, '2024-03-17 02:31:11', '2024-03-17 02:35:58'),
(523, 427, 6, 11, 219, NULL, '2024-03-17 02:34:40', '2024-03-17 02:34:40'),
(524, 427, 9, 11, 219, NULL, '2024-03-17 02:34:40', '2024-03-17 02:34:40'),
(525, 427, 2, 11, 219, NULL, '2024-03-17 02:34:40', '2024-03-17 02:34:40'),
(526, 428, 5, 11, 220, NULL, '2024-03-21 23:37:24', '2024-03-21 23:37:24'),
(527, 429, 5, 11, 221, NULL, '2024-03-21 23:49:23', '2024-03-21 23:49:23'),
(528, 430, 5, 11, 224, NULL, '2024-03-24 02:44:01', '2024-03-24 02:44:01'),
(529, 431, 5, 11, 225, NULL, '2024-03-24 02:44:43', '2024-03-24 02:44:43'),
(530, 432, 5, 11, 226, NULL, '2024-03-24 02:45:16', '2024-03-24 02:45:16'),
(531, 433, 5, 11, 227, NULL, '2024-03-24 02:49:37', '2024-03-24 02:49:37'),
(532, 434, 5, 11, 228, NULL, '2024-03-24 02:49:38', '2024-03-24 02:49:38'),
(533, 435, 5, 11, 234, NULL, '2024-03-24 03:24:57', '2024-03-24 03:24:57'),
(534, 436, 5, 11, 235, NULL, '2024-03-24 03:25:15', '2024-03-24 03:25:15'),
(535, 437, 5, 11, 239, NULL, '2024-03-24 04:43:14', '2024-03-24 04:43:14'),
(536, 438, 5, 11, 239, NULL, '2024-03-24 04:43:14', '2024-03-24 04:43:14'),
(537, 439, 5, 11, 240, NULL, '2024-03-24 04:45:52', '2024-03-24 04:45:52'),
(538, 440, 5, 11, 240, NULL, '2024-03-24 04:45:52', '2024-03-24 04:45:52'),
(539, 441, 5, 11, 241, NULL, '2024-03-24 04:56:37', '2024-03-24 04:56:37'),
(540, 442, 5, 11, 241, NULL, '2024-03-24 04:56:37', '2024-03-24 04:56:37'),
(541, 443, 5, 11, 241, NULL, '2024-03-24 04:56:37', '2024-03-24 04:56:37'),
(542, 443, 6, 11, 241, NULL, '2024-03-24 04:56:37', '2024-03-24 04:56:37'),
(543, 444, 5, 11, 242, NULL, '2024-03-24 08:31:45', '2024-03-24 08:31:45'),
(544, 444, 6, 11, 242, NULL, '2024-03-24 08:31:45', '2024-03-24 08:31:45'),
(545, 445, 5, 11, 242, NULL, '2024-03-24 08:31:45', '2024-03-24 08:31:45'),
(546, 446, 5, 11, 242, NULL, '2024-03-24 08:31:45', '2024-03-24 08:31:45'),
(547, 447, 5, 11, 243, NULL, '2024-03-24 08:57:51', '2024-03-24 08:57:51'),
(548, 448, 5, 11, 243, NULL, '2024-03-24 08:57:51', '2024-03-24 08:57:51'),
(549, 449, 5, 11, 244, NULL, '2024-03-24 09:01:52', '2024-03-24 09:01:52'),
(550, 449, 6, 11, 244, NULL, '2024-03-24 09:01:52', '2024-03-24 09:01:52'),
(551, 450, 5, 11, 244, NULL, '2024-03-24 09:01:52', '2024-03-24 09:01:52'),
(552, 451, 5, 11, 244, NULL, '2024-03-24 09:01:52', '2024-03-24 09:01:52'),
(553, 451, 6, 11, 244, NULL, '2024-03-24 09:01:52', '2024-03-24 09:01:52'),
(554, 452, 5, 11, 245, NULL, '2024-03-24 09:04:24', '2024-03-24 09:04:24'),
(555, 453, 5, 11, 245, NULL, '2024-03-24 09:04:24', '2024-03-24 09:04:24'),
(556, 454, 5, 11, 245, NULL, '2024-03-24 09:04:24', '2024-03-24 09:04:24'),
(557, 454, 6, 11, 245, NULL, '2024-03-24 09:04:24', '2024-03-24 09:04:24'),
(558, 455, 5, 11, 245, NULL, '2024-03-24 09:04:24', '2024-03-24 09:04:24'),
(559, 456, 5, 11, 246, NULL, '2024-03-24 09:20:05', '2024-03-24 09:20:05'),
(560, 456, 6, 11, 246, NULL, '2024-03-24 09:20:05', '2024-03-24 09:20:05'),
(561, 457, 5, 11, 246, NULL, '2024-03-24 09:20:05', '2024-03-24 09:20:05'),
(562, 458, 5, 11, 246, NULL, '2024-03-24 09:20:05', '2024-03-24 09:20:05'),
(563, 459, 5, 11, 247, NULL, '2024-03-24 09:38:40', '2024-03-24 09:38:40'),
(564, 460, 5, 11, 248, NULL, '2024-03-24 09:42:05', '2024-03-24 09:42:05'),
(565, 461, 5, 11, 249, NULL, '2024-03-24 09:43:51', '2024-03-24 09:43:51'),
(566, 461, 6, 11, 249, NULL, '2024-03-24 09:43:51', '2024-03-24 09:43:51'),
(567, 462, 5, 11, 250, NULL, '2024-03-24 09:48:22', '2024-03-24 09:48:22'),
(568, 462, 6, 11, 250, NULL, '2024-03-24 09:48:22', '2024-03-24 09:48:22'),
(569, 463, 5, 11, 251, NULL, '2024-03-24 09:49:20', '2024-03-24 09:49:20'),
(570, 464, 5, 11, 252, NULL, '2024-03-24 09:50:16', '2024-03-24 09:50:16'),
(571, 465, 5, 11, 253, NULL, '2024-03-24 10:17:55', '2024-03-24 10:17:55'),
(572, 466, 5, 11, 254, NULL, '2024-03-24 10:19:20', '2024-03-24 10:19:20'),
(573, 467, 5, 11, 255, NULL, '2024-03-24 10:20:54', '2024-03-24 10:20:54'),
(574, 468, 5, 11, 256, NULL, '2024-03-24 10:22:42', '2024-03-24 10:22:42'),
(575, 469, 5, 11, 257, NULL, '2024-03-24 10:23:43', '2024-03-24 10:23:43'),
(576, 470, 5, 11, 258, NULL, '2024-03-24 10:29:25', '2024-03-24 10:29:25'),
(577, 471, 5, 11, 259, NULL, '2024-03-24 10:29:37', '2024-03-24 10:29:37'),
(578, 472, 5, 11, 260, NULL, '2024-03-24 10:33:03', '2024-03-24 10:33:03'),
(579, 473, 5, 11, 261, NULL, '2024-03-24 10:37:30', '2024-03-24 10:37:30'),
(580, 474, 5, 11, 262, NULL, '2024-03-24 10:40:37', '2024-03-24 10:40:37'),
(581, 475, 5, 11, 263, NULL, '2024-03-25 03:42:57', '2024-03-25 03:42:57'),
(582, 476, 5, 11, 263, NULL, '2024-03-25 03:42:57', '2024-03-25 03:42:57'),
(583, 477, 5, 11, 264, NULL, '2024-03-25 03:53:51', '2024-03-25 03:53:51'),
(584, 478, 5, 11, 264, NULL, '2024-03-25 03:53:51', '2024-03-25 03:53:51'),
(585, 479, 5, 11, 265, NULL, '2024-03-25 03:56:03', '2024-03-25 03:56:03'),
(586, 480, 5, 11, 265, NULL, '2024-03-25 03:56:03', '2024-03-25 03:56:03'),
(587, 481, 5, 10, 266, 13, '2024-03-25 03:59:57', '2024-03-25 04:00:58'),
(588, 482, 5, 10, 266, 13, '2024-03-25 03:59:57', '2024-03-25 04:00:58'),
(589, 483, 5, 11, 267, NULL, '2024-03-25 04:14:54', '2024-03-25 04:14:54'),
(590, 484, 5, 11, 268, NULL, '2024-03-25 04:52:39', '2024-03-25 04:52:39'),
(591, 485, 5, 11, 268, NULL, '2024-03-25 04:52:39', '2024-03-25 04:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-01-19 18:25:37', '2024-01-19 18:25:37'),
(2, 'staff', 'web', '2024-01-19 18:25:37', '2024-01-19 18:25:37'),
(3, 'requester', 'web', '2024-01-19 18:43:49', '2024-01-19 18:43:49'),
(4, 'technician', 'web', '2024-02-01 03:25:44', '2024-02-01 03:25:51'),
(5, 'vice-president', 'web', '2024-02-01 03:26:14', '2024-02-01 03:26:14'),
(6, 'president', 'web', '2024-02-01 03:26:27', '2024-02-01 03:26:27'),
(7, 'operator', 'web', '2024-02-02 09:16:55', '2024-02-03 06:04:33'),
(8, 'head of office', 'web', '2024-02-03 06:04:15', '2024-02-03 06:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Computer Fix', '2024-03-20 20:10:34', '2024-03-20 20:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `sexes`
--

CREATE TABLE `sexes` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sexes`
--

INSERT INTO `sexes` (`id`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Male', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(2, 'Female', NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(3, 'a', '2024-02-03 12:53:05', '2024-01-30 02:48:28', '2024-02-03 12:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`id`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Box 1', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(2, 'Box 2', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'In Stock', NULL, '2024-01-19 18:25:37', '2024-01-19 18:25:37'),
(2, 'In Use', NULL, '2024-01-19 18:25:37', '2024-01-19 18:25:37'),
(3, 'Lost', NULL, '2024-01-19 18:25:37', '2024-01-19 18:25:37'),
(4, 'Damaged', NULL, '2024-01-19 18:25:37', '2024-01-19 18:25:37'),
(5, 'In Repair', NULL, '2024-01-19 18:25:37', '2024-01-19 18:25:37'),
(6, 'In Progress', NULL, '2024-01-19 18:25:37', '2024-01-20 22:05:22'),
(7, 'Returned', NULL, '2024-01-19 18:25:37', '2024-01-19 18:25:37'),
(8, 'Canceled', NULL, '2024-01-19 18:25:37', '2024-01-19 18:25:37'),
(9, 'Reported', NULL, '2024-01-19 18:25:37', '2024-01-19 18:25:37'),
(10, 'Approved', NULL, '2024-01-19 23:12:54', '2024-01-19 23:12:54'),
(11, 'Pending', NULL, '2024-01-19 23:22:35', '2024-01-19 23:22:35'),
(12, 'Completed', NULL, '2024-01-20 03:18:27', '2024-01-20 03:18:53'),
(13, 'Incomplete', NULL, '2024-01-20 03:18:35', '2024-01-20 03:18:35'),
(14, 'In Request', NULL, '2024-01-20 04:02:20', '2024-01-20 04:03:51'),
(15, 'Rejected', NULL, '2024-01-20 10:00:55', '2024-01-20 10:00:55'),
(16, 'Reviewed', NULL, '2024-01-20 10:17:38', '2024-01-20 23:00:24'),
(17, 'On hold', NULL, '2024-01-20 22:58:55', '2024-01-20 22:58:55'),
(18, 'Available', NULL, '2024-02-04 12:08:26', '2024-02-04 12:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `type_id` bigint UNSIGNED DEFAULT NULL,
  `source_id` bigint UNSIGNED DEFAULT NULL,
  `status_id` bigint UNSIGNED DEFAULT NULL,
  `position_id` bigint UNSIGNED DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `user_id`, `category_id`, `type_id`, `source_id`, `status_id`, `position_id`, `brand`, `property_number`, `barcode`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 13, 1, 1, 1, 1, NULL, 'dell', 'LT001', 'BCLT001', NULL, '2024-01-19 18:25:39', '2024-03-25 04:52:39'),
(2, 13, 1, 1, 1, 1, NULL, 'dell1', 'LT002', 'BCLT002', NULL, '2024-01-19 18:25:39', '2024-03-25 04:52:39'),
(3, 13, 1, 1, 1, 14, NULL, 'Lenovo', 'LT003', 'BCLT003', NULL, '2024-01-19 18:25:39', '2024-03-24 09:48:22'),
(4, 13, 1, 1, 1, 14, NULL, 'Asus', 'LT004', 'BCLT004', NULL, '2024-01-19 18:25:39', '2024-03-24 09:49:20'),
(5, 13, 1, 1, 1, 14, NULL, 'Acer', 'LT005', 'BCLT005', NULL, '2024-01-19 18:25:39', '2024-03-24 09:43:51'),
(6, 13, 1, 2, 1, 14, NULL, 'HP', 'DC001', 'BCDC001', NULL, '2024-01-19 18:25:39', '2024-02-27 00:26:34'),
(7, 13, 1, 2, 1, 17, NULL, 'Dell', 'DC002', 'BCDC002', NULL, '2024-01-19 18:25:39', '2024-02-13 16:03:31'),
(8, 13, 1, 2, 1, 14, NULL, 'Lenovo', 'DC003', 'BCDC003', NULL, '2024-01-19 18:25:39', '2024-03-24 09:20:04'),
(9, 13, 1, 2, 1, 14, NULL, 'Acer', 'DC004', 'BCDC004', NULL, '2024-01-19 18:25:39', '2024-03-24 09:20:04'),
(10, 13, 1, 2, 1, 14, NULL, 'Asuss', 'DC005', 'BCDC005', NULL, '2024-01-19 18:25:39', '2024-03-24 09:20:04'),
(11, 13, 1, 3, 1, 14, NULL, 'HP', 'PR001', 'BCPR001', NULL, '2024-01-19 18:25:39', '2024-03-24 09:01:52'),
(12, 13, 1, 3, 1, 17, NULL, 'Epson', 'PR002', 'BCPR002', NULL, '2024-01-19 18:25:39', '2024-03-24 08:05:31'),
(13, 13, 1, 3, 1, 14, NULL, 'Canon', 'PR003', 'BCPR003', NULL, '2024-01-19 18:25:39', '2024-03-11 03:04:36'),
(14, 1, 1, 3, 1, 2, NULL, 'Brother', 'PR004', 'BCPR004', NULL, '2024-01-19 18:25:39', '2024-01-27 22:58:39'),
(15, 1, 1, 3, 1, 4, NULL, 'Xerox', 'PR005', 'BCPR005', NULL, '2024-01-19 18:25:39', '2024-01-27 23:16:42'),
(16, 1, 2, 4, 2, 14, NULL, 'Dell', 'MN001', 'BCMN001', NULL, '2024-01-19 18:25:39', '2024-01-27 22:50:43'),
(17, 1, 2, 4, 2, 14, NULL, 'Lenovo', 'MN002', 'BCMN002', NULL, '2024-01-19 18:25:39', '2024-01-27 22:55:23'),
(18, 1, 2, 4, 2, 14, NULL, 'HP', 'MN003', 'BCMN003', NULL, '2024-01-19 18:25:39', '2024-01-27 23:00:51'),
(19, 1, 2, 4, 2, 14, NULL, 'Asus', 'MN004', 'BCMN004', NULL, '2024-01-19 18:25:39', '2024-01-27 22:58:02'),
(20, 1, 2, 4, 2, 14, NULL, 'Acer', 'MN005', 'BCMN005', NULL, '2024-01-19 18:25:39', '2024-01-27 22:55:51'),
(21, 13, 1, 5, 1, 14, NULL, 'Logitech Mouse', 'CA001', 'BCCA001', NULL, '2024-01-19 18:25:39', '2024-03-24 04:56:37'),
(22, 13, 1, 5, 1, 14, NULL, 'Microsoft Keyboard', 'CA002', 'BCCA002', NULL, '2024-01-19 18:25:39', '2024-03-11 03:11:13'),
(23, 13, 1, 5, 1, 14, NULL, 'Sandisk USB Drive', 'CA003', 'BCCA003', NULL, '2024-01-19 18:25:39', '2024-03-11 03:12:21'),
(24, 1, 1, 5, 1, 1, NULL, 'D-Link Router', 'CA004', 'BCCA004', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(25, 1, 1, 5, 1, 1, NULL, 'HP Webcam', 'CA005', 'BCCA005', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(26, 1, 2, 6, 1, 1, NULL, 'Pen Brand 1', 'PEN001', 'BCPEN001', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(27, 1, 2, 6, 1, 1, NULL, 'Pen Brand 2', 'PEN002', 'BCPEN002', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(28, 1, 2, 6, 1, 1, NULL, 'Pen Brand 3', 'PEN003', 'BCPEN003', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(29, 1, 2, 6, 1, 17, NULL, 'Pen Brand 4', 'PEN004', 'BCPEN004', NULL, '2024-01-19 18:25:39', '2024-01-27 23:51:03'),
(30, 1, 2, 6, 1, 1, NULL, 'Pen Brand 5', 'PEN005', 'BCPEN005', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(31, 1, 2, 7, 1, 1, NULL, 'Notebook Brand 1', 'NOTE001', 'BCNOTE001', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(32, 1, 2, 7, 1, 1, NULL, 'Notebook Brand 2', 'NOTE002', 'BCNOTE002', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(33, 1, 2, 7, 1, 1, NULL, 'Notebook Brand 3', 'NOTE003', 'BCNOTE003', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(34, 1, 2, 7, 1, 1, NULL, 'Notebook Brand 4', 'NOTE004', 'BCNOTE004', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(35, 1, 2, 7, 1, 1, NULL, 'Notebook Brand 5', 'NOTE005', 'BCNOTE005', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(36, 1, 2, 8, 1, 1, NULL, 'Stapler Brand 1', 'STAP001', 'BCSTAP001', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(37, 1, 2, 8, 1, 1, NULL, 'Stapler Brand 2', 'STAP002', 'BCSTAP002', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(38, 1, 2, 8, 1, 1, NULL, 'Stapler Brand 3', 'STAP003', 'BCSTAP003', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(39, 1, 2, 8, 1, 1, NULL, 'Stapler Brand 4', 'STAP004', 'BCSTAP004', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(40, 1, 2, 8, 1, 1, NULL, 'Stapler Brand 5', 'STAP005', 'BCSTAP005', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(41, 1, 2, 9, 1, 1, NULL, 'Paper Clips Brand 1', 'PCLIP001', 'BCPCLIP001', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(42, 1, 2, 9, 1, 1, NULL, 'Paper Clips Brand 2', 'PCLIP002', 'BCPCLIP002', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(43, 1, 2, 9, 1, 1, NULL, 'Paper Clips Brand 3', 'PCLIP003', 'BCPCLIP003', NULL, '2024-01-19 18:25:39', '2024-01-20 23:48:36'),
(44, 1, 2, 9, 1, 17, NULL, 'Paper Clips Brand 4', 'PCLIP004', 'BCPCLIP004', NULL, '2024-01-19 18:25:39', '2024-01-21 00:29:15'),
(45, 1, 2, 9, 1, 1, NULL, 'Paper Clips Brand 5', 'PCLIP005', 'BCPCLIP005', NULL, '2024-01-19 18:25:39', '2024-01-21 00:29:15'),
(46, 1, 2, 10, 1, 17, NULL, 'Desk Organizer Brand 1', 'DO001', 'BCDO001', NULL, '2024-01-19 18:25:40', '2024-01-21 00:24:11'),
(47, 1, 2, 10, 1, 1, NULL, 'Desk Organizer Brand 2', 'DO002', 'BCDO002', NULL, '2024-01-19 18:25:40', '2024-01-21 00:24:11'),
(48, 1, 2, 10, 1, 17, NULL, 'Desk Organizer Brand 3', 'DO003', 'BCDO003', NULL, '2024-01-19 18:25:40', '2024-01-21 00:25:40'),
(49, 1, 2, 10, 1, 1, NULL, 'Desk Organizer Brand 4', 'DO004', 'BCDO004', NULL, '2024-01-19 18:25:40', '2024-01-21 00:25:40'),
(50, 1, 2, 10, 1, 1, NULL, 'Desk Organizer Brand 5', 'DO005', 'BCDO005', NULL, '2024-01-19 18:25:40', '2024-01-20 23:48:36'),
(51, 1, 2, 6, 1, 17, NULL, 'x', '13457654', NULL, NULL, '2024-02-02 04:39:37', '2024-02-02 13:44:01'),
(52, 1, 1, 3, 1, 17, NULL, 'Epson', '13245798654', NULL, NULL, '2024-02-02 05:02:20', '2024-02-03 12:41:14'),
(53, 13, 9, 56, 1, 14, NULL, 'Samsung', 'LEDWALL1', NULL, NULL, '2024-02-03 03:57:58', '2024-03-17 02:34:40'),
(54, 13, 1, 3, 1, 1, NULL, 'Epson', '124543', NULL, NULL, '2024-02-05 01:20:20', '2024-02-05 01:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `tool_positions`
--

CREATE TABLE `tool_positions` (
  `id` bigint UNSIGNED NOT NULL,
  `tool_id` bigint UNSIGNED DEFAULT NULL,
  `position_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tool_positions`
--

INSERT INTO `tool_positions` (`id`, `tool_id`, `position_id`, `created_at`, `updated_at`) VALUES
(10, 51, 1, '2024-02-02 04:53:42', '2024-02-02 04:53:42'),
(11, 51, 2, '2024-02-02 04:53:42', '2024-02-02 04:53:42'),
(15, 52, 2, '2024-02-02 05:03:30', '2024-02-02 05:03:30'),
(30, 53, 8, '2024-02-03 12:35:54', '2024-02-03 12:35:54'),
(32, 54, 2, '2024-02-05 01:20:20', '2024-02-05 01:20:20'),
(53, 4, 1, '2024-02-13 15:56:47', '2024-02-13 15:56:47'),
(54, 5, 1, '2024-02-13 15:57:07', '2024-02-13 15:57:07'),
(55, 6, 1, '2024-02-13 15:57:16', '2024-02-13 15:57:16'),
(61, 10, 1, '2024-02-13 16:00:59', '2024-02-13 16:00:59'),
(62, 11, 1, '2024-02-13 16:01:12', '2024-02-13 16:01:12'),
(63, 13, 1, '2024-02-13 16:01:25', '2024-02-13 16:01:25'),
(66, 2, 1, '2024-03-05 13:58:36', '2024-03-05 13:58:36'),
(67, 3, 1, '2024-03-05 13:58:45', '2024-03-05 13:58:45'),
(68, 7, 1, '2024-03-05 13:59:00', '2024-03-05 13:59:00'),
(69, 8, 1, '2024-03-05 13:59:10', '2024-03-05 13:59:10'),
(70, 9, 1, '2024-03-05 13:59:16', '2024-03-05 13:59:16'),
(71, 1, 1, '2024-03-06 12:07:39', '2024-03-06 12:07:39'),
(72, 1, 2, '2024-03-06 12:07:39', '2024-03-06 12:07:39'),
(73, 21, 1, '2024-03-11 03:05:41', '2024-03-11 03:05:41'),
(74, 22, 1, '2024-03-11 03:10:40', '2024-03-11 03:10:40'),
(75, 23, 1, '2024-03-11 03:12:00', '2024-03-11 03:12:00'),
(76, 12, 1, '2024-03-24 08:05:31', '2024-03-24 08:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `tool_requests`
--

CREATE TABLE `tool_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `tool_id` bigint UNSIGNED DEFAULT NULL,
  `request_id` bigint UNSIGNED DEFAULT NULL,
  `status_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `returner_id` bigint UNSIGNED DEFAULT NULL,
  `tool_status_id` bigint UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `returned_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tool_requests`
--

INSERT INTO `tool_requests` (`id`, `tool_id`, `request_id`, `status_id`, `user_id`, `returner_id`, `tool_status_id`, `description`, `approval_at`, `returned_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, NULL, NULL, '2024-01-20 16:05:16', '2024-01-19 23:15:28', '2024-02-25 00:45:11'),
(2, 2, 2, 1, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-19 23:24:39', '2024-02-25 00:45:11'),
(3, 4, 3, 1, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-19 23:35:25', '2024-02-25 00:45:11'),
(4, 1, 4, 9, 1, 3, 3, NULL, NULL, '2024-01-20 17:41:56', '2024-01-20 01:19:59', '2024-01-20 01:41:56'),
(5, 3, 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 01:19:59', '2024-01-20 01:19:59'),
(6, 5, 5, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 01:22:46', '2024-01-20 01:22:46'),
(7, 15, 5, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 01:22:46', '2024-01-20 01:22:46'),
(8, 10, 6, 7, 1, 5, 1, NULL, NULL, '2024-01-20 19:01:23', '2024-01-20 02:32:19', '2024-01-20 03:01:23'),
(9, 12, 6, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 02:32:19', '2024-01-20 02:32:19'),
(10, 13, 7, 15, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 03:01:40', '2024-01-20 10:04:40'),
(11, 14, 7, 15, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 03:01:40', '2024-01-20 10:04:40'),
(12, 6, 8, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 03:59:06', '2024-01-20 03:59:06'),
(13, 7, 8, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 03:59:06', '2024-01-20 03:59:06'),
(14, 8, 9, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 04:04:10', '2024-01-20 04:04:10'),
(15, 10, 9, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 04:04:10', '2024-01-20 04:04:10'),
(16, 11, 10, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 04:06:02', '2024-01-20 04:06:02'),
(17, 49, 11, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 04:06:54', '2024-01-20 05:12:36'),
(18, 50, 11, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 04:06:54', '2024-01-20 05:12:36'),
(19, 46, 12, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 05:42:52', '2024-01-20 05:42:52'),
(20, 47, 12, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 05:42:52', '2024-01-20 05:42:52'),
(21, 45, 13, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 05:45:31', '2024-01-20 05:45:31'),
(22, 48, 13, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 05:45:31', '2024-01-20 05:45:31'),
(23, 21, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 10:01:46', '2024-01-20 10:01:46'),
(24, 22, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 10:01:46', '2024-01-20 10:01:46'),
(25, 25, 15, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 10:19:22', '2024-01-20 10:19:22'),
(26, 26, 15, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 10:19:22', '2024-01-20 10:19:22'),
(27, 2, 16, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 10:43:27', '2024-01-20 10:45:14'),
(28, 4, 16, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 10:43:27', '2024-01-20 10:43:27'),
(29, 23, 17, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 10:54:06', '2024-01-20 10:57:12'),
(30, 35, 17, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 10:54:06', '2024-01-20 11:13:24'),
(31, 36, 17, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 10:54:06', '2024-01-20 10:54:53'),
(32, 23, 18, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 22:02:48', '2024-01-20 22:02:48'),
(33, 35, 18, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 22:02:48', '2024-01-20 22:02:48'),
(34, 1, 19, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 22:49:03', '2024-01-20 22:49:03'),
(35, 2, 19, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 22:49:03', '2024-01-20 22:49:03'),
(36, 3, 20, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 22:53:34', '2024-01-20 23:10:40'),
(37, 4, 20, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 22:53:34', '2024-01-20 22:53:34'),
(38, 5, 21, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 22:59:26', '2024-01-20 22:59:26'),
(39, 6, 21, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 22:59:26', '2024-01-20 22:59:26'),
(40, 1, 22, 15, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:13:35', '2024-01-20 23:13:55'),
(41, 2, 22, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:13:35', '2024-01-20 23:13:35'),
(42, 3, 23, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:15:49', '2024-01-20 23:16:05'),
(43, 4, 23, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:15:49', '2024-01-20 23:15:49'),
(44, 1, 24, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:19:25', '2024-01-20 23:20:07'),
(45, 2, 24, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:19:25', '2024-01-20 23:19:25'),
(46, 1, 25, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:28:30', '2024-01-20 23:29:12'),
(47, 2, 25, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:28:30', '2024-01-20 23:28:30'),
(48, 1, 26, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:32:31', '2024-01-20 23:33:00'),
(49, 2, 26, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:32:31', '2024-01-20 23:32:31'),
(50, 1, 27, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:42:56', '2024-01-20 23:43:19'),
(51, 2, 27, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:42:56', '2024-01-20 23:42:56'),
(52, 3, 28, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:46:44', '2024-01-20 23:48:36'),
(53, 4, 28, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:46:44', '2024-01-20 23:48:36'),
(54, 1, 29, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:58:37', '2024-01-20 23:59:02'),
(55, 2, 29, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-20 23:58:37', '2024-01-20 23:58:37'),
(56, 2, 30, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:15:16', '2024-01-21 00:15:32'),
(57, 3, 30, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:15:16', '2024-01-21 00:15:16'),
(58, 4, 31, 15, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:16:54', '2024-01-21 00:17:18'),
(59, 5, 31, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:16:54', '2024-01-21 00:16:54'),
(60, 7, 32, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:19:14', '2024-01-21 00:19:14'),
(61, 8, 32, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:19:14', '2024-01-21 00:19:14'),
(62, 9, 33, 15, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:19:27', '2024-01-21 00:20:23'),
(63, 10, 33, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:19:27', '2024-01-21 00:19:27'),
(64, 46, 34, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:23:39', '2024-01-21 00:24:11'),
(65, 47, 34, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:23:39', '2024-01-21 00:24:11'),
(66, 48, 35, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:25:25', '2024-01-21 00:25:40'),
(67, 49, 35, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:25:25', '2024-01-21 00:25:40'),
(68, 44, 36, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:28:49', '2024-01-21 00:29:15'),
(69, 45, 36, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-21 00:28:49', '2024-01-21 00:29:15'),
(70, 3, 37, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:35:53', '2024-01-27 22:35:53'),
(71, 4, 38, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:41:03', '2024-01-27 22:41:03'),
(72, 6, 39, 10, 1, NULL, NULL, 'all goods g', NULL, NULL, '2024-01-27 22:44:37', '2024-01-27 22:45:06'),
(73, 15, 39, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:44:37', '2024-01-27 22:45:06'),
(74, 16, 40, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:50:43', '2024-01-27 22:50:43'),
(75, 17, 41, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:55:23', '2024-01-27 22:55:23'),
(76, 20, 42, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:55:51', '2024-01-27 22:55:51'),
(77, 19, 43, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:58:02', '2024-01-27 22:58:02'),
(78, 14, 44, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 22:58:39', '2024-01-27 22:58:39'),
(79, 18, 45, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 23:00:51', '2024-01-27 23:00:51'),
(80, 12, 46, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-27 23:04:21', '2024-01-27 23:15:52'),
(81, 15, 47, 10, 1, NULL, NULL, NULL, NULL, NULL, '2024-01-27 23:05:16', '2024-01-27 23:16:42'),
(82, 29, 48, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-27 23:51:03', '2024-01-27 23:51:03'),
(83, 1, 49, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-02 09:06:34', '2024-02-02 09:06:34'),
(84, 51, 50, 10, 10, NULL, NULL, 'wow', NULL, NULL, '2024-02-02 13:43:26', '2024-02-02 13:44:01'),
(85, 53, 51, 10, 10, NULL, NULL, NULL, NULL, NULL, '2024-02-03 04:28:24', '2024-02-03 07:04:27'),
(86, 9, 52, 15, 10, NULL, NULL, NULL, NULL, NULL, '2024-02-03 07:00:22', '2024-02-03 07:05:31'),
(87, 9, 53, 15, 10, NULL, NULL, NULL, NULL, NULL, '2024-02-03 07:28:06', '2024-02-03 07:28:29'),
(88, 9, 54, 10, 10, NULL, NULL, NULL, NULL, NULL, '2024-02-03 07:30:17', '2024-02-03 07:30:40'),
(89, 52, 55, 15, 10, NULL, NULL, NULL, NULL, NULL, '2024-02-03 12:40:14', '2024-02-03 12:40:59'),
(90, 52, 56, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-03 12:41:14', '2024-02-03 12:41:14'),
(91, 53, 57, 10, 13, NULL, NULL, 'first operator trial', NULL, NULL, '2024-02-04 06:40:45', '2024-02-04 07:29:21'),
(92, 53, 58, 10, 13, NULL, NULL, 'first try with operator', NULL, NULL, '2024-02-04 07:46:50', '2024-02-04 07:47:18'),
(93, 53, 59, 15, 13, NULL, NULL, 'try also', NULL, NULL, '2024-02-04 10:58:32', '2024-02-04 11:02:52'),
(94, 53, 60, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-04 11:03:17', '2024-02-04 11:18:07'),
(95, 53, 61, 10, 13, NULL, NULL, 'uwu', NULL, NULL, '2024-02-04 17:20:51', '2024-02-04 17:23:01'),
(96, 1, 62, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-04 17:30:08', '2024-02-04 17:48:56'),
(97, 2, 62, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-04 17:30:08', '2024-02-04 17:48:56'),
(98, 1, 63, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-07 14:39:53', '2024-02-07 14:39:53'),
(99, 2, 63, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-07 14:39:53', '2024-02-07 14:39:53'),
(100, 1, 64, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-07 14:47:58', '2024-02-07 14:47:58'),
(101, 2, 64, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-07 14:47:58', '2024-02-07 14:47:58'),
(102, 1, 65, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-07 14:53:08', '2024-02-07 14:53:08'),
(103, 2, 65, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-07 14:53:08', '2024-02-07 14:53:08'),
(104, 3, 66, 10, 10, NULL, NULL, NULL, NULL, NULL, '2024-02-08 08:20:04', '2024-02-08 08:51:53'),
(105, 4, 66, 10, 10, NULL, NULL, NULL, NULL, NULL, '2024-02-08 08:20:04', '2024-02-08 08:51:53'),
(106, 5, 66, 15, 10, NULL, NULL, NULL, NULL, NULL, '2024-02-08 08:20:04', '2024-02-08 08:51:53'),
(107, 1, 67, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-10 14:51:58', '2024-02-10 14:57:37'),
(108, 2, 67, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-10 14:51:58', '2024-02-10 14:57:37'),
(109, 1, 68, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-10 15:08:27', '2024-02-10 15:15:09'),
(110, 2, 68, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-10 15:08:27', '2024-02-10 15:15:09'),
(111, 1, 69, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 15:30:11', '2024-02-10 15:30:11'),
(112, 2, 69, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 15:30:11', '2024-02-10 15:30:11'),
(113, 1, 70, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 15:31:00', '2024-02-10 15:31:00'),
(114, 2, 70, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 15:31:00', '2024-02-10 15:31:00'),
(115, 1, 71, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 15:38:46', '2024-02-10 15:38:46'),
(116, 2, 71, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 15:38:46', '2024-02-10 15:38:46'),
(117, 1, 72, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 15:39:07', '2024-02-10 15:39:07'),
(118, 2, 72, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 15:39:07', '2024-02-10 15:39:07'),
(119, 1, 74, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-10 15:46:05', '2024-02-10 15:53:38'),
(120, 2, 74, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-10 15:46:05', '2024-02-10 15:53:38'),
(121, 1, 75, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 15:46:08', '2024-02-10 15:46:08'),
(122, 2, 75, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 15:46:08', '2024-02-10 15:46:08'),
(123, 1, 76, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 16:02:35', '2024-02-10 16:02:35'),
(124, 2, 76, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 16:02:35', '2024-02-10 16:02:35'),
(125, 1, 77, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 17:05:51', '2024-02-10 17:05:51'),
(126, 2, 77, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 17:05:51', '2024-02-10 17:05:51'),
(127, 1, 78, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 17:10:08', '2024-02-10 17:10:08'),
(128, 2, 78, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 17:10:08', '2024-02-10 17:10:08'),
(129, 1, 79, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 17:16:52', '2024-02-10 17:16:52'),
(130, 2, 79, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-10 17:16:52', '2024-02-10 17:16:52'),
(131, 1, 80, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-10 17:18:32', '2024-02-10 17:43:57'),
(132, 2, 80, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-10 17:18:32', '2024-02-10 17:43:57'),
(133, 1, 81, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-11 14:08:03', '2024-02-11 14:11:59'),
(134, 2, 81, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-11 14:08:03', '2024-02-11 14:11:59'),
(135, 3, 81, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-11 14:08:03', '2024-02-11 14:11:59'),
(136, 1, 82, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-11 14:16:57', '2024-02-11 14:17:44'),
(137, 2, 82, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-11 14:16:57', '2024-02-11 14:17:44'),
(138, 3, 82, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-11 14:16:57', '2024-02-11 14:17:44'),
(139, 1, 83, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-11 14:51:25', '2024-02-11 14:51:49'),
(140, 2, 83, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-11 14:51:25', '2024-02-11 14:51:49'),
(141, 3, 83, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-11 14:51:25', '2024-02-11 14:51:49'),
(142, 1, 84, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-11 15:09:51', '2024-02-11 15:09:51'),
(143, 2, 84, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-11 15:09:52', '2024-02-11 15:09:52'),
(144, 3, 84, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-11 15:09:52', '2024-02-11 15:09:52'),
(145, 1, 85, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-12 12:30:51', '2024-02-12 12:30:51'),
(146, 2, 85, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-12 12:30:51', '2024-02-12 12:30:51'),
(147, 3, 85, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-12 12:30:51', '2024-02-12 12:30:51'),
(148, 1, 88, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-13 11:38:21', '2024-02-13 11:38:49'),
(149, 2, 88, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-13 11:38:21', '2024-02-13 11:38:49'),
(150, 3, 88, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-13 11:38:21', '2024-02-13 11:38:49'),
(151, 4, 88, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-13 11:38:21', '2024-02-13 11:38:49'),
(152, 1, 89, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-13 12:08:06', '2024-02-13 12:08:33'),
(153, 2, 89, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-13 12:08:06', '2024-02-13 12:08:33'),
(154, 3, 89, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-13 12:08:06', '2024-02-13 12:08:33'),
(155, 1, 90, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-13 12:40:52', '2024-02-13 12:41:41'),
(156, 2, 90, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-13 12:40:52', '2024-02-13 12:41:41'),
(157, 3, 91, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-13 13:36:33', '2024-02-13 13:36:52'),
(158, 4, 91, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-13 13:36:33', '2024-02-13 13:36:52'),
(159, 1, 92, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-13 16:01:56', '2024-02-13 16:03:30'),
(160, 7, 92, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-13 16:01:56', '2024-02-13 16:03:31'),
(161, 2, 93, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-22 03:41:03', '2024-02-22 04:33:44'),
(162, 3, 93, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-22 03:41:03', '2024-02-22 04:33:44'),
(163, 4, 94, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-22 03:52:24', '2024-02-22 03:58:40'),
(164, 5, 94, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-22 03:52:24', '2024-02-22 03:58:40'),
(165, 4, 95, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-22 04:03:22', '2024-02-22 04:03:38'),
(166, 5, 95, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-22 04:03:22', '2024-02-22 04:03:39'),
(167, 1, 96, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-22 05:57:54', '2024-02-22 06:03:27'),
(168, 2, 96, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-22 05:57:54', '2024-02-22 06:03:27'),
(169, 4, 97, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-22 05:58:53', '2024-02-22 06:02:51'),
(170, 5, 97, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-22 05:58:53', '2024-02-22 06:02:51'),
(171, 1, 98, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-23 17:10:39', '2024-02-23 17:14:38'),
(172, 2, 98, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-23 17:10:39', '2024-02-23 17:14:38'),
(173, 3, 98, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-23 17:10:39', '2024-02-23 17:14:38'),
(174, 1, 99, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-23 17:33:42', '2024-02-23 17:33:51'),
(175, 2, 99, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-23 17:33:42', '2024-02-23 17:33:51'),
(176, 3, 99, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-23 17:33:42', '2024-02-23 17:33:51'),
(177, 1, 100, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 22:54:17', '2024-02-24 22:54:35'),
(178, 2, 100, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 22:54:17', '2024-02-24 22:54:35'),
(179, 3, 100, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 22:54:18', '2024-02-24 22:54:35'),
(180, 1, 101, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 22:59:54', '2024-02-24 23:00:18'),
(181, 2, 101, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 22:59:54', '2024-02-24 23:00:18'),
(182, 3, 101, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 22:59:54', '2024-02-24 23:00:18'),
(183, 1, 102, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:14:27', '2024-02-24 23:14:56'),
(184, 2, 102, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:14:27', '2024-02-24 23:14:56'),
(185, 3, 102, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:14:27', '2024-02-24 23:14:56'),
(186, 1, 103, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:16:59', '2024-02-24 23:17:07'),
(187, 2, 103, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:16:59', '2024-02-24 23:17:07'),
(188, 3, 103, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:16:59', '2024-02-24 23:17:07'),
(189, 1, 104, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:20:34', '2024-02-24 23:20:42'),
(190, 2, 104, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:20:34', '2024-02-24 23:20:42'),
(191, 3, 104, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:20:34', '2024-02-24 23:20:42'),
(192, 1, 105, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:22:31', '2024-02-24 23:22:42'),
(193, 2, 105, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:22:31', '2024-02-24 23:22:42'),
(194, 3, 105, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:22:31', '2024-02-24 23:22:42'),
(195, 1, 106, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:24:12', '2024-02-24 23:24:32'),
(196, 2, 106, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:24:12', '2024-02-24 23:24:32'),
(197, 3, 106, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:24:12', '2024-02-24 23:24:32'),
(198, 1, 107, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:49:11', '2024-02-25 00:02:17'),
(199, 2, 107, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:49:11', '2024-02-25 00:02:17'),
(200, 3, 107, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-24 23:49:11', '2024-02-25 00:02:17'),
(201, 1, 108, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:07:57', '2024-02-25 00:08:06'),
(202, 2, 108, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:07:57', '2024-02-25 00:08:07'),
(203, 3, 108, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:07:57', '2024-02-25 00:08:07'),
(204, 1, 109, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:18:18', '2024-02-25 00:18:26'),
(205, 2, 109, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:18:18', '2024-02-25 00:18:26'),
(206, 3, 109, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:18:18', '2024-02-25 00:18:26'),
(207, 1, 110, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:30:09', '2024-02-25 00:30:23'),
(208, 2, 110, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:30:09', '2024-02-25 00:30:23'),
(209, 3, 110, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:30:09', '2024-02-25 00:30:23'),
(210, 1, 111, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:36:52', '2024-02-25 00:37:07'),
(211, 2, 111, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:36:52', '2024-02-25 00:37:07'),
(212, 3, 111, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:36:52', '2024-02-25 00:37:07'),
(213, 1, 112, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:41:51', '2024-02-25 00:45:11'),
(214, 2, 112, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:41:51', '2024-02-25 00:45:11'),
(215, 3, 112, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 00:41:51', '2024-02-25 00:45:11'),
(216, 1, 113, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 01:23:02', '2024-02-25 03:50:02'),
(217, 2, 113, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 01:23:02', '2024-02-25 03:50:02'),
(218, 3, 113, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 01:23:02', '2024-02-25 03:50:02'),
(219, 1, 114, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 01:24:46', '2024-02-25 03:49:08'),
(220, 2, 114, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 01:24:46', '2024-02-25 03:49:08'),
(221, 3, 114, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-25 01:24:46', '2024-02-25 03:49:08'),
(222, 1, 115, 7, 13, 1, 1, NULL, NULL, '2024-02-25 20:15:19', '2024-02-25 01:26:14', '2024-02-25 04:15:19'),
(223, 2, 115, 7, 13, 1, 1, NULL, NULL, '2024-02-25 20:15:20', '2024-02-25 01:26:14', '2024-02-25 04:15:20'),
(224, 3, 115, 7, 13, 1, 1, NULL, NULL, '2024-02-25 20:15:20', '2024-02-25 01:26:14', '2024-02-25 04:15:20'),
(225, 1, 116, 7, 13, 9, 1, NULL, NULL, '2024-02-26 16:34:57', '2024-02-26 00:19:02', '2024-02-26 00:34:57'),
(226, 2, 116, 7, 13, 9, 1, NULL, NULL, '2024-02-26 16:34:57', '2024-02-26 00:19:02', '2024-02-26 00:34:57'),
(227, 3, 117, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 00:26:34', '2024-02-27 00:26:34'),
(228, 6, 117, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-27 00:26:34', '2024-02-27 00:26:34'),
(229, 1, 118, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-02-27 03:26:55', '2024-02-27 03:27:29'),
(230, 1, 119, 7, 13, 1, 1, NULL, NULL, '2024-02-27 19:41:55', '2024-02-27 03:32:46', '2024-02-27 03:41:55'),
(231, 1, 120, 7, 13, 1, 1, NULL, NULL, '2024-02-27 19:52:31', '2024-02-27 03:46:44', '2024-02-27 03:52:31'),
(232, 1, 121, 7, 13, 1, 1, NULL, NULL, '2024-03-05 11:53:33', '2024-03-04 19:38:03', '2024-03-04 19:53:33'),
(233, 1, 122, 7, 13, 1, 1, NULL, NULL, '2024-03-05 11:54:51', '2024-03-04 19:53:53', '2024-03-04 19:54:51'),
(234, 1, 123, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-05 12:44:04', '2024-03-05 12:46:50'),
(235, 1, 124, 7, 13, 1, 1, NULL, NULL, '2024-03-06 04:54:32', '2024-03-05 12:52:35', '2024-03-05 12:54:32'),
(236, 1, 125, 7, 13, 1, 1, NULL, NULL, '2024-03-06 05:28:16', '2024-03-05 13:09:47', '2024-03-05 13:28:16'),
(237, 2, 125, 7, 13, 1, 1, NULL, NULL, '2024-03-06 05:28:16', '2024-03-05 13:09:47', '2024-03-05 13:28:16'),
(238, 3, 125, 7, 13, 1, 1, NULL, NULL, '2024-03-06 05:28:16', '2024-03-05 13:09:47', '2024-03-05 13:28:16'),
(239, 1, 126, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-05 13:28:37', '2024-03-05 13:29:04'),
(240, 2, 126, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-05 13:28:37', '2024-03-05 13:29:04'),
(241, 3, 126, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-05 13:28:37', '2024-03-05 13:29:04'),
(242, 1, 127, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-05 13:35:49', '2024-03-05 13:36:07'),
(243, 2, 127, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-05 13:35:49', '2024-03-05 13:36:07'),
(244, 3, 127, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-05 13:35:49', '2024-03-05 13:36:07'),
(245, 1, 128, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-05 13:40:39', '2024-03-05 13:40:56'),
(246, 2, 128, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-05 13:40:39', '2024-03-05 13:40:56'),
(247, 3, 128, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-05 13:40:39', '2024-03-05 13:40:56'),
(248, 1, 129, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-05 13:49:09', '2024-03-05 13:50:20'),
(249, 2, 129, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-05 13:49:09', '2024-03-05 13:50:20'),
(250, 3, 129, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-05 13:49:09', '2024-03-05 13:50:21'),
(251, 1, 130, 7, 13, 2, 1, NULL, NULL, '2024-03-06 05:58:11', '2024-03-05 13:55:37', '2024-03-05 13:58:11'),
(252, 2, 130, 7, 13, 2, 1, NULL, NULL, '2024-03-06 05:58:11', '2024-03-05 13:55:37', '2024-03-05 13:58:11'),
(253, 3, 130, 7, 13, 2, 1, NULL, NULL, '2024-03-06 05:58:11', '2024-03-05 13:55:37', '2024-03-05 13:58:11'),
(254, 1, 131, 7, 13, 1, 1, NULL, NULL, '2024-03-06 18:59:48', '2024-03-05 16:55:02', '2024-03-06 02:59:48'),
(255, 2, 131, 7, 13, 1, 1, NULL, NULL, '2024-03-06 18:59:48', '2024-03-05 16:55:02', '2024-03-06 02:59:48'),
(256, 3, 131, 7, 13, 1, 1, NULL, NULL, '2024-03-06 19:03:12', '2024-03-05 16:55:02', '2024-03-06 03:03:12'),
(257, 1, 132, 7, 13, 1, NULL, NULL, NULL, '2024-03-06 19:04:21', '2024-03-06 03:03:42', '2024-03-06 03:04:21'),
(258, 2, 132, 7, 13, 1, NULL, NULL, NULL, '2024-03-06 19:04:21', '2024-03-06 03:03:42', '2024-03-06 03:04:21'),
(259, 3, 132, 7, 13, 1, NULL, NULL, NULL, '2024-03-06 19:04:21', '2024-03-06 03:03:42', '2024-03-06 03:04:21'),
(260, 1, 133, 7, 13, 1, 1, NULL, NULL, '2024-03-06 19:12:34', '2024-03-06 03:11:59', '2024-03-06 03:12:34'),
(261, 2, 133, 7, 13, 1, 1, NULL, NULL, '2024-03-06 19:12:34', '2024-03-06 03:11:59', '2024-03-06 03:12:34'),
(262, 3, 133, 7, 13, 1, 1, NULL, NULL, '2024-03-06 19:12:34', '2024-03-06 03:11:59', '2024-03-06 03:12:34'),
(263, 1, 134, 7, 13, 1, 1, NULL, NULL, '2024-03-06 20:00:07', '2024-03-06 03:54:56', '2024-03-06 04:00:07'),
(264, 2, 134, 7, 13, 1, 1, NULL, NULL, '2024-03-06 20:00:07', '2024-03-06 03:54:56', '2024-03-06 04:00:07'),
(265, 3, 134, 7, 13, 1, 1, NULL, NULL, '2024-03-06 20:00:07', '2024-03-06 03:54:56', '2024-03-06 04:00:07'),
(266, 1, 135, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:05:32', '2024-03-06 04:12:01'),
(267, 2, 135, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:05:32', '2024-03-06 04:12:01'),
(268, 3, 135, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:05:32', '2024-03-06 04:12:01'),
(269, 1, 136, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:12:53', '2024-03-06 04:20:24'),
(270, 2, 136, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:12:53', '2024-03-06 04:20:24'),
(271, 3, 136, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:12:53', '2024-03-06 04:20:24'),
(272, 1, 137, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:28:09', '2024-03-06 04:29:48'),
(273, 2, 137, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:28:09', '2024-03-06 04:29:48'),
(274, 3, 137, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:28:09', '2024-03-06 04:29:48'),
(275, 1, 138, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:30:17', '2024-03-06 04:32:48'),
(276, 2, 138, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:30:17', '2024-03-06 04:32:49'),
(277, 3, 138, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:30:17', '2024-03-06 04:32:49'),
(278, 1, 139, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:33:05', '2024-03-06 04:33:37'),
(279, 2, 139, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:33:05', '2024-03-06 04:33:37'),
(280, 3, 139, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 04:33:05', '2024-03-06 04:33:37'),
(281, 1, 140, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 11:42:44', '2024-03-06 11:48:56'),
(282, 2, 140, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 11:42:44', '2024-03-06 11:48:56'),
(283, 3, 140, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 11:42:44', '2024-03-06 11:48:56'),
(284, 1, 141, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 11:49:19', '2024-03-06 11:51:37'),
(285, 2, 141, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 11:49:19', '2024-03-06 11:51:37'),
(286, 3, 141, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-06 11:49:19', '2024-03-06 11:49:37'),
(287, 1, 142, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 11:51:57', '2024-03-06 11:52:14'),
(288, 2, 142, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 11:51:57', '2024-03-06 11:52:14'),
(289, 3, 142, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-06 11:51:57', '2024-03-06 11:52:14'),
(290, 1, 143, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 11:55:32', '2024-03-06 11:56:25'),
(291, 1, 144, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 11:56:44', '2024-03-06 12:01:26'),
(292, 2, 144, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 11:56:44', '2024-03-06 12:01:26'),
(293, 3, 144, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-06 11:56:44', '2024-03-06 11:56:55'),
(294, 1, 145, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 12:01:46', '2024-03-06 12:07:50'),
(295, 2, 145, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 12:01:46', '2024-03-06 12:07:50'),
(296, 3, 145, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-06 12:01:46', '2024-03-06 12:02:26'),
(297, 1, 146, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 12:08:10', '2024-03-06 12:08:43'),
(298, 2, 146, 10, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-06 12:08:10', '2024-03-06 12:08:43'),
(299, 3, 146, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-06 12:08:10', '2024-03-06 12:08:43'),
(300, 1, 147, 7, 13, 1, 1, NULL, NULL, '2024-03-07 16:44:54', '2024-03-06 12:17:40', '2024-03-07 00:44:54'),
(301, 2, 147, 7, 13, 1, 1, NULL, NULL, '2024-03-07 16:44:54', '2024-03-06 12:17:40', '2024-03-07 00:44:54'),
(302, 3, 147, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-06 12:17:40', '2024-03-07 00:44:32'),
(303, 1, 148, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 00:51:10', '2024-03-07 00:59:26'),
(304, 2, 148, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 00:51:10', '2024-03-07 00:59:26'),
(305, 3, 148, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 00:51:10', '2024-03-07 00:59:26'),
(306, 1, 149, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 01:00:39', '2024-03-07 01:01:35'),
(307, 2, 149, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 01:00:39', '2024-03-07 01:01:35'),
(308, 3, 149, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 01:00:39', '2024-03-07 01:01:35'),
(309, 1, 150, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 01:06:35', '2024-03-07 01:07:05'),
(310, 2, 150, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 01:06:35', '2024-03-07 01:07:05'),
(311, 3, 150, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 01:06:35', '2024-03-07 01:07:05'),
(312, 1, 151, 7, 13, 1, 1, NULL, NULL, '2024-03-07 17:16:24', '2024-03-07 01:14:14', '2024-03-07 01:16:24'),
(313, 2, 151, 7, 13, 1, 1, NULL, NULL, '2024-03-07 17:16:24', '2024-03-07 01:14:14', '2024-03-07 01:16:24'),
(314, 3, 151, 7, 13, 1, 1, NULL, NULL, '2024-03-07 17:16:24', '2024-03-07 01:14:14', '2024-03-07 01:16:24'),
(315, 1, 152, 7, 13, 1, 1, NULL, NULL, '2024-03-07 17:18:48', '2024-03-07 01:16:46', '2024-03-07 01:18:48'),
(316, 2, 152, 7, 13, 1, 1, NULL, NULL, '2024-03-07 17:18:48', '2024-03-07 01:16:46', '2024-03-07 01:18:48'),
(317, 3, 152, 7, 13, 1, 1, NULL, NULL, '2024-03-07 17:18:48', '2024-03-07 01:16:46', '2024-03-07 01:18:48'),
(318, 1, 153, 7, 13, 1, 1, NULL, NULL, '2024-03-07 17:23:42', '2024-03-07 01:19:24', '2024-03-07 01:23:42'),
(319, 2, 153, 7, 13, 1, 1, NULL, NULL, '2024-03-07 17:23:42', '2024-03-07 01:19:24', '2024-03-07 01:23:42'),
(320, 3, 153, 7, 13, 1, 1, NULL, NULL, '2024-03-07 17:23:42', '2024-03-07 01:19:24', '2024-03-07 01:23:42'),
(321, 1, 154, 7, 13, 3, 1, NULL, NULL, '2024-03-07 17:27:51', '2024-03-07 01:26:39', '2024-03-07 01:27:51'),
(322, 2, 154, 7, 13, 3, 1, NULL, NULL, '2024-03-07 17:27:51', '2024-03-07 01:26:39', '2024-03-07 01:27:51'),
(323, 3, 154, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 01:26:39', '2024-03-07 01:27:01'),
(324, 1, 155, 7, 13, 2, 1, NULL, NULL, '2024-03-07 17:34:36', '2024-03-07 01:33:15', '2024-03-07 01:34:36'),
(325, 2, 155, 7, 13, 2, 1, NULL, NULL, '2024-03-07 17:34:36', '2024-03-07 01:33:15', '2024-03-07 01:34:36'),
(326, 3, 155, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 01:33:15', '2024-03-07 01:33:36'),
(327, 1, 156, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 01:57:00', '2024-03-07 01:57:47'),
(328, 2, 156, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 01:57:00', '2024-03-07 01:57:47'),
(329, 3, 156, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 01:57:00', '2024-03-07 01:57:27'),
(330, 1, 157, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 01:59:25', '2024-03-07 02:01:52'),
(331, 2, 157, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 01:59:25', '2024-03-07 02:01:52'),
(332, 3, 157, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 01:59:25', '2024-03-07 01:59:37'),
(333, 1, 158, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 02:06:44', '2024-03-07 02:07:51'),
(334, 2, 158, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 02:06:44', '2024-03-07 02:07:51'),
(335, 3, 158, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 02:06:44', '2024-03-07 02:06:59'),
(336, 1, 159, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 02:13:35', '2024-03-07 02:16:09'),
(337, 2, 159, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 02:13:35', '2024-03-07 02:16:09'),
(338, 3, 159, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 02:13:35', '2024-03-07 02:15:45'),
(339, 1, 160, 7, 13, 2, 1, NULL, NULL, '2024-03-07 18:21:20', '2024-03-07 02:18:23', '2024-03-07 02:21:20'),
(340, 2, 160, 7, 13, 2, 1, NULL, NULL, '2024-03-07 18:21:20', '2024-03-07 02:18:23', '2024-03-07 02:21:20'),
(341, 3, 160, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 02:18:23', '2024-03-07 02:18:34'),
(342, 1, 161, 9, 13, 1, 3, NULL, NULL, '2024-03-07 18:41:26', '2024-03-07 02:35:28', '2024-03-07 02:41:26'),
(343, 2, 161, 7, 13, 1, 1, NULL, NULL, '2024-03-07 18:38:11', '2024-03-07 02:35:28', '2024-03-07 02:38:11'),
(344, 3, 161, 9, 13, 1, 3, NULL, NULL, '2024-03-07 18:41:26', '2024-03-07 02:35:28', '2024-03-07 02:41:26'),
(345, 1, 162, 7, 13, 2, 1, NULL, NULL, '2024-03-08 10:53:03', '2024-03-07 02:53:25', '2024-03-07 18:53:03'),
(346, 2, 162, 7, 13, 2, 1, NULL, NULL, '2024-03-08 10:53:03', '2024-03-07 02:53:25', '2024-03-07 18:53:03'),
(347, 3, 162, 7, 13, 2, 4, NULL, NULL, '2024-03-08 10:53:31', '2024-03-07 02:53:25', '2024-03-07 18:53:31'),
(348, 1, 163, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 19:15:02', '2024-03-07 19:15:51'),
(349, 2, 163, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 19:15:02', '2024-03-07 19:15:51'),
(350, 3, 163, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 19:15:02', '2024-03-07 19:15:31'),
(351, 1, 164, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 19:24:34', '2024-03-07 21:17:15'),
(352, 2, 164, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 19:24:34', '2024-03-07 19:25:13'),
(353, 3, 164, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 19:24:34', '2024-03-07 21:17:15'),
(354, 1, 165, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 21:20:59', '2024-03-07 21:21:53'),
(355, 2, 165, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 21:20:59', '2024-03-07 21:21:19'),
(356, 3, 165, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 21:20:59', '2024-03-07 21:21:53'),
(357, 1, 166, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 21:26:01', '2024-03-07 21:26:32'),
(358, 2, 166, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 21:26:01', '2024-03-07 21:26:15'),
(359, 3, 166, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-07 21:26:01', '2024-03-07 21:26:32'),
(360, 1, 167, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-09 04:26:03', '2024-03-09 04:28:25'),
(361, 2, 167, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 04:26:03', '2024-03-09 04:27:42'),
(362, 3, 167, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-09 04:26:03', '2024-03-09 04:28:26'),
(363, 1, 168, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-09 04:33:01', '2024-03-09 04:34:11'),
(364, 2, 168, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 04:33:01', '2024-03-09 04:33:20'),
(365, 3, 168, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-09 04:33:01', '2024-03-09 04:34:11'),
(366, 1, 169, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-09 04:39:32', '2024-03-09 04:41:59'),
(367, 2, 169, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 04:39:32', '2024-03-09 04:40:06'),
(368, 3, 169, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 04:39:32', '2024-03-09 04:40:06'),
(369, 1, 170, 7, 13, 2, 1, NULL, NULL, '2024-03-09 20:47:50', '2024-03-09 04:42:37', '2024-03-09 04:47:50'),
(370, 2, 170, 7, 13, 2, 1, NULL, NULL, '2024-03-09 20:47:50', '2024-03-09 04:42:37', '2024-03-09 04:47:50'),
(371, 3, 170, 7, 13, 2, 1, NULL, NULL, '2024-03-09 20:47:50', '2024-03-09 04:42:37', '2024-03-09 04:47:50'),
(372, 1, 171, 7, 13, 2, 1, NULL, NULL, '2024-03-09 21:19:57', '2024-03-09 05:03:43', '2024-03-09 05:19:57'),
(373, 2, 171, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 05:03:43', '2024-03-09 05:05:01'),
(374, 3, 171, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 05:03:43', '2024-03-09 05:05:01'),
(375, 1, 172, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:27:16', '2024-03-09 10:27:16'),
(376, 2, 172, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:27:16', '2024-03-09 10:27:16'),
(377, 3, 172, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-09 10:27:16', '2024-03-09 10:27:16'),
(378, 1, 184, 7, 13, 15, 1, NULL, NULL, '2024-03-11 15:29:41', '2024-03-10 23:27:00', '2024-03-10 23:29:41'),
(379, 2, 184, 6, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-10 23:27:00', '2024-03-10 23:29:15'),
(380, 3, 184, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-10 23:27:00', '2024-03-10 23:27:31'),
(381, 1, 185, 7, 13, 2, 1, NULL, NULL, '2024-03-11 18:50:42', '2024-03-10 23:59:13', '2024-03-11 02:50:42'),
(382, 3, 185, 15, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-10 23:59:13', '2024-03-11 00:00:40'),
(383, 3, 186, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 02:49:12', '2024-03-11 02:49:12'),
(384, 1, 187, 15, 13, NULL, NULL, NULL, NULL, NULL, '2024-03-11 02:52:21', '2024-03-11 02:57:37'),
(385, 1, 188, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 02:58:16', '2024-03-11 02:58:16'),
(386, 11, 189, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:02:12', '2024-03-11 03:02:12'),
(387, 13, 190, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:04:36', '2024-03-11 03:04:36'),
(388, 21, 191, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:07:10', '2024-03-11 03:07:10'),
(389, 22, 192, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:11:13', '2024-03-11 03:11:13'),
(390, 23, 193, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:12:21', '2024-03-11 03:12:21'),
(391, 1, 194, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:25:39', '2024-03-11 03:25:39'),
(392, 1, 195, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:34:08', '2024-03-11 03:34:08'),
(393, 1, 196, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:37:15', '2024-03-11 03:37:15'),
(394, 1, 197, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:39:14', '2024-03-11 03:39:14'),
(395, 1, 198, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:45:21', '2024-03-11 03:45:21'),
(396, 1, 199, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:46:23', '2024-03-11 03:46:23'),
(397, 1, 200, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:51:47', '2024-03-11 03:51:47'),
(398, 1, 201, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:54:59', '2024-03-11 03:54:59'),
(399, 1, 202, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 03:55:51', '2024-03-11 03:55:51'),
(400, 1, 203, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 04:04:08', '2024-03-11 04:04:08'),
(401, 1, 204, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 04:05:45', '2024-03-11 04:05:45'),
(402, 1, 205, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-11 04:07:26', '2024-03-11 04:07:26'),
(403, 1, 211, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 01:00:06', '2024-03-17 01:00:06'),
(404, 2, 211, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 01:00:06', '2024-03-17 01:00:06'),
(405, 3, 211, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 01:00:06', '2024-03-17 01:00:06'),
(406, 1, 212, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 01:03:33', '2024-03-17 01:03:33'),
(407, 2, 212, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 01:03:33', '2024-03-17 01:03:33'),
(408, 3, 212, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 01:03:33', '2024-03-17 01:03:33'),
(409, 1, 213, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:20:27', '2024-03-17 02:20:27'),
(410, 2, 213, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:20:27', '2024-03-17 02:20:27'),
(411, 3, 213, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:20:27', '2024-03-17 02:20:27'),
(412, 1, 214, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:22:12', '2024-03-17 02:22:12'),
(413, 2, 214, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:22:12', '2024-03-17 02:22:12'),
(414, 3, 214, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:22:12', '2024-03-17 02:22:12'),
(415, 1, 215, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:24:45', '2024-03-17 02:24:45'),
(416, 2, 215, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:24:45', '2024-03-17 02:24:45'),
(417, 3, 215, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:24:45', '2024-03-17 02:24:45'),
(418, 1, 216, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:26:30', '2024-03-17 02:26:30'),
(419, 2, 216, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:26:30', '2024-03-17 02:26:30'),
(420, 3, 216, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:26:30', '2024-03-17 02:26:30'),
(421, 1, 217, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:28:21', '2024-03-17 02:28:21'),
(422, 2, 217, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:28:21', '2024-03-17 02:28:21'),
(423, 3, 217, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:28:21', '2024-03-17 02:28:21'),
(424, 1, 218, 7, 13, 1, 1, NULL, NULL, '2024-03-17 18:36:27', '2024-03-17 02:31:11', '2024-03-17 02:36:27'),
(425, 2, 218, 7, 13, 1, 1, NULL, NULL, '2024-03-17 18:36:27', '2024-03-17 02:31:11', '2024-03-17 02:36:27'),
(426, 3, 218, 7, 13, 1, 1, NULL, NULL, '2024-03-17 18:36:27', '2024-03-17 02:31:11', '2024-03-17 02:36:27'),
(427, 53, 219, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-17 02:34:40', '2024-03-17 02:34:40'),
(428, 1, 220, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-21 23:37:24', '2024-03-21 23:37:24'),
(429, 2, 221, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-21 23:49:23', '2024-03-21 23:49:23'),
(430, 1, 224, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 02:44:01', '2024-03-24 02:44:01'),
(431, 1, 225, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 02:44:43', '2024-03-24 02:44:43'),
(432, 1, 226, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 02:45:16', '2024-03-24 02:45:16'),
(433, 1, 227, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 02:49:36', '2024-03-24 02:49:36'),
(434, 1, 228, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 02:49:38', '2024-03-24 02:49:38'),
(435, 1, 234, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 03:24:57', '2024-03-24 03:24:57'),
(436, 1, 235, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 03:25:15', '2024-03-24 03:25:15'),
(437, 1, 239, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 04:43:14', '2024-03-24 04:43:14'),
(438, 2, 239, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 04:43:14', '2024-03-24 04:43:14'),
(439, 1, 240, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 04:45:52', '2024-03-24 04:45:52'),
(440, 2, 240, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 04:45:52', '2024-03-24 04:45:52'),
(441, 1, 241, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 04:56:37', '2024-03-24 04:56:37'),
(442, 2, 241, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 04:56:37', '2024-03-24 04:56:37'),
(443, 21, 241, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 04:56:37', '2024-03-24 04:56:37'),
(444, 3, 242, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 08:31:45', '2024-03-24 08:31:45'),
(445, 2, 242, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 08:31:45', '2024-03-24 08:31:45'),
(446, 1, 242, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 08:31:45', '2024-03-24 08:31:45'),
(447, 1, 243, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 08:57:51', '2024-03-24 08:57:51'),
(448, 2, 243, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 08:57:51', '2024-03-24 08:57:51'),
(449, 3, 244, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:01:52', '2024-03-24 09:01:52'),
(450, 2, 244, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:01:52', '2024-03-24 09:01:52'),
(451, 11, 244, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:01:52', '2024-03-24 09:01:52'),
(452, 1, 245, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:04:24', '2024-03-24 09:04:24'),
(453, 2, 245, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:04:24', '2024-03-24 09:04:24'),
(454, 3, 245, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:04:24', '2024-03-24 09:04:24'),
(455, 4, 245, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:04:24', '2024-03-24 09:04:24'),
(456, 9, 246, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:20:05', '2024-03-24 09:20:05'),
(457, 10, 246, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:20:05', '2024-03-24 09:20:05'),
(458, 8, 246, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:20:05', '2024-03-24 09:20:05'),
(459, 1, 247, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:38:40', '2024-03-24 09:38:40'),
(460, 2, 248, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:42:05', '2024-03-24 09:42:05'),
(461, 5, 249, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:43:51', '2024-03-24 09:43:51'),
(462, 3, 250, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:48:22', '2024-03-24 09:48:22'),
(463, 4, 251, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:49:20', '2024-03-24 09:49:20'),
(464, 1, 252, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 09:50:16', '2024-03-24 09:50:16'),
(465, 1, 253, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 10:17:55', '2024-03-24 10:17:55'),
(466, 2, 254, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 10:19:20', '2024-03-24 10:19:20'),
(467, 1, 255, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 10:20:54', '2024-03-24 10:20:54'),
(468, 1, 256, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 10:22:42', '2024-03-24 10:22:42'),
(469, 1, 257, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 10:23:43', '2024-03-24 10:23:43'),
(470, 1, 258, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 10:29:25', '2024-03-24 10:29:25'),
(471, 1, 259, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 10:29:37', '2024-03-24 10:29:37'),
(472, 1, 260, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 10:33:03', '2024-03-24 10:33:03'),
(473, 1, 261, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 10:37:30', '2024-03-24 10:37:30'),
(474, 1, 262, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-24 10:40:37', '2024-03-24 10:40:37'),
(475, 1, 263, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 03:42:57', '2024-03-25 03:42:57'),
(476, 2, 263, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 03:42:57', '2024-03-25 03:42:57'),
(477, 1, 264, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 03:53:51', '2024-03-25 03:53:51'),
(478, 2, 264, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 03:53:51', '2024-03-25 03:53:51'),
(479, 1, 265, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 03:56:03', '2024-03-25 03:56:03'),
(480, 2, 265, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 03:56:03', '2024-03-25 03:56:03'),
(481, 1, 266, 7, 13, 1, 1, NULL, NULL, '2024-03-25 20:01:21', '2024-03-25 03:59:57', '2024-03-25 04:01:21'),
(482, 2, 266, 7, 13, 1, 1, NULL, NULL, '2024-03-25 20:01:21', '2024-03-25 03:59:57', '2024-03-25 04:01:21'),
(483, 1, 267, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 04:14:54', '2024-03-25 04:14:54'),
(484, 1, 268, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 04:52:39', '2024-03-25 04:52:39'),
(485, 2, 268, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 04:52:39', '2024-03-25 04:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `tool_securities`
--

CREATE TABLE `tool_securities` (
  `id` bigint UNSIGNED NOT NULL,
  `tool_id` bigint UNSIGNED DEFAULT NULL,
  `security_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tool_securities`
--

INSERT INTO `tool_securities` (`id`, `tool_id`, `security_id`, `created_at`, `updated_at`) VALUES
(10, 53, 6, '2024-02-03 12:35:54', '2024-02-03 12:35:54'),
(11, 53, 9, '2024-02-03 12:35:55', '2024-02-03 12:35:55'),
(12, 53, 2, '2024-02-03 12:35:55', '2024-02-03 12:35:55'),
(13, 54, 12, '2024-02-05 01:20:20', '2024-02-05 01:20:20'),
(14, 54, 5, '2024-02-05 01:20:20', '2024-02-05 01:20:20'),
(15, 54, 6, '2024-02-05 01:20:20', '2024-02-05 01:20:20'),
(38, 4, 5, '2024-02-13 15:56:47', '2024-02-13 15:56:47'),
(39, 5, 5, '2024-02-13 15:57:07', '2024-02-13 15:57:07'),
(40, 5, 6, '2024-02-13 15:57:07', '2024-02-13 15:57:07'),
(41, 6, 6, '2024-02-13 15:57:16', '2024-02-13 15:57:16'),
(53, 10, 5, '2024-02-13 16:00:59', '2024-02-13 16:00:59'),
(54, 11, 5, '2024-02-13 16:01:12', '2024-02-13 16:01:12'),
(55, 11, 6, '2024-02-13 16:01:12', '2024-02-13 16:01:12'),
(56, 13, 6, '2024-02-13 16:01:25', '2024-02-13 16:01:25'),
(59, 2, 5, '2024-03-05 13:58:36', '2024-03-05 13:58:36'),
(60, 3, 5, '2024-03-05 13:58:45', '2024-03-05 13:58:45'),
(61, 3, 6, '2024-03-05 13:58:45', '2024-03-05 13:58:45'),
(62, 7, 5, '2024-03-05 13:59:00', '2024-03-05 13:59:00'),
(63, 8, 5, '2024-03-05 13:59:10', '2024-03-05 13:59:10'),
(64, 9, 5, '2024-03-05 13:59:16', '2024-03-05 13:59:16'),
(65, 9, 6, '2024-03-05 13:59:16', '2024-03-05 13:59:16'),
(66, 1, 5, '2024-03-06 12:07:39', '2024-03-06 12:07:39'),
(67, 21, 5, '2024-03-11 03:05:41', '2024-03-11 03:05:41'),
(68, 21, 6, '2024-03-11 03:05:41', '2024-03-11 03:05:41'),
(69, 23, 5, '2024-03-11 03:12:00', '2024-03-11 03:12:00'),
(70, 23, 6, '2024-03-11 03:12:00', '2024-03-11 03:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `trials`
--

CREATE TABLE `trials` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `category_id`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Laptops', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(2, 1, 'Desktop Computers', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(3, 1, 'Printers', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(4, 1, 'Monitors', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(5, 1, 'Computer Accessories', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(6, 2, 'Pens', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(7, 2, 'Notebooks', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(8, 2, 'Staplers', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(9, 2, 'Paper Clips', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(10, 2, 'Desk Organizers', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(11, 3, 'Microscopes', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(12, 3, 'Lab Glassware', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(13, 3, 'Bunsen Burners', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(14, 3, 'Centrifuges', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(15, 3, 'Test Tubes', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(16, 4, 'Pencils', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(17, 4, 'Erasers', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(18, 4, 'Markers', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(19, 4, 'Scissors', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(20, 4, 'Glue Sticks', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(21, 5, 'Textbooks', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(22, 5, 'Journals', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(23, 5, 'Magazines', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(24, 5, 'Newspapers', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(25, 5, 'Reference Books', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(26, 6, 'Office Chairs', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(27, 6, 'Desks', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(28, 6, 'Bookshelves', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(29, 6, 'File Cabinets', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(30, 6, 'Meeting Tables', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(31, 7, 'Soccer Balls', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(32, 7, 'Basketballs', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(33, 7, 'Tennis Rackets', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(34, 7, 'Yoga Mats', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(35, 7, 'Dumbbells', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(36, 8, 'Paint Brushes', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(37, 8, 'Sketch Pads', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(38, 8, 'Watercolor Sets', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(39, 8, 'Oil Pastels', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(40, 8, 'Canvas Boards', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(41, 9, 'Projectors', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(42, 9, 'Speakers', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(43, 9, 'Microphones', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(44, 9, 'Webcams', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(45, 9, 'Headphones', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(46, 10, 'Safety Goggles', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(47, 10, 'Hard Hats', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(48, 10, 'Gloves', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(49, 10, 'First Aid Kits', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(50, 10, 'Reflective Vests', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(51, 11, 'Guitars', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(52, 11, 'Keyboards', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(53, 11, 'Violins', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(54, 11, 'Drums', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(55, 11, 'Flutes', NULL, '2024-01-19 18:25:39', '2024-01-19 18:25:39'),
(56, 9, 'Led Wall', NULL, '2024-02-03 03:55:46', '2024-02-03 03:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `honorific_id` bigint UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_id` bigint UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `honorific_id`, `image`, `first_name`, `middle_name`, `last_name`, `position_id`, `email`, `email_verified_at`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Randy', 'Admin', 'Teves', 3, 'randyteves@gmail.com', NULL, '$2y$12$2GSfP5eVCny3DI4O1oF5auINx3.aJdCfIs4.o77bcVvLg1gq6WYD6', NULL, NULL, '2024-01-19 18:25:37', '2024-02-03 06:06:48'),
(2, NULL, NULL, 'Jane', 'Staff', 'Doe', NULL, 'staff@gmail.com', NULL, '$2y$12$3XIEFduxNNMT8JdZnJRphO3cRmIvX2Kf2MeGH6ZkjsLgtKyTsyX.2', NULL, NULL, '2024-01-19 18:25:38', '2024-01-19 18:25:38'),
(4, NULL, NULL, 'Jerecho Rey1', 'Polot', 'Inatilleza', 1, 'jerechoreyinatilleza1@gmail.com', NULL, '$2y$12$BC2deIYEOBqXj90suLqPI..JgHIGFjmMO6Fy5ml2unZ224EC4CffS', NULL, NULL, '2024-01-19 18:44:17', '2024-01-19 21:25:12'),
(5, NULL, NULL, 'justin', NULL, 'gutierrez', 2, 'justin@gmail.com', NULL, '$2y$12$NLQUORsFchPsHmd2l0LQieTiPVuCeq03d9L.RT6cVPW/LI/6VrWfy', NULL, NULL, '2024-01-19 18:56:49', '2024-01-19 20:55:51'),
(6, NULL, NULL, 'sdf', 'sdf', 'df', NULL, 'sdf@gmail.com', NULL, '$2y$12$.zY5mWc6p/TuEVDfQen0yOllB7DRjj6njvS1we.u4RPlEAuqip/xq', NULL, NULL, '2024-01-19 19:01:45', '2024-01-19 19:01:45'),
(7, NULL, NULL, 'G-mar', NULL, 'Banua', 1, 'g-marbanua@gmail.com', NULL, '$2y$12$gtcujoRnFfTPNYlWECmtz.UimMxCT4Z2i0hYGKhjgmpyZK2/LLjw6', NULL, NULL, '2024-01-20 22:52:51', '2024-01-20 22:52:51'),
(8, NULL, NULL, 'Selarde', NULL, 'Erwin', 1, 'selardeerwin@gmail.com', NULL, '$2y$12$HL2gjRkBUMwE3ptC5AumAezxbnAKgHMbS38EsZgRpJW/G5mUgLwga', NULL, NULL, '2024-02-02 05:49:31', '2024-02-02 05:49:31'),
(9, NULL, NULL, 'ronver', NULL, 'amper', 1, 'ronveramper@gmail.com', NULL, '$2y$12$5xfO8rCI0SEz0/BQwGpJIOl9WGPRFXTy.cj1derzT./pitK1V.g0y', NULL, NULL, '2024-02-02 05:52:05', '2024-02-02 05:52:05'),
(10, NULL, NULL, 'Jose', NULL, 'Clarion', 11, 'joseclarion@gmail.com', NULL, '$2y$12$5pojEN4epL.BLHJgpkjOLe8dYjgN1LnmYxZU3THxWG4P1DWMyVKHa', NULL, NULL, '2024-02-02 12:30:20', '2024-02-02 12:30:20'),
(11, NULL, NULL, 'bruce', NULL, 'wayne', 2, 'brucewayne@gmail.com', NULL, '$2y$12$rKTXGfxsUGhnYPKJQhmNBOIKQI5JBgl2aiXl9JMWGmZaDCEQftqca', NULL, NULL, '2024-02-02 16:53:07', '2024-02-02 16:53:07'),
(12, NULL, NULL, 'remy', NULL, 'adonis', 8, 'remyadonis@gmail.com', NULL, '$2y$12$WZb1rOJFoauImdk0YNKAVuRJRB4ITZyjPBUmsh6ddTlQdyH0p9rmO', NULL, NULL, '2024-02-03 04:05:24', '2024-02-03 04:05:24'),
(13, NULL, NULL, 'john', 'admin', 'doe', 12, 'admin@gmail.com', NULL, '$2y$12$0spRs4EWTHFAFjn8G.CZGe6cdM.blyt581ig4/YY1rsrZWQPFa55e', NULL, NULL, '2024-02-03 06:07:48', '2024-02-03 06:07:48'),
(14, NULL, NULL, 'jose', NULL, 'clarion', 2, 'joseclarion23@gmail.com', NULL, '$2y$12$bCaESgzpNQDlTtZsleOSnOrY/LS1bxEYjUOYXJaVkOdTHaQcmnLR2', NULL, NULL, '2024-02-26 00:15:14', '2024-02-26 00:15:14'),
(15, NULL, NULL, 'employee1', NULL, '1', 2, 'employee1@gmail.com', NULL, '$2y$12$LtCjAOL2rIhQ3ZRlkfohnOjrRKcZlocE3eOqnWupxlfXWFVpDrc5C', NULL, NULL, '2024-02-26 19:44:00', '2024-02-26 19:44:00'),
(16, 1, NULL, 'Joel', 'P.', 'Limson', 6, 'joellimson@gmail.com', NULL, '$2y$12$4sLj3k/yHJPrW.unxhKOre3.skwgd9U0Q2wKfEiXG.73x.ih4a8bK', NULL, NULL, '2024-03-09 06:23:59', '2024-03-09 07:02:26'),
(17, 1, NULL, 'Noel Marjon', 'E. ', 'Yasi', 5, 'noelmarjonyasi@gmail.com', NULL, '$2y$12$e0yeIFaN3YC3IoNyaMJR4.wOyoFNaDcYjBNsCewsmN9DpXo9n1IO6', NULL, NULL, '2024-03-09 06:43:17', '2024-03-09 07:02:35'),
(18, NULL, NULL, 'api_first_name', 'api_middle_name', 'api_last_name', NULL, 'api_email@gmail.com', NULL, '$2y$12$XpNjYIcIJ1XPJAbzONJ1u.uYYtp7tQl6b3S2Q41yS58CwihY2dJka', NULL, NULL, '2024-03-09 18:49:18', '2024-03-09 18:49:18'),
(19, NULL, NULL, 'api_first_name1', 'api_middle_name1', 'api_last_name1', NULL, 'api_email1@gmail.com', NULL, '$2y$12$Y1jWG7vHKFdM3JusDsSFvuzJPhrSvVUFJP3cgOYBTb9tZenlA15KG', NULL, NULL, '2024-03-09 22:47:16', '2024-03-09 22:47:16'),
(20, NULL, NULL, 'api_first_name2', 'api_middle_name2', 'api_last_name2', NULL, 'api_email2@gmail.com', NULL, '$2y$12$zomyup/UH1fkwxgEW9TiMeJIVmtrEEqW7KwwS8mOICBDdNAb4fR.G', NULL, NULL, '2024-03-09 23:09:00', '2024-03-09 23:09:00'),
(21, NULL, NULL, 'daryl', NULL, 'etom', 1, 'daryletom@gmail.com', NULL, '$2y$12$X.iubSlqda5NmvOgAaQcoe.J7LBsDrOOtM/fZL8aTi18ePBOtNVh6', NULL, NULL, '2024-03-10 23:25:27', '2024-03-10 23:25:27'),
(22, NULL, NULL, 'gmar', 'erwin', 'banua', NULL, 'api_email22@gmail.com', NULL, '$2y$12$A6AHZxrMLLIu4iLV98wWj.EvuA7PHswqtMOmceLmJA.ruQsjhvbTa', NULL, NULL, '2024-03-12 07:21:47', '2024-03-12 07:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Library', '2024-03-09 05:24:13', '2024-03-09 05:24:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `borrowers_id_number_unique` (`id_number`),
  ADD KEY `borrowers_sex_id_foreign` (`sex_id`),
  ADD KEY `borrowers_course_id_foreign` (`course_id`),
  ADD KEY `borrowers_college_id_foreign` (`college_id`),
  ADD KEY `borrowers_status_id_foreign` (`status_id`),
  ADD KEY `borrowers_position_id_foreign` (`position_id`),
  ADD KEY `borrowers_user_id_foreign` (`user_id`);

--
-- Indexes for table `borrower_types`
--
ALTER TABLE `borrower_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_description_unique` (`description`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colleges_description_unique` (`description`),
  ADD UNIQUE KEY `colleges_code_unique` (`code`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_description_unique` (`description`),
  ADD UNIQUE KEY `courses_code_unique` (`code`),
  ADD KEY `courses_college_id_foreign` (`college_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `honorifics`
--
ALTER TABLE `honorifics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operators_sex_id_foreign` (`sex_id`),
  ADD KEY `operators_status_id_foreign` (`status_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_tool_id_foreign` (`tool_id`),
  ADD KEY `requests_user_id_foreign` (`user_id`),
  ADD KEY `requests_borrower_id_foreign` (`borrower_id`),
  ADD KEY `requests_status_id_foreign` (`status_id`),
  ADD KEY `requests_option_id_foreign` (`option_id`),
  ADD KEY `requests_current_security_id_foreign` (`current_security_id`),
  ADD KEY `requests_max_security_id_foreign` (`max_security_id`);

--
-- Indexes for table `request_operators`
--
ALTER TABLE `request_operators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_operators_request_id_foreign` (`request_id`),
  ADD KEY `request_operators_operator_id_foreign` (`operator_id`);

--
-- Indexes for table `request_tools_tool_securities_key`
--
ALTER TABLE `request_tools_tool_securities_key`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_tools_tool_securities_key_request_tools_id_foreign` (`request_tools_id`),
  ADD KEY `request_tools_tool_securities_key_security_id_foreign` (`security_id`),
  ADD KEY `request_tools_tool_securities_key_status_id_foreign` (`status_id`),
  ADD KEY `request_tools_tool_securities_key_user_id_foreign` (`user_id`),
  ADD KEY `request_tools_tool_securities_key_request_id_foreign` (`request_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sexes`
--
ALTER TABLE `sexes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sources_description_unique` (`description`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `statuses_description_unique` (`description`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tools_type_id_foreign` (`type_id`),
  ADD KEY `tools_source_id_foreign` (`source_id`),
  ADD KEY `tools_category_id_foreign` (`category_id`),
  ADD KEY `tools_user_id_foreign` (`user_id`),
  ADD KEY `tools_status_id_foreign` (`status_id`),
  ADD KEY `tools_position_id_foreign` (`position_id`);

--
-- Indexes for table `tool_positions`
--
ALTER TABLE `tool_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tool_positions_tool_id_foreign` (`tool_id`),
  ADD KEY `tool_positions_position_id_foreign` (`position_id`);

--
-- Indexes for table `tool_requests`
--
ALTER TABLE `tool_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tool_requests_tool_id_foreign` (`tool_id`),
  ADD KEY `tool_requests_request_id_foreign` (`request_id`),
  ADD KEY `tool_requests_status_id_foreign` (`status_id`),
  ADD KEY `tool_requests_user_id_foreign` (`user_id`),
  ADD KEY `tool_requests_returner_id_foreign` (`returner_id`),
  ADD KEY `tool_requests_tool_status_id_foreign` (`tool_status_id`);

--
-- Indexes for table `tool_securities`
--
ALTER TABLE `tool_securities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tool_securities_tool_id_foreign` (`tool_id`),
  ADD KEY `tool_securities_security_id_foreign` (`security_id`);

--
-- Indexes for table `trials`
--
ALTER TABLE `trials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `types_description_unique` (`description`),
  ADD KEY `types_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_position_id_foreign` (`position_id`),
  ADD KEY `users_honorific_id_foreign` (`honorific_id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `venues_description_unique` (`description`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `borrower_types`
--
ALTER TABLE `borrower_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `honorifics`
--
ALTER TABLE `honorifics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `request_operators`
--
ALTER TABLE `request_operators`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `request_tools_tool_securities_key`
--
ALTER TABLE `request_tools_tool_securities_key`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=592;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sexes`
--
ALTER TABLE `sexes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tool_positions`
--
ALTER TABLE `tool_positions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tool_requests`
--
ALTER TABLE `tool_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT for table `tool_securities`
--
ALTER TABLE `tool_securities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `trials`
--
ALTER TABLE `trials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD CONSTRAINT `borrowers_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`),
  ADD CONSTRAINT `borrowers_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `borrowers_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `borrowers_sex_id_foreign` FOREIGN KEY (`sex_id`) REFERENCES `sexes` (`id`),
  ADD CONSTRAINT `borrowers_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `borrowers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `operators`
--
ALTER TABLE `operators`
  ADD CONSTRAINT `operators_sex_id_foreign` FOREIGN KEY (`sex_id`) REFERENCES `sexes` (`id`),
  ADD CONSTRAINT `operators_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_borrower_id_foreign` FOREIGN KEY (`borrower_id`) REFERENCES `borrowers` (`id`),
  ADD CONSTRAINT `requests_current_security_id_foreign` FOREIGN KEY (`current_security_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `requests_max_security_id_foreign` FOREIGN KEY (`max_security_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `requests_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`),
  ADD CONSTRAINT `requests_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `requests_tool_id_foreign` FOREIGN KEY (`tool_id`) REFERENCES `tools` (`id`),
  ADD CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `request_operators`
--
ALTER TABLE `request_operators`
  ADD CONSTRAINT `request_operators_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`),
  ADD CONSTRAINT `request_operators_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`);

--
-- Constraints for table `request_tools_tool_securities_key`
--
ALTER TABLE `request_tools_tool_securities_key`
  ADD CONSTRAINT `request_tools_tool_securities_key_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`),
  ADD CONSTRAINT `request_tools_tool_securities_key_request_tools_id_foreign` FOREIGN KEY (`request_tools_id`) REFERENCES `tool_requests` (`id`),
  ADD CONSTRAINT `request_tools_tool_securities_key_security_id_foreign` FOREIGN KEY (`security_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `request_tools_tool_securities_key_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `request_tools_tool_securities_key_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tools`
--
ALTER TABLE `tools`
  ADD CONSTRAINT `tools_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `tools_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `tools_source_id_foreign` FOREIGN KEY (`source_id`) REFERENCES `sources` (`id`),
  ADD CONSTRAINT `tools_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `tools_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `tools_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tool_positions`
--
ALTER TABLE `tool_positions`
  ADD CONSTRAINT `tool_positions_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `tool_positions_tool_id_foreign` FOREIGN KEY (`tool_id`) REFERENCES `tools` (`id`);

--
-- Constraints for table `tool_requests`
--
ALTER TABLE `tool_requests`
  ADD CONSTRAINT `tool_requests_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`),
  ADD CONSTRAINT `tool_requests_returner_id_foreign` FOREIGN KEY (`returner_id`) REFERENCES `borrowers` (`id`),
  ADD CONSTRAINT `tool_requests_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `tool_requests_tool_id_foreign` FOREIGN KEY (`tool_id`) REFERENCES `tools` (`id`),
  ADD CONSTRAINT `tool_requests_tool_status_id_foreign` FOREIGN KEY (`tool_status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `tool_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tool_securities`
--
ALTER TABLE `tool_securities`
  ADD CONSTRAINT `tool_securities_security_id_foreign` FOREIGN KEY (`security_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `tool_securities_tool_id_foreign` FOREIGN KEY (`tool_id`) REFERENCES `tools` (`id`);

--
-- Constraints for table `types`
--
ALTER TABLE `types`
  ADD CONSTRAINT `types_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_honorific_id_foreign` FOREIGN KEY (`honorific_id`) REFERENCES `honorifics` (`id`),
  ADD CONSTRAINT `users_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
