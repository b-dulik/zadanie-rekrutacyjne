-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Wrz 2020, 13:00
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `zadanie_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `header` varchar(130) NOT NULL,
  `text` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `articles`
--

INSERT INTO `articles` (`id`, `title`, `header`, `text`, `date_created`, `date_modified`) VALUES
(5, 'Kamil Wilczek z przytupem powrócił do ligi duńskiej! Dublet Polaka w pierwszym meczu w FC Kopenhaga', 'Transfer Kamila Wilczka do FC Kopenhaga wywołał w Danii prawdziwą burzę.', 'Kamil Wilczek z przytupem powrócił do ligi duńskiej! Dublet Polaka w pierwszym meczu w FC Kopenhaga fck.dk \r\n\r\nTransfer Kamila Wilczka do FC Kopenhaga wywołał w Danii prawdziwą burzę. Polak przez lata reprezentował bowiem barwy lokalnego rywala, Broendby. W debiucie w nowej drużynie napastnik udowodnił jednak, że była to dobra decyzja. Od razu ustrzelił dublet.\r\n\r\nKamil Wilczek występował w Broendby Kopenhaga w latach 2016-2020. Zimą przeniósł się do Turcji, lecz wytrzymał tam tylko pół roku. Później wrócił do Danii, gdzie niespodziewanie podpisał kontrakt z FC Kopenhaga.\r\n', '2020-09-11 13:59:25', '2020-09-14 10:49:37'),
(6, 'Diego Godin wybrał nowy klub. Polski stoper zyska rywala do walki o miejsce w składzie.', 'Media we Włoszech są przekonane, że Diego Godin zostanie wkrótce zawodnikiem Cagliari.', 'Media we Włoszech są przekonane, że Diego Godin zostanie wkrótce zawodnikiem Cagliari. Doświadczony obrońca ma podpisać z tym klubem trzyletni kontrakt. Z Urugwajczykiem o miejsce w jedenastce będzie więc rywalizował Sebastian Walukiewicz.\r\n\r\nChoć Diego Godin zaledwie rok temu trafił do Interu Mediolan z Atletico Madryt, to wszystko wskazuje na to, że bardzo szybko pożegna się z drużyną z San Siro. Nie zyskał bowiem uznania w oczach Antonio Conte.\r\n\r\nWłoski szkoleniowiec w kolejnych rozgrywkach woli stawiać na innych piłkarzy, a dla \"Nerazzurrich\" problemem jest wysoka pensja doświadczonego stopera. Z tego względu Inter chętnie oddałby go do innej drużyny.', '2020-09-11 14:58:50', '2020-09-14 09:51:18'),
(14, 'Nieudany debiut Radosława Majeckiego w AS Monaco. Polak popełnił błąd przy golu dla rywali', 'Polak nie najlepiej zachował się przy bramce dla rywali, przepuszczając do siatki piłkę, którą miał na rękach.', 'Radosław Majecki zadebiutował w AS Monaco w spotkaniu z Nantes. Polak nie najlepiej zachował się przy bramce dla rywali, przepuszczając do siatki piłkę, którą miał na rękach. Jego drużyna i tak wygrała jednak 2:1.\r\n\r\nNa początku lipca Radosław Majecki dołączył do AS Monaco - ekipa z księstwa już zimą wykupiła go z Legii Warszawa, a później wypożyczyła do stołecznego zespołu na rundę wiosenną. Sezonu w Polsce golkiper jednak nie dokończył. Jego nowy zespół wolał go mieć u siebie od początku przygotowań.\r\n\r\nDo tej pory numerem jeden w bramce AS Monaco był Benjamin Lecomte. Ostatnio zaraził się on jednak koronawirusem i nie trenował z resztą zespołu. To spowodowało, że Niko Kovac dał szansę naszemu bramkarzowi.\r\n \r\n', '2020-09-11 16:07:06', '2020-09-13 20:23:25'),
(15, 'FC Barcelona rozegrała pierwszy mecz pod wodzą Ronalda Koemana', 'Piłkarze FC Barcelony dopiero za dwa tygodnie rozegrają pierwsze oficjalne spotkanie w sezonie 2020/2021. ', 'Piłkarze FC Barcelony dopiero za dwa tygodnie rozegrają pierwsze oficjalne spotkanie w sezonie 2020/2021. Na razie \"Blaugrana\" sprawdza formę w sparingach. Mecz z Gimnastikiem Tarragona był jednocześnie debiutem Ronalda Koemana. Wicemistrzowie kraju pokonali trzecioligowca 3:1.\r\n\r\nMinione rozgrywki były dla FC Barcelony kompletnie nieudane. Po klęsce z Bayernem Monachium w Lidze Mistrzów stało się jasne, że drużyna potrzebuje gruntownej przebudowy. Odpowiada za nią Ronald Koeman, który dopiero po raz pierwszy poprowadził zespół z ławki rezerwowych.\r\n\r\n\"Blaugrana\" mierzyła się z trzecioligowym Gimnastikiem Tarragona. W kadrze na to spotkanie zabrakło między innymi Arturo Vidala i Luisa Suareza, którzy mają odejść z klubu. Od pierwszej minuty na murawie pojawili się za to między innymi Lionel Messi, Antoine Griezmann czy Ousmane Dembele.\r\n ', '2020-09-11 16:07:46', '2020-09-11 14:07:46'),
(17, 'Eksperci komentują gola Mateusza Klicha: ', 'Mateusz Klich rozegrał bardzo dobry mecz na Anfield Road, a występ zwieńczył piękną bramką przeciwko Liverpoolowi..', 'Mateusz Klich rozegrał bardzo dobry mecz na Anfield Road, a występ zwieńczył piękną bramką przeciwko Liverpoolowi. Na Twitterze nie mogło więc zabraknąć porównań do dyspozycji, jaką pomocnik pokazywał w spotkaniach reprezentacji Polski. Eksperci znów nie pozostawili suchej nitki na Jerzym Brzęczku..\r\n\r\nChociaż selekcjoner naszej kadry stosunkowo często stawia na Mateusza Klicha, to w kadrze zawodnik nie prezentował się do tej pory najlepiej. Zupełnie inaczej jest w spotkaniach Leeds United. Marcelo Bielsa niejednokrotnie właśnie od niego rozpoczynał ustalanie składu.\r\n\r\nPolak to jeden z tych zawodników, na których argentyński szkoleniowiec stawia zdecydowanie najczęściej. Nie było więc zaskoczeniem, że Klich znalazł się w wyjściowej jedenastce na mecz z Liverpoolem. Odwdzięczył się pięknym trafieniem.', '2020-09-11 16:09:57', '2020-09-14 09:51:25');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surname` varchar(256) NOT NULL,
  `mail` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `authors`
--

INSERT INTO `authors` (`id`, `name`, `surname`, `mail`) VALUES
(1, 'Adam', 'Kowalski', 'adam.k@zadanie.pl'),
(2, 'Damian', 'Kowalski', 'dawid.k@zadanie.pl'),
(3, 'Robert', 'Martin', 'robert.m@zadanie.pl'),
(4, 'Paulina', 'Kowalska', 'paulina.k@zadanie.pl'),
(5, 'Katarzyna', 'Kowalska', 'katarzyna.k@zadanie.pl'),
(6, 'Krystyna', 'Kowalska\r\n', 'krystyna.k@zadanie.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `credits`
--

CREATE TABLE `credits` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `credits`
--

INSERT INTO `credits` (`id`, `article_id`, `author_id`) VALUES
(7, 14, 1),
(8, 14, 3),
(9, 15, 2),
(22, 6, 3),
(23, 6, 5),
(24, 17, 2),
(25, 17, 4),
(29, 5, 1),
(30, 5, 2),
(31, 5, 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `credits`
--
ALTER TABLE `credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
