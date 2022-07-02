-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 29. 00:11
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `felhasznalok`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `ID` int(120) NOT NULL,
  `felhasznalonev` varchar(120) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `jelszo` varchar(120) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`ID`, `felhasznalonev`, `jelszo`, `email`) VALUES
(1, 'asd', 'asd', ''),
(4, 'Bendegúz', 'traktor', ''),
(9, 'NyalTamás', 'nyúltamás', 'apexaddict@gmail.com'),
(11, 'laca', 'paca', 'kaca'),
(12, 'Lacaa', 'pacaa', 'kacaa');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kepek`
--

CREATE TABLE `kepek` (
  `imgID` int(120) NOT NULL,
  `felhID` int(120) NOT NULL,
  `ImageNev` varchar(120) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `kepek`
--

INSERT INTO `kepek` (`imgID`, `felhID`, `ImageNev`) VALUES
(12, 9, 'OI_CYKA.jpg'),
(13, 1, '1000_F_251950642_Y1PIMmPS9JSHCpnavbhfn55EIJc0XBQw.jpg'),
(14, 1, 'earth-view-night-from-alien-planet-neon-space_33099-1876.jpg'),
(15, 9, '2474216.jpg'),
(16, 9, '5438849.jpg'),
(17, 9, '5509862.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `private`
--

CREATE TABLE `private` (
  `ID` int(120) NOT NULL,
  `felhID` int(120) NOT NULL,
  `imageNev` varchar(120) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `private`
--

INSERT INTO `private` (`ID`, `felhID`, `imageNev`) VALUES
(2, 4, 'unknown.png'),
(4, 9, '1000_F_251950642_Y1PIMmPS9JSHCpnavbhfn55EIJc0XBQw.jpg');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `kepek`
--
ALTER TABLE `kepek`
  ADD PRIMARY KEY (`imgID`),
  ADD KEY `test` (`felhID`);

--
-- A tábla indexei `private`
--
ALTER TABLE `private`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `test2` (`felhID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `kepek`
--
ALTER TABLE `kepek`
  MODIFY `imgID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT a táblához `private`
--
ALTER TABLE `private`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `kepek`
--
ALTER TABLE `kepek`
  ADD CONSTRAINT `test` FOREIGN KEY (`felhID`) REFERENCES `felhasznalok` (`ID`);

--
-- Megkötések a táblához `private`
--
ALTER TABLE `private`
  ADD CONSTRAINT `test2` FOREIGN KEY (`felhID`) REFERENCES `felhasznalok` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
