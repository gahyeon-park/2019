<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

$NOTICE_ID = $_POST['id'];

$sql = "UPDATE NOTICE SET
    `NOTICE_TITLE`='{$_POST['title']}',
    `NOTICE_CONTENTS`='{$_POST['contents']}',
    `NOTICE_MEM_USERID`='{$loginMember[2]}',
    `NOTICE_MEM_NICKNAME`='{$loginMember[3]}',
    `NOTICE_DATE`='".date("Y-m-d H:i:s")."'
        WHERE NOTICE_ID='$NOTICE_ID'
";
openDB($conn);
sqlDB($conn, $result, $sql);
closeDB($conn, $result);


echo "
    <script>
        alert('공지사항 게시글이 수정되었습니다.');
        location='./adminMain.php?page=notice&notice_nav=notice&id=$NOTICE_ID';
    </script>
";
?>