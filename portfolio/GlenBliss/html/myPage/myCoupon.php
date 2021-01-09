<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

/* 쿠폰 데이터베이스 열기 */
openDB($couponConn);

/* 쿠폰 데이터 베이스 자료 꺼내오기 */
$sql = "SELECT * FROM `MEM_COUPON` LEFT JOIN `COUPON` ON `MEM_COUPON`.`COU_ID` = `COUPON`.`COU_ID` WHERE `MEM_USERID` = '{$loginMember[1]}';";
if(sqlDB($couponConn, $couponResult, $sql) == -1) exit;
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

        <link rel="stylesheet" href="../../css/myPage/myCoupon.css">
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
                <h2>나의 쿠폰함</h2>
                <div class='horizon1'></div>
                <h2 class="couponTitle">쿠폰정보</h2>
                <table class="myCouponsArea">
                    <tr>
                        <th class="imgColumn"></th>
                        <th><p>쿠폰명</p></th>
                        <th><p>발행일</p></th>
                        <th><p>할인금액</p></th>
                        <th><p>유효기간</p></th>
                    </tr>
                    <?php
                        while($row = mysqli_fetch_assoc($couponResult)) {
                            if($row['COU_USE'] == 'N') {
                                echo <<<END
                                <tr>
                                    <td><img src="../../images/coupon/{$row['COU_SIMG_TEMP']}" width="170px"></td>
                                    <td><p>{$row['COU_NAME']}</p></td>
                                    <td><p>2019-09-15</p></td>
                                    <td><p>-{$row['COU_SALE']}%</p></td>
                                    <td><p>2019-09-15 ~ 2019-09-30</p></td>
                                </tr>
END;
                            }
                        }
                    ?>
                </table>
            </div> 
            
            <?php include("../../php/footer.php"); ?>

        </div>
    </body>
</html>
<?php
closeDB($couponConn, $couponResult);
?>