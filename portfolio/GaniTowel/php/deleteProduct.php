<?php
include("./common.php");

isset($_POST['ID']) || exit;

openDB($cartConn);

$sql = "DELETE FROM `MYCART` WHERE `ID`={$_POST['ID']};";
sqlDB($cartConn, $cartResult, $sql);

closeDB($cartConn, $cartResult);

echo json_encode(array('result'=>true));
?>