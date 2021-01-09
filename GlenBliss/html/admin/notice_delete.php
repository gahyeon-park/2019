<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

$NOT_ID = $_GET['id'];

$sql = "DELETE FROM NOTICE WHERE NOTICE_ID='$NOT_ID'";

openDB($conn);
sqlDB($conn, $result, $sql);
closeDB($conn, $result);


echo "<script>alert('공지사항 게시글이 삭제되었습니다.'); history.back();</script>";
?>