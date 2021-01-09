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
        <link rel="stylesheet" href="../../css/room/room_doubleRoom.css">

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
                    <a href="./room_detail.php?roomNum=101">
                        <div class="roomBoxS">
                            <img src="../../images/room/room_main/num1.jpg" alt="방1" class="roomImg">
                            <h3 class="roomName">101</h3>
                            <p class="roomDisc">더블침대1, 개별바베큐</p>
                        </div>
                    </a>
                    <a href="./room_detail.php?roomNum=102">
                        <div class="roomBoxS">
                            <img src="../../images/room/room_main/num2.jpg" alt="방2" class="roomImg">
                            <h3 class="roomName">102</h3>
                            <p class="roomDisc">더블침대1, 스파</p>
                        </div>
                    </a>
                    <a href="./room_detail.php?roomNum=103">
                        <div class="roomBoxS">
                            <img src="../../images/room/room_main/num5.jpg" alt="방4" class="roomImg">
                            <h3 class="roomName">103</h3>
                            <p class="roomDisc">더블침대1, 개별바베큐</p>
                        </div>
                    </a>
                    <a href="./room_detail.php?roomNum=104">
                        <div class="roomBoxS">
                            <img src="../../images/room/room_main/num6.jpg" alt="방5" class="roomImg">
                            <h3 class="roomName">104</h3>
                            <p class="roomDisc">더블침대1, 개별바베큐, 스파</p>
                        </div>
                    </a>
                </article>
            </section> 

            <?php include("../../php/footer.php"); ?>

        </div>
    </body>
</html>



