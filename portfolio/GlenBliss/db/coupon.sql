DROP TABLE IF EXISTS `COUPON`;

CREATE TABLE `COUPON` (
    `COU_ID` INT NOT NULL AUTO_INCREMENT,   -- primary key
    
    `COU_NAME` CHAR(50) NOT NULL,            -- coupon name
    `COU_SALE` INT NOT NULL,             -- discount percentage
    
    `COU_IMG_REAL` VARCHAR(100) NOT NULL,-- image original name
    `COU_IMG_TEMP` VARCHAR(100) NOT NULL,-- image temp name
    `COU_SIMG_REAL` VARCHAR(100) NOT NULL,-- image original name
    `COU_SIMG_TEMP` VARCHAR(100) NOT NULL,-- image temp name
    
    `COU_VOID` VARCHAR(1000),    -- etc                

    PRIMARY KEY(`COU_ID`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `COUPON` (`COU_ID`, `COU_NAME`, `COU_SALE`, `COU_IMG_REAL`, `COU_IMG_TEMP`, `COU_SIMG_REAL`, `COU_SIMG_TEMP`, `COU_VOID`) VALUES
(1, '신규 회원가입 5%', 5, 'ban1.jpg', 'ban1.jpg', 'banner1.jpg', 'banner1.jpg', NULL),
(2, '생일축하 10%', 10, 'ban2.jpg', 'ban2.jpg', 'banner2.jpg', 'banner2.jpg', NULL);
