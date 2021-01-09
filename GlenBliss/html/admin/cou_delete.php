<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

$COU_ID = $_GET['id'];

$sql = "DELETE FROM COUPON WHERE COU_ID='$COU_ID'";

openDB($conn);
sqlDB($conn, $result, $sql);
closeDB($conn, $result);


echo "<script>alert('쿠폰이 삭제되었습니다.'); history.back();</script>";
?>