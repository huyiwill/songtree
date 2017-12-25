/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : lvyou

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-04-28 15:50:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `pcwap_admin`
-- ----------------------------
DROP TABLE IF EXISTS `pcwap_admin`;
CREATE TABLE `pcwap_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pcwap_admin
-- ----------------------------

-- ----------------------------
-- Table structure for `pcwap_ads`
-- ----------------------------
DROP TABLE IF EXISTS `pcwap_ads`;
CREATE TABLE `pcwap_ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adurl` varchar(255) DEFAULT NULL,
  `adpic` varchar(255) DEFAULT NULL,
  `adremak` varchar(255) DEFAULT NULL,
  `isshow` smallint(1) unsigned DEFAULT '1',
  `time` varchar(255) DEFAULT NULL,
  `cate` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pcwap_ads
-- ----------------------------
INSERT INTO `pcwap_ads` VALUES ('1', '', 'http://www.17sucai.com/preview/164877/2016-09-13/T-XYS032%E6%97%85%E6%B8%B8/images/banner1.jpg', '这是一个幻灯片在后台可以修改', '1', '1461653740', 'home');
INSERT INTO `pcwap_ads` VALUES ('2', '', 'http://www.17sucai.com/preview/164877/2016-09-13/T-XYS032%E6%97%85%E6%B8%B8/images/banner1.jpg', '', '1', '1490710936', 'home');

-- ----------------------------
-- Table structure for `pcwap_book`
-- ----------------------------
DROP TABLE IF EXISTS `pcwap_book`;
CREATE TABLE `pcwap_book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `infoid` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pcwap_book
-- ----------------------------

-- ----------------------------
-- Table structure for `pcwap_cate`
-- ----------------------------
DROP TABLE IF EXISTS `pcwap_cate`;
CREATE TABLE `pcwap_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `catetitle` varchar(255) DEFAULT NULL,
  `catekey` varchar(255) DEFAULT NULL,
  `catedesc` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `catetemp` varchar(255) DEFAULT NULL,
  `infotemp` varchar(255) DEFAULT NULL,
  `catepage` int(4) unsigned DEFAULT NULL,
  `catelogo` varchar(255) DEFAULT NULL,
  `catetype` int(10) unsigned DEFAULT '0',
  `pid` int(10) DEFAULT '0',
  `sort` int(6) DEFAULT '100',
  `menu` smallint(1) unsigned NOT NULL DEFAULT '1',
  `outurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pcwap_cate
-- ----------------------------
INSERT INTO `pcwap_cate` VALUES ('1', '关于我们', 'guanyuwomen', '', '', '', '关于我们在后台修改', '', '', '20', '', '3', '0', '100', '1', '');
INSERT INTO `pcwap_cate` VALUES ('2', '产品中心', 'chanpinzhongxin', '', '', '', '', '', '', '20', '', '2', '0', '99', '1', '');
INSERT INTO `pcwap_cate` VALUES ('3', '新闻动态', 'xinwendongtai', '', '', '', '', '', '', '20', '', '1', '0', '99', '1', '');
INSERT INTO `pcwap_cate` VALUES ('4', '联系我们', 'lianxiwomen', '', '', '', '联系我们在后台修改', '', '', '20', '', '3', '0', '100', '1', '');
INSERT INTO `pcwap_cate` VALUES ('5', '二级分类', 'erjifenlei', '', '', '', '', '', '', '20', '', '2', '2', '100', '1', '');
INSERT INTO `pcwap_cate` VALUES ('6', '留言中心', 'liuyanzhongxin', '', '', '', '', 'message', 'message', '20', '', '3', '0', '100', '1', '');

