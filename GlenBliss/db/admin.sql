DROP TABLE IF EXISTS `ADMIN`;

CREATE TABLE `ADMIN` (
    `ADMIN_ID` INT NOT NULL AUTO_INCREMENT,   -- primary key

    `ADMIN_USERID` CHAR(30) NOT NULL,         -- administrator id
    `ADMIN_USERPW` CHAR(100) NOT NULL,        -- administrator password
    
    `ADMIN_NAME` CHAR(100) NOT NULL,          -- administrator name
    `ADMIN_NICKNAME` CHAR(100) NOT NULL,          -- administrator nickname
    
    `ADMIN_VOID` VARCHAR(1000),               -- etc

    PRIMARY KEY(`ADMIN_ID`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ADMIN` VALUES (1, 'admin', md5('admin'), '박가현', '글렌블리스', '');