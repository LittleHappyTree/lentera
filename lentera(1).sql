-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 07:51 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lentera`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbranch`
--

CREATE TABLE `tbranch` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `branch_address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbranch`
--

INSERT INTO `tbranch` (`id`, `branch_name`, `branch_address`) VALUES
(1, 'Bali', 'Perumahan Cempaka Mas');

-- --------------------------------------------------------

--
-- Table structure for table `tcountry`
--

CREATE TABLE `tcountry` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tcountry`
--

INSERT INTO `tcountry` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
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
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
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
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
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
-- Table structure for table `tdiscount`
--

CREATE TABLE `tdiscount` (
  `id` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `date_expire` date NOT NULL,
  `percentage` float NOT NULL,
  `discount_on` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `torder`
--

CREATE TABLE `torder` (
  `id` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `time_start` varchar(9) NOT NULL,
  `time_end` varchar(9) NOT NULL,
  `loc_pickup` text NOT NULL,
  `loc_drop` text NOT NULL,
  `discount_id` varchar(20) NOT NULL,
  `phone_code` varchar(5) NOT NULL,
  `phone_number` varchar(14) NOT NULL,
  `booking_status` varchar(1) NOT NULL,
  `citizenship` varchar(5) NOT NULL,
  `order_type` varchar(1) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `date_insert` datetime NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `torder`
--

INSERT INTO `torder` (`id`, `email`, `name`, `date_start`, `date_end`, `time_start`, `time_end`, `loc_pickup`, `loc_drop`, `discount_id`, `phone_code`, `phone_number`, `booking_status`, `citizenship`, `order_type`, `order_number`, `date_insert`, `notes`) VALUES
('33f48cdddf6f0702b56efd66f6c12770', '', '', '2020-03-05', '2020-03-08', '09:00 am', '05:00 pm', 'Bandara Soekarno Hatta', 'Bandara Soekarno Hatta', '', '', '', '', '', 'V', '20030100029903', '2020-03-01 17:51:37', ''),
('4e66aff91052fb7be1bb79f3e717b7d8', '', '', '2020-03-08', '2020-03-13', '09:00 am', '08:00 pm', 'Hotel Aston Martin', 'Hotel Aston Martin', '', '', '', '', '', 'V', '20030100012642', '2020-03-01 17:31:12', ''),
('63c10c65c780491c33da2497dcd3e034', '', '', '2020-02-24', '2020-02-29', '10:00 am', '08:00 pm', 'Vila Bogor Indah edit', 'Vila Bogor Indah edit', '', '', '', '', '', 'V', '20022200013137', '2020-02-23 11:46:58', ''),
('6c09873aa9ab601cc1f9caab80a507cb', '', '', '2020-03-19', '2020-03-21', '07:00 am', '05:00 pm', 'Bakso Rudal Pak Eko', 'Bakso Rudal Pak Eko', '', '', '', '', '', 'V', '20031600013899', '2020-03-16 13:47:19', ''),
('6c77b97b92ea2097633c4b5f84325ec7', '', '', '2020-02-15', '2020-02-18', '08:00 am', '10:00 am', 'Hotel Aston Martin', 'Hotel Aston Martin', '', '', '', '', '', 'V', '5e47e7edab2eb', '2020-02-15 13:47:13', ''),
('7b8da6e04633471cb324cc9fde948ae7', '', '', '2020-02-29', '2020-03-01', '09:00 am', '07:00 pm', 'Warung Jambu', 'Warung Jambu', '', '', '', '', '', 'V', '20022200026735', '2020-02-22 04:33:10', ''),
('96adad43df8c3c3b31a29b19524502a9', 'wayanaditya27@gmail.com', 'Wayan Aditya', '2020-02-29', '2020-03-06', '09:00 am', '04:00 pm', 'Hotel Kuningan', 'Hotel Kuningan', '', '62', '8568942568', 'S', 'ID', 'V', '20022300025005', '2020-02-23 14:02:03', ''),
('e445499a6831150c3b1a050bed7d9960', 'wayanaditya27@gmail.com', 'Wayan Aditya', '2020-02-25', '2020-02-29', '03:00 am', '03:00 pm', 'Bandara Ngurah Rai 2', 'Bandara Ngurah Rai 2', '', '60', '8568942568', 'S', 'MY', 'V', '20022300033672', '2020-02-23 21:07:04', '');

-- --------------------------------------------------------

--
-- Table structure for table `torder_confirm`
--

CREATE TABLE `torder_confirm` (
  `order_id` varchar(32) NOT NULL,
  `driving_license` varchar(50) DEFAULT NULL,
  `passport` varchar(50) DEFAULT NULL,
  `token` varchar(32) DEFAULT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `torder_detail`
--

CREATE TABLE `torder_detail` (
  `order_id` varchar(32) NOT NULL,
  `price_id` int(11) NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `torder_detail`
--

INSERT INTO `torder_detail` (`order_id`, `price_id`, `counter`) VALUES
('33f48cdddf6f0702b56efd66f6c12770', 25, 1),
('4e66aff91052fb7be1bb79f3e717b7d8', 1, 1),
('63c10c65c780491c33da2497dcd3e034', 24, 1),
('6c09873aa9ab601cc1f9caab80a507cb', 60, 1),
('6c77b97b92ea2097633c4b5f84325ec7', 17, 1),
('7b8da6e04633471cb324cc9fde948ae7', 36, 1),
('96adad43df8c3c3b31a29b19524502a9', 1, 1),
('e445499a6831150c3b1a050bed7d9960', 57, 1);

-- --------------------------------------------------------

--
-- Table structure for table `torder_link`
--

CREATE TABLE `torder_link` (
  `order_id` varchar(32) NOT NULL,
  `counter` int(11) NOT NULL,
  `token` varchar(32) DEFAULT NULL,
  `date_expire` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `torder_link`
--

INSERT INTO `torder_link` (`order_id`, `counter`, `token`, `date_expire`) VALUES
('96adad43df8c3c3b31a29b19524502a9', 1, 'FTkhGNrVbGfqoJFSoHTEkrJKMURmpPkp', '2020-02-23 03:45:10'),
('e445499a6831150c3b1a050bed7d9960', 1, 'qmxMhfMvMZfqXEJOFDVMwVyZAOSEZKuh', '2020-02-23 22:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `tprice`
--

CREATE TABLE `tprice` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `price_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'in hour',
  `addon_price_id` int(11) NOT NULL,
  `price_type` varchar(1) NOT NULL,
  `price_description` varchar(30) NOT NULL,
  `min_book` int(11) NOT NULL COMMENT 'in days'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tprice`
--

INSERT INTO `tprice` (`id`, `vehicle_id`, `price_name`, `price`, `duration`, `addon_price_id`, `price_type`, `price_description`, `min_book`) VALUES
(1, 1, 'Motorcycle', 60000, 24, 0, 'V', 'Include 2 Helmet + 2 Raincoat', 2),
(5, 2, 'Motorcycle', 140000, 24, 0, 'V', 'Include 2 Helmet + 2 Raincoat', 2),
(9, 3, 'AT', 200000, 24, 0, 'V', 'Self Drive', 2),
(10, 4, 'Full Day', 500000, 10, 0, 'V', 'Driver + Fuel', 2),
(15, 4, 'Dinner Only', 300000, 3, 0, 'V', 'Driver + Fuel', 2),
(16, 4, 'Half Day', 375000, 5, 0, 'V', 'Driver + Fuel', 2),
(17, 4, 'AT', 275000, 24, 0, 'V', 'Self Drive', 2),
(18, 4, 'MT', 225000, 24, 0, 'V', 'Self Drive', 2),
(19, 5, 'Full Day', 500000, 10, 0, 'V', 'Driver + Fuel', 2),
(20, 5, 'Dinner Only', 300000, 3, 0, 'V', 'Driver + Fuel', 2),
(21, 5, 'Half Day', 375000, 5, 0, 'V', 'Driver + Fuel', 2),
(22, 5, 'AT', 275000, 24, 0, 'V', 'Self Drive', 2),
(23, 5, 'MT', 225000, 24, 0, 'V', 'Self Drive', 2),
(24, 6, 'MT', 225000, 24, 0, 'V', 'Self Drive', 2),
(25, 7, 'MT', 225000, 24, 0, 'V', 'Self Drive', 2),
(26, 8, 'MT', 225000, 24, 0, 'V', 'Self Drive', 2),
(27, 9, 'AT', 225000, 24, 0, 'V', 'Self Drive', 2),
(28, 10, 'AT', 280000, 24, 0, 'V', 'Self Drive', 2),
(29, 11, 'AT', 300000, 24, 0, 'V', 'Self Drive', 2),
(30, 12, 'AT', 250000, 24, 0, 'V', 'Self Drive', 2),
(31, 13, 'Full Day', 700000, 10, 0, 'V', 'Driver + Fuel', 2),
(32, 13, 'Dinner Only', 400000, 3, 0, 'V', 'Driver + Fuel', 2),
(33, 13, 'Half Day', 575000, 5, 0, 'V', 'Driver + Fuel', 2),
(34, 13, 'AT', 400000, 24, 0, 'V', 'Self Drive', 2),
(35, 13, 'MT', 350000, 24, 0, 'V', 'Self Drive', 2),
(36, 14, 'Full Day', 850000, 10, 0, 'V', 'Driver + Fuel', 2),
(37, 14, 'Dinner Only', 450000, 3, 0, 'V', 'Driver + Fuel', 2),
(38, 14, 'Half Day', 600000, 5, 0, 'V', 'Driver + Fuel', 2),
(39, 14, 'AT', 550000, 24, 0, 'V', 'Self Drive', 2),
(40, 14, 'MT', 500000, 24, 0, 'V', 'Self Drive', 2),
(41, 15, 'Full Day', 1350000, 10, 0, 'V', 'Driver + Fuel', 2),
(42, 16, 'Full Day', 2100000, 10, 0, 'V', 'Driver + Fuel', 2),
(43, 17, 'Full Day', 800000, 10, 0, 'V', 'Driver + Fuel', 2),
(44, 17, 'Dinner Only', 500000, 3, 0, 'V', 'Driver + Fuel', 2),
(45, 17, 'Half Day', 650000, 5, 0, 'V', 'Driver + Fuel', 2),
(46, 18, 'Full Day', 1000000, 10, 0, 'V', 'Driver + Fuel', 2),
(47, 18, 'Dinner Only', 550000, 3, 0, 'V', 'Driver + Fuel', 2),
(48, 18, 'Half Day', 550000, 5, 0, 'V', 'Driver + Fuel', 2),
(49, 19, 'Full Day', 1100000, 10, 0, 'V', 'Driver + Fuel', 2),
(50, 19, 'Dinner Only', 700000, 3, 0, 'V', 'Driver + Fuel', 2),
(51, 19, 'Half Day', 875000, 5, 0, 'V', 'Driver + Fuel', 2),
(52, 20, 'Motorcycle', 60000, 24, 0, 'V', 'Include 2 Helmet + 2 Raincoat', 2),
(53, 21, 'Motorcycle', 80000, 24, 0, 'V', 'Include 2 Helmet + 2 Raincoat', 2),
(54, 22, 'Motorcycle', 65000, 24, 0, 'V', 'Include 2 Helmet + 2 Raincoat', 2),
(55, 23, 'Motorcycle', 90000, 24, 0, 'V', 'Include 2 Helmet + 2 Raincoat', 2),
(56, 24, 'Motorcycle', 110000, 24, 0, 'V', 'Include 2 Helmet + 2 Raincoat', 2),
(57, 25, 'Motorcycle', 150000, 24, 0, 'V', 'Include 2 Helmet + 2 Raincoat', 2),
(58, 27, 'Motorcycle', 150000, 24, 0, 'V', 'Include 2 Helmet + 2 Raincoat', 2),
(59, 26, 'Motorcycle', 300000, 24, 0, 'V', 'Include 2 Helmet + 2 Raincoat', 2),
(60, 28, 'MT', 800000, 24, 0, 'V', 'Self Drive', 3),
(61, 29, 'AT', 800000, 24, 0, 'V', 'Self Drive', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ttour`
--

