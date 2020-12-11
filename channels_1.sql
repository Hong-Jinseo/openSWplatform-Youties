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
-- 테이블 구조 `channels`
--

CREATE TABLE IF NOT EXISTS `channels` (
  `id` int(11) NOT NULL DEFAULT '0' COMMENT '메인 하단 배너 ',
  `category` varchar(25) DEFAULT NULL,
  `name` char(25) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `subscribers` int(11) DEFAULT NULL,
  `videos` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `movie` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `channels`
--

INSERT INTO `channels` (`id`, `category`, `name`, `views`, `title`, `subscribers`, `videos`, `image`, `movie`) VALUES
(0, 'pets & animals', 'hahaha_ih', 1000, ' hahaha', 3000, 4000, 'https://yt3.ggpht.com/ytc/AAUvwng-4r6Mq9XzKbP2ytrO6HgugZ7OOqhh5--Onsk8oA=s176-c-k-c0x00ffffff-no-rj', 'https://www.youtube.com/embed/79lP_78PXjE'),
(1, 'it & tech', 'hahaha_ih', 1000, 'iphone review', 7841, 4000, 'https://canary.contestimg.wish.com/api/webimage/5f59d60797d8751233456960-large.jpg?cache_buster=0eb9', 'https://www.youtube.com/embed/c1RQVN1ighs');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
