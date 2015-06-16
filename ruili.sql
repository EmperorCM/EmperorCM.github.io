-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 01 月 15 日 10:26
-- 服务器版本: 5.5.37
-- PHP 版本: 5.2.17p1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ruili`
--

-- --------------------------------------------------------

--
-- 表的结构 `nb_admin`
--

CREATE TABLE IF NOT EXISTS `nb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` tinyint(5) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `login_time` varchar(50) DEFAULT NULL,
  `create_time` varchar(50) DEFAULT NULL,
  `last_ip` varchar(15) NOT NULL,
  `login_count` tinyint(11) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `content` text,
  `purview` tinyint(5) DEFAULT '0' COMMENT '权限 -1：超级管理员 0：管理员 1：用户',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- 转存表中的数据 `nb_admin`
--

INSERT INTO `nb_admin` (`id`, `username`, `password`, `age`, `tel`, `login_time`, `create_time`, `last_ip`, `login_count`, `email`, `content`, `purview`) VALUES
(45, 'gongyy999', 'bcd56a76bfb39dad36bbb701d75e6afa', NULL, '13456155230', '1420869625', '', '125.115.44.181', 127, 'gongyy999@126.com', '', NULL),
(46, 'temp01', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '1421215144', NULL, '180.166.96.162', 9, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `nb_class`
--

CREATE TABLE IF NOT EXISTS `nb_class` (
  `classid` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `parentid` int(11) NOT NULL COMMENT '父级ID(0为一级分类)',
  `title` varchar(255) NOT NULL COMMENT '分类名称',
  `img` varchar(255) NOT NULL COMMENT '分类图片描述',
  `htmldir` varchar(255) NOT NULL COMMENT '模块文件夹',
  `create_time` varchar(50) NOT NULL COMMENT '创建时间',
  `description` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`classid`),
  KEY `parentid` (`parentid`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章分类' AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `nb_class`
--

INSERT INTO `nb_class` (`classid`, `parentid`, `title`, `img`, `htmldir`, `create_time`, `description`) VALUES
(1, 0, '公告', '', '', '1315488013', ''),
(2, 0, '活动', '', '', '1315488041', 'cn'),
(4, 2, '环球旅行', '', '', '1315488062', ''),
(5, 2, '红楼梦话剧世界巡演', '', '', '1315488076', 'cn'),
(7, 2, '招募水滨月', '', '', '1315488129', 'cn'),
(9, 2, '天宁岛旅游', '', '', '1315488157', 'cn'),
(12, 2, '星座运势', '', '', '1317114749', 'cn'),
(13, 0, '单独属于某模块请选此项', '', '', '1317114770', ''),
(16, 0, '媒体', '', '', '1317196342', 'cn'),
(17, 1, 'Mysql', '', '', '1317197609', 'cn'),
(18, 1, 'Nginx', '', '', '1318304382', 'cn'),
(19, 1, 'Linux', '', '', '1318561222', 'cn'),
(21, 2, '女神联盟', '', '', '1374044731', ''),
(22, 16, '技术笔记', '', '', '1376153762', ''),
(23, 16, '新闻资讯', '', '', '1376153779', '');

-- --------------------------------------------------------

--
-- 表的结构 `nb_comment`
--

CREATE TABLE IF NOT EXISTS `nb_comment` (
  `comment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `new_id` bigint(20) NOT NULL,
  `author` varchar(255) NOT NULL,
  `author_email` varchar(100) DEFAULT NULL,
  `author_url` varchar(255) DEFAULT NULL,
  `author_ip` varchar(100) NOT NULL,
  `create_time` int(11) NOT NULL,
  `content` text NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0' COMMENT '是否审核',
  `user_id` bigint(20) NOT NULL,
  `user_face` varchar(255) NOT NULL DEFAULT 'face_001.png',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `nb_comment`
--

INSERT INTO `nb_comment` (`comment_id`, `parent_id`, `new_id`, `author`, `author_email`, `author_url`, `author_ip`, `create_time`, `content`, `approved`, `user_id`, `user_face`) VALUES
(8, 0, 367, 'nbyum', 'gongyy999@126.com', NULL, '115.198.141.153', 1317289418, '万恶的IE浏览器！', 1, 0, 'face_007.png'),
(9, 0, 364, 'nb88', 'gongyy999@126.com', NULL, '115.198.141.153', 1317295314, '哈哈，本站的环境就是按照这篇文章布的，就是有些配置减小了', 1, 0, 'face_006.png'),
(14, 0, 392, 'nb88', 'gongyy999@gmail.com', NULL, '115.196.227.87', 1321351968, '用chrome浏览本站，会根据宽度显示不同界面', 1, 0, 'face_004.png');

-- --------------------------------------------------------

--
-- 表的结构 `nb_contact`
--

CREATE TABLE IF NOT EXISTS `nb_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) DEFAULT NULL,
  `fax` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `tel` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `postcode` int(6) DEFAULT '0',
  `qq` int(12) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `nb_contact`
--

INSERT INTO `nb_contact` (`id`, `address`, `fax`, `tel`, `email`, `postcode`, `qq`) VALUES
(1, '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `nb_girl`
--

CREATE TABLE IF NOT EXISTS `nb_girl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '标题',
  `shengao` varchar(50) DEFAULT NULL,
  `tizhong` varchar(50) NOT NULL COMMENT '详细内容',
  `xiema` varchar(50) NOT NULL DEFAULT '0' COMMENT '击点数',
  `xiongwei` varchar(50) NOT NULL COMMENT '添加时间',
  `yaowei` varchar(50) NOT NULL COMMENT '简介',
  `tunwei` varchar(50) NOT NULL COMMENT '图片标题',
  `pic` varchar(255) NOT NULL DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `desc` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章列表' AUTO_INCREMENT=138 ;

--
-- 转存表中的数据 `nb_girl`
--

