-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2019 at 11:07 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savanoryste`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `organisation_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `organisation_id`, `title`, `start_date`, `end_date`, `description`) VALUES
(53, 59, 'Mes Darom 2019', '2019-06-03 09:00:00', '2019-06-10 18:00:00', 'Kas metinis \"Mes Darom\" renginys.Kviečiame aptvarkyti savo regioną ir dalyvauti prizų dalyboje pateikius nuotraukas. Skatinkite savo artimuosius prisijungti\r\nRenginys prasideda 2019-06-03 9val. Trukmė 1 savaitė. Sekmės!!'),
(54, 61, 'Maltiečių sriubos', '2019-06-17 13:00:00', '2019-06-21 20:00:00', 'Maltos ordino pagalbos tarnyba – viena didžiausių savanoriškų socialinės pagalbos organizacijų Lietuvoje, veikianti 40 – yje Lietuvos miestų, turinti platų pagalbos projektų tinklą ir ilgametę darbo su savanoriais patirtį.\r\n\r\nSavanoriavimas pas mus – tai pagalba savo artimui. Tai vertingas, ne veltui praleistas laikas, neįkainojamas žmogiškas patyrimas.'),
(55, 62, 'Pagalba seneliams', '2019-07-17 08:00:00', '2019-08-31 00:00:00', 'Kas trečias vyresnis negu 65 metų žmogus gyvena vienas. Kai kurie seneliai neišeina iš namų ištisus metus. Psichologų teigimu, vienišumą išgyvenantys žmonės daug dažniau suserga depresija, jaučiasi nereikalingi, neįdomūs, užmiršti.\n\nNorėdami spręsti šią problemą, sukūrėme programą „Šilti apsilankymai”. Ji skirta vienišiems, daugiausiai vyresnio amžiaus žmonėms, dėl sveikatos ir kitokių kliūčių retai išeinantiems iš savo namų, neturintiems artimų žmonių rato. Juos nuolatos lanko Raudonojo Kryžiaus savanoriai.\n\nRaudonojo Kryžiaus savanorių vizitai pas vienišus senelius gerina emocinę jų savijautą. Seneliams itin svarbus bendravimas, šiltas žodis, išklausymas, todėl savanoriai tampa naujais jų draugais.\n\nSusitikimuose jie dalinasi sukaupta gyvenimiška patirtimi, žiniomis, istorijomis, atranda naujų užsiėmimų. Savanoriai kartu su seneliais vaikšto lauke, padeda apsipirkti, aplanko gydytoją ar seniai matytą draugą. Atsižvelgdami į senelių pomėgius, savanoriai kartu sodina augalus, garsiai skaito knygas, žiūri nuotraukų albumus, gamina rankdarbius, užsiima kita senelių mėgstama veikla.'),
(56, 62, 'Pagalba žmonėms kritinėse situacijose', '2019-06-03 00:00:00', '2019-06-28 00:00:00', 'Mūsų tikslas - padėti labiausiai pažeidžiamoms visuomenės grupėms Lietuvoje ir kitiems nelaimės ištiktiems asmenims visame pasaulyje.\r\n\r\nLietuvos Raudonasis Kryžius  vykdo įvairią pagalbą socialiai remtiniems asmenims, senjorams, neįgaliesiems, ligoniams, našlaičiams ir be globos likusiems vaikams, bedarbiams ir kitiems nelaimės ištiktiems asmenims.\r\n\r\nOrganizacijos darbuotojai ir savanoriai renka iš  gyventojų drabužius, avalynę, patalynę ir juos nemokamai dalina minėtoms gyventojų grupėms.\r\n\r\nTaip pat Lietuvos Raudonojo Kryžius dalina paramą maistu devyniuose Raudonojo Kryžiaus skyriuose - Alytuje ir Alytaus rajone, Utenoje, Rokiškyje, Šilutėje, Kupiškyje, Kretingoje, Anykščiuose. ');

-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

