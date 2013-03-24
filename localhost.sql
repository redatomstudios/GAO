-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2013 at 05:52 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gao`
--

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

DROP TABLE IF EXISTS `captcha`;
CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(133, 1364143674, '::1', 'dAaIOM');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=250 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Afghanistan'),
(2, 'Aland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia, Plurinational State of'),
(28, 'Bonaire, Sint Eustatius and Saba'),
(29, 'Bosnia and Herzegovina'),
(30, 'Botswana'),
(31, 'Bouvet Island'),
(32, 'Brazil'),
(33, 'British Indian Ocean Territory'),
(34, 'Brunei Darussalam'),
(35, 'Bulgaria'),
(36, 'Burkina Faso'),
(37, 'Burundi'),
(38, 'Cambodia'),
(39, 'Cameroon'),
(40, 'Canada'),
(41, 'Cape Verde'),
(42, 'Cayman Islands'),
(43, 'Central African Republic'),
(44, 'Chad'),
(45, 'Chile'),
(46, 'China'),
(47, 'Christmas Island'),
(48, 'Cocos (Keeling) Islands'),
(49, 'Colombia'),
(50, 'Comoros'),
(51, 'Congo'),
(52, 'Congo, The Democratic Republic of the'),
(53, 'Cook Islands'),
(54, 'Costa Rica'),
(55, 'Cote d''Ivoire'),
(56, 'Croatia'),
(57, 'Cuba'),
(58, 'Curacao'),
(59, 'Cyprus'),
(60, 'Czech Republic'),
(61, 'Denmark'),
(62, 'Djibouti'),
(63, 'Dominica'),
(64, 'Dominican Republic'),
(65, 'Ecuador'),
(66, 'Egypt'),
(67, 'El Salvador'),
(68, 'Equatorial Guinea'),
(69, 'Eritrea'),
(70, 'Estonia'),
(71, 'Ethiopia'),
(72, 'Falkland Islands (Malvinas)'),
(73, 'Faroe Islands'),
(74, 'Fiji'),
(75, 'Finland'),
(76, 'France'),
(77, 'French Guiana'),
(78, 'French Polynesia'),
(79, 'French Southern Territories'),
(80, 'Gabon'),
(81, 'Gambia'),
(82, 'Georgia'),
(83, 'Germany'),
(84, 'Ghana'),
(85, 'Gibraltar'),
(86, 'Greece'),
(87, 'Greenland'),
(88, 'Grenada'),
(89, 'Guadeloupe'),
(90, 'Guam'),
(91, 'Guatemala'),
(92, 'Guernsey'),
(93, 'Guinea'),
(94, 'Guinea-Bissau'),
(95, 'Guyana'),
(96, 'Haiti'),
(97, 'Heard Island and McDonald Islands'),
(98, 'Holy See (Vatican City State)'),
(99, 'Honduras'),
(100, 'Hong Kong'),
(101, 'Hungary'),
(102, 'Iceland'),
(103, 'India'),
(104, 'Indonesia'),
(105, 'Iran, Islamic Republic of'),
(106, 'Iraq'),
(107, 'Ireland'),
(108, 'Isle of Man'),
(109, 'Israel'),
(110, 'Italy'),
(111, 'Jamaica'),
(112, 'Japan'),
(113, 'Jersey'),
(114, 'Jordan'),
(115, 'Kazakhstan'),
(116, 'Kenya'),
(117, 'Kiribati'),
(118, 'Korea, Democratic People''s Republic of'),
(119, 'Korea, Republic of'),
(120, 'Kuwait'),
(121, 'Kyrgyzstan'),
(122, 'Lao People''s Democratic Republic'),
(123, 'Latvia'),
(124, 'Lebanon'),
(125, 'Lesotho'),
(126, 'Liberia'),
(127, 'Libyan Arab Jamahiriya'),
(128, 'Liechtenstein'),
(129, 'Lithuania'),
(130, 'Luxembourg'),
(131, 'Macao'),
(132, 'Macedonia, The former Yugoslav Republic of'),
(133, 'Madagascar'),
(134, 'Malawi'),
(135, 'Malaysia'),
(136, 'Maldives'),
(137, 'Mali'),
(138, 'Malta'),
(139, 'Marshall Islands'),
(140, 'Martinique'),
(141, 'Mauritania'),
(142, 'Mauritius'),
(143, 'Mayotte'),
(144, 'Mexico'),
(145, 'Micronesia, Federated States of'),
(146, 'Moldova, Republic of'),
(147, 'Monaco'),
(148, 'Mongolia'),
(149, 'Montenegro'),
(150, 'Montserrat'),
(151, 'Morocco'),
(152, 'Mozambique'),
(153, 'Myanmar'),
(154, 'Namibia'),
(155, 'Nauru'),
(156, 'Nepal'),
(157, 'Netherlands'),
(158, 'New Caledonia'),
(159, 'New Zealand'),
(160, 'Nicaragua'),
(161, 'Niger'),
(162, 'Nigeria'),
(163, 'Niue'),
(164, 'Norfolk Island'),
(165, 'Northern Mariana Islands'),
(166, 'Norway'),
(167, 'Oman'),
(168, 'Pakistan'),
(169, 'Palau'),
(170, 'Palestinian Territory, Occupied'),
(171, 'Panama'),
(172, 'Papua New Guinea'),
(173, 'Paraguay'),
(174, 'Peru'),
(175, 'Philippines'),
(176, 'Pitcairn'),
(177, 'Poland'),
(178, 'Portugal'),
(179, 'Puerto Rico'),
(180, 'Qatar'),
(181, 'Reunion'),
(182, 'Romania'),
(183, 'Russian Federation'),
(184, 'Rwanda'),
(185, 'Saint Barthelemy'),
(186, 'Saint Helena, Ascension and Tristan Da Cunha'),
(187, 'Saint Kitts and Nevis'),
(188, 'Saint Lucia'),
(189, 'Saint Martin (French Part)'),
(190, 'Saint Pierre and Miquelon'),
(191, 'Saint Vincent and The Grenadines'),
(192, 'Samoa'),
(193, 'San Marino'),
(194, 'Sao Tome and Principe'),
(195, 'Saudi Arabia'),
(196, 'Senegal'),
(197, 'Serbia'),
(198, 'Seychelles'),
(199, 'Sierra Leone'),
(200, 'Singapore'),
(201, 'Sint Maarten (Dutch Part)'),
(202, 'Slovakia'),
(203, 'Slovenia'),
(204, 'Solomon Islands'),
(205, 'Somalia'),
(206, 'South Africa'),
(207, 'South Georgia and The South Sandwich Islands'),
(208, 'South Sudan'),
(209, 'Spain'),
(210, 'Sri Lanka'),
(211, 'Sudan'),
(212, 'Suriname'),
(213, 'Svalbard and Jan Mayen'),
(214, 'Swaziland'),
(215, 'Sweden'),
(216, 'Switzerland'),
(217, 'Syrian Arab Republic'),
(218, 'Taiwan, Province of China'),
(219, 'Tajikistan'),
(220, 'Tanzania, United Republic of'),
(221, 'Thailand'),
(222, 'Timor-Leste'),
(223, 'Togo'),
(224, 'Tokelau'),
(225, 'Tonga'),
(226, 'Trinidad and Tobago'),
(227, 'Tunisia'),
(228, 'Turkey'),
(229, 'Turkmenistan'),
(230, 'Turks and Caicos Islands'),
(231, 'Tuvalu'),
(232, 'Uganda'),
(233, 'Ukraine'),
(234, 'United Arab Emirates'),
(235, 'United Kingdom'),
(236, 'United States'),
(237, 'United States Minor Outlying Islands'),
(238, 'Uruguay'),
(239, 'Uzbekistan'),
(240, 'Vanuatu'),
(241, 'Venezuela, Bolivarian Republic of'),
(242, 'Viet Nam'),
(243, 'Virgin Islands, British'),
(244, 'Virgin Islands, U.S.'),
(245, 'Wallis and Futuna'),
(246, 'Western Sahara'),
(247, 'Yemen'),
(248, 'Zambia'),
(249, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `fundcontrol`
--

DROP TABLE IF EXISTS `fundcontrol`;
CREATE TABLE IF NOT EXISTS `fundcontrol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `targetAmout` int(10) NOT NULL,
  `collectedAmount` int(10) NOT NULL,
  `templateTableName` varchar(50) NOT NULL,
  `templateId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageName` varchar(100) NOT NULL,
  `pageTitle` varchar(100) NOT NULL,
  `pageGroup` varchar(100) NOT NULL,
  `templateName` varchar(100) NOT NULL,
  `navOrder` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `pageName`, `pageTitle`, `pageGroup`, `templateName`, `navOrder`) VALUES
