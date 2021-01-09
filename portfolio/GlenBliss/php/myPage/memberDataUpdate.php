<?php
include("../common.php");

isset($_POST['submit']) || exit;

/* 유저 데이터베이스 열기 */
openDB($memberConn);

/* 데이터베이스 사용하기 */
session_start();
$sql = "UPDATE `MEMBER` SET `MEM_NICKNAME`='{$_POST['user_nickName']}', `MEM_SEX`='{$_POST['user_sex']}', `MEM_PHONE`='{$_POST['user_hp']}', `MEM_EMAIL`='{$_POST['user_email']}', `MEM_ADDRESS` = '{$_POST['user_addr']}' WHERE `MEM_USERID` = '{$_SESSION['memberID']}'; ";

if(sqlDB($memberConn, $memberResult, $sql) != -1) {
    /* 유저 데이터베이스 닫기 */
    closeDB($memberConn, $memberResult);
    echo "<script>alert('회원 정보 수정이 완료되었습니다.'); window.open('../../html/myPage/myPage.php', '_self');</script>";
}
else {
    /* 유저 데이터베이스 닫기 */
    closeDB($memberConn, $memberResult);
    echo "<script>alert('회원 정보 수정에 실패하였습니다.'); window.open('../../html/myPage/myPage.php', '_self');</script>";
}

/* 유저 데이터베이스 닫기 */
closeDB($memberConn, $memberResult);
?>