CREATE TABLE `invite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `organisation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `volunteer_id` int(11) DEFAULT NULL,
  `job_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `volunteer_id`, `job_type_id`) VALUES
(54, 4, 1),
(55, 2, 3),
(56, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `id` int(11) NOT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`id`, `job_type`) VALUES
(1, 'Socialinė'),
(2, 'Menas ir kultūra'),
(3, 'Ekologinė'),
(4, 'Žiniasklaida ir komunikacija'),
(5, 'IT technologijos'),
(6, 'Sporto'),
(7, 'Gyvūnų globa'),
(8, 'Sveikatos'),
(9, 'Švietimo'),
(10, 'Prevencinė');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190424114809', '2019-04-24 11:48:32'),
('20190506062008', '2019-05-11 05:28:30'),
('20190506124049', '2019-05-11 05:28:31'),
('20190507074401', '2019-05-11 05:28:31'),
('20190509131115', '2019-05-11 05:47:50'),
('20190510140111', '2019-05-11 05:47:53'),
('20190510171310', '2019-05-11 05:47:53'),
('20190510171531', '2019-05-11 05:47:53'),
('20190517070920', '2019-05-17 07:09:55'),
('20190517074009', '2019-05-17 07:41:02'),
('20190517080132', '2019-05-17 08:04:41'),
('20190517132834', '2019-05-17 13:30:02'),
('20190517140121', '2019-05-17 14:03:34'),
('20190518103050', '2019-05-18 10:32:03'),
('20190518130603', '2019-05-18 13:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'OrganisationPic.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`id`, `name`, `email`, `phone`, `address`, `profile_pic`) VALUES
(59, 'Darom 2019', 'info@darom.lt', 2932562, 'Naujininkų 5a', 'OrganisationPic.jpeg'),
(60, 'Jaunimo linija ', 'jaunimolinija@gmail.com', 1253476, 'Kauno 2', 'OrganisationPic.jpeg'),
(61, 'Maltiečiai', 'info@maltieciai.lt', 5487269, 'Tiltų 81', 'OrganisationPic.jpeg'),
(62, 'Raudonasis kryžius', 'raudonasiskryzius@gmail.com', 5421798, 'Gedimino pr.2', 'OrganisationPic.jpeg'),
(65, '', '', 0, '', 'OrganisationPic.jpeg'),
(66, '', '', 0, '', 'OrganisationPic.jpeg'),
(67, '', '', 0, '', 'OrganisationPic.jpeg'),
(68, '', '', 0, '', 'OrganisationPic.jpeg'),
(69, '', '', 0, '', 'OrganisationPic.jpeg'),
(70, '', '', 0, '', 'OrganisationPic.jpeg'),
(71, '', '', 0, '', 'OrganisationPic.jpeg'),
(72, '', '', 0, '', 'OrganisationPic.jpeg'),
(73, '', '', 0, '', 'OrganisationPic.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `volunteer_id` int(11) NOT NULL,
  `review_body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `volunteer_id`, `review_body`, `review_rating`) VALUES
