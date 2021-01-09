<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

/* json file Contents to array */
function getData() {
    $filePath = '../../php/reservationData.txt';
    
    file_exists($filePath) || die("is not exists");
    is_file($filePath) || die("is not file");
    is_readable($filePath) || die('can not readable');
    
    $fileContents = file_get_contents($filePath);
    
    return(json_decode($fileContents, true));
    
}

$reservationData = getData();   // 예약 정보 가져옴
$reservationPrice = setMoneyComma($reservationData[0]['totalPrice']);

/* open room database */
openDB($roomConn);

$sql = 'SELECT * FROM `ROOM` LEFT JOIN `ROOM_PRICE` ON `ROOM_PRICE_ID` = `PRICE_ID`;';
sqlDB($roomConn, $roomResult, $sql) || exit;

/* open member's coupon database */
openDB($memCouponConn);

$sql = "SELECT * FROM `MEM_COUPON` LEFT JOIN `COUPON` ON `MEM_COUPON`.`COU_ID` = `COUPON`.`COU_ID` WHERE `MEM_COUPON`.`MEM_USERID` = '{$loginMember[1]}' AND `MEM_COUPON`.`COU_USE` = 'N';";
sqlDB($memCouponConn, $memCouponResult, $sql);

?>

<!DOCTYPE HTML>
<html lang="ko">
	<head>
        <title>GlenBliss</title>
        <meta charset="UTF-8">
        
		<link rel="stylesheet" href="../../css/reset.css">
		<link rel="stylesheet" href="../../css/header.css">
		<link rel="stylesheet" href="../../css/footer.css">
        <link rel="stylesheet" href="../../css/reservation/reservation.css">
        <link rel="stylesheet" href="../../css/reservation/reservation_pay.css">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Raleway&display=swap" rel="stylesheet">
        
        <!-- x icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
        <script type="text/javascript" src="../../script/header.js"></script>
        <script type="text/javascript" src="../../script/reservation/reservation_pay.js"></script>

        <title>GlenBliss</title>
	</head>
	<body>
        <div id="wrap">
            <?php include("../../php/header.php"); ?>

            <!-- Reservation Check Section Start -->

            <input id="loginID" type="hidden" name='userID' value=<?=$loginMember[1]?>>
            <div class="contentsBox">
                <div class="reservation_nav">
                    <img src="../../images/reservation/reservation.jpg" alt="reserVation_Img">
                </div>
                <nav class="navBox">
                    <ul>
                        <li class='notUnderLine'>
                            <a href="#">예약하기</a>
                        </li>
                        <li class='underLine'>
                            <a href="#">결제하기</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <section>
                <article class='resInfoArticle'>
                    <h2 class='infoTitle'>예약정보</h2>
                    <table class="resInfoTable infoTable">
                        <tr class='infoTitleRow'>
                            <th>예약상태</th>
                            <th>예약번호</th>
                            <th>예약일</th>
                            <th>예약자명</th>
                            <th>입실시간</th>
                            <th>고객 요청사항</th>
                        </tr>
                        <tr class='infoRow'>
                            <td>입금대기</td>
                            <td>190901501</td>
                            <td><?=$reservationData[0]['reservationDate']?></td>
                            <td><?=$loginMember[2]?></td>
                            <td>15:00</td>
                            <td>-</td>
                        </tr>
                    </table>

                </article>
                <article class='roomInfoArticle'>
                    <h2 class='infoTitle'>객실정보</h2>
                    <table class="roomInfoTable infoTable">
                        <tr class='infoTitleRow'>
                            <th>이용일</th>
                            <th>객실명</th>
                            <th>사용인원</th>
                            <th>객실가격</th>
                            <th>추가금액</th>
                        </tr>
                        <?php
                            $i = 0;
                            $totalReservationPrice = 0;    // 전체 가격

                            while($i < count($reservationData)) {
                                $reservationPrice = setMoneyComma($reservationData[$i]['totalPrice']);

                                $adultOverPrice = $reservationData[$i]['overAdultNum'] * 25000;
                                $childOverPrice = $reservationData[$i]['overChildNum'] * 20000;
                                $babyOverPrice = $reservationData[$i]['overBabyNum'] * 10000;

                                $overTotalPrice = setMoneyComma($adultOverPrice + $childOverPrice + $babyOverPrice);
                                $roomPrice = setMoneyComma($reservationData[$i]['totalPrice'] - ($adultOverPrice + $childOverPrice + $babyOverPrice));

                                $totalReservationPrice += (int)$reservationData[$i]['totalPrice'];

                                echo <<<END
                                <tr class='infoRow'>
                                <td>{$reservationData[$i]['checkinDate']} ~ {$reservationData[$i]['checkoutDate']}</td>
                                <td>{$reservationData[$i]['roomName']}호</td>
                                <td>성인 {$reservationData[$i]['personAdultNum']}명, 아동 {$reservationData[$i]['personChildNum']}명, 유아 {$reservationData[$i]['personBabyNum']}명</td>
                                <td>{$roomPrice}</td>
                                <td>{$overTotalPrice}</td>
                            </tr>
END;
                                $i++;
                            }
                        ?>
                        
                    </table>

                </article>
                <article class='couponInfoArticle'>
                    <h2 class='infoTitle'>쿠폰정보</h2>
                    <table class="couponInfoTable infoTable">
                        <tr class='infoTitleRow'>
                            <th>쿠폰명</th>
                            <th>할인금액</th>
                        </tr>
                        <tr class='infoRow'>
                            <td class='noCouponBox'>
                                <div class="noCouponNameBox">
                                    <input id='couponID0' type="hidden" value='0'>
                                    <input id='couponSelect0' class='noRadioButton radioButton' type="radio" name='couponSelect' value='0' checked>
                                    <p class='noCoupon'>쿠폰 적용 안함</p>
                                </div>
                            </td>
                            <td class='noCouponDiscount'>-</td>
                        </tr>
                        <?php
                            $i = 1;
                            
                            while($row = @mysqli_fetch_assoc($memCouponResult)) {
                                echo <<<END
                                
                                <tr class='infoRow'>
                                    <td>
                                        <div class="couponNameBox">
                                            <input id='couponSelect$i' class='radioButton' type="radio" name='couponSelect' value='{$row['COU_SALE']}'>
                                            <input id='couponID$i' type="hidden" name='couponID' value='{$row['COU_ID']}'>
                                            <img class='couponImg' src="../../images/myPage/banner{$row['COU_ID']}.jpg" alt="쿠폰이미지">
                                            <p class='couponName'>{$row['COU_NAME']}</p>
                                        </div>
                                    </td>
                                    <td class='couponDiscount'>-{$row['COU_SALE']}%</td>
                                </tr>
                                
END;
                                $i++;
                            }
                        ?>
                    </table>

                </article>
                <article class='payInfoArticle'>
                    <h2 class='infoTitle'>결제정보</h2>
                        <div class='payInfoBox'>
                            <input id='totalPrice' type="hidden" name='totalPrice' value='<?=$totalReservationPrice?>'>
                            <div class="payInfoContentsBox">
                                <p class='payPrice'><?=setMoneyComma($totalReservationPrice)?></p>
                                <h4 class="payInfoTitle">객실가격</h4>
                            </div>
                            <div class="payInfoContentsBox">
                                <p id='couponDiscount' class='payPrice colorGray'>0</p>
                                <h4 class="payInfoTitle colorGray">할인금액</h4>
                            </div>
                            <div class="payInfoContentsBox">
                                <p id='payPrice' class='payPrice'><?=setMoneyComma($totalReservationPrice)?></p>
                                <h4 class="payInfoTitle">총금액</h4>
                            </div>
                            <div class="payInfoContentsBox">
                                <p id='payPrice2' class='payPrice colorGreen'><?=setMoneyComma($totalReservationPrice)?></p>
                                <h4 class="payInfoTitle">무통장입금</h4>
                            </div>
                            <div class='noticeTextBox'>
                                <div class='payNumberBox'>
                                    <p class='payNumver'>226-402041-58806 박가현 (국민 은행)</p>
                                    <p class='payNumver'>339-105598-01-011 지효남 (기업 은행)</p>
                                </div>
                                <p class='noticeText'>예약 날로부터 24시 이전까지 입금하시면 됩니다.</p>
                            </div>
                        </div>
                        <form action="../../php/setReservation.php" method='POST'>
                                                
                        <?php
                        $roomNum = count($reservationData);

                        echo "<input type='hidden' name='roomNum' value='{$roomNum}'>";
                        echo "<input id='couponID' type='hidden' name='couponID' value='0'>";

                        $i = 0;
                        while($i < $roomNum) {
                            echo <<<END
                                <input type="hidden" name='memberPID$i' value='{$reservationData[$i]['userID']}'>
                                <input type="hidden" name='checkinDate$i' value='{$reservationData[$i]['checkinDate']}'>
                                <input type="hidden" name='checkoutDate$i' value='{$reservationData[$i]['checkoutDate']}'>
                                <input type="hidden" name='reservationDate$i' value='{$reservationData[$i]['reservationDate']}'>
                                <input type="hidden" name='roomPID$i' value='{$reservationData[$i]['roomID']}'>
                                <input type="hidden" name='roomName$i' value='{$reservationData[$i]['roomName']}'>
                                <input type="hidden" name='adultNum$i' value='{$reservationData[$i]['personAdultNum']}'>
                                <input type="hidden" name='childNum$i' value='{$reservationData[$i]['personChildNum']}'>
                                <input type="hidden" name='babyNum$i' value='{$reservationData[$i]['personBabyNum']}'>
                                <input id='totalReservationPrice$i' type="hidden" name='totalPrice$i' value='{$totalReservationPrice}'>
END;
                            $i++;
                            }
                            ?>

                            <input type='submit' class="payButton" name='submit' value='결제하기'>
                        </form>
                </article>
            </section>
            <?php include("../../php/footer.php"); ?>
        </div>
	</body>
</html>
<?php
closeDB($roomConn, $roomResult);
closeDB($memCouponConn, $memCouponResult);
?>

