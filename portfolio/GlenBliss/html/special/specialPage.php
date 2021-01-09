<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

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
        <link rel="stylesheet" href="../../css/special/specialPage.css">

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
        <script src="../../script/header.js"></script>
    </head>
    <body>
        <div id="wrap">
            <?php include("../../php/header.php"); ?>

            <!-- fixed image -->
            <img class="backgroundImg" src="../../images/main/main8.jpg" alt="backgroundImg">
            <div class="overlay"></div> <!-- overlay -->

            <div class="sectionBox">
                <section>
                    <div class="aboutContents">
                        <!-- main Text -->
                        <h2 class="mainText">SPECIAL</h2>
                        <h3 class="subText">글렌블리스와 함께 하는 즐길거리</h3>
        
                        <!-- contents -->
                        <div class="contentsBox">
                            <ul>
                                <li class="contentsList">
                                    <img class="contentsImg" src="../../images/special/pingpong.jpg" alt="탁구장">
                                    <div class="contentsTextBox">
                                        <h4 class="contentsTitle">탁구장</h4>
                                        <h5 class="contentsSubTitle">탁구대(4)/탁구채(8)</h5>
                                        <pre class="contentsDisc">
탁구대와 탁구채 무료로 대여가 가능합니다.
차와 커피가 있는 드링크바도 있습니다.
                                        </pre>
                                    </div>
                                </li>
                                <li class="contentsList">
                                    <div class="contentsTextBox">
                                        <h4 class="contentsTitle">족구장</h4>
                                        <h5 class="contentsSubTitle">족구대(2)/족구공(2)</h5>
                                        <pre class="contentsDisc">
야외에 족구가 가능한 족구 대가 설치되어있습니다.
배드민턴 채도 있으므로 배드민턴도 가능합니다.
                                        </pre>
                                    </div>
                                    <img class="contentsImg" src="../../images/special/football.jpg" alt="족구장">
                                </li>
                                <li class="contentsList">
                                    <img class="contentsImg" src="../../images/special/boardgame.jpg" alt="보드게임">
                                    <div class="contentsTextBox">
                                        <h4 class="contentsTitle">보드게임</h4>
                                        <h5 class="contentsSubTitle">할리갈리(3)/다빈치코드(2)/젠가(2)/브루마블(2)</h5>
                                        <pre class="contentsDisc">
보드게임 무료로 대여가 가능합니다.
보드게임 대여는 인포메이션에 말씀해주세요.
                                        </pre>
                                    </div>
                                </li>
                                <li class="contentsList">
                                    <div class="contentsTextBox">
                                        <h4 class="contentsTitle">바베큐장</h4>
                                        <h5 class="contentsSubTitle">2~4인당 숯/그릴(1)/집게(1)/가위(1)</h5>
                                        <pre class="contentsDisc">
실외 바비큐장의 경우 체크인 하루 전에 말씀해주세요.
최대 15명까지 들어가는 비닐하우스입니다.
                                        </pre>
                                    </div>
                                    <img class="contentsImg" src="../../images/special/barbecue.jpg" alt="바베큐장">
                                </li>
                                <li class="contentsList">
                                    <img class="contentsImg" src="../../images/special/seminar.jpg" alt="세미나실">
                                    <div class="contentsTextBox">
                                        <h4 class="contentsTitle">세미나실</h4>
                                        <h5 class="contentsSubTitle">빔프로젝터/테이블(6)/의자(21)/마이크(2)/에어컨</h5>
                                        <pre class="contentsDisc">
세미나실은 예약 운영 중입니다.
예약은(10:00 ~ 19:00)
010-8734-6373으로 연락주세요.
                                        </pre>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    
                </section>
                <?php include("../../php/footer.php"); ?>
            </div>
        </div>
    </body>
</html>



