<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

$RES_ID = $_GET['id'];

$sql = "UPDATE RESERVATION SET RES_PERMIT='Y' WHERE RES_ID='$RES_ID'";

openDB($conn);
sqlDB($conn, $result, $sql);
closeDB($conn, $result);


echo "<script>alert('입금이 확인되었습니다.'); history.back();</script>";
?>