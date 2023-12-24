-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 11:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahead`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` varchar(25) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `FirstName`, `LastName`, `Phone`, `Mail`, `Password`, `Address`, `DOB`, `Gender`) VALUES
('A-000001', 'Chandra', 'Parsad', '09795538589', 'chandraparsad@gmail.com', '123456', 'Tamu, Sagaing, Myanmar', '2000-01-01', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` varchar(25) NOT NULL,
  `CategoryName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
('CA-000001', 'Game Development'),
('CA-000002', 'Mobile Development'),
('CA-000003', 'Programming Language'),
('CA-000004', 'Database Development');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassID` varchar(30) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `CourseName` varchar(30) NOT NULL,
  `Lecturer` varchar(30) NOT NULL,
  `Path` varchar(30) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Time` varchar(25) NOT NULL,
  `ETime` varchar(25) NOT NULL,
  `Fees` varchar(30) NOT NULL,
  `Seats` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassID`, `Category`, `CourseName`, `Lecturer`, `Path`, `StartDate`, `EndDate`, `Time`, `ETime`, `Fees`, `Seats`) VALUES
('CL-000001', 'Game Development', 'C#', 'Parsad', 'Images/CL-000001_Parsad.jpg', '2022-07-01', '2022-07-31', '08:45 AM', '10:15 AM', '52000', 21),
('CL-000002', 'Game Development', 'C++', 'Parsad', 'Images/CL-000002_Parsad.jpg', '2022-07-01', '2022-07-31', '12:45 PM', '02:15 AM', '52000', 21),
('CL-000003', 'Mobile Development', 'Java', 'Sonia', 'Images/CL-000003_Sonia.jpg', '2022-07-01', '2022-07-31', '08:45 AM', '10:15 AM', '75000', 21),
('CL-000004', 'Mobile Development', 'Swift', 'Sonia', 'Images/CL-000004_Sonia.jpg', '2022-07-01', '2022-07-31', '12:45 PM', '02:15 AM', '75000', 20),
('CL-000005', 'Programming Language', 'PHP', 'Pradeep', 'Images/CL-000005_Pradeep.jpg', '2022-07-01', '2022-05-31', '08:45', '10:15', '40000', 20),
('CL-000006', 'Programming Language', 'MySql', 'Sonia', 'Images/CL-000006_Sonia.jpg', '2022-07-01', '2022-07-31', '02:30', '04:00', '50000', 0),
('CL-000007', 'Game Development', 'PHP', 'Pradeep', 'Images/CL-000007_Pradeep.jpg', '2022-07-20', '2022-08-20', '12:45 PM', '14:15 PM', '55000', 21),
('CL-000008', 'Mobile Development', 'PHP', 'Pradeep', 'Images/CL-000008_Pradeep.jpg', '2022-07-20', '2022-08-20', '12:45 PM', '14:15 PM', '55000', 21);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` varchar(25) NOT NULL,
  `CourseName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseName`) VALUES
('CO-000001', 'PHP'),
('CO-000002', 'Java'),
('CO-000003', 'Kotlin'),
('CO-000004', 'Swift'),
('CO-000005', 'Oracle'),
('CO-000006', 'MySql'),
('CO-000007', 'C++'),
('CO-000008', 'C#');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `LecturerID` varchar(25) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Degree` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `DOB` varchar(30) NOT NULL,
  `Gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`LecturerID`, `Name`, `Path`, `Phone`, `Mail`, `Degree`, `Password`, `Address`, `DOB`, `Gender`) VALUES
('L-000001', 'Sonia', 'Images/L-000001_Sonia.jpg', '09441996135', 'sonu@gmail.com', 'B.Sc(Computer Science)', '89765', 'Mandalay, Mandalay, Myanmar', '1999-01-20', 'Female'),
('L-000002', 'Kay Thi Kyaw', 'Images/L-000002_KayThiKyaw.jpg', '09788267943', 'kay@gmail.com', 'B.Sc(IT)', '34567', 'Mandalay, Mandalay, Myanamar', '1994-10-20', 'Female'),
('L-000003', 'Parsad', 'Images/L-000003_Parsad.jpg', '09767633647', 'parsad@gmail.com', 'B.Sc(IT)', '098989', 'Tamu, Sagaing, Myanmar', '1999-03-31', 'Male'),
('L-000004', 'Pradeep', 'Images/L-000004_Pradeep.jpg', '09965707989', 'pradeep@gmail.com', 'B.Sc(Hons)', '898901', 'Yangon, Yangon, Myanmar', '1990-03-31', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `register_detail`
--

CREATE TABLE `register_detail` (
  `RegisterID` varchar(25) NOT NULL,
  `ClassID` varchar(25) NOT NULL,
  `StudentID` varchar(25) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Fees` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register_detail`
--

INSERT INTO `register_detail` (`RegisterID`, `ClassID`, `StudentID`, `Quantity`, `Fees`, `Amount`) VALUES
('R-000001', 'CL-000004', 'SU-000001', 1, 75000, 75000),
('R-000002', 'CL-000005', 'SU-000001', 1, 40000, 40000),
('R-000003', 'CL-000006', 'SU-000001', 1, 50000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `RegisterID` varchar(25) NOT NULL,
  `RegisterDate` date NOT NULL,
  `StudentID` varchar(25) NOT NULL,
  `StudentName` varchar(25) NOT NULL,
  `PayType` varchar(15) NOT NULL,
  `BankCard` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`RegisterID`, `RegisterDate`, `StudentID`, `StudentName`, `PayType`, `BankCard`) VALUES
('R-000001', '2022-06-20', 'SU-000001', 'soni guragai', 'BankTransfer', 245567),
('R-000002', '2022-06-20', 'SU-000001', 'soni guragai', 'BankTransfer', 98020),
('R-000003', '2022-06-20', 'SU-000001', 'soni guragai', 'BankTransfer', 9009);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` varchar(25) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Mail` varchar(25) NOT NULL,
  `Degree` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Name`, `Phone`, `Mail`, `Degree`, `Password`, `Address`, `DOB`, `Gender`) VALUES
('S-000001', 'Kaung Kaung', '0987654321', 'kaung@gmail.com', 'B.Sc(IT)', '89728', 'Tamu, Sagaing, Myanmar', '1996-01-20', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` varchar(25) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `FirstName`, `LastName`, `Phone`, `Mail`, `Password`, `Address`, `DOB`, `Gender`) VALUES
('SU-000001', 'soni', 'guragai', '09685412882', 'soni@gmail.com', '909090', 'Tamu, Sagaing, Myanmar', '1999-01-02', 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`,`CategoryName`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`LecturerID`);

--
-- Indexes for table `register_detail`
--
ALTER TABLE `register_detail`
  ADD PRIMARY KEY (`RegisterID`,`ClassID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`RegisterID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
