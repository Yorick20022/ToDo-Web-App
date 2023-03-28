-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 mrt 2023 om 01:47
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE `categorie` (
  `CategorieID` int(11) NOT NULL,
  `CategorieNaam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `categorie`
--

INSERT INTO `categorie` (`CategorieID`, `CategorieNaam`) VALUES
(1, 'werk'),
(2, 'school'),
(3, 'thuis');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `taken`
--

CREATE TABLE `taken` (
  `TaakID` int(11) NOT NULL,
  `TaakNaam` varchar(50) NOT NULL,
  `Deadline` date NOT NULL,
  `Prioriteit` varchar(10) NOT NULL,
  `Omschrijving` varchar(100) NOT NULL,
  `CategorieID` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `taken`
--

INSERT INTO `taken` (`TaakID`, `TaakNaam`, `Deadline`, `Prioriteit`, `Omschrijving`, `CategorieID`, `createdAt`) VALUES
(241, 'homework due 2', '2023-03-17', 'normaal', 'homework due 2', 3, '2023-03-26 23:14:29');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`CategorieID`),
  ADD KEY `CategorieID` (`CategorieID`);

--
-- Indexen voor tabel `taken`
--
ALTER TABLE `taken`
  ADD PRIMARY KEY (`TaakID`),
  ADD KEY `FK_taken_categorie` (`CategorieID`),
  ADD KEY `TaakID` (`TaakID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categorie`
--
ALTER TABLE `categorie`
  MODIFY `CategorieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `taken`
--
ALTER TABLE `taken`
  MODIFY `TaakID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `taken`
--
ALTER TABLE `taken`
  ADD CONSTRAINT `FK_taken_categorie` FOREIGN KEY (`CategorieID`) REFERENCES `categorie` (`CategorieID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
