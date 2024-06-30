-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 30, 2024 at 07:20 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`, `opis`) VALUES
(1, 'Lager', 'W typologii piwnej lager oznacza każde piwo dolnej fermentacji, w przeciwieństwie do piw górnej fermentacji, czyli ale. W tym znaczeniu lager jest określeniem całej grupy piw, którą cechuje użycie drożdży dolnej fermentacji oraz niskiej temperatury leżakowania.'),
(2, 'ale', 'ALE to szeroka kategoria piw warzonych z użyciem drożdży górnej fermentacji. Charakteryzują się one zwykle wyższą zawartością alkoholu i bogatszym spektrum smakowym niż lagery. W tej kategorii znajdują się m.in. IPA (India Pale Ale), słynące z intensywnego chmielowego aromatu i goryczki, oraz stouty i portery, które oferują głębokie, często karmelowe lub kawowe nuty.'),
(4, 'Stout', 'Stout, zwłaszcza jego odmiana Irish Stout, to ikoniczny styl ciemnego piwa, który słynie z głębokiej, niemal czarnej barwy i bogatego smaku. Stouty często mają wyczuwalne nuty palonej kawy, gorzkiej czekolady i palonych słodów. Tekstura tych piw może wahać się od gładkiej i kremowej do bardziej wytrawnej i gęstej. Są one wyjątkowo satysfakcjonujące, szczególnie w chłodniejsze dni.'),
(5, 'porter', 'Porter to ciemne piwo o angielskich korzeniach, które charakteryzuje się bogatym, często lekko palonym smakiem. Jego kolor waha się od ciemnobrązowego do czarnego, a w profilu smakowym dominują nuty kawy, czekolady i karmelu. Porter jest zazwyczaj średnio pełny w teksturze, oferując zarówno głębię smaku, jak i łatwość picia. Jest to styl, który cieszy się popularnością wśród miłośników ciemnych piw.'),
(6, 'jasne', 'dunno');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `piwo`
--

CREATE TABLE `piwo` (
  `id` int(10) UNSIGNED NOT NULL,
  `idKategorii` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `obrazek` varchar(50) NOT NULL,
  `opis` text NOT NULL,
  `pojemnosc` int(11) NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `piwo`
--

INSERT INTO `piwo` (`id`, `idKategorii`, `login`, `nazwa`, `obrazek`, `opis`, `pojemnosc`, `cena`) VALUES
(17, 2, 'Mateusz', 'Książęce Cherry Ale', 'cherryale-1.png', 'Książęce Cherry Ale łączy w sobie wyspiarską kulturę warzenia piw typu ALE oraz belgijską tradycję dodawania do piw wiśni.', 500, 0),
(18, 5, 'Mateusz', 'Książęce Porter Bałtycki', 'porter.png', 'Książęce Porter Bałtycki jest inspirowane stylem piwnym, który rozpowszechnił się w XIX w. w Rosji i krajach nadbałtyckich.', 500, 0),
(19, 4, 'Mateusz', 'Książęce Ciemne Łagodne', 'ciemne.png', 'Książęce Ciemne Łagodne to piwo o przyjemnie zbalansowanym smaku.', 500, 0),
(20, 1, 'Mateusz', 'Ksiażęce Pszennicze', 'pszeniczne (1).png', 'Książęce Złote Pszeniczne to przedstawiciel rzadkiego stylu znanego jako lager pszeniczny.', 500, 0),
(21, 2, 'Mateusz', 'Książęce IPA', 'beer.png', 'Książęce India Pale Ale to amerykańska wersja angielskiego piwa górnej fermentacji.', 500, 0),
(22, 6, 'bombik', 'Perła Chmielowa', 'Perla_chmielowa_05_474x1024px.jpg', 'Sztandarowy produkt Browarów Lubelskich. Dzięki wykorzystaniu najlepszego lubelskiego chmielu i oryginalnej receptury, Perła Chmielowa cieszy się uznaniem smakoszy w kraju i za granicą.', 500, 0),
(23, 1, 'bombik', 'Perła Export', 'Perla_export_05_474x1024px.jpg', 'Piwo o subtelnym aromacie chmielu, po które szczególnie chętnie sięgają młodzi konsumenci.\r\nWyjątkowy lekki lager, który doskonale gasi pragnienie.', 500, 0),
(24, 6, 'bombik', 'Perła Miodowa', 'Perla_miodowa_05_474x1024px.jpg', 'Miodowa odsłona klasycznej Perły Chmielowej.', 500, 0),
(25, 6, 'bombik', 'Perła Mocna', 'Perla_mocna_05_474x1024px.jpg', 'Idealna dla miłośników piwa o wyższej ilości alkoholu.', 500, 0),
(26, 5, 'bombik', 'Perła Porter Bałtycki', 'Perla_porter_05_474x1024px.jpg', 'Swoim bogatym bukietem aromatów zaskoczy niejednego konesera piwa.', 500, 0),
(27, 1, 'piwolech', 'Budweiser Budvar Original', 'BudvarOriginal-800x800.jpg', 'Dla przedsiębiorców i filantropów', 500, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `poziom`
--

CREATE TABLE `poziom` (
  `id` int(10) UNSIGNED NOT NULL,
  `rola` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `poziom`
--

INSERT INTO `poziom` (`id`, `rola`) VALUES
(1, 'mlodszy piwosz'),
(2, 'starszy piwosz'),
(3, 'fanatyk piwa'),
(4, 'znawca piwa'),
(5, 'swiatly piwosz');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recenzje`
--

