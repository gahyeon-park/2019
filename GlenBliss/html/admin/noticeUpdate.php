<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;
$count=$_GET['id'];

$style_src = "<link rel='stylesheet' href='../../css/admin/adminNoticeAnswer.css'>";

openDB($conn);
$sql = "SELECT * FROM NOTICE WHERE NOTICE_ID='$count'";
sqlDB($conn, $result, $sql);
while($row = mysqli_fetch_assoc($result)){
    $title = $row['NOTICE_TITLE']."-> 게시글 수정";
    $table_list = "
    <div class='contents_head'>
        <button><a href='./adminMain.php?page=notice&notice_nav=notice'>목록</a></button>
    </div>
    <div class='contents_body'>&nbsp;
        <form action='./notice_update.php' method='POST'>
            <input type='hidden' name='id' value='{$row['NOTICE_ID']}'>
            <p>제목 : </p><input type='text' name='title' value='{$row['NOTICE_TITLE']}'><br><br>
            <p>내용 : </p><textarea type='text' name='contents' cols='70' rows='10'>{$row['NOTICE_CONTENTS']}</textarea>
    </div>
    <div class='contents_foot'>
        <div class='horizon2'></div>
        <button class='not_update_btn' type='submit'>수정하기</button>
        <div class='clear'></div>
        <div class='horizon2'></div>
        </form>
    </div>
    <div class='space_box'></div>
    ";
}
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
                <h2><?=@$title?></h2>
                <div class='horizon1'></div>

                <?=@$table_list?>
            </div>
        </div>
        <?=@$nav_src?>
        <script>
        </script>
    </body>
</html>