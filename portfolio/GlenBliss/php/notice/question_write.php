<?php
include("../common.php");
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

isset($_POST['submit']) || exit;
isset($_POST['title']) || exit;
isset($_POST['contents']) || exit;

$title = $_POST['title'];
$contents = $_POST['contents'];

openDB($conn);

$ins_sql = "INSERT INTO INQUIRY (`INQ_TITLE`, `INQ_CONTENTS`, `INQ_MEM_USERID`, `INQ_MEM_NICKNAME`,`INQ_DATE`)
    VALUES ('$title', '$contents', '{$loginMember[2]}', '{$loginMember[3]}', '".date("Y-m-d H:i:s")."')";

sqlDB($conn, $result, $ins_sql);

$sql = "SELECT * FROM INQUIRY";

sqlDB($conn, $result, $sql);
$view_pnt = mysqli_num_rows($result);

closeDB($connonn, $result);

echo "<script> location='../../html/notice/question_answer.php?id=".($view_pnt)."' </script>";
?>