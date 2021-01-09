DROP TABLE IF EXISTS `ROOM_IMG`;

CREATE TABLE `ROOM_IMG` (
    `IMG_ID` INT NOT NULL AUTO_INCREMENT,   -- primary key

    `ROOM_ID` INT NOT NULL,                 -- room primary key
    `IMG_REALNAME` VARCHAR(100) NOT NULL, -- image original name
    `IMG_TEMPNAME` VARCHAR(100) NOT NULL, -- image temp name
    
    `IMG_VOID` VARCHAR(1000),               -- etc

    PRIMARY KEY(`IMG_ID`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;