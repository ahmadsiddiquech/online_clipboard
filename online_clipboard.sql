-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 07:08 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_clipboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('05509b8f1e53f9498d6868748bb3310f', '192.168.100.11', 'Mozilla/5.0 (Windows NT 6.1; rv:34.0) Gecko/20100101 Firefox/34.0', 1420092682, 'a:1:{s:9:"user_data";a:8:{s:15:"outlets_n_roles";a:1:{i:1;s:1:"5";}s:7:"user_id";s:1:"3";s:7:"role_id";s:1:"5";s:4:"name";s:5:"tahir";s:4:"role";s:12:"portal admin";s:10:"user_email";s:24:"tahir@digitalspinners.no";s:9:"user_name";s:5:"tahir";s:9:"outlet_id";s:1:"1";}}'),
('963470056b004e1ebd94d9e4b3e28440', '192.168.100.11', 'Mozilla/5.0 (Windows NT 6.1; rv:34.0) Gecko/20100101 Firefox/34.0', 1420032719, 'a:1:{s:9:"user_data";a:8:{s:15:"outlets_n_roles";a:1:{i:1;s:1:"5";}s:7:"user_id";s:1:"3";s:7:"role_id";s:1:"5";s:4:"name";s:5:"tahir";s:4:"role";s:12:"portal admin";s:10:"user_email";s:24:"tahir@digitalspinners.no";s:9:"user_name";s:5:"tahir";s:9:"outlet_id";s:1:"1";}}'),
('f80ae3c442e64aa564f6551be35895ec', '192.168.100.11', 'Mozilla/5.0 (Windows NT 6.1; rv:34.0) Gecko/20100101 Firefox/34.0', 1420104682, 'a:1:{s:9:"user_data";a:8:{s:15:"outlets_n_roles";a:1:{i:1;s:1:"5";}s:7:"user_id";s:1:"3";s:7:"role_id";s:1:"5";s:4:"name";s:5:"tahir";s:4:"role";s:12:"portal admin";s:10:"user_email";s:24:"tahir@digitalspinners.no";s:9:"user_name";s:5:"tahir";s:9:"outlet_id";s:1:"1";}}');

-- --------------------------------------------------------

--
-- Table structure for table `forget_pass`
--

CREATE TABLE IF NOT EXISTS `forget_pass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL COMMENT 'status',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `forget_pass`
--

INSERT INTO `forget_pass` (`id`, `email`, `password`, `status`) VALUES
(1, 'muddassirahmed62@gmail.com', 'patanai1122', 1);

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

CREATE TABLE IF NOT EXISTS `general_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timezones` varchar(255) NOT NULL,
  `date_format` int(11) NOT NULL,
  `time_format` int(11) NOT NULL,
  `outlet_id` int(1) NOT NULL,
  `theme` varchar(1) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `outlet_id` (`outlet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `timezones`, `date_format`, `time_format`, `outlet_id`, `theme`, `image`) VALUES
(1, 'UP5', 2, 2, 1, 'd', 'logo_1_color-splash.jpg'),
(2, 'UP5', 2, 2, 5, 'd', 'logo_1_color-splash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player_id` int(11) NOT NULL,
  `list_name` varchar(200) NOT NULL,
  `list_pass` varchar(200) NOT NULL,
  `share_link` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `player_id`, `list_name`, `list_pass`, `share_link`) VALUES
(3, 19, 'My List', '123', 'C264M9A1EjGjmGL8'),
(14, 19, 'list created from api', '123', 'CelCjh95KMl5h1lm');

-- --------------------------------------------------------

--
-- Table structure for table `list_items`
--

CREATE TABLE IF NOT EXISTS `list_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL,
  `page_title` varchar(200) NOT NULL,
  `page_url` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `list_items`
--

INSERT INTO `list_items` (`id`, `list_id`, `page_title`, `page_url`) VALUES
(3, 2, 'google', 'google.com'),
(4, 3, 'facebook', 'facebook.com'),
(8, 14, 'google from api', 'google.com');

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE IF NOT EXISTS `outlet` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('mosque') NOT NULL,
  `building_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `distance` float(11,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_registred` enum('Yes','No') NOT NULL DEFAULT 'No',
  `package_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `longitude` (`longitude`),
  KEY `latitude` (`latitude`),
  KEY `is_registred` (`is_registred`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`id`, `type`, `building_name`, `address`, `country`, `city`, `state`, `zip`, `email`, `url`, `phone`, `longitude`, `latitude`, `distance`, `image`, `is_registred`, `package_type`) VALUES
(1, 'mosque', 'Clipboard', 'Pak', 'Pak', 'Ryk', 'Punjab', '64200', 'info@clipboard.com', 'ahmad-pc', '111-111-111', '0.00000000', '0.00000000', 0.00, '', 'Yes', 6);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `role_id` int(11) NOT NULL,
  `right_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `outlet_id` int(11) NOT NULL DEFAULT '0',
  KEY `right_id` (`right_id`),
  KEY `role_id` (`role_id`),
  KEY `role_id_2` (`role_id`,`right_id`,`parent_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `join_date` datetime NOT NULL,
  `token` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `email`, `password`, `name`, `phone`, `status`, `join_date`, `token`) VALUES
