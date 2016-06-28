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



-- --------------------------------------------------------

--
-- 表的结构 `tbl_cs_corp`
--

CREATE TABLE IF NOT EXISTS `tbl_cs_corp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//序号',
  `name` varchar(40) NOT NULL COMMENT '//姓名',
  `telephone` char(15) NOT NULL COMMENT '//电话',
  `email` varchar(30) NOT NULL COMMENT '//电子邮箱',
  `company_name` varchar(40) NOT NULL COMMENT '//公司名称',
  `job_title` varchar(20) NOT NULL COMMENT '//职位',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `tbl_cs_corp`
--



-- --------------------------------------------------------

--
-- 表的结构 `tbl_cs_financing`
--

CREATE TABLE IF NOT EXISTS `tbl_cs_financing` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//序号',
  `company_name` varchar(40) NOT NULL COMMENT '//公司名称',
  `hq_addr` varchar(80) NOT NULL COMMENT '//总部地址',
  `industry_involved` varchar(20) NOT NULL COMMENT '//所属行业',
  `company_website` varchar(40) DEFAULT NULL COMMENT '//公司网址',
  `company_property` varchar(40) NOT NULL COMMENT '//公司属性',
  `stage_of_development` varchar(40) NOT NULL COMMENT '//发展阶段',
  `scale` varchar(40) NOT NULL COMMENT '//应收规模',
  `financing_amount` varchar(20) NOT NULL COMMENT '//融资金额',
  `sell_shares` varchar(20) NOT NULL COMMENT '//出让股份',
  `roadshow_time` date NOT NULL COMMENT '//路演时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//我要融资' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `tbl_cs_financing`
--



-- --------------------------------------------------------

--
-- 表的结构 `tbl_cs_register_list`
--

CREATE TABLE IF NOT EXISTS `tbl_cs_register_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//序号',
  `openid` char(50) NOT NULL COMMENT '//微信OpenID',
  `create_time` int(11) NOT NULL COMMENT '//消息创建时间',
  `create_time_datetime` datetime NOT NULL COMMENT '//消息创建时间日期时间格式',
  `url` varchar(100) NOT NULL COMMENT '//事件KEY值，设置的跳转URL ',
  `username` varchar(40) DEFAULT NULL COMMENT '//姓名',
  `tel_no` char(20) DEFAULT NULL COMMENT '//手机号码',
  `is_registered` tinyint(4) DEFAULT '0' COMMENT '//是否注册',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//用户注册表' AUTO_INCREMENT=691 ;

--
-- 转存表中的数据 `tbl_cs_register_list`
--



-- --------------------------------------------------------

--
-- 表的结构 `tbl_cs_user_status`
--

