<?php
// link functions
include("./common.php");

session_start();

// isset POST
isset($_POST['user_id']) || exit;
isset($_POST['user_pw']) || exit;
isset($_POST['submit']) || exit;

/* variables */
$login = false; // false : log out
                // true : log in

// open database
openDB($memberConn);

/* member check */
// excute sql database
$sql = "SELECT * FROM `MEMBER` WHERE `MEM_USERID` = '" . $_POST["user_id"] . "';";

/* if success sql excute */
if(sqlDB($memberConn, $memberResult, $sql)) {
    if($member = mysqli_fetch_assoc($memberResult)) {

        /* compare password */
        if($member['MEM_USERPW'] == md5($_POST['user_pw'])) {

            /* success login */
            $login = true;
        }
    }
}

// close database
closeDB($memberConn, $memberResult);

/* final login */
if($login) {   // member login
    $_SESSION['memberID'] = $member['MEM_USERID'];
    $_SESSION['memberName'] = $member['MEM_NAME'];
    $_SESSION['memberNick'] = $member['MEM_NICKNAME'];

    echo "<script>alert('로그인 되었습니다.'); history.back();</script>";
}
else {
    echo "<script>alert('로그인에 실패하였습니다.'); history.back();</script>";
}
?>