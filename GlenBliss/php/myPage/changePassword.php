<?php
include("../common.php");

isset($_POST['submit']) || exit;

/* 데이터 베이스 열기 */
openDB($memberConn);

$tempPW = md5($_POST['user_pw']);
$sql = "UPDATE `MEMBER` SET `MEM_USERPW` = '{$tempPW}' WHERE `MEM_USERID` = '{$_POST['user_id']}';";
if(sqlDB($memberConn, $memberResult, $sql) == -1) {
    /* 데이터 베이스 닫기 */
    closeDB($memberConn, $memberResult);
    echo "<script>alert('비밀번호 변경에 실패하였습니다.'); history.back();</script>";
}
else {
    /* 데이터 베이스 닫기 */
    closeDB($memberConn, $memberResult);
    echo "<script>alert('비밀번호가 정상적으로 변경되었습니다.'); history.back();</script>";
}

/* 데이터 베이스 닫기 */
closeDB($memberConn, $memberResult);
?>