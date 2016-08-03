/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50612
Source Host           : 127.0.0.1:3306
Source Database       : feiyue

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2015-12-14 09:04:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for feiyue_assortment
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_assortment`;
CREATE TABLE `feiyue_assortment` (
  `asortid` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `aname` char(30) NOT NULL,
  `parent` int(20) unsigned NOT NULL,
  `path` varchar(30) NOT NULL,
  `state` int(4) NOT NULL,
  PRIMARY KEY (`asortid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_assortment
-- ----------------------------
INSERT INTO `feiyue_assortment` VALUES ('1', '男装', '0', '0', '0');
INSERT INTO `feiyue_assortment` VALUES ('5', '女装', '0', '0', '0');
INSERT INTO `feiyue_assortment` VALUES ('6', '童装', '0', '0', '0');
INSERT INTO `feiyue_assortment` VALUES ('7', '茶具', '0', '0', '0');
INSERT INTO `feiyue_assortment` VALUES ('8', '办公用品', '0', '0', '0');
INSERT INTO `feiyue_assortment` VALUES ('9', '电脑', '0', '0', '0');
INSERT INTO `feiyue_assortment` VALUES ('10', '家具', '0', '0', '0');
INSERT INTO `feiyue_assortment` VALUES ('11', '烟草', '0', '0', '0');
INSERT INTO `feiyue_assortment` VALUES ('20', '都舒服', '9', '0,9', '0');

-- ----------------------------
-- Table structure for feiyue_goods
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_goods`;
CREATE TABLE `feiyue_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `goodname` varchar(255) NOT NULL COMMENT '商品名',
  `oldprice` int(11) NOT NULL DEFAULT '0' COMMENT '商品原价 (默认0 代表现价与原价没有变化)',
  `nowprice` int(11) NOT NULL COMMENT '商品现价',
  `goodpic` varchar(255) NOT NULL COMMENT '商品图片(简图,详细图片 在图片表查询)',
  `asortid` int(11) NOT NULL COMMENT '商品分类ID',
  `storeid` int(11) NOT NULL COMMENT '0为自营商品商铺ID',
  `state` tinyint(4) NOT NULL DEFAULT '1' COMMENT '商品状态(默认1 为0时商品将不在显示)',
  `stock` int(11) NOT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_goods
-- ----------------------------
INSERT INTO `feiyue_goods` VALUES ('5', '啊啊啊啊啊', '0', '333', '', '11', '0', '1', '0', '0');
INSERT INTO `feiyue_goods` VALUES ('6', '啊啊啊啊啊', '0', '333', '/Public', '11', '0', '1', '0', '0');
INSERT INTO `feiyue_goods` VALUES ('7', '啊啊啊啊啊', '0', '333', '/Public', '11', '0', '1', '0', '0');
INSERT INTO `feiyue_goods` VALUES ('9', '啊啊啊啊啊', '0', '333', '/Public', '11', '0', '1', '0', '0');
INSERT INTO `feiyue_goods` VALUES ('10', '啊啊啊啊啊', '542', '542', '/Public/Uploads/2015-12-13/566d7a3d345df.jpg', '11', '0', '4', '4242', '0');
INSERT INTO `feiyue_goods` VALUES ('20', '撒大声地', '22', '22', '/Public/Uploads/2015-12-13/566d84be87ca2.jpg', '1', '0', '2', '333', '0');
INSERT INTO `feiyue_goods` VALUES ('22', '西服', '1555', '1555', '/Public/Uploads/2015-12-13/566d898709b9c.jpg', '1', '0', '2', '555', '0');
INSERT INTO `feiyue_goods` VALUES ('26', '飒飒大师', '0', '222', '/Public/Uploads/2015-12-13/566d8efa160fa.jpg', '11', '0', '2', '0', '0');
INSERT INTO `feiyue_goods` VALUES ('27', '实打实大师', '0', '2223', '/Public/Uploads/2015-12-13/566d8f735dc8f.jpg', '9', '0', '4', '0', '0');

-- ----------------------------
-- Table structure for feiyue_goods_attr
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_goods_attr`;
CREATE TABLE `feiyue_goods_attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodsid` int(11) NOT NULL,
  `attrname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_goods_attr
-- ----------------------------

-- ----------------------------
-- Table structure for feiyue_goods_attr_values
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_goods_attr_values`;
CREATE TABLE `feiyue_goods_attr_values` (
  `goodsid` int(11) NOT NULL COMMENT '商品id',
  `size` varchar(255) NOT NULL COMMENT '商品尺码',
  `price` varchar(255) NOT NULL COMMENT '商品价钱',
  `pic` varchar(255) NOT NULL COMMENT '商品颜色图片',
  `count` int(11) NOT NULL DEFAULT '0' COMMENT '库存'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_goods_attr_values
-- ----------------------------
INSERT INTO `feiyue_goods_attr_values` VALUES ('7', 'S', '333', '/Public/Uploads/2015-12-13/566d1b0c0ef23.jpg', '333');

-- ----------------------------
-- Table structure for feiyue_goods_brand
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_goods_brand`;
CREATE TABLE `feiyue_goods_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodsid` int(11) NOT NULL,
  `brandname` varchar(255) NOT NULL,
  `brandlogo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_goods_brand
-- ----------------------------

-- ----------------------------
-- Table structure for feiyue_goods_comment
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_goods_comment`;
CREATE TABLE `feiyue_goods_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL COMMENT '订单ID',
  `userid` int(11) NOT NULL,
  `goodsid` int(11) NOT NULL,
  `grade` tinyint(4) NOT NULL COMMENT '商品评分',
  `content` text NOT NULL,
  `ctime` int(11) NOT NULL,
  `cip` varchar(15) NOT NULL,
  `cpic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_goods_comment
