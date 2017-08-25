-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2017. Aug 24. 13:47
-- Kiszolgáló verziója: 5.7.15-log
-- PHP verzió: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `ceg`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ceg_adatok`
--

CREATE TABLE `ceg_adatok` (
  `ceg_id` int(11) NOT NULL,
  `ceg_nev` varchar(200) NOT NULL,
  `ceg_profil` varchar(200) NOT NULL,
  `ceg_regisztracio` datetime NOT NULL,
  `statusz` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `ceg_adatok`
--

INSERT INTO `ceg_adatok` (`ceg_id`, `ceg_nev`, `ceg_profil`, `ceg_regisztracio`, `statusz`) VALUES
(1, 'Proba', 'autó', '2017-08-23 15:56:46', 'A'),
(2, 'Valami', 'autó', '2017-08-23 16:03:41', 'A'),
(3, 'Teszt', 'gumi', '2017-08-24 10:37:00', 'I'),
(4, 'Teszt Cég', 'fényezés', '2017-08-24 10:38:56', 'I'),
(5, 'Teszt sok', 'valami', '2017-08-24 11:50:48', 'D'),
(6, 'Görgő Kft.', 'Kereskedő', '2017-08-24 15:41:10', 'A');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ugyvezeto_adatok`
--

CREATE TABLE `ugyvezeto_adatok` (
  `ugyvezeto_id` int(11) NOT NULL,
  `ceg_id` int(11) NOT NULL,
  `ugyvezeto_email` varchar(250) NOT NULL,
  `statusz` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `ugyvezeto_adatok`
--

INSERT INTO `ugyvezeto_adatok` (`ugyvezeto_id`, `ceg_id`, `ugyvezeto_email`, `statusz`) VALUES
(1, 2, 'valaki@stb.hu', 'A'),
(2, 3, 'teszt@gmail.com', 'A'),
(3, 4, 'teszt.ceg@gmail.com', 'A'),
(4, 3, 'blabla@gmail.com', 'I'),
(5, 5, 'stb@stb.com', 'A'),
(6, 4, 'uj@gmail.com', 'I'),
(7, 4, 'uj2@gmail.com', 'I'),
(8, 4, 'uj3@gmail.com', 'I'),
(9, 6, 'gergelygyuris@gmail.com', 'I'),
(10, 6, 'gergely.gyuris@gmail.com', 'A');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `ceg_adatok`
--
ALTER TABLE `ceg_adatok`
  ADD PRIMARY KEY (`ceg_id`);

--
-- A tábla indexei `ugyvezeto_adatok`
--
ALTER TABLE `ugyvezeto_adatok`
  ADD PRIMARY KEY (`ugyvezeto_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `ceg_adatok`
--
ALTER TABLE `ceg_adatok`
  MODIFY `ceg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT a táblához `ugyvezeto_adatok`
--
ALTER TABLE `ugyvezeto_adatok`
  MODIFY `ugyvezeto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
