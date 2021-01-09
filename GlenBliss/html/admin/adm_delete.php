<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

$ADM_ID = $_GET['id'];

$sql = "DELETE FROM ADMIN WHERE ADMIN_ID='$ADM_ID'";

openDB($conn);
sqlDB($conn, $result, $sql);
closeDB($conn, $result);


echo "<script>alert('관리자정보가 삭제되었습니다.'); history.back();</script>";
?>