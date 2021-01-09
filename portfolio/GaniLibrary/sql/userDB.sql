DROP TABLE IF EXISTS `USERS`;
DROP TABLE IF EXISTS `ADMIN`;
DROP TABLE IF EXISTS `BAN_ID`;

CREATE TABLE `USERS` (
    `ID` INT NOT NULL AUTO_INCREMENT,
    
    `USERID` CHAR(30) NOT NULL,
    `USERPASSWORD` CHAR(100) NOT NULL,
    
    `NAME` CHAR(100) NOT NULL,
    `MOBILEPHONE` CHAR(20) NOT NULL,
    `EMAIL` CHAR(50) NOT NULL,
    `ADDRESS` VARCHAR(200) NOT NULL,

    PRIMARY KEY (`ID`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ADMIN` (
    `ID` INT NOT NULL AUTO_INCREMENT,
    
    `ADMINID` CHAR(30) NOT NULL,
    `ADMINPASSWORD` CHAR(100) NOT NULL,
    
    `NAME` CHAR(100) NOT NULL,
    `MOBILEPHONE` CHAR(20) NOT NULL,
    `EMAIL` CHAR(50) NOT NULL,
    `ADDRESS` VARCHAR(200) NOT NULL,

    PRIMARY KEY (`ID`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `BAN_ID` (
    `ID` INT NOT NULL AUTO_INCREMENT,
    `BAN_ID` VARCHAR(30) NOT NULL,

    PRIMARY KEY(`ID`)
)AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- USERS 초기값
INSERT INTO `USERS` VALUES (1, 'rhd5656', md5('rk2356'), '박가현', '01022461662', 'zzrkguszz@naver.com', '경기도 화성시 새솔동 송산그린시티 요진와이시티');
INSERT INTO `USERS` VALUES (2, 'user1', md5('pw1'), '동해물', '01011111111', "aaa@naver.com", "경기도 안산시 단원구 초지동 14단지 1408동 1003호");
INSERT INTO `USERS` VALUES (3, 'user2', md5('pw2'), '과백두', '01022222222', "bbb@naver.com", "경기도 안산시 단원구 초지동 12단지 1208동 1004호");
INSERT INTO `USERS` VALUES (4, 'user3', md5('pw3'), '산이마', '01033333333', "ccc@naver.com", "경기도 안산시 단원구 초지동 12단지 1207동 1004호");
INSERT INTO `USERS` VALUES (5, 'user4', md5('pw4'), '르고닳', '01044444444', "ddd@naver.com", "경기도 안산시 단원구 초지동 12단지 1206동 1004호");

-- ADMIN 초기값
INSERT INTO `ADMIN` VALUES (1, 'administrator', md5('admin'), '박가현', '01022461662', "zzrkguszz@naver.com", "경기도 화성시 새솔동 요진와이시티 107동 1003호");

-- BAN_ID 초기값
INSERT INTO `BAN_ID` VALUES (1, 'administrator');
INSERT INTO `BAN_ID` VALUES (2, 'admin');
INSERT INTO `BAN_ID` VALUES (3, 'root');