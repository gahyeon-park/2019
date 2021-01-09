DROP TABLE IF EXISTS `ROOM_PRICE`;

CREATE TABLE `ROOM_PRICE` (
    `PRICE_ID` INT NOT NULL AUTO_INCREMENT,   -- primary key

    `PRICE_LOW` INT NOT NULL,                -- low price
    `PRICE_MIDDLE` INT NOT NULL,              -- middle price
    `PRICE_HIGH` INT NOT NULL,                 -- high price

    `PRICE_VOID` VARCHAR(1000),               -- etc

    PRIMARY KEY(`PRICE_ID`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ROOM_PRICE` VALUES(1, 100000, 120000, 150000, '');
INSERT INTO `ROOM_PRICE` VALUES(2, 120000, 140000, 170000, '');
INSERT INTO `ROOM_PRICE` VALUES(3, 180000, 200000, 230000, '');
INSERT INTO `ROOM_PRICE` VALUES(4, 240000, 260000, 290000, '');
INSERT INTO `ROOM_PRICE` VALUES(5, 200000, 220000, 250000, '');
INSERT INTO `ROOM_PRICE` VALUES(6, 220000, 240000, 270000, '');
INSERT INTO `ROOM_PRICE` VALUES(7, 350000, 370000, 400000, '');
INSERT INTO `ROOM_PRICE` VALUES(8, 250000, 270000, 300000, '');
INSERT INTO `ROOM_PRICE` VALUES(9, 430000, 450000, 480000, '');