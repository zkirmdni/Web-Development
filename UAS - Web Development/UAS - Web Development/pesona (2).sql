-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 03:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesona`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiKODE` char(4) NOT NULL,
  `destinasiNAMA` varchar(120) NOT NULL,
  `kategoriKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiKODE`, `destinasiNAMA`, `kategoriKODE`) VALUES
('371', 'ikaz', 'Kate');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotodestinasiKODE` char(4) NOT NULL,
  `fotodestinasiNAMA` char(120) NOT NULL,
  `fotodestinasiFILE` char(120) NOT NULL,
  `destinaKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotodestinasiKODE`, `fotodestinasiNAMA`, `fotodestinasiFILE`, `destinaKODE`) VALUES
('371', 'zaki', 'bg-05.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenisbarang`
--

CREATE TABLE `jenisbarang` (
  `barangTYPE` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenishp`
--

CREATE TABLE `jenishp` (
  `hpTYPE` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoriwisata`
--

CREATE TABLE `kategoriwisata` (
  `kategoriKODE` char(4) NOT NULL,
  `kategoriNAMA` char(25) NOT NULL,
  `kategoriKET` text NOT NULL,
  `kategoriREFERENCE` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualanhp`
--

CREATE TABLE `penjualanhp` (
  `hpKODE` char(4) NOT NULL,
  `hpNAMA` char(160) NOT NULL,
  `garansiKODE` varchar(250) NOT NULL,
  `hpTYPE` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualanhp`
--

INSERT INTO `penjualanhp` (`hpKODE`, `hpNAMA`, `garansiKODE`, `hpTYPE`) VALUES
('371', 'samsung', 'kdoq', 'VIVO');

-- --------------------------------------------------------

--
-- Table structure for table `pusatoleh`
--

CREATE TABLE `pusatoleh` (
  `barangKODE` char(4) NOT NULL,
  `barangNAMA` char(160) NOT NULL,
  `barangHARGA` char(250) NOT NULL,
  `barangTYPE` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pusatoleh`
--

INSERT INTO `pusatoleh` (`barangKODE`, `barangNAMA`, `barangHARGA`, `barangTYPE`) VALUES
('zr13', 'zaki', 'mahal', ''),
('zr19', 'pocco', '19.000', ''),
('zr36', 'hape', 'Rp.3.000.000', '');

-- --------------------------------------------------------

--
-- Table structure for table `ramdani`
--

CREATE TABLE `ramdani` (
  `ramdaniID` int(11) NOT NULL,
  `ramdaniKOTA` varchar(255) NOT NULL,
  `destinasiKODE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resto`
--

CREATE TABLE `resto` (
  `restoMAKAN` char(120) NOT NULL,
  `restoMINUM` char(120) NOT NULL,
  `restoMENU` char(120) NOT NULL,
  `fotoMENU` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resto`
--

INSERT INTO `resto` (`restoMAKAN`, `restoMINUM`, `restoMENU`, `fotoMENU`) VALUES
('111', 'daging', 'pexels-mali-maeder-65175.jpg', 'Dinner'),
('222', 'sayur', 'pexels-dadan-ramdani-18174740.jpg', 'Breakfast'),
('tepung', 'kue', 'pexels-karen-laårk-boshoff-7243524.jpg', 'Lunch');

-- --------------------------------------------------------

--
-- Table structure for table `restomenu`
--

CREATE TABLE `restomenu` (
  `fotoMENU` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restomenu`
--

INSERT INTO `restomenu` (`fotoMENU`) VALUES
('Breakfast'),
('Dinner'),
('Lunch');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `namaTRAVEL` char(120) NOT NULL,
  `tujuanTRAVEL` char(120) NOT NULL,
  `tanggalTRAVEL` date NOT NULL,
  `jenisTRAVEL` char(250) NOT NULL,
  `fotoTRAVEL` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`namaTRAVEL`, `tujuanTRAVEL`, `tanggalTRAVEL`, `jenisTRAVEL`, `fotoTRAVEL`) VALUES
('ali', 'gunung', '2025-12-15', 'healing', 'fotofoto.jpg'),
('dapa', 'curug', '2024-12-13', 'air terjun', 'pexels-nandhu-kumar-450441.jpg'),
('Zaki', 'Healing', '2024-11-11', 'Jalan Jalan', 'pexels-andrei-tanase-1271619.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `userKODE` char(4) NOT NULL,
  `userNAMA` char(30) NOT NULL,
  `userEMAIL` char(60) NOT NULL,
  `userPASS` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`userKODE`, `userNAMA`, `userEMAIL`, `userPASS`) VALUES
('137', 'Zaki', 'zakiramdani@gmail.com', '918dba1e5b053c3ae4aef690a7aa8585');

-- --------------------------------------------------------

--
-- Table structure for table `zaki`
--

CREATE TABLE `zaki` (
  `hotel0137` char(4) NOT NULL,
  `hotelNAMA` char(160) NOT NULL,
  `hotelALAMAT` varchar(250) NOT NULL,
  `kategori0137` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zaki`
--

INSERT INTO `zaki` (`hotel0137`, `hotelNAMA`, `hotelALAMAT`, `kategori0137`) VALUES
('pp', 'DAFA', 'grogol', '65'),
('Z001', 'JEK', 'Tangerang', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiKODE`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotodestinasiKODE`);

--
-- Indexes for table `jenisbarang`
--
ALTER TABLE `jenisbarang`
  ADD PRIMARY KEY (`barangTYPE`);

--
-- Indexes for table `jenishp`
--
ALTER TABLE `jenishp`
  ADD PRIMARY KEY (`hpTYPE`);

--
-- Indexes for table `kategoriwisata`
--
ALTER TABLE `kategoriwisata`
  ADD PRIMARY KEY (`kategoriKODE`);

--
-- Indexes for table `penjualanhp`
--
ALTER TABLE `penjualanhp`
  ADD PRIMARY KEY (`hpKODE`);

--
-- Indexes for table `pusatoleh`
--
ALTER TABLE `pusatoleh`
  ADD PRIMARY KEY (`barangKODE`);

--
-- Indexes for table `ramdani`
--
ALTER TABLE `ramdani`
  ADD PRIMARY KEY (`ramdaniID`);

--
-- Indexes for table `resto`
--
ALTER TABLE `resto`
  ADD PRIMARY KEY (`restoMAKAN`);

--
-- Indexes for table `restomenu`
--
ALTER TABLE `restomenu`
  ADD PRIMARY KEY (`fotoMENU`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`namaTRAVEL`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`userKODE`);

--
-- Indexes for table `zaki`
--
ALTER TABLE `zaki`
  ADD PRIMARY KEY (`hotel0137`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
