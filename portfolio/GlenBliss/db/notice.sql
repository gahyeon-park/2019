DROP TABLE IF EXISTS `NOTICE`;

CREATE TABLE `NOTICE` (
    `NOTICE_ID` INT NOT NULL AUTO_INCREMENT,   -- primary key

    `NOTICE_TITLE` VARCHAR(100) NOT NULL,      -- notice title
    `NOTICE_CONTENTS` VARCHAR(5000),           -- notice contents
    
    `NOTICE_MEM_USERID` INT NOT NULL,          -- write user id
    `NOTICE_MEM_NICKNAME` CHAR(100) NOT NULL,  -- write user nickname
    
    `NOTICE_DATE` datetime NOT NULL,
    `NOTICE_LOOK` int(11) NOT NULL,

    `NOTICE_VOID` VARCHAR(1000),    -- etc                

    PRIMARY KEY(`NOTICE_ID`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `NOTICE` (`NOTICE_ID`, `NOTICE_TITLE`, `NOTICE_CONTENTS`, `NOTICE_MEM_USERID`, `NOTICE_MEM_NICKNAME`, `NOTICE_DATE`, `NOTICE_LOOK`, `NOTICE_VOID`) VALUES
(1, '프라이빗 풀빌라 오픈 이벤트', '프라이빗 풀빌라 오픈 이벤트', 2, '글렌블리스', '2018-07-19 16:45:23', 3264, NULL),
(2, '블로그 후기 이벤트 안내 및 발표 안내 (10월 3일)', '블로그 후기 이벤트 안내 및 발표 안내 (10월 3일)', 2, '글렌블리스', '2018-12-25 22:12:08', 1895, NULL),
(3, '블로그 후기 이벤트 공지', '블로그 후기 이벤트 공지', 2, '글렌블리스', '2019-03-21 17:20:46', 2564, NULL),
(4, '고객 감사 이벤트!!! (최대 15만원 상당 상품권 증정)', '고객 감사 이벤트!!! (최대 15만원 상당 상품권 증정)', 2, '글렌블리스', '2019-04-27 09:39:19', 2257, NULL),
(5, '(5월) 블로그 이벤트 풀빌라 무료숙박권 당첨자 발표', '(5월) 블로그 이벤트 풀빌라 무료숙박권 당첨자 발표', 2, '글렌블리스', '2019-06-06 17:18:38', 8744, NULL),
(6, '☆★블로그 후기 이벤트★☆', '☆★블로그 후기 이벤트★☆', 2, '글렌블리스', '2019-06-19 20:11:36', 3463, NULL),
(7, '★비수기 블로그 이벤트 7/22일 당첨자 발표★', '★비수기 블로그 이벤트 3/22일 당첨자 발표★', 2, '글렌블리스', '2019-07-22 10:39:14', 1864, NULL),
(8, '★☆블로그 숙박권 이벤트 당첨자 발표☆★', '★☆블로그 숙박권 이벤트 당첨자 발표☆★', 2, '글렌블리스', '2019-08-02 13:15:41', 1116, NULL),
(9, '★블로그 이벤트 관련 공지★', '★블로그 이벤트 관련 공지★', 2, '글렌블리스', '2019-08-10 16:19:52', 956, NULL),
(10, '♡♥블로그 이벤트 당첨자발표(2분기)♥♡', '♡♥블로그 이벤트 당첨자발표(2분기)♥♡', 2, '글렌블리스', '2019-08-15 16:21:29', 2485, NULL),
(11, '9월 12일 부터 메인수영장 미온수로 운영됩니다.', '안녕하세요 글렌블리스입니다.<br><br>더운여름 중단했던 메인수영장 미온수 운영을 9월 12일 부로 다시 시작합니다.<br><br>9월은 상시 운영 예정이며 온도는 25도 내외 입니다.<br><br>10월 6일(일)까지는 상시 미온수를 운영합니다.<br><br>10월 6일 부터 동절기 전 까지는 금,토 및 공휴일에 한하여 부분 운영합니다.', 2, '글렌블리스', '2019-09-12 13:14:48', 0, NULL);
