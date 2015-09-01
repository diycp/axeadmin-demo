# Host: localhost  (Version: 5.5.40)
# Date: 2015-09-01 20:11:35
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "axe_admin"
#

DROP TABLE IF EXISTS `axe_admin`;
CREATE TABLE `axe_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  `createtime` int(11) NOT NULL DEFAULT '0',
  `lastlogintime` int(11) NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT 'email',
  `is_use` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0可用1不可用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='管理员';

#
# Data for table "axe_admin"
#

INSERT INTO `axe_admin` VALUES (1,'admin','43d832e9182af5919c72d74e42b4f3a9',1438751263,1439949997,'asdf@ads.cm',0),(2,'kphcdr','43d832e9182af5919c72d74e42b4f3a9',0,1439208343,'kpsdf订单',1),(5,'admin888','f37e50977d47564c650121441fe2e223',1439207276,0,'admin@admin.com',0);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='文章表';

#
# Data for table "axe_article"
#

/*!40000 ALTER TABLE `axe_article` DISABLE KEYS */;
INSERT INTO `axe_article` VALUES (1,'水电费水电费',8,'阿斯蒂芬','阿斯蒂芬','阿斯蒂芬',0,0,1439974943,'/Uploads/article/2015-08-19/55d4461e3b415.jpg','/Uploads/article/2015-08-19/thumb/55d4461e3b415.jpg'),(2,'是2',8,'是','是','安朔1',0,1,1439975048,'/Uploads/article/2015-08-19/55d44612259a2.jpg','/Uploads/article/2015-08-19/thumb/55d44612259a2.jpg');
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
INSERT INTO `axe_category` VALUES (1,'二级分类',8,1441109248,0,0),(2,'二级分类',1,1436794790,0,1),(3,'一级分类3',1,1439958688,0,1),(8,'一级分类3',0,1439966496,0,1);
/*!40000 ALTER TABLE `axe_category` ENABLE KEYS */;

#
# Structure for table "axe_conf"
#

DROP TABLE IF EXISTS `axe_conf`;
CREATE TABLE `axe_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '字段值',
  `value` varchar(255) NOT NULL DEFAULT '' COMMENT '值',
  `desc` varchar(255) NOT NULL DEFAULT '' COMMENT '说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='管理员表';

#
# Data for table "axe_conf"
#

INSERT INTO `axe_conf` VALUES (1,'WEB_TITLE','AXEADMIN','网站标题'),(3,'WEB_KEYWORD','AXE','网站关键词'),(4,'WEB_DESC','AXEDESC','网站描述'),(5,'WEBsdfsdf','asdf','sdf');
