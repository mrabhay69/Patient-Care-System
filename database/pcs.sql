-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2023 at 10:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Appoint_id` int(5) NOT NULL,
  `Name` varchar(35) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Appoint_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Appoint_id`, `Name`, `contact`, `Email`, `Appoint_date`) VALUES
(1, 'Manish Shah', 9326033562, 'Manish@gmail.com', '2023-01-25'),
(2, 'Abhay Maurya', 9137241212, 'Abhay123@gmail.com', '2023-01-28'),
(3, 'Salman Khan', 9988774455, 'Salman@gmail.com', '2023-01-23'),
(4, 'Sakshi Patil', 9632587412, 'Sakshi143@gmail.com', '2023-02-04'),
(5, 'Rohan Roy', 9874563214, 'Rohan@gmail.com', '2023-01-26'),
(6, 'Surya Kumar', 9877445566, 'S360@gmail.com', '2023-01-28'),
(7, 'abc', 9002882670, 'email@gmail.com', '2023-02-22'),
(8, 'abhay', 9832882670, 'jsjk@gmail.com', '2023-02-23'),
(9, 'Baswaraj', 9032882670, 'baswaraj@gmail.com', '2023-03-24'),
(10, 'Baswaraj Mahadappgol', 9889989890, 'abhay@gmail.com', '2023-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `checkappoint`
--

CREATE TABLE `checkappoint` (
  `id` int(11) NOT NULL,
  `Appoint_id` int(11) NOT NULL,
  `Name` varchar(35) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Appoint_date` date NOT NULL,
  `Appoint_time` varchar(35) DEFAULT NULL,
  `Request` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkappoint`
--

INSERT INTO `checkappoint` (`id`, `Appoint_id`, `Name`, `contact`, `Email`, `Appoint_date`, `Appoint_time`, `Request`) VALUES
(2, 1, 'Manish Shah', 9326033562, 'Manish@gmail.com', '2023-01-25', '10.00 to 10.30 am', 'Accept'),
(3, 2, 'Abhay Maurya', 9137241212, 'Abhay123@gmail.com', '2023-01-28', '10.30 to 11.00 am', 'Accept'),
(4, 3, 'Salman Khan', 9988774455, 'Salman@gmail.com', '2023-02-14', '11.00 to 11.30 am', 'Modified Accepted'),
(6, 5, 'Rohan Roy', 9874563214, 'Rohan@gmail.com', '2023-01-26', 'null', 'Deny'),
(7, 6, 'Surya Kumar', 9877445566, 'S360@gmail.com', '2023-02-22', '6.30 to 7.00 pm', 'Modified Accepted'),
(8, 4, 'Sakshi Patil', 9632587412, 'Sakshi143@gmail.com', '2023-02-04', 'null', 'Deny'),
(10, 7, 'abc', 9002882670, 'email@gmail.com', '2023-02-22', '5.00 to 5.30 pm', 'Modified Accepted'),
(11, 2, 'Abhay Maurya', 9137241212, 'Abhay123@gmail.com', '2023-01-28', 'null', 'null'),
(12, 9, 'Baswaraj', 9032882670, 'baswaraj@gmail.com', '2023-03-27', '1.00 to 1.30 pm', 'Modified Accepted'),
(13, 10, 'Baswaraj Mahadappgol', 9889989890, 'abhay@gmail.com', '2023-05-04', '5.00 to 5.30 pm', 'Modified Accepted'),
(14, 10, 'Baswaraj Mahadappgol', 9889989890, 'abhay@gmail.com', '2023-05-03', 'null', 'Accept');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `id` int(5) NOT NULL,
  `visit_no` int(5) NOT NULL,
  `patient_id` int(5) NOT NULL,
  `patient_name` varchar(25) DEFAULT NULL,
  `disease_name` varchar(50) DEFAULT NULL,
  `condition_type` varchar(25) NOT NULL,
  `disease_duration` int(8) NOT NULL,
  `symptom` varchar(150) DEFAULT NULL,
  `visit_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`id`, `visit_no`, `patient_id`, `patient_name`, `disease_name`, `condition_type`, `disease_duration`, `symptom`, `visit_date`) VALUES
(1, 1, 1, 'Manish Shah', 'Acid reflux', 'Moderate', 50, 'heart burn, hiccubs, chest tightness', '2023-01-23'),
(2, 2, 1, 'Manish Shah', 'Acid reflux', 'Moderate', 60, 'heart burn, hiccubs, chest tightness , stomach ache', '2023-01-23'),
(3, 1, 2, 'Akansha Shah', 'Malaria', 'Moderate', 15, 'Cough,Sneezing', '2023-01-24'),
(4, 2, 2, 'Akansha Shah', 'Malaria', 'Moderate', 20, 'Cough,Sneezing,headache', '2023-01-24'),
(5, 1, 3, 'Mukesh Ambani', 'Diabetes', 'Moderate', 180, 'Pimples,high BP', '2023-01-25'),
(6, 2, 3, 'Mukesh Ambani', 'Diabetes', 'Moderate', 214, 'Pimples,high BP', '2023-01-25'),
(7, 3, 3, 'Mukesh Ambani', 'Diabetes,body ache', 'Moderate', 214, 'Pimples,high BP, relif from pimples and bp also coming down', '2023-01-27'),
(8, 1, 1, 'Manish Shah', 'Blood Pressure', 'Moderate', 20, 'headache', '2023-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `doctimage`
--

CREATE TABLE `doctimage` (
  `Doc_id` int(5) NOT NULL,
  `doct_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctimage`
--

INSERT INTO `doctimage` (`Doc_id`, `doct_image`) VALUES
(1, 'uploads/manish.jpg'),
(2, 'uploads/WhatsApp_Image_2022-12-12_at_8.12.25_PM-removebg-preview.png'),
(6, 'uploads/Screenshot (75).png'),
(19, 'uploads/Screenshot (124).png');

-- --------------------------------------------------------

--
-- Table structure for table `doctorclinic`
--

CREATE TABLE `doctorclinic` (
  `clinic_id` int(4) NOT NULL,
  `Building_name` varchar(35) NOT NULL,
  `district` varchar(25) NOT NULL,
  `city` varchar(25) DEFAULT NULL,
  `state` varchar(30) NOT NULL,
  `zip_code` int(7) NOT NULL,
  `Doc_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorclinic`
--

INSERT INTO `doctorclinic` (`clinic_id`, `Building_name`, `district`, `city`, `state`, `zip_code`, `Doc_id`) VALUES
(1, 'Flat no 101, Deeplaxmi Residency ', 'Thane', 'Bhiwandi', 'Maharashtra ', 421302, 1),
(2, 'Manorma Nagar ', 'Thane', 'Thane', 'Maharashtra ', 400606, 2),
(4, 'Manpada ', 'Thane', 'Thane', 'Maharashtra ', 400607, 6),
(5, 'Manpada ', 'Thane', 'Thane', 'Maharashtra ', 400607, 19);

-- --------------------------------------------------------

--
-- Table structure for table `doctorpersonaldetail`
--

CREATE TABLE `doctorpersonaldetail` (
  `Doc_id` int(10) NOT NULL,
  `Doc_name` varchar(35) NOT NULL,
  `Doc_gen` varchar(15) NOT NULL,
  `Doc_email` varchar(50) NOT NULL,
  `Doc_contact` bigint(12) NOT NULL,
  `Doc_dob` date NOT NULL,
  `Doc_age` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorpersonaldetail`
--

INSERT INTO `doctorpersonaldetail` (`Doc_id`, `Doc_name`, `Doc_gen`, `Doc_email`, `Doc_contact`, `Doc_dob`, `Doc_age`) VALUES
(1, 'Manish Shah', 'Male', 'manishshah3763@gmail.com', 9326033562, '2002-02-04', 20),
(2, 'Abhay Maurya', 'Male', 'Abhay123@gmail.com', 9137241212, '2003-02-01', 19),
(5, 'hjdhjhd dsad', 'Female', 'email@gmail.com', 65624576, '2023-02-15', 0),
(6, 'Abhay Maurya', 'Male', 'abhay@gmail.com', 9882882670, '2003-02-01', 20),
(7, 'Pratham Maurya', 'Male', 'pratham@gmail.com', 9882882670, '2002-02-01', 21),
(19, 'abc abc', 'Male', 'abc@gmail.com', 8762882670, '1997-10-28', 25),
(197, 'abcd abcd', 'Male', 'abcd@gmail.com', 9897675678, '2023-03-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctorqual`
--

CREATE TABLE `doctorqual` (
  `qual_id` int(10) NOT NULL,
  `qualification` varchar(25) NOT NULL,
  `ug_deg` varchar(50) NOT NULL,
  `pg_deg` varchar(50) NOT NULL,
  `ug_coll_name` varchar(60) NOT NULL,
  `pg_coll_name` varchar(60) NOT NULL,
  `practice_start_year` int(6) NOT NULL,
  `Doc_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorqual`
--

INSERT INTO `doctorqual` (`qual_id`, `qualification`, `ug_deg`, `pg_deg`, `ug_coll_name`, `pg_coll_name`, `practice_start_year`, `Doc_id`) VALUES
(1, 'phd ', 'BHMS', 'MD', 'London College og Homeopathy ', 'London College og Homeopathy ', 2008, 1),
(2, 'pg ', 'ugdiploma', 'pg', 'Northwest College of Homeopathy ', 'Canadian College of Homeopathy ', 2012, 2),
(5, 'pg ', 'BHMS', 'pg', 'Parul University ', 'Canadian College of Homeopathy ', 2015, 19);

-- --------------------------------------------------------

--
-- Table structure for table `doctorsecurity`
--

CREATE TABLE `doctorsecurity` (
  `Doc_id` int(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorsecurity`
--

INSERT INTO `doctorsecurity` (`Doc_id`, `password`) VALUES
(1, '25d55ad283aa400af464c76d713c07ad'),
(2, '51adfb6733c245efe399f59e45587a6d'),
(6, '25d55ad283aa400af464c76d713c07ad'),
(19, '51adfb6733c245efe399f59e45587a6d');

-- --------------------------------------------------------

--
-- Table structure for table `patienthealth`
--

CREATE TABLE `patienthealth` (
  `id` int(5) NOT NULL,
  `visit_no` int(5) NOT NULL,
  `patient_id` int(5) NOT NULL,
  `patient_name` varchar(25) DEFAULT NULL,
  `stress` varchar(255) DEFAULT NULL,
  `socialinfo` varchar(255) DEFAULT NULL,
  `affairsinfo` varchar(255) DEFAULT NULL,
  `medicalhistory` varchar(255) DEFAULT NULL,
  `visit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patienthealth`
--

INSERT INTO `patienthealth` (`id`, `visit_no`, `patient_id`, `patient_name`, `stress`, `socialinfo`, `affairsinfo`, `medicalhistory`, `visit_date`) VALUES
(1, 1, 1, 'Manish Shah', 'having carrier related stress', 'love to play games ', 'no affairs', 'not having any critical medical hsitory', '2023-01-23'),
(2, 2, 1, 'Manish Shah', 'having carrier related stress', 'love to play games ', 'no affairs', 'not having any critical medical hsitory', '2023-01-23'),
(3, 1, 2, 'Akansha Shah', 'have stress about Exams', 'like Cooking, and Watching Tv showa', 'No affairs', 'UnderWeight', '2023-01-24'),
(4, 2, 2, 'Akansha Shah', 'nope', 'nope', 'nope', 'nope', '2023-01-24'),
(5, 1, 3, 'Mukesh Ambani', 'have stress about business', 'have very schedule info', 'no affairs', 'have been a patient of kideney stone', '2023-01-25'),
(6, 1, 3, 'Mukesh Ambani', 'have stress about business', 'have very schedule info', 'no affairs', 'have been a patient of kideney stone', '2023-01-25'),
(7, 2, 3, 'Mukesh Ambani', 'have stress about business', 'have very schedule info', 'no affairs', 'have been a patient of kideney stone', '2023-01-25'),
(8, 3, 3, 'Mukesh Ambani', 'have stress about business! but started doing yoga and gym ', 'have very schedule info', 'have affair with neeta ambani', 'have been a patient of kideney stone, satrted kideney stone medicnine', '2023-01-25'),
(9, 1, 1, 'Manish Shah', 'Nothing', 'Good', 'no', 'no', '2023-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `patientinfo`
--

CREATE TABLE `patientinfo` (
  `patient_id` int(5) NOT NULL,
  `patient_name` varchar(35) NOT NULL,
  `patient_email` varchar(50) DEFAULT NULL,
  `patient_contact` bigint(12) DEFAULT NULL,
  `patient_dob` date NOT NULL,
  `patient_age` int(4) NOT NULL,
  `patient_gender` varchar(10) DEFAULT NULL,
  `Treatment_start` date NOT NULL,
  `Treatment_status` varchar(50) NOT NULL,
  `Treatment_end` date DEFAULT NULL,
  `Total Visits` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientinfo`
--

INSERT INTO `patientinfo` (`patient_id`, `patient_name`, `patient_email`, `patient_contact`, `patient_dob`, `patient_age`, `patient_gender`, `Treatment_start`, `Treatment_status`, `Treatment_end`, `Total Visits`) VALUES
(1, 'Manish Shah', 'Man@gmail.com', 9326033562, '1992-02-05', 30, 'Male', '2023-02-01', 'Complete', '2023-01-29', 2),
(2, 'Akansha Shah', 'Akansha@gmail.com', 9326022141, '1999-07-11', 23, 'Female', '2023-01-01', 'Complete', '2023-01-27', 2),
(3, 'Mukesh Ambani', 'muk@gmail.com', 9988774455, '1961-06-15', 61, 'Female', '2023-01-25', 'Complete', '2023-01-31', 3),
(4, 'Warren Buffet', 'omaha@gail.com', 9874564567, '1930-04-25', 92, 'Male', '2022-11-21', 'Ongoing', '0000-00-00', 0),
(5, 'Tom cruise', 'tomy@gmail.com', 9632587412, '1956-11-17', 66, 'Other', '2023-01-05', 'Ongoing', '0000-00-00', 0),
(6, 'Rohan roy', 'RR123@gmail.com', 9988774412, '2023-01-06', 0, 'Male', '2023-01-23', 'Ongoing', '0000-00-00', 0),
(7, 'Abhijheet tare', 'Ab@gmail.com', 9632588521, '1994-11-30', 28, 'Male', '2023-01-09', 'Ongoing', '2023-01-30', 0),
(11, 'Mangesh vish', 'mang@gmail.com', 9658741232, '2002-02-26', 20, 'Male', '2023-01-28', 'Ongoing', '0000-00-00', 0),
(13, 'manish', 'manish@gmail.com', 9877656477, '2002-03-08', 20, 'Male', '2023-02-23', 'Ongoing', '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Appoint_id`);

--
-- Indexes for table `checkappoint`
--
ALTER TABLE `checkappoint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctimage`
--
ALTER TABLE `doctimage`
  ADD PRIMARY KEY (`Doc_id`);

--
-- Indexes for table `doctorclinic`
--
ALTER TABLE `doctorclinic`
  ADD PRIMARY KEY (`clinic_id`),
  ADD KEY `Doc_id` (`Doc_id`);

--
-- Indexes for table `doctorpersonaldetail`
--
ALTER TABLE `doctorpersonaldetail`
  ADD PRIMARY KEY (`Doc_id`),
  ADD UNIQUE KEY `Doc_email` (`Doc_email`);

--
-- Indexes for table `doctorqual`
--
ALTER TABLE `doctorqual`
  ADD PRIMARY KEY (`qual_id`),
  ADD KEY `Doc_id` (`Doc_id`);

--
-- Indexes for table `doctorsecurity`
--
ALTER TABLE `doctorsecurity`
  ADD PRIMARY KEY (`Doc_id`);

--
-- Indexes for table `patienthealth`
--
ALTER TABLE `patienthealth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientinfo`
--
ALTER TABLE `patientinfo`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `patient_email` (`patient_email`),
  ADD UNIQUE KEY `patient_contact` (`patient_contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Appoint_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `checkappoint`
--
ALTER TABLE `checkappoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctimage`
--
ALTER TABLE `doctimage`
  MODIFY `Doc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `doctorclinic`
--
ALTER TABLE `doctorclinic`
  MODIFY `clinic_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctorpersonaldetail`
--
ALTER TABLE `doctorpersonaldetail`
  MODIFY `Doc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `doctorqual`
--
ALTER TABLE `doctorqual`
  MODIFY `qual_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctorsecurity`
--
ALTER TABLE `doctorsecurity`
  MODIFY `Doc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `patienthealth`
--
ALTER TABLE `patienthealth`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patientinfo`
--
ALTER TABLE `patientinfo`
  MODIFY `patient_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctorclinic`
--
ALTER TABLE `doctorclinic`
  ADD CONSTRAINT `doctorclinic_ibfk_1` FOREIGN KEY (`Doc_id`) REFERENCES `doctorpersonaldetail` (`Doc_id`);

--
-- Constraints for table `doctorqual`
--
ALTER TABLE `doctorqual`
  ADD CONSTRAINT `doctorqual_ibfk_1` FOREIGN KEY (`Doc_id`) REFERENCES `doctorpersonaldetail` (`Doc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
