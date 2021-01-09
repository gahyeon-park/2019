DROP TABLE IF EXISTS `CHART`;
DROP TABLE IF EXISTS `CHART_DATA`;

-- 차트 테이블
CREATE TABLE `CHART` (
    `ID` INT NOT NULL AUTO_INCREMENT,       -- 고유번호
    `TYPE` CHAR(100) NOT NULL,              -- 차트 타입
    
    PRIMARY KEY (`ID`)
)AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 데이터 테이블
CREATE TABLE `CHART_DATA` (
    `ID` INT NOT NULL AUTO_INCREMENT,       -- 고유번호
    `CHART_ID` INT NOT NULL,                -- 차트 고유번호

    `NAME` CHAR(100) NOT NULL,              -- 이름
    `VALUE` INT NOT NULL,                   -- 값
    `COLOR` CHAR(100) NOT NULL,             -- 색상

    PRIMARY KEY (`ID`)
)AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;
