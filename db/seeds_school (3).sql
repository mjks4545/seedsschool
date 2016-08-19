-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2016 at 05:58 PM
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
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(150) NOT NULL,
  `b_account_no` varchar(25) NOT NULL,
  `b_branch` varchar(300) NOT NULL,
  `b_account_title` varchar(300) NOT NULL,
  `b_date` varchar(25) NOT NULL,
  `b_month` varchar(20) NOT NULL,
  `b_year` varchar(10) NOT NULL,
  `b_status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`b_id`, `b_name`, `b_account_no`, `b_branch`, `b_account_title`, `b_date`, `b_month`, `b_year`, `b_status`) VALUES
(1, 'habib bank limited', '123456789', 'peshawar', 'saving', '02-Aug-2016 16:0 pm', 'Aug', '2016', '1'),
(2, 'habib bank limited', '222131231232', 'mardan', 'saving', '02-Aug-2016 16:0 pm', 'Aug', '2016', '1'),
(3, 'national bank ', '4353424324324323', 'karachi', 'home', '03-Aug-2016 15:0 pm', 'Aug', '2016', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bank_transection`
--

CREATE TABLE `bank_transection` (
  `t_id` bigint(20) NOT NULL,
  `fkbank_id` int(50) NOT NULL,
  `t_amount` varchar(300) NOT NULL,
  `t_chknum` varchar(25) DEFAULT NULL,
  `t_way` varchar(25) NOT NULL,
  `t_type` tinyint(1) NOT NULL,
  `t_detail` varchar(300) DEFAULT NULL,
  `t_date` varchar(25) NOT NULL,
  `t_time` varchar(20) NOT NULL,
  `t_month` varchar(10) NOT NULL,
  `t_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_transection`
--

INSERT INTO `bank_transection` (`t_id`, `fkbank_id`, `t_amount`, `t_chknum`, `t_way`, `t_type`, `t_detail`, `t_date`, `t_time`, `t_month`, `t_year`) VALUES
(6, 1, '3000', '12312321312321', 'cheque', 1, 'take from ali', '02-Aug-2016', '07:02 pm', 'Aug', '2016'),
(7, 1, '2000', NULL, 'online', 0, 'paid to asad', '02-Aug-2016', '07:02 pm', 'Aug', '2016'),
(8, 1, '3000', '12312321312321', 'cash', 1, 'take from ali', '02-Aug-2016', '07:02 pm', 'Aug', '2016'),
(9, 1, '3000', NULL, 'online', 1, 'this is paid by asad @ which can be convereted to some other one whichadas  asd as d asd as d as d asd as d asd as das d as as d asd asd as das d asd sa das das d asd asd sa das dsad asd as dsa dsa dsa das das das d as', '03-Aug-2016', '08:56 pm', 'Aug', '2016');

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
(5, 2, 1, 1, '2000', '10:00-11:00', '01-Jul-2016', '14-Jul-2016', '01-Nov-2016', 1),
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
  `e_title` varchar(300) NOT NULL,
  `e_bg` varchar(10) NOT NULL,
  `e_status` int(11) NOT NULL DEFAULT '1',
  `e_type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`e_id`, `e_date`, `e_title`, `e_bg`, `e_status`, `e_type`) VALUES
(1, '02-Jul-2016', 'Saturday', '#F79F81', 1, 0),
(2, '03-Jul-2016', 'Sunday', '#F5A9A9', 1, 0),
(3, '09-Jul-2016', 'Saturday', '#F79F81', 1, 0),
(4, '10-Jul-2016', 'Sunday', '#F5A9A9', 1, 0),
(5, '16-Jul-2016', 'Saturday', '#F79F81', 1, 0),
(6, '17-Jul-2016', 'Sunday', '#F5A9A9', 1, 0),
(7, '23-Jul-2016', 'Saturday', '#F79F81', 1, 0),
(8, '24-Jul-2016', 'Sunday', '#F5A9A9', 1, 0),
(9, '30-Jul-2016', 'Saturday', '#F79F81', 1, 0),
(10, '31-Jul-2016', 'Sunday', '#F5A9A9', 1, 0),
(11, '06-Aug-2016', 'Saturday', '#F79F81', 1, 0),
(12, '07-Aug-2016', 'Sunday', '#F5A9A9', 1, 0),
(13, '13-Aug-2016', 'Saturday', '#F79F81', 1, 0),
(14, '14-Aug-2016', 'Sunday', '#F5A9A9', 1, 0),
(15, '20-Aug-2016', 'Saturday', '#F79F81', 1, 0),
(16, '21-Aug-2016', 'Sunday', '#F5A9A9', 1, 0),
(17, '27-Aug-2016', 'Saturday', '#F79F81', 1, 0),
(18, '28-Aug-2016', 'Sunday', '#F5A9A9', 1, 0),
(19, '10-Aug-2016', 'meeting with teacher', '#92896d', 1, 1),
(20, '11-Aug-2016', 'metting', '#00ff00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `expense_reason` varchar(100) NOT NULL,
  `expense_paid_to` varchar(100) NOT NULL,
  `expense_paid_amount` varchar(100) NOT NULL,
  `expense_month` varchar(20) NOT NULL,
  `expense_year` varchar(20) NOT NULL,
  `expense_created_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `expense_reason`, `expense_paid_to`, `expense_paid_amount`, `expense_month`, `expense_year`, `expense_created_date`) VALUES
