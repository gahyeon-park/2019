<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

$RES_ID = $_GET['id'];

$sql = "DELETE FROM RESERVATION WHERE RES_ID='$RES_ID'";

openDB($conn);
sqlDB($conn, $result, $sql);
closeDB($conn, $result);


echo "<script>alert('예약 내역이 삭제되었습니다.'); history.back();</script>";
?>