-- ----------------------------
-- Table structure for `pcwap_diy`
-- ----------------------------
DROP TABLE IF EXISTS `pcwap_diy`;
CREATE TABLE `pcwap_diy` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cid` int(5) NOT NULL,
  `diykey` varchar(20) NOT NULL,
  `value` varchar(255) DEFAULT ' ',
  `status` smallint(1) NOT NULL DEFAULT '1',
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pcwap_diy
-- ----------------------------

-- ----------------------------
-- Table structure for `pcwap_info`
-- ----------------------------
DROP TABLE IF EXISTS `pcwap_info`;
CREATE TABLE `pcwap_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT '',
  `key` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `cid` int(4) unsigned NOT NULL,
  `istop` smallint(1) unsigned DEFAULT '0',
  `isrec` smallint(1) unsigned DEFAULT '0',
  `isshow` smallint(1) unsigned DEFAULT '0',
  `isrev` smallint(1) DEFAULT '0',
  `ispic` smallint(1) DEFAULT '0',
  `pic` varchar(255) DEFAULT NULL,
  `hits` int(11) unsigned DEFAULT '0',
  `author` varchar(255) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `revs` int(11) unsigned DEFAULT '0',
  `pcs` varchar(255) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `temp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pcwap_info
-- ----------------------------

-- ----------------------------
-- Table structure for `pcwap_links`
-- ----------------------------
DROP TABLE IF EXISTS `pcwap_links`;
CREATE TABLE `pcwap_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `remak` varchar(255) DEFAULT NULL,
  `sort` int(10) unsigned DEFAULT NULL,
  `isshow` smallint(1) DEFAULT '1',
  `time` varchar(255) DEFAULT NULL,
  `pic` varchar(255) NOT NULL,
  `cate` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pcwap_links
-- ----------------------------

-- ----------------------------
-- Table structure for `pcwap_message`
-- ----------------------------
DROP TABLE IF EXISTS `pcwap_message`;
CREATE TABLE `pcwap_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `content` text,
  `time` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pcwap_message
-- ----------------------------

-- ----------------------------
-- Table structure for `pcwap_search`
-- ----------------------------
DROP TABLE IF EXISTS `pcwap_search`;
CREATE TABLE `pcwap_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pcwap_search
-- ----------------------------

-- ----------------------------
-- Table structure for `pcwap_tags`
-- ----------------------------
DROP TABLE IF EXISTS `pcwap_tags`;
CREATE TABLE `pcwap_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `hits` int(10) unsigned DEFAULT '1',
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pcwap_tags
-- ----------------------------

-- ----------------------------
-- Table structure for `pcwap_weixin_appid`
-- ----------------------------
DROP TABLE IF EXISTS `pcwap_weixin_appid`;
CREATE TABLE `pcwap_weixin_appid` (
  `appid` varchar(255) NOT NULL DEFAULT '',
  `secret` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pcwap_weixin_appid
-- ----------------------------
INSERT INTO `pcwap_weixin_appid` VALUES ('465465', '654654s', '1');

-- ----------------------------
-- Table structure for `pcwap_weixin_gz`
-- ----------------------------
DROP TABLE IF EXISTS `pcwap_weixin_gz`;
CREATE TABLE `pcwap_weixin_gz` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `leixin` tinyint(1) NOT NULL DEFAULT '1',
  `num` tinyint(1) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `sort` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pcwap_weixin_gz
-- ----------------------------
INSERT INTO `pcwap_weixin_gz` VALUES ('1', '1', '1', '3', '欢迎关注我们', null);

-- ----------------------------
-- Table structure for `pcwap_weixin_huifu`
-- ----------------------------
DROP TABLE IF EXISTS `pcwap_weixin_huifu`;
CREATE TABLE `pcwap_weixin_huifu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `leixin` smallint(1) DEFAULT '0',
  `cid` int(10) DEFAULT NULL,
  `num` smallint(1) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `sort` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pcwap_weixin_huifu
-- ----------------------------
INSERT INTO `pcwap_weixin_huifu` VALUES ('1', '你好', '1', null, null, '你好，你的信息我们已收到', null);
INSERT INTO `pcwap_weixin_huifu` VALUES ('2', '最新', '2', null, null, '', null);
INSERT INTO `pcwap_weixin_huifu` VALUES ('3', '热门', '2', null, null, null, null);
INSERT INTO `pcwap_weixin_huifu` VALUES ('4', 'pcwap', '2', '6', '3', '', null);

-- ----------------------------
-- Table structure for `pcwap_weixin_menu`
-- ----------------------------
DROP TABLE IF EXISTS `pcwap_weixin_menu`;
CREATE TABLE `pcwap_weixin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `leixin` tinyint(1) DEFAULT '2',
  `url` varchar(255) DEFAULT NULL,
  `keys` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pcwap_weixin_menu
-- ----------------------------
