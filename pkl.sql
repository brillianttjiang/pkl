-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2018 at 09:35 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `iditem` int(11) NOT NULL,
  `iditem2` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pabrik` varchar(100) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `expdate` date NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`iditem`, `iditem2`, `nama`, `pabrik`, `batch`, `harga`, `stok`, `expdate`, `satuan`) VALUES
(1, 'AF123', 'Wiros 20 Mg @100 Kapsul ITRASA', 'PT Nestle', '77215/10.18', 17300, 4479, '2018-10-26', 'box'),
(2, 'fd398', 'Mirasic @100Kap (Strip)', 'PT Jaya Farmasi', '89345/01.19', 16500, 1927, '2019-01-29', 'box'),
(3, '', 'Omeric 100 Mg @100Kap', '', '', 13500, 262, '2018-06-01', ''),
(4, '', 'Dexteem @100 Tablet Erpha', '', '', 11500, 3929, '2019-04-18', ''),
(5, '', 'Erla Neo Hydrocort Erela', '', '', 4450, 78, '2018-06-07', ''),
(6, '', 'Hufagesic 500 Mg', '', '', 15900, 0, '2018-09-26', ''),
(7, '', 'Lerzin @50 kapsul', '', '', 20000, 976, '2019-03-19', ''),
(8, '', 'Minyak Tawon Cap Gajah', '', '', 15000, 0, '2019-03-20', ''),
(9, '', 'Metformin 500 Mg (HEXPARM) HEX', '', '', 14750, 985, '2019-08-20', ''),
(10, '', 'Synarcus Cream @5gram IFARS', '', '', 2950, 996, '2020-04-22', ''),
(11, '', 'Erphaflam Erpha', '', '', 10728, 1250, '2020-12-20', ''),
(12, '', 'Antiprestin Fluoxetine 20 MG', '', '', 35000, 4967, '2019-03-13', ''),
(13, '', 'Minyak Putih Cap Lang', '', '', 10000, 2500, '2018-08-16', ''),
(14, '', 'Minyak wangi', '', '', 5000, 100, '0000-00-00', 'botol'),
(15, '121', 'Minyak minyakan', '', '123', 50000, 15, '2020-12-13', 'botol'),
(16, '', 'Aqua', '', '', 0, 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `kirim`
--

CREATE TABLE `kirim` (
  `idkirim` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggalorder` varchar(50) NOT NULL,
  `tanggalkirim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kirim`
--

INSERT INTO `kirim` (`idkirim`, `iduser`, `alamat`, `total`, `status`, `tanggalorder`, `tanggalkirim`) VALUES
(179, 25, 'Jalan langsep 48', 564000, 2, 'Wednesday,4 April 2018', 'Wednesday,4 April 2018'),
(180, 20, 'Jalan tidar 15', 259500, 0, 'Wednesday,4 April 2018', ''),
(181, 27, 'Jalan Bligo no 16 Pekalongan', 62500, 0, 'Wednesday,4 April 2018', ''),
(182, 25, 'Jalan langsep 48', 89000, 0, 'Friday,6 April 2018', ''),
(183, 25, 'Jalan langsep 48', 43400, 0, 'Monday,14 May 2018', ''),
(184, 1, 'Jalan Gersang 15', 49500, 0, 'Saturday,16 June 2018', '');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `idorder` int(11) NOT NULL,
  `idkirim` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `iditem` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `tanggalorder` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`idorder`, `idkirim`, `iduser`, `iditem`, `jumlah`, `bayar`, `tanggalorder`) VALUES
(444, 179, 25, 2, 1, 16500, 'Wednesday,4 April 2018'),
(445, 179, 25, 3, 15, 202500, 'Wednesday,4 April 2018'),
(446, 179, 25, 4, 30, 345000, 'Wednesday,4 April 2018'),
(447, 180, 20, 1, 15, 259500, 'Wednesday,4 April 2018'),
(448, 181, 27, 2, 2, 33000, 'Wednesday,4 April 2018'),
(449, 181, 27, 9, 2, 29500, 'Wednesday,4 April 2018'),
(450, 182, 25, 5, 20, 89000, 'Friday,6 April 2018'),
(451, 183, 25, 4, 3, 34500, 'Monday,14 May 2018'),
(452, 183, 25, 5, 2, 8900, 'Monday,14 May 2018'),
(453, 184, 1, 2, 3, 49500, 'Saturday,16 June 2018');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `notelp` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `otoritas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `nama`, `password`, `alamat`, `notelp`, `npwp`, `otoritas`) VALUES
(1, 'br', 'PT Brilliant Futures', '123', 'Jalan Gersang 15', '(0341)710418', '00.000.000.0-000.000', 0),
(2, 'admin1', 'admin1', '123', '', '', '', 1),
(4, 'admin2', 'admin2', '000', '', '', '', 1),
(20, 'yoko', 'Ko Yo', '123', 'Jalan tidar 15', '(031)909090', '00.001.000.0-000.001', 0),
(21, 'yokoo', 'Yokoo', '111', 'Blitar', '', '', 0),
(23, 'brilliant', 'brilli', '1', 'Jalan tidar 5', '', '', 0),
(24, 'adis', 'Adi Slamet', '123', 'Jalan Manggis 1', '', '', 0),
(25, 'muliajaya', 'PT Muliajaya', '123', 'Jalan langsep 48', '(081)998094', '00.001.000.0-000.002', 0),
(26, 'kiki', 'Aprilia Kiki', '123', 'Jalan langep 56', '', '', 1),
(27, 'cvindomedika', 'CV Indo Medika', '123', 'Jalan Bligo no 16 Pekalongan', '(000)00000', '00.000.000-0.000', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iditem`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `kirim`
--
ALTER TABLE `kirim`
  ADD PRIMARY KEY (`idkirim`),
  ADD KEY `FK_kirim` (`iduser`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`idorder`),
  ADD KEY `FK_order` (`iduser`),
  ADD KEY `FK_order1` (`iditem`),
  ADD KEY `FK_order3` (`idkirim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `kirim`
--
ALTER TABLE `kirim`
  MODIFY `idkirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=454;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kirim`
--
ALTER TABLE `kirim`
  ADD CONSTRAINT `FK_kirim` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_order` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_order1` FOREIGN KEY (`iditem`) REFERENCES `item` (`iditem`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_order3` FOREIGN KEY (`idkirim`) REFERENCES `kirim` (`idkirim`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
