<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

$MEM_ID = $_GET['id'];

$sql = "DELETE FROM MEMBER WHERE MEM_ID='$MEM_ID'";

openDB($conn);
sqlDB($conn, $result, $sql);
closeDB($conn, $result);


echo "<script>alert('회원정보가 삭제되었습니다.'); history.back();</script>";
?>