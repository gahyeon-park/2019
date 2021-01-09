DROP TABLE IF EXISTS `FILE`;
DROP TABLE IF EXISTS `FILE_DISC`;
DROP TABLE IF EXISTS `FILE_STRUCTURE`;

-- 파일 정보 테이블
CREATE TABLE `FILE` (
    `ID` INT NOT NULL AUTO_INCREMENT,               -- 고유번호
    
    `TYPE` ENUM('file', 'directory', 'file webFile', 'file pdfFile') NOT NULL,      -- 파일 타입

    `MAIN_TITLE` VARCHAR(100) NOT NULL,             -- 파일 메인 이름
    `SUB_TITLE` VARCHAR(100) NOT NULL,              -- 파일 서브 이름
    `IMG_NAME` VARCHAR(500) NOT NULL,               -- 파일 이미지

    -- FILE_STRUCTURE 테이블과 FILE테이블의 `ID`로 JOIN 하기

    PRIMARY KEY (`ID`)
)AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 파일 상세 정보 테이블
CREATE TABLE `FILE_DISC` (
    `ID` INT NOT NULL AUTO_INCREMENT,               -- 고유번호

    `FILE_ID` INT NOT NULL,                         -- 해당 파일 고유번호

    `DISC_TITLE` VARCHAR(100) NOT NULL,             -- 파일 상세 정보 타이틀
    `DISC_TEXT` VARCHAR(500) NOT NULL,              -- 파일 상세 정보 텍스트

    PRIMARY KEY (`ID`)
)AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 파일 구조
CREATE TABLE `FILE_STRUCTURE` (
    `ID` INT NOT NULL AUTO_INCREMENT,               -- 고유번호

    `FILE_ID` INT NOT NULL,                         -- 해당 파일 고유번호
    `CHILD_ID` INT,                                 -- 자식 파일 고유번호
    
    PRIMARY KEY (`ID`)
)AUTO_INCREMENT=1 ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ========================== myPC ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('directory', 'myPC', '루트 디렉토리 파일', 'folder.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(1, '설명', '루트 디렉토리 파일');

-- ========================== myPC/Information ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('directory', 'Information', '디렉토리 파일', 'Information.png');
-- `FILE_DISC` : 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(2, '설명', "'박가현'에 대한 자기소개 등");

-- ========================== myPC/Information/ParkGaHyeon ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'ParkGaHyeon', '자기소개 파일', 'ParkGaHyeon.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(3, '이름', '<span class="strongText">박가현</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(3, '생년월일', '1997-11-08 (23세)');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(3, '성별', '여성');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(3, '거주지', '경기도 화성시 새솔동 요진와이시티 107동 1003호');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(3, '연락처', '010-2246-1662, <br>rhd5656@gmail.com');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(3, '태그', '<span class="strongText">#책임감 #활발 #열정</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(3, '설명', '고등학생일때부터 <span class="strongText">프로그래밍</span>을 놓지 않던 학생이었고, 현재까지 실력을 늘려가는 <span class="strongText">착실한 인재</span>');

-- ========================== myPC/Information/History ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('directory', 'History', '디렉토리 파일', 'folder.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(4, '2016-02', '양지고등학교 졸업');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(4, '2016-03', '<span class="strongText">한국산업기술대학교(경기)</span> <br>엔터테인먼트 컴퓨팅학과 입학');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(4, '2018-08', '<span class="strongText">한국산업기술대학교(경기)</span> <br>엔터테인먼트 컴퓨팅학과 중퇴');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(4, '2019-03', '라인컴퓨터아트학원 <br><span class="strongText">스마트웹UI/UX디자인콘텐츠개발양성</span> 시작');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(4, '2019-12', '라인컴퓨터아트학원 <br><span class="strongText">스마트웹UI/UX디자인콘텐츠개발양성</span> 종료');

-- ========================== myPC/Information/History/HighSchool ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'HighSchool.txt', '고등학교 텍스트 파일', 'HighSchool.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(5, '고등학교', '양지고등학교');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(5, '입학', '2013-03');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(5, '졸업', '2016-02');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(5, '소재지', '경기');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(5, '설명', '<span class="strongText">친우관계</span>가 돈독하였고, <br>학급 <span class="strongText">부반장</span>과 동아리 <span class="strongText">부회장</span>을 맡았고, <br><span class="strongText">바른생활부(선도부)</span>로 활동해 성실한 모습을 보였다.');

-- ========================== myPC/Information/History/University ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'University.txt', '대학교 텍스트 파일', 'University.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(6, '대학교', '한국산업기술대학교');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(6, '대학교', '한국산업기술대학교');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(6, '학과', '게임공학부 <br>엔터테인먼트 컴퓨팅학과');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(6, '입학', '2016-03');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(6, '중퇴', '2018-08');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(6, '소재지', '경기');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(6, '설명', '전공 과목으로 <span class="strongText">프로그래밍</span> 능력과, <br><span class="strongText">알고리즘, 자료구조</span> 등 여러가지 과목을 학습했고, <br>교양과목으로 <span class="strongText">세상을 보는 눈</span>을 넓혔다.');

-- ========================== myPC/Information/History/University ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'Academy.txt', '학원 텍스트 파일', 'Academy.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(7, '학원', '라인컴퓨터아트학원 (국비지원 학원)');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(7, '과정', '스마트웹UI/UX디자인콘텐츠개발양성');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(7, '입학', '2019-03');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(7, '졸업', '2019-12');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(7, '소재지', '경기');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(7, '설명', '<span class="strongText">웹디자인</span>의 그래픽 도구 학습과 <br><span class="strongText">프론트</span>의 웹 프로그래밍의 전반적 학습, <br><span class="strongText">백엔드</span> 서버 프로그래밍 학습을 하였다.');

-- ========================== myPC/Information/Ability ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('directory', 'Ability', '디렉토리 파일', 'folder.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(8, 'PhotoShop', '<span class="strongText">85%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(8, 'illustrator', '<span class="strongText">75%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(8, 'HTML', '<span class="strongText">90%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(8, 'CSS', '<span class="strongText">85%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(8, 'JavaScript', '<span class="strongText">95%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(8, 'jQuery', '<span class="strongText">95%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(8, 'AJAX', '<span class="strongText">85%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(8, 'nodeJS', '<span class="strongText">80%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(8, 'JSON', '<span class="strongText">78%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(8, 'MySQL', '<span class="strongText">83%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(8, 'PHP', '<span class="strongText">92%</span>');

-- ========================== myPC/Information/Ability/PhotoShop ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'PhotoShop.psd', 'PhotoShop 파일', 'PhotoShop.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(9, '버전', 'Adobe Photoshop CS6');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(9, '역량', '<span class="strongText">85%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(9, '설명', '단순 누끼 작업 및 그래픽 작업 가능');

-- ========================== myPC/Information/Ability/Illustrator ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'Illustrator.ai', 'Illustrator 파일', 'Illustrator.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(10, '버전', 'Adobe Illustrator CS6');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(10, '역량', '<span class="strongText">75%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(10, '설명', '캐릭터 그리기 및 그래픽 작업 가능');

-- ========================== myPC/Information/Ability/HTML ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'HTML.html', 'html 파일', 'HTML.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(11, '버전', 'HTML5');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(11, '역량', '<span class="strongText">90%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(11, '설명', '<span class="strong">시멘틱 태그</span>를 이용한 효과적인 코딩과 <br>협업을 위한 <span class="strongText">주석 이용</span>');

-- ========================== myPC/Information/Ability/CSS ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'CSS.css', 'css 파일', 'CSS.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(12, '버전', 'CSS2, SASS(SCSS)');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(12, '역량', '<span class="strongText">85%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(12, '설명', '<span class="strong">안정적인 레이아웃</span> 완성과 <br>SASS(SCSS)를 사용한 <span class="strongText">구조적이고 프로그래밍적</span>인 코딩 가능');

-- ========================== myPC/Information/Ability/JavaScript ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'JavaScript.js', 'js 파일', 'JavaScript.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(13, '버전', 'ECMAScript6 (ES6)');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(13, '역량', '<span class="strongText">95%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(13, '설명', '<span class="strongText">객체지향</span> 코딩과 <span class="strongText">체계적</span>인 코딩, <br><span class="strongText">DOM 객체</span>에 대한 이해와 더불어 <br>웹 사이트를 <span class="strongText">동적</span>으로 제작할 수 있다.');

-- ========================== myPC/Information/Ability/jQuery ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'jQuery.js', 'js 파일', 'jQuery.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(14, '버전', 'ALL');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(14, '역량', '<span class="strongText">95%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(14, '설명', '기본적인 <span class="strongText">JavaScript 이해</span>와 함께 <br>여러가지 이벤트와 엘리먼트를 <br><span class="strongText">jQuery</span>를 이용해 자유자재로 사용할 수 있다.');

-- ========================== myPC/Information/Ability/AJAX ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'AJAX.js', 'js 파일', 'AJAX.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(15, '버전', 'ALL');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(15, '역량', '<span class="strongText">87%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(15, '설명', '<span class="strongText">비동기식</span>의 이해와 함께 AJAX를 통해 <br><span class="strongText">서버</span>와 비동기식으로 통신하면서 <br>웹사이트를 더욱 <span class="strongText">동적</span>으로 만들 수 있다.');

-- ========================== myPC/Information/Ability/nodeJS ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'nodeJS.js', 'js 파일', 'nodeJS.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(16, '버전', '10.16.3');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(16, '역량', '<span class="strongText">87%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(16, '설명', '비동기식</span>의 이해와 함께 AJAX를 통해 <br>웹사이트를 더욱 <span class="strongText">동적</span>으로 만들 수 있다.');

-- ========================== myPC/Information/Ability/JSON ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'JSON.json', 'json 파일', 'JSON.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(17, '버전', 'ALL');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(17, '역량', '<span class="strongText">78%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(17, '설명', 'JSON 파일을 <span class="strongText">이해</span>, <span class="strongText">구성</span>할 수 있고, <br>JSON 파일을 사용해 <span class="strongText">데이터를 관리</span>할 수 있다.');

-- ========================== myPC/Information/Ability/MySQL ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'MySQL.sql', '데이터베이스 파일', 'MySQL.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(18, '버전', 'mysql  Ver 15.1 Distrib 10.1.41-MariaDB');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(18, '역량', '<span class="strongText">83%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(18, '설명', '데이터베이스를 통해 <span class="strongText">대용량 데이터를 관리</span>할 수 있고, <br>웹사이트와 서버, 데이터베이스를 <span class="strongText">연결</span> 할 수 있다.');

-- ========================== myPC/Information/Ability/PHP ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file', 'PHP.php', 'php 파일', 'PHP.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(19, '버전', 'PHP 7.2.19-0ubuntu0.18.04.2');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(19, '역량', '<span class="strongText">92%</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(19, '설명', 'PHP를 통해 <span class="strongText">서버와 통신</span>할 수 있으며, <br>데이터베이스, 파일, JSON 등 <span class="strongText">연결시켜 사용</span>할 수 있다.');

-- ========================== myPC/Portfolio ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('directory', 'Portfolio', '디렉토리 파일', 'folder.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(20, '설명', '각종 프로젝트 및 기획서 등');

-- ========================== myPC/Portfolio/CoqueFactory ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('directory', 'CoqueFactory', '디렉토리 파일', 'folder.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(21, '프로젝트 명', '꼬끄팩토리');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(21, '프로젝트 종류', '<span class="strongText">팀</span> 프로젝트');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(21, '제작자', '박가현, 최재춘, 조현진, 박수민');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(21, '제작 기간', '2019-05-02 ~ 2019-05-15');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(21, '사용 언어', 'HTML, CSS, JavaScript, jQuery');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(21, '설명', '<span class="strongText">마카롱 상품판매</span> 웹사이트로, <br>일반 마카롱은 물론, <span class="strongText">주문제작</span>이 가능한 마카롱 판매 사이트를 제작하였습니다.');

-- ========================== myPC/Portfolio/CoqueFactory/CoqueFactory.html ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file webFile', 'CoqueFactory.html', '웹사이트 파일', 'CoqueFactory.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(22, '웹 사이트 명', '꼬끄팩토리');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(22, '사용 언어', 'HTML, CSS, JavaScript, jQuery');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(22, '구현 내용', '가장 <span class="strongText">기초적인 웹사이트</span> 구현, <br><span class="strongText">레이아웃 중심</span>으로 제작하였습니다.');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(22, '비고', '더블클릭 하시면 <span class="strongText">CoqueFactory 페이지로 이동</span>합니다. <br>Document.pdf 파일을 확인해 주세요.');

-- ========================== myPC/Portfolio/CoqueFactory/Document.pdf ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file pdfFile', 'Document.pdf', 'pdf 파일', 'pdf.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(23, '설명', '꼬끄팩토리 <span class="strongText">기획서</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(23, '비고', '더블클릭 하시면 pdf파일이 <span class="strongText">다운로드</span> 됩니다.');

-- ========================== myPC/Portfolio/GaniBar ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('directory', 'GaniBar', '디렉토리 파일', 'folder.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(24, '프로젝트 명', '가니포차');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(24, '프로젝트 종류', '<span class="strongText">개인</span> 프로젝트');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(24, '제작자', '박가현');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(24, '제작 기간', '2019-06-17 ~ 2019-07-26');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(24, '사용 언어', 'HTML, CSS, JavaScript(객체지향), jQuert, PHP');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(24, '설명', "<span class='strongText'>'하이트진로'의 소주를 소개</span>하는 웹사이트로, <br>소주의 <span class='strongText'>종류와 설명 페이지</span>와 유저의 취향을 고려하여 <span class='strongText'>소주를 추천하는 페이지</span>로 구성되어 있습니다.");

-- ========================== myPC/Portfolio/GaniLibrary ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('directory', 'GaniLibrary', '디렉토리 파일', 'folder.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(25, '프로젝트 명', '가니도서관');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(25, '프로젝트 종류', '<span class="strongText">개인</span> 프로젝트');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(25, '제작자', '박가현');
-- 제작기간 모르게뜌뜌뜌뜌ㅠ뜌뜌ㅠ뜌ㄸ
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(25, '제작 기간', '2019-08-01 ~ 2019-08-31');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(25, '사용 언어', 'HTML, CSS, SASS, JavaScript, jQuery, PHP, MySQL');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(25, '설명', '<span class="strongText">도서들을 관리</span>하는 웹사이트로, <br><span class="strongText">관리자와 회원, 비회원 기능</span>을 가지고 있으며, <br><span class="strongText">도서 열람, 대출, 반납, 추가, 삭제 등</span> 여러가지 기능을 갖추고 있습니다.');

-- ========================== myPC/Study ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('directory', 'Study', '디렉토리 파일', 'folder.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(26, '설명', '프로그래밍 학습 내용 등');















-- ========================== myPC/Portfolio/MyBlog ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('directory', 'MyBlog', '디렉토리 파일', 'folder.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(27, '프로젝트 명', 'MyBlog');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(27, '프로젝트 종류', '<span class="strongText">개인</span> 프로젝트');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(27, '제작자', '박가현');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(27, '제작 기간', '2019-05-20 ~ 2019-06-07');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(27, '사용 언어', 'HTML, CSS, JavaScript');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(27, '설명', "<span class='strongText'>'박가현'의 정보와 포트폴리오</span>를 소개하는 웹사이트로, <br><span class='strongText'>독특한 디자인</span>과 인상적인 자기소개 등을 첫 블로그에 담아보았습니다.");

-- ========================== myPC/Portfolio/myBlog/myBlog ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file webFile', 'MyBlog.html', '웹사이트 파일', 'MyBlog.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(28, '웹 사이트 명', 'MyBlog');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(28, '사용 언어', 'HTML, CSS, JavaScript, jQuery');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(28, '구현 내용', '다양한 <span class="strongText">애니메이션</span>을 이용하고, <br>재미있는 디자인 중심으로 제작하였습니다.');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(28, '비고', '더블클릭 하시면 <span class="strongText">MyBlog 페이지로 이동</span>합니다. <br>Document.pdf 파일을 확인해 주세요.');

-- ========================== myPC/Portfolio/MyBlog/Document.pdf ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file pdfFile', 'Document.pdf', 'pdf 파일', 'pdf.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(29, '설명', 'MyBlog <span class="strongText">기획서</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(29, '비고', '더블클릭 하시면 pdf파일이 <span class="strongText">다운로드</span> 됩니다.');



-- ========================== myPC/Portfolio/GaniBar/GaniBar ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file webFile', 'GaniBar.html', '웹사이트 파일', 'GaniBar.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(30, '웹 사이트 명', '가니포차');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(30, '사용 언어', 'HTML, CSS, JavaScript, jQuert, PHP');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(30, '구현 내용', 'JavaScript <span class="strongText">객체 중심</span>으로 구현, <br><span class="strongText">체계적인 코딩</span>을 준수하며 제작하였습니다.');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(30, '비고', '더블클릭 하시면 <span class="strongText">가니포차 페이지로 이동</span>합니다. <br>Document.pdf 파일을 확인해 주세요.');

-- ========================== myPC/Portfolio/GaniBar/Document.pdf ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file pdfFile', 'Document.pdf', 'pdf 파일', 'pdf.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(31, '설명', '가니포차 <span class="strongText">기획서</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(31, '비고', '더블클릭 하시면 pdf파일이 <span class="strongText">다운로드</span> 됩니다.');




-- ========================== myPC/Portfolio/GaniLibrary/GaniLibrary ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file webFile', 'GaniLibrary.html', '웹사이트 파일', 'GaniLibrary.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(32, '웹 사이트 명', '가니도서관');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(32, '사용 언어', 'HTML, CSS, JavaScript, jQuery, BootStrap, PHP, MySQL');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(32, '구현 내용', '학습한 <span class="strongText">PHP와 MySQL 중심</span>으로 프로그래밍적 구현에 초점을 두고 제작한 도서관리 사이트로, <br>로그인이나 관리자, 비회원, 회원 <span class="strongText">각각의 기능을 중점</span>적으로 제작하였습니다.');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(32, '비고', '더블클릭 하시면 <span class="strongText">가니포차 페이지로 이동</span>합니다. <br>Document.pdf 파일을 확인해 주세요.');

-- ========================== myPC/Portfolio/GaniLibrary/Document.pdf ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file pdfFile', 'Document.pdf', 'pdf 파일', 'pdf.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(33, '설명', '가니도서관 <span class="strongText">기획서</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(33, '비고', '더블클릭 하시면 pdf파일이 <span class="strongText">다운로드</span> 됩니다.');





-- ========================== myPC/Portfolio/GlenBliss ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('directory', 'GlenBliss', '디렉토리 파일', 'folder.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(34, '프로젝트 명', 'GlenBliss');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(34, '프로젝트 종류', '<span class="strongText">팀</span> 프로젝트');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(34, '제작자', '박가현, 지효남, 한정우, 김현진');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(34, '제작 기간', '2019-09-03 ~ 2019-09-23');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(34, '사용 언어', 'HTML, CSS, SASS, JavaScript, jQuery, JSON, PHP, MySQL, AJAX');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(34, '설명', "'GlenBliss'의 <span class='strongText'>펜션을 소개</span>하고 <br><span class='strongText'>예약</span>과 <span class='strongText'>쿠폰 할인</span> 이벤트, 펜션 관리자가 웹 사이트의 데이터를 <span class='strongText'>추가, 수정, 삭제</span> 기능 등 <br>실제 펜션 웹 사이트를 최대한 구현한 웹 사이트");

-- ========================== myPC/Portfolio/GlenBliss/GlenBliss ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file webFile', 'GlenBliss.html', '웹사이트 파일', 'GlenBliss.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(35, '웹 사이트 명', 'GlenBliss');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(35, '사용 언어', 'HTML, CSS, SASS, JavaScript, jQuery, JSON, PHP, MySQL, AJAX');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(35, '구현 내용', '프론트와 백엔드의 역할을 나눈 프로젝트에서 <span class="strongText">프론트엔드와 백엔드</span>의 역할을 맡았고, <br><span class="strongText">쿠폰 할인 이벤트와 예약 기능, 로그인 기능 부분</span> 등을 중점적으로 제작하였습니다.');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(35, '비고', '더블클릭 하시면 <span class="strongText">GlenBliss 페이지로 이동</span>합니다. <br>Document.pdf 파일을 확인해 주세요.');

-- ========================== myPC/Portfolio/GlenBliss/Document.pdf ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file pdfFile', 'Document.pdf', 'pdf 파일', 'pdf.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(36, '설명', 'GlenBliss <span class="strongText">기획서</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(36, '비고', '더블클릭 하시면 pdf파일이 <span class="strongText">다운로드</span> 됩니다.');








-- ========================== myPC/Portfolio/GaniTowel ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('directory', 'GaniTowel', '디렉토리 파일', 'folder.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(37, '프로젝트 명', '가니타월');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(37, '프로젝트 종류', '<span class="strongText">개인</span> 프로젝트');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(37, '제작자', '박가현');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(37, '제작 기간', '2019-09-25 ~ 2019-10-07');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(37, '사용 언어', 'HTML, CSS, SASS, JavaScript, jQuery, PHP, MySQL, AJAX');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(37, '설명', '수건 중심 판매 쇼핑몰 중 <span class="strongText">장바구니 기능</span>을 중점적으로 다룬 웹 사이트로, <br><span class="strongText">상품 페이지에서 장바구니</span>에 담는 기능과 더불어 <span class="strongText">상품 페이지가 아닌 곳에서도 원하는 상품을 장바구니</span>에 담을 수 있습니다.');

-- ========================== myPC/Portfolio/GaniTowel/GaniTowel ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file webFile', 'GaniTowel.html', '웹사이트 파일', 'GaniTowel.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(38, '웹 사이트 명', '가니타월');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(38, '사용 언어', 'HTML, CSS, SASS, JavaScript, jQuery, PHP, MySQL, AJAX');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(38, '구현 내용', '<span class="strongText">AJAX와 PHP, MySQL을 자유자재로 사용</span>해 제작하였고, <br>장바구니에 원하는 상품이 <span class="strongText">실시간</span>으로 담기도록 구현하였습니다.');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(38, '비고', '더블클릭 하시면 <span class="strongText">가니타월 페이지로 이동</span>합니다. <br>Document.pdf 파일을 확인해 주세요.');

-- ========================== myPC/Portfolio/GaniTowel/Document.pdf ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file pdfFile', 'Document.pdf', 'pdf 파일', 'pdf.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(39, '설명', '가니타월 <span class="strongText">기획서</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(39, '비고', '더블클릭 하시면 pdf파일이 <span class="strongText">다운로드</span> 됩니다.');







-- ========================== myPC/Portfolio/ChartLibrary ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('directory', 'ChartLibrary', '디렉토리 파일', 'folder.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(40, '프로젝트 명', 'ChartLibrary');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(40, '프로젝트 종류', '<span class="strongText">개인</span> 프로젝트');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(40, '제작자', '박가현');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(40, '제작 기간', '2019-10-15 ~ 2019-10-21');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(40, '사용 언어', 'HTML, CSS, SASS, JavaScript, jQuery, JSON, PHP, MySQL, AJAX');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(40, '설명', '차트를 그리는 <span class="strongText">라이브러리를 구현</span>해 <br><span class="strongText">데이터를 입력</span>하면 차트를 그리고, 그에 대한 <span class="strongText">사용방법</span>을 보여주는 웹 사이트, <br><span class="strongText">데이터를 저장해서 다시 불러오는 기능</span>까지 포함한 웹 사이트');

-- ========================== myPC/Portfolio/ChartLibrary/ChartLibrary ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file webFile', 'ChartLibrary.html', '웹사이트 파일', 'ChartLibrary.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(41, '웹 사이트 명', 'ChartLibrary');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(41, '사용 언어', 'HTML, CSS, SASS, JavaScript, jQuery, JSON, PHP, MySQL, AJAX');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(41, '구현 내용', 'canvas를 사용해 차트를 그리는 <span class="strongText">라이브러리를 구현</span>했고, <br>MySQL, PHP, JSON, AJAX 등을 사용해 데이터를 입력받아 <span class="strongText">데이터베이스에 저장</span>하고, <br>그 데이터의 아이디로 <span class="strongText">다시 불러오는 기능</span>을 구현하였습니다.');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(41, '비고', '더블클릭 하시면 <span class="strongText">ChartLibrary 페이지로 이동</span>합니다. <br>Document.pdf 파일을 확인해 주세요.');

-- ========================== myPC/Portfolio/ChartLibrary/Document.pdf ================================================
-- `FILE` : 타입, 메인이름, 서브이름, 이미지이름.png
INSERT INTO `FILE` (`TYPE`, `MAIN_TITLE`, `SUB_TITLE`, `IMG_NAME`) VALUES('file pdfFile', 'Document.pdf', 'pdf 파일', 'pdf.png');
-- `FILE_DISC` : 고유번호, 해당파일 고유번호, 상세정보타이틀, 상세정보텍스트
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(42, '설명', 'ChartLibrary <span class="strongText">기획서</span>');
INSERT INTO `FILE_DISC` (`FILE_ID`, `DISC_TITLE`, `DISC_TEXT`) VALUES(42, '비고', '더블클릭 하시면 pdf파일이 <span class="strongText">다운로드</span> 됩니다.');
















-- `FILE_STRUCTURE`!!
-- `FILE_STRUCTURE` : 해당파일 고유번호, 자식파일 고유번호

-- ========================== myPC ================================================
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(1, 2);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(1, 20);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(1, 26);

-- ========================== myPC/Information ================================================
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(2, 3);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(2, 4);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(2, 8);

-- ========================== myPC/Information/History ================================================
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(4, 5);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(4, 6);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(4, 7);

-- ========================== myPC/Information/Ability ================================================
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(8, 9);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(8, 10);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(8, 11);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(8, 12);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(8, 13);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(8, 14);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(8, 15);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(8, 16);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(8, 17);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(8, 18);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(8, 19);

-- ========================== myPC/Portfolio ================================================
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(20, 21);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(20, 24);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(20, 25);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(20, 27);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(20, 34);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(20, 37);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(20, 40);

-- ========================== myPC/Portfolio/CoqueFactory ================================================
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(21, 22);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(21, 23);

-- ========================== myPC/Portfolio/GaniBar ================================================
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(24, 30);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(24, 31);

-- ========================== myPC/Portfolio/GaniLibrary ================================================
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(25, 32);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(25, 33);

-- ========================== myPC/Portfolio/MyBlog ================================================
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(27, 28);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(27, 29);

-- ========================== myPC/Portfolio/GlenBliss ================================================
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(34, 35);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(34, 36);

-- ========================== myPC/Portfolio/GlenBliss ================================================
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(37, 38);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(37, 39);

-- ========================== myPC/Portfolio/GlenBliss ================================================
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(40, 41);
INSERT INTO `FILE_STRUCTURE` (`FILE_ID`, `CHILD_ID`) VALUES(40, 42);








