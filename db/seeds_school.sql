-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2016 at 09:24 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seeds_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(18) NOT NULL,
  `cno` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `coments` varchar(300) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pwd`, `cno`, `address`, `coments`, `status`, `created_at`) VALUES
(1, 'admin', 'admin@seedsschool.com', 'admin', '00923429818632', 'GHQ Peshawar', '1st Admin', 1, '06/09/2016 03:43 pm');

-- --------------------------------------------------------

--
-- Table structure for table `auto_fee_genarate`
--

CREATE TABLE `auto_fee_genarate` (
  `id` int(11) NOT NULL,
  `auto_month` varchar(20) NOT NULL,
  `auto_year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cl_id` bigint(20) NOT NULL,
  `su_id` bigint(20) NOT NULL,
  `co_id` bigint(20) NOT NULL,
  `t_id` bigint(11) NOT NULL,
  `fee` varchar(6) NOT NULL,
  `time` varchar(50) NOT NULL,
  `s_date` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL,
  `e_date` varchar(15) NOT NULL,
  `class_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cl_id`, `su_id`, `co_id`, `t_id`, `fee`, `time`, `s_date`, `date`, `e_date`, `class_status`) VALUES
(5, 2, 2, 1, '2000', '10:00-11:00', '01-Jul-2016', '14-Jul-2016', '01-Nov-2016', 1),
(6, 3, 1, 1, '3000', '12:00-01:00', '10-Jul-2016', '14-Jul-2016', '10-Nov-2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `co_id` bigint(20) NOT NULL,
  `co_name` varchar(50) NOT NULL,
  `created_date` varchar(100) NOT NULL,
  `created_time` varchar(100) NOT NULL,
  `updated_date` varchar(100) NOT NULL,
  `updated_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`co_id`, `co_name`, `created_date`, `created_time`, `updated_date`, `updated_time`) VALUES
(1, 'A levels', '14-Jun-2016', '03:41:01pm', '14-Jul-2016', '01:05:27pm'),
(2, 'O levels', '14-Jun-2016', '03:41:01pm', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `e_id` int(11) NOT NULL,
  `e_date` varchar(15) NOT NULL,
  `e_title` varchar(25) NOT NULL,
  `e_bg` varchar(10) NOT NULL,
  `e_status` int(11) NOT NULL DEFAULT '1',
  `e_days` varchar(10) NOT NULL,
  `e_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`e_id`, `e_date`, `e_title`, `e_bg`, `e_status`, `e_days`, `e_type`) VALUES
(16, '2016-07-23', 'sad', '#800040', 1, '+-0', 0),
(17, '2016-07-21', 'asdsa', '#8080ff', 1, '-2', 1),
(18, '2016-07-28', 'asdasd', '#00ffff', 1, '+5', 0),
(19, '2016-07-28', '', '#000000', 1, '+5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `expense_reason` varchar(100) NOT NULL,
  `expense_paid_to` varchar(100) NOT NULL,
  `expense_paid_amount` varchar(100) NOT NULL,
  `expense_created_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `expense_reason`, `expense_paid_to`, `expense_paid_amount`, `expense_created_date`) VALUES
(1, 'rent of land', 'asad khan', '30000', '14-Jul-2016');

-- --------------------------------------------------------

--
-- Table structure for table `otherstaff`
--

CREATE TABLE `otherstaff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `type` varchar(32) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `email` varchar(32) NOT NULL,
  `st_status` varchar(1) NOT NULL DEFAULT '1',
  `created_date` varchar(32) NOT NULL,
  `created_time` varchar(32) NOT NULL,
  `updated_date` varchar(50) NOT NULL,
  `updated_time` varchar(50) NOT NULL,
  `password` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otherstaff`
--

INSERT INTO `otherstaff` (`id`, `name`, `contact`, `cnic`, `type`, `salary`, `address`, `email`, `st_status`, `created_date`, `created_time`, `updated_date`, `updated_time`, `password`) VALUES
(1, 'gatekeeper1', '03129236798', '1623122131231', 'gatekeeper', '2000', 'Charsadda,KPK,Pakistan', 'gatekeeper@seeds.com', '1', '14-Jul-2016', '02:46:15pm', '14-Jul-2016', '02:52:25pm', 'asad');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendence`
--

CREATE TABLE `staff_attendence` (
  `Staff_att_id` bigint(20) NOT NULL,
  `sta_id` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_attendence`
