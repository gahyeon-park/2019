<?php

include("../common.php");

openDB($conn);

$sql = "SELECT `MEM_USERID` FROM `MEMBER` WHERE `MEM_NAME` = '{$_POST['NameInput']}' AND `MEM_EMAIL` = '{$_POST['EmailInput']}'";


$idArr = array();
if(sqlDB($conn, $result, $sql) == 1) {
    while($row = mysqli_fetch_assoc($result)) {
        array_push($idArr, $row['MEM_USERID']);
    }
}

$idString = $idArr.join(',');
echo "<script>alert('회원님의 아이디는 <br>" + $idString + "<br>입니다'); history.back();</script>";

closeDB($conn, $result);


?>