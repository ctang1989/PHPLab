-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- Host: w.rdc.sae.sina.com.cn:3307
-- Generation Time: Dec 08, 2015 at 08:47 PM
-- Server version: 5.5.23
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `app_thinkshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_weixin_user_status`
--

CREATE TABLE IF NOT EXISTS `tbl_weixin_user_status` (
  `from_user` varchar(50) NOT NULL,
  `user_flag` tinyint(3) unsigned NOT NULL,
  `searched_for` varchar(20) DEFAULT NULL COMMENT '//查找内容'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='//用户状态表';

--
-- Dumping data for table `tbl_weixin_user_status`
--

INSERT INTO `tbl_weixin_user_status` (`from_user`, `user_flag`, `searched_for`) VALUES
('oeeUAj-sOaz_GtF84yOK4khDgyJo', 1, '医院');
