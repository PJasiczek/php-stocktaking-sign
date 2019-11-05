-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Lis 2019, 00:21
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ibd_stocktaking`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `event`
--

CREATE TABLE `event` (
  `event_id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(1) NOT NULL,
  `date` date NOT NULL,
  `start_time` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_time` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hour_price` int(8) NOT NULL,
  `free_places_count` int(8) NOT NULL,
  `places_count` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `event`
--

INSERT INTO `event` (`event_id`, `name`, `type`, `date`, `start_time`, `end_time`, `address`, `city`, `hour_price`, `free_places_count`, `places_count`) VALUES
(1, 'Inwentaryzacja testowa', 1, '2019-11-05', '17', '23', 'ul. Nowa 18', 'WrocÅ‚aw', 17, 17, 40);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone_number` int(9) NOT NULL,
  `bank_account_number` int(26) NOT NULL,
  `balance` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `sex`, `date_of_birth`, `address`, `telephone_number`, `bank_account_number`, `balance`) VALUES
(1, 'test@wp.pl', 'password', 'Piotr', 'Nowak', 'M', '2019-11-14', 'ul. Nowa 15, Wrocław 50-001', 607999222, 0, 0),
(2, 'test1@wp.pl', 'password2', 'Witold', 'Witold', 'M', '1996-10-23', 'ul. Nowa 15, WrocÅ‚aw 50-002', 607899999, 1, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `usersevents`
--

CREATE TABLE `usersevents` (
  `user_id` int(255) NOT NULL,
  `event_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `usersevents`
--

INSERT INTO `usersevents` (`user_id`, `event_id`) VALUES
(2, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeksy dla tabeli `usersevents`
--
ALTER TABLE `usersevents`
  ADD KEY `user_id` (`user_id`,`event_id`),
  ADD KEY `event_id` (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `usersevents`
--
ALTER TABLE `usersevents`
  ADD CONSTRAINT `usersevents_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `usersevents_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