(1, 'index', 'Home', 'index', 'skyblue', 1),
(2, 'about', 'About Us', 'about', 'skyblue', 2),
(3, 'contact', 'Contact Us', 'contact', 'skyblue', 3),
(4, 'howitworks', 'How It Works', 'howitworks', 'skyblue', 3),
(5, 'terms', 'Terms of Service', 'terms', 'skyblue', 5),
(6, 'privacy', 'Privacy Policy', 'privacy', 'skyblue', 6),
(7, 'register', 'Register Now', 'register', 'skyblue', 7);

-- --------------------------------------------------------

--
-- Table structure for table `skyblue`
--

DROP TABLE IF EXISTS `skyblue`;
CREATE TABLE IF NOT EXISTS `skyblue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageTitle` varchar(50) DEFAULT NULL,
  `pageName` varchar(50) NOT NULL,
  `pageHeading` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pageContent` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pageName` (`pageName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `skyblue`
--

INSERT INTO `skyblue` (`id`, `pageTitle`, `pageName`, `pageHeading`, `timestamp`, `pageContent`) VALUES
(1, 'Home', 'index', 'Giving has never been so easy.', '2013-02-21 05:12:24', '  &lt;p&gt; At Give As One we believe in making it easy to donate to the charity of your choice and we believe that the best way to give to charity is by working together with your friends, family and colleagues so that you can make a real difference to your chosen charity. &lt;/p&gt;\n\n&lt;p&gt; So if you have a great fundraising idea, why not join Give As One now, tell us what you plan to do and within 10 minutes you will have your own web space on the Give As One website that you can use to tell the world about your charity fundraising project. Your friends, family and colleagues will be able to donate to your chosen charity directly from your web space using their Paypal account of the debit / credit card. Give As One provide this service for free and the only deduction from donations will be the payment processing fees that are charged to us from Paypal. &lt;/p&gt;\n\n&lt;div class=&quot;gallery&quot;&gt;\n&lt;img src=&quot;resources/images/skyblue/stock.jpg&quot; /&gt;\n&lt;img src=&quot;resources/images/skyblue/whale.jpg&quot; /&gt;\n&lt;img src=&quot;resources/images/skyblue/wall.jpg&quot; /&gt;\n&lt;/div&gt;\n\n&lt;p&gt; What''re you waiting for, click here to sign up now and get your fundraising project going &lt;/p&gt;  '),
(2, 'About Us', 'about', 'About Us', '2013-02-22 16:57:39', ' &lt;p&gt;Give As One was set up by a group of individuals who believe that donating to charities online should not incur a ridiculous administration charge. Other websites charge for using a platform such as this, but Give As One charge nothing accept for the fee that Paypal charge for processing payments.&lt;/p&gt;\n\n&lt;p&gt;We want to create a platform where donating is easy, inspiring and fun at the same time. With Give As One this is what you get and we want donating through our platform to become a part of everyday life.&lt;/p&gt;\n\n&lt;div class=&quot;gallery&quot;&gt;\n&lt;img src=&quot;resources/images/skyblue/stock.jpg&quot; /&gt;\n&lt;img src=&quot;resources/images/skyblue/whale.jpg&quot; /&gt;\n&lt;img src=&quot;resources/images/skyblue/wall.jpg&quot; /&gt;\n&lt;/div&gt;  '),
(3, 'Contact Us', 'contact', 'Contact Us', '2013-02-22 16:58:55', '    &lt;form action=&quot;/GAO/page/contactus&quot; method=&quot;post&quot; accept-charset=&quot;utf-8&quot;&gt;\r\n	&lt;div class=&quot;formBlock&quot;&gt;\r\n		&lt;div class=&quot;elemLabel&quot;&gt;\r\n			&lt;label for=&quot;&quot;&gt;First Name&lt;/label&gt;\r\n			&lt;div class=&quot;elemHint&quot;&gt;Enter your first name&lt;/div&gt;\r\n		&lt;/div&gt;\r\n		&lt;div class=&quot;element&quot;&gt;\r\n			&lt;input type=&quot;text&quot; name=&quot;firstName&quot; placeholder=&quot;First Name&quot; /&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n	&lt;div class=&quot;formBlock&quot;&gt;\r\n		&lt;div class=&quot;elemLabel&quot;&gt;\r\n			&lt;label for=&quot;&quot;&gt;Second Name&lt;/label&gt;\r\n			&lt;div class=&quot;elemHint&quot;&gt;Enter your second name&lt;/div&gt;\r\n		&lt;/div&gt;\r\n		&lt;div class=&quot;element&quot;&gt;\r\n			&lt;input type=&quot;text&quot; name=&quot;secondName&quot; placeholder=&quot;Second Name&quot; /&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n	&lt;div class=&quot;formBlock&quot;&gt;\r\n		&lt;div class=&quot;elemLabel&quot;&gt;\r\n			&lt;label for=&quot;&quot;&gt;Email address&lt;/label&gt;\r\n			&lt;div class=&quot;elemHint&quot;&gt;Enter your email address&lt;/div&gt;\r\n		&lt;/div&gt;\r\n		&lt;div class=&quot;element&quot;&gt;\r\n			&lt;input type=&quot;text&quot; name=&quot;email&quot; placeholder=&quot;your_email@host.com&quot; /&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n	&lt;div class=&quot;formBlock&quot;&gt;\r\n		&lt;div class=&quot;elemLabel&quot;&gt;\r\n			&lt;label for=&quot;&quot;&gt;Repeat Email address&lt;/label&gt;\r\n			&lt;div class=&quot;elemHint&quot;&gt;Confirm your email address&lt;/div&gt;\r\n		&lt;/div&gt;\r\n		&lt;div class=&quot;element&quot;&gt;\r\n			&lt;input type=&quot;text&quot; name=&quot;confEmail&quot; placeholder=&quot;your_email@host.com&quot; /&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n	&lt;div class=&quot;formBlock&quot;&gt;\r\n		&lt;div class=&quot;elemLabel&quot;&gt;\r\n			&lt;label for=&quot;&quot;&gt;Question&lt;/label&gt;\r\n			&lt;div class=&quot;elemHint&quot;&gt;Enter your query here&lt;/div&gt;\r\n		&lt;/div&gt;\r\n		&lt;div class=&quot;element&quot;&gt;\r\n			&lt;textarea name=&quot;question&quot; placeholder=&quot;Question&quot;&gt;&lt;/textarea&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n	&lt;div class=&quot;formBlock&quot;&gt;\r\n		&lt;div class=&quot;elemLabel&quot;&gt;\r\n			&lt;label for=&quot;&quot;&gt;CAPTCHA&lt;/label&gt;\r\n			&lt;div class=&quot;elemHint&quot;&gt;Testing for automated scripts&lt;/div&gt;\r\n		&lt;/div&gt;\r\n		&lt;div class=&quot;element&quot;&gt;\r\n			&lt;input type=&quot;text&quot; placeholder=&quot;&quot; /&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n	&lt;div class=&quot;formBlock&quot;&gt;\r\n		&lt;div class=&quot;elemLabel&quot;&gt;\r\n		&lt;/div&gt;\r\n		&lt;div class=&quot;element&quot;&gt;\r\n			&lt;input type=&quot;submit&quot; value=&quot;Submit&quot; /&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n&lt;/form&gt;    '),
(4, 'How It Works', 'howitworks', 'How It Works', '2013-02-22 17:01:09', ' &lt;p&gt;\n	When you join Give As One you get your own web space where you can tell you friends, family, colleagues and the rest of the world about your fundraising event and what charity you are supporting. This web space will have a unique web address that will be in the form www.give-as-one.com/[username].\n&lt;/p&gt;\n&lt;p&gt;\n	From this page you will be able to set a funding target, tell people more about what you are going to do, the charity you are supporting and what the money is going to be used for. The most important part of the page is the bit that allows others to donate to your fund using their Paypal account or their debit / credit card.&quot;\n&lt;/p&gt;\n&lt;p&gt;\n	Give As One provide this service for free and the only deduction from donations will be the payment processing fees that are charged to us from Paypal. On top of your donation Give As One reclaim GIft Aid, on behalf of your chosen charity and pass this on to them. What this means is for every &Acirc;&pound;10 that you donate, the chosen charity will actually receive &Acirc;&pound;12.22. \n&lt;/p&gt;\n&lt;div class=&quot;gallery&quot;&gt;\n	&lt;img src=&quot;resources/images/skyblue/stock.jpg&quot; /&gt;\n	&lt;img src=&quot;resources/images/skyblue/wall.jpg&quot; /&gt;\n	&lt;img src=&quot;resources/images/skyblue/whale.jpg&quot; /&gt;\n&lt;/div&gt; '),
(5, 'Terms of Service', 'terms', 'Terms of Service', '2013-02-22 17:05:01', ' &lt;p&gt;Our terms of service describe what JustGiving does for you and the charities you are supporting, and what we kindly request of you as a user in return.&lt;/p&gt; \n&lt;p&gt;Here are the key points:  \n    &lt;ul&gt;\n      &lt;li&gt;&lt;strong&gt;Online Giving&lt;/strong&gt; - we run and maintain a website that processes donations and we reclaim Gift Aid on behalf of the charities featured on it. For this service, and the support we provide to them and their supporters, charities pay us a &lt;a href=&quot;/info/fees/&quot;&gt;5% fee&lt;/a&gt; on the donation plus Gift Aid.  Because we promptly pay donations to charities, we regret that we can only refund a donation if the charity expressly requests it, and they can pay us back. Please get in touch with the charity first.&lt;/li&gt;\n      \n      &lt;li&gt;&lt;strong&gt;Text Giving&lt;/strong&gt; - we also run and maintain a text giving service that processes donations and we reclaim Gift Aid on behalf of the charities featured on it. We do not currently charge charities or donors for this service but we may do so in the future.  If we do decide to charge for the service we will tell you in advance.  Text donations may be refunded in certain circumstances (such as where the donation was sent from your mobile phone by mistake or without your permission) at the absolute discretion of your mobile phone operator.  Because we pay donations via text to charities regularly, we regret that we can only refund a text donation if the charity expressly requests it, and they can pay us back. Please get in touch with the charity first.&lt;/li&gt;\n      \n      &lt;li&gt;Your privacy is paramount to us. Our &lt;a href=&quot;/info/privacy/&quot;&gt;privacy policy&lt;/a&gt; shows you how we protect it.&lt;/li&gt;\n      \n      &lt;li&gt;If you create a JustGiving page or use any of our other services, please remember JustGiving is for everyone. We''ll remove offensive, obscene or racist content on the rare occasions when we find it - and we may terminate membership as a result. Please also make sure that the content you upload on the site and any information you send via text, especially pictures, is not copyright-protected.&lt;/li&gt;\n    &lt;/ul&gt;\n&lt;p&gt;&lt;strong&gt;That''s it. If you want the full, extended version, here it is:&lt;/strong&gt;&lt;/p&gt;\n\n&lt;p&gt;Giving.com Limited, whose registered office is at 1st Floor, 30 Eastbourne Terrace, London, W2 6LA (registration no. 3871904) trading as JustGiving (&quot;JG&quot;), operates www.justgiving.com (the &quot;Website&quot;) and its associated services (which includes the text giving service). These are the general Terms of Service which govern your use of the Website and its associated services. Please read these Terms of Service carefully. If you do not wish to be bound by these Terms of Service, you should not continue to send texts or use or access the Website or its associated services.&lt;/p&gt;\n    \n    &lt;p&gt;These Terms of Service may change or be updated from time to time. It remains your responsibility to access and check these Terms of Service wherever you access the Website. The latest version of these Terms of Service will govern any future usage by you of the Website and its associated services.&lt;/p&gt;\n\n&lt;p&gt;&lt;strong&gt;About the charities and organisations featured on the Website&lt;/strong&gt;&lt;/p&gt; \n\n    &lt;p&gt;The Website and its associated services allows you to donate to, and raise funds for, any of the charities and organisations listed on this Website. Every member charity or organisation featured (except &quot;non member charities&quot;) has a contractual agreement with JG authorising JG to collect donations and reclaim Gift Aid on its behalf under the UK government''s Gift Aid scheme. Member charities and organisations are accepted as members at JG''s discretion. Charities must be registered with the Charity Commission or exempt from registration for JG to reclaim Gift Aid on their behalf. JG also features reputable not-for-profit organisations, which are not eligible for Gift Aid reclaim. These are clearly listed on the Website as not eligible for Gift Aid reclaim. Charities and not-for-profit organisations can have similar names: it is your responsibility to check that you are donating to the organisation you intended.&lt;/p&gt;\n    \n    &lt;p&gt;&lt;strong&gt;Non member charities&lt;/strong&gt;&lt;/p&gt;\n    \n    &lt;p&gt;JG also runs a &quot;non member charity&quot; service.  This means JG will also feature on our Website most of the charities registered with the Charity Commission for England and Wales, even if they are not one of our member charities.  We have made arrangements to allow donations to be made to non member charities through the JustGiving Foundation, who will collect Gift Aid on their behalf.  The JustGiving Foundation provides a purely administrative role in collecting donations and reclaiming Gift Aid on behalf of the non member charities.&lt;/p&gt;\n    \n    &lt;p&gt;When JG send a donation to a non member charity, JG will send the non member charity a cheque for the donation plus the Gift Aid, minus JG''s standard 5% fee (see the &quot;JG Fees&quot; section).  If the non member charity accepts the donation by cashing the cheque an agreement will be formed with us.  If they do not accept the cheque they will not enter into any agreement with us and the donation will not be processed.  It may take up to six months from when we pass your donation on to the charity to confirm that the donation will not be processed as cheques are valid for this period.  If the non member charity sends the cheque back to us earlier, we are unable to make payment or don''t feel it is appropriate to pass on a donation (for example, if a charity has been de-registered by the Charity Commission or has a sanction listed against them) then we will contact you so as to return the donation to you.  If we are unable to contact you then we will select an appropriate alternative donation to pass the donation to.&lt;/p&gt;\n\n&lt;p&gt;&lt;strong&gt;Donations&lt;/strong&gt;&lt;/p&gt; \n\n&lt;p&gt;Text donations may be refunded in certain circumstances (such as where the donation was sent from your mobile phone by mistake or without your permission) at the absolute discretion of your mobile phone operator.  If you wish to request a refund you should contact your mobile phone operator to discuss this with them.  There is no obligation for your mobile phone operator to provide a refund and they may choose to refund only part of the donation if they wish.&lt;/p&gt; \n\n    &lt;p&gt;Once your text donation has been paid over by your mobile phone operator, or if your donation is made via the Website, it will only be refunded to you with the prior written consent of the charity to whom it has been made, regardless of whether or not the donation had been paid to the charity by JG. Before a donation is refunded, the relevant charity must agree that JG may deduct the amount to be refunded from subsequent payments to be made by JG to the charity. Where no further payments are due to be made to such charity within one week of the refund being made to you, JG reserves the right to invoice the charity for the amount of the refund and the charity must agree to settle that invoice within one month of the date of the invoice.&lt;/p&gt;\n\n&lt;p&gt;&lt;strong&gt;Use of your donation&lt;/strong&gt;&lt;/p&gt; \n  \n&lt;p&gt;JG is not responsible for any dissatisfaction you may have regarding the recipient organisation''s use of any donation you may make through the Website or its associated services or websites powered by us. Please note that the recipient organisation reserves the right to use your donation for its general purposes. JG cannot guarantee that funds will be earmarked for a particular appeal, unless specifically stated by the recipient organisation itself.&lt;/p&gt;\n\n&lt;p&gt;&lt;strong&gt;JG fees&lt;/strong&gt;&lt;/p&gt;  \n\n&lt;p&gt;JG charges a small transaction fee on every donation made on the Website or its associated services except text donations. The fee is currently 5% of the gross donation, which is the donation plus any Gift Aid reclaimed. When a donation is not eligible for Gift Aid reclaim, the 5% fee applies to the donation alone. Subscription fees also apply to member charities for additional services. For full details please visit &lt;a href=&quot;/charities/&quot;&gt;www.justgiving.com/charities&lt;/a&gt;.&lt;/p&gt; \n\n    &lt;p&gt;In relation to the text giving service JG will not make this charge to charities or donors, although we reserve the right to charge the transaction fee in the future.  If we do decide to charge for the service we will tell you in advance.&lt;/p&gt;\n\n    &lt;p&gt;&lt;strong&gt;Text Giving Service Charges&lt;/strong&gt;&lt;/p&gt;\n    \n    &lt;p&gt;Your mobile operator will pass 100% of the text donation onto JG. The minimum text donation is &Acirc;&pound;1 and all donations must be in whole pounds sterling.  The maximum text donation allowed is &Acirc;&pound;10 for all mobile operators.  Donations sent via text will usually incur your standard text message fee.  Please refer to your tariff for details of your standard text message fee.&lt;/p&gt;\n    \n    &lt;p&gt;&lt;strong&gt;Fundraising Coach&lt;/strong&gt;&lt;/p&gt;\n    \n    &lt;p&gt;We also run an application through the Website called Fundraising Coach (&quot;FC&quot;).  FC makes it simpler to get in touch with all your friends and contacts by allowing you to link to your social media accounts and other communication tools, such as Gmail, Yahoo! Mail, Hotmail, Twitter and Facebook (&quot;Your Accounts&quot;).  If you use FC it will take the details of your contacts (names, email addresses, Facebook profile ID''s and tokens and Twitter profile ID''s and tokens (&quot;Contact''s Details&quot;)) from Your Accounts and will store them in your FC contact lists.  It will allow you to create template emails asking for donations which you can send to your contacts as part of a campaign for your fundraising event.  FC will track the responses from your contacts and prompt you to send reminder emails or other electronic messages to contacts who do not respond.  But don''t worry, we won''t bombard your contacts - FC will not prompt you to send more than three electronic messages to each contact asking for donations for your event.  When your event is over FC will prompt you to make sure that all of your contacts know how the event went and thank all of those who donated.  During the campaign, when we prompt you to send messages, if you fail to respond to us on more than two occasions we will stop contacting you and FC will cease to work on your fundraising campaign.&lt;/p&gt;\n    \n    &lt;p&gt;To use FC you will need to log in to Your Accounts and provide us with access to your Contact''s Details.  By logging in to Your Accounts you authorise us to access Your Accounts and copy, into your FC contact lists, the Contact''s Details.&lt;/p&gt;\n    \n    &lt;p&gt;We will keep the information we take from Your Accounts confidential and secure and will only use it for the purpose of providing the FC service to you.  You can stop us using this information by ending the campaign or removing individual contacts from the campaign at any time.  To do this just log in to your own JustGiving page, access FC and de-select the individual from your FC contact lists.&lt;/p&gt;\n    \n    &lt;p&gt;By clicking to accept these Terms of Service you authorise us to create a campaign using FC, prompt you to send the emails and other electronic messages to your contacts, track their responses, prompt you to send reminder emails and other electronic messages and complete the campaign.&lt;/p&gt;\n    \n    &lt;p&gt;Whilst FC aims to help you to run a successful fundraising campaign we cannot guarantee that it will produce results.  FC might make errors and although we work hard to make sure it works properly all the time we can''t guarantee that it will.  You should check that the campaign emails are sent to the right people, with the correct information in, at the intended time.  You can do this by checking your sent items in Your Accounts as all the FC generated emails will be stored there.  If you spot any problems with FC please contact us at &lt;a href=&quot;mailto:help@justgiving.com&quot;&gt;help@justgiving.com&lt;/a&gt;.&lt;/p&gt;\n     \n&lt;p&gt;&lt;strong&gt;Unauthorised card use&lt;/strong&gt;&lt;/p&gt; \n \n&lt;p&gt;When a donation is made on the Website the transaction is final and not disputable unless unauthorised use of your payment card is proved. If you become aware of fraudulent use of your card, or if it is lost or stolen, you must notify your card provider in accordance with its reporting rules.&lt;/p&gt; \n \n&lt;p&gt;&lt;strong&gt;Protecting your password&lt;/strong&gt;&lt;/p&gt; \n\n&lt;p&gt;When you register with JG and choose a password to protect your secure account, you are responsible for maintaining the confidentiality of your password. If you become aware of any unauthorised use of your password, we recommend that you change your password immediately or call our helpdesk on 0845 078 2063 (local rate).&lt;/p&gt;  \n\n&lt;p&gt;&lt;strong&gt;Gift Aid information&lt;/strong&gt;&lt;/p&gt;\n \n&lt;p&gt;When you donate to a charity on the Website or its associated services and confirm that you are a UK taxpayer in accordance with the requirements of the Gift Aid scheme as they apply from time to time, JG reclaims Gift Aid on behalf of the charity under the Gift Aid scheme. JG is not an accounting, taxation or financial advisor, and you should not rely on information given on the Website or its associated services to determine the accounting, tax or financial consequences of making a donation to charity. We strongly recommend that you consult your own adviser(s) about any accounting, taxation or financial consequences that may affect you.&lt;/p&gt;\n    \n    &lt;p&gt;In relation to the text giving service, after you send a donation via text we will send you a text in response, confirming your donation and providing you with the opportunity to add gift aid to your donation.  We will include a link to a gift aid page where you can provide your details to enable us to collect gift aid on your behalf.  We may send you a text asking if you would like to add gift aid to your donation and to reply to our text giving your name, address and postcode.  If you reply to our texts regarding gift aid your mobile operator will charge you one standard text message fee. &lt;/p&gt;\n \n&lt;p&gt;&lt;strong&gt;Privacy&lt;/strong&gt;&lt;/p&gt; \n\n&lt;p&gt;JG''s Privacy Policy forms part of these Terms of Service. By agreeing to these Terms of Service you also give your consent to the way we may handle your personal information under that Policy. &lt;a href=&quot;/info/privacy/&quot;&gt;Read our Privacy Policy here&lt;/a&gt;.&lt;/p&gt; \n\n&lt;p&gt;&lt;strong&gt;User conduct&lt;/strong&gt;&lt;/p&gt; \n \n&lt;p&gt;You must at all times use the Website and its associated services in a responsible and legal manner. In particular, but not exclusively: \n        \n&lt;p&gt;&lt;ul&gt;&lt;li&gt;You must not upload offensive, obscene or racist content, including photographs, on to the Website or its associated services. JG does not actively edit the Website but reserves the right to remove or edit any content posted on the Website or its associated services at its sole discretion and without notice, regardless of whether or not it is, in the opinion of any third party, offensive, obscene or racist. If you notice any such content, please email us at &lt;a href=&quot;mailto:help@justgiving.com&quot;&gt;help@justgiving.com&lt;/a&gt;.&lt;/li&gt;\n    &lt;li&gt;If you build a JustGiving page on JG, it is your responsibility to ensure that the content you are uploading on your page, in particular the photograph, is not copyright-protected. If it is, you must obtain the copyright owner''s written consent to use it. JG reserves the right to remove any pictures, photographs or copy from personal fundraising pages, at its sole discretion and without notice if their copyright status is in any doubt. If you suspect a breach of copyright on the Website, please email us at &lt;a href=&quot;mailto:help@justgiving.com&quot;&gt;help@justgiving.com&lt;/a&gt;.&lt;/li&gt;\n\n&lt;li&gt;Other than in relation to your own JustGiving page, you may not remove or change anything on the Website.&lt;/li&gt;&lt;/ul&gt;\n \n&lt;p&gt;In addition, you as a user must not: \n&lt;ul&gt;&lt;li&gt;misrepresent your identity or affiliation with any other person or organisation;&lt;/li&gt;\n \n&lt;li&gt;use the website to send junk email or ''spam'' to people who do not wish to receive email from you;&lt;/li&gt; \n&lt;li&gt;use the Website to conduct, display or forward surveys, raffles, lotteries, contests, pyramid schemes or chain letters;&lt;/li&gt; \n&lt;li&gt;interfere with, or disrupt, the service or services or networks connected to the service and introduce any computer virus (including any variant or similar malicious code or instructions) to the JG systems;&lt;/li&gt;\n    &lt;li&gt;provide a donor with any gift, prize or any other form of incentive in connection with the making of any donation by the donor.&lt;/li&gt;&lt;/ul&gt; \n&lt;p&gt;JG reserves the right to cancel your membership and delete any JustGiving page without notice in the event of a breach of the above rules.&lt;/p&gt; \n\n&lt;p&gt;Building a JustGiving page in aid of a charity in no way implies JG''s or the charity''s endorsement of your fundraising activity. Many charities disapprove of, and do not wish to be involved in, dangerous sports or unusual challenges. It is your responsibility to check with the charity first that your chosen activity does not contravene the charity''s policies. JG reserves the right, at its absolute discretion and without notice, to cancel your personal fundraising page at the request of the charity, in the event that the charity, in its absolute discretion, deems your fundraising activity inappropriate or unnecessarily dangerous.&lt;/p&gt;\n \n&lt;p&gt;&lt;strong&gt;Links&lt;/strong&gt;&lt;/p&gt; \n \n&lt;p&gt;The Website and its associated services contains links to the websites of member charities and other organisations, whether charities or otherwise. Inclusion of a link to another website does not imply endorsement of its content or opinions. Your relationship and any transactions with other organisations through their websites or otherwise are your own responsibility.&lt;/p&gt;\n \n&lt;p&gt;&lt;strong&gt;Partner Services&lt;/strong&gt;&lt;/p&gt; \n \n&lt;p&gt;JG may from time to time select partners offering relevant information and services that we believe will enhance our provision for visitors to the Website. Whilst we will do our best to select partners of the highest integrity, we are not responsible for any aspect of the information or services offered by them, and if you choose to use their services you do so at your own risk.&lt;/p&gt; \n \n&lt;p&gt;&lt;strong&gt;Trademarks&lt;/strong&gt;&lt;/p&gt; \n \n&lt;p&gt;The names JustGiving, Justgiving.com, Justevents, Justgifts, Fundraising Coach, the JustGiving logo and any other product and service names that we may present on the Website or its associated services from time to time may not be used in connection with any product or service that is not JG''s, nor in any manner that is likely to cause confusion, or in any way that may disparage or discredit JG. Other trademarks, service marks or logos that appear on the Website or its associated services, in particular (but not exclusively) those of member charities, are the property of their respective owners and are likely to be registered trademarks and subject to restrictions as to their use. They must not be used without the express permission of both JG and the trade mark owner.&lt;/p&gt;  \n\n&lt;p&gt;&lt;strong&gt;Copyright&lt;/strong&gt;&lt;/p&gt; \n \n&lt;p&gt;All content on the Website and its associated services is owned by JG, our member charities, or other original providers, and is protected by the applicable intellectual property and proprietary rights and laws. You may copy content for your own personal, non-commercial use provided you do not alter it or remove any copyright, trade mark or other proprietary notice. No other use of the Website''s and its associated services'' content is permitted without the express prior permission of JG, and, where applicable, the copyright holder. Inquiries and permission requests may be sent to &lt;a href=&quot;mailto:help@justgiving.com&quot;&gt;help@justgiving.com&lt;/a&gt;.&lt;/p&gt;\n  \n&lt;p&gt;&lt;strong&gt;Changes to the service&lt;/strong&gt;&lt;/p&gt; \n \n&lt;p&gt;JG will make every effort to ensure that the Website and other services are available continuously, but reserves the right to modify, suspend or discontinue all or any part at any time with or without notice. Unless specifically exempted, any new features, services or software applications introduced shall be subject to these Terms of Service.&lt;/p&gt; \n\n&lt;p&gt;&lt;strong&gt;Failure to comply with these Terms of Service&lt;/strong&gt;&lt;/p&gt;  \n\n    &lt;p&gt;In the event that you commit a breach of these Terms of Service JG reserves the right at its sole discretion to immediately and without notice suspend or permanently deny your access to all or part of the Website and associated services.&lt;/p&gt;\n \n&lt;p&gt;&lt;strong&gt;Termination&lt;/strong&gt;&lt;/p&gt;  \n \n&lt;p&gt;You may discontinue use of the Website and associated services at any time. These Terms of Service will continue to apply to past use by you.&lt;/p&gt; \n \n&lt;p&gt;&lt;strong&gt;Disclaimer and Limitation of Liability&lt;/strong&gt;&lt;/p&gt;   \n\n&lt;p&gt;JG does not, and nothing in these Terms of Service shall act to, exclude or limit JG''s liability for death or personal injury resulting from its negligence, fraud or any other liability which may not by applicable law be excluded or limited. You agree that your use of the Website and its associated services is on an &quot;as is&quot; and &quot;as available&quot; basis and that your use of the Website and its associated services is at your sole risk. JG does not guarantee continuous uninterrupted or secure access to our services and operation of the Website may be interfered with by numerous factors outside of our control. On that basis, except as expressly set out in these Terms of Service, JG does not provide conditions, warranties or other terms in relation to the Website or its associated services, to the extent permissible by law. JG shall undertake general maintenance and upkeep of the Website between 03:00 - 07:00 hours at the weekends from time to time. During these periods, the Website and its associated services may not be available for use.&lt;/p&gt;\n    \n    &lt;p&gt;Subject to exceptions listed above, in no event shall JG be liable (whether for breach of contract, negligence or for any other reason) for any loss or damage which you may claim to have suffered by reason of your accessing and use of the Website or its associated services, including (but not limited to) loss of profits, exemplary or special damages, loss of sales, loss of revenue, loss of goodwill, loss of any software or data, loss of bargain, loss of opportunity, loss of use of computer equipment, loss of or waste of management or other staff time, or for any indirect, consequential or special loss, however arising.&lt;/p&gt;\n    \n    &lt;p&gt;JG may change the format and content of the Website and its associated services from time to time. You should refresh your browser each time you visit the Website to ensure that you download the most up to date version of the Website, including the latest version of these Terms of Service.&lt;/p&gt;\n\n&lt;p&gt;&lt;strong&gt;Governing law&lt;/strong&gt;&lt;/p&gt;  \n \n&lt;p&gt;These Terms of Service are governed by English law and are subject to the exclusive jurisdiction of the English courts.&lt;/p&gt;\n  \n&lt;p&gt;&lt;strong&gt;Third party rights&lt;/strong&gt;&lt;/p&gt; \n \n&lt;p&gt;A person who is not a party to these Terms of Service has no right under the Contracts (Rights of Third Parties) Act 1999 to enforce any term of these Terms of Service.&lt;/p&gt;   '),
(6, 'Privacy Policy', 'privacy', 'Privacy Policy', '2013-02-22 17:05:52', ' &lt;p&gt;Your privacy is paramount. This is how serious we are about it: we will never pass on, trade, exchange or sell your personal details to &lt;strong&gt;anyone&lt;/strong&gt; without your express consent. We really mean &lt;em&gt;anyone&lt;/em&gt;: not a sister company, not a ''friendly third party'', not even the charity you are giving to.&lt;/p&gt;\n\n&lt;p&gt;There is one exception to that rule: when you build a JustGiving page or donate by text message (but for text messages only where you have completed gift aid form and agreed the we can pass details on), we will pass on your name, email address and postal address to the charity you have chosen to support, so that they can thank you. You can opt in to receive further communications from them if you like, but you don''t have to.  We will not pass your details onto a non member charity until they have entered into an agreement with us.&lt;/p&gt;\n\n&lt;p&gt;&lt;strong&gt;That''s it. If you want the full, extended version, here it is:&lt;/strong&gt;&lt;/p&gt;  \n\n&lt;p&gt;By visiting or registering with Justgiving.com, you are agreeing to the practices detailed in the Privacy Policy below so please read on to find out how information relating to you will be treated as you use our site.&lt;/p&gt;\n\n&lt;ol&gt;\n    &lt;li&gt;\n        &lt;strong&gt;The information we collect from you as a site visitor&lt;/strong&gt;&lt;br&gt;\n        JustGiving (JG) collects information about the Internet Protocol (IP) addresses of all visitors to our site. An IP address is a number assigned to your computer automatically when you use the internet. This information is only collected in aggregate (in other words, we are not able to monitor your individual usage of the site) and helps us monitor site traffic patterns in order to improve our service. \n        &lt;br/&gt;&lt;br/&gt;\n        This site uses cookies for some interactive features. A cookie is a small amount of data, which includes an anonymous unique identifier, that is sent to your browser from a web site''s computers and stored on your computer''s hard drive. Most browsers will automatically accept cookies. You can set your browser to reject cookies but some parts of the web site may not function properly if the cookies are rejected.\n    &lt;/li&gt;\n\n    &lt;li&gt;&lt;strong&gt;The information we collect from you as a registered user with a JustGiving page&lt;/strong&gt;&lt;br&gt;\n        When you create a secure personal account on JG for the purpose of creating a JustGiving page, we collect your title, name, email address, postal address, your phone number (where you agree to provide it) and your password. We will automatically pass on your name and email and home addresses to the member charity that will benefit from the donations you are collecting.  We will not pass on your details to a non member charity unless they have entered into an agreement with us.  In all other instances, we will not pass on this information to any third party unless you give us your express consent.\n    &lt;/li&gt;\n\n    &lt;li&gt;&lt;strong&gt;The information we collect from you when you donate&lt;/strong&gt;&lt;br&gt;\n       When you make a donation on JustGiving, we collect:  your first and last name; your email address; your declaration of tax status; your credit or debit card details (including card type, card number and expiry date); and your billing address.\n\n        &lt;ul&gt;    \n        &lt;li&gt;&lt;strong&gt;Your name.&lt;/strong&gt;&lt;br /&gt; If you do not want your name to be publicly associated with your donation, please enter your name as &quot;Anonymous&quot; when filling out the donation. Your name then will not appear on the fundraiser''s JustGiving page, nor will it appear in any online search results. Your name will always be passed on to the fundraiser but, if you have made an anonymous donation, your name will only appear in their secure account area.&lt;/li&gt;\n        &lt;li&gt;&lt;strong&gt;Your email address.&lt;/strong&gt;&lt;br /&gt; We need your email address so we can confirm your donation or let you know if there''s been a problem. However, we never share your email address with any other party unless you explicitly say so. If you''d like, we can pass your email address on to your fundraiser friend and/or to the member charity you''re donating to so they can thank you and keep you updated. We will not do this unless you expressly ask us to do so.  If your donation is to a non member charity, we will not pass your email address to them unless they have accepted your donation and entered into an agreement with us.  That''s it.&lt;/li&gt;\n        &lt;li&gt;&lt;strong&gt;Payment details.&lt;/strong&gt;&lt;br /&gt; We will only use your payment details for the purpose of processing your donation via our card processing partner Barclaycard. To find out more about the security of your payments, please read our &lt;a href=&quot;/info/security&quot;&gt;Security policy&lt;/a&gt;. If you make a Gift Aid declaration, we will pass it on to HM Revenue and Customs for the purpose of reclaiming tax on behalf of the recipient charity. Your Gift Aid declaration includes your name and home address (which may be different from your billing address) along with the confirmation that you are paying sufficient amounts of tax in the current tax year. All of this information is held securely and will never be passed on or sold to anyone else. Ever.&lt;/li&gt;\n        &lt;/ul&gt;\n\n    &lt;/li&gt;\n    &lt;li&gt;&lt;strong&gt;The information we collect from you when you donate by text message&lt;/strong&gt;\n    &lt;p&gt;When you make a donation by text message, we collect: your first and last name; your mobile telephone number; the name of the charity you want to donate to; and the amount of your donation.  We may ask you to provide your email address.&lt;/p&gt;\n    &lt;p&gt;If you donate by text message we will reply to your message and give you the choice to add gift aid to your donation.  If you choose to add gift aid to your donation we will collect your home address and postcode so that we can process your gift aid supplement.  When you donate by text we will look after your information as carefully as we do when you donate on the website.&lt;/p&gt;\n    &lt;/li&gt;\n    \n    &lt;li&gt;&lt;strong&gt;The information we collect from you when you use Fundraising Coach&lt;/strong&gt;\n    &lt;p&gt;When you use the Fundraising Coach application (&quot;&lt;strong&gt;FC&lt;/strong&gt;&quot;) you will access your social media accounts and other communication tools, such as Gmail, Yahoo! Mail, Hotmail, Twitter and Facebook (&quot;&lt;strong&gt;Your Accounts&lt;/strong&gt;&quot;) through FC.  When we access Your Accounts as part of the FC service we will collect the names and electronic addresses of the people in your contacts lists.&lt;/p&gt;\n        &lt;ul&gt;\n            &lt;li&gt;&lt;strong&gt;FC contact lists&lt;/strong&gt;&lt;br&gt;\n            When we collect the names and electronic addresses of your contacts we will ask you to sort them into two contact lists - one for &quot;fans&quot; (eg family and close friends) and one for &quot;Supporters&quot; (eg colleagues and other relatives).  When the contacts are sorted into the different contact lists FC will help you to generate and send emails requesting donations.  There will be two versions of the email which will be slightly different depending on which contact list the contact is in.  We will record the contact lists so that the right messages are sent to your contacts.&lt;/li&gt;\n\n            &lt;li&gt;&lt;strong&gt;Your contacts&lt;/strong&gt;&lt;br&gt;\n            When we collect the details of your contacts from Your Accounts, we will give you the choice of which contacts you want to include in your fundraising campaign.  You can choose individual contacts to add to your FC contact lists or you can select all contacts.  Any contact who you choose not to include in your FC contact lists will not be sent any emails through FC and we will not keep a record of or use their details for any other purpose.  At any point during your fundraising campaign you can choose to remove a contact from the campaign and they will receive no further messages through FC.  To do this just log in to your own JustGiving page, access FC and de-select the individual from your FC contact lists.  We will only use the information we collect relating to your contacts for the purposes of running your fundraising campaign through FC.&lt;/li&gt;\n            &lt;li&gt;&lt;strong&gt;At the end of your campaign&lt;/strong&gt;&lt;br&gt;\n            When your fundraising campaign is finished we will keep a record of your FC contact lists.  By accepting the Privacy Policy you agree to us keeping a record of your FC contact lists for up to six months.  At any time you will be able to remove individual contacts or delete the whole contact lists for yourself in the same way that you can at any point during the campaign.  We will automatically delete your FC contact lists after six months.  This will not affect the address books you already have in your standard JG account. &lt;/li&gt;\n        &lt;/ul&gt;\n        &lt;p&gt;When you provide your contacts'' electronic addresses by using FC, we guarantee that we will only use them for the purposes of running your fundraising campaign through FC.  We will not use their electronic addresses for any other purpose and will not provide them to anyone else.  We will keep your contact details secure and confidential.  Your contacts will not be sent any electronic communication from a JG address unless they donate and opt in to receive regular information from us or otherwise consent to us contacting them.&lt;/p&gt;\n        &lt;p&gt;By using FC you consent to us collecting the details of contacts from Your Accounts and you authorise us to use this information for the purposes set out in this Privacy Policy and on the Website.  You agree that all communications sent to your contacts through FC are your sole responsibility.  In relation to FC, we will at all times act as a data processor on your behalf.  You acknowledge that you will remain the data controller of your contacts'' data.&lt;/p&gt;\n    &lt;/li&gt;\n\n    &lt;li&gt;&lt;strong&gt;Email alerts and newsletters from JustGiving &lt;/strong&gt;&lt;br /&gt;\n        We may send you short emails from time to time: email alerts with important information about our service and newsletters with tips, stories and competitions. You will always be offered the ability to unsubscribe from our newsletters and from our fundraising tips, donation alerts and fundraising updates. If you have a personal JG account, you can change your contact preferences at any time by visiting the &acirc;&euro;&tilde;Your details'' and &acirc;&euro;&tilde;Change your email preferences'' sections.&lt;/li&gt;\n\n    &lt;li&gt;&lt;strong&gt;Charities'' use of your personal information &lt;/strong&gt;&lt;br /&gt;\n       Where you have opted in to pass on your personal details to a charity through our website or via text donation, JG declines all responsibility for the subsequent use of your personal information by the charity. If you wish to stop receiving further communications from a charity, please contact them directly.\n    &lt;/li&gt;\n\n    &lt;li&gt;&lt;strong&gt;Security precautions to protect your information&lt;/strong&gt;&lt;br /&gt;\n       The transfer of online transaction data to and from the web site is protected by the implementation of a Secure Sockets Layer protocol. Our VeriSign 128-bit secure certificate allows web browsers to verify the authenticity of our secure.justgiving.com domain and to communicate with our site securely, protecting confidential information from interception and hacking. It is your responsibility to keep your password secure at all times to avoid unauthorised use of your JG account.&lt;/li&gt;\n\n    &lt;li&gt;&lt;strong&gt;Tell a friend&lt;/strong&gt;&lt;br /&gt;\n       When you provide a friend''s email address for JG to forward a web address, we guarantee that we will only use your friend''s address for this purpose. We will not send them further emails unless they opt in to receive regular information from us.&lt;/li&gt;\n\n    &lt;li&gt;&lt;strong&gt;Legal process&lt;/strong&gt;&lt;br&gt;\n    Although unlikely, JG may be forced by law to provide personally identifiable information to the appropriate authorities.&lt;/li&gt;\n\n    &lt;li&gt;&lt;strong&gt;Acceptance of our Privacy Policy&lt;/strong&gt;&lt;br&gt;\n    Use of the JG website and associated services implies acceptance of this Privacy Policy. If you are not satisfied with any aspect of it please do not continue to use the website and services. This policy may change from time to time and you are deemed to have accepted the current version each time you use Justgiving.com or any site powered by us.&lt;/li&gt;\n&lt;/ol&gt;\n\n&lt;p&gt;If you have any questions about our privacy policy please contact us via email at &lt;a href=&quot;mailto:help@justgiving.com&quot;&gt;help@justgiving.com&lt;/a&gt;&lt;/p&gt;   '),
(7, 'Register Now', 'register', 'GiveAsOne Registration', '2013-02-22 17:49:38', ' Registration Form   ');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
CREATE TABLE IF NOT EXISTS `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `templateName` varchar(50) NOT NULL,
  `userView` text NOT NULL,
  `cmsView` text NOT NULL,
  `tableName` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tableName` (`tableName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `templateName`, `userView`, `cmsView`, `tableName`, `timestamp`) VALUES
(3, 'skyblue', 'index.php', 'view_cms.php', 'skyblue', '2013-02-21 05:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `usercontrol`
--

DROP TABLE IF EXISTS `usercontrol`;
CREATE TABLE IF NOT EXISTS `usercontrol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `accesscode` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `fundId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `fundId` (`fundId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usercontrol`
--

INSERT INTO `usercontrol` (`id`, `username`, `accesscode`, `salt`, `fundId`) VALUES
(1, 'admin', '20ccff588bd5bd5effe31b88967e36c156e2926c', 'Xlnz6s2', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
