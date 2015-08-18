# Host: 127.0.0.1  (Version: 5.5.40)
# Date: 2015-08-18 22:06:56
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "axe_article"
#

DROP TABLE IF EXISTS `axe_article`;
CREATE TABLE `axe_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `c_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类ID',
  `keyword` varchar(255) NOT NULL DEFAULT '' COMMENT '关键词',
  `desc` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `content` text NOT NULL COMMENT '内容',
  `is_top` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `is_use` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否可用',
  `createtime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `picurl` varchar(255) NOT NULL DEFAULT '' COMMENT '图片路径',
  `s_picurl` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图路径',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14427 DEFAULT CHARSET=utf8 COMMENT='文章表';

#
# Data for table "axe_article"
#

/*!40000 ALTER TABLE `axe_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `axe_article` ENABLE KEYS */;

#
# Structure for table "axe_category"
#

DROP TABLE IF EXISTS `axe_category`;
CREATE TABLE `axe_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '分类名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `createtime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `sort` tinyint(3) NOT NULL DEFAULT '0' COMMENT '排序',
  `is_use` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否可用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='文章分类';

#
# Data for table "axe_category"
#

/*!40000 ALTER TABLE `axe_category` DISABLE KEYS */;
INSERT INTO `axe_category` VALUES (1,'新闻',8,1436861397,0,1),(2,'热点新闻1',1,1436794790,0,1),(3,'文档',0,1436775336,0,1),(8,'测试',0,1436843834,0,1);
/*!40000 ALTER TABLE `axe_category` ENABLE KEYS */;
