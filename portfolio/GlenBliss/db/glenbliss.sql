-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 19-09-23 10:19
-- 서버 버전: 10.3.8-MariaDB
-- PHP 버전: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `glenbliss`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` int(11) NOT NULL,
  `ADMIN_USERID` char(30) NOT NULL,
  `ADMIN_USERPW` char(100) NOT NULL,
  `ADMIN_NAME` char(100) NOT NULL,
  `ADMIN_NICKNAME` char(100) NOT NULL,
  `ADMIN_VOID` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `ADMIN_USERID`, `ADMIN_USERPW`, `ADMIN_NAME`, `ADMIN_NICKNAME`, `ADMIN_VOID`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '박가현', '글렌블리스', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `coupon`
--

CREATE TABLE `coupon` (
  `COU_ID` int(11) NOT NULL,
  `COU_NAME` char(50) NOT NULL,
  `COU_SALE` int(11) NOT NULL,
  `COU_IMG_REAL` varchar(100) NOT NULL,
  `COU_IMG_TEMP` varchar(100) NOT NULL,
  `COU_SIMG_REAL` varchar(100) NOT NULL,
  `COU_SIMG_TEMP` varchar(100) NOT NULL,
  `COU_VOID` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `coupon`
--

INSERT INTO `coupon` (`COU_ID`, `COU_NAME`, `COU_SALE`, `COU_IMG_REAL`, `COU_IMG_TEMP`, `COU_SIMG_REAL`, `COU_SIMG_TEMP`, `COU_VOID`) VALUES
(1, '신규 회원가입 5%', 5, 'ban1.jpg', 'ban1.jpg', 'banner1.jpg', 'banner1.jpg', NULL),
(2, '생일축하 10%', 10, 'ban2.jpg', 'ban2.jpg', 'banner2.jpg', 'banner2.jpg', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `inquiry`
--

CREATE TABLE `inquiry` (
  `INQ_ID` int(11) NOT NULL,
  `INQ_TITLE` varchar(100) NOT NULL,
  `INQ_CONTENTS` varchar(5000) DEFAULT NULL,
  `INQ_MEM_USERID` int(11) NOT NULL,
  `INQ_MEM_NICKNAME` char(100) NOT NULL,
  `INQ_DATE` datetime NOT NULL,
  `INQ_LOOK` int(11) NOT NULL,
  `INQ_VOID` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `inquiry`
--

INSERT INTO `inquiry` (`INQ_ID`, `INQ_TITLE`, `INQ_CONTENTS`, `INQ_MEM_USERID`, `INQ_MEM_NICKNAME`, `INQ_DATE`, `INQ_LOOK`, `INQ_VOID`) VALUES
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
(12, '나는 빡가빡가', '쩌얼지', 0, '가니가니', '2019-09-17 21:58:21', 0, NULL),
(13, '박가도 효남시', '도시커플', 0, '가니가니', '2019-09-17 22:02:42', 0, NULL),
(14, '박가도 효남시', '도시커플', 0, '가니가니', '2019-09-17 22:03:42', 0, NULL),
(15, '나는 빡가빡가', '나는 빡가도', 0, '가니가니', '2019-09-17 22:04:06', 0, NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `MEM_ID` int(11) NOT NULL,
  `MEM_USERID` char(30) NOT NULL,
  `MEM_USERPW` char(100) NOT NULL,
  `MEM_NAME` char(100) NOT NULL,
  `MEM_NICKNAME` char(100) NOT NULL,
  `MEM_PHONE` char(20) NOT NULL,
  `MEM_ADDRESS` varchar(200) NOT NULL,
  `MEM_EMAIL` char(50) NOT NULL,
  `MEM_SEX` enum('male','female') NOT NULL,
  `MEM_BIRTH` date NOT NULL,
  `MEM_VOID` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`MEM_ID`, `MEM_USERID`, `MEM_USERPW`, `MEM_NAME`, `MEM_NICKNAME`, `MEM_PHONE`, `MEM_ADDRESS`, `MEM_EMAIL`, `MEM_SEX`, `MEM_BIRTH`, `MEM_VOID`) VALUES
(1, 'st07', '7d715f49a857e4e8a11a71c5c244d995', '박가현', '가니가니', '01022461662', '경기도 화성시 새솔동 요진와이시티 107동 1003호', 'zzrkguszz@naver.com', 'female', '1997-11-08', ''),
(2, 'rhd5656', 'ec94c7f078a17f7ff5092198f7e62951', '박가현', '박하사탕', '01022461662', '경기도 화성시 새솔동 요진와이시티', 'zzrkguszz@naver.com', 'female', '1997-11-08', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `mem_coupon`
--

CREATE TABLE `mem_coupon` (
  `MEM_COU_ID` int(11) NOT NULL,
  `MEM_USERID` char(30) NOT NULL,
  `COU_ID` int(11) NOT NULL,
  `COU_USE` enum('Y','N') NOT NULL,
  `MEM_COU_VOID` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `NOTICE_ID` int(11) NOT NULL,
  `NOTICE_TITLE` varchar(100) NOT NULL,
  `NOTICE_CONTENTS` varchar(5000) DEFAULT NULL,
  `NOTICE_MEM_USERID` int(11) NOT NULL,
  `NOTICE_MEM_NICKNAME` char(100) NOT NULL,
  `NOTICE_DATE` datetime NOT NULL,
  `NOTICE_LOOK` int(11) NOT NULL,
  `NOTICE_VOID` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `notice`
--

INSERT INTO `notice` (`NOTICE_ID`, `NOTICE_TITLE`, `NOTICE_CONTENTS`, `NOTICE_MEM_USERID`, `NOTICE_MEM_NICKNAME`, `NOTICE_DATE`, `NOTICE_LOOK`, `NOTICE_VOID`) VALUES
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

-- --------------------------------------------------------

--
-- 테이블 구조 `reservation`
--

CREATE TABLE `reservation` (
  `RES_ID` int(11) NOT NULL,
  `RES_MEM_USERID` char(30) NOT NULL,
  `RES_CHECKIN` datetime NOT NULL,
  `RES_CHECKOUT` datetime NOT NULL,
  `RES_DATE` datetime NOT NULL,
  `RES_ROOM_ID` int(11) NOT NULL,
  `RES_PERSONNEL_ADULT` int(11) NOT NULL,
  `RES_PERSONNEL_CHILD` int(11) NOT NULL,
  `RES_PERSONNEL_BABY` int(11) NOT NULL,
  `RES_PRICE` int(11) NOT NULL,
  `RES_PERMIT` enum('Y','N') NOT NULL,
  `RES_VOID` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `review`
--

CREATE TABLE `review` (
  `REV_ID` int(11) NOT NULL,
  `REV_CONTENTS` varchar(1000) DEFAULT NULL,
  `REV_MEM_USERID` int(11) NOT NULL,
  `REV_MEM_NICKNAME` char(100) NOT NULL,
  `REV_DATE` datetime DEFAULT NULL,
  `REV_VOID` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `review`
--

INSERT INTO `review` (`REV_ID`, `REV_CONTENTS`, `REV_MEM_USERID`, `REV_MEM_NICKNAME`, `REV_DATE`, `REV_VOID`) VALUES
(1, '코딩하다가 지친상태여서 펜션에서 조용히 쉴만한 장소를 알아보고 있었습니다.<br>\r\n방도 진짜 엄청 크고 깔끔하고 분위기도 좋아서<br>\r\n다시 코딩이 잡히더라구요. 즐겁게 코딩하면서 쉬다 갑니다.', 12, '가니가니', '2019-09-08 20:51:24', NULL),
(2, '여름 휴가겸 워크샵으로 장소를 찾던 중<br>\r\n글렌블리스라는 풀빌라 펜션을 찾았습니다.<br>\r\n방도 크고 세미나실도 만족스러웠습니다.<br>\r\n같이 온 직원분들이랑 진짜 즐겁고 편하게 놀다가 갑니다.', 13, '현정지순', '2019-09-05 19:36:34', NULL);

-- --------------------------------------------------------

--
-- 테이블 구조 `room`
--

CREATE TABLE `room` (
  `ROOM_ID` int(11) NOT NULL,
  `ROOM_NAME` char(50) NOT NULL,
  `ROOM_TYPE` enum('double','couple','family','party') NOT NULL,
  `ROOM_PRICE_ID` int(11) NOT NULL,
  `ROOM_TITLE` char(50) DEFAULT NULL,
  `ROOM_SUBTITLE` char(50) DEFAULT NULL,
  `ROOM_DISC` varchar(1000) DEFAULT NULL,
  `ROOM_FORM` varchar(100) DEFAULT NULL,
  `ROOM_PERSONNEL_MIN` int(11) DEFAULT NULL,
  `ROOM_PERSONNEL_MAX` int(11) DEFAULT NULL,
  `ROOM_SIZE` int(11) DEFAULT NULL,
  `ROOM_FACILITY` varchar(1000) DEFAULT NULL,
  `ROOM_VOID` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `room`
--

INSERT INTO `room` (`ROOM_ID`, `ROOM_NAME`, `ROOM_TYPE`, `ROOM_PRICE_ID`, `ROOM_TITLE`, `ROOM_SUBTITLE`, `ROOM_DISC`, `ROOM_FORM`, `ROOM_PERSONNEL_MIN`, `ROOM_PERSONNEL_MAX`, `ROOM_SIZE`, `ROOM_FACILITY`, `ROOM_VOID`) VALUES
(1, '101', 'double', 1, 'COMPORT<br>DOUBLE 101', '오직 당신이 편안하도록, 준비된 \'더블룸\'', '최상의 안락함을 위해 더 나은 서비스를 제공하는 101룸입니다.\r\n가슴이 확 트이는 자연 조망과 맑은 공기 속에서\r\n잊지 못 할 기억을 남겨보세요.', '더블침대 1 / 싱글침대 1 / 개별테라스 / 거실 / 화장실 1', 4, 6, 25, '침대(더블1,싱글1), 에어컨, 개별데크, 테이블, 소파, TV,케이블 및 위성방송, 옷장(보조침구:최대인원수로 비치), 냉장고, 전자레인지, 밥솥, 커피포트, 싱크대, 식기(최대 인원수로 비치), 와인잔/오프너(보증금대여), 후라이팬, 냄비, 취사도구 일체, 욕실, 드라이기, 샤워부스, 세면도구(수건,샴푸/린스,비누,치약)', ''),
(2, '102', 'double', 2, 'COMPORT<br>DOUBLE 102', '오직 당신이 편안하도록, 준비된 \'더블룸\'', '최상의 안락함을 위해 더 나은 서비스를 제공하는 102룸입니다.\r\n가슴이 확 트이는 자연 조망과 맑은 공기 속에서\r\n잊지 못 할 기억을 남겨보세요.', '더블 침대 1 / 스파 / 개별테라스 / 개별바베큐 / 거실 / 화장실 1', 4, 6, 25, '침대(더블1,싱글1), 에어컨, 개별데크, 테이블, 소파, TV,케이블 및 위성방송, 옷장(보조침구:최대인원수로 비치), 냉장고, 전자레인지, 밥솥, 커피포트, 싱크대, 식기(최대 인원수로 비치), 와인잔/오프너(보증금대여), 후라이팬, 냄비, 취사도구 일체, 욕실, 드라이기, 샤워부스, 세면도구(수건,샴푸/린스,비누,치약)', ''),
(3, '103', 'double', 2, 'COMPORT<br>DOUBLE 103', '오직 당신이 편안하도록, 준비된 \'더블룸\'', '최상의 안락함을 위해 더 나은 서비스를 제공하는 103룸입니다.\r\n가슴이 확 트이는 자연 조망과 맑은 공기 속에서\r\n잊지 못 할 기억을 남겨보세요.', '더블 침대 1 / 스파 / 개별테라스 / 개별바베큐 / 거실 / 화장실 1', 4, 6, 25, '침대(더블1), 에어컨, 개별데크, 테이블, 소파, TV,케이블 및 위성방송, 옷장(보조침구:최대인원수로 비치), 냉장고, 전자레인지, 밥솥, 커피포트, 싱크대, 식기(최대 인원수로 비치), 와인잔/오프너(보증금대여), 후라이팬, 냄비, 취사도구 일체, 욕실, 드라이기, 샤워부스, 세면도구(수건,샴푸/린스,비누,치약)', ''),
(4, '104', 'double', 3, 'COMPORT<br>DOUBLE 104', '오직 당신이 편안하도록, 준비된 \'더블룸\'', '최상의 안락함을 위해 더 나은 서비스를 제공하는 104룸입니다.\r\n가슴이 확 트이는 자연 조망과 맑은 공기 속에서\r\n잊지 못 할 기억을 남겨보세요.', '더블 침대 1 / 싱글 침대 1 / 스파 / 개별테라스 / 개별바베큐 / 오픈형 / 거실 / 화장실 1', 4, 6, 25, '침대(더블1,싱글1), 에어컨, 개별데크, 테이블, 소파, TV,케이블 및 위성방송, 옷장(보조침구:최대인원수로 비치), 냉장고, 전자레인지, 밥솥, 커피포트, 싱크대, 식기(최대 인원수로 비치), 와인잔/오프너(보증금대여), 후라이팬, 냄비, 취사도구 일체, 욕실, 드라이기, 샤워부스, 세면도구(수건,샴푸/린스,비누,치약)', ''),
(5, '201', 'couple', 4, 'ROMANTIC<br>COUPLE 201', '오직 당신과 연인을 위한, 준비된 \'커플룸\'', '최상의 로맨틱을 위해 더 나은 서비스를 제공하는 201룸입니다.\r\n가슴이 확 트이는 자연 조망과 맑은 공기 속에서\r\n잊지 못 할 기억을 남겨보세요.', '싱글 침대 2 / 개별테라스 / 오픈형 / 거실 / 화장실 1', 2, 4, 20, '침대(싱글2), 에어컨, 개별데크, 테이블, 소파, TV,케이블 및 위성방송, 옷장(보조침구:최대인원수로 비치), 냉장고, 전자레인지, 밥솥, 커피포트, 싱크대, 식기(최대 인원수로 비치), 와인잔/오프너(보증금대여), 후라이팬, 냄비, 취사도구 일체, 욕실, 드라이기, 샤워부스, 세면도구(수건,샴푸/린스,비누,치약)', ''),
(6, '202', 'couple', 5, 'ROMANTIC<br>COUPLE 202', '오직 당신과 연인을 위한, 준비된 \'커플룸\'', '최상의 로맨틱을 위해 더 나은 서비스를 제공하는 202룸입니다.\r\n가슴이 확 트이는 자연 조망과 맑은 공기 속에서\r\n잊지 못 할 기억을 남겨보세요.', '더블 침대 1 / 스파 / 개별테라스 / 개별바베큐 / 오픈형 / 거실 / 화장실 1', 2, 4, 20, '침대(더블1), 에어컨, 개별데크, 테이블, 소파, TV,케이블 및 위성방송, 옷장(보조침구:최대인원수로 비치), 냉장고, 전자레인지, 밥솥, 커피포트, 싱크대, 식기(최대 인원수로 비치), 와인잔/오프너(보증금대여), 후라이팬, 냄비, 취사도구 일체, 욕실, 드라이기, 샤워부스, 세면도구(수건,샴푸/린스,비누,치약)', ''),
(7, '203', 'couple', 6, 'ROMANTIC<br>COUPLE 203', '오직 당신과 연인을 위한, 준비된 \'커플룸\'', '최상의 로맨틱을 위해 더 나은 서비스를 제공하는 203룸입니다.\r\n가슴이 확 트이는 자연 조망과 맑은 공기 속에서\r\n잊지 못 할 기억을 남겨보세요.', '더블 침대 1 / 스파 / 개별테라스 / 개별바베큐 / 오픈형 / 거실 / 화장실 1', 2, 4, 20, '침대(더블1), 에어컨, 개별데크, 테이블, 소파, TV,케이블 및 위성방송, 옷장(보조침구:최대인원수로 비치), 냉장고, 전자레인지, 밥솥, 커피포트, 싱크대, 식기(최대 인원수로 비치), 와인잔/오프너(보증금대여), 후라이팬, 냄비, 취사도구 일체, 욕실, 드라이기, 샤워부스, 세면도구(수건,샴푸/린스,비누,치약)', ''),
(8, '301', 'family', 7, 'HAPPY<br>FAMILY 301', '오직 당신의 가족이 화목하도록, 준비된 \'패밀리룸\'', '최상의 화목함을 위해 더 나은 서비스를 제공하는 301룸입니다.\r\n가슴이 확 트이는 자연 조망과 맑은 공기 속에서\r\n잊지 못 할 기억을 남겨보세요.', '더블 침대 2 / 방 3 / 거실 2 / 개별바베큐 / 화장실 4', 8, 15, 45, '침대(더블2), 에어컨, 개별데크, 테이블, 소파, TV,케이블 및 위성방송, 옷장(보조침구:최대인원수로 비치), 냉장고, 전자레인지, 밥솥, 커피포트, 싱크대, 식기(최대 인원수로 비치), 와인잔/오프너(보증금대여), 후라이팬, 냄비, 취사도구 일체, 욕실, 드라이기, 샤워부스, 세면도구(수건,샴푸/린스,비누,치약)', ''),
(9, '302', 'family', 8, 'HAPPY<br>FAMILY 302', '오직 당신의 가족이 화목하도록, 준비된 \'패밀리룸\'', '최상의 화목함을 위해 더 나은 서비스를 제공하는 302룸입니다.\r\n가슴이 확 트이는 자연 조망과 맑은 공기 속에서\r\n잊지 못 할 기억을 남겨보세요.', '더블 침대 2 / 방 2 / 거실 1 / 개별바베큐 / 히노끼스파 / 화장실 2', 4, 8, 30, '	\r\n침대(더블2), 에어컨, 개별데크, 테이블, 소파, TV,케이블 및 위성방송, 옷장(보조침구:최대인원수로 비치), 냉장고, 전자레인지, 밥솥, 커피포트, 싱크대, 식기(최대 인원수로 비치), 와인잔/오프너(보증금대여), 후라이팬, 냄비, 취사도구 일체, 욕실, 드라이기, 샤워부스, 세면도구(수건,샴푸/린스,비누,치약)', ''),
(10, '402', 'party', 9, 'FUNNY<br>DOUBLE 402', '오직 당신과의 우정이 돈독하도록, 준비된 \'파티룸\'', '최상의 우정을 위해 더 나은 서비스를 제공하는 402룸입니다.\r\n가슴이 확 트이는 자연 조망과 맑은 공기 속에서\r\n잊지 못 할 기억을 남겨보세요.', '더블 침대 2 / 대형 개별테라스 / 방 2 / 대형 거실 / 화장실 4', 8, 20, 60, '침대(더블2), 에어컨, 개별데크, 테이블, 소파, TV,케이블 및 위성방송, 옷장(보조침구:최대인원수로 비치), 냉장고, 전자레인지, 밥솥, 커피포트, 싱크대, 식기(최대 인원수로 비치), 와인잔/오프너(보증금대여), 후라이팬, 냄비, 취사도구 일체, 욕실, 드라이기, 샤워부스, 세면도구(수건,샴푸/린스,비누,치약)', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `room_img`
--

CREATE TABLE `room_img` (
  `IMG_ID` int(11) NOT NULL,
  `ROOM_ID` int(11) NOT NULL,
  `IMG_REALNAME` varchar(100) NOT NULL,
  `IMG_TEMPNAME` varchar(100) NOT NULL,
  `IMG_VOID` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `room_price`
--

CREATE TABLE `room_price` (
  `PRICE_ID` int(11) NOT NULL,
  `PRICE_LOW` int(11) NOT NULL,
  `PRICE_MIDDLE` int(11) NOT NULL,
  `PRICE_HIGH` int(11) NOT NULL,
  `PRICE_VOID` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `room_price`
--

INSERT INTO `room_price` (`PRICE_ID`, `PRICE_LOW`, `PRICE_MIDDLE`, `PRICE_HIGH`, `PRICE_VOID`) VALUES
(1, 100000, 120000, 150000, ''),
(2, 120000, 140000, 170000, ''),
(3, 180000, 200000, 230000, ''),
(4, 240000, 260000, 290000, ''),
(5, 200000, 220000, 250000, ''),
(6, 220000, 240000, 270000, ''),
(7, 350000, 370000, 400000, ''),
(8, 250000, 270000, 300000, ''),
(9, 430000, 450000, 480000, '');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- 테이블의 인덱스 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`COU_ID`);

--
-- 테이블의 인덱스 `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`INQ_ID`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MEM_ID`);

--
-- 테이블의 인덱스 `mem_coupon`
--
ALTER TABLE `mem_coupon`
  ADD PRIMARY KEY (`MEM_COU_ID`);

--
-- 테이블의 인덱스 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`NOTICE_ID`);

--
-- 테이블의 인덱스 `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`RES_ID`);

--
-- 테이블의 인덱스 `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`REV_ID`);

--
-- 테이블의 인덱스 `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ROOM_ID`);

--
-- 테이블의 인덱스 `room_img`
--
ALTER TABLE `room_img`
  ADD PRIMARY KEY (`IMG_ID`);

--
-- 테이블의 인덱스 `room_price`
--
ALTER TABLE `room_price`
  ADD PRIMARY KEY (`PRICE_ID`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `coupon`
--
ALTER TABLE `coupon`
  MODIFY `COU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `INQ_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `MEM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `mem_coupon`
--
ALTER TABLE `mem_coupon`
  MODIFY `MEM_COU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `NOTICE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 테이블의 AUTO_INCREMENT `reservation`
--
ALTER TABLE `reservation`
  MODIFY `RES_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 테이블의 AUTO_INCREMENT `review`
--
ALTER TABLE `review`
  MODIFY `REV_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `room`
--
ALTER TABLE `room`
  MODIFY `ROOM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 테이블의 AUTO_INCREMENT `room_img`
--
ALTER TABLE `room_img`
  MODIFY `IMG_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `room_price`
--
ALTER TABLE `room_price`
  MODIFY `PRICE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
