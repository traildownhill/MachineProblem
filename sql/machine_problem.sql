-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 05:21 AM
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
-- Database: `machine_problem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_1stsem`
--

CREATE TABLE `tbl_1stsem` (
  `iD` int(11) NOT NULL,
  `Stud_iD` int(5) NOT NULL,
  `Teach_iD` int(5) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Grades` int(5) NOT NULL,
  `Stud_Name` varchar(100) NOT NULL,
  `Teach_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_1stsem`
--

INSERT INTO `tbl_1stsem` (`iD`, `Stud_iD`, `Teach_iD`, `Subject`, `Grades`, `Stud_Name`, `Teach_Name`) VALUES
(1, 0, 1, 'Math', 97, 'Jasper Heruela', 'Athina Heruela'),
(2, 0, 2, 'Science', 0, 'Jasper Heruela', 'Jaren Heruela'),
(3, 0, 1, 'Math', 75, 'Bjorn Moro', 'Athina Heruela'),
(4, 0, 2, 'Science', 0, 'Bjorn Moro', 'Jaren Heruela');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_2ndsem`
--

CREATE TABLE `tbl_2ndsem` (
  `iD` int(11) NOT NULL,
  `Stud_iD` int(5) NOT NULL,
  `Teach_iD` int(5) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Grades` int(5) NOT NULL,
  `Stud_Name` varchar(100) NOT NULL,
  `Teach_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_2ndsem`
--

INSERT INTO `tbl_2ndsem` (`iD`, `Stud_iD`, `Teach_iD`, `Subject`, `Grades`, `Stud_Name`, `Teach_Name`) VALUES
(1, 0, 1, 'Math', 0, 'Jasper Heruela', 'Athina Heruela'),
(2, 0, 2, 'Science', 0, 'Jasper Heruela', 'Jaren Heruela');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_3rdsem`
--

CREATE TABLE `tbl_3rdsem` (
  `iD` int(11) NOT NULL,
  `Stud_iD` int(5) NOT NULL,
  `Teach_iD` int(5) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Grades` int(5) NOT NULL,
  `Stud_Name` varchar(100) NOT NULL,
  `Teach_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_4thsem`
--

CREATE TABLE `tbl_4thsem` (
  `iD` int(11) NOT NULL,
  `Stud_iD` int(5) NOT NULL,
  `Teach_iD` int(5) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Grades` int(5) NOT NULL,
  `Stud_Name` varchar(100) NOT NULL,
  `Teach_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `Stud_iD` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`Stud_iD`, `Name`, `username`, `password`) VALUES
(1, 'Jasper Heruela', 'jasper', '02b0732024cad6ad3dc2989bc82a1ef5'),
(2, 'Bjorn Moro', 'bjorn', '36fdb505d1f4fbedfdcf6c254c904813'),
(3, 'Jasper Heruela', 'jasper1', '02b0732024cad6ad3dc2989bc82a1ef5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stud_sem`
--

CREATE TABLE `tbl_stud_sem` (
  `iD` int(11) NOT NULL,
  `Student` varchar(100) NOT NULL,
  `Teacher` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Semester` varchar(100) NOT NULL,
  `Grades` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stud_sem`
--

INSERT INTO `tbl_stud_sem` (`iD`, `Student`, `Teacher`, `Subject`, `Semester`, `Grades`) VALUES
(1, 'Jasper Heruela', 'Athina Heruela', 'Math', '1st Semester', 97),
(2, 'Jasper Heruela', 'Jaren Heruela', 'Science', '1st Semester', 0),
(3, 'Bjorn Moro', 'Athina Heruela', 'Math', '1st Semester', 75),
(4, 'Bjorn Moro', 'Jaren Heruela', 'Science', '1st Semester', 0),
(5, 'Jasper Heruela', 'Athina Heruela', 'Math', '2nd Semester', 0),
(6, 'Jasper Heruela', 'Jaren Heruela', 'Science', '2nd Semester', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `Teach_iD` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`Teach_iD`, `Name`, `Subject`, `username`, `password`) VALUES
(1, 'Athina Heruela', 'Math', 'athina', '66b580014755f427c641ffcd4e1e9260'),
(2, 'Jaren Heruela', 'Science', 'jaren', '0ebf6631a1fe0a70610de2d165148f32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_1stsem`
--
ALTER TABLE `tbl_1stsem`
  ADD PRIMARY KEY (`iD`);

--
-- Indexes for table `tbl_2ndsem`
--
ALTER TABLE `tbl_2ndsem`
  ADD PRIMARY KEY (`iD`);

--
-- Indexes for table `tbl_3rdsem`
--
ALTER TABLE `tbl_3rdsem`
  ADD PRIMARY KEY (`iD`);

--
-- Indexes for table `tbl_4thsem`
--
ALTER TABLE `tbl_4thsem`
  ADD PRIMARY KEY (`iD`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`Stud_iD`);

--
-- Indexes for table `tbl_stud_sem`
--
ALTER TABLE `tbl_stud_sem`
  ADD PRIMARY KEY (`iD`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`Teach_iD`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_1stsem`
--
ALTER TABLE `tbl_1stsem`
  MODIFY `iD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_2ndsem`
--
ALTER TABLE `tbl_2ndsem`
  MODIFY `iD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_3rdsem`
--
ALTER TABLE `tbl_3rdsem`
  MODIFY `iD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_4thsem`
--
ALTER TABLE `tbl_4thsem`
  MODIFY `iD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `Stud_iD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_stud_sem`
--
ALTER TABLE `tbl_stud_sem`
  MODIFY `iD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `Teach_iD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
