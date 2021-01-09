<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

$sql = "INSERT INTO NOTICE 
    (`NOTICE_TITLE`, `NOTICE_CONTENTS`,
     `NOTICE_MEM_USERID`, `NOTICE_MEM_NICKNAME`,
     `NOTICE_DATE`)
        VALUE
            ('{$_POST['title']}', '{$_POST['contents']}',
             '{$loginMember[2]}', '{$loginMember[3]}',
            '".DATE("Y-m-d h:i:s")."')
";

openDB($conn);
sqlDB($conn, $result, $sql);
closeDB($conn, $result);


echo "
    <script>
        alert('공지사항 게시글이 생성되었습니다.');
        location ='./adminMain.php?page=notice&notice_nav=notice';
    </script>
";
?>