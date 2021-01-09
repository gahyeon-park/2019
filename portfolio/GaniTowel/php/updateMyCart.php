<?php
include("./common.php");

isset($_POST['data']) || exit;

openDB($cartConn);
openDB($productConn);
openDB($colorConn);
openDB($weightConn);

/* 장바구니 항목 가져오기 */
$sql = "SELECT * FROM `MYCART`";
sqlDB($cartConn, $cartResult, $sql);

$cartListArr = array();
while($row = mysqli_fetch_assoc($cartResult)) {
    
    /* 상품 아이디 자료 */
    $sql = "SELECT * FROM `PRODUCT` WHERE `ID`={$row['PRODUCT_ID']};";
    sqlDB($productConn, $productResult, $sql);
    $productRow = mysqli_fetch_assoc($productResult);
    
    /* 색상 아이디 자료 */
    $sql = "SELECT * FROM `COLOR` WHERE `ID`={$row['COLOR_ID']};";
    sqlDB($colorConn, $colorResult, $sql);
    $colorRow = mysqli_fetch_assoc($colorResult);

    /* 중량 아이디 자료 */
    $sql = "SELECT * FROM `WEIGHT` WHERE `ID`={$row['WEIGHT_ID']};";
    sqlDB($weightConn, $weightResult, $sql);
    $weightRow = mysqli_fetch_assoc($weightResult);

    $pushArr = array(
        'result'=>true,
        'ID'=>$row['ID'],
        'name'=>$productRow['NAME'],
        'weight'=>$weightRow['WEIGHT_NUM'],
        'type'=>$row['PRICE_TYPE'],
        'num'=>$row['PRODUCT_NUM'],
        'colorID'=>$colorRow['ID'],
        'colorName'=>$colorRow['NAME'],
        'colorImg'=>$colorRow['IMAGE'],
        'price'=>$row['PRICE']
    );
    
    array_push($cartListArr, $pushArr);
}

closeDB($cartConn, $cartResult);
closeDB($productConn, $productResult);
closeDB($colorConn, $colorResult);
closeDB($weightConn, $weightResult);

echo json_encode($cartListArr);
?>