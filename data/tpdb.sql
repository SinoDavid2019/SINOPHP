/*
Navicat MySQL Data Transfer

Source Server         : AAA
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : tpdb

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-07-18 15:50:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin_user`;
CREATE TABLE `tp_admin_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `listorder` varchar(255) DEFAULT NULL,
  `role_id` varchar(50) DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL,
  `last_login_ip` varchar(30) DEFAULT NULL,
  `last_login_time` varchar(200) DEFAULT NULL,
  `create_time` int(10) DEFAULT NULL,
  `update_time` int(10) DEFAULT NULL,
  `num` int(10) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `USERNAME_UK` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_admin_user
-- ----------------------------
INSERT INTO `tp_admin_user` VALUES ('1', 'admin', '1002d9d50400e9220b2e90eea3b397b7', null, '1', '1', '127.0.0.1', '2019-07-18 15:48:12', '1563334556', '1563436092', null, '15294182360', '1085550637@qq.com');
INSERT INTO `tp_admin_user` VALUES ('8', 'weihl', '1002d9d50400e9220b2e90eea3b397b7', null, '6', '1', '127.0.0.1', '2019-07-17 14:28:14', '1563334793', '1563344894', null, '15294182360', '1085552595@qq.com');
INSERT INTO `tp_admin_user` VALUES ('9', 'zhangdan', '1002d9d50400e9220b2e90eea3b397b7', null, '1', '1', '127.0.0.1', '2019-07-17 14:40:59', '1563345626', '1563345659', null, '15294182360', '105555@qq.com');
INSERT INTO `tp_admin_user` VALUES ('10', 'guanliyuan', '1002d9d50400e9220b2e90eea3b397b7', null, '6', '1', '127.0.0.1', '2019-07-17 15:09:38', '1563346059', '1563347378', null, '1120002220', '1200222@qq.com');
INSERT INTO `tp_admin_user` VALUES ('12', 'guanliyuan1', '768a1237756280d780e99e27f400ae30', null, '1', '1', null, null, '1563431321', null, null, '15294182360', '1200222@qq.com');
INSERT INTO `tp_admin_user` VALUES ('13', 'guanliyuan2', '1002d9d50400e9220b2e90eea3b397b7', null, '1', '1', null, null, '1563431343', null, null, '15294182360', '15294182360@163.com');
INSERT INTO `tp_admin_user` VALUES ('14', 'guanliyuan3', '1002d9d50400e9220b2e90eea3b397b7', null, '1', '1', null, null, '1563431377', null, null, '123', '111');
INSERT INTO `tp_admin_user` VALUES ('15', 'guanliyuan32', '1002d9d50400e9220b2e90eea3b397b7', null, '1', '1', null, null, '1563431468', null, null, '15294182360', '15294182360@163.com');
INSERT INTO `tp_admin_user` VALUES ('16', 'guanliyuan322', '1002d9d50400e9220b2e90eea3b397b7', null, '1', '1', null, null, '1563431547', null, null, '15294182360', '15294182360@163.com');

-- ----------------------------
-- Table structure for tp_menu
-- ----------------------------
DROP TABLE IF EXISTS `tp_menu`;
CREATE TABLE `tp_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) DEFAULT '1',
  `parent_id` tinyint(4) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `type` varchar(10) DEFAULT 'menu',
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_menu
-- ----------------------------
INSERT INTO `tp_menu` VALUES ('13', '1', '0', '资讯管理', null, '1', 'menu', '&#xe616');
INSERT INTO `tp_menu` VALUES ('14', '1', '13', '资讯列表', 'admin/news/index', '1', 'menu', '&#xe6f3');
INSERT INTO `tp_menu` VALUES ('16', '1', '0', '菜单栏管理', null, '2', 'menu', '&#xe681');
INSERT INTO `tp_menu` VALUES ('17', '1', '16', '菜单设置', 'admin/menu/index', '1', 'menu', '&#xe72b;');
INSERT INTO `tp_menu` VALUES ('18', '1', '0', '会员管理', null, '3', 'menu', '&#xe6b4');
INSERT INTO `tp_menu` VALUES ('19', '1', '18', '会员列表', 'admin/user/index', '1', 'menu', '&#xe72b;');
INSERT INTO `tp_menu` VALUES ('21', '1', '0', '管理员管理', null, '4', 'menu', '&#xe616');
INSERT INTO `tp_menu` VALUES ('22', '1', '21', '角色管理', 'admin/admin/role', '1', 'menu', '&#xe681');
INSERT INTO `tp_menu` VALUES ('23', '1', '21', '权限管理', 'admin/admin/permission', '2', 'menu', '&#xe681');
INSERT INTO `tp_menu` VALUES ('31', '1', '21', '管理员列表', 'admin/admin/index', '3', 'menu', '');
INSERT INTO `tp_menu` VALUES ('32', '1', '14', '查看新闻资讯列表权限', 'admin/news/index', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('33', '1', '14', '新增新闻资讯权限', 'admin/news/add', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('34', '1', '14', '编辑新闻资讯权限', 'admin/news/edit', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('35', '1', '14', '删除新闻资讯权限', 'admin/news/delete', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('36', '1', '17', '查看菜单列表权限', 'admin/menu/index', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('37', '1', '17', '新增菜单权限', 'admin/menu/addmenu', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('38', '1', '17', '修改菜单权限', 'admin/menu/editmenu', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('39', '1', '17', '删除菜单权限', 'admin/menu/delmenu', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('40', '1', '19', '会员列表查看权限', 'admin/user/index', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('41', '1', '19', '新增会员权限', 'admin/user/adduser', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('42', '1', '19', '导出会员信息表', 'admin/user/userexcel', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('43', '1', '22', '添加角色权限', 'admin/admin/addrole', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('44', '1', '22', '编辑角色权限', 'admin/admin/editrole', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('45', '1', '22', '删除角色权限', 'admin/admin/delrole', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('46', '1', '23', '删除权限', 'admin/admin/delPermission', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('47', '1', '23', '添加权限', 'admin/admin/addPermission', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('48', '1', '23', '修改权限', 'admin/admin/editPermission', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('49', '1', '31', '查看管理员信息列表权限', 'admin/admin/index', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('50', '1', '31', '新增管理员权限', 'admin/admin/addAdmin', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('51', '1', '31', '修改管理员信息权限', 'admin/admin/editAdmin', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('52', '1', '31', '删除管理员权限', 'admin/admin/delAdmin', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('53', '1', '0', '系统统计', null, '5', 'menu', '&#xe621');
INSERT INTO `tp_menu` VALUES ('54', '1', '53', '会员统计', 'admin/echarts/user', '0', 'menu', '');
INSERT INTO `tp_menu` VALUES ('55', '1', '14', '更新新闻资讯', 'admin/news/update', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('56', '1', '14', '上传图片权限', 'admin/image/upload', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('57', '1', '19', '更新会员信息权限', 'admin/user/edituser', null, 'per', null);
INSERT INTO `tp_menu` VALUES ('59', '1', '14', '修改新闻发布状态权限', 'admin/news/status', null, 'per', null);

-- ----------------------------
-- Table structure for tp_news
-- ----------------------------
DROP TABLE IF EXISTS `tp_news`;
CREATE TABLE `tp_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `small_title` varchar(255) DEFAULT NULL,
  `catid` int(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text,
  `description` varchar(255) DEFAULT NULL,
  `is_position` tinyint(1) DEFAULT NULL COMMENT '是否推荐',
  `is_head_figure` tinyint(1) DEFAULT NULL,
  `is_allowcomments` tinyint(1) DEFAULT NULL,
  `listorder` int(8) DEFAULT NULL,
  `source_type` tinyint(1) DEFAULT NULL,
  `create_time` int(10) DEFAULT NULL,
  `update_time` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `read_count` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `create_time` (`create_time`),
  KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_news
-- ----------------------------
INSERT INTO `tp_news` VALUES ('1', '标题1', '标题1', '1', '/upload/20190617/29b2c749dae3e63d49a5ffafb394aef0.jpeg', '<p>标题1</p>', '标题1', '1', '1', '1', null, null, '1560735051', '1560735051', '1', '0');
INSERT INTO `tp_news` VALUES ('2', '标题2', '标题2', '3', '/upload/20190617/904a13361c384079a1133d68d5037aac.jpeg', '<p>标题2</p>', '标题2', '1', '1', '1', null, null, '1560735156', '1560735156', '1', '0');
INSERT INTO `tp_news` VALUES ('3', '标题3', '标题3', '5', '/upload/20190617/559b250341fc8f6e5a3925285a75dcb3.jpeg', '<p>标题3</p>', '标题3', '1', '1', '1', null, null, '1560735193', '1560735193', '1', '0');
INSERT INTO `tp_news` VALUES ('4', '标题4', '标题4', '6', '/upload/20190617/ce9833b811c1bd64ee590acd408dbc3b.jpeg', '<p>标题4</p>', '标题4', '1', '1', '1', null, null, '1560735227', null, '1', '0');
INSERT INTO `tp_news` VALUES ('5', '标题7', '标题7', '6', '/upload/20190617/ce9833b811c1bd64ee590acd408dbc3b.jpeg', '<p>标题7</p>', '标题4', '1', '1', '1', null, null, '1560735230', null, '1', '0');
INSERT INTO `tp_news` VALUES ('6', '标题8', '标题8', '6', '/upload/20190617/ce9833b811c1bd64ee590acd408dbc3b.jpeg', '<p>标题8</p>', '标题4', '1', '1', '1', null, null, '1560735239', null, '1', '0');
INSERT INTO `tp_news` VALUES ('7', '标题9', '标题9', '6', '/upload/20190617/ce9833b811c1bd64ee590acd408dbc3b.jpeg', '<p>标题9</p>', '标题4', '1', '1', '1', null, null, '1560735239', '1560735358', '1', '0');
INSERT INTO `tp_news` VALUES ('8', '标题6', '标题6', '6', '/upload/20190617/ce9833b811c1bd64ee590acd408dbc3b.jpeg', '<p>标题6</p>', '标题4', '1', '1', '1', null, null, '1560735240', '1560737664', '1', '0');
INSERT INTO `tp_news` VALUES ('9', '标题5', '标题5', '3', '/upload/20190617/b0e09816df055d50294d0ca307cd3321.jpeg', '<p>标题5</p>', '标题5', '1', '1', '1', null, null, '1560735279', '1562744413', '1', '0');
INSERT INTO `tp_news` VALUES ('10', '标题10', '标题10', '1', '/upload/20190617/3b41a7f12ccaeb5348b75254aa43feb5.jpeg', '<p><strong>标题10</strong><br/></p>', '标题10', '1', '1', '1', null, null, '1560736056', '1560736056', '1', '0');
INSERT INTO `tp_news` VALUES ('11', '标题11', '标题11', '3', '/upload/20190617/f0be32fc25a6761a6168a39e0697f745.jpeg', '<p>标题11</p>', '标题11', '1', '1', '1', null, null, '1560736087', '1560737645', '-1', '0');
INSERT INTO `tp_news` VALUES ('12', 'adad', 'asdd', '1', '/upload/20190617/73fb82fa638b0e8a5908885ff6aee346.jpeg', '<p>asdadads</p>', 'sdad', null, null, null, null, null, '1560736361', '1560736436', '-1', '0');
INSERT INTO `tp_news` VALUES ('13', '阿萨大大撒旦', 'adsf', '1', '/upload/20190617/f90e9e329746ba0a75b35ba4cd79c394.jpeg', '<p>adfasfdf</p>', 'adfadf', '1', '1', '1', null, null, '1560736543', '1560737399', '1', '0');
INSERT INTO `tp_news` VALUES ('14', 'gsg', 'sdgsdg', '1', '/upload/20190617/526fef6d1a8030d37dee23f1fb7f2d28.jpeg', '<p>sgsgsg</p>', 'sdfgsfdg', '1', '0', '0', null, null, '1560737430', '1560842092', '1', '0');
INSERT INTO `tp_news` VALUES ('15', 'asdasd', 'asdasd', '1', '/upload/20190617/bb4f3ba6dbb81c63b0b18fd5eb886240.jpeg', '<p>asdasd</p>', 'asdasd', '1', '0', '0', null, null, '1560737553', '1560842098', '1', '0');
INSERT INTO `tp_news` VALUES ('16', 'yyy', 'yyy', '1', 'http://pt9uheqjn.bkt.clouddn.com/2019/06/60c97201906181132552242.png', '<p>yy</p>', 'yyy', '1', '1', '0', null, null, '1560828785', '1560846419', '-1', '0');
INSERT INTO `tp_news` VALUES ('17', 'asddasdsss', 'dsd', '1', 'http://pt9uheqjn.bkt.clouddn.com/2019/0618/ccc3d201906181135198914.png', '<p>sds</p>', 'sadsd', '1', '1', '0', null, null, '1560828893', '1560846416', '-1', '0');
INSERT INTO `tp_news` VALUES ('18', '34234234', '23434', '1', 'http://pt9uheqjn.bkt.clouddn.com/2019/0618/f5e6c201906181140562554.jpeg', '<p>4234243</p>', '324324', '1', '1', '1', null, null, '1560829260', '1560846409', '1', '0');
INSERT INTO `tp_news` VALUES ('19', '222', '222', '1', 'http://pt9uheqjn.bkt.clouddn.com/2019/0618/cd7aa201906181627228711.jpeg', '<p>222</p>', '222', '1', '1', '1', null, null, '1560846446', '1560848396', '0', '0');
INSERT INTO `tp_news` VALUES ('20', 'fadfd', 'dfsdf', '1', 'http://pt9uheqjn.bkt.clouddn.com/2019/0618/3fb95201906181701132995.jpeg', '<p>sdfsdfsf</p>', 'dsff', '0', '1', '0', null, null, '1560848477', '1562721656', '1', '0');
INSERT INTO `tp_news` VALUES ('21', 'yyy', 'asdasd', '1', 'http://pt9uheqjn.bkt.clouddn.com/2019/0709/ca233201907090833355982.jpg', '<p>asdasdasdasdasd</p>', 'sadsadd', '0', '1', '1', null, null, '1562632421', '1562723239', '0', '0');
INSERT INTO `tp_news` VALUES ('22', '撒大苏打dasd', '撒大苏打的是asdasd', '3', 'http://pt9uheqjn.bkt.clouddn.com/2019/0710/e3bf5201907101127183245.jpeg', '<p data-spm-anchor-id=\"0.0.0.i0\" style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\"><strong>央视网消息</strong>（新闻联播）：中央和国家机关党的建设工作会议7月9日在北京召开。中共中央总书记、国家主席、中央军委主席习近平出席会议并发表重要讲话。他强调，新形势下，中央和国家机关要以党的政治建设为统领，着力深化理论武装，着力夯实基层基础，着力推进正风肃纪，全面提高中央和国家机关党的建设质量，在深入学习贯彻党的思想理论上作表率，在始终同党中央保持高度一致上作表率，在坚决贯彻落实党中央各项决策部署上作表率，建设让党中央放心、让人民群众满意的模范机关。</p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255); text-align: center;\"><img src=\"/ueditor/php/upload/image/20190710/1562728954.jpg\" alt=\"  　　7月9日，中央和国家机关党的建设工作会议在北京召开。中共中央总书记、国家主席、中央军委主席习近平出席会议并发表重要讲话。 新华社记者 鞠鹏 摄\" isflag=\"1\" style=\"margin: 0px; padding: 0px; border: 0px none;\"/></p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　<span style=\"color: rgb(153, 153, 153);\">7月9日，中央和国家机关党的建设工作会议在北京召开。中共中央总书记、国家主席、中央军委主席习近平出席会议并发表重要讲话。 新华社记者 鞠鹏 摄</span></p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　中共中央政治局常委、中央书记处书记王沪宁主持会议，中共中央政治局常委、中央纪律检查委员会书记赵乐际，中共中央政治局常委、国务院副总理韩正出席会议。</p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　习近平在讲话中指出，中央和国家机关党的建设必须走在前、作表率，这是由中央和国家机关的地位和作用决定的。中央和国家机关离党中央最近，服务党中央最直接，对机关党建乃至其他领域党建具有重要风向标作用。深化全面从严治党、进行自我革命，必须从中央和国家机关严起、从机关党建抓起。</p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　习近平强调，党的十八大以来，中央和国家机关党的建设取得了显著成绩，积累了重要经验。实践证明，做好中央和国家机关党建工作，只有坚持和加强党的全面领导，坚持党要管党、全面从严治党，以党的政治建设为统领，才能永葆中央和国家机关作为政治机关的鲜明本色；只有坚持以新时代中国特色社会主义思想为指导，高举思想旗帜、强化理论武装，机关党建工作才能始终确保正确方向；只有围绕中心、建设队伍、服务群众，推动党建和业务深度融合，机关党建工作才能找准定位；只有持之以恒抓基层、打基础，发挥基层党组织战斗堡垒作用和党员先锋模范作用，机关党建工作才能落地生根；只有与时俱进、改革创新，勇于探索实践、善于总结经验，机关党建工作才能不断提高质量、充满活力；只有全面落实党建责任制，坚持党组（党委）班子带头、以上率下、以机关带系统，机关党建工作才能形成强大合力。</p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　习近平指出，带头做到“两个维护”，是加强中央和国家机关党的建设的首要任务。中央和国家机关广大党员、干部特别是党员领导干部、一把手做工作要首先自觉同党的基本理论、基本路线、基本方略对标对表，同党中央决策部署对标对表，提高政治站位，把准政治方向，坚定政治立场，明确政治态度，严守政治纪律，经常校正偏差，做到党中央提倡的坚决响应、党中央决定的坚决照办、党中央禁止的坚决杜绝。要把“两个维护”体现在坚决贯彻党中央决策部署的行动上，体现在履职尽责、做好本职工作的实效上，体现在党员、干部的日常言行上。要大力加强对党忠诚教育，学习宣传先进典型，引导党员、干部见贤思齐，把对党忠诚纳入家庭家教家风建设。带头做到“两个维护”，既要体现高度的理性认同、情感认同，又要有坚决的维护定力和能力。</p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　习近平强调，中央和国家机关要走在理论学习的前列，提高学习教育针对性和实效性，在学懂弄通做实上当好示范，自觉主动学，及时跟进学，联系实际学，笃信笃行学，学出坚定信仰、学出使命担当，学以致用、身体力行，把学习成果落实到干好本职工作、推动事业发展上。要在青年干部中开展强化政治理论、增强政治定力、提高政治能力、防范政治风险专题培训，创造条件让干部在斗争实践中经风雨、见世面、长才干、壮筋骨。</p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　习近平指出，中央和国家机关要树立大抓基层的鲜明导向，以提升组织力为重点，锻造坚强有力的机关基层党组织。要抓两头带中间，推动后进赶先进、中间争先进、先进更前进，实现基层党组织全面进步、全面过硬。要严格党员教育管理监督，落实好“三会一课”等制度，使每名党员都成为一面鲜红的旗帜，每个支部都成为党旗高高飘扬的战斗堡垒。要加强分类指导，科学精准施策，增强机关党建工作的针对性和有效性。</p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　习近平强调，中央和国家机关要持之以恒正风肃纪，带头弘扬党的光荣传统和优良作风，建设风清气正的政治机关，让群众切身感受到新变化新气象。要持续深化纠“四风”工作，坚决克服形式主义、官僚主义。要大力弘扬密切联系群众的优良作风，深入基层一线，增强同人民群众的感情，学会做群众工作的方法，从基层实践找到解决问题的金钥匙。要坚持严字当头，把纪律挺在前面，深化运用监督执纪“四种形态”，抓好纪律教育、政德教育、家风教育，加强对党员、干部全方位的管理监督，一体推进不敢腐、不能腐、不想腐。</p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　习近平指出，必须正确处理干净和担当的关系，决不能把反腐败当成不担当、不作为的借口。要把干净和担当、勤政和廉政统一起来，勇于挑重担子、啃硬骨头、接烫手山芋。要践行新时代好干部标准，不做政治麻木、办事糊涂的昏官，不做饱食终日、无所用心的懒官，不做推诿扯皮、不思进取的庸官，不做以权谋私、蜕化变质的贪官。</p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　习近平强调，提高中央和国家机关党的建设质量，必须深入分析和准确把握特点和规律。要处理好共性和个性的关系，善于把全面从严治党理论转化为推动机关党建的思路和举措，重视总结提炼机关党建实践中的创新经验，不断上升为规律性认识，使其能够长久发挥作用。要处理好党建和业务的关系，坚持党建工作和业务工作一起谋划、一起部署、一起落实、一起检查。要处理好目标引领和问题导向的关系，既要以目标为着眼点，在统筹谋划、顶层设计上下功夫；又要以问题为着力点，在补短板、强弱项上持续用力。要处理好建章立制和落地见效的关系，制度制定很重要，制度执行更重要，要带头学习、遵守、执行党章党规，从基本制度严起、从日常规范抓起。要处理好继承和创新的关系，推进理念思路创新、方式手段创新、基层工作创新，创造性开展工作。</p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　习近平指出，加强和改进中央和国家机关党的建设，必须切实加强党的领导，牵住责任制这个“牛鼻子”。各部门党组（党委）要强化抓机关党建是本职、不抓机关党建是失职、抓不好机关党建是渎职的理念，坚持“书记抓、抓书记”，领导班子成员和各级领导干部要履行“一岗双责”，做到明责、履责、尽责。机关党委要聚焦主责主业，真正发挥职能作用。中央各有关部门要各负其责、密切配合，形成抓机关党建工作的合力。中央和国家机关工委要强化责任担当，履行好统一领导中央和国家机关党的工作的职责，指导督促各部门党组（党委）落实机关党建主体责任。要建设高素质专业化的党务干部队伍，把党务干部培养成为政治上的明白人、党建工作的内行人、干部职工的贴心人。</p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　王沪宁在主持会议时表示，习近平总书记发表的重要讲话，精辟论述了加强和改进中央和国家机关党的建设的重大意义，深刻阐明了新形势下中央和国家机关党的建设的使命任务、重点工作、关键举措，对加强和改进中央和国家机关党的建设作出全面部署。我们要认真学习贯彻习近平总书记重要讲话精神，以习近平新时代中国特色社会主义思想为指导，增强“四个意识”，坚定“四个自信”，做到“两个维护”，全力以赴抓好各项工作落实，全面提高中央和国家机关党的建设质量和水平。</p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　中共中央政治局委员、中央和国家机关工委书记丁薛祥在总结讲话中表示，习近平总书记的重要讲话为推动中央和国家机关党的建设高质量发展指明了努力方向、提供了根本遵循。要自觉用习近平总书记重要讲话精神统一思想和行动，着力推动中央和国家机关党的建设各项部署落实落地，不断开创中央和国家机关党的建设新局面。</p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　部分中共中央政治局委员，中央书记处书记，全国人大常委会、国务院有关领导同志，最高人民法院院长，最高人民检察院检察长，全国政协有关领导同志出席会议。</p><p style=\"margin-top: 28px; margin-bottom: 28px; padding: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; line-height: 1.75em; font-family: Arial, &quot;microsoft yahei&quot;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">　　中央党的建设工作领导小组成员，中央和国家机关各部门、有关金融机构、国有大型企业负责同志等参加会议。</p><p><br/></p>', '撒旦', '0', '0', '0', null, null, '1562723314', '1562737398', '1', '0');
INSERT INTO `tp_news` VALUES ('23', '撒大苏打cxvcxv', 'czxvzcx', '1', 'http://pt9uheqjn.bkt.clouddn.com/2019/0710/84f03201907101350046470.png', '<p>cxvcxvxcv</p>', 'xcvcxvxcv', '0', '0', '0', null, null, '1562737808', '1562737808', '0', '0');
INSERT INTO `tp_news` VALUES ('24', 'asdsad', 'asdasd', '1', 'http://pt9uheqjn.bkt.clouddn.com/2019/0710/a2376201907101352103708.jpg', '<p>asdasdasdasd</p>', 'asdasdasdas', '1', '1', '1', null, null, '1562737937', '1562737960', '0', '0');
INSERT INTO `tp_news` VALUES ('25', 'asdsadasdasssss', 'sadsad', '1', 'http://pt9uheqjn.bkt.clouddn.com/2019/0710/65be1201907101353019922.jpeg', '<p>asdasdasdasdasd</p>', 'asdsadasd', '1', '1', '1', null, null, '1562737989', '1562744851', '1', '0');
INSERT INTO `tp_news` VALUES ('26', 'wwwqeer', 'werewr', '1', 'http://pt9uheqjn.bkt.clouddn.com/2019/0710/f6257201907101418195427.jpeg', '<p>ewrewrewrew</p>', 'werewr', '1', '1', '1', null, null, '1562739505', '1562739505', '0', '0');
INSERT INTO `tp_news` VALUES ('27', '甘肃省第三节大学生王者荣耀联赛第三赛区复赛将在兰州大学体育馆举行', '是飒飒', '1', 'http://pt9uheqjn.bkt.clouddn.com/2019/0710/edbc9201907101423309457.jpeg', '<p>阿三大苏打</p>', '撒旦撒旦', '1', '1', '1', null, null, '1562739816', '1562744847', '1', '0');
INSERT INTO `tp_news` VALUES ('28', '42342333', '324234', '6', 'http://pt9uheqjn.bkt.clouddn.com/2019/0710/6da70201907101430047332.jpeg', '<p>234234234243</p>', '23443324', '1', '1', '1', null, null, '1562740211', '1562740211', '0', '0');
INSERT INTO `tp_news` VALUES ('29', 'eywtqrubj', 'fhakjdhfu', '5', 'http://pt9uheqjn.bkt.clouddn.com/2019/0710/a9db9201907101432145501.jpg', '<p>sdfsdfsdfsdf</p>', 'sfsdfsdf', '1', '1', '1', null, null, '1562740340', '1562744843', '1', '0');
INSERT INTO `tp_news` VALUES ('30', 'gsfgsfg', 'dfgsg', '2', 'http://pt9uheqjn.bkt.clouddn.com/2019/0710/098b7201907101434102579.png', '<p>sgsgsgsgsg</p>', 'sgsgsg', '1', '1', '1', null, null, '1562740458', '1562744686', '0', '0');
INSERT INTO `tp_news` VALUES ('31', 'gfdgfgfd', 'fgdfg', '1', 'http://pt9uheqjn.bkt.clouddn.com/2019/0710/1809b201907101444031034.jpg', '<p>fdfdgdfgfg</p>', 'fgfg', '1', '1', '1', null, null, '1562741053', '1562744856', '1', '0');
INSERT INTO `tp_news` VALUES ('32', 'dfdsfdsss', 'dfdsf', '1', 'http://pt9uheqjn.bkt.clouddn.com/2019/0710/a7a7c201907101446351621.jpg', '<p>sdfdsfdsffdss</p>', 'dsfdsf', '1', '1', '1', null, null, '1562741203', '1562743965', '-1', '0');
INSERT INTO `tp_news` VALUES ('33', 'fgfdghhgdhg', 'dghdh', '3', 'http://putg61ymr.bkt.clouddn.com/2019/0718/385c0201907181533181983.png', '<p><iframe src=\"https://www.runoob.com/jquery/jquery-plugin-validate.html\" width=\"1000\" height=\"1000\" scrolling=\"yes\" frameborder=\"1\" align=\"left\"></iframe>dhdhgdhdh</p>', 'dghdgh', '1', '1', '1', null, null, '1562741454', '1563435259', '0', '0');
INSERT INTO `tp_news` VALUES ('34', 'zxcvzv', 'zvzvc', '1', 'http://putg61ymr.bkt.clouddn.com/2019/0718/69ce8201907181531433728.png', '<p><img width=\"530\" height=\"340\" src=\"http://api.map.baidu.com/staticimage?center=103.788844,36.07398&zoom=16&width=530&height=340&markers=116.404,39.915\"/>zcvzcvzvc</p>', 'zcvzv', '1', '1', '1', null, null, '1562741628', '1563435178', '1', '0');
INSERT INTO `tp_news` VALUES ('35', 'oiyo', 'yoiyio', '5', 'http://pt9uheqjn.bkt.clouddn.com/2019/0710/085ac201907101509199189.jpg', '<p>yioyoyoi</p>', '', '1', '1', '1', null, null, '1562742565', '1562743958', '-1', '0');
INSERT INTO `tp_news` VALUES ('36', 'dasd', 'dasdasdd', '1', 'http://putg61ymr.bkt.clouddn.com/2019/0718/e6e58201907181531028544.jpg', '<p>大萨达大所多</p>', '', '1', '1', '1', null, null, '1562896194', '1563435082', '1', '0');
INSERT INTO `tp_news` VALUES ('37', '发生过监考老师规划', '李经理开发公司监考老师梵蒂冈', '1', 'http://putg61ymr.bkt.clouddn.com/2019/0718/fc373201907181055385777.png', '<p>undefined</p>', '', '1', '1', '1', null, null, '1563418237', '1563434862', '1', '0');
INSERT INTO `tp_news` VALUES ('38', '奥术大师多撒大声地撒多', '奥术大师多', '1', 'http://putg61ymr.bkt.clouddn.com/2019/0718/e77b2201907181439342241.png', '<p>奥术大师大所多撒大所多</p>', '', '1', '1', '1', null, null, '1563431982', '1563434858', '1', '0');
INSERT INTO `tp_news` VALUES ('39', '萨达所大多所', '阿萨德', '1', '', '<p>阿斯顿撒大声道撒多</p>', '', '1', '1', '1', null, null, '1563434078', '1563434454', '-1', '0');
INSERT INTO `tp_news` VALUES ('40', '萨顶顶', '阿斯达四大', '1', 'http://putg61ymr.bkt.clouddn.com/2019/0718/ca0ea201907181517381875.jpeg', '<p>阿斯达四大所大所多</p>', '', '1', '1', '1', null, null, '1563434263', '1563434450', '-1', '0');

-- ----------------------------
-- Table structure for tp_role
-- ----------------------------
DROP TABLE IF EXISTS `tp_role`;
CREATE TABLE `tp_role` (
  `role_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT '',
  `desc` varchar(255) DEFAULT NULL,
  `menu_id` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_role
-- ----------------------------
INSERT INTO `tp_role` VALUES ('1', '超级管理员', '超级管理员', '13,14,32,33,34,35,55,56,59,16,17,36,37,38,39,18,19,40,41,42,57,21,22,43,44,45,23,46,47,48,31,49,50,51,52,53,54', '1563435015');
INSERT INTO `tp_role` VALUES ('6', '新闻资讯管理员', '负责对新闻资讯板块的维护工作', '13,14,32,33,34,35', '1563434974');

-- ----------------------------
-- Table structure for tp_user
-- ----------------------------
DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE `tp_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(64) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(120) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `user_logo` varchar(255) DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `last_login_time` varchar(100) DEFAULT '',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `rective` tinyint(2) DEFAULT NULL,
  `user_browser` varchar(255) DEFAULT NULL,
  `user_system` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_user
-- ----------------------------
INSERT INTO `tp_user` VALUES ('1', 'weihailong', '123213123', '1085550637@qq.com', '15294182360', '33', 'http://putg61ymr.bkt.clouddn.com/2019/0718/9ae08201907181138455838.jpeg', '127.0.0.1', '1560735358', '1560735358', '1560735358', '1', '1', null, 'Linux');
INSERT INTO `tp_user` VALUES ('2', '魏海龙', '1002d9d50400e9220b2e90eea3b397b7', '15294182360@163.com', '15294182360', '42', 'http://putg61ymr.bkt.clouddn.com/2019/0718/9ae08201907181138455838.jpeg', '127.0.0.1', '1563421996', '1563421996', '1563421996', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'Windows');
INSERT INTO `tp_user` VALUES ('3', '魏海龙', '1002d9d50400e9220b2e90eea3b397b7', '15294182360@163.com', '15294182360', '18', 'http://putg61ymr.bkt.clouddn.com/2019/0718/9ae08201907181138455838.jpeg', '127.0.0.1', '1563421948', '1563421948', '1563421948', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'Windows');
INSERT INTO `tp_user` VALUES ('4', 'zhangwuji', '721356e61beb10a9a12d928347a8afa3', '15294182360@163.com', '15294182360', '22', 'http://putg61ymr.bkt.clouddn.com/2019/0718/9ae08201907181138455838.jpeg', '127.0.0.1', '1562831645', '1562831645', '1562831645', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'Linux');
INSERT INTO `tp_user` VALUES ('5', 'zhangwuji', '721356e61beb10a9a12d928347a8afa3', '15294182360@163.com', '15294182360', '43', 'http://putg61ymr.bkt.clouddn.com/2019/0718/9ae08201907181138455838.jpeg', '127.0.0.1', '1562831645', '1562831645', '1562831645', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'Linux');
INSERT INTO `tp_user` VALUES ('6', 'fdaf', '721356e61beb10a9a12d928347a8afa3', '15294182360@163.com', '15294182360', '22', 'http://putg61ymr.bkt.clouddn.com/2019/0718/9ae08201907181138455838.jpeg', '127.0.0.1', '1562832184', '1562832184', '1562832185', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'Mac');
INSERT INTO `tp_user` VALUES ('7', 'fasdfafdaf', '721356e61beb10a9a12d928347a8afa3', 'fasff', 'afafaf', '66', 'http://putg61ymr.bkt.clouddn.com/2019/0718/9ae08201907181138455838.jpeg', '127.0.0.1', '1562832355', '1562832355', '1562832355', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'Mac');
INSERT INTO `tp_user` VALUES ('8', 'gsfgsg', '721356e61beb10a9a12d928347a8afa3', '15294182360@163.com', '15222', '52', 'http://putg61ymr.bkt.clouddn.com/2019/0718/9ae08201907181138455838.jpeg', '127.0.0.1', '1562832519', '1562832519', '1562832519', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'Mac');
INSERT INTO `tp_user` VALUES ('9', '咖啡空间和', '721356e61beb10a9a12d928347a8afa3', '15294182360@163.com', '15294182360', '22', 'http://putg61ymr.bkt.clouddn.com/2019/0718/9ae08201907181138455838.jpeg', '127.0.0.1', '1562832580', '1562832580', '1562832580', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 'Windows');
INSERT INTO `tp_user` VALUES ('10', '张无忌', '$2y$10$ZJZ4Agg2vx4ppGN2DSB0q.H742PI7dyuagPdnDVM2g/nPD8avf8xC', '15294182360@163.com', '15294182360', '33', 'http://putg61ymr.bkt.clouddn.com/2019/0718/9ae08201907181138455838.jpeg', '127.0.0.1', '1563421154', '1563421154', '1563421154', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'Windows');
INSERT INTO `tp_user` VALUES ('11', '5', '$2y$10$gMGMK7px1Z/g6XAPgG8eGurbIDyVntZqUq5O/o2A/pQ.6E1NNPD02', '5', '5', '25', 'http://putg61ymr.bkt.clouddn.com/2019/0718/9ae08201907181138455838.jpeg', '127.0.0.1', '1563421139', '1563421139', '1563421139', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'Windows');
INSERT INTO `tp_user` VALUES ('12', '34', '$2y$10$9EFNPJyYBIf0s8O5nJ4/D.48tvzJqpJjvK6sWJSmZhUPPHa8cvvvy', '34', '34', '34', 'http://putg61ymr.bkt.clouddn.com/2019/0718/9ae08201907181138455838.jpeg', '127.0.0.1', '1563421128', '1563421128', '1563421128', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'Windows');
INSERT INTO `tp_user` VALUES ('13', '魏海龙', '$2y$10$nAobsQd0R/2cOJoJwIf.DuEBI7898/9Z9Dz5bdbelya98r1uGtEny', '15294182360@163.com', '15294182360', '22', 'http://putg61ymr.bkt.clouddn.com/2019/0718/af525201907181138315025.png', '127.0.0.1', '1563421114', '1563421114', '1563421114', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'Windows');
INSERT INTO `tp_user` VALUES ('14', 'hjdklfhj', '721356e61beb10a9a12d928347a8afa3', '1200222@qq.com', '15294788541', '22', 'http://putg61ymr.bkt.clouddn.com/2019/0718/11d7f2019071810575578.jpg', '127.0.0.1', '2019-07-18 10:58:11', '1563418691', '1563418691', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'Windows');
INSERT INTO `tp_user` VALUES ('15', '魏海龙', '721356e61beb10a9a12d928347a8afa3', '111', '3333', '222', 'http://putg61ymr.bkt.clouddn.com/2019/0718/7a726201907181452032510.png', '127.0.0.1', '2019-07-18 14:52:08', '1563432728', '1563432728', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'Windows');
INSERT INTO `tp_user` VALUES ('16', '魏海龙', '721356e61beb10a9a12d928347a8afa3', '15294182360@163.com', '15294182360', '222', 'http://putg61ymr.bkt.clouddn.com/2019/0718/84d1d201907181459144687.png', '127.0.0.1', '2019-07-18 14:59:17', '1563433157', '1563433157', '1', null, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', 'Windows');
