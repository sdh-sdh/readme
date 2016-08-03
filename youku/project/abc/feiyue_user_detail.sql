/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : feiyue

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2015-12-14 11:19:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for feiyue_user_detail
-- ----------------------------
DROP TABLE IF EXISTS `feiyue_user_detail`;
CREATE TABLE `feiyue_user_detail` (
  `userid` int(11) unsigned NOT NULL COMMENT '关联用户id',
  `userpic` varchar(255) NOT NULL DEFAULT 'Public/Admin/images/default.jpg' COMMENT '头像',
  `sex` tinyint(4) NOT NULL COMMENT '性别',
  `email` char(30) NOT NULL COMMENT '邮箱',
  `tel` varchar(50) NOT NULL COMMENT '电话',
  `resume` varchar(255) NOT NULL COMMENT '个人简介',
  `rtime` int(30) unsigned NOT NULL COMMENT '注册时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feiyue_user_detail
-- ----------------------------
INSERT INTO `feiyue_user_detail` VALUES ('2', 'Public/Uploads/default.jpg', '1', '378018363@qq.com', '13456789876', '', '0');
INSERT INTO `feiyue_user_detail` VALUES ('37', 'Public/Uploads/default.jpg', '0', '', '', '', '1449998004');
INSERT INTO `feiyue_user_detail` VALUES ('43', '/Public/Uploads/2015-12-14/566e278d1ab3f.jpg', '0', '463768687@qq.com', '13546789865', '', '1450012871');
INSERT INTO `feiyue_user_detail` VALUES ('44', '/Public/Uploads/2015-12-14/566e274694c5f.jpg', '0', '4637687@qq.com', '13546789865', '', '1450014058');