CREATE TABLE IF NOT EXISTS `tbl_cs_user_status` (
  `from_user` varchar(50) NOT NULL,
  `user_flag` tinyint(3) unsigned NOT NULL,
  `searched_for` varchar(20) DEFAULT NULL COMMENT '//查找内容'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='//用户状态表';

--
-- 转存表中的数据 `tbl_cs_user_status`
--

INSERT INTO `tbl_cs_user_status` (`from_user`, `user_flag`, `searched_for`) VALUES
('ocnt-t0oPIxYLsXIgAGK4QC_TR7s', 1, '酒店'),
('ocnt-t-CHUlVDJ8ly551JU4UCMT8', 1, '便利店'),
('ocnt-t8b3qwPVrdkSGjKXHJAqL5s', 1, '餐馆'),
('ocnt-t-zkY6imAfgBQbtBw8va3Qg', 1, '酒店'),
('ocnt-t4e6JMO98u8DyeFL7iww9n0', 1, '酒店'),
('ocnt-t5V6gEhhlRY5EF0rXJpBMhQ', 1, '酒店'),
('ocnt-t3LIC3U6Ruhj0RoKPppLfI0', 1, '酒店'),
('ocnt-t9sDhIUrxcYoCWaw3DyyZhc', 1, '酒店');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_cs_xinsan`
--

CREATE TABLE IF NOT EXISTS `tbl_cs_xinsan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//序号',
  `name` varchar(40) NOT NULL COMMENT '//姓名',
  `company_name` varchar(40) NOT NULL COMMENT '//公司名称',
  `industry_involved` varchar(20) NOT NULL COMMENT '//所属行业',
  `company_website` varchar(40) DEFAULT NULL COMMENT '//公司网址',
  `company_address` varchar(80) NOT NULL COMMENT '//公司地址',
  `main_business` varchar(40) NOT NULL COMMENT '//主营业务',
  `income` varchar(40) NOT NULL COMMENT '//收入',
  `profit` varchar(40) NOT NULL COMMENT '//利润',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//我要融资' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `tbl_cs_xinsan`
--



-- --------------------------------------------------------

--
-- 表的结构 `tbl_express_company`
--

CREATE TABLE IF NOT EXISTS `tbl_express_company` (
  `id` int(10) unsigned NOT NULL COMMENT '//序号',
  `exp_spell_name` varchar(20) NOT NULL COMMENT '//快递公司英文代码',
  `exp_text_name` varchar(20) NOT NULL COMMENT '//快递公司中文名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='//快递公司支持列表';

--
-- 转存表中的数据 `tbl_express_company`
--

INSERT INTO `tbl_express_company` (`id`, `exp_spell_name`, `exp_text_name`) VALUES
(1, 'ems', 'EMS快递'),
(2, 'shentong', '申通快递'),
(3, 'shunfeng', '顺丰快递'),
(4, 'yuantong', '圆通快递'),
(5, 'yunda', '韵达快递'),
(6, 'huitong', '汇通快递'),
(7, 'tiantian', '天天快递'),
(8, 'zhongtong', '中通快递'),
(9, 'zhaijisong', '宅急送快递'),
(10, 'pingyou', '中国邮政'),
(11, 'quanfeng', '全峰快递'),
(12, 'guotong', '国通快递'),
(13, 'jingdong', '京东快递'),
(14, 'sure', '速尔快递'),
(15, 'kuaijie', '快捷快递'),
(16, 'ririshun', '日日顺物流'),
(17, 'zhongtie', '中铁快运'),
(18, 'yousu', '优速快递'),
(19, 'longbang', '龙邦快递'),
(20, 'debang', '德邦物流'),
(21, 'rufeng', '如风达快递'),
(22, 'lianhaotong', '联昊通快递'),
(23, 'fedex', '国际Fedex'),
(24, 'fedexcn', 'Fedex国内'),
(25, 'dhl', 'DHL快递'),
(26, 'xinfeng', '信丰快递'),
(27, 'eyoubao', 'E邮宝'),
(28, 'zhongxinda', '忠信达快递'),
(29, 'changtong', '长通物流'),
(30, 'usps', 'USPS快递'),
(31, 'huaqi', '华企快递'),
(32, 'zhima', '芝麻开门快递'),
(33, 'gnxb', '邮政小包'),
(34, 'nell', '尼尔快递'),
(35, 'zengyi', '增益快递'),
(36, 'yuxin', '宇鑫物流'),
(37, 'xingchengzhaipei', '星程宅配快递'),
(38, 'anneng', '安能物流'),
(39, 'dada', '大达物流'),
(40, 'tongzhishu', '高考录取通知书'),
(41, 'aol', 'AOL快递'),
(42, 'dongjun', '成都东骏快递'),
(43, 'quanyi', '全一快递'),
(44, 'huayu', '华宇物流'),
(45, 'quanritong', '全日通快递'),
(46, 'minhang', '民航快递'),
(47, 'zhongyou', '中邮物流'),
(48, 'wanjia', '万家物流'),
(49, 'jiaji', '佳吉快运'),
(50, 'wanxiang', '万象物流'),
(51, 'beihai', '贝海国际快递'),
(52, 'junfeng', '墨尔本骏丰快递'),
(53, 'junda', '骏达快递'),
(54, 'quanxintong', '全信通快递'),
(55, 'ups', 'UPS快递'),
(56, 'tnt', 'TNT快递'),
(57, 'yibang', '一邦快递'),
(58, 'shenghui', '盛辉物流'),
(59, 'yafeng', '亚风快递'),
(60, 'dsu', 'D速快递'),
(61, 'datian', '大田物流'),
(62, 'jiayi', '佳怡物流'),
(63, 'jiayunmei', '加运美快递'),
(64, 'quanchen', '全晨快递'),
(65, 'ocs', 'OCS快递'),
(66, 'shengfeng', '盛丰物流'),
(67, 'xinbang', '新邦物流'),
(68, 'chengguang', '程光快递'),
(69, 'fengda', '丰达快递'),
(70, 'feihang', '原飞航物流'),
(71, 'jinyue', '晋越快递'),
(72, 'yuefeng', '越丰快递'),
(73, 'anjie', '安捷快递'),
(74, 'aae', 'AAE快递'),
(75, 'yuntong', '运通中港快递'),
(76, 'dpex', 'DPEX快递'),
(77, 'yuancheng', '远成物流'),
(78, 'gdyz', '广东邮政物流'),
(79, 'aramex', 'Aramex国际快递'),
(80, 'intmail', '国际邮政快递'),
(81, 'ytfh', '北京一统飞鸿快递'),
(82, 'lejiedi', '乐捷递快递'),
(83, 'santai', '三态速递'),
(84, 'chuanzhi', '传志快递'),
(85, 'gongsuda', '共速达物流|快递'),
(86, 'ees', '百福东方物流'),
(87, 'scs', '伟邦(SCS)快递'),
(88, 'pinganda', '平安达'),
(89, 'yad', '源安达快递'),
(90, 'disifang', '递四方速递'),
(91, 'yinjie', '顺捷丰达快递'),
(92, 'jldt', '嘉里大通物流'),
(93, 'coe', '东方快递'),
(94, 'chuanxi', '传喜快递'),
(95, 'feibao', '飞豹快递'),
(96, 'jingguang', '京广快递'),
(97, 'feiyuan', '飞远物流'),
(98, 'cszx', '城市之星'),
(99, 'rpx', 'RPX保时达'),
(100, 'citylink', 'CityLinkExpress'),
(101, 'chengshi100', '城市100'),
(102, 'lijisong', '成都立即送快递'),
(103, 'balunzhi', '巴伦支'),
(104, 'dayang', '大洋物流快递'),
(105, 'diantong', '店通快递'),
(106, 'fanyu', '凡宇快递'),
(107, 'haosheng', '昊盛物流'),
(108, 'hebeijianhua', '河北建华快递'),
(109, 'jixianda', '急先达物流'),
(110, 'suijia', '穗佳物流'),
(111, 'shengan', '圣安物流'),
(112, 'saiaodi', '赛澳递'),
(113, 'haihong', '山东海红快递'),
(114, 'weitepai', '微特派'),
(115, 'chengji', '城际快递'),
(116, 'fardar', 'Fardar'),
(117, 'henglu', '恒路物流'),
(118, 'hwhq', '海外环球快递'),
(119, 'jinda', '金大物流'),
(120, 'kuayue', '跨越快递'),
(121, 'kcs', '顺鑫(KCS)快递'),
(122, 'mingliang', '明亮物流'),
(123, 'minbang', '民邦快递'),
(124, 'minsheng', '闽盛快递'),
(125, 'xiyoute', '希优特快递'),
(126, 'xianglong', '祥龙运通快递'),
(127, 'yishunhang', '亿顺航快递'),
(128, 'benteng', '成都奔腾国际快递'),
(129, 'zhongtian', '济南中天万运'),
(130, 'zhengzhoujianhua', '郑州建华快递'),
(131, 'feite', '飞特物流'),
(132, 'huahan', '华翰物流'),
(133, 'baotongda', '宝通达'),
(134, 'chukouyi', '出口易物流'),
(135, 'yumeijie', '誉美捷快递'),
(136, 'kuanrong', '宽容物流'),
(137, 'nanbei', '南北快递'),
(138, 'wanbo', '万博快递'),
(139, 'suchengzhaipei', '速呈宅配'),
(140, 'shengbang', '晟邦物流'),
(141, 'baiqian', '百千诚国际物流'),
(142, 'gaotie', '高铁快递'),
(143, 'guanda', '冠达快递'),
(144, 'haolaiyun', '好来运快递'),
(145, 'hutong', '户通物流'),
(146, 'huahang', '华航快递'),
(147, 'huangmajia', '黄马甲快递'),
(148, 'ucs', '合众速递'),
(149, 'jiete', '捷特快递'),
(150, 'jiuyi', '久易快递'),
(151, 'kuaiyouda', '快优达速递'),
(152, 'lanhu', '蓝弧快递'),
(153, 'menduimen', '门对门快递'),
(154, 'peixing', '陪行物流'),
(155, 'riyu', '日昱物流'),
(156, 'lindao', '上海林道货运'),
(157, 'shiyun', '世运快递'),
(158, 'aoshuo', '奥硕物流'),
(159, 'nsf', '新顺丰（NSF）快递'),
(160, 'dajin', '大金物流'),
(161, 'coscon', '中国远洋运输(COSCON)'),
(162, 'yuhong', '宇宏物流'),
(163, 'jiayu', '佳宇物流'),
(164, 'gangkuai', '港快速递'),
(165, 'kuaitao', '快淘速递'),
(166, 'sutong', '速通物流'),
(167, 'anxun', '安迅物流'),
(168, 'hkpost', '香港邮政'),
(169, 'jppost', '日本邮政'),
(170, 'singpost', '新加坡邮政'),
(171, 'ztwl', '中铁物流'),
(172, 'ppbyb', '贝邮宝'),
(173, 'yanwen', '燕文物流'),
(174, 'feiyang', '飞洋快递'),
(175, 'zuochuan', '佐川急便'),
(176, 'hengyu', '恒宇运通'),
(177, 'mengsu', '蒙速快递'),
(178, 'wuhuan', '五环速递'),
(179, 'simai', '思迈快递'),
(180, 'jiahuier', '佳惠尔快递'),
(181, 'ande', '安得物流'),
(182, 'rongqing', '荣庆物流'),
(183, 'dashun', '大顺物流'),
(184, 'fangfangda', '方方达物流'),
(185, 'huiwen', '汇文快递'),
(186, 'sujie', '速捷快递'),
(187, 'dhlde', '德国DHL快递'),
(188, 'baiteng', '百腾物流'),
(189, 'dcs', 'DCS快递'),
(190, 'dpd', 'DPD快递'),
(191, 'tengxunda', '腾迅达物流'),
(192, 'pinjun', '品骏快递'),
(193, 'nengda', '能达快递'),
(194, 'ruifeng', '瑞丰速递'),
(195, 'suteng', '速腾快递'),
(196, 'zongxing', '纵行物流'),
(197, 'jingshi', '京世物流'),
(198, 'huacheng', '华诚物流');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_gift_email_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_gift_email_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//序号',
  `name` varchar(20) NOT NULL COMMENT '//姓名',
  `mailing_address` varchar(80) NOT NULL COMMENT '//礼物邮寄地址',
  `mailing_date` char(40) NOT NULL COMMENT '//邮寄日期',
  `mailing_time` char(40) NOT NULL COMMENT '//邮寄时间段',
  `telephone` varchar(20) NOT NULL COMMENT '//联系电话',
  `gift_series_number` varchar(16) NOT NULL COMMENT '//礼物兑换码',
  `exchange_date` date NOT NULL COMMENT '//兑换日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=121 ;

--
-- 表的结构 `tbl_meeting_booking`
--

CREATE TABLE IF NOT EXISTS `tbl_meeting_booking` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//序号',
  `meeting_room_id` char(20) NOT NULL COMMENT '//会议室编号',
  `meeting_date` date NOT NULL COMMENT '//会议日期',
  `meeting_theme` varchar(40) NOT NULL COMMENT '//会议主题',
  `meeting_start_time` time NOT NULL COMMENT '//会议开始时间',
  `meeting_end_time` time NOT NULL COMMENT '//会议结束时间',
  `meeting_booking_person` char(20) NOT NULL COMMENT '//会议预订人',
  `booking_create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '//预订创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='//会议预订表' AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `tbl_meeting_booking`
--


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

--
-- 表的结构 `tbl_weixin_user_status`
--

CREATE TABLE IF NOT EXISTS `tbl_weixin_user_status` (
  `from_user` varchar(50) NOT NULL,
  `user_flag` tinyint(3) unsigned NOT NULL,
  `searched_for` varchar(20) DEFAULT NULL COMMENT '//查找内容'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='//用户状态表';

--
-- 转存表中的数据 `tbl_weixin_user_status`
--

INSERT INTO `tbl_weixin_user_status` (`from_user`, `user_flag`, `searched_for`) VALUES
('oeeUAj-sOaz_GtF84yOK4khDgyJo', 1, '医院'),
('oeeUAj-sOaz_GtF84yOK4khDgyJo', 0, '美食');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_winning`
--

CREATE TABLE IF NOT EXISTS `tbl_winning` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '//序号',
  `openid` varchar(50) NOT NULL COMMENT '//微信OpenID',
  `winning_num` mediumint(9) NOT NULL COMMENT '//中奖号码',
  `create_time_datetime` datetime NOT NULL COMMENT '//创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=179 ;