DROP TABLE IF EXISTS `MYCART`;

CREATE TABLE `MYCART` (
    `ID` INT NOT NULL AUTO_INCREMENT,       -- 고유번호
    
    `PRODUCT_ID` INT NOT NULL,              -- 상품 고유번호
    `COLOR_ID` INT NOT NULL,                -- 색상 고유번호
    `WEIGHT_ID` INT NOT NULL,               -- 중량 고유번호

    `PRODUCT_NUM` INT NOT NULL,             -- 상품 갯수

    `PRICE_TYPE` ENUM("num", "set") NOT NULL,   -- 세트 단품 타입
    `PRICE` INT NOT NULL,                   -- 상품 가격

    PRIMARY KEY (`ID`)
)AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;
