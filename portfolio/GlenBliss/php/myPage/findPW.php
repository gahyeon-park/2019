<?php

include("../common.php");

openDB($conn);

$sql = "SELECT `MEM_USERID` FROM `MEMBER` WHERE `MEM_NAME` = '{$_POST['NameInput']}' AND `MEM_USERID` = '{$_POST['IdInput']}' AND `MEM_BIRTH` = '{$_POST['DayInput']}'";


$idArr = array();
if(sqlDB($conn, $result, $sql) == 1) {
    while($row = mysqli_fetch_assoc($result)) {
    }
}
else {
    closeDB($conn, $result);
    echo "<script>alert('해당하는 비밀번호가 없습니다.'); history.back();</script>";
    exit;
}

closeDB($conn, $result);

echo <<<END
    <script>
        window.open('../../html/find_pw/change_pw.php?user_id={$_POST['IdInput']}','_self');
    </script>
END;



?>