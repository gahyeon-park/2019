<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

$INQ_ID = $_GET['id'];

$sql = "DELETE FROM INQUIRY WHERE INQ_ID='$INQ_ID'";

openDB($conn);
sqlDB($conn, $result, $sql);
closeDB($conn, $result);


echo "<script>alert('이용문의 게시글이 삭제되었습니다.'); history.back();</script>";
?>