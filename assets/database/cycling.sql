-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 04. zář 2024, 09:06
-- Verze serveru: 10.4.28-MariaDB
-- Verze PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `cycling`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `shortNote` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `longNote` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `note_type`
--

CREATE TABLE `note_type` (
  `id` int(11) NOT NULL,
  `short` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `parcour_type`
--

CREATE TABLE `parcour_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `race`
--

CREATE TABLE `race` (
  `id` int(11) NOT NULL,
  `default_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `race_type`
--

CREATE TABLE `race_type` (
  `short` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `race_year`
--

CREATE TABLE `race_year` (
  `id` int(11) NOT NULL,
  `real_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `id_race` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `uci_tour` tinyint(4) NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `sex` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `name_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `team_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `id_stage` int(11) NOT NULL,
  `id_rider` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  `bonification` smallint(4) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `type_result` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `result_type`
--

CREATE TABLE `result_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `color` varchar(255) NOT NULL,
  `offset` int(11) NOT NULL COMMENT 'u kolikáte buňky čtu výsledky u první etapy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `rider`
--

CREATE TABLE `rider` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `rider_team_year`
--

CREATE TABLE `rider_team_year` (
  `id` int(11) NOT NULL,
  `id_rider` int(11) NOT NULL,
  `id_team_year` int(11) NOT NULL,
  `rider_foto_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `stage`
--

CREATE TABLE `stage` (
  `id` int(11) NOT NULL,
  `number` tinyint(4) DEFAULT NULL COMMENT 'číslo etapy v závodě',
  `date` date NOT NULL,
  `note` varchar(255) NOT NULL,
  `departure` varchar(255) NOT NULL,
  `arrival` varchar(255) NOT NULL,
  `distance` double NOT NULL,
  `parcour_type` tinyint(4) NOT NULL,
  `vertical_meters` int(11) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `id_race_year` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `actual_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `team_status`
--

CREATE TABLE `team_status` (
  `id` int(11) NOT NULL,
  `abbreviation` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `team_year`
--

CREATE TABLE `team_year` (
  `id` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `abbreviation` varchar(255) NOT NULL,
  `team_status` tinyint(4) NOT NULL,
  `bike` smallint(6) NOT NULL,
  `jersey` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `uci_tour_type`
--

CREATE TABLE `uci_tour_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `note_type`
--
ALTER TABLE `note_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `parcour_type`
--
ALTER TABLE `parcour_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link` (`link`),
  ADD KEY `type` (`type`);

--
-- Indexy pro tabulku `race_type`
--
ALTER TABLE `race_type`
  ADD PRIMARY KEY (`short`);

--
-- Indexy pro tabulku `race_year`
--
ALTER TABLE `race_year`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_race` (`id_race`),
  ADD KEY `start_date` (`start_date`,`end_date`);

--
-- Indexy pro tabulku `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stage` (`id_stage`),
  ADD KEY `id_rider` (`id_rider`),
  ADD KEY `id_team` (`id_team`),
  ADD KEY `rank` (`rank`),
  ADD KEY `type_result` (`type_result`),
  ADD KEY `note` (`note`);

--
-- Indexy pro tabulku `result_type`
--
ALTER TABLE `result_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `rider_team_year`
--
ALTER TABLE `rider_team_year`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_team_year` (`id_team_year`),
  ADD KEY `id_rider` (`id_rider`);

--
-- Indexy pro tabulku `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_race_year` (`id_race_year`),
  ADD KEY `link` (`link`);

--
-- Indexy pro tabulku `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actual_name` (`actual_name`);

--
-- Indexy pro tabulku `team_status`
--
ALTER TABLE `team_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abbreviation` (`abbreviation`),
  ADD KEY `level` (`level`);

--
-- Indexy pro tabulku `team_year`
--
ALTER TABLE `team_year`
  ADD PRIMARY KEY (`id`),
  ADD KEY `year` (`year`),
  ADD KEY `id_team` (`id_team`),
  ADD KEY `team_status` (`team_status`),
  ADD KEY `bike` (`bike`),
  ADD KEY `link` (`link`);

--
-- Indexy pro tabulku `uci_tour_type`
--
ALTER TABLE `uci_tour_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `note_type`
--
ALTER TABLE `note_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `parcour_type`
--
ALTER TABLE `parcour_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `race`
--
ALTER TABLE `race`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `race_year`
--
ALTER TABLE `race_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `rider`
--
ALTER TABLE `rider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `stage`
--
ALTER TABLE `stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `team_status`
--
ALTER TABLE `team_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `team_year`
--
ALTER TABLE `team_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `uci_tour_type`
--
ALTER TABLE `uci_tour_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