CREATE TABLE `recenzje` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPiwa` int(10) UNSIGNED NOT NULL,
  `nick` varchar(50) NOT NULL,
  `tresc` text NOT NULL,
  `ocena` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `recenzje`
--

INSERT INTO `recenzje` (`id`, `idPiwa`, `nick`, `tresc`, `ocena`, `data`) VALUES
(24, 17, 'Mateusz', 'Super piwko', 5, '2024-06-17 18:06:15'),
(25, 18, 'Mateusz', 'Takie o, nie w moim guscie', 3, '2024-06-17 18:06:41'),
(26, 20, 'Mateusz', 'W beczce jest najlepsze', 5, '2024-06-17 18:07:01'),
(27, 21, 'Mateusz', 'Bardzo amerykanskie, polecam', 5, '2024-06-17 18:07:21'),
(28, 17, 'bombik', 'spoko', 4, '2024-06-18 08:02:34'),
(29, 18, 'bombik', 'gozkie', 2, '2024-06-18 08:02:53'),
(30, 19, 'bombik', 'mid', 3, '2024-06-18 08:03:15'),
(31, 20, 'bombik', 'giaat', 5, '2024-06-18 08:03:31'),
(32, 21, 'bombik', 'ipa lipa', 1, '2024-06-18 08:03:47'),
(33, 22, 'Mateusz', 'nie jestem fanem chmielu', 1, '2024-06-18 09:55:53'),
(34, 27, 'piwolech', 'Najlepsze serio', 5, '2024-06-18 16:27:59'),
(35, 17, 'nazwa_uzytkownika', 'super piwko', 5, '2024-06-30 17:01:34');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ulubione`
--

CREATE TABLE `ulubione` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPiwa` int(10) UNSIGNED NOT NULL,
  `idUzytkownika` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `ulubione`
--

INSERT INTO `ulubione` (`id`, `idPiwa`, `idUzytkownika`) VALUES
(19, 17, 12),
(20, 20, 18),
(24, 17, 18),
(25, 23, 18),
(28, 22, 12),
(30, 27, 19),
(32, 23, 19),
(33, 17, 20);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idPoziomu` int(10) UNSIGNED NOT NULL,
  `liczbaRecenzji` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `email`, `idPoziomu`, `liczbaRecenzji`) VALUES
(12, 'Mateusz', 'c4ca4238a0b923820dcc509a6f75849b', 'mateusz@o2.pl', 5, 11),
(13, 'Kryhula', 'c4ca4238a0b923820dcc509a6f75849b', '1', 1, 0),
(14, 'Mateusz1', 'c4ca4238a0b923820dcc509a6f75849b', '1', 1, 0),
(15, '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', 1, 0),
(16, 'Maciek', 'c4ca4238a0b923820dcc509a6f75849b', '1', 1, 0),
(17, 'Olga', 'c4ca4238a0b923820dcc509a6f75849b', '1', 3, 10),
(18, 'bombik', '62c8ad0a15d9d1ca38d5dee762a16e01', 'mateusz@o2.pl', 2, 5),
(19, 'piwolech', '0db1d58ebf97b0fda00d17d3f683b2aa', 'mood.biznes@gmail.com', 1, 1),
(20, 'nazwa_uzytkownika', '202cb962ac59075b964b07152d234b70', '1', 1, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `piwo`
--
ALTER TABLE `piwo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idKategorii` (`idKategorii`);

--
-- Indeksy dla tabeli `poziom`
--
ALTER TABLE `poziom`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPiwa` (`idPiwa`);

--
-- Indeksy dla tabeli `ulubione`
--
ALTER TABLE `ulubione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPiwa` (`idPiwa`),
  ADD KEY `idUzytkownika` (`idUzytkownika`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPoziomu` (`idPoziomu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `piwo`
--
ALTER TABLE `piwo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `poziom`
--
ALTER TABLE `poziom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recenzje`
--
ALTER TABLE `recenzje`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ulubione`
--
ALTER TABLE `ulubione`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `piwo`
--
ALTER TABLE `piwo`
  ADD CONSTRAINT `piwo_ibfk_1` FOREIGN KEY (`idKategorii`) REFERENCES `kategorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recenzje`
--
ALTER TABLE `recenzje`
  ADD CONSTRAINT `recenzje_ibfk_1` FOREIGN KEY (`idPiwa`) REFERENCES `piwo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulubione`
--
ALTER TABLE `ulubione`
  ADD CONSTRAINT `ulubione_ibfk_1` FOREIGN KEY (`idPiwa`) REFERENCES `piwo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulubione_ibfk_2` FOREIGN KEY (`idUzytkownika`) REFERENCES `uzytkownicy` (`id`);

--
-- Constraints for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD CONSTRAINT `uzytkownicy_ibfk_1` FOREIGN KEY (`idPoziomu`) REFERENCES `poziom` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
