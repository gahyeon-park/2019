<?php
include('../common.php');

session_start();
$member = whoIsLogin();

/* 데이터베이스 열기 */
openDB($memberConn);

/* 데이터베이스 사용하기 */
$sql = "DELETE FROM `MEMBER` WHERE `MEM_USERID` = '{$member[1]}';";

if(sqlDB($memberConn, $memberResult, $sql) != -1) {
    closeDB($memberConn, $memberResult);
    session_destroy();
    echo "<script>alert('{$member[1]} 회원 탈퇴가 정상적으로 처리되었습니다.'); window.open('../../html/main/main.php', '_self');</script>";
}

/* 데이터베이스 닫기 */
closeDB($memberConn, $memberResult);
?>