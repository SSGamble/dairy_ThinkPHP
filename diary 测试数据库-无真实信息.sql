/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : diary

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2019-02-14 11:21:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin 密码：111
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'caption', '698d51a19d8a121ce581499d7b701668');

-- ----------------------------
-- Table structure for `config`
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('1', 'hide', '0', '是否隐藏标题');

-- ----------------------------
-- Table structure for `dailylist`
-- ----------------------------
DROP TABLE IF EXISTS `dailylist`;
CREATE TABLE `dailylist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '无标题',
  `content` text,
  `location` varchar(255) DEFAULT '年代久远',
  `date` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dailylist
-- ----------------------------
INSERT INTO `dailylist` VALUES ('82', '《海街日记》', '# 《海街日记》\n>临海的古都镰仓，四季移动变化的光影，火车经过小镇，梅雨落在石阶上，樱花盛雪，仲夏烟火，细海沙滩。\n梅子酒、沙丁鱼、炸鱼定食、小鱼面包.....\n家里的柱子上还留着刻画你成长的身高标记，在烟火红光映照着青春明媚的脸庞，乘着单车飞快行经樱花隧道时你的笑颜。\n还有那个小镇日积月累的“生活点滴”串起来的故事 。\n流光如诗，岁月如歌，温柔隽永，平淡静好。\n\n1. 日子一天天过去，生活一天天继续。\n\n1. 食物是最牢固的生理记忆，映照的却是四姐妹的童年时光，哪位长辈是最亲密的陪伴。父母的饮食习惯原来是我们除了血脉之外，埋置在味蕾处的情感联系。\n\n1. 如果在告别这个世界的时候，还能有感受美好的能力，那也是一件美好的事情吧。\n\n*豆瓣影评*', '学校', '2017-12-19', '1513729421');

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `groups` varchar(255) DEFAULT '默认',
  `g_count` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', '0', 'Default', '4');
INSERT INTO `groups` VALUES ('2', '0', 'CS', '0');
INSERT INTO `groups` VALUES ('3', '0', 'Think', '0');
INSERT INTO `groups` VALUES ('5', '2', 'C#', '0');
INSERT INTO `groups` VALUES ('6', '2', 'Java', '1');
INSERT INTO `groups` VALUES ('7', '2', 'Linux', '1');
INSERT INTO `groups` VALUES ('10', '2', 'DesignPattern', '0');
INSERT INTO `groups` VALUES ('11', '2', 'DataBase', '0');
INSERT INTO `groups` VALUES ('12', '2', 'Internet', '0');
INSERT INTO `groups` VALUES ('13', '2', 'Basics', '0');
INSERT INTO `groups` VALUES ('14', '2', 'Android', '0');
INSERT INTO `groups` VALUES ('15', '2', 'PHP', '0');
INSERT INTO `groups` VALUES ('17', '2', 'WebFront-end', '0');
INSERT INTO `groups` VALUES ('20', '0', 'FilmReview', '1');
INSERT INTO `groups` VALUES ('21', '0', 'BookReview', '0');
INSERT INTO `groups` VALUES ('22', '0', 'Personal', '0');
INSERT INTO `groups` VALUES ('23', '0', 'English', '0');
INSERT INTO `groups` VALUES ('24', '0', 'Essays', '0');
INSERT INTO `groups` VALUES ('25', '2', 'Python', '0');
INSERT INTO `groups` VALUES ('26', '2', 'OpenCV', '0');
INSERT INTO `groups` VALUES ('27', '2', 'Algorithm', '0');

-- ----------------------------
-- Table structure for `link`
-- ----------------------------
DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `key` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of link
-- ----------------------------
INSERT INTO `link` VALUES ('1', '百度', 'https://www.baidu.com/', '搜索引擎', '0');
INSERT INTO `link` VALUES ('2', '电影天堂', 'http://www.dy2018.com/', '影视资源', '1');
INSERT INTO `link` VALUES ('3', '疯狂搜索', 'http://ifkdy.com/', '影视资源', '1');
INSERT INTO `link` VALUES ('4', 'B站', 'https://www.bilibili.com/', '影视资源', '1');
INSERT INTO `link` VALUES ('5', '简书', 'https://www.jianshu.com/', '博客', '1');
INSERT INTO `link` VALUES ('6', 'CSDN', 'https://www.csdn.net/', '程序员', '0');
INSERT INTO `link` VALUES ('7', '知乎', 'https://www.zhihu.com/', '博客', '1');
INSERT INTO `link` VALUES ('8', 'Git', 'https://github.com/SSGamble', '程序员', '1');
INSERT INTO `link` VALUES ('9', '豆瓣', 'https://www.douban.com/', '博客', '1');
INSERT INTO `link` VALUES ('10', '7头条', 'https://toutiao.io/posts/hot/7', '程序员', '1');
INSERT INTO `link` VALUES ('11', '程序员', 'http://code.giffox.com/', '程序员', '1');

-- ----------------------------
-- Table structure for `note`
-- ----------------------------
DROP TABLE IF EXISTS `note`;
CREATE TABLE `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `content` text,
  `date` varchar(255) DEFAULT '',
  `groups` varchar(255) DEFAULT '默认',
  `p_id` int(11) DEFAULT '1',
  `is_show` int(11) DEFAULT '0' COMMENT '是否在首页显示',
  `publish` int(11) DEFAULT '0',
  `gmt_modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=299 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of note
-- ----------------------------
INSERT INTO `note` VALUES ('1', 'Mysql 保留字和数据类型范围', null, '# Mysql 保留字和数据类型范围\n[TOC]\n## 保留字\n||||\n|-|-|-|\n|ADD|ALL|ALTER|\n|ANALYZE|AND|AS|\n|ASC|ASENSITIVE|BEFORE|\n|BETWEEN|BIGINT|BINARY|\n|BLOB|BOTH|BY|\n|CALL|CASCADE|CASE|\n|CHANGE|CHAR|CHARACTER|\n|CHECK|COLLATE|COLUMN|\n|CONDITION|CONNECTION|CONSTRAINT|\n|CONTINUE|CONVERT|CREATE|\n|CROSS|CURRENT_DATE|CURRENT_TIME|\n|CURRENT_TIMESTAMP|CURRENT_USER|CURSOR|\n|DATABASE|DATABASES|DAY_HOUR|\n|DAY_MICROSECOND|DAY_MINUTE|DAY_SECOND|\n|DEC|DECIMAL|DECLARE|\n|DEFAULT|DELAYED|DELETE|\n|DESC|DESCRIBE|DETERMINISTIC|\n|DISTINCT|DISTINCTROW|DIV|\n|DOUBLE|DROP|DUAL|\n|EACH|ELSE|ELSEIF|\n|ENCLOSED|ESCAPED|EXISTS|\n|EXIT|EXPLAIN|FALSE|\n|FETCH|FLOAT|FLOAT4|\n|FLOAT8|FOR|FORCE|\n|FOREIGN|FROM|FULLTEXT|\n|GOTO|GRANT|GROUP|\n|HAVING|HIGH_PRIORITY|HOUR_MICROSECOND|\n|HOUR_MINUTE|HOUR_SECOND|IF|\n|IGNORE|IN|INDEX|\n|INFILE|INNER|INOUT|\n|INSENSITIVE|INSERT|INT|\n|INT1|INT2|INT3|\n|INT4|INT8|INTEGER|\n|INTERVAL|INTO|IS|\n|ITERATE|JOIN|KEY|\n|KEYS|KILL|LABEL|\n|LEADING|LEAVE|LEFT|\n|LIKE|LIMIT|LINEAR|\n|LINES|LOAD|LOCALTIME|\n|LOCALTIMESTAMP|LOCK|LONG|\n|LONGBLOB|LONGTEXT|LOOP|\n|LOW_PRIORITY|MATCH|MEDIUMBLOB|\n|MEDIUMINT|MEDIUMTEXT|MIDDLEINT|\n|MINUTE_MICROSECOND|MINUTE_SECOND|MOD|\n|MODIFIES|NATURAL|NOT|\n|NO_WRITE_TO_BINLOG|NULL|NUMERIC|\n|ON|OPTIMIZE|OPTION|\n|OPTIONALLY|OR|ORDER|\n|OUT|OUTER|OUTFILE|\n|PRECISION|PRIMARY|PROCEDURE|\n|PURGE|RAID0|RANGE|\n|READ|READS|REAL|\n|REFERENCES|REGEXP|RELEASE|\n|RENAME|REPEAT|REPLACE|\n|REQUIRE|RESTRICT|RETURN|\n|REVOKE|RIGHT|RLIKE|\n|SCHEMA|SCHEMAS|SECOND_MICROSECOND|\n|SELECT|SENSITIVE|SEPARATOR|\n|SET|SHOW|SMALLINT|\n|SPATIAL|SPECIFIC|SQL|\n|SQLEXCEPTION|SQLSTATE|SQLWARNING|\n|SQL_BIG_RESULT|SQL_CALC_FOUND_ROWS|SQL_SMALL_RESULT|\n|SSL|STARTING|STRAIGHT_JOIN|\n|TABLE|TERMINATED|THEN|\n|TINYBLOB|TINYINT|TINYTEXT|\n|TO|TRAILING|TRIGGER|\n|TRUE|UNDO|UNION|\n|UNIQUE|UNLOCK|UNSIGNED|\n|UPDATE|USAGE|USE|\n|USING|UTC_DATE|UTC_TIME|\n|UTC_TIMESTAMP|VALUES|VARBINARY|\n|VARCHAR|VARCHARACTER|VARYING|\n|WHEN|WHERE|WHILE|\n|WITH|WRITE|X509|\n|XOR|YEAR_MONTH|ZEROFILL|\n## 数据类型范围\n### 数值类型\n|类型|大小|范围（有符号）|范围（无符号）|用途|\n|-|-|\n|TINYINT|1 字节|(-128，127)|(0，255)|小整数值|\n|SMALLINT|2 字节|(-32 768，32 767)|(0，65 535)|大整数值|\n|MEDIUMINT|3 字节|(-8 388 608，8 388 607)|(0，16 777 215)|大整数值|\n|INT 或 INTEGER|4 字节|(-2 147 483 648，2 147 483 647)|(0，4 294 967 295)|大整数值|\n|BIGINT|8 字节|(-9,223,372,036,854,775,808，9 223 372 036 854 775 807)|(0，18 446 744 073 709 551 615)|极大整数值|\n|FLOAT|4 字节|(-3.402 823 466 E+38，-1.175 494 351 E-38)，0，(1.175 494 351 E-38，3.402 823 466 351 E+38)|0，(1.175 494 351 E-38，3.402 823 466 E+38)|单精度,浮点数值|\n|DOUBLE|8 字节|(-1.797 693 134 862 315 7 E+308，-2.225 073 858 507 201 4 E-308)，0，(2.225 073 858 507 201 4 E-308，1.797 693 134 862 315 7 E+308)|0，(2.225 073 858 507 201 4 E-308，1.797 693 134 862 315 7 E+308)|双精度,浮点数值|\n|DECIMAL|对 DECIMAL(M,D) ，如果 M>D，为 M+2 否则为 D+2|依赖于 M 和 D 的值|依赖于 M 和 D 的值|小数值|\n### 字符串类型\n|类型|大小|用途|\n|-|-|\n|CHAR|0-255 字节|定长字符串|\n|VARCHAR|0-65535 字节|变长字符串|\n|TINYBLOB|0-255 字节|不超过 255 个字符的二进制字符串|\n|TINYTEXT|0-255 字节|短文本字符串|\n|BLOB|0-65 535 字节|二进制形式的长文本数据|\n|TEXT|0-65 535 字节|长文本数据|\n|MEDIUMBLOB|0-16 777 215 字节|二进制形式的中等长度文本数据|\n|MEDIUMTEXT|0-16 777 215 字节|中等长度文本数据|\n|LONGBLOB|0-4 294 967 295 字节|二进制形式的极大文本数据|\n|LONGTEXT|0-4 294 967 295 字节|极大文本数据|\n### 日期和时间类型\n|类型|大小,(字节)|范围|格式|用途|\n|-|-|\n|DATE|3|1000-01-01/9999-12-31|YYYY-MM-DD|日期值|\n|TIME|3|\'-838:59:59\'/\'838:59:59\'|HH:MM:SS|时间值或持续时间|\n|YEAR|1|1901/2155|YYYY|年份值|\n|DATETIME|8|1000-01-01 00:00:00/9999-12-31 23:59:59|YYYY-MM-DD HH:MM:SS|混合日期和时间值|\n|TIMESTAMP|4|1970-01-01 00:00:00/2038,结束时间是第 2147483647 秒，北京时间 2038-1-19 11:14:07，格林尼治时间 2038 年 1 月 19 日 凌晨 03:14:07|YYYYMMDD HHMMSS|混合日期和时间值，时间戳|', '0000-00-00', 'Default', '1', '0', '0', '0000-00-00');
INSERT INTO `note` VALUES ('2', 'daily 文档', '', '# daily 文档', '0000-00-00', 'Default', '1', '0', '0', '2019-01-20');
INSERT INTO `note` VALUES ('3', '2019 年大事记', '', '# 2019 年大事记', '0000-00-00', 'Default', '1', '0', '0', '2019-01-01');
INSERT INTO `note` VALUES ('4', '待办事项\r', '', '# 待办事项\r\n## 种草\r\n荒川尚也溪流杯\r\n俞家年糕\r\n\r\n## 书\r\n最后的耍猴人\r\n礼物的流动 - 阎云翔\r\n见识/态度/大学之路 - 吴军\r\n人性的弱点\r\n\r\n\r\n## 未去地\r\n江浙云贵川\r\n', '0000-00-00', 'Default', '1', '0', '0', '0000-00-00');
INSERT INTO `note` VALUES ('295', 'IDEA 使用 Git 管理项目\r', null, '# IDEA 使用 Git 管理项目\r\n在 github.com 创建一个仓库，得到 git 地址\r\n建立本地仓库：菜单 ->VCS->import into Version Control->Create Git Repository->e:\\project\\gitDemo\r\n把项目加入到本地仓库：右键项目 ->Git->Add\r\n提交项目：右键项目 ->Git->Commit Directory，弹窗，在 Commit Message 输入 提交信息， 然后点击 Commit And Push\r\nPush Commit：这里会询问你要提交的哪里去，点击 Define remote, 并输入项目的 url 地址，然后点击 push\r\n修改代码后提交改动：使用快捷键 CTRL + K , 就会弹出提交的界面，点击 Commit and Push 即可\r\n更新：点击快捷键 Ctrl + T ，就会弹出更新的界面，点击 OK 即可', '2019-02-14', 'Java', '2', '0', '0', '2019-02-14');
INSERT INTO `note` VALUES ('296', '置顶显示笔记\r', null, '# 置顶显示笔记\r\n水电费水电费水电费', '2019-02-14', 'Linux', '2', '1', '0', '2019-02-14');
INSERT INTO `note` VALUES ('297', '流浪地球\r', '', '# 流浪地球\r\n水电费水电费', '2019-02-14', 'FilmReview', '20', '0', '1', '2019-02-14');

-- ----------------------------
-- Table structure for `note_del`
-- ----------------------------
DROP TABLE IF EXISTS `note_del`;
CREATE TABLE `note_del` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `groups` varchar(255) DEFAULT '默认',
  `p_id` int(11) DEFAULT '1',
  `date` varchar(255) DEFAULT NULL,
  `is_show` int(11) DEFAULT '0' COMMENT '是否在首页显示',
  `publish` int(11) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `gmt_modified` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=299 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of note_del
-- ----------------------------
INSERT INTO `note_del` VALUES ('298', '测试笔记\r', '# 测试笔记\r\n的范德萨发', 'C#', '2', '2019-02-14', '0', '0', null, '2019-02-14');

-- ----------------------------
-- Table structure for `yearlist`
-- ----------------------------
DROP TABLE IF EXISTS `yearlist`;
CREATE TABLE `yearlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nid` int(11) DEFAULT NULL COMMENT '对应note的id',
  `rank` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yearlist
-- ----------------------------
INSERT INTO `yearlist` VALUES ('1', '49', '1', '驴得水', 'https://img3.doubanio.com/view/photo/l/public/p2393044761.webp', '&nbsp;&nbsp;&nbsp;&nbsp;记得有网友这样评论到：英雄之所以是英雄，是因为那颗子弹没有打偏。</br>&nbsp;&nbsp;&nbsp;&nbsp;另一个网友回复：我相信任何一个英雄在最后一个子弹打中前，都经历了无数擦脸而过的子弹。', '1', '2017');
INSERT INTO `yearlist` VALUES ('2', '45', '2', '我在故宫修文物', 'https://img3.doubanio.com/view/photo/l/public/p2393044761.webp', '传承，美到了极致。', '1', '2017');
INSERT INTO `yearlist` VALUES ('3', '0', '3', '入殓师', 'https://img3.doubanio.com/view/photo/l/public/p2393044761.webp', '入殓师。', '1', '2017');
INSERT INTO `yearlist` VALUES ('4', '43', '4', '亲爱的', 'https://img3.doubanio.com/view/photo/l/public/p2393044761.webp', '亲爱的小孩。', '1', '2017');
INSERT INTO `yearlist` VALUES ('5', '0', '5', '天浴', 'https://img3.doubanio.com/view/photo/l/public/p2393044761.webp', '直面现实的勇气。', '1', '2017');
INSERT INTO `yearlist` VALUES ('6', '46', '6', '月光男孩', 'https://img3.doubanio.com/view/photo/l/public/p2393044761.webp', '只有你才知道对你而言什么才是糟糕的生活，什么才是真正的一塌糊涂，这与旁人的教说，旁人的经验并无关系。', '1', '2017');
INSERT INTO `yearlist` VALUES ('7', '0', '7', '恋慕[...]', 'https://img3.doubanio.com/view/photo/l/public/p2393044761.webp', '大国博弈，承担结果的永远是平民。', '1', '2017');
INSERT INTO `yearlist` VALUES ('8', '76', '1', '活着', 'https://img3.doubanio.com/view/photo/l/public/p2393044761.webp', '&nbsp;&nbsp;&nbsp;&nbsp;时光飞逝，从出生到死亡，这过程中必然会有各种的体验，好的坏的，开心的悲伤的，成功的失败的。希望自己可以照单全收，荣辱不惊。</br>&nbsp;&nbsp;&nbsp;&nbsp;荣辱不惊，闲看庭前花开花落；</br>&nbsp;&nbsp;&nbsp;&nbsp;去留无意，漫随天外云卷云舒。', '2', '2017');
INSERT INTO `yearlist` VALUES ('9', '69', '2', '白夜行', 'https://img3.doubanio.com/view/photo/l/public/p2393044761.webp', '“有一株芽应该在那时就摘掉，因为没摘，芽一天天成长茁壮，长大了还开了花，恶之花。”', '2', '2017');
INSERT INTO `yearlist` VALUES ('10', '119', '3', '巨人的陨落', 'https://img3.doubanio.com/view/photo/l/public/p2393044761.webp', '经历过战场的洗礼，你就很难认真对待人们在和平时期操心的那些琐屑事情。', '2', '2017');
INSERT INTO `yearlist` VALUES ('11', '118', '4', '红岩', 'https://img3.doubanio.com/view/photo/l/public/p2393044761.webp', '斧头劈翻旧世界镰刀开出新乾坤', '2', '2017');
INSERT INTO `yearlist` VALUES ('12', '87', '5', '无声告白', 'https://img3.doubanio.com/view/photo/l/public/p2393044761.webp', '处事敏锐一点，多关注一下周围的人，切记不要将自己的意愿强加给别人。', '2', '2017');
INSERT INTO `yearlist` VALUES ('13', null, '1', '忽如远客行', '', '云泣', '3', '2017');
INSERT INTO `yearlist` VALUES ('14', null, '2', '春风十里', '', '鹿先森乐队', '3', '2017');
INSERT INTO `yearlist` VALUES ('15', null, '3', '我要你', '', '任素汐', '3', '2017');
INSERT INTO `yearlist` VALUES ('16', null, '4', '春夏秋冬的你', '', '王宇良', '3', '2017');
INSERT INTO `yearlist` VALUES ('17', null, '5', '致自己', '', '齐一', '3', '2017');
INSERT INTO `yearlist` VALUES ('18', null, '6', '像我这样的人', '', '毛不易', '3', '2017');
INSERT INTO `yearlist` VALUES ('19', null, '7', '父亲写的散文诗', '', '李健', '3', '2017');
INSERT INTO `yearlist` VALUES ('20', null, '8', '消愁', '', '毛不易', '3', '2017');
INSERT INTO `yearlist` VALUES ('21', null, '9', '桃花诺', '', '邓紫棋', '3', '2017');
INSERT INTO `yearlist` VALUES ('22', null, '10', '定风波', '', '谭晶', '3', '2017');
INSERT INTO `yearlist` VALUES ('23', null, '11', '欲水', '', '小虫', '3', '2017');
INSERT INTO `yearlist` VALUES ('24', null, '12', 'To.Us', '', 'Apink', '3', '2017');
INSERT INTO `yearlist` VALUES ('25', null, '13', '好好睡，晚安', '', 'Twice', '3', '2017');
INSERT INTO `yearlist` VALUES ('26', null, '1', '大事记1', '', '', '4', '2017');
INSERT INTO `yearlist` VALUES ('27', null, '2', '大事记2', '', '', '4', '2017');
INSERT INTO `yearlist` VALUES ('28', null, '3', '大事记3', '', '', '4', '2017');
INSERT INTO `yearlist` VALUES ('29', null, '4', '大事记', '', '', '4', '2017');
INSERT INTO `yearlist` VALUES ('30', null, '5', '大事记', '', '', '4', '2017');

-- ----------------------------
-- Function structure for `getChildLst`
-- ----------------------------
DROP FUNCTION IF EXISTS `getChildLst`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getChildLst`(rootId INT) RETURNS varchar(1000) CHARSET utf8
BEGIN
    DECLARE sTemp VARCHAR(1000);
    DECLARE sTempChd VARCHAR(1000);

    SET sTemp = '$';
    SET sTempChd =cast(rootId as CHAR);

 WHILE sTempChd is not null DO
  SET sTemp = concat(sTemp,',',sTempChd);
  SELECT group_concat(id) INTO sTempChd FROM groups where FIND_IN_SET(parent_it,sTempChd)>0;
 END WHILE;
 RETURN sTemp;
 END
;;
DELIMITER ;
