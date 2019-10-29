-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 
-- 服务器版本: 5.5.53
-- PHP 版本: 7.0.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `shequsql`
--

-- --------------------------------------------------------

--
-- 表的结构 `zc_album`
--

CREATE TABLE IF NOT EXISTS `zc_album` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user_id` int(20) NOT NULL COMMENT '用户id',
  `name` varchar(50) NOT NULL COMMENT '相册名称',
  `intro` varchar(500) NOT NULL COMMENT '简介',
  `status` varchar(50) NOT NULL COMMENT '状态（公开、私密）',
  `num` int(10) NOT NULL COMMENT '图片数量',
  `path` varchar(255) NOT NULL COMMENT '封面路径',
  `visit` int(10) NOT NULL COMMENT '浏览量',
  `creat_time` varchar(255) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='相册表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `zc_album`
--

INSERT INTO `zc_album` (`id`, `user_id`, `name`, `intro`, `status`, `num`, `path`, `visit`, `creat_time`) VALUES
(5, 2, '1', '', '公开', 0, '/upload/20190517/7d217dce72b8eca9f87437e824ca3aea.png', 0, '2019-05-17');

-- --------------------------------------------------------

--
-- 表的结构 `zc_collectioin`
--

CREATE TABLE IF NOT EXISTS `zc_collectioin` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `photo_id` int(20) NOT NULL COMMENT '图片id',
  `user_id` int(20) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='收藏表' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `zc_collectioin`
--

INSERT INTO `zc_collectioin` (`id`, `photo_id`, `user_id`) VALUES
(8, 9, 2),
(12, 11, 2),
(10, 13, 2),
(5, 7, 2),
(9, 4, 2),
(11, 11, 1);

-- --------------------------------------------------------

--
-- 表的结构 `zc_comment`
--

CREATE TABLE IF NOT EXISTS `zc_comment` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `photo_id` int(20) NOT NULL COMMENT '照片id',
  `user_id` int(20) NOT NULL COMMENT '用户id',
  `content` varchar(500) NOT NULL COMMENT '评论内容',
  `create_time` varchar(50) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=44 ;

--
-- 转存表中的数据 `zc_comment`
--

INSERT INTO `zc_comment` (`id`, `photo_id`, `user_id`, `content`, `create_time`) VALUES
(43, 13, 2, 'fvffdsv', '2019-05-22'),
(40, 9, 1, '164544554', '2019-05-14'),
(39, 9, 1, '16454', '2019-05-14'),
(38, 7, 2, '嗷嗷嗷', '2019-05-14');

-- --------------------------------------------------------

--
-- 表的结构 `zc_comphoto`
--

CREATE TABLE IF NOT EXISTS `zc_comphoto` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT '社区照片id',
  `user_id` int(20) NOT NULL COMMENT '用户id',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `camera` varchar(50) NOT NULL COMMENT '设备',
  `state` varchar(20) NOT NULL COMMENT '照片性质（手动挡/自动挡）',
  `iso` varchar(50) NOT NULL COMMENT 'iso感光度',
  `shutter` int(10) NOT NULL COMMENT '照片快门',
  `aperture` int(10) NOT NULL COMMENT '照片光圈',
  `path` varchar(255) NOT NULL COMMENT '照片路径',
  `label` varchar(255) NOT NULL COMMENT '标签',
  `intro` varchar(500) NOT NULL COMMENT '照片描述',
  `score` int(20) NOT NULL COMMENT '点赞数目',
  `check` varchar(50) NOT NULL DEFAULT '未审核' COMMENT '审核结果',
  `creat_time` varchar(255) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='社区照片表' AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `zc_comphoto`
--

INSERT INTO `zc_comphoto` (`id`, `user_id`, `title`, `camera`, `state`, `iso`, `shutter`, `aperture`, `path`, `label`, `intro`, `score`, `check`, `creat_time`) VALUES
(2, 1, '关爱留守儿童', '', '手动档', '123', 123, 123, '/upload/20190508/e50d5639d9e8510f7b2c8a44deaf6623.jpg', '爱心', '关爱留守儿童', 0, '审核通过', '2019-5-11 '),
(4, 2, '风景1', '佳能', '自动档', '0', 0, 0, '/upload/20190508/a7ad34536f561f679e68c8ad366f7cad.jpg', '风景', '风景1', 1, '审核通过', '2019-5-11 '),
(11, 2, '11111', '11', '手动档', '800', 1, 0, '/upload/20190517/8bcfe010c8f773148975a167e499df71.png', '1', '1', 2, '审核通过', '2019-05-17'),
(7, 2, '相机', '佳能', '自动档', '0', 0, 0, '/upload/20190508/9690c492873734787c9f7d9f15209a1b.jpg', '相机', '相机2', 1, '审核通过', ''),
(10, 2, 'asd', 'asd', '手动档', '100', 30, 0, '/upload/20190517/efc21193b5b8e92e9ea774bc6f0463a0.png', 'asd', 'asd', 0, '审核通过', '2019-05-17'),
(12, 2, 'qwd', 'qwd', '自动档', '100', 30, 0, '/upload/20190517/672b04c90b35e87f05a5e44744210d78.png', 'qwd', 'qwd', 0, '审核未通过', '2019-05-17'),
(9, 1, '爱心', '佳能', '自动档', '0', 0, 0, '/upload/20190512/2d5817be02bc3153cd2d45d4e8be22b4.jpg', '爱心', '爱心', 1, '审核通过', '2019-05-12');

-- --------------------------------------------------------

--
-- 表的结构 `zc_focus`
--

CREATE TABLE IF NOT EXISTS `zc_focus` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `friend_id` int(20) NOT NULL COMMENT '被关注id',
  `user_id` int(20) NOT NULL COMMENT '关注者id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='关注表' AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `zc_focus`
--

INSERT INTO `zc_focus` (`id`, `friend_id`, `user_id`) VALUES
(15, 2, 2),
(16, 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `zc_manager`
--

CREATE TABLE IF NOT EXISTS `zc_manager` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `zc_manager`
--

INSERT INTO `zc_manager` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- 表的结构 `zc_photo`
--

CREATE TABLE IF NOT EXISTS `zc_photo` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `album_id` int(20) NOT NULL COMMENT '相册id',
  `name` varchar(50) NOT NULL COMMENT '图片名',
  `intro` varchar(500) NOT NULL COMMENT '简介',
  `path` varchar(255) NOT NULL COMMENT '路径',
  `create_time` varchar(255) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='图片表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `zc_photo`
--

INSERT INTO `zc_photo` (`id`, `album_id`, `name`, `intro`, `path`, `create_time`) VALUES
(8, 5, 'efwe', '', '/upload/20190517/87855c8d186603278ab5f330527a071e.png', '2019-05-17'),
(7, 5, '1', '', '/upload/20190517/4df9385f9c466ce5b397b56783444011.png', '2019-05-17');

-- --------------------------------------------------------

--
-- 表的结构 `zc_upcache`
--

CREATE TABLE IF NOT EXISTS `zc_upcache` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `path` varchar(500) NOT NULL COMMENT '路径',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='图片暂存表' AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `zc_upcache`
--

INSERT INTO `zc_upcache` (`id`, `path`) VALUES
(22, '/upload/20190517/efc21193b5b8e92e9ea774bc6f0463a0.png'),
(21, '/upload/20190517/87855c8d186603278ab5f330527a071e.png'),
(20, '/upload/20190517/4df9385f9c466ce5b397b56783444011.png'),
(19, '/upload/20190515/dbdb47940b41b2e221dfe2fa9d4fd692.jpg'),
(18, '/upload/20190514/0358c80d92fcf26b64cb556511c09206.jpg'),
(17, '/upload/20190514/a5add45a99946048dbdaa1b81f448723.png'),
(16, '/upload/20190513/a9f96b6f5fb2707297dcba945c3bc144.png'),
(15, '/upload/20190513/ed62c1ddf6a490f7150a549411b4a4f8.png'),
(14, '/upload/20190513/159b60e374a16c26cb066301fea7c52a.png'),
(13, '/upload/20190513/7d20587ec896f291769722d9c281a115.png'),
(12, '/upload/20190512/2d5817be02bc3153cd2d45d4e8be22b4.jpg'),
(23, '/upload/20190517/8bcfe010c8f773148975a167e499df71.png'),
(24, '/upload/20190517/372c881e8d00bd15703c83b937e426d6.png'),
(25, '/upload/20190517/672b04c90b35e87f05a5e44744210d78.png'),
(26, '/upload/20190723/8dba6d3c4a020c261f3cdd9c8fc36ac9.png'),
(27, '/upload/20190803/570ce4cd57ccbe708a4fb6838f679a7b.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `zc_user`
--

CREATE TABLE IF NOT EXISTS `zc_user` (
  `uid` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `question` varchar(255) NOT NULL COMMENT '密保问题',
  `answer` varchar(255) NOT NULL COMMENT '问题答案',
  `avatarSrc` varchar(255) NOT NULL DEFAULT '/upload/20190514/0358c80d92fcf26b64cb556511c09206.jpg' COMMENT '头像路径',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `zc_user`
--

INSERT INTO `zc_user` (`uid`, `username`, `password`, `email`, `question`, `answer`, `avatarSrc`) VALUES
(1, '最初', 'e10adc3949ba59abbe56e057f20f883e', '123@qq.com', '你父亲的名字？', '123', '/upload/20190508/077e9a6fb7832edd15af6ee7cbc324c7.png'),
(2, 'Here be dragons', 'e10adc3949ba59abbe56e057f20f883e', '1', '你父亲的姓名', '1', '/upload/20190514/0358c80d92fcf26b64cb556511c09206.jpg'),
(3, '1', '96e79218965eb72c92a549dd5a330112', '95333@sohu.com', '你父亲的名字？', '111', '/upload/20190514/0358c80d92fcf26b64cb556511c09206.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `zc_userinfo`
--

CREATE TABLE IF NOT EXISTS `zc_userinfo` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user_id` int(20) NOT NULL COMMENT '用户id',
  `sex` varchar(10) NOT NULL COMMENT '性别',
  `birthday` varchar(255) NOT NULL COMMENT '生日',
  `city` varchar(10) NOT NULL COMMENT '城市',
  `intro` varchar(500) NOT NULL COMMENT '简介',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户信息表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `zc_userinfo`
--

INSERT INTO `zc_userinfo` (`id`, `user_id`, `sex`, `birthday`, `city`, `intro`) VALUES
(1, 1, '男', '2019-05-08', '地球', 'hh'),
(2, 2, '男', '2019-05-14', '地球', '~~~');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
