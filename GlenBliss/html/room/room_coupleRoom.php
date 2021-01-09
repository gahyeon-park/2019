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
        <link rel="stylesheet" href="../../css/room/room_main.css">
        <link rel="stylesheet" href="../../css/room/room_coupleRoom.css">

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
        <script src="../../script/header.js"></script>
        <script src="../../script/room/room.js"></script>
    </head>
    <body>
        <div id="wrap">
                <?php include("../../php/header.php"); ?>
            
            <!-- room Main Page -->
            <section>
                <div class="roomMainHeader">
                    <h2>당신의 객실을 선택하세요</h2>
                    <nav class="roomMainNav">
                        <ul class="roomMainMenuBox">
                            <li class="roomMainMenu">
                                <a href="../../html/room/room_main.php" class="roomMainMenuText">전체보기</a>
                            </li>
                            <li class="roomMainMenu">
                                <a href="../../html/room/room_doubleRoom.php" class="roomMainMenuText">더블룸</a>
                            </li>
                            <li class="roomMainMenu">
                                <a href="../../html/room/room_coupleRoom.php" class="roomMainMenuText">커플룸</a>
                            </li>
                            <li class="roomMainMenu">
                                <a href="../../html/room/room_familyRoom.php" class="roomMainMenuText">패밀리룸</a>
                            </li>
                            <li class="roomMainMenu">
                                <a href="../../html/room/room_partyRoom.php" class="roomMainMenuText">파티룸</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <article class="roomArticle">
                        <a href="./room_detail.php?roomNum=201">
                            <div class="roomBoxS">
                                <img src="../../images/room/room_main/num3.jpg" alt="방3" class="roomImg">
                                <h3 class="roomName">201</h3>
                                <p class="roomDisc">더블침대1, 싱글침대1, 개별바베큐</p>
                            </div>
                        </a>
                        <a href="./room_detail.php?roomNum=202">
                            <div class="roomBoxS">
                                <img src="../../images/room/room_main/num7.jpg" alt="방6" class="roomImg">
                                <h3 class="roomName">202</h3>
                                <p class="roomDisc">더블침대1, 싱글침대1, 개별바베큐</p>
                            </div>
                        </a>
                        <a href="./room_detail.php?roomNum=203">
                            <div class="roomBoxS">
                                <img src="../../images/room/room_main/num9.jpg" alt="방7" class="roomImg">
                                <!-- dddd -->
                                <h3 class="roomName">203</h3>
                                <p class="roomDisc">더블침대1, 화장실2, 스파</p>
                            </div>
                        </a>
                </article>
            </section> 

            <?php include("../../php/footer.php"); ?>

        </div>
    </body>
</html>



