DROP TABLE IF EXISTS `PRODUCT`;
DROP TABLE IF EXISTS `COLOR`;
DROP TABLE IF EXISTS `WEIGHT`;
DROP TABLE IF EXISTS `PRICE`;

CREATE TABLE `PRODUCT` (
    `ID` INT NOT NULL AUTO_INCREMENT,       -- 고유번호
    
    `NAME` VARCHAR(50) NOT NULL,            -- 상품명
    `ENG_NAME` VARCHAR(50) NOT NULL,        -- 상품 영어명

    PRIMARY KEY (`ID`)
)AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `COLOR` (
    `ID` INT NOT NULL AUTO_INCREMENT,       -- 고유번호
    
    `NAME` VARCHAR(50) NOT NULL,            -- 색상 이름
    `CODE` VARCHAR(50) NOT NULL,            -- 색상 코드
    `IMAGE` VARCHAR(50) NOT NULL,           -- 색상 사진

    `PRODUCT_ID` INT NOT NULL,              -- 해당 상품 고유번호

    PRIMARY KEY(`ID`)
)AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `WEIGHT` (
    `ID` INT NOT NULL AUTO_INCREMENT,       -- 고유번호

    `WEIGHT_NUM` INT NOT NULL,              -- 중량
    `PRODUCT_ID` INT NOT NULL,              -- 해당 상품 고유번호
    PRIMARY KEY (`ID`)

)AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `PRICE` (
    `ID` INT NOT NULL AUTO_INCREMENT,       -- 고유번호

    `PRICE_NUM` INT NOT NULL,               -- 단품 가격
    `PRICE_SET` INT NOT NULL,               -- 세트 가격

    `PRODUCT_ID` INT NOT NULL,              -- 해당 상품 고유번호
    PRIMARY KEY (`ID`)
)AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 가니 세면타월
INSERT INTO `PRODUCT` VALUES (1, '가니 세면타월', 'washTowel');
INSERT INTO `COLOR` VALUES (1, 'Gray', '57565c', 'Gray.jpg', 1);
INSERT INTO `COLOR` VALUES (2, 'Beige', 'd2c5b5', 'Beige.jpg', 1);
INSERT INTO `COLOR` VALUES (3, 'Mint', '92b2b1', 'Mint.jpg', 1);
INSERT INTO `COLOR` VALUES (4, 'Blue', 'c8d1d8', 'Blue.jpg', 1);
INSERT INTO `COLOR` VALUES (5, 'White', 'ffffff', 'White.jpg', 1);
INSERT INTO `WEIGHT` VALUES (1, 150, 1);
INSERT INTO `WEIGHT` VALUES (2, 170, 1);
INSERT INTO `WEIGHT` VALUES (3, 190, 1);
INSERT INTO `PRICE` VALUES (1, 2000, 17000, 1);

-- 가니 비치타월
INSERT INTO `PRODUCT` VALUES (2, '가니 비치타월', 'beachTowel');
INSERT INTO `COLOR` VALUES (6, 'Aqua', 'e0b3b8', 'Aqua.jpg', 2);
INSERT INTO `COLOR` VALUES (7, 'Bound', 'c8d1d8', 'Bound.jpg', 2);
INSERT INTO `COLOR` VALUES (8, 'Marin', 'ffffff', 'Marin.jpg', 2);
INSERT INTO `COLOR` VALUES (9, 'Dusk', 'ffffff', 'Dusk.jpg', 2);
INSERT INTO `WEIGHT` VALUES (4, 180, 2);
INSERT INTO `PRICE` VALUES (2, 6000, 57000, 2);

-- 가니 손수건
INSERT INTO `PRODUCT` VALUES (3, '가니 손수건', 'handTowel');
INSERT INTO `COLOR` VALUES (10, 'Pink', 'e0b3b8', 'Pink.jpg', 3);
INSERT INTO `COLOR` VALUES (11, 'Blue', 'c8d1d8', 'Blue.jpg', 3);
INSERT INTO `COLOR` VALUES (12, 'White', 'ffffff', 'White.jpg', 3);
INSERT INTO `COLOR` VALUES (13, 'Gray', '57565c', 'Gray.jpg', 3);
INSERT INTO `WEIGHT` VALUES (5, 30, 3);
INSERT INTO `WEIGHT` VALUES (6, 50, 3);
INSERT INTO `PRICE` VALUES (3, 1500, 12000, 3);