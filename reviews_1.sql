-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- 생성 시간: 20-12-11 19:26
-- 서버 버전: 5.6.23
-- PHP 버전: 5.5.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 데이터베이스: `ydong7777`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL DEFAULT '0' COMMENT '메인 하단 배너 ',
  `parent` int(100) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `channel` varchar(30) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `rating` int(10) DEFAULT NULL,
  `sexual` tinyint(1) DEFAULT NULL,
  `violent` tinyint(1) DEFAULT NULL,
  `crude` tinyint(1) DEFAULT NULL,
  `horror` tinyint(1) DEFAULT NULL,
  `imitative` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `reviews`
--

INSERT INTO `reviews` (`id`, `parent`, `email`, `channel`, `date`, `title`, `content`, `rating`, `sexual`, `violent`, `crude`, `horror`, `imitative`) VALUES
(1, 0, '1111', 'hahaha', '0000-00-00 00:00:00', '리뷰입니다', '리뷰입니다리뷰입니다', 4, 0, 0, 1, 0, 1),
(2, 0, '1111', 'hahaha', '0000-00-00 00:00:00', '리뷰입니다', '리뷰입니다리뷰입니다', 3, 1, 1, 0, 0, 0),
(3, 0, '5454', 'hahaha', '0000-00-00 00:00:00', '리뷰', '좋아요', 2, 0, 0, 0, 1, 1);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `reviews`
--
ALTER TABLE `reviews`
AUTO_INCREMENT=245;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
