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

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="../../css/myPage/changePW.css">
        <script type="text/javascript" src="../../script/header.js"></script>
        <script type="text/javascript" src="../../script/notice.js"></script>
    </head>
    <body>
        <div id="wrap">

            <?php include("../../php/header.php"); ?>

            <div class='notice_nav'>
                <img class="noticeImg" src="../../images/myPage/myPage.jpg" alt='notice_img'>
                <div class="noticeNav">
                    <h1><a href="./myPage.php">회원정보</a>
                        <div class='underline'></div>
                    </h1>
                    <h1><a href="./reservation.php">예약내역</a>
                        <div class='underline'></div>
                    </h1>
                    <h1><a href="./myCoupon.php">&nbsp;&nbsp;쿠폰함</a>
                        <div class='underline'></div>
                    </h1>
                    <h1><a href="./changePW.php">&nbsp;비밀번호 변경</a>
                        <div class='underline underline5'></div>
                    </h1>
                </div>
            </div>

            <div class='contents'>
                <h2>환영합니다 <span><?=$loginMember[2]?></span>님</h2>
                <div class='horizon1'></div>
                <form action="../../php/myPage/changePassword.php" method='POST'>
                    <input type="hidden" name='user_id' value='<?=$loginMember[1]?>'>
                    <table class="myDataArea">
                        <tr>
                            <td class="leftTitles"><p class="leftTitle">비밀번호</p></td>
                            <td class="rightBoxes"><input class='text' type='password' name='user_pw'></td>
                        </tr>
                        <tr>
                            <td class="leftTitles"><p class="leftTitle">비밀번호 확인</p></td>
                            <td class="rightBoxes"><input class='text' type='password'></td>
                        </tr>
                    </table>   
                    <div class="lowerButtons">
                        <button type='submit' name='submit' class="lowerBt dataFix">수정 완료</button>
                    </div>                
                </form>
            </div> 

            <?php include("../../php/footer.php"); ?>

        </div>
    </body>
</html>