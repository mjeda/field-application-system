-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2020 at 07:07 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `AppID` int(11) NOT NULL,
  `AppDate` date NOT NULL,
  `stuID` int(11) NOT NULL,
  `level` varchar(100) NOT NULL,
  `applName` varchar(250) NOT NULL,
  `appStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`AppID`, `AppDate`, `stuID`, `level`, `applName`, `appStatus`) VALUES
(12, '2020-09-04', 14, 'Diploma', 'Accounting', '');

-- --------------------------------------------------------

--
-- Table structure for table `applicationdepertment`
--

CREATE TABLE `applicationdepertment` (
  `appdepID` int(11) NOT NULL,
  `AppID` int(11) DEFAULT NULL,
  `DepID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `criteriaID` int(11) NOT NULL,
  `criteriaName` varchar(100) NOT NULL,
  `evaluID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepID` int(11) NOT NULL,
  `DepName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `evaluID` int(11) NOT NULL,
  `date` date NOT NULL,
  `score` int(100) NOT NULL,
  `supap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prograssreport`
--

CREATE TABLE `prograssreport` (
  `Report` varchar(1000) NOT NULL,
  `ReportID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `AppID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stuID` int(11) NOT NULL,
  `stuName` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `universityName` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stuID`, `stuName`, `address`, `phone`, `universityName`, `program`, `userID`) VALUES
(14, 'hija haji juma', 'fuoni', '0778651234', 'State University of Zanzibar (SUZA)', 'Diploma of Information Technology', 32);

-- --------------------------------------------------------

--
-- Table structure for table `supervisorapplication`
--

CREATE TABLE `supervisorapplication` (
  `supapID` int(11) NOT NULL,
  `supID` int(11) NOT NULL,
  `appID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `supID` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `depID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userName` varchar(200) NOT NULL,
  `userID` int(11) NOT NULL,
  `Role` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userName`, `userID`, `Role`, `password`, `Email`) VALUES
('mjeda', 32, 'student', '827ccb0eea8a706c4c34a16891f84e7b', 'mjeda@test.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`AppID`),
  ADD KEY `fk_stu_id_app` (`stuID`);

--
-- Indexes for table `applicationdepertment`
--
ALTER TABLE `applicationdepertment`
  ADD PRIMARY KEY (`appdepID`),
  ADD KEY `fk_app_id_dep_id` (`AppID`),
  ADD KEY `fk_dep_id_app_id` (`DepID`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`criteriaID`),
  ADD KEY `fk_evalu_id_cri` (`evaluID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepID`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`evaluID`),
  ADD KEY `fk_supap_id_evalu` (`supap`);

--
-- Indexes for table `prograssreport`
--
ALTER TABLE `prograssreport`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `AppID` (`AppID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stuID`),
  ADD KEY `fk_user_id_stu` (`userID`);

--
-- Indexes for table `supervisorapplication`
--
ALTER TABLE `supervisorapplication`
  ADD PRIMARY KEY (`supapID`),
  ADD KEY `fk_sup_id_app_id_supap` (`supID`),
  ADD KEY `fk_app_id_sup_id_supap` (`appID`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`supID`),
  ADD KEY `fk_user_id_sup` (`userID`),
  ADD KEY `fk_dep_id_sup` (`depID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `AppID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `applicationdepertment`
--
ALTER TABLE `applicationdepertment`
  MODIFY `appdepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `criteriaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `evaluID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prograssreport`
--
ALTER TABLE `prograssreport`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supervisorapplication`
--
ALTER TABLE `supervisorapplication`
  MODIFY `supapID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `supID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `fk_stu_id_app` FOREIGN KEY (`stuID`) REFERENCES `student` (`stuID`) ON DELETE CASCADE;

--
-- Constraints for table `applicationdepertment`
--
ALTER TABLE `applicationdepertment`
  ADD CONSTRAINT `fk_app_id_dep_id` FOREIGN KEY (`AppID`) REFERENCES `application` (`AppID`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_dep_id_app_id` FOREIGN KEY (`DepID`) REFERENCES `department` (`DepID`) ON DELETE CASCADE;

--
-- Constraints for table `criteria`
--
ALTER TABLE `criteria`
  ADD CONSTRAINT `fk_evalu_id_cri` FOREIGN KEY (`evaluID`) REFERENCES `evaluations` (`evaluID`) ON DELETE CASCADE;

--
-- Constraints for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `fk_supap_id_evalu` FOREIGN KEY (`supap`) REFERENCES `supervisorapplication` (`supapID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prograssreport`
--
ALTER TABLE `prograssreport`
  ADD CONSTRAINT `fk_app_id_prog` FOREIGN KEY (`AppID`) REFERENCES `application` (`AppID`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_user_id_stu` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `supervisorapplication`
--
ALTER TABLE `supervisorapplication`
  ADD CONSTRAINT `fk_app_id_sup_id_supap` FOREIGN KEY (`appID`) REFERENCES `application` (`AppID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sup_id_app_id_supap` FOREIGN KEY (`supID`) REFERENCES `supervisors` (`supID`) ON DELETE CASCADE;

--
-- Constraints for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD CONSTRAINT `fk_dep_id_sup` FOREIGN KEY (`depID`) REFERENCES `department` (`DepID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id_sup` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
