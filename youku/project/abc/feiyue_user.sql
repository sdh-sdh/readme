/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : feiyue

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2015-12-14 11:19:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for feiyue_user
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_user`;
CREATE TABLE `feiyue_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `isdelete` int(10) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_user
-- ----------------------------
INSERT INTO `feiyue_user` VALUES ('2', '小麻花', 'd81f9c1be2e08964bf9f24b15f0e4900', '0');
INSERT INTO `feiyue_user` VALUES ('37', '大毛', '202cb962ac59075b964b07152d234b70', '0');
INSERT INTO `feiyue_user` VALUES ('43', '啊啊啊', '698d51a19d8a121ce581499d7b701668', '0');
INSERT INTO `feiyue_user` VALUES ('44', '白杨', '202cb962ac59075b964b07152d234b70', '0');
