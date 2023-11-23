-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2019 at 01:15 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stree`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `dat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `tid`, `uname`, `comment`, `dat`) VALUES
(1, 1, 'Navami S Binu', 'cccdc', '27-03-19'),
(2, 1, 'Amrutha Babu', 'ddsfdfdg', '28-03-19'),
(3, 14, 'Amrutha Babu', 'dsddsdsd', '28-03-19'),
(4, 13, 'Amrutha Babu', 'fdfdfdfdfdf', '30-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `id` int(11) NOT NULL,
  `forumid` varchar(20) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `des` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `uname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`id`, `forumid`, `topic`, `des`, `date`, `uname`) VALUES
(1, '1', 'sasasas', 'aaaaaaaaaaaaaaaaaaaaaa', '27-03-19', 'Amrutha Babu'),
(2, '1', 'vbvbvbvb', 'vbbvbvbvb', '28-03-19', 'Vargheese Kuriyan'),
(13, '1', 'vdvddf', 'gfgfgfgfg', '28-03-19', 'Amrutha Babu'),
(14, '1', 'sdsddsd', 'dsdds', '28-03-19', 'Amrutha Babu'),
(15, '1', 'dsdsdsd', 'dsdsdsddsd', '30-03-19', 'Amrutha Babu');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL,
  `head` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `secques` varchar(20) NOT NULL,
  `ans` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `name`, `type`, `head`, `password`, `secques`, `ans`) VALUES
(1, 'Navami', 'civil', 'Problems Faced by womens ?', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_appointment`
--

CREATE TABLE `tb_appointment` (
  `app_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `district` varchar(30) NOT NULL,
  `center_id` int(11) NOT NULL,
  `app_date` date NOT NULL,
  `app_time` varchar(15) DEFAULT NULL,
  `app_type` varchar(20) NOT NULL,
  `response` varchar(50) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `date` varchar(15) NOT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `token_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_appointment`
--

INSERT INTO `tb_appointment` (`app_id`, `user_id`, `district`, `center_id`, `app_date`, `app_time`, `app_type`, `response`, `status`, `date`, `doc_id`, `token_no`) VALUES
(1, 1, 'ernakulam', 1, '2019-04-05', '09:00 AM', 'Psychology', NULL, '1', '26-03-2019', 1, 1),
(2, 1, 'ernakulam', 1, '0000-00-00', NULL, 'aaa', NULL, '0', '31-03-2019', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_assign`
--

CREATE TABLE `tb_assign` (
  `complaint_id` int(11) NOT NULL,
  `police_id` int(11) NOT NULL,
  `progress` varchar(40) NOT NULL,
  `datetime` varchar(30) NOT NULL,
  `doc_upload` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_assign`
--

INSERT INTO `tb_assign` (`complaint_id`, `police_id`, `progress`, `datetime`, `doc_upload`) VALUES
(1, 1, 'fdfdfsdfsdfsdfsdfdf', '2019-03-27 06:25:22pm', '139598.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ccenter`
--

CREATE TABLE `tb_ccenter` (
  `center_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `center_name` varchar(20) NOT NULL,
  `district` varchar(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `doc_upload` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ccenter`
--

INSERT INTO `tb_ccenter` (`center_id`, `log_id`, `center_name`, `district`, `place`, `pin`, `phone_no`, `email_id`, `status`, `doc_upload`, `date`) VALUES
(1, 4, 'Sahrudaya', 'Ernakulam', 'Aluva', '683101', '8605762553', 'sahrudaya@gmail.com', '1', '5_6111688301284950070.pdf', '26-03-2019'),
(2, 16, 'Prathyasa', 'Thrissur', 'West Fort', '680004', '8676376335', 'pratyashath67@gmail.com', '2', 'dcc39e23-government-schemes-capsule-september-2018.pdf', '29-03-2019');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cdoctors`
--

CREATE TABLE `tb_cdoctors` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(30) NOT NULL,
  `doc_dob` date NOT NULL,
  `doc_district` varchar(30) NOT NULL,
  `doc_place` varchar(30) NOT NULL,
  `doc_house` varchar(30) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `doc_aadhar` varchar(12) NOT NULL,
  `doc_phone` varchar(12) NOT NULL,
  `doc_email` varchar(30) NOT NULL,
  `doc_qualification` varchar(20) NOT NULL,
  `doc_specialization` varchar(20) NOT NULL,
  `center_id` int(11) NOT NULL,
  `photo_upload` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cdoctors`
--

INSERT INTO `tb_cdoctors` (`doc_id`, `doc_name`, `doc_dob`, `doc_district`, `doc_place`, `doc_house`, `pin`, `doc_aadhar`, `doc_phone`, `doc_email`, `doc_qualification`, `doc_specialization`, `center_id`, `photo_upload`, `date`) VALUES
(1, 'James Mathew', '1987-03-15', 'Ernakulam', 'Muvattupuzha', 'Nirappil (H)', '686661', '673672637237', '8705365761', 'jamesmathew@gmail.com', 'MBBS,MD', 'Psychology', 1, 'IMG_1608_edit_edit_edit_edit.JPG', '30-03-2019');

-- --------------------------------------------------------

--
-- Table structure for table `tb_complaint`
--

CREATE TABLE `tb_complaint` (
  `comp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comp_subject` varchar(50) NOT NULL,
  `comp_type` varchar(20) NOT NULL,
  `comp_details` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  `doc_upload` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_complaint`
--

INSERT INTO `tb_complaint` (`comp_id`, `user_id`, `comp_subject`, `comp_type`, `comp_details`, `date`, `status`, `doc_upload`) VALUES
(1, 1, 'Some one tries to hack my phone', 'Cyber crime against ', 'Some one hack my phone and blackmail me for monney', '2019-03-26', 'Forwarded', 'comp.pdf'),
(2, 1, 'fdfdfdf', 'Dowry death', 'fdfdfdfdfdfdf', '2019-03-28', 'Submitted', 'New Doc 2019-03-27 15.29.57 (1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_consortium`
--

CREATE TABLE `tb_consortium` (
  `consortium_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `consortium_district` varchar(30) NOT NULL,
  `consortium_head` varchar(20) NOT NULL,
  `consortium_head_phone` varchar(12) NOT NULL,
  `consortium_head_email` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_consortium`
--

INSERT INTO `tb_consortium` (`consortium_id`, `log_id`, `consortium_district`, `consortium_head`, `consortium_head_phone`, `consortium_head_email`, `photo`, `date`) VALUES
(1, 6, 'Ernakulam', 'Navami S Binu', '9644532777', 'navami123@gmail.com', '', '26-03-2019'),
(2, 11, 'Kozhikode', 'Aleena', '7827837837', 'aleena65@gmail.com', '', '28-03-2019');

-- --------------------------------------------------------

--
-- Table structure for table `tb_consortium_members`
--

CREATE TABLE `tb_consortium_members` (
  `consortium_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `member_name` varchar(20) NOT NULL,
  `member_type` varchar(20) NOT NULL,
  `member_phone` varchar(12) NOT NULL,
  `member_email` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_consortium_members`
--

INSERT INTO `tb_consortium_members` (`consortium_id`, `member_id`, `log_id`, `member_name`, `member_type`, `member_phone`, `member_email`, `photo`) VALUES
(1, 1, 7, 'Vargheese Kuriyan', 'Advocate', '8671276217', 'vargheesk@gmail.com', 'Image0026.jpg'),
(1, 2, 12, 'supriya', 'womencell', '7887878787', 'supriya43@gmail.com', '1186-Navami-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_followup`
--

CREATE TABLE `tb_followup` (
  `id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `curr_status` varchar(30) NOT NULL,
  `details` varchar(60) NOT NULL,
  `verdict` varchar(30) DEFAULT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_followup`
--

INSERT INTO `tb_followup` (`id`, `comp_id`, `curr_status`, `details`, `verdict`, `date`) VALUES
(1, 1, 'tracking the accuse', 'We are trying to track the location of accuse person', 'Nothing', '27-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_forumanswer`
--

CREATE TABLE `tb_forumanswer` (
  `ans_id` int(11) NOT NULL,
  `que_id` int(11) NOT NULL,
  `answer_date` varchar(30) NOT NULL,
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_forumanswer`
--

INSERT INTO `tb_forumanswer` (`ans_id`, `que_id`, `answer_date`, `answer`) VALUES
(1, 1, '2019-03-26 09:02:24am', 'Stop child marriage and sexual harassment'),
(2, 1, '2019-03-30 05:38:44pm', 'dsdsd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_forwardcomplaint`
--

CREATE TABLE `tb_forwardcomplaint` (
  `for_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `response` varchar(30) NOT NULL,
  `doc_upload` varchar(100) NOT NULL,
  `response_datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_forwardcomplaint`
--

INSERT INTO `tb_forwardcomplaint` (`for_id`, `comp_id`, `station_id`, `response`, `doc_upload`, `response_datetime`) VALUES
(1, 1, 1, '', '', ''),
(2, 1, 2, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hostel`
--

CREATE TABLE `tb_hostel` (
  `hostel_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `hostel_name` varchar(20) NOT NULL,
  `district` varchar(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `warden` varchar(20) NOT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `picture` varchar(100) NOT NULL,
  `doc_upload` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hostel`
--

INSERT INTO `tb_hostel` (`hostel_id`, `log_id`, `hostel_name`, `district`, `place`, `pin`, `warden`, `no_of_rooms`, `mobile_no`, `email_id`, `status`, `picture`, `doc_upload`, `date`) VALUES
(1, 2, 'nalanda ', 'Ernakulam', 'Aluva', '686631', 'Sreelakshmi', 35, '9605952554', 'nalanda@gmail.com', '1', 'about4.jpg', 'Nalanda.pdf', '26-03-2019'),
(2, 3, 'Little Flower', 'Ernakulam', 'Kothamangalam', '686691', 'Annamariya', 40, '8624544544', 'littlefang123@gmail.com', '1', 'little.jpg', 'little.pdf', '26-03-2019'),
(3, 15, 'Sruthi Ladies Hostel', 'Ernakulam', 'Muvattupuzha', '686663', 'Dona ', 30, '9412245454', 'sree123@gmail.com', '2', '20151128_170715.jpg', 'Sruthy.pdf', '29-03-2019');

-- --------------------------------------------------------

--
-- Table structure for table `tb_joboffer`
--

CREATE TABLE `tb_joboffer` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(30) NOT NULL,
  `date` varchar(20) NOT NULL,
  `no_of_post` varchar(5) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `experience` varchar(30) NOT NULL,
  `salary` varchar(10) NOT NULL,
  `application_sdate` date NOT NULL,
  `application_edate` date NOT NULL,
  `link` varchar(30) NOT NULL,
  `age_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_joboffer`
--

INSERT INTO `tb_joboffer` (`job_id`, `job_title`, `date`, `no_of_post`, `qualification`, `experience`, `salary`, `application_sdate`, `application_edate`, `link`, `age_limit`) VALUES
(1, 'Teacher', '26-03-2019', '10', 'BEd', 'Nil', '25000', '2019-04-01', '2019-06-15', 'www.jobada.com', 35),
(2, 'Clerk', '30-03-2019', '12', 'plus two', 'Nil', '20000', '2019-05-06', '2019-06-06', 'www.jobsearch.com', 45);

-- --------------------------------------------------------

--
-- Table structure for table `tb_location`
--

CREATE TABLE `tb_location` (
  `loc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_location`
--

INSERT INTO `tb_location` (`loc_id`, `user_id`, `station_id`, `location`, `message`, `datetime`, `status`) VALUES
(1, 1, 1, 'kuthukuzhy', 'I am trapped here please help me', '2019-03-30 03:37:09', 'Submitted');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `log_id` int(11) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `security_question` varchar(40) DEFAULT NULL,
  `security_answer` varchar(25) DEFAULT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`log_id`, `email_id`, `password`, `security_question`, `security_answer`, `user_type`) VALUES
(1, 'amruthaapr30@gmail.com', 'ammu123@', 'who is your favourite singer ?', 'Shreya Ghoshal', 'general'),
(2, 'nalanda@gmail.com', 'nalaluva2@', 'which is your lucky number ?', '5', 'hostel'),
(3, 'Little Flower', 'littlef', 'who is your favourite singer ?', 'Shreya Ghoshal', 'hostel'),
(4, 'sahrudaya@gmail.com', 'sahrudaya01@', 'which is your favourite book ?', 'Kayar', 'center'),
(5, 'admin123@gmail.com', 'admin123@', 'who is your favourite singer ?', 'Shreya Ghoshal', 'admin'),
(6, 'navami123@gmail.com', 'navami@', 'who is your favourite singer ?', 'Shreya Ghoshal', 'consortium_head'),
(7, 'vargheesk@gmail.com', 'varghees4$', 'which is your lucky number ?', '9', 'consortium_member'),
(8, 'joseph123@gmail.com', '8767656565', 'which is your favourite place ?', 'kashmir', 'station'),
(9, 'johnsonm1980@gmail.com', 'johnson80@', 'who is your favourite musician ?', 'Balu', 'police'),
(10, 'sara@gmail.com', 'sara98@', 'which is your lucky number ?', '10', 'general'),
(11, 'aleena65@gmail.com', '7827837837', NULL, NULL, 'consortium_head'),
(12, 'supriya43@gmail.com', '7887878787', NULL, NULL, 'consortium_member'),
(13, 'sdsds@gmail.com', '9665454545', NULL, NULL, 'station'),
(15, 'sree123@gmail.com', 'sree123@', 'who is your favourite singer ?', 'k.s.chithra', 'hostel'),
(16, 'pratyashath67@gmail.com', 'prathyasha', 'which is your favourite place ?', 'Rajasthan', 'center');

-- --------------------------------------------------------

--
-- Table structure for table `tb_openforum`
--

CREATE TABLE `tb_openforum` (
  `que_id` int(11) NOT NULL,
  `datetime` varchar(30) NOT NULL,
  `question` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_openforum`
--

INSERT INTO `tb_openforum` (`que_id`, `datetime`, `question`) VALUES
(1, '2019-03-26 08:55:27am', 'what are the necessary steps for women empowerment'),
(2, '2019-03-30 05:41:06pm', 'vhgghfg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pension`
--

CREATE TABLE `tb_pension` (
  `pid` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `link` varchar(30) NOT NULL,
  `type_of_pension` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pension`
--

INSERT INTO `tb_pension` (`pid`, `date`, `link`, `type_of_pension`, `description`) VALUES
(1, '26-03-2019', 'www.keralapension.com', 'Widow', 'This is for unemployed widows. Age should be greater than 30. the amount offered is 12000 per month'),
(2, '30-03-2019', 'www.keralapension.com', 'Student', 'This pension is for the students who are economically backward. Annual income less than 5 Lakhs');

-- --------------------------------------------------------

--
-- Table structure for table `tb_police`
--

CREATE TABLE `tb_police` (
  `police_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `police_name` varchar(20) NOT NULL,
  `police_dob` date NOT NULL,
  `station_id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `email_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_police`
--

INSERT INTO `tb_police` (`police_id`, `log_id`, `police_name`, `police_dob`, `station_id`, `photo`, `designation`, `phone_no`, `email_id`) VALUES
(1, 9, 'Johnson Mathew', '1980-05-15', 1, 'IMG-20170703-WA0001.jpg', 'constable', '8533155151', 'johnsonm1980@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_police_station`
--

CREATE TABLE `tb_police_station` (
  `station_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `district` varchar(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `station_no` varchar(12) NOT NULL,
  `station_pin` varchar(6) NOT NULL,
  `incharge_name` varchar(20) NOT NULL,
  `incharge_phone` varchar(12) NOT NULL,
  `incharge_email` varchar(30) NOT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_police_station`
--

INSERT INTO `tb_police_station` (`station_id`, `log_id`, `district`, `place`, `station_no`, `station_pin`, `incharge_name`, `incharge_phone`, `incharge_email`, `photo`) VALUES
(1, 8, 'Ernakulam', 'Kothamangalm', '04852996541', '686691', 'Joseph', '8767656565', 'joseph@gmail.com', 'IMG_20160110_231756.jpg'),
(2, 13, 'Kannur', 'asasass', '87876776767', '787878', 'afsdfas', '9665454545', 'sdsds@gmail.com', 'IMG_20180910_142803 - Copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_taxi`
--

CREATE TABLE `tb_taxi` (
  `user_id` int(11) NOT NULL,
  `token_no` int(11) NOT NULL,
  `token_generating_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `district` varchar(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `house_name` varchar(30) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `aadhar_no` varchar(12) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `caste` varchar(25) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `category` varchar(8) NOT NULL,
  `poverty_status` varchar(3) NOT NULL,
  `education_qualification` varchar(20) NOT NULL,
  `marital_status` varchar(8) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `log_id`, `user_name`, `date_of_birth`, `district`, `place`, `house_name`, `pin`, `aadhar_no`, `mobile_no`, `email_id`, `caste`, `religion`, `category`, `poverty_status`, `education_qualification`, `marital_status`, `picture`) VALUES
(1, 1, 'Amrutha Babu', '1999-04-30', 'Ernakulam', 'Kothamangalam', 'Vattakkattu (H)', '686691', '111000021553', '9495067994', 'amruthaapr30@gmail.com', 'Hindu', 'Nair', 'General', 'APL', 'Graduation', 'Single', 'photo.jpg'),
(2, 10, 'Sara', '1998-05-12', 'Ernakulam', 'Muvattupuzha', 'Palakkattil (H)', '686631', '111187676767', '85434346', 'sara@gmail.com', 'Christian', 'RC', 'OBC/OEC', 'BPL', 'Graduation', 'Single', 'photo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_appointment`
--
ALTER TABLE `tb_appointment`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `tb_ccenter`
--
ALTER TABLE `tb_ccenter`
  ADD PRIMARY KEY (`center_id`);

--
-- Indexes for table `tb_cdoctors`
--
ALTER TABLE `tb_cdoctors`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `tb_complaint`
--
ALTER TABLE `tb_complaint`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `tb_consortium`
--
ALTER TABLE `tb_consortium`
  ADD PRIMARY KEY (`consortium_id`);

--
-- Indexes for table `tb_consortium_members`
--
ALTER TABLE `tb_consortium_members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tb_followup`
--
ALTER TABLE `tb_followup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_forumanswer`
--
ALTER TABLE `tb_forumanswer`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `tb_forwardcomplaint`
--
ALTER TABLE `tb_forwardcomplaint`
  ADD PRIMARY KEY (`for_id`);

--
-- Indexes for table `tb_hostel`
--
ALTER TABLE `tb_hostel`
  ADD PRIMARY KEY (`hostel_id`);

--
-- Indexes for table `tb_joboffer`
--
ALTER TABLE `tb_joboffer`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `tb_location`
--
ALTER TABLE `tb_location`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tb_openforum`
--
ALTER TABLE `tb_openforum`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `tb_pension`
--
ALTER TABLE `tb_pension`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tb_police`
--
ALTER TABLE `tb_police`
  ADD PRIMARY KEY (`police_id`);

--
-- Indexes for table `tb_police_station`
--
ALTER TABLE `tb_police_station`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_appointment`
--
ALTER TABLE `tb_appointment`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_ccenter`
--
ALTER TABLE `tb_ccenter`
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_cdoctors`
--
ALTER TABLE `tb_cdoctors`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_complaint`
--
ALTER TABLE `tb_complaint`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_consortium`
--
ALTER TABLE `tb_consortium`
  MODIFY `consortium_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_consortium_members`
--
ALTER TABLE `tb_consortium_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_followup`
--
ALTER TABLE `tb_followup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_forumanswer`
--
ALTER TABLE `tb_forumanswer`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_forwardcomplaint`
--
ALTER TABLE `tb_forwardcomplaint`
  MODIFY `for_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_hostel`
--
ALTER TABLE `tb_hostel`
  MODIFY `hostel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_joboffer`
--
ALTER TABLE `tb_joboffer`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_location`
--
ALTER TABLE `tb_location`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_openforum`
--
ALTER TABLE `tb_openforum`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pension`
--
ALTER TABLE `tb_pension`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_police`
--
ALTER TABLE `tb_police`
  MODIFY `police_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_police_station`
--
ALTER TABLE `tb_police_station`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
