DROP TABLE IF EXISTS `MEMBER`;

CREATE TABLE `MEMBER` (
    `MEM_ID` INT NOT NULL AUTO_INCREMENT,   -- primary key

    `MEM_USERID` CHAR(30) NOT NULL,         -- member id
    `MEM_USERPW` CHAR(100) NOT NULL,        -- member password
    
    `MEM_NAME` CHAR(100) NOT NULL,          -- member name
    `MEM_NICKNAME` CHAR(100) NOT NULL,          -- member nickname
    `MEM_PHONE` CHAR(20) NOT NULL,          -- member phone number
    `MEM_ADDRESS` VARCHAR(200) NOT NULL,    -- member address
    `MEM_EMAIL` CHAR(50) NOT NULL,          -- member email
    `MEM_SEX` ENUM('male', 'female') NOT NULL, -- member sex
    `MEM_BIRTH` DATE NOT NULL,              -- member birthday

    `MEM_VOID` VARCHAR(1000),               -- etc

    PRIMARY KEY(`MEM_ID`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `MEMBER` VALUES (1, 'st07', md5('st07'), '박가현', '가니가니', '01022461662', '경기도 화성시 새솔동 요진와이시티 107동 1003호', 'zzrkguszz@naver.com', 'female', '1997-11-08', '');
