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
else {
    closeDB($conn, $result);
    echo "<script>alert('해당하는 아이디가 없습니다.'); history.back();</script>";
    exit;
}

closeDB($conn, $result);

$idString = join(',', $idArr);
echo <<<END
    <script>
        alert('회원님의 아이디는 $idString 입니다');
        history.back();
    </script>
END;



?>