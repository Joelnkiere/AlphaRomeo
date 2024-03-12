-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 30 sep. 2023 à 20:25
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `alpha`
--

-- --------------------------------------------------------

--
-- Structure de la table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) DEFAULT NULL,
  `short` varchar(1500) DEFAULT NULL,
  `descrip` varchar(10000) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `about`
--

INSERT INTO `about` (`id`, `title`, `short`, `descrip`, `img`, `url`, `date`, `status`) VALUES
(1, 'About Us', '', '<div>Furtherance Flora Solutions is on a mission to provide all possible solutions to the clients in cost effective way across all industry.  We are helping our clients to understand and implement new business ideas with the help of technologies, data and analytics.</div><div><br></div><div>Our highly experienced professional is working on same roof and promise to deliver quality with 100% efficiency and transparent work within the given turnaround time based on service level agreement.</div><div><br></div><div>Our methodology is all data driven which helps us to forecast the business requirement and based on the methodology the client can implement appropriate strategies to achieve their desired outcome for their business.</div>', '193618558About-us-min.jpg', NULL, 'Wed 09 Dec 2020', '0');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ad_id` int(100) NOT NULL AUTO_INCREMENT,
  `ad_email` varchar(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `ad_password` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_email`, `nom`, `ad_password`, `type`, `img`) VALUES
(1, 'admin@mail.com', 'joel nkiere', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '62133690_MG_5996.JPG'),
(2, 'isemasie@gmail.com', 'isemasie', '11f18828b2fa2009820f6e93109c93031bd40991', 'user', '1530915718feature.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `descrip` text NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id`, `title`, `category`, `descrip`, `img`, `date`, `status`, `auteur`) VALUES
(4, 'Chinese Transporters overtaking Western  Market', 'Technology', '<h6><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">China will overtake the US as the worldâ€™s biggest economy before the end of the decade after outperforming its rival during the global Covid-19 pandemic, according to a report.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">The Centre for Economics and Business Research said that it nowexpected the value of Chinaâ€™s economy when measured in dollars to exceed that of the US by 2028, half a decade sooner than it expected a year ago.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><span style=\"color: inherit; font-family: inherit; font-size: 1rem;\">In its annual league table of the growth prospects of 193 countries, the UK-based consultancy group said China had bounced back quickly from the effects of Covid-19 and would grow by 2% in 2020, as the one major global economy to expand.</span><br></p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><span style=\"color: inherit; font-family: inherit; font-size: 1rem;\">With the US expected to contract by 5% this year, China will narrow the gap with its biggest rival, the CEBR said. Overall, global gross domestic product is forecast to decline by 4.4% this year, in the biggest one-year fall since the second world war.</span><br></p></h6>', '1976955973news-27.jpg', 'Mon 08 Feb 2021', '0', ''),
(5, ' scscscs', 'Technologie', '<p>scsscscscddd<br></p>', '384285436Capture dâ€™Ã©cran 2023-07-28 151316.png', 'Wed 23 Aug 2023', '0', 'joel nkiere');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `libelle`) VALUES
(1, 'webinaire'),
(2, 'conference'),
(3, 'formation');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(9, 'information'),
(6, 'Technologie');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `nomcli` varchar(60) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `service` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `date_com` varchar(20) NOT NULL,
  `etat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_com`, `nomcli`, `telephone`, `service`, `detail`, `date_com`, `etat`) VALUES
