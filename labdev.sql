# Host: localhost  (Version: 5.5.47)
# Date: 2016-06-08 16:33:42
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "dev_admin"
#

DROP TABLE IF EXISTS `dev_admin`;
CREATE TABLE `dev_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '' COMMENT '账号',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `nickname` varchar(32) DEFAULT NULL COMMENT '姓名',
  `email` varchar(32) DEFAULT NULL COMMENT '邮箱',
  `qq` varchar(32) DEFAULT NULL COMMENT 'QQ号码',
  `phonenum` varchar(32) DEFAULT NULL COMMENT '手机号码',
  `shortnum` varchar(10) DEFAULT NULL COMMENT '校园短号',
  `info` text COMMENT '个人简介',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "dev_admin"
#

INSERT INTO `dev_admin` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e','刘泽许','admin@admin.com','1234567890','18300000000','551','就普通管理员一枚而已，没什么特别的，就这样。');

#
# Structure for table "dev_album"
#

DROP TABLE IF EXISTS `dev_album`;
CREATE TABLE `dev_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dev_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '设备ID',
  `albumPath` varchar(50) NOT NULL DEFAULT '' COMMENT '图片文件',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

#
# Data for table "dev_album"
#

INSERT INTO `dev_album` VALUES (1,1,'1.jpg'),(2,2,'2.jpg'),(3,3,'3.jpg'),(4,4,'4.jpg'),(5,5,'5.jpg'),(6,6,'6.jpg'),(7,7,'7.jpg'),(8,8,'8.jpg'),(9,9,'9.jpg'),(10,10,'10.jpg'),(11,11,'11.jpg'),(12,12,'12.jpg'),(13,13,'13.jpg'),(14,14,'14.jpg'),(15,15,'15.jpg'),(16,16,'16.jpg'),(17,17,'17.jpg'),(18,18,'18.jpg'),(19,19,'19.jpg'),(20,20,'20.jpg'),(21,21,'21.jpg'),(22,22,'22.jpg'),(23,23,'23.jpg'),(24,24,'24.jpg'),(25,25,'7ffdfab642af75bd72b5ede349bd3deb.jpg'),(26,26,'b233d471b555b1b3f496df8728fdbd6a.jpg');

#
# Structure for table "dev_cate"
#

