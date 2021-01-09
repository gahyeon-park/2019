<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

$MEM_ID = $_POST['id'];
$MEM_USERID = $_POST['userid'];
$MEM_NAME = $_POST['name'];
$MEM_SEX = $_POST['sex'];
$MEM_BIRTH = $_POST['birth'];
$MEM_NICKNAME = $_POST['nick'];
$MEM_PHONE = $_POST['phone'];
$MEM_ADDRESS = $_POST['addr'];
$MEM_EMAIL = $_POST['email'];

openDB($conn);

$sql = "UPDATE MEMBER SET 
    MEM_BIRTH='$MEM_BIRTH',
    MEM_NICKNAME='$MEM_NICKNAME',
    MEM_PHONE='$MEM_PHONE',
    MEM_ADDRESS='$MEM_ADDRESS',
    MEM_EMAIL='$MEM_EMAIL'
        WHERE MEM_ID='$MEM_ID'
";

sqlDB($conn, $result, $sql);
closeDB($conn, $result);

echo "<script>alert('회원정보가 수정되었습니다.'); history.back();</script>";
?>