-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Ápr 03. 15:40
-- Kiszolgáló verziója: 10.1.31-MariaDB
-- PHP verzió: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `scores`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `csapatok`
--

CREATE TABLE `csapatok` (
  `ID` int(11) NOT NULL,
  `nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `bajnoksag` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `pont` int(11) NOT NULL,
  `helyezes` int(11) NOT NULL,
  `lottgol` int(11) NOT NULL,
  `kapottgol` int(11) NOT NULL,
  `gyozelem` int(11) NOT NULL,
  `dontetlen` int(11) NOT NULL,
  `vereseg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `csapatok`
--

INSERT INTO `csapatok` (`ID`, `nev`, `bajnoksag`, `pont`, `helyezes`, `lottgol`, `kapottgol`, `gyozelem`, `dontetlen`, `vereseg`) VALUES
(1, 'Liverpool', 'angol', 79, 1, 64, 17, 26, 1, 0),
(2, 'Manchester city', 'angol', 57, 2, 68, 29, 18, 3, 6),
(3, 'Chelsea', 'angol', 44, 4, 45, 37, 13, 5, 9),
(4, 'Leicester', 'angol', 50, 3, 54, 27, 15, 5, 3),
(5, 'Manchester United', 'angol', 41, 5, 41, 29, 11, 8, 8),
(6, 'Tottenham', 'angol', 40, 6, 44, 36, 11, 7, 9),
(7, 'Sheffield Utd', 'angol', 40, 7, 29, 25, 10, 10, 7),
(8, 'Wolves', 'angol', 39, 8, 38, 32, 9, 12, 6),
(9, 'Arsenal', 'angol', 37, 9, 39, 36, 8, 13, 6),
(10, 'Burnley', 'angol', 37, 10, 33, 39, 11, 4, 12),
(11, 'Everton', 'angol', 36, 11, 36, 41, 10, 6, 11),
(12, 'Southampton', 'angol', 34, 12, 34, 48, 10, 4, 13),
(14, 'Crystal Palace', 'angol', 33, 13, 24, 32, 8, 9, 10),
(15, 'Newcastle', 'angol', 31, 14, 24, 41, 8, 7, 12),
(16, 'Brighton', 'angol', 28, 15, 32, 39, 6, 10, 11),
(17, 'Bournemouth', 'angol', 26, 16, 26, 43, 7, 5, 15),
(18, 'Aston Villa', 'angol', 25, 17, 34, 52, 7, 4, 16),
(19, 'West Ham', 'angol', 24, 18, 32, 48, 6, 6, 15),
(20, 'Watford', 'angol', 24, 19, 24, 43, 5, 9, 13),
(21, 'Norwich', 'angol', 18, 20, 24, 51, 4, 6, 17),
(22, 'Barcelona', 'spanyol', 55, 1, 62, 29, 17, 4, 4),
(23, 'Real Madrid', 'spanyol', 53, 2, 46, 17, 15, 8, 2),
(24, 'Atletico Madrid', 'spanyol', 43, 3, 28, 18, 11, 10, 4),
(25, 'Sevilla', 'spanyol', 43, 4, 34, 25, 12, 7, 6),
(26, 'Getafe', 'spanyol', 42, 5, 36, 25, 12, 6, 7),
(27, 'Real Sociedad', 'spanyol', 40, 6, 42, 31, 12, 4, 8),
(28, 'Villarreal', 'spanyol', 38, 7, 43, 35, 11, 5, 9),
(29, 'Valencia', 'spanyol', 38, 8, 35, 37, 10, 8, 7),
(30, 'Granada', 'spanyol', 36, 9, 32, 31, 11, 3, 11),
(31, 'Levante', 'spanyol', 32, 10, 31, 36, 10, 2, 13),
(32, 'Athletic Bilbao', 'spanyol', 31, 11, 24, 22, 7, 10, 8),
(33, 'Osasuna', 'spanyol', 31, 12, 31, 35, 7, 10, 8),
(34, 'Betis', 'spanyol', 30, 13, 35, 40, 7, 9, 9),
(35, 'Alaves', 'spanyol', 30, 14, 27, 35, 8, 6, 11),
(36, 'Valladolid', 'spanyol', 29, 15, 22, 28, 6, 11, 8),
(37, 'Eibar', 'spanyol', 24, 16, 22, 34, 6, 9, 11),
(38, 'Celta Vigo', 'spanyol', 24, 17, 22, 34, 5, 9, 11),
(39, 'Mallorca', 'spanyol', 22, 18, 26, 42, 6, 4, 15),
(40, 'Leganes', 'spanyol', 19, 19, 18, 37, 4, 7, 14),
(41, 'Espanyol', 'spanyol', 19, 20, 22, 44, 4, 7, 14),
(42, 'Bayern Munchen', 'nemet', 49, 1, 65, 26, 15, 4, 4),
(43, 'RB Leipzig', 'nemet', 48, 2, 61, 25, 14, 6, 3),
(44, 'Borussia Dortmund', 'nemet', 45, 3, 65, 32, 13, 6, 4),
(45, 'Monchengladbach', 'nemet', 43, 4, 43, 25, 13, 4, 5),
(46, 'Leverkusen', 'nemet', 43, 5, 40, 29, 13, 4, 6),
(47, 'Schalke 04', 'nemet', 36, 6, 32, 32, 9, 9, 5),
(48, 'Wolfsburg', 'nemet', 34, 7, 32, 28, 9, 7, 7),
(49, 'Hoffenheim', 'nemet', 34, 8, 34, 36, 10, 4, 9),
(50, 'Freiburg', 'nemet', 33, 9, 31, 33, 9, 6, 8),
(51, 'Union Berlin', 'nemet', 29, 10, 29, 36, 9, 2, 12),
(52, 'Frankfurt', 'nemet', 28, 11, 38, 37, 8, 4, 11),
(53, 'Augsburg', 'nemet', 27, 12, 34, 47, 7, 6, 10),
(54, 'Koln', 'nemet', 26, 13, 33, 42, 8, 2, 12),
(55, 'Hertha BSC', 'nemet', 26, 14, 27, 43, 7, 5, 11),
(56, 'Mainz', 'nemet', 22, 15, 31, 52, 7, 1, 15),
(57, 'Dusseldorf', 'nemet', 20, 16, 23, 46, 5, 5, 13),
(58, 'Werder Bremen', 'nemet', 17, 17, 25, 53, 4, 5, 14),
(59, 'Paderborn', 'nemet', 16, 18, 29, 50, 4, 4, 15),
(60, 'Juventus', 'olasz', 60, 1, 48, 24, 19, 3, 3),
(61, 'Lazio', 'olasz', 59, 2, 58, 23, 18, 5, 2),
(62, 'Inter', 'olasz', 54, 3, 49, 22, 16, 6, 2),
(63, 'Atalanta', 'olasz', 45, 4, 63, 32, 13, 6, 5),
(64, 'AS Roma', 'olasz', 42, 5, 47, 32, 12, 6, 7),
(65, 'Napoli', 'olasz', 36, 6, 39, 35, 10, 6, 9),
(66, 'AC Milan', 'olasz', 36, 7, 27, 32, 10, 6, 9),
(67, 'Verona', 'olasz', 35, 8, 28, 24, 9, 8, 7),
(68, 'Parma', 'olasz', 35, 9, 32, 30, 10, 5, 9),
(69, 'Bologna', 'olasz', 34, 10, 38, 40, 9, 7, 9),
(70, 'Cagliari', 'olasz', 32, 11, 38, 36, 8, 8, 8),
(71, 'Sassuolo', 'olasz', 29, 12, 38, 39, 8, 5, 11),
(72, 'Fiorentina', 'olasz', 29, 13, 32, 36, 7, 8, 10),
(73, 'Torino', 'olasz', 27, 14, 27, 43, 8, 3, 13),
(74, 'Udinese', 'olasz', 27, 15, 21, 37, 7, 6, 12),
(75, 'Lecce', 'olasz', 25, 16, 32, 49, 6, 7, 12),
(76, 'Sampdoria', 'olasz', 23, 17, 26, 43, 6, 5, 13),
(77, 'Genoa', 'olasz', 22, 18, 29, 46, 5, 7, 13),
(78, 'Brescia', 'olasz', 16, 19, 22, 46, 4, 4, 17),
(79, 'Spal', 'olasz', 15, 20, 19, 44, 4, 3, 18),
(80, 'PSG', 'francia', 65, 1, 71, 24, 21, 2, 3),
(81, 'Marseille', 'francia', 52, 2, 36, 25, 15, 7, 4),
(82, 'Rennes', 'francia', 44, 3, 31, 24, 13, 5, 8),
(83, 'Lille', 'francia', 43, 4, 33, 27, 13, 4, 9),
(84, 'Monaco', 'francia', 39, 5, 42, 41, 11, 6, 9),
(85, 'Strasbourg', 'francia', 38, 6, 32, 29, 10, 7, 9),
(86, 'Lyon', 'francia', 37, 7, 40, 26, 10, 7, 9),
(87, 'Reims', 'francia', 37, 8, 24, 20, 9, 10, 7),
(88, 'Montpelier', 'francia', 37, 9, 32, 29, 10, 7, 9),
(89, 'Nice', 'francia', 37, 10, 38, 36, 10, 7, 9),
(90, 'Nantes', 'francia', 37, 11, 28, 28, 11, 4, 11),
(91, 'Bordeaux', 'francia', 35, 12, 38, 32, 9, 8, 9),
(92, 'Brest', 'francia', 34, 13, 34, 35, 8, 10, 8),
(93, 'Angers', 'francia', 33, 14, 25, 33, 9, 6, 11),
(94, 'St. Etienne', 'francia', 29, 15, 28, 42, 8, 5, 13),
(95, 'Metz', 'francia', 28, 16, 24, 34, 6, 10, 10),
(96, 'Dijon', 'francia', 27, 17, 25, 32, 6, 9, 11),
(97, 'Nimes', 'francia', 27, 18, 26, 39, 7, 6, 13),
(98, 'Amiens', 'francia', 22, 19, 29, 47, 4, 10, 12),
(99, 'Toulouse', 'francia', 13, 20, 21, 54, 3, 4, 19);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `csapatokkosar`
--

CREATE TABLE `csapatokkosar` (
  `ID` int(11) NOT NULL,
  `nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `helyezes` int(11) NOT NULL,
  `gyozelem` int(11) NOT NULL,
  `vereseg` int(11) NOT NULL,
  `dobottpont` int(11) NOT NULL,
  `kapottpont` int(11) NOT NULL,
  `gyozelmiarany` double NOT NULL,
  `bajnoksag` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `csapatokkosar`
--

INSERT INTO `csapatokkosar` (`ID`, `nev`, `helyezes`, `gyozelem`, `vereseg`, `dobottpont`, `kapottpont`, `gyozelmiarany`, `bajnoksag`) VALUES
(1, 'Los Angeles Lakers', 1, 45, 12, 6546, 6100, 0.789, 'nba1'),
(2, 'Denvert Nuggets', 2, 40, 18, 6418, 6194, 0.69, 'nba1'),
(3, 'Los Angeles Clippers', 3, 39, 19, 6705, 6368, 0.672, 'nba1'),
(4, 'Houston Rockets', 4, 38, 20, 6899, 6620, 0.655, 'nba1'),
(5, 'Oklahoma City Thunder', 5, 37, 22, 6564, 6376, 0.627, 'nba1'),
(6, 'Utah Jazz', 6, 36, 22, 6437, 6267, 0.621, 'nba1'),
(7, 'Dallas Mavericks', 7, 36, 23, 6881, 6518, 0.61, 'nba1'),
(8, 'Memphis Grizzlies', 8, 28, 30, 6541, 6690, 0.483, 'nba1'),
(9, 'Portland Trail Blazers', 9, 26, 34, 6779, 6911, 0.433, 'nba1'),
(10, 'New Orleans Pelicans', 10, 25, 33, 6719, 6786, 0.431, 'nba1'),
(11, 'San Antonio Spurs', 11, 24, 33, 6432, 6528, 0.421, 'nba1'),
(12, 'Sacramento Kings', 12, 24, 34, 6288, 6417, 0.414, 'nba1'),
(13, 'Phoenix Suns', 13, 24, 35, 6620, 6685, 0.407, 'nba1'),
(14, 'Minnesota Timberwolves', 14, 17, 40, 6442, 6665, 0.298, 'nba1'),
(15, 'Golden State Warriors', 15, 12, 47, 6233, 6789, 0.203, 'nba1'),
(16, 'Milwaukee Bucks', 1, 53, 9, 7383, 6616, 0.855, 'nba2'),
(17, 'Toronto Raptors', 2, 43, 18, 6891, 6500, 0.705, 'nba2'),
(18, 'Boston Celtics', 3, 42, 19, 6920, 6522, 0.689, 'nba2'),
(19, 'Miami Heat', 4, 40, 22, 6988, 6772, 0.645, 'nba2'),
(20, 'Indiana Pacers', 5, 37, 25, 6776, 6656, 0.597, 'nba2'),
(21, 'Philadelphia 76ers', 6, 37, 25, 6760, 6647, 0.597, 'nba2'),
(22, 'Brooklyn Nets', 7, 27, 34, 6736, 6801, 0.443, 'nba2'),
(23, 'Orlando Magic', 8, 27, 35, 6536, 6638, 0.435, 'nba2'),
(24, 'Washington Wizards', 9, 22, 39, 7070, 7331, 0.361, 'nba2'),
(25, 'Charlotte Hornets', 10, 21, 40, 6220, 6672, 0.344, 'nba2'),
(26, 'Chicago Bulls', 11, 21, 41, 6628, 6824, 0.339, 'nba2'),
(27, 'Detroit Pistons', 12, 20, 43, 6783, 6982, 0.317, 'nba2'),
(28, 'New York Knicks', 13, 19, 43, 6533, 6946, 0.306, 'nba2'),
(29, 'Atalanta Hawks', 14, 19, 44, 7001, 7512, 0.302, 'nba2'),
(30, 'Cleveland', 15, 17, 45, 6606, 7122, 0.274, 'nba2');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `ID` int(11) NOT NULL,
  `felhasznalonev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`ID`, `felhasznalonev`, `email`, `jelszo`, `admin`) VALUES
(2, 'user1', 'user@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `focielozok`
--

CREATE TABLE `focielozok` (
  `ID` int(11) NOT NULL,
  `hazai` int(11) NOT NULL,
  `vendeg` int(11) NOT NULL,
  `bajnoksag` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `eredmeny` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `mennyivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `focielozok`
--

INSERT INTO `focielozok` (`ID`, `hazai`, `vendeg`, `bajnoksag`, `eredmeny`, `mennyivel`) VALUES
(1, 1, 19, 'angol', '3:2', 1),
(2, 9, 11, 'angol', '3:2', 1),
(3, 5, 20, 'angol', '3:0', 1),
(4, 8, 21, 'angol', '3:0', 1),
(5, 4, 2, 'angol', '0:1', 1),
(6, 10, 17, 'angol', '3:0', 1),
(7, 14, 15, 'angol', '1:0', 1),
(8, 7, 16, 'angol', '1:1', 1),
(9, 12, 18, 'angol', '2:0', 1),
(10, 3, 6, 'angol', '2:1', 1),
(11, 2, 19, 'angol', '2:0', 2),
(12, 3, 5, 'angol', '0:2', 2),
(13, 9, 15, 'angol', '4:0', 2),
(14, 18, 6, 'angol', '2:3', 2),
(15, 21, 1, 'angol', '0:1', 2),
(16, 12, 10, 'angol', '1:2', 2),
(17, 8, 4, 'angol', '0:0', 2),
(18, 7, 17, 'angol', '2:1', 2),
(19, 16, 20, 'angol', '1:1', 2),
(20, 11, 14, 'angol', '3:1', 2),
(21, 6, 2, 'angol', '2:0', 3),
(22, 10, 9, 'angol', '0:0', 3),
(23, 5, 8, 'angol', '0:0', 3),
(24, 17, 18, 'angol', '2:1', 3),
(25, 14, 7, 'angol', '0:1', 3),
(26, 1, 12, 'angol', '4:0', 3),
(27, 15, 21, 'angol', '0:0', 3),
(28, 20, 11, 'angol', '2:3', 3),
(29, 19, 16, 'angol', '3:3', 3),
(30, 4, 3, 'angol', '2:2', 3),
(31, 24, 28, 'spanyol', '3:1', 1),
(32, 26, 25, 'spanyol', '0:3', 1),
(33, 36, 41, 'spanyol', '2:1', 1),
(34, 35, 32, 'spanyol', '2:1', 1),
(35, 33, 30, 'spanyol', '0:3', 1),
(36, 31, 23, 'spanyol', '1:0', 1),
(37, 27, 29, 'spanyol', '3:0', 1),
(38, 22, 37, 'spanyol', '5:0', 1),
(39, 38, 40, 'spanyol', '1:0', 1),
(40, 34, 39, 'spanyol', '3:3', 1),
(41, 23, 38, 'spanyol', '2:2', 2),
(42, 32, 33, 'spanyol', '0:1', 2),
(43, 40, 34, 'spanyol', '0:0', 2),
(44, 25, 41, 'spanyol', '2:2', 2),
(45, 30, 36, 'spanyol', '2:1', 2),
(46, 28, 31, 'spanyol', '2:1', 2),
(47, 22, 26, 'spanyol', '2:1', 2),
(48, 39, 35, 'spanyol', '1:0', 2),
(49, 29, 24, 'spanyol', '2:2', 2),
(50, 34, 22, 'spanyol', '2:3', 3),
(51, 38, 25, 'spanyol', '2:1', 3),
(52, 33, 23, 'spanyol', '1:4', 3),
(53, 27, 32, 'spanyol', '2:1', 3),
(54, 41, 39, 'spanyol', '1:0', 3),
(55, 24, 30, 'spanyol', '1:0', 3),
(56, 36, 28, 'spanyol', '1:1', 3),
(57, 26, 29, 'spanyol', '3:0', 3),
(58, 31, 40, 'spanyol', '2:0', 3),
(59, 35, 37, 'spanyol', '2:1', 3),
(60, 52, 51, 'nemet', '1:2', 1),
(61, 46, 53, 'nemet', '2:0', 1),
(62, 47, 43, 'nemet', '0:5', 1),
(63, 50, 57, 'nemet', '0:2', 1),
(64, 55, 54, 'nemet', '0:5', 1),
(65, 58, 44, 'nemet', '0:2', 1),
(66, 42, 59, 'nemet', '3:2', 1),
(67, 48, 56, 'nemet', '4:0', 1),
(68, 56, 47, 'nemet', '0:0', 2),
(69, 54, 42, 'nemet', '1:4', 2),
(70, 57, 45, 'nemet', '1:4', 2),
(71, 53, 50, 'nemet', '1:1', 2),
(72, 49, 48, 'nemet', '2:3', 2),
(73, 59, 55, 'nemet', '1:2', 2),
(74, 43, 58, 'nemet', '3:0', 2),
(75, 44, 52, 'nemet', '4:0', 2),
(76, 51, 46, 'nemet', '2:3', 2),
(77, 42, 43, 'nemet', '0:0', 3),
(78, 46, 44, 'nemet', '4:3', 3),
(79, 50, 49, 'nemet', '1:0', 3),
(80, 47, 59, 'nemet', '1:1', 3),
(81, 58, 51, 'nemet', '0:2', 3),
(82, 48, 57, 'nemet', '1:1', 3),
(83, 52, 53, 'nemet', '5:0', 3),
(84, 55, 56, 'nemet', '1:3', 3),
(85, 66, 73, 'olasz', '1:0', 1),
(86, 61, 62, 'olasz', '2:1', 1),
(87, 60, 78, 'olasz', '2:0', 1),
(88, 76, 72, 'olasz', '1:5', 1),
(89, 71, 68, 'olasz', '0:1', 1),
(90, 74, 67, 'olasz', '0:0', 1),
(91, 63, 64, 'olasz', '2:1', 1),
(92, 69, 77, 'olasz', '0:3', 1),
(93, 75, 79, 'olasz', '2:1', 1),
(94, 70, 65, 'olasz', '0:1', 1),
(95, 62, 66, 'olasz', '4:2', 2),
(96, 68, 61, 'olasz', '0:1', 2),
(97, 78, 74, 'olasz', '1:1', 2),
(98, 77, 70, 'olasz', '1:0', 2),
(99, 65, 75, 'olasz', '2:3', 2),
(100, 79, 71, 'olasz', '1:2', 2),
(101, 67, 60, 'olasz', '2:1', 2),
(102, 73, 76, 'olasz', '1:3', 2),
(103, 72, 63, 'olasz', '1:2', 2),
(104, 64, 69, 'olasz', '2:3', 2),
(105, 76, 65, 'olasz', '2:4', 3),
(106, 74, 62, 'olasz', '0:2', 3),
(107, 75, 73, 'olasz', '4:0', 3),
(108, 66, 67, 'olasz', '1:1', 3),
(109, 63, 77, 'olasz', '2:2', 3),
(110, 61, 79, 'olasz', '5:1', 3),
(111, 60, 72, 'olasz', '3:0', 3),
(112, 71, 64, 'olasz', '4:2', 3),
(113, 70, 68, 'olasz', '2:2', 3),
(114, 69, 78, 'olasz', '2:1', 3),
(115, 80, 91, 'francia', '4:3', 1),
(116, 82, 97, 'francia', '2:1', 1),
(117, 94, 87, 'francia', '1:1', 1),
(118, 93, 88, 'francia', '1:0', 1),
(119, 96, 84, 'francia', '1:1', 1),
(120, 83, 99, 'francia', '3:0', 1),
(121, 85, 98, 'francia', '0:0', 1),
(122, 95, 86, 'francia', '0:2', 1),
(123, 81, 90, 'francia', '1:3', 1),
(124, 89, 92, 'francia', '2:2', 1),
(125, 83, 81, 'francia', '1:2', 2),
(126, 92, 94, 'francia', '3:2', 2),
(127, 87, 82, 'francia', '1:0', 2),
(128, 86, 85, 'francia', '1:1', 2),
(129, 91, 96, 'francia', '2:2', 2),
(130, 90, 95, 'francia', '0:0', 2),
(131, 97, 93, 'francia', '1:0', 2),
(132, 99, 89, 'francia', '0:2', 2),
(133, 98, 80, 'francia', '4:4', 2),
(134, 84, 88, 'francia', '1:0', 2),
(135, 80, 86, 'francia', '4:2', 3),
(136, 85, 87, 'francia', '3:0', 3),
(137, 88, 94, 'francia', '1:0', 3),
(138, 98, 84, 'francia', '1:2', 3),
(139, 96, 90, 'francia', '3:3', 3),
(140, 95, 91, 'francia', '1:2', 3),
(141, 89, 97, 'francia', '1:3', 3),
(142, 82, 92, 'francia', '0:0', 3),
(143, 81, 99, 'francia', '1:0', 3),
(144, 98, 83, 'francia', '0:2', 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kosarelozok`
--

CREATE TABLE `kosarelozok` (
  `ID` int(11) NOT NULL,
  `hazai` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `vendeg` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `bajnoksag` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `eredmeny` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `mennyivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `csapatok`
--
ALTER TABLE `csapatok`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `csapatokkosar`
--
ALTER TABLE `csapatokkosar`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `focielozok`
--
ALTER TABLE `focielozok`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `kosarelozok`
--
ALTER TABLE `kosarelozok`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `csapatokkosar`
--
ALTER TABLE `csapatokkosar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `focielozok`
--
ALTER TABLE `focielozok`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT a táblához `kosarelozok`
--
ALTER TABLE `kosarelozok`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
