-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2016 at 10:38 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplitest`
--

-- --------------------------------------------------------

--
-- Table structure for table `odgovori`
--

CREATE TABLE `odgovori` (
  `id` int(11) NOT NULL,
  `id_pitanja` int(11) NOT NULL,
  `odgovor` text CHARACTER SET latin1 NOT NULL,
  `tacan` enum('0','1') CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `odgovori`
--

INSERT INTO `odgovori` (`id`, `id_pitanja`, `odgovor`, `tacan`) VALUES
(1, 1, 'Home Tool Markup Language', '0'),
(2, 1, 'Hyperlinks and Text Markup Language', '0'),
(3, 1, 'Hyper Text Markup Language', '1'),
(4, 1, 'Hyperlink Time Manager Language', '0'),
(18, 5, '<a href="#"> neki link</a>', '1'),
(19, 4, '<h6>', '0'),
(20, 4, '<heading>', '0'),
(21, 4, '<h1>', '1'),
(22, 4, '<head>', '0'),
(23, 5, '<a>http://www.w3schools.com</a>', '0'),
(24, 5, '<a name="http://www.w3schools.com">W3Schools.com</a>', '0'),
(25, 5, '<a href="http://www.w3schools.com">W3Schools</a>', '0'),
(26, 6, '<table><tr><tt>', '0'),
(27, 6, '<thead><body><tr>', '0'),
(28, 6, '<table><head><tfoot>', '0'),
(29, 6, '<table><tr><td>', '1'),
(30, 7, '<ul>', '0'),
(31, 7, '<ol>', '1'),
(32, 7, '<dl>', '0'),
(33, 7, '<list>', '0'),
(34, 8, 'Computer Style Sheets', '0'),
(35, 8, 'Creative Style Sheets', '0'),
(36, 8, 'Colorful Style Sheets', '0'),
(37, 8, 'Cascading Style Sheets', '1'),
(38, 9, ' body {color: black;}', '1'),
(39, 9, 'body:color=black;', '0'),
(40, 9, '{body:color=black;}', '0'),
(41, 9, '{body;color:black;}', '0'),
(42, 10, 'bgcolor', '0'),
(43, 10, 'background-color', '1'),
(44, 10, 'color', '0'),
(45, 11, 'all.h1 {background-color:#FFFFFF;}', '0'),
(46, 11, 'h1 {background-color:#FFFFFF;}', '1'),
(47, 11, 'h1.all {background-color:#FFFFFF;}', '0'),
(48, 12, 'Private Home Page', '1'),
(49, 12, 'PHP: Hypertext Preprocessor', '0'),
(50, 12, 'Personal Hypertext Processor', '0'),
(51, 13, '<?php>...</?>', '0'),
(52, 13, '<&>...</&>', '0'),
(53, 13, '<?php...?>', '1'),
(54, 13, '<script>...</script>', '0'),
(55, 14, 'Document.Write("Hello World");', '0'),
(56, 14, 'echo "Hello World";', '1'),
(57, 14, '"Hello World";', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pitanja`
--

