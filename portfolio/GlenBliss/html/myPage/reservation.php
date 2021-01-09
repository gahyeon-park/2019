<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

/* 예약 데이터베이스 열기 */
openDB($resConn);

/* 예약 데이터베이스 자료 가져오기 */
$sql = "SELECT * FROM `RESERVATION` WHERE `RES_MEM_USERID` = '{$loginMember[1]}';";
sqlDB($resConn, $resResult, $sql);

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

        <link rel="stylesheet" href="../../css/myPage/reservation.css">
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
                <h2>예약내역</h2>
                <div class='horizon1'></div>
                <h2 class="reservationTitle">예약정보</h2>
                <table class="reservationArea">
                    <tr>
                        <th><p>예약상태</p></th>
                        <th><p>예약번호</p></th>
                        <th><p>예약일</p></th>
                        <th><p>예약자명</p></th>
                        <th><p>입실시간</p></th>
                        <th class="request"><p>고객 요청사항</p></th>
                    </tr>

                    <?php
                        /* 예약 데이터베이스 자료 가져오기 */
                        $sql = "SELECT * FROM `RESERVATION` LEFT JOIN `MEMBER` ON `RESERVATION`.`RES_MEM_USERID` = `MEMBER`.`MEM_USERID` WHERE `RES_MEM_USERID` = '{$loginMember[1]}';";
                        sqlDB($resConn, $resResult, $sql);

                        while($row = mysqli_fetch_assoc($resResult)) {
                            if($row['RES_PERMIT']   == 'N') $permitString = '입금대기';
                            else $permitString = '입금완료';

                            $reservationDate = date_format(date_create($row['RES_DATE']), "Y-m-d H:i");

                            echo <<<END
                            <tr>
                                <td><p>{$permitString}</p></td>
                                <td><p>{$row['RES_ID']}</p></td>
                                <td><p>{$reservationDate}</p></td>
                                <td><p>{$row['MEM_NAME']}</p></td>
                                <td><p>15:00</p></td>
                                <td><p>{$row['RES_VOID']}</p></td>
                            </tr>
END;
                        }
                    ?>
                </table>
                <h2 class="roomTitle">객실정보</h2>
                <table class="roomArea">
                    <tr>
                        <th class="checkInDate"><p>이용일</p></th>
                        <th><p>객실명</p></th>
                        <th><p>사용인원</p></th>
                        <th><p>총가격</p></th>
                    </tr>
                    <?php
                        /* 예약 데이터베이스 자료 가져오기 */
                        $sql = "SELECT * FROM `RESERVATION` LEFT JOIN `ROOM` ON `RESERVATION`.`RES_ROOM_ID` = `ROOM`.`ROOM_ID` WHERE `RES_MEM_USERID` = '{$loginMember[1]}';";
                        sqlDB($resConn, $resResult, $sql);

                        
                        while($row = mysqli_fetch_assoc($resResult)) {
                            $totalPrice = setMoneyComma($row['RES_PRICE']);
                            $checkinDate = date_format(date_create($row['RES_CHECKIN']), "Y-m-d");
                            $checkoutDate = date_format(date_create($row['RES_CHECKOUT']), "Y-m-d");

                            echo <<<END
                                <tr>
                                    <td><p>{$checkinDate} ~ {$checkoutDate}</p></td>
                                    <td><p>{$row['ROOM_NAME']}</p></td>
                                    <td><p>성인 {$row['RES_PERSONNEL_ADULT']}명, 아동 {$row['RES_PERSONNEL_CHILD']}명, 유아 {$row['RES_PERSONNEL_BABY']}명</p></td>
                                    <td><p>{$totalPrice}</p></td>
                                </tr>
END;
                        }
                    ?>
                </table>
                <!-- <h2 class="couponTitle">쿠폰정보</h2>
                <table class="couponArea">
                    <tr>
                        <th class="imgColumn"></th>
                        <th><p>쿠폰명</p></th>
                        <th><p>할인금액</p></th>
                    </tr>
                    <tr>
                        <td class="couponImg"><img class="myCouponImg" src="../../images/myPage/banner1.jpg" width="230px"></td>
                        <td><p>신규가입 혜택 쿠폰</p></td>
                        <td><p>-5%</p></td>
                    </tr>
                </table> -->
                <h2 class="paymentTitle">결제정보</h2>
                <div class="paymentArea">
                    <!-- <div class="rightPriceArea">
                        <div class="priceWrapper">
                            <div class="leftTitle">객실가격</div>
                            <div class="rightPrice">0</div>
                        </div>
                        <div class="discountWrapper">
                            <div class="leftTitle">할인금액</div>
                            <div class="rightPrice">-0</div>
                        </div>
                        <div class="priceWrapper">
                            <div class="leftTitle">총금액</div>
                            <div class="rightPrice">0</div>
                        </div>
                        <div class="resultWrapper">
                            <div class="leftTitle">무통장 입금</div>
                            <div class="rightPrice">0</div>
                        </div>
                    </div> -->
                    <div class="lowerNoticeArea">
                        <div class="accountArea">
                            <div class="leftAccount">226-402041-58806 박가현 (국민은행)</div>
                            <div class="rightAccount">399-105598-01-011지효남 (기업은행)</div>
                        </div>
                        <div class="paymentNoticeArea">둘 중 편하신 은행으로 입금하시면 됩니다.</div>
                    </div>
                </div>
                <!-- <button class="reservationBt">예약확인</button> -->
            </div> 

            <?php include("../../php/footer.php"); ?>

        </div>
    </body>
</html>
<?php
/* 예약 데이터베이스 닫기 */
closeDB($resConn, $resResult);

?>