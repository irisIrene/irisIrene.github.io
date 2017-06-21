-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-05-29 07:25:16
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pdf_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `tb_authorizedseal`
--

CREATE TABLE IF NOT EXISTS `tb_authorizedseal` (
  `id` int(4) DEFAULT NULL,
  `name` tinytext COLLATE utf8_unicode_520_ci COMMENT '公章名称',
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '授权时间',
  `deadline` datetime DEFAULT NULL COMMENT '授权期限',
  `users` varchar(200) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT '被授权用户',
  `mark` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `tb_pdf`
--

CREATE TABLE IF NOT EXISTS `tb_pdf` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT 'PDF文件名称',
  `mark` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT '所属者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `tb_seal`
--

CREATE TABLE IF NOT EXISTS `tb_seal` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT '公章名称',
  `department` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT '所属部门',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '入库时间',
  `mark` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- 表的结构 `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT '用户名',
  `password` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT '用户密码',
  `email` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT '用户邮箱',
  `mark` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `authority` varchar(50) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT '用户身份',
  `superAd` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL DEFAULT 'no' COMMENT '一级管理员身份',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci AUTO_INCREMENT=7 ;

DELIMITER $$
--
-- 事件
--
CREATE DEFINER=`None`@`localhost` EVENT `chk_deadline_and_delete` ON SCHEDULE EVERY 1 MINUTE STARTS '2017-05-22 00:00:05' ENDS '2017-07-31 00:00:10' ON COMPLETION PRESERVE ENABLE DO DELETE FROM tb_authorizedseal WHERE deadline < CURRENT_TIMESTAMP$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
