-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas generowania: 01 Gru 2019, 17:40
-- Wersja serwera: 10.2.27-MariaDB-log
-- Wersja PHP: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `jasiu1041_ibd`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `address_id` int(255) NOT NULL,
  `city_id` int(255) NOT NULL,
  `street_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `house_number` int(255) NOT NULL,
  `apartment_number` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `addresses`
--

INSERT INTO `addresses` (`address_id`, `city_id`, `street_name`, `house_number`, `apartment_number`) VALUES
(3, 15, 'ul. Niemnoga', 14, 15),
(8, 19, 'ul. Duża', 143, 15),
(9, 14, 'ul.. Kard. Stefana Wyszyńskiego', 1, 20),
(10, 15, 'ul Mała', 143, 15),
(11, 17, 'ul. Belkowa', 2, 22),
(12, 17, 'ul. Nowakowa', 2, 22),
(13, 18, 'ul Małaa', 143, 15),
(14, 10, '', 0, 0),
(15, 10, 'ul. Nowowiejska', 0, 13),
(16, 8, '', 0, 0),
(17, 10, 'ul. Duża', 0, 5),
(18, 10, 'ul. Pułaskiego', 0, 3),
(19, 10, 'ul Bielany', 0, 1),
(20, 10, 'ul. Sołtysowicka', 0, 12),
(21, 10, 'ul. Sołtysowicka', 0, 20),
(22, 10, 'ul. Bielany', 0, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(255) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`admin_id`, `email`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(255) NOT NULL,
  `city_name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(6, 'Swidnica'),
(8, 'Wrocław'),
(9, '{'),
(10, ''),
(11, 'Warszawa'),
(14, 'Rzeszów'),
(15, 'Poznań'),
(16, 'Gdynia'),
(17, 'Gdańsk'),
(18, 'Kraków'),
(19, 'Szczecin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(255) NOT NULL,
  `event_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` int(1) NOT NULL,
  `date` date NOT NULL,
  `start_time` varchar(8) CHARACTER SET utf8 NOT NULL,
  `end_time` varchar(8) CHARACTER SET utf8 NOT NULL,
  `address_id` int(255) NOT NULL,
  `hour_price` int(8) NOT NULL,
  `free_places_count` int(8) NOT NULL,
  `places_count` int(8) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `events`
--

INSERT INTO `events` (`event_id`, `event_code`, `name`, `type`, `date`, `start_time`, `end_time`, `address_id`, `hour_price`, `free_places_count`, `places_count`, `description`) VALUES
(19, '10459', 'Inwentaryzacja magazynu Kaufland', 0, '2019-12-22', '12:30', '19:00', 21, 22, 10, 10, ''),
(20, '514282', 'Inwentaryzacja magazynu Kaufland', 0, '2019-12-02', '13:00', '15:00', 21, 22, 20, 20, 'Bez kobiet w ciąży'),
(21, '514302', 'Inwentaryzacja sklepu Auchan', 0, '2019-12-10', '18:00', '21:00', 22, 16, 0, 5, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sex` varchar(1) CHARACTER SET utf8 NOT NULL,
  `date_of_birth` date NOT NULL,
  `address_id` int(255) NOT NULL,
  `telephone_number` int(9) NOT NULL,
  `bank_account_number` int(26) NOT NULL,
  `balance` int(6) NOT NULL,
  `is_pregnant` tinyint(1) DEFAULT 0
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `sex`, `date_of_birth`, `address_id`, `telephone_number`, `bank_account_number`, `balance`, `is_pregnant`) VALUES
(3, 'jasiu1047@wp.pl', 'password', 'Piotr', 'Jasiczek', 'M', '2019-11-20', 3, 607099994, 444445, 0, 0),
(10, 'jasiu1049@wp.pl', 'password1', 'Piotr', 'Nowak', 'M', '1999-10-23', 9, 607099999, 2, 0, 1),
(11, 'jasiu1059@wp.pl', 'password1', 'Piotr', 'Nowak', 'M', '1999-10-23', 11, 607099939, 2147483647, 0, 0),
(12, 'jasiu1069@wp.pl', 'password1', 'Krystyna', 'Nowak', 'K', '1999-10-23', 12, 607099939, 2, 0, 0),
(13, 'user@gmail.com', 'user_password', 'Mateusz', 'Kowalski', 'M', '1990-10-15', 16, 599978223, 2147483647, 0, 0),
(14, 'test_user123@onet.pl', 'haslo123', 'Mateusz', 'Myt', 'M', '1990-11-14', 16, 233423992, 2147483647, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `usersevents`
--

CREATE TABLE IF NOT EXISTS `usersevents` (
  `user_id` int(255) NOT NULL,
  `event_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `usersevents`
--

INSERT INTO `usersevents` (`user_id`, `event_id`) VALUES
(11, 21);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `usersevents`
--
ALTER TABLE `usersevents`
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT dla tabeli `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT dla tabeli `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`);

--
-- Ograniczenia dla tabeli `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`);

--
-- Ograniczenia dla tabeli `usersevents`
--
ALTER TABLE `usersevents`
  ADD CONSTRAINT `usersevents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `usersevents_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