-- ----------------------------

-- ----------------------------
-- Table structure for feiyue_goods_order
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_goods_order`;
CREATE TABLE `feiyue_goods_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `goodsid` int(11) NOT NULL,
  `ordertime` int(11) NOT NULL,
  `orderprice` int(11) NOT NULL,
  `goodsattr` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `preferential` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_goods_order
-- ----------------------------

-- ----------------------------
-- Table structure for feiyue_goods_pic
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_goods_pic`;
CREATE TABLE `feiyue_goods_pic` (
  `goodsid` int(11) NOT NULL COMMENT '关联商品id',
  `goodspic` varchar(255) NOT NULL COMMENT '商品业放大镜图片'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_goods_pic
-- ----------------------------
INSERT INTO `feiyue_goods_pic` VALUES ('19', '/Public/Uploads/2015-12-13/566d53a497c19.png');
INSERT INTO `feiyue_goods_pic` VALUES ('19', '/Public/Uploads/2015-12-13/566d53a49b89c.jpg');
INSERT INTO `feiyue_goods_pic` VALUES ('19', '/Public/Uploads/2015-12-13/566d53a504af0.jpg');
INSERT INTO `feiyue_goods_pic` VALUES ('19', '/Public/Uploads/2015-12-13/566d53a50de43.jpg');
INSERT INTO `feiyue_goods_pic` VALUES ('19', '/Public/Uploads/2015-12-13/566d53a510b67.jpg');

-- ----------------------------
-- Table structure for feiyue_goods_tag
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_goods_tag`;
CREATE TABLE `feiyue_goods_tag` (
  `goodsid` int(11) NOT NULL COMMENT '商品id',
  `tagname` varchar(255) NOT NULL COMMENT '标签名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_goods_tag
-- ----------------------------
INSERT INTO `feiyue_goods_tag` VALUES ('10', 'ygyjg');
INSERT INTO `feiyue_goods_tag` VALUES ('10', 'ygyjg');
INSERT INTO `feiyue_goods_tag` VALUES ('10', 'sdasd');
INSERT INTO `feiyue_goods_tag` VALUES ('6', '33');
INSERT INTO `feiyue_goods_tag` VALUES ('9', 'fddssd');
INSERT INTO `feiyue_goods_tag` VALUES ('9', 'fddssd');
INSERT INTO `feiyue_goods_tag` VALUES ('9', 'fddssd');
INSERT INTO `feiyue_goods_tag` VALUES ('7', 'fdfsd');
INSERT INTO `feiyue_goods_tag` VALUES ('3', 'dsdasd');
INSERT INTO `feiyue_goods_tag` VALUES ('7', 'sdasd');
INSERT INTO `feiyue_goods_tag` VALUES ('3', 'sdasd');
INSERT INTO `feiyue_goods_tag` VALUES ('8', 'dasd');
INSERT INTO `feiyue_goods_tag` VALUES ('19', '湿哒哒');
INSERT INTO `feiyue_goods_tag` VALUES ('7', '上的');
INSERT INTO `feiyue_goods_tag` VALUES ('7', '大声道');

-- ----------------------------
-- Table structure for feiyue_shop_cart
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_shop_cart`;
CREATE TABLE `feiyue_shop_cart` (
  `cartid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `goodsid` int(11) NOT NULL,
  `attrid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `all_price` int(11) NOT NULL,
  PRIMARY KEY (`cartid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_shop_cart
-- ----------------------------

-- ----------------------------
-- Table structure for feiyue_user
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_user`;
CREATE TABLE `feiyue_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_user
-- ----------------------------
INSERT INTO `feiyue_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `feiyue_user` VALUES ('2', '啊啊啊啊啊', '698d51a19d8a121ce581499d7b701668');
INSERT INTO `feiyue_user` VALUES ('3', '啊啊啊', 'b59c67bf196a4758191e42f76670ceba');

-- ----------------------------
-- Table structure for feiyue_user_adress
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_user_adress`;
CREATE TABLE `feiyue_user_adress` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` char(11) NOT NULL,
  `postcode` char(6) NOT NULL,
  `state` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_user_adress
-- ----------------------------

-- ----------------------------
-- Table structure for feiyue_user_detail
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_user_detail`;
CREATE TABLE `feiyue_user_detail` (
  `userid` int(11) NOT NULL,
  `userpic` varchar(255) NOT NULL,
  `sex` tinyint(4) NOT NULL,
  `height` tinyint(4) DEFAULT NULL,
  `weight` tinyint(4) DEFAULT NULL,
  `cloth` tinyint(4) DEFAULT NULL,
  `shoe` tinyint(4) DEFAULT NULL,
  `trousers` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_user_detail
-- ----------------------------
