/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : parkway

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2017-10-15 21:47:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `audit`
-- ----------------------------
DROP TABLE IF EXISTS `audit`;
CREATE TABLE `audit` (
  `Audit_id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_ID` int(11) NOT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Feild_name` varchar(255) DEFAULT NULL,
  `Old_value` varchar(500) DEFAULT NULL,
  `New_value` varchar(500) DEFAULT NULL,
  `Time` datetime NOT NULL,
  PRIMARY KEY (`Audit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of audit
-- ----------------------------
INSERT INTO `audit` VALUES ('22', '20', 'new employee add', '', '', '', '2017-10-15 18:47:28');
INSERT INTO `audit` VALUES ('23', '20', 'Update Employee', 'Department', 'Management', 'Level 2 Fin', '2017-10-15 18:51:53');
INSERT INTO `audit` VALUES ('24', '20', 'Update Employee', 'NIC', '', '885489371', '2017-10-15 18:51:53');
INSERT INTO `audit` VALUES ('25', '20', 'Update Employee', 'Conatct_no', '', '0775263147', '2017-10-15 18:51:53');
INSERT INTO `audit` VALUES ('26', '20', 'Update Employee', 'Department', 'Level 2 Fin', 'Level 6 Executive', '2017-10-15 19:00:57');
INSERT INTO `audit` VALUES ('27', '18', 'Update Employee', 'FirstName', 'Nimantha', 'Karunarathna', '2017-10-15 19:08:55');
INSERT INTO `audit` VALUES ('28', '18', 'Update Employee', 'Department', 'Director', 'Level 6 Executive', '2017-10-15 19:08:55');
INSERT INTO `audit` VALUES ('29', '1', 'Update Employee', 'Department', 'Executive', 'Level 2 Fin', '2017-10-15 19:10:41');
INSERT INTO `audit` VALUES ('30', '2', 'Update Employee', 'Department', 'Executive', 'Level 3 Executive', '2017-10-15 19:15:26');
INSERT INTO `audit` VALUES ('37', '21', 'new employee add', '', '', '', '2017-10-15 19:32:37');
INSERT INTO `audit` VALUES ('38', '21', 'Update Employee', 'Department', 'Sub director', 'Level 5 Executive', '2017-10-15 19:36:47');
INSERT INTO `audit` VALUES ('39', '21', 'Update Employee', 'NIC', '441111111', '885544147', '2017-10-15 19:36:47');
INSERT INTO `audit` VALUES ('40', '5', 'Update Employee', 'FirstName', 'Jayasanka', 'Jayasena', '2017-10-15 21:19:03');
INSERT INTO `audit` VALUES ('41', '5', 'Update Employee', 'Conatct_no', '077000000144', '0374582158', '2017-10-15 21:19:03');

-- ----------------------------
-- Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `Department_id` int(11) NOT NULL AUTO_INCREMENT,
  `Department_name` varchar(255) NOT NULL,
  `Departmet_main_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', 'Main', '0');
INSERT INTO `department` VALUES ('2', 'Management', '1');
INSERT INTO `department` VALUES ('3', 'Director', '2');
INSERT INTO `department` VALUES ('4', 'Executive', '3');
INSERT INTO `department` VALUES ('5', 'Level 2 Executive', '4');
INSERT INTO `department` VALUES ('10', 'Level 3 Executive', '5');
INSERT INTO `department` VALUES ('11', 'Level 4 Executive', '10');
INSERT INTO `department` VALUES ('14', 'Level 2 Production associate', '4');
INSERT INTO `department` VALUES ('15', 'Finance ', '2');
INSERT INTO `department` VALUES ('16', 'Level 2 Fin', '4');
INSERT INTO `department` VALUES ('17', 'Director Finance', '2');
INSERT INTO `department` VALUES ('18', 'Level 2 Fin', '15');
INSERT INTO `department` VALUES ('19', 'Level 5 Executive', '10');
INSERT INTO `department` VALUES ('20', 'Level 6 Executive', '19');
INSERT INTO `department` VALUES ('27', 'Junuir Fin Director', '15');
INSERT INTO `department` VALUES ('37', 'QA Executive', '3');
INSERT INTO `department` VALUES ('38', 'Level 5 Executive', '10');
INSERT INTO `department` VALUES ('42', 'Managent Directors', '2');
INSERT INTO `department` VALUES ('43', 'Project Managers', '2');
INSERT INTO `department` VALUES ('44', 'Sub project Manager', '43');
INSERT INTO `department` VALUES ('45', 'Sub director', '42');
INSERT INTO `department` VALUES ('46', 'Sub Project manager', '43');
INSERT INTO `department` VALUES ('47', 'Tech lead', '3');

-- ----------------------------
-- Table structure for `employee`
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `EmployeeId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `BirthDay` date DEFAULT NULL,
  `Department` int(11) DEFAULT NULL,
  `NIC` varchar(255) NOT NULL,
  `Conatct_no` text,
  PRIMARY KEY (`EmployeeId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('1', 'Amal', 'Samaratunga', '2017-08-01', '18', '454445210', '0770000001');
INSERT INTO `employee` VALUES ('2', 'Dinesh', 'Samaratunga', '2017-10-09', '10', '778545624', '0770000001');
INSERT INTO `employee` VALUES ('3', 'Kavinda', 'Heenatigala', '1993-03-03', '11', '445215896', '0770000001');
INSERT INTO `employee` VALUES ('4', 'Saman', 'Jayamaha', '1993-03-05', '11', '885248961', '0770000001');
INSERT INTO `employee` VALUES ('5', 'Idunil', 'Jayasena', '2015-02-03', '4', '885412521', '0374582158');
INSERT INTO `employee` VALUES ('6', 'Chintaka', 'Chandarathna', '2017-10-03', '18', '887744525', '0770000001');
INSERT INTO `employee` VALUES ('7', 'Prasanga', 'Jayawardahana', '2013-03-05', '4', '887744152', '0770000001');
INSERT INTO `employee` VALUES ('8', 'Sujeewa', 'Serasingha', '2016-02-04', '2', '885514251', '0770000001');
INSERT INTO `employee` VALUES ('9', 'Ashan', 'Perera', '2012-01-03', '5', '887744101', '0710000001');
INSERT INTO `employee` VALUES ('10', 'Ramesh', 'Sanjeewa', '0000-00-00', '5', '885511474', '0720000001');
INSERT INTO `employee` VALUES ('11', 'Hasika', 'Eranda', '2015-03-03', '10', '778855415', '0720000001');
INSERT INTO `employee` VALUES ('12', 'Uditha', 'Gamlath', '2013-04-05', '10', '887755412', '0720000001');
INSERT INTO `employee` VALUES ('13', 'Amal', 'Raj', '2014-05-05', '14', '774485858', '0750000001');
INSERT INTO `employee` VALUES ('14', 'hasini', 'madushaika', '2017-10-25', '2', '445515454', '0770000001');
INSERT INTO `employee` VALUES ('15', 'Jayatha', 'Ranaweera', '2000-10-05', '16', '411115525', '0770000001');
INSERT INTO `employee` VALUES ('16', 'Mahinda', 'Perera', '2017-11-20', '5', '114142541', '0770000001');
INSERT INTO `employee` VALUES ('18', 'Bimal', 'Karunarathna', '2017-11-10', '20', '411115525', '0770000001');
INSERT INTO `employee` VALUES ('20', 'Amal', 'Sanjeewa', '2017-03-10', '20', '885489371', '0775263147');
INSERT INTO `employee` VALUES ('21', 'Sachinda', 'Nirmal', '2017-03-10', '38', '885544147', '4411111111');
