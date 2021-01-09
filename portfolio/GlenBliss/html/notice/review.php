<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;
if($loginMember[0] == false){
    $loginMember[3] = 'none_nickname';
}

openDB($conn);
if(isset($_POST['submit'])){
    if($loginMember[0] == false){
        echo "<script>alert('로그인 후에 이용해주시기 바랍니다.');history.back();</script>";
    }else{
        $sql = "INSERT INTO REVIEW (`REV_CONTENTS`, `REV_MEM_USERID`, `REV_MEM_NICKNAME`, `REV_DATE`)
            VALUES ('{$_POST['content']}', '{$loginMember[1]}', '{$loginMember[3]}', '".date("Y-m-d H:i:s")."')";
        sqlDB($conn, $result, $sql);
    }
}


$sql = "SELECT * FROM REVIEW ORDER BY REV_ID DESC";
sqlDB($conn, $result, $sql);
while($row = mysqli_fetch_assoc($result)){
    @$ment_list .= "
        <div class='ment'>
            <div class='user'>
                <h1>".$row['REV_MEM_NICKNAME']." <span>(".$row['REV_MEM_USERID'].")</span></h1>
                <p>{$row['REV_DATE']}</p>
            </div>
            <div class='comment'>
                <p>{$row['REV_CONTENTS']}</p>
            </div>
    ";

        if($row['REV_MEM_NICKNAME'] == $loginMember[3]) {
            $ment_list .= "
                <div class='ment_btn'>
                    <form method='POST' action='../../php/notice/review_del.php'>
                        <input type='hidden' name='review_id' value='{$row['REV_ID']}'>
                        <button type='submit' name='submit'>삭제</button>
                    </form>
                </div>
            ";
        }

    $ment_list .= "
        </div>
        <div class='clear'></div>
    ";
};
closeDB($conn, $result);

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

        <link rel="stylesheet" href="../../css/notice/review.css">
        <script type="text/javascript" src="../../script/header.js"></script>
        <script type="text/javascript" src="../../script/notice/notice.js"></script>
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
                <h2>여행후기</h2>
                <div class='horizon1'></div>

                <table class='table'>
                    <form  method='POST' action='./review.php'>
                    <tr>
                        <td><textarea name='content' placeholder="글을 입력해주세요."></textarea></td>
                    </tr>
                    <tr>
                        <td><button type='submit' name='submit'>등록</button></td>
                    </tr>
                    </form>
                </table>

                <?=@$ment_list?>                
		<div class='space_box'></div>
            </div>

            <?php include("../../php/footer.php"); ?>
            
        </div>
    </body>
</html>