(1, 'rent of land', 'asad khan', '1000', 'Jul', '2016', '10-Jul-2016'),
(2, 'karaya', 'amid sabri', '2000', 'Jul', '2016', '02-Jul-2016'),
(3, 'rent of kor', 'asad khan', '1000', 'Jun', '2016', '15-Jun-2016'),
(4, 'rent of land', 'asad khan', '1000', 'Jul', '2016', '14-Jul-2016'),
(5, 'rent of land', 'asad khan', '1000', 'Jul', '2016', '12-Jul-2016'),
(6, 'rent of land', 'asad khan', '1000', 'Jul', '2016', '02-Jul-2016'),
(7, 'rent of land', 'asad khan', '1000', 'Jul', '2016', '30-Jul-2016'),
(8, 'rent', 'asad shah', '20000', 'Aug', '2016', '02-Aug-2016');

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
(1, 'gatekeeper1', '03129236798', '1623122131231', 'gatekeeper', '2000', 'Charsadda,KPK,Pakistan', 'gatekeeper@seeds.com', '1', '14-Jul-2016', '02:46:15pm', '14-Jul-2016', '02:52:25pm', 'asad'),
(2, 'receptionist', '213456789654321', '3456787654321', 'receptionist', '2000', 'peshawar', 'receptionist@seeds.com', '1', '01-Aug-2016', '03:35:33pm', '', '', 'receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendence`
--

CREATE TABLE `staff_attendence` (
  `Staff_att_id` bigint(20) NOT NULL,
  `sta_id` int(11) NOT NULL,
  `status` varchar(300) NOT NULL,
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
  `paid_year` varchar(20) NOT NULL,
  `created_date` varchar(100) NOT NULL,
  `created_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_salaries`
--

INSERT INTO `staff_salaries` (`id`, `fkstaff_id`, `total_salary`, `paid_salary`, `remaining_salary`, `amount_reason`, `paid_month`, `paid_year`, `created_date`, `created_time`) VALUES
(1, '1', '2000', '100', '1900', 'month fee', '01', '2016', '30-Jul-2016', '02:55:13pm'),
(2, '1', '2000', '100', '1800', 'paid remains', '01', '2014', '14-Jul-2016', '02:58:22pm'),
(3, '1', '2000', '100', '1700', 'paid remains', '01', '2016', '14-Jul-2016', '02:58:54pm'),
(15, '1', '2000', '200', '3500', 'karaya', '07', '2016', '26-Jul-2016', '08:58:22pm');

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
  `student_pwd` varchar(18) NOT NULL,
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

INSERT INTO `student` (`student_id`, `student_name`, `std_father_name`, `student_contact`, `std_guardian_contact`, `current_school`, `facebook_id`, `student_address`, `student_email`, `student_pwd`, `pic`, `s_gender`, `s_cnic`, `reason_concision`, `fkcourse_id`, `student_created_date`, `student_created_time`, `student_month`, `student_year`, `student_updated_date`, `student_updated_time`, `student_status`) VALUES
(1, 'junaid', 'father', '024234324234', '34534543543', 'barha khyber agency', 'facebook.com/junaid', 'peshawar', 'junaid@email.com', '', '5dd4e69c3e92f364a5b5b431c0ef64c7.jpg', 'male', '2343243243244', 'no one', '1', '26-Jul-2016', '06:58:57pm', 'Jul', '2016', '', '', 1),
(2, 'junaid1', 'father1', '324234234324324', '32423423432423', 'barha khyber agency', 'facebook.com/junaid', 'peshawar', 'junaid@email.com', '', '92aa69c86d39868ac5acd03b6f9dc639.jpg', 'female', '2343243243244', 'paid', '2', '26-Jul-2016', '07:00:09pm', 'Jul', '2016', '', '', 1),
(3, 'junaid2', 'father2', '324234234324324', '34534543543', 'barha khyber agency', 'facebook.com/junaid', 'peshawar', 'student@seeds.com', 'student', '0d47fb48a05aa791b67465687d42b4aa.png', 'male', '2343243243244', 'cousin', '1', '26-Jul-2016', '07:01:13pm', 'Jul', '2015', '', '', 1),
(4, 'student', 'father', '324234234324324', '34534543543', 'barha khyber agency', 'facebook.com/junaid', 'peshawar', 'admin@seedsschool.com', '', '08256959b7813923f822ae3bcf51e50a.jpg', 'male', '2343243243244', 'cousin', '1', '30-Jul-2016', '12:52:36pm', 'Jul', '2016', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `st_attendance_id` int(11) NOT NULL,
  `fkclass_id` int(11) NOT NULL,
  `fkstudent_id` int(11) NOT NULL,
  `status` varchar(300) NOT NULL,
  `att_date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`st_attendance_id`, `fkclass_id`, `fkstudent_id`, `status`, `att_date`, `time`, `month`, `year`) VALUES
(1, 5, 1, 'p', '25-Jul-2016', '08:58 33pm', 'Jul', '2016'),
(2, 5, 2, 'p', '25-Jul-2016', '08:58 33pm', 'Jul', '2016'),
(3, 5, 3, 'p', '25-Jul-2016', '08:58 33pm', 'Jul', '2016'),
(4, 5, 4, 'p', '25-Jul-2016', '08:58 33pm', 'Jul', '2016'),
(5, 5, 1, 'a', '26-Jul-2016', '08:58 pm', 'Jul', '2016'),
(6, 5, 1, 'a', '27-Jul-2016', '08:58 pm', 'Jul', '2016'),
(7, 5, 1, 'a', '28-Jul-2016', '08:58 pm', 'Jul', '2016'),
(8, 5, 1, 'a', '29-Jul-2016', '08:58 pm', 'Jul', '2016'),
(9, 5, 1, 'Saturday', '30-Jul-2016', '08:58 pm', 'Jul', '2016'),
(10, 5, 1, 'Sunday', '31-Jul-2016', '08:58 pm', 'Jul', '2016'),
(11, 5, 2, 'a', '26-Jul-2016', '08:58 pm', 'Jul', '2016'),
(12, 5, 2, 'a', '27-Jul-2016', '08:58 pm', 'Jul', '2016'),
(13, 5, 2, 'a', '28-Jul-2016', '08:58 pm', 'Jul', '2016'),
(14, 5, 2, 'a', '29-Jul-2016', '08:58 pm', 'Jul', '2016'),
(15, 5, 2, 'Saturday', '30-Jul-2016', '08:58 pm', 'Jul', '2016'),
(16, 5, 2, 'Sunday', '31-Jul-2016', '08:58 pm', 'Jul', '2016'),
(17, 5, 3, 'a', '26-Jul-2016', '08:58 pm', 'Jul', '2016'),
(18, 5, 3, 'a', '27-Jul-2016', '08:58 pm', 'Jul', '2016'),
(19, 5, 3, 'a', '28-Jul-2016', '08:58 pm', 'Jul', '2016'),
(20, 5, 3, 'a', '29-Jul-2016', '08:58 pm', 'Jul', '2016'),
(21, 5, 3, 'Saturday', '30-Jul-2016', '08:58 pm', 'Jul', '2016'),
(22, 5, 3, 'Sunday', '31-Jul-2016', '08:58 pm', 'Jul', '2016'),
(23, 5, 4, 'a', '26-Jul-2016', '08:58 pm', 'Jul', '2016'),
(24, 5, 4, 'a', '27-Jul-2016', '08:58 pm', 'Jul', '2016'),
(25, 5, 4, 'a', '28-Jul-2016', '08:58 pm', 'Jul', '2016'),
(26, 5, 4, 'a', '29-Jul-2016', '08:58 pm', 'Jul', '2016'),
(27, 5, 4, 'Saturday', '30-Jul-2016', '08:58 pm', 'Jul', '2016'),
(28, 5, 4, 'Sunday', '31-Jul-2016', '08:58 pm', 'Jul', '2016'),
(29, 5, 1, 'p', '01-Aug-2016', '08:59 11pm', 'Aug', '2016'),
(30, 5, 2, 'p', '01-Aug-2016', '08:59 11pm', 'Aug', '2016'),
(31, 5, 3, 'p', '01-Aug-2016', '08:59 11pm', 'Aug', '2016'),
(32, 5, 4, 'p', '01-Aug-2016', '08:59 11pm', 'Aug', '2016'),
(33, 5, 1, 'a', '02-Aug-2016', '12:21 pm', 'Aug', '2016'),
(34, 5, 2, 'a', '02-Aug-2016', '12:21 pm', 'Aug', '2016'),
(35, 5, 3, 'a', '02-Aug-2016', '12:21 pm', 'Aug', '2016'),
(36, 5, 4, 'a', '02-Aug-2016', '12:21 pm', 'Aug', '2016');

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
(1, '1', '5', '2000', '1000', '2000', '26-Jul-2016', '06:59:22pm', 1),
(2, '1', '6', '3000', '1000', '3000', '26-Jul-2016', '06:59:22pm', 1),
(3, '2', '5', '2000', '500', '1500', '26-Jul-2016', '07:00:38pm', 1),
(4, '2', '6', '3000', '500', '2600', '26-Jul-2016', '07:00:38pm', 1),
(5, '3', '5', '2000', '1000', '1000', '26-Jul-2016', '07:01:31pm', 1),
(6, '4', '5', '2000', '500', '1000', '30-Jul-2016', '12:53:19pm', 1),
(7, '4', '6', '3000', '500', '2500', '30-Jul-2016', '12:53:19pm', 1);

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
(1, '1', '1000', '500', 500, 'Admission Fee', 'Jul', '2016', '01-Jul-2016'),
(2, '2', '500', '400', 100, 'Admission Fee', 'Jul', '2016', '02-Jul-2016'),
(3, '3', '1000', '0', 1000, 'Admission Fee', 'Jul', '2016', '26-Jul-2016'),
(4, '4', '500', '200', 300, 'Admission Fee', 'Jul', '2016', '30-Jul-2016'),
(5, '1', '', '400', 100, 'ID Card Fee', 'Aug', '2016', '01-Aug-2016');

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
(1, 1, 2000, 1000, '1000', 'Jul', '2016', '26-Jul-2016', 'Monthly Fee'),
(2, 2, 3000, 0, '3000', 'Jul', '2016', '26-Jul-2016', 'Monthly Fee'),
(3, 3, 1500, 500, '1000', 'Jun', '2016', '26-Jul-2016', 'Monthly Fee'),
(4, 4, 2600, 0, '2600', 'Jul', '2016', '26-Jul-2016', 'Monthly Fee'),
(5, 5, 1000, 0, '1000', 'Jul', '2016', '26-Jul-2016', 'Monthly Fee'),
(6, 1, 1000, 500, '500', 'Jul', '2016', '26-Jul-2016', 'Monthly Fee'),
(7, 3, 1500, 0, '2500', 'Jul', '2016', '29-Jul-2016', 'Monthly Fee'),
(8, 6, 1000, 500, '500', 'Jul', '2016', '30-Jul-2016', 'Monthly Fee'),
(9, 7, 2500, 1000, '1500', 'Jul', '2016', '30-Jul-2016', 'Monthly Fee'),
(10, 1, 2000, 0, '2500', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(11, 2, 3000, 0, '6000', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(12, 3, 1500, 0, '4000', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(13, 4, 2600, 0, '5200', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(14, 5, 1000, 0, '2000', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(15, 6, 1000, 0, '1500', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(16, 7, 2500, 0, '4000', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee'),
(17, 1, 2500, 2000, '500', 'Aug', '2016', '01-Aug-2016', 'Monthly Fee');

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
(1, 'teacher1', 'teacher@seeds.com', 'teacher', '162312213123121', 'katlang1', '031292367982', 'female', '14-Jul-2016', '12:33:38pm', '19-Jul-2016', '07:57:17pm', 1),
(2, 'teacher 2', 'teacher2@seeds.com', 'teacher', '1610102591183', 'Charsadda,KPK,Pakistan', '03155151801', 'female', '19-Jul-2016', '07:16:54pm', '', '', 1),
(3, 'teacher_pass', 'teacher_pass@seedschool.com', 'teacher', '231232132131223', 'katti garhi adda', '2334234324234', 'male', '30-Jul-2016', '05:54:20pm', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendence`
--

CREATE TABLE `teacher_attendence` (
  `teacher_att_id` bigint(20) NOT NULL,
  `fkteacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendence`
--

INSERT INTO `teacher_attendence` (`teacher_att_id`, `fkteacher_id`, `class_id`, `status`, `date`, `month`, `year`) VALUES
(30, 1, 6, 'a', '2016-07-15', 'Jul', '2016'),
(31, 1, 6, 'Saturday', '2016-07-16', 'Jul', '2016'),
(32, 1, 6, 'Sunday', '2016-07-17', 'Jul', '2016'),
(33, 1, 6, 'a', '2016-07-18', 'Jul', '2016'),
(34, 1, 6, 'a', '2016-07-19', 'Jul', '2016'),
(35, 1, 6, 'a', '2016-07-20', 'Jul', '2016'),
(36, 1, 6, 'p', '2016-07-21', 'Jul', '2016'),
(37, 1, 6, 'l', '2016-07-22', 'Jul', '2016'),
(38, 1, 6, 'Saturday', '2016-07-23', 'Jul', '2016'),
(39, 1, 6, 'Sunday', '2016-07-24', 'Jul', '2016'),
(40, 1, 6, 'a', '2016-07-25', 'Jul', '2016'),
(41, 1, 6, 'a', '2016-07-26', 'Jul', '2016'),
(42, 1, 6, 'a', '2016-07-27', 'Jul', '2016'),
(43, 1, 6, 'a', '2016-07-28', 'Jul', '2016'),
(44, 1, 6, 'a', '2016-07-29', 'Jul', '2016'),
(45, 1, 6, 'Saturday', '2016-07-30', 'Jul', '2016'),
(46, 1, 6, 'Sunday', '2016-07-31', 'Jul', '2016'),
(47, 1, 5, 'p', '2016-08-01', 'Aug', '2016'),
(48, 1, 5, 'a', '2016-08-02', 'Aug', '2016'),
(49, 1, 5, 'a', '2016-08-03', 'Aug', '2016'),
(50, 1, 5, 'a', '2016-08-04', 'Aug', '2016'),
(51, 1, 5, 'a', '2016-08-05', 'Aug', '2016'),
(52, 1, 5, 'Saturday', '2016-08-06', 'Aug', '2016'),
(53, 1, 5, 'Sunday', '2016-08-07', 'Aug', '2016'),
(54, 1, 5, 'a', '2016-08-08', 'Aug', '2016'),
(55, 1, 5, 'a', '2016-08-09', 'Aug', '2016'),
(56, 1, 5, 'a', '2016-08-10', 'Aug', '2016'),
(57, 1, 5, 'a', '2016-08-11', 'Aug', '2016'),
(58, 1, 5, 'a', '2016-08-12', 'Aug', '2016'),
(59, 1, 5, 'Saturday', '2016-08-13', 'Aug', '2016'),
(60, 1, 5, 'Sunday', '2016-08-14', 'Aug', '2016'),
(61, 1, 5, 'a', '2016-08-15', 'Aug', '2016'),
(62, 1, 5, 'a', '2016-08-16', 'Aug', '2016'),
(63, 1, 5, 'a', '2016-08-17', 'Aug', '2016'),
(64, 1, 5, 'a', '2016-08-18', 'Aug', '2016'),
(65, 1, 5, 'a', '2016-08-19', 'Aug', '2016'),
(66, 1, 5, 'Saturday', '2016-08-20', 'Aug', '2016'),
(67, 1, 5, 'Sunday', '2016-08-21', 'Aug', '2016'),
(68, 1, 5, 'a', '2016-08-22', 'Aug', '2016'),
(69, 1, 5, 'a', '2016-08-23', 'Aug', '2016'),
(70, 1, 5, 'a', '2016-08-24', 'Aug', '2016'),
(71, 1, 5, 'a', '2016-08-25', 'Aug', '2016'),
(72, 1, 5, 'a', '2016-08-26', 'Aug', '2016'),
(73, 1, 5, 'Saturday', '2016-08-27', 'Aug', '2016'),
(74, 1, 5, 'Sunday', '2016-08-28', 'Aug', '2016'),
(75, 1, 5, 'a', '2016-08-29', 'Aug', '2016'),
(76, 1, 5, 'a', '2016-08-30', 'Aug', '2016'),
(77, 1, 5, 'a', '2016-08-31', 'Aug', '2016'),
(78, 1, 5, 'p', '2016-07-01', 'Jul', '2016'),
(79, 1, 5, 'Saturday', '2016-07-02', 'Jul', '2016'),
(80, 1, 5, 'Sunday', '2016-07-03', 'Jul', '2016'),
(81, 1, 5, 'a', '2016-07-04', 'Jul', '2016'),
(82, 1, 5, 'a', '2016-07-05', 'Jul', '2016'),
(83, 1, 5, 'a', '2016-07-06', 'Jul', '2016'),
(84, 1, 5, 'a', '2016-07-07', 'Jul', '2016'),
(85, 1, 5, 'a', '2016-07-08', 'Jul', '2016'),
(86, 1, 5, 'Saturday', '2016-07-09', 'Jul', '2016'),
(87, 1, 5, 'Sunday', '2016-07-10', 'Jul', '2016'),
(88, 1, 5, 'a', '2016-07-11', 'Jul', '2016'),
(89, 1, 5, 'a', '2016-07-12', 'Jul', '2016'),
(90, 1, 5, 'a', '2016-07-13', 'Jul', '2016'),
(91, 1, 5, 'a', '2016-07-14', 'Jul', '2016'),
(92, 1, 5, 'a', '2016-07-15', 'Jul', '2016'),
(93, 1, 5, 'Saturday', '2016-07-16', 'Jul', '2016'),
(94, 1, 5, 'Sunday', '2016-07-17', 'Jul', '2016'),
(95, 1, 5, 'a', '2016-07-18', 'Jul', '2016'),
(96, 1, 5, 'a', '2016-07-19', 'Jul', '2016'),
(97, 1, 5, 'a', '2016-07-20', 'Jul', '2016'),
(98, 1, 5, 'a', '2016-07-21', 'Jul', '2016'),
(99, 1, 5, 'a', '2016-07-22', 'Jul', '2016'),
(100, 1, 5, 'Saturday', '2016-07-23', 'Jul', '2016'),
(101, 1, 5, 'Sunday', '2016-07-24', 'Jul', '2016'),
(102, 1, 5, 'a', '2016-07-25', 'Jul', '2016'),
(103, 1, 5, 'a', '2016-07-26', 'Jul', '2016'),
(104, 1, 5, 'a', '2016-07-27', 'Jul', '2016'),
(105, 1, 5, 'a', '2016-07-28', 'Jul', '2016'),
(106, 1, 5, 'a', '2016-07-29', 'Jul', '2016'),
(107, 1, 5, 'Saturday', '2016-07-30', 'Jul', '2016'),
(108, 1, 5, 'Sunday', '2016-07-31', 'Jul', '2016'),
(109, 1, 5, 'a', '2016-08-01', 'Aug', '2016'),
(110, 1, 6, 'a', '2016-08-01', 'Aug', '2016'),
(111, 1, 5, 'a', '2016-08-02', 'Aug', '2016'),
(112, 1, 6, 'a', '2016-08-02', 'Aug', '2016');

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
  `salary_year` varchar(20) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_salaries`
--

INSERT INTO `teacher_salaries` (`sa_id`, `fkteacher_id`, `total_salary`, `paid_salary`, `remaining_salary`, `amount_reason`, `paid_month`, `salary_year`, `created_date`, `created_time`) VALUES
(1, 7, 1600, 1000, 600, 'month', '06', '2015', '27-Jun-2016', '04:11:57pm'),
(2, 7, 1600, 200, 400, 'teacher salary', '02', '2016', '27-Jun-2016', '04:12:17pm'),
(3, 1, 2470, 2400, 70, 'salary', '07', '2016', '30-Jul-2016', '04:06:43pm'),
(4, 1, 3270, 2370, 970, 'monthly paid', '08', '2016', '01-Aug-2016', '04:55:05pm'),
(5, 1, 3270, 1000, 3240, 'month', '09', '2016', '01-Aug-2016', '05:06:47pm'),
(6, 1, 3270, 1000, 2240, 'month', '09', '2016', '01-Aug-2016', '05:13:38pm'),
(7, 1, 3270, 1000, 1240, 'month', '09', '2016', '01-Aug-2016', '05:21:42pm');

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
(22, 'visitor 1', '09345234243', 'Information about Class', 'charsadaa ,kpk,Pakistan', 'Parent', 'female', '2342342323432', 'hi this is me ?', '', '21-Jul-2016', '07:17:37pm', 'Mar', '2016', 0),
(23, 'sadsad', '324234234234', 'New Admission', 'kadas asd asd sa', 'Student Him Self', 'male', '2342342342342', 'assa asd as d as da sd as das\r\n', '', '30-Jul-2016', '07:04:11pm', 'Jul', '2016', 0),
(24, 'visitor by recpe', '324234234234', 'Other Information', 'kadas asd asd sa', 'Parent', 'female', '2131231232132', 'hi for recept check', '', '01-Aug-2016', '03:50:29pm', 'Aug', '2016', 0),
(25, 'visitor by recpe', '324234234234', 'Other Information', 'kadas asd asd sa', 'Parent', 'female', '2131231232132', 'hi for recept check', '', '01-Aug-2016', '03:52:01pm', 'Aug', '2016', 0),
(26, 'visitor by recpe', '324234234234', 'Other Information', 'kadas asd asd sa', 'Parent', 'female', '2131231232132', 'hi for recept check', '', '01-Aug-2016', '03:52:05pm', 'Aug', '2016', 1),
(27, 'receptionist', '324234234234', 'Other Information', 'kadas asd asd sa', 'Parent', 'female', '2342342342342', 'asdasdas d a sd asd', '', '01-Aug-2016', '03:53:30pm', 'Aug', '2016', 1);

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
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `bank_transection`
--
ALTER TABLE `bank_transection`
  ADD PRIMARY KEY (`t_id`);

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
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bank_transection`
--
ALTER TABLE `bank_transection`
  MODIFY `t_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `otherstaff`
--
ALTER TABLE `otherstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff_attendence`
--
ALTER TABLE `staff_attendence`
  MODIFY `Staff_att_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `staff_salaries`
--
ALTER TABLE `staff_salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `st_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `student_class_fee`
--
ALTER TABLE `student_class_fee`
  MODIFY `classfee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `student_other_payment`
--
ALTER TABLE `student_other_payment`
  MODIFY `otherpay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student_payment`
--
ALTER TABLE `student_payment`
  MODIFY `p_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `su_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teacher_attendence`
--
ALTER TABLE `teacher_attendence`
  MODIFY `teacher_att_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `teacher_salaries`
--
ALTER TABLE `teacher_salaries`
  MODIFY `sa_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  MODIFY `teacher_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