INSERT INTO `nb_girl` (`id`, `name`, `shengao`, `tizhong`, `xiema`, `xiongwei`, `yaowei`, `tunwei`, `pic`, `create_time`, `desc`) VALUES
(4, '陆芷翊', '170', '49', '36', '84', '61', '88', 'Uploads/20150109/m_54af9ffa34635.jpg', 1420797336, '瑞丽女神馆 签约艺人'),
(8, '石楠', '166', '43', '36', '89', '60', '88', 'Uploads/20150109/m_54afa0e975d70.jpg', 1420797324, '瑞丽女神馆 签约艺人'),
(5, '陈熙', '165', '45', '36', '82', '6', '80', 'Uploads/20150109/m_54af9efe3d0ee.jpg', 1420797332, '瑞丽女神馆 签约艺人'),
(6, '艾希', '165', '43', '36', '86', '60', '87', 'Uploads/20150109/m_54af9dd8b1ab5.jpg', 1420797328, '瑞丽女神馆 签约艺人'),
(9, '苏晗', '174', '46', '37', '89', '60', '90', 'Uploads/20150109/m_54afa195d1c65.jpg', 1420797318, '瑞丽女神馆 签约艺人'),
(10, '万诗源', '175', '48', '38', '88', '62', '89', 'Uploads/20150109/m_54afa1f000f98.jpg', 1420797310, '瑞丽女神馆 签约艺人'),
(11, '亚亚', '172', '48', '37', '83', '60', '86', 'Uploads/20150109/m_54afa2ec14a9e.jpg', 1420797305, '瑞丽女神馆 签约艺人'),
(12, '杨怡婕', '175', '48', '38', '84', '63', '89', 'Uploads/20150109/m_54afa3f6194c7.jpg', 1420797301, '瑞丽女神馆 签约艺人'),
(13, '梦梦', '172', '48', '37', '90', '60', '88', 'Uploads/20150109/m_54afa47d9d6e2.jpg', 1420797296, '瑞丽女神馆 签约艺人'),
(14, '小美', '168', '43', '37', '88', '59', '86', 'Uploads/20150109/m_54afa4db430d1.jpg', 1420797291, '瑞丽女神馆 签约艺人'),
(15, '殷晓娜', '176', '54', '38', '90', '63', '90', 'Uploads/20150109/m_54afa51328ddd.jpg', 1420797284, '瑞丽女神馆 签约艺人'),
(17, '李荷伊', '174', '49', '38', '88', '64', '92', 'Uploads/20150112/m_54b35cf63a02b.jpg', 1421041298, ''),
(18, '李京宁', '168', '46', '37', '84', '60', '82', 'Uploads/20150112/m_54b35e2ae16ac.jpg', 1421041194, ''),
(19, '李梦颖', '168', '45', '36', '80', '60', '84', 'Uploads/20150112/m_54b35ee645cb7.jpg', 1421041382, ''),
(20, '李沫儿', '167', '45', '37', '88', '64', '86', 'Uploads/20150112/m_54b35f17567b7.jpg', 1421041431, ''),
(21, '李倩霆', '163', '42', '36', '81', '59', '85', 'Uploads/20150112/m_54b35f4b4df21.jpg', 1421041483, ''),
(22, '李尚蔚', '170', '47', '38', '80', '63', '88', 'Uploads/20150112/m_54b35f79d92c0.jpg', 1421041529, ''),
(23, '杨晓凤', '168', '48', '37', '87', '62', '83', 'Uploads/20150112/m_54b35fabf24ef.jpg', 1421041579, ''),
(24, '李昕', '170', '48', '37', '85', '62', '89', 'Uploads/20150112/m_54b35ff8b0343.jpg', 1421041656, ''),
(25, '李严', '175', '52', '39', '83', '61', '89', 'Uploads/20150112/m_54b36027be2db.jpg', 1421041703, ''),
(26, '李逸菲', '170', '48', '37', '88', '63', '90', 'Uploads/20150112/m_54b36058b0212.jpg', 1421041752, ''),
(27, '李裔佼', '170', '50', '37', '84', '64', '92', 'Uploads/20150112/m_54b36095461db.jpg', 1421041813, ''),
(28, '李媛', '176', '56', '39', '85', '70', '90', 'Uploads/20150112/m_54b360c839a2e.jpg', 1421041864, ''),
(29, '李玥', '173', '49', '39', '86', '63', '88', 'Uploads/20150112/m_54b360f460336.jpg', 1421041908, ''),
(30, '廖月', '173', '51', '39', '84', '61', '88', 'Uploads/20150112/m_54b3613b3ede7.jpg', 1421041979, ''),
(31, '林序', '168', '48', '38', '88', '67', '90', 'Uploads/20150112/m_54b3616ea186c.jpg', 1421042030, ''),
(32, '刘冰倩', '170', '54', '37', '90', '65', '92', 'Uploads/20150112/m_54b361ad977fe.jpg', 1421042093, ''),
(33, '刘俪', '175', '52', '38', '88', '64', '89', 'Uploads/20150112/m_54b361e20c9d6.jpg', 1421042146, ''),
(34, '刘柳', '168', '45', '37', '86', '62', '86', 'Uploads/20150112/m_54b3620fa81a5.jpg', 1421042191, ''),
(35, '刘儒范', '171', '52', '38', '86', '65', '88', 'Uploads/20150112/m_54b362385c8ce.jpg', 1421042232, ''),
(36, '刘史佳', '170', '50', '37', '86', '62', '88', 'Uploads/20150112/m_54b3627044a24.jpg', 1421042288, ''),
(37, '刘思扬', '175', '53', '39', '85', '66', '90', 'Uploads/20150112/m_54b3629d87ff1.jpg', 1421042333, ''),
(38, '刘苏苏', '170', '49', '37', '85', '62', '84', 'Uploads/20150112/m_54b362cb69089.jpg', 1421042379, ''),
(39, '卢小彧', '173', '50', '38', '84', '64', '89', 'Uploads/20150112/m_54b3632253b5c.jpg', 1421042466, ''),
(40, '陆金佳', '177', '51', '38', '87', '61', '89', 'Uploads/20150112/m_54b36355ded05.jpg', 1421042517, ''),
(41, '陆玲吕', '175', '52', '38', '82', '62', '87', 'Uploads/20150112/m_54b36386d92cf.jpg', 1421042566, ''),
(42, '陆思达', '172', '51', '38', '89', '65', '90', 'Uploads/20150112/m_54b363b90739b.jpg', 1421042617, ''),
(43, '陆晓菲', '173', '52', '39', '86', '67', '90', 'Uploads/20150112/m_54b363e9bf602.jpg', 1421042665, ''),
(44, '陆芷翊', '170', '48', '38', '84', '61', '88', 'Uploads/20150112/m_54b36558be9e5.jpg', 1421043032, ''),
(45, '鹿小茜', '171', '49', '37', '86', '64', '90', 'Uploads/20150112/m_54b365ab8e13b.jpg', 1421043115, ''),
(46, '路妍', '174', '50', '39', '85', '64', '90', 'Uploads/20150112/m_54b36623e44da.jpg', 1421043235, ''),
(47, '罗俊', '173', '52', '39', '86', '64', '88', 'Uploads/20150112/m_54b366b45acd2.jpg', 1421043380, ''),
(48, '罗彤', '168', '50', '37', '82', '63', '86', 'Uploads/20150112/m_54b38d0521f7b.jpg', 1421053189, ''),
(49, '吕佳颖', '170', '47', '37', '85', '64', '87', 'Uploads/20150112/m_54b38d3a85ab3.jpg', 1421053242, ''),
(50, '吕静', '174', '54', '36', '84', '63', '89', 'Uploads/20150113/m_54b4d6dd79cb0.jpg', 1421137629, ''),
(51, '吕珊珊', '170', '45', '38', '85', '62', '86', 'Uploads/20150113/m_54b4d71857a59.jpg', 1421137688, ''),
(52, '吕旖文', '176', '55', '39', '90', '64', '93', 'Uploads/20150113/m_54b4d9380b695.jpg', 1421138232, ''),
(53, '曼妮', '174', '52', '39', '85', '62', '92', 'Uploads/20150113/m_54b4d97973f8f.jpg', 1421138297, ''),
(54, '美妮', '166', '42', '36', '87', '60', '83', 'Uploads/20150113/m_54b4d9b9afe2d.jpg', 1421138361, ''),
(55, '萌萌', '168', '44', '37', '86', '62', '85', 'Uploads/20150113/m_54b4d9ee63ad8.jpg', 1421138414, ''),
(56, '孟宇菲', '178', '54', '39', '88', '62', '90', 'Uploads/20150113/m_54b4da3f4044a.jpg', 1421138495, ''),
(57, '沫沫', '175', '52', '38', '82', '62', '93', 'Uploads/20150113/m_54b4da76a8929.jpg', 1421138550, ''),
(58, '莫舒洁', '173', '48', '38', '86', '65', '88', 'Uploads/20150113/m_54b4daaac2b63.jpg', 1421138602, ''),
(59, '倪小糖', '173', '48', '38', '86', '62', '88', 'Uploads/20150113/m_54b4db05dc788.jpg', 1421138693, ''),
(60, '彭梓祺', '170', '45', '37', '84', '62', '86', 'Uploads/20150113/m_54b4db6cec77a.jpg', 1421138796, ''),
(61, '钱多多', '170', '50', '38', '85', '62', '90', 'Uploads/20150113/m_54b4dba4c9538.jpg', 1421138852, ''),
(62, '秦鲁豫', '180', '54', '39', '88', '63', '92', 'Uploads/20150113/m_54b4dbffc4e64.jpg', 1421138943, ''),
(63, '秦若兮', '170', '46', '37', '84', '59', '86', 'Uploads/20150113/m_54b4dc6c72c8e.jpg', 1421139052, ''),
(64, '秦艺', '170', '49', '37', '84', '59', '86', 'Uploads/20150113/m_54b4ddb9321ec.jpg', 1421139385, ''),
(65, '青青', '170', '48', '36', '84', '62', '90', 'Uploads/20150114/m_54b60633cb1d8.jpg', 1421215283, ''),
(66, '汝冰', '170', '50', '39', '83', '62', '89', 'Uploads/20150114/m_54b607c839df6.jpg', 1421215688, ''),
(67, '沙丹妮', '165', '42', '36', '82', '60', '83', 'Uploads/20150114/m_54b6080c2ee8c.jpg', 1421215756, ''),
(68, '尚官影儿', '172', '48', '39', '84', '61', '86', 'Uploads/20150114/m_54b6085615abd.jpg', 1421215830, ''),
(69, '邵佳妮', '168', '48', '38', '84', '60', '90', 'Uploads/20150114/m_54b60887dec14.jpg', 1421215879, ''),
(70, '邵夕颖', '178', '54', '38', '88', '65', '90', 'Uploads/20150114/m_54b608d568b39.jpg', 1421215957, ''),
(71, '邵颖', '164', '42', '38', '88', '57', '86', 'Uploads/20150114/m_54b6091855063.jpg', 1421216024, ''),
(72, '申冰', '167', '40', '36', '82', '58', '84', 'Uploads/20150114/m_54b6094e62ffc.jpg', 1421216078, ''),
(73, '沈黎', '172', '51', '39', '84', '65', '85', 'Uploads/20150114/m_54b6098947d0b.jpg', 1421216137, ''),
(74, '沈一', '174', '52', '39', '89', '65', '90', 'Uploads/20150114/m_54b60b31a0c4c.jpg', 1421216561, ''),
(75, '盛佳欣', '172', '50', '39', '86', '68', '87', 'Uploads/20150114/m_54b60b638ef95.jpg', 1421216611, ''),
(76, '诗静', '165', '45', '37', '85', '60', '88', 'Uploads/20150114/m_54b60b9d6dcf8.jpg', 1421216669, ''),
(77, '史祺', '174', '48', '37', '84', '60', '87', 'Uploads/20150114/m_54b60bd3d8dd6.jpg', 1421216723, ''),
(78, '斯嘉丽', '168', '47', '37', '88', '62', '86', 'Uploads/20150114/m_54b60bfe39e6c.jpg', 1421216766, ''),
(79, '宋慕倩', '165', '45', '36', '85', '60', '86', 'Uploads/20150114/m_54b60c359719e.jpg', 1421216821, ''),
(80, '宋夏易', '168', '44', '37', '84', '62', '85', 'Uploads/20150114/m_54b60c96f0414.jpg', 1421216918, ''),
(81, '苏妮', '164', '42', '37', '86', '60', '88', 'Uploads/20150114/m_54b60d3796ec8.jpg', 1421217079, ''),
(82, '孙丹妮', '172', '47', '39', '84', '61', '91', 'Uploads/20150114/m_54b60d75ce865.jpg', 1421217141, ''),
(83, '孙卉', '175', '53', '37', '85', '60', '88', 'Uploads/20150114/m_54b60d9fb37e6.jpg', 1421217183, ''),
(84, '孙韵', '170', '48', '37', '88', '60', '90', 'Uploads/20150114/m_54b60dd6115f6.jpg', 1421217238, ''),
(85, '唐枫', '174', '48', '39', '78', '60', '80', 'Uploads/20150114/m_54b60e051606a.jpg', 1421217285, ''),
(86, '唐嘉倩', '168', '47', '37', '85', '60', '86', 'Uploads/20150114/m_54b60e3752c04.jpg', 1421217335, ''),
(87, '陶恒', '168', '45', '38', '89', '63', '90', 'Uploads/20150114/m_54b60e72c391a.jpg', 1421217394, ''),
(88, '陶露丹', '168', '45', '37', '85', '70', '83', 'Uploads/20150114/m_54b60f593ae1d.jpg', 1421217625, ''),
(89, '田雪', '172', '48', '38', '83', '62', '86', 'Uploads/20150114/m_54b60fa758e22.jpg', 1421217703, ''),
(90, '甜甜', '175', '50', '38', '85', '62', '90', 'Uploads/20150114/m_54b60fcf064ac.jpg', 1421217743, ''),
(91, '佟思慧', '174', '52', '37', '89', '58', '91', 'Uploads/20150114/m_54b6103b07639.jpg', 1421217851, ''),
(92, '彤彤', '169', '45', '37', '84', '63', '80', 'Uploads/20150114/m_54b610644eda9.jpg', 1421217892, ''),
(93, '兔兔', '172', '47', '36', '85', '57', '87', 'Uploads/20150114/m_54b6109756fe5.jpg', 1421217943, ''),
(94, '宛恩', '175', '48', '39', '88', '60', '89', 'Uploads/20150114/m_54b610c9ecd33.jpg', 1421217993, ''),
(95, '万诗源', '175', '54', '38', '88', '62', '89', 'Uploads/20150114/m_54b61116c68f4.jpg', 1421218070, ''),
(96, '汪娇娇', '168', '54', '37', '89', '60', '89', 'Uploads/20150114/m_54b6115f9c861.jpg', 1421218143, ''),
(97, '汪欣纯', '166', '45', '36', '81', '60', '84', 'Uploads/20150114/m_54b61193943cf.jpg', 1421218195, ''),
(98, '王曾怡', '172', '48', '39', '87', '59', '88', 'Uploads/20150114/m_54b611bd92367.jpg', 1421218237, ''),
(99, '王佳妮', '164', '48', '37', '85', '63', '89', 'Uploads/20150114/m_54b611fa867a6.jpg', 1421218298, ''),
(100, '王佳文', '172', '50', '39', '88', '63', '88', 'Uploads/20150114/m_54b61233507a3.jpg', 1421218355, ''),
(101, '王嘉莹', '168', '45', '36', '85', '63', '87', 'Uploads/20150114/m_54b61277efc76.jpg', 1421218423, ''),
(102, '王贾贇', '168', '42', '37', '82', '56', '88', 'Uploads/20150114/m_54b612cbdc3da.jpg', 1421218507, ''),
(103, '汪洁滢', '170', '45', '36', '82', '61', '88', 'Uploads/20150114/m_54b61309d76e5.jpg', 1421218569, ''),
(104, '王丽娟', '176', '55', '39', '90', '64', '93', 'Uploads/20150114/m_54b6136a5dc94.jpg', 1421218666, ''),
(105, '王鹏', '160', '4045', '36', '88', '65', '90', 'Uploads/20150114/m_54b613fd08e69.jpg', 1421218813, ''),
(106, 'Lili', '172', '53', '39', '90', '64', '90', 'Uploads/20150114/m_54b6167629c2a.jpg', 1421219446, ''),
(107, 'AKI', '172', '52', '36', '85', '68', '89', 'Uploads/20150114/m_54b616a6d6f55.jpg', 1421219494, ''),
(108, 'Bonnie', '165', '44', '36', '85', '60', '88', 'Uploads/20150114/m_54b6170ddfb10.jpg', 1421219597, ''),
(109, 'Candice', '173', '40', '38', '86', '65', '88', 'Uploads/20150114/m_54b61749f01bb.jpg', 1421219657, ''),
(110, 'CC', '169', '48', '37', '88', '60', '89', 'Uploads/20150114/m_54b617fe9af12.jpg', 1421219838, ''),
(111, 'CoCo', '171', '48', '37', '86', '64', '88', 'Uploads/20150114/m_54b618381da0c.jpg', 1421219896, ''),
(112, 'Daisy', '168', '44', '37', '86', '63', '84', 'Uploads/20150114/m_54b61882e9f3a.jpg', 1421219970, ''),
(113, 'Dolors', '175', '48', '36', '88', '60', '89', 'Uploads/20150114/m_54b618bfef545.jpg', 1421220031, ''),
(114, 'JC', '170', '47', '38', '86', '62', '88', 'Uploads/20150114/m_54b618f792441.jpg', 1421220087, ''),
(115, 'Lena', '166', '50', '37', '90', '64', '88', 'Uploads/20150114/m_54b6192712728.jpg', 1421220135, ''),
(116, 'Liva', '170', '49', '38', '84', '64', '88', 'Uploads/20150114/m_54b6195a24484.jpg', 1421220186, ''),
(117, 'Sandy', '170', '46', '37', '84', '58', '84', 'Uploads/20150114/m_54b619933f123.jpg', 1421220243, ''),
(118, 'Sunny', '177', '53', '39', '84', '58', '84', 'Uploads/20150114/m_54b619cb9aaff.jpg', 1421220299, ''),
(119, 'Yuri', '165', '43', '36', '83', '60', '86', 'Uploads/20150114/m_54b61a0341e14.jpg', 1421220355, ''),
(120, '艾米其', '168', '46', '37', '86', '62', '89', 'Uploads/20150114/m_54b61a52d8666.jpg', 1421220434, ''),
(121, '安未希', '172', '50', '38', '90', '65', '92', 'Uploads/20150114/m_54b61ab7eba13.jpg', 1421220535, ''),
(122, '安馨儿', '170', '45', '37', '87', '64', '88', 'Uploads/20150114/m_54b61bc2b818f.jpg', 1421220802, ''),
(123, '贝贝', '170', '50', '37', '82', '69', '88', 'Uploads/20150114/m_54b61c67c700e.jpg', 1421220967, ''),
(124, '蔡薇琪', '170', '47', '36', '80', '66', '87', 'Uploads/20150114/m_54b61cbea06e5.jpg', 1421221054, ''),
(125, '蔡玉华', '170', '48', '38', '84', '55', '86', 'Uploads/20150114/m_54b61d2912c79.jpg', 1421221161, ''),
(126, '蔡智云', '172', '55', '38', '83', '63', '90', 'Uploads/20150114/m_54b61d57b13a9.jpg', 1421221207, ''),
(127, '曹小韻', '168', '47', '36', '83', '61', '92', 'Uploads/20150114/m_54b61d8680249.jpg', 1421221254, ''),
(128, '陈琢', '170', '46', '37', '85', '61', '86', 'Uploads/20150114/m_54b61db773fc3.jpg', 1421221303, ''),
(129, '陈冰洁', '172', '50', '38', '79', '61', '90', 'Uploads/20150114/m_54b61dee5792d.jpg', 1421221358, ''),
(130, '陈承', '178', '55', '40', '88', '65', '93', 'Uploads/20150114/m_54b61e410d087.jpg', 1421221441, ''),
(131, '陈梦倩', '170', '48', '38', '85', '60', '86', 'Uploads/20150114/m_54b61e769752d.jpg', 1421221494, ''),
(132, '陈霜', '167', '48', '37', '87', '60', '88', 'Uploads/20150114/m_54b6209a1cd17.jpg', 1421222042, ''),
(133, '陈文婧', '168', '50', '37', '84', '63', '90', 'Uploads/20150114/m_54b620da06709.jpg', 1421222106, ''),
(134, '陈孝霙', '172', '50', '38', '80', '69', '87', 'Uploads/20150114/m_54b62118df198.jpg', 1421222168, ''),
(135, '陈瑶', '172', '48', '37', '85', '62', '88', 'Uploads/20150114/m_54b6214b4e57d.jpg', 1421222219, ''),
(136, '陈怡琼', '160', '46', '36', '80', '62', '86', 'Uploads/20150114/m_54b621d078366.jpg', 1421222352, ''),
(137, '陈瑜', '170', '50', '39', '84', '61', '86', 'Uploads/20150114/m_54b6220ae3c12.jpg', 1421222410, '');

