<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

$style_src = "<link rel='stylesheet' href='../../css/admin/adminNoticeCreate.css'>";
?>


<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>GlenBliss Admin</title>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Raleway&display=swap" rel="stylesheet">
        
        <!-- x icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
        
        <!-- reset css link -->
        <link rel="stylesheet" href="../../css/reset.css">
        <!-- header css link -->
        <link rel="stylesheet" href="../../css/admin/adminHeader.css">
        <!-- footer css link -->
        <link rel="stylesheet" href="../../css/footer_main.css">

        <link rel="stylesheet" href="../../css/admin/adminMain.css" >

        <?=@$style_src?>
        
        <script src="../../script/header.js"></script>

    </head>
    <body>
        <div id="wrap">
            <?php include("./adminHeader.php"); ?>
            
            <div class='notice_nav'>
                <img src="../../images/notice/notice.jpg" alt='notice_img'>
            </div>
            <div class='contents'>
                <form action='./notice_create.php' method='POST'>
                <input type='text' name='title' placeholder='제목을 입력해주세요.'>
                <div class='horizon1'></div>

                <div class='contents_head'>
                    <button><a href='./adminMain.php?page=notice&notice_nav=notice'>목록</a></button>
                </div>
                <div class='contents_body'>&nbsp;
                    <textarea type='text' name='contents' cols='70' rows='10'>내용을 입력해주세요.</textarea>
                </div>
                <div class='contents_foot'>
                    <div class='horizon2'></div>
                    <button class='not_create_btn' type='submit'>글쓰기</button>
                    <div class='clear'></div>
                    <div class='horizon2'></div>
                </div>
                </form>
                <div class='space_box'></div>
            </div>
        </div>
        <?=@$nav_src?>
        <script>
        </script>
    </body>
</html>