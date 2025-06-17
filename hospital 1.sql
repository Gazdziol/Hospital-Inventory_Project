-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Maj 27, 2025 at 11:41 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oddzialy`
--

CREATE TABLE `oddzialy` (
  `id_o` int(11) NOT NULL,
  `oddzial` varchar(255) NOT NULL,
  `budynek` varchar(10) NOT NULL,
  `pietro` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oddzialy`
--

INSERT INTO `oddzialy` (`id_o`, `oddzial`, `budynek`, `pietro`) VALUES
(4, 'Oddział Urologi', '1', '3'),
(5, 'Dział Techniczny', '1', '6'),
(10, 'Sekcja Żywienia', '2', '1'),
(16, 'Hematologia i Onkologia', '2', '3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `urzadzenia`
--

CREATE TABLE `urzadzenia` (
  `id_u` int(11) NOT NULL,
  `nazwa_urzadzenia` varchar(255) NOT NULL,
  `lokalizacja` varchar(255) NOT NULL,
  `typ` varchar(255) NOT NULL,
  `czas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `urzadzenia`
--

INSERT INTO `urzadzenia` (`id_u`, `nazwa_urzadzenia`, `lokalizacja`, `typ`, `czas`) VALUES
(5, 'Komputer', 'Oddział Pulmonologi', 'Sprzęt', '2025-05-16'),
(6, 'Skaner', 'Oddział hematologi i onkologi', 'Sprzęt', '2025-05-09'),
(7, 'Serwer', 'Dział techniczny', 'Sprzęt', '2025-05-09'),
(9, 'Maszyna', 'Oddział Pulmonologi', 'Sprzęt', '2025-05-16'),
(11, 'Laptop', 'Oddział Diabetologi', 'Sprzęt', '2025-05-13'),
(12, 'Komputer', 'Oddział Radiologi', 'Sprzęt', '2025-05-13'),
(13, 'Komputer', 'Dział techniczny', 'Sprzęt', '2025-05-13'),
(14, 'Komputer', 'Dział techniczny', 'Sprzęt', '2025-05-13'),
(22, 'Komp', 'Sekcja Żywienia', 'Sprzęt', '2025-05-15');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_u` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_u`, `login`, `haslo`) VALUES
(1, 'dawid', 'gazda'),
(2, 'julka', 'golda');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `oddzialy`
--
ALTER TABLE `oddzialy`
  ADD PRIMARY KEY (`id_o`);

--
-- Indeksy dla tabeli `urzadzenia`
--
ALTER TABLE `urzadzenia`
  ADD PRIMARY KEY (`id_u`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oddzialy`
--
ALTER TABLE `oddzialy`
  MODIFY `id_o` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `urzadzenia`
--
ALTER TABLE `urzadzenia`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