(1, 'joel', '0982539444', '', 'fkddksdd;d;d;', 'fkddksdd;d;d;', 'non lu'),
(2, 'nkiere', '098455334', '', 'derttodfofo', 'Mon 18 Sep 2023', 'non lu'),
(3, 'joel nkiere', '08259930444', 'Graphisme', 'je n\'ai pas de detail Ã  te donner', 'Mon 18 Sep 2023', ''),
(8, 'd', 'd', 'Selectionner un service', 'd', 'Tue 19 Sep 2023', ''),
(9, 'ddd', '098455334', 'Formation', ';sss;s', 'Thu 28 Sep 2023', 'non lu');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) DEFAULT NULL,
  `descrip` varchar(15000) DEFAULT NULL,
  `categorie` varchar(50) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `auteur` varchar(100) NOT NULL,
  `date_event` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id`, `title`, `descrip`, `categorie`, `img`, `auteur`, `date_event`) VALUES
(7, 'Food & Health For Poor', 'Non Governmental Organisations, or NGOs, as they are called in common \r\nparlance, are organisations which are involved in carrying out a wide \r\nrange of activities for the benefit of underprivileged people and the \r\nsociety at large. As the name suggests, NGOs work independently, without\r\n any financial aid of the government although they may work in close \r\ncoordination with the government agencies for executing their projects.Â <br>\r\n<br>\r\nNGOs take up and execute projects to promote welfare of the community \r\nthey work with. They work to address various concerns and issues \r\nprevailing within the society. NGOs are not-for-profit bodies which \r\nmeans they do not have any commercial interest. NGOs are run on \r\ndonations made by individuals, corporate and institutions. They engage \r\nin fundraising activities to raise money for carrying out the work they \r\ndo. Ever since independence, NGOs have played a crucial role in helping \r\nthe needy in India, providing aid to the distressed and elevating the \r\nsocio-economic status of millions in the country.', 'formation', '1107851091HTML-CSS.jpg', 'joel nkiere', 'Wed 20 Sep 2023'),
(8, 'Education for Poor Childrens', '<p>Dhamma Viriyo  Foundation is an NGO in India directly benefitting\r\nover 750,000 children and their families every year, through more\r\nthan 350 live welfare projects on education, healthcare, livelihood\r\nand women empowerment, in over 1000 remote villages and slums across\r\n25 states of India.</p>\r\n<p>Education is both the means as well as the end to a better life:\r\nthe means because it empowers an individual to earn his/her\r\nlivelihood and the end because it increases one\'s awareness on a\r\nrange of issues â€“ from healthcare to appropriate social behaviour\r\nto understanding one\'s rights â€“ and in the process help him/her\r\nevolve as a better citizen.</p>\r\n<p>Doubtless, education is the most powerful catalyst for social\r\ntransformation. But child education cannot be done in isolation. A\r\nchild will go to school only if the family, particularly the mother,\r\nis assured of healthcare and empowered. Moreover, when an elder\r\nsibling is relevantly skilled to be employable and begins earning,\r\nthe journey of empowerment continues beyond the present generation.</p>\r\n', 'formation', '1743090129fb_icon_325x325.png', 'joel nkiere', 'Wed 20 Sep 2023'),
(9, 'Help Old Age People', '<p>A leading charity working for the disadvantaged elderly of India,\r\nDhamma Viriyo has been active for over four decades. It has one of\r\nthe largest mobile healthcare programs across India, providing free\r\nhealthcare services to destitute elders.</p>\r\n<p>Cataract surgeries are one of the cornerstones of this\r\norganisation. Cataract is a leading cause of blindness in India.\r\nDhamma Viriyo conducts more than 45,000 eye surgeries for the blind\r\nelderly across 21 states. This has helped over 9 lakh elders not only\r\nin restoration of eyesight but also going back to work as independent\r\nindividuals.</p>\r\n<p>Dhamma Viriyo  also works towards providing palliative care to\r\nend-stage cancer patients. Pairing with several credible and\r\ncompetent hospitals, the organisation helps the poor elderly who\r\ncannot afford expensive medication for cancer.</p>\r\n', 'formation', '941807184developement-web-php-mysql.png', 'joel nkiere', 'Wed 20 Sep 2023'),
(10, 'Cataract surgeries are one of the', '<p>Cataract surgeries are one of the cornerstones of this\r\norganisation. Cataract is a leading cause of blindness in India.\r\nDhamma Viriyo conducts more than 45,000 eye surgeries for the blind\r\nelderly across 21 states. This has helped over 9 lakh elders not only\r\nin restoration of eyesight but also going back to work as independent\r\nindividuals.</p>\r\n<p>Dhamma Viriyo  also works towards providing palliative care to\r\nend-stage cancer patients. Pairing with several credible and\r\ncompetent hospitals, the organisation helps the poor elderly who\r\ncannot afford expensive medication for cancer.</p>', 'webinaire', '1982274976about.jpg', 'joel nkiere', 'Wed 20 Sep 2023'),
(11, 'Cataract surgeries are one of the cornerstones of this organisation.', '<p>Cataract surgeries are one of the cornerstones of this\r\norganisation. Cataract is a leading cause of blindness in India.\r\nDhamma Viriyo conducts more than 45,000 eye surgeries for the blind\r\nelderly across 21 states. This has helped over 9 lakh elders not only\r\nin restoration of eyesight but also going back to work as independent\r\nindividuals.</p>\r\n<p>Dhamma Viriyo  also works towards providing palliative care to\r\nend-stage cancer patients. Pairing with several credible and\r\ncompetent hospitals, the organisation helps the poor elderly who\r\ncannot afford expensive medication for cancer.</p>', 'conference', '468416591Figure_1.png', 'joel nkiere', 'Wed 20 Sep 2023');

-- --------------------------------------------------------

--
-- Structure de la table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descc` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `descc`, `status`) VALUES
(2, 'What is included in your service?', 'qual blame belongs to those who fail in their duty through weaknes of will which is the same as saying through shrinking from toil and\r\npain. These cases are perfectly simple and easy to distinguish.', '0'),
(3, 'What warranties do i have for my shipments?', 'Equal blame belongs to those who fail in their duty through weaknes of will which is the same as saying through shrinking from toil and\r\npain. These cases are perfectly simple and easy to distinguish.', '0'),
(4, ' What are the usual methods of freight payment in transida?', 'Equal blame belongs to those who fail in their duty through weaknes of will which is the same as saying through shrinking from toil and\r\npain. These cases are perfectly simple and easy to distinguish.', '0'),
(5, ' Can i get payment terms?', 'Equal blame belongs to those who fail in their duty through weaknes of will which is the same as saying through shrinking from toil and\r\npain. These cases are perfectly simple and easy to distinguish.', '0');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id`, `name`, `type`, `img`, `status`) VALUES
(35, 'asdf', 'VEGETABLE', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `file_name`, `uploaded_on`, `status`) VALUES
(17, '7544.jpg', '2020-11-26 12:20:22', '1'),
(18, '8396.jpg', '2020-11-26 12:20:22', '1'),
(19, '3942239.jpg', '2020-11-26 12:20:22', '1'),
(20, '19834.jpg', '2020-11-26 16:21:04', '1'),
(21, 'closeup-calculator-stethoscope-healthcare-expenses-concept.jpg', '2020-11-26 16:31:14', '1'),
(24, 'Untitled.png', '2020-11-27 20:58:31', '1'),
(25, 'Charge Posting.png', '2020-11-28 13:29:43', '1'),
(26, 'Payment Posting.png', '2020-11-28 13:29:43', '1'),
(27, 'AR follow up.png', '2020-11-28 14:02:30', '1'),
(28, 'portrait-woman-customer-service-worker.jpg', '2020-12-03 16:12:51', '1'),
(29, '19197572.jpg', '2020-12-03 16:13:19', '1');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_mes` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cli` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date_envoi` varchar(20) NOT NULL,
  `etat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mes`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_mes`, `nom_cli`, `mail`, `titre`, `message`, `date_envoi`, `etat`) VALUES
(1, 'Joel nkiere', 'nkierejoe@gmail.com', 'remarque', 'le site est bon', 'Tue 19 Sep 2023', 'non lu'),
(2, 'nkiere', 'nkierejoe@gmail.com', 'ffflf', 'kdkdkdkd', 'Thu 28 Sep 2023', 'non lu'),
(3, 'essaie', 'essaie@gmail.com', 'essai', 'je suis entrai d\'essayer', 'Thu 28 Sep 2023', 'non lu');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `id_offre` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `date_pub` varchar(20) NOT NULL,
  `img` varchar(50) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  PRIMARY KEY (`id_offre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `titre`, `detail`, `date_pub`, `img`, `auteur`) VALUES