(19, 'ahmadsiddiquech@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ahmad Siddique', '+923366605705', 1, '2020-06-03 01:28:00', 'HKgJeDm7kH72l3cd');

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `right` varchar(200) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `outlet_id`) VALUES
(1, 'portal admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles_outlet`
--

CREATE TABLE IF NOT EXISTS `roles_outlet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '2' COMMENT '1/Active, 2/Inactive, 3/Terminated',
  `address1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `address2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `outlet_id` int(11) unsigned DEFAULT NULL,
  `alert_id` int(11) unsigned NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `email` (`email`),
  KEY `station_id` (`outlet_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Registered User Information' AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `full_name`, `gender`, `email`, `designation`, `status`, `address1`, `parent_id`, `address2`, `city`, `state`, `country`, `phone`, `mobile`, `created_date`, `outlet_id`, `alert_id`, `role_id`) VALUES
(25, 'clipboard', '202cb962ac59075b964b07152d234b70', 'test', 'Male', 'test@test.com', '', 1, 'test address', 0, 'test address', 'tests', 'tests', 'pakistan', '051', '03333333', '2015-06-30', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `webpages`
--

CREATE TABLE IF NOT EXISTS `webpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` char(100) NOT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(1000) DEFAULT NULL,
  `url_slug` char(150) NOT NULL,
  `page_content` text CHARACTER SET utf8 NOT NULL,
  `page_rank` smallint(4) NOT NULL,
  `is_publish` tinyint(1) DEFAULT '0',
  `is_home` tinyint(1) DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  `page_type_id` tinyint(4) NOT NULL,
  `show_in_toppanel` tinyint(4) NOT NULL,
  `show_in_footer` tinyint(4) NOT NULL DEFAULT '0',
  `is_static` tinyint(1) NOT NULL DEFAULT '0',
  `outlet_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `outlet_id` (`outlet_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `webpages`
--

INSERT INTO `webpages` (`id`, `page_title`, `meta_keywords`, `meta_description`, `url_slug`, `page_content`, `page_rank`, `is_publish`, `is_home`, `parent_id`, `page_type_id`, `show_in_toppanel`, `show_in_footer`, `is_static`, `outlet_id`) VALUES
(1, 'Home', '0', '', 'home', '', 1, 1, 1, 0, 1, 1, 1, 0, 1),
(2, 'Contact Us', '0', '', 'contact-us', '', 4, 1, 0, 0, 1, 1, 0, 0, 1),
(3, 'About Us', '0', '', 'about-us', '<section>\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-lg-9 contact_map">\r\n<h1>OM OSS</h1>\r\n<div class="row">\r\n<div class="col-lg-7 mobile_detail">\r\n<h3>Title</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer porttitor sodales egestas. Donec ac tincidunt lorem. Sed finibus ac mauris ac feugiat. Praesent scelerisque libero nec mi posuere, vitae consectetur purus fringilla. Aliquam erat volutpat. Etiam aliquet elit id cursus dapibus. Nulla sagittis nisi tellus, ut commodo leo feugiat vitae. Cras a pulvinar tortor, a dictum lacus. Suspendisse mauris dolor, maximus a aliquet et, efficitur at turpis</p>\r\n</div>\r\n<div class="col-lg-5 mobile_detail"><a href="#banner0"> <img class="img-responsive" src="images/mobile.jpg" alt="Chania" /></a></div>\r\n</div>\r\n<div class="row">\r\n<div class="col-lg-12 mobile_detail">\r\n<h3>Title</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer porttitor sodales egestas. Donec ac tincidunt lorem. Sed finibus ac mauris ac feugiat. Praesent scelerisque libero nec mi posuere, vitae consectetur purus fringilla. Aliquam erat volutpat. Etiam aliquet elit id cursus dapibus. Nulla sagittis nisi tellus, ut commodo leo feugiat vitae. Cras a pulvinar tortor, a dictum lacus. Suspendisse mauris dolor, maximus a aliquet et, efficitur at turpis</p>\r\n</div>\r\n</div>\r\n<div class="row">\r\n<div class="col-lg-12 mobile_detail">\r\n<h3>Title</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer porttitor sodales egestas. Donec ac tincidunt lorem. Sed finibus ac mauris ac feugiat. Praesent scelerisque libero nec mi posuere, vitae consectetur purus fringilla. Aliquam erat volutpat. Etiam aliquet elit id cursus dapibus. Nulla sagittis nisi tellus, ut commodo leo feugiat vitae. Cras a pulvinar tortor, a dictum lacus. Suspendisse mauris dolor, maximus a aliquet et, efficitur at turpis</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="col-lg-3 bedrift-add"><a href="#banner0"> <img class="img-responsive" src="images/banner_02.jpg" alt="Chania" /></a></div>\r\n</div>\r\n</div>\r\n</section>', 2, 1, 0, 0, 1, 1, 1, 0, 1),
(4, 'Faq''s', '0', '', 'faqs', '<section>\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-lg-9">\r\n<h1>FAQ''S</h1>\r\n<!--acoordian start-->\r\n<div id="accordion" class="panel-group">\r\n<div class="panel panel-default">\r\n<div id="headingOne" class="panel-heading">\r\n<h4 class="panel-title"><a href="#collapseOne" data-toggle="collapse" data-parent="#accordion"> Collapsible Group Item #1 </a></h4>\r\n</div>\r\n<div id="collapseOne" class="panel-collapse collapse in">\r\n<div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingTwo" class="panel-heading">\r\n<h4 class="panel-title"><a class="collapsed" href="#collapseTwo" data-toggle="collapse" data-parent="#accordion"> Collapsible Group Item #2 </a></h4>\r\n</div>\r\n<div id="collapseTwo" class="panel-collapse collapse">\r\n<div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingThree" class="panel-heading">\r\n<h4 class="panel-title"><a class="collapsed" href="#collapseThree" data-toggle="collapse" data-parent="#accordion"> Collapsible Group Item #3 </a></h4>\r\n</div>\r\n<div id="collapseThree" class="panel-collapse collapse">\r\n<div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingFour" class="panel-heading">\r\n<h4 class="panel-title"><a class="collapsed" href="#collapseFour" data-toggle="collapse" data-parent="#accordion"> Collapsible Group Item #4 </a></h4>\r\n</div>\r\n<div id="collapseFour" class="panel-collapse collapse">\r\n<div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingFive" class="panel-heading">\r\n<h4 class="panel-title"><a class="collapsed" href="#collapseFive" data-toggle="collapse" data-parent="#accordion"> Collapsible Group Item #5 </a></h4>\r\n</div>\r\n<div id="collapseFive" class="panel-collapse collapse">\r\n<div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingSix" class="panel-heading">\r\n<h4 class="panel-title"><a class="collapsed" href="#collapseSix" data-toggle="collapse" data-parent="#accordion"> Collapsible Group Item #6 </a></h4>\r\n</div>\r\n<div id="collapseSix" class="panel-collapse collapse">\r\n<div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingSeven" class="panel-heading">\r\n<h4 class="panel-title"><a class="collapsed" href="#collapseSeven" data-toggle="collapse" data-parent="#accordion"> Collapsible Group Item #7 </a></h4>\r\n</div>\r\n<div id="collapseSeven" class="panel-collapse collapse">\r\n<div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingEight" class="panel-heading">\r\n<h4 class="panel-title"><a class="collapsed" href="#collapseEight" data-toggle="collapse" data-parent="#accordion"> Collapsible Group Item #8 </a></h4>\r\n</div>\r\n<div id="collapseEight" class="panel-collapse collapse">\r\n<div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.</div>\r\n</div>\r\n</div>\r\n<div class="panel panel-default">\r\n<div id="headingNine" class="panel-heading">\r\n<h4 class="panel-title"><a class="collapsed" href="#collapseNine" data-toggle="collapse" data-parent="#accordion"> Collapsible Group Item #9 </a></h4>\r\n</div>\r\n<div id="collapseNine" class="panel-collapse collapse">\r\n<div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.</div>\r\n</div>\r\n</div>\r\n</div>\r\n<!--accordian end--></div>\r\n<div class="col-lg-3 bedrift-add"><a href="#banner0"> <img class="img-responsive" src="images/banner_02.jpg" alt="Chania" /></a></div>\r\n</div>\r\n</div>\r\n</section>', 3, 1, 0, 0, 1, 1, 1, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
