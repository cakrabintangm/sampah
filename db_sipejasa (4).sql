-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2021 pada 13.41
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipejasa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `angkutan`
--

CREATE TABLE `angkutan` (
  `id_ang` int(11) NOT NULL,
  `jns_ang` varchar(15) NOT NULL,
  `muatan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `angkutan`
--

INSERT INTO `angkutan` (`id_ang`, `jns_ang`, `muatan`) VALUES
(1, 'Dump Truk', 7),
(2, 'Pick Up', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `antik`
--

CREATE TABLE `antik` (
  `id_antik` int(11) NOT NULL,
  `titik_1` int(11) NOT NULL,
  `titik_1_long` varchar(20) NOT NULL,
  `titik_1_lat` varchar(20) NOT NULL,
  `titik_2` int(11) NOT NULL,
  `titik_2_long` varchar(20) NOT NULL,
  `titik_2_lat` varchar(20) NOT NULL,
  `jarak` int(11) NOT NULL,
  `jarak_bellmanford` int(11) NOT NULL,
  `muatan` double(22,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `antik`
--

INSERT INTO `antik` (`id_antik`, `titik_1`, `titik_1_long`, `titik_1_lat`, `titik_2`, `titik_2_long`, `titik_2_lat`, `jarak`, `jarak_bellmanford`, `muatan`) VALUES
(1082, 34, '102.26873137324256', '-3.766242079417555', 28, '102.26547823962524', '-3.783902985627169', 2713, 2713, 4.08),
(1083, 34, '102.26873137324256', '-3.766242079417555', 59, '102.2614241552942', '-3.7554712508436183', 1586, 1586, 2.53),
(1084, 60, '102.26410685662347', '-3.766808288697097', 34, '102.26873137324256', '-3.766242079417555', 606, 606, 0.08),
(1085, 60, '102.26410685662347', '-3.766808288697097', 59, '102.2614241552942', '-3.7554712508436183', 1319, 1319, 0.43),
(1086, 28, '102.26547823962524', '-3.783902985627169', 29, '102.26889235717083', '-3.786998343279817', 524, 524, 0.83),
(1087, 27, '102.26461183768292', '-3.78843281135959', 28, '102.26547823962524', '-3.783902985627169', 1059, 1059, 1.69),
(1088, 22, '102.2623166479453', '-3.7918478166662104', 27, '102.26461183768292', '-3.78843281135959', 470, 470, 0.75),
(1089, 29, '102.26889235717083', '-3.786998343279817', 18, '102.27003335952759', '-3.7936237700554103', 872, 872, 1.30),
(1090, 18, '102.27003335952759', '-3.7936237700554103', 19, '102.2739771267676', '-3.794890605944854', 492, 492, 0.62),
(1091, 19, '102.2739771267676', '-3.794890605944854', 20, '102.27233027746851', '-3.800357625892862', 632, 632, 1.01),
(1092, 18, '102.27003335952759', '-3.7936237700554103', 21, '102.26598858833313', '-3.7973492159695166', 620, 620, 0.90),
(1093, 19, '102.2739771267676', '-3.794890605944854', 11, '102.29418011896742', '-3.811624384205409', 3351, 3351, 5.02),
(1094, 12, '102.28810514965231', '-3.813480726612003', 11, '102.29418011896742', '-3.811624384205409', 747, 747, 1.10),
(1095, 12, '102.28810514965231', '-3.813480726612003', 26, '102.28732105121941', '-3.820205755026457', 770, 770, 0.82),
(1096, 26, '102.28732105121941', '-3.820205755026457', 40, '102.29129421858588', '-3.8221333102213704', 505, 505, 0.54),
(1097, 21, '102.26598858833313', '-3.7973492159695166', 43, '102.26425698379009', '-3.802346381341007', 577, 577, 0.84),
(1098, 21, '102.26598858833313', '-3.7973492159695166', 44, '102.25741584598896', '-3.799562722981392', 1034, 1034, 1.03),
(1099, 44, '102.25741584598896', '-3.799562722981392', 43, '102.26425698379009', '-3.802346381341007', 892, 892, 1.13),
(1100, 43, '102.26425698379009', '-3.802346381341007', 24, '102.27027587218974', '-3.8121473323482022', 1355, 1355, 2.03),
(1101, 24, '102.27027587218974', '-3.8121473323482022', 25, '102.27316681417878', '-3.809834989648148', 424, 424, 0.60),
(1102, 25, '102.27316681417878', '-3.809834989648148', 20, '102.27233027746851', '-3.800357625892862', 1741, 1741, 2.42),
(1103, 25, '102.27316681417878', '-3.809834989648148', 26, '102.28732105121941', '-3.820205755026457', 2112, 2112, 3.03),
(1104, 15, '102.35313892364502', '-3.881809722339886', 16, '102.34575511973212', '-3.83089503880089', 7093, 7093, 0.86),
(1105, 16, '102.34575511973212', '-3.83089503880089', 4, '102.32264971906677', '-3.8373666782332054', 4087, 4087, 2.42),
(1106, 4, '102.32264971906677', '-3.8373666782332054', 3, '102.3194932937622', '-3.84348774014389', 1688, 1688, 2.04),
(1107, 3, '102.3194932937622', '-3.84348774014389', 36, '102.31680045237385', '-3.8480885202122734', 610, 610, 0.82),
(1108, 36, '102.31680045237385', '-3.8480885202122734', 35, '102.3135101751901', '-3.8730860088105583', 2946, 2946, 2.79),
(1109, 38, '102.2985346962927', '-3.8372360641429735', 35, '102.3135101751901', '-3.8730860088105583', 4639, 4639, 0.53),
(1110, 38, '102.2985346962927', '-3.8372360641429735', 37, '102.3004013921227', '-3.8326014691459704', 600, 600, 0.90),
(1111, 37, '102.3004013921227', '-3.8326014691459704', 48, '102.30289780758045', '-3.8265121709060783', 791, 791, 1.11),
(1112, 36, '102.31680045237385', '-3.8480885202122734', 7, '102.30715158675999', '-3.840196769495743', 1561, 1561, 1.84),
(1113, 7, '102.30715158675999', '-3.840196769495743', 37, '102.3004013921227', '-3.8326014691459704', 1205, 1205, 1.22),
(1114, 7, '102.30715158675999', '-3.840196769495743', 6, '102.3107094938138', '-3.8368688730780964', 1382, 1382, 0.60),
(1115, 6, '102.3107094938138', '-3.8368688730780964', 5, '102.31521854670515', '-3.831409661667027', 1654, 1654, 1.12),
(1116, 4, '102.32264971906677', '-3.8373666782332054', 5, '102.31521854670515', '-3.831409661667027', 1092, 1092, 0.90),
(1117, 5, '102.31521854670515', '-3.831409661667027', 49, '102.30741876191955', '-3.82175947256511', 2111, 2111, 1.92),
(1118, 48, '102.30289780758045', '-3.8265121709060783', 49, '102.30741876191955', '-3.82175947256511', 745, 745, 0.89),
(1119, 37, '102.3004013921227', '-3.8326014691459704', 40, '102.29129421858588', '-3.8221333102213704', 1591, 1591, 1.40),
(1120, 38, '102.2985346962927', '-3.8372360641429735', 39, '102.28700141056613', '-3.829760061153183', 1578, 1578, 1.86),
(1121, 39, '102.28700141056613', '-3.829760061153183', 41, '102.26975570320997', '-3.8143855421598474', 3001, 3001, 0.83),
(1122, 41, '102.26975570320997', '-3.8143855421598474', 24, '102.27027587218974', '-3.8121473323482022', 466, 466, 0.20),
(1123, 39, '102.28700141056613', '-3.829760061153183', 40, '102.29129421858588', '-3.8221333102213704', 1049, 1049, 1.61),
(1124, 41, '102.26975570320997', '-3.8143855421598474', 45, '102.25694990535376', '-3.801502265215199', 2030, 2030, 1.88),
(1125, 44, '102.25741584598896', '-3.799562722981392', 55, '102.25611994451403', '-3.7980524281726833', 232, 232, 0.30),
(1126, 55, '102.25611994451403', '-3.7980524281726833', 30, '102.25584467865384', '-3.792083540569616', 810, 810, 0.86),
(1127, 30, '102.25584467865384', '-3.792083540569616', 22, '102.2623166479453', '-3.7918478166662104', 752, 752, 0.87),
(1128, 21, '102.26598858833313', '-3.7973492159695166', 22, '102.2623166479453', '-3.7918478166662104', 1257, 1257, 1.42),
(1129, 30, '102.25584467865384', '-3.792083540569616', 31, '102.25381975479793', '-3.7905043901790507', 312, 312, 0.33),
(1130, 20, '102.27233027746851', '-3.800357625892862', 12, '102.28810514965231', '-3.813480726612003', 2399, 2399, 3.02),
(1131, 20, '102.27233027746851', '-3.800357625892862', 21, '102.26598858833313', '-3.7973492159695166', 803, 803, 1.20),
(1132, 12, '102.28810514965231', '-3.813480726612003', 48, '102.30289780758045', '-3.8265121709060783', 3466, 3466, 2.96),
(1133, 48, '102.30289780758045', '-3.8265121709060783', 6, '102.3107094938138', '-3.8368688730780964', 1490, 1490, 2.12),
(1134, 6, '102.3107094938138', '-3.8368688730780964', 3, '102.3194932937622', '-3.84348774014389', 2661, 2661, 2.46),
(1135, 3, '102.3194932937622', '-3.84348774014389', 15, '102.35313892364502', '-3.881809722339886', 6476, 6476, 3.46),
(1136, 45, '102.25694990535376', '-3.801502265215199', 61, '102.2487504490273', '-3.794871922436076', 1224, 1224, 0.46),
(1137, 33, '102.25085915232872', '-3.7864833363501385', 61, '102.2487504490273', '-3.794871922436076', 1334, 1334, 0.94),
(1138, 32, '102.25074326599567', '-3.7872752951219457', 45, '102.25694990535376', '-3.801502265215199', 1911, 1911, 1.48),
(1139, 33, '102.25085915232872', '-3.7864833363501385', 32, '102.25074326599567', '-3.7872752951219457', 81, 81, 0.03),
(1140, 55, '102.25611994451403', '-3.7980524281726833', 56, '102.25201398982466', '-3.794210957248145', 646, 646, 0.86),
(1141, 56, '102.25201398982466', '-3.794210957248145', 62, '102.25092623163901', '-3.789083699803458', 710, 710, 0.88),
(1142, 62, '102.25092623163901', '-3.789083699803458', 32, '102.25074326599567', '-3.7872752951219457', 210, 210, 0.22),
(1143, 62, '102.25092623163901', '-3.789083699803458', 31, '102.25381975479793', '-3.7905043901790507', 382, 382, 0.46),
(1144, 33, '102.25085915232872', '-3.7864833363501385', 63, '102.26111494750006', '-3.782847738848976', 1366, 1366, 0.94),
(1145, 31, '102.25381975479793', '-3.7905043901790507', 58, '102.25783786627176', '-3.785557123523821', 957, 957, 0.88),
(1146, 63, '102.26111494750006', '-3.782847738848976', 58, '102.25783786627176', '-3.785557123523821', 520, 520, 0.73),
(1147, 28, '102.26547823962524', '-3.783902985627169', 63, '102.26111494750006', '-3.782847738848976', 562, 562, 0.73),
(1148, 63, '102.26111494750006', '-3.782847738848976', 60, '102.26410685662347', '-3.766808288697097', 1999, 1999, 0.82),
(1149, 11, '102.29418011896742', '-3.811624384205409', 49, '102.30741876191955', '-3.82175947256511', 2042, 2042, 2.47),
(1150, 11, '102.29418011896742', '-3.811624384205409', 51, '102.30235147793245', '-3.8067107947346104', 1187, 1187, 1.12),
(1151, 51, '102.30235147793245', '-3.8067107947346104', 49, '102.30741876191955', '-3.82175947256511', 2404, 2404, 2.04),
(1152, 13, '102.31631755828857', '-3.890373056646199', 35, '102.3135101751901', '-3.8730860088105583', 2016, 2016, 1.28),
(1153, 13, '102.31631755828857', '-3.890373056646199', 15, '102.35313892364502', '-3.881809722339886', 5463, 5463, 1.13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `antik_metode`
--

CREATE TABLE `antik_metode` (
  `id_antik` int(11) NOT NULL,
  `titik_1` int(11) NOT NULL,
  `titik_1_long` varchar(20) NOT NULL,
  `titik_1_lat` varchar(20) NOT NULL,
  `titik_2` int(11) NOT NULL,
  `titik_2_long` varchar(20) NOT NULL,
  `titik_2_lat` varchar(20) NOT NULL,
  `jarak` int(11) NOT NULL,
  `jarak_bellmanford` int(11) NOT NULL,
  `muatan` double(22,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `antik_metode`
--

INSERT INTO `antik_metode` (`id_antik`, `titik_1`, `titik_1_long`, `titik_1_lat`, `titik_2`, `titik_2_long`, `titik_2_lat`, `jarak`, `jarak_bellmanford`, `muatan`) VALUES
(1082, 34, '102.26873137324256', '-3.766242079417555', 28, '102.26547823962524', '-3.783902985627169', 2713, 2713, 0.00),
(1083, 34, '102.26873137324256', '-3.766242079417555', 59, '102.2614241552942', '-3.7554712508436183', 1586, 1586, 0.00),
(1084, 60, '102.26410685662347', '-3.766808288697097', 34, '102.26873137324256', '-3.766242079417555', 606, 606, 0.00),
(1085, 60, '102.26410685662347', '-3.766808288697097', 59, '102.2614241552942', '-3.7554712508436183', 1319, 1319, 0.00),
(1086, 28, '102.26547823962524', '-3.783902985627169', 29, '102.26889235717083', '-3.786998343279817', 524, 524, 0.83),
(1087, 27, '102.26461183768292', '-3.78843281135959', 28, '102.26547823962524', '-3.783902985627169', 1059, 1059, 0.00),
(1088, 22, '102.2623166479453', '-3.7918478166662104', 27, '102.26461183768292', '-3.78843281135959', 470, 470, 0.00),
(1089, 29, '102.26889235717083', '-3.786998343279817', 18, '102.27003335952759', '-3.7936237700554103', 872, 872, 0.00),
(1090, 18, '102.27003335952759', '-3.7936237700554103', 19, '102.2739771267676', '-3.794890605944854', 492, 492, 0.00),
(1091, 19, '102.2739771267676', '-3.794890605944854', 20, '102.27233027746851', '-3.800357625892862', 632, 632, 0.00),
(1092, 18, '102.27003335952759', '-3.7936237700554103', 21, '102.26598858833313', '-3.7973492159695166', 620, 620, 0.00),
(1093, 19, '102.2739771267676', '-3.794890605944854', 11, '102.29418011896742', '-3.811624384205409', 3351, 3351, 0.00),
(1094, 12, '102.28810514965231', '-3.813480726612003', 11, '102.29418011896742', '-3.811624384205409', 747, 747, 0.00),
(1095, 12, '102.28810514965231', '-3.813480726612003', 26, '102.28732105121941', '-3.820205755026457', 770, 770, 0.00),
(1096, 26, '102.28732105121941', '-3.820205755026457', 40, '102.29129421858588', '-3.8221333102213704', 505, 505, 0.00),
(1097, 21, '102.26598858833313', '-3.7973492159695166', 43, '102.26425698379009', '-3.802346381341007', 577, 577, 0.84),
(1098, 21, '102.26598858833313', '-3.7973492159695166', 44, '102.25741584598896', '-3.799562722981392', 1034, 1034, 0.00),
(1099, 44, '102.25741584598896', '-3.799562722981392', 43, '102.26425698379009', '-3.802346381341007', 892, 892, 0.00),
(1100, 43, '102.26425698379009', '-3.802346381341007', 24, '102.27027587218974', '-3.8121473323482022', 1355, 1355, 2.03),
(1101, 24, '102.27027587218974', '-3.8121473323482022', 25, '102.27316681417878', '-3.809834989648148', 424, 424, 0.00),
(1102, 25, '102.27316681417878', '-3.809834989648148', 20, '102.27233027746851', '-3.800357625892862', 1741, 1741, 0.00),
(1103, 25, '102.27316681417878', '-3.809834989648148', 26, '102.28732105121941', '-3.820205755026457', 2112, 2112, 0.00),
(1104, 15, '102.35313892364502', '-3.881809722339886', 16, '102.34575511973212', '-3.83089503880089', 7093, 7093, 0.00),
(1105, 16, '102.34575511973212', '-3.83089503880089', 4, '102.32264971906677', '-3.8373666782332054', 4087, 4087, 0.00),
(1106, 4, '102.32264971906677', '-3.8373666782332054', 3, '102.3194932937622', '-3.84348774014389', 1688, 1688, 0.00),
(1107, 3, '102.3194932937622', '-3.84348774014389', 36, '102.31680045237385', '-3.8480885202122734', 610, 610, 0.00),
(1108, 36, '102.31680045237385', '-3.8480885202122734', 35, '102.3135101751901', '-3.8730860088105583', 2946, 2946, 0.00),
(1109, 38, '102.2985346962927', '-3.8372360641429735', 35, '102.3135101751901', '-3.8730860088105583', 4639, 4639, 0.00),
(1110, 38, '102.2985346962927', '-3.8372360641429735', 37, '102.3004013921227', '-3.8326014691459704', 600, 600, 0.00),
(1111, 37, '102.3004013921227', '-3.8326014691459704', 48, '102.30289780758045', '-3.8265121709060783', 791, 791, 0.00),
(1112, 36, '102.31680045237385', '-3.8480885202122734', 7, '102.30715158675999', '-3.840196769495743', 1561, 1561, 1.84),
(1113, 7, '102.30715158675999', '-3.840196769495743', 37, '102.3004013921227', '-3.8326014691459704', 1205, 1205, 0.00),
(1114, 7, '102.30715158675999', '-3.840196769495743', 6, '102.3107094938138', '-3.8368688730780964', 1382, 1382, 0.60),
(1115, 6, '102.3107094938138', '-3.8368688730780964', 5, '102.31521854670515', '-3.831409661667027', 1654, 1654, 0.00),
(1116, 4, '102.32264971906677', '-3.8373666782332054', 5, '102.31521854670515', '-3.831409661667027', 1092, 1092, 0.00),
(1117, 5, '102.31521854670515', '-3.831409661667027', 49, '102.30741876191955', '-3.82175947256511', 2111, 2111, 0.00),
(1118, 48, '102.30289780758045', '-3.8265121709060783', 49, '102.30741876191955', '-3.82175947256511', 745, 745, 0.00),
(1119, 37, '102.3004013921227', '-3.8326014691459704', 40, '102.29129421858588', '-3.8221333102213704', 1591, 1591, 0.00),
(1120, 38, '102.2985346962927', '-3.8372360641429735', 39, '102.28700141056613', '-3.829760061153183', 1578, 1578, 0.00),
(1121, 39, '102.28700141056613', '-3.829760061153183', 41, '102.26975570320997', '-3.8143855421598474', 3001, 3001, 0.00),
(1122, 41, '102.26975570320997', '-3.8143855421598474', 24, '102.27027587218974', '-3.8121473323482022', 466, 466, 0.00),
(1123, 39, '102.28700141056613', '-3.829760061153183', 40, '102.29129421858588', '-3.8221333102213704', 1049, 1049, 1.61),
(1124, 41, '102.26975570320997', '-3.8143855421598474', 45, '102.25694990535376', '-3.801502265215199', 2030, 2030, 0.00),
(1125, 44, '102.25741584598896', '-3.799562722981392', 55, '102.25611994451403', '-3.7980524281726833', 232, 232, 0.00),
(1126, 55, '102.25611994451403', '-3.7980524281726833', 30, '102.25584467865384', '-3.792083540569616', 810, 810, 0.00),
(1127, 30, '102.25584467865384', '-3.792083540569616', 22, '102.2623166479453', '-3.7918478166662104', 752, 752, 0.00),
(1128, 21, '102.26598858833313', '-3.7973492159695166', 22, '102.2623166479453', '-3.7918478166662104', 1257, 1257, 0.00),
(1129, 30, '102.25584467865384', '-3.792083540569616', 31, '102.25381975479793', '-3.7905043901790507', 312, 312, 0.00),
(1130, 20, '102.27233027746851', '-3.800357625892862', 12, '102.28810514965231', '-3.813480726612003', 2399, 2399, 0.00),
(1131, 20, '102.27233027746851', '-3.800357625892862', 21, '102.26598858833313', '-3.7973492159695166', 803, 803, 0.00),
(1132, 12, '102.28810514965231', '-3.813480726612003', 48, '102.30289780758045', '-3.8265121709060783', 3466, 3466, 0.00),
(1133, 48, '102.30289780758045', '-3.8265121709060783', 6, '102.3107094938138', '-3.8368688730780964', 1490, 1490, 0.00),
(1134, 6, '102.3107094938138', '-3.8368688730780964', 3, '102.3194932937622', '-3.84348774014389', 2661, 2661, 2.46),
(1135, 3, '102.3194932937622', '-3.84348774014389', 15, '102.35313892364502', '-3.881809722339886', 6476, 6476, 0.00),
(1136, 45, '102.25694990535376', '-3.801502265215199', 61, '102.2487504490273', '-3.794871922436076', 1224, 1224, 0.46),
(1137, 33, '102.25085915232872', '-3.7864833363501385', 61, '102.2487504490273', '-3.794871922436076', 1334, 1334, 0.00),
(1138, 32, '102.25074326599567', '-3.7872752951219457', 45, '102.25694990535376', '-3.801502265215199', 1911, 1911, 0.00),
(1139, 33, '102.25085915232872', '-3.7864833363501385', 32, '102.25074326599567', '-3.7872752951219457', 81, 81, 0.00),
(1140, 55, '102.25611994451403', '-3.7980524281726833', 56, '102.25201398982466', '-3.794210957248145', 646, 646, 0.00),
(1141, 56, '102.25201398982466', '-3.794210957248145', 62, '102.25092623163901', '-3.789083699803458', 710, 710, 0.00),
(1142, 62, '102.25092623163901', '-3.789083699803458', 32, '102.25074326599567', '-3.7872752951219457', 210, 210, 0.00),
(1143, 62, '102.25092623163901', '-3.789083699803458', 31, '102.25381975479793', '-3.7905043901790507', 382, 382, 0.00),
(1144, 33, '102.25085915232872', '-3.7864833363501385', 63, '102.26111494750006', '-3.782847738848976', 1366, 1366, 0.00),
(1145, 31, '102.25381975479793', '-3.7905043901790507', 58, '102.25783786627176', '-3.785557123523821', 957, 957, 0.00),
(1146, 63, '102.26111494750006', '-3.782847738848976', 58, '102.25783786627176', '-3.785557123523821', 520, 520, 0.00),
(1147, 28, '102.26547823962524', '-3.783902985627169', 63, '102.26111494750006', '-3.782847738848976', 562, 562, 0.00),
(1148, 63, '102.26111494750006', '-3.782847738848976', 60, '102.26410685662347', '-3.766808288697097', 1999, 1999, 0.00),
(1149, 11, '102.29418011896742', '-3.811624384205409', 49, '102.30741876191955', '-3.82175947256511', 2042, 2042, 0.00),
(1150, 11, '102.29418011896742', '-3.811624384205409', 51, '102.30235147793245', '-3.8067107947346104', 1187, 1187, 0.00),
(1151, 51, '102.30235147793245', '-3.8067107947346104', 49, '102.30741876191955', '-3.82175947256511', 2404, 2404, 0.00),
(1152, 13, '102.31631755828857', '-3.890373056646199', 35, '102.3135101751901', '-3.8730860088105583', 2016, 2016, 0.00),
(1153, 13, '102.31631755828857', '-3.890373056646199', 15, '102.35313892364502', '-3.881809722339886', 5463, 5463, 0.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalan`
--

CREATE TABLE `jalan` (
  `id_jalan` int(11) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jalan`
--

INSERT INTO `jalan` (`id_jalan`, `nama`, `alamat`, `longitude`, `latitude`) VALUES
(3, 'simpang pagar dewa', 'Jl. H. Adam Malik No.929, Pagar Dewa, Kec. Selebar, Kota Bengkulu, Bengkulu 38216, Indonesia', 102.3194932937622, -3.84348774014389),
(4, 'simpang iain', 'dekat, Jl. Raden Fatah, Pagar Dewa, Kec. Selebar, Kota Bengkulu, Bengkulu 38216, Indonesia', 102.32264971906677, -3.8373666782332054),
(5, 'simpangan RSUD', 'Jl. Hibrida, Sido Mulyo, Kec. Gading Cemp., Kota Bengkulu, Bengkulu 38211, Indonesia', 102.31521854670515, -3.831409661667027),
(6, 'simpang polda', 'Jl. Tribrata No.2, Cemp. Permai, Kec. Gading Cemp., Kota Bengkulu, Bengkulu 38211, Indonesia', 102.3107094938138, -3.8368688730780964),
(7, 'simpang tribrata', 'Jl. Bakti Husada No.99, RW.03, Lkr. Barat, Kec. Gading Cemp., Kota Bengkulu, Bengkulu 38211, Indonesia', 102.30715158675999, -3.840196769495743),
(11, 'simpang panorama', 'Jl. Danau No.40, Panorama, Kec. Singaran Pati, Kota Bengkulu, Bengkulu 38224, Indonesia', 102.29418011896742, -3.811624384205409),
(12, 'simpang padang harapan', 'Jl. Mayjen Sutoyo No.49, Jemb. Kecil, Kec. Singaran Pati, Kota Bengkulu, Bengkulu 38224, Indonesia', 102.28810514965231, -3.813480726612003),
(13, 'simpang kandis', 'Jl. Soeprapto Dalam, Sumber Jaya, Kp. Melayu, Kota Bengkulu, Bengkulu 38216, Indonesia', 102.31631755828857, -3.890373056646199),
(15, 'simpang betungan', 'Jl. Soeprapto Dalam, Betungan, Kec. Selebar, Kota Bengkulu, Bengkulu 38877, Indonesia', 102.35313892364502, -3.881809722339886),
(16, 'simpang pom sukarami', 'Jl. Barokah 2 No.11, Suka Rami, Kec. Selebar, Kota Bengkulu, Bengkulu 38211, Indonesia', 102.34575511973212, -3.83089503880089),
(18, 'simpang  jam', 'Jl. Basuki Rahmat No.14, Belakang Pd., Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38222, Indonesia', 102.27003335952759, -3.7936237700554103),
(19, 'simpang gor', 'Jl. Meranti No.1, Sawah Lebar, Kec. Ratu Agung, Kota Bengkulu, Bengkulu 38222, Indonesia', 102.2739771267676, -3.794890605944854),
(20, 'simpang skip', 'Jl. S. Parman No.200, Padang Jati, Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38222, Indonesia', 102.27233027746851, -3.800357625892862),
(21, 'simpang 5', 'Jl. Fatmawati No.5, Penurunan, Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38222, Indonesia', 102.26598858833313, -3.7973492159695166),
(22, 'simpang jamik', 'Jl. M.T. Haryono, Tengah Padang, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38114, Indonesia', 102.2623166479453, -3.7918478166662104),
(24, 'simpang polsek ratu samban', 'Jl. Putri Gading Cempaka Depan Polsek No.2, Penurunan, Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38224, Indonesia', 102.27027587218974, -3.8121473323482022),
(25, 'simpang 4 pantai', 'Jl. Sedap Malam No.88, Nusa Indah, Kec. Ratu Agung, Kota Bengkulu, Bengkulu 38223, Indonesia', 102.27316681417878, -3.809834989648148),
(26, 'simpang DPRD', 'Jl. Pembangunan No.838, Jemb. Kecil, Kec. Singaran Pati, Kota Bengkulu, Bengkulu 38225, Indonesia', 102.28732105121941, -3.820205755026457),
(27, 'simpang smp it', 'Jl. Bali No.76d, Kp. Bali, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38119, Indonesia', 102.26461183768292, -3.78843281135959),
(28, 'simpang kampung bali', 'Jl. Bali No.36, Kp. Kelawi, Kec. Sungai Serut, Kota Bengkulu, Bengkulu 38117, Indonesia', 102.26547823962524, -3.783902985627169),
(29, 'simpang sukamerindu', 'Jl. Jawa No.184, Suka Merindu, Kec. Sungai Serut, Kota Bengkulu, Bengkulu 38115, Indonesia', 102.26889235717083, -3.786998343279817),
(30, 'simpang minimarket butiniara', 'Jl. Letkol Santosa No.25, Ps. Melintang, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38113, Indonesia', 102.25584467865384, -3.792083540569616),
(31, 'simpang BI', 'Jl. Khadijah No.123, Kebun Ros, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38119, Indonesia', 102.25381975479793, -3.7905043901790507),
(32, 'simpang kampung cina', 'Jl. Jend. Ahmad Yani, No. 94, Kebun Keling, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38115, Indonesia', 102.25074326599567, -3.7872752951219457),
(33, 'simpang tugu pers', 'Jl. Pariwisata, Malabero, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38115, Indonesia', 102.25085915232872, -3.7864833363501385),
(34, 'simpang pom unib', 'Jl. Padang - Bengkulu, Kec. Muara Bangka Hulu, Kota Bengkulu, Bengkulu 38119, Indonesia', 102.26873137324256, -3.766242079417555),
(35, 'simpang alfamart kandang mas', 'Jl. RE. Martadinata No.444, Kandang Mas, Kp. Melayu, Kota Bengkulu, Bengkulu 38216, Indonesia', 102.3135101751901, -3.8730860088105583),
(36, 'simpang sd 79', 'Jl. RE Martadinata No.6, Pagar Dewa, Kec. Selebar, Kota Bengkulu, Bengkulu 38216, Indonesia', 102.31680045237385, -3.8480885202122734),
(37, 'simpang sapta bakti', 'Jl. Mahakam No.4, Lingkar Barat, Kec. Gading Cemp., Kota Bengkulu, Bengkulu 38225, Indonesia', 102.3004013921227, -3.8326014691459704),
(38, 'simpang SMA 7', 'Jl. Citandui, Lkr. Barat, Kec. Gading Cemp., Kota Bengkulu, Bengkulu, Indonesia', 102.2985346962927, -3.8372360641429735),
(39, 'simpang nick coffe', 'Jl. Ciliwung Bawah No.33, Padang Harapan, Kec. Gading Cemp., Kota Bengkulu, Bengkulu, Indonesia', 102.28700141056613, -3.829760061153183),
(40, 'simpang surya padang harapan', 'Jl. Kapuas Raya No.8, Padang Harapan, Kec. Gading Cemp., Kota Bengkulu, Bengkulu 38225, Indonesia', 102.29129421858588, -3.8221333102213704),
(41, 'jembatan bim I', 'Jl. Pariwisata No.1kel, Decrease of, Kec. Ratu Samban, Kota Bengkulu, Bengkulu, Indonesia', 102.26975570320997, -3.8143855421598474),
(43, 'simpang penurunan', 'Jl. Fatmawati No.55, Penurunan, Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38222, Indonesia', 102.26425698379009, -3.802346381341007),
(44, 'simpang masjid at-taqwa', 'Jl. Tembok Baru, Anggut Atas, Kec. Ratu Samban, Kota Bengkulu, Bengkulu, Indonesia', 102.25741584598896, -3.799562722981392),
(45, 'simpang taman berkas', 'Jl. Tembok Baru No.21a, Anggut Atas, Kec. Ratu Samban, Kota Bengkulu, Bengkulu, Indonesia', 102.25694990535376, -3.801502265215199),
(48, 'simpang spbu km 8', 'Jl. Pangeran Natadirja No.8, RT.01, Jl. Gedang, Kec. Gading Cemp., Kota Bengkulu, Bengkulu 38225, Indonesia', 102.30289780758045, -3.8265121709060783),
(49, 'simpang SLB', 'Jl. Mangga Raya No.19, Lkr. Tim., Kec. Singaran Pati, Kota Bengkulu, Bengkulu 38225, Indonesia', 102.30741876191955, -3.82175947256511),
(51, 'simpang kompi', 'Jl. Zainul Arifin No.10, Padang Nangka, Kec. Singaran Pati, Kota Bengkulu, Bengkulu 38224, Indonesia', 102.30235147793245, -3.8067107947346104),
(55, 'simpang hamilton monumen', 'Jl. Moh. Hasan, Ps. Melintang, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu, Indonesia', 102.25611994451403, -3.7980524281726833),
(56, 'simpang yayasan bodroyono', 'Jl. Moh. Hasan No.12, Ps. Baru, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu, Indonesia', 102.25201398982466, -3.794210957248145),
(58, 'simpang 3 jl letkol', 'Jl. Letkol Iskandar No.6, Tengah Padang, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38119, Indonesia', 102.25783786627176, -3.785557123523821),
(59, 'simpang sungai hitam', 'Jl. Sungai Hitam No.20, Beringin Raya, Kec. Muara Bangka Hulu, Kota Bengkulu, Bengkulu 38119, Indonesia', 102.2614241552942, -3.7554712508436183),
(60, 'simpang kualo', 'Jl. Bencoolen, Rw. Makmur Permai, Kec. Muara Bangka Hulu, Kota Bengkulu, Bengkulu, Indonesia', 102.26410685662347, -3.766808288697097),
(61, 'jalan pantai', 'Jl. Arraw No.2, Sumur Melele, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu, Indonesia', 102.2487504490273, -3.794871922436076),
(62, 'simpang polres', 'Jl. Mazairi No.57, Malabero, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38119, Indonesia', 102.25092623163901, -3.789083699803458),
(63, 'simpang pantai zakat', 'Jl. Ibnu Hajar No.13p, Kp. Bali, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38119, Indonesia', 102.26111494750006, -3.782847738848976);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peta`
--

CREATE TABLE `peta` (
  `id_peta` int(11) NOT NULL,
  `id_supir` int(11) NOT NULL,
  `id_tps` int(11) NOT NULL,
  `id_jalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supir`
--

CREATE TABLE `supir` (
  `id_supir` int(20) NOT NULL,
  `nm_supir` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `id_ang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supir`
--

INSERT INTO `supir` (`id_supir`, `nm_supir`, `alamat`, `longitude`, `latitude`, `id_ang`) VALUES
(1001, 'safar', 'Jl. Batang Hari No.8, Nusa Indah, Kec. Ratu Agung, Kota Bengkulu, Bengkulu 38223, Indonesia', 102.27533910732842, -3.815518407725385, 1),
(1002, 'Lim', 'Jl. Depati Payung Negara No.31, Pagar Dewa, Kec. Selebar, Kota Bengkulu, Bengkulu 38216, Indonesia', 102.3211368, -3.84333051, 1),
(1003, 'Harjon', 'Jl. Jeruk 1 No.46, RT.05/RW.02, Lkr. Tim., Kec. Singaran Pati, Kota Bengkulu, Bengkulu 38225, Indonesia', 102.3010805, -3.81715784, 1),
(1004, 'Tas an', 'Jl. Air Sebakul - Nakau, Suka Rami, Kec. Selebar, Kota Bengkulu, Bengkulu 38211, Indonesia', 102.34519572449263, -3.8250446578040496, 1),
(1005, 'purnomo', 'Unnamed Road, Pematang Gubernur, Kec. Muara Bangka Hulu, Kota Bengkulu, Bengkulu 38119, Indonesia', 102.29052200938102, -3.753003617371617, 2),
(1006, 'Guansyah', 'Jl. Air Sebakul - Nakau, Suka Rami, Kec. Selebar, Kota Bengkulu, Bengkulu 38211, Indonesia', 102.34465457023894, -3.8242828070269117, 1),
(1007, 'Yedi', 'Jl. Air Sebakul - Nakau, Suka Rami, Kec. Selebar, Kota Bengkulu, Bengkulu 38211, Indonesia', 102.34471916464881, -3.824568859334045, 1),
(1008, 'Salipin', 'Jl. Padang Cengkeh, Suka Rami, Kec. Selebar, Kota Bengkulu, Bengkulu 38216, Indonesia', 102.33914152543, -3.8404079524740915, 1),
(1009, 'Tori', 'Jl. Padang Cengkeh, Suka Rami, Kec. Selebar, Kota Bengkulu, Bengkulu 38216, Indonesia', 102.33923108221666, -3.840296148158064, 1),
(1010, 'Suar', 'Jl. Muhajirin No.RT 009, Dusun Besar, Kec. Singaran Pati, Kota Bengkulu, Bengkulu 38224, Indonesia', 102.30249036316022, -3.8137645976187216, 1),
(1011, 'Novan', 'Jl. Ibnu Hajar No.109, Kp. Bali, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38117, Indonesia', 102.26309778338354, -3.7820877351542883, 1),
(1012, 'Harjoni', 'Jl. Pematang Said, Kandang Limun, Kec. Muara Bangka Hulu, Kota Bengkulu, Bengkulu 38119, Indonesia', 102.28058955667083, -3.757791610929964, 1),
(1013, 'anton', 'Jl. Belato No.64, Ps. Baru, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu, Indonesia', 102.25129691844707, -3.794049714073976, 2),
(1014, 'edo', 'Jl. Cemp. No.62, Kebun Beler, Kec. Ratu Agung, Kota Bengkulu, Bengkulu 38222, Indonesia', 102.27051112204838, -3.8069572672943064, 1),
(1015, 'Rudi', 'Jl. M Ali Amin No.18, Pematang Gubernur, Kec. Muara Bangka Hulu, Kota Bengkulu, Bengkulu 38119, Indonesia', 102.29138063880549, -3.75496575109871, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `titik`
--

CREATE TABLE `titik` (
  `id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `ket` enum('jalan','tps','supir') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tps`
--

CREATE TABLE `tps` (
  `id_tps` int(11) NOT NULL,
  `nm_tps` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tps`
--

INSERT INTO `tps` (`id_tps`, `nm_tps`, `alamat`, `longitude`, `latitude`) VALUES
(2000, 'tps salak', 'Jl. Salak No.66, Lkr. Tim., Kec. Singaran Pati, Kota Bengkulu, Bengkulu 38225, Indonesia', 102.29977679638961, -3.8151354010355205),
(2001, 'tps terminal', 'No Jl. Belimbing No.48, Panorama, Kec. Singaran Pati, Kota Bengkulu, Bengkulu 38225, Indonesia', 102.29900657578091, -3.816158876721224),
(2002, 'TPS Tribrata', 'Jl. Belibis No.1, Cemp. Permai, Kec. Gading Cemp., Kota Bengkulu, Bengkulu 38211, Indonesia', 102.30848206098631, -3.8387555147851957),
(2003, 'Tps TPI', 'Gg. Al-Barokah 4 No.78, Padang Serai, Kp. Melayu, Kota Bengkulu, Bengkulu 38216, Indonesia', 102.30730204969198, -3.9030637380254998),
(2004, 'Tps SPBE bentungan', 'Jl. Soeprapto Dalam, Betungan, Kec. Selebar, Kota Bengkulu, Bengkulu 38216, Indonesia', 102.33862748041315, -3.8757938966936103),
(2005, 'TPS AL', 'Jl. Kamtemas, Padang Serai, Kp. Melayu, Kota Bengkulu, Bengkulu 38216, Indonesia', 102.3347632726939, -3.8876815642191573),
(2006, 'Tps jl Nangka', 'No Jl. Belimbing No.48, Panorama, Kec. Singaran Pati, Kota Bengkulu, Bengkulu 38225, Indonesia', 102.29862125507513, -3.8158950510400342),
(2007, 'TPS pagar dewa', 'Jl. Raden Fatah No.6, Pagar Dewa, Kec. Selebar, Kota Bengkulu, Bengkulu 38216, Indonesia', 102.32048720577298, -3.839237601116019),
(2008, 'Tps RSUD', 'Jl. Bhayangkara, Sido Mulyo, Kec. Gading Cemp., Kota Bengkulu, Bengkulu 38211, Indonesia', 102.31375781941706, -3.835135416847812),
(2009, 'Tps balai buntar', 'JL. Cimanuk I, RT. 8 No. 99 C, Jl. Gedang, Kec. Gading Cemp., Kota Bengkulu, Bengkulu 38225, Indonesia', 102.29487584067466, -3.8221407089746253),
(2010, 'Tps dpan hotel bidadari', 'Pantai Panjang, Jl. Pariwisata, Tanah Patah, Kec. Ratu Agung, Kota Bengkulu, Bengkulu, Indonesia', 102.27357220837091, -3.820400409972972),
(2011, 'Tps berkas', 'Jl. Tembok Baru No.4A, Anggut Atas, Kec. Ratu Samban, Kota Bengkulu, Bengkulu, Indonesia', 102.25517686662269, -3.7993338364834655),
(2012, 'Tps kebun bler', 'Jl. Cemp. No.kel, Kebun Beler, Kec. Ratu Agung, Kota Bengkulu, Bengkulu 38223, Indonesia', 102.27125777769648, -3.8073852844464917),
(2013, 'Tps anggut', 'Kel Jl. Kenari No.6, RT.1, Anggut Dalam, Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38222, Indonesia', 102.26124711074758, -3.798718154971445),
(2014, 'Tps kebun geran', 'Jl. Merpati No.23, Kebun Gerand, Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38114, Indonesia', 102.26061316001658, -3.7946856343139426),
(2015, 'Tps Ptm', 'Jl. KZ Abidin II, Belakang Pd., Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38222, Indonesia', 102.26679159108198, -3.794735577952867),
(2016, 'Tps memo', 'Jl. K.Z. Abidin No.1-43, Belakang Pd., Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38222, Indonesia', 102.26685581609121, -3.792855415278063),
(2017, 'Tps Kz abidin I', 'Jl. K.Z. Abidin No.36, Belakang Pd., Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38222, Indonesia', 102.26836268281642, -3.7921423483465904),
(2018, 'Tps Jitra', 'Jl. Rejamat No.20, Ps. Jitra, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu, Indonesia', 102.25322517822572, -3.792689542634742),
(2019, 'Tps barukoto I', 'Pasar Baru Koto deretan paling ujung dekat Gerbang Naga, Malabero, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38119, Indonesia', 102.25054773194252, -3.7878997838056865),
(2020, 'Tps barukoto II', 'Jl. Pasar Ikan No.169, Malabero, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu, Indonesia', 102.24869199064844, -3.7891634571043618),
(2021, 'Tps pantai jakat', 'Jl. Ibnu Hajar No.13p, Kp. Bali, Kec. Tlk. Segara, Kota Bengkulu, Bengkulu 38119, Indonesia', 102.26175314314163, -3.782175418419137),
(2022, 'Tps kampung kelawi', 'Jl. Kalimantan I, Kp. Kelawi, Kec. Sungai Serut, Kota Bengkulu, Bengkulu 38117, Indonesia', 102.26566806562164, -3.7817727184940613),
(2023, 'Tps tanggul', 'Jl. Irian No.59, RT.02/RW.01, Tj. Agung, Kec. Sungai Serut, Kota Bengkulu, Bengkulu 38119, Indonesia', 102.2787929800492, -3.7814265870117687),
(2024, 'Tps pasar baru', 'Jembatan Pasar Bengkulu, Jl. Bencoolen, Rawa Makmur Permai, Muara Bangka Hulu, Bengkulu City, Bengkulu, Indonesia', 102.26466171428021, -3.7713187182867136),
(2025, 'Tps kualo', 'Jl. Bencoolen, Rw. Makmur Permai, Kec. Muara Bangka Hulu, Kota Bengkulu, Bengkulu, Indonesia', 102.26441570235966, -3.7669001544201293),
(2026, 'Tps stadion', 'Jl. Meranti I, Sawah Lebar Baru, Kec. Ratu Agung, Kota Bengkulu, Bengkulu 38222, Indonesia', 102.2734806717033, -3.7930201431513986),
(2027, 'Tps sawah lebar', 'Jl. Kemang Manis No.133, Padang Jati, Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38222, Indonesia', 102.27637940620794, -3.7972994059056573),
(2028, 'Tps Tebeng', 'Jl. Karbela Raya No.75, Kebun Tebeng, Kec. Ratu Agung, Kota Bengkulu, Bengkulu 38223, Indonesia', 102.28170348808018, -3.802334156384958);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `angkutan`
--
ALTER TABLE `angkutan`
  ADD PRIMARY KEY (`id_ang`);

--
-- Indeks untuk tabel `antik`
--
ALTER TABLE `antik`
  ADD PRIMARY KEY (`id_antik`),
  ADD KEY `titik_1` (`titik_1`),
  ADD KEY `titik_2` (`titik_2`);

--
-- Indeks untuk tabel `antik_metode`
--
ALTER TABLE `antik_metode`
  ADD PRIMARY KEY (`id_antik`) USING BTREE,
  ADD KEY `titik_1` (`titik_1`) USING BTREE,
  ADD KEY `titik_2` (`titik_2`) USING BTREE;

--
-- Indeks untuk tabel `jalan`
--
ALTER TABLE `jalan`
  ADD PRIMARY KEY (`id_jalan`);

--
-- Indeks untuk tabel `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id_supir`),
  ADD KEY `id_ang` (`id_ang`);

--
-- Indeks untuk tabel `titik`
--
ALTER TABLE `titik`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tps`
--
ALTER TABLE `tps`
  ADD PRIMARY KEY (`id_tps`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `angkutan`
--
ALTER TABLE `angkutan`
  MODIFY `id_ang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `antik`
--
ALTER TABLE `antik`
  MODIFY `id_antik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1155;

--
-- AUTO_INCREMENT untuk tabel `antik_metode`
--
ALTER TABLE `antik_metode`
  MODIFY `id_antik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1154;

--
-- AUTO_INCREMENT untuk tabel `titik`
--
ALTER TABLE `titik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tps`
--
ALTER TABLE `tps`
  MODIFY `id_tps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2030;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
