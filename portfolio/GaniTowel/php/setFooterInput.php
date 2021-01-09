<?php
include("./common.php");

isset($_POST['name']) || exit;

/* 해당 상품 데이터베이스 열기 */
openDB($productConn);
openDB($colorConn);
openDB($weightConn);

/* 해당 상품 데이터베이스 자료 꺼내기 */
$productSql = "SELECT * FROM `PRODUCT` LEFT JOIN `PRICE` ON `PRODUCT`.`ID` = `PRICE`.`PRODUCT_ID` WHERE `ENG_NAME`='{$_POST['name']}';";
sqlDB($productConn, $productResult, $productSql);
$productRow = mysqli_fetch_assoc($productResult);

/* 해당 상품 색상 자료 꺼내기 */
$colorSql = "SELECT * FROM `COLOR` WHERE `PRODUCT_ID`='{$productRow['ID']}';";
sqlDB($colorConn, $colorResult, $colorSql);

$colorArr = array();
while($colorRow = mysqli_fetch_assoc($colorResult)) {
    array_push($colorArr, $colorRow);
}

/* 해당 상품 중량 자료 꺼내기 */
$weightSql = "SELECT * FROM `WEIGHT` WHERE `PRODUCT_ID`='{$productRow['ID']}';";
sqlDB($weightConn, $weightResult, $weightSql);

$weightArr = array();
while($weightRow = mysqli_fetch_assoc($weightResult)) {
    array_push($weightArr, $weightRow);
}

$resultArr = array(
    "result"=>true,
    "name"=>$productRow['NAME'],
    "engName"=>$productRow['ENG_NAME'],
    "color"=>$colorArr,
    "weight"=>$weightArr
);

/* 데이터베이스 닫기 */
closeDB($productConn, $productResult);
closeDB($colorConn, $colorResult);
closeDB($weightConn, $weightResult);

echo json_encode($resultArr);
?>