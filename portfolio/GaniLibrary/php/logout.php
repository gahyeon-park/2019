<?php
    // 세션 없애기
    // setcookie('loginID', '', time() - 3600, '/');
    session_start();
    session_destroy();
?>
<meta http-equiv='refresh' content='0;url=../index.php'>