DROP TABLE IF EXISTS `dev_cate`;
CREATE TABLE `dev_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catname` varchar(32) NOT NULL DEFAULT '' COMMENT '分类名称',
  `catdesc` text COMMENT '分类简述',
  PRIMARY KEY (`id`),
  UNIQUE KEY `catname` (`catname`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

#
# Data for table "dev_cate"
#

INSERT INTO `dev_cate` VALUES (1,'电子电工仪器','万用表 示波器 信号发生器 扫频仪 逻辑分析仪 计数器 频率计 电源 电子元器件 各类表'),(2,'教学仪器','物理实验仪器 化工实验装置 生物实验仪器 单片机 计算机实验装置 自动化控制实验装置 实验仪 实验箱 实验软件 半导体冷阱 普教教学仪器  其他教学仪器'),(3,'分析仪器','电化学仪 紫外分析仪 水质分析仪 气体分析仪 热分析仪 光谱仪 色谱仪 其他'),(4,'行业专用仪器设备','试验箱 试验机 实验电炉 研磨混合设备 数控车床 土工仪器 其他专用仪器'),(5,'计量仪器','天平 衡器 量具 其他计量设备'),(6,'实验室成套设备','实验台 储存柜 通排气设备 成套设备'),(7,'试验设备','试验机 试验箱 试验室 其他试验设备'),(8,'计算机产品','PC机、主板、光盘驱动器、外设、接插件、计算机显卡、计算机USB设备、打印机主控板等'),(9,'通信类产品','GSM手机、无线电寻呼系统、卫星通信、卫星定位应用产品、遥控答录电视机、话路终端机、通信、网络线缆、智能化锂电池、冲电器、手机轴、手机镜片、手机外壳、电机马达、驻极体话筒等'),(10,'电子器件产品','SMD片式三级管、二极管、发光二极管，高亮度、白色、兰色、纯绿发光二极管，PDP等离子平面显示屏、IC卡芯片等新型器件等'),(11,'电子元件产品','交流变频电容器、电力电容器、磁头、电位器、新颖传感器、热敏电阻、片状电感、开关、电源变压器、小体积大容量继电器、调谐器、蜂鸣器、会聚磁件等'),(12,'电子材料产品','高磁能积的钕铁硼永磁材料，高光电转换效率的太阳能电池、智能化锂电池，手机电池材料等'),(13,'集成电路','电子铜带、半导体器件引线框架、芯片、单晶硅、半导体器件等');

#
# Structure for table "dev_device"
#

DROP TABLE IF EXISTS `dev_device`;
CREATE TABLE `dev_device` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `devname` varchar(100) NOT NULL DEFAULT '' COMMENT '设备名称',
  `version` varchar(100) NOT NULL DEFAULT '' COMMENT '设备型号',
  `cat_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '分类ID',
  `lab_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '实验室ID',
  `sumnum` varchar(10) NOT NULL DEFAULT '0' COMMENT '总数量',
  `borrownum` varchar(10) NOT NULL DEFAULT '0' COMMENT '借出数量',
  `adduser` varchar(32) NOT NULL DEFAULT '' COMMENT '设备添加人',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `devdesc` text COMMENT '设备简述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

#
# Data for table "dev_device"
#

INSERT INTO `dev_device` VALUES (1,'模拟电路实验装置','KHN1-2',3,1,'16','0','张三',1402306881,'设备设备设备设备设备设备设备设备设备设备设备\r\n\r\n'),(2,'数字电路实验系统','KHD-2',1,6,'16','0','刘六',1402307174,NULL),(3,'高频电路学习机','ZY11RFEC12BE',11,3,'20','0','李四',1402308299,NULL),(4,'超高频毫伏表 ','DA22A',1,9,'20','0','王五',1402309073,'1.测量前应短路调零。打开电源开关，将测试线（也称开路电缆）的红黑夹子夹在一起，将量程旋钮旋到1mv量程，指针应指在零位（有的毫伏表可通过面板上的调零电位器进行调零，凡面板无调零电位器的，内部设置的调零电位器已调好）。若指针不指在零位，应检查测试线是否断路或接触不良，应更换测试线。\r\n2.交流毫伏表灵敏度较高，打开电源后，在较低量程时由于干扰信号（感应信号）的作用，指针会发生偏转，称为自起现象。所以在不测试信号时应将量程旋钮旋到较高量程档，以防打弯指针。\r\n3.交流毫伏表接入被测电路时，其地端（黑夹子）应始终接在电路的地上（成为公共接地），以防干扰。\r\n4.调整信号时，应先将量程旋钮旋到较大量程，改变信号后，再逐渐减小。\r\n5.交流毫伏表表盘刻度分为0—1和0—3两种刻度，量程旋钮切换量程分为逢一量程（1mv、10mv、0.1v……）和逢三量程（3mv、30mv、0.3v……），凡逢一的量程直接在0—1刻度线上读取数据，凡逢三的量程直接在0—3刻度线上读取数据，单位为该量程的单位，无需换算。\r\n6.使用前应先检查量程旋钮与量程标记是否一致，若错位会产生读数错误。\r\n7.交流毫伏表只能用来测量正弦交流信号的有效值，若测量非正弦交流信号要经过换算（具体请参阅《电路与数字逻辑设计实践》第17页）。\r\n8.注意：不可用万用表的交流电压档代替交流毫伏表测量交流电压（万用表内阻较低，用于测量50Hz左右的工频电压）。'),(5,'频率特性测试仪','BT3GIII',9,1,'10','0','张三',1402320900,NULL),(6,'信号与系统实验装置','RXS-2',4,7,'16','0','李四',1402408755,NULL),(7,'信号与系统实验箱','THKSS-D',1,2,'16','0','林九',1402408977,NULL),(8,'EDA技术实验箱','ZYE1502D',2,4,'32','0','张三',1402409224,NULL),(9,'微型电子计算机','启天M4600',12,3,'30','0','吴一',1402410194,NULL),(10,'微机原理与接口技术实验箱','ZY15MicInt12BB',6,5,'32','0','韩十一',1402410284,NULL),(11,'单片机原理实验箱','ZY15MCU12BD',5,8,'32','0','冯二',1402410421,NULL),(12,'自动控制原理实验箱','THKKL-4',1,1,'32','0','张三',1402410421,NULL),(13,'嵌入式高级实验开发系统','EL-ARM-860',7,1,'32','0','刘六',1402410421,NULL),(14,'ARM 11 A8 CPU板','TECHV-3530',9,10,'2','0','李四',1402410421,NULL),(15,'通信系统原理实验装置','THEX-1',1,1,'16','0','王五',1402410567,NULL),(16,'光纤通信实验装置','SGQ—4',8,1,'16','0','张三',1402410567,NULL),(17,'电工技术实验装置','DGJ－2',1,1,'16','0','李四',1402410698,NULL),(18,'电路原理实验箱','KHDL-2',1,1,'20','0','林久',1402410698,NULL),(19,'传感器实验装置','SET998A',1,1,'20','0','吴一',1402410698,NULL),(20,'可编程控制实验室装置','THSMS-A',1,1,'29','0','韩十一',1402410808,NULL),(21,'多功能源表测试仪','U3606A',1,1,'14','0','王五',1402410808,NULL),(22,'数字存储示波器','Tds2012',1,1,'14','0','李四',1402410808,NULL),(23,'绘图仪','EPSON7800',1,1,'1','0','林九',1402410923,NULL),(24,'便携式数字存储示波器','ADS1202CE',1,1,'1','0','韩十一',1402410923,NULL),(25,'低频频率特性测试仪','NW1232',9,9,'1','0','admin',1465102570,'本品适用于电声器件、放大器、检波器及各种有源无源网络幅频 特性的快速测试，对各种滤波器的试试结果更为理想。此外，还可 用 于通讯、生物医学、物理学、结构材料学及科教等领域。'),(26,'半导体特性图示仪','XJ4810',4,6,'2','0','admin',1465103223,'晶体管特性图示仪可用来测定晶体管的共集电极、共基极、共发射极的输入特性、输出特性、转换特性、α、β参数特性；可测定各种反向饱和电流 ICBO、ICEO、IEB0和各种击穿电压 BUCBO、BUCEO、BUEBO等；还可以测定二极管、稳压管、可控硅、隧道二极管、场效应管及数字集成电路的特性，用途广泛。');

#
# Structure for table "dev_lab"
#

DROP TABLE IF EXISTS `dev_lab`;
CREATE TABLE `dev_lab` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `labname` varchar(32) NOT NULL DEFAULT '' COMMENT '实验室名称',
  `labuser` varchar(32) NOT NULL DEFAULT '' COMMENT '实验室负责人',
  `labaddress` char(32) DEFAULT NULL COMMENT '实验室地址',
  `labphone` varchar(32) DEFAULT '' COMMENT '实验室联系电话',
  `labdesc` text COMMENT '实验室简介',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Data for table "dev_lab"
#

INSERT INTO `dev_lab` VALUES (1,'数字电子技术实验室','张四','主教','0668-288888','数字电子技术实验室是一个集理论验证、设计和综合实验为一体的多功能实验室。实验室占地120余平方米，数字电路学习机、示波器、万用表60台套，每年面向全院电子信息工程专业、物理专业、自动化专业和计算机专业近500名学生开设数字电子技术实验课程。从2002年开始，以提高学生设计能力和综合分析问题的能力为目标，并将陆续采取开放式实验教学模式，按不同专业和不同类别学生的教学大纲要求，设置不同的实验项目和实验内容，为学生提供多个选做实验题目，学生可以根据自己的兴趣，选作其中不少于指定数目的实验。经过几年的发展，数字实验室现已形成老中青相结合的实验教学队伍，实验室教师不断进行教学研讨和教学方法改革的同时为学生竞赛提供设备支持。'),(2,'EDA、DSP、数字信号处理实验室','李四','主教','0668-288888','该实验室承担EDA、DSP、数字信号处理课程实验教学任务。EDA实验课程的目的是使学生掌握EDA与数字系统设计、电子线路CAD、面向对象编程课程设计、系统仿真综合实验等实验方法以及设计编程、性能测试等技能。培养学生在EDA与数字系统设计等方向的理论联系实际意识和基本实验技能。DSP实验是电子信息工程等专业的重要专业实验课程，通过实验课程的学习，使学生进一步加深理解与掌握数字信号处理理论课程的基本概念、基本分析方法，理解完整的工程实现方法和流程，有助于拓展学生思路，增强学生独立分析问题和解决问题的能力，增强学生动手操作能力以及综合运用所学知识解决工程实际问题的能力。'),(3,'通信原理实验室','王五','主教','0668-288888','通信原理实验室成立于2008年，主要面向信息工程学院电子信息工程专业学生开设。本实验是通信原理课程的辅助实验。包括常规双边带调幅与解调实验，脉冲幅度调制与解调实验，脉冲编码调制与解调实验，码型变换实验，ASK调制与解调实验，FSK调制与解调实验，PSK（DPSK）调制与解调实验等实验。通过该实验课的基本训练，使学生更好的理解通信系统的整体概念及基本理论，并使学生初步具备通信原理实验基本知识，并且在信号、数字系统、噪声等方面有清晰的理论知识和熟练的计算方法及能力。'),(4,'电工电子实训室','刘六','主教','0668-288888','电工电子实训室于2009年正式投入使用，现有电工技术实训装置11台、表面贴片焊接机2台，线路板制作机1台、双面学习机（1拖5）1套、手动贴片机2台、手动漏板印刷台2台，以及一些电工电子常用仪器工具，总价约34.3万元，占地面积300平方米。服务的对象是电子信息工程、物理学、自动化、机械设计及其自动化等专业的学生。分成电子工艺实训和电工电子实训两大部分，能够完成电路电工基础实验、电子工艺实习、电工电子实习、电子技术课程设计等多种实践课程教学。同时也为学生进行各种电路制作和开发提供方便的平台。通过实训，使学生接受电子工程师的基本焊接训练，使学生的基本配电线路设计、调试的能力得到初步的培养和锻炼，从而促进学生动手能力的提高和学习兴趣的养成。培养初步的工程设计能力和创新意识，以及严谨踏实科学的工作作风和良好的学风，提高解决实际问题的能力和素质，为今后的学习和从事有关的电子技术工作奠定实践基础。'),(5,'模拟电路实验室','高七','主教','0668-288888','模拟电路实验室主要配有模拟电路实验箱和模拟示波器、数字示波器、函数信号发生器、万用表等常用电子测量仪器。实验室主要面向电子信息工程、物理学、自动化、光信息科学与技术、计算机科学与技术等电类相关理工科专业的学生。承担了低频电子线路、模拟电路等课程的实验教学任务，同时这些电子测量仪器能够为电子技术课程设计的项目验收提供方便。通过实验使学生掌握基本实验知识，基本实验方法和基本实验技能，并能综合运用所学理论来解决较为复杂的实际问题的能力，以达到提高学生的素质和科学实验能力的目的。'),(6,'电子测量实验室','林八','主教','0668-288888','配备了函数信号发生器、数字存数示波器、数字交流毫伏表、高精度计数器、高频Q表、数字电压表、频率特性分析仪、逻辑分析仪、虚拟测量平台等电子测量仪器设备。实验室主要服务于电子信息工程专业的《电子测量技术》、《专业课程设计》、毕业设计等课程的实践环节教学。实验室开设项目集理论验证性、设计与综合实验为一体，培养学生掌握现代电子测量技术与设备的使用，使学生较好地掌握电子系统综合测量的方法，提高学生的分析问题、解决问题的能力。'),(7,'电工电路实验室','周九','主教','0668-288888','电工电路实验室是由原电工学实验室(建于1978年)和电路分析实验室合并而成，配置实验仪器22套（每组仪器的配置有：YB4328模拟示波器、QSDL1电路原理实验箱、QS－JD2交流电路实验箱、D34－W低功率因数表、VC890C＋数字万用表、WY 2174A毫伏表等）。实验室主要面向电子信息工程、自动化、光作息科学与技术、物理学、化学工程与工艺、应用化学、制药工程等专业各全校理工科学生开放，承担电路分析基础、电工学、电子电工学的实验教学任务。实验教学内容有电位、电压的测定及电路电位图的绘制、电压源、电流源及其电源等效变换、受控源研究等十六实验项目，目前按照教学大纲的实验开出率为100%。电工电路实验室是我院培养应用型专业技术人材的基本素养、获得实验技能的基本训练、掌握电路的实验方法，提高动手能力和设计能力的重要场所。'),(8,'单片机实验室','赵十','主教','0668-288888','单片机实验室装备的周立功单片机DP-51PRO.NET单片机试验箱是一个集仿真器、编程器、试验仪三合一的综合开发平台，能够实现基本的单片机软硬件实验外。能够承担电子信息、自动化、计算机等专业学生的基础实验以及课程设计任务。通过实验教学环节，使所学知识能得到提炼和巩固，学生硬件电路及程序设计的能力得到系统的训练，最终能够进行基本的项目开发。'),(9,'高频电路实验室','吴一','主教','0668-288888','高频电路实验室隶属信息工程学院实验中心。实验室现有面积约90平方米，仪器设备15台套。是我院培养应用型专业技术人材的基本素养、获得实验技能的基本训练、掌握电路的实验方法，提高动手能力和设计能力的重要场所。本实验是我院为电子信息工程专业开设的专业实验课，与《高频电子线路》理论课紧密结合。主要任务是：培养学生分析问题和解决问题的能力，深化和扩展对高频电子线路理论课程内容的理解；培养学生的动手能力和设计能力，掌握基本的实验方法，获得实验技能的基本训练。通过本实验的训练，学生基本上能够掌握常用仪器的使用、基本测试技能、基本实验技术，分析实验中遇到的问题；培养学生的电路研究能力和实际工作能力，培养学生严肃、认真、端正的实验态度。'),(10,'信号与系统实验室','冯二','主教','0668-288888','信号与系统实验室主要实验教学设备包括信号与系统实验箱25套、双踪示波器25台、信号发生器25台。信号与系统实验是为巩固和加深对信号与系统基础理论和基本概念的理解，培养学生分析问题和解决问题的能力；同时使抽象的概念和理论形象化、具体化，从而提高学生的学习兴趣而开设的一门实验课程。通过实验箱可进行阶跃响应与冲激响应的时域分析；信号的分解与合成的分析；抽样定理和信号恢复分析与研究；连续时间系统的模拟等内容的学习与研究。通过该课程的训练，培养了学生的独立工作能力和实际动手能力，同时有助于学生将所学的理论知识和实践相结合。除了完成规定的课程实验外，该实验室还可以承担综合课程设计以及毕业设计的实验任务。 '),(11,'电视原理实验室','韩十一','主教','0668-288888','电视原理实验室课程的任务是使学生掌握电视信号的产生、加工处理、传送和接收处理的基本方法和工作机理，了解电视信号传输系统的基本组成。相关课程：电路分析基础、电子技术基础等。黑白电视机的线路连接和调试，实验内容有：整机测试点波形检测；高频调谐器及扫频测试；公共信号通道电路及扫频测试；视频放大及显象管电路；行场扫描电路；彩色电视机的三基色原理与色度信号测试分析；彩色电视机的测试点波形观测和故障演示分析。');

#
# Structure for table "dev_record"
#

DROP TABLE IF EXISTS `dev_record`;
CREATE TABLE `dev_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dev_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '设备ID',
  `recordname` varchar(32) NOT NULL DEFAULT '0' COMMENT '申请人用户名',
  `recordnickname` varchar(32) NOT NULL DEFAULT '' COMMENT '申请人姓名',
  `dev_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '借用设备数量',
  `borrow_time` varchar(10) NOT NULL DEFAULT '0' COMMENT '申请时间',
  `remand_time` varchar(10) NOT NULL DEFAULT '0' COMMENT '归还时间',
  `turn_remand_time` varchar(10) DEFAULT NULL COMMENT '真实归还时间',
  `recorddesc` text COMMENT '记录描述',
  `recordstatus` varchar(10) DEFAULT NULL COMMENT '记录状态',
  `recordaddtime` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "dev_record"
#

INSERT INTO `dev_record` VALUES (2,1,'admin','刘泽许',10,'2016-06-06','2016-06-16',NULL,'用于实验室教学','未审核','1465206498'),(3,3,'admin','刘泽许',11,'2016-06-08','2016-06-17',NULL,'用于实验教学','未审核','1465316225');

#
# Structure for table "dev_role"
#

DROP TABLE IF EXISTS `dev_role`;
CREATE TABLE `dev_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rolename` varchar(32) NOT NULL DEFAULT '' COMMENT '身份名称',
  `record_audit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '借用审核权限',
  `lab_audit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '实验室管理权限',
  `dev_audit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '设备管理权限',
  `user_audit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户管理权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "dev_role"
#

INSERT INTO `dev_role` VALUES (1,'学生',0,0,0,0),(2,'教师',0,0,0,0),(3,'实验室负责人',0,1,1,0),(4,'教授',0,0,0,0),(5,'讲师',0,0,0,0),(6,'副教授',0,0,0,0),(7,'院长',1,0,0,0),(8,'副院长',1,0,0,0),(9,'实验室主任',0,0,0,0),(10,'实验室管理员',1,0,0,1);

#
# Structure for table "dev_user"
#

DROP TABLE IF EXISTS `dev_user`;
CREATE TABLE `dev_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '' COMMENT '账号',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `nickname` varchar(32) DEFAULT '' COMMENT '名字',
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '身份ID',
  `rolenum` bigint(20) NOT NULL DEFAULT '0' COMMENT '身份编号',
  `academy` varchar(32) DEFAULT NULL COMMENT '学院',
  `email` varchar(32) DEFAULT NULL COMMENT '邮箱',
  `qq` varchar(32) DEFAULT NULL COMMENT 'QQ号码',
  `phonenum` varchar(32) DEFAULT NULL COMMENT '手机号码',
  `shortnum` varchar(10) DEFAULT NULL COMMENT '校园短号',
  `info` text COMMENT '其他说明',
  `regTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "dev_user"
#

INSERT INTO `dev_user` VALUES (1,'120344490118','e10adc3949ba59abbe56e057f20f883e','刘泽许',1,2147483647,'计算机与电子信息学院','120344490118@qq.com','120344490118','18300000000','551','专业是电子信息工程',1402583678),(2,'12034490117','e10adc3949ba59abbe56e057f20f883e','张三',2,12034490117,'计算机与电子信息学院','12034490117@qq.com','12034490117','18300000000','612888','教师~',1464974434),(3,'zhangsi','e10adc3949ba59abbe56e057f20f883e','张四',9,1234567890,'计算机与电子信息学院','1234567890@qq.com','1234567890','18300000000','61000','这个嘛~~~~~',1465028268);
