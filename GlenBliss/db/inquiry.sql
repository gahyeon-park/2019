DROP TABLE IF EXISTS `INQUIRY`;

CREATE TABLE `INQUIRY` (
    `INQ_ID` INT NOT NULL AUTO_INCREMENT,   -- primary key

    `INQ_TITLE` VARCHAR(100) NOT NULL,      -- inquiry title
    `INQ_CONTENTS` VARCHAR(5000),           -- inquiry contents
    
    `INQ_MEM_USERID` INT NOT NULL,          -- write user id
    `INQ_MEM_NICKNAME` CHAR(100) NOT NULL,      -- write user nickname

    `INQ_DATE` datetime NOT NULL,
    `INQ_LOOK` int(11) NOT NULL,

    `INQ_VOID` VARCHAR(1000),    -- etc                

    PRIMARY KEY(`INQ_ID`)
) AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `INQUIRY` (`INQ_ID`, `INQ_TITLE`, `INQ_CONTENTS`, `INQ_MEM_USERID`, `INQ_MEM_NICKNAME`, `INQ_DATE`, `INQ_LOOK`, `INQ_VOID`) VALUES
(1, '용품 문의', '바베큐장 시설 이용 금액이 어떤가요?', 1, '전은지', '2019-08-30 12:01:34', 11, NULL),
(2, '예약 인원', '초등생 2명은 추가 금액을 받나요?', 2, '김수아', '2019-08-30 19:45:23', 9, NULL),
(3, '환불문의', '당일 급한 일이 생겨 지금 환불하면 얼마나 받을 수 있나요? 사정에 따라서 바뀔 수 있을까요?', 3, '이다희', '2019-08-31 08:36:34', 5, NULL),
(4, '바베큐 문의', '당일 급한 일이 생겨 지금 환불하면 얼마나 받을 수 있나요? 사정에 따라서 바뀔 수 있을까요?', 4, '이유경', '2019-09-01 13:24:33', 7, NULL),
(5, '바베큐문의', '당일 급한 일이 생겨 지금 환불하면 얼마나 받을 수 있나요? 사정에 따라서 바뀔 수 있을까요?', 5, '정소희', '2019-09-02 16:27:18', 3, NULL),
(6, '강아지 입실문의', '당일 급한 일이 생겨 지금 환불하면 얼마나 받을 수 있나요? 사정에 따라서 바뀔 수 있을까요?', 6, '김민주', '2019-09-02 19:15:53', 4, NULL),
(7, '추석연휴에 예약했어요', '당일 급한 일이 생겨 지금 환불하면 얼마나 받을 수 있나요? 사정에 따라서 바뀔 수 있을까요?', 7, '김선희', '2019-09-03 02:06:48', 6, NULL),
(8, '청결상태 확인 부탁드려요...', '당일 급한 일이 생겨 지금 환불하면 얼마나 받을 수 있나요? 사정에 따라서 바뀔 수 있을까요?', 8, '마두옥', '2019-09-03 17:23:09', 8, NULL),
(9, '숙박 및 레저 문의드립니다.', '당일 급한 일이 생겨 지금 환불하면 얼마나 받을 수 있나요? 사정에 따라서 바뀔 수 있을까요?', 9, '김민창', '2019-09-04 04:35:24', 3, NULL),
(10, '답변 확인이 안되네요.', '당일 급한 일이 생겨 지금 환불하면 얼마나 받을 수 있나요? 사정에 따라서 바뀔 수 있을까요?', 10, '김하늘', '2019-09-04 20:18:12', 11, NULL),
(11, '숙박문의', '당일 급한 일이 생겨 지금 환불하면 얼마나 받을 수 있나요? 사정에 따라서 바뀔 수 있을까요?', 11, '이윤숙', '2019-09-06 18:19:12', 5, NULL),
(12, '나는 빡가빡가', '쩌얼지', '박가현', '가니가니', '2019-09-17 21:58:21', 0, NULL),
(13, '박가도 효남시', '도시커플', '박가현', '가니가니', '2019-09-17 22:02:42', 0, NULL),
(14, '박가도 효남시', '도시커플', '박가현', '가니가니', '2019-09-17 22:03:42', 0, NULL),
(15, '나는 빡가빡가', '나는 빡가도', '박가현', '가니가니', '2019-09-17 22:04:06', 0, NULL);