--

INSERT INTO `staff_attendence` (`Staff_att_id`, `sta_id`, `status`, `date`, `month`, `year`) VALUES
(1, 1, 'a', '17-Jul-2016', 'Jul', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `staff_salaries`
--

CREATE TABLE `staff_salaries` (
  `id` int(11) NOT NULL,
  `fkstaff_id` varchar(100) NOT NULL,
  `total_salary` varchar(150) NOT NULL,
  `paid_salary` varchar(150) NOT NULL,
  `remaining_salary` varchar(150) NOT NULL,
  `amount_reason` varchar(100) NOT NULL,
  `paid_month` varchar(100) NOT NULL,
  `created_date` varchar(100) NOT NULL,
  `created_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_salaries`
--

INSERT INTO `staff_salaries` (`id`, `fkstaff_id`, `total_salary`, `paid_salary`, `remaining_salary`, `amount_reason`, `paid_month`, `created_date`, `created_time`) VALUES
(1, '1', '2000', '100', '1900', 'month fee', '1', '14-Jul-2016', '02:55:13pm'),
(2, '1', '2000', '100', '1800', 'paid remains', '1', '14-Jul-2016', '02:58:22pm'),
(3, '1', '2000', '100', '1700', 'paid remains', '1', '14-Jul-2016', '02:58:54pm'),
(4, '1', '2000', '200', '1500', 'remain balance', '1', '14-Jul-2016', '03:01:13pm'),
(5, '1', '2000', '200', '1300', 'remain balance', '1', '14-Jul-2016', '03:03:51pm'),
(6, '1', '2000', '200', '1100', 'remain balance', '1', '14-Jul-2016', '03:04:37pm'),
(7, '1', '2000', '200', '900', 'remain balance', '1', '14-Jul-2016', '03:05:02pm'),
(8, '1', '2000', '200', '700', 'remain balance', '1', '14-Jul-2016', '03:06:05pm'),
(9, '1', '2000', '200', '500', 'remain balance', '1', '14-Jul-2016', '03:07:34pm'),
(10, '1', '2000', '200', '300', 'remain balance', '1', '14-Jul-2016', '03:08:22pm'),
(11, '1', '2000', '50', '250', 'month', '1', '14-Jul-2016', '03:09:04pm'),
(12, '1', '2000', '50', '200', 'month', '1', '14-Jul-2016', '03:09:30pm'),
(13, '1', '2000', '50', '150', 'month', '1', '14-Jul-2016', '03:09:39pm'),
(14, '1', '2000', '50', '100', 'month', '1', '14-Jul-2016', '03:11:48pm');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `std_father_name` varchar(100) NOT NULL,
  `student_contact` varchar(20) NOT NULL,
  `std_guardian_contact` varchar(20) NOT NULL,
  `current_school` varchar(100) NOT NULL,
  `facebook_id` varchar(50) NOT NULL,
  `student_address` varchar(100) NOT NULL,
  `student_email` varchar(32) NOT NULL,
  `pic` varchar(500) NOT NULL,
  `s_gender` varchar(20) NOT NULL,
  `s_cnic` varchar(15) NOT NULL,
  `reason_concision` varchar(300) DEFAULT NULL,
  `fkcourse_id` varchar(10) NOT NULL,
  `student_created_date` varchar(20) NOT NULL,
  `student_created_time` varchar(20) NOT NULL,
  `student_month` varchar(20) NOT NULL,
  `student_year` varchar(20) NOT NULL,
  `student_updated_date` varchar(20) NOT NULL,
  `student_updated_time` varchar(20) NOT NULL,
  `student_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `std_father_name`, `student_contact`, `std_guardian_contact`, `current_school`, `facebook_id`, `student_address`, `student_email`, `pic`, `s_gender`, `s_cnic`, `reason_concision`, `fkcourse_id`, `student_created_date`, `student_created_time`, `student_month`, `student_year`, `student_updated_date`, `student_updated_time`, `student_status`) VALUES
(1, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'Jan', '2016', '', '', 1),
(2, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'Jan', '2013', '', '', 1),
(3, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'Jan', '2016', '', '', 1),
(4, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'Feb', '2014', '', '', 1),
(5, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'Mar', '2016', '', '', 1),
(6, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'Mar', '2015', '', '', 1),
(7, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'Apr', '2015', '', '', 1),
(8, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'May', '2016', '', '', 1),
(9, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'May', '2016', '', '', 1),
(10, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'Jun', '2016', '', '', 1),
(11, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'Jun', '2016', '', '', 1),
(12, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'Jul', '2016', '', '', 1),
(13, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'Jul', '2016', '', '', 1),
(14, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'Jul', '2016', '', '', 1),
(15, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'Jul', '2016', '', '', 1),
(16, 'student 1', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'student1@seedsschool.com', '6c8b51c123aac552fbb1cc10af5e2000.jpg', 'male', '9188291182991', 'he is my bst friend', '1', '21-Jul-2016', '01:16:37pm', 'Jul', '2016', '', '', 1),
(17, 'student check', 'student 1 father name', '03129818281', '18281882182', 'govt charsadda', 'facebook.com/student1', 'charsadaa ,kpk,Pakistan', 'john.doe@gmail.com', '4da7065bad4de1904c9bb29b0ce18154.jpg', 'female', '9188291182991', 'My cousin', '1', '23-Jul-2016', '10:13:21am', 'Jul', '2016', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `st_attendance_id` int(11) NOT NULL,
  `fkclass_id` int(11) NOT NULL,
  `fkstudent_id` int(11) NOT NULL,
  `status` varchar(5) NOT NULL,
  `att_date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_class_fee`
--

CREATE TABLE `student_class_fee` (
  `classfee_id` int(11) NOT NULL,
  `fkstudent_id` varchar(32) NOT NULL,
  `fkclass_id` varchar(32) NOT NULL,
  `class_fee` varchar(150) NOT NULL,
  `admission_fee` varchar(150) NOT NULL,
  `to_be_pay` varchar(150) NOT NULL,
  `classfee_created_date` varchar(20) NOT NULL,
  `classfee_created_time` varchar(20) NOT NULL,
  `st_class_fee_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_class_fee`
--

INSERT INTO `student_class_fee` (`classfee_id`, `fkstudent_id`, `fkclass_id`, `class_fee`, `admission_fee`, `to_be_pay`, `classfee_created_date`, `classfee_created_time`, `st_class_fee_status`) VALUES
(1, '1', '5', '2000', '500', '1500', '21-Jul-2016', '01:19:03pm', 1),
(2, '1', '6', '3000', '100', '2000', '21-Jul-2016', '01:21:00pm', 1),
(3, '17', '5', '2000', '500', '1000', '23-Jul-2016', '10:32:35am', 1),
(4, '17', '6', '3000', '500', '2000', '23-Jul-2016', '10:32:35am', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_other_payment`
--

CREATE TABLE `student_other_payment` (
  `otherpay_id` int(11) NOT NULL,
  `fkstudent_id` varchar(200) NOT NULL,
  `total_amt` varchar(200) NOT NULL,
  `paid_amt` varchar(200) NOT NULL,
  `otherfee_remain` int(11) NOT NULL,
  `amt_reason` varchar(100) NOT NULL,
  `other_month` varchar(20) NOT NULL,
  `other_year` varchar(20) NOT NULL,
  `otherpay_created_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_other_payment`
--

INSERT INTO `student_other_payment` (`otherpay_id`, `fkstudent_id`, `total_amt`, `paid_amt`, `otherfee_remain`, `amt_reason`, `other_month`, `other_year`, `otherpay_created_date`) VALUES
(1, '1', '500', '0', 500, 'Admission Fee', 'Jul', '2016', '21-Jul-2016'),
(4, '1', '100', '200', 400, 'ID Card Fee', 'Jun', '2016', '21-Jul-2016');

-- --------------------------------------------------------

--
-- Table structure for table `student_payment`
--

CREATE TABLE `student_payment` (
  `p_id` bigint(20) NOT NULL,
  `fkstudentclassfee_id` int(11) NOT NULL,
  `std_payment` int(11) NOT NULL,
  `std_paid` int(11) NOT NULL,
  `std_remain` varchar(10) NOT NULL,
  `std_month` varchar(20) NOT NULL,
  `std_year` varchar(20) NOT NULL,
  `std_date` varchar(20) NOT NULL,
  `std_reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_payment`
--

INSERT INTO `student_payment` (`p_id`, `fkstudentclassfee_id`, `std_payment`, `std_paid`, `std_remain`, `std_month`, `std_year`, `std_date`, `std_reason`) VALUES
(1, 1, 1500, 1000, '500', 'Feb', '2016', '21-Jul-2016', 'Monthly Fee'),
(2, 2, 2000, 500, '1500', 'Jan', '2016', '21-Jul-2016', 'Monthly Fee'),
(52, 1, 1500, 0, '2000', 'Jul', '2016', '22-Jul-2016', 'Monthly Fee'),
(53, 2, 2000, 0, '3500', 'Jul', '2016', '22-Jul-2016', 'Monthly Fee'),
(54, 2, 2000, 500, '1500', 'Jan', '2016', '21-Jul-2016', 'Monthly Fee'),
(55, 2, 2000, 0, '3500', 'Jul', '2016', '22-Jul-2016', 'Monthly Fee'),
(56, 1, 1500, 1000, '500', 'Feb', '2016', '21-Jul-2016', 'Monthly Fee'),
(57, 2, 2000, 500, '1500', 'Jan', '2016', '21-Jul-2016', 'Monthly Fee'),
(58, 1, 1500, 0, '2000', 'Jul', '2016', '22-Jul-2016', 'Monthly Fee'),
(59, 2, 2000, 0, '3500', 'Jul', '2016', '22-Jul-2016', 'Monthly Fee'),
(60, 2, 2000, 500, '1500', 'Jan', '2016', '21-Jul-2016', 'Monthly Fee'),
(61, 2, 2000, 0, '3500', 'Jul', '2016', '22-Jul-2016', 'Monthly Fee'),
(62, 1, 1500, 1000, '500', 'Apr', '2016', '21-Jul-2016', 'Monthly Fee'),
(63, 2, 2000, 500, '1500', 'Apr', '2016', '21-Jul-2016', 'Monthly Fee'),
(64, 1, 1500, 0, '2000', 'Jul', '2016', '22-Jul-2016', 'Monthly Fee'),
(65, 2, 2000, 0, '3500', 'Jul', '2016', '22-Jul-2016', 'Monthly Fee'),
(66, 2, 2000, 500, '1500', 'Jan', '2016', '21-Jul-2016', 'Monthly Fee'),
(67, 2, 2000, 0, '3500', 'Apr', '2016', '22-Jul-2016', 'Monthly Fee'),
(68, 1, 1500, 1000, '500', 'Feb', '2016', '21-Jul-2016', 'Monthly Fee'),
(69, 2, 2000, 500, '1500', 'Jan', '2016', '21-Jul-2016', 'Monthly Fee'),
(70, 1, 1500, 0, '2000', 'Jul', '2016', '22-Jul-2016', 'Monthly Fee'),
(71, 2, 2000, 0, '3500', 'Jul', '2016', '22-Jul-2016', 'Monthly Fee'),
(72, 2, 2000, 500, '1500', 'Jan', '2016', '21-Jul-2016', 'Monthly Fee'),
(73, 2, 2000, 0, '3500', 'Jul', '2016', '22-Jul-2016', 'Monthly Fee'),
(74, 1, 1500, 1000, '500', 'Apr', '2016', '21-Jul-2016', 'Monthly Fee'),
(75, 2, 2000, 500, '1500', 'Jan', '2016', '21-Jul-2016', 'Monthly Fee'),
(76, 1, 1500, 0, '2000', 'Jul', '2016', '22-Jul-2016', 'Monthly Fee'),
(77, 2, 2000, 0, '3500', 'Jul', '2016', '22-Jul-2016', 'Monthly Fee'),
(78, 2, 2000, 500, '1500', 'Jan', '2016', '21-Jul-2016', 'Monthly Fee'),
(79, 2, 2000, 0, '3500', 'Jul', '2016', '22-Jul-2016', 'Monthly Fee'),
(82, 3, 1000, 0, '1000', 'Jul', '2016', '23-Jul-2016', 'Monthly Fee'),
(83, 4, 2000, 0, '2000', 'Jul', '2016', '23-Jul-2016', 'Monthly Fee');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `su_id` int(10) NOT NULL,
  `su_name` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`su_id`, `su_name`, `duration`) VALUES
(1, 'Chemistry', 4),
(2, 'Maths', 4),
(3, 'Biology', 4),
(4, 'English', 2),
(5, 'Pak Studies', 2),
(6, 'urdu', 3),
(7, 'pashto', 9),
(8, 'farsi', 2),
(10, 'Mobiles technologie', 2),
(12, 'hindi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `t_gender` varchar(20) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `updated_date` varchar(20) NOT NULL,
  `updated_time` varchar(10) NOT NULL,
  `t_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `password`, `cnic`, `address`, `contact`, `t_gender`, `created_date`, `created_time`, `updated_date`, `updated_time`, `t_status`) VALUES
(1, 'teacher1', 'teacher@seeds.com', 'teacher@seeds', '162312213123121', 'katlang1', '031292367982', 'female', '14-Jul-2016', '12:33:38pm', '19-Jul-2016', '07:57:17pm', 1),
(2, 'teacher 2', 'teacher2@seeds.com', 'teacher2', '1610102591183', 'Charsadda,KPK,Pakistan', '03155151801', 'female', '19-Jul-2016', '07:16:54pm', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendence`
--

CREATE TABLE `teacher_attendence` (
  `teacher_att_id` bigint(20) NOT NULL,
  `fkteacher_id` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendence`
--

INSERT INTO `teacher_attendence` (`teacher_att_id`, `fkteacher_id`, `status`, `date`, `month`, `year`) VALUES
(13, 5, 'p', '27-Jun-2016', 'Jun', '2016'),
(14, 7, 'p', '27-Jun-2016', 'Jun', '2016'),
(15, 1, 'p', '14-Jul-2016', 'Jul', '2016'),
(16, 1, 'p', '18-Jul-2016', 'Jul', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_salaries`
--

CREATE TABLE `teacher_salaries` (
  `sa_id` bigint(20) NOT NULL,
  `fkteacher_id` int(11) NOT NULL,
  `total_salary` int(11) NOT NULL,
  `paid_salary` int(11) NOT NULL,
  `remaining_salary` int(11) NOT NULL,
  `amount_reason` varchar(150) NOT NULL,
  `paid_month` varchar(20) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_salaries`
--

INSERT INTO `teacher_salaries` (`sa_id`, `fkteacher_id`, `total_salary`, `paid_salary`, `remaining_salary`, `amount_reason`, `paid_month`, `created_date`, `created_time`) VALUES
(1, 7, 1600, 1000, 600, 'month', '1', '27-Jun-2016', '04:11:57pm'),
(2, 7, 1600, 200, 400, 'month', '1', '27-Jun-2016', '04:12:17pm'),
(3, 7, 1600, 100, 300, 'month', '1', '27-Jun-2016', '04:13:15pm'),
(4, 7, 2100, 2000, 400, 'month', '2', '27-Jun-2016', '04:13:44pm'),
(5, 7, 2100, 100, 300, 'month', '2', '12-Jul-2016', '04:11:17pm'),
(8, 7, 2100, 300, 0, 'remain', '2', '12-Jul-2016', '04:49:33pm'),
(9, 7, 3700, 3000, 700, 'paid', '3', '12-Jul-2016', '05:00:38pm'),
(11, 7, 3700, 400, 300, 'remain balance', '3', '12-Jul-2016', '05:12:43pm'),
(12, 7, 3700, 300, 0, 'month', '3', '12-Jul-2016', '05:49:34pm'),
(13, 7, 3700, 3000, 700, 'month', '4', '12-Jul-2016', '08:41:57pm'),
(14, 7, 3700, 100, 4300, 'month', '1', '13-Jul-2016', '12:51:04pm'),
(15, 7, 3700, 0, 8000, 'monthly', '2', '13-Jul-2016', '01:07:03pm'),
(16, 1, 450, 1200, -750, 'month', '1', '14-Jul-2016', '02:32:12pm'),
(17, 1, 450, 0, -300, 'month', '2', '14-Jul-2016', '02:32:36pm'),
(18, 1, 450, 30, 120, 'month', '3', '14-Jul-2016', '02:32:54pm');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `teacher_subject_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `comission` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`teacher_subject_id`, `t_id`, `sub_id`, `comission`) VALUES
(1, 1, 2, '30'),
(2, 1, 3, '20'),
(3, 1, 7, '50');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `v_gender` varchar(11) NOT NULL,
  `v_cnic` varchar(15) NOT NULL,
  `note` varchar(500) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL,
  `v_month` varchar(20) NOT NULL,
  `v_year` varchar(20) NOT NULL,
  `v_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `name`, `contact`, `reason`, `address`, `relationship`, `v_gender`, `v_cnic`, `note`, `comments`, `date`, `time`, `v_month`, `v_year`, `v_status`) VALUES
(1, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Jan', '2016', 0),
(2, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Jan', '2015', 0),
(3, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Feb', '2015', 0),
(4, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(5, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Apr', '2016', 0),
(6, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'May', '2016', 0),
(7, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'May', '2016', 0),
(8, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Jul', '2016', 0),
(9, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Jul', '2016', 0),
(10, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Jul', '2016', 0),
(11, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(12, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(13, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(14, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(15, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(16, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(17, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(18, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(19, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(20, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(21, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(22, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auto_fee_genarate`
--
ALTER TABLE `auto_fee_genarate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `otherstaff`
--
ALTER TABLE `otherstaff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_attendence`
--
ALTER TABLE `staff_attendence`
  ADD PRIMARY KEY (`Staff_att_id`),
  ADD UNIQUE KEY `id` (`Staff_att_id`);

--
-- Indexes for table `staff_salaries`
--
ALTER TABLE `staff_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`st_attendance_id`);

--
-- Indexes for table `student_class_fee`
--
ALTER TABLE `student_class_fee`
  ADD PRIMARY KEY (`classfee_id`);

--
-- Indexes for table `student_other_payment`
--
ALTER TABLE `student_other_payment`
  ADD PRIMARY KEY (`otherpay_id`);

--
-- Indexes for table `student_payment`
--
ALTER TABLE `student_payment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`su_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_attendence`
--
ALTER TABLE `teacher_attendence`
  ADD PRIMARY KEY (`teacher_att_id`);

--
-- Indexes for table `teacher_salaries`
--
ALTER TABLE `teacher_salaries`
  ADD PRIMARY KEY (`sa_id`);

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD PRIMARY KEY (`teacher_subject_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `auto_fee_genarate`
--
ALTER TABLE `auto_fee_genarate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `cl_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `co_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `otherstaff`
--
ALTER TABLE `otherstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `staff_attendence`
--
ALTER TABLE `staff_attendence`
  MODIFY `Staff_att_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `staff_salaries`
--
ALTER TABLE `staff_salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `st_attendance_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_class_fee`
--
ALTER TABLE `student_class_fee`
  MODIFY `classfee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student_other_payment`
--
ALTER TABLE `student_other_payment`
  MODIFY `otherpay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student_payment`
--
ALTER TABLE `student_payment`
  MODIFY `p_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `su_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teacher_attendence`
--
ALTER TABLE `teacher_attendence`
  MODIFY `teacher_att_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `teacher_salaries`
--
ALTER TABLE `teacher_salaries`
  MODIFY `sa_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  MODIFY `teacher_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
