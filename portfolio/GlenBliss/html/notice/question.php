<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;
if($loginMember[0] == false){
    $loginMember[3] = 'none_nickname';
}

    

$write_btn = "
    <script>
        $(function(){
            $('#write_btn').click(function(){
                if('{$loginMember[3]}' == 'none_nickname'){
                    alert('로그인 후에 이용해주시기 바랍니다.');
                }else{
                    location = './writing_page.php';
                }
            });
        });
    </script>
";

openDB($conn);


$sql = "SELECT * FROM NOTICE ORDER BY NOTICE_ID DESC LIMIT 4";
sqlDB($conn, $result, $sql);
while($row = mysqli_fetch_assoc($result)){
    @$table_list .= 
        "<tr>
            <td>공지</td>
            <td><a href='./notice_answer.php?id=\"{$row['NOTICE_ID']}\"'>".$row['NOTICE_TITLE']."</a></td>
            <td>".$row['NOTICE_MEM_NICKNAME']."</td>
            <td>{$row['NOTICE_DATE']}</td>
            <td>{$row['NOTICE_LOOK']}</td>
        </tr>
    ";
};


$sql = "SELECT * FROM INQUIRY ORDER BY INQ_ID DESC";
sqlDB($conn, $result, $sql);
$limit_cnt = mysqli_num_rows($result);
while($row = mysqli_fetch_assoc($result)){
    $table_list .=
        "<tr>
            <td>$limit_cnt</td>
            <td><a href='./question_answer.php?id=\"{$row['INQ_ID']}\"'>".$row['INQ_TITLE']."</a></td>
            <td>".$row['INQ_MEM_NICKNAME']."</td>
            <td>{$row['INQ_DATE']}</td>
            <td>{$row['INQ_LOOK']}</td>
        </tr>
        ";
    $limit_cnt--;
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

        <link rel="stylesheet" href="../../css/notice/question.css">
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
                    <h2>이용문의</h2>
                    <div class='horizon1'></div>
                    <div class='left_head'>
                        <img src="../../images/notice/Phone.png" alt='question'>
                        <p>
                            <span>010-8734-6373, 010-2246-1662</span><br>
                            전화 예약, 기타사항 : 09:00 ~ 22:00</h5><br>
                            (부재중 시 1시간 이내에 펜션에서 연락을 드리며,<br>
                            상담 시간 외의 시간에는 글쓰기를 사용 부탁드립니다.)
                        </p>
                    </div>
                    <div class='right_head'>
                        <h4>&lt; 입금계좌안내 &gt;</h4>
                        <div class='account1'>
                            <p>
                                국민<br>
                                226-402041-58806<br>
                                (예금주 박가현)
                            </p>
                        </div>
                        <div class='account2'>
                            <p>
                                기업<br>
                                399-105598-01-011<br>
                                (예금주 지효남)
                            </p>
                        </div>
                    </div>
                    <div class='clear'></div>
                    <div class='horizon2'></div>


                <table>
                    <tr>
                        <td>번호</td>
                        <td>제목</td>
                        <td>글쓴이</td>
                        <td>날짜</td>
                        <td>조회</td>
                    </tr>
                    <?=$table_list?>
                </table>

                <button id='write_btn'>글쓰기</button>
		<div class='space_box'></div>
            </div>

            <?php include("../../php/footer.php"); ?>
        </div>
        <?=$write_btn?>
    </body>
</html>
