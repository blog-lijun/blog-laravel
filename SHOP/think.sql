-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 03, 2016 at 09:48 AM
-- Server version: 5.7.13-log
-- PHP Version: 7.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `think`
--

-- --------------------------------------------------------

--
-- Table structure for table `think_admin`
--

CREATE TABLE `think_admin` (
  `aid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_admin`
--

INSERT INTO `think_admin` (`aid`, `username`, `password`) VALUES
(1, '李军', '12345678'),
(2, '张召飞', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `think_adminb`
--

CREATE TABLE `think_adminb` (
  `bid` int(11) NOT NULL,
  `bleixing` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_adminb`
--

INSERT INTO `think_adminb` (`bid`, `bleixing`) VALUES
(1, '男装'),
(2, '女装'),
(3, '家电'),
(4, '家具');

-- --------------------------------------------------------

--
-- Table structure for table `think_admin_b`
--

CREATE TABLE `think_admin_b` (
  `bid` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `delete_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_admin_b`
--

INSERT INTO `think_admin_b` (`bid`, `name`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '男装', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, '女装', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, '下载', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, '鞋子', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, '箱包', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, '配件', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, '家电', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, '数码', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(9, '手机', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, '珠宝', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(11, '眼镜', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(12, '手表', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(13, '运动', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(14, '户外', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(15, '乐器', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(16, '游戏', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(17, '动漫', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(18, '影视', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(19, '美食', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(20, '生鲜', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(21, '零食', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `think_admin_s`
--

CREATE TABLE `think_admin_s` (
  `sid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `delete_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_admin_s`
--

INSERT INTO `think_admin_s` (`sid`, `bid`, `name`, `create_time`, `update_time`, `delete_time`) VALUES
(1, 8, '傻瓜相机', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 3, '2d电影', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 3, '3d', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 4, '皮鞋', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(9, 4, '拖鞋', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, 5, '大包', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(11, 5, '小包', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(12, 5, '中包', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(13, 6, '大配件', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(14, 6, '小配件', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(15, 3, '电影', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(17, 1, '外套', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(18, 1, '夹克', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(19, 1, '衬衫', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(20, 1, '风衣', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(21, 1, '棉衣', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(22, 2, '连衣裙', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(23, 2, '衬衣', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(24, 2, '夹克', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(25, 2, '外套', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(26, 2, '背心', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `think_cang`
--

CREATE TABLE `think_cang` (
  `idcang` int(11) NOT NULL,
  `bleixing` varchar(32) NOT NULL,
  `mleixing` varchar(32) NOT NULL,
  `tupian` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `miaoshu` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `hot` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_cang`
--

INSERT INTO `think_cang` (`idcang`, `bleixing`, `mleixing`, `tupian`, `price`, `miaoshu`, `uid`, `sid`, `hot`, `size`, `create_time`, `update_time`, `delete_time`) VALUES
(58, '男装', '风衣', '20161027\\11a4d21296c75a6ccda2d0f77c87afaf.jpg', 98, '2016秋季新款风衣男中长款男士外套韩版薄款披风学生大衣冬季男装', 37, 16, 0, 0, '2016-10-27 20:41:32', '0000-00-00 00:00:00', NULL),
(59, '女装', '夹克', '20161027\\a92ee42ba87f05199aaedaaa10a9a9dc.jpg', 69, '2016春秋新款韩版短款飞行员夹克棒球服女装印花黑色外套女开衫潮', 37, 22, 0, 0, '2016-10-27 20:47:09', '0000-00-00 00:00:00', NULL),
(60, '女装', '外套', '20161027\\17cf4d5780beea5dd2295ad85b6217ea.jpg', 269, '苏醒的乐园春秋新款 韩版女装时尚修身呢大衣中长款毛呢外套', 37, 27, 0, 0, '2016-10-27 20:47:24', '0000-00-00 00:00:00', NULL),
(61, '女装', '夹克', '20161027\\a92ee42ba87f05199aaedaaa10a9a9dc.jpg', 69, '2016春秋新款韩版短款飞行员夹克棒球服女装印花黑色外套女开衫潮', 0, 22, 0, 0, '2016-10-28 08:39:43', '0000-00-00 00:00:00', NULL),
(62, '女装', '连衣裙', '20161027\\e29ef4fd1857519fca400f0c38a53d18.jpg', 40, '秋冬新款加厚韩版气质女装大码长袖毛呢子连衣裙中长款显瘦打底裙', 54, 28, 0, 0, '2016-10-28 08:48:46', '0000-00-00 00:00:00', NULL),
(63, '男装', '衬衫', '20161027\\710143b4f7fcb50b42b0162f73c81042.jpg', 259, '太平鸟男装长袖衬衫 蓝色时尚韩版修身牛津纺衬衣男秋', 56, 14, 0, 0, '2016-10-28 13:29:03', '0000-00-00 00:00:00', NULL),
(64, '女装', '连衣裙', '20161027\\e29ef4fd1857519fca400f0c38a53d18.jpg', 40, '秋冬新款加厚韩版气质女装大码长袖毛呢子连衣裙中长款显瘦打底裙', 56, 28, 0, 0, '2016-10-28 14:27:33', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `think_dianpu`
--

CREATE TABLE `think_dianpu` (
  `did` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `tousu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_dianpu`
--

INSERT INTO `think_dianpu` (`did`, `username`, `tousu`) VALUES
(1, '123123', 7),
(2, 'wer', 1),
(3, '沙发', 0),
(4, '11111111111', 0);

-- --------------------------------------------------------

--
-- Table structure for table `think_dingdan`
--

CREATE TABLE `think_dingdan` (
  `did` int(11) NOT NULL,
  `bianhao` varchar(100) NOT NULL,
  `buyjia` varchar(50) NOT NULL,
  `maijia` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `zhuangtai` varchar(20) NOT NULL,
  `shopid` int(11) NOT NULL,
  `tupian` varchar(200) NOT NULL,
  `wuliu` varchar(200) NOT NULL,
  `create_time` datetime NOT NULL,
  `jiage` int(20) NOT NULL,
  `shuliang` int(20) NOT NULL,
  `yuanyin` varchar(50) NOT NULL,
  `yunxian` int(10) NOT NULL DEFAULT '1',
  `tousu` int(11) NOT NULL DEFAULT '0',
  `neirong` varchar(200) NOT NULL,
  `delete_time` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_dingdan`
--

INSERT INTO `think_dingdan` (`did`, `bianhao`, `buyjia`, `maijia`, `username`, `zhuangtai`, `shopid`, `tupian`, `wuliu`, `create_time`, `jiage`, `shuliang`, `yuanyin`, `yunxian`, `tousu`, `neirong`, `delete_time`, `update_time`) VALUES
(1, '', '', '', '', '待付款', 0, '', '', '0000-00-00 00:00:00', 0, 0, '', 1, 0, '', '0000-00-00 00:00:00', '2016-10-28 10:03:49'),
(139, '201610282', '11111111111', '张召飞', '苏醒的乐园春秋新款 韩版女装时尚修身呢大衣中长款毛呢外套', '待付款', 27, '20161027\\17cf4d5780beea5dd2295ad85b6217ea.jpg', '', '2016-10-28 10:36:10', 269, 1, '', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, '20161028140', '11111111111', '张召飞', '苏醒的乐园春秋新款 韩版女装时尚修身呢大衣中长款毛呢外套', '待付款', 27, '20161027\\17cf4d5780beea5dd2295ad85b6217ea.jpg', '', '2016-10-28 10:48:47', 269, 1, '', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, '20161028141', '11111111111', '张召飞', '苏醒的乐园春秋新款 韩版女装时尚修身呢大衣中长款毛呢外套', '待付款', 27, '20161027\\17cf4d5780beea5dd2295ad85b6217ea.jpg', '', '2016-10-28 10:49:16', 269, 1, '', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, '20161028142', '11111111111', '张召飞', '苏醒的乐园春秋新款 韩版女装时尚修身呢大衣中长款毛呢外套', '待付款', 27, '20161027\\17cf4d5780beea5dd2295ad85b6217ea.jpg', '', '2016-10-28 10:50:26', 269, 1, '', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, '20161028143', '11111111111', '张召飞', '苏醒的乐园春秋新款 韩版女装时尚修身呢大衣中长款毛呢外套', '待付款', 27, '20161027\\17cf4d5780beea5dd2295ad85b6217ea.jpg', '', '2016-10-28 10:50:27', 269, 1, '', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, '20161028144', '11111111111', '张召飞', '苏醒的乐园春秋新款 韩版女装时尚修身呢大衣中长款毛呢外套', '待付款', 27, '20161027\\17cf4d5780beea5dd2295ad85b6217ea.jpg', '', '2016-10-28 10:50:27', 269, 1, '', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, '20161028144', '11111111111', '张召飞', '苏醒的乐园春秋新款 韩版女装时尚修身呢大衣中长款毛呢外套', '待付款', 27, '20161027\\17cf4d5780beea5dd2295ad85b6217ea.jpg', '', '2016-10-28 10:54:22', 269, 1, '', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, '20161028146', '11111111111', '张召飞', '苏醒的乐园春秋新款 韩版女装时尚修身呢大衣中长款毛呢外套', '待付款', 27, '20161027\\17cf4d5780beea5dd2295ad85b6217ea.jpg', '已发出', '2016-10-28 10:54:25', 269, 1, '', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, '20161028147', '11111111111', '张召飞', '2016春秋新款韩版短款飞行员夹克棒球服女装印花黑色外套女开衫潮', '待付款', 22, '20161027\\a92ee42ba87f05199aaedaaa10a9a9dc.jpg', '', '2016-10-28 10:54:32', 69, 1, '', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, '20161028148', '12312312345', '张召飞', '秋冬新款加厚韩版气质女装大码长袖毛呢子连衣裙中长款显瘦打底裙', '待付款', 28, '20161027\\e29ef4fd1857519fca400f0c38a53d18.jpg', '', '2016-10-28 14:27:39', 40, 1, '', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, '20161028149', '12312312345', '张召飞', '秋冬新款加厚韩版气质女装大码长袖毛呢子连衣裙中长款显瘦打底裙', '待付款', 28, '20161027\\e29ef4fd1857519fca400f0c38a53d18.jpg', '', '2016-10-28 14:28:00', 40, 1, '', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, '20161028150', '12312312345', '张召飞', '秋冬新款加厚韩版气质女装大码长袖毛呢子连衣裙中长款显瘦打底裙', '待付款', 28, '20161027\\e29ef4fd1857519fca400f0c38a53d18.jpg', '', '2016-10-28 14:28:30', 40, 1, '', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `think_dizhi`
--

CREATE TABLE `think_dizhi` (
  `did` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `diqv` varchar(50) NOT NULL,
  `dizhi` varchar(50) NOT NULL,
  `youbian` int(10) NOT NULL,
  `shouji` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `moren` tinyint(4) NOT NULL,
  `dianhua` int(20) NOT NULL,
  `update_time` datetime NOT NULL,
  `delete_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_dizhi`
--

INSERT INTO `think_dizhi` (`did`, `username`, `diqv`, `dizhi`, `youbian`, `shouji`, `uname`, `moren`, `dianhua`, `update_time`, `delete_time`) VALUES
(1, '张召飞', '河北省石家庄市', '元氏县宋曹镇叩村', 51130, '15732689447', '11111111111', 1, 0, '2016-10-28 14:32:50', '2016-10-28 14:32:50'),
(2, '张召飞', '北京市海淀区', '北京市海淀区天丰利商厦', 5000, '2147483647', '11111111111', 0, 111111111, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '张召飞', '北京市海淀区', '北京市海淀区天丰利商厦', 5000, '2147483647', '11111111111', 0, 0, '2016-10-21 11:29:09', '2016-10-21 11:29:09'),
(7, '张召飞', '北京市海淀区', '北京市海淀区天丰利商厦', 5000, '2147483647', '11111111111', 0, 0, '2016-10-21 11:28:15', '2016-10-21 11:28:15'),
(8, '张召飞', '北京市海淀区', '北京市海淀区天丰利商厦', 5000, '2147483647', '11111111111', 0, 0, '2016-10-21 11:26:25', '2016-10-21 11:26:25'),
(20, '1111', '1111', '1111', 1111, '111', '12312312345', 1, 0, '2016-10-28 09:22:41', '2016-10-28 09:22:41'),
(21, '11', '11', '11', 111, '11', '11111111111', 0, 11111111, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `think_liulan`
--

CREATE TABLE `think_liulan` (
  `lid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `delete_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_liulan`
--

INSERT INTO `think_liulan` (`lid`, `uid`, `sid`, `create_time`, `update_time`, `delete_time`) VALUES
(70, 37, 22, '2016-10-27 19:49:58', '2016-10-28 13:27:29', '0000-00-00 00:00:00'),
(71, 37, 27, '2016-10-27 19:50:00', '2016-10-28 13:27:36', '0000-00-00 00:00:00'),
(72, 37, 13, '2016-10-27 19:54:00', '2016-10-28 08:45:43', '0000-00-00 00:00:00'),
(73, 37, 28, '2016-10-27 20:03:49', '2016-10-28 08:45:24', '0000-00-00 00:00:00'),
(74, 37, 14, '2016-10-27 20:04:03', '2016-10-27 20:36:53', '0000-00-00 00:00:00'),
(75, 37, 12, '2016-10-27 20:41:24', '2016-10-28 13:27:16', '0000-00-00 00:00:00'),
(76, 37, 16, '2016-10-27 20:41:31', '2016-10-27 20:41:31', '0000-00-00 00:00:00'),
(77, 0, 22, '2016-10-28 08:37:43', '2016-10-28 08:37:43', '0000-00-00 00:00:00'),
(78, 0, 22, '2016-10-28 08:39:25', '2016-10-28 08:39:25', '0000-00-00 00:00:00'),
(79, 0, 28, '2016-10-28 08:40:28', '2016-10-28 08:40:28', '0000-00-00 00:00:00'),
(80, 0, 28, '2016-10-28 08:42:13', '2016-10-28 08:42:13', '0000-00-00 00:00:00'),
(81, 0, 28, '2016-10-28 08:44:25', '2016-10-28 08:44:25', '0000-00-00 00:00:00'),
(82, 54, 22, '2016-10-28 08:46:28', '2016-10-28 09:43:00', '0000-00-00 00:00:00'),
(83, 54, 28, '2016-10-28 08:47:20', '2016-10-28 09:26:21', '0000-00-00 00:00:00'),
(84, 54, 27, '2016-10-28 08:49:30', '2016-10-28 08:59:45', '0000-00-00 00:00:00'),
(85, 0, 27, '2016-10-28 09:52:37', '2016-10-28 09:52:37', '0000-00-00 00:00:00'),
(86, 0, 27, '2016-10-28 09:52:44', '2016-10-28 09:52:44', '0000-00-00 00:00:00'),
(87, 0, 27, '2016-10-28 09:56:10', '2016-10-28 09:56:10', '0000-00-00 00:00:00'),
(88, 0, 27, '2016-10-28 09:56:41', '2016-10-28 09:56:41', '0000-00-00 00:00:00'),
(89, 0, 27, '2016-10-28 09:56:45', '2016-10-28 09:56:45', '0000-00-00 00:00:00'),
(90, 37, 19, '2016-10-28 10:30:11', '2016-10-28 10:30:11', '0000-00-00 00:00:00'),
(91, 0, 22, '2016-10-28 13:26:44', '2016-10-28 13:26:44', '0000-00-00 00:00:00'),
(92, 56, 14, '2016-10-28 13:28:38', '2016-10-28 13:29:01', '0000-00-00 00:00:00'),
(93, 56, 13, '2016-10-28 13:28:50', '2016-10-28 13:28:50', '0000-00-00 00:00:00'),
(94, 56, 28, '2016-10-28 14:27:17', '2016-10-28 14:27:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `think_pingjia`
--

CREATE TABLE `think_pingjia` (
  `pid` int(11) NOT NULL,
  `neirong` varchar(100) NOT NULL,
  `sid` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `dianpudid` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `hao` int(11) NOT NULL,
  `huifu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_pingjia`
--

INSERT INTO `think_pingjia` (`pid`, `neirong`, `sid`, `uname`, `dianpudid`, `create_time`, `hao`, `huifu`) VALUES
(2, '地方萨芬', 2, '11111111111', 2, '2016-10-01 00:00:00', 2, ''),
(3, '阿萨德', 3, '11111111111', 3, '2016-10-21 00:00:00', 2, ''),
(4, 'asdflalfd', 4, '11111111111', 4, '2016-05-31 00:00:00', 2, '这个牛仔裤不错呦'),
(5, '', 14, '11111111111', 0, '2015-05-11 00:00:00', 2, ''),
(6, '', 14, '11111111111', 0, '0000-00-00 00:00:00', 0, ''),
(7, '这个可以有内容', 14, '11111111111', 33, '0000-00-00 00:00:00', 0, ''),
(8, '可以评价', 2, '11111111111', 0, '0000-00-00 00:00:00', 0, ''),
(9, '可以评价', 7, '11111111111', 37, '0000-00-00 00:00:00', 0, '谢谢评价'),
(10, '这个东西不错呦', 2, '11111111111', 0, '0000-00-00 00:00:00', 1, ''),
(11, '这个东西不错呦', 2, '11111111111', 0, '0000-00-00 00:00:00', 1, ''),
(12, '这个衣服太好看啦', 28, '12312312345', 0, '0000-00-00 00:00:00', 2, ''),
(13, '大师傅', 22, '12312312345', 55, '0000-00-00 00:00:00', 2, '谢谢');

-- --------------------------------------------------------

--
-- Table structure for table `think_shop`
--

CREATE TABLE `think_shop` (
  `sid` int(11) NOT NULL,
  `bleixing` varchar(50) NOT NULL,
  `mleixing` varchar(100) NOT NULL,
  `tupian` varchar(100) NOT NULL,
  `jiage` int(50) NOT NULL,
  `miaoshu` varchar(200) NOT NULL,
  `hot` int(10) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `delete_time` datetime NOT NULL,
  `xiaoliang` int(20) NOT NULL,
  `maijia` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `liulancishu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_shop`
--

INSERT INTO `think_shop` (`sid`, `bleixing`, `mleixing`, `tupian`, `jiage`, `miaoshu`, `hot`, `create_time`, `update_time`, `delete_time`, `xiaoliang`, `maijia`, `price`, `uid`, `liulancishu`) VALUES
(12, '男装', '外套', '20161027\\15c503e8c6894c46c497ad090c6cbeb2.jpg', 0, '千纸鹤秋冬新品', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '张召飞', 358, 37, 0),
(13, '男装', '夹克', '20161027\\d41900b7ef5396590db97c490511fab2.jpg', 0, '骆驼男装2016秋季新款', 0, '2016-10-27 15:40:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '张召飞', 258, 37, 0),
(14, '男装', '衬衫', '20161027\\710143b4f7fcb50b42b0162f73c81042.jpg', 0, '太平鸟男装长袖衬衫 蓝色时尚韩版修身牛津纺衬衣男秋', 10, '2016-10-27 15:42:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '张召飞', 259, 37, 0),
(15, '男装', '风衣', '', 0, '秋季男士风衣韩版中长款外套羊毛呢子修身大码男装青年英伦大衣潮', 0, '2016-10-27 16:08:03', '2016-10-27 16:09:05', '2016-10-27 16:09:05', 0, '11111111111', 178, 37, 0),
(16, '男装', '风衣', '20161027\\11a4d21296c75a6ccda2d0f77c87afaf.jpg', 0, '2016秋季新款风衣男中长款男士外套韩版薄款披风学生大衣冬季男装', 0, '2016-10-27 16:09:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '11111111111', 98, 37, 0),
(19, '男装', '棉衣', '20161027\\5e452c97fc5f4ca9937cb999cf9a24b5.jpg', 0, '2016秋季新款风衣男中长款男士外套韩版薄款披风学生大衣冬季男装', 0, '2016-10-27 18:55:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '11111111111', 128, 37, 0),
(21, '女装', '衬衣', '20161027\\699769bfc31809a10302780f5a7501ee.jpg', 0, '秋装女新款衬衫领大码女装韩版职业装上衣v领长袖t恤女翻领打底衫', 0, '2016-10-27 19:12:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '张召飞', 79, 37, 0),
(22, '女装', '夹克', '20161027\\a92ee42ba87f05199aaedaaa10a9a9dc.jpg', 0, '2016春秋新款韩版短款飞行员夹克棒球服女装印花黑色外套女开衫潮', 20, '2016-10-27 19:12:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '张召飞', 69, 37, 0),
(26, '女装', '背心', '20161027\\d9afa5fa49c789063ef7cba264097d02.jpg', 0, '韩版新款女装甜美蕾丝钩花背心吊带女莫代尔棉修身无袖打底衫上衣', 0, '2016-10-27 19:20:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '张召飞', 30, 37, 0),
(27, '女装', '外套', '20161027\\17cf4d5780beea5dd2295ad85b6217ea.jpg', 0, '苏醒的乐园春秋新款 韩版女装时尚修身呢大衣中长款毛呢外套', 14, '2016-10-27 19:22:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '张召飞', 269, 37, 0),
(28, '女装', '连衣裙', '20161027\\e29ef4fd1857519fca400f0c38a53d18.jpg', 0, '秋冬新款加厚韩版气质女装大码长袖毛呢子连衣裙中长款显瘦打底裙', 12, '2016-10-27 19:24:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '张召飞', 40, 37, 0),
(29, '男装', '衬衫', '20161028\\5b5f1c4cdf0c9144f6736cd0f6e1c1c8.jpg', 0, '蜘蛛', 0, '2016-10-28 14:36:49', '2016-10-28 14:36:57', '2016-10-28 14:36:57', 0, '张召飞', 100, 55, 0);

-- --------------------------------------------------------

--
-- Table structure for table `think_shopcar`
--

CREATE TABLE `think_shopcar` (
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `tupian` varchar(50) NOT NULL,
  `miaoshu` varchar(32) NOT NULL,
  `price` int(11) NOT NULL,
  `bleixing` varchar(32) NOT NULL,
  `mleixing` varchar(22) NOT NULL,
  `ispay` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `size` varchar(32) NOT NULL,
  `color` varchar(32) NOT NULL,
  `shuliang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_shopcar`
--

INSERT INTO `think_shopcar` (`cid`, `uid`, `sid`, `tupian`, `miaoshu`, `price`, `bleixing`, `mleixing`, `ispay`, `create_time`, `update_time`, `delete_time`, `size`, `color`, `shuliang`) VALUES
(203, 0, 22, '20161027\\a92ee42ba87f05199aaedaaa10a9a9dc.jpg', '2016春秋新款韩版短款飞行员夹克棒球服女装印花黑色外套女开衫潮', 69, '女装', '夹克', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', 0),
(204, 0, 28, '20161027\\e29ef4fd1857519fca400f0c38a53d18.jpg', '秋冬新款加厚韩版气质女装大码长袖毛呢子连衣裙中长款显瘦打底裙', 40, '女装', '连衣裙', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', 0),
(207, 54, 27, '20161027\\17cf4d5780beea5dd2295ad85b6217ea.jpg', '苏醒的乐园春秋新款 韩版女装时尚修身呢大衣中长款毛呢外套', 269, '女装', '外套', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'S码', '藏蓝色', 1),
(208, 54, 22, '20161027\\a92ee42ba87f05199aaedaaa10a9a9dc.jpg', '2016春秋新款韩版短款飞行员夹克棒球服女装印花黑色外套女开衫潮', 69, '女装', '夹克', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', 0),
(209, 37, 22, '20161027\\a92ee42ba87f05199aaedaaa10a9a9dc.jpg', '2016春秋新款韩版短款飞行员夹克棒球服女装印花黑色外套女开衫潮', 69, '女装', '夹克', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'M码', '黑色', 1),
(210, 37, 27, '20161027\\17cf4d5780beea5dd2295ad85b6217ea.jpg', '苏醒的乐园春秋新款 韩版女装时尚修身呢大衣中长款毛呢外套', 269, '女装', '外套', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', 0),
(211, 37, 22, '20161027\\a92ee42ba87f05199aaedaaa10a9a9dc.jpg', '2016春秋新款韩版短款飞行员夹克棒球服女装印花黑色外套女开衫潮', 69, '女装', '夹克', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '', 0),
(212, 37, 27, '20161027\\17cf4d5780beea5dd2295ad85b6217ea.jpg', '苏醒的乐园春秋新款 韩版女装时尚修身呢大衣中长款毛呢外套', 269, '女装', '外套', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'S码', '红色', 1),
(213, 56, 28, '20161027\\e29ef4fd1857519fca400f0c38a53d18.jpg', '秋冬新款加厚韩版气质女装大码长袖毛呢子连衣裙中长款显瘦打底裙', 40, '女装', '连衣裙', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 'L码', '红色', 1);

-- --------------------------------------------------------

--
-- Table structure for table `think_shopcolor`
--

CREATE TABLE `think_shopcolor` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_shopcolor`
--

INSERT INTO `think_shopcolor` (`id`, `sid`, `color`) VALUES
(3, 19, '棕色'),
(4, 19, '黑色'),
(5, 20, '玫红色'),
(6, 20, '红色'),
(7, 20, '黑色'),
(8, 20, '土黄色'),
(9, 21, '黑色'),
(10, 21, '灰色'),
(11, 21, '赤红色'),
(12, 21, '桔色'),
(13, 22, '黑色'),
(14, 23, '米色，红色，藏蓝色'),
(15, 24, '纯色款，带钻款'),
(16, 25, '米色'),
(17, 25, '红色'),
(18, 25, '藏蓝色'),
(19, 26, '纯色款'),
(20, 26, '带钻款'),
(21, 27, '米色'),
(22, 27, '红色'),
(23, 27, '藏蓝色'),
(24, 28, '玫红色'),
(25, 28, '红色'),
(26, 28, '黑色'),
(27, 28, '土黄色'),
(28, 29, '褐色');

-- --------------------------------------------------------

--
-- Table structure for table `think_shopsize`
--

CREATE TABLE `think_shopsize` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_shopsize`
--

INSERT INTO `think_shopsize` (`id`, `sid`, `size`) VALUES
(15, 19, 'M'),
(16, 19, 'L'),
(17, 19, 'XL'),
(18, 19, 'XXL'),
(19, 19, '3XL'),
(20, 19, '4XL'),
(21, 19, '5XL'),
(22, 20, 'M'),
(23, 20, 'L'),
(24, 20, 'XL'),
(25, 20, 'XXL'),
(26, 20, '3XL'),
(27, 21, 'M'),
(28, 21, 'L'),
(29, 21, 'XL'),
(30, 21, 'XXL'),
(31, 21, '3XL'),
(32, 21, '4XL'),
(33, 22, 'M'),
(34, 22, 'L'),
(35, 22, 'XL'),
(36, 22, 'XXL'),
(37, 22, '3XL'),
(38, 23, 'XS'),
(39, 23, 'S'),
(40, 23, 'M'),
(41, 23, 'L'),
(42, 23, 'XL'),
(43, 24, 'M'),
(44, 24, 'L'),
(45, 24, 'XL'),
(46, 25, 'XS'),
(47, 25, 'S'),
(48, 25, 'M'),
(49, 25, 'L'),
(50, 25, 'XL'),
(51, 26, 'M'),
(52, 26, 'L'),
(53, 26, 'XL'),
(54, 27, 'XS'),
(55, 27, 'S'),
(56, 27, 'M'),
(57, 27, 'L'),
(58, 27, 'XL'),
(59, 28, 'M'),
(60, 28, 'L'),
(61, 28, 'XL'),
(62, 28, '2XL'),
(63, 28, '3XL'),
(64, 29, 'M'),
(65, 29, 'L'),
(66, 29, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `think_user`
--

CREATE TABLE `think_user` (
  `uid` int(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `create_ip` varchar(32) NOT NULL,
  `status` int(32) NOT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `qian` int(100) NOT NULL,
  `dou` int(100) NOT NULL,
  `qiandao` datetime NOT NULL,
  `touxiang` varchar(200) NOT NULL,
  `youhui` int(20) NOT NULL,
  `truename` varchar(30) NOT NULL,
  `nicheng` varchar(30) NOT NULL,
  `sex` tinyint(4) NOT NULL,
  `youxiang` varchar(50) NOT NULL,
  `shengri` varchar(30) NOT NULL,
  `dizhi` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `payword` int(11) NOT NULL,
  `qq` int(20) NOT NULL,
  `weixin` varchar(30) NOT NULL,
  `dianpu` varchar(32) NOT NULL,
  `tousu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_user`
--

INSERT INTO `think_user` (`uid`, `username`, `password`, `create_time`, `update_time`, `create_ip`, `status`, `delete_time`, `qian`, `dou`, `qiandao`, `touxiang`, `youhui`, `truename`, `nicheng`, `sex`, `youxiang`, `shengri`, `dizhi`, `name`, `payword`, `qq`, `weixin`, `dianpu`, `tousu`) VALUES
(37, '11111111111', 'e3ceb5881a0a1fdaad01296d7554868d', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '127.0.0.1', 1, NULL, 515, 830, '2016-10-27 14:10:43', '/uploads\\20161025\\e1dada044cb69601b2a7a7a699404e5f.jpg', 10, '王小二', '小王', 1, '123123', '1993/02/51', '北京市海淀区', 'wangxiaower', 111111, 112233, '111', '我的店铺', 0),
(55, '张召飞', '96e79218965eb72c92a549dd5a330112', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, NULL, 109, 0, '0000-00-00 00:00:00', '', 0, '', '', 0, '', '', '', '', 0, 0, '', '', 1),
(56, '12312312345', '96e79218965eb72c92a549dd5a330112', '2016-10-28 13:25:59', '2016-10-28 13:25:59', '127.0.0.1', 1, NULL, 10000, 5, '2016-10-28 14:10:52', '', 0, '', '', 0, '765531848@qq.com', '', '', '', 0, 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `think_yinghang`
--

CREATE TABLE `think_yinghang` (
  `yid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `yinghang` varchar(30) NOT NULL,
  `kahao` varchar(30) NOT NULL,
  `sheng` varchar(20) NOT NULL,
  `shi` varchar(20) NOT NULL,
  `dizhi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `think_yinghang`
--

INSERT INTO `think_yinghang` (`yid`, `username`, `yinghang`, `kahao`, `sheng`, `shi`, `dizhi`) VALUES
(10, '11111111111', '111', '111', '111', '111', '111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `think_admin`
--
ALTER TABLE `think_admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `think_adminb`
--
ALTER TABLE `think_adminb`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `think_admin_b`
--
ALTER TABLE `think_admin_b`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `think_admin_s`
--
ALTER TABLE `think_admin_s`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `think_cang`
--
ALTER TABLE `think_cang`
  ADD PRIMARY KEY (`idcang`);

--
-- Indexes for table `think_dianpu`
--
ALTER TABLE `think_dianpu`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `think_dingdan`
--
ALTER TABLE `think_dingdan`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `think_dizhi`
--
ALTER TABLE `think_dizhi`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `think_liulan`
--
ALTER TABLE `think_liulan`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `think_pingjia`
--
ALTER TABLE `think_pingjia`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `think_shop`
--
ALTER TABLE `think_shop`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `think_shopcar`
--
ALTER TABLE `think_shopcar`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `think_shopcolor`
--
ALTER TABLE `think_shopcolor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_shopsize`
--
ALTER TABLE `think_shopsize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_user`
--
ALTER TABLE `think_user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `think_yinghang`
--
ALTER TABLE `think_yinghang`
  ADD PRIMARY KEY (`yid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `think_admin_s`
--
ALTER TABLE `think_admin_s`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `think_cang`
--
ALTER TABLE `think_cang`
  MODIFY `idcang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `think_dianpu`
--
ALTER TABLE `think_dianpu`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `think_dingdan`
--
ALTER TABLE `think_dingdan`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `think_dizhi`
--
ALTER TABLE `think_dizhi`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `think_liulan`
--
ALTER TABLE `think_liulan`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `think_pingjia`
--
ALTER TABLE `think_pingjia`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `think_shop`
--
ALTER TABLE `think_shop`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `think_shopcar`
--
ALTER TABLE `think_shopcar`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;
--
-- AUTO_INCREMENT for table `think_shopcolor`
--
ALTER TABLE `think_shopcolor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `think_shopsize`
--
ALTER TABLE `think_shopsize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `think_user`
--
ALTER TABLE `think_user`
  MODIFY `uid` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `think_yinghang`
--
ALTER TABLE `think_yinghang`
  MODIFY `yid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
