-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2016 at 01:16 PM
-- Server version: 5.6.30
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sgappsto_dbr`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'brand 1'),
(2, 'brand 2');

-- --------------------------------------------------------

--
-- Table structure for table `cartridges`
--

CREATE TABLE IF NOT EXISTS `cartridges` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cartridges`
--

INSERT INTO `cartridges` (`id`, `name`) VALUES
(1, 'cartridge 1'),
(2, 'cartridge 2');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryaddress`
--

CREATE TABLE IF NOT EXISTS `deliveryaddress` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(30) DEFAULT NULL,
  `fullname` varchar(300) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `country` varchar(300) DEFAULT NULL,
  `postalcode` varchar(300) DEFAULT NULL,
  `phone` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=211 ;

--
-- Dumping data for table `deliveryaddress`
--

INSERT INTO `deliveryaddress` (`id`, `user_id`, `fullname`, `address`, `country`, `postalcode`, `phone`) VALUES
(1, 32, 'fname', 'adrs1', 'IND', '143001', '124334'),
(2, 32, NULL, NULL, NULL, NULL, NULL),
(3, 32, NULL, NULL, NULL, NULL, NULL),
(4, 43, 'testfullname', 'chd', 'ind', '14399', '99888'),
(5, 43, 'testfullname11', 'chd11', 'ind11', '1439911', '9988811'),
(6, 43, 'testfullname111', NULL, NULL, NULL, NULL),
(7, 43, 'testfullname111', 'chd11', 'ind11', '1439911', '9988811'),
(8, 43, 'testfullname111', 'chd11', 'ind11', '1439911', '9988811'),
(9, 32, 'testfullname111', 'chd11', 'ind11', '1439911', '9988811'),
(10, 32, 'testfullname111', 'chd11', 'ind11', '1439911', '9988811'),
(11, 1, 'testfullname111', 'chd11', 'ind11', '1439911', '9988811'),
(109, NULL, 'Android Coder', 'Phase 11 ', 'India', '151645', '64548454'),
(110, 109, 'Android Coder', 'Phase 11 ', 'India', '151645', '64548454'),
(111, 109, 'Harry Chef', 'Airport Link Road, Chandigarh', 'India ', '978345', '74523642'),
(112, 109, 'Harry Chef', 'Airport Link Road, Chandigarh', 'India', '465484', '8484848'),
(113, 118, '', '', '', '', NULL),
(114, 118, 'Mari', '123,qertt', 'singapore', '898989', '96452856'),
(115, 163, 'The i', 'Singapore  street , Singapore', 'Singapore', '648769', '676488464'),
(116, 163, 'The i', 'Singapore  street , Singapore', 'Singapore', '648769', '676488464'),
(117, 163, 'The i', 'Singapore  street , Singapore', 'Singapore', '648769', '676488464'),
(118, 163, 'The i', 'Singapore  street , Singapore', 'Singapore', '648769', '676488464'),
(119, 88, 'Php Dev', 'Singapore , Singapore', 'Singapore', '865567', '55558866'),
(120, 88, 'Php Dev', 'Singapore , Singapore', 'Singapore', '865567', '55558866'),
(121, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(122, 38, ' ', ' , ', NULL, NULL, '1234567890'),
(123, 38, ' ', ' , ', NULL, NULL, '1234567890'),
(124, 38, ' ', ' , ', NULL, NULL, '987654321'),
(125, 38, ' ', ' , ', NULL, NULL, '987654321'),
(126, 38, ' ', ' , ', NULL, NULL, '1234567890'),
(127, 38, ' ', ' , ', NULL, NULL, NULL),
(128, 38, ' ', ' , ', NULL, NULL, NULL),
(129, 38, ' ', ' , ', NULL, NULL, NULL),
(130, 38, ' ', ' , ', NULL, NULL, '1234567890'),
(131, 38, ' ', ' , ', NULL, NULL, '987654321'),
(132, 38, ' ', ' , ', NULL, NULL, NULL),
(133, 38, ' ', ' , ', NULL, NULL, '98'),
(134, 38, ' ', ' , ', NULL, NULL, NULL),
(135, 38, ' ', ' , ', NULL, NULL, '9223372036854775807'),
(136, 164, 'mark', 'Singapore street #1223', '', '545544', '654486'),
(137, 38, ' ', ' , ', NULL, NULL, '123456'),
(138, 38, ' ', ' , ', NULL, NULL, '123456'),
(139, 38, ' ', ' , ', NULL, NULL, '123456'),
(140, 38, ' ', ' , ', NULL, NULL, '123456'),
(141, 38, ' ', ' , ', NULL, NULL, '123456'),
(142, 38, ' ', ' , ', NULL, NULL, '123456'),
(143, 164, '', '', '', '', ''),
(144, 38, ' ', ' , ', NULL, NULL, '123456'),
(145, 38, ' ', ' , ', NULL, NULL, '123456'),
(146, 38, ' ', ' , ', NULL, NULL, '123456'),
(147, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(148, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(149, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(150, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(151, 164, ' ', ' , ', NULL, NULL, NULL),
(152, 119, 'sjjjs sjjas', 'ehjjwe sdjej, sjdjs', 'sjsj', '799888', '123456'),
(153, 164, '', '', '', '', ''),
(154, 164, '', '', '', '', ''),
(155, 175, 'toner 88', '10.tomoorrow road yesherday highway, songapore', 'somgapore', '400008', '898989898'),
(156, 118, 'qwertt', '12.smmdkkk', 'songapore', '400010', '81081081'),
(157, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(158, 164, 'david lee', 'Singapore street #425 Richard, Singapore', 'Singapore', '945464', '46646545'),
(159, 164, 'david lee', 'Singapore street #425 Richard, Singapore', 'Singapore', '945464', '46646545'),
(160, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(161, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(162, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(163, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(164, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(165, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(166, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(167, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(168, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(169, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(170, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(171, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(172, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(173, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(174, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(175, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(176, 178, 'rock lee', 'Singapore street #2332 Singapore Singapore, Singapore', 'Singapore', '946554', '64564555465'),
(177, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(178, 164, 'david lee', 'Singapore street #425 , Singapore', 'Singapore', '945464', '46646545'),
(179, 164, 'david lee', 'Singapore street #425 i, Singapore', 'Singapore', '945464', '46646545'),
(180, 164, 'david lee', 'Singapore street #425 i, Singapore', 'Singapore', '945464', '46646545'),
(181, 178, 'rock lee', 'Singapore street #2332 Singapore Singapore, Singapore', 'Singapore', '946554', '64564555465'),
(182, 178, 'rock lee', 'Singapore street #2332 Singapore Singapore, Singapore', 'Singapore', '946554', '64564555465'),
(183, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(184, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(185, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(186, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(187, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(188, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(189, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(190, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(191, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(192, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(193, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(194, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(195, 164, 'david lee', 'Singapore street #425 t, Singapore', 'Singapore', '945464', '46646545'),
(196, 179, 'harry lee', 'Singapore street #414 Singapore Singapore, Singapore', 'Singapore', '645855', '6458555756'),
(197, 179, 'harry lee', 'Singapore street #414 Singapore Singapore, Singapore', 'Singapore', '645855', '6458555756'),
(198, 179, 'harry lee', 'Singapore street #414 Singapore Singapore, Singapore', 'Singapore', '645855', '6458555756'),
(199, 179, 'harry lee', 'Singapore street #414 Singapore Singapore, Singapore', 'Singapore', '645855', '6458555756'),
(200, 179, 'harry lee', 'Singapore street #414 Singapore Singapore, Singapore', 'Singapore', '645855', '6458555756'),
(201, 179, 'harry lee', 'Singapore street #414 Singapore Singapore, Singaporea', 'Singapore', '645855', '6458555756'),
(202, 179, 'harry lee', 'Singapore street #414 Singapore Singapore, Singaporea', 'Singapore', '645855', '6458555756'),
(203, 180, 'Ansh Coder', 'SGI Shenton House, Shenton Way', 'Singapore', '068805', '97364441'),
(204, 179, 'harry lee', 'Singapore street #414 Singapore Singapore, Singaporea', 'Singapore', '645855', '6458555756'),
(205, 179, 'harry lee', 'Singapore street #414 Singapore Singapore, Singaporea', 'Singapore', '645855', '6458555756'),
(206, 179, 'harry lee', 'Singapore street #414 Singapore Singapore, Singaporea', 'Singapore', '645855', '6458555756'),
(207, 181, 'Php Developer', 'Singapore Singapore, Singapore', 'Singapore', '465454', '845454548'),
(208, 179, 'tannn', '234.thhbb bhjj', 'singapore', '400000', '58585858'),
(209, 182, 'Php Developer', 'Singapore street Singapore, Singapore', 'Singapore', '645455', '495454545'),
(210, 180, 'Ansh Coder', 'SGI Shenton House, Shenton Way', 'Singapore', '068805', '97364441');

-- --------------------------------------------------------

--
-- Table structure for table `deliverysettings`
--

CREATE TABLE IF NOT EXISTS `deliverysettings` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `waive_delivery_charges_for_order_above` decimal(10,2) NOT NULL,
  `delivery_fee_normal` decimal(10,2) NOT NULL,
  `delivery_fee_urgent` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `deliverysettings`
--

INSERT INTO `deliverysettings` (`id`, `waive_delivery_charges_for_order_above`, `delivery_fee_normal`, `delivery_fee_urgent`) VALUES
(1, '12.00', '20.00', '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `enquirys`
--

CREATE TABLE IF NOT EXISTS `enquirys` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(30) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `enquirys`
--

INSERT INTO `enquirys` (`id`, `user_id`, `name`, `email`, `subject`, `message`) VALUES
(1, 43, '', '', '', ''),
(2, 43, '', '', '', ''),
(3, 43, '', '', '', ''),
(4, 43, NULL, NULL, NULL, NULL),
(5, 43, NULL, NULL, NULL, NULL),
(6, 43, 'en name', 'ee@gg.com', 'subject1', ' enquiry message'),
(7, 43, NULL, NULL, NULL, NULL),
(8, 5, 'en name', 'ee@gg.com', 'subject1', ' enquiry message'),
(9, 114, '', '', '', 'Type here...'),
(10, 114, 'bzzbzbbz', 'zbzbbzxdd@fff.ggf', 'zbbzbzbz', 'eewxzsh'),
(11, 114, 'svshhshsh', 'dvhssh@shhdhdh.shdhdj', 'aghshsh', 'vzvzvzvzvz'),
(12, 112, 'Test', 'test@gmail.com', 'Test subject', 'Test message'),
(13, 112, 'Test Name', 'test@gmail.com', 'Test Subject', 'Test message'),
(14, 164, 'hi', 'harry@yopmail.com', 'hi this email ee', 'hi this is a good time to get the best of my friends in a while ago and I will have the same as the one I am not sure if you are doing well in advance and have a great day and time of day and the'),
(15, 118, 'tannp', 'tannp@yopmail.com', 'qwerty', 'cghjj ghjjk fghj'),
(16, 179, 'Harry', 'harry@yopmail.com', 'hi this is an', 'hi this is I isn''t the case\n know if you');

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE IF NOT EXISTS `gifts` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `gift_name` varchar(250) NOT NULL,
  `description` varchar(400) NOT NULL,
  `gift_image` varchar(255) NOT NULL,
  `gift_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`id`, `gift_name`, `description`, `gift_image`, `gift_status`) VALUES
