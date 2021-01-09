<?php

isset($_POST['submit']) || exit;

include('./common.php');

openDB($resConn);

$i = 0;
$isComplete = 0;

$roomTotalPrice = (int)$_POST['totalPrice0'] / (int)$_POST['roomNum'];
while($i < (int)$_POST['roomNum']) {
    $sql = "INSERT INTO `RESERVATION` VALUES('', '{$_POST['memberPID' . $i]}', '{$_POST['checkinDate' . $i]}', '{$_POST['checkoutDate' . $i]}', '{$_POST['reservationDate' . $i]}', '{$_POST['roomPID' . $i]}', '{$_POST['adultNum' . $i]}', '{$_POST['childNum' . $i]}', '{$_POST['babyNum' . $i]}', '{$roomTotalPrice}', 'N', '');";
    $isComplete = sqlDB($resConn, $resResult, $sql);
    $i++;
}

/* 쿠폰 사용으로 바꾸기 */
if($_POST['couponID'] != '0') {
    $sql = "UPDATE `MEM_COUPON` SET `COU_USE` = 'Y' WHERE `COU_ID`={$_POST['couponID']};";
    sqlDB($resConn, $resResult, $sql);
}

if($isComplete != -1) {
    closeDB($resConn, $resResult);
    echo "<script>alert('입금대기로 예약을 완료하였습니다.'); window.open('../html/reservation/reservation.php', '_self');</script>";
}
else {
    closeDB($resConn, $resResult);
    echo "<script>alert('예약에 실패하였습니다.'); window.open('../html/reservation/reservation.php', '_self');</script>";
}
?>
