<?php
include("./common.php");

isset($_POST['name']) || exit;
isset($_POST['color']) || exit;
isset($_POST['weight']) || exit;
isset($_POST['type']) || exit;
isset($_POST['num']) || exit;

// $_POST['name'] = 'handTowel';
// $_POST['color'] = 2;
// $_POST['weight'] = 2;
// $_POST['type'] = "NUM";
// $_POST['num'] = 2;

openDB($productConn);

/* 받아온 값이 영어이름이라 아이디로 변환 */
$sql = "SELECT `ID` FROM `PRODUCT` WHERE `ENG_NAME`='{$_POST['name']}';";
sqlDB($productConn, $productResult, $sql);
$row = mysqli_fetch_assoc($productResult);
$product = $row["ID"];  // 최종 product id


/* 상품 금액 계산 */

/* 타입별 금액 가져오기 */
if($_POST['type'] == "num") {
    $sql = "SELECT `PRICE_NUM` FROM `PRICE` WHERE `PRODUCT_ID` = {$product};";
    sqlDB($productConn, $productResult, $sql);
    $row = mysqli_fetch_assoc($productResult);
    $typePrice = $row['PRICE_NUM'];
}
else {
    $sql = "SELECT `PRICE_SET` FROM `PRICE` WHERE `PRODUCT_ID` = {$product};";
    sqlDB($productConn, $productResult, $sql);
    $row = mysqli_fetch_assoc($productResult);
    $typePrice = $row['PRICE_SET'];
}

$price = (int)$typePrice * (int)$_POST['num'];  // 최종 상품 금액

$sql = "INSERT INTO `MYCART` VALUES ('', {$product}, {$_POST['color']}, {$_POST['weight']}, {$_POST['num']}, '{$_POST['type']}', {$price});";
sqlDB($productConn, $productResult, $sql);

closeDB($productConn, $productResult);

echo json_encode(array('result'=>true));
?>