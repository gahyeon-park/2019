<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;


/* open room database */
isset($_GET['roomNum']) || exit;
openDB($roomConn);

$sql = "SELECT * FROM `ROOM` WHERE `ROOM_NAME` = '" . $_GET['roomNum'] . "';";
sqlDB($roomConn, $roomResult, $sql);
$roomContents = mysqli_fetch_assoc($roomResult);

?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>GlenBliss</title>

        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Raleway&display=swap" rel="stylesheet">
        
        <!-- x icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
        
        <!-- reset css link -->
        <link rel="stylesheet" href="../../css/reset.css">
        <!-- header css link -->
        <link rel="stylesheet" href="../../css/header.css">
        <!-- footer css link -->
        <link rel="stylesheet" href="../../css/footer.css">
        <!-- aboutPage -->
        <link rel="stylesheet" href="../../css/room/room_detail.css">

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
        <script src="../../script/header.js"></script>
        <script src="../../script/room/room.js"></script>
        <script src="../../script/room/room_detail.js"></script>
    </head>
    <body>
        <div id="wrap">
            <?php include("../../php/header.php"); ?>
            
            <!-- room Detail Page -->
            <section>
                <input id='roomNum' type="hidden" value='<?=$_GET['roomNum']?>'>
                <!-- room Img Slide -->
                <img id='roomImg' src="../../images/room/coupleA/1_coupleA_1.jpg" alt="방 사진1" class="roomImg">

                <article class="roomDetailArticle">

                    <!-- room Summary Title and Discription -->
                    <div class="roomTitleBox">
                        <h2 class="roomTitle"><?=$roomContents['ROOM_TITLE']?></h2>
                        <h3 class="roomSubTitle"><?=$roomContents['ROOM_SUBTITLE']?></h3>
                        <pre class="roomDisc">
<?=$roomContents['ROOM_DISC']?>
                        </pre>
                    </div>

                    <!-- room Detail Discription -->
                    <div class="roomDetailBox">
                        <!-- Detail Disc Button -->
                        <div id="buttonBox" class="buttonBox">
                            <button id="roomTypeButton" class="btn roomTypeButton btn-active">ROOM TYPE</button>
                            <button id="informationButton" class="btn informationButton">INFORMATION</button>
                            <a href="../../html/reservation/reservation.php"><button id="reservationButton" class="btn reservationButton">RESERVATION</button></a>
                        </div>

                        <!-- Detail Contents -->
                        <!-- ROOM TYPE contents -->
                        <div id="roomTypeContents" class="roomTypeContents">
                            <table class="tableBox">
                                <tr class="tableRow">
                                    <td class="tableTitle">객실형태</td>
                                    <td class="tableDisc"><?=$roomContents['ROOM_FORM']?></td>
                                </tr>
                                <tr class="tableRow">
                                    <td class="tableTitle">이용정원</td>
                                    <td class="tableDisc">기준 <?=$roomContents['ROOM_PERSONNEL_MIN']?> | 최대 <?=$roomContents['ROOM_PERSONNEL_MAX']?></td>
                                </tr>
                                <tr class="tableRow">
                                    <td class="tableTitle">이용면적</td>
                                    <td class="tableDisc"><?=$roomContents['ROOM_SIZE']?> 평</td>
                                </tr>
                                <tr class="tableRow">
                                    <td class="tableTitle">구비시설</td>
                                    <td class="tableDisc"><?=$roomContents['ROOM_FACILITY']?></td>
                                </tr>
                            </table>
                        </div>

                        <!-- INFORMATION contents -->
                        <div id="informationContents" class="informationContents">

                            <!-- information -->
                            <div class="infoBox">
                                <h4 class="infoTitle">기본 안내</h4>
                                <pre class="infoDisc">
전화예약 및 문의는 새벽 1시 30분까지 / 주중 1시까지 (성수기 3시까지) 가능합니다.
입금확인 후 예약자에게 예약완료 문자메세지를 통보해 드립니다.
기준인원 초과시 유아 (24개월 이상 ~ 미취학 아동)는 1인 1만원, 아동 및 성인은 동일하게 2만원씩 추가됩니다.
잠시 왔다 가시는 방문객도 1만원의 추가요금이 있습니다.
입실은 오후 3시 이후, 퇴실은 오전 11시까지 입니다.
예약은 인원 외에 다른 인원 입실시 취소로 간주되어 환불없는 퇴실조치입니다.
                                </pre>
                            </div>

                            <!-- informaiton -->
                            <div class="infoBox">
                                <h4 class="infoTitle">기간 안내</h4>
                                <pre class="infoDisc">
주말(토, 공휴일 전) / 공휴일 전날은 주말요금이 적용됩니다.
동절기 (11월 1일 ~ 3월 31일)
비수기 (~ 6월 20일 / 9월 1일 ~)
준성수기 (6월 21일 ~ 7월 25일, 8월 18일 ~ 8월 31일)
성수기 (7월 26일 ~ 8월 17일) / 극성수기 (7월 27일 ~ 8월 10일)
7월 26일 ~ 8월 10일(극성수기)은 요일에 상관없이 성수기 주말 요금이 적용됩니다.
                                </pre>
                            </div>
                        </div>
                    </div>
                </article>
            </section>

            <?php include("../../php/footer.php"); ?>

        </div>
    </body>
</html>
<?php
closeDB($roomConn, $roomResult);
?>