(9, 'gifname', 'descccccccccc', '1468228578.', 0),
(10, 'final test1', 'descr', '1468220567.jpg', 1),
(12, 'dsdss', 'dsd', '1468222960.jpg', 1),
(13, 'dsfdsf', '', '1468228679.', 1),
(14, 'gift1', 'desc1', '1468418697.', 0),
(15, 'test gift', 'gift', '1468419179.jpg', 1),
(16, 'now', 'testing data only ', '1468479569.jpeg', 1),
(17, 'new', 'hi ', '1468479620.jpg', 1),
(18, 'sdf', 'sdfsdf', '1468479639.jpg', 1),
(19, 'sdf', 'sdfsdf', '1468479651.jpg', 1),
(20, 'sdf', 'sdf', '1468479663.jpg', 1),
(21, 'Gift', 'descr', '1469011396.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `nid` bigint(30) NOT NULL DEFAULT '0',
  `type` varchar(250) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` int(1) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `nid`, `type`, `message`, `status`, `create_date`) VALUES
(1, 0, 'Notification', '1Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, ', 1, '2016-07-20 00:00:00'),
(2, 11, 'Promotion', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '2016-07-07 00:00:00'),
(3, 0, 'Notification', 'newwwww   hjgj', 1, '2016-07-07 00:00:00'),
(4, 12, 'Promotion', 'newwwwwwwwww messsssLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more ', 1, '2016-07-07 00:00:00'),
(5, 0, 'Notification', 'test', 1, '2016-07-07 00:00:00'),
(6, 0, 'Notification', 'sdfsdfsdf', 1, '2016-07-07 00:00:00'),
(7, 0, 'Notification', '', 1, '2016-07-07 00:00:00'),
(8, 0, 'Notification', '', 1, '2016-07-07 00:00:00'),
(9, 0, 'notification', 'mess', 1, '2016-07-08 00:00:00'),
(10, 0, 'notification', 'dsdsds', 1, '2016-07-11 00:00:00'),
(11, 0, 'notification', 'Test', 1, '2016-07-11 00:00:00'),
(12, 0, 'notification', 'Test Message', 1, '2016-07-12 00:00:00'),
(13, 0, 'notification', 'Test message 2', 1, '2016-07-12 00:00:00'),
(14, 0, 'notification', 'TestMessage3', 1, '2016-07-12 00:00:00'),
(16, 0, 'notification', 'dssds', 1, '2016-07-12 00:00:00'),
(18, 0, 'notification', 'syysa', 1, '2016-07-12 00:00:00'),
(19, 0, 'notification', 'newww test', 1, '2016-07-12 00:00:00'),
(20, 0, 'notification', 'saasasa', 1, '2016-07-13 00:00:00'),
(21, 0, 'notification', 'dsssdss', 1, '2016-07-13 00:00:00'),
(22, 0, 'notification', 'dsssds', 1, '2016-07-14 00:00:00'),
(23, 0, 'notification', '', 1, '2016-07-14 00:00:00'),
(24, 0, 'notification', '', 1, '2016-07-14 00:00:00'),
(25, 0, 'notification', '', 1, '2016-07-14 00:00:00'),
(26, 0, 'notification', 'new messages ', 1, '2016-07-14 00:00:00'),
(27, 0, 'notification', 'saaaa', 1, '2016-07-15 00:00:00'),
(28, 0, 'notification', 'wewewwe', 1, '2016-07-18 00:00:00'),
(29, 0, 'notification', 'TEST NOTIFICATION 1', 1, '2016-07-18 00:00:00'),
(30, 0, 'notification', 'tst', 1, '2016-07-18 00:00:00'),
(31, 0, 'notification', 'second testing', 1, '2016-07-18 00:00:00'),
(32, 0, 'notification', 'TESTEE1', 1, '2016-07-18 00:00:00'),
(33, 0, 'notification', 'TESTEE 2', 1, '2016-07-18 00:00:00'),
(35, 0, 'notification', 'hi', 1, '2016-07-19 00:00:00'),
(39, 0, 'notification', 'hi', 1, '2016-07-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `order_user_id` int(20) NOT NULL DEFAULT '0',
  `order_transaction_id` varchar(100) NOT NULL DEFAULT '0',
  `order_gift_id` int(25) DEFAULT '0',
  `order_promocode` varchar(100) DEFAULT NULL,
  `order_username` varchar(255) NOT NULL,
  `order_num` varchar(100) NOT NULL DEFAULT '0',
  `order_status` varchar(50) DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `order_date_delivery` date NOT NULL DEFAULT '0000-00-00',
  `order_product_name` varchar(50) DEFAULT NULL,
  `order_shipping_weight` varchar(50) NOT NULL DEFAULT '0',
  `order_shipping_method` varchar(25) DEFAULT NULL,
  `order_delivery_method` varchar(200) DEFAULT NULL,
  `order_recipient` varchar(100) NOT NULL,
  `order_address_line1` varchar(80) NOT NULL,
  `order_address_line2` varchar(80) DEFAULT NULL,
  `order_city` varchar(80) DEFAULT NULL,
  `order_country` int(20) NOT NULL DEFAULT '0',
  `order_postal_code` bigint(40) NOT NULL DEFAULT '0',
  `order_phone_num` bigint(30) NOT NULL,
  `order_same_billing_detail` varchar(255) DEFAULT NULL,
  `order_delivery_recipient` varchar(255) DEFAULT NULL,
  `order_delivery_address_line1` varchar(255) DEFAULT NULL,
  `order_delivery_address_line2` varchar(255) DEFAULT NULL,
  `order_delivery_city` varchar(255) DEFAULT NULL,
  `order_delivery_postal_code` varchar(50) DEFAULT NULL,
  `order_delivery_phone_num` varchar(50) DEFAULT NULL,
  `order_description` varchar(255) DEFAULT NULL,
  `order_sub_total` decimal(30,2) NOT NULL DEFAULT '0.00',
  `order_shipping_cost` decimal(20,2) NOT NULL DEFAULT '0.00',
  `order_estimated_tax` bigint(30) NOT NULL DEFAULT '0',
  `order_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `order_from` int(11) DEFAULT NULL COMMENT '1-web,2-app',
  `order_deliveryby` int(11) DEFAULT NULL COMMENT '1-self collect,2-for urgent deliveries	',
  `order_deliverybytime` varchar(255) DEFAULT NULL,
  `order_attention_to` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_user_id`, `order_transaction_id`, `order_gift_id`, `order_promocode`, `order_username`, `order_num`, `order_status`, `order_date`, `order_date_delivery`, `order_product_name`, `order_shipping_weight`, `order_shipping_method`, `order_delivery_method`, `order_recipient`, `order_address_line1`, `order_address_line2`, `order_city`, `order_country`, `order_postal_code`, `order_phone_num`, `order_same_billing_detail`, `order_delivery_recipient`, `order_delivery_address_line1`, `order_delivery_address_line2`, `order_delivery_city`, `order_delivery_postal_code`, `order_delivery_phone_num`, `order_description`, `order_sub_total`, `order_shipping_cost`, `order_estimated_tax`, `order_total`, `order_from`, `order_deliveryby`, `order_deliverybytime`, `order_attention_to`) VALUES
(92, 0, '0', 0, NULL, 'test customer', 'oD1', 'pending', '2016-07-19 00:00:00', '0000-00-00', NULL, '34', '10', '35', 'Check Smith', 'sINGAPOERE', '', 'townshipt', 0, 232323, 2323232, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '400.00', '0.00', 0, '400.00', NULL, NULL, NULL, NULL),
(93, 0, '0', 0, NULL, 'TEST2', 'Od2', 'pending', '2016-07-19 00:00:00', '0000-00-00', NULL, '1000', '10', '35', 'rec13', 'compy12', '', 'town', 0, 13243, 121321312, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1000.00', '1.00', 1, '1002.00', NULL, NULL, NULL, NULL),
(94, 0, '0', 0, NULL, 'test3', 'oD3', 'pending', '2016-07-19 00:00:00', '0000-00-00', NULL, '300', '10', '35', 'rec134', 'compy1', '', 'towns', 0, 34452, 3241414, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800.00', '1.00', 1, '802.00', NULL, NULL, NULL, NULL),
(95, 0, '0', 0, NULL, 'test4', 'oD4', 'pending', '2016-07-19 00:00:00', '0000-00-00', NULL, '400', '10', '35', 'rec12', 'adrs1', '', 'town', 0, 12341234, 1243414, '1', '', '', '', '', '', '', NULL, '700.00', '0.00', 0, '700.00', NULL, NULL, NULL, NULL),
(96, 0, '0', 0, NULL, 'TEST5', 'OD5', 'pending', '2016-07-19 00:00:00', '0000-00-00', NULL, '400', '10', '35', '22323', 'adr1', '', 'town', 0, 1338560, 121321312, '1', '', '', '', '', '', '', NULL, '700.00', '1.00', 2, '703.00', NULL, NULL, NULL, NULL),
(97, 0, '0', 0, NULL, 'CNA12', 'OD45', 'Pending', '2016-07-20 00:00:00', '0000-00-00', NULL, '400', '10', '35', 'recipie12', 'adres1', '', 'city', 0, 565676, 766556, '0', 'rec455', 'compy1', '', 'town another', '1234', '4535325325', NULL, '30.00', '1.00', 1, '32.00', NULL, NULL, NULL, NULL),
(98, 0, '0', 0, NULL, 'TEST', 'OD5', 'pending', '2016-07-20 00:00:00', '0000-00-00', NULL, '1000', '10', '35', '124325', 'adrs1', 'adr2', 'city', 0, 13243, 9898, '0', '7 67667', 'adrs1', '', 'town another', '8778', '432525', NULL, '315.00', '0.00', 0, '315.00', NULL, NULL, NULL, NULL),
(101, 179, 'PAY-6PU626847B294842SKPEWXHY', 0, NULL, 'harry lee', '0', 'pending', '2016-07-21 09:38:19', '0000-00-00', NULL, '0', NULL, NULL, 'harry lee', 'Singapore street #414 Singapore Singapore, Singapore', NULL, NULL, 0, 645855, 6458555756, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', 0, '300.00', 1, 196, 'Monday to Friday\n(expect p.h) 9:00am - 12:00pm', NULL),
(102, 179, 'PAY-6PU626847B294842SKPEWXHY', 0, NULL, 'harry lee', '0', 'pending', '2016-07-21 09:38:53', '0000-00-00', NULL, '0', NULL, NULL, 'harry lee', 'Singapore street #414 Singapore Singapore, Singapore', NULL, NULL, 0, 645855, 6458555756, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', 0, '300.00', 1, 196, 'Monday to Friday\n(expect p.h) 9:00am - 12:00pm', NULL),
(103, 179, 'PAY-6PU626847B294842SKPEWXHY', 0, NULL, 'harry lee', '0', 'pending', '2016-07-21 09:40:05', '0000-00-00', NULL, '0', NULL, NULL, 'harry lee', 'Singapore street #414 Singapore Singapore, Singapore', NULL, NULL, 0, 645855, 6458555756, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', 0, '650.00', 1, 196, 'Monday to Friday\n(expect p.h) 9:00am - 12:00pm', NULL),
(104, 179, 'PAY-6PU626847B294842SKPEWXHY', 0, NULL, 'harry lee', '0', 'pending', '2016-07-21 09:40:41', '0000-00-00', NULL, '0', NULL, NULL, 'harry lee', 'Singapore street #414 Singapore Singapore, Singapore', NULL, NULL, 0, 645855, 6458555756, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', 0, '650.00', 1, 196, 'Monday to Friday\n(expect p.h) 9:00am - 12:00pm', NULL),
(105, 179, 'PAY-6PU626847B294842SKPEWXHY', 0, NULL, 'harry lee', '0', 'pending', '2016-07-21 09:47:27', '0000-00-00', NULL, '0', NULL, NULL, 'harry lee', 'Singapore street #414 Singapore Singapore, Singapore', NULL, NULL, 0, 645855, 6458555756, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', 0, '650.00', 1, 196, 'Monday to Friday\n(expect p.h) 9:00am - 12:00pm', NULL),
(106, 179, 'PAY-6PU626847B294842SKPEWXHY', 0, NULL, 'harry lee', '0', 'pending', '2016-07-21 09:53:02', '0000-00-00', NULL, '0', NULL, NULL, 'harry lee', 'Singapore street #414 Singapore Singapore, Singapore', NULL, NULL, 0, 645855, 6458555756, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', 0, '650.00', 1, 196, 'Monday to Friday\n(expect p.h) 9:00am - 12:00pm', NULL),
(107, 179, 'PAY-6PU626847B294842SKPEWXHY', 0, NULL, 'harry lee', '0', 'intransit', '2016-07-21 00:00:00', '0000-00-00', NULL, '0', '11', '35', 'harry lee', 'Singapore street #414 Singapore Singapore, Singapore', '', 'singapore', 0, 645855, 6458555756, '0', '', '', '', '', '', '', NULL, '0.00', '0.00', 0, '300.00', 1, 196, 'Monday to Friday\n(expect p.h) 9:00am - 12:00pm', NULL),
(108, 180, 'PAY-6PU626847B294842SKPEWXHY', 0, NULL, 'Ansh Coder', '0', 'Completed', '2016-07-22 00:00:00', '0000-00-00', NULL, '0', '10', '35', 'Ansh Coder', 'SGI Shenton House, Shenton Way', '', 'singapore', 0, 68805, 97364441, '0', '', '', '', '', '', '', NULL, '0.00', '0.00', 0, '650.00', 1, 203, 'Monday to Friday\n(expect p.h) 9:00am - 12:00pm', NULL),
(109, 0, '0', 0, NULL, 'c13', 'orderno', 'Pending', '2016-07-22 00:00:00', '0000-00-00', NULL, '200', 'Grams', '36', '22323', 'adr1', 'adr2', 'town', 0, 13243, 9898, '1', '22323', 'adr1', 'adr2', 'town', '13243', '9898', NULL, '40.00', '0.00', 0, '40.00', NULL, NULL, NULL, NULL),
(110, 0, '0', 0, NULL, 'CNA', '0', 'Pending', '2016-07-22 00:00:00', '0000-00-00', NULL, '10', 'Kilograms', '35', '22323', 'adr1', 'adr2', 'town', 0, 13243, 121321312, '0', '563563', 'compy1', 'differ', 'town another', '8778', '54545', NULL, '320.00', '0.00', 0, '320.00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertracks`
--

CREATE TABLE IF NOT EXISTS `ordertracks` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(30) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `ordertracks`
--

INSERT INTO `ordertracks` (`id`, `order_id`, `order_status`, `order_date`) VALUES
(1, 69, 'pending', '2016-07-08 00:00:00'),
(2, 69, 'approved', '2016-07-09 00:00:00'),
(3, 69, 'dispatched', '2016-07-09 00:00:00'),
(4, 69, 'processing', '2016-07-11 00:00:00'),
(6, 69, 'completed', '2016-07-12 00:00:00'),
(7, 80, 'completed', '2016-07-16 00:00:00'),
(9, 107, 'completed', '2016-07-21 00:00:00'),
(10, 107, 'processing', '2016-07-21 00:00:00'),
(11, 107, 'intransit', '2016-07-21 00:00:00'),
(12, 97, 'Approved', '2016-07-20 00:00:00'),
(13, 97, 'Canceled', '2016-07-20 00:00:00'),
(14, 97, 'Pending', '2016-07-20 00:00:00'),
(15, 97, 'Kal nu aio ', '2016-07-20 00:00:00'),
(16, 108, 'Approved', '2016-07-22 00:00:00'),
(17, 108, 'Completed', '2016-07-22 00:00:00'),
(18, 97, 'Pending', '2016-07-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(50) NOT NULL,
  `page_description` text NOT NULL,
  `page_status` smallint(10) NOT NULL,
  `page_created` datetime DEFAULT NULL,
  `page_modified` datetime DEFAULT NULL,
  `page_order` int(11) NOT NULL DEFAULT '0',
  `page_banner1` varchar(255) DEFAULT NULL,
  `page_banner2` varchar(255) DEFAULT NULL,
  `page_banner3` varchar(255) DEFAULT NULL,
  `banner_status` smallint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_description`, `page_status`, `page_created`, `page_modified`, `page_order`, `page_banner1`, `page_banner2`, `page_banner3`, `banner_status`) VALUES
(2, 'Terms and Conditions', '<p><strong style="margin: 0px; padding: 0px; font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;">Lorem Ipsum</strong><span style="font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus Page</span></p>\r\n<div style="margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; float: left; font-family: ''Open Sans'', Arial, sans-serif; font-size: 14px; line-height: 20px;">&nbsp;</div>', 1, NULL, NULL, 3, NULL, NULL, NULL, NULL),
(3, 'About Us', '<h1 style="color: #ff0000;"><strong><strong>This is a test page.</strong></strong></h1>', 1, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(4, '', '', 1, NULL, NULL, 6, '2016-07-20-09-47-25_1578f48ad15c3c.jpg', '2016-07-20-09-57-20_2578f4b003f323.jpg', '2016-07-20-09-57-20_3578f4b003f39f.jpg', 1),
(5, 'FAQ', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 1, NULL, NULL, 2, NULL, NULL, NULL, NULL),
(6, 'Privacy Policy', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum....</p>', 1, NULL, NULL, 4, NULL, NULL, NULL, NULL),
(7, 'Contact Us', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, NULL, NULL, 5, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `permission_products` tinyint(1) DEFAULT NULL,
  `permission_users` tinyint(1) DEFAULT NULL,
  `permission_promo_codes` tinyint(1) DEFAULT NULL,
  `permission_static_pages` tinyint(1) DEFAULT NULL,
  `permission_orders` tinyint(1) DEFAULT NULL,
  `permisson_notification` tinyint(1) DEFAULT NULL,
  `permisson_sale` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `user_id`, `permission_products`, `permission_users`, `permission_promo_codes`, `permission_static_pages`, `permission_orders`, `permisson_notification`, `permisson_sale`) VALUES
(7, 38, 1, 1, 1, 1, 1, 1, 1),
(8, 73, 1, 1, 1, 0, 0, 0, 0),
(9, 130, 1, 1, 1, 1, 1, 1, 1),
(10, 131, 1, 1, 0, 1, 1, 1, 1),
(11, 135, 0, 0, 0, 0, 0, 0, 0),
(12, 139, 0, 0, 0, 0, 0, 0, 0),
(14, 146, 1, 1, 1, 1, NULL, NULL, NULL),
(15, 147, 1, 1, 1, NULL, NULL, NULL, NULL),
(19, 156, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(20, 157, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 165, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(24, 166, 0, 0, 1, 1, 0, 0, 0),
(25, 176, 1, 1, NULL, NULL, NULL, NULL, NULL),
(26, 177, 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `printerimages`
--

CREATE TABLE IF NOT EXISTS `printerimages` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `printer_id` bigint(30) NOT NULL,
  `status` tinyint(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `printerimages`
--

INSERT INTO `printerimages` (`id`, `image`, `printer_id`, `status`, `created`) VALUES
(1, '14664935970.png', 13, 1, '0000-00-00 00:00:00'),
(2, '14664938310.png', 14, 1, '0000-00-00 00:00:00'),
(35, '14690879760.jpeg', 49, 1, NULL),
(36, '14690880050.jpg', 50, 1, NULL),
(37, '14690880550.jpg', 51, 1, NULL),
(38, '14690880930.png', 52, 1, NULL),
(39, '14690881420.jpg', 53, 1, NULL),
(40, '14690957310.jpg', 54, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `printers`
--

CREATE TABLE IF NOT EXISTS `printers` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `brand_id` int(20) NOT NULL,
  `printer_name` varchar(300) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `printers`
--

INSERT INTO `printers` (`id`, `brand_id`, `printer_name`, `alias`, `image`) VALUES
(49, 2, 'Canon LaserJet M1005', '41', NULL),
(50, 12, 'Lex mark', '10', NULL),
(51, 19, 'Bro_ DeskJet 2131 All-in-One Printer', '400', NULL),
(52, 20, 'Fuji Advantage 2520hc All-in-One Inkjet Printer', '400', NULL),
(53, 21, '2520hc Epson', '200', NULL),
(54, 20, 'CM215FW', 'MULTIFUNCTION OFFICE LASER', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productcarts`
--

CREATE TABLE IF NOT EXISTS `productcarts` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(25) NOT NULL DEFAULT '0',
  `product_id` bigint(25) NOT NULL,
  `quantity` bigint(25) NOT NULL,
  `unit_price` float(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_id` bigint(25) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=355 ;

--
-- Dumping data for table `productcarts`
--

INSERT INTO `productcarts` (`id`, `user_id`, `product_id`, `quantity`, `unit_price`, `total_price`, `order_id`) VALUES
(144, 0, 140, 1, 10.00, '10.00', 75),
(145, 0, 128, 2, 10.00, '20.00', 69),
(146, 0, 141, 5, 100.00, '500.00', 69),
(147, 0, 115, 2, 33.00, '66.00', 76),
(149, 0, 115, 2, 33.00, '66.00', 77),
(150, 0, 134, 22, 321.00, '7062.00', 78),
(151, 0, 116, 21212, 2121.00, '44990652.00', 78),
(160, 112, 143, 7, 100.00, '700.00', 0),
(171, 0, 143, 7, 100.00, '700.00', 80),
(178, 121, 143, 1, 100.00, '100.00', 0),
(179, 121, 143, 1, 100.00, '100.00', 0),
(186, 164, 144, 4, 40.00, '160.00', 0),
(187, 164, 145, 7, 400.00, '2800.00', 0),
(188, 164, 144, 1, 40.00, '40.00', 0),
(189, 164, 144, 1, 40.00, '40.00', 0),
(190, 164, 144, 1, 40.00, '40.00', 0),
(191, 164, 144, 1, 40.00, '40.00', 0),
(192, 0, 144, 4, 40.00, '160.00', 88),
(193, 164, 144, 1, 40.00, '40.00', 0),
(194, 164, 144, 1, 40.00, '40.00', 0),
(202, 164, 144, 1, 40.00, '40.00', 0),
(203, 164, 144, 1, 40.00, '40.00', 0),
(204, 164, 145, 1, 400.00, '400.00', 0),
(205, 164, 144, 1, 40.00, '40.00', 0),
(206, 164, 144, 1, 40.00, '40.00', 0),
(207, 164, 144, 1, 40.00, '40.00', 0),
(208, 164, 144, 1, 40.00, '40.00', 0),
(209, 164, 144, 1, 40.00, '40.00', 0),
(210, 164, 144, 1, 40.00, '40.00', 0),
(211, 164, 144, 1, 40.00, '40.00', 0),
(212, 164, 144, 1, 40.00, '40.00', 0),
(213, 164, 144, 1, 40.00, '40.00', 0),
(214, 164, 144, 15, 40.00, '600.00', 0),
(215, 164, 149, 4, 300.00, '1200.00', 0),
(216, 164, 149, 4, 300.00, '1200.00', 0),
(238, 38, 149, 4, 300.00, '1200.00', 0),
(240, 0, 148, 1, 400.00, '400.00', 92),
(241, 0, 148, 1, 400.00, '400.00', 93),
(242, 0, 149, 2, 300.00, '600.00', 93),
(247, 0, 148, 1, 400.00, '400.00', 94),
(248, 0, 148, 1, 400.00, '400.00', 94),
(285, 0, 149, 1, 300.00, '300.00', 96),
(286, 0, 148, 1, 400.00, '400.00', 96),
(287, 0, 148, 1, 400.00, '400.00', 95),
(288, 0, 149, 1, 300.00, '300.00', 95),
(289, 118, 151, 1, 10.00, '10.00', 0),
(290, 118, 151, 1, 10.00, '10.00', 0),
(291, 118, 149, 1, 300.00, '300.00', 0),
(292, 118, 154, 1, 10.00, '10.00', 0),
(301, 0, 156, 1, 5.00, '5.00', 98),
(302, 0, 149, 1, 300.00, '300.00', 98),
(303, 0, 151, 1, 10.00, '10.00', 98),
(304, 178, 148, 1, 400.00, '400.00', 0),
(305, 109, 149, 1, 300.00, '300.00', 99),
(306, 109, 160, 7, 13.00, '91.00', 100),
(307, 179, 149, 1, 300.00, '300.00', 101),
(309, 179, 161, 1, 650.00, '650.00', 103),
(310, 179, 161, 1, 650.00, '650.00', 105),
(311, 179, 161, 1, 650.00, '650.00', 106),
(324, 0, 149, 1, 300.00, '300.00', 107),
(325, 38, 149, 1, 300.00, '300.00', 0),
(327, 179, 162, 1, 100.00, '100.00', 0),
(328, 179, 162, 1, 100.00, '100.00', 0),
(329, 179, 162, 1, 100.00, '100.00', 0),
(330, 179, 151, 1, 10.00, '10.00', 0),
(332, 38, 149, 1, 300.00, '300.00', 0),
(333, 38, 149, 1, 300.00, '300.00', 0),
(344, 0, 161, 1, 650.00, '650.00', 108),
(345, 0, 150, 1, 20.00, '20.00', 97),
(346, 0, 151, 1, 10.00, '10.00', 97),
(347, 38, 149, 1, 300.00, '300.00', 0),
(348, 0, 150, 1, 20.00, '20.00', 109),
(349, 0, 150, 1, 20.00, '20.00', 109),
(350, 0, 150, 1, 20.00, '20.00', 110),
(351, 0, 149, 1, 300.00, '300.00', 110),
(352, 180, 149, 1, 300.00, '300.00', 0),
(353, 38, 149, 4, 300.00, '1200.00', 0),
(354, 38, 149, 5, 300.00, '1500.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE IF NOT EXISTS `productimages` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `product_id` bigint(30) NOT NULL,
  `status` tinyint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`id`, `image`, `product_id`, `status`, `created`) VALUES
(5, '14664136610.jpg', 71, 1, '0000-00-00 00:00:00'),
(8, '14665022040.', 74, 1, '0000-00-00 00:00:00'),
(9, '14665026990.', 75, 1, '0000-00-00 00:00:00'),
(11, '14672135230.jpeg', 93, 1, '2016-06-16 00:00:00'),
(12, '14672135230.jpeg', 93, 1, NULL),
(13, '14672618730.', 94, 1, NULL),
(14, '14673656600.', 95, 1, NULL),
(15, '14673659910.jpg', 96, 1, NULL),
(16, '14673662050.jpg', 97, 1, NULL),
(17, '14673758980.jpg', 98, 1, NULL),
(23, '14674601260.jpg', 104, 1, NULL),
(24, '14674601370.jpg', 105, 1, NULL),
(25, '14674601490.jpg', 106, 1, NULL),
(26, '14674601650.jpg', 107, 1, NULL),
(27, '14674601820.jpeg', 108, 1, NULL),
(28, '14674602810.jpeg', 109, 1, NULL),
(30, '14674603120.jpg', 111, 1, NULL),
(31, '14674603230.jpg', 112, 1, NULL),
(32, '14674603320.jpg', 113, 1, NULL),
(33, '14674603450.gif', 114, 1, NULL),
(36, '2016-07-04-06-23-03_577a00c778816.jpg', 118, 1, NULL),
(37, '2016-07-04-06-25-09_577a01457d18f.jpg', 119, 1, NULL),
(38, '2016-07-04-06-36-42_577a03fa691b0.jpg', 126, 1, NULL),
(39, '2016-07-04-06-36-42_577a03fa75601.jpg', 126, 1, NULL),
(40, '2016-07-04-06-36-42_577a03fa818ee.jpg', 126, 1, NULL),
(41, '2016-07-04-06-42-07_577a053f41a39.jpg', 127, 1, NULL),
(42, '2016-07-04-06-42-07_577a053f4bebb.jpg', 127, 1, NULL),
(43, '2016-07-04-06-42-07_577a053f60458.jpg', 127, 1, NULL),
(71, '2016-07-15-07-11-04_57888c883b25c.jpg', 143, 1, NULL),
(72, '2016-07-15-07-11-04_57888c884da26.jpeg', 143, 1, NULL),
(73, '2016-07-15-07-21-27_57888ef7211ac.jpg', 144, 1, NULL),
(74, '2016-07-18-09-10-17_578c9cf99721b.jpg', 144, 1, NULL),
(75, '2016-07-18-09-10-17_578c9cf9aef72.jpg', 144, 1, NULL),
(76, '2016-07-19-06-46-39_578dcccfbc29d.jpg', 145, 1, NULL),
(77, '2016-07-19-06-46-39_578dcccfc872c.jpg', 145, 1, NULL),
(78, '2016-07-19-06-46-39_578dcccfd4b80.jpg', 145, 1, NULL),
(79, '2016-07-19-06-46-39_578dcccfe0fb6.jpg', 145, 1, NULL),
(80, '2016-07-19-06-46-39_578dcccfed3cb.jpg', 145, 1, NULL),
(81, '2016-07-19-06-46-40_578dccd017d66.jpg', 145, 1, NULL),
(82, '2016-07-19-06-59-21_578dcfc9d383c.jpg', 146, 1, NULL),
(83, '2016-07-19-06-59-21_578dcfc9ddb8c.jpg', 146, 1, NULL),
(84, '2016-07-19-06-59-21_578dcfc9e7f76.jpg', 146, 1, NULL),
(85, '2016-07-19-06-59-21_578dcfc9f22e6.jpg', 146, 1, NULL),
(86, '2016-07-19-07-02-27_578dd0836d718.jpg', 147, 1, NULL),
(87, '2016-07-19-07-02-27_578dd0838604d.jpg', 147, 1, NULL),
(88, '2016-07-19-07-02-27_578dd083945ec.jpg', 147, 1, NULL),
(89, '2016-07-19-07-02-27_578dd083a666e.jpeg', 147, 1, NULL),
(92, '2016-07-19-12-20-22_578e1b06a1a70.jpeg', 149, 1, NULL),
(93, '2016-07-19-16-18-24_578e52d0da175.jpg', 150, 1, NULL),
(94, '2016-07-19-16-18-24_578e52d0e4512.jpg', 150, 1, NULL),
(95, '2016-07-19-16-18-24_578e52d0ee86f.jpg', 150, 1, NULL),
(96, '2016-07-19-16-18-25_578e52d104a32.jpg', 150, 1, NULL),
(97, '2016-07-19-16-18-25_578e52d10edcb.jpg', 150, 1, NULL),
(98, '2016-07-19-16-18-25_578e52d119162.jpg', 150, 1, NULL),
(99, '2016-07-19-16-18-25_578e52d123512.jpg', 150, 1, NULL),
(100, '2016-07-19-16-18-25_578e52d12d976.jpg', 150, 1, NULL),
(101, '2016-07-20-07-17-18_578f257eb77ec.jpg', 155, 1, NULL),
(102, '2016-07-20-07-17-18_578f257ec7cc1.jpg', 155, 1, NULL),
(103, '2016-07-20-07-17-18_578f257ed206f.jpg', 155, 1, NULL),
(116, '2016-07-20-12-11-51_578f6a87ec256.jpg', 157, 1, NULL),
(117, '2016-07-20-12-11-52_578f6a8802872.jpg', 157, 1, NULL),
(118, '2016-07-20-12-11-52_578f6a880cc2d.jpg', 157, 1, NULL),
(119, '2016-07-20-12-11-52_578f6a8817037.jpg', 157, 1, NULL),
(120, '2016-07-20-12-11-52_578f6a8827551.jpg', 157, 1, NULL),
(121, '2016-07-20-12-11-52_578f6a883bcad.jpg', 157, 1, NULL),
(122, '2016-07-20-12-11-52_578f6a88523a6.jpg', 157, 1, NULL),
(123, '2016-07-20-12-12-28_578f6aac125c9.jpg', 157, 1, NULL),
(129, '2016-07-21-08-14-54_5790847eab214.jpg', 161, 1, NULL),
(130, '2016-07-21-08-14-54_5790847ec1b04.jpg', 161, 1, NULL),
(131, '2016-07-21-08-14-54_5790847ecbe85.jpg', 161, 1, NULL),
(132, '2016-07-21-08-14-54_5790847ed625b.jpg', 161, 1, NULL),
(133, '2016-07-21-08-14-54_5790847ee05fc.jpg', 161, 1, NULL),
(134, '2016-07-21-08-14-54_5790847eea9e4.jpg', 161, 1, NULL),
(135, '2016-07-21-08-14-55_5790847f00b44.jpg', 161, 1, NULL),
(136, '2016-07-21-08-14-55_5790847f25e0e.jpeg', 161, 1, NULL),
(139, '2016-07-21-09-58-31_57909cc76dfbf.jpg', 152, 1, NULL),
(140, '2016-07-21-09-59-08_57909cecc19dd.jpg', 151, 1, NULL),
(141, '2016-07-21-10-00-49_57909d51a32f8.jpg', 154, 1, NULL),
(143, '2016-07-21-10-18-29_5790a17571eb9.jpg', 162, 1, NULL),
(144, '2016-07-21-15-45-30_5790ee1ae02ee.jpg', 163, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productprinters`
--

CREATE TABLE IF NOT EXISTS `productprinters` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `printer_id` bigint(30) NOT NULL,
  `product_id` bigint(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=338 ;

--
-- Dumping data for table `productprinters`
--

INSERT INTO `productprinters` (`id`, `printer_id`, `product_id`) VALUES
(242, 38, 150),
(243, 39, 150),
(244, 42, 150),
(245, 43, 150),
(285, 38, 155),
(286, 39, 155),
(287, 41, 155),
(317, 53, 161),
(321, 52, 157),
(326, 52, 152),
(329, 52, 154),
(333, 52, 162),
(334, 49, 149),
(335, 49, 163),
(336, 52, 151),
(337, 54, 151);

-- --------------------------------------------------------

--
-- Table structure for table `productpromotions`
--

CREATE TABLE IF NOT EXISTS `productpromotions` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(30) NOT NULL,
  `promotion_id` bigint(30) NOT NULL,
  `status` int(1) NOT NULL,
  `create_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=439 ;

--
-- Dumping data for table `productpromotions`
--

INSERT INTO `productpromotions` (`id`, `product_id`, `promotion_id`, `status`, `create_on`) VALUES
(392, 149, 33, 1, '2016-07-19 12:33:41'),
(412, 149, 34, 1, '2016-07-20 04:26:57'),
(413, 150, 34, 1, '2016-07-20 04:26:57'),
(437, 150, 47, 1, '2016-07-21 07:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `brand_id` bigint(30) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_part_num` varchar(200) NOT NULL,
  `product_color` varchar(80) NOT NULL,
  `product_catridge_type` varchar(30) NOT NULL,
  `product_price_before_gst` decimal(10,0) NOT NULL,
  `product_price_including_gst` decimal(10,0) NOT NULL,
  `product_est_yield` varchar(50) NOT NULL,
  `product_est_yield1` varchar(50) NOT NULL,
  `product_stock_qty` bigint(30) NOT NULL,
  `product_inventory_availability` varchar(100) NOT NULL,
  `product_alias` varchar(50) NOT NULL,
  `product_compatability` varchar(100) NOT NULL,
  `product_dimension_length` int(50) NOT NULL,
  `product_dimension_width` int(50) NOT NULL,
  `product_dimension_height` int(50) NOT NULL,
  `product_shipping_weight` varchar(50) NOT NULL,
  `product_shipping_weight_unit` int(20) DEFAULT NULL,
  `product_warranty` int(30) NOT NULL DEFAULT '0',
  `product_keywords` varchar(255) NOT NULL,
  `product_waiver_charges` varchar(50) DEFAULT NULL,
  `product_description` text NOT NULL,
  `product_usage` varchar(100) DEFAULT NULL,
  `is_sale_clearance` int(11) DEFAULT '0',
  `is_sale` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=164 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `product_name`, `product_type`, `product_part_num`, `product_color`, `product_catridge_type`, `product_price_before_gst`, `product_price_including_gst`, `product_est_yield`, `product_est_yield1`, `product_stock_qty`, `product_inventory_availability`, `product_alias`, `product_compatability`, `product_dimension_length`, `product_dimension_width`, `product_dimension_height`, `product_shipping_weight`, `product_shipping_weight_unit`, `product_warranty`, `product_keywords`, `product_waiver_charges`, `product_description`, `product_usage`, `is_sale_clearance`, `is_sale`) VALUES
(149, 2, 'Cannon Product1', '15', '15151', '27', '4', '300', '200', '100', '5', 5, '6', '11111', '8', 10, 20, 30, '200', 10, 5, 'keyword', NULL, 'Generate random names, dates, emails, addresses and more to fill your MySQL database with data. Table names, column names, and data all have the ability to be catered to your needs.\r\n\r\n', '14', 0, NULL),
(150, 12, 'TEST PRODUCT', '16', 'no13', '1', '4', '20', '21', '2000', '5', 50, '6', 'alais', '8', 12, 13, 14, '40', 10, 0, 'key1', NULL, 'desc', '34', 0, 1),
(151, 20, 'A127BK', '', 'FujiA127BK', '', '', '100', '107', '1000', 'Pages', 10, '', 'FujiA127Black', '', 20, 20, 20, '20', NULL, 1, 'fujiA127,FJBlack, cm215', NULL, '', '', 0, NULL),
(152, 20, 'A126CYAN', '15', 'FujiA126CY', '28', '4', '10', '11', '800', '5', 10, '6', 'cyanA127, cm215', '8', 20, 20, 20, '300', 10, 1, 'cyanA127', NULL, '', '31', 0, NULL),
(154, 20, 'A124YELLOW', '15', 'FujiA124Y', '28', '4', '10', '11', '800', '5', 10, '6', 'FujiA124Y', '8', 10, 10, 10, '300', 10, 1, 'fujiA124, yellow', NULL, '123456 7890 qwerty pointy poiyuyhjhjjkghghghg', '31', 0, NULL),
(155, 19, 'INK46', '15', '32441', '1', '29', '13', '78', '500', '5', 500, '6', 'alais13', '8', 13, 13, 13, '134', 10, 0, 'key1,  key2', NULL, 'description', '34', 0, 1),
(157, 2, 'TEXT 21', '16', '15', '27', '4', '13', '78', '13', '5', 500, '6', 'alais', '8', 21, 13, 43, '134', 10, 0, 'key1 , key2', NULL, 'desc', '33', 0, 1),
(161, 23, 'C610 Series', '50', '1', '28', '29', '650', '100', '5000', '5', 5, '6', '4040', '8', 40, 50, 60, '2', 11, 4, 'product, kee, oki, kacl, test', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '13', 0, NULL),
(162, 20, 'A125MAGNETA', '15', 'FUJIA125M', '28', '4', '100', '107', '800', '5', 10, '6', 'FUJIA125M', '8', 20, 20, 20, '300', 10, 1, 'FUJIA125M', NULL, '', '31', 0, NULL),
(163, 2, 'TEST13', 'Fuser', '12', 'Tri-Color', 'Single', '13', '13', '13', 'Pages', 500, 'Available', 'alais', 'Original', 13, 13, 13, '40', NULL, 0, 'aa1, aa2', NULL, 'descc', '12 month', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_old`
--

CREATE TABLE IF NOT EXISTS `products_old` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `brand_id` int(20) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_part_num` int(30) NOT NULL,
  `product_color` varchar(80) NOT NULL,
  `product_catridge_type` varchar(30) NOT NULL,
  `product_price_before_gst` decimal(10,0) NOT NULL,
  `product_price_including_gst` decimal(10,0) NOT NULL,
  `product_est_yield` varchar(50) NOT NULL,
  `product_stock_qty` int(11) NOT NULL,
  `product_est_yield1` varchar(50) NOT NULL,
  `product_quantity` bigint(30) NOT NULL,
  `product_inventory_availability` varchar(100) NOT NULL,
  `product_alias` varchar(50) NOT NULL,
  `product_compatability` varchar(100) NOT NULL,
  `product_dimension_length` int(50) NOT NULL,
  `product_dimension_width` int(50) NOT NULL,
  `product_dimension_height` int(50) NOT NULL,
  `product_shipping_weight` varchar(50) NOT NULL,
  `product_warranty` int(30) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products_old`
--

INSERT INTO `products_old` (`id`, `product_name`, `brand_id`, `product_type`, `product_part_num`, `product_color`, `product_catridge_type`, `product_price_before_gst`, `product_price_including_gst`, `product_est_yield`, `product_stock_qty`, `product_est_yield1`, `product_quantity`, `product_inventory_availability`, `product_alias`, `product_compatability`, `product_dimension_length`, `product_dimension_width`, `product_dimension_height`, `product_shipping_weight`, `product_warranty`, `product_keywords`) VALUES
(4, 'newpro', 2, '3', 12, '1', '4', '13', '13', '13', 13, '5', 0, '6', 'alais', '8', 13, 12, 13, '40', 0, 'kyy'),
(5, 'pro2', 12, '3', 12, '1', '4', '13', '78', '', 13, '5', 0, '7', '221', '9', 13, 12, 13, '40', 21, 'kyy');

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE IF NOT EXISTS `promocodes` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `promocode` varchar(300) NOT NULL,
  `discount_type` varchar(250) DEFAULT NULL,
  `discount` double(10,2) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `usage_type` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `excced_amount` double(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`id`, `promocode`, `discount_type`, `discount`, `quantity`, `amount`, `expiry_date`, `usage_type`, `description`, `excced_amount`) VALUES
(36, 'newOnePromo', '18', NULL, 10, 10.00, '2016-07-27', 'once', 'description', 1000.00),
(37, 'promcode13', '18', NULL, 13, 10.00, '2016-07-23', 'once', 'test', 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(30) NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `promo_from` date DEFAULT NULL,
  `promo_to` date DEFAULT NULL,
  `promotion_amt_percentage` decimal(10,2) NOT NULL,
  `promo_usage_type` varchar(255) DEFAULT NULL,
  `promo_based_on` varchar(255) DEFAULT NULL,
  `promo_amount_for_product` decimal(10,0) DEFAULT NULL,
  `promo_description` text,
  `promo_banner` varchar(250) DEFAULT NULL,
  `promotion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `product_id`, `promo_code`, `promo_from`, `promo_to`, `promotion_amt_percentage`, `promo_usage_type`, `promo_based_on`, `promo_amount_for_product`, `promo_description`, `promo_banner`, `promotion`) VALUES
(33, 1, NULL, '2016-07-13', '2016-07-18', '10.00', NULL, NULL, NULL, 'Create large csv files filled with whatever random data you need - all in an instantly downloaded .csv file. DummyData generates comma seperated value data into a clean table, with customizable column names.', '1468931621.', 'test promotion'),
(34, 1, NULL, '2016-07-20', '2016-07-27', '12.00', NULL, NULL, NULL, 'description1', '1468944319.jpg', 'TEST PROMOTION1'),
(47, 1, NULL, '2016-07-21', '2016-07-25', '10.00', NULL, NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1469086565.jpg', 'HP 05 Laser Printer Cartridge');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `type` enum('color','brand','type','cartridge_type','est_yield','inventor_availability','compatibility','shipping_weight','usage','discount_type','usage_promotion','delivery_method','order_status','usage_promo') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `type`) VALUES
(1, 'Black', 'color'),
(2, 'Canon', 'brand'),
(3, 'Ink', 'type'),
(4, 'Single', 'cartridge_type'),
(5, 'Pages', 'est_yield'),
(6, 'Available', 'inventor_availability'),
(7, 'Not Available', 'inventor_availability'),
(8, 'Original', 'compatibility'),
(9, 'Compatible', 'compatibility'),
(10, 'Grams', 'shipping_weight'),
(11, 'Kilograms', 'shipping_weight'),
(12, 'Lexmark', 'brand'),
(13, '1 Months', 'usage'),
(14, '2 Months', 'usage'),
(15, 'Toner\r\n', 'type'),
(16, 'Ribbon\r\n', 'type'),
(17, '%', 'discount_type'),
(18, 'Amount (S$) ', 'discount_type'),
(19, 'Brother', 'brand'),
(20, 'Fuji Xerox', 'brand'),
(21, 'Epson', 'brand'),
(22, 'Samsung', 'brand'),
(23, 'Oki', 'brand'),
(24, 'Hewlett Packard', 'brand'),
(27, 'Tri-Color', 'color'),
(28, 'CMYK', 'color'),
(29, 'Combo', 'cartridge_type'),
(30, 'Twin', 'cartridge_type'),
(31, '3 Months', 'usage'),
(32, '4 Months', 'usage'),
(33, '5 Months', 'usage'),
(34, '6 Months', 'usage'),
(35, 'Self-Collect', 'delivery_method'),
(36, 'Please contact me to deliver ASAP', 'delivery_method'),
(44, 'once', 'usage_promo'),
(45, 'multiple', 'usage_promo'),
(48, 'Drum', 'type'),
(49, 'Fuser', 'type'),
(50, 'Others', 'type'),
(53, 'brand1', 'brand'),
(60, '12 month', 'usage'),
(66, 'ounce', 'shipping_weight'),
(67, 'Pending', 'order_status'),
(68, 'Approved', 'order_status'),
(69, 'Processing', 'order_status'),
(70, 'Dispatched', 'order_status'),
(71, 'Complete', 'order_status');

-- --------------------------------------------------------

--
-- Table structure for table `usernotifications`
--

CREATE TABLE IF NOT EXISTS `usernotifications` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(30) DEFAULT NULL,
  `notification_id` bigint(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1373 ;

--
-- Dumping data for table `usernotifications`
--

INSERT INTO `usernotifications` (`id`, `user_id`, `notification_id`) VALUES
(42, 39, 8),
(43, 40, 8),
(44, 32, 12),
(45, 36, 12),
(46, 37, 12),
(47, 38, 12),
(48, 36, 14),
(49, 37, 14),
(50, 36, 3),
(51, 36, 4),
(52, 37, 4),
(53, 38, 4),
(54, 39, 4),
(55, 36, 5),
(56, 37, 5),
(57, 39, 5),
(58, 109, 2),
(59, 116, 4),
(60, 109, 5),
(61, 116, 1),
(62, 102, 2),
(63, 116, 2),
(64, 73, 9),
(65, 95, 9),
(66, 36, 10),
(67, 37, 10),
(68, 38, 10),
(69, 39, 10),
(70, 73, 10),
(71, 82, 10),
(72, 83, 10),
(73, 84, 10),
(74, 85, 10),
(75, 86, 10),
(76, 87, 10),
(77, 88, 10),
(78, 89, 10),
(79, 90, 10),
(80, 92, 10),
(81, 93, 10),
(82, 94, 10),
(83, 95, 10),
(84, 96, 10),
(85, 97, 10),
(86, 98, 10),
(87, 99, 10),
(88, 100, 10),
(89, 101, 10),
(90, 102, 10),
(91, 103, 10),
(92, 104, 10),
(93, 105, 10),
(94, 106, 10),
(95, 107, 10),
(96, 108, 10),
(97, 109, 10),
(98, 110, 10),
(99, 111, 10),
(100, 112, 10),
(101, 113, 10),
(102, 114, 10),
(103, 115, 10),
(104, 116, 10),
(105, 117, 10),
(106, 118, 10),
(107, 119, 10),
(108, 120, 10),
(109, 121, 10),
(110, 123, 10),
(111, 124, 10),
(112, 125, 10),
(113, 126, 10),
(114, 127, 10),
(115, 128, 10),
(116, 129, 10),
(117, 130, 10),
(118, 131, 10),
(119, 132, 10),
(120, 128, 11),
(121, 36, 12),
(122, 37, 12),
(123, 36, 13),
(124, 37, 13),
(125, 38, 13),
(126, 36, 14),
(127, 37, 16),
(128, 85, 18),
(129, 39, 19),
(130, 84, 19),
(131, 36, 20),
(132, 73, 20),
(133, 73, 21),
(134, 36, 22),
(135, 37, 22),
(136, 37, 23),
(137, 36, 24),
(138, 37, 24),
(139, 38, 24),
(140, 87, 25),
(141, 36, 26),
(142, 37, 26),
(143, 38, 26),
(144, 39, 26),
(145, 73, 26),
(146, 82, 26),
(147, 83, 26),
(148, 84, 26),
(149, 85, 26),
(150, 86, 26),
(151, 87, 26),
(152, 88, 26),
(153, 89, 26),
(154, 90, 26),
(155, 92, 26),
(156, 93, 26),
(157, 94, 26),
(158, 95, 26),
(159, 96, 26),
(160, 97, 26),
(161, 98, 26),
(162, 99, 26),
(163, 100, 26),
(164, 101, 26),
(165, 102, 26),
(166, 103, 26),
(167, 104, 26),
(168, 105, 26),
(169, 106, 26),
(170, 107, 26),
(171, 108, 26),
(172, 109, 26),
(173, 110, 26),
(174, 111, 26),
(175, 112, 26),
(176, 113, 26),
(177, 114, 26),
(178, 115, 26),
(179, 116, 26),
(180, 117, 26),
(181, 118, 26),
(182, 119, 26),
(183, 120, 26),
(184, 121, 26),
(185, 123, 26),
(186, 124, 26),
(187, 125, 26),
(188, 126, 26),
(189, 128, 26),
(190, 129, 26),
(191, 130, 26),
(192, 131, 26),
(193, 132, 26),
(194, 133, 26),
(195, 134, 26),
(196, 135, 26),
(197, 136, 26),
(198, 137, 26),
(199, 138, 26),
(200, 139, 26),
(201, 140, 26),
(202, 141, 26),
(203, 142, 26),
(204, 143, 26),
(205, 144, 26),
(206, 146, 26),
(207, 147, 26),
(208, 151, 26),
(209, 156, 26),
(210, 157, 26),
(211, 159, 26),
(212, 160, 26),
(213, 162, 26),
(214, 163, 26),
(215, 164, 26),
(216, 36, 27),
(217, 37, 27),
(218, 38, 27),
(219, 39, 27),
(220, 73, 27),
(221, 82, 27),
(222, 83, 27),
(223, 84, 27),
(224, 85, 27),
(225, 86, 27),
(226, 87, 27),
(227, 88, 27),
(228, 89, 27),
(229, 90, 27),
(230, 92, 27),
(231, 93, 27),
(232, 94, 27),
(233, 95, 27),
(234, 96, 27),
(235, 97, 27),
(236, 98, 27),
(237, 99, 27),
(238, 100, 27),
(239, 101, 27),
(240, 102, 27),
(241, 103, 27),
(242, 104, 27),
(243, 105, 27),
(244, 106, 27),
(245, 107, 27),
(246, 108, 27),
(247, 109, 27),
(248, 110, 27),
(249, 111, 27),
(250, 112, 27),
(251, 113, 27),
(252, 114, 27),
(253, 115, 27),
(254, 116, 27),
(255, 117, 27),
(256, 118, 27),
(257, 119, 27),
(258, 120, 27),
(259, 121, 27),
(260, 123, 27),
(261, 124, 27),
(262, 125, 27),
(263, 126, 27),
(264, 128, 27),
(265, 129, 27),
(266, 130, 27),
(267, 131, 27),
(268, 132, 27),
(269, 133, 27),
(270, 134, 27),
(271, 135, 27),
(272, 136, 27),
(273, 137, 27),
(274, 138, 27),
(275, 139, 27),
(276, 140, 27),
(277, 141, 27),
(278, 142, 27),
(279, 143, 27),
(280, 144, 27),
(281, 146, 27),
(282, 147, 27),
(283, 151, 27),
(284, 156, 27),
(285, 157, 27),
(286, 159, 27),
(287, 160, 27),
(288, 162, 27),
(289, 163, 27),
(290, 164, 27),
(291, 165, 27),
(292, 166, 27),
(293, 36, 28),
(294, 37, 28),
(295, 38, 28),
(296, 39, 28),
(297, 73, 28),
(298, 82, 28),
(299, 83, 28),
(300, 84, 28),
(301, 85, 28),
(302, 87, 28),
(303, 88, 28),
(304, 36, 29),
(305, 37, 29),
(306, 38, 29),
(307, 39, 29),
(308, 73, 29),
(309, 82, 29),
(310, 83, 29),
(311, 84, 29),
(312, 85, 29),
(313, 86, 29),
(314, 87, 29),
(315, 88, 29),
(316, 89, 29),
(317, 90, 29),
(318, 92, 29),
(319, 93, 29),
(320, 94, 29),
(321, 95, 29),
(322, 96, 29),
(323, 97, 29),
(324, 98, 29),
(325, 99, 29),
(326, 100, 29),
(327, 101, 29),
(328, 102, 29),
(329, 103, 29),
(330, 104, 29),
(331, 105, 29),
(332, 106, 29),
(333, 107, 29),
(334, 108, 29),
(335, 109, 29),
(336, 110, 29),
(337, 111, 29),
(338, 112, 29),
(339, 113, 29),
(340, 114, 29),
(341, 115, 29),
(342, 116, 29),
(343, 117, 29),
(344, 118, 29),
(345, 119, 29),
(346, 120, 29),
(347, 121, 29),
(348, 123, 29),
(349, 124, 29),
(350, 125, 29),
(351, 126, 29),
(352, 128, 29),
(353, 129, 29),
(354, 130, 29),
(355, 131, 29),
(356, 132, 29),
(357, 133, 29),
(358, 134, 29),
(359, 135, 29),
(360, 136, 29),
(361, 137, 29),
(362, 138, 29),
(363, 139, 29),
(364, 140, 29),
(365, 141, 29),
(366, 142, 29),
(367, 143, 29),
(368, 144, 29),
(369, 146, 29),
(370, 147, 29),
(371, 151, 29),
(372, 156, 29),
(373, 157, 29),
(374, 159, 29),
(375, 160, 29),
(376, 162, 29),
(377, 163, 29),
(378, 164, 29),
(379, 165, 29),
(380, 36, 30),
(381, 37, 30),
(382, 38, 30),
(383, 39, 30),
(384, 73, 30),
(385, 82, 30),
(386, 83, 30),
(387, 84, 30),
(388, 85, 30),
(389, 86, 30),
(390, 87, 30),
(391, 88, 30),
(392, 89, 30),
(393, 90, 30),
(394, 92, 30),
(395, 93, 30),
(396, 94, 30),
(397, 95, 30),
(398, 96, 30),
(399, 97, 30),
(400, 98, 30),
(401, 99, 30),
(402, 100, 30),
(403, 101, 30),
(404, 102, 30),
(405, 103, 30),
(406, 104, 30),
(407, 105, 30),
(408, 106, 30),
(409, 107, 30),
(410, 108, 30),
(411, 109, 30),
(412, 110, 30),
(413, 111, 30),
(414, 112, 30),
(415, 113, 30),
(416, 114, 30),
(417, 115, 30),
(418, 116, 30),
(419, 117, 30),
(420, 118, 30),
(421, 119, 30),
(422, 120, 30),
(423, 121, 30),
(424, 123, 30),
(425, 124, 30),
(426, 125, 30),
(427, 126, 30),
(428, 128, 30),
(429, 129, 30),
(430, 130, 30),
(431, 131, 30),
(432, 132, 30),
(433, 133, 30),
(434, 134, 30),
(435, 135, 30),
(436, 136, 30),
(437, 137, 30),
(438, 138, 30),
(439, 139, 30),
(440, 140, 30),
(441, 141, 30),
(442, 142, 30),
(443, 143, 30),
(444, 144, 30),
(445, 146, 30),
(446, 147, 30),
(447, 151, 30),
(448, 156, 30),
(449, 157, 30),
(450, 159, 30),
(451, 160, 30),
(452, 162, 30),
(453, 163, 30),
(454, 164, 30),
(455, 165, 30),
(456, 166, 30),
(457, 167, 30),
(458, 168, 30),
(459, 169, 30),
(460, 170, 30),
(461, 36, 31),
(462, 37, 31),
(463, 38, 31),
(464, 39, 31),
(465, 73, 31),
(466, 82, 31),
(467, 83, 31),
(468, 84, 31),
(469, 85, 31),
(470, 86, 31),
(471, 87, 31),
(472, 88, 31),
(551, 36, 33),
(552, 37, 33),
(553, 38, 33),
(554, 39, 33),
(555, 73, 33),
(556, 82, 33),
(557, 83, 33),
(558, 84, 33),
(559, 85, 33),
(560, 86, 33),
(561, 87, 33),
(562, 88, 33),
(563, 89, 33),
(564, 90, 33),
(565, 92, 33),
(566, 93, 33),
(567, 94, 33),
(568, 95, 33),
(569, 96, 33),
(570, 97, 33),
(571, 98, 33),
(572, 99, 33),
(573, 100, 33),
(574, 101, 33),
(575, 102, 33),
(576, 103, 33),
(577, 104, 33),
(578, 105, 33),
(579, 106, 33),
(580, 107, 33),
(581, 108, 33),
(582, 109, 33),
(583, 110, 33),
(584, 111, 33),
(585, 112, 33),
(586, 113, 33),
(587, 114, 33),
(588, 115, 33),
(589, 116, 33),
(590, 117, 33),
(591, 118, 33),
(592, 119, 33),
(593, 120, 33),
(594, 121, 33),
(595, 123, 33),
(596, 124, 33),
(597, 125, 33),
(598, 126, 33),
(599, 128, 33),
(600, 129, 33),
(601, 130, 33),
(602, 131, 33),
(603, 132, 33),
(604, 133, 33),
(605, 134, 33),
(606, 135, 33),
(607, 136, 33),
(608, 137, 33),
(609, 138, 33),
(610, 139, 33),
(611, 140, 33),
(612, 141, 33),
(613, 142, 33),
(614, 143, 33),
(615, 144, 33),
(616, 146, 33),
(617, 147, 33),
(618, 151, 33),
(619, 156, 33),
(620, 157, 33),
(621, 159, 33),
(622, 160, 33),
(623, 162, 33),
(624, 163, 33),
(625, 164, 33),
(626, 165, 33),
(627, 166, 33),
(628, 167, 33),
(629, 168, 33),
(630, 169, 33),
(631, 170, 33),
(717, 36, 32),
(718, 37, 32),
(719, 38, 32),
(720, 39, 32),
(721, 73, 32),
(722, 82, 32),
(723, 83, 32),
(724, 84, 32),
(725, 85, 32),
(726, 86, 32),
(727, 87, 32),
(728, 88, 32),
(729, 89, 32),
(730, 90, 32),
(731, 92, 32),
(732, 93, 32),
(733, 94, 32),
(734, 95, 32),
(735, 96, 32),
(736, 97, 32),
(737, 98, 32),
(738, 99, 32),
(739, 100, 32),
(740, 101, 32),
(741, 102, 32),
(742, 103, 32),
(743, 104, 32),
(744, 105, 32),
(745, 106, 32),
(746, 107, 32),
(747, 108, 32),
(748, 109, 32),
(749, 110, 32),
(750, 111, 32),
(751, 112, 32),
(752, 113, 32),
(753, 114, 32),
(754, 115, 32),
(755, 116, 32),
(756, 117, 32),
(757, 118, 32),
(758, 119, 32),
(759, 120, 32),
(760, 121, 32),
(761, 123, 32),
(762, 124, 32),
(763, 125, 32),
(764, 126, 32),
(765, 128, 32),
(766, 129, 32),
(767, 130, 32),
(768, 131, 32),
(769, 132, 32),
(770, 133, 32),
(771, 134, 32),
(772, 135, 32),
(773, 136, 32),
(774, 137, 32),
(775, 138, 32),
(776, 139, 32),
(777, 140, 32),
(778, 141, 32),
(779, 142, 32),
(780, 143, 32),
(781, 144, 32),
(782, 146, 32),
(783, 147, 32),
(784, 151, 32),
(785, 156, 32),
(786, 157, 32),
(787, 159, 32),
(788, 160, 32),
(789, 162, 32),
(790, 163, 32),
(791, 164, 32),
(792, 165, 32),
(793, 166, 32),
(794, 167, 32),
(795, 168, 32),
(796, 174, 32),
(797, 175, 32),
(1371, 138, 35),
(1372, 179, 39);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `social_id` varchar(255) DEFAULT NULL,
  `social_type` varchar(255) DEFAULT NULL,
  `firstname` varchar(250) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `emailid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_code` varchar(50) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `role` smallint(25) NOT NULL COMMENT '1-admin,2-sub admin,3-customer',
  `address_line1` varchar(250) DEFAULT NULL,
  `address_line2` varchar(250) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `signupdate` date DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0' COMMENT '0-Inactive,1-Active',
  `device_token` varchar(200) DEFAULT NULL,
  `device_type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=183 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `social_id`, `social_type`, `firstname`, `lastname`, `username`, `emailid`, `password`, `phone_code`, `phone`, `role`, `address_line1`, `address_line2`, `image`, `city`, `country`, `postal_code`, `signupdate`, `status`, `device_token`, `device_type`) VALUES
(36, NULL, NULL, '', '', 'username1', 'admin@email.com', '$2y$10$qQV60an8aMd15kVIIz5L8Osbd1JZB9WdDXV6h7yY8gCK5iPT9Uer2', '', '988123456', 2, '', '', '', '', '', '', '2016-06-30', 1, NULL, 0),
(37, NULL, NULL, '', '', 'username13', 'admin@gmail.com', '$2y$10$FIqbYz/JHADwcYHd.pN5teWo1EfeoBkxYhzNoW2t.loXiJq3Kfmvy', '', NULL, 2, '', '', '', '', '', '', '2016-07-12', 1, NULL, 0),
(38, NULL, NULL, '', '', 'supportdbr', 'inderjeet@innovativepeople.com', '$2y$10$M8NALHOkB3tA9QGcUTJMRefhPD9od4S5wJs/6piFV/TjkygH1puIG', '', '123456', 1, '', '', '', '', '', '', '2016-06-29', 1, NULL, 0),
(39, NULL, NULL, 'frst name', '', 'new user', 'new1@gmail.com', '$2y$10$W.Bm7C7Dr.FtYL8y8gmtbOrUe4TPP7FbMpgbM8lnUetHQhTDDKTKG', '', NULL, 2, '', '', '', '', '', '', '2016-07-06', 1, NULL, 0),
(73, NULL, NULL, 'f1', NULL, 'supportdbr1', 'e@mail.com', '$2y$10$M8NALHOkB3tA9QGcUTJMRefhPD9od4S5wJs/6piFV/TjkygH1puIG', '', '76676', 2, NULL, NULL, NULL, NULL, NULL, NULL, '2016-07-13', 1, NULL, 0),
(84, NULL, NULL, NULL, NULL, 'newoneuser', 'newoneuser@gmail.com', '$2y$10$0lvsksItj7qT8M6nP0ttg.niEFBauv1a4RsCvc4nZL6PHug2703rK', NULL, NULL, 2, '', '', '1467443232.', '', NULL, '', '2016-07-05', 1, NULL, 0),
(85, NULL, NULL, NULL, NULL, 'jack', 'test3434@gmail.com', '$2y$10$wLgLHcquHvjeydjRnyZcTuLOND41mLa3APlBWF5E5xxbQvIkqtBVi', NULL, NULL, 2, '', '', '1467443038.', '', NULL, '', '2016-07-02', 1, 'abcd1234efgh5678ijkl', 2),
(115, NULL, NULL, 'dfgfdg', NULL, 'dsf', 'sdfdsf@yopmail.com', '$2y$10$nGfbEo17hCLL0zW.kat3C.06Adx3jya2iLyF.W2OrRq/DdbxWwMCG', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(129, NULL, NULL, 'first name', NULL, 'finaltestsub', 'fnaltst@gg.com', '$2y$10$AxiI6Ye1KxF7FXVQjHz3G.T0o0QJ93.84SjbB4GVfIU3yAUE0V1Bi', NULL, '131313', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(130, NULL, NULL, 'frst name', NULL, 'supportdbr', 'admin@gmail.com', '$2y$10$gWTIN5iX2RPIjGAlDAWGAuWBXrWmR5PYy8EGOGnNbuPS2mVvuuZX.', NULL, '1212121212', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(131, NULL, NULL, 'frst name', NULL, 'frsttest12', 'admin@gmail.com', '$2y$10$96mixTBO7S1BEyajSP7Gd.piUWEWF8YyvzCG4E9S/XQcWdB4L4hxG', NULL, '23424', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(135, NULL, NULL, 'TESTER1', NULL, 'TESTER1', 'saa@ahja.com', '$2y$10$.h10HGXoa6HFmfGXskxoA.hxXLwTUSCUAzCjrPlc9D12prrdNxD/6', NULL, 'SASSASA22332322', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(136, NULL, NULL, 'SASSA', NULL, 'qwqqq', 'saa@ahja.com', '$2y$10$QylySnkdZF72eTG5BGYtbuW47fnD60aAzt.UydKWCtAMuiUkUvp/q', NULL, 'w1111', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(137, NULL, NULL, '3223', NULL, 'ewwwew', 'saa@ahja.com', '$2y$10$AObLZJCcre8AmlZcCGSChu21zhxjszse.Gu.E7oD.nYt6/ng253lC', NULL, 'ew2', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(138, NULL, NULL, 'Dontest2', NULL, 'eww', 'aawe@ajaka.com', '$2y$10$.E7xAyHE9xyOPIZxCOE.5O3udVlv8eS1hOrZ5GwVA7hA9lh9BGjrK', NULL, '2211', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(139, NULL, NULL, 'SAAAS', NULL, 'SASAA', 'saa@ahja.com', '$2y$10$e321ZPK2rkTQ6ilRMzDNjedltLBtsG4i0xToy2bkpaHXPiBqt5W46', NULL, '1212', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(140, NULL, NULL, 'SubAdmin', NULL, 'username', 'test@gmail.com', '$2y$10$CohBeF4SVhCvPGh9rfPHV.UJpRSJdhu3Z7hJUcXjNUIZEejVzkmli', NULL, '897564236', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(141, NULL, NULL, 'frst name', NULL, 'newsubadmin', 'test123@gmail.com', '$2y$10$v.1yYN4QYf0DmC2P7lqfUe61.SbjAgnHL1fX2QNCaVhaLSlepj0uW', NULL, '12132', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(142, NULL, NULL, 'dgfdfg', NULL, 'supp11ortdbr', 'test1213@gmail.com', '$2y$10$PcHw0/9MZEkCToaxdMBeguNSWBALg.OLpqfspdjHkrZzjBiyJuGmK', NULL, 'sgdgs', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(143, NULL, NULL, 'frst name', NULL, 'supportdbr12', 'test1213@gmail.com', '$2y$10$9USF.8rzO8gZdGMQj3q1NObo3n4BBde1n4zHj5G9lF2etfA2EEQDK', NULL, '121', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(144, NULL, NULL, 'frst name', NULL, 'suppor121324tdbr12', 'test1213@gmail.com', '$2y$10$liSVk4qhbdeKRMV5GBGyTelWf6Wchk40sitboUynfCZZ1xb/EV252', NULL, '121', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(146, NULL, NULL, 'nb', NULL, 'supportdbr', 'adrs1@gg.com', '$2y$10$aBnWTo2HA9Ocm829LmwoMeYWLr2kHJ2ARnKTm6612jZOFMh9.EHCm', NULL, '11', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(147, NULL, NULL, 'dfgdfg', NULL, 'supportdbr1655656', 'rerw@gg.com', '$2y$10$FwaBJd9mVk1WIKLFZZjKKOLnSG23FPFoLTjsR6i8xJrTvWKvrjfHi', NULL, '1212121212', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(156, NULL, NULL, 'John', NULL, 'John Tan', 'john@gmail.com', '$2y$10$bk7770RYoU8cQ6pMiaNaw.sclmrqtFm3pr.Wn4caRz0Ft/h8XiH7S', NULL, '99199222', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(157, NULL, NULL, 'John', NULL, 'wqwqwq', 'john@gmail.com', '$2y$10$Ml787MKHjBqzGwSwSU1hHeMGMPCKwElP0KmK.fFimKixJdSXVO1DG', NULL, '22232', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(165, NULL, NULL, 'johney', NULL, 'macklee', 'ye@gmail.com', '$2y$10$8DRbXy7ymt22Y/7peppQ..Az4SKvxFUN84xaFa1jWZyNFDgixym3a', NULL, '9632587410', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(166, NULL, NULL, 'johneys', NULL, 'tention', 'ye123@gmail.com', '$2y$10$jZ1Oj/j0fBU3aaHXrPQ.DOmmnHZQ.bsoE6m.gLmALGSAY.QqI32Ii', NULL, '9632587410', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(176, NULL, NULL, 'martin', NULL, 'martin', 'martin@yopmail.com', '$2y$10$V.nd2dpeIylNykuhI35PtuG8TemWHZzUXIdGulI.JTUs3nZlVI.gG', NULL, '64515252', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(177, NULL, NULL, 'Sub admin', NULL, 'inderjeet', 'toinderjeet@gmail.com', '$2y$10$YJuPA2MxRPhDEE7qIOqcmuTYe9UaTHrs3XanaJoukR0FirNMHoIma', NULL, '9872465312', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0),
(179, NULL, NULL, 'harry', 'lee', 'Harry', 'harry@yopmail.com', '$2y$10$s3wSNZigeY7LQ7SsOhBFW.7bVvu2V4Dmzx1lcTzGPUtRLVjx6dr.K', '', '6458555756', 3, 'Singapore street #414 Singapore', 'Singapore', '20160721082643.jpg', 'Singaporea', 'Singapore', '645855', '2016-07-21', 1, 'fsdAed4wY-8:APA91bEyXiKKUbGU4kECzhvhV3GAhcR6IAN4w0OQCzqLaGLscsMPuQEW-Oc4mRAF-22jdIjvOAON5TB0O4boeuAzyO6JLbdbOTD23LMIzXva5psq0J_zf8xvHA3dJZQ7AYHCiRFukbFU', 2),
(180, NULL, NULL, 'Ansh', 'Coder', 'coder', '', '$2y$10$vSAAG7QQRHG4mFsrnrRaYOaWvdYR.59Ss/CWqwDmPeiHaMFuW07T2', '', '97364441', 3, 'SGI', 'Shenton House', '20160721080145.jpg', 'Shenton Way', 'Singapore', '068805', '2016-07-21', 1, 'fr72Mgo_2Vo:APA91bFFmhUyemLB1n9EtmshXk2Bczk28W87p1PGpMnxrEDhwEp9wy0tgLiie7ORE4Elicw5BTBDGBILaEvX1wiQD5-3tJTCtw4Bw1XxUW0zNRHpA-0-5rmkzhOICtPkeMhl043pAmR8', 2),
(182, '115949334280831275876', 'GOOGLE', 'Php', 'Developer', '115949334280831275876', 'phpdeveloper01@gmail.com', '$2y$10$ZXcJGlzcCXvEBeP.Azkf8.PQjbzFzLYVeUaB5KirW8TWBVmifQkxO', '', '495454545', 3, 'Singapore street', 'Singapore', '20160721112026.jpg', 'Singapore', 'Singapore', '645455', '2016-07-21', 1, 'fr72Mgo_2Vo:APA91bFFmhUyemLB1n9EtmshXk2Bczk28W87p1PGpMnxrEDhwEp9wy0tgLiie7ORE4Elicw5BTBDGBILaEvX1wiQD5-3tJTCtw4Bw1XxUW0zNRHpA-0-5rmkzhOICtPkeMhl043pAmR8', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
