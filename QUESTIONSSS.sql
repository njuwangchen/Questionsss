-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013-12-06 06:45:08
-- 服务器版本: 5.6.14
-- PHP 版本: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `QUESTIONSSS`
--

-- --------------------------------------------------------

--
-- 表的结构 `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `questionid` int(10) unsigned NOT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `answers`
--

INSERT INTO `answers` (`id`, `content`, `userid`, `questionid`, `picture`, `date`) VALUES
(1, '自问自答', 1, 1, '', '2013-11-08'),
(2, '先学学lua吧', 2, 4, '2013-01-06_214246.jpg', '2013-11-08'),
(3, '=。=', 2, 4, '2013-01-03_174425.jpg', '2013-11-08'),
(4, 'ailo', 1, 1, '', '2013-11-10'),
(5, 'test my score', 1, 4, '', '2013-11-11'),
(6, 'haha', 1, 4, '', '2013-11-11'),
(7, '看我霸气侧漏的头像！！', 9, 5, '', '2013-11-11'),
(8, 'hhh', 9, 4, '', '2013-11-11'),
(9, 'sdf', 1, 12, '', '2013-11-12'),
(10, 'sdfsdfsdf', 1, 12, '', '2013-11-12'),
(11, '看视频', 1, 13, '', '2013-11-13'),
(12, 'haha', 1, 12, '', '2013-11-13'),
(13, 'hehe', 9, 13, '', '2013-11-13'),
(14, 'heheehheeheheh', 9, 12, '', '2013-11-13'),
(15, '`````````````', 9, 12, '', '2013-11-13'),
(16, 'hehe', 9, 11, '', '2013-11-13'),
(17, 'heeh', 9, 14, '', '2013-11-13'),
(18, '↑↑↑↑↑↑↑↑', 16, 16, '', '2013-12-04'),
(19, 'haha\n', 9, 4, '屏幕快照_2013-11-30_下午7.48_.50_.png', '2013-12-04'),
(20, '''''''''''''''', 18, 18, '', '2013-12-05'),
(21, '', 1, 17, '', '2013-12-05'),
(22, 'sdfasdf''''''''''', 1, 17, '', '2013-12-05'),
(23, 'jklkjklkj', 1, 2, '', '2013-12-05'),
(24, 'ioio’‘’', 19, 19, '', '2013-12-05'),
(25, '水电费水电费是', 13, 20, '', '2013-12-05'),
(26, '‘’‘', 5, 21, '', '2013-12-05'),
(27, 'sdfsdfsdfsdf', 5, 22, '', '2013-12-05'),
(28, 'shkdfjklsjdf', 13, 23, '', '2013-12-06');

-- --------------------------------------------------------

--
-- 表的结构 `favortoanswer`
--

CREATE TABLE IF NOT EXISTS `favortoanswer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `answerid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `favortoanswer`
--

INSERT INTO `favortoanswer` (`id`, `userid`, `answerid`) VALUES
(1, 2, 2),
(8, 1, 2),
(10, 1, 1),
(11, 1, 4),
(12, 9, 3),
(13, 9, 5),
(16, 1, 11),
(17, 9, 16),
(18, 2, 17),
(19, 2, 6),
(21, 18, 20);

-- --------------------------------------------------------

