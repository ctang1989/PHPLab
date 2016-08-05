-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2016 at 06:40 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_level`
--

CREATE TABLE IF NOT EXISTS `cms_level` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `level` tinyint(2) unsigned NOT NULL COMMENT '等级编号',
  `level_name` varchar(20) NOT NULL COMMENT '等级名称',
  `level_info` varchar(200) NOT NULL COMMENT '等级说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cms_level`
--

INSERT INTO `cms_level` (`id`, `level`, `level_name`, `level_info`) VALUES
(1, 5, '普通管理员', ''),
(2, 6, '超级管理员', '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_manage`
--

CREATE TABLE IF NOT EXISTS `cms_manage` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `admin_user` varchar(20) NOT NULL COMMENT '管理员账号',
  `admin_pass` char(40) NOT NULL COMMENT '管理员密码',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '管理员等级',
  `login_count` smallint(5) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `last_ip` varchar(20) NOT NULL DEFAULT '000.000.000.000' COMMENT '最后一次IP',
  `last_time` datetime NOT NULL COMMENT '最后一次登录时间',
  `reg_time` datetime NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cms_manage`
--

INSERT INTO `cms_manage` (`id`, `admin_user`, `admin_pass`, `level`, `login_count`, `last_ip`, `last_time`, `reg_time`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 6, 0, '000.000.000.000', '0000-00-00 00:00:00', '2016-08-05 10:53:30'),
(2, '唐超', '7c4a8d09ca3762af61e59520943dc26494f8941b', 5, 0, '000.000.000.000', '0000-00-00 00:00:00', '2016-08-05 10:55:25'),
(3, '我叫MT', '7c4a8d09ca3762af61e59520943dc26494f8941b', 5, 0, '000.000.000.000', '0000-00-00 00:00:00', '2016-08-05 12:43:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