-- --------------------------------------------------------

--
-- 表的结构 `nb_label`
--

CREATE TABLE IF NOT EXISTS `nb_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `label_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8,
  `create_time` varchar(50) NOT NULL,
  `language` varchar(20) NOT NULL DEFAULT 'cn',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `nb_label`
--

INSERT INTO `nb_label` (`id`, `title`, `label_name`, `user`, `content`, `create_time`, `language`) VALUES
(1, '脚部内容', 'footer', 'gongyy999', '<a href="http://www.nb88.net/Index/page/id/1">关于我</a>', '1283318346', 'cn'),
(2, '热门活动', 'hotAct', 'gongyy999', '<ul class="clearfix">\r\n    <li><a href="/news/21">星座运势</a></li>\r\n    <li><a href="/news/12">女神联盟</a></li>\r\n    <li><a href="/news/9">天宁岛旅游</a></li>\r\n    <li><a href="/p_420">招募水滨月</a></li>\r\n    <li><a href="/news/4">环球旅行</a></li>\r\n    <li><a href="/news/5">红楼梦话剧世界巡演</a></li>\r\n</ul>', '1418310113', 'cn'),
(3, '资讯详情页侧栏链接', 'pSidebar', 'gongyy999', '<div>\r\n                        <ul>\r\n                            <li>\r\n                                <a href="/p_419">\r\n                                    <img src="/Uploads/conve/sidebarPic1.jpg" width="436px" alt="">\r\n                                </a>\r\n                            </li>\r\n                            <li style="margin:10px 0;">\r\n                                <a href="/p_420">\r\n                                    <img src="/Uploads/conve/sidebarPic2.jpg" width="436px" >\r\n                                </a>\r\n                            </li>\r\n                        </ul>\r\n                    </div>', '1420808008', 'cn'),
(4, '轮播图', 'lunbo', 'gongyy999', '<ul class="bnr-list clearfix">\r\n                    <li>\r\n                        <a href="/p_450"><img src="/Public/ruili/images/banner1.jpg" alt="" /></a>\r\n                    </li>\r\n                    <li class="hide">\r\n                        <a href="/p_419"><img src="/Public/ruili/images/banner2.jpg" alt="" /></a>\r\n                    </li>\r\n                </ul>\r\n                <div class="tit-btn clearfix">\r\n                    <ul class="btn clearfix">\r\n                        <li class="current"></li>\r\n                        <li></li>\r\n                    </ul>\r\n                </div>', '1420808393', 'cn'),
(5, '热门事件资讯列表', 'actList', 'gongyy999', '<ul>\r\n                            <li><a href="/news" class="f-rt">链接更多>></a><a href="/p_420">美少女战士计划！</a><span class="yellow-tips">活动</span></li>\r\n                            <li><a href="/model" class="f-rt">链接更多>></a><a href="/mList_1.html">人气模卡推荐！</a><span class="red-tips">精选</span></li>\r\n                        </ul>', '1420870182', 'cn');

