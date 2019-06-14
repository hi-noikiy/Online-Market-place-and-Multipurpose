-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 07:04 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market_place`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_users`
--

CREATE TABLE `all_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1=Active,2=Inactive,3=Suspend',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_users`
--

INSERT INTO `all_users` (`id`, `name`, `mobile`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abu Saleh Matul', '123456789', 'matul@yahoo.com', NULL, '$2y$10$gY7eTF7jdQ9vz8FOXfBHFO2bGqJt3wvQzBdt3vCBWUdWnbN2TSxYu', 2, 'USJ1ivozb0OMC3YfGFIgSJSdkCnuaENvNkfGqVRtvDPsH77ExwkpPFui9IY7', '2019-04-25 12:20:46', '2019-04-25 12:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `applies`
--

CREATE TABLE `applies` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `cover_letter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `delivery_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Submit, 2=Confirm, 3=Withdraw',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applies`
--

INSERT INTO `applies` (`id`, `user_id`, `project_id`, `cover_letter`, `amount`, `delivery_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 22, 'asdf', 39.00, '2019-02-09', 1, '2019-02-08 13:30:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apply_scholarships`
--

CREATE TABLE `apply_scholarships` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `scholarship_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Apply',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=UI, 2=Freelancer,3=Pro,4=jobseeker',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active, 2=Inactive',
  `created_by` int(11) NOT NULL,
  `created_by_ip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_by_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `remarks`, `type`, `status`, `created_by`, `created_by_ip`, `updated_by`, `updated_by_ip`, `created_at`, `updated_at`) VALUES
(2, 'Web development', 'web-development', 'glyphicon glyphicon-asterisk', NULL, 1, 1, 1, '127.0.0.1', 1, '127.0.0.1', '2018-12-22 00:55:25', '2018-12-29 03:57:46'),
(3, 'Web design', 'web-design', 'glyphicon glyphicon-plus', NULL, 1, 1, 1, '127.0.0.1', NULL, NULL, '2018-12-22 00:55:51', NULL),
(4, 'Graphics Design', 'graphics-design', 'glyphicon glyphicon-asterisk', NULL, 1, 1, 1, '127.0.0.1', 1, '127.0.0.1', NULL, '2018-12-29 03:57:41'),
(5, 'Graphics Design', 'graphics-design', 'glyphicon glyphicon-asterisk', NULL, 2, 1, 1, '127.0.0.1', 1, '127.0.0.1', NULL, '2018-12-29 03:57:41'),
(6, 'Web design', 'web-design', 'glyphicon glyphicon-plus', NULL, 2, 1, 1, '127.0.0.1', NULL, NULL, '2018-12-22 00:55:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chatmessages`
--

CREATE TABLE `chatmessages` (
  `id` int(10) UNSIGNED NOT NULL,
  `RoomId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `readWriteStatus` int(11) NOT NULL DEFAULT '0',
  `activationStatus` int(11) NOT NULL DEFAULT '1' COMMENT '1:active,2:deleted,3:spamed',
  `UTC` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selftime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chatmessages`
--

INSERT INTO `chatmessages` (`id`, `RoomId`, `sender`, `receiver`, `message`, `readWriteStatus`, `activationStatus`, `UTC`, `selftime`, `created_at`, `updated_at`) VALUES
(1, '3', '44', '41', 'hi', 1, 1, '-360', '2:52:50   10/4/2019', '2019-05-09 14:52:51', '2019-05-09 14:58:34'),
(2, '3', '44', '41', 'hi\nki kore s', 1, 1, '-360', '2:59:7   10/4/2019', '2019-05-09 14:59:08', '2019-05-09 15:04:29'),
(3, '3', '44', '41', 'l', 1, 1, '-360', '3:05:16   10/4/2019', '2019-05-09 15:05:17', '2019-05-09 15:08:51'),
(4, '3', '44', '41', 'hi', 1, 1, '-360', '3:53:44   10/4/2019', '2019-05-09 15:53:45', '2019-05-09 15:55:05'),
(5, '3', '41', '44', 'ekta dki dekso', 1, 1, '-360', '3:55:51   10/4/2019', '2019-05-09 15:55:52', '2019-05-09 15:56:28'),
(6, '3', '41', '44', 'ekta', 1, 1, '-360', '3:57:0   10/4/2019', '2019-05-09 15:57:01', '2019-05-09 15:58:56'),
(7, '3', '41', '44', 'eta ki delsko', 1, 1, '-360', '3:59:25   10/4/2019', '2019-05-09 15:59:26', '2019-05-09 16:01:34'),
(8, '3', '41', '44', 'hi', 1, 1, '-360', '4:01:41   10/4/2019', '2019-05-09 16:01:42', '2019-05-09 17:01:33'),
(9, '3', '44', '41', 'ki kor', 1, 1, '-360', '5:02:59   10/4/2019', '2019-05-09 17:02:59', '2019-05-09 17:05:10'),
(10, '3', '41', '44', 'jjjjjjjjjjjjj', 1, 1, '-360', '5:06:34   10/4/2019', '2019-05-09 17:06:34', '2019-05-09 17:16:53'),
(11, '3', '44', '41', 'kkk', 0, 1, '-360', '7:41:44   10/4/2019', '2019-05-09 19:41:44', '2019-05-09 19:41:44'),
(12, '3', '44', '41', 'ki', 0, 1, '-360', '7:43:27   10/4/2019', '2019-05-09 19:43:27', '2019-05-09 19:43:27'),
(13, '3', '44', '41', 'ji', 0, 1, '-360', '7:44:27   10/4/2019', '2019-05-09 19:44:28', '2019-05-09 19:44:28'),
(14, '3', '44', '41', 'kkk', 0, 1, '-360', '7:46:30   10/4/2019', '2019-05-09 19:46:30', '2019-05-09 19:46:30'),
(15, '3', '44', '41', 'f', 0, 1, '-360', '7:48:57   10/4/2019', '2019-05-09 19:48:57', '2019-05-09 19:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `chatrooms`
--

CREATE TABLE `chatrooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `chatRoomId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chatrooms`
--

INSERT INTO `chatrooms` (`id`, `chatRoomId`, `created_at`, `updated_at`) VALUES
(1, '1,44', '2019-05-09 11:55:18', '2019-05-09 11:55:18'),
(2, '38,44', '2019-05-09 12:43:06', '2019-05-09 12:43:06'),
(3, '41,44', '2019-05-09 12:43:06', '2019-05-09 12:43:06'),
(4, '43,44', '2019-05-09 12:43:06', '2019-05-09 12:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `chores`
--

CREATE TABLE `chores` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator` int(11) NOT NULL,
  `price` double NOT NULL,
  `gifted` int(11) DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) DEFAULT '0',
  `precidance` int(11) NOT NULL DEFAULT '2' COMMENT '1:featured,2:normal',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1:active, 0:deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1' COMMENT '1:chore,2:service',
  `delivery_day` int(11) DEFAULT NULL,
  `payment_cleared` int(11) NOT NULL DEFAULT '0' COMMENT '0:not_cleared,1:cleared'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chores`
--

INSERT INTO `chores` (`id`, `name`, `creator`, `price`, `gifted`, `description`, `view`, `precidance`, `status`, `created_at`, `updated_at`, `image_id`, `category_id`, `type`, `delivery_day`, `payment_cleared`) VALUES
(1, 'new choe', 1, 45, NULL, 'lllllllllllllllllll aaaaaaaaaaaaaaaaaaaaaa ddddddddddddddddddd ffffffffffffffffffffffffff ssssssssssssssssssssssssssssssssssssss', 0, 1, 1, '2019-04-25 15:54:11', '2019-04-25 15:54:11', 1, 1, 1, NULL, 0),
(2, 'new 2', 1, 56, NULL, 'nce the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesett', 0, 1, 1, '2019-04-25 16:48:14', '2019-04-25 16:48:14', 2, 1, 1, NULL, 0),
(3, 'nw 3', 1, 66, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley ', 0, 1, 1, '2019-04-26 02:52:07', '2019-04-26 02:52:07', 3, 1, 1, NULL, 0),
(4, 'new 4', 1, 100, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley ', 0, 1, 1, '2019-04-26 02:52:49', '2019-04-26 02:52:49', 4, 1, 1, NULL, 0),
(5, 'new 5', 1, 10000, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley ', 0, 1, 1, '2019-04-26 02:53:31', '2019-04-26 02:53:31', 5, 1, 1, NULL, 0),
(6, 'new 6', 1, 345, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley ', 0, 1, 1, '2019-04-26 02:54:15', '2019-04-26 02:54:15', 6, 1, 1, NULL, 0),
(7, 'my service', 1, 56, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley ', 0, 1, 1, '2019-04-26 02:56:20', '2019-04-26 13:10:13', 7, 1, 2, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chore_categories`
--

CREATE TABLE `chore_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chore_categories`
--

INSERT INTO `chore_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Other', '2019-04-25 23:23:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chore_proposals`
--

CREATE TABLE `chore_proposals` (
  `id` int(10) UNSIGNED NOT NULL,
  `chore_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0:not_accepted, 1:accepted,2:denied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chore_proposals`
--

INSERT INTO `chore_proposals` (`id`, `chore_id`, `price`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 7, 77, 1, '2019-04-26 03:19:22', '2019-04-26 13:10:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Users primary ID',
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `ceo_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `tag`, `category_id`, `ceo_name`, `about_company`, `created_at`, `updated_at`) VALUES
(1, 35, 'asd', 6, '6', NULL, '2019-01-21 09:55:02', '2019-01-21 09:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active, 2=Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 1, '2019-01-04 19:22:38', NULL),
(2, 'Canada', 1, '2019-01-04 19:22:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `availablity` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Available, 2= Unavailable',
  `created_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active, 2=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `short_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) NOT NULL,
  `recent_delivery` double DEFAULT NULL,
  `response_time` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL COMMENT '1:male,2:female,3:other',
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `short_description`, `long_description`, `address`, `user_id`, `recent_delivery`, `response_time`, `created_at`, `updated_at`, `designation`, `birthdate`, `age`, `gender`, `profile_image`) VALUES
(1, NULL, NULL, NULL, 44, NULL, NULL, '2019-04-30 17:03:43', '2019-04-30 17:03:43', NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `school_name`, `qualification_id`, `start_date`, `end_date`, `note`, `created_at`, `updated_at`) VALUES
(1, 4, 'Oxford ', 1, '2003-01-22', '2005-01-22', 'Famous University', '2019-01-07 18:50:11', NULL),
(2, 24, 'b', 1, '2019-01-23', '2019-01-15', 'asdf', '2019-01-18 15:13:41', '2019-01-18 15:13:41'),
(3, 26, 'b', 1, '2019-01-23', '2019-01-15', 'asdf', '2019-01-18 15:19:30', '2019-01-18 15:19:30'),
(4, 27, 'a', 1, '2019-01-15', '2019-01-23', 'aa', '2019-01-18 15:20:56', '2019-01-18 15:20:56'),
(5, 27, 'b', 1, '2019-01-23', '2019-01-15', 'asdf', '2019-01-18 15:20:56', '2019-01-18 15:20:56'),
(7, 29, 'ab', 1, '2019-01-16', '2019-01-16', 'abc', '2019-01-19 10:40:11', '2019-01-19 10:40:11'),
(12, 41, 'jj scholl', 1, '2019-04-17', '2019-04-15', 'ooooooooooooo', '2019-04-30 09:19:06', '2019-04-30 09:19:06'),
(13, 41, 'shovon chool', 1, '2019-04-23', '2019-04-30', 'ssssssssssssss', '2019-04-30 09:19:06', '2019-04-30 09:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `institution` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `institution`, `position`, `start_date`, `end_date`, `note`, `created_at`, `updated_at`) VALUES
(1, 4, 'Oxford', 'Web Developer', '2003-01-22', '2005-01-22', 'I was a Lead developer', '2019-01-07 18:51:06', NULL),
(2, 4, 'Oxford', 'Web Developer', '2003-01-22', '2005-01-22', 'I was a Lead developer', '2019-01-07 18:51:06', NULL),
(3, 24, 'ee', 'sadf', '2019-01-16', '2019-01-16', 'asdf', '2019-01-18 15:13:41', '2019-01-18 15:13:41'),
(4, 26, 'ee', 'sadf', '2019-01-16', '2019-01-16', 'asdf', '2019-01-18 15:19:30', '2019-01-18 15:19:30'),
(5, 27, 'Employee', 'Designer', '2019-01-17', '2019-01-16', 'adf', '2019-01-18 15:20:56', '2019-01-18 15:20:56'),
(6, 27, 'ee', 'sadf', '2019-01-16', '2019-01-16', 'asdf', '2019-01-18 15:20:56', '2019-01-18 15:20:56'),
(7, 29, 'adf', 'asdf', '2019-01-17', '2019-01-16', NULL, '2019-01-19 10:40:11', '2019-01-19 10:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_type` int(11) NOT NULL COMMENT '0:project_delivery,1:job_dleivery',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelancers`
--

CREATE TABLE `freelancers` (
  `id` int(10) UNSIGNED NOT NULL,
  `short_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `recent_delivery` double DEFAULT NULL,
  `response_time` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `hourly_rate` double DEFAULT NULL,
  `availability` int(11) DEFAULT NULL COMMENT '0:permenant,1:part_time,2:intern',
  `gender` int(11) DEFAULT NULL COMMENT '1:male,2:female,3:other',
  `verified_at` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:not,1:yes',
  `age` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelancers`
--

INSERT INTO `freelancers` (`id`, `short_description`, `long_description`, `address`, `recent_delivery`, `response_time`, `created_at`, `updated_at`, `user_id`, `profile_image`, `level`, `hourly_rate`, `availability`, `gender`, `verified_at`, `age`, `birthday`) VALUES
(1, 'jjjjjjjjjjjjjjjjjj', 'kkkkkkkkkkkkkkkkkkkkkkkk', '1, jjj', NULL, NULL, '2019-04-29 05:22:40', '2019-05-05 15:56:26', 41, NULL, 0, 35, 2, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_order_reports`
--

CREATE TABLE `freelancer_order_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0:not_replied,1:replied,2:not_seen',
  `type` int(11) NOT NULL COMMENT '0:delivery,1:extension_time,2:cancel,3:modification',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `extension_day` int(11) DEFAULT NULL,
  `modification_money` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_project_proposals`
--

CREATE TABLE `freelancer_project_proposals` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'proposal_sender/ ->user_id',
  `gig_id` int(11) DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `delivery_time` int(11) NOT NULL,
  `price` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0:not_accepted, 1:accepted,2:denied',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelancer_project_proposals`
--

INSERT INTO `freelancer_project_proposals` (`id`, `user_id`, `gig_id`, `project_id`, `delivery_time`, `price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 41, NULL, 3, 12, 33, 'Describe Your Proposal\r\n            lores ispam                Describe Your Proposal\r\n            lores ispam                Describe Your Proposal\r\n            lores ispam', 1, '2019-05-06 02:56:49', '2019-05-08 19:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `gigs`
--

CREATE TABLE `gigs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_short_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'designation',
  `basic_long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL COMMENT '0:freelancer_gig,1:pro_gig',
  `price1` double NOT NULL,
  `price2` double DEFAULT NULL,
  `price3` double DEFAULT NULL,
  `delivery_time1` int(11) NOT NULL,
  `delivery_time2` int(11) DEFAULT NULL,
  `delivery_time3` int(11) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `freelancer_id` int(11) NOT NULL,
  `silver_short_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `silver_brief_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gold_short_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gold_brief_description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gigs`
--

INSERT INTO `gigs` (`id`, `title`, `basic_short_description`, `basic_long_description`, `type`, `price1`, `price2`, `price3`, `delivery_time1`, `delivery_time2`, `delivery_time3`, `address`, `category_id`, `ip`, `created_at`, `updated_at`, `freelancer_id`, `silver_short_description`, `silver_brief_description`, `gold_short_description`, `gold_brief_description`) VALUES
(4, 'Web designer and Web-Application developer', 'Short Description', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five cen', 0, 45, 55, 67, 15, 10, 7, 'Maijdee, Noakhali, Chittagong, Bangladesh', 6, '127.0.0.1', '2019-04-29 11:14:28', '2019-04-29 11:14:28', 1, 'Short Description', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five cen', 'Short Description', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five cen'),
(5, 'website', 'Short Description', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five cen', 0, 33, 44, 55, 15, 13, 10, 'Maijdee, Noakhali, Chittagong, Bangladesh', 7, '127.0.0.1', '2019-04-29 11:47:50', '2019-04-29 11:47:50', 1, 'Short Description', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five cen', 'Short Description', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five cen'),
(6, 'warehouse', 'Short Description', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five cen', 1, 100, 120, 140, 3, 4, 7, 'Maijdee, Noakhali, Chittagong, Bangladesh', -100, '127.0.0.1', '2019-04-29 12:19:50', '2019-04-29 12:19:50', 1, 'Short Description', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five cen', 'Short Description', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five cen'),
(7, 'Agriculture', 'Short Description', 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 0, 87, 99, 120, 6, 8, 89, 'Maijdee, Noakhali, Chittagong, Bangladesh', -100, '127.0.0.1', '2019-04-30 11:32:51', '2019-04-30 11:32:51', 1, 'Short Description', 'llllllllllllllllllllllllllllllllllllllllllllllllllllllll', 'Short Description', 'ooooooooooooooooooooooooooooooooooooo');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '0:chore,1:admin,2:customer,3:freelancer->gig,4:pro->gig,5:job_seeker,6:service,7:project,8:job,9:freelancer,10:pro',
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `created_at`, `updated_at`, `type`, `item_id`) VALUES
(1, '1556229251.jpg', '2019-04-25 15:54:11', '2019-04-25 15:54:11', NULL, NULL),
(2, '1556232493.jpg', '2019-04-25 16:48:13', '2019-04-25 16:48:13', NULL, NULL),
(3, '1556268726.jpg', '2019-04-26 02:52:06', '2019-04-26 02:52:06', NULL, NULL),
(4, '1556268769.jpg', '2019-04-26 02:52:49', '2019-04-26 02:52:49', NULL, NULL),
(5, '1556268811.jpg', '2019-04-26 02:53:31', '2019-04-26 02:53:31', NULL, NULL),
(6, '1556268855.jpg', '2019-04-26 02:54:15', '2019-04-26 02:54:15', NULL, NULL),
(7, '1556268980.jpg', '2019-04-26 02:56:20', '2019-04-26 02:56:20', NULL, NULL),
(12, '1556558068.jpg', '2019-04-29 11:14:28', '2019-04-29 11:14:28', 3, 4),
(13, '1556558168.jpg', '2019-04-29 11:14:28', '2019-04-29 11:14:28', 3, 4),
(14, '1556558068.jpg', '2019-04-29 11:14:28', '2019-04-29 11:14:28', 3, 4),
(15, '1556560070.jpg', '2019-04-29 11:47:50', '2019-04-29 11:47:50', 3, 5),
(16, '1556560070.jpg', '2019-04-29 11:47:50', '2019-04-29 11:47:50', 3, 5),
(17, '1556560071.jpg', '2019-04-29 11:47:51', '2019-04-29 11:47:51', 3, 5),
(18, '1556561990.jpg', '2019-04-29 12:19:50', '2019-04-29 12:19:50', 4, 6),
(19, '1556561990.jpg', '2019-04-29 12:19:50', '2019-04-29 12:19:50', 4, 6),
(20, '1556561990.jpg', '2019-04-29 12:19:50', '2019-04-29 12:19:50', 4, 6),
(21, '1556645572.jpg', '2019-04-30 11:32:52', '2019-04-30 11:32:52', 3, 7),
(22, '1556645572.jpg', '2019-04-30 11:32:52', '2019-04-30 11:32:52', 3, 7),
(23, '1556645573.jpg', '2019-04-30 11:32:53', '2019-04-30 11:32:53', 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min` double NOT NULL,
  `max` double NOT NULL,
  `customer` int(11) NOT NULL COMMENT 'customer_id',
  `job_category_id` int(11) NOT NULL COMMENT 'job_category',
  `Location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jobpro` int(11) NOT NULL COMMENT '0:Project,1:Job',
  `type` int(11) DEFAULT NULL COMMENT '0:permenant,1:part_time,2:intern,3:temporary',
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `file`, `min`, `max`, `customer`, `job_category_id`, `Location`, `jobpro`, `type`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'camera', 'Images or documents that might be helpful in describing your job Images or documents that might be helpful in describing your jobImages or documents that might be helpful in describing your jobImages or documents that might be helpful in describing your jobImages or documents that might be helpful in describing your jobImages or documents that might be helpful in describing your job', NULL, 12, 14, 1, 0, NULL, 1, 0, 12, '2019-05-04 13:32:58', '2019-05-04 13:32:58'),
(2, 'my job 2', 'lorem ispanlorem ispanlorem ispanlorem ispanlorem ispanlorem ispan', '1557078006.JPG', 12, 22, 1, 0, NULL, 1, 1, 11, '2019-05-05 11:40:06', '2019-05-05 11:40:06'),
(3, 'my project', 'lores ispam Is goodlores ispam Is goodlores ispam Is goodlores ispam Is goodlores ispam Is goodlores ispam Is goodlores ispam Is goodlores ispam Is good', NULL, 12, 15, 1, 0, NULL, 0, 1, 11, '2019-05-05 12:28:09', '2019-05-05 12:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active, 2=Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 1, '2019-01-04 19:22:48', NULL),
(2, 'Bangla', 1, '2019-01-04 19:22:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level_tags`
--

CREATE TABLE `level_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `userleveler` int(11) NOT NULL COMMENT 'setter',
  `userbeenleveled` int(11) NOT NULL COMMENT 'getter',
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'camelCase',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active, 2=Inactive',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `country_id`, `remarks`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, NULL, 1, 1, '2018-12-22 06:50:30', NULL),
(2, 'Khulna', 1, NULL, 1, 1, '2018-12-22 06:50:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2018_12_03_182543_create_categories_table', 1),
(18, '2018_12_05_175919_create_sub_categories_table', 1),
(19, '2018_12_11_173254_create_tem_users_table', 1),
(20, '2018_12_16_124628_create_user_company_categories_table', 1),
(21, '2018_12_16_124701_create_user_company_types_table', 1),
(22, '2018_12_16_165644_create_user_infos_table', 1),
(23, '2018_12_21_162437_create_projects_table', 2),
(24, '2018_12_21_163358_create_locations_table', 2),
(25, '2019_01_04_190935_create_skills_table', 3),
(26, '2019_01_04_191044_create_qualifications_table', 3),
(27, '2019_01_04_191059_create_languages_table', 3),
(28, '2019_01_04_191128_create_countries_table', 3),
(29, '2019_01_07_183335_create_socials_table', 4),
(30, '2019_01_07_183537_create_education_table', 4),
(31, '2019_01_07_183553_create_experiences_table', 4),
(32, '2019_01_07_183716_create_skill_details_table', 4),
(33, '2019_01_21_154906_create_companies_table', 5),
(34, '2019_02_08_182110_create_applies_table', 6),
(35, '2019_03_01_181624_create_messages_table', 7),
(36, '2019_03_16_185639_create_scholarships_table', 7),
(37, '2019_03_16_211029_create_apply_scholarships_table', 7),
(38, '2019_03_18_190227_create_courses_table', 7),
(39, '2019_04_04_104423_create_gigs_table', 8),
(40, '2019_04_04_125658_add_user_gig', 8),
(41, '2019_04_11_165906_create_all_users_table', 8),
(42, '2019_04_12_043756_add_non_unique_email', 8),
(43, '2019_04_12_061449_create_chores_table', 8),
(44, '2019_04_12_061628_create_chore_proposals_table', 8),
(45, '2019_04_15_234615_create_chore_categories_table', 8),
(46, '2019_04_16_000015_add_col', 8),
(47, '2019_04_16_092814_create_wishlists_table', 8),
(48, '2019_04_16_103043_add_service_to_chore', 8),
(49, '2019_04_04_110358_image_table', 9),
(50, '2019_04_26_110748_add_status_chore_proposal', 10),
(51, '2019_04_26_111411_payment_clear', 11),
(52, '2019_04_29_043827_create_gigs_table', 12),
(53, '2019_04_29_045022_create_views_table', 12),
(54, '2019_04_29_045130_create_reviews_table', 12),
(55, '2019_04_29_045206_create_freelancers_table', 12),
(56, '2019_04_29_045230_create_pros_table', 12),
(57, '2019_04_29_074654_add_user_col', 13),
(58, '2019_04_29_074724_add_user_col2', 14),
(59, '2019_04_29_083741_add_user_col3', 14),
(60, '2019_04_29_145558_add_des_coress', 15),
(61, '2019_04_29_153707_add_des_identifier', 16),
(62, '2019_04_29_161529_add_item_type', 17),
(63, '2019_04_30_014711_create_jobs_table', 18),
(64, '2019_04_30_014945_create_pro__job__proposals_table', 18),
(65, '2019_04_30_015008_create_freelancer__job__proposals_table', 18),
(66, '2019_04_30_015123_create_pro__free__orders_table', 18),
(67, '2019_04_30_053553_create_customers_table', 19),
(68, '2019_04_30_155200_create_job_categories_table', 20),
(69, '2019_04_30_220832_create_jobs_table', 21),
(70, '2019_04_30_234203_add_item_info', 22),
(71, '2019_05_03_222859_add_giver_id', 23),
(72, '2019_05_04_213004_add_profile_image', 24),
(73, '2019_05_04_220951_add_level', 25),
(74, '2019_05_04_233344_add_details', 26),
(75, '2019_05_04_233918_create_slags_table', 26),
(76, '2019_05_05_183716_add_infos', 27),
(77, '2019_05_05_202231_add_birthday', 28),
(78, '2019_05_05_202254_add_birthday_to_pro', 28),
(79, '2019_05_05_212627_add_user_type', 29),
(80, '2019_05_06_085425_create_freelancer_project_proposals_table', 30),
(81, '2019_05_06_095831_create_pro_project_proposals_table', 31),
(82, '2019_05_06_121053_add_infos', 32),
(83, '2019_05_07_202142_add_proposal_id', 33),
(84, '2019_05_07_205616_create_pro_free_orders_table', 34),
(85, '2019_05_09_115914_create_chatrooms_table', 35),
(86, '2019_05_09_120006_create_chatmessages_table', 35),
(87, '2019_05_09_165425_create_level_tags_table', 36),
(88, '2019_05_09_184116_add_avatar', 37),
(89, '2019_05_09_203933_add_user_utc', 38),
(90, '2019_05_10_051650_create_freelancer_deliveries_table', 39),
(91, '2019_05_10_051845_create_files_table', 40),
(92, '2019_05_10_085144_add_status_on_delivery', 41),
(93, '2019_05_10_092934_create_freelancer_order_reports_table', 42);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `skill_ids` text COLLATE utf8mb4_unicode_ci,
  `language_ids` text COLLATE utf8mb4_unicode_ci,
  `budget` double DEFAULT NULL,
  `qualification` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `experience` double DEFAULT NULL,
  `expert_level` tinyint(3) DEFAULT '1' COMMENT '1=Beginner, 2=Intermediate, 3=Expert',
  `user_type` tinyint(4) DEFAULT NULL COMMENT '1=Feelancer, 2=Pro',
  `type` tinyint(4) DEFAULT NULL COMMENT '1=Project, 2=Job, 3=Internship, 4=Scholarship, 5=Traning',
  `job_type` tinyint(4) DEFAULT NULL COMMENT '1=Fulltime, 2=Partime',
  `vacancy` int(11) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `viewers` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '1=Active, 2=Deactive, 3=Complete',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` double NOT NULL,
  `freelancer_type` tinyint(4) DEFAULT NULL COMMENT '1=Feelancer,2=Pro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `category_id`, `start_date`, `end_date`, `description`, `skill_ids`, `language_ids`, `budget`, `qualification`, `age`, `experience`, `expert_level`, `user_type`, `type`, `job_type`, `vacancy`, `location`, `country`, `viewers`, `status`, `created_by`, `created_at`, `updated_at`, `price`, `freelancer_type`) VALUES
(3, 'Job3', 2, '2018-12-29', '2019-01-30', 'At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident, Similique Sunt In Culpa Qui Officia Deserunt Mollitia Animi, Id Est Laborum Et Dolorum Fuga.', '[1,2]', '[1,2]', 40, 1, 25, 1, 1, 1, 2, 1, NULL, 1, 1, NULL, 1, 2, '2018-12-22 02:02:08', NULL, 40, 1),
(4, 'Job 2', 2, '2010-12-26', '2019-01-30', 'Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident, Similique Sunt In Culpa Qui Officia Deserunt Mollitia Animi, Id Est Laborum Et Dolorum Fuga.', '[1,2]', '[1,2]', 15, 1, 26, 3, 2, 1, 2, 2, NULL, 1, 1, NULL, 1, 1, '2018-12-22 02:02:08', '2018-12-24 00:56:59', 15, 1),
(5, 'Job', 3, '2018-12-23', '2019-01-30', 'At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident, Similique Sunt In Culpa Qui Officia Deserunt Mollitia Animi, Id Est Laborum Et Dolorum Fuga.', '[1,2]', '[1,2]', 20, 1, 25, 1, 3, 2, 2, 1, NULL, 1, 1, NULL, 1, 4, '2018-12-22 02:47:33', NULL, 20, 2),
(6, 'Project 4 (Freelancer)', 3, '2018-12-23', '2019-01-30', 'At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident, Similique Sunt In Culpa Qui Officia Deserunt Mollitia Animi, Id Est Laborum Et Dolorum Fuga.', '[1,2]', '[1,2]', 30, 1, 20, 6, 1, 1, 1, 1, NULL, 2, 1, NULL, 1, 2, '2018-12-22 03:38:15', NULL, 30, 1),
(7, 'Project 3 (Freelancer)', 4, '2018-12-23', '2019-01-30', 'At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident, Similique Sunt In Culpa Qui Officia Deserunt Mollitia Animi, Id Est Laborum Et Dolorum Fuga.', '[1,2]', '[1,2]', 25, 1, 40, 3, 1, 1, 1, 1, NULL, 1, 1, NULL, 1, 2, '2018-12-23 23:25:54', NULL, 25, 1),
(8, 'Project 2 (Freelancer)', 4, '2018-02-23', '2019-01-30', 'At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident, Similique Sunt In Culpa Qui Officia Deserunt Mollitia Animi, Id Est Laborum Et Dolorum Fuga.', '[1,2]', '[1,2]', 20, 1, 25, 5, 1, 1, 1, 1, NULL, 1, 1, NULL, 1, 2, '2018-12-23 23:30:54', '2018-12-24 03:49:53', 20, 1),
(10, 'Project (Freelancer)', 2, '2018-12-24', '2019-01-30', 'At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident, Similique Sunt In Culpa Qui Officia Deserunt Mollitia Animi, Id Est Laborum Et Dolorum Fuga.', '[1,2]', '[1,2]', 21, 1, 25, 10, 1, 1, 1, 1, NULL, 1, 1, NULL, 1, 2, '2018-12-24 03:57:37', '2018-12-24 04:06:08', 21, 1),
(11, 'Project (Pro)', 4, '2018-12-24', '2019-01-30', 'At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident, Similique Sunt In Culpa Qui Officia Deserunt Mollitia Animi, Id Est Laborum Et Dolorum Fuga.', '[1,2]', '[1,2]', 21, 1, 25, 3, 1, 2, 1, 1, NULL, 2, 1, NULL, 1, 2, '2018-12-24 03:57:37', '2018-12-24 04:06:08', 21, 2),
(12, 'Project 2 (Pro)', 4, '2018-12-24', '2019-01-30', 'At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident, Similique Sunt In Culpa Qui Officia Deserunt Mollitia Animi, Id Est Laborum Et Dolorum Fuga.', '[1,2]', '[1,2]', 30, 1, 25, 1, 1, 2, 1, 1, NULL, 1, 1, NULL, 1, 2, '2018-12-24 03:57:37', '2018-12-24 04:06:08', 30, 2),
(13, 'Project 5 (Freelancer)', 3, '2018-12-23', '2019-01-30', 'At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident, Similique Sunt In Culpa Qui Officia Deserunt Mollitia Animi, Id Est Laborum Et Dolorum Fuga.', '[1,2]', '[1,2]', 30, 1, 26, 6, 1, 1, 1, 1, 2, 2, 2, NULL, 1, 2, '2018-12-22 03:38:15', NULL, 30, 1),
(14, 'Project 3 (Pro)', 4, '2018-12-24', '2019-01-30', 'At Vero Eos Et Accusamus Et Iusto Odio Dignissimos Ducimus Qui Blanditiis Praesentium Voluptatum Deleniti Atque Corrupti Quos Dolores Et Quas Molestias Excepturi Sint Occaecati Cupiditate Non Provident, Similique Sunt In Culpa Qui Officia Deserunt Mollitia Animi, Id Est Laborum Et Dolorum Fuga.', '[1,2]', '[1,2]', 21, 1, 25, 4, 1, 2, 1, 1, 2, 2, 1, NULL, 1, 2, '2018-12-24 03:57:37', '2018-12-24 04:06:08', 21, 2),
(15, 'a', 7, '2019-01-17', '2019-01-23', 'abcadfasdf', '[\"1\",\"2\",\"3\",\"4\"]', NULL, 30, NULL, NULL, NULL, 1, 1, 1, 1, NULL, 1, 1, NULL, 1, 2, '2019-01-30 14:13:26', NULL, 0, NULL),
(16, 'test 2', 6, '2019-01-16', '2019-01-24', 'abc', '[\"1\"]', NULL, 50, NULL, NULL, NULL, 1, 2, 1, 2, NULL, 1, 1, NULL, 1, 2, '2019-01-30 14:31:10', NULL, 0, NULL),
(17, 'Freelancer Job 2', 6, '2019-01-17', '2019-01-17', '<b>abc</b>', '[\"1\"]', NULL, 100, NULL, NULL, NULL, 1, 1, 1, 2, NULL, 1, 1, NULL, 1, 2, '2019-01-30 14:34:40', NULL, 0, NULL),
(18, 'Pro project 2', 5, '2019-01-25', '2019-01-30', 'abd', '[\"4\"]', NULL, 60, NULL, NULL, NULL, 1, 2, 1, 1, NULL, 1, 1, NULL, 1, 2, '2019-01-30 14:36:06', NULL, 0, NULL),
(19, 'aaaa', 5, '2019-01-11', '2019-01-13', 'ddadfasfas', '[\"1\",\"2\",\"3\",\"4\"]', NULL, 40, NULL, NULL, NULL, 1, 1, 2, 1, NULL, 1, 1, NULL, 1, 2, '2019-01-30 14:40:13', NULL, 0, NULL),
(20, 'Job 2', 5, '2019-02-14', '2019-02-14', 'ddd<b> dsafasdf abc</b> asdf', '[\"4\"]', NULL, 10, NULL, NULL, NULL, 1, 1, 2, 1, NULL, 1, 1, NULL, 1, 35, '2019-02-04 13:48:04', NULL, 0, NULL),
(21, 'job for all', 6, '2019-02-07', '2019-02-14', '<ul><li>This&nbsp;<b><i>is test description&nbsp;<u></u></i></b></li><li>This&nbsp;<b><i>is test description&nbsp;<u></u></i></b></li><li>This&nbsp;<b><i>is test description&nbsp;<u></u></i></b></li></ul>', '[\"1\",\"2\",\"3\"]', NULL, 50, NULL, NULL, NULL, 1, NULL, 2, 1, NULL, 1, 1, NULL, 1, 35, '2019-02-04 14:31:13', NULL, 0, NULL),
(22, 'Job 22', 7, '2019-02-08', '2019-02-09', 'I need a&nbsp;<b>employee&nbsp;</b>who will able to do my work&nbsp;<i><u>correctly.</u></i><br><br><ul><li>Every day have to work</li><li>One day holiday</li><li>Monthly salary.</li></ul>', '[\"4\"]', NULL, 599, NULL, NULL, NULL, 1, NULL, 2, 1, NULL, 1, 1, NULL, 1, 35, '2019-02-04 14:34:06', NULL, 0, NULL),
(23, 'asdf', 6, '2019-02-16', '2019-02-18', 'asdf', '[\"1\"]', NULL, 100, NULL, NULL, 4, 1, NULL, 2, 1, NULL, 2, 1, NULL, 1, 2, '2019-02-15 12:52:14', NULL, 0, NULL),
(24, 'asdf', 6, '2019-02-16', '2019-02-18', 'asdf', '[\"1\"]', NULL, 100, NULL, NULL, 4, 1, NULL, 2, 1, NULL, 2, 1, NULL, 1, 2, '2019-02-15 12:52:42', NULL, 0, NULL),
(25, 'a', 5, '2019-02-12', '2019-02-20', 'asdf', '[\"3\"]', NULL, 10, NULL, NULL, 3, 1, NULL, 2, 1, NULL, 2, 1, NULL, 1, 2, '2019-02-15 12:55:32', NULL, 0, NULL),
(26, 'a', 5, '2019-02-06', '2019-02-20', 'asdf', '[\"1\"]', NULL, 22, NULL, NULL, 4, 1, NULL, 2, 1, NULL, 1, 1, NULL, 1, 2, '2019-02-15 12:57:43', NULL, 0, NULL),
(27, 'a', 6, '2019-02-20', '2019-02-19', 'asdf', '[\"4\"]', NULL, 33, NULL, NULL, 3, 1, NULL, 2, 1, NULL, 2, 1, NULL, 1, 2, '2019-02-15 12:59:46', NULL, 0, NULL),
(28, 'Job 2', 5, '2019-02-13', '2019-02-15', 'asdf', '[\"4\"]', NULL, 44, NULL, NULL, 4, 1, NULL, 2, 1, NULL, 1, 1, NULL, 1, 2, '2019-02-15 13:02:23', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pros`
--

CREATE TABLE `pros` (
  `id` int(10) UNSIGNED NOT NULL,
  `short_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci,
  `response_time` double DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_experience` int(11) DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `hourly_rate` double DEFAULT NULL,
  `availability` int(11) DEFAULT NULL COMMENT '0:permenant,1:part_time,2:intern',
  `gender` int(11) DEFAULT NULL COMMENT '1:male,2:female,3:other',
  `verified_at` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:not,1:yes',
  `age` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pros`
--

INSERT INTO `pros` (`id`, `short_description`, `long_description`, `response_time`, `address`, `created_at`, `updated_at`, `user_id`, `profile_image`, `year_of_experience`, `level`, `hourly_rate`, `availability`, `gender`, `verified_at`, `age`, `birthday`) VALUES
(2, NULL, NULL, NULL, NULL, '2019-04-30 15:41:30', '2019-04-30 15:41:30', 43, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pro_free_orders`
--

CREATE TABLE `pro_free_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `delivery_time` int(11) DEFAULT NULL,
  `freelancer_type` int(11) NOT NULL COMMENT '0:freelancer,1:pro',
  `freelancer_id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL COMMENT 'if freelancer_type=0 then free_project_proposal, =1 then pro_job_proposal',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0:still_not_complete,1:complete,2:revision,3:pay_pending,4:dispute',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pro_free_orders`
--

INSERT INTO `pro_free_orders` (`id`, `customer_id`, `price`, `delivery_time`, `freelancer_type`, `freelancer_id`, `proposal_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 44, 33, 12, 0, 41, 1, NULL, 4, '2019-05-08 19:46:50', '2019-05-10 04:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `pro_project_proposals`
--

CREATE TABLE `pro_project_proposals` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'proposal_sender/ user_id',
  `gig_id` int(11) DEFAULT NULL,
  `job_id` int(11) NOT NULL,
  `delivery_time` int(11) NOT NULL,
  `price` double NOT NULL,
  `cv_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0:not_accepted, 1:accepted,2:denied',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active, 2=Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Graduate', 1, '2019-01-04 19:23:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL COMMENT '0:chore,1:freelancer_gig,2:pro_gig,3:person',
  `item_type` int(11) NOT NULL COMMENT 'i.e:chore/gig/persons',
  `number` double NOT NULL DEFAULT '0' COMMENT 'points of review',
  `giver_id` int(11) NOT NULL COMMENT 'user_id',
  `giver_type` int(11) NOT NULL COMMENT 'user_type..0:common_user,1:user',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `giver_num` double DEFAULT NULL COMMENT 'given_num_by that giver'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `item_id`, `item_type`, `number`, `giver_id`, `giver_type`, `comment`, `created_at`, `updated_at`, `giver_num`) VALUES
(1, 41, 3, 3, 44, 1, 'loreum istpam loreum istpam loreum istpam loreum istpam loreum istpam ', '2019-05-04 18:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` tinyint(4) DEFAULT NULL COMMENT 'Always insert month',
  `experience` tinyint(4) DEFAULT NULL,
  `end_date` date NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '3' COMMENT '1=Fulltime, 2=Part-time,3=Free',
  `location_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active, 2=Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '0:chore,1:admin,2:customer,3:freelancer,4:Pro,5:jobseeker,6:service'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `status`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Html', 1, NULL, NULL, 3),
(2, 'CSS', 1, NULL, NULL, 3),
(3, 'Javascript', 1, NULL, NULL, 3),
(4, 'Laravel', 1, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `skill_details`
--

CREATE TABLE `skill_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_id` int(11) NOT NULL DEFAULT '-10' COMMENT '-10 means->not item',
  `item_type` int(11) DEFAULT NULL COMMENT ' 0: Project, 1: Job '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill_details`
--

INSERT INTO `skill_details` (`id`, `user_id`, `skill_id`, `percentage`, `created_at`, `updated_at`, `item_id`, `item_type`) VALUES
(1, 4, 1, 95, '2019-01-07 18:51:40', NULL, -10, NULL),
(2, 24, 2, 90, '2019-01-18 15:13:41', '2019-01-18 15:13:41', -10, NULL),
(3, 26, 2, 90, '2019-01-18 15:19:30', '2019-01-18 15:19:30', -10, NULL),
(4, 27, 1, 80, '2019-01-18 15:20:56', '2019-01-18 15:20:56', -10, NULL),
(5, 27, 2, 90, '2019-01-18 15:20:56', '2019-01-18 15:20:56', -10, NULL),
(6, 29, 1, 80, '2019-01-19 10:40:11', '2019-01-19 10:40:11', -10, NULL),
(12, 41, 2, 90, '2019-04-29 11:14:28', '2019-04-29 11:14:28', -10, NULL),
(13, 41, 1, 90, '2019-04-29 11:14:28', '2019-04-29 11:14:28', -10, NULL),
(14, 41, 3, 90, '2019-04-29 11:14:28', '2019-04-29 11:14:28', -10, NULL),
(15, 41, 1, 90, '2019-04-29 11:14:28', '2019-04-29 11:14:28', -10, NULL),
(16, 41, 4, 90, '2019-04-29 11:14:29', '2019-04-29 11:14:29', -10, NULL),
(17, 41, 3, 90, '2019-04-29 11:47:51', '2019-04-29 11:47:51', -10, NULL),
(18, 41, 1, 90, '2019-04-29 11:47:51', '2019-04-29 11:47:51', -10, NULL),
(19, 41, 2, 90, '2019-04-29 11:47:51', '2019-04-29 11:47:51', -10, NULL),
(20, 41, 1, 90, '2019-04-29 11:47:51', '2019-04-29 11:47:51', -10, NULL),
(21, 41, 4, 90, '2019-04-29 11:47:51', '2019-04-29 11:47:51', -10, NULL),
(22, 42, -100, 90, '2019-04-29 12:19:51', '2019-04-29 12:19:51', -10, NULL),
(23, 42, -100, 90, '2019-04-29 12:19:51', '2019-04-29 12:19:51', -10, NULL),
(24, 42, -100, 90, '2019-04-29 12:19:51', '2019-04-29 12:19:51', -10, NULL),
(25, 42, -100, 90, '2019-04-29 12:19:51', '2019-04-29 12:19:51', -10, NULL),
(26, 42, -100, 90, '2019-04-29 12:19:51', '2019-04-29 12:19:51', -10, NULL),
(27, 41, 3, 88, '2019-04-30 09:19:06', '2019-04-30 09:19:06', -10, NULL),
(28, 41, 4, 90, '2019-04-30 11:32:53', '2019-04-30 11:32:53', -10, NULL),
(29, 41, -100, 90, '2019-04-30 11:32:53', '2019-04-30 11:32:53', -10, NULL),
(30, 41, 4, 90, '2019-04-30 11:32:54', '2019-04-30 11:32:54', -10, NULL),
(31, 41, 2, 90, '2019-04-30 11:32:54', '2019-04-30 11:32:54', -10, NULL),
(32, 41, 3, 90, '2019-04-30 11:32:54', '2019-04-30 11:32:54', -10, NULL),
(33, -10, 0, 0, '2019-05-04 13:32:59', '2019-05-04 13:32:59', 1, 1),
(34, -10, 0, 0, '2019-05-04 13:32:59', '2019-05-04 13:32:59', 1, 1),
(35, -10, 0, 0, '2019-05-04 13:32:59', '2019-05-04 13:32:59', 1, 1),
(36, -10, 0, 0, '2019-05-04 13:32:59', '2019-05-04 13:32:59', 1, 1),
(37, -10, 0, 0, '2019-05-04 13:32:59', '2019-05-04 13:32:59', 1, 1),
(38, -10, 0, 0, '2019-05-05 11:40:06', '2019-05-05 11:40:06', 2, 1),
(39, -10, 0, 0, '2019-05-05 11:40:06', '2019-05-05 11:40:06', 2, 1),
(40, -10, 0, 0, '2019-05-05 11:40:06', '2019-05-05 11:40:06', 2, 1),
(41, -10, 0, 0, '2019-05-05 11:40:06', '2019-05-05 11:40:06', 2, 1),
(42, -10, 0, 0, '2019-05-05 11:40:06', '2019-05-05 11:40:06', 2, 1),
(43, -10, 0, 0, '2019-05-05 12:28:09', '2019-05-05 12:28:09', 3, 1),
(44, -10, 3, 0, '2019-05-05 12:28:09', '2019-05-05 12:28:09', 3, 1),
(45, -10, 3, 0, '2019-05-05 12:28:09', '2019-05-05 12:28:09', 3, 1),
(46, -10, 4, 0, '2019-05-05 12:28:09', '2019-05-05 12:28:09', 3, 1),
(47, -10, 2, 0, '2019-05-05 12:28:09', '2019-05-05 12:28:09', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slags`
--

CREATE TABLE `slags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL COMMENT '0:chore,1:admin,2:customer,3:freelancer,4:Pro,5:jobseeker,6:service',
  `item_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT '2' COMMENT '1:web_gurar,2:admin_guard'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `user_id`, `name`, `url`, `created_at`, `updated_at`, `user_type`) VALUES
(1, 4, 'facebook', 'https://www.facebook.com/', '2019-01-07 18:52:16', NULL, 2),
(2, 41, 'facebook', 'facebook.com/abusalehmatul', '2019-05-05 15:47:35', '2019-05-05 15:47:35', 2),
(3, 41, 'google', 'google.com/abusaleh', '2019-05-05 15:50:02', '2019-05-05 15:50:02', 2),
(4, 41, 'twitter', 'twitter.com/abu', '2019-05-05 15:54:32', '2019-05-05 15:54:32', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(11) NOT NULL,
  `created_by_ip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_by_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tem_users_1`
--

CREATE TABLE `tem_users_1` (
  `id` int(10) UNSIGNED NOT NULL,
  `verify_code` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1=send,2=Not send',
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1=Verify,2=Not Verify',
  `created_by_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tem_users_1`
--

INSERT INTO `tem_users_1` (`id`, `verify_code`, `name`, `email`, `email_status`, `status`, `created_by_ip`, `updated_by_ip`, `created_at`, `updated_at`) VALUES
(2, 239164, 'Shahaj', 'shahaj2@local.com', 2, 1, '127.0.0.1', '127.0.0.1', '2018-12-17 23:49:43', '2018-12-17 23:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT '3' COMMENT '1=Admin,2=Customer,3=Feelancer,4=Pro,5=Job seeker,6=Company',
  `user_sub_type` tinyint(4) DEFAULT NULL COMMENT '1=Company,2=Individual',
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1=Active,2=Inactive,3=Suspend',
  `created_by_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `onlineStatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `user_type`, `user_sub_type`, `status`, `created_by_ip`, `updated_by_ip`, `remember_token`, `created_at`, `updated_at`, `avatar`, `utc`, `onlineStatus`) VALUES
(1, 'Admin', '', '01913019820', '$2y$10$uFoSNY1nvPYloICbc4qj8u6INfvAvYFrQJZUduCSgK5C6tfajpWk2', 1, NULL, 1, NULL, '127.0.0.1', 'mRvh5Hixw1fLq8fsmrDoRvS1wR4PGzWfvbv5nKmBOqVDLQQT4gdiT8sF1BEE', '2018-12-17 23:43:42', '2018-12-29 06:16:27', NULL, NULL, NULL),
(38, 'Abu Saleh Matul', 'matul@yahoo.com', '123456789', '$2y$10$N/kYyMVkYWN60beQE6PsluLuP3sWx8FkG.MbZI21nkmU/U3JQZY0.', 5, NULL, 1, '127.0.0.1', NULL, 'OFtBG0NkT5MGu1SI1xQ4OccOuqvWbVTbFtO3mc7V76MwiNWt2jCBYCtAHtw5', NULL, NULL, NULL, NULL, NULL),
(41, 'Abu Saleh Matul', 'matul@yahoo.com', '123456789', '$2y$10$O/uaHDV70KyQYtItVUid5O/q0f9t11YNFNy7kvL6g8T4zohS9Wsfi', 3, NULL, 1, '127.0.0.1', NULL, 'b040Nvb7Zm1hTya3TIn3Aul0cSciauZq66FHVSdlCan3JLYhxUCFotPn8Eh2', NULL, NULL, NULL, '-360', NULL),
(43, 'Abu Saleh Matul', 'matul@yahoo.com', '123456789', '$2y$10$eUTXXQzLPJAHfXgO1LuS1.j3qyt3pw.5E8c4oxXd1J2.cVZEfzyqS', 4, NULL, 1, '127.0.0.1', NULL, 'ueyIvqk9XG2QS0PADAwYz1jphKKNKyAXiHPohKv35xIOf4HGFLLWt3zyvINT', NULL, NULL, NULL, NULL, NULL),
(44, 'Abu Saleh Matul', 'matul@yahoo.com', '123456789', '$2y$10$db15f8.RRpddDbn/9cIKJOcyul5YZCyNfTNMgWhEXJWkihp73oww.', 2, NULL, 1, '127.0.0.1', NULL, 'o0WZ6dkD0IEUjFcKI9eDj8Jx3PbQ6hCYyWFaq3jh1sDBNMsF2fx2vRv3ILAB', '2019-04-30 17:03:43', NULL, NULL, '-360', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_company_categories_1`
--

CREATE TABLE `user_company_categories_1` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active,2=InActive',
  `created_by_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_company_categories_1`
--

INSERT INTO `user_company_categories_1` (`id`, `name`, `status`, `created_by_ip`, `updated_by_ip`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_company_types_1`
--

CREATE TABLE `user_company_types_1` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active,2=InActive',
  `created_by_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_company_types_1`
--

INSERT INTO `user_company_types_1` (`id`, `name`, `status`, `created_by_ip`, `updated_by_ip`, `created_at`, `updated_at`) VALUES
(1, 'IT Enable', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL COMMENT 'Users primary ID',
  `hourly_rate` int(11) DEFAULT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `gender` tinyint(4) DEFAULT NULL COMMENT '1=Male,2=Female',
  `skill_ids` text COLLATE utf8mb4_unicode_ci,
  `physical_add` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_line` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_type` tinyint(4) DEFAULT NULL COMMENT 'User_company_typies primary ID',
  `company_category` tinyint(4) DEFAULT NULL COMMENT 'User_company_categories primary ID',
  `company_des` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `is_available` tinyint(4) DEFAULT '1' COMMENT '1=Available, 2= Offline',
  `is_verified` tinyint(4) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `hourly_rate`, `designation`, `note`, `gender`, `skill_ids`, `physical_add`, `company_name`, `tag_line`, `company_type`, `company_category`, `company_des`, `rating`, `is_available`, `is_verified`, `location`, `country`, `created_at`, `updated_at`) VALUES
(1, 1, 100, 'Web developer', 'Test note', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2018-12-17 23:43:42', NULL),
(2, 2, 20, 'Web developer', 'Test note', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 1, 1, 1, '2018-12-17 23:43:42', NULL),
(3, 4, 20, 'Web developer', 'Test note', 2, '[1,2,3]', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, 1, 1, '2018-12-17 23:43:42', NULL),
(4, 5, 20, 'Web developer', 'Test note', 2, '[1,2,3,4]', NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, 1, 2, '2018-12-17 23:43:42', NULL),
(5, 7, 20, 'Web developer', 'Test note', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, NULL, 1, 2, '2018-12-17 23:43:42', NULL),
(6, 8, 20, 'Web developer', 'Test note', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, NULL, 1, 2, '2019-01-19 10:40:11', NULL),
(7, 9, 20, 'Web developer', 'Test note', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, NULL, 1, 2, '2019-01-19 10:40:11', NULL),
(8, 11, 20, 'Web developer', 'Test note', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, NULL, 1, 2, '2019-01-19 10:40:11', NULL),
(9, 12, 20, 'Web developer', 'Test note', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, NULL, 1, 2, '2019-01-19 10:40:11', NULL),
(10, 13, 20, 'Web developer', 'Test note', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, NULL, 1, 2, '2019-01-19 10:40:11', NULL),
(11, 14, 20, 'Web developer', 'Test note', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, NULL, 1, 2, '2019-01-19 10:40:11', NULL),
(12, 15, 20, 'Web developer', 'Test note', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, NULL, 1, 2, '2019-01-19 10:40:11', NULL),
(20, 24, NULL, 'Web developer', 'abc', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2019-01-18 15:13:41', NULL),
(21, 26, NULL, 'Web developer', 'abc', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2019-01-18 15:19:30', NULL),
(22, 27, NULL, 'Web developer', 'abc', NULL, '[\"1\",\"2\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2019-01-18 15:20:56', NULL),
(24, 29, NULL, 'Web developer', 'a', NULL, '[\"1\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2019-01-19 10:40:11', NULL),
(27, 32, NULL, 'asdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2019-01-19 10:40:11', NULL),
(29, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2019-01-19 10:40:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_type` int(11) NOT NULL COMMENT 'i.e:chore/gig',
  `item_id` int(11) NOT NULL COMMENT '0:chore,1:freelancer_gig,2:pro_gig',
  `viewer_id` int(11) NOT NULL COMMENT 'user_id',
  `viewer_type` int(11) NOT NULL COMMENT 'all_user/user..0:common_user,1:user',
  `view` int(11) NOT NULL DEFAULT '0' COMMENT 'number of view',
  `scale_factor` int(11) DEFAULT NULL COMMENT 'function value that maintain scale for same user view',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL COMMENT '1:chore,2:service',
  `user_id` int(11) NOT NULL,
  `ChoSer_id` int(11) NOT NULL COMMENT 'chore/service_id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `type`, `user_id`, `ChoSer_id`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 7, '2019-04-26 03:18:26', '2019-04-26 03:18:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_users`
--
ALTER TABLE `all_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `all_users_email_unique` (`email`);

--
-- Indexes for table `applies`
--
ALTER TABLE `applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_scholarships`
--
ALTER TABLE `apply_scholarships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatmessages`
--
ALTER TABLE `chatmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatrooms`
--
ALTER TABLE `chatrooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chatrooms_chatroomid_unique` (`chatRoomId`);

--
-- Indexes for table `chores`
--
ALTER TABLE `chores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chore_categories`
--
ALTER TABLE `chore_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chore_proposals`
--
ALTER TABLE `chore_proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_order_reports`
--
ALTER TABLE `freelancer_order_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_project_proposals`
--
ALTER TABLE `freelancer_project_proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gigs`
--
ALTER TABLE `gigs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_tags`
--
ALTER TABLE `level_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pros`
--
ALTER TABLE `pros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_free_orders`
--
ALTER TABLE `pro_free_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_project_proposals`
--
ALTER TABLE `pro_project_proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_details`
--
ALTER TABLE `skill_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slags`
--
ALTER TABLE `slags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tem_users_1`
--
ALTER TABLE `tem_users_1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tem_users_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_company_categories_1`
--
ALTER TABLE `user_company_categories_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_company_types_1`
--
ALTER TABLE `user_company_types_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_users`
--
ALTER TABLE `all_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applies`
--
ALTER TABLE `applies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apply_scholarships`
--
ALTER TABLE `apply_scholarships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chatmessages`
--
ALTER TABLE `chatmessages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chatrooms`
--
ALTER TABLE `chatrooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chores`
--
ALTER TABLE `chores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chore_categories`
--
ALTER TABLE `chore_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chore_proposals`
--
ALTER TABLE `chore_proposals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freelancers`
--
ALTER TABLE `freelancers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancer_order_reports`
--
ALTER TABLE `freelancer_order_reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancer_project_proposals`
--
ALTER TABLE `freelancer_project_proposals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gigs`
--
ALTER TABLE `gigs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level_tags`
--
ALTER TABLE `level_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pros`
--
ALTER TABLE `pros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pro_free_orders`
--
ALTER TABLE `pro_free_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pro_project_proposals`
--
ALTER TABLE `pro_project_proposals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skill_details`
--
ALTER TABLE `skill_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `slags`
--
ALTER TABLE `slags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tem_users_1`
--
ALTER TABLE `tem_users_1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_company_categories_1`
--
ALTER TABLE `user_company_categories_1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_company_types_1`
--
ALTER TABLE `user_company_types_1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