CREATE TABLE `ttour` (
  `id` int(11) NOT NULL,
  `tour_name` varchar(50) NOT NULL,
  `tour_length` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `img` varchar(150) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ttour_itinerary`
--

CREATE TABLE `ttour_itinerary` (
  `id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `itinerary_name` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ttour_itinerary_detail`
--

CREATE TABLE `ttour_itinerary_detail` (
  `id` int(11) NOT NULL,
  `tour_itinerary_id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `time` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE `tuser` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `full_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`username`, `password`, `full_name`) VALUES
('waaywayan', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Wayan Aditya');

-- --------------------------------------------------------

--
-- Table structure for table `tuser_access`
--

CREATE TABLE `tuser_access` (
  `username` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuser_access`
--

INSERT INTO `tuser_access` (`username`, `branch_id`) VALUES
('waaywayan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tvehicle`
--

CREATE TABLE `tvehicle` (
  `id` int(11) NOT NULL,
  `vehicle_type_id` int(11) NOT NULL,
  `vehicle_series` varchar(50) NOT NULL,
  `year` varchar(15) NOT NULL,
  `silinder` int(4) NOT NULL,
  `capacity` int(3) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `img` varchar(500) NOT NULL,
  `kind` varchar(2) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tvehicle`
--

INSERT INTO `tvehicle` (`id`, `vehicle_type_id`, `vehicle_series`, `year`, `silinder`, `capacity`, `branch_id`, `img`, `kind`, `description`) VALUES
(1, 1, 'Vario', '2017', 110, 2, 1, 'vario-110.png', 'M', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(2, 2, 'NMAX', '2018', 155, 2, 1, 'nmax.png', 'M', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(3, 3, 'Avanza', '2010', 1200, 6, 1, 'avanza.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(4, 3, 'All New Avanza', '2016 - 2019', 1200, 6, 1, 'avanza.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(5, 5, 'All New Xenia', '2016 - 2019', 1200, 6, 1, 'xenia.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(6, 3, 'Agya', '2013 - 2018', 1200, 4, 1, 'agya.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(7, 5, 'Ayla', '2013 - 2018', 1200, 4, 1, 'ayla.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(8, 4, 'Splash', '2013 - 2018', 1200, 4, 1, 'splash.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(9, 3, 'Calya', '2016 - 2018', 1200, 6, 1, 'cayla.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(10, 1, 'Brio', '2015 - 2019', 1200, 4, 1, 'brio.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(11, 1, 'Mobilio', '2016 - 2018', 1200, 6, 1, 'mobilio.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(12, 6, 'Grand Livina', '2012', 1200, 6, 1, 'livina.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(13, 3, 'Innova', '2013 - 2015', 1200, 6, 1, 'innova.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(14, 3, 'Innova Reborn', '2017 - 2019', 1200, 6, 1, 'innova-reborn.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(15, 3, 'Fortuner VRZ', '2017 - 2019', 1200, 6, 1, 'fortuner.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(16, 3, 'Alphard', '2017 - 2019', 1200, 6, 1, 'alphard.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(17, 7, 'Elf - Short', '2017 - 2019', 1200, 11, 1, 'elf-short.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(18, 7, 'Elf - Long', '2017 - 2019', 1200, 17, 1, 'elf-long.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(19, 3, 'HiAce', '2017 - 2019', 1200, 15, 1, 'hiace.png', 'C', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(20, 1, 'Beat', '2017', 110, 2, 1, 'beat.png', 'M', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(21, 1, 'Vario', '2017', 125, 2, 1, 'vario-125.png', 'M', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(22, 1, 'Scoopy', '2017', 110, 2, 1, 'scoopy.png', 'M', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(23, 1, 'Vario', '2017', 150, 2, 1, 'vario-150.png', 'M', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(24, 1, 'PCX', '2017', 150, 2, 1, 'pcx.png', 'M', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(25, 1, 'CRF', '2017', 150, 2, 1, 'crf.png', 'M', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(26, 2, 'XMAX', '2018', 250, 2, 1, 'xmax.png', 'M', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(27, 8, 'KLX', '2018', 150, 2, 1, 'klx.png', 'M', 'Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque. Optio voluptas et.'),
(28, 9, 'High Roof', '2016', 2300, 4, 1, 'camp-high1.png;camp-high2.png;camp-high3.png;camp-high4.png;camp-high5.png;camp-high6.png;camp-high7.png', 'C', 'A high roof type campervan with a lot of space inside, it will fulfill every things you need in a campervan. Cruise leisurely in the highway, and enjoy the cozy spacious van with everything in it at campsite.<br><br>\r\n<b>Specifications:</b>\r\n<ul style=\"margin-top: -30px;\"><li>Dimension:(L)4915 x (W)1740 x (H)2030 mm</li><li>Engine: Kia Travello 2.7L</li><li>Fuel type: Diesel</li><li>Transmission: Manual 5 Speed</li><li>A/C in front and mid Cabin</li></ul>\r\n<b>Product features:</b>\r\n<ul><li>Sleeping System</li><li>Kitchen Unit</li><li>Camping Set</li><li>E-Power Source</li><li>Entertainment</li><li>Toilet</li></ul>'),
(29, 9, 'Pop Up Roof', '2016', 2300, 4, 1, 'camp-pop1.png;camp-pop2.png;camp-pop3.png;camp-pop4.png;camp-pop5.png;camp-pop6.png;camp-pop7.png', 'C', 'A pop up roof type of campervan which does not stand out on the road, but got you covered for any basic needs for when you are ready to relax on the campsite.<br>\r\n<b>Specifications</b>\r\n<ul style=\"margin-top: -30px;\"><li>Dimension:(L)5120 x (W)1920 x (H)1940 mm</li><li>Engine: Hyundai H-1 2.4L MPI</li><li>Fuel type: Petrol (down to RON 90)</li><li>Transmission: Automatic</li><li>A/C Cabin</li><li>Parking sensors and Camera</li><li>Navigation System</li></ul>\r\n<b>Product features:</b>\r\n<ul><li>Sleeping System</li><li>Kitchen Unit</li><li>Camoing Set</li><li>E-Power Source</li><li>Entertainment</li></ul>');

-- --------------------------------------------------------

--
-- Table structure for table `tvehicle_police_no`
--

CREATE TABLE `tvehicle_police_no` (
  `price_id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `police_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tvehicle_police_no`
--

INSERT INTO `tvehicle_police_no` (`price_id`, `counter`, `police_number`) VALUES
(1, 1, 'DK 1912 WD'),
(5, 1, 'DK 1845 WE'),
(9, 1, 'DK 1825 WS'),
(10, 1, 'DK 1825 TR');

-- --------------------------------------------------------

--
-- Table structure for table `tvehicle_type`
--

CREATE TABLE `tvehicle_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tvehicle_type`
--

INSERT INTO `tvehicle_type` (`id`, `type_name`) VALUES
(1, 'Honda'),
(2, 'Yamaha'),
(3, 'Toyota'),
(4, 'Suzuki'),
(5, 'Daihatsu'),
(6, 'Nissan'),
(7, 'Isuzu'),
(8, 'Kawasaki'),
(9, 'Campervan');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vinvoice`
-- (See below for the actual view)
--
CREATE TABLE `vinvoice` (
`order_id` varchar(32)
,`id` int(11)
,`vehicle_id` int(11)
,`price_name` varchar(50)
,`price` int(11)
,`duration` int(11)
,`addon_price_id` int(11)
,`price_type` varchar(1)
,`silinder` int(4)
,`kind` varchar(2)
,`price_description` varchar(30)
,`vehicle_type_id` int(11)
,`vehicle_series` varchar(50)
,`type_name` varchar(20)
,`ndays` int(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vorder`
-- (See below for the actual view)
--
CREATE TABLE `vorder` (
`id` varchar(32)
,`email` varchar(50)
,`name` varchar(100)
,`date_start` date
,`date_end` date
,`time_start` varchar(9)
,`time_end` varchar(9)
,`loc_pickup` text
,`loc_drop` text
,`discount_id` varchar(20)
,`phone_code` varchar(5)
,`phone_number` varchar(14)
,`booking_status` varchar(1)
,`citizenship` varchar(5)
,`order_type` varchar(1)
,`order_number` varchar(20)
,`date_insert` datetime
,`notes` text
,`days` int(7)
,`date_start_for` varchar(72)
,`date_end_for` varchar(72)
,`date_start_rev` varchar(10)
,`date_end_rev` varchar(10)
,`country` varchar(80)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vorder_expire`
-- (See below for the actual view)
--
CREATE TABLE `vorder_expire` (
`order_id` varchar(32)
,`counter` int(11)
,`token` varchar(32)
,`date_expire` datetime
,`hour_diff` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vprice_detail`
-- (See below for the actual view)
--
CREATE TABLE `vprice_detail` (
`id` int(11)
,`price_name` varchar(50)
,`price` int(11)
,`duration` int(11)
,`addon_price_id` int(11)
,`price_description` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vvehicle_start_price`
-- (See below for the actual view)
--
CREATE TABLE `vvehicle_start_price` (
`id` int(11)
,`vehicle_series` varchar(50)
,`year` varchar(15)
,`silinder` int(4)
,`capacity` int(3)
,`branch_id` int(11)
,`img` varchar(500)
,`kind` varchar(2)
,`start_price` int(11)
,`type_name` varchar(20)
,`description` text
);

-- --------------------------------------------------------

--
-- Structure for view `vinvoice`
--
DROP TABLE IF EXISTS `vinvoice`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vinvoice`  AS  select `a`.`order_id` AS `order_id`,`b`.`id` AS `id`,`b`.`vehicle_id` AS `vehicle_id`,`b`.`price_name` AS `price_name`,`b`.`price` AS `price`,`b`.`duration` AS `duration`,`b`.`addon_price_id` AS `addon_price_id`,`b`.`price_type` AS `price_type`,`c`.`silinder` AS `silinder`,`c`.`kind` AS `kind`,`b`.`price_description` AS `price_description`,`c`.`vehicle_type_id` AS `vehicle_type_id`,`c`.`vehicle_series` AS `vehicle_series`,`d`.`type_name` AS `type_name`,(to_days(`e`.`date_end`) - to_days(`e`.`date_start`)) AS `ndays` from ((((`torder_detail` `a` join `tprice` `b`) join `tvehicle` `c`) join `tvehicle_type` `d`) join `torder` `e`) where ((`a`.`price_id` = `b`.`id`) and (`b`.`vehicle_id` = `c`.`id`) and (`c`.`vehicle_type_id` = `d`.`id`) and (`a`.`order_id` = `e`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vorder`
--
DROP TABLE IF EXISTS `vorder`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vorder`  AS  select `a`.`id` AS `id`,`a`.`email` AS `email`,`a`.`name` AS `name`,`a`.`date_start` AS `date_start`,`a`.`date_end` AS `date_end`,`a`.`time_start` AS `time_start`,`a`.`time_end` AS `time_end`,`a`.`loc_pickup` AS `loc_pickup`,`a`.`loc_drop` AS `loc_drop`,`a`.`discount_id` AS `discount_id`,`a`.`phone_code` AS `phone_code`,`a`.`phone_number` AS `phone_number`,`a`.`booking_status` AS `booking_status`,`a`.`citizenship` AS `citizenship`,`a`.`order_type` AS `order_type`,`a`.`order_number` AS `order_number`,`a`.`date_insert` AS `date_insert`,`a`.`notes` AS `notes`,(to_days(`a`.`date_end`) - to_days(`a`.`date_start`)) AS `days`,date_format(`a`.`date_start`,'%d %M %Y') AS `date_start_for`,date_format(`a`.`date_end`,'%d %M %Y') AS `date_end_for`,date_format(`a`.`date_start`,'%d/%m/%Y') AS `date_start_rev`,date_format(`a`.`date_end`,'%d/%m/%Y') AS `date_end_rev`,`b`.`nicename` AS `country` from (`torder` `a` left join `tcountry` `b` on((`a`.`citizenship` = `b`.`iso`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vorder_expire`
--
DROP TABLE IF EXISTS `vorder_expire`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vorder_expire`  AS  select `a`.`order_id` AS `order_id`,`a`.`counter` AS `counter`,`a`.`token` AS `token`,`a`.`date_expire` AS `date_expire`,timestampdiff(HOUR,`a`.`date_expire`,now()) AS `hour_diff` from `torder_link` `a` ;

-- --------------------------------------------------------

--
-- Structure for view `vprice_detail`
--
DROP TABLE IF EXISTS `vprice_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vprice_detail`  AS  select `a`.`id` AS `id`,`a`.`price_name` AS `price_name`,`a`.`price` AS `price`,`a`.`duration` AS `duration`,`a`.`addon_price_id` AS `addon_price_id`,`a`.`price_description` AS `price_description` from `tprice` `a` where (`a`.`addon_price_id` <> 0) ;

-- --------------------------------------------------------

--
-- Structure for view `vvehicle_start_price`
--
DROP TABLE IF EXISTS `vvehicle_start_price`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vvehicle_start_price`  AS  select `a`.`id` AS `id`,`a`.`vehicle_series` AS `vehicle_series`,`a`.`year` AS `year`,`a`.`silinder` AS `silinder`,`a`.`capacity` AS `capacity`,`a`.`branch_id` AS `branch_id`,`a`.`img` AS `img`,`a`.`kind` AS `kind`,min(`b`.`price`) AS `start_price`,`c`.`type_name` AS `type_name`,`a`.`description` AS `description` from ((`tvehicle` `a` join `tprice` `b`) join `tvehicle_type` `c`) where ((`a`.`id` = `b`.`vehicle_id`) and (`b`.`addon_price_id` = 0) and (`a`.`vehicle_type_id` = `c`.`id`)) group by `a`.`id`,`a`.`vehicle_type_id`,`a`.`vehicle_series`,`a`.`year`,`a`.`silinder`,`a`.`capacity`,`a`.`branch_id`,`a`.`img`,`a`.`kind` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbranch`
--
ALTER TABLE `tbranch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tcountry`
--
ALTER TABLE `tcountry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tdiscount`
--
ALTER TABLE `tdiscount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `torder`
--
ALTER TABLE `torder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `torder_confirm`
--
ALTER TABLE `torder_confirm`
  ADD PRIMARY KEY (`order_id`,`counter`);

--
-- Indexes for table `torder_detail`
--
ALTER TABLE `torder_detail`
  ADD PRIMARY KEY (`order_id`,`counter`);

--
-- Indexes for table `torder_link`
--
ALTER TABLE `torder_link`
  ADD PRIMARY KEY (`order_id`,`counter`);

--
-- Indexes for table `tprice`
--
ALTER TABLE `tprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttour`
--
ALTER TABLE `ttour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttour_itinerary`
--
ALTER TABLE `ttour_itinerary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttour_itinerary_detail`
--
ALTER TABLE `ttour_itinerary_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tuser_access`
--
ALTER TABLE `tuser_access`
  ADD PRIMARY KEY (`username`,`branch_id`);

--
-- Indexes for table `tvehicle`
--
ALTER TABLE `tvehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tvehicle_police_no`
--
ALTER TABLE `tvehicle_police_no`
  ADD PRIMARY KEY (`price_id`,`counter`);

--
-- Indexes for table `tvehicle_type`
--
ALTER TABLE `tvehicle_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbranch`
--
ALTER TABLE `tbranch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tcountry`
--
ALTER TABLE `tcountry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `tprice`
--
ALTER TABLE `tprice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `ttour`
--
ALTER TABLE `ttour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ttour_itinerary`
--
ALTER TABLE `ttour_itinerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ttour_itinerary_detail`
--
ALTER TABLE `ttour_itinerary_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tvehicle`
--
ALTER TABLE `tvehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tvehicle_type`
--
ALTER TABLE `tvehicle_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
