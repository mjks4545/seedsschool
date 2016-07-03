-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2016 at 07:33 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seeds_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(18) NOT NULL,
  `cno` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `coments` varchar(300) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pwd`, `cno`, `address`, `coments`, `status`, `created_at`) VALUES
(1, 'admin', 'admin@seedsschool.com', 'admin', '00923429818632', 'GHQ Peshawar', '1st Admin', 1, '06/09/2016 03:43 pm');

-- --------------------------------------------------------

--
-- Table structure for table `auto_fee_genarate`
--

CREATE TABLE IF NOT EXISTS `auto_fee_genarate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auto_month` varchar(20) NOT NULL,
  `auto_year` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `cl_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `su_id` bigint(20) NOT NULL,
  `co_id` bigint(20) NOT NULL,
  `t_id` bigint(11) NOT NULL,
  `fee` varchar(6) NOT NULL,
  `time` varchar(50) NOT NULL,
  `s_date` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL,
  `e_date` varchar(15) NOT NULL,
  `class_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cl_id`, `su_id`, `co_id`, `t_id`, `fee`, `time`, `s_date`, `date`, `e_date`, `class_status`) VALUES
(1, 3, 1, 5, '4000', '10:00-10:00', '31-Dec-2016', '27-Jun-2016', '01-May-2017', 1),
(2, 1, 1, 7, '3000', '12:00-03:00', '31-Dec-2016', '24-Jun-2016', '01-May-2017', 1),
(3, 2, 2, 7, '5000', '12:00-01:00', '01-Jul-2016', '25-Jun-2016', '01-Nov-2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `co_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `co_name` varchar(50) NOT NULL,
  `created_date` varchar(100) NOT NULL,
  `created_time` varchar(100) NOT NULL,
  `updated_date` varchar(100) NOT NULL,
  `updated_time` varchar(100) NOT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`co_id`, `co_name`, `created_date`, `created_time`, `updated_date`, `updated_time`) VALUES
