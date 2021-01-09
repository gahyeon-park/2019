<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

/* 쿠폰 데이터베이스 열기 */
openDB($couponConn);

/* 쿠폰 데이터베이스 자료 꺼내오기 */
$sql = "SELECT * FROM `COUPON`";
sqlDB($couponConn, $couponResult, $sql);

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

        <link rel="stylesheet" href="../../css/event/event.css">
        <script type="text/javascript" src="../../script/header.js"></script>
        <script type="text/javascript" src="../../script/join/join.js"></script>
        <script type="text/javascript" src="../../script/event/event.js"></script>
    </head>
    <body>
        <div id="wrap">
            <?php include("../../php/header.php"); ?>

            <div class='banner'>
                <div>
                    <h1>EVENT</h1>
                    <p>쏟아지는 할인 혜택, 한 품 가득 챙겨드리는 글렌블리스</p>
                </div>
            </div>

            <div class="contents">
                <?php
                    while($row = mysqli_fetch_assoc($couponResult)) {
                        echo <<<END

                        <form action='../../php/event/setMemberCoupon.php' method='POST'>
                            <div class='couponBox'>
                                <input type='hidden' name='userID' value='{$loginMember[1]}'>
                                <input type='hidden' name='couponID' value='{$row['COU_ID']}'>
                                <img class='couponImg' src="../../images/coupon/{$row['COU_IMG_TEMP']}" alt="쿠폰">
                                <button type='submit' name='submit' class="couponButton">쿠폰받기</button>
                            </div>
                        </form>
END;
                    }
                ?>
            </div>
            <?php include("../../php/footer.php"); ?>

        </div>
    </body>
</html>
<?php

/* 쿠폰 데이터베이스 닫기 */
closeDB($couponConn, $couponResult);
?>
