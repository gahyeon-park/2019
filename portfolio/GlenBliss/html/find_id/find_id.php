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

        <link rel="stylesheet" href="../../css/find_id/find_id.css">

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script src="../../script/header.js"></script>

        <script type="text/javascript" src="../../script/find_id/find_id.js"></script>
    </head>
    <body>
        <div id="wrap">
            <?php include("../../php/header.php"); ?>

            <div class='find_nav'>
                <img src="../../images/find_id/main10.jpg" alt='findimg'>
                <div>
                    <h1><a href="../../html/find_id/find_id.php">아이디찾기</a>
                        <div class="underline"></div>
                    </h1>
                    <h1><a href="../../html/find_pw/find_pw.php">비밀번호찾기</a>
                        <div class="underline"></div>
                    </h1>

                </div>
            </div>

            <div class="contents">
                <h2>아이디찾기</h2>
                <div class="horizon1"></div>
                <form id="userFind" name="" action="../../php/myPage/findID.php" method="POST">
                    <div class="FindBox_main">
                        <div class="FindBox_sub">
                            <div class="FindBox_ment">
                                <p>이름</p>
                                <p>이메일</p>
                            </div>
                            <div class="UserInput">
                                <input type="text" class="NameInput" id="NameInput" name="NameInput" placeholder=" ex) 지효남 (2~4)한글" required>
                                
                                <input type="text" class="EmailInput" id="EmailInput" name="EmailInput" placeholder=" ex) GlenBliss@gmail.com" required>
                                <br>
                            </div>
                            
                        </div>
                        <div class="checkBox" id="checkBox">
                            <div id="checkSuccessName"></div>
                            <div id="checkSuccessEmail"></div>
                        </div>
                        <button type="submit" class="SearchBox" id="SearchBox" disabled>찾기</button>
                    </div>
                </form>
            </div>

            <?php include("../../php/footer.php"); ?>
        </div>
    </body>
</html>