<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;


$ADM_USERID = $_POST['userid'];
$ADM_USERPW = md5($_POST['userpw']);
$ADM_NAME = $_POST['name'];
$ADM_NICKNAME = $_POST['nick'];

echo $ADM_NAME.' '.$ADM_NICKNAME.' '.$ADM_USERID.' '.$ADM_USERPW;
openDB($conn);

$sql = "INSERT INTO ADMIN (`ADMIN_USERID`, `ADMIN_USERPW`, `ADMIN_NAME`, `ADMIN_NICKNAME`)
    VALUES(
        '$ADM_USERID',
        '$ADM_USERPW',
        '$ADM_NAME',
        '$ADM_NICKNAME'
    )
";

sqlDB($conn, $result, $sql);
closeDB($conn, $result);

echo "<script>alert('관리자가 생성되었습니다.'); history.back();</script>";
?>