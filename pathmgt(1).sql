-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 08:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pathmgt`
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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `approve_status` int(11) DEFAULT NULL,
  `appinment_date` date DEFAULT NULL,
  `appoinment_time` varchar(50) DEFAULT NULL,
  `approve_person_key` int(11) DEFAULT NULL,
  `approve_dtetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appoinment_master`
--

INSERT INTO `appoinment_master` (`finact`, `status`, `appoinment_mas_key`, `student_key`, `sys_enterdte`, `approve_status`, `appinment_date`, `appoinment_time`, `approve_person_key`, `approve_dtetime`) VALUES
(0, '', 1, 21, '2023-10-19 10:01:42', 1, '2023-10-26', '12:00', 1, '2023-10-19 07:35:39');

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_loan_master`
--

INSERT INTO `business_loan_master` (`finact`, `status`, `business_loan_master_key`, `programme_dte`, `message`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, '2023-10-21', 'dsad', '2023-10-19 19:39:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coursetype_master`
--

CREATE TABLE `coursetype_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `coursetype_mas_key` int(11) NOT NULL,
  `coursetype_nme` varchar(300) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coursetype_master`
--

INSERT INTO `coursetype_master` (`finact`, `status`, `coursetype_mas_key`, `coursetype_nme`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 'NVQ', '2023-09-13 19:20:19', 1),
(0, 'A', 2, 'Diploma', '2023-09-13 19:20:36', 1);

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL,
  `inform_type` varchar(500) DEFAULT NULL,
  `interview_testdte` date DEFAULT NULL,
  `inform_message` varchar(1000) DEFAULT NULL,
  `inform_person` int(11) DEFAULT NULL,
  `inform_sysenterdte` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_batch_details`
--

INSERT INTO `course_batch_details` (`finact`, `status`, `course_batch_details_key`, `course_key`, `batch_nme`, `batchapplyclose_status`, `sys_enterdte`, `act_person`, `inform_type`, `interview_testdte`, `inform_message`, `inform_person`, `inform_sysenterdte`) VALUES
(0, 'A', 1, 1, '2013 1st', 1, '2023-10-17 17:14:23', 1, 'Interview', '2023-10-27', 'tttwwwwwww', 1, '2023-10-18 07:09:56'),
(0, 'A', 2, 2, '2012 2nd', 1, '2023-10-17 17:27:19', 1, NULL, NULL, NULL, NULL, NULL),
(0, 'A', 3, 1, '2012 2nd', 1, '2023-10-17 17:28:17', 1, NULL, NULL, NULL, NULL, NULL),
(0, 'A', 4, 1, '2012 1st', 1, '2023-10-17 17:28:44', 1, NULL, NULL, NULL, NULL, NULL),
(0, 'A', 5, 1, '2013 2nd', 1, '2023-10-19 08:57:15', 1, NULL, NULL, NULL, NULL, NULL),
(0, 'A', 6, 1, '2014 1st', 0, '2023-10-19 08:57:41', 1, NULL, NULL, NULL, NULL, NULL),
(0, 'A', 7, 1, '2014 2nd', 0, '2023-10-19 08:57:56', 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_level_master`
--

CREATE TABLE `course_level_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `courselevelmas_key` int(11) NOT NULL,
  `course_level` varchar(300) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_level_master`
--

INSERT INTO `course_level_master` (`finact`, `status`, `courselevelmas_key`, `course_level`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 'NVQ 1', '2023-09-13 19:36:39', 1),
(0, 'A', 2, 'NVQ 2', '2023-09-13 19:36:49', 1),
(0, 'A', 3, 'NVQ 3', '2023-09-13 19:36:59', 1),
(1, 'A', 4, 'jjj', '2023-09-23 12:54:07', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_master`
--

INSERT INTO `course_master` (`finact`, `status`, `coursemas_key`, `coursetype_key`, `course_type`, `courselevel_key`, `course_level`, `course_nme`, `test1_areamas_key`, `test1_areamas_name`, `test2_areamas_key`, `test2_areamas_name`, `act_person`) VALUES
(0, 'A', 1, 1, 'NVQ', 1, 'NVQ 1', 'NVQ 1 - Agri', 4, 'Patrical', 2, 'I', 1),
(0, 'A', 2, 1, 'NVQ', 1, 'NVQ 1', 'NVQ 1 - IT', 6, 'Office', NULL, NULL, 1);

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_qualification_details`
--

INSERT INTO `course_qualification_details` (`finact`, `status`, `coursequalification_key`, `course_key`, `exam_key`, `examsubject_mas_key`, `creditpoint_key`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 1, 1, 2, 1, '2023-09-23 13:24:39', 1),
(0, 'A', 2, 1, 1, 1, 3, '2023-09-23 13:24:54', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examsubject_master`
--

INSERT INTO `examsubject_master` (`finact`, `status`, `examsubjectmas_key`, `exammas_key`, `exam_name`, `stream`, `subject_name`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 1, 'G.C.E O/L', '', 'Sinhala', '2023-09-01 14:26:14', 1),
(0, 'A', 2, 1, 'G.C.E O/L', '', 'English', '2023-09-01 14:26:44', 1),
(0, 'A', 3, 1, 'G.C.E O/L', '', 'Maths', '2023-09-01 14:37:44', 1),
(0, 'A', 4, 1, 'G.C.E O/L', '', 'Science', '2023-09-01 14:37:52', 1);

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_master`
--

INSERT INTO `exam_master` (`finact`, `status`, `exammas_key`, `exam_name`, `stream`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 'G.C.E O/L', '', '2023-09-01 13:41:14', 1),
(0, 'A', 2, '', '', '2023-10-19 15:06:19', 21);

-- --------------------------------------------------------

--
-- Table structure for table `student_businessloan_details`
--

CREATE TABLE `student_businessloan_details` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `student_businessloan_details_key` int(11) NOT NULL,
  `student_key` int(11) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `inform_status` int(11) DEFAULT NULL,
  `businessloanmas_key` int(11) DEFAULT NULL,
  `programme_dte` date DEFAULT NULL,
  `inform_message` varchar(1000) DEFAULT NULL,
  `inform_datetime` datetime DEFAULT NULL,
  `inform_person` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_businessloan_details`
--

INSERT INTO `student_businessloan_details` (`finact`, `status`, `student_businessloan_details_key`, `student_key`, `sys_enterdte`, `inform_status`, `businessloanmas_key`, `programme_dte`, `inform_message`, `inform_datetime`, `inform_person`) VALUES
(0, 'A', 1, 21, '2023-10-19 19:01:08', 1, 1, '2023-10-21', 'dsad', '2023-10-19 19:39:41', 1);

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_course_details`
--

INSERT INTO `student_course_details` (`finact`, `status`, `studentcoursedetail_key`, `student_key`, `student_id`, `course_key`, `coursebatch_detail_key`, `batch`, `complete_status`, `sys_enterdte`) VALUES
(1, 'A', 1, 5, 'ASD', 1, 0, '2014', 'Complete', '2023-09-26 22:23:23'),
(1, 'A', 2, 5, 'ASD', 2, 0, '2014', 'Complete', '2023-09-26 22:38:53'),
(0, 'A', 3, 5, 'ASD', 2, 0, '2014', 'Complete', '2023-09-26 22:42:27'),
(0, 'A', 4, 6, '01244774', 1, 0, '2013', 'Complete', '2023-10-05 15:42:21'),
(0, 'A', 5, 6, '01244774', 2, 0, '2014', 'Complete', '2023-10-05 15:42:55'),
(0, 'A', 6, 18, '24778747', 1, 3, '2012 2nd', 'Complete', '2023-10-17 17:44:33'),
(0, 'A', 7, 22, '5677444', 1, 3, '2012 2nd', 'Ongoing', '2023-10-17 22:12:25'),
(0, 'A', 8, 23, '8997755', 1, 4, '2012 1st', 'Ongoing', '2023-10-17 22:22:33'),
(0, 'A', 9, 21, '123444555', 1, 1, '2013 1st', 'Complete', '2023-10-19 07:57:07');

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_exam_details`
--

INSERT INTO `student_exam_details` (`finact`, `status`, `student_exam_key`, `student_key`, `exam_key`, `sitting_year`, `sys_enterdte`) VALUES
(0, 'A', 1, 5, 1, '2008', '2023-09-26 16:53:43'),
(0, 'A', 2, 6, 1, '2008', '2023-10-05 15:39:57'),
(0, 'A', 3, 7, 1, '2009', '2023-10-05 15:50:34'),
(0, 'A', 4, 9, 1, '2012', '2023-10-10 09:04:10'),
(0, 'A', 5, 10, 1, '2017', '2023-10-11 10:07:07'),
(0, 'A', 6, 11, 1, '2008', '2023-10-11 20:50:31'),
(0, 'A', 7, 12, 1, '2002', '2023-10-11 22:43:43'),
(0, 'A', 8, 13, 1, '2018', '2023-10-13 17:52:53'),
(0, 'A', 9, 14, 1, '2012', '2023-10-14 09:17:06'),
(0, 'A', 10, 16, 1, '2012', '2023-10-15 16:41:13'),
(0, 'A', 11, 17, 1, '2008', '2023-10-17 09:00:59'),
(0, 'A', 12, 18, 1, '2012', '2023-10-17 17:32:45'),
(0, 'A', 13, 19, 1, '2003', '2023-10-17 18:47:04'),
(0, 'A', 14, 20, 1, '2010', '2023-10-17 21:55:19'),
(0, 'A', 15, 21, 1, '2010', '2023-10-17 22:08:57'),
(0, 'A', 16, 23, 1, '2009', '2023-10-17 22:19:43'),
(0, 'A', 17, 24, 1, '2009', '2023-10-17 22:26:01'),
(0, 'A', 18, 22, 1, '2003', '2023-10-18 13:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `studentmas_key` int(11) NOT NULL,
  `student_nme` varchar(150) NOT NULL,
  `date_of_birth` date NOT NULL,
  `nic_no` varchar(15) DEFAULT NULL,
  `user_nme` varchar(150) NOT NULL,
  `password` varchar(500) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`finact`, `status`, `studentmas_key`, `student_nme`, `date_of_birth`, `nic_no`, `user_nme`, `password`, `sys_enterdte`) VALUES
(0, 'A', 1, 'Lahiru Chathuranga', '1992-10-12', '', 'Lahiruc700@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-09-26 14:37:19'),
(0, 'A', 2, 'Ssffds', '1992-10-12', '', 'Lahiruc701@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-09-26 14:38:51'),
(0, 'A', 3, 'dsa', '0001-08-24', '', 'Lahiruc702@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-09-26 14:40:42'),
(0, 'A', 4, 'Lahiru Chathuranga', '2003-02-04', '', 'Lahiruc703@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-09-26 14:46:29'),
(0, 'A', 5, 'Sdff', '1995-10-05', '', 'Lahiruc704@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-09-26 14:48:31'),
(0, 'A', 6, 'Samadi Nisansala', '1992-10-13', '924312442V', 'samadi@slt.net', 'f647e02a69ab0e51780373f86f89a12a', '2023-10-05 15:39:46'),
(0, 'A', 7, 'Sahan Hewawasam', '1993-10-04', '934312442V', 'sahan@slt.net', 'e03e9d09785663f5dfca5413be728faa', '2023-10-05 15:50:24'),
(0, 'A', 8, 'Nuwan Sameera', '0000-00-00', '944433224V', 'nuwan@slt.net', '202cb962ac59075b964b07152d234b70', '2023-10-05 18:32:20'),
(0, 'A', 9, 'Anjula Kumara', '2003-05-02', '2003200034', 'anju@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-10-10 09:03:30'),
(0, 'A', 10, 'Saman kariyawasam', '2002-10-18', '20025778300', 'saman@slt.net', '202cb962ac59075b964b07152d234b70', '2023-10-11 10:06:43'),
(0, 'A', 11, 'Sadali Priynwada', '1992-08-05', '19925647654', 'sandali@slt.net', '202cb962ac59075b964b07152d234b70', '2023-10-11 20:45:59'),
(0, 'A', 12, 'amal nishn', '1993-10-11', '19930450689', 'amal@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-10-11 22:43:34'),
(0, 'A', 13, 'Roshan', '1993-10-12', '19931334563', 'roshan@slt.net', '202cb962ac59075b964b07152d234b70', '2023-10-13 17:52:42'),
(0, 'A', 14, 'Nishan Samarasekara', '1998-10-05', '199866253443', 'Nisham@slt.net', '202cb962ac59075b964b07152d234b70', '2023-10-14 08:49:12'),
(0, 'A', 15, 'Sagara Nishan', '1993-08-12', '199309222345', 'sagara@slt.net', '202cb962ac59075b964b07152d234b70', '2023-10-14 11:26:30'),
(0, 'A', 16, 'Gihan Samaraweera', '1998-08-12', '199876554', 'gihan@slt.net', '202cb962ac59075b964b07152d234b70', '2023-10-15 12:23:19'),
(0, 'A', 17, 'Sandani Viloshani', '1995-10-13', '199597765544', 'sandani@slt.net', '202cb962ac59075b964b07152d234b70', '2023-10-17 08:48:19'),
(0, 'A', 18, 'Kelum Gayashan', '1998-10-16', '1998102238422', 'kelum@slt.met', '202cb962ac59075b964b07152d234b70', '2023-10-17 17:32:37'),
(0, 'A', 19, 'Sanjeewa Madusanka', '1992-08-12', '199234354433', 'sanjeewa@slt.net', '202cb962ac59075b964b07152d234b70', '2023-10-17 18:46:53'),
(0, 'A', 20, 'Chamara Silva', '1996-08-21', '19964567789', 'chamara@slt.net', '202cb962ac59075b964b07152d234b70', '2023-10-17 21:54:57'),
(0, 'A', 21, 'Sarani Disanayake', '1995-05-05', '1995444555', 'sara@slt.net', '202cb962ac59075b964b07152d234b70', '2023-10-17 22:05:22'),
(0, 'A', 22, 'Thisara Samalka', '1998-10-02', '19980886544', 'thisa@slt.net', '202cb962ac59075b964b07152d234b70', '2023-10-17 22:11:47'),
(0, 'A', 23, 'Ajith Perera', '1999-05-08', '19997864322', 'ajith@slt.lk', '202cb962ac59075b964b07152d234b70', '2023-10-17 22:16:05'),
(0, 'A', 24, 'Sarath Perera', '1998-10-02', '19986654332', 'sarath@slt.net', '202cb962ac59075b964b07152d234b70', '2023-10-17 22:23:49'),
(0, 'A', 25, 'Udara Deshan', '2000-12-05', '20001234533', 'udara@slt.net', '202cb962ac59075b964b07152d234b70', '2023-10-19 21:36:12');

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `inform_status` int(11) DEFAULT NULL,
  `interview_testdte` date DEFAULT NULL,
  `inform_type` varchar(200) DEFAULT NULL,
  `inform_message` varchar(1000) DEFAULT NULL,
  `inform_datetime` datetime DEFAULT NULL,
  `inform_person` int(11) DEFAULT NULL,
  `register_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_newselected_course_details`
--

INSERT INTO `student_newselected_course_details` (`finact`, `status`, `student_newselected_course_details_key`, `student_key`, `course_key`, `student_testmas_key`, `test_type`, `coursebatch_detail_key`, `batch_nme`, `sys_enterdte`, `inform_status`, `interview_testdte`, `inform_type`, `inform_message`, `inform_datetime`, `inform_person`, `register_status`) VALUES
(1, '0', 1, 13, 1, 2, 'Test01', 0, '', '2023-10-13 22:52:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(0, '0', 2, 13, 2, 2, 'Test01', 0, '', '2023-10-13 23:03:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(0, '0', 3, 13, 1, 2, 'Test01', 0, '', '2023-10-13 23:21:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(0, '0', 4, 17, 1, 5, 'Test02', 0, '', '2023-10-17 09:07:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(0, 'A', 7, 19, 1, 6, 'Test01', 1, '2013 1st', '2023-10-17 19:03:05', 1, '2023-10-27', 'Interview', 'tttwwwwwww', '2023-10-18 07:09:56', 1, NULL),
(0, '0', 8, 20, 1, 7, 'Test01', 1, '2013 1st', '2023-10-17 22:03:13', 1, '2023-10-27', 'Interview', 'tttwwwwwww', '2023-10-18 07:09:56', 1, NULL),
(0, '0', 9, 21, 1, 8, 'Test02', 1, '2013 1st', '2023-10-17 22:10:22', 1, '2023-10-27', 'Interview', 'tttwwwwwww', '2023-10-18 07:09:56', 1, 1),
(0, 'A', 10, 21, 1, 0, 'Direct', 6, '2014 1st', '2023-10-19 09:13:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_qualification_details`
--

INSERT INTO `student_qualification_details` (`finact`, `status`, `studentqualification_key`, `student_key`, `student_exam_details_key`, `examsubject_mas_key`, `creditpoint_key`, `sys_enterdte`) VALUES
(0, 'A', 1, 5, 1, 1, 2, '2023-09-26 21:00:35'),
(0, 'A', 2, 5, 1, 2, 3, '2023-09-26 21:00:39'),
(0, 'A', 3, 5, 1, 3, 3, '2023-09-26 21:00:43'),
(0, 'A', 4, 6, 2, 1, 1, '2023-10-05 15:40:03'),
(0, 'A', 5, 6, 2, 2, 3, '2023-10-05 15:40:07'),
(0, 'A', 6, 6, 2, 3, 4, '2023-10-05 15:40:11'),
(0, 'A', 7, 7, 3, 1, 1, '2023-10-05 15:50:38'),
(0, 'A', 8, 7, 3, 2, 3, '2023-10-05 15:50:40'),
(0, 'A', 9, 9, 4, 1, 1, '2023-10-10 09:04:41'),
(0, 'A', 10, 9, 4, 2, 4, '2023-10-10 09:04:46'),
(0, 'A', 11, 9, 4, 3, 2, '2023-10-10 09:04:49'),
(0, 'A', 12, 10, 5, 1, 1, '2023-10-11 10:07:12'),
(0, 'A', 13, 10, 5, 2, 3, '2023-10-11 10:07:15'),
(0, 'A', 14, 10, 5, 3, 4, '2023-10-11 10:07:18'),
(0, 'A', 15, 11, 6, 1, 1, '2023-10-11 20:50:42'),
(0, 'A', 16, 11, 6, 2, 3, '2023-10-11 20:50:46'),
(0, 'A', 17, 11, 6, 3, 2, '2023-10-11 20:50:52'),
(0, 'A', 18, 12, 7, 1, 1, '2023-10-11 22:43:48'),
(0, 'A', 19, 12, 7, 2, 4, '2023-10-11 22:43:51'),
(0, 'A', 20, 13, 8, 1, 2, '2023-10-13 17:52:59'),
(0, 'A', 21, 13, 8, 2, 1, '2023-10-13 17:53:03'),
(0, 'A', 22, 13, 8, 3, 3, '2023-10-13 17:53:07'),
(0, 'A', 23, 14, 9, 1, 3, '2023-10-14 09:17:10'),
(0, 'A', 24, 14, 9, 2, 2, '2023-10-14 09:17:13'),
(0, 'A', 25, 14, 9, 3, 2, '2023-10-14 09:17:20'),
(0, 'A', 26, 16, 10, 1, 1, '2023-10-15 16:41:19'),
(0, 'A', 27, 16, 10, 2, 3, '2023-10-15 16:41:21'),
(0, 'A', 28, 17, 11, 1, 1, '2023-10-17 09:01:05'),
(0, 'A', 29, 17, 11, 2, 1, '2023-10-17 09:01:09'),
(0, 'A', 30, 17, 11, 3, 1, '2023-10-17 09:01:14'),
(0, 'A', 31, 18, 12, 1, 1, '2023-10-17 17:32:50'),
(0, 'A', 32, 18, 12, 2, 3, '2023-10-17 17:32:52'),
(0, 'A', 33, 19, 13, 1, 1, '2023-10-17 18:47:08'),
(0, 'A', 34, 19, 13, 2, 1, '2023-10-17 18:47:11'),
(0, 'A', 35, 19, 13, 3, 1, '2023-10-17 18:47:14'),
(1, 'A', 36, 20, 14, 1, 3, '2023-10-17 21:55:30'),
(1, 'A', 37, 20, 14, 1, 2, '2023-10-17 21:55:54'),
(0, 'A', 38, 20, 14, 1, 1, '2023-10-17 21:56:10'),
(0, 'A', 39, 20, 14, 2, 1, '2023-10-17 21:56:14'),
(0, 'A', 40, 20, 14, 3, 3, '2023-10-17 21:56:18'),
(0, 'A', 41, 20, 14, 4, 5, '2023-10-17 21:56:23'),
(0, 'A', 42, 21, 15, 1, 2, '2023-10-17 22:09:03'),
(0, 'A', 43, 21, 15, 2, 1, '2023-10-17 22:09:10'),
(0, 'A', 44, 21, 15, 3, 2, '2023-10-17 22:09:14'),
(0, 'A', 45, 23, 16, 1, 1, '2023-10-17 22:19:54'),
(0, 'A', 46, 23, 16, 2, 2, '2023-10-17 22:19:58'),
(0, 'A', 47, 23, 16, 3, 2, '2023-10-17 22:20:02'),
(0, 'A', 48, 24, 17, 1, 1, '2023-10-17 22:26:07'),
(0, 'A', 49, 24, 17, 2, 2, '2023-10-17 22:26:11'),
(0, 'A', 50, 24, 17, 3, 1, '2023-10-17 22:26:16'),
(0, 'A', 51, 22, 18, 1, 1, '2023-10-18 13:06:47'),
(0, 'A', 52, 22, 18, 2, 3, '2023-10-18 13:06:51');

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_test01_details`
--

INSERT INTO `student_test01_details` (`finact`, `status`, `student_test01_details_key`, `studenttestmas_key`, `student_key`, `test1_questionmgt_mas_key`, `test1questionmas_key`, `sys_enterdte`) VALUES
(0, 'A', 1, 1, 12, 1, 1, '2023-10-11 22:48:05'),
(0, 'A', 2, 1, 12, 2, 3, '2023-10-11 22:48:05'),
(0, 'A', 3, 1, 12, 3, 6, '2023-10-11 22:48:05'),
(0, 'A', 4, 1, 12, 4, 7, '2023-10-11 22:48:05'),
(0, 'A', 5, 1, 12, 5, 9, '2023-10-11 22:48:05'),
(0, 'A', 6, 1, 12, 6, 11, '2023-10-11 22:48:05'),
(0, 'A', 7, 1, 12, 7, 13, '2023-10-11 22:48:05'),
(0, 'A', 8, 1, 12, 8, 17, '2023-10-11 22:48:05'),
(0, 'A', 9, 1, 12, 9, 18, '2023-10-11 22:48:05'),
(0, 'A', 10, 1, 12, 10, 20, '2023-10-11 22:48:05'),
(0, 'A', 11, 1, 12, 11, 22, '2023-10-11 22:48:05'),
(0, 'A', 12, 1, 12, 12, 24, '2023-10-11 22:48:05'),
(0, 'A', 13, 1, 12, 13, 26, '2023-10-11 22:48:05'),
(0, 'A', 14, 1, 12, 14, 28, '2023-10-11 22:48:05'),
(0, 'A', 15, 1, 12, 15, 30, '2023-10-11 22:48:05'),
(0, 'A', 16, 1, 12, 16, 32, '2023-10-11 22:48:05'),
(0, 'A', 17, 1, 12, 17, 34, '2023-10-11 22:48:05'),
(0, 'A', 18, 1, 12, 18, 36, '2023-10-11 22:48:05'),
(0, 'A', 19, 1, 12, 19, 38, '2023-10-11 22:48:05'),
(0, 'A', 20, 1, 12, 20, 39, '2023-10-11 22:48:05'),
(0, 'A', 21, 1, 12, 21, 41, '2023-10-11 22:48:05'),
(0, 'A', 22, 1, 12, 54, 107, '2023-10-11 22:48:05'),
(0, 'A', 23, 1, 12, 55, 109, '2023-10-11 22:48:05'),
(0, 'A', 24, 1, 12, 56, 111, '2023-10-11 22:48:05'),
(0, 'A', 25, 1, 12, 57, 113, '2023-10-11 22:48:05'),
(0, 'A', 26, 1, 12, 58, 115, '2023-10-11 22:48:05'),
(0, 'A', 27, 1, 12, 59, 117, '2023-10-11 22:48:05'),
(0, 'A', 28, 1, 12, 60, 119, '2023-10-11 22:48:05'),
(0, 'A', 29, 1, 12, 61, 121, '2023-10-11 22:48:06'),
(0, 'A', 30, 1, 12, 62, 123, '2023-10-11 22:48:06'),
(0, 'A', 31, 1, 12, 63, 125, '2023-10-11 22:48:06'),
(0, 'A', 32, 2, 13, 1, 1, '2023-10-13 17:55:04'),
(0, 'A', 33, 2, 13, 2, 4, '2023-10-13 17:55:04'),
(0, 'A', 34, 2, 13, 3, 5, '2023-10-13 17:55:04'),
(0, 'A', 35, 2, 13, 4, 8, '2023-10-13 17:55:04'),
(0, 'A', 36, 2, 13, 5, 9, '2023-10-13 17:55:04'),
(0, 'A', 37, 2, 13, 6, 12, '2023-10-13 17:55:04'),
(0, 'A', 38, 2, 13, 7, 13, '2023-10-13 17:55:05'),
(0, 'A', 39, 2, 13, 8, 16, '2023-10-13 17:55:05'),
(0, 'A', 40, 2, 13, 9, 18, '2023-10-13 17:55:05'),
(0, 'A', 41, 2, 13, 10, 21, '2023-10-13 17:55:05'),
(0, 'A', 42, 2, 13, 11, 22, '2023-10-13 17:55:05'),
(0, 'A', 43, 2, 13, 12, 25, '2023-10-13 17:55:05'),
(0, 'A', 44, 2, 13, 13, 26, '2023-10-13 17:55:05'),
(0, 'A', 45, 2, 13, 14, 29, '2023-10-13 17:55:05'),
(0, 'A', 46, 2, 13, 15, 30, '2023-10-13 17:55:05'),
(0, 'A', 47, 2, 13, 16, 33, '2023-10-13 17:55:05'),
(0, 'A', 48, 2, 13, 17, 34, '2023-10-13 17:55:05'),
(0, 'A', 49, 2, 13, 18, 37, '2023-10-13 17:55:05'),
(0, 'A', 50, 2, 13, 19, 38, '2023-10-13 17:55:05'),
(0, 'A', 51, 2, 13, 20, 40, '2023-10-13 17:55:05'),
(0, 'A', 52, 2, 13, 21, 41, '2023-10-13 17:55:05'),
(0, 'A', 53, 2, 13, 22, 44, '2023-10-13 17:55:05'),
(0, 'A', 54, 2, 13, 23, 45, '2023-10-13 17:55:05'),
(0, 'A', 55, 2, 13, 24, 48, '2023-10-13 17:55:05'),
(0, 'A', 56, 2, 13, 25, 49, '2023-10-13 17:55:05'),
(0, 'A', 57, 2, 13, 26, 52, '2023-10-13 17:55:05'),
(0, 'A', 58, 2, 13, 27, 53, '2023-10-13 17:55:05'),
(0, 'A', 59, 2, 13, 28, 56, '2023-10-13 17:55:05'),
(0, 'A', 60, 2, 13, 29, 57, '2023-10-13 17:55:05'),
(0, 'A', 61, 2, 13, 30, 60, '2023-10-13 17:55:05'),
(0, 'A', 62, 2, 13, 31, 61, '2023-10-13 17:55:05'),
(0, 'A', 63, 2, 13, 32, 64, '2023-10-13 17:55:05'),
(0, 'A', 64, 2, 13, 33, 65, '2023-10-13 17:55:05'),
(0, 'A', 65, 2, 13, 34, 68, '2023-10-13 17:55:05'),
(0, 'A', 66, 2, 13, 35, 69, '2023-10-13 17:55:05'),
(0, 'A', 67, 2, 13, 36, 72, '2023-10-13 17:55:06'),
(0, 'A', 68, 2, 13, 37, 73, '2023-10-13 17:55:06'),
(0, 'A', 69, 2, 13, 38, 76, '2023-10-13 17:55:06'),
(0, 'A', 70, 2, 13, 39, 77, '2023-10-13 17:55:06'),
(0, 'A', 71, 2, 13, 40, 80, '2023-10-13 17:55:06'),
(0, 'A', 72, 2, 13, 41, 81, '2023-10-13 17:55:06'),
(0, 'A', 73, 2, 13, 42, 84, '2023-10-13 17:55:06'),
(0, 'A', 74, 2, 13, 43, 85, '2023-10-13 17:55:06'),
(0, 'A', 75, 2, 13, 44, 88, '2023-10-13 17:55:06'),
(0, 'A', 76, 2, 13, 45, 89, '2023-10-13 17:55:06'),
(0, 'A', 77, 2, 13, 46, 92, '2023-10-13 17:55:06'),
(0, 'A', 78, 2, 13, 47, 93, '2023-10-13 17:55:06'),
(0, 'A', 79, 2, 13, 48, 96, '2023-10-13 17:55:06'),
(0, 'A', 80, 2, 13, 49, 97, '2023-10-13 17:55:06'),
(0, 'A', 81, 2, 13, 50, 100, '2023-10-13 17:55:06'),
(0, 'A', 82, 2, 13, 51, 101, '2023-10-13 17:55:06'),
(0, 'A', 83, 2, 13, 52, 104, '2023-10-13 17:55:06'),
(0, 'A', 84, 2, 13, 53, 105, '2023-10-13 17:55:06'),
(0, 'A', 85, 2, 13, 54, 108, '2023-10-13 17:55:06'),
(0, 'A', 86, 2, 13, 55, 109, '2023-10-13 17:55:06'),
(0, 'A', 87, 2, 13, 56, 112, '2023-10-13 17:55:06'),
(0, 'A', 88, 2, 13, 57, 113, '2023-10-13 17:55:06'),
(0, 'A', 89, 2, 13, 58, 116, '2023-10-13 17:55:06'),
(0, 'A', 90, 2, 13, 59, 117, '2023-10-13 17:55:06'),
(0, 'A', 91, 2, 13, 60, 120, '2023-10-13 17:55:06'),
(0, 'A', 92, 2, 13, 61, 121, '2023-10-13 17:55:06'),
(0, 'A', 93, 2, 13, 62, 124, '2023-10-13 17:55:06'),
(0, 'A', 94, 2, 13, 63, 125, '2023-10-13 17:55:06'),
(0, 'A', 95, 3, 14, 1, 1, '2023-10-14 08:50:49'),
(0, 'A', 96, 3, 14, 2, 4, '2023-10-14 08:50:49'),
(0, 'A', 97, 3, 14, 3, 5, '2023-10-14 08:50:49'),
(0, 'A', 98, 3, 14, 4, 8, '2023-10-14 08:50:49'),
(0, 'A', 99, 3, 14, 5, 9, '2023-10-14 08:50:49'),
(0, 'A', 100, 3, 14, 6, 12, '2023-10-14 08:50:49'),
(0, 'A', 101, 3, 14, 7, 14, '2023-10-14 08:50:49'),
(0, 'A', 102, 3, 14, 8, 17, '2023-10-14 08:50:49'),
(0, 'A', 103, 3, 14, 9, 18, '2023-10-14 08:50:49'),
(0, 'A', 104, 3, 14, 10, 20, '2023-10-14 08:50:49'),
(0, 'A', 105, 3, 14, 11, 22, '2023-10-14 08:50:49'),
(0, 'A', 106, 3, 14, 12, 24, '2023-10-14 08:50:49'),
(0, 'A', 107, 3, 14, 13, 27, '2023-10-14 08:50:50'),
(0, 'A', 108, 3, 14, 14, 29, '2023-10-14 08:50:50'),
(0, 'A', 109, 3, 14, 15, 31, '2023-10-14 08:50:50'),
(0, 'A', 110, 3, 14, 16, 33, '2023-10-14 08:50:50'),
(0, 'A', 111, 3, 14, 17, 34, '2023-10-14 08:50:50'),
(0, 'A', 112, 3, 14, 18, 36, '2023-10-14 08:50:50'),
(0, 'A', 113, 3, 14, 19, 38, '2023-10-14 08:50:50'),
(0, 'A', 114, 3, 14, 20, 39, '2023-10-14 08:50:50'),
(0, 'A', 115, 3, 14, 21, 42, '2023-10-14 08:50:50'),
(0, 'A', 116, 3, 14, 22, 43, '2023-10-14 08:50:50'),
(0, 'A', 117, 3, 14, 23, 45, '2023-10-14 08:50:50'),
(0, 'A', 118, 3, 14, 24, 47, '2023-10-14 08:50:50'),
(0, 'A', 119, 3, 14, 25, 50, '2023-10-14 08:50:50'),
(0, 'A', 120, 3, 14, 26, 52, '2023-10-14 08:50:50'),
(0, 'A', 121, 3, 14, 27, 54, '2023-10-14 08:50:50'),
(0, 'A', 122, 3, 14, 28, 55, '2023-10-14 08:50:50'),
(0, 'A', 123, 3, 14, 29, 57, '2023-10-14 08:50:50'),
(0, 'A', 124, 3, 14, 30, 59, '2023-10-14 08:50:50'),
(0, 'A', 125, 3, 14, 31, 62, '2023-10-14 08:50:50'),
(0, 'A', 126, 3, 14, 32, 64, '2023-10-14 08:50:50'),
(0, 'A', 127, 3, 14, 33, 66, '2023-10-14 08:50:50'),
(0, 'A', 128, 3, 14, 34, 67, '2023-10-14 08:50:50'),
(0, 'A', 129, 3, 14, 35, 69, '2023-10-14 08:50:50'),
(0, 'A', 130, 3, 14, 36, 71, '2023-10-14 08:50:50'),
(0, 'A', 131, 3, 14, 37, 74, '2023-10-14 08:50:50'),
(0, 'A', 132, 3, 14, 38, 75, '2023-10-14 08:50:50'),
(0, 'A', 133, 3, 14, 39, 77, '2023-10-14 08:50:50'),
(0, 'A', 134, 3, 14, 40, 79, '2023-10-14 08:50:50'),
(0, 'A', 135, 3, 14, 41, 82, '2023-10-14 08:50:50'),
(0, 'A', 136, 3, 14, 42, 84, '2023-10-14 08:50:50'),
(0, 'A', 137, 3, 14, 43, 85, '2023-10-14 08:50:50'),
(0, 'A', 138, 3, 14, 44, 87, '2023-10-14 08:50:50'),
(0, 'A', 139, 3, 14, 45, 90, '2023-10-14 08:50:50'),
(0, 'A', 140, 3, 14, 46, 92, '2023-10-14 08:50:50'),
(0, 'A', 141, 3, 14, 47, 93, '2023-10-14 08:50:50'),
(0, 'A', 142, 3, 14, 48, 95, '2023-10-14 08:50:50'),
(0, 'A', 143, 3, 14, 49, 98, '2023-10-14 08:50:50'),
(0, 'A', 144, 3, 14, 50, 100, '2023-10-14 08:50:51'),
(0, 'A', 145, 3, 14, 51, 101, '2023-10-14 08:50:51'),
(0, 'A', 146, 3, 14, 52, 103, '2023-10-14 08:50:51'),
(0, 'A', 147, 3, 14, 53, 106, '2023-10-14 08:50:51'),
(0, 'A', 148, 3, 14, 54, 108, '2023-10-14 08:50:51'),
(0, 'A', 149, 3, 14, 55, 110, '2023-10-14 08:50:51'),
(0, 'A', 150, 3, 14, 56, 112, '2023-10-14 08:50:51'),
(0, 'A', 151, 3, 14, 57, 113, '2023-10-14 08:50:51'),
(0, 'A', 152, 3, 14, 58, 115, '2023-10-14 08:50:51'),
(0, 'A', 153, 3, 14, 59, 117, '2023-10-14 08:50:51'),
(0, 'A', 154, 3, 14, 60, 119, '2023-10-14 08:50:51'),
(0, 'A', 155, 3, 14, 61, 122, '2023-10-14 08:50:51'),
(0, 'A', 156, 3, 14, 62, 124, '2023-10-14 08:50:51'),
(0, 'A', 157, 3, 14, 63, 126, '2023-10-14 08:50:51'),
(0, 'A', 158, 6, 19, 1, 1, '2023-10-17 18:49:01'),
(0, 'A', 159, 6, 19, 2, 4, '2023-10-17 18:49:01'),
(0, 'A', 160, 6, 19, 3, 5, '2023-10-17 18:49:01'),
(0, 'A', 161, 6, 19, 4, 8, '2023-10-17 18:49:01'),
(0, 'A', 162, 6, 19, 5, 9, '2023-10-17 18:49:01'),
(0, 'A', 163, 6, 19, 6, 11, '2023-10-17 18:49:01'),
(0, 'A', 164, 6, 19, 7, 14, '2023-10-17 18:49:01'),
(0, 'A', 165, 6, 19, 8, 16, '2023-10-17 18:49:01'),
(0, 'A', 166, 6, 19, 9, 18, '2023-10-17 18:49:01'),
(0, 'A', 167, 6, 19, 10, 20, '2023-10-17 18:49:01'),
(0, 'A', 168, 6, 19, 11, 23, '2023-10-17 18:49:01'),
(0, 'A', 169, 6, 19, 12, 25, '2023-10-17 18:49:01'),
(0, 'A', 170, 6, 19, 13, 26, '2023-10-17 18:49:01'),
(0, 'A', 171, 6, 19, 14, 28, '2023-10-17 18:49:01'),
(0, 'A', 172, 6, 19, 15, 31, '2023-10-17 18:49:01'),
(0, 'A', 173, 6, 19, 16, 33, '2023-10-17 18:49:01'),
(0, 'A', 174, 6, 19, 17, 34, '2023-10-17 18:49:01'),
(0, 'A', 175, 6, 19, 18, 36, '2023-10-17 18:49:01'),
(0, 'A', 176, 6, 19, 19, 26, '2023-10-17 18:49:01'),
(0, 'A', 177, 6, 19, 20, 40, '2023-10-17 18:49:01'),
(0, 'A', 178, 6, 19, 21, 41, '2023-10-17 18:49:01'),
(0, 'A', 179, 6, 19, 22, 43, '2023-10-17 18:49:01'),
(0, 'A', 180, 6, 19, 23, 45, '2023-10-17 18:49:01'),
(0, 'A', 181, 6, 19, 24, 48, '2023-10-17 18:49:01'),
(0, 'A', 182, 6, 19, 25, 50, '2023-10-17 18:49:01'),
(0, 'A', 183, 6, 19, 26, 51, '2023-10-17 18:49:01'),
(0, 'A', 184, 6, 19, 27, 53, '2023-10-17 18:49:01'),
(0, 'A', 185, 6, 19, 28, 56, '2023-10-17 18:49:02'),
(0, 'A', 186, 6, 19, 29, 58, '2023-10-17 18:49:02'),
(0, 'A', 187, 6, 19, 30, 59, '2023-10-17 18:49:02'),
(0, 'A', 188, 6, 19, 31, 61, '2023-10-17 18:49:02'),
(0, 'A', 189, 6, 19, 32, 64, '2023-10-17 18:49:02'),
(0, 'A', 190, 6, 19, 33, 66, '2023-10-17 18:49:02'),
(0, 'A', 191, 6, 19, 34, 67, '2023-10-17 18:49:02'),
(0, 'A', 192, 6, 19, 35, 69, '2023-10-17 18:49:02'),
(0, 'A', 193, 6, 19, 36, 71, '2023-10-17 18:49:02'),
(0, 'A', 194, 6, 19, 37, 73, '2023-10-17 18:49:02'),
(0, 'A', 195, 6, 19, 38, 76, '2023-10-17 18:49:02'),
(0, 'A', 196, 6, 19, 39, 78, '2023-10-17 18:49:02'),
(0, 'A', 197, 6, 19, 40, 79, '2023-10-17 18:49:02'),
(0, 'A', 198, 6, 19, 41, 81, '2023-10-17 18:49:02'),
(0, 'A', 199, 6, 19, 42, 83, '2023-10-17 18:49:02'),
(0, 'A', 200, 6, 19, 43, 85, '2023-10-17 18:49:02'),
(0, 'A', 201, 6, 19, 44, 87, '2023-10-17 18:49:02'),
(0, 'A', 202, 6, 19, 45, 90, '2023-10-17 18:49:02'),
(0, 'A', 203, 6, 19, 46, 92, '2023-10-17 18:49:02'),
(0, 'A', 204, 6, 19, 47, 93, '2023-10-17 18:49:02'),
(0, 'A', 205, 6, 19, 48, 95, '2023-10-17 18:49:02'),
(0, 'A', 206, 6, 19, 49, 98, '2023-10-17 18:49:02'),
(0, 'A', 207, 6, 19, 50, 100, '2023-10-17 18:49:02'),
(0, 'A', 208, 6, 19, 51, 101, '2023-10-17 18:49:02'),
(0, 'A', 209, 6, 19, 52, 103, '2023-10-17 18:49:02'),
(0, 'A', 210, 6, 19, 53, 106, '2023-10-17 18:49:02'),
(0, 'A', 211, 6, 19, 54, 107, '2023-10-17 18:49:02'),
(0, 'A', 212, 6, 19, 55, 110, '2023-10-17 18:49:02'),
(0, 'A', 213, 6, 19, 56, 112, '2023-10-17 18:49:02'),
(0, 'A', 214, 6, 19, 57, 113, '2023-10-17 18:49:02'),
(0, 'A', 215, 6, 19, 58, 115, '2023-10-17 18:49:02'),
(0, 'A', 216, 6, 19, 59, 118, '2023-10-17 18:49:02'),
(0, 'A', 217, 6, 19, 60, 120, '2023-10-17 18:49:02'),
(0, 'A', 218, 6, 19, 61, 121, '2023-10-17 18:49:02'),
(0, 'A', 219, 6, 19, 62, 123, '2023-10-17 18:49:02'),
(0, 'A', 220, 6, 19, 63, 125, '2023-10-17 18:49:02'),
(0, 'A', 221, 7, 20, 1, 1, '2023-10-17 21:59:03'),
(0, 'A', 222, 7, 20, 2, 3, '2023-10-17 21:59:03'),
(0, 'A', 223, 7, 20, 3, 6, '2023-10-17 21:59:03'),
(0, 'A', 224, 7, 20, 4, 7, '2023-10-17 21:59:03'),
(0, 'A', 225, 7, 20, 5, 9, '2023-10-17 21:59:03'),
(0, 'A', 226, 7, 20, 6, 12, '2023-10-17 21:59:03'),
(0, 'A', 227, 7, 20, 7, 13, '2023-10-17 21:59:03'),
(0, 'A', 228, 7, 20, 8, 17, '2023-10-17 21:59:03'),
(0, 'A', 229, 7, 20, 9, 19, '2023-10-17 21:59:03'),
(0, 'A', 230, 7, 20, 10, 20, '2023-10-17 21:59:03'),
(0, 'A', 231, 7, 20, 11, 22, '2023-10-17 21:59:03'),
(0, 'A', 232, 7, 20, 12, 25, '2023-10-17 21:59:03'),
(0, 'A', 233, 7, 20, 13, 27, '2023-10-17 21:59:03'),
(0, 'A', 234, 7, 20, 14, 28, '2023-10-17 21:59:03'),
(0, 'A', 235, 7, 20, 15, 30, '2023-10-17 21:59:03'),
(0, 'A', 236, 7, 20, 16, 33, '2023-10-17 21:59:03'),
(0, 'A', 237, 7, 20, 17, 35, '2023-10-17 21:59:03'),
(0, 'A', 238, 7, 20, 18, 36, '2023-10-17 21:59:03'),
(0, 'A', 239, 7, 20, 19, 38, '2023-10-17 21:59:03'),
(0, 'A', 240, 7, 20, 20, 39, '2023-10-17 21:59:03'),
(0, 'A', 241, 7, 20, 21, 42, '2023-10-17 21:59:03'),
(0, 'A', 242, 7, 20, 22, 43, '2023-10-17 21:59:03'),
(0, 'A', 243, 7, 20, 23, 45, '2023-10-17 21:59:03'),
(0, 'A', 244, 7, 20, 24, 48, '2023-10-17 21:59:03'),
(0, 'A', 245, 7, 20, 25, 50, '2023-10-17 21:59:03'),
(0, 'A', 246, 7, 20, 26, 52, '2023-10-17 21:59:03'),
(0, 'A', 247, 7, 20, 27, 53, '2023-10-17 21:59:04'),
(0, 'A', 248, 7, 20, 28, 55, '2023-10-17 21:59:04'),
(0, 'A', 249, 7, 20, 29, 57, '2023-10-17 21:59:04'),
(0, 'A', 250, 7, 20, 30, 60, '2023-10-17 21:59:04'),
(0, 'A', 251, 7, 20, 31, 62, '2023-10-17 21:59:04'),
(0, 'A', 252, 7, 20, 32, 64, '2023-10-17 21:59:04'),
(0, 'A', 253, 7, 20, 33, 65, '2023-10-17 21:59:04'),
(0, 'A', 254, 7, 20, 34, 67, '2023-10-17 21:59:04'),
(0, 'A', 255, 7, 20, 35, 69, '2023-10-17 21:59:04'),
(0, 'A', 256, 7, 20, 36, 72, '2023-10-17 21:59:04'),
(0, 'A', 257, 7, 20, 37, 74, '2023-10-17 21:59:04'),
(0, 'A', 258, 7, 20, 38, 75, '2023-10-17 21:59:04'),
(0, 'A', 259, 7, 20, 39, 77, '2023-10-17 21:59:04'),
(0, 'A', 260, 7, 20, 40, 79, '2023-10-17 21:59:04'),
(0, 'A', 261, 7, 20, 41, 82, '2023-10-17 21:59:04'),
(0, 'A', 262, 7, 20, 42, 84, '2023-10-17 21:59:04'),
(0, 'A', 263, 7, 20, 43, 85, '2023-10-17 21:59:04'),
(0, 'A', 264, 7, 20, 44, 87, '2023-10-17 21:59:04'),
(0, 'A', 265, 7, 20, 45, 90, '2023-10-17 21:59:04'),
(0, 'A', 266, 7, 20, 46, 92, '2023-10-17 21:59:04'),
(0, 'A', 267, 7, 20, 47, 94, '2023-10-17 21:59:04'),
(0, 'A', 268, 7, 20, 48, 95, '2023-10-17 21:59:04'),
(0, 'A', 269, 7, 20, 49, 97, '2023-10-17 21:59:04'),
(0, 'A', 270, 7, 20, 50, 100, '2023-10-17 21:59:04'),
(0, 'A', 271, 7, 20, 51, 102, '2023-10-17 21:59:04'),
(0, 'A', 272, 7, 20, 52, 103, '2023-10-17 21:59:04'),
(0, 'A', 273, 7, 20, 53, 105, '2023-10-17 21:59:04'),
(0, 'A', 274, 7, 20, 54, 108, '2023-10-17 21:59:04'),
(0, 'A', 275, 7, 20, 55, 109, '2023-10-17 21:59:04'),
(0, 'A', 276, 7, 20, 56, 111, '2023-10-17 21:59:04'),
(0, 'A', 277, 7, 20, 57, 113, '2023-10-17 21:59:04'),
(0, 'A', 278, 7, 20, 58, 116, '2023-10-17 21:59:04'),
(0, 'A', 279, 7, 20, 59, 118, '2023-10-17 21:59:04'),
(0, 'A', 280, 7, 20, 60, 119, '2023-10-17 21:59:05'),
(0, 'A', 281, 7, 20, 61, 121, '2023-10-17 21:59:05'),
(0, 'A', 282, 7, 20, 62, 123, '2023-10-17 21:59:05'),
(0, 'A', 283, 7, 20, 63, 126, '2023-10-17 21:59:05'),
(0, 'A', 284, 9, 24, 1, 1, '2023-10-17 22:25:31'),
(0, 'A', 285, 9, 24, 2, 3, '2023-10-17 22:25:31'),
(0, 'A', 286, 9, 24, 3, 5, '2023-10-17 22:25:31'),
(0, 'A', 287, 9, 24, 4, 7, '2023-10-17 22:25:31'),
(0, 'A', 288, 9, 24, 5, 9, '2023-10-17 22:25:31'),
(0, 'A', 289, 9, 24, 6, 12, '2023-10-17 22:25:31'),
(0, 'A', 290, 9, 24, 7, 14, '2023-10-17 22:25:31'),
(0, 'A', 291, 9, 24, 8, 16, '2023-10-17 22:25:31'),
(0, 'A', 292, 9, 24, 9, 19, '2023-10-17 22:25:31'),
(0, 'A', 293, 9, 24, 10, 21, '2023-10-17 22:25:31'),
(0, 'A', 294, 9, 24, 11, 22, '2023-10-17 22:25:31'),
(0, 'A', 295, 9, 24, 12, 24, '2023-10-17 22:25:31'),
(0, 'A', 296, 9, 24, 13, 26, '2023-10-17 22:25:31'),
(0, 'A', 297, 9, 24, 14, 28, '2023-10-17 22:25:31'),
(0, 'A', 298, 9, 24, 15, 30, '2023-10-17 22:25:31'),
(0, 'A', 299, 9, 24, 16, 33, '2023-10-17 22:25:31'),
(0, 'A', 300, 9, 24, 17, 35, '2023-10-17 22:25:31'),
(0, 'A', 301, 9, 24, 18, 37, '2023-10-17 22:25:31'),
(0, 'A', 302, 9, 24, 19, 26, '2023-10-17 22:25:31'),
(0, 'A', 303, 9, 24, 20, 40, '2023-10-17 22:25:31'),
(0, 'A', 304, 9, 24, 21, 41, '2023-10-17 22:25:31'),
(0, 'A', 305, 9, 24, 22, 43, '2023-10-17 22:25:31'),
(0, 'A', 306, 9, 24, 23, 45, '2023-10-17 22:25:32'),
(0, 'A', 307, 9, 24, 24, 47, '2023-10-17 22:25:32'),
(0, 'A', 308, 9, 24, 25, 49, '2023-10-17 22:25:32'),
(0, 'A', 309, 9, 24, 26, 52, '2023-10-17 22:25:32'),
(0, 'A', 310, 9, 24, 27, 54, '2023-10-17 22:25:32'),
(0, 'A', 311, 9, 24, 28, 56, '2023-10-17 22:25:32'),
(0, 'A', 312, 9, 24, 29, 58, '2023-10-17 22:25:32'),
(0, 'A', 313, 9, 24, 30, 60, '2023-10-17 22:25:32'),
(0, 'A', 314, 9, 24, 31, 61, '2023-10-17 22:25:32'),
(0, 'A', 315, 9, 24, 32, 63, '2023-10-17 22:25:32'),
(0, 'A', 316, 9, 24, 33, 65, '2023-10-17 22:25:32'),
(0, 'A', 317, 9, 24, 34, 67, '2023-10-17 22:25:32'),
(0, 'A', 318, 9, 24, 35, 69, '2023-10-17 22:25:32'),
(0, 'A', 319, 9, 24, 36, 72, '2023-10-17 22:25:32'),
(0, 'A', 320, 9, 24, 37, 74, '2023-10-17 22:25:32'),
(0, 'A', 321, 9, 24, 38, 76, '2023-10-17 22:25:32'),
(0, 'A', 322, 9, 24, 39, 78, '2023-10-17 22:25:32'),
(0, 'A', 323, 9, 24, 40, 79, '2023-10-17 22:25:32'),
(0, 'A', 324, 9, 24, 41, 81, '2023-10-17 22:25:32'),
(0, 'A', 325, 9, 24, 42, 83, '2023-10-17 22:25:32'),
(0, 'A', 326, 9, 24, 43, 85, '2023-10-17 22:25:32'),
(0, 'A', 327, 9, 24, 44, 87, '2023-10-17 22:25:32'),
(0, 'A', 328, 9, 24, 45, 89, '2023-10-17 22:25:32'),
(0, 'A', 329, 9, 24, 46, 91, '2023-10-17 22:25:32'),
(0, 'A', 330, 9, 24, 47, 94, '2023-10-17 22:25:32'),
(0, 'A', 331, 9, 24, 48, 96, '2023-10-17 22:25:32'),
(0, 'A', 332, 9, 24, 49, 98, '2023-10-17 22:25:32'),
(0, 'A', 333, 9, 24, 50, 100, '2023-10-17 22:25:33'),
(0, 'A', 334, 9, 24, 51, 102, '2023-10-17 22:25:33'),
(0, 'A', 335, 9, 24, 52, 103, '2023-10-17 22:25:33'),
(0, 'A', 336, 9, 24, 53, 105, '2023-10-17 22:25:33'),
(0, 'A', 337, 9, 24, 54, 107, '2023-10-17 22:25:33'),
(0, 'A', 338, 9, 24, 55, 109, '2023-10-17 22:25:33'),
(0, 'A', 339, 9, 24, 56, 111, '2023-10-17 22:25:33'),
(0, 'A', 340, 9, 24, 57, 113, '2023-10-17 22:25:33'),
(0, 'A', 341, 9, 24, 58, 116, '2023-10-17 22:25:33'),
(0, 'A', 342, 9, 24, 59, 118, '2023-10-17 22:25:33'),
(0, 'A', 343, 9, 24, 60, 120, '2023-10-17 22:25:33'),
(0, 'A', 344, 9, 24, 61, 122, '2023-10-17 22:25:33'),
(0, 'A', 345, 9, 24, 62, 124, '2023-10-17 22:25:33'),
(0, 'A', 346, 9, 24, 63, 125, '2023-10-17 22:25:33');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_test01_result_details`
--

INSERT INTO `student_test01_result_details` (`finact`, `status`, `student_test01_result_details_key`, `studenttestmas_key`, `student_key`, `test1_areamas_key`, `result`) VALUES
(0, 'A', 1, 2, 13, 1, 10),
(0, 'A', 2, 2, 13, 2, 11),
(0, 'A', 3, 2, 13, 3, 7),
(0, 'A', 4, 2, 13, 4, 9),
(0, 'A', 5, 2, 13, 5, 7),
(0, 'A', 6, 2, 13, 6, 11),
(0, 'A', 7, 2, 13, 7, 8),
(0, 'A', 8, 3, 14, 1, 9),
(0, 'A', 9, 3, 14, 2, 11),
(0, 'A', 10, 3, 14, 3, 9),
(0, 'A', 11, 3, 14, 4, 9),
(0, 'A', 12, 3, 14, 5, 7),
(0, 'A', 13, 3, 14, 6, 9),
(0, 'A', 14, 3, 14, 7, 8),
(0, 'A', 15, 0, 0, 1, 0),
(0, 'A', 16, 0, 0, 2, 0),
(0, 'A', 17, 0, 0, 3, 0),
(0, 'A', 18, 0, 0, 4, 0),
(0, 'A', 19, 0, 0, 5, 0),
(0, 'A', 20, 0, 0, 6, 0),
(0, 'A', 21, 0, 0, 7, 0),
(0, 'A', 22, 4, 16, 1, 0),
(0, 'A', 23, 4, 16, 2, 0),
(0, 'A', 24, 4, 16, 3, 0),
(0, 'A', 25, 4, 16, 4, 0),
(0, 'A', 26, 4, 16, 5, 0),
(0, 'A', 27, 4, 16, 6, 0),
(0, 'A', 28, 4, 16, 7, 0),
(0, 'A', 29, 6, 19, 1, 8),
(0, 'A', 30, 6, 19, 2, 10),
(0, 'A', 31, 6, 19, 3, 6),
(0, 'A', 32, 6, 19, 4, 11),
(0, 'A', 33, 6, 19, 5, 8),
(0, 'A', 34, 6, 19, 6, 10),
(0, 'A', 35, 6, 19, 7, 10),
(0, 'A', 36, 7, 20, 1, 7),
(0, 'A', 37, 7, 20, 2, 10),
(0, 'A', 38, 7, 20, 3, 9),
(0, 'A', 39, 7, 20, 4, 6),
(0, 'A', 40, 7, 20, 5, 10),
(0, 'A', 41, 7, 20, 6, 9),
(0, 'A', 42, 7, 20, 7, 11),
(0, 'A', 43, 9, 24, 1, 9),
(0, 'A', 44, 9, 24, 2, 12),
(0, 'A', 45, 9, 24, 3, 7),
(0, 'A', 46, 9, 24, 4, 12),
(0, 'A', 47, 9, 24, 5, 6),
(0, 'A', 48, 9, 24, 6, 11),
(0, 'A', 49, 9, 24, 7, 6);

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_test02_details`
--

INSERT INTO `student_test02_details` (`finact`, `status`, `student_test02_details_key`, `studenttestmas_key`, `student_key`, `test2questionmas_key`, `resuts`, `sys_enterdte`) VALUES
(0, 'A', 1, 4, 16, 1, 2, '2023-10-15 15:16:18'),
(0, 'A', 2, 4, 16, 2, 1, '2023-10-15 15:16:18'),
(0, 'A', 3, 4, 16, 3, 1, '2023-10-15 15:16:18'),
(0, 'A', 4, 4, 16, 4, 2, '2023-10-15 15:16:18'),
(0, 'A', 5, 4, 16, 5, 1, '2023-10-15 15:16:18'),
(0, 'A', 6, 4, 16, 6, 1, '2023-10-15 15:16:18'),
(0, 'A', 7, 4, 16, 7, 0, '2023-10-15 15:16:18'),
(0, 'A', 8, 4, 16, 8, 1, '2023-10-15 15:16:18'),
(0, 'A', 9, 4, 16, 9, 1, '2023-10-15 15:16:18'),
(0, 'A', 10, 4, 16, 10, 2, '2023-10-15 15:16:18'),
(0, 'A', 11, 4, 16, 11, 0, '2023-10-15 15:16:18'),
(0, 'A', 12, 4, 16, 12, 0, '2023-10-15 15:16:18'),
(0, 'A', 13, 4, 16, 13, 2, '2023-10-15 15:16:18'),
(0, 'A', 14, 4, 16, 14, 1, '2023-10-15 15:16:18'),
(0, 'A', 15, 4, 16, 15, 0, '2023-10-15 15:16:18'),
(0, 'A', 16, 4, 16, 16, 2, '2023-10-15 15:16:18'),
(0, 'A', 17, 4, 16, 17, 1, '2023-10-15 15:16:18'),
(0, 'A', 18, 4, 16, 18, 2, '2023-10-15 15:16:18'),
(0, 'A', 19, 4, 16, 19, 2, '2023-10-15 15:16:18'),
(0, 'A', 20, 4, 16, 20, 2, '2023-10-15 15:16:19'),
(0, 'A', 21, 4, 16, 21, 1, '2023-10-15 15:16:19'),
(0, 'A', 22, 4, 16, 22, 1, '2023-10-15 15:16:19'),
(0, 'A', 23, 4, 16, 23, 1, '2023-10-15 15:16:19'),
(0, 'A', 24, 4, 16, 24, 2, '2023-10-15 15:16:19'),
(0, 'A', 25, 4, 16, 25, 1, '2023-10-15 15:16:19'),
(0, 'A', 26, 4, 16, 26, 2, '2023-10-15 15:16:19'),
(0, 'A', 27, 4, 16, 27, 1, '2023-10-15 15:16:19'),
(0, 'A', 28, 4, 16, 28, 1, '2023-10-15 15:16:19'),
(0, 'A', 29, 4, 16, 29, 2, '2023-10-15 15:16:19'),
(0, 'A', 30, 4, 16, 30, 1, '2023-10-15 15:16:19'),
(0, 'A', 31, 4, 16, 31, 1, '2023-10-15 15:16:19'),
(0, 'A', 32, 4, 16, 32, 1, '2023-10-15 15:16:19'),
(0, 'A', 33, 4, 16, 33, 2, '2023-10-15 15:16:19'),
(0, 'A', 34, 4, 16, 34, 2, '2023-10-15 15:16:19'),
(0, 'A', 35, 4, 16, 35, 2, '2023-10-15 15:16:19'),
(0, 'A', 36, 4, 16, 36, 1, '2023-10-15 15:16:19'),
(0, 'A', 37, 4, 16, 37, 2, '2023-10-15 15:16:19'),
(0, 'A', 38, 4, 16, 38, 0, '2023-10-15 15:16:19'),
(0, 'A', 39, 4, 16, 39, 0, '2023-10-15 15:16:19'),
(0, 'A', 40, 4, 16, 40, 1, '2023-10-15 15:16:19'),
(0, 'A', 41, 4, 16, 41, 0, '2023-10-15 15:16:19'),
(0, 'A', 42, 4, 16, 42, 2, '2023-10-15 15:16:19'),
(0, 'A', 43, 4, 16, 43, 2, '2023-10-15 15:16:19'),
(0, 'A', 44, 4, 16, 44, 0, '2023-10-15 15:16:19'),
(0, 'A', 45, 4, 16, 45, 1, '2023-10-15 15:16:19'),
(0, 'A', 46, 4, 16, 46, 2, '2023-10-15 15:16:19'),
(0, 'A', 47, 4, 16, 47, 2, '2023-10-15 15:16:19'),
(0, 'A', 48, 4, 16, 48, 1, '2023-10-15 15:16:19'),
(0, 'A', 49, 4, 16, 49, 1, '2023-10-15 15:16:19'),
(0, 'A', 50, 4, 16, 50, 1, '2023-10-15 15:16:19'),
(0, 'A', 51, 4, 16, 51, 0, '2023-10-15 15:16:19'),
(0, 'A', 52, 4, 16, 52, 2, '2023-10-15 15:16:19'),
(0, 'A', 53, 4, 16, 53, 2, '2023-10-15 15:16:19'),
(0, 'A', 54, 4, 16, 54, 1, '2023-10-15 15:16:20'),
(0, 'A', 55, 4, 16, 55, 1, '2023-10-15 15:16:20'),
(0, 'A', 56, 4, 16, 56, 1, '2023-10-15 15:16:20'),
(0, 'A', 57, 4, 16, 57, 1, '2023-10-15 15:16:20'),
(0, 'A', 58, 4, 16, 58, 2, '2023-10-15 15:16:20'),
(0, 'A', 59, 4, 16, 59, 2, '2023-10-15 15:16:20'),
(0, 'A', 60, 4, 16, 60, 1, '2023-10-15 15:16:20'),
(0, 'A', 61, 4, 16, 61, 0, '2023-10-15 15:16:20'),
(0, 'A', 62, 4, 16, 62, 0, '2023-10-15 15:16:20'),
(0, 'A', 63, 4, 16, 63, 1, '2023-10-15 15:16:20'),
(0, 'A', 64, 4, 16, 64, 1, '2023-10-15 15:16:20'),
(0, 'A', 65, 4, 16, 65, 2, '2023-10-15 15:16:20'),
(0, 'A', 66, 4, 16, 66, 1, '2023-10-15 15:16:20'),
(0, 'A', 67, 4, 16, 67, 2, '2023-10-15 15:16:20'),
(0, 'A', 68, 5, 17, 1, 2, '2023-10-17 08:58:10'),
(0, 'A', 69, 5, 17, 2, 1, '2023-10-17 08:58:10'),
(0, 'A', 70, 5, 17, 3, 1, '2023-10-17 08:58:10'),
(0, 'A', 71, 5, 17, 4, 2, '2023-10-17 08:58:10'),
(0, 'A', 72, 5, 17, 5, 1, '2023-10-17 08:58:10'),
(0, 'A', 73, 5, 17, 6, 1, '2023-10-17 08:58:10'),
(0, 'A', 74, 5, 17, 7, 2, '2023-10-17 08:58:10'),
(0, 'A', 75, 5, 17, 8, 0, '2023-10-17 08:58:10'),
(0, 'A', 76, 5, 17, 9, 1, '2023-10-17 08:58:10'),
(0, 'A', 77, 5, 17, 10, 2, '2023-10-17 08:58:10'),
(0, 'A', 78, 5, 17, 11, 2, '2023-10-17 08:58:10'),
(0, 'A', 79, 5, 17, 12, 2, '2023-10-17 08:58:10'),
(0, 'A', 80, 5, 17, 13, 2, '2023-10-17 08:58:10'),
(0, 'A', 81, 5, 17, 14, 1, '2023-10-17 08:58:10'),
(0, 'A', 82, 5, 17, 15, 1, '2023-10-17 08:58:10'),
(0, 'A', 83, 5, 17, 16, 0, '2023-10-17 08:58:10'),
(0, 'A', 84, 5, 17, 17, 1, '2023-10-17 08:58:10'),
(0, 'A', 85, 5, 17, 18, 1, '2023-10-17 08:58:10'),
(0, 'A', 86, 5, 17, 19, 2, '2023-10-17 08:58:10'),
(0, 'A', 87, 5, 17, 20, 1, '2023-10-17 08:58:10'),
(0, 'A', 88, 5, 17, 21, 2, '2023-10-17 08:58:10'),
(0, 'A', 89, 5, 17, 22, 1, '2023-10-17 08:58:10'),
(0, 'A', 90, 5, 17, 23, 2, '2023-10-17 08:58:10'),
(0, 'A', 91, 5, 17, 24, 0, '2023-10-17 08:58:11'),
(0, 'A', 92, 5, 17, 25, 0, '2023-10-17 08:58:11'),
(0, 'A', 93, 5, 17, 26, 0, '2023-10-17 08:58:11'),
(0, 'A', 94, 5, 17, 27, 0, '2023-10-17 08:58:11'),
(0, 'A', 95, 5, 17, 28, 1, '2023-10-17 08:58:11'),
(0, 'A', 96, 5, 17, 29, 1, '2023-10-17 08:58:11'),
(0, 'A', 97, 5, 17, 30, 2, '2023-10-17 08:58:11'),
(0, 'A', 98, 5, 17, 31, 1, '2023-10-17 08:58:11'),
(0, 'A', 99, 5, 17, 32, 2, '2023-10-17 08:58:11'),
(0, 'A', 100, 5, 17, 33, 1, '2023-10-17 08:58:11'),
(0, 'A', 101, 5, 17, 34, 2, '2023-10-17 08:58:11'),
(0, 'A', 102, 5, 17, 35, 1, '2023-10-17 08:58:11'),
(0, 'A', 103, 5, 17, 36, 2, '2023-10-17 08:58:11'),
(0, 'A', 104, 5, 17, 37, 2, '2023-10-17 08:58:11'),
(0, 'A', 105, 5, 17, 38, 1, '2023-10-17 08:58:11'),
(0, 'A', 106, 5, 17, 39, 0, '2023-10-17 08:58:11'),
(0, 'A', 107, 5, 17, 40, 1, '2023-10-17 08:58:11'),
(0, 'A', 108, 5, 17, 41, 1, '2023-10-17 08:58:11'),
(0, 'A', 109, 5, 17, 42, 2, '2023-10-17 08:58:11'),
(0, 'A', 110, 5, 17, 43, 1, '2023-10-17 08:58:11'),
(0, 'A', 111, 5, 17, 44, 0, '2023-10-17 08:58:11'),
(0, 'A', 112, 5, 17, 45, 1, '2023-10-17 08:58:11'),
(0, 'A', 113, 5, 17, 46, 2, '2023-10-17 08:58:11'),
(0, 'A', 114, 5, 17, 47, 2, '2023-10-17 08:58:11'),
(0, 'A', 115, 5, 17, 48, 2, '2023-10-17 08:58:11'),
(0, 'A', 116, 5, 17, 49, 1, '2023-10-17 08:58:11'),
(0, 'A', 117, 5, 17, 50, 0, '2023-10-17 08:58:11'),
(0, 'A', 118, 5, 17, 51, 2, '2023-10-17 08:58:11'),
(0, 'A', 119, 5, 17, 52, 2, '2023-10-17 08:58:11'),
(0, 'A', 120, 5, 17, 53, 1, '2023-10-17 08:58:11'),
(0, 'A', 121, 5, 17, 54, 0, '2023-10-17 08:58:11'),
(0, 'A', 122, 5, 17, 55, 2, '2023-10-17 08:58:11'),
(0, 'A', 123, 5, 17, 56, 2, '2023-10-17 08:58:11'),
(0, 'A', 124, 5, 17, 57, 2, '2023-10-17 08:58:11'),
(0, 'A', 125, 5, 17, 58, 1, '2023-10-17 08:58:11'),
(0, 'A', 126, 5, 17, 59, 1, '2023-10-17 08:58:11'),
(0, 'A', 127, 5, 17, 60, 2, '2023-10-17 08:58:11'),
(0, 'A', 128, 5, 17, 61, 1, '2023-10-17 08:58:11'),
(0, 'A', 129, 5, 17, 62, 0, '2023-10-17 08:58:12'),
(0, 'A', 130, 5, 17, 64, 0, '2023-10-17 08:58:12'),
(0, 'A', 131, 5, 17, 65, 2, '2023-10-17 08:58:12'),
(0, 'A', 132, 5, 17, 66, 1, '2023-10-17 08:58:12'),
(0, 'A', 133, 5, 17, 67, 0, '2023-10-17 08:58:12'),
(0, 'A', 134, 8, 21, 1, 2, '2023-10-17 22:08:27'),
(0, 'A', 135, 8, 21, 2, 1, '2023-10-17 22:08:27'),
(0, 'A', 136, 8, 21, 3, 1, '2023-10-17 22:08:27'),
(0, 'A', 137, 8, 21, 4, 1, '2023-10-17 22:08:27'),
(0, 'A', 138, 8, 21, 5, 1, '2023-10-17 22:08:27'),
(0, 'A', 139, 8, 21, 6, 1, '2023-10-17 22:08:27'),
(0, 'A', 140, 8, 21, 7, 1, '2023-10-17 22:08:27'),
(0, 'A', 141, 8, 21, 8, 2, '2023-10-17 22:08:27'),
(0, 'A', 142, 8, 21, 9, 1, '2023-10-17 22:08:27'),
(0, 'A', 143, 8, 21, 10, 0, '2023-10-17 22:08:27'),
(0, 'A', 144, 8, 21, 11, 1, '2023-10-17 22:08:27'),
(0, 'A', 145, 8, 21, 12, 1, '2023-10-17 22:08:27'),
(0, 'A', 146, 8, 21, 13, 2, '2023-10-17 22:08:27'),
(0, 'A', 147, 8, 21, 14, 1, '2023-10-17 22:08:27'),
(0, 'A', 148, 8, 21, 15, 1, '2023-10-17 22:08:27'),
(0, 'A', 149, 8, 21, 16, 0, '2023-10-17 22:08:27'),
(0, 'A', 150, 8, 21, 17, 2, '2023-10-17 22:08:28'),
(0, 'A', 151, 8, 21, 18, 1, '2023-10-17 22:08:28'),
(0, 'A', 152, 8, 21, 19, 0, '2023-10-17 22:08:28'),
(0, 'A', 153, 8, 21, 20, 2, '2023-10-17 22:08:28'),
(0, 'A', 154, 8, 21, 21, 2, '2023-10-17 22:08:28'),
(0, 'A', 155, 8, 21, 22, 1, '2023-10-17 22:08:28'),
(0, 'A', 156, 8, 21, 23, 1, '2023-10-17 22:08:28'),
(0, 'A', 157, 8, 21, 24, 0, '2023-10-17 22:08:28'),
(0, 'A', 158, 8, 21, 25, 2, '2023-10-17 22:08:28'),
(0, 'A', 159, 8, 21, 26, 2, '2023-10-17 22:08:28'),
(0, 'A', 160, 8, 21, 27, 1, '2023-10-17 22:08:28'),
(0, 'A', 161, 8, 21, 28, 1, '2023-10-17 22:08:28'),
(0, 'A', 162, 8, 21, 29, 1, '2023-10-17 22:08:28'),
(0, 'A', 163, 8, 21, 30, 2, '2023-10-17 22:08:28'),
(0, 'A', 164, 8, 21, 31, 0, '2023-10-17 22:08:28'),
(0, 'A', 165, 8, 21, 32, 2, '2023-10-17 22:08:28'),
(0, 'A', 166, 8, 21, 33, 2, '2023-10-17 22:08:28'),
(0, 'A', 167, 8, 21, 34, 1, '2023-10-17 22:08:28'),
(0, 'A', 168, 8, 21, 35, 2, '2023-10-17 22:08:28'),
(0, 'A', 169, 8, 21, 36, 2, '2023-10-17 22:08:28'),
(0, 'A', 170, 8, 21, 37, 1, '2023-10-17 22:08:28'),
(0, 'A', 171, 8, 21, 38, 1, '2023-10-17 22:08:28'),
(0, 'A', 172, 8, 21, 39, 1, '2023-10-17 22:08:28'),
(0, 'A', 173, 8, 21, 40, 1, '2023-10-17 22:08:28'),
(0, 'A', 174, 8, 21, 41, 0, '2023-10-17 22:08:28'),
(0, 'A', 175, 8, 21, 42, 2, '2023-10-17 22:08:28'),
(0, 'A', 176, 8, 21, 43, 1, '2023-10-17 22:08:28'),
(0, 'A', 177, 8, 21, 44, 0, '2023-10-17 22:08:28'),
(0, 'A', 178, 8, 21, 45, 2, '2023-10-17 22:08:28'),
(0, 'A', 179, 8, 21, 46, 1, '2023-10-17 22:08:28'),
(0, 'A', 180, 8, 21, 47, 1, '2023-10-17 22:08:28'),
(0, 'A', 181, 8, 21, 48, 2, '2023-10-17 22:08:28'),
(0, 'A', 182, 8, 21, 49, 2, '2023-10-17 22:08:28'),
(0, 'A', 183, 8, 21, 50, 1, '2023-10-17 22:08:29'),
(0, 'A', 184, 8, 21, 51, 2, '2023-10-17 22:08:29'),
(0, 'A', 185, 8, 21, 52, 2, '2023-10-17 22:08:29'),
(0, 'A', 186, 8, 21, 53, 1, '2023-10-17 22:08:29'),
(0, 'A', 187, 8, 21, 54, 1, '2023-10-17 22:08:29'),
(0, 'A', 188, 8, 21, 55, 2, '2023-10-17 22:08:29'),
(0, 'A', 189, 8, 21, 56, 1, '2023-10-17 22:08:29'),
(0, 'A', 190, 8, 21, 57, 1, '2023-10-17 22:08:29'),
(0, 'A', 191, 8, 21, 58, 2, '2023-10-17 22:08:29'),
(0, 'A', 192, 8, 21, 59, 1, '2023-10-17 22:08:29'),
(0, 'A', 193, 8, 21, 60, 2, '2023-10-17 22:08:29'),
(0, 'A', 194, 8, 21, 61, 2, '2023-10-17 22:08:29'),
(0, 'A', 195, 8, 21, 62, 0, '2023-10-17 22:08:29'),
(0, 'A', 196, 8, 21, 64, 1, '2023-10-17 22:08:29'),
(0, 'A', 197, 8, 21, 65, 2, '2023-10-17 22:08:29'),
(0, 'A', 198, 8, 21, 66, 2, '2023-10-17 22:08:29'),
(0, 'A', 199, 8, 21, 67, 1, '2023-10-17 22:08:29');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_test02_result_details`
--

INSERT INTO `student_test02_result_details` (`finact`, `status`, `student_test02_result_details_key`, `studenttestmas_key`, `student_key`, `test2_areamas_key`, `result`) VALUES
(0, 'A', 1, 4, 16, 1, 16),
(0, 'A', 2, 4, 16, 2, 12),
(0, 'A', 3, 4, 16, 3, 14),
(0, 'A', 4, 4, 16, 4, 15),
(0, 'A', 5, 4, 16, 5, 13),
(0, 'A', 6, 4, 16, 6, 10),
(0, 'A', 7, 5, 17, 1, 12),
(0, 'A', 8, 5, 17, 2, 12),
(0, 'A', 9, 5, 17, 3, 19),
(0, 'A', 10, 5, 17, 4, 14),
(0, 'A', 11, 5, 17, 5, 11),
(0, 'A', 12, 5, 17, 6, 11),
(0, 'A', 13, 8, 21, 1, 15),
(0, 'A', 14, 8, 21, 2, 16),
(0, 'A', 15, 8, 21, 3, 13),
(0, 'A', 16, 8, 21, 4, 14),
(0, 'A', 17, 8, 21, 5, 12),
(0, 'A', 18, 8, 21, 6, 13);

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_test_master`
--

INSERT INTO `student_test_master` (`finact`, `status`, `student_testmas_key`, `test_dte`, `student_key`, `test_type`, `complete_status`, `sys_enterdte`) VALUES
(0, 'A', 1, '2023-10-11', 12, 'Test01', 1, '2023-10-11 22:48:05'),
(0, 'A', 2, '2023-10-13', 13, 'Test01', 1, '2023-10-13 17:55:04'),
(0, 'A', 3, '2023-10-14', 14, 'Test01', 1, '2023-10-14 08:50:49'),
(0, 'A', 4, '2023-10-15', 16, 'Test02', 1, '2023-10-15 15:16:18'),
(0, 'A', 5, '2023-10-17', 17, 'Test02', 1, '2023-10-17 08:58:10'),
(0, 'A', 6, '2023-10-17', 19, 'Test01', 1, '2023-10-17 18:49:00'),
(0, 'A', 7, '2023-10-17', 20, 'Test01', 1, '2023-10-17 21:59:03'),
(0, 'A', 8, '2023-10-17', 21, 'Test02', 1, '2023-10-17 22:08:27'),
(0, 'A', 9, '2023-10-17', 24, 'Test01', 1, '2023-10-17 22:25:31');

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `approve_status` int(11) DEFAULT NULL,
  `training_point_nme` varchar(700) DEFAULT NULL,
  `training_point_designation` varchar(400) DEFAULT NULL,
  `approve_person_key` int(11) DEFAULT NULL,
  `approve_dte` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_trainingpoint_master`
--

INSERT INTO `student_trainingpoint_master` (`finact`, `status`, `student_trainingpoint_mas_key`, `student_key`, `course_key`, `coursebatch_detail_key`, `sys_enterdte`, `approve_status`, `training_point_nme`, `training_point_designation`, `approve_person_key`, `approve_dte`) VALUES
(0, 'A', 1, 21, 1, 1, '2023-10-19 15:24:19', 1, 'Dansinan Farm', 'Training Supervisor', 1, '2023-10-19 02:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `test1_area_master`
--

CREATE TABLE `test1_area_master` (
  `finact` int(1) NOT NULL,
  `status` varchar(2) NOT NULL,
  `test1_area_master_key` int(11) NOT NULL,
  `area_name` varchar(500) NOT NULL,
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test1_questionmgt_master`
--

INSERT INTO `test1_questionmgt_master` (`finact`, `status`, `test1_questionmgt_mas_key`, `type`, `question_a_key`, `question_b_key`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 'Job', 1, 2, '2023-10-11 18:43:34', 1),
(0, 'A', 2, 'Job', 3, 4, '2023-10-11 18:43:54', 1),
(0, 'A', 3, 'Job', 5, 6, '2023-10-11 18:44:34', 1),
(0, 'A', 4, 'Job', 7, 8, '2023-10-11 18:45:04', 1),
(0, 'A', 5, 'Job', 9, 10, '2023-10-11 18:45:31', 1),
(0, 'A', 6, 'Job', 11, 12, '2023-10-11 18:46:00', 1),
(0, 'A', 7, 'Job', 13, 14, '2023-10-11 18:46:54', 1),
(0, 'A', 8, 'Job', 17, 16, '2023-10-11 18:47:40', 1),
(0, 'A', 9, 'Job', 18, 19, '2023-10-11 18:49:18', 1),
(0, 'A', 10, 'Job', 20, 21, '2023-10-11 18:49:52', 1),
(0, 'A', 11, 'Job', 22, 23, '2023-10-11 18:50:16', 1),
(0, 'A', 12, 'Job', 24, 25, '2023-10-11 18:51:30', 1),
(0, 'A', 13, 'Job', 26, 27, '2023-10-11 18:52:38', 1),
(0, 'A', 14, 'Job', 28, 29, '2023-10-11 18:53:12', 1),
(0, 'A', 15, 'Job', 30, 31, '2023-10-11 18:54:29', 1),
(0, 'A', 16, 'Job', 32, 33, '2023-10-11 18:55:04', 1),
(0, 'A', 17, 'Job', 34, 35, '2023-10-11 18:57:27', 1),
(0, 'A', 18, 'Job', 36, 37, '2023-10-11 18:58:00', 1),
(0, 'A', 19, 'Job', 38, 26, '2023-10-11 18:58:44', 1),
(0, 'A', 20, 'Job', 39, 40, '2023-10-11 18:59:34', 1),
(0, 'A', 21, 'Job', 41, 42, '2023-10-11 18:59:57', 1),
(0, 'A', 22, 'Course', 43, 44, '2023-10-11 19:00:26', 1),
(0, 'A', 23, 'Course', 45, 46, '2023-10-11 19:00:56', 1),
(0, 'A', 24, 'Course', 47, 48, '2023-10-11 19:01:29', 1),
(0, 'A', 25, 'Course', 49, 50, '2023-10-11 19:02:09', 1),
(0, 'A', 26, 'Course', 51, 52, '2023-10-11 19:02:35', 1),
(0, 'A', 27, 'Course', 53, 54, '2023-10-11 19:03:08', 1),
(0, 'A', 28, 'Course', 55, 56, '2023-10-11 19:03:40', 1),
(0, 'A', 29, 'Course', 57, 58, '2023-10-11 19:04:04', 1),
(0, 'A', 30, 'Course', 59, 60, '2023-10-11 19:04:27', 1),
(0, 'A', 31, 'Course', 61, 62, '2023-10-11 19:05:18', 1),
(0, 'A', 32, 'Course', 63, 64, '2023-10-11 19:05:47', 1),
(0, 'A', 33, 'Course', 65, 66, '2023-10-11 19:06:13', 1),
(0, 'A', 34, 'Course', 67, 68, '2023-10-11 19:06:50', 1),
(0, 'A', 35, 'Course', 69, 70, '2023-10-11 19:07:19', 1),
(0, 'A', 36, 'Course', 71, 72, '2023-10-11 19:07:44', 1),
(0, 'A', 37, 'Course', 73, 74, '2023-10-11 19:08:37', 1),
(0, 'A', 38, 'Course', 75, 76, '2023-10-11 19:09:10', 1),
(0, 'A', 39, 'Course', 77, 78, '2023-10-11 19:09:55', 1),
(0, 'A', 40, 'Course', 79, 80, '2023-10-11 19:10:17', 1),
(0, 'A', 41, 'Course', 81, 82, '2023-10-11 19:10:41', 1),
(0, 'A', 42, 'Course', 83, 84, '2023-10-11 19:11:02', 1),
(0, 'A', 43, 'Activity', 85, 86, '2023-10-11 19:11:32', 1),
(0, 'A', 44, 'Activity', 87, 88, '2023-10-11 19:12:03', 1),
(0, 'A', 45, 'Activity', 89, 90, '2023-10-11 19:12:23', 1),
(0, 'A', 46, 'Activity', 91, 92, '2023-10-11 19:12:47', 1),
(0, 'A', 47, 'Activity', 93, 94, '2023-10-11 19:13:14', 1),
(0, 'A', 48, 'Activity', 95, 96, '2023-10-11 19:13:46', 1),
(0, 'A', 49, 'Activity', 97, 98, '2023-10-11 19:14:29', 1),
(0, 'A', 50, 'Activity', 99, 100, '2023-10-11 19:14:59', 1),
(0, 'A', 51, 'Activity', 101, 102, '2023-10-11 19:15:22', 1),
(0, 'A', 52, 'Activity', 103, 104, '2023-10-11 19:15:49', 1),
(0, 'A', 53, 'Activity', 105, 106, '2023-10-11 19:17:03', 1),
(0, 'A', 54, 'Job', 107, 108, '2023-10-11 19:17:51', 1),
(0, 'A', 55, 'Job', 109, 110, '2023-10-11 19:18:34', 1),
(0, 'A', 56, 'Job', 111, 112, '2023-10-11 19:19:15', 1),
(0, 'A', 57, 'Job', 113, 114, '2023-10-11 19:19:45', 1),
(0, 'A', 58, 'Job', 115, 116, '2023-10-11 19:20:19', 1),
(0, 'A', 59, 'Job', 117, 118, '2023-10-11 19:20:48', 1),
(0, 'A', 60, 'Job', 119, 120, '2023-10-11 19:21:28', 1),
(0, 'A', 61, 'Job', 121, 122, '2023-10-11 19:21:57', 1),
(0, 'A', 62, 'Job', 123, 124, '2023-10-11 19:22:22', 1),
(0, 'A', 63, 'Job', 125, 126, '2023-10-11 19:22:53', 1);

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test1_question_master`
--

INSERT INTO `test1_question_master` (`finact`, `status`, `test1questionmas_key`, `test1_areamas_key`, `type`, `question_name`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 1, 'Job', 'Agriculture', '2023-10-11 22:41:24', 1),
(0, 'A', 2, 2, 'Job', 'Machine Repair', '2023-10-11 22:42:05', 1),
(0, 'A', 3, 3, 'Job', 'Diagnosis of diseases', '2023-10-12 08:10:47', 1),
(0, 'A', 4, 2, 'Job', 'Flying an airplane', '2023-10-12 08:12:06', 1),
(0, 'A', 5, 4, 'Job', 'Building planning', '2023-10-12 08:12:52', 1),
(0, 'A', 6, 3, 'Job', 'Working in a laboratory', '2023-10-12 08:13:32', 1),
(0, 'A', 7, 7, 'Job', 'Helping families solve problems', '2023-10-12 08:14:14', 1),
(0, 'A', 8, 4, 'Job', 'Drawing', '2023-10-12 08:19:55', 1),
(0, 'A', 9, 6, 'Job', 'Preparation of tax returns', '2023-10-12 08:20:47', 1),
(0, 'A', 10, 5, 'Job', 'Supervise employees', '2023-10-12 08:21:27', 1),
(0, 'A', 11, 5, 'Job', 'Meeting customers', '2023-10-12 08:22:05', 1),
(0, 'A', 12, 7, 'Job', 'Taking care of children', '2023-10-12 08:22:32', 1),
(0, 'A', 13, 1, 'Job', 'Land surveying', '2023-10-12 08:23:07', 1),
(0, 'A', 14, 3, 'Job', 'Selling medicine', '2023-10-12 08:23:48', 1),
(0, 'A', 15, 4, 'Job', 'Diamond ring making', '2023-10-12 08:24:29', 1),
(0, 'A', 16, 2, 'Job', 'Making electric lamps', '2023-10-12 08:25:25', 1),
(0, 'A', 17, 7, 'Job', 'Helping patients in the hospital', '2023-10-12 08:30:21', 1),
(0, 'A', 18, 3, 'Job', 'Disability Muscle Massage', '2023-10-12 08:31:02', 1),
(0, 'A', 19, 5, 'Job', 'Travel planning', '2023-10-12 08:31:41', 1),
(0, 'A', 20, 4, 'Job', 'Playing in a band', '2023-10-12 08:32:33', 1),
(0, 'A', 21, 7, 'Job', 'Teaching in a school', '2023-10-12 08:33:10', 1),
(0, 'A', 22, 2, 'Job', 'Bridge design', '2023-10-12 08:33:46', 1),
(0, 'A', 23, 1, 'Job', 'Training for sports', '2023-10-12 08:34:17', 1),
(0, 'A', 24, 4, 'Job', 'Acting in a Drama', '2023-10-12 08:35:05', 1),
(0, 'A', 25, 5, 'Job', 'Being a shopkeeper', '2023-10-12 08:35:39', 1),
(0, 'A', 26, 2, 'Job', 'Computer repair', '2023-10-12 08:36:17', 1),
(0, 'A', 27, 5, 'Job', 'Being a lawyer', '2023-10-12 08:36:46', 1),
(0, 'A', 28, 3, 'Job', 'Being a veterinarian', '2023-10-12 08:37:19', 1),
(0, 'A', 29, 6, 'Job', 'Managing a library', '2023-10-12 08:38:30', 1),
(0, 'A', 30, 4, 'Job', 'Writing articles for a newspaper', '2023-10-12 08:39:22', 1),
(0, 'A', 31, 1, 'Job', 'Forest conservation', '2023-10-12 08:40:00', 1),
(0, 'A', 32, 7, 'Job', 'Being a surgeon', '2023-10-12 08:40:40', 1),
(0, 'A', 33, 6, 'Job', 'Approval of a home loan', '2023-10-12 08:41:16', 1),
(0, 'A', 34, 2, 'Job', 'Building a house', '2023-10-12 08:41:44', 1),
(0, 'A', 35, 6, 'Job', 'Computer software manufacturing', '2023-10-12 08:42:22', 1),
(0, 'A', 36, 4, 'Job', 'Dental technician', '2023-10-12 08:42:56', 1),
(0, 'A', 37, 1, 'Job', 'Garden setting', '2023-10-12 08:43:36', 1),
(0, 'A', 38, 6, 'Job', 'Financial analysis of accounts', '2023-10-12 08:44:11', 1),
(0, 'A', 39, 7, 'Job', 'Employment counseling', '2023-10-12 08:44:29', 1),
(0, 'A', 40, 1, 'Job', 'Lorry driver', '2023-10-12 08:45:06', 1),
(0, 'A', 41, 6, 'Job', 'Work in an office', '2023-10-12 08:45:40', 1),
(0, 'A', 42, 1, 'Course', 'Geography', '2023-10-12 08:46:25', 1),
(0, 'A', 43, 2, 'Course', 'Mechanical traction', '2023-10-12 08:47:15', 1),
(0, 'A', 44, 3, 'Course', 'Chemistry', '2023-10-12 08:47:44', 1),
(0, 'A', 45, 2, 'Course', 'Metal work', '2023-10-12 08:48:16', 1),
(0, 'A', 46, 4, 'Course', 'Music', '2023-10-12 08:49:08', 1),
(0, 'A', 47, 3, 'Course', 'Biology', '2023-10-12 08:49:33', 1),
(0, 'A', 48, 7, 'Course', 'Home Science', '2023-10-12 08:50:22', 1),
(0, 'A', 49, 4, 'Course', 'Writing poetry', '2023-10-12 08:50:56', 1),
(0, 'A', 50, 6, 'Course', 'Mathematics', '2023-10-12 08:51:35', 1),
(0, 'A', 51, 5, 'Course', 'Commerce', '2023-10-12 08:52:01', 1),
(0, 'A', 52, 5, 'Course', 'Business', '2023-10-12 08:53:00', 1),
(0, 'A', 53, 7, 'Course', 'Health services', '2023-10-12 08:53:34', 1),
(0, 'A', 54, 1, 'Course', 'Agriculture', '2023-10-12 08:54:07', 1),
(0, 'A', 55, 3, 'Course', 'Physics', '2023-10-12 08:54:45', 1),
(0, 'A', 56, 4, 'Course', 'Textile industry', '2023-10-12 08:55:46', 1),
(0, 'A', 57, 2, 'Course', 'Carpentry', '2023-10-12 08:56:21', 1),
(0, 'A', 58, 7, 'Course', 'History', '2023-10-12 08:56:59', 1),
(0, 'A', 59, 3, 'Course', 'Geology', '2023-10-12 08:57:37', 1),
(0, 'A', 60, 5, 'Course', 'Economics', '2023-10-12 08:58:16', 1),
(0, 'A', 61, 4, 'Course', 'Dramatic art', '2023-10-12 08:58:51', 1),
(0, 'A', 62, 7, 'Course', 'Religion', '2023-10-12 08:59:37', 1),
(0, 'A', 63, 2, 'Course', 'Engineering', '2023-10-12 09:00:21', 1),
(0, 'A', 64, 1, 'Course', 'Zoology', '2023-10-12 09:00:54', 1),
(0, 'A', 65, 4, 'Course', 'Photography', '2023-10-12 09:01:26', 1),
(0, 'A', 66, 5, 'Course', 'Retail trade', '2023-10-12 09:09:33', 1),
(0, 'A', 67, 2, 'Course', 'Plumbing industry', '2023-10-12 09:10:32', 1),
(0, 'A', 68, 5, 'Course', 'Political science', '2023-10-12 09:11:02', 1),
(0, 'A', 69, 3, 'Course', 'Botany', '2023-10-12 09:11:33', 1),
(0, 'A', 70, 6, 'Course', 'The study of correspondence', '2023-10-12 09:12:28', 1),
(0, 'A', 71, 4, 'Course', 'Art', '2023-10-12 09:12:48', 1),
(0, 'A', 72, 1, 'Course', 'Ecology', '2023-10-12 13:57:06', 1),
(0, 'A', 73, 7, 'Course', 'Social science', '2023-10-12 13:57:47', 1),
(0, 'A', 74, 6, 'Course', 'Court of Auditors', '2023-10-12 13:58:35', 1),
(0, 'A', 75, 2, 'Course', 'Electronics', '2023-10-12 13:59:05', 1),
(0, 'A', 76, 6, 'Course', 'Computer Science', '2023-10-12 13:59:40', 1),
(0, 'A', 77, 3, 'Course', 'Medical profession', '2023-10-12 14:06:30', 1),
(0, 'A', 78, 1, 'Course', 'Physical education', '2023-10-12 14:08:46', 1),
(0, 'A', 79, 5, 'Course', 'Advertisement', '2023-10-12 14:27:22', 1),
(0, 'A', 80, 6, 'Course', 'Librarian', '2023-10-12 14:28:03', 1),
(0, 'A', 81, 7, 'Course', 'Education / Teaching', '2023-10-12 14:28:27', 1),
(0, 'A', 82, 1, 'Course', 'Architecture', '2023-10-12 14:30:37', 1),
(0, 'A', 83, 6, 'Course', 'Management', '2023-10-12 14:31:14', 1),
(0, 'A', 84, 1, 'Activity', 'Caring for animals', '2023-10-12 14:31:34', 1),
(0, 'A', 85, 2, 'Activity', 'Activating Power Tools', '2023-10-12 14:31:57', 1),
(0, 'A', 86, 3, 'Activity', 'Doing a research', '2023-10-12 14:32:17', 1),
(0, 'A', 87, 2, 'Activity', 'Car repair', '2023-10-12 14:32:47', 1),
(0, 'A', 88, 4, 'Activity', 'Sculpting', '2023-10-12 14:33:11', 1),
(0, 'A', 89, 3, 'Activity', 'Animal research', '2023-10-12 14:33:39', 1),
(0, 'A', 90, 7, 'Activity', 'Helping people solve problems', '2023-10-12 14:34:14', 1),
(0, 'A', 91, 4, 'Activity', 'Painting a scene', '2023-10-12 14:35:00', 1),
(0, 'A', 92, 6, 'Activity', 'Working part time in an office', '2023-10-12 14:36:22', 1),
(0, 'A', 93, 5, 'Activity', 'Selling clothes in a shop', '2023-10-12 14:37:00', 1),
(0, 'A', 94, 5, 'Activity', 'Supervise others', '2023-10-12 14:37:28', 1),
(0, 'A', 95, 7, 'Activity', 'Helping the sick', '2023-10-12 14:38:05', 1),
(0, 'A', 96, 1, 'Activity', 'Driving a boat', '2023-10-12 14:38:44', 1),
(0, 'A', 97, 3, 'Activity', 'Learning Astrology', '2023-10-12 14:39:06', 1),
(0, 'A', 98, 4, 'Activity', 'Acting in a Drama', '2023-10-12 14:39:34', 1),
(0, 'A', 99, 2, 'Activity', 'Printing a magazine', '2023-10-12 14:40:42', 1),
(0, 'A', 100, 7, 'Activity', 'Interviews with people', '2023-10-12 14:41:17', 1),
(0, 'A', 101, 3, 'Activity', 'Watching a science show', '2023-10-12 14:41:48', 1),
(0, 'A', 102, 5, 'Activity', 'Directing a drama', '2023-10-12 14:42:44', 1),
(0, 'A', 103, 4, 'Activity', 'Writing a song', '2023-10-12 14:43:33', 1),
(0, 'A', 104, 7, 'Activity', 'Answering peoples queries', '2023-10-12 14:44:05', 1),
(0, 'A', 105, 2, 'Activity', 'To separate parts of something', '2023-10-12 14:44:42', 1),
(0, 'A', 106, 1, 'Job', 'Fishing', '2023-10-12 14:45:13', 1),
(0, 'A', 107, 4, 'Job', 'Taking photos', '2023-10-12 14:45:58', 1),
(0, 'A', 108, 5, 'Job', 'Processing of advertisements', '2023-10-12 14:46:57', 1),
(0, 'A', 109, 2, 'Job', 'Furniture repair', '2023-10-12 14:47:48', 1),
(0, 'A', 110, 5, 'Job', 'Advising customers', '2023-10-12 14:48:31', 1),
(0, 'A', 111, 3, 'Job', 'Collection of rock samples', '2023-10-12 14:49:01', 1),
(0, 'A', 112, 6, 'Job', 'Preparing a research report', '2023-10-12 14:49:47', 1),
(0, 'A', 113, 4, 'Job', 'Writing a story', '2023-10-12 14:50:37', 1),
(0, 'A', 114, 1, 'Job', 'Walking for fun', '2023-10-12 14:51:11', 1),
(0, 'A', 115, 7, 'Job', 'Playing a game', '2023-10-12 14:52:47', 1),
(0, 'A', 116, 6, 'Job', 'Being the treasurer of an association', '2023-10-12 14:53:20', 1),
(0, 'A', 117, 2, 'Job', 'Assembling fun games', '2023-10-12 14:54:51', 1),
(0, 'A', 118, 6, 'Job', 'Assisting in the work of a library', '2023-10-12 14:56:01', 1),
(0, 'A', 119, 3, 'Job', 'Collection of weather information', '2023-10-12 14:56:35', 1),
(0, 'A', 120, 1, 'Job', 'Driving a tractor', '2023-10-12 14:56:59', 1),
(0, 'A', 121, 5, 'Job', 'Managing a shop', '2023-10-12 14:57:21', 1),
(0, 'A', 122, 6, 'Job', 'Computer programming', '2023-10-12 14:58:54', 1),
(0, 'A', 123, 7, 'Job', 'Training of new staff', '2023-10-12 14:59:10', 1),
(0, 'A', 124, 1, 'Job', 'Working in the garden', '2023-10-12 14:59:50', 1),
(0, 'A', 125, 6, 'Job', 'Typing', '2023-10-12 15:00:15', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test2_area_master`
--

INSERT INTO `test2_area_master` (`finact`, `status`, `test2_area_master_key`, `area_name`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 'R', '2023-08-31 17:43:38', 1),
(0, 'A', 2, 'I', '2023-08-31 17:43:38', 1),
(0, 'A', 3, 'A', '2023-08-31 17:43:38', 1),
(0, 'A', 4, 'S', '2023-08-31 17:43:38', 1),
(0, 'A', 5, 'E', '2023-08-31 17:43:38', 1),
(0, 'A', 6, 'C', '2023-08-31 17:43:38', 1);

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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test2_question_master`
--

INSERT INTO `test2_question_master` (`finact`, `status`, `test2questionmas_key`, `test2_areamas_key`, `type`, `question_name`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 1, 'Self Description', 'I like to work with animals, equipment or machinery.', '2023-10-14 20:26:09', 1),
(0, 'A', 2, 1, 'Self Description', 'Compared to others my age, I have a high ability to work with equipment, machinery or animals and mechanical pulls.', '2023-10-14 20:27:16', 1),
(0, 'A', 3, 1, 'Self Description', 'I appreciate practicality. Likes to nurture and make better the trees and animals that can be seen and touched', '2023-10-14 20:31:59', 1),
(0, 'A', 4, 1, 'Self Description', 'I like practical, mechanical and realistic.', '2023-10-14 20:32:40', 1),
(0, 'A', 5, 2, 'Self Description', 'I like to learn and solve math or science problems', '2023-10-14 20:33:32', 1),
(0, 'A', 6, 2, 'Self Description', 'Compared to others my age, I have a higher ability to understand and solve math and science problems.', '2023-10-14 20:34:05', 1),
(0, 'A', 7, 2, 'Self Description', 'I appreciate science.', '2023-10-14 20:34:29', 1),
(0, 'A', 8, 2, 'Self Description', 'I am meticulous, scientific and intelligent.', '2023-10-14 20:35:06', 1),
(0, 'A', 9, 3, 'Self Description', 'I like to do creative things like painting, drama, arts and crafts, dance, music or creative writing.', '2023-10-14 20:35:51', 1),
(0, 'A', 10, 3, 'Self Description', 'Compared to others of my age, I have high skills in creative writing, drama, arts, music, and painting.', '2023-10-14 20:36:17', 1),
(0, 'A', 11, 3, 'Self Description', 'I appreciate the creative works of art such as drama, music and art created by creative writers.', '2023-10-14 20:36:54', 1),
(0, 'A', 12, 3, 'Self Description', 'I am an independent person with brilliant artistic and imaginative ability.', '2023-10-14 20:37:47', 1),
(0, 'A', 13, 4, 'Self Description', 'I like to do things that can help people like teaching, first aid, providing information.', '2023-10-14 20:38:42', 1),
(0, 'A', 14, 4, 'Self Description', 'Compared to others of my age, I am particularly good at teaching, counseling, assisting or providing information.', '2023-10-14 20:39:25', 1),
(0, 'A', 15, 4, 'Self Description', 'I value helping people and solving social problems.', '2023-10-14 20:39:59', 1),
(0, 'A', 16, 4, 'Self Description', 'I am a helpful, friendly and reliable person.', '2023-10-14 20:41:08', 1),
(0, 'A', 17, 5, 'Self Description', 'I am highly skilled at leading and directing people and selling ideas and things.', '2023-10-14 20:41:50', 1),
(0, 'A', 18, 5, 'Self Description', 'Compared to other people my age, I have superior skills in managing people and selling things.', '2023-10-14 20:44:03', 1),
(0, 'A', 19, 5, 'Self Description', 'I appreciate politics, leadership and business.', '2023-10-14 20:44:34', 1),
(0, 'A', 20, 5, 'Self Description', 'I am enthusiastic, determined and sociable.', '2023-10-14 20:45:38', 1),
(0, 'A', 21, 6, 'Self Description', 'I prefer to work systematically with numbers, reports or machinery.', '2023-10-14 20:46:30', 1),
(0, 'A', 22, 6, 'Self Description', 'Compared to others of my age, I have a high level of ability to work with numbers and written reports in an orderly and systematic manner.', '2023-10-14 20:46:58', 1),
(0, 'A', 23, 6, 'Self Description', 'I appreciate success in business.', '2023-10-14 20:47:31', 1),
(0, 'A', 24, 6, 'Self Description', 'I am systematic and able to follow what I plan well.', '2023-10-14 20:48:05', 1),
(0, 'A', 25, 1, 'Jobs', 'Bus Driver', '2023-10-14 20:49:12', 1),
(0, 'A', 26, 1, 'Jobs', 'Truck Mechanic', '2023-10-14 20:49:42', 1),
(0, 'A', 27, 1, 'Jobs', 'Carpenter', '2023-10-14 20:50:20', 1),
(0, 'A', 28, 4, 'Jobs', 'Physical Therapist', '2023-10-14 20:51:08', 1),
(0, 'A', 29, 4, 'Jobs', 'Counsellor', '2023-10-14 20:51:31', 1),
(0, 'A', 30, 4, 'Jobs', 'Social Workers', '2023-10-14 20:51:51', 1),
(0, 'A', 31, 1, 'Jobs', 'Fish and Farm Warden', '2023-10-14 20:52:48', 1),
(0, 'A', 32, 1, 'Jobs', 'Airplane Pilot', '2023-10-14 20:53:20', 1),
(0, 'A', 33, 1, 'Jobs', 'Mechanical Engineer', '2023-10-14 20:53:51', 1),
(0, 'A', 34, 4, 'Jobs', 'Librarian', '2023-10-14 20:54:28', 1),
(0, 'A', 35, 4, 'Jobs', 'Speech Therapist', '2023-10-14 20:55:00', 1),
(0, 'A', 36, 4, 'Jobs', 'Teacher', '2023-10-14 20:55:25', 1),
(0, 'A', 37, 1, 'Jobs', 'Farmer', '2023-10-14 20:55:46', 1),
(0, 'A', 38, 6, 'Jobs', 'Bank Examiner', '2023-10-14 20:56:10', 1),
(0, 'A', 39, 6, 'Jobs', 'Tax Expert', '2023-10-14 20:57:30', 1),
(0, 'A', 40, 4, 'Jobs', 'Nurse', '2023-10-14 20:57:48', 1),
(0, 'A', 41, 3, 'Jobs', 'Actor/Actress', '2023-10-14 20:58:17', 1),
(0, 'A', 42, 3, 'Jobs', 'Novelist', '2023-10-14 20:58:40', 1),
(0, 'A', 43, 6, 'Jobs', 'Insurance Clerk', '2023-10-14 20:59:25', 1),
(0, 'A', 44, 6, 'Jobs', 'Bookkeeper', '2023-10-14 20:59:48', 1),
(0, 'A', 45, 6, 'Jobs', 'Business Teacher', '2023-10-14 21:00:14', 1),
(0, 'A', 46, 3, 'Jobs', 'Clothes Designer', '2023-10-14 21:00:55', 1),
(0, 'A', 47, 3, 'Jobs', 'Artist', '2023-10-14 21:01:10', 1),
(0, 'A', 48, 3, 'Jobs', 'Singer', '2023-10-14 21:01:30', 1),
(0, 'A', 49, 6, 'Jobs', 'Court Stenographer', '2023-10-14 21:02:23', 1),
(0, 'A', 50, 5, 'Jobs', 'Sales Manager', '2023-10-14 21:03:02', 1),
(0, 'A', 51, 5, 'Jobs', 'Sales Person', '2023-10-14 21:03:33', 1),
(0, 'A', 52, 3, 'Jobs', 'Dancer', '2023-10-14 21:04:03', 1),
(0, 'A', 53, 2, 'Jobs', 'Chemist', '2023-10-14 21:04:35', 1),
(0, 'A', 54, 2, 'Jobs', 'Electrical Engineer', '2023-10-14 21:05:13', 1),
(0, 'A', 55, 6, 'Jobs', 'Bank Teller', '2023-10-14 21:05:43', 1),
(0, 'A', 56, 5, 'Jobs', 'Apartment Manager', '2023-10-14 21:06:18', 1),
(0, 'A', 57, 5, 'Jobs', 'Restaurant Manager', '2023-10-14 21:07:04', 1),
(0, 'A', 58, 3, 'Jobs', 'Musician', '2023-10-14 21:07:34', 1),
(0, 'A', 59, 2, 'Jobs', 'Astronomer', '2023-10-14 21:08:12', 1),
(0, 'A', 60, 2, 'Jobs', 'Chemical Technician', '2023-10-14 21:09:19', 1),
(0, 'A', 61, 2, 'Jobs', 'Biologist', '2023-10-14 21:09:54', 1),
(0, 'A', 62, 5, 'Jobs', 'Radio/TV Announcer', '2023-10-14 21:10:37', 1),
(0, 'A', 64, 5, 'Jobs', 'Lawyer', '2023-10-14 21:11:49', 1),
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
  `sys_enterdte` datetime NOT NULL DEFAULT current_timestamp(),
  `act_person` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`finact`, `status`, `usermaster_key`, `name`, `designation`, `user_level`, `user_nme`, `password`, `sys_enterdte`, `act_person`) VALUES
(0, 'A', 1, 'Lahiru', 'Asdd', 'Carrer Guide Officer', 'la', '202cb962ac59075b964b07152d234b70', '2023-09-01 09:28:36', 1),
(0, 'A', 2, 'Asd', 'Registar', 'VP', 'sa', '202cb962ac59075b964b07152d234b70', '2023-09-01 09:45:40', 0),
(0, 'A', 3, 'Channa', 'fff', 'HOD', 'ho', '202cb962ac59075b964b07152d234b70', '2023-09-23 12:59:47', 1);

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
  MODIFY `appoinment_mas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_loan_master`
--
ALTER TABLE `business_loan_master`
  MODIFY `business_loan_master_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coursetype_master`
--
ALTER TABLE `coursetype_master`
  MODIFY `coursetype_mas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_batch_details`
--
ALTER TABLE `course_batch_details`
  MODIFY `course_batch_details_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_level_master`
--
ALTER TABLE `course_level_master`
  MODIFY `courselevelmas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_master`
--
ALTER TABLE `course_master`
  MODIFY `coursemas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_qualification_details`
--
ALTER TABLE `course_qualification_details`
  MODIFY `coursequalification_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `creditpoint_master`
--
ALTER TABLE `creditpoint_master`
  MODIFY `creditpointmas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `examsubject_master`
--
ALTER TABLE `examsubject_master`
  MODIFY `examsubjectmas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_master`
--
ALTER TABLE `exam_master`
  MODIFY `exammas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_businessloan_details`
--
ALTER TABLE `student_businessloan_details`
  MODIFY `student_businessloan_details_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_course_details`
--
ALTER TABLE `student_course_details`
  MODIFY `studentcoursedetail_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_exam_details`
--
ALTER TABLE `student_exam_details`
  MODIFY `student_exam_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_master`
--
ALTER TABLE `student_master`
  MODIFY `studentmas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student_newselected_course_details`
--
ALTER TABLE `student_newselected_course_details`
  MODIFY `student_newselected_course_details_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_qualification_details`
--
ALTER TABLE `student_qualification_details`
  MODIFY `studentqualification_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `student_test01_details`
--
ALTER TABLE `student_test01_details`
  MODIFY `student_test01_details_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `student_test01_result_details`
--
ALTER TABLE `student_test01_result_details`
  MODIFY `student_test01_result_details_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `student_test02_details`
--
ALTER TABLE `student_test02_details`
  MODIFY `student_test02_details_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `student_test02_result_details`
--
ALTER TABLE `student_test02_result_details`
  MODIFY `student_test02_result_details_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_test_master`
--
ALTER TABLE `student_test_master`
  MODIFY `student_testmas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_trainingpoint_master`
--
ALTER TABLE `student_trainingpoint_master`
  MODIFY `student_trainingpoint_mas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test1_area_master`
--
ALTER TABLE `test1_area_master`
  MODIFY `test1_area_master_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `test1_questionmgt_master`
--
ALTER TABLE `test1_questionmgt_master`
  MODIFY `test1_questionmgt_mas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `test1_question_master`
--
ALTER TABLE `test1_question_master`
  MODIFY `test1questionmas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `test2_area_master`
--
ALTER TABLE `test2_area_master`
  MODIFY `test2_area_master_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `test2_question_master`
--
ALTER TABLE `test2_question_master`
  MODIFY `test2questionmas_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `usermaster_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