(1, 'ffooo', 'qqqq                ', 'Wed 23 Aug 2023', '1017927199alpharomeo.png', 'joel nkiere'),
(2, ',,,,', ',,s,hdhd', 'Fri 25 Aug 2023', '53551127Capture dâ€™Ã©cran 2023-07-28 151316.png', 'joel nkiere');

-- --------------------------------------------------------

--
-- Structure de la table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE IF NOT EXISTS `package` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `location` varchar(30) NOT NULL,
  `price` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `Itinerary` varchar(8000) NOT NULL,
  `Inclusions` varchar(8000) NOT NULL,
  `NOTE` varchar(8000) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `package`
--

INSERT INTO `package` (`id`, `name`, `type`, `location`, `price`, `day`, `img`, `Itinerary`, `Inclusions`, `NOTE`, `status`) VALUES
(20, 'Jaipur package', 'DOMESTIC', 'Rajasthan Package', 'Rs 5500/person ', '2 nights 3 days', '906673080hawa-mahal-min.jpg', '<h6 style=\"margin-bottom: 0.0001pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 24px;\"><b>Inclusions:</b></span></h6><h6 style=\"margin-bottom: 0.0001pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 24px;\"><b><br></b></span></h6><h5 style=\"margin-bottom: 0.0001pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">1. By car from Delhi<br></h5><h5>2. Stay and sightseeing</h5>', '', '', ''),
(21, 'Udaipur Package', 'DOMESTIC', 'Rajasthan Package', 'Rs 10000/person ', '3 nights 4 days', '699075253Udaipur-min.jpg', '<h6 style=\"margin-bottom: 0.0001pt; font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; line-height: normal; color: rgb(0, 0, 0); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\">Inclusions:</span></span></h6><h6 style=\"margin-bottom: 0.0001pt; font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; line-height: normal; color: rgb(0, 0, 0); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\"><br></span></span></h6><h5 style=\"margin-bottom: 0.0001pt; font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; line-height: normal; color: rgb(0, 0, 0); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">1. By train from Delhi<br></h5><h5 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);\">2. Stay and sightseeing</h5>', '', '', '0'),
(22, 'Leh Ladakh packages', 'DOMESTIC', 'Leh Ladakh packages', 'Rs 24000/person ', '5 nights 6 days', '1701637285leh-ladhhak-min.jpg', '<h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\">Inclusions:</span></span></h6><h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\"><br></span></span></h6><h5 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\">1. Stay in 3 star Hotel<br></h5><h5 style=\"font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);\"=\"\">2. Sightseeing</h5>', '', '', ''),
(23, 'Shimla Volvo Tour Package', 'DOMESTIC', 'Shimla Package', 'Rs 6000 /person ', '(03 Nights /04 Days) ', '496087263shimla-package-min.jpg', '<h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\">Inclusions:</span></span></h6><h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span lang=\"EN-US\" style=\"font-size: 12pt; font-family: \" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><b>( 2 Nights in Shimla\r\n&amp; 1 Night in Journey&nbsp;)</b><o:p></o:p></span></p></h6><h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\"><br></span></span></h6><ol><li style=\"margin-bottom: 0.0001pt;\"><b>1. Delhi - Shimla - Delhi Volvo Bus tickets<br></b></li><li><b>2. Two night accommodation in hotel</b></li><li><b>3. Welcome drink on arrivalf</b></li><li><b>4. Daily morning Bed tea, breakfast and Dinner</b></li><li><b>5. One Full day sightseeing of Local Shimla by individual car</b></li><li><b>6. One Full day sightseeing to Kufri by individual car</b></li></ol>', '', '', ''),
(24, 'Dharamshala - Dalhousie Tour Package by car ', 'DOMESTIC', 'Dharamshala Package', 'Rs 15000/person ', '( 4 Night / 5 Day )', '1112217381dharmsala.jpg', '<h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\">Inclusions:</span></span></h6><h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span lang=\"EN-US\" style=\"font-size: 12pt; font-family: \" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><b>( 2 Nights in Shimla\r\n&amp; 1 Night in Journey&nbsp;)</b><o:p></o:p></span></p></h6><h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><br></h6><ol><li style=\"margin-bottom: 0.0001pt;\"><b>1. One Night Accommodation in Dharamshala</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>2. Two Nights Accommodation in Dalhousie</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>3. Welcome Drink on Arrival</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>4. Daily Bed Tea, Breakfast &amp; Dinner</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>5. Pick up &amp; Drop Ex. Delhi / NCR</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>6. All transfers &amp; Sightseeing by A/C Indigo Car.</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>7. All toll tax, parking charges, driver charges, fuel cost inclusive.</b></li></ol>', '', '', '0'),
(25, 'Karnataka Package', 'DOMESTIC', 'Karnataka Package', 'Rs 17000/person ', '5 nights 6 days', '46960karnataka-package-min.jpg', '<h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\">Inclusions:</span></span></h6><h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span lang=\"EN-US\" style=\"font-size: 12pt; font-family: \" times=\"\" new=\"\" roman\",=\"\" serif;=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><b>( 2 Nights in Shimla\r\n& 1 Night in Journey )</b><o:p></o:p></span></p></h6><h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><br></h6><ul><li style=\"margin-bottom: 0.0001pt;\"><b>· 1 Night Accommodation in Mysore</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>· 2 Nights Accommodation in Coorg</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>· 2 Nights Accommodation in Ooty</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>All transfers & sightseeing by ac Indigo/Dzire car</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>All toll tax, parking charges, driver charges, fuel cost inclusive</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>The rates are included only Breakfast</b></li></ul>', '', '', ''),
(26, 'Udaipur-Jodhpur-Jaislmer Package', 'DOMESTIC', 'Rajasthan Package', 'Rs 15000/person ', '3 nights 4 days', '85403655Jodhpur.jpg', '<h6 style=\"margin-bottom: 0.0001pt; font-family: \"Source Sans Pro\", -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"; line-height: normal; color: rgb(0, 0, 0); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\">Inclusions:</span></span></h6><h6 style=\"margin-bottom: 0.0001pt; font-family: \"Source Sans Pro\", -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"; line-height: normal; color: rgb(0, 0, 0); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\"><br></span></span></h6><h5 style=\"margin-bottom: 0.0001pt; font-family: \"Source Sans Pro\", -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"; line-height: normal; color: rgb(0, 0, 0); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">1. By train from Delhi<br></h5><h5 style=\"font-family: \"Source Sans Pro\", -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"; color: rgb(0, 0, 0);\">2. Stay and sightseeing</h5>', '', '', '0'),
(27, 'Manali Package', 'DOMESTIC', 'Manali Package', 'Rs 6500/person ', '5 nights 6 days', '1776923579manali-package-min.jpg', '<h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\">Inclusions:</span></span></h6><h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><p class=\"MsoNormal\" style=\"margin-bottom: 0.0001pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b>(02 Nights in Journey &amp; 03 Nights Hotel Stay in Manali)</b><br></p></h6><h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><br></h6><ul><li style=\"margin-bottom: 0.0001pt;\"><b>* Delhi-Manali-Delhi by Push Back Seat Bus or Tempo Traveller</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>3 Nights Accommodation in Manali</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>* Welcome drink on arrival</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>3 Mornings Tea, Breakfast &amp; Dinner</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>* Pick up &amp; Drop form Manali bus stand to hotel.</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>* One Half day Local Sightseeing&nbsp;</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>* One Full day Sightseeing of Solang valley&nbsp;</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>* One Full day Sightseeing of Kullu &amp; Manikaran</b></li></ul>', '', '', '0'),
(28, 'Andaman Package', 'DOMESTIC', 'Andaman Package', 'Rs 17000/person ', '5 nights 6 days', '1648528522andaman-min.jpg', '<h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\">Inclusions:</span></span></h6><h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><br></h6><ul><li style=\"margin-bottom: 0.0001pt;\"><span lang=\"EN-US\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:\"Times New Roman\",serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\"><b>Stay in 3* hotel , </b></span></li><li style=\"margin-bottom: 0.0001pt;\"><span lang=\"EN-US\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:\"Times New Roman\",serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\"><b>Breakfast, </b></span></li><li style=\"margin-bottom: 0.0001pt;\"><span lang=\"EN-US\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:\"Times New Roman\",serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\"><b>3 nights Port\r\nBlair , </b></span></li><li style=\"margin-bottom: 0.0001pt;\"><span lang=\"EN-US\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:\"Times New Roman\",serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\"><b>2 nights Havelock</b></span><br></li></ul>', '', '', ''),
(29, 'Kerala Package', 'DOMESTIC', 'Kerala Package', 'Rs 24000/person ', '(4 nights 5 days) ', '1235606104kerala-min.jpg', '<h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><span style=\"font-size: 24px;\"><span style=\"font-weight: bolder;\">Inclusions:</span></span></h6><h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><br></h6><ul><li style=\"margin-bottom: 0.0001pt;\"><li style=\"margin-bottom: 0.0001pt;\"><b>Air Tickets, </b></li><li style=\"margin-bottom: 0.0001pt;\"><b>Airport transfers,</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>Stay in 3* hotel ,</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>Breakfast, 2 nights Munnar, </b></li><li style=\"margin-bottom: 0.0001pt;\"><b>1 night Thekkady</b></li><li style=\"margin-bottom: 0.0001pt;\"><b>1 night Alleppey</b></li></li></ul>', '', '', ''),
(30, 'Goa Package', 'DOMESTIC', 'Goa Package', 'Rs 15000/person ', '(3 nights 4 Days)', '1275767564goa-min.jpg', '<h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><b>Inclusions:</b></h6><h6 style=\"margin-bottom: 0.0001pt; font-family: \" source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" line-height:=\"\" normal;=\"\" color:=\"\" rgb(0,=\"\" 0,=\"\" 0);=\"\" background-image:=\"\" initial;=\"\" background-position:=\"\" background-size:=\"\" background-repeat:=\"\" background-attachment:=\"\" background-origin:=\"\" background-clip:=\"\" initial;\"=\"\"><b><br></b></h6><ul><li style=\"margin-bottom: 0.0001pt;\"><span lang=\"EN-US\" style=\"line-height: 115%;\" times=\"\" new=\"\" roman\",serif;mso-fareast-font-family:calibri;=\"\" mso-fareast-theme-font:minor-latin;mso-ansi-language:en-us;mso-fareast-language:=\"\" en-us;mso-bidi-language:ar-sa\"=\"\"><b>Air Tickets, </b></span></li><li style=\"margin-bottom: 0.0001pt;\"><span lang=\"EN-US\" style=\"line-height: 115%;\" times=\"\" new=\"\" roman\",serif;mso-fareast-font-family:calibri;=\"\" mso-fareast-theme-font:minor-latin;mso-ansi-language:en-us;mso-fareast-language:=\"\" en-us;mso-bidi-language:ar-sa\"=\"\"><b>Airport transfers, </b></span></li><li style=\"margin-bottom: 0.0001pt;\"><span lang=\"EN-US\" style=\"line-height: 115%;\" times=\"\" new=\"\" roman\",serif;mso-fareast-font-family:calibri;=\"\" mso-fareast-theme-font:minor-latin;mso-ansi-language:en-us;mso-fareast-language:=\"\" en-us;mso-bidi-language:ar-sa\"=\"\"><b>Stay in 3* hotel\r\n,</b></span></li><li style=\"margin-bottom: 0.0001pt;\"><span lang=\"EN-US\" style=\"line-height: 115%;\" times=\"\" new=\"\" roman\",serif;mso-fareast-font-family:calibri;=\"\" mso-fareast-theme-font:minor-latin;mso-ansi-language:en-us;mso-fareast-language:=\"\" en-us;mso-bidi-language:ar-sa\"=\"\"><b>Breakfast, </b></span></li><li style=\"margin-bottom: 0.0001pt;\"><span lang=\"EN-US\" style=\"line-height: 115%;\" times=\"\" new=\"\" roman\",serif;mso-fareast-font-family:calibri;=\"\" mso-fareast-theme-font:minor-latin;mso-ansi-language:en-us;mso-fareast-language:=\"\" en-us;mso-bidi-language:ar-sa\"=\"\"><b>1 day north goa sightseeing</b></span><br></li></ul>', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) DEFAULT NULL,
  `short` varchar(1500) DEFAULT NULL,
  `descrip` varchar(10000) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `title`, `short`, `descrip`, `img`, `url`, `date`, `status`) VALUES
