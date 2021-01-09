<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;
$count = $_GET['id'];

openDB($conn);

$sql = "SELECT * FROM NOTICE";
sqlDB($conn, $result, $sql);
$max =  mysqli_num_rows($result);


$sql = "SELECT * FROM NOTICE WHERE `NOTICE_ID` = $count";
sqlDB($conn, $result, $sql);

while($row = mysqli_fetch_assoc($result)){
    $title = $row['NOTICE_TITLE'];
    $content = $row['NOTICE_CONTENTS'];
    $writer = $row['NOTICE_MEM_NICKNAME'];
    $date = $row['NOTICE_DATE'];
};

closeDB($conn, $result);
echo "<script>var id_num = $count; var id_max = $max;</script>";
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

        <link rel="stylesheet" href="../../css/notice/notice_answer.css">
        <script type="text/javascript" src="../../script/header.js"></script>
        <script type="text/javascript" src="../../script/notice.js"></script>
    </head>
    <body>
        <div id="wrap">
            <?php include("../../php/header.php"); ?>

            <div class='notice_nav'>
                <img src="../../images/notice/notice.jpg" alt='notice_img'>
                <div>
                    <h1><a href="./notice.php">공지사항</a>
                        <div class='underline'></div>
                    </h1>
                    <h1><a href="./question.php">이용문의</a>
                        <div class='underline'></div>
                    </h1>
                    <h1><a href="./review.php">여행후기</a>
                        <div class='underline'></div>
                    </h1>
                    <h1><a href="./guide.php">예약안내</a>
                        <div class='underline'></div>
                    </h1>
                </div>
            </div>

            <div class='contents'>
                <div class='contents_head'>
                    <h1><?=$title?></h1>
                    <button><a href="./notice.php">목록</a></button>
                    <div class='horizon1'></div>
                </div>
                <div class='contents_body'>&nbsp;
                    <div class='write_date'>
                        <p>
                            작성일 : <?=$date?><br>
                            작성자 : <?=$writer?>
                        </p>
                    </div>
                    <p><?=$content?></p>
                </div>
                <div class='contents_foot'>
                    <div class='horizon2'></div>
                    <button id='prev'>이전글</button>
                    <button id='next'>다음글</button>
                    <div class='clear'></div>
                    <div class='horizon2'></div>
                </div>
            </div>

            <?php include("../../php/footer.php"); ?>
            
        </div>
        <script>
            id_num = Number(id_num);
            id_max = Number(id_max);
            $(function(){
                if(id_num == 1){
                    $("#next").click(function(){
                        alert("마지막 글입니다.");
                    });
                }else{
                    $("#next").click(function(){
                        location = './notice_answer.php?id="'+(id_num-1)+'"';
                    });
                }
                if(id_max == id_num){
                    $("#prev").click(function(){
                        alert("마지막 글입니다.");
                    });
                }else{
                    $("#prev").click(function(){
                        location = './notice_answer.php?id="'+(id_num+1)+'"';
                    });
                }
            });
        </script>
    </body>
</html>