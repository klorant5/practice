-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: dev1-gm
-- Generation Time: Mar 19, 2017 at 09:30 PM
-- Server version: 5.5.53-0+deb8u1-log
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blacklist`
--

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE IF NOT EXISTS `nationality` (
  `nationality_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`nationality_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=202 ;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`nationality_id`, `name`) VALUES
(1, 'Afghan'),
(2, 'Albanian'),
(3, 'Algerian'),
(4, 'American'),
(5, 'Andorran'),
(6, 'Angolan'),
(7, 'Antiguans'),
(8, 'Argentinean'),
(9, 'Armenian'),
(10, 'Australian'),
(11, 'Austrian'),
(12, 'Azerbaijani'),
(13, 'Bahamian'),
(14, 'Bahraini'),
(15, 'Bangladeshi'),
(16, 'Barbadian'),
(17, 'Barbudans'),
(18, 'Batswana'),
(19, 'Belarusian'),
(20, 'Belgian'),
(21, 'Belizean'),
(22, 'Beninese'),
(23, 'Bhutanese'),
(24, 'Bolivian'),
(25, 'Bosnian'),
(26, 'Brazilian'),
(27, 'British'),
(28, 'Bruneian'),
(29, 'Bulgarian'),
(30, 'Burkinabe'),
(31, 'Burmese'),
(32, 'Burundian'),
(33, 'Cambodian'),
(34, 'Cameroonian'),
(35, 'Canadian'),
(36, 'Cape Verdean'),
(37, 'Central African'),
(38, 'Chadian'),
(39, 'Chilean'),
(40, 'Chinese'),
(41, 'Colombian'),
(42, 'Comoran'),
(43, 'Congolese'),
(45, 'Costa Rican'),
(46, 'Croatian'),
(47, 'Cuban'),
(48, 'Cypriot'),
(49, 'Czech'),
(50, 'Danish'),
(51, 'Djibouti'),
(52, 'Dominican'),
(54, 'Dutch'),
(55, 'Dutchman'),
(56, 'Dutchwoman'),
(57, 'East Timorese'),
(58, 'Ecuadorean'),
(59, 'Egyptian'),
(60, 'Emirian'),
(61, 'Equatorial Guinean'),
(62, 'Eritrean'),
(63, 'Estonian'),
(64, 'Ethiopian'),
(65, 'Fijian'),
(66, 'Filipino'),
(67, 'Finnish'),
(68, 'French'),
(69, 'Gabonese'),
(70, 'Gambian'),
(71, 'Georgian'),
(72, 'German'),
(73, 'Ghanaian'),
(74, 'Greek'),
(75, 'Grenadian'),
(76, 'Guatemalan'),
(77, 'Guinea-Bissauan'),
(78, 'Guinean'),
(79, 'Guyanese'),
(80, 'Haitian'),
(81, 'Herzegovinian'),
(82, 'Honduran'),
(83, 'Hungarian'),
(84, 'I-Kiribati'),
(85, 'Icelander'),
(86, 'Indian'),
(87, 'Indonesian'),
(88, 'Iranian'),
(89, 'Iraqi'),
(90, 'Irish'),
(92, 'Israeli'),
(93, 'Italian'),
(94, 'Ivorian'),
(95, 'Jamaican'),
(96, 'Japanese'),
(97, 'Jordanian'),
(98, 'Kazakhstani'),
(99, 'Kenyan'),
(100, 'Kittian and Nevisian'),
(101, 'Kuwaiti'),
(102, 'Kyrgyz'),
(103, 'Laotian'),
(104, 'Latvian'),
(105, 'Lebanese'),
(106, 'Liberian'),
(107, 'Libyan'),
(108, 'Liechtensteiner'),
(109, 'Lithuanian'),
(110, 'Luxembourger'),
(111, 'Macedonian'),
(112, 'Malagasy'),
(113, 'Malawian'),
(114, 'Malaysian'),
(115, 'Maldivan'),
(116, 'Malian'),
(117, 'Maltese'),
(118, 'Marshallese'),
(119, 'Mauritanian'),
(120, 'Mauritian'),
(121, 'Mexican'),
(122, 'Micronesian'),
(123, 'Moldovan'),
(124, 'Monacan'),
(125, 'Mongolian'),
(126, 'Moroccan'),
(127, 'Mosotho'),
(128, 'Motswana'),
(129, 'Mozambican'),
(130, 'Namibian'),
(131, 'Nauruan'),
(132, 'Nepalese'),
(133, 'Netherlander'),
(134, 'New Zealander'),
(135, 'Ni-Vanuatu'),
(136, 'Nicaraguan'),
(137, 'Nigerian'),
(138, 'Nigerien'),
(139, 'North Korean'),
(140, 'Northern Irish'),
(141, 'Norwegian'),
(142, 'Omani'),
(143, 'Pakistani'),
(144, 'Palauan'),
(145, 'Panamanian'),
(146, 'Papua New Guinean'),
(147, 'Paraguayan'),
(148, 'Peruvian'),
(149, 'Polish'),
(150, 'Portuguese'),
(151, 'Qatari'),
(152, 'Romanian'),
(153, 'Russian'),
(154, 'Rwandan'),
(155, 'Saint Lucian'),
(156, 'Salvadoran'),
(157, 'Samoan'),
(158, 'San Marinese'),
(159, 'Sao Tomean'),
(160, 'Saudi'),
(161, 'Scottish'),
(162, 'Senegalese'),
(163, 'Serbian'),
(164, 'Seychellois'),
(165, 'Sierra Leonean'),
(166, 'Singaporean'),
(167, 'Slovakian'),
(168, 'Slovenian'),
(169, 'Solomon Islander'),
(170, 'Somali'),
(171, 'South African'),
(172, 'South Korean'),
(173, 'Spanish'),
(174, 'Sri Lankan'),
(175, 'Sudanese'),
(176, 'Surinamer'),
(177, 'Swazi'),
(178, 'Swedish'),
(179, 'Swiss'),
(180, 'Syrian'),
(181, 'Taiwanese'),
(182, 'Tajik'),
(183, 'Tanzanian'),
(184, 'Thai'),
(185, 'Togolese'),
(186, 'Tongan'),
(187, 'Trinidadian or Tobagonian'),
(188, 'Tunisian'),
(189, 'Turkish'),
(190, 'Tuvaluan'),
(191, 'Ugandan'),
(192, 'Ukrainian'),
(193, 'Uruguayan'),
(194, 'Uzbekistani'),
(195, 'Venezuelan'),
(196, 'Vietnamese'),
(197, 'Welsh'),
(199, 'Yemenite'),
(200, 'Zambian'),
(201, 'Zimbabwean');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
