
/**
 * Created by JetBrains PhpStorm.
 * User: black
 * Date: 14-2-11
 * Time: ����6:07
 * To change this template use File | Settings | File Templates.
 */
alter table zhi_post add slogan varchar(255) not null default '';
alter table zhi_mall add email varchar(255)  default '';
alter table zhi_mall add tel varchar(255)  default '';
alter table zhi_mall add addr varchar(255)  default '';
alter table zhi_post_cate add code varchar(255)  default '';

-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 07 月 17 日 02:59
-- 服务器版本: 5.1.32
-- PHP 版本: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `zhibaby`
--

-- --------------------------------------------------------

--
-- 表的结构 `zhi_shop`
--

CREATE TABLE IF NOT EXISTS `zhi_shop` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aid` varchar(50) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `domain` varchar(255) NOT NULL,
  `abst` varchar(255) NOT NULL,
  `info` text,
  `url_dm` varchar(255) NOT NULL,
  `url_yqf` varchar(255) NOT NULL,
  `url_other` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `cps` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT '0',
  `rebates` varchar(20) NOT NULL,
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '1',
  `ordid` int(11) DEFAULT '0',
  `add_time` int(11) DEFAULT '0',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_keys` varchar(255) DEFAULT NULL,
  `seo_desc` text,
  `index` varchar(2) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `zhi_shop_cate`
--

CREATE TABLE IF NOT EXISTS `zhi_shop_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `pid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `spid` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `zhi_shop_comment`
--

CREATE TABLE IF NOT EXISTS `zhi_shop_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mall_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `uname` varchar(20) NOT NULL,
  `info` text NOT NULL,
  `add_time` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

update zhi_jky_item set status=0;
alter table zhi_jky_item add slogan varchar(255) not null default '';