(38, 'Home Delivery Services', 'We offer Home delivery service Service, the basic services for handling deliveries in express and cargo mode globally.', '<p open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; border: none; outline: none; line-height: inherit;\">We offer Home delivery service Service, the basic services for handling deliveries in express and cargo mode globally. There are two services offered under this: Domestic Express Services for delivering documents and small parcels.&nbsp; And Big container &amp; shipment services.<br></p>', '189322611project-8.jpg', NULL, 'Mon 08 Feb 2021', '0'),
(39, 'Marketing Digital', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n ', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>&nbsp;&nbsp;&nbsp; tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>&nbsp;&nbsp;&nbsp; quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>&nbsp;&nbsp;&nbsp; consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>&nbsp;&nbsp;&nbsp; cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>&nbsp;&nbsp;&nbsp; proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>&nbsp;&nbsp;&nbsp; tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>&nbsp;&nbsp;&nbsp; quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>&nbsp;&nbsp;&nbsp; consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>&nbsp;&nbsp;&nbsp; cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>&nbsp;&nbsp;&nbsp; proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '1712822753ei_1692007474109-removebg-preview (2).png', NULL, 'Wed 23 Aug 2023', '0'),
(40, 'Diagro', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit ', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>&nbsp;&nbsp;&nbsp; tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>&nbsp;&nbsp;&nbsp; quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>&nbsp;&nbsp;&nbsp; consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>&nbsp;&nbsp;&nbsp; cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>&nbsp;&nbsp;&nbsp; proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', '12410178232058866560image-23.jpg', NULL, 'Wed 23 Aug 2023', '0');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nom_site` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fb` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map` varchar(3000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `nom_site`, `adresse`, `email`, `phone`, `whatsapp`, `fb`, `twitter`, `linkedin`, `instagram`, `youtube`, `map`) VALUES
(1, 'Alpha-Romeo ', 'kinshasa, lemba', 'aromeoofficiel@gmail.com', '+243974720328', '+243825930444', 'https://facebook.com/joel.nkiere96', 'https://twitter.com', 'https://www.linkedin.com/company/92829220/', 'https://instagram.com', 'https://www.youtube.com/channel/UCo9_6crNBL5kDKWP3c5eGYA', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3093.7963837922716!2d-75.52637848464192!3d39.15661257953152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c764aa67a3b055%3A0x3ae0e625add8fccf!2s8%20The%20Green%20STE%20A%2C%20Dover%2C%20DE%2019901%2C%20USA!5e0!3m2!1sen!2sin!4v1611844096495!5m2!1sen!2sin\" width=\"600\" height=\"490\" style=\"border:0; width: 100%\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ');

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `fb` varchar(500) NOT NULL,
  `insta` varchar(500) NOT NULL,
  `linkdin` varchar(500) NOT NULL,
  `whatsapp` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `teams`
--

INSERT INTO `teams` (`id`, `title`, `designation`, `contact`, `img`, `date`, `status`, `fb`, `insta`, `linkdin`, `whatsapp`) VALUES
(2, 'Jill Peterson', 'Tour Consultant', '', '495717868user-3-118x118.jpg', 'Mon 11 Jan 2021', '0', '', '', '', ''),
(4, 'Diana Robinson', 'secrÃ©taire', 'dd', '696952815user-1-118x118.jpg', 'Wed 23 Aug 2023', '0', '', '', '', ''),
(5, 'Joel Nkiere', 'CEO ALPHA ROMEO', '0825930444', '10070097531.jpg', 'Wed 23 Aug 2023', '0', 'https://facebook.com/joel.nkiere96', 'https://instagramm.com', 'https://linkdin.com', '+243825930444'),
(6, 'soki', 'drh', '', '621196126243815024445_status_fdae96c095a44430ae677d71fdda1ac1 - Copie.jpg', 'Thu 07 Sep 2023', '0', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `descrip` varchar(10000) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `designation`, `descrip`, `img`, `url`, `date`, `status`) VALUES
(28, 'Nathan Felix', 'Account Speaclist', 'I am highly impressed with the professionalism and passion of people in this warehouse very neat & clean.', '785969917author-1.jpg', NULL, 'Thu 28 Jan 2021', '0'),
(29, 'Lillian Grace', 'VP, Green Valley Intenational', 'The staff is amazing! Very helpful and considerate with a sense of urgency &Loads are 99% on time.', '1606237998author-2.jpg', NULL, 'Thu 28 Jan 2021', '0'),
(30, 'Roman Dexter', 'Business Man, Newyork, USA', 'I only use GLOBAL DIGITAL SYSTEM CORPORATION  for my shipping needs. My clients have all come to expect the excellent shipping.', '1528721535author-3.jpg', NULL, 'Thu 28 Jan 2021', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