(51, 5, 'Atliko paskirtas užduotis pukiai.Rekomenduojam!', 10),
(52, 2, 'Labai punktualus ir draugiška asmenybė', 10),
(53, 3, 'Rekomenduoju!', 10),
(54, 3, 'Labai draugiška asmenybė, rekomenduočiau didesnio pobudžio savanorystės projektui', 10),
(55, 9, 'Likomi patenkinti, Galite drąsiai rinktis', 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `profile_id`) VALUES
(10, 'Deivis', '[\"ROLE_ORGANISATION\"]', '$argon2i$v=19$m=1024,t=2,p=2$cmNBZm9IU1llZlgwWm4uMw$kkpVndqm7JS7mUr0xILmE3CST1wj2fcVzjhV+70+Bpg', 59),
(11, 'Papa', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$dWpTWFFCd1g4Qkl1ODFCVg$ecxLOEfinS+61XuJbcus+2AWApLQrGBIcXZ6NbJ2p+8', 2),
(12, 'Youtube', '[\"ROLE_ORGANISATION\"]', '$argon2i$v=19$m=1024,t=2,p=2$djA2cHlOaGZOZmp6ZnFVMg$cXHt/7NgXW/3xA97hkCGuu034vhY8psMmRws2JF8M1Q', 61),
(13, 'Volunteer123', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$RUtGS0Nkb0Q5ZVMzWG9sbQ$fMWDkvuge5qFu1BK7w16EfqsoaXEfsIsS/CIvN5Scuk', 3),
(14, 'Rolaandas1', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$d2kvZm1vMFp2LzBEOGphZQ$2uUABWdCe/KOxQvPw6j1gteHrtxlQEmshlCcUlvNKnY', 4),
(15, 'Onuta', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$LjRUMTNFUW9rLzhOU3h3eQ$UJ/26Uio/71htDiL/OP6fbpGg3LtAfzw32BVLIPuZcY', 5),
(16, 'Justina', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$NTMuNmI0ZkdmNy80cXU0Vg$6Q+OTCOw7rkrvq5IhqnQ0itSdnbkeZenWdpsAUse/Zs', 6),
(17, 'Romas', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$T1lZMHRzci5MVUZudEtrNg$9sC9mpnMYXyMGl5G9REAToV6GvtYICa+cL0WrX7SeBs', 7),
(18, 'majo12', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$QTJTcmlnS3dMLmh3dDRqdw$1tkmU6u09AwMfbMKA4EcrSdAGQizCkzQO6MaVGrk2MU', 8),
(19, 'Jonas', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$eWxjTUM1R2xUOGtITGNSYQ$bJDH4eOjUEwWljeUq5fv7hjFFVhnYE9uvvoBsbNgx1w', 9),
(20, 'Rvanala', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$dEExZTZDdER4S3BsZXN2Vw$A9HUi+cri6rWcdnpWjafZfFU1gyo3O22+MsLu80dw68', 10),
(21, 'FoxtrotLTU', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$SHlULmY1dlZyc1lXQWZTMA$+1pLd9srUtvFFJqfmgKXNUg3QkoRBSBP2gLpP44FXLY', 11),
(22, 'Wutikas1', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$cXFZTWlRSHJnMjNOZHlaag$F9vRiRqBZuQMsl0+EmrBiKo8jaB6vIPIRUtYZ8MxU6s', 12),
(23, 'Evelina', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$NzB2LnlGUVF0OUNqWE9RLw$/hkpucuN22OUCrPYgEYutpXylxM34551xbVa+lA52UE', 13),
(24, 'Jonaitis', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$MlBTLy5vSUxQMnZKdGhIeA$dXo6FN8bH2YxR/UONg1g8ncZwY55iMjITC8ZdtvMXhA', 14),
(25, 'asdIta', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$aXl2OGRxLmNEd2tLazFuOA$f2Kq15yp31C9h2MMCxlW/40vqvRDqRwU776kSmLGiM8', 15),
(26, 'PaXY123', '[\"ROLE_ORGANISATION\"]', '$argon2i$v=19$m=1024,t=2,p=2$SXc5elBMaXlZZ3JNcmouSQ$XeECulLLnVExVXGrHmAyDjemgZ52vsFDc9IB9mCvDqw', 60),
(27, 'MaltViko', '[\"ROLE_ORGANISATION\"]', '$argon2i$v=19$m=1024,t=2,p=2$NlhKdVVxR01qMmdnZHBnNg$9hmu7zUWJzJ/SES9EDhFcvMuZilp3kCX8fwlc5M6/WY', 62),
(28, 'Dovydas2', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$b0ZRNUd1d0ZLZzJvdi9Saw$66gsyWo5b0vg35+Wk9XEWQ3SkVVVfu8wxH55Jcv/A10', 72),
(29, 'OmervitaAts', '[\"ROLE_ORGANISATION\"]', '$argon2i$v=19$m=1024,t=2,p=2$dWM5MVRuRXNyMDFBa3FQQQ$DNYgrJBz08LWTX7e4guk+YMOB3E8f9QmVmAac/rZg7Q', 65),
(30, 'LivitaKon8', '[\"ROLE_ORGANISATION\"]', '$argon2i$v=19$m=1024,t=2,p=2$U3h3Y002QnVJSURtVlJtbw$7d2+XPxXTQ+3Fw3qF6cw9k6+BhMDyBOv5wBkGhOM/zs', 66),
(31, 'Karolux11', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$bk9iLkdzbDBsU0M5cHlkUw$gnwWtF80paBDpSlWJywo8wVkmRKFrVRiqZS0fTYmIT8', 73),
(32, 'Pajarskis', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$MTFxaC81dGQyVWpybG9VcQ$DnqF4xJr+2JBXnKfCKQ5y6BBtAeibKAw/r10N8vYuwY', 74),
(33, 'IO23!', '[\"ROLE_ORGANISATION\"]', '$argon2i$v=19$m=1024,t=2,p=2$RDJZZnlIWHBsTEVhTm5HeQ$jHWFiC8hrb7CIhAyeYmIVr2FnDJ2EiqmMYF5v3es3jA', 67),
(34, 'ipaStipri', '[\"ROLE_ORGANISATION\"]', '$argon2i$v=19$m=1024,t=2,p=2$NFI5ZFF6a0Z6YzFnUXdxNw$/wlN9UBx+FzbLX6nco+MTJSPiVM++FDNxHLZe2Wmhn4', 68),
(35, 'TaipMesYra', '[\"ROLE_ORGANISATION\"]', '$argon2i$v=19$m=1024,t=2,p=2$Wm9hTGxFOU1SdGxldmJOVw$Sf0c/pvLcmH6kEt/fVwlgyGMJHVc3cInKCLmw8aAOK4', 69),
(36, 'Tadelis78', '[\"ROLE_ORGANISATION\"]', '$argon2i$v=19$m=1024,t=2,p=2$YXVQOHpMdFdlSXNmUEpHUw$eNwGbFIeexjjAysMdrWUq5Njvm7CV4jts72TWbqE6/I', 70),
(37, 'labas', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$SzM1Wkdna0dpVFd0cGJHQg$o1IyAxXHXQ2EPZqzrBGomCXIjq3jEXB3SKaTmaS7qQ4', 75),
(38, 'Dovis', '[\"ROLE_ORGANISATION\"]', '$argon2i$v=19$m=1024,t=2,p=2$Y2JyWTA5NVlpNy9heGFoSg$qN/Z/95qCDFMz5p9XYXVEpkCEivNfrKyW5n+KampVQM', 71),
(39, 'test11213123', '[\"ROLE_ORGANISATION\"]', '$argon2i$v=19$m=1024,t=2,p=2$d1Q3UUdXQ29oZXZNRGFqbA$4UARSiKCXfpgLz+SLncYnDOadhTqXg1pZWIx2IiiBB8', 72),
(40, 'labas77', '[\"ROLE_ORGANISATION\"]', '$argon2i$v=19$m=1024,t=2,p=2$RU5zdWFveWdhaFByQnhsaw$uTdDzqAWZs4h6FQ9eZr1WJ7lpWNrXYp+w5HSPLjzMQE', 73),
(41, 'Papa123', '[\"ROLE_VOLUNTEER\"]', '$argon2i$v=19$m=1024,t=2,p=2$RHI4YzgxLmJNYkVBN0JoVA$BIr44HMhnRN2WM6AkFPgeRmkXI2VjKOwtl/vhLI4dos', 76);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'VolunteerPic.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`id`, `firstname`, `lastname`, `phone`, `email`, `city`, `country`, `description`, `profile_pic`) VALUES
(2, 'Ignas', 'Milašauskas', 1013653, 'sangis@gmail.com', 'Šiauliai', 'Lietuva', 'Savanoriauti dar neteko, tačiau labai norėčiau išbandyti savo jėgas', 'pexels-photo-220453.jpeg'),
(3, 'Povilas', 'Kamarauskas', 7927233, 'pofke25@hotmail.com', 'Prienai', 'Lietuva', '', 'VolunteerPic.jpeg'),
(4, 'Tomas', 'Mikalauskas', 2115442, 'tomas.mik@gmail.com', 'Elektrėnai', 'Lietuva', 'Domintų savanorystė \"Darom renginuose\" ir panašaus tipo.', 'VolunteerPic.jpeg'),
(5, 'Evelina', 'Šimonytė', 2276534, 'simonyte.evelina@gmail.com', 'Panevežys', 'Lietuva', 'Labai norėčiau įgyti patirties gyvnūnėlių priežiūroje.Šiuo metu studijuoti veterinarija.', 'VolunteerPic.jpeg'),
(6, 'Darija', 'Petrauskaitė', 1408256, 'petrausk.dar@inbox.lt', 'Kaunas', 'Lietuva', 'Teko savanoriauti \"Darom\" renginyje. Norėčiau įgyti panašios patirties.', 'VolunteerPic.jpeg'),
(7, 'Kamilė', 'Nainė', 4884908, 'kamiliukas11@gmail.com', 'Vilnius', 'Lietuva', 'Dar neteko savanoriauti, tačiau labai esu žingeidi ir norėčiau pabandyti', 'VolunteerPic.jpeg'),
(8, 'Justina', 'Lasauskaitė', 3619832, 'justin3@hotmail.com', 'Klaipėda', 'Lietuva', 'Esu draugiška asmenybė, norėčiau pagelbėti nepelno siekiančiai bendruomenei', 'VolunteerPic.jpeg'),
(9, 'Diana', 'Tutaitė', 2509048, 'tutaitebb@gmail.com', 'Vilnius', 'Lietuva', '', 'VolunteerPic.jpeg'),
(10, 'Laurynas', 'Latakas', 3410181, 'laurynas89@gmail.com', 'Vilnius', 'Lietuva', 'Ieškau kur panaudoti savo laisvą laiką, gerai paskirčiai.', 'VolunteerPic.jpeg'),
(11, 'Mantas', 'Nabažas', 3439460, 'nabazas11@gmail.com', 'Mažeikiai', 'Lietuva', 'Mėgstų sportuotį, sudalyviaučiau kokiam sporto tematikos renginyje', 'VolunteerPic.jpeg'),
(12, 'Ugne', 'Usaitė', 4476803, 'ugneusaite@gmail.com', 'Vilnius', 'Lietuva', 'Jau savanoriauti trečius metus išeilės, domina didesni renginiai Vilniuje ir Vilniaus rajone', 'VolunteerPic.jpeg'),
(13, 'Jonas', 'Jarmalavičius', 5331070, 'paperseal@gmail.com', 'Vilnius', 'Lietuva', '', 'VolunteerPic.jpeg'),
(14, 'Saulius', 'Petkauskas', 7161899, 'Opetkis@yandex.ru', 'Palanga', 'Lietuva', 'Pasavanoriaučiau už simbolinį mokestį', 'VolunteerPic.jpeg'),
(15, 'Ona', 'Romaitė', 2023931, 'ona123@inbox.lt', 'Plunge', 'Lietuva', '', 'VolunteerPic.jpeg'),
(72, '', '', 0, '', '', '', '', 'VolunteerPic.jpeg'),
(73, '', '', 0, '', '', '', '', 'VolunteerPic.jpeg'),
(74, '', '', 0, '', '', '', '', 'VolunteerPic.jpeg'),
(75, '', '', 0, '', '', '', '', 'VolunteerPic.jpeg'),
(76, '', '', 0, '', '', '', '', 'VolunteerPic.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_event`
--

CREATE TABLE `volunteer_event` (
  `volunteer_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteer_event`
--

INSERT INTO `volunteer_event` (`volunteer_id`, `event_id`) VALUES
(2, 54),
(3, 55);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3BAE0AA79E6B1585` (`organisation_id`);

--
-- Indexes for table `invite`
--
ALTER TABLE `invite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FBD8E0F88EFAB6B1` (`volunteer_id`),
  ADD KEY `IDX_FBD8E0F85FA33B08` (`job_type_id`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_794381C68EFAB6B1` (`volunteer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer_event`
--
ALTER TABLE `volunteer_event`
  ADD PRIMARY KEY (`volunteer_id`,`event_id`),
  ADD KEY `IDX_9C0D7558EFAB6B1` (`volunteer_id`),
  ADD KEY `IDX_9C0D75571F7E88B` (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `invite`
--
ALTER TABLE `invite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_3BAE0AA79E6B1585` FOREIGN KEY (`organisation_id`) REFERENCES `organisation` (`id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `FK_FBD8E0F85FA33B08` FOREIGN KEY (`job_type_id`) REFERENCES `job_type` (`id`),
  ADD CONSTRAINT `FK_FBD8E0F88EFAB6B1` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteer` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_794381C68EFAB6B1` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteer` (`id`);

--
-- Constraints for table `volunteer_event`
--
ALTER TABLE `volunteer_event`
  ADD CONSTRAINT `FK_9C0D75571F7E88B` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9C0D7558EFAB6B1` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteer` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
