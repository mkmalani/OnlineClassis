-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 05:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classis_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `lname` varchar(150) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `department` varchar(150) NOT NULL,
  `is_disabled` int(11) NOT NULL,
  `ucode` varchar(100) NOT NULL,
  `is_confirm` int(11) NOT NULL,
  `user_type` enum('SuperAdmin','Admin','User') NOT NULL,
  `created_at` datetime NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`id`, `name`, `lname`, `email`, `password`, `department`, `is_disabled`, `ucode`, `is_confirm`, `user_type`, `created_at`, `created_date`, `updated_date`) VALUES
(1, 'SuperAdmin', 'mk', 'superadmin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '', 1, 'SuperAdmin', '2018-11-01 13:52:09', '2019-12-27 06:35:56', '2020-06-05 17:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `class_master`
--

CREATE TABLE `class_master` (
  `Class_RowId` int(11) NOT NULL,
  `Class_SchoolId` int(11) NOT NULL,
  `Class_RoomNo` int(11) NOT NULL,
  `Class_StandsId` int(11) NOT NULL,
  `Class_DivisionName` varchar(50) NOT NULL,
  `Class_Length` varchar(15) NOT NULL,
  `Class_TeacherId` int(11) NOT NULL,
  `Class_AddDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Class_AddBy` varchar(255) NOT NULL,
  `Class_ModDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Class_ModBy` varchar(255) NOT NULL,
  `Class_IsActDct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `homework_master`
--

CREATE TABLE `homework_master` (
  `homework_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `Class_RowId` int(11) NOT NULL,
  `Homework_date` date NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_master`
--

CREATE TABLE `login_master` (
  `Login_RowId` int(11) NOT NULL,
  `Login_SchoolId` int(11) NOT NULL,
  `Login_TeacherId` int(11) NOT NULL,
  `Login_Email` varchar(255) NOT NULL,
  `Login_Password` varchar(150) NOT NULL,
  `Login_Name` varchar(255) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `bdate` date NOT NULL,
  `gender` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `otherphone_no` varchar(50) NOT NULL,
  `aadharcard_no` varchar(50) NOT NULL,
  `bankname` varchar(255) NOT NULL,
  `bank_acno` varchar(150) NOT NULL,
  `bank_ifsc` varchar(100) NOT NULL,
  `Login_AddDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Login_AddBy` varchar(255) NOT NULL,
  `Login_ModDate` datetime NOT NULL,
  `Login_ModBy` varchar(255) NOT NULL,
  `Login_IsActDct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`Login_RowId`, `Login_SchoolId`, `Login_TeacherId`, `Login_Email`, `Login_Password`, `Login_Name`, `father_name`, `bdate`, `gender`, `address`, `phone_no`, `otherphone_no`, `aadharcard_no`, `bankname`, `bank_acno`, `bank_ifsc`, `Login_AddDate`, `Login_AddBy`, `Login_ModDate`, `Login_ModBy`, `Login_IsActDct`) VALUES
(2, 0, 0, 'mayur.malani411@gmail.com', '123456', 'mayur', 'K', '1994-08-13', 'Male', 'Surat', '9876548250', '9856000002', '1234567891011', 'HDFC', '100001254623523', 'HDFC00018', '2020-06-07 05:18:00', '', '2020-07-08 15:01:43', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard_master`
--

CREATE TABLE `noticeboard_master` (
  `Notice_RowId` int(11) NOT NULL,
  `Notice_Title` varchar(255) NOT NULL,
  `Notice_Description` text NOT NULL,
  `Notice_FromDate` datetime NOT NULL,
  `Notice_ToDate` datetime NOT NULL,
  `Notice_SendToAll` varchar(255) NOT NULL,
  `Notice_SendToStandsId` varchar(150) NOT NULL,
  `Notice_SendToClassId` varchar(150) NOT NULL,
  `Notice_AddDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Notice_AddBy` varchar(255) NOT NULL,
  `Notice_ModDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Notice_ModBy` varchar(255) NOT NULL,
  `Notice_IsActDct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noticeboard_master`
--

INSERT INTO `noticeboard_master` (`Notice_RowId`, `Notice_Title`, `Notice_Description`, `Notice_FromDate`, `Notice_ToDate`, `Notice_SendToAll`, `Notice_SendToStandsId`, `Notice_SendToClassId`, `Notice_AddDate`, `Notice_AddBy`, `Notice_ModDate`, `Notice_ModBy`, `Notice_IsActDct`) VALUES
(1, 'Notice 05-06-2020', 'Today is World Environment Day', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '2020-06-07 09:57:44', '', '2020-06-07 09:57:44', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_question_master`
--

CREATE TABLE `online_exam_question_master` (
  `question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `correct_answer` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `online_exam_question_master`
--

INSERT INTO `online_exam_question_master` (`question_id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_answer`, `created_date`, `updated_date`) VALUES
(1, 'test', 'A', 'B', 'C', 'D', 'A', '2020-06-07 09:56:01', '2020-06-07 09:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `school_master`
--

CREATE TABLE `school_master` (
  `School_RowId` int(11) NOT NULL,
  `School_Name` varchar(255) NOT NULL,
  `School_Email` varchar(200) NOT NULL,
  `School_PhoneNo1` varchar(50) NOT NULL,
  `School_PhoneNo2` varchar(50) NOT NULL,
  `School_OwnerName` varchar(255) NOT NULL,
  `School_MapLocation` text NOT NULL,
  `School_Address` text NOT NULL,
  `School_AddDate` datetime NOT NULL DEFAULT current_timestamp(),
  `School_AddBy` varchar(255) NOT NULL,
  `School_ModDate` datetime NOT NULL DEFAULT current_timestamp(),
  `School_ModBy` varchar(255) NOT NULL,
  `School_IsActDct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stands_master`
--

CREATE TABLE `stands_master` (
  `Stands_RowId` int(11) NOT NULL,
  `Stands_Name` varchar(255) NOT NULL,
  `Stands_Fees` double NOT NULL,
  `Stands_Language` varchar(100) NOT NULL,
  `Stands_AddDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Stands_AddBy` varchar(255) NOT NULL,
  `Stands_ModDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Stands_ModBy` varchar(255) NOT NULL,
  `Stands_IsActDct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stands_master`
--

INSERT INTO `stands_master` (`Stands_RowId`, `Stands_Name`, `Stands_Fees`, `Stands_Language`, `Stands_AddDate`, `Stands_AddBy`, `Stands_ModDate`, `Stands_ModBy`, `Stands_IsActDct`) VALUES
(1, 'Commerce 12', 15000, 'Gujarati', '2020-07-08 19:57:52', '', '2020-07-08 19:57:52', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_query_master`
--

CREATE TABLE `student_query_master` (
  `query_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_query_master`
--

INSERT INTO `student_query_master` (`query_id`, `student_id`, `teacher_id`, `message`, `created_date`, `updated_date`) VALUES
(1, 1, 1, 'test', '2020-06-07 09:23:46', '2020-06-07 09:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `subject_master`
--

CREATE TABLE `subject_master` (
  `Subject_RowId` int(11) NOT NULL,
  `Subject_Name` varchar(255) NOT NULL,
  `Subject_Description` text NOT NULL,
  `Subject_StandsId` int(11) NOT NULL,
  `Subject_AddDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Subject_AddBy` varchar(255) NOT NULL,
  `Subject_ModDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Subject_ModBy` varchar(255) NOT NULL,
  `Subject_IsActDct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`Subject_RowId`, `Subject_Name`, `Subject_Description`, `Subject_StandsId`, `Subject_AddDate`, `Subject_AddBy`, `Subject_ModDate`, `Subject_ModBy`, `Subject_IsActDct`) VALUES
(1, 'Maths', 'Maths', 1, '2020-07-08 19:55:40', '', '0000-00-00 00:00:00', '', 0),
(2, 'Science', 'Science', 1, '2020-07-08 19:55:54', '', '0000-00-00 00:00:00', '', 0),
(3, 'BA', 'BA', 1, '2020-07-08 19:56:02', '', '0000-00-00 00:00:00', '', 0),
(4, 'Economics', 'Economics', 1, '2020-07-08 19:56:13', '', '0000-00-00 00:00:00', '', 0),
(5, 'English', 'English', 1, '2020-07-08 19:56:22', '', '0000-00-00 00:00:00', '', 0),
(6, 'Accounting', 'Accounting', 1, '2020-07-08 19:56:38', '', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timetable_master`
--

CREATE TABLE `timetable_master` (
  `timetable_id` int(11) NOT NULL,
  `Timetable_SubjectId` int(11) NOT NULL,
  `day_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `Timetable_StandsId` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timetable_master`
--

INSERT INTO `timetable_master` (`timetable_id`, `Timetable_SubjectId`, `day_name`, `date`, `Timetable_StandsId`, `created_date`, `updated_date`) VALUES
(1, 1, 'Monday', '2020-07-08', 1, '2020-07-08 20:03:06', '2020-07-08 20:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `video_master`
--

CREATE TABLE `video_master` (
  `Video_RowId` int(11) NOT NULL,
  `Video_Name` varchar(255) NOT NULL,
  `Video_StandsId` int(11) NOT NULL,
  `Video_SubjectId` int(11) NOT NULL,
  `Video_VideoId` varchar(255) NOT NULL,
  `Video_CreatedBy` varchar(255) NOT NULL,
  `Video_AddDate` datetime NOT NULL,
  `Video_AddBy` varchar(255) NOT NULL,
  `Video_ModDate` datetime NOT NULL,
  `Video_ModBy` varchar(255) NOT NULL,
  `Video_IsActDct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video_master`
--

INSERT INTO `video_master` (`Video_RowId`, `Video_Name`, `Video_StandsId`, `Video_SubjectId`, `Video_VideoId`, `Video_CreatedBy`, `Video_AddDate`, `Video_AddBy`, `Video_ModDate`, `Video_ModBy`, `Video_IsActDct`) VALUES
(1, 'test', 0, 0, 'VGSd_BV59kA', 'Mayur', '2020-06-07 04:43:56', '', '2020-06-07 04:44:43', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_master`
--
ALTER TABLE `class_master`
  ADD PRIMARY KEY (`Class_RowId`);

--
-- Indexes for table `homework_master`
--
ALTER TABLE `homework_master`
  ADD PRIMARY KEY (`homework_id`);

--
-- Indexes for table `login_master`
--
ALTER TABLE `login_master`
  ADD PRIMARY KEY (`Login_RowId`);

--
-- Indexes for table `noticeboard_master`
--
ALTER TABLE `noticeboard_master`
  ADD PRIMARY KEY (`Notice_RowId`);

--
-- Indexes for table `online_exam_question_master`
--
ALTER TABLE `online_exam_question_master`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `school_master`
--
ALTER TABLE `school_master`
  ADD PRIMARY KEY (`School_RowId`);

--
-- Indexes for table `stands_master`
--
ALTER TABLE `stands_master`
  ADD PRIMARY KEY (`Stands_RowId`);

--
-- Indexes for table `student_query_master`
--
ALTER TABLE `student_query_master`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `subject_master`
--
ALTER TABLE `subject_master`
  ADD PRIMARY KEY (`Subject_RowId`);

--
-- Indexes for table `timetable_master`
--
ALTER TABLE `timetable_master`
  ADD PRIMARY KEY (`timetable_id`);

--
-- Indexes for table `video_master`
--
ALTER TABLE `video_master`
  ADD PRIMARY KEY (`Video_RowId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `class_master`
--
ALTER TABLE `class_master`
  MODIFY `Class_RowId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homework_master`
--
ALTER TABLE `homework_master`
  MODIFY `homework_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_master`
--
ALTER TABLE `login_master`
  MODIFY `Login_RowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `noticeboard_master`
--
ALTER TABLE `noticeboard_master`
  MODIFY `Notice_RowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `online_exam_question_master`
--
ALTER TABLE `online_exam_question_master`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_master`
--
ALTER TABLE `school_master`
  MODIFY `School_RowId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stands_master`
--
ALTER TABLE `stands_master`
  MODIFY `Stands_RowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_query_master`
--
ALTER TABLE `student_query_master`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject_master`
--
ALTER TABLE `subject_master`
  MODIFY `Subject_RowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `timetable_master`
--
ALTER TABLE `timetable_master`
  MODIFY `timetable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video_master`
--
ALTER TABLE `video_master`
  MODIFY `Video_RowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
