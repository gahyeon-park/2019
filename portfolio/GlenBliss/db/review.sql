DROP TABLE IF EXISTS `REVIEW`;

CREATE TABLE `REVIEW` (
    `REV_ID` INT NOT NULL AUTO_INCREMENT,   -- primary key

    `REV_CONTENTS` VARCHAR(1000),           -- review contents
    
    `REV_MEM_USERID` INT NOT NULL,          -- write user id
    `REV_MEM_NICKNAME` CHAR(100) NOT NULL,      -- write user nickname
    `REV_DATE` datetime DEFAULT NULL,
    `REV_VOID` VARCHAR(1000),    -- etc                

    PRIMARY KEY(`REV_ID`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `REVIEW` (`REV_ID`, `REV_CONTENTS`, `REV_MEM_USERID`, `REV_MEM_NICKNAME`, `REV_DATE`, `REV_VOID`) VALUES
(1, '코딩하다가 지친상태여서 펜션에서 조용히 쉴만한 장소를 알아보고 있었습니다.<br>\r\n방도 진짜 엄청 크고 깔끔하고 분위기도 좋아서<br>\r\n다시 코딩이 잡히더라구요. 즐겁게 코딩하면서 쉬다 갑니다.', 12, '가니가니', '2019-09-08 20:51:24', NULL),
(2, '여름 휴가겸 워크샵으로 장소를 찾던 중<br>\r\n글렌블리스라는 풀빌라 펜션을 찾았습니다.<br>\r\n방도 크고 세미나실도 만족스러웠습니다.<br>\r\n같이 온 직원분들이랑 진짜 즐겁고 편하게 놀다가 갑니다.', 13, '현정지순', '2019-09-05 19:36:34', NULL);
