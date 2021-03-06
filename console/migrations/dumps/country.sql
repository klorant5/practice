-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: dev1-gm
-- Generation Time: Mar 19, 2017 at 10:13 PM
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
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `nationality_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=251 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `nationality_id`) VALUES
(1, 'Afghanistan', 1),
(2, 'Aland Islands', 2),
(3, 'Albania', 3),
(4, 'Algeria', 4),
(5, 'American Samoa', 5),
(6, 'Andorra', 6),
(7, 'Angola', 0),
(8, 'Anguilla', 0),
(9, 'Antarctica', 0),
(10, 'Antigua and Barbuda', 0),
(11, 'Argentina', 8),
(12, 'Armenia', 9),
(13, 'Aruba', 0),
(14, 'Australia', 10),
(15, 'Austria', 11),
(16, 'Azerbaijan', 12),
(17, 'Bahamas', 13),
(18, 'Bahrain', 14),
(19, 'Bangladesh', 15),
(20, 'Barbados', 16),
(21, 'Belarus', 19),
(22, 'Belgium', 20),
(23, 'Belize', 21),
(24, 'Benin', 22),
(25, 'Bermuda', 0),
(26, 'Bhutan', 23),
(27, 'Bolivia', 24),
(28, 'Bonaire, Saint Eustatius and Saba', 0),
(29, 'Bosnia and Herzegovina', 25),
(30, 'Botswana', 18),
(31, 'Bouvet Island', 0),
(32, 'Brazil', 26),
(33, 'British Indian Ocean Territory', 0),
(34, 'British Virgin Islands', 0),
(35, 'Brunei', 28),
(36, 'Bulgaria', 29),
(37, 'Burkina Faso', 30),
(38, 'Burundi', 32),
(39, 'Cambodia', 33),
(40, 'Cameroon', 34),
(41, 'Canada', 35),
(42, 'Cape Verde', 36),
(43, 'Cayman Islands', 0),
(44, 'Central African Republic', 37),
(45, 'Chad', 38),
(46, 'Chile', 39),
(47, 'China', 40),
(48, 'Christmas Island', 0),
(49, 'Cocos Islands', 0),
(50, 'Colombia', 41),
(51, 'Comoros', 42),
(52, 'Cook Islands', 0),
(53, 'Costa Rica', 45),
(54, 'Croatia', 46),
(55, 'Cuba', 47),
(56, 'Curacao', 0),
(57, 'Cyprus', 48),
(58, 'Czech Republic', 49),
(59, 'Democratic Republic of the Congo', 43),
(60, 'Denmark', 50),
(61, 'Djibouti', 51),
(62, 'Dominica', 52),
(63, 'Dominican Republic', 52),
(64, 'East Timor', 57),
(65, 'Ecuador', 58),
(66, 'Egypt', 59),
(67, 'El Salvador', 156),
(68, 'Equatorial Guinea', 61),
(69, 'Eritrea', 62),
(70, 'Estonia', 63),
(71, 'Ethiopia', 64),
(72, 'Falkland Islands', 0),
(73, 'Faroe Islands', 0),
(74, 'Fiji', 65),
(75, 'Finland', 67),
(76, 'France', 68),
(77, 'French Guiana', 0),
(78, 'French Polynesia', 0),
(79, 'French Southern Territories', 0),
(80, 'Gabon', 69),
(81, 'Gambia', 70),
(82, 'Georgia', 71),
(83, 'Germany', 72),
(84, 'Ghana', 73),
(85, 'Gibraltar', 0),
(86, 'Greece', 74),
(87, 'Greenland', 0),
(88, 'Grenada', 75),
(89, 'Guadeloupe', 0),
(90, 'Guam', 0),
(91, 'Guatemala', 76),
(92, 'Guernsey', 0),
(93, 'Guinea', 0),
(94, 'Guinea-Bissau', 77),
(95, 'Guyana', 79),
(96, 'Haiti', 80),
(97, 'Heard Island and McDonald Islands', 0),
(98, 'Honduras', 82),
(99, 'Hong Kong', 0),
(100, 'Hungary', 83),
(101, 'Iceland', 85),
(102, 'India', 86),
(103, 'Indonesia', 87),
(104, 'Iran', 88),
(105, 'Iraq', 89),
(106, 'Ireland', 90),
(107, 'Isle of Man', 90),
(108, 'Israel', 92),
(109, 'Italy', 93),
(110, 'Ivory Coast', 94),
(111, 'Jamaica', 95),
(112, 'Japan', 96),
(113, 'Jersey', 0),
(114, 'Jordan', 97),
(115, 'Kazakhstan', 98),
(116, 'Kenya', 99),
(117, 'Kiribati', 0),
(118, 'Kosovo', 0),
(119, 'Kuwait', 101),
(120, 'Kyrgyzstan', 102),
(121, 'Laos', 103),
(122, 'Latvia', 104),
(123, 'Lebanon', 105),
(124, 'Lesotho', 0),
(125, 'Liberia', 106),
(126, 'Libya', 107),
(127, 'Liechtenstein', 108),
(128, 'Lithuania', 109),
(129, 'Luxembourg', 110),
(130, 'Macao', 0),
(131, 'Macedonia', 111),
(132, 'Madagascar', 112),
(133, 'Malawi', 113),
(134, 'Malaysia', 114),
(135, 'Maldives', 115),
(136, 'Mali', 116),
(137, 'Malta', 117),
(138, 'Marshall Islands', 118),
(139, 'Martinique', 0),
(140, 'Mauritania', 119),
(141, 'Mauritius', 120),
(142, 'Mayotte', 0),
(143, 'Mexico', 121),
(144, 'Micronesia', 122),
(145, 'Moldova', 123),
(146, 'Monaco', 124),
(147, 'Mongolia', 125),
(148, 'Montenegro', 0),
(149, 'Montserrat', 0),
(150, 'Morocco', 126),
(151, 'Mozambique', 129),
(152, 'Myanmar', 0),
(153, 'Namibia', 130),
(154, 'Nauru', 131),
(155, 'Nepal', 132),
(156, 'Netherlands', 133),
(157, 'New Caledonia', 0),
(158, 'New Zealand', 134),
(159, 'Nicaragua', 136),
(160, 'Niger', 137),
(161, 'Nigeria', 138),
(162, 'Niue', 0),
(163, 'Norfolk Island', 0),
(164, 'North Korea', 139),
(165, 'Northern Mariana Islands', 0),
(166, 'Norway', 141),
(167, 'Oman', 142),
(168, 'Pakistan', 143),
(169, 'Palau', 144),
(170, 'Palestinian Territory', 0),
(171, 'Panama', 145),
(172, 'Papua New Guinea', 146),
(173, 'Paraguay', 147),
(174, 'Peru', 148),
(175, 'Philippines', 0),
(176, 'Pitcairn', 0),
(177, 'Poland', 149),
(178, 'Portugal', 150),
(179, 'Puerto Rico', 0),
(180, 'Qatar', 151),
(181, 'Republic of the Congo', 43),
(182, 'Reunion', 0),
(183, 'Romania', 152),
(184, 'Russia', 153),
(185, 'Rwanda', 154),
(186, 'Saint Barthelemy', 0),
(187, 'Saint Helena', 0),
(188, 'Saint Kitts and Nevis', 0),
(189, 'Saint Lucia', 155),
(190, 'Saint Martin', 0),
(191, 'Saint Pierre and Miquelon', 0),
(192, 'Saint Vincent and the Grenadines', 0),
(193, 'Samoa', 157),
(194, 'San Marino', 158),
(195, 'Sao Tome and Principe', 159),
(196, 'Saudi Arabia', 160),
(197, 'Senegal', 162),
(198, 'Serbia', 163),
(199, 'Seychelles', 202),
(200, 'Sierra Leone', 165),
(201, 'Singapore', 166),
(202, 'Sint Maarten', 0),
(203, 'Slovakia', 167),
(204, 'Slovenia', 168),
(205, 'Solomon Islands', 169),
(206, 'Somalia', 170),
(207, 'South Africa', 171),
(208, 'South Georgia and the South Sandwich Islands', 0),
(209, 'South Korea', 172),
(210, 'South Sudan', 0),
(211, 'Spain', 173),
(212, 'Sri Lanka', 174),
(213, 'Sudan', 175),
(214, 'Suriname', 176),
(215, 'Svalbard and Jan Mayen', 0),
(216, 'Swaziland', 177),
(217, 'Sweden', 178),
(218, 'Switzerland', 179),
(219, 'Syria', 180),
(220, 'Taiwan', 181),
(221, 'Tajikistan', 182),
(222, 'Tanzania', 183),
(223, 'Thailand', 184),
(224, 'Togo', 185),
(225, 'Tokelau', 0),
(226, 'Tonga', 186),
(227, 'Trinidad and Tobago', 187),
(228, 'Tunisia', 188),
(229, 'Turkey', 189),
(230, 'Turkmenistan', 0),
(231, 'Turks and Caicos Islands', 0),
(232, 'Tuvalu', 190),
(233, 'U.S. Virgin Islands', 0),
(234, 'Uganda', 191),
(235, 'Ukraine', 192),
(236, 'United Arab Emirates', 60),
(237, 'United Kingdom', 27),
(238, 'United States', 4),
(239, 'United States Minor Outlying Islands', 0),
(240, 'Uruguay', 193),
(241, 'Uzbekistan', 194),
(242, 'Vanuatu', 0),
(243, 'Vatican', 0),
(244, 'Venezuela', 195),
(245, 'Vietnam', 196),
(246, 'Wallis and Futuna', 0),
(247, 'Western Sahara', 0),
(248, 'Yemen', 199),
(249, 'Zambia', 200),
(250, 'Zimbabwe', 201);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
