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
(1, 'tangchao', '83858ed3236110e9191ae449423d06db1c0a0e3d'),
(2, 'sunhui', '752df4f8f866df7e8c62879be56cddce7d7aed23');

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
-- 转存表中的数据 `tbl_advance_repay`
--

INSERT INTO `tbl_advance_repay` (`id`, `income_date`, `income_account`, `income_item`, `income_amount`, `account_balance`) VALUES
(1, '2015-07-10', '6221 7302 1701 0211 826（江苏银行-苏州）', '工资固定划入（20%）', 2730, 2730),
(2, '2015-08-11', '6221 7302 1701 0211 826（江苏银行-苏州）', '工资固定划入（20%）', 2730, 5460),
(3, '2015-09-10', '6221 7302 1701 0211 826（江苏银行-苏州）', '工资固定划入（20%）', 2730, 8190),
(4, '2015-10-12', '6221 7302 1701 0211 826（江苏银行-苏州）', '工资固定划入（20%）', 2730, 10920),
(5, '2015-11-11', '6221 7302 1701 0211 826（江苏银行-苏州）', '工资固定划入（20%）', 2730, 13650);

-- --------------------------------------------------------

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
-- 转存表中的数据 `tbl_babylon_wealth`
--

INSERT INTO `tbl_babylon_wealth` (`id`, `income_date`, `income_account`, `income_item`, `income_amount`, `account_balance`) VALUES
(1, '2015-07-10', '6228 4804 0117 6449 015（农业银行-苏州）', '工资固定划入（10%）', 1365, 1365),
(2, '2015-08-11', '6228 4804 0117 6449 015（农业银行-苏州）', '工资固定划入（10%）', 1365, 2730),
(3, '2015-09-10', '6228 4804 0117 6449 015（农业银行-苏州）', '工资固定划入（10%）', 1365, 4095),
(4, '2015-10-12', '6228 4804 0117 6449 015（农业银行-苏州）', '工资固定划入（10%）', 1365, 5460),
(5, '2015-11-11', '6228 4804 0117 6449 015（农业银行-苏州）', '工资固定划入（10%）', 1365, 6825);


-- --------------------------------------------------------

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
-- 转存表中的数据 `tbl_project_charge`
--

INSERT INTO `tbl_project_charge` (`id`, `project_name`, `project_begin_date`, `project_end_date`, `income_account`, `project_charge`) VALUES
(1, '微信开发 - 蒙纳维国际', '2015-02-25', '2015-04-01', '4563 5161 0103 7126 832（中国银行-苏州）', 1400),
(2, '微信开发 - 海力德机械', '2015-03-20', '2015-04-25', '4563 5161 0103 7126 832（中国银行-苏州）', 1000),
(3, '微信开发 - 明阳天下（2nd）', '2015-04-02', '2015-04-08', '4563 5161 0103 7126 832（中国银行-苏州）', 300),
(4, '分享支持 - 来自微信朋友“善良”', '2015-04-05', '2015-04-05', '4563 5161 0103 7126 832（中国银行-苏州）', 88.88),
(5, '微信开发 - 沈阳理工大学毕业设计', '2015-04-22', '2015-06-25', '4563 5161 0103 7126 832（中国银行-苏州）', 500),
(6, '微信开发 - 青岛公众（qingdaozone）', '2015-04-22', '2015-05-06', '4563 5161 0103 7126 832（中国银行-苏州）', 2000),
(7, '微信开发 - Decade', '2015-05-31', '2015-05-31', '4563 5161 0103 7126 832（中国银行-苏州）', 100),
(8, '微信开发 - 客服接口', '2015-06-08', '2015-06-17', '4563 5161 0103 7126 832（中国银行-苏州）', 500),
(9, '微信开发 - 楚商集团', '2015-07-05', '2015-07-16', '4563 5161 0103 7126 832（中国银行-苏州）', 1000),
(10, 'QQ红包 - krytor(1215140655)', '2015-07-16', '2015-07-16', '4563 5161 0103 7126 832（中国银行-苏州）', 8.8),
(11, '微信开发 - 会议室预订系统', '2015-07-05', '0000-00-00', '4563 5161 0103 7126 832（中国银行-苏州）', 210),
(12, '微信开发 - 唯一搜索', '2015-07-29', '2015-07-29', '4563 5161 0103 7126 832（中国银行-苏州）', 100),
(13, '微信开发 - 楚商集团 - 更新', '2015-11-18', '2015-11-18', '4563 5161 0103 7126 832（中国银行-苏州）', 150),
(14, '微信开发 - 萍乡微传媒', '2015-12-08', '2015-12-09', '4563 5161 0103 7126 832（中国银行-苏州）', 300),
(15, '礼品兑换', '2016-02-24', '2016-03-02', '4563 5161 0103 7126 832（中国银行-苏州）', 200);

-- --------------------------------------------------------

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
-- 转存表中的数据 `tbl_travel_fund`
--

INSERT INTO `tbl_travel_fund` (`id`, `income_date`, `income_account`, `income_item`, `income_amount`, `account_balance`) VALUES
(1, '2015-03-10', '6214 8302 1718 0776（招商银行-上海）', '工资划入', 200, 200),
(2, '2015-04-10', '6214 8302 1718 0776（招商银行-上海）', '工资固定划入（5%）', 482.5, 682.5),
(3, '2015-07-10', '6214 8302 1718 0776（招商银行-上海）', '工资固定划入（300）', 300, 982.5),
(4, '2015-08-20', '6214 8302 1718 0776（招商银行-上海）', '工资固定划入（300）', 300, 1282.5),
(5, '2015-10-12', '6214 8302 1718 0776（招商银行-上海）', '工资固定划入（300）', 300, 1582.5);

-- --------------------------------------------------------

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

--
-- 转存表中的数据 `tbl_wage_income`
--

INSERT INTO `tbl_wage_income` (`id`, `income_date`, `income_account`, `company`, `income_amount`) VALUES
(1, '2015-07-10', '6217 0012 1004 5194 204（建设银行-上海）', '博彦科技（上海）有限公司', 13650.34),
(2, '2015-08-10', '6217 0012 1004 5194 204（建设银行-上海）', '博彦科技（上海）有限公司', 13650.34),
(3, '2015-09-10', '6217 0012 1004 5194 204（建设银行-上海）', '博彦科技（上海）有限公司', 13650.34),
(4, '2015-10-10', '6217 0012 1004 5194 204（建设银行-上海）', '博彦科技（上海）有限公司', 13650.34),
(5, '2015-11-10', '6217 0012 1004 5194 204（建设银行-上海）', '博彦科技（上海）有限公司', 13650.34),
(6, '2015-12-10', '6217 0012 1004 5194 204（建设银行-上海）', '博彦科技（上海）有限公司', 13650.34),
(7, '2016-01-10', '6217 0012 1004 5194 204（建设银行-上海）', '博彦科技（上海）有限公司', 13650.34),
(8, '2016-02-06', '6217 0012 1004 5194 204（建设银行-上海）', '博彦科技（上海）有限公司', 13650.34),
(9, '2016-03-10', '6217 0012 1004 5194 204（建设银行-上海）', '博彦科技（上海）有限公司', 13650.34);
