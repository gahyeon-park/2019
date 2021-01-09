<?php
// link functions
include("../../php/common.php");

session_start();

// isset POST
isset($_POST['user_id']) || exit;
isset($_POST['user_pw']) || exit;
isset($_POST['submit']) || exit;

/* variables */
$login = false; // false : log out
                // true : log in

// open database
openDB($adminConn);

/* admin check */
// excute sql database
$sql = "SELECT * FROM `ADMIN` WHERE `ADMIN_USERID` = '" . $_POST["user_id"] . "';";

/* if success sql excute */
if(sqlDB($adminConn, $adminResult, $sql)) {
    if($admin = mysqli_fetch_assoc($adminResult)) {

        /* compare password */
        if($admin['ADMIN_USERPW'] == md5($_POST['user_pw'])) {

            /* success login */
            $login = true;
        }
    }
}

// close database
closeDB($adminConn, $adminResult);

/* final login */
if($login) {   // admin login
    $_SESSION['adminID'] = $admin['ADMIN_USERID'];
    $_SESSION['adminName'] = $admin['ADMIN_NAME'];
    $_SESSION['adminNick'] = $admin['ADMIN_NICKNAME'];

    echo "<script>alert('로그인 되었습니다.'); location = './adminMain.php';</script>";
}
else {
    echo "<script>alert('로그인에 실패하였습니다.'); history.back();</script>";
}
?>