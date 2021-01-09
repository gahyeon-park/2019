DROP TABLE IF EXISTS `RESERVATION`;

CREATE TABLE `RESERVATION` (
    `RES_ID` INT NOT NULL AUTO_INCREMENT,   -- primary key

    `RES_MEM_USERID` CHAR(30) NOT NULL,          -- member primary key
    
    `RES_CHECKIN` DATETIME NOT NULL,    -- reservation check in dateTime
    `RES_CHECKOUT` DATETIME NOT NULL,   -- reservation check out dateTime
    `RES_DATE` DATETIME NOT NULL,       -- reservation dateTime

    `RES_ROOM_ID` INT NOT NULL,         -- reservation room primary key
    `RES_PERSONNEL_ADULT` INT NOT NULL,       -- person num
    `RES_PERSONNEL_CHILD` INT NOT NULL,       -- person num
    `RES_PERSONNEL_BABY` INT NOT NULL,       -- person num
    
    `RES_PRICE` INT NOT NULL,           -- reservation price
    
    `RES_PERMIT` enum('Y','N') NOT NULL,
    
    `RES_VOID` VARCHAR(1000),    -- etc                

    PRIMARY KEY(`RES_ID`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `RESERVATION` VALUES(1, 'st07', '2019-09-10', '2019-09-15', '2019-09-05', 1, 2, 1, 0, 500000, 'N', '');
INSERT INTO `RESERVATION` VALUES(2, 'st07', '2019-09-17', '2019-09-19', '2019-09-17', 2, 3, 1, 0, 500000, 'N', '');
INSERT INTO `RESERVATION` VALUES(3, 'st07', '2019-08-15', '2019-08-20', '2019-09-17', 3, 3, 1, 0, 500000, 'N', '');
INSERT INTO `RESERVATION` VALUES(4, 'st07', '2019-10-16', '2019-10-19', '2019-09-17', 4, 3, 1, 0, 500000, 'N', '');
INSERT INTO `RESERVATION` VALUES(5, 'st07', '2019-01-16', '2019-01-19', '2019-09-17', 5, 3, 1, 0, 500000, 'N', '');
INSERT INTO `RESERVATION` VALUES(6, 'st07', '2019-03-16', '2019-04-19', '2019-09-17', 6, 3, 1, 0, 500000, 'N', '');
INSERT INTO `RESERVATION` VALUES(7, 'st07', '2019-07-16', '2019-07-19', '2019-09-17', 7, 3, 1, 0, 500000, 'N', '');
INSERT INTO `RESERVATION` VALUES(8, 'st07', '2019-05-16', '2019-05-24', '2019-09-17', 8, 3, 1, 0, 500000, 'N', '');
INSERT INTO `RESERVATION` VALUES(9, 'st07', '2019-02-16', '2019-02-19', '2019-09-17', 9, 3, 1, 0, 500000, 'N', '');
INSERT INTO `RESERVATION` VALUES(10, 'st07', '2019-06-16', '2019-06-19', '2019-09-17', 10, 3, 2, 0, 500000, 'N', '');