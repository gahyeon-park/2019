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
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Raleway&display=swap" rel="stylesheet">
        
        <!-- x icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
        
        <!-- reset css link -->
        <link rel="stylesheet" href="../../css/reset.css">
        <!-- header css link -->
        <link rel="stylesheet" href="../../css/header.css">
        <!-- footer css link -->
        <link rel="stylesheet" href="../../css/footer_main.css">

        <link href="../../css/main/main.css" rel="stylesheet">
        
        <script src="../../script/header.js"></script>
        <script src="../../script/main.js"></script>

    </head>
    <body>
        <div id="wrap">
            <?php include("../../php/header.php"); ?>

            <div class='imgs'>
                <ul class='slide'>
                    <li class='slide1'><img src="../../images/main/main1.jpg" alt="main"></li>
                    <li class='slide2'><img src="../../images/main/main2.jpg" alt="main"></li>
                    <li class='slide3'><img src="../../images/main/main3.jpg" alt="main"></li>
                    <li class='slide4'><img src="../../images/main/main4.jpg" alt="main"></li>
                    <li class='slide5'><img src="../../images/main/main5.jpg" alt="main"></li>
                    <li class='slide6'><img src="../../images/main/main6.jpg" alt="main"></li>
                    <li class='slide7'><img src="../../images/main/main7.jpg" alt="main"></li>
                    <li class='slide8'><img src="../../images/main/main8.jpg" alt="main"></li>
                    <li class='slide9'><img src="../../images/main/main9.jpg" alt="main"></li>
                    <li class='slide10'><img src="../../images/main/main10.jpg" alt="main"></li>
                    <li class='slide11'><img src="../../images/main/main11.jpg" alt="main"></li>
                    <li class='slide12'><img src="../../images/main/main12.jpg" alt="main"></li>
                </ul>
            </div>
            <div class='footer_btn'>
                <button id='footer_btn'>Call Me</button>
                <div class='horizon'></div>
            </div>
            <div class='btn'>
                <button id='prev'><</button>
                <p>01 / 12</p>
                <button id='next'>></button>
            </div>
            <div class='phrase'>
                <h1>GlenBliss</h1>
                <h3>자연 속 위치한 펜션에서 <span>Glen</span></h3>
                <h3>다시 없을 행복을 <span>Bliss</span></h3>
            </div>

            <?php include("../../php/footer.php"); ?>
        </div>
    </body>
</html>