-- --------------------------------------------------------

--
-- 表的结构 `nb_links`
--

CREATE TABLE IF NOT EXISTS `nb_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `create_time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `nb_links`
--

INSERT INTO `nb_links` (`id`, `title`, `url`, `logo`, `create_time`) VALUES
(2, '乐诺科技', 'http://www.lenoo.net/', NULL, '1322455658'),
(3, '天艺网', 'http://www.tienea.com/', NULL, '1322455684');

-- --------------------------------------------------------

--
-- 表的结构 `nb_model`
--

CREATE TABLE IF NOT EXISTS `nb_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `name` varchar(255) DEFAULT NULL,
  `modelId` int(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `conve2` varchar(255) NOT NULL,
  `content` text NOT NULL COMMENT '详细内容',
  `hit` int(11) NOT NULL DEFAULT '0' COMMENT '击点数',
  `create_time` varchar(50) NOT NULL COMMENT '添加时间',
  `intro` varchar(100) NOT NULL COMMENT '简介',
  `picList` text NOT NULL COMMENT '图片标题',
  `top` tinyint(11) NOT NULL DEFAULT '0',
  `comms` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章列表' AUTO_INCREMENT=425 ;

--
-- 转存表中的数据 `nb_model`
--

INSERT INTO `nb_model` (`id`, `title`, `name`, `modelId`, `cover`, `conve2`, `content`, `hit`, `create_time`, `intro`, `picList`, `top`, `comms`) VALUES
(2, '日式甜系', NULL, NULL, 'Uploads/20150107/m_54ad50223d555.jpg', 'Uploads/conve/conve2.jpg', '', 0, '1418818042', '日式甜系1||日式甜系2||日式甜系3||日式甜系4||日式甜系5||日式甜系6', 'Uploads/20150107/m_54ad50093d5e2.jpg,Uploads/20150107/m_54ad500b5d216.jpg,Uploads/20150107/m_54ad50223d555.jpg,Uploads/20150107/m_54ad5035c0fc1.jpg', 0, 0),
(3, '现代极简系列', NULL, NULL, 'Uploads/20150105/a54a97bdae4ad9.jpg', 'Uploads/conve/conve3.jpg', '', 0, '1418739757', '现代极简1||现代极简2||现代极简3||现代极简4||现代极简5', 'Uploads/20150105/m_54a97c6c4015e.jpg,Uploads/20150105/m_54a97c70de5bd.jpg,Uploads/20150105/m_54a97c729a066.jpg,Uploads/20150105/m_54a97c738fe3d.jpg,Uploads/20150105/m_54a97c76b5901.jpg', 0, 0),
(4, '小清新系列', NULL, NULL, 'Uploads/20150106/m_54ab3eb16a537.jpg', 'Uploads/conve/conve4.jpg', '', 0, '1418739769', '小清新1||小清新2||小清新3||小清新4||小清新5||小清新6', 'Uploads/20150106/m_54ab3eb16a537.jpg,Uploads/20150106/m_54ab3eba0463f.jpg,Uploads/20150106/m_54ab3ec2e0e01.jpg,Uploads/20150106/m_54ab3ecc4f50e.jpg,Uploads/20150106/m_54ab3ecf407fe.jpg', 0, 0),
(6, '自然（森系）', NULL, NULL, 'Uploads/20150107/m_54ad4da446177.jpg', 'Uploads/conve/conve6.jpg', '', 0, '1418739781', '自然（森系）1||自然（森系）2||自然（森系）3||自然（森系）4||自然（森系）5||自然（森系）6', 'Uploads/20150107/m_54ad4d95ef0b3.jpg,Uploads/20150107/m_54ad4d9a1d432.jpg,Uploads/20150107/m_54ad4d9deaf7d.jpg,Uploads/20150107/m_54ad4da446177.jpg,Uploads/20150107/m_54ad4da7418f9.jpg,Uploads/20150107/m_54ad4dab92afb.jpg', 0, 0),
(5, '中国风系列', NULL, NULL, 'Uploads/20150107/m_54ad4ee4813d7.jpg', 'Uploads/conve/conve5.jpg', '', 0, '1418817919', '中国风1||中国风2||中国风3||中国风4||中国风5||中国风6', 'Uploads/20150107/m_54ad4ee4813d7.jpg,Uploads/20150107/m_54ad4ee6970f9.jpg,Uploads/20150107/m_54ad4ee89f229.jpg,Uploads/20150107/m_54ad4ee9c9d1e.jpg,Uploads/20150107/m_54ad4eec5307e.jpg', 0, 0),
(7, '欧式复古', NULL, NULL, 'Uploads/20150107/m_54ad50f880a12.jpg', 'Uploads/conve/conve7.jpg', '', 0, '1420644610', '欧式复古1||欧式复古2||欧式复古3||欧式复古4||欧式复古5||欧式复古6', 'Uploads/20150107/m_54ad50f654c88.jpg,Uploads/20150107/m_54ad50f880a12.jpg,Uploads/20150107/m_54ad50fac4844.jpg,Uploads/20150107/m_54ad50fbd4ef5.jpg,Uploads/20150107/m_54ad50fdb1688.jpg', 0, 0),
(8, '潮流美风', NULL, NULL, 'Uploads/20150107/m_54ad51a3bfcee.jpg', 'Uploads/conve/conve8.jpg', '', 0, '1420644785', '潮流美风1||潮流美风2||潮流美风3||潮流美风4||潮流美风5', 'Uploads/20150107/m_54ad51a3bfcee.jpg,Uploads/20150107/m_54ad51aa2bdc7.jpg,Uploads/20150107/m_54ad51abb82a4.jpg,Uploads/20150107/m_54ad51aea05df.jpg', 0, 0),
(9, '时尚韩风', NULL, NULL, 'Uploads/20150107/m_54ad525284dee.jpg', 'Uploads/conve/conve9.jpg', '', 0, '1420644952', '时尚韩风1||时尚韩风2||时尚韩风3||时尚韩风4', 'Uploads/20150107/m_54ad524f057ba.jpg,Uploads/20150107/m_54ad5250e3432.jpg,Uploads/20150107/m_54ad525284dee.jpg,Uploads/20150107/m_54ad5254af7a1.jpg', 0, 0),
(10, '都市商业', NULL, NULL, 'Uploads/20150107/m_54ad53a48ccb1.jpg', 'Uploads/conve/conve10.jpg', '', 0, '1420645308', '都市商业1||都市商业2||都市商业3||都市商业4||都市商业5||都市商业6||都市商业7||都市商业8||都市商业9||都市商业10||都市商业11||都市商业12||都市商业13||都市商业1', 'Uploads/20150107/m_54ad538d6add9.jpg,Uploads/20150107/m_54ad538f67d6a.jpg,Uploads/20150107/m_54ad5391a7172.jpg,Uploads/20150107/m_54ad5393cc0b7.jpg,Uploads/20150107/m_54ad5395b4980.jpg,Uploads/20150107/m_54ad5397b4935.jpg,Uploads/20150107/m_54ad53999ff92.jpg,Uploads/20150107/m_54ad539b7dcbd.jpg,Uploads/20150107/m_54ad539cf2c50.jpg,Uploads/20150107/m_54ad539e301a7.jpg,Uploads/20150107/m_54ad53a0b8af1.jpg,Uploads/20150107/m_54ad53a3275e4.jpg,Uploads/20150107/m_54ad53a48ccb1.jpg,Uploads/20150107/m_54ad53b4656d4.jpg,Uploads/20150107/m_54ad53b7593be.jpg', 0, 0),
(11, '水墨风', NULL, NULL, 'Uploads/20150107/m_54ad54e448469.jpg', 'Uploads/conve/conve11.jpg', '', 0, '1420645630', '水墨风1||水墨风2||水墨风3||水墨风4||水墨风5||水墨风6', 'Uploads/20150107/m_54ad54cc94ef9.jpg,Uploads/20150107/m_54ad54ce07cf0.jpg,Uploads/20150107/m_54ad54d7ab85b.jpg,Uploads/20150107/m_54ad54e448469.jpg,Uploads/20150107/m_54ad54ecc02aa.jpg,Uploads/20150107/m_54ad54f0b92a0.jpg', 0, 0),
(1, '模卡排行', NULL, NULL, 'Uploads/20150107/m_54ad4ee4813d7.jpg', 'Uploads/conve/conve2.jpg', '', 0, '1420645630', '现代极简2||现代极简4||小清新5||中国风1||欧式复古5||都市商业11||水墨1||水墨4||都市商业8||自然（森系）3', 'Uploads/20150105/m_54a97c6c4015e.jpg,Uploads/20150105/m_54a97c738fe3d.jpg,Uploads/20150106/m_54ab3ecf407fe.jpg,Uploads/20150107/m_54ad4ee4813d7.jpg,Uploads/20150107/m_54ad50fdb1688.jpg,Uploads/20150107/m_54ad53a0b8af1.jpg,Uploads/20150107/m_54ad54cc94ef9.jpg,Uploads/20150107/m_54ad54e448469.jpg,Uploads/20150107/m_54ad539b7dcbd.jpg,Uploads/20150107/m_54ad4d9deaf7d.jpg', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `nb_module`
--

CREATE TABLE IF NOT EXISTS `nb_module` (
  `moduleid` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `parentid` int(11) NOT NULL COMMENT '父级ID(0为一级分类)',
  `title` varchar(255) NOT NULL COMMENT '分类名称',
  `img` varchar(255) NOT NULL COMMENT '分类图片描述',
  `create_time` varchar(50) NOT NULL COMMENT '创建时间',
  `description` varchar(50) NOT NULL DEFAULT 'cn',
  PRIMARY KEY (`moduleid`),
  KEY `parentid` (`parentid`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章分类' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `nb_module`
--

INSERT INTO `nb_module` (`moduleid`, `parentid`, `title`, `img`, `create_time`, `description`) VALUES
(1, 0, '资讯列表', '', '1418309355', 'cn'),
(2, 0, '最新动态', '', '1418309370', 'cn'),
(3, 0, '活动公告', '', '1418309383', 'cn');

-- --------------------------------------------------------

--
-- 表的结构 `nb_nav`
--

CREATE TABLE IF NOT EXISTS `nb_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `order` int(5) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '模板类型',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '文章类型(0：文字列表，1：图片列表，2：单页，3：外链)',
  `url` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `nb_nav`