CREATE TABLE `pitanja` (
  `id` int(11) NOT NULL,
  `id_predmeta` int(11) NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pitanja`
--

INSERT INTO `pitanja` (`id`, `id_predmeta`, `opis`) VALUES
(1, 1, 'Sta znaci HTML?'),
(4, 1, 'Izaberite taÄan HTML element za najveÄ‡i naslov:'),
(5, 1, 'Kojij je tacan HTML za kreiranje hiperlinka:'),
(6, 1, 'ObeleÅ¾i polje gde se nalaze svi elementi koji spadaju u element <table>'),
(7, 1, 'Kako moÅ¾ete napraviti listu sa brojevima?'),
(8, 1, 'Å ta znaÄi CSS?'),
(9, 1, 'Koja je ispravna CSS sintaksa?'),
(10, 1, 'Koje se svojstvo koristi za promenu boje pozadine?'),
(11, 1, 'Kako dodajemo boju pozadine na sve <h1> elemente?'),
(12, 2, 'Sta znaci PHP?'),
(13, 2, 'PHP server skripta je okruzena sa oznakama:'),
(14, 2, 'Koju komandu cemo koristiti za ispisivanje teksta "Hello World" u PHP?');

-- --------------------------------------------------------

--
-- Table structure for table `predmet`
--

CREATE TABLE `predmet` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `id_smera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `predmet`
--

INSERT INTO `predmet` (`id`, `naziv`, `id_smera`) VALUES
(1, 'Web Dizajn', 1),
(2, 'Internet Programiranje', 1),
(3, 'Softversko InÅ¾injerstvo', 1),
(4, 'Klijen-Server Sistemi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `ime` varchar(40) NOT NULL,
  `prezime` varchar(40) NOT NULL,
  `br_indeksa` varchar(30) NOT NULL,
  `smer` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lozinka` varchar(300) NOT NULL,
  `tip` enum('student','profesor','admin') NOT NULL,
  `status` enum('neaktivan','aktivan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `ime`, `prezime`, `br_indeksa`, `smer`, `email`, `lozinka`, `tip`, `status`) VALUES
(1, 'Enes', 'Korac', '', 0, 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'aktivan'),
(2, 'Dzenis', 'Berovic', '', 0, 'dzenis@gmail.com', '209d5fae8b2ba427d30650dd0250942af944a0c9', 'student', 'aktivan'),
(3, 'Ejub', 'Kajan', '', 0, 'kajan@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'profesor', 'aktivan'),
(4, 'Korac', 'Enes', '02-005/11', 1, 'korac@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'student', ''),
(5, 'Irfan', 'hackovic', '', 0, 'hachko@gmail.com', '209d5fae8b2ba427d30650dd0250942af944a0c9', 'student', 'aktivan'),
(6, 'a', 'A', '', 0, 'a@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'student', 'aktivan'),
(7, 'Edis', 'Mekic', '', 0, 'mekic@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'profesor', 'neaktivan'),
(8, 'Ivan', 'Djokic', '', 0, 'ivan@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'profesor', 'aktivan');

-- --------------------------------------------------------

--
-- Table structure for table `randomodgovori`
--

CREATE TABLE `randomodgovori` (
  `id_testa` int(11) NOT NULL,
  `id_pitanja` int(11) NOT NULL,
  `id_odg` int(11) NOT NULL,
  `opis` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `tacan` enum('0','1') COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rezultati`
--

CREATE TABLE `rezultati` (
  `id` int(11) NOT NULL,
  `id_studenta` int(11) NOT NULL,
  `id_predmeta` int(11) NOT NULL,
  `id_testa` int(11) NOT NULL,
  `tacno` int(11) NOT NULL,
  `ukupno` int(11) NOT NULL,
  `poena` int(11) NOT NULL,
  `ocena` int(11) NOT NULL,
  `uradjen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `rezultati`
--

INSERT INTO `rezultati` (`id`, `id_studenta`, `id_predmeta`, `id_testa`, `tacno`, `ukupno`, `poena`, `ocena`, `uradjen`) VALUES
(1, 4, 1, 1, 3, 5, 60, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `smer`
--

CREATE TABLE `smer` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smer`
--

INSERT INTO `smer` (`id`, `naziv`) VALUES
(1, 'RaÄunarska Tehnika'),
(2, 'Audio i Video Tehnologija'),
(3, 'Arhitektura'),
(4, 'GraÄ‘evinarstvo');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `id_predmeta` int(11) NOT NULL,
  `naziv` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `id_profesora` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `id_predmeta`, `naziv`, `id_profesora`, `datum`) VALUES
(1, 1, 'HTML', 3, '2016-08-25'),
(2, 1, 'CSS', 3, '2016-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `testpitanja`
--

CREATE TABLE `testpitanja` (
  `id` int(11) NOT NULL,
  `id_testa` int(11) NOT NULL,
  `id_pitanja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `testpitanja`
--

INSERT INTO `testpitanja` (`id`, `id_testa`, `id_pitanja`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 1, 5),
(4, 1, 6),
(5, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `test_odgovori`
--

CREATE TABLE `test_odgovori` (
  `id` int(11) NOT NULL,
  `id_testa` int(11) NOT NULL,
  `id_pitanja` int(11) NOT NULL,
  `id_odgovora` int(11) NOT NULL,
  `odgovor` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `tacan` enum('0','1') COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `test_odgovori`
--

INSERT INTO `test_odgovori` (`id`, `id_testa`, `id_pitanja`, `id_odgovora`, `odgovor`, `tacan`) VALUES
(1, 1, 1, 1, 'Home Tool Markup Language', '0'),
(2, 1, 1, 2, 'Hyperlinks and Text Markup Language', '0'),
(3, 1, 1, 4, 'Hyperlink Time Manager Language', '0'),
(4, 1, 1, 3, 'Hyper Text Markup Language', '1'),
(8, 1, 4, 22, '<head>', '0'),
(9, 1, 4, 21, '<h1>', '1'),
(10, 1, 4, 20, '<heading>', '0'),
(11, 1, 4, 19, '<h6>', '0'),
(15, 1, 5, 18, '<a href="#"> neki link</a>', '1'),
(16, 1, 5, 25, '<a href="http://www.w3schools.com">W3Schools</a>', '0'),
(17, 1, 5, 24, '<a name="http://www.w3schools.com">W3Schools.com</a>', '0'),
(18, 1, 5, 23, '<a>http://www.w3schools.com</a>', '0'),
(22, 1, 6, 26, '<table><tr><tt>', '0'),
(23, 1, 6, 28, '<table><head><tfoot>', '0'),
(24, 1, 6, 27, '<thead><body><tr>', '0'),
(25, 1, 6, 29, '<table><tr><td>', '1'),
(29, 1, 7, 33, '<list>', '0'),
(30, 1, 7, 31, '<ol>', '1'),
(31, 1, 7, 32, '<dl>', '0'),
(32, 1, 7, 30, '<ul>', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `odgovori`
--
ALTER TABLE `odgovori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pitanja`
--
ALTER TABLE `pitanja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predmet`
--
ALTER TABLE `predmet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `rezultati`
--
ALTER TABLE `rezultati`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smer`
--
ALTER TABLE `smer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testpitanja`
--
ALTER TABLE `testpitanja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_odgovori`
--
ALTER TABLE `test_odgovori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `odgovori`
--
ALTER TABLE `odgovori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `pitanja`
--
ALTER TABLE `pitanja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `predmet`
--
ALTER TABLE `predmet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rezultati`
--
ALTER TABLE `rezultati`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `smer`
--
ALTER TABLE `smer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `testpitanja`
--
ALTER TABLE `testpitanja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `test_odgovori`
--
ALTER TABLE `test_odgovori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
