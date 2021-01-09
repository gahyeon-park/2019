<?php
include("../common.php");

isset($_POST['submit']) || exit;
isset($_POST['notBotInput']) || exit;

/* captcha check */
if($_POST['notBotInput'] != $_POST['notBot']) {
    echo "<script>alert('자동등록방지를 잘못 입력하셨습니다.'); history.back(); </script>";
}

$canInsert = false; // can Insert = true
                    // cannot Insert = false;

openDB($memberConn);

/* find same user id */
$sql = "SELECT * FROM `MEMBER` WHERE `MEM_USERID` = '" . $_POST['user_id'] . "'";
/* if input is not exist == can insert */
if(sqlDB($memberConn, $memberResult, $sql) == 0) $canInsert = true;

/* INSERT!! */
if($canInsert) {
    $user_pw = md5($_POST['user_pw']);
    $sql = "INSERT INTO `MEMBER` VALUES ('', '{$_POST['user_id']}', '{$user_pw}', '{$_POST['user_name']}', '{$_POST['user_nickName']}', '{$_POST['user_hp']}', '{$_POST['user_addr']}', '{$_POST['user_email']}', '{$_POST['user_sex']}', '{$_POST['user_year']}-{$_POST['user_month']}-{$_POST['user_date']}', '');";
    if(sqlDB($memberConn, $memberResult, $sql) == 0) {
        echo '<script>alert("회원가입이 완료되었습니다!");</script>';
    }
}
else {
    echo '<script>alert("회원가입에 실패하였습니다.");</script>';
}

closeDB($memberConn, $memberResult);
?>
<meta http-equiv='refresh' content='0;url=../../html/main/main.php'>