--

INSERT INTO `nb_nav` (`id`, `title`, `order`, `status`, `type`, `url`, `create_time`) VALUES
(1, '新闻资讯', 0, 1, 1, 'news.html', 1315488013),
(2, '模卡推荐', 0, 1, 1, 'pList/cid/1', 1315488041),
(3, '造型摄影', 0, 1, 1, 'pList/cid/3', 1315488046),
(16, '排行榜', 0, 1, 1, 'pList/cid/16', 1317196342),
(18, '星座运势', 0, 1, 1, 'pList/cid/20', 1328581845),
(19, '女神联盟', 0, 1, 2, 'girl.html', 1331971954);

-- --------------------------------------------------------

--
-- 表的结构 `nb_news`
--

CREATE TABLE IF NOT EXISTS `nb_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `title2` varchar(255) DEFAULT NULL,
  `classid` int(10) NOT NULL DEFAULT '1' COMMENT '分类编码',
  `moduleid` int(10) NOT NULL DEFAULT '1' COMMENT '模块编号',
  `content` text NOT NULL COMMENT '详细内容',
  `hit` int(11) NOT NULL DEFAULT '0' COMMENT '击点数',
  `create_time` varchar(50) NOT NULL COMMENT '添加时间',
  `user` varchar(255) NOT NULL DEFAULT 'admin' COMMENT '添加者',
  `from` varchar(255) DEFAULT NULL,
  `intro` varchar(100) NOT NULL COMMENT '简介',
  `pic` text NOT NULL COMMENT '图片标题',
  `top` tinyint(11) NOT NULL DEFAULT '0',
  `comms` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章列表' AUTO_INCREMENT=421 ;

--
-- 转存表中的数据 `nb_news`
--

INSERT INTO `nb_news` (`id`, `title`, `title2`, `classid`, `moduleid`, `content`, `hit`, `create_time`, `user`, `from`, `intro`, `pic`, `top`, `comms`) VALUES
(412, '混沌之理 冰桶挑战', '混沌之理 冰桶挑战', 1, 1, '<p><img src="/Public/Uploads/20150109151527_90176.jpg" alt="" border="0" /></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">2014年9月9日，在这个暑假刚刚过去的日子里，瑞丽女神馆派出了庞大的SG团体。100位靓丽SG集体接受盛大“混沌之理”新手任务——“冰桶挑战”，路人纷纷驻足围观，最后的一丝夏天燥意也被一冲而光，。瑞丽女神馆精灵女神艾希作为S班班长作“开学发言”，宣告了“冰桶挑战”的正式开启。</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><img src="/Public/Uploads/20150109151549_92466.jpg" alt="" border="0" /><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;"><span style="font-size:14px;line-height:21px;">S班SG成员们化身游戏角色，在一旁待机，随着“冰桶挑战”时间的临近，有些紧张又有些期待。旁观的“家长们”也高举着相机，等着入学仪式的开始。</span></span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;"><span style="font-size:14px;line-height:21px;"><img src="/Public/Uploads/20150109151606_32916.jpg" alt="" border="0" /><br />\r\n</span></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">S班美女班主任与优秀学生代表在混沌之理巨大背景墙前合影，青春的气息肆意飞扬，连冰桶都无法浇灭场上瞬间火热的气氛，各种风格迥异的女神，哪个是你的菜~</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><img src="/Public/Uploads/20150109151638_27835.jpg" alt="" border="0" /><br />\r\n</span></p>', 0, '1420787800', 'admin', NULL, '', '', 0, 0),
(413, '2014上海浦东国际车展嘉年华', '2014上海浦东国际车展嘉年华', 1, 1, '<p class="MsoNormal"><span style="font-family:微软雅黑;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;"><img src="/Public/Uploads/20150109151932_48595.jpg" alt="" border="0" /><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;">2014上海浦东</span><a href="http://cpro.baidu.com/cpro/ui/uijs.php?rs=1&amp;u=http%3A%2F%2Fwww%2E9tour%2Ecn%2Finfo%2Finfo%5F21061%2Ehtml&amp;p=baidu&amp;c=news&amp;n=10&amp;t=tpclicked3_hc&amp;q=liuda0871cpr&amp;k=%B9%FA%BC%CA%B3%B5%D5%B9&amp;k0=%B9%FA%BC%CA%B3%B5%D5%B9&amp;k1=%C6%FB%B3%B5&amp;k2=%C6%FB%B3%B5%D5%B9%C0%C0&amp;k3=%D5%B9%BB%E1&amp;k4=%C6%FB%B3%B5%C6%B7%C5%C6&amp;k5=%D1%DD%B3%F6&amp;sid=da9704a93084520c&amp;ch=0&amp;tu=u1832624&amp;jk=be3c76a819384923&amp;cf=29&amp;fv=11&amp;stid=9&amp;urlid=0&amp;luki=2&amp;seller_id=1&amp;di=128"><span class="15" style="font-family:微软雅黑;background-position:initial initial;background-repeat:initial initial;">国际车展</span></a><span style="font-family:微软雅黑;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;">嘉年华精彩无与伦比，这是一场</span><a href="http://cpro.baidu.com/cpro/ui/uijs.php?rs=1&amp;u=http%3A%2F%2Fwww%2E9tour%2Ecn%2Finfo%2Finfo%5F21061%2Ehtml&amp;p=baidu&amp;c=news&amp;n=10&amp;t=tpclicked3_hc&amp;q=liuda0871cpr&amp;k=%C6%FB%B3%B5&amp;k0=%C6%FB%B3%B5&amp;k1=%C6%FB%B3%B5%D5%B9%C0%C0&amp;k2=%D5%B9%BB%E1&amp;k3=%C6%FB%B3%B5%C6%B7%C5%C6&amp;k4=%D1%DD%B3%F6&amp;k5=%B9%FA%BC%CA%D5%B9%C0%C0%D6%D0%D0%C4&amp;sid=da9704a93084520c&amp;ch=0&amp;tu=u1832624&amp;jk=be3c76a819384923&amp;cf=29&amp;fv=11&amp;stid=9&amp;urlid=0&amp;luki=3&amp;seller_id=1&amp;di=128"><span class="15" style="font-family:微软雅黑;background-position:initial initial;background-repeat:initial initial;">汽车</span></a><span style="font-family:微软雅黑;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;">和音乐的精彩之秀，是迄今为止亚洲规模最大的汽车音乐盛筵，史无前例的跨界，不同凡响的结合。瑞丽女神馆的女神们参加了其中的“新车秀”以及“车模秀”。</span><span style="font-family:微软雅黑;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;"><img src="/Public/Uploads/20150109151939_94929.jpg" alt="" border="0" /><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;">桃红与香槟色的撞击，谋杀无数菲林，香车美女的组合，永远是车展不灭的主题。</span><span style="font-family:微软雅黑;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;"><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;"><img src="/Public/Uploads/20150109152046_42522.jpg" alt="" border="0" /><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;">黑与白的冲突，彼此对立却又相互依存，同样的动人曲线，车展？车模展？总归都是男人的最爱。</span><span style="mso-spacerun:''yes'';font-family:宋体;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;"><img src="/Public/Uploads/20150109152100_42854.jpg" alt="" border="0" /><br />\r\n</span></p>', 0, '1420788061', 'admin', NULL, '', '', 0, 0),
(414, '2014  ChinaJoy 活动现场', '2014  ChinaJoy 活动现场', 1, 1, '<p><img src="/Public/Uploads/20150109152315_51886.jpg" alt="" border="0" /></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">瑞丽女神馆独家展台： &nbsp;</span><span style="font-family:微软雅黑;font-size:10.5pt;">盛大游戏&nbsp;竞技世界&nbsp;触控科技&nbsp;保卫萝卜&nbsp;IROCKS&nbsp;美峰数码&nbsp;梦想手游&nbsp;蓝港科技&nbsp;盛竞游戏&nbsp;空中网&nbsp;滚石游戏&nbsp;宜搜科技&nbsp;EA&nbsp;久游&nbsp;&nbsp;</span><span style="font-family:微软雅黑;font-size:10.5pt;">yeahmobi</span><span style="font-family:微软雅黑;font-size:10.5pt;">&nbsp;</span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;font-size:10.5pt;">&nbsp;</span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">瑞丽女神馆参与展台：</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">寅午伟业&nbsp;境界游戏&nbsp;罗技&nbsp;</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">还需要别的文字描述吗？</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">庞大的美女阵容引得观众纷纷驻足。</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><img src="/Public/Uploads/20150109152405_29241.jpg" alt="" border="0" /><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">与美丽SG的互动一向是游戏展商拉拢人气的不二法宝。宅男，腐女，大叔们都耐不住这种激动，纷纷参与活动，今天的主角就是你们。</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><img src="/Public/Uploads/20150109152422_48375.jpg" alt="" border="0" /><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">桂冠与白纱裙的搭配，女神气息就这么深深浓厚起来，质量与数量的庞大集成，展现出的就是这样让人热血沸腾的一幕，这个夏季，你与女神邂逅了吗？</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">&nbsp;<img src="/Public/Uploads/20150109152436_55085.jpg" alt="" border="0" /></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">各大游戏巨头的选择是对我们最大的信任！</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">瑞丽女神馆，与你们约定来年再见！</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>', 0, '1420788284', 'admin', NULL, '', 'Uploads/conve/newConve1.jpg', 0, 0),
(415, 'MIYA UGO品牌宣传片', '母其弥雅瑜伽', 1, 1, '<p><img src="/Public/Uploads/20150109152539_68893.jpg" alt="" border="0" /></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">2014年7月6日，瑞丽女神馆精灵系女神活力加盟MIYA&nbsp;UGO，与最美瑜伽导师母其弥雅携手打造本季度最具活力的宣传片。拍摄时间从早上7点到当天凌晨，不断的重复排练，不断的精益求精，每一个摇摆都需要数十次的反复，只为那抹最美的曲线。</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><img src="/Public/Uploads/20150109152603_83111.jpg" alt="" border="0" /><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><img src="/Public/Uploads/20150109152615_75366.jpg" alt="" border="0" /><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">扭头！转身！再来一次！完美的背后是无数琐碎细节的堆积，就如同美丽背后是常人难以看到的日复一日的坚持，美丽就是这样“炼”成。</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><img src="/Public/Uploads/20150109152629_79507.jpg" alt="" border="0" /><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">工作终于结束，女神们始终面带微笑，为这次的宣传片拍摄画上完美句号。自信，乐观，永远向前，这就是我们想要告诉你的美丽秘诀。</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>', 0, '1420788398', 'admin', NULL, '', 'Uploads/conve/newConve2.jpg', 0, 0),
(416, '2014马兴文艺术双年展宁波站', '1844礼仪活动', 1, 1, '<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><img src="/Public/Uploads/20150109152706_10935.jpg" alt="" border="0" /><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">014年5月12日，</span><span style="font-family:微软雅黑;font-size:10.5pt;background-color:#f7faff;background-position:initial initial;background-repeat:initial initial;">宁波当代艺术馆正式开馆</span><span style="font-family:微软雅黑;font-size:10.5pt;background-color:#f7faff;background-position:initial initial;background-repeat:initial initial;">。</span><span style="font-family:微软雅黑;font-size:10.5pt;background-color:#f7faff;background-position:initial initial;background-repeat:initial initial;">与此同时，跨界艺术家马兴文威尼斯双年展个人国际巡回展</span><span style="font-family:微软雅黑;font-size:10.5pt;background-color:#f7faff;background-position:initial initial;background-repeat:initial initial;">宁波站</span><span style="font-family:微软雅黑;font-size:10.5pt;background-color:#f7faff;background-position:initial initial;background-repeat:initial initial;">也同步开幕。</span><span style="font-family:微软雅黑;font-size:10.5pt;background-color:#f7faff;background-position:initial initial;background-repeat:initial initial;">瑞丽女神馆的女神们身着小蓝裙，在寒风中一直保持动人微笑；帅气安保们西装笔挺，待人彬彬有礼，使得整场活动有条不紊，完美落幕。瑞丽集团CEO安琪莉娜·王与艺术家马兴文合影祝酒，表达了对其高超艺术造诣的赞叹，也为双方的友好合作打下坚实基础。</span><span style="font-family:微软雅黑;font-size:10.5pt;background-color:#f7faff;background-position:initial initial;background-repeat:initial initial;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;font-size:10.5pt;background-color:#f7faff;background-position:initial initial;background-repeat:initial initial;"><o:p>&nbsp;<img src="/Public/Uploads/20150109152714_59114.jpg" alt="" border="0" /></o:p></span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;color:#454545;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;">图为马兴文以“舞动的水滴”为创作主题的雕塑作品。从小学习中国传统书画的马兴文，从大自然中汲取创作灵感，以“天、地、绿、人、情、水”为灵感表现，融合人文原生态、艺术与热带雨林自然生态，作品中含有中西文化的碰撞与交织。</span><span style="font-family:微软雅黑;color:#454545;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;color:#454545;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;"><o:p>&nbsp;<img src="/Public/Uploads/20150109152721_79935.jpg" alt="" border="0" /></o:p></span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;color:#454545;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;">艺术家马兴文在双年展中为广大各界来宾讲解其创作理念，将自己的艺术理念与作品构思与大家分享，据悉所有作品的创作灵感均来自其本身于对西双版纳大自然的观察。</span><span style="font-family:微软雅黑;color:#454545;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;color:#454545;font-size:10.5pt;background-position:initial initial;background-repeat:initial initial;"><img src="/Public/Uploads/20150109152730_49871.jpg" alt="" border="0" /><br />\r\n</span></p>', 0, '1420788450', 'admin', NULL, '', 'Uploads/conve/newConve3.jpg', 0, 0),
(417, '世玉珠宝走秀', '世玉珠宝走秀', 1, 1, '<p><img src="/Public/Uploads/20150109152815_33255.jpg" alt="" border="0" /></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">2014年6月28日，瑞丽女神馆典雅出动，助阵世玉珠宝走秀。这场在老码头1号举办的珠宝秀吸引了广大媒体及业内人士的参与，女神气质与玉石珠宝的</span><span style="font-family:微软雅黑;color:#333333;font-size:10pt;background-position:initial initial;background-repeat:initial initial;">雍容华贵</span><span style="font-family:微软雅黑;color:#333333;font-size:10pt;background-position:initial initial;background-repeat:initial initial;">相得益彰。即使天空不作美，女神们仍然淡定的完成走秀，体现出瑞丽女神馆的一贯高品质诉求，使得整场活动圆满成功，获得主办方的一致好评。</span><span style="font-family:微软雅黑;color:#333333;font-size:10pt;background-position:initial initial;background-repeat:initial initial;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><img src="/Public/Uploads/20150109152839_52508.jpg" alt="" border="0" /></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;color:#333333;font-size:10pt;background-position:initial initial;background-repeat:initial initial;"><o:p>&nbsp;</o:p></span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;color:#333333;font-size:10pt;background-position:initial initial;background-repeat:initial initial;">临近走秀，瑞丽女神馆的中外模特抓紧最后时间进行排练。每个鬓角，每个步伐，都力争最优质的表现，将珠宝的贵气完美烘托。</span><span style="font-family:微软雅黑;color:#333333;font-size:10pt;background-position:initial initial;background-repeat:initial initial;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;color:#333333;font-size:10pt;background-position:initial initial;background-repeat:initial initial;"><o:p>&nbsp;</o:p></span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;color:#333333;font-size:10pt;background-position:initial initial;background-repeat:initial initial;"><o:p><img src="/Public/Uploads/20150109152847_57316.jpg" alt="" border="0" /><br />\r\n</o:p></span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;color:#333333;font-size:10pt;background-position:initial initial;background-repeat:initial initial;">玉石的秀美与外模的异域风情相结合，散发出不一样的魅力。玉石本身的温润因佩戴者的不同展现别样质感。</span><span style="font-family:微软雅黑;color:#333333;font-size:10pt;background-position:initial initial;background-repeat:initial initial;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="font-family:微软雅黑;color:#333333;font-size:10pt;background-position:initial initial;background-repeat:initial initial;"><img src="/Public/Uploads/20150109152856_83667.jpg" alt="" border="0" /><br />\r\n</span></p>', 0, '1420788539', 'admin', NULL, '', 'Uploads/conve/newConve4.jpg', 0, 0),
(418, '美路宣传片', '美路宣传片', 1, 1, '<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><img src="/Public/Uploads/20150109152922_23567.jpg" alt="" border="0" /><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">瑞丽集团最广为人知的便是旗下佳丽云集的瑞丽女神馆，但在这些光鲜亮丽的女神背后，还有一支默默付出的强大摄影团队，在业内拥有不下于女神们的名气。2014年，瑞丽与首屈一指的赴美生子机构——美路公司合作，量身为其打造赴美生子的明星案例宣传片，将赴美生子的热度推向了高潮！</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">&nbsp;<img src="/Public/Uploads/20150109152929_32509.jpg" alt="" border="0" /></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">可爱的宝宝成为在场众人的目光焦点，小小的身躯中饱含了父母对其浓浓的挚爱。一个好的起点是父母赠与孩子的第一份生日礼物。</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">&nbsp;<img src="/Public/Uploads/20150109152936_94754.jpg" alt="" border="0" /></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">孙祥一家与美路公司上海办事处的负责人合照留念，瑞丽将这美好一刻锁定，见证兄妹俩的蓬勃成长，献上最美好的祝福。</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><img src="/Public/Uploads/20150109152943_81536.jpg" alt="" border="0" /><br />\r\n</span></p>', 0, '1420788584', 'admin', NULL, '', '', 0, 0),
(419, '王国会所', '王国会所', 1, 1, '<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><img src="/Public/Uploads/20150109153018_44736.jpg" alt="" border="0" />王国会所整合瑞丽集团旗下资源，呈现最顶尖的私人高级会所。红袖添香，佳丽如云，以时间研磨，用真诚绘制；佳音绕耳，余乐盘梁，以奢华打底，用卓然陪衬。</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">&nbsp;</span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">&nbsp;<img src="/Public/Uploads/20150109153026_96658.jpg" alt="" border="0" /></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">涉及服装、配饰、珠宝、手工皮具、意境家具、茶酒文化，历经三代手工传承，选择顶级面料和材质，通过繁杂的工艺和手工流程，打造你看的见的精致与用心。</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">&nbsp;<img src="/Public/Uploads/20150109153032_11005.jpg" alt="" border="0" /></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">会所一角的饮茶区域，配以昏黄格调，取中西精华，以真心烹制，让人超脱世间繁华，独享卓然安逸。</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;background:#7f7f7f;mso-shading:#7f7f7f;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><img src="/Public/Uploads/20150109153040_38519.jpg" alt="" border="0" /><br />\r\n</span></p>', 0, '1420788642', 'admin', NULL, '', 'Uploads/conve/newConve5.jpg', 0, 0),
(420, '瑞丽女神馆横跨2014年度的大型创意主题摄影', '美少女战士系列', 1, 1, '<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><img src="/Public/Uploads/20150109153109_79497.jpg" alt="" border="0" /><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">瑞丽女神馆横跨2014年度的大型创意主题摄影——美少女战士系列已然完成过半，带着满满欣喜，将在2015延续，来自倩妮迪女王的呼唤，各位守护战士们，还不归位~</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;">&nbsp;<img src="/Public/Uploads/20150109153123_70831.jpg" alt="" border="0" /></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">代表热情与勇敢，永远不屈的红色战士！脾气火爆，又有温柔小心思的火星--梦梦归位！！</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">&nbsp;<img src="/Public/Uploads/20150109153134_57165.jpg" alt="" border="0" /></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">深海之星的优雅公主，战斗能力超群的冷静女战士~海王满--</span><a href="http://weibo.com/n/%E9%99%86%E8%8A%B7%E7%BF%8Alucka?from=feed&amp;loc=at"><span class="16" style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;">陆芷翊</span></a><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">归位</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">！！</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">&nbsp;<img src="/Public/Uploads/20150109153145_74815.jpg" alt="" border="0" /></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">永恒地守护着时间之门，在看似茫茫的黑夜里，总有一丝光亮指引她，忠于自己的心并作出抉择。美少女战士中最神秘的战士&nbsp;冥王雪奈--</span><a href="http://weibo.com/n/%E7%9B%B8%E6%9D%A8Lisa?from=feed&amp;loc=at"><span class="16" style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;">相杨</span></a><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">归位</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">！！</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">&nbsp;<img src="/Public/Uploads/20150109153153_45142.jpg" alt="" border="0" /></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">神秘的黑猫，黑夜中执着的存在，小兔最亲密的搭档，以野性再造，水手服战士露娜</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">—</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">艾希归位！！</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">&nbsp;<img src="/Public/Uploads/20150109153203_54676.jpg" alt="" border="0" /></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">最坚忍的少女战士，最美丽的自信化身，让这个冬天变的鲜活而明亮</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">，</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">美少女战士金星爱野美柰子--</span><a href="http://weibo.com/n/Erin_EJ?from=feed&amp;loc=at"><span class="16" style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;">Erin_EJ</span></a><span class="15" style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;">&nbsp;</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">归位</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;">！！</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;mso-bidi-font-family:Arial;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>', 0, '1420788728', 'admin', NULL, '', 'Uploads/conve/newConve6.jpg', 0, 0),
(411, '卡乃驰开业典礼', '卡乃驰开业典礼', 16, 1, '<p class="MsoNormal"><st1:chsdate isrocdate="False" islunardate="False" day="28" month="10" year="2014" w:st="on"><span lang="EN-US" style="font-family:微软雅黑, sans-serif;background-color:#f7faff;background-position:initial initial;background-repeat:initial initial;"><img src="/Public/Uploads/20150109140815_49734.jpg" alt="" border="0" />2014</span><span style="font-family:微软雅黑, sans-serif;background-color:#f7faff;background-position:initial initial;background-repeat:initial initial;">年<span lang="EN-US">10</span>月<span lang="EN-US">28</span>日</span></st1:chsdate><span style="font-family:微软雅黑, sans-serif;background-color:#f7faff;background-position:initial initial;background-repeat:initial initial;">，瑞丽女神馆<span lang="EN-US">8</span>位女神齐齐出动，化身粉红女郎，出席卡乃驰开业典礼，为开幕活动增添一道靓丽的风景线，粉红精灵活跃在典礼的各处，为来宾献上最美的笑容与真挚的服务。瑞丽集团<span lang="EN-US">CEO</span>安琪莉娜</span><span style="mso-bidi-font-size:10.5pt;font-family:" 微软雅黑","sans-serif";color:#333333;"="">·王陪同卡乃驰二手车平台创始人一同观看了整场典礼的进行，并带来了对卡乃驰今后发展的祝福。</span></p>\r\n<p class="MsoNormal"><img src="/Public/Uploads/20150109150722_98861.jpg" alt="" border="0" /></p>\r\n<p class="MsoNormal"><span style="color:#333333;font-family:微软雅黑, sans-serif;">在中外模特的陪衬下，卡乃驰旗下的二手车产品亮相于大众，顶端的配置与精细的保养使得车辆如同刚出厂的新车一般，散发出迷人的光晕，这也是卡乃驰本身对其品牌严苛要求的体现。</span></p>\r\n<p class="MsoNormal"><span style="color:#333333;font-family:微软雅黑, sans-serif;"><img src="/Public/Uploads/20150109150906_64650.jpg" alt="" border="0" /><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;color:#333333;font-size:10.5000pt;mso-font-kerning:1.0000pt;">卡乃驰二手车平台的创始人们一同按下了代表品牌开幕的按钮，在掌声雷动中，正式以挑战者的姿态步入庞大的二手车交易平台市场。瑞丽集团也在此祝福卡乃驰的挑战之旅一路顺风，成为市场的领跑者。</span><span style="mso-spacerun:''yes'';font-family:微软雅黑;color:#333333;font-size:10.5000pt;mso-font-kerning:1.0000pt;"><o:p></o:p></span></p>\r\n<p class="MsoNormal"><span style="mso-spacerun:''yes'';font-family:微软雅黑;color:#333333;font-size:10.5000pt;mso-font-kerning:1.0000pt;">&nbsp;&nbsp;&nbsp;&nbsp;<img src="/Public/Uploads/20150109150927_65978.jpg" alt="" border="0" /><br />\r\n</span></p>\r\n<p class="MsoNormal"><span style="mso-bidi-font-size:10.5pt;font-family:" 微软雅黑","sans-serif";color:#333333;"=""><span lang="EN-US"><o:p></o:p></span></span></p>', 0, '1420781582', 'admin', NULL, '', '', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `nb_options`
--

CREATE TABLE IF NOT EXISTS `nb_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siteurl` varchar(255) DEFAULT NULL COMMENT '网站域名',
  `sitename` varchar(255) DEFAULT NULL COMMENT '网站名称',
  `siteicp` varchar(255) DEFAULT NULL COMMENT 'ICP备案号',
  `sitekeyword` varchar(255) DEFAULT NULL COMMENT '网站关键号',
  `sitedescription` varchar(255) NOT NULL COMMENT '网站描述',
  `logo` varchar(255) NOT NULL COMMENT '网站LOGO',
  `siteright` varchar(255) NOT NULL COMMENT '网站版权',
  `thumbW` int(11) DEFAULT '123',
  `thumbH` int(11) DEFAULT NULL,
  `slideW` int(11) DEFAULT NULL,
  `slideH` int(11) DEFAULT NULL,
  `textListNum` int(11) DEFAULT NULL,
  `picListNum` int(11) DEFAULT NULL,
  `fileSuffix1` varchar(255) DEFAULT NULL COMMENT '图片后缀',
  `fileSuffix2` varchar(255) DEFAULT 'jpg,png,gif,jpeg' COMMENT '手册后缀',
  `fileSuffix3` varchar(255) DEFAULT 'swf,flv' COMMENT '视频后缀',
  `fileSuffix4` varchar(255) DEFAULT 'rar,zip,exe' COMMENT '工具后缀',
  `language` varchar(10) DEFAULT 'cn',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `nb_options`
--

INSERT INTO `nb_options` (`id`, `siteurl`, `sitename`, `siteicp`, `sitekeyword`, `sitedescription`, `logo`, `siteright`, `thumbW`, `thumbH`, `slideW`, `slideH`, `textListNum`, `picListNum`, `fileSuffix1`, `fileSuffix2`, `fileSuffix3`, `fileSuffix4`, `language`) VALUES
(1, '', '瑞丽摄影', '', 'web开发,前端,web前端开发,jquery手册,html5,web技术,css3', 'web开发技术—移动终端web开发 pc端web开发 各种web开发技术', '', '网站版权', 150, 150, 580, 220, 12, 12, 'jpg,png,gif,jpeg', 'chm', 'swf,flv', 'rar,zip,exe', 'cn');

-- --------------------------------------------------------

--
-- 表的结构 `nb_pages`
--

CREATE TABLE IF NOT EXISTS `nb_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `img` varchar(255) DEFAULT NULL,
  `content` text NOT NULL COMMENT '详细内容',
  `hit` int(11) NOT NULL DEFAULT '0' COMMENT '击点数',
  `create_time` varchar(50) NOT NULL COMMENT '添加时间',
  `user` varchar(255) NOT NULL DEFAULT 'admin' COMMENT '添加者',
  `from` varchar(255) NOT NULL COMMENT '来源',
  `pic` varchar(0) NOT NULL COMMENT '图片集合',
  `language` varchar(50) NOT NULL DEFAULT 'cn',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章列表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `nb_pages`
