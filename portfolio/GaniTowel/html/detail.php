<?php
include("../php/common.php");

isset($_GET['productName']) || exit;

/* 해당 상품 데이터베이스 열기 */
openDB($productConn);
openDB($colorConn);
openDB($weightConn);

/* 해당 상품 데이터베이스 자료 꺼내기 */
$productSql = "SELECT * FROM `PRODUCT` LEFT JOIN `PRICE` ON `PRODUCT`.`ID` = `PRICE`.`PRODUCT_ID` WHERE `ENG_NAME`='{$_GET['productName']}';";
sqlDB($productConn, $productResult, $productSql);
$productRow = mysqli_fetch_assoc($productResult);

/* 해당 상품 색상 자료 꺼내기 */
$colorSql = "SELECT * FROM `COLOR` WHERE `PRODUCT_ID`='{$productRow['ID']}';";
sqlDB($colorConn, $colorResult, $colorSql);

/* 해당 상품 중량 자료 꺼내기 */
$weightSql = "SELECT * FROM `WEIGHT` WHERE `PRODUCT_ID`='{$productRow['ID']}';";
sqlDB($weightConn, $weightResult, $weightSql);

?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <!-- x icon -->
        <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">

        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">

        <!-- bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <!-- css -->
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/detail/detail.css">

        <!-- javascript -->
        <script src="../script/common.js"></script>
        <script src="../script/detail.js"></script>
        <title>GANI TOWEL</title>
    </head>
    <body>
        <div id='wrap'>

            <?php include("./header.php"); ?>
            
            <input type="hidden" name="thisProduct" value="<?=$productRow['ENG_NAME']?>">
            <section class="productDetailSection">
                <div class="productImgBox">
                    <img id="bigProductImg" class="productImg" src="../images/<?=$productRow['ENG_NAME']?>/total.jpg" alt="타월이미지">
                    <button id="detailImgButton" class="productDetailImgButton" data-toggle="modal" data-target="#detailImgModal">확대 사진</button>
                    <button id="totalImgButton" class="productTotalImgButton">전체 사진</button>
                </div>
                
                <div class="productDetail" action="#">
                    <h3 class="productTitle"><?=$productRow['NAME']?></h3>
                    <input type="hidden" name="productName">
                
                    <label class="productInputBox" for="productColor">색상
                        <input type="hidden" name="productColor" value="0">

                        <?php
                            while($colorRow = mysqli_fetch_assoc($colorResult)) {
                                echo <<<END
                                <img class="productColor" src="../images/color/{$colorRow['IMAGE']}" value="{$colorRow['NAME']}">
                                <input type="hidden" name="{$colorRow['NAME']}colorID" value="{$colorRow['ID']}">
END;
                            }
                        ?>
                        <!--  colorSelected" -->
                    </label>

                    <!-- 중량 선택 인풋창 -->
                    <label class="productInputBox" for="productWeight">중량
                        <select class='form-control selectInput' name="productWeight" id="productWeight">
                            <option value="0">중량 선택</option>

                            <?php
                            while($weightRow = mysqli_fetch_assoc($weightResult)) {
                                echo <<<END
                                <option value="{$weightRow['ID']}">{$weightRow['WEIGHT_NUM']}g</option>
END;
                            }
                            ?>
                        </select>       
                    </label>

                    <!-- 단품, 세트 선택 라디오 버튼 -->
                    <div class="btn-group radioInputBox productInputBox" data-toggle="buttons">수량
                        <div class="radioInputBox">
                            <label class="btn Detail radioInput active">
                                <input type="radio" name="detailProductType" value="num" id="numRadio" checked>&nbsp;&nbsp;단품(1개씩)
                            </label>
                            <label class="btn Detail radioInput">
                                <input type="radio" name="detailProductType" value="set" id="setRadio">&nbsp;&nbsp;세트(10개씩, 3000원 할인)
                            </label>
                        </div>
                        <input id="detailProductNum" class='numberInput' type="number" name='detailProductNum' value='1' min='1' max='10'> 
                    </div>

                    <input id="numPrice" type='hidden' name='numPrice' value="<?=$productRow['PRICE_NUM']?>">
                    <input id="setPrice" type='hidden' name='setPrice' value="<?=$productRow['PRICE_SET']?>">
                    <p id="detailPrice" class="productPrice"><?=$productRow['PRICE_NUM']?>원</p>
                    <button id="detailAddCartButton" class="myCartButton">장바구니 담기</button>

                </div>
            </section>

            <?php include("./footer.php"); ?>

<!-- =============== 모달 창 =================== -->
            <!-- 확대하기 버튼 -->
            <div id="detailImgModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal body -->
                        <div class="modal-body">
                            <img id="modalDetailImg" class="modalDetailImg" src="../images/<?=$productRow['ENG_NAME']?>/total.jpg" alt="확대사진">
                        </div>
        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
        
                    </div>
                </div>
            </div>


        </div>    
    </body>
</html>
<?php

/* 데이터베이스 닫기 */
closeDB($productConn, $productResult);
closeDB($colorConn, $colorResult);
closeDB($weightConn, $weightResult);
?>