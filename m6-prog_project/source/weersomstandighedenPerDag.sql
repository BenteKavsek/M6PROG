-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Gegenereerd op: 24 nov 2023 om 12:03
-- Serverversie: 11.1.2-MariaDB-1:11.1.2+maria~ubu2204
-- PHP-versie: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m6prog_db`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `weersomstandighedenPerDag`
--

CREATE TABLE `weersomstandighedenPerDag` (
  `idWeersomstandighedenPerDag` int(10) UNSIGNED NOT NULL,
  `datum` date NOT NULL,
  `plaats` varchar(120) NOT NULL,
  `aantalGraden` decimal(10,0) NOT NULL,
  `windKracht` int(11) NOT NULL,
  `regenInMilimeters` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `weersomstandighedenPerDag`
--

INSERT INTO `weersomstandighedenPerDag` (`idWeersomstandighedenPerDag`, `datum`, `plaats`, `aantalGraden`, `windKracht`, `regenInMilimeters`) VALUES
(1, '2023-01-01', 'amsterdam', 1, 10, 80),
(2, '2023-01-01', 'den bosch', 4, 1, 10),
(3, '2023-01-02', 'den haag', 10, 1, 0),
(4, '2023-01-03', 'almere', 3, 3, 20);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `weersomstandighedenPerDag`
--
ALTER TABLE `weersomstandighedenPerDag`
  ADD PRIMARY KEY (`idWeersomstandighedenPerDag`),
  ADD UNIQUE KEY `idweersomstandighedenPerDag_UNIQUE` (`idWeersomstandighedenPerDag`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `weersomstandighedenPerDag`
--
ALTER TABLE `weersomstandighedenPerDag`
  MODIFY `idWeersomstandighedenPerDag` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
