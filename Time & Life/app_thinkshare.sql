-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2016 年 04 月 12 日 01:01
-- 服务器版本: 5.6.23
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `app_thinkshare`
--

-- --------------------------------------------------------

--
-- 表的结构 `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` tinyint(3) unsigned NOT NULL COMMENT '//序号',
  `username` char(20) NOT NULL COMMENT '//登录用户名',
  `password` char(40) NOT NULL COMMENT '//sha1加密密码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'tangchao', '83858ed3236110e9191ae449423d06db1c0a0e3d');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_advance_repay`
--

CREATE TABLE IF NOT EXISTS `tbl_advance_repay` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '//序号',
  `income_date` date NOT NULL COMMENT '//收入时间',
  `income_account` varchar(60) NOT NULL COMMENT '//收入账户',
  `income_item` varchar(60) NOT NULL COMMENT '//收入项目',
  `income_amount` float NOT NULL COMMENT '//收入金额',
  `account_balance` float NOT NULL COMMENT '//账户余额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//旅游基金' AUTO_INCREMENT=6 ;

--
-- 表的结构 `tbl_babylon_wealth`
--

CREATE TABLE IF NOT EXISTS `tbl_babylon_wealth` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '//序号',
  `income_date` date NOT NULL COMMENT '//收入时间',
  `income_account` varchar(60) NOT NULL COMMENT '//收入账户',
  `income_item` varchar(60) NOT NULL COMMENT '//收入项目',
  `income_amount` float NOT NULL COMMENT '//收入金额',
  `account_balance` float NOT NULL COMMENT '//账户余额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//旅游基金' AUTO_INCREMENT=6 ;

--
-- 表的结构 `tbl_project_charge`
--

CREATE TABLE IF NOT EXISTS `tbl_project_charge` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '//序号',
  `project_name` varchar(60) NOT NULL COMMENT '//项目名称',
  `project_begin_date` date NOT NULL COMMENT '//项目开始时间',
  `project_end_date` date DEFAULT NULL COMMENT '//项目结束时间',
  `income_account` varchar(60) NOT NULL COMMENT '//收入账户',
  `project_charge` float NOT NULL COMMENT '//项目费用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//项目开发费用' AUTO_INCREMENT=16 ;

--
-- 表的结构 `tbl_travel_fund`
--

CREATE TABLE IF NOT EXISTS `tbl_travel_fund` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '//序号',
  `income_date` date NOT NULL COMMENT '//收入时间',
  `income_account` varchar(60) NOT NULL COMMENT '//收入账户',
  `income_item` varchar(60) NOT NULL COMMENT '//收入项目',
  `income_amount` float NOT NULL COMMENT '//收入金额',
  `account_balance` float NOT NULL COMMENT '//账户余额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//旅游基金' AUTO_INCREMENT=6 ;

--
-- 表的结构 `tbl_wage_income`
--

CREATE TABLE IF NOT EXISTS `tbl_wage_income` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT COMMENT '//序号',
  `income_date` date NOT NULL COMMENT '//入账日期',
  `income_account` varchar(60) NOT NULL COMMENT '//入账账户',
  `company` varchar(30) NOT NULL COMMENT '//所在公司',
  `income_amount` float(8,2) NOT NULL COMMENT '//入账金额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//工资收入表' AUTO_INCREMENT=10 ;

