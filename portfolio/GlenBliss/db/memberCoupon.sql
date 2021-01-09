DROP TABLE IF EXISTS `MEM_COUPON`;

CREATE TABLE `MEM_COUPON` (
    `MEM_COU_ID` INT NOT NULL AUTO_INCREMENT,   -- primary key

    `MEM_USERID` CHAR(30) NOT NULL,          -- member user id
    `COU_ID` INT NOT NULL,       -- coupon primary key

    `COU_USE` ENUM('Y', 'N') NOT NULL,       -- is use?
    `MEM_COU_VOID` VARCHAR(1000),-- etc                

    PRIMARY KEY(`MEM_COU_ID`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `MEM_COUPON` VALUES(1, 'st07', 1, 'N', '');
INSERT INTO `MEM_COUPON` VALUES(2, 'st07', 2, 'Y', '');
