-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Maj 2020, 19:44
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ankiety`
--

CREATE TABLE `ankiety` (
  `ankiety_id` int(11) NOT NULL,
  `ankiety_nazwa` varchar(45) DEFAULT NULL,
  `ankiety_dataod` date DEFAULT NULL,
  `ankiety_datado` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ankiety`
--

INSERT INTO `ankiety` (`ankiety_id`, `ankiety_nazwa`, `ankiety_dataod`, `ankiety_datado`) VALUES
(1, 'Testowa ankieta nr1', '2020-05-24', '2020-06-30'),
(2, 'Ankieta ewaluacyjna', '2020-05-06', '2020-05-14');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ankiety_wypelnione`
--

CREATE TABLE `ankiety_wypelnione` (
  `Id` int(11) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Ankiety_nazwa` varchar(50) NOT NULL,
  `ankiety_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ankiety_wypelnione`
--

INSERT INTO `ankiety_wypelnione` (`Id`, `Login`, `Ankiety_nazwa`, `ankiety_id`) VALUES
(1, 'Konrad', 'Testowa ankieta nr1', 1),
(2, 'Konrad', 'Ankieta ewaluacyjna', 2),
(3, 'Admin', 'Ankieta ewaluacyjna', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi`
--

CREATE TABLE `odpowiedzi` (
  `odpowiedzi_id` int(11) NOT NULL,
  `odp` varchar(255) NOT NULL,
  `hash_odp` varchar(255) NOT NULL,
  `id_ankiety` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `odpowiedzi`
--

INSERT INTO `odpowiedzi` (`odpowiedzi_id`, `odp`, `hash_odp`, `id_ankiety`) VALUES
(1, '_Mężczyzna_23_7_Słaby wygląd strony!', '7b8ffa9edd8dab810fd31583df374ec3aa1c21b268508b458696c6b80e80c84f', 1),
(2, '_zdecydowanie_4_TAK', '7b8ffa9edd8dab810fd31583df374ec325450f7c235bb5eecac227101f529695', 2),
(3, '_trudno_2_TAK', '21232f297a57a5a743894a0e4a801fc324bfcd40f282b69c2a47fa234facb61f', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `pytania_id` int(11) NOT NULL,
  `pytania_tresc` varchar(200) DEFAULT NULL,
  `ankiety_id` int(11) NOT NULL,
  `typpytania` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pytania`
--

INSERT INTO `pytania` (`pytania_id`, `pytania_tresc`, `ankiety_id`, `typpytania`) VALUES
(5, 'Podaj swoją płeć ', 1, 'radio'),
(6, 'Podaj swój wiek', 1, 'wiek'),
(7, 'Jak bardzo podoba Ci się ta aplikacja ', 1, 'skala'),
(8, 'Opisz w kilku zdaniach co powinniśmy zmienić w aplikacji', 1, 'textarea'),
(13, 'Czy miejsce szkolenia było dobrze przygotowane?', 2, 'radio'),
(15, 'Jak ogólnie oceniasz wrażenia z odbytego szkolenia?', 2, 'skala'),
(16, 'Czy miał(a) Pani/Pan dostęp do materiałów szkoleniowych w formie elektronicznej?', 2, 'radio');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytaniaodp`
--

CREATE TABLE `pytaniaodp` (
  `pytaniaodp_id` int(11) NOT NULL,
  `odp` varchar(45) DEFAULT NULL,
  `pytania_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pytaniaodp`
--

INSERT INTO `pytaniaodp` (`pytaniaodp_id`, `odp`, `pytania_id`) VALUES
(1, 'Tak', 12),
(2, 'Nie', 12),
(3, 'Mężczyzna', 5),
(4, 'Kobieta', 5),
(5, 'Wolę nie podawać ', 5),
(6, 'zdecydowanie tak', 13),
(7, 'raczej tak', 13),
(8, 'trudno powiedzieć', 13),
(9, 'raczej nie ', 13),
(10, 'zdecydowanie nie', 13),
(11, 'TAK', 16),
(12, 'NIE', 16);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `uzytkownicy_id` int(11) NOT NULL,
  `uzytkownicy_login` varchar(45) DEFAULT NULL,
  `uzytkownicy_haslo` varchar(45) DEFAULT NULL,
  `uzytkownicy_email` varchar(45) DEFAULT NULL,
  `uzytkownicy_imie` varchar(45) DEFAULT NULL,
  `uzytkownicy_nazwisko` varchar(45) DEFAULT NULL,
  `uzytkownicytypy_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`uzytkownicy_id`, `uzytkownicy_login`, `uzytkownicy_haslo`, `uzytkownicy_email`, `uzytkownicy_imie`, `uzytkownicy_nazwisko`, `uzytkownicytypy_id`) VALUES
(1, 'admin', '9283a03246ef2dacdc21a9b137817ec1', 'admin@admin.com', 'Admin', 'Admin', 2),
(2, 'Konrad', 'b3ef865347e5f052bd69e432641acae8', 'konrad@gmail.com', 'Konrad', 'Chmura', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy_typy`
--

CREATE TABLE `uzytkownicy_typy` (
  `uzytkownicytypy_id` int(11) NOT NULL,
  `uzytkownicytypy_nazwa` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy_typy`
--

INSERT INTO `uzytkownicy_typy` (`uzytkownicytypy_id`, `uzytkownicytypy_nazwa`) VALUES
(1, 'admin'),
(2, 'student');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ankiety`
--
ALTER TABLE `ankiety`
  ADD PRIMARY KEY (`ankiety_id`);

--
-- Indeksy dla tabeli `ankiety_wypelnione`
--
ALTER TABLE `ankiety_wypelnione`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  ADD PRIMARY KEY (`odpowiedzi_id`);

--
-- Indeksy dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`pytania_id`),
  ADD KEY `fk_pytania_ankiety1` (`ankiety_id`);

--
-- Indeksy dla tabeli `pytaniaodp`
--
ALTER TABLE `pytaniaodp`
  ADD PRIMARY KEY (`pytaniaodp_id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`uzytkownicy_id`),
  ADD KEY `uzytkownicytypy_id` (`uzytkownicytypy_id`);

--
-- Indeksy dla tabeli `uzytkownicy_typy`
--
ALTER TABLE `uzytkownicy_typy`
  ADD PRIMARY KEY (`uzytkownicytypy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `ankiety`
--
ALTER TABLE `ankiety`
  MODIFY `ankiety_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `ankiety_wypelnione`
--
ALTER TABLE `ankiety_wypelnione`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  MODIFY `odpowiedzi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `pytania_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `pytaniaodp`
--
ALTER TABLE `pytaniaodp`
  MODIFY `pytaniaodp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `uzytkownicy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD CONSTRAINT `fk_pytania_ankiety1` FOREIGN KEY (`ankiety_id`) REFERENCES `ankiety` (`ankiety_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD CONSTRAINT `uzytkownicy_ibfk_1` FOREIGN KEY (`uzytkownicytypy_id`) REFERENCES `uzytkownicy_typy` (`uzytkownicytypy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
