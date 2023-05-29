-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Maj 2023, 16:19
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pizzeria`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `klient_id` int(11) NOT NULL,
  `imie` varchar(50) DEFAULT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `ulica` varchar(30) NOT NULL,
  `nr_domu` int(3) NOT NULL,
  `kod_poczta` varchar(6) NOT NULL,
  `miasto` varchar(30) NOT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`klient_id`, `imie`, `nazwisko`, `ulica`, `nr_domu`, `kod_poczta`, `miasto`, `mail`, `telefon`) VALUES
(1, 'Adam', 'Nowak', 'Kwiatowa', 5, '90-006', 'Łódź', 'adamNowak@wp.pl', '123123123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pizza`
--

CREATE TABLE `pizza` (
  `pizza_id` int(11) NOT NULL,
  `nazwa` varchar(50) DEFAULT NULL,
  `opis` varchar(200) DEFAULT NULL,
  `cena_mala` decimal(5,2) DEFAULT NULL,
  `cena_duza` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pizza`
--

INSERT INTO `pizza` (`pizza_id`, `nazwa`, `opis`, `cena_mala`, `cena_duza`) VALUES
(1, 'Capriciossa', 'ciasto, sos pomidorowy, ser, szynka, pieczarki, oregano', '31.99', '48.00'),
(2, 'Margherita', 'ciasto, sos pomidorowy, ser, oregano', '21.00', '42.00'),
(3, 'Salami', 'ciasto, sos pomidorowy, ser, salami, cebula', '27.00', '49.00'),
(4, 'Caprese', 'ciasto, sos pomidorowy, ser mozzarella, pomidorki koktajlowe, bazylia, oregano', '28.00', '48.00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pizza_sklad`
--

CREATE TABLE `pizza_sklad` (
  `pizza_sklad_id` int(30) NOT NULL,
  `pizza_id` int(11) NOT NULL,
  `skladnik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pizza_sklad`
--

INSERT INTO `pizza_sklad` (`pizza_sklad_id`, `pizza_id`, `skladnik_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 1),
(4, 1, 2),
(5, 1, 3),
(6, 1, 4),
(7, 1, 3),
(8, 1, 4),
(9, 2, 1),
(10, 2, 2),
(11, 2, 1),
(12, 2, 2),
(13, 2, 4),
(14, 4, 1),
(15, 4, 5),
(16, 4, 8),
(17, 4, 13),
(18, 4, 4),
(19, 3, 1),
(20, 3, 2),
(21, 3, 12),
(22, 3, 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `skladniki`
--

CREATE TABLE `skladniki` (
  `skladnik_id` int(11) NOT NULL,
  `nazwa` varchar(50) DEFAULT NULL,
  `cena` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `skladniki`
--

INSERT INTO `skladniki` (`skladnik_id`, `nazwa`, `cena`) VALUES
(1, 'sos pomidorowy', '3.00'),
(2, 'ser', '5.00'),
(3, 'szynka', '5.00'),
(4, 'oregano', '2.00'),
(5, 'mozzarella', '5.00'),
(6, 'brokuły', '5.00'),
(7, 'cebula', '4.00'),
(8, 'pomidor koktajlowy', '7.00'),
(9, 'papryka', '5.00'),
(10, 'oliwki', '5.00'),
(11, 'rukola', '5.00'),
(12, 'salami', '7.00'),
(13, 'bazylia', '2.00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `zamowienie_id` int(11) NOT NULL,
  `klient_id` int(11) DEFAULT NULL,
  `pizza_id` int(11) DEFAULT NULL,
  `ilosc` int(3) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `koszt` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`zamowienie_id`, `klient_id`, `pizza_id`, `ilosc`, `data`, `koszt`) VALUES
(1, 1, 2, 2, '2023-05-08 19:16:05', '42.00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`klient_id`);

--
-- Indeksy dla tabeli `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`pizza_id`);

--
-- Indeksy dla tabeli `pizza_sklad`
--
ALTER TABLE `pizza_sklad`
  ADD PRIMARY KEY (`pizza_sklad_id`),
  ADD KEY `pizza_id` (`pizza_id`),
  ADD KEY `skladnik_id` (`skladnik_id`);

--
-- Indeksy dla tabeli `skladniki`
--
ALTER TABLE `skladniki`
  ADD PRIMARY KEY (`skladnik_id`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`zamowienie_id`),
  ADD KEY `pizza_id` (`pizza_id`) USING BTREE,
  ADD KEY `klient_id` (`klient_id`) USING BTREE;

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `klient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `pizza`
--
ALTER TABLE `pizza`
  MODIFY `pizza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `pizza_sklad`
--
ALTER TABLE `pizza_sklad`
  MODIFY `pizza_sklad_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `skladniki`
--
ALTER TABLE `skladniki`
  MODIFY `skladnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `zamowienie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `pizza_sklad`
--
ALTER TABLE `pizza_sklad`
  ADD CONSTRAINT `pizza_sklad_ibfk_1` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`pizza_id`),
  ADD CONSTRAINT `pizza_sklad_ibfk_2` FOREIGN KEY (`skladnik_id`) REFERENCES `skladniki` (`skladnik_id`);

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`klient_id`) REFERENCES `klienci` (`klient_id`),
  ADD CONSTRAINT `zamowienia_ibfk_2` FOREIGN KEY (`pizza_id`) REFERENCES `pizza` (`pizza_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
