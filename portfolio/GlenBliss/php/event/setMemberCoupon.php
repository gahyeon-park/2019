<?php
include('../common.php');

isset($_POST['submit']) || exit;

session_start();
if(@!isset($_SESSION['memberID'])) {
    echo "<script>alert('로그인 후 이용해 주세요.'); history.back();</script>";
    exit;
}

/* 유저 쿠폰 데이터베이스 열기 */
openDB($memCouponConn);

/* 가지고 있는 쿠폰인지 */
$sql = "SELECT * FROM `MEM_COUPON` WHERE `COU_ID` = '{$_POST['couponID']}' AND `MEM_USERID` = '{$_POST['userID']}';";

/* 이미 가지고 있는 쿠폰일 경우 */
if(sqlDB($memCouponConn, $memCouponResult, $sql) == 1){
    closeDB($memCouponConn, $memCouponResult);
    echo "<script>alert('이미 받으신 쿠폰입니다.'); history.back();</script>";
    exit;
}

/* 생일축하 쿠폰 */
if($_POST['couponID'] == '2') {
    $nowDate = Date('m');

    /* 현재 유저 생일 가져오기 */
    $sql = "SELECT `MEM_BIRTH` FROM `MEMBER` WHERE `MEM_USERID` = '{$_POST['userID']}';";
    sqlDB($memCouponConn, $memCouponResult, $sql);
    
    $memberBirth = date_create(mysqli_fetch_assoc($memCouponResult)['MEM_BIRTH']);
    $memberBirthMonth = date_format($memberBirth, 'm');

    /* 현재 달과 회원 달이 다를 때 */
    if($nowDate != $memberBirthMonth) {
        closeDB($memCouponConn, $memCouponResult);
        echo "<script>alert('회원님의 생일 달이 아닙니다.'); history.back();</script>";
        exit;
    }

}

/* 자료 삽입 */
$sql = "INSERT INTO `MEM_COUPON` VALUES('', '{$_POST['userID']}', '{$_POST['couponID']}', 'N', '');";
if(sqlDB($memCouponConn, $memCouponResult, $sql) != -1) {
    closeDB($memCouponConn, $memCouponResult);
    echo "<script>alert('정상적으로 쿠폰이 발급되었습니다.'); history.back();</script>";
    exit;
}

closeDB($memCouponConn, $memCouponResult);
echo "<script>alert('쿠폰 발급에 실패하였습니다.'); history.back();</script>";

/* 유저 쿠폰 데이어베이스 닫기 */
closeDB($memCouponConn, $memCouponResult);

?>