(1, 'A levels', '14-Jun-2016', '03:41:01pm', '', ''),
(2, 'O levels', '14-Jun-2016', '03:41:01pm', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_reason` varchar(100) NOT NULL,
  `expense_paid_to` varchar(100) NOT NULL,
  `expense_paid_amount` varchar(100) NOT NULL,
  `expense_created_date` varchar(100) NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `expense_reason`, `expense_paid_to`, `expense_paid_amount`, `expense_created_date`) VALUES
(1, 'any', 'ali', '1000', '02-Jul-2016'),
(2, 'anyyy', 'asdf', '200', '02-Jul-2016'),
(3, 'sam na', 'lala', '500', '02-Jul-2016'),
(4, 'asdf', 'khan', '900', '02-Jul-2016'),
(5, 'hi to', 'lala g', '2500', '03-Jul-2016'),
(6, 'pase pakr di', 'khan kaka', '1500', '03-Jul-2016'),
(7, 'asdfgg', 'khankahan', '1000', '03-Jul-2016'),
(8, 'asdsadas', 'muhammad', '800', '03-Jul-2016');

-- --------------------------------------------------------

--
-- Table structure for table `otherstaff`
--

CREATE TABLE IF NOT EXISTS `otherstaff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `password` varchar(18) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `otherstaff`
--

INSERT INTO `otherstaff` (`id`, `name`, `contact`, `cnic`, `type`, `salary`, `address`, `email`, `st_status`, `created_date`, `created_time`, `updated_date`, `updated_time`, `password`) VALUES
(1, 'Khan ', '12345698741', '1324567891231', 'Receptionist', '10000', 'khan@clerk.com', 'khan@clerk.com', '1', '13-Jun-2016', '11:04:40am', '13-Jun-2016', '12:19:28pm', ''),
(3, 'Tony', '03654125694', '0610235946231', 'Receptionist', '10000', 'tony@recep.com', 'tony@recep.com', '0', '13-Jun-2016', '01:14:30pm', '22-Jun-2016', '04:02:43pm', ''),
(4, 'Gull Khan Kaka', '02156598745', '0610565987412', 'Librarian', '12000', 'gulkhan@kaka.com', 'gulkhan@kaka.com', '1', '13-Jun-2016', '01:48:03pm', '13-Jun-2016', '01:59:34pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendence`
--

CREATE TABLE IF NOT EXISTS `staff_attendence` (
  `Staff_att_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sta_id` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  PRIMARY KEY (`Staff_att_id`),
  UNIQUE KEY `id` (`Staff_att_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `staff_attendence`
--

INSERT INTO `staff_attendence` (`Staff_att_id`, `sta_id`, `status`, `date`, `month`, `year`) VALUES
(1, 1, 'p', '01-May-2016', 'May', '2016'),
(2, 3, 'p', '01-May-2016', 'May', '2016'),
(3, 4, 'p', '01-May-2016', 'May', '2016'),
(4, 1, 'p', '02-May-2016', 'May', '2016'),
(5, 3, 'p', '02-May-2016', 'May', '2016'),
(6, 4, 'p', '02-May-2016', 'May', '2016'),
(7, 1, 'p', '03-May-2016', 'May', '2016'),
(8, 3, 'p', '03-May-2016', 'May', '2016'),
(9, 4, 'p', '03-May-2016', 'May', '2016'),
(10, 1, 'p', '04-May-2016', 'May', '2016'),
(11, 3, 'p', '04-May-2016', 'May', '2016'),
(12, 4, 'p', '04-May-2016', 'May', '2016'),
(13, 1, 'p', '05-May-2016', 'May', '2016'),
(14, 3, 'p', '05-May-2016', 'May', '2016'),
(15, 4, 'p', '05-May-2016', 'May', '2016'),
(16, 1, 'a', '06-May-2016', 'May', '2016'),
(17, 3, 'p', '06-May-2016', 'May', '2016'),
(18, 4, 'p', '06-May-2016', 'May', '2016'),
(19, 1, 'a', '07-May-2016', 'May', '2016'),
(20, 3, 'a', '07-May-2016', 'May', '2016'),
(21, 4, 'l', '07-May-2016', 'May', '2016'),
(22, 1, 'p', '08-May-2016', 'May', '2016'),
(23, 3, 'a', '08-May-2016', 'May', '2016'),
(24, 4, 'l', '08-May-2016', 'May', '2016'),
(25, 1, 'a', '09-May-2016', 'May', '2016'),
(26, 3, 'p', '09-May-2016', 'May', '2016'),
(27, 4, 'p', '09-May-2016', 'May', '2016'),
(28, 1, 'p', '10-May-2016', 'May', '2016'),
(29, 3, 'p', '10-May-2016', 'May', '2016'),
(30, 4, 'p', '10-May-2016', 'May', '2016'),
(31, 1, 'a', '11-May-2016', 'May', '2016'),
(32, 3, 'p', '11-May-2016', 'May', '2016'),
(33, 4, 'l', '11-May-2016', 'May', '2016'),
(34, 1, 'p', '12-May-2016', 'May', '2016'),
(35, 3, 'p', '12-May-2016', 'May', '2016'),
(36, 4, 'a', '12-May-2016', 'May', '2016'),
(37, 1, 'a', '13-May-2016', 'May', '2016'),
(38, 3, 'p', '13-May-2016', 'May', '2016'),
(39, 4, 'l', '13-May-2016', 'May', '2016'),
(40, 1, 'p', '14-May-2016', 'May', '2016'),
(41, 3, 'a', '14-May-2016', 'May', '2016'),
(42, 4, 'a', '14-May-2016', 'May', '2016'),
(43, 1, 'p', '15-May-2016', 'May', '2016'),
(44, 3, 'p', '15-May-2016', 'May', '2016'),
(45, 4, 'p', '15-May-2016', 'May', '2016'),
(46, 1, 'a', '16-May-2016', 'May', '2016'),
(47, 3, 'a', '16-May-2016', 'May', '2016'),
(48, 4, 'a', '16-May-2016', 'May', '2016'),
(49, 1, 'l', '17-May-2016', 'May', '2016'),
(50, 3, 'l', '17-May-2016', 'May', '2016'),
(51, 4, 'l', '17-May-2016', 'May', '2016'),
(52, 1, 'p', '18-May-2016', 'May', '2016'),
(53, 3, 'p', '18-May-2016', 'May', '2016'),
(54, 4, 'l', '18-May-2016', 'May', '2016'),
(55, 1, 'a', '19-May-2016', 'May', '2016'),
(56, 3, 'a', '19-May-2016', 'May', '2016'),
(57, 4, 'a', '19-May-2016', 'May', '2016'),
(58, 1, 'p', '20-May-2016', 'May', '2016'),
(59, 3, 'p', '20-May-2016', 'May', '2016'),
(60, 4, 'p', '20-May-2016', 'May', '2016'),
(61, 1, 'p', '21-May-2016', 'May', '2016'),
(62, 3, 'p', '21-May-2016', 'May', '2016'),
(63, 4, 'p', '21-May-2016', 'May', '2016'),
(64, 1, 'p', '22-May-2016', 'May', '2016'),
(65, 3, 'p', '22-May-2016', 'May', '2016'),
(66, 4, 'p', '22-May-2016', 'May', '2016'),
(67, 1, 'p', '23-May-2016', 'May', '2016'),
(68, 3, 'p', '23-May-2016', 'May', '2016'),
(69, 4, 'p', '23-May-2016', 'May', '2016'),
(70, 1, 'p', '24-May-2016', 'May', '2016'),
(71, 3, 'a', '24-May-2016', 'May', '2016'),
(72, 4, 'a', '24-May-2016', 'May', '2016'),
(73, 1, 'p', '25-May-2016', 'May', '2016'),
(74, 3, 'p', '25-May-2016', 'May', '2016'),
(75, 4, 'p', '25-May-2016', 'May', '2016'),
(76, 1, 'a', '26-May-2016', 'May', '2016'),
(77, 3, 'a', '26-May-2016', 'May', '2016'),
(78, 4, 'a', '26-May-2016', 'May', '2016'),
(79, 1, 'p', '27-May-2016', 'May', '2016'),
(80, 3, 'a', '27-May-2016', 'May', '2016'),
(81, 4, 'l', '27-May-2016', 'May', '2016'),
(82, 1, 'l', '28-May-2016', 'May', '2016'),
(83, 3, 'p', '28-May-2016', 'May', '2016'),
(84, 4, 'p', '28-May-2016', 'May', '2016'),
(85, 1, 'p', '29-May-2016', 'May', '2016'),
(86, 3, 'p', '29-May-2016', 'May', '2016'),
(87, 4, 'a', '29-May-2016', 'May', '2016'),
(88, 1, 'a', '30-May-2016', 'May', '2016'),
(89, 3, 'a', '30-May-2016', 'May', '2016'),
(90, 4, 'l', '30-May-2016', 'May', '2016'),
(91, 1, 'p', '31-May-2016', 'May', '2016'),
(92, 3, 'p', '31-May-2016', 'May', '2016'),
(93, 4, 'p', '31-May-2016', 'May', '2016'),
(94, 1, 'a', '01-Jun-2016', 'Jun', '2016'),
(95, 3, 'l', '01-Jun-2016', 'Jun', '2016'),
(96, 4, 'p', '01-Jun-2016', 'Jun', '2016'),
(97, 1, 'p', '02-Jun-2016', 'Jun', '2016'),
(98, 3, 'p', '02-Jun-2016', 'Jun', '2016'),
(99, 4, 'p', '02-Jun-2016', 'Jun', '2016'),
(100, 1, 'p', '03-Jun-2016', 'Jun', '2016'),
(101, 3, 'p', '03-Jun-2016', 'Jun', '2016'),
(102, 4, 'p', '03-Jun-2016', 'Jun', '2016'),
(103, 1, 'p', '04-Jun-2016', 'Jun', '2016'),
(104, 3, 'p', '04-Jun-2016', 'Jun', '2016'),
(105, 4, 'p', '04-Jun-2016', 'Jun', '2016'),
(106, 1, 'p', '23-Jun-2016', 'Jun', '2016'),
(107, 3, 'p', '23-Jun-2016', 'Jun', '2016'),
(108, 4, 'p', '23-Jun-2016', 'Jun', '2016'),
(109, 5, 'p', '26-Jun-2016', 'Jun', '2016'),
(110, 6, 'p', '26-Jun-2016', 'Jun', '2016'),
(111, 7, 'p', '26-Jun-2016', 'Jun', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `staff_salaries`
--

CREATE TABLE IF NOT EXISTS `staff_salaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fkstaff_id` varchar(100) NOT NULL,
  `total_salary` varchar(150) NOT NULL,
  `paid_salary` varchar(150) NOT NULL,
  `remaining_salary` varchar(150) NOT NULL,
  `amount_reason` varchar(100) NOT NULL,
  `paid_month` varchar(100) NOT NULL,
  `created_date` varchar(100) NOT NULL,
  `created_time` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `staff_salaries`
--

INSERT INTO `staff_salaries` (`id`, `fkstaff_id`, `total_salary`, `paid_salary`, `remaining_salary`, `amount_reason`, `paid_month`, `created_date`, `created_time`) VALUES
(5, '4', '12000', '2000', '10000', 'any', '1', '14-Jun-2016', '12:03:01pm'),
(8, '3', '10000', '1000', '9000', '123', '1', '14-Jun-2016', '12:09:08pm'),
(11, '1', '10000', '3000', '7000', 'asdas', '2', '14-Jun-2016', '12:10:35pm'),
(14, '4', '12000', '1000', '9000', 'asd', '1', '14-Jun-2016', '12:28:49pm'),
(15, '4', '12000', '2000', '7000', 'anyy', '1', '14-Jun-2016', '12:29:22pm'),
(16, '4', '12000', '5000', '14000', 'asdf', '2', '14-Jun-2016', '12:29:43pm'),
(17, '3', '10000', '5000', '4000', 'wahla', '1', '14-Jun-2016', '12:30:19pm'),
(18, '3', '10000', '4000', '10000', 'zxc', '3', '14-Jun-2016', '12:30:43pm'),
(19, '1', '10000', '5000', '12000', 'nuri neshta', '1', '14-Jun-2016', '12:31:22pm'),
(20, '1', '10000', '3000', '9000', 'zaaa', '1', '14-Jun-2016', '12:33:55pm'),
(21, '1', '10000', '5000', '4000', 'checking', '1', '14-Jun-2016', '12:35:33pm'),
(22, '4', '12000', '500', '25500', 'goro nu', '1', '14-Jun-2016', '12:42:31pm'),
(23, '4', '12000', '1000', '24500', 'balance', '1', '14-Jun-2016', '12:43:44pm'),
(24, '4', '12000', '1000', '23500', 'balance', '1', '14-Jun-2016', '12:45:13pm'),
(25, '4', '12000', '555', '22945', '555', '1', '14-Jun-2016', '12:46:13pm'),
(26, '4', '12000', '0.3', '22944.7', 'wali ye dala darkama salary', '1', '14-Jun-2016', '02:19:44pm'),
(27, '4', '12000', '22944.7', '0', 'paid', '1', '22-Jun-2016', '03:19:55pm');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(100) NOT NULL,
  `std_father_name` varchar(100) NOT NULL,
  `student_contact` varchar(20) NOT NULL,
  `std_guardian_contact` varchar(20) NOT NULL,
  `current_school` varchar(100) NOT NULL,
  `facebook_id` varchar(50) NOT NULL,
  `student_address` varchar(100) NOT NULL,
  `student_email` varchar(32) NOT NULL,
  `pic` varchar(500) NOT NULL,
  `fkcourse_id` varchar(10) NOT NULL,
  `student_created_date` varchar(20) NOT NULL,
  `student_created_time` varchar(20) NOT NULL,
  `student_updated_date` varchar(20) NOT NULL,
  `student_updated_time` varchar(20) NOT NULL,
  `student_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `std_father_name`, `student_contact`, `std_guardian_contact`, `current_school`, `facebook_id`, `student_address`, `student_email`, `pic`, `fkcourse_id`, `student_created_date`, `student_created_time`, `student_updated_date`, `student_updated_time`, `student_status`) VALUES
(1, 'Mehboob Ali Shaha', 'Mama ga', '03429818632', '03429818632', 'katlang', 'www.facebook.com/muhammad', 'wali na ze', 'muhammadullah4u@yahoo.com', '', '1', '25-Jun-2016', '11:30:57am', '', '', 1),
(4, 'ali', 'khan', '696979878789', '79877879878', 'jgjgj', 'jgjggj', 'jhgjgjg', 'younghunter293@gmail.com', '', '1', '25-Jun-2016', '12:23:54pm', '', '', 1),
(5, 'ali', 'Mama ga', '03429818632', '03429818632', 'katlang', 'www.facebook.com/muhammad', 'wali na ze', 'mehboob.alishah85@gmail.com', '', '1', '25-Jun-2016', '12:25:27pm', '', '', 1),
(6, 'std', 'khan', '03429818632', '03429818632', 'katlang', 'www.facebook.com/muhammad', 'wali na ze', 'admin@admin.com', '', '1', '27-Jun-2016', '03:33:00pm', '', '', 1),
(7, 'na zama kabul ta', 'Mama ga', '034298186323', '03429818632', 'katlang', 'www.facebook.com/muhammad', 'wali na ze', 'muhammadullah4u@yahoo.com', 'ba6925254797c9188b13d246eba94c58.JPG', '1', '28-Jun-2016', '09:11:47am', '30-Jun-2016', '04:46:12pm', 1),
(8, 'salman', 'shakir', '034298186323', '03429818632', 'katlang', 'www.facebook.com/muhammad', 'wali na ze', 'haz_bilal@yahoo.com', 'user.jpg', '1', '01-Jul-2016', '09:48:16am', '', '', 1),
(9, 'salman', 'safi ullah', '97987979779', '03429818632', 'katlang', 'www.facebook.com/muhammad', 'wali na ze', 'muhammadullah4u@yahoo.com', '4bce21e03bbc968c8eb8d39232554486.jpg', '1', '01-Jul-2016', '10:05:54am', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE IF NOT EXISTS `student_attendance` (
  `st_attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `fkclass_id` int(11) NOT NULL,
  `fkstudent_id` int(11) NOT NULL,
  `status` varchar(5) NOT NULL,
  `att_date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  PRIMARY KEY (`st_attendance_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`st_attendance_id`, `fkclass_id`, `fkstudent_id`, `status`, `att_date`, `time`, `month`, `year`) VALUES
(1, 1, 7, 'p', '29-Jun-2016', '12:10 01pm', 'Jun', '2016'),
(2, 2, 5, 'p', '29-Jun-2016', '12:10 46pm', 'Jun', '2016'),
(3, 2, 6, 'p', '29-Jun-2016', '12:10 46pm', 'Jun', '2016'),
(4, 2, 7, 'a', '29-Jun-2016', '12:10 46pm', 'Jun', '2016'),
(5, 2, 5, 'p', '30-Jun-2016', '12:30 21pm', 'Jun', '2016'),
(6, 2, 6, 'p', '30-Jun-2016', '12:30 21pm', 'Jun', '2016'),
(7, 2, 7, 'p', '30-Jun-2016', '12:30 21pm', 'Jun', '2016'),
(8, 2, 5, 'p', '24-Jun-2016', '01:55 11pm', 'Jun', '2016'),
(9, 2, 6, 'p', '24-Jun-2016', '01:55 11pm', 'Jun', '2016'),
(10, 2, 7, 'p', '24-Jun-2016', '01:55 11pm', 'Jun', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_fee`
--

CREATE TABLE IF NOT EXISTS `student_class_fee` (
  `classfee_id` int(11) NOT NULL AUTO_INCREMENT,
  `fkstudent_id` varchar(32) NOT NULL,
  `fkclass_id` varchar(32) NOT NULL,
  `class_fee` varchar(150) NOT NULL,
  `admission_fee` varchar(150) NOT NULL,
  `to_be_pay` varchar(150) NOT NULL,
  `classfee_created_date` varchar(20) NOT NULL,
  `classfee_created_time` varchar(20) NOT NULL,
  `st_class_fee_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`classfee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `student_class_fee`
--

INSERT INTO `student_class_fee` (`classfee_id`, `fkstudent_id`, `fkclass_id`, `class_fee`, `admission_fee`, `to_be_pay`, `classfee_created_date`, `classfee_created_time`, `st_class_fee_status`) VALUES
(1, '1', '3', '3000', '1000', '3000', '25-Jun-2016', '11:31:35am', 1),
(2, '4', '3', '5000', '1000', '5000', '25-Jun-2016', '12:24:15pm', 1),
(3, '5', '2', '3000', '1000', '3000', '25-Jun-2016', '12:25:45pm', 1),
(4, '6', '2', '3000', '1000', '2000', '27-Jun-2016', '03:33:34pm', 1),
(5, '6', '3', '5000', '1000', '3000', '27-Jun-2016', '03:33:34pm', 1),
(6, '7', '1', '4000', '1000', '3000', '28-Jun-2016', '09:12:55am', 1),
(7, '7', '2', '3000', '1000', '2000', '28-Jun-2016', '09:12:55am', 1),
(8, '7', '3', '5000', '1000', '4000', '28-Jun-2016', '09:12:55am', 1),
(9, '8', '1', '4000', '500', '3000', '01-Jul-2016', '09:49:18am', 1),
(10, '8', '2', '3000', '500', '2000', '01-Jul-2016', '09:49:18am', 1),
(11, '9', '1', '4000', '500', '2000', '01-Jul-2016', '10:06:29am', 1),
(12, '9', '2', '3000', '500', '2000', '01-Jul-2016', '10:06:29am', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_other_payment`
--

CREATE TABLE IF NOT EXISTS `student_other_payment` (
  `otherpay_id` int(11) NOT NULL AUTO_INCREMENT,
  `fkstudent_id` varchar(200) NOT NULL,
  `total_amt` varchar(200) NOT NULL,
  `paid_amt` varchar(200) NOT NULL,
  `otherfee_remain` int(11) NOT NULL,
  `amt_reason` varchar(100) NOT NULL,
  `otherpay_created_date` varchar(20) NOT NULL,
  PRIMARY KEY (`otherpay_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `student_other_payment`
--

INSERT INTO `student_other_payment` (`otherpay_id`, `fkstudent_id`, `total_amt`, `paid_amt`, `otherfee_remain`, `amt_reason`, `otherpay_created_date`) VALUES
(1, '1', '1000', '1000', 0, 'Admission Fee', '01-Jul-2016'),
(2, '4', '1000', '500', 500, 'Admission Fee', '02-Jul-2016'),
(3, '4', '900', '500', 900, 'Certificate Fee', '02-Jul-2016'),
(4, '4', '1200', '1000', 1100, 'Certificate Fee', '02-Jul-2016'),
(5, '1', '1000', '500', 500, 'Admission Fee', '03-Jul-2016'),
(6, '1', '500', '100', 900, 'Admission Fee', '03-Jul-2016');

-- --------------------------------------------------------

--
-- Table structure for table `student_payment`
--

CREATE TABLE IF NOT EXISTS `student_payment` (
  `p_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fkstudentclassfee_id` int(11) NOT NULL,
  `std_payment` int(11) NOT NULL,
  `std_paid` int(11) NOT NULL,
  `std_remain` varchar(10) NOT NULL,
  `std_month` varchar(20) NOT NULL,
  `std_date` varchar(20) NOT NULL,
  `std_reason` varchar(100) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student_payment`
--

INSERT INTO `student_payment` (`p_id`, `fkstudentclassfee_id`, `std_payment`, `std_paid`, `std_remain`, `std_month`, `std_date`, `std_reason`) VALUES
(1, 1, 3000, 1000, '2000', 'Jan', '03-Jul-2016', 'Monthly Fee'),
(2, 1, 2000, 6000, '-4000', 'Jan', '03-Jul-2016', 'Monthly Fee'),
(3, 1, -1000, 1000, '-2000', 'Feb', '03-Jul-2016', 'Monthly Fee'),
(4, 1, -2000, 3000, '-5000', 'Feb', '03-Jul-2016', 'Monthly Fee');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `su_id` int(10) NOT NULL AUTO_INCREMENT,
  `su_name` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`su_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
(10, 'Mobiles technologies', 2),
(11, 'any', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `updated_date` varchar(20) NOT NULL,
  `updated_time` varchar(10) NOT NULL,
  `t_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `password`, `cnic`, `address`, `contact`, `created_date`, `created_time`, `updated_date`, `updated_time`, `t_status`) VALUES
(5, 'aasdf123', 'asdff@techer.com', 'mLrxPe', '1234567891345', 'asdfg', '1234564789564', '11-Jun-2016', '04:08:10pm', '11-Jun-2016', '08:09:39pm', 1),
(6, 'shaba mara', 'sgag@teacher.com', 'eFH5%T', '645598713214654', 'peshawar', '213254979461', '13-Jun-2016', '02:29:31pm', '13-Jun-2016', '02:50:55pm', 1),
(7, 'Muhammad  Ullah', 'muhammad@yahoo.com', 'VDRiQj', '16231221312312', 'wali na ze', '345345345345', '15-Jun-2016', '03:26:18pm', '16-Jun-2016', '09:40:39am', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendence`
--

CREATE TABLE IF NOT EXISTS `teacher_attendence` (
  `teacher_att_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fkteacher_id` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `date` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  PRIMARY KEY (`teacher_att_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `teacher_attendence`
--

INSERT INTO `teacher_attendence` (`teacher_att_id`, `fkteacher_id`, `status`, `date`, `month`, `year`) VALUES
(13, 5, 'p', '27-Jun-2016', 'Jun', '2016'),
(14, 7, 'p', '27-Jun-2016', 'Jun', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_salaries`
--

CREATE TABLE IF NOT EXISTS `teacher_salaries` (
  `sa_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fkteacher_id` int(11) NOT NULL,
  `total_salary` int(11) NOT NULL,
  `paid_salary` int(11) NOT NULL,
  `remaining_salary` int(11) NOT NULL,
  `amount_reason` varchar(150) NOT NULL,
  `paid_month` varchar(20) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  PRIMARY KEY (`sa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher_salaries`
--

INSERT INTO `teacher_salaries` (`sa_id`, `fkteacher_id`, `total_salary`, `paid_salary`, `remaining_salary`, `amount_reason`, `paid_month`, `created_date`, `created_time`) VALUES
(1, 7, 1600, 1000, 600, 'month', '1', '27-Jun-2016', '04:11:57pm'),
(2, 7, 1600, 200, 400, 'month', '1', '27-Jun-2016', '04:12:17pm'),
(3, 7, 1600, 100, 300, 'month', '1', '27-Jun-2016', '04:13:15pm'),
(4, 7, 2100, 2000, 400, 'month', '2', '27-Jun-2016', '04:13:44pm');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE IF NOT EXISTS `teacher_subject` (
  `teacher_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `comission` varchar(5) NOT NULL,
  PRIMARY KEY (`teacher_subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`teacher_subject_id`, `t_id`, `sub_id`, `comission`) VALUES
(3, 7, 1, '20'),
(4, 7, 2, '10'),
(5, 5, 1, '30');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `note` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL,
  `v_status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `name`, `contact`, `reason`, `address`, `relationship`, `note`, `date`, `time`, `v_status`) VALUES
(2, 'honda', '345345345345', 'paid', 'g9', 'Parents', 'za kana', '10-Jun-2016', '01:28:17pm', 1),
(3, 'honda', '345345345345', 'paid', 'g9', 'Brother', 'hi bro\r\n', '10-Jun-2016', '01:29:18pm', 1),
(4, 'ahmad', '03429818632', 'for meeting', 'gul hajji peshawar', 'Brother', 'meeting with director', '10-Jun-2016', '02:27:30pm', 1),
(5, 'honda', '345345345345', 'paid', 'g9', 'Parents', 'note herereee\r\n', '10-Jun-2016', '03:21:28pm', 1),
(6, 'honda', '345345345345', 'paid', 'g9', 'Brother', 'hi\r\n', '10-Jun-2016', '03:38:44pm', 1),
(7, 'junaid', '091232322323', 'enjoy', 'katlang', 'Parents', 'hi meeting with with some one', '10-Jun-2016', '04:14:26pm', 1),
(8, 'ahmad', '03243423423', 'meeting', 'kati garhi', 'Parents', 'hi this me', '11-Jun-2016', '11:03:02am', 1),
(10, 'honda', '345345345345', 'paid', 'g9', 'Parents', 'hi\r\n', '11-Jun-2016', '03:30:39pm', 1),
(11, 'muhammad', '345345345345', 'paid', 'g9', 'Brother', 'hey whas up', '11-Jun-2016', '03:34:21pm', 1),
(12, 'asdsa', '897324983274', 'rasha rasha kana kana', 'za laar sham kali  ta', 'Parents', 'za che kabal ta', '11-Jun-2016', '03:35:27pm', 0),
(13, 'raza che zo kabal ta ', '3242343233', 'na zama kabal ta', 'wali na ze', 'Parents', 'plara raza che zo kana bia ba roja pa lara matoo nu\r\n', '11-Jun-2016', '03:36:29pm', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
