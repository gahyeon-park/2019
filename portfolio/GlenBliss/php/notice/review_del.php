<?php
include("../common.php");

isset($_POST['submit']) || exit;
isset($_POST['review_id']) || exit;

openDB($conn);

$del_sql = "DELETE FROM `REVIEW` WHERE `REV_ID` = '{$_POST['review_id']}'";

sqlDB($conn, $result, $del_sql);

closeDB($memberConn, $memberResult);

echo "<script>alert('리뷰가 삭제되었습니다.'); window.open('../../html/notice/review.php','_self'); </script>";
?>