--
-- 表的结构 `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `toid` int(10) unsigned NOT NULL,
  `fromid` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `messages`
--

INSERT INTO `messages` (`id`, `toid`, `fromid`, `content`, `date`) VALUES
(1, 9, 10, 'shisih', '2013-11-12 21:38:00'),
(2, 9, 10, 'hah', '2013-11-12 21:38:07'),
(3, 9, 10, 'nima', '2013-11-12 21:38:10'),
(4, 9, 10, 'caca', '2013-11-12 21:38:13'),
(5, 9, 10, 'woqu', '2013-11-12 21:38:17'),
(6, 9, 10, 'huhu', '2013-11-12 21:38:32'),
(7, 1, 11, '你好', '2013-11-12 21:42:28'),
(8, 1, 11, '你很厉害哈', '2013-11-12 21:42:42'),
(9, 2, 11, '你这个sobo', '2013-11-12 21:43:02'),
(10, 2, 11, '狼外婆', '2013-11-12 21:43:09'),
(11, 3, 11, '支持一下你哦', '2013-11-12 21:43:25'),
(12, 4, 11, '加油加油', '2013-11-12 21:43:35'),
(13, 5, 11, '沙发', '2013-11-12 21:43:46'),
(14, 9, 11, '大神@@', '2013-11-12 21:43:59'),
(15, 9, 11, '好人一生平安', '2013-11-12 21:44:56'),
(16, 10, 11, '你真棒', '2013-11-12 21:45:20'),
(17, 10, 12, '=.=', '2013-11-12 21:49:57'),
(18, 12, 9, 'ha', '2013-11-13 23:39:50'),
(19, 12, 9, 'ha', '2013-11-13 23:39:55'),
(20, 12, 9, 'ha', '2013-11-13 23:39:56'),
(21, 9, 5, '圣达菲', '2013-12-04 21:51:24'),
(22, 10, 9, '，，，，，，，，', '2013-12-04 23:46:11'),
(23, 2, 18, '''''''''''''', '2013-12-05 00:45:45'),
(24, 10, 13, 'sjkdfjlksjdf', '2013-12-06 14:31:51');

-- --------------------------------------------------------

--
-- 表的结构 `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `score` int(10) unsigned DEFAULT '0',
  `userid` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `determinedanswer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `questions`
--

INSERT INTO `questions` (`id`, `title`, `content`, `score`, `userid`, `date`, `picture`, `determinedanswer`) VALUES
(1, '第一个问题！', '谁能回答', 20, 1, '2013-11-08', '', 1),
(2, 'mysql数据丢失！', '坑爹啊！！', 200, 1, '2013-11-08', '', 23),
(3, 'codeigniter问题', '怎么上传图片？', 30, 1, '2013-11-08', '2013-02-18_180708.jpg', NULL),
(4, '如何入门脚本语言？', '求大神教！', 200, 1, '2013-11-08', '2013-04-16_004430.png', 5),
(5, 'xx', '=。=', 9, 2, '2013-11-10', '2013-01-04_225842.jpg', NULL),
(6, '我勒个去', '试试看', 0, 9, '2013-11-11', '', NULL),
(7, '水电费', '水电费', 1, 9, '2013-11-11', '', NULL),
(8, '怎么去拥抱一夏天的风', '天上的星星像地上的人，总是不能够不能觉得足够', 10, 1, '2013-11-11', '2013-01-04_2250101.jpg', NULL),
(9, '怎么去拥有一道彩虹', '当一阵风吹来，风筝飞上天空', 10, 1, '2013-11-11', '', NULL),
(10, '最后一个问题', '能不能问？', 10, 1, '2013-11-11', '', NULL),
(11, '分页问题', '怎么搞哦。。', 1, 1, '2013-11-12', '', NULL),
(12, '求py高手', '一起学习', 2, 1, '2013-11-12', '', 9),
(13, '如何入门IOS开发', '求问', 0, 10, '2013-11-12', '', NULL),
(14, 'haha', 'hehe', 1222, 9, '2013-11-13', '', 17),
(15, '一个', '( ⊙o⊙ )?', 199, 2, '2013-12-04', '', NULL),
(16, '士大夫', '士大夫', 0, 2, '2013-12-04', '', NULL),
(17, '~(≧▽≦)/~啦啦啦', ':-O', 222, 2, '2013-12-04', '', 22),
(18, '''''''', '''''''''''', 0, 18, '2013-12-05', '', 20),
(19, '’‘’‘怎么打', '不知道’‘', 0, 19, '2013-12-05', '', 24),
(20, '随碟附送', '水电费水电费水电费是', 0, 13, '2013-12-05', '', 25),
(21, 'iii‘’', 'popo‘’', 0, 5, '2013-12-05', '', 26),
(22, 'sdf444', 'sf34343', 0, 5, '2013-12-05', '', 27),
(23, 'jskdfjlksj', 'sjldkfjlksjdlfkj', 200, 1, '2013-12-06', '2013-01-04_2258421.jpg', 28);

-- --------------------------------------------------------

--
-- 表的结构 `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'C'),
(2, 'C++'),
(3, 'Java'),
(4, 'PHP'),
(5, 'mysql'),
(6, 'Python'),
(7, 'Oracle'),
(8, 'HTML'),
(9, 'Lua');

-- --------------------------------------------------------

--
-- 表的结构 `tagtoquestion`
--

CREATE TABLE IF NOT EXISTS `tagtoquestion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagid` int(10) unsigned NOT NULL,
  `questionid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `tagtoquestion`
--

INSERT INTO `tagtoquestion` (`id`, `tagid`, `questionid`) VALUES
(1, 5, 2),
(2, 4, 3),
(3, 4, 4),
(4, 6, 4),
(5, 9, 4),
(6, 6, 5),
(7, 3, 5),
(8, 1, 6),
(9, 1, 7),
(10, 1, 8),
(11, 7, 8),
(12, 6, 9),
(13, 1, 10),
(14, 6, 12),
(15, 1, 13),
(16, 5, 13),
(17, 1, 23),
(18, 2, 23);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `registerdate` date NOT NULL,
  `job` varchar(50) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `score` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `registerdate`, `job`, `picture`, `score`) VALUES
(1, 'ClarkWong', '111', '2013-11-05', 'web engineer', NULL, 1422),
(2, 'Haoyu Yang', '222', '2013-11-06', 'c programmer', NULL, 1222),
(3, 'liu', 'asdf', '2013-11-10', 'test', '', 0),
(4, 'lily', '123', '2013-11-10', 'student', '', 0),
(5, 'sdf', 'sdf', '2013-11-10', '水电费', '', 0),
(9, '头像帝', 'touxiang', '2013-11-10', 'PM', '2013-01-06_2142461.jpg', 1222),
(10, '新人', '123', '2013-11-12', 'iOS developer', '2013-01-04_224154.jpg', 0),
(11, 'Lulu', '44', '2013-11-12', 'teacher', '2013-02-18_181045.jpg', 0),
(12, '二货', '222', '2013-11-12', 'no job', '2013-06-21_130118(1).jpg', 0),
(13, 'a', 'aa', '2013-12-04', '士大夫', '', 0),
(14, 'oo./;', 'sdf', '2013-12-04', 'jjjj', '', 0),
(15, '沃恩', 'sdf', '2013-12-04', 'cook', '', 0),
(16, 'poo', 'sdf', '2013-12-04', 'CEO', '', 0),
(17, 'l''ll', 'sdf', '2013-12-05', '查水表', '', 0),
(18, '‘’‘’‘', '''''''''', '2013-12-05', '’‘’‘', '', 0),
(19, '56565', '333', '2013-12-05', '数学家', '2013-01-04_223839.jpg', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
