<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

$ADM_ID = $_POST['id'];
$ADM_USERID = $_POST['userid'];
$ADM_NAME = $_POST['name'];
$ADM_NICKNAME = $_POST['nick'];

openDB($conn);

$sql = "UPDATE ADMIN SET 
    ADMIN_ID='$ADM_ID',
    ADMIN_USERID='$ADM_USERID',
    ADMIN_NAME='$ADM_NAME',
    ADMIN_NICKNAME='$ADM_NICKNAME'
        WHERE ADMIN_ID='$ADM_ID'
";

sqlDB($conn, $result, $sql);
closeDB($conn, $result);

echo "<script>alert('관리자정보가 수정되었습니다.'); history.back();</script>";
?>