--

INSERT INTO `nb_pages` (`id`, `title`, `img`, `content`, `hit`, `create_time`, `user`, `from`, `pic`, `language`) VALUES
(1, '关于我', NULL, '<p>首先，欢迎您浏览本站！</p>\r\n<p>本站的建站宗旨是为从事web开发的您提供所需的资讯及资源。</p>\r\n<p>本站主要关注web开发中所涉及到的大前端技术（CSS、JAVASCRIPT、HTML5、客户体验等）、后端技术（PHP、MYSQL、APACHE等）、视觉设计、热门应用、业内资讯。</p>\r\n<p>希望本站的内容能帮助到您，同时也希望各位能提供一些好的内容给我们。</p>\r\n<p>谢谢！</p>\r\n<h3>如何联系我</h3>\r\n<p>您可以通过以下方式联系我：</p>\r\n<ul>\r\n	<li>通过邮件联系我：gongyy999@gmail.com</li>\r\n	<li>通过QQ联系我：995620193</li>\r\n</ul>', 650, '1321155051', 'admin', '', '', 'cn');

-- --------------------------------------------------------

--
-- 表的结构 `nb_slide`
--

CREATE TABLE IF NOT EXISTS `nb_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `language` varchar(50) DEFAULT 'cn',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `nb_slide`
--

INSERT INTO `nb_slide` (`id`, `slide_id`, `title`, `url`, `pic`, `language`) VALUES
(1, 1, '20篇教你得到酷炫效果的JQuery教程', 'http://www.nb88.net/index.php?s=/Index/news/id/1/class_id/5', '20110921/m_1316601480.jpg', 'cn'),
(2, 2, 'JavaScript本地存储实践（html5的localStorage和ie的userData） ', 'http://www.nb88.net/index.php?s=/Index/news/id/354/class_id/4', '20110921/m_1316606115.jpg', 'cn'),
(3, 3, 'CSS3热门应用之图片样式 ', 'http://www.nb88.net/index.php?s=/Index/news/id/359/class_id/9', '20110927/m_1317116503.jpg', 'cn'),
(4, 4, 'Flash弱爆了！震撼人心的15个HTML5特效', 'http://www.nb88.net/index.php?s=/Index/news/id/373/class_id/9', '20111008/m_1318071838.png', 'cn');

-- --------------------------------------------------------

--
-- 表的结构 `nb_user`
--

CREATE TABLE IF NOT EXISTS `nb_user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(65) DEFAULT NULL,
  `nickname` varchar(250) DEFAULT NULL COMMENT '昵称',
  `headImage` varchar(50) DEFAULT NULL COMMENT '头像',
  `realname` varchar(50) DEFAULT NULL COMMENT '真实姓名',
  `sex` smallint(5) DEFAULT '1' COMMENT '性别 1:男性，2：女性 0：保密',
  `zone` varchar(100) DEFAULT NULL COMMENT '居住区域',
  `address` varchar(250) DEFAULT NULL COMMENT '地址',
  `tel` varchar(50) DEFAULT NULL COMMENT '电话',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `desc` varchar(500) DEFAULT NULL,
  `createTime` int(11) DEFAULT NULL COMMENT '注册日期',
  `loginTime` int(10) DEFAULT '0',
  `status` smallint(5) DEFAULT '1' COMMENT '当前状态0：未激活；1：正常',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='会员表' AUTO_INCREMENT=45 ;

--
-- 转存表中的数据 `nb_user`
--

INSERT INTO `nb_user` (`userId`, `username`, `password`, `nickname`, `headImage`, `realname`, `sex`, `zone`, `address`, `tel`, `email`, `desc`, `createTime`, `loginTime`, `status`) VALUES
(2, '13675853422', 'bcd56a76bfb39dad36bbb701d75e6afa', NULL, 'Uploads/20140924/m_5422741369703.jpg', '大大', NULL, NULL, '创智天地', '15171171111', '789@789.com', NULL, NULL, 875, 1),
(42, '13212312312', '4297f44b13955235245b2497399d7a93', '13212312312', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1418982673, 0, 1),
(43, '13232132132', '4297f44b13955235245b2497399d7a93', '13232132132', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1418983009, 0, 1),
(44, '18293479701', '15ad84aa0dbbedef096054ed15dcf8fa', '18293479701', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1418998389, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
