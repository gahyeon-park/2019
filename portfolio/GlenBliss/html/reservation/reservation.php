<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

/* open room database */
openDB($roomConn);

$sql = 'SELECT * FROM `ROOM` LEFT JOIN `ROOM_PRICE` ON `ROOM_PRICE_ID` = `PRICE_ID`;';
sqlDB($roomConn, $roomResult, $sql) || exit;

?>

<!DOCTYPE HTML>
<html lang="ko">
	<head>
        <title>GlenBliss</title>
        <meta charset="UTF-8">
        
		<link rel="stylesheet" href="../../css/reset.css">
		<link rel="stylesheet" href="../../css/header.css">
		<link rel="stylesheet" href="../../css/footer.css">
        <link rel="stylesheet" href="../../css/reservation/reservation.css">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Raleway&display=swap" rel="stylesheet">
        
        <!-- x icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
        <script type="text/javascript" src="../../script/header.js"></script>
        <script type="text/javascript" src="../../script/reservation/reservation.js"></script>

        <title>GlenBliss</title>
	</head>
	<body>
        <div id="wrap">
            <?php include("../../php/header.php"); ?>

            <!-- Reservation Section Start -->

            <input id="loginID" type="hidden" name='userID' value=<?=$loginMember[1]?>>
            <div class="contentsBox">
                <div class="reservation_nav">
                    <img src="../../images/reservation/reservation.jpg" alt="reserVation_Img">
                </div>
                <nav class="navBox">
                    <ul>
                        <li>
                            <a href="#">예약하기</a>
                        </li>
                        <li>
                            <a href="#">결제하기</a>
                        </li>
                    </ul>
                </nav>

                <div class='calender'>
                    <div class="calender_date">
                        <div>
                            <h3 id="nowDate"></h3>
                            <div class="Left_Box" id='prev'><a>&lt;</a></div>
                            <div class="RightBox" id='next'><a>&gt;</a></div>
                        </div>
                    </div>


                    <table class='calender_table'>
                        <tr>
                            <td>일</td><td>월</td><td>화</td><td>수</td><td>목</td><td>금</td><td>토</td>
                        </tr>
                        <tr id="calenderRow1">
                        </tr>
                        <tr id="calenderRow2">
                        </tr>
                        <tr id="calenderRow3">
                        </tr>
                        <tr id="calenderRow4">
                        </tr>
                        <tr id="calenderRow5">
                        </tr>
                    </table>

                    <div class='calender_guide'>
                        <h1 id="selectDate">선택일 2019.09.15(일)</h1>
                        <p>
                            *입실 시간 : 오후 3시<br>
                            *퇴실 시간 : 오전 11시<br>
                            <br>
                            *예약 시 아래 '예약안내'를 클릭하여<br>
                            안내사항을 참고해주시기 바랍니다.*
                        </p>
                        <div class='click_res'>
                            <p>click&nbsp;&nbsp;&gt;&gt;</p>
                            <button><a href="../notice/guide.php">예약안내</a></button>
                        </div>
                    </div>
                </div>
                <div class='clear'></div>

                <div class='select_room'>
                    <div class='select_head'>
                        <h1>객실선택</h1>
                        <ul>
                            <li>나이기준</li>
                            <li>성인 (만 14세 이상)</li>
                            <li>아동 (만 13세 까지)</li>
                            <li>유아 (만 24개월 까지)</li>
                            <li class='clear'></li>
                        </ul>
                        <div class='horizon1'></div>
                    </div>

                    <table id="roomTable" class='select_table'>
                        
                    </table>
                </div>
                <div class="reservationButtonFixed">
                    
                    <button id="reservationButton" class="reservationButton">예<br>약<br>하<br>기</button>
                </div>
            </div>

            <?php include("../../php/footer.php"); ?>
        </div>
	</body>
</html>
<?php
closeDB($roomConn, $roomResult);
?>

