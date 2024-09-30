-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 03:33 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocgcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinment_master`
--

CREATE TABLE `appoinment_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(0) NOT NULL,
  `appoinment_mas_key` int(11) NOT NULL,
  `student_key` int(11) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approve_status` int(11) DEFAULT NULL,
  `appinment_date` date DEFAULT NULL,
  `appoinment_time` varchar(50) DEFAULT NULL,
  `approve_person_key` int(11) DEFAULT NULL,
  `approve_dtetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `business_loan_master`
--

CREATE TABLE `business_loan_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `business_loan_master_key` int(11) NOT NULL,
  `programme_dte` date NOT NULL,
  `message` varchar(1000) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coursetype_master`
--

CREATE TABLE `coursetype_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `coursetype_mas_key` int(11) NOT NULL,
  `coursetype_nme` varchar(300) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursetype_master`
--

INSERT INTO `coursetype_master` (`finact`, `status`, `coursetype_mas_key`, `coursetype_nme`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 'NVQ', '2023-09-13 19:20:19', 1),
(1, 'A', 2, 'Diploma', '2023-09-13 19:20:36', 1),
(0, 'A', 3, 'Non NVQ', '2023-12-03 20:47:25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `course_batch_details`
--

CREATE TABLE `course_batch_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `course_batch_details_key` int(11) NOT NULL,
  `course_key` int(11) NOT NULL,
  `batch_nme` varchar(1500) NOT NULL,
  `batchapplyclose_status` int(11) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL,
  `inform_type` varchar(500) DEFAULT NULL,
  `interview_testdte` date DEFAULT NULL,
  `inform_message` varchar(1000) DEFAULT NULL,
  `inform_person` int(11) DEFAULT NULL,
  `inform_sysenterdte` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_careerpath_details`
--

CREATE TABLE `course_careerpath_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `coursecareerpathdetail_key` int(11) NOT NULL,
  `course_key` int(11) NOT NULL,
  `career_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_careerpath_details`
--

INSERT INTO `course_careerpath_details` (`finact`, `status`, `coursecareerpathdetail_key`, `course_key`, `career_key`) VALUES
(1, 'A', 1, 16, 1),
(0, 'A', 3, 16, 18),
(0, 'A', 4, 16, 8),
(0, 'A', 5, 26, 3),
(0, 'A', 6, 26, 10),
(0, 'A', 7, 26, 12),
(0, 'A', 8, 22, 5),
(0, 'A', 9, 22, 16),
(0, 'A', 10, 24, 2),
(0, 'A', 11, 24, 3),
(0, 'A', 12, 25, 9),
(0, 'A', 13, 19, 2),
(0, 'A', 14, 19, 3),
(0, 'A', 15, 19, 10),
(0, 'A', 16, 19, 9),
(0, 'A', 17, 19, 1),
(0, 'A', 18, 12, 8),
(0, 'A', 19, 14, 17),
(0, 'A', 20, 10, 13),
(0, 'A', 21, 4, 7),
(0, 'A', 22, 4, 8),
(0, 'A', 23, 13, 17),
(0, 'A', 24, 9, 4),
(0, 'A', 25, 9, 13),
(0, 'A', 26, 7, 6),
(0, 'A', 27, 11, 14),
(0, 'A', 28, 23, 1),
(0, 'A', 29, 6, 11),
(0, 'A', 30, 16, 13);

-- --------------------------------------------------------

--
-- Table structure for table `course_level_master`
--

CREATE TABLE `course_level_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `courselevelmas_key` int(11) NOT NULL,
  `course_level` varchar(300) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_level_master`
--

INSERT INTO `course_level_master` (`finact`, `status`, `courselevelmas_key`, `course_level`, `sys_enterdte`, `act_person`) VALUES
(1, 'A', 1, 'NVQ 1', '2023-09-13 19:36:39', 1),
(1, 'A', 2, 'NVQ 2', '2023-09-13 19:36:49', 1),
(0, 'A', 3, 'NVQ 3', '2023-09-13 19:36:59', 1),
(1, 'A', 4, 'jjj', '2023-09-23 12:54:07', 1),
(1, 'A', 5, 'NVQ4', '2023-12-03 20:47:55', 2),
(0, 'A', 6, 'NVQ 4', '2023-12-03 20:49:26', 2),
(0, 'A', 7, 'NVQ 5', '2023-12-03 20:50:05', 2),
(0, 'A', 8, 'NVQ 6', '2023-12-03 20:50:26', 2),
(0, 'A', 9, 'NVQ 7', '2024-03-01 16:09:30', 2);

-- --------------------------------------------------------

--
-- Table structure for table `course_master`
--

CREATE TABLE `course_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `coursemas_key` int(11) NOT NULL,
  `coursetype_key` int(11) NOT NULL,
  `course_type` varchar(300) NOT NULL,
  `courselevel_key` int(11) DEFAULT NULL,
  `course_level` varchar(300) DEFAULT NULL,
  `course_nme` varchar(300) NOT NULL,
  `test1_areamas_key` int(11) DEFAULT NULL,
  `test1_areamas_name` varchar(300) DEFAULT NULL,
  `test2_areamas_key` int(11) DEFAULT NULL,
  `test2_areamas_name` varchar(11) DEFAULT NULL,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_master`
--

INSERT INTO `course_master` (`finact`, `status`, `coursemas_key`, `coursetype_key`, `course_type`, `courselevel_key`, `course_level`, `course_nme`, `test1_areamas_key`, `test1_areamas_name`, `test2_areamas_key`, `test2_areamas_name`, `act_person`) VALUES
(0, 'A', 3, 3, 'NVQ', 6, 'NVQ 4', 'National Certificate in Engineering Craft Practice(Industrial Electrician)', 2, 'Practical', 2, 'I', 2),
(0, 'A', 4, 1, 'NVQ', 6, 'NVQ 4', 'National Certificate in Engineering Craft Practice(Gas & Arc Welder)', 2, 'Practical', 1, 'R', 2),
(0, 'A', 5, 1, 'NVQ', 6, 'NVQ 4', 'National Certificate in Engineering Craft Practice(Motor Vehicle Mechanics)', 2, 'Practical', 1, 'R', 2),
(0, 'A', 6, 1, 'NVQ', 3, 'NVQ 3', 'Wood craftman', 2, 'Practical', 1, 'R', 2),
(0, 'A', 7, 1, 'NVQ', 6, 'NVQ 4', 'Plumber', 2, 'Practical', 1, 'R', 2),
(0, 'A', 8, 1, 'NVQ', 6, 'NVQ 4', 'Automobile Air Conditioning Mechanics', 2, 'Practical', 1, 'R', 2),
(0, 'A', 9, 1, 'NVQ', 6, 'NVQ 4', 'National Certificate in Engineering Draughtsmanship', 3, 'Science', 1, 'R', 2),
(0, 'A', 10, 1, 'NVQ', 6, 'NVQ 4', 'National Certificate for Construction Site Supervisor', 2, 'Practical', 1, 'R', 2),
(0, 'A', 11, 1, 'NVQ', 6, 'NVQ 4', 'Refrigeration & Air Conditioning Technician', 2, 'Practical', 1, 'R', 2),
(0, 'A', 12, 1, 'NVQ', 6, 'NVQ 4', 'Machinist', 2, 'Practical', 1, 'R', 2),
(0, 'A', 13, 1, 'NVQ', 6, 'NVQ 4', 'Threewheeler Mechanics', 2, 'Practical', 1, 'R', 2),
(0, 'A', 14, 1, 'NVQ', 3, 'NVQ 3', 'Motor Cycle Mechanic', 2, 'Practical', 1, 'R', 2),
(0, 'A', 15, 1, 'NVQ', 6, 'NVQ 4', 'Field Assistant (Agriculture)', 1, 'Outdoor', 1, 'R', 2),
(0, 'A', 16, 1, 'NVQ', 6, 'NVQ 4', 'Aluminium Fabricator', 6, 'Office', 1, 'R', 2),
(0, 'A', 17, 1, 'NVQ', 3, 'NVQ 3', 'Footwear Craftsman', 4, 'Design', 3, 'A', 2),
(0, 'A', 18, 1, 'NVQ', 6, 'NVQ 4', 'Computer Hardware Technician', 2, 'Practical', 2, 'I', 2),
(0, 'A', 19, 1, 'NVQ', 6, 'NVQ 4', 'Information And Communication Technology Technician', 2, 'Practical', 2, 'I', 2),
(0, 'A', 20, 1, 'NVQ', 7, 'NVQ 5', 'Diploma in Maritime & Logistics Management', 5, 'Business', 5, 'E', 2),
(0, 'A', 22, 1, 'NVQ', 7, 'NVQ 5', 'Diploma in Agriculture Production Technology', 1, 'Outdoor', 2, 'Inquisitive', 2),
(0, 'A', 23, 1, 'NVQ', 6, 'NVQ 4', 'Web Developer', 2, 'Practical', 2, 'I', 2),
(0, 'A', 24, 1, 'NVQ', 6, 'NVQ 4', 'Graphics Designer', 4, 'Design', 3, 'Artistic', 2),
(0, 'A', 25, 1, 'NVQ', 7, 'NVQ 5', 'ICT Diploma', 2, 'Practical', 2, 'Inquisitive', 2),
(0, 'A', 26, 1, 'NVQ', 6, 'NVQ 4', 'ICT Technician-Part Time', 2, 'Practical', 2, 'Inquisitive', 2),
(0, 'A', 27, 1, 'NVQ', 6, 'NVQ 4', 'Speical English Course', NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `course_qualification_details`
--

CREATE TABLE `course_qualification_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `coursequalification_key` int(11) NOT NULL,
  `course_key` int(11) NOT NULL,
  `exam_key` int(11) NOT NULL,
  `examsubject_mas_key` int(11) NOT NULL,
  `creditpoint_key` int(11) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `creditpoint_master`
--

CREATE TABLE `creditpoint_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `creditpointmas_key` int(11) NOT NULL,
  `cedit_name` varchar(10) NOT NULL,
  `credit_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creditpoint_master`
--

INSERT INTO `creditpoint_master` (`finact`, `status`, `creditpointmas_key`, `cedit_name`, `credit_point`) VALUES
(0, 'A', 1, 'A', 4),
(0, 'A', 2, 'B', 3),
(0, 'A', 3, 'C', 2),
(0, 'A', 4, 'S', 1),
(0, 'A', 5, 'W', 0);

-- --------------------------------------------------------

--
-- Table structure for table `examsubject_master`
--

CREATE TABLE `examsubject_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `examsubjectmas_key` int(11) NOT NULL,
  `exammas_key` int(11) NOT NULL,
  `exam_name` varchar(150) NOT NULL,
  `stream` varchar(100) DEFAULT NULL,
  `subject_name` varchar(150) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examsubject_master`
--

INSERT INTO `examsubject_master` (`finact`, `status`, `examsubjectmas_key`, `exammas_key`, `exam_name`, `stream`, `subject_name`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 1, 'G.C.E O/L', '', 'Sinhala', '2023-09-01 14:26:14', 1),
(0, 'A', 2, 1, 'G.C.E O/L', '', 'English', '2023-09-01 14:26:44', 1),
(0, 'A', 3, 1, 'G.C.E O/L', '', 'Maths', '2023-09-01 14:37:44', 1),
(0, 'A', 4, 1, 'G.C.E O/L', '', 'Science', '2023-09-01 14:37:52', 1),
(0, 'A', 5, 3, 'Passesd Grade 9', '', 'all', '2023-12-03 21:03:10', 2),
(1, 'A', 6, 1, 'G.C.E O/L', '', 'any other', '2023-12-12 12:48:11', 2),
(0, 'A', 7, 4, 'G.C.E. A/L', 'Physical Science', 'Comine Maths', '2023-12-12 12:50:48', 2),
(0, 'A', 8, 4, 'G.C.E. A/L', 'Physical Science', 'Chemistry', '2023-12-12 12:51:00', 2),
(0, 'A', 9, 4, 'G.C.E. A/L', 'Physical Science', 'Physics', '2023-12-12 12:51:11', 2),
(0, 'A', 10, 4, 'G.C.E. A/L', 'Physical Science', 'IT', '2023-12-12 12:51:24', 2),
(0, 'A', 11, 4, 'G.C.E. A/L', 'Physical Science', 'any other', '2023-12-12 12:51:47', 2),
(0, 'A', 12, 5, 'G.C.E. A/L', 'Bio Science', 'Biology', '2023-12-12 12:52:34', 2),
(0, 'A', 13, 5, 'G.C.E. A/L', 'Bio Science', 'Chemistry', '2023-12-12 12:52:50', 2),
(0, 'A', 14, 5, 'G.C.E. A/L', 'Bio Science', 'Physics', '2023-12-12 12:53:01', 2),
(0, 'A', 15, 5, 'G.C.E. A/L', 'Bio Science', 'Agriculture', '2023-12-12 12:53:16', 2),
(0, 'A', 16, 5, 'G.C.E. A/L', 'Bio Science', 'any other', '2023-12-12 12:53:31', 2),
(0, 'A', 17, 6, 'G.C.E. A/L', 'Commerce', 'Accounts', '2023-12-12 14:07:14', 2),
(0, 'A', 18, 6, 'G.C.E. A/L', 'Commerce', 'Economics', '2023-12-12 14:07:24', 2),
(0, 'A', 19, 6, 'G.C.E. A/L', 'Commerce', 'Statiscics', '2023-12-12 14:07:35', 2),
(0, 'A', 20, 6, 'G.C.E. A/L', 'Commerce', 'Business Studies', '2023-12-12 14:07:54', 2),
(0, 'A', 21, 6, 'G.C.E. A/L', 'Commerce', 'IT', '2023-12-12 14:08:01', 2),
(0, 'A', 22, 6, 'G.C.E. A/L', 'Commerce', 'Logic', '2023-12-12 14:08:11', 2),
(0, 'A', 23, 7, 'NVQ 3', '', 'ICT', '2024-03-01 15:54:41', 2),
(1, 'A', 24, 5, 'G.C.E. A/L', 'Bio Science', 'Abc', '2024-03-16 16:30:20', 2),
(0, 'A', 25, 1, 'G.C.E O/L', '', 'IT', '2024-03-30 00:18:34', 2),
(0, 'A', 26, 1, 'G.C.E O/L', '', 'Commerce', '2024-03-30 13:25:13', 2),
(0, 'A', 27, 1, 'G.C.E O/L', '', 'Music', '2024-03-30 13:25:47', 2);

-- --------------------------------------------------------

--
-- Table structure for table `exam_master`
--

CREATE TABLE `exam_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `exammas_key` int(11) NOT NULL,
  `exam_name` varchar(500) NOT NULL,
  `stream` varchar(150) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_master`
--

INSERT INTO `exam_master` (`finact`, `status`, `exammas_key`, `exam_name`, `stream`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 'G.C.E O/L', '', '2023-09-01 13:41:14', 1),
(0, 'A', 2, '', '', '2023-10-19 15:06:19', 21),
(0, 'A', 3, 'Passesd Grade 9', '', '2023-12-03 21:02:39', 2),
(0, 'A', 4, 'G.C.E. A/L', 'Physical Science', '2023-12-12 12:50:25', 2),
(0, 'A', 5, 'G.C.E. A/L', 'Bio Science', '2023-12-12 12:52:21', 2),
(0, 'A', 6, 'G.C.E. A/L', 'Commerce', '2023-12-12 14:06:54', 2),
(0, 'A', 7, 'NVQ 3', '', '2024-03-01 15:53:01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `job_master`
--

CREATE TABLE `job_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `jobmas_key` int(11) NOT NULL,
  `jobname` varchar(500) NOT NULL,
  `sysenterdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_master`
--

INSERT INTO `job_master` (`finact`, `status`, `jobmas_key`, `jobname`, `sysenterdate`) VALUES
(0, 'A', 1, 'Web Designer', '2024-03-29 13:39:42'),
(0, 'A', 2, 'Graphic Designer', '2024-03-29 13:40:03'),
(0, 'A', 3, 'Computer Operater', '2024-03-29 13:40:23'),
(0, 'A', 4, 'Draughtman', '2024-03-29 13:41:08'),
(0, 'A', 5, 'Field Assistant', '2024-03-29 13:41:44'),
(0, 'A', 6, 'Plumber', '2024-03-29 13:41:57'),
(0, 'A', 7, 'Welder', '2024-03-29 13:42:09'),
(0, 'A', 8, 'Fitter', '2024-03-29 13:42:18'),
(0, 'A', 9, 'Software Engineer', '2024-03-29 13:42:35'),
(0, 'A', 10, 'Data Entry Operator', '2024-03-29 13:42:58'),
(0, 'A', 11, 'Wood Caraftman', '2024-03-29 13:43:31'),
(0, 'A', 12, 'Hardware Technician', '2024-03-29 13:43:50'),
(0, 'A', 13, 'Supervisor', '2024-03-29 13:44:44'),
(0, 'A', 14, 'Air condition Technician', '2024-03-29 13:45:28'),
(0, 'A', 15, 'Quantity Surveyor', '2024-03-29 13:46:16'),
(0, 'A', 16, 'Fram Supervisor', '2024-03-29 13:46:56'),
(0, 'A', 17, 'Motorcycle mechanics', '2024-03-29 13:47:23'),
(0, 'A', 18, 'Aluminium Fabricator', '2024-03-29 14:11:38'),
(0, 'A', 19, 'Supply Chain Manager', '2024-03-30 06:35:12'),
(0, 'A', 20, 'Logistic Manager', '2024-03-30 06:35:25'),
(0, 'A', 21, 'Footware Desingner', '2024-03-30 06:38:10'),
(0, 'A', 22, 'Farm Worker', '2024-03-30 06:40:56'),
(0, 'A', 23, 'Grower', '2024-03-30 06:41:21'),
(0, 'A', 24, 'Ware House Manager', '2024-03-30 06:42:06'),
(0, 'A', 25, 'Motor Mechanics', '2024-03-30 06:42:21'),
(0, 'A', 26, 'Agriculture Research Assistant', '2024-03-30 06:44:45'),
(0, 'A', 27, 'Electrician', '2024-03-30 06:45:41'),
(0, 'A', 28, 'Domestic Electrical Equipment Mechanics', '2024-03-30 06:46:40'),
(0, 'A', 29, 'UI/UX Designer', '2024-03-30 06:47:13'),
(0, 'A', 30, 'Photo Editor', '2024-03-30 06:47:32'),
(0, 'A', 31, 'Typesetter', '2024-03-30 06:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `student_businessloan_details`
--

CREATE TABLE `student_businessloan_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `student_businessloan_details_key` int(11) NOT NULL,
  `student_key` int(11) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `inform_status` int(11) DEFAULT NULL,
  `businessloanmas_key` int(11) DEFAULT NULL,
  `programme_dte` date DEFAULT NULL,
  `inform_message` varchar(1000) DEFAULT NULL,
  `inform_datetime` datetime DEFAULT NULL,
  `inform_person` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_course_details`
--

CREATE TABLE `student_course_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `studentcoursedetail_key` int(11) NOT NULL,
  `student_key` int(11) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `course_key` int(11) NOT NULL,
  `coursebatch_detail_key` int(11) NOT NULL,
  `batch` varchar(500) NOT NULL,
  `complete_status` varchar(300) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_exam_details`
--

CREATE TABLE `student_exam_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `student_exam_key` int(11) NOT NULL,
  `student_key` int(11) NOT NULL,
  `exam_key` int(11) NOT NULL,
  `sitting_year` varchar(10) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `studentmas_key` int(11) NOT NULL,
  `student_nme` varchar(150) NOT NULL,
  `student_addr` varchar(500) NOT NULL,
  `date_of_birth` date NOT NULL,
  `nic_no` varchar(15) DEFAULT NULL,
  `user_nme` varchar(150) NOT NULL,
  `password` varchar(500) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_newselected_course_details`
--

CREATE TABLE `student_newselected_course_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `student_newselected_course_details_key` int(11) NOT NULL,
  `student_key` int(11) NOT NULL,
  `course_key` int(11) NOT NULL,
  `student_testmas_key` int(11) NOT NULL,
  `test_type` varchar(100) NOT NULL,
  `coursebatch_detail_key` int(11) NOT NULL,
  `batch_nme` varchar(500) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `inform_status` int(11) DEFAULT NULL,
  `interview_testdte` date DEFAULT NULL,
  `inform_type` varchar(200) DEFAULT NULL,
  `inform_message` varchar(1000) DEFAULT NULL,
  `inform_datetime` datetime DEFAULT NULL,
  `inform_person` int(11) DEFAULT NULL,
  `register_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_qualification_details`
--

CREATE TABLE `student_qualification_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `studentqualification_key` int(11) NOT NULL,
  `student_key` int(11) NOT NULL,
  `student_exam_details_key` int(11) NOT NULL,
  `examsubject_mas_key` int(11) NOT NULL,
  `creditpoint_key` int(11) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_test01_details`
--

CREATE TABLE `student_test01_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `student_test01_details_key` int(11) NOT NULL,
  `studenttestmas_key` int(11) NOT NULL,
  `student_key` int(11) NOT NULL,
  `test1_questionmgt_mas_key` int(11) NOT NULL,
  `test1questionmas_key` int(11) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_test01_result_details`
--

CREATE TABLE `student_test01_result_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `student_test01_result_details_key` int(11) NOT NULL,
  `studenttestmas_key` int(11) NOT NULL,
  `student_key` int(11) NOT NULL,
  `test1_areamas_key` int(11) NOT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_test02_details`
--

CREATE TABLE `student_test02_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `student_test02_details_key` int(11) NOT NULL,
  `studenttestmas_key` int(11) NOT NULL,
  `student_key` int(11) NOT NULL,
  `test2questionmas_key` int(11) NOT NULL,
  `resuts` int(11) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_test02_result_details`
--

CREATE TABLE `student_test02_result_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `student_test02_result_details_key` int(11) NOT NULL,
  `studenttestmas_key` int(11) NOT NULL,
  `student_key` int(11) NOT NULL,
  `test2_areamas_key` int(11) NOT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_test_master`
--

CREATE TABLE `student_test_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `student_testmas_key` int(11) NOT NULL,
  `test_dte` date NOT NULL,
  `student_key` int(11) NOT NULL,
  `test_type` varchar(100) NOT NULL,
  `complete_status` int(1) DEFAULT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_trainingpoint_master`
--

CREATE TABLE `student_trainingpoint_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `student_trainingpoint_mas_key` int(11) NOT NULL,
  `student_key` int(11) NOT NULL,
  `course_key` int(11) NOT NULL,
  `coursebatch_detail_key` int(11) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approve_status` int(11) DEFAULT NULL,
  `training_point_nme` varchar(700) DEFAULT NULL,
  `training_point_designation` varchar(400) DEFAULT NULL,
  `approve_person_key` int(11) DEFAULT NULL,
  `approve_dte` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test1_area_master`
--

CREATE TABLE `test1_area_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `test1_area_master_key` int(11) NOT NULL,
  `area_name` varchar(500) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test1_area_master`
--

INSERT INTO `test1_area_master` (`finact`, `status`, `test1_area_master_key`, `area_name`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 'Outdoor', '2023-08-31 20:41:15', 1),
(0, 'A', 2, 'Practical', '2023-08-31 20:43:29', 1),
(0, 'A', 3, 'Science', '2023-08-31 20:43:30', 1),
(0, 'A', 4, 'Design', '2023-08-31 20:43:30', 1),
(0, 'A', 5, 'Business', '2023-08-31 20:43:30', 1),
(0, 'A', 6, 'Office', '2023-08-31 20:43:30', 1),
(0, 'A', 7, 'People Relationship', '2023-08-31 20:43:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test1_questionmgt_master`
--

CREATE TABLE `test1_questionmgt_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `test1_questionmgt_mas_key` int(11) NOT NULL,
  `type` varchar(500) NOT NULL,
  `question_a_key` int(11) NOT NULL,
  `question_b_key` int(11) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test1_questionmgt_master`
--

INSERT INTO `test1_questionmgt_master` (`finact`, `status`, `test1_questionmgt_mas_key`, `type`, `question_a_key`, `question_b_key`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 0, 'Job', 17, 18, '2024-05-16 17:29:23', 1),
(0, 'A', 1, 'Job', 1, 2, '2023-10-11 18:43:34', 1),
(0, 'A', 4, 'Job', 7, 8, '2023-10-11 18:45:04', 1),
(0, 'A', 5, 'Job', 9, 10, '2023-10-11 18:45:31', 1),
(0, 'A', 14, 'Job', 27, 28, '2023-10-11 18:53:12', 1),
(0, 'A', 15, 'Job', 31, 32, '2023-10-11 18:54:29', 1),
(0, 'A', 17, 'Job', 35, 36, '2023-10-11 18:57:27', 1),
(0, 'A', 23, 'Course', 46, 47, '2023-10-11 19:00:56', 1),
(0, 'A', 26, 'Course', 52, 53, '2023-10-11 19:02:35', 1),
(0, 'A', 27, 'Course', 54, 55, '2023-10-11 19:03:08', 1),
(0, 'A', 30, 'Course', 60, 61, '2023-10-11 19:04:27', 1),
(0, 'A', 33, 'Course', 64, 65, '2023-10-11 19:06:13', 1),
(0, 'A', 37, 'Course', 74, 75, '2023-10-11 19:08:37', 1),
(0, 'A', 43, 'Activity', 86, 87, '2023-10-11 19:11:32', 1),
(0, 'A', 50, 'Activity', 100, 101, '2023-10-11 19:14:59', 1),
(0, 'A', 51, 'Activity', 104, 105, '2023-10-11 19:15:22', 1),
(0, 'A', 55, 'Job', 108, 109, '2023-10-11 19:18:34', 1),
(0, 'A', 56, 'Job', 112, 113, '2023-10-11 19:19:15', 1),
(0, 'A', 60, 'Job', 120, 121, '2023-10-11 19:21:28', 1),
(0, 'A', 61, 'Job', 122, 123, '2023-10-11 19:21:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test1_question_master`
--

CREATE TABLE `test1_question_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `test1questionmas_key` int(11) NOT NULL,
  `test1_areamas_key` int(11) NOT NULL,
  `type` varchar(500) NOT NULL,
  `question_name` varchar(300) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test1_question_master`
--

INSERT INTO `test1_question_master` (`finact`, `status`, `test1questionmas_key`, `test1_areamas_key`, `type`, `question_name`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 1, 'Job', 'Agriculture', '2023-10-11 22:41:24', 1),
(0, 'A', 2, 2, 'Job', 'Machine Repair', '2023-10-11 22:42:05', 1),
(0, 'A', 7, 7, 'Job', 'Helping families solve problems', '2023-10-12 08:14:14', 1),
(0, 'A', 8, 4, 'Job', 'Drawing', '2023-10-12 08:19:55', 1),
(0, 'A', 9, 6, 'Job', 'Preparation of tax returns', '2023-10-12 08:20:47', 1),
(0, 'A', 10, 5, 'Job', 'Supervise employees', '2023-10-12 08:21:27', 1),
(0, 'A', 17, 7, 'Job', 'Helping patients in the hospital', '2023-10-12 08:30:21', 1),
(0, 'A', 18, 3, 'Job', 'Disability Muscle Massage', '2023-10-12 08:31:02', 1),
(0, 'A', 27, 5, 'Job', 'Being a lawyer', '2023-10-12 08:36:46', 1),
(0, 'A', 28, 3, 'Job', 'Being a veterinarian', '2023-10-12 08:37:19', 1),
(0, 'A', 31, 1, 'Job', 'Forest conservation', '2023-10-12 08:40:00', 1),
(0, 'A', 32, 7, 'Job', 'Being a surgeon', '2023-10-12 08:40:40', 1),
(0, 'A', 35, 6, 'Job', 'Computer software manufacturing', '2023-10-12 08:42:22', 1),
(0, 'A', 36, 4, 'Job', 'Dental technician', '2023-10-12 08:42:56', 1),
(0, 'A', 46, 4, 'Course', 'Music', '2023-10-12 08:49:08', 1),
(0, 'A', 47, 3, 'Course', 'Biology', '2023-10-12 08:49:33', 1),
(0, 'A', 52, 5, 'Course', 'Business', '2023-10-12 08:53:00', 1),
(0, 'A', 53, 7, 'Course', 'Health services', '2023-10-12 08:53:34', 1),
(0, 'A', 54, 1, 'Course', 'Agriculture', '2023-10-12 08:54:07', 1),
(0, 'A', 55, 3, 'Course', 'Physics', '2023-10-12 08:54:45', 1),
(0, 'A', 60, 5, 'Course', 'Economics', '2023-10-12 08:58:16', 1),
(0, 'A', 61, 4, 'Course', 'Dramatic art', '2023-10-12 08:58:51', 1),
(0, 'A', 64, 1, 'Course', 'Zoology', '2023-10-12 09:00:54', 1),
(0, 'A', 65, 4, 'Course', 'Photography', '2023-10-12 09:01:26', 1),
(0, 'A', 74, 6, 'Course', 'Court of Auditors', '2023-10-12 13:58:35', 1),
(0, 'A', 75, 2, 'Course', 'Electronics', '2023-10-12 13:59:05', 1),
(0, 'A', 82, 1, 'Course', 'Architecture', '2023-10-12 14:30:37', 1),
(0, 'A', 83, 6, 'Course', 'Management', '2023-10-12 14:31:14', 1),
(0, 'A', 86, 3, 'Activity', 'Doing a research', '2023-10-12 14:32:17', 1),
(0, 'A', 87, 2, 'Activity', 'Car repair', '2023-10-12 14:32:47', 1),
(0, 'A', 100, 7, 'Activity', 'Interviews with people', '2023-10-12 14:41:17', 1),
(0, 'A', 101, 3, 'Activity', 'Watching a science show', '2023-10-12 14:41:48', 1),
(0, 'A', 104, 7, 'Activity', 'Answering peoples queries', '2023-10-12 14:44:05', 1),
(0, 'A', 105, 2, 'Activity', 'To separate parts of something', '2023-10-12 14:44:42', 1),
(0, 'A', 108, 5, 'Job', 'Processing of advertisements', '2023-10-12 14:46:57', 1),
(0, 'A', 109, 2, 'Job', 'Furniture repair', '2023-10-12 14:47:48', 1),
(0, 'A', 112, 6, 'Job', 'Preparing a research report', '2023-10-12 14:49:47', 1),
(0, 'A', 113, 4, 'Job', 'Writing a story', '2023-10-12 14:50:37', 1),
(0, 'A', 120, 1, 'Job', 'Driving a tractor', '2023-10-12 14:56:59', 1),
(0, 'A', 121, 5, 'Job', 'Managing a shop', '2023-10-12 14:57:21', 1),
(0, 'A', 122, 6, 'Job', 'Computer programming', '2023-10-12 14:58:54', 1),
(0, 'A', 123, 7, 'Job', 'Training of new staff', '2023-10-12 14:59:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test2_area_master`
--

CREATE TABLE `test2_area_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `test2_area_master_key` int(11) NOT NULL,
  `area_name` varchar(1000) NOT NULL,
  `sys_enterdte` datetime NOT NULL,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test2_area_master`
--

INSERT INTO `test2_area_master` (`finact`, `status`, `test2_area_master_key`, `area_name`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 'Realistic', '2023-08-31 17:43:38', 1),
(0, 'A', 2, 'Inquisitive', '2023-08-31 17:43:38', 1),
(0, 'A', 3, 'Artistic', '2023-08-31 17:43:38', 1),
(0, 'A', 4, 'Social', '2023-08-31 17:43:38', 1),
(0, 'A', 5, 'Enterpruner', '2023-08-31 17:43:38', 1),
(0, 'A', 6, 'Caltural', '2023-08-31 17:43:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test2_question_master`
--

CREATE TABLE `test2_question_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `test2questionmas_key` int(11) NOT NULL,
  `test2_areamas_key` int(11) NOT NULL,
  `type` varchar(150) NOT NULL,
  `question_name` varchar(1000) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test2_question_master`
--

INSERT INTO `test2_question_master` (`finact`, `status`, `test2questionmas_key`, `test2_areamas_key`, `type`, `question_name`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 2, 1, 'Self Description', 'Compared to others my age, I have a high ability to work with equipment, machinery or animals and mechanical pulls.', '2023-10-14 20:27:16', 1),
(0, 'A', 3, 1, 'Self Description', 'I appreciate practicality. Likes to nurture and make better the trees and animals that can be seen and touched', '2023-10-14 20:31:59', 1),
(0, 'A', 5, 2, 'Self Description', 'I like to learn and solve math or science problems', '2023-10-14 20:33:32', 1),
(0, 'A', 6, 2, 'Self Description', 'Compared to others my age, I have a higher ability to understand and solve math and science problems.', '2023-10-14 20:34:05', 1),
(0, 'A', 10, 3, 'Self Description', 'Compared to others of my age, I have high skills in creative writing, drama, arts, music, and painting.', '2023-10-14 20:36:17', 1),
(0, 'A', 11, 3, 'Self Description', 'I appreciate the creative works of art such as drama, music and art created by creative writers.', '2023-10-14 20:36:54', 1),
(0, 'A', 14, 4, 'Self Description', 'Compared to others of my age, I am particularly good at teaching, counseling, assisting or providing information.', '2023-10-14 20:39:25', 1),
(0, 'A', 15, 4, 'Self Description', 'I value helping people and solving social problems.', '2023-10-14 20:39:59', 1),
(0, 'A', 18, 5, 'Self Description', 'Compared to other people my age, I have superior skills in managing people and selling things.', '2023-10-14 20:44:03', 1),
(0, 'A', 20, 5, 'Self Description', 'I am enthusiastic, determined and sociable.', '2023-10-14 20:45:38', 1),
(0, 'A', 22, 6, 'Self Description', 'Compared to others of my age, I have a high level of ability to work with numbers and written reports in an orderly and systematic manner.', '2023-10-14 20:46:58', 1),
(0, 'A', 24, 6, 'Self Description', 'I am systematic and able to follow what I plan well.', '2023-10-14 20:48:05', 1),
(0, 'A', 26, 1, 'Jobs', 'Truck Mechanic', '2023-10-14 20:49:42', 1),
(0, 'A', 27, 1, 'Jobs', 'Carpenter', '2023-10-14 20:50:20', 1),
(0, 'A', 28, 4, 'Jobs', 'Physical Therapist', '2023-10-14 20:51:08', 1),
(0, 'A', 29, 4, 'Jobs', 'Counsellor', '2023-10-14 20:51:31', 1),
(0, 'A', 30, 4, 'Jobs', 'Social Workers', '2023-10-14 20:51:51', 1),
(0, 'A', 31, 1, 'Jobs', 'Fish and Farm Warden', '2023-10-14 20:52:48', 1),
(0, 'A', 33, 1, 'Jobs', 'Mechanical Engineer', '2023-10-14 20:53:51', 1),
(0, 'A', 38, 6, 'Jobs', 'Bank Examiner', '2023-10-14 20:56:10', 1),
(0, 'A', 39, 6, 'Jobs', 'Tax Expert', '2023-10-14 20:57:30', 1),
(0, 'A', 40, 4, 'Jobs', 'Nurse', '2023-10-14 20:57:48', 1),
(0, 'A', 41, 3, 'Jobs', 'Actor/Actress', '2023-10-14 20:58:17', 1),
(0, 'A', 43, 6, 'Jobs', 'Insurance Clerk', '2023-10-14 20:59:25', 1),
(0, 'A', 47, 3, 'Jobs', 'Artist', '2023-10-14 21:01:10', 1),
(0, 'A', 49, 6, 'Jobs', 'Court Stenographer', '2023-10-14 21:02:23', 1),
(0, 'A', 50, 5, 'Jobs', 'Sales Manager', '2023-10-14 21:03:02', 1),
(0, 'A', 51, 5, 'Jobs', 'Sales Person', '2023-10-14 21:03:33', 1),
(0, 'A', 52, 3, 'Jobs', 'Dancer', '2023-10-14 21:04:03', 1),
(0, 'A', 55, 6, 'Jobs', 'Bank Teller', '2023-10-14 21:05:43', 1),
(0, 'A', 56, 5, 'Jobs', 'Apartment Manager', '2023-10-14 21:06:18', 1),
(0, 'A', 58, 3, 'Jobs', 'Musician', '2023-10-14 21:07:34', 1),
(0, 'A', 60, 2, 'Jobs', 'Chemical Technician', '2023-10-14 21:09:19', 1),
(0, 'A', 61, 2, 'Jobs', 'Biologist', '2023-10-14 21:09:54', 1),
(0, 'A', 65, 2, 'Jobs', 'Laboratory Technician', '2023-10-14 21:12:52', 1),
(0, 'A', 66, 2, 'Jobs', 'Research Scientist', '2023-10-14 21:13:41', 1),
(0, 'A', 67, 5, 'Jobs', 'Insurance Sales Agent', '2023-10-14 21:21:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `usermaster_key` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `user_level` varchar(100) NOT NULL,
  `user_nme` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`finact`, `status`, `usermaster_key`, `name`, `designation`, `user_level`, `user_nme`, `password`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 'Ranjith', 'Asdd', 'Carrer Guide Officer', 'Ranjith', '202cb962ac59075b964b07152d234b70', '2023-09-01 09:28:36', 1),
(0, 'A', 2, 'Asd', 'Registar', 'VP', 'sa', '202cb962ac59075b964b07152d234b70', '2023-09-01 09:45:40', 0),
(0, 'A', 3, 'Channa', 'fff', 'HOD', 'ho', '202cb962ac59075b964b07152d234b70', '2023-09-23 12:59:47', 1),
(0, 'A', 4, 'Rashika Damayanthi', 'HOD', 'HOD', 'Rashika', '8af95fe2ab1a54b488ef8efb3f3b0797', '2024-02-29 10:03:48', 2),
(0, 'A', 5, 'W.A.S. Priyadarshani', 'HOD', 'HOD', 'Sujani', '202cb962ac59075b964b07152d234b70', '2024-02-29 10:07:30', 2),
(0, 'A', 6, 'R.K. Dilrukshi', 'Instructor-Technical Drawing', 'HOD', 'Dil', '202cb962ac59075b964b07152d234b70', '2024-03-01 13:43:09', 2),
(0, 'A', 7, 'Krishanthi', 'CGO', 'Carrer Guide Officer', 'Krishanthi', '8af95fe2ab1a54b488ef8efb3f3b0797', '2024-03-01 13:44:06', 2),
(0, 'A', 8, 'sad', 'sad', 'HOD', 'sm', '8af95fe2ab1a54b488ef8efb3f3b0797', '2024-03-12 21:50:53', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoinment_master`
--
ALTER TABLE `appoinment_master`
  ADD PRIMARY KEY (`appoinment_mas_key`);

--
-- Indexes for table `business_loan_master`
--
ALTER TABLE `business_loan_master`
  ADD PRIMARY KEY (`business_loan_master_key`);

--
-- Indexes for table `coursetype_master`
--
ALTER TABLE `coursetype_master`
  ADD PRIMARY KEY (`coursetype_mas_key`);

--
-- Indexes for table `course_batch_details`
--
ALTER TABLE `course_batch_details`
  ADD PRIMARY KEY (`course_batch_details_key`);

--
-- Indexes for table `course_careerpath_details`
--
ALTER TABLE `course_careerpath_details`
  ADD PRIMARY KEY (`coursecareerpathdetail_key`);

--
-- Indexes for table `course_level_master`
--
ALTER TABLE `course_level_master`
  ADD PRIMARY KEY (`courselevelmas_key`);

--
-- Indexes for table `course_master`
--
ALTER TABLE `course_master`
  ADD PRIMARY KEY (`coursemas_key`);

--
-- Indexes for table `course_qualification_details`
--
ALTER TABLE `course_qualification_details`
  ADD PRIMARY KEY (`coursequalification_key`);

--
-- Indexes for table `creditpoint_master`
--
ALTER TABLE `creditpoint_master`
  ADD PRIMARY KEY (`creditpointmas_key`);

--
-- Indexes for table `examsubject_master`
--
ALTER TABLE `examsubject_master`
  ADD PRIMARY KEY (`examsubjectmas_key`);

--
-- Indexes for table `exam_master`
--
ALTER TABLE `exam_master`
  ADD PRIMARY KEY (`exammas_key`);

--
-- Indexes for table `job_master`
--
ALTER TABLE `job_master`
  ADD PRIMARY KEY (`jobmas_key`);

--
-- Indexes for table `student_businessloan_details`
--
ALTER TABLE `student_businessloan_details`
  ADD PRIMARY KEY (`student_businessloan_details_key`);

--
-- Indexes for table `student_course_details`
--
ALTER TABLE `student_course_details`
  ADD PRIMARY KEY (`studentcoursedetail_key`);

--
-- Indexes for table `student_exam_details`
--
ALTER TABLE `student_exam_details`
  ADD PRIMARY KEY (`student_exam_key`);

--
-- Indexes for table `student_master`
--
ALTER TABLE `student_master`
  ADD PRIMARY KEY (`studentmas_key`);

--
-- Indexes for table `student_newselected_course_details`
--
ALTER TABLE `student_newselected_course_details`
  ADD PRIMARY KEY (`student_newselected_course_details_key`);

--
-- Indexes for table `student_qualification_details`
--
ALTER TABLE `student_qualification_details`
  ADD PRIMARY KEY (`studentqualification_key`);

--
-- Indexes for table `student_test01_details`
--
ALTER TABLE `student_test01_details`
  ADD PRIMARY KEY (`student_test01_details_key`);

--
-- Indexes for table `student_test01_result_details`
--
ALTER TABLE `student_test01_result_details`
  ADD PRIMARY KEY (`student_test01_result_details_key`);

--
-- Indexes for table `student_test02_details`
--
ALTER TABLE `student_test02_details`
  ADD PRIMARY KEY (`student_test02_details_key`);

--
-- Indexes for table `student_test02_result_details`
--
ALTER TABLE `student_test02_result_details`
  ADD PRIMARY KEY (`student_test02_result_details_key`);

--
-- Indexes for table `student_test_master`
--
ALTER TABLE `student_test_master`
  ADD PRIMARY KEY (`student_testmas_key`);

--
-- Indexes for table `student_trainingpoint_master`
--
ALTER TABLE `student_trainingpoint_master`
  ADD PRIMARY KEY (`student_trainingpoint_mas_key`);

--
-- Indexes for table `test1_area_master`
--
ALTER TABLE `test1_area_master`
  ADD PRIMARY KEY (`test1_area_master_key`);

--
-- Indexes for table `test1_questionmgt_master`
--
ALTER TABLE `test1_questionmgt_master`
  ADD PRIMARY KEY (`test1_questionmgt_mas_key`);

--
-- Indexes for table `test1_question_master`
--
ALTER TABLE `test1_question_master`
  ADD PRIMARY KEY (`test1questionmas_key`);

--
-- Indexes for table `test2_area_master`
--
ALTER TABLE `test2_area_master`
  ADD PRIMARY KEY (`test2_area_master_key`);

--
-- Indexes for table `test2_question_master`
--
ALTER TABLE `test2_question_master`
  ADD PRIMARY KEY (`test2questionmas_key`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`usermaster_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoinment_master`
--
ALTER TABLE `appoinment_master`
  MODIFY `appoinment_mas_key` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `business_loan_master`
--
ALTER TABLE `business_loan_master`
  MODIFY `business_loan_master_key` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coursetype_master`
--
ALTER TABLE `coursetype_master`
  MODIFY `coursetype_mas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
