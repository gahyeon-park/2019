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

        <link rel="stylesheet" href="../../css/notice/writing_page.css">
        <script type="text/javascript" src="../../script/header.js"></script>
        <script type="text/javascript" src="../../script/notice/notice.js"></script>
    </head>
    <body>
        <div id="wrap">
            <?php include("../../php/header.php"); ?>

            <div class='notice_nav'>
                <img src="../../images/notice/notice.jpg" alt='notice_img'>
                <div>

                </div>
            </div>

            <div class='contents'>
                <div class='contents_head'>
                    <form method='POST' action='../../php/notice/question_write.php'>
                    <p class="Wrt_Title">제목</p> <input type="text" class="WritingTitle" name="title" placeholder="&nbsp;&nbsp;제목을 작성해주세요." tabindex="1">
                    <div class='horizon1'></div>
                </div>
                <div class='contents_body'>&nbsp;
                    <div class='write_date'>
                    
                    </div>
                    <br>
                    
                    <textarea class="WritingContents" name="contents" placeholder="&nbsp;&nbsp;내용을 작성해주세요."tabindex="2"></textarea>
                </div>
                <div class='contents_foot'>
                    <div class='horizon2'></div>
                    <button type='submit' name='submit' id='next' tabindex="3">글쓰기</button>
                    </form>
                    <button id='back'>목록</button>
                    <div class='clear'></div>
                    <div class='horizon2'></div>
                </div>
            </div>

            <?php include("../../php/footer.php"); ?>
        </div>
    </body>
</html>