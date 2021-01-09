window.onload = function() {
    var price = $("#numPrice").val();
    $("#detailPrice").html(setComma(price) + "원");

    setFooterInput($("input[name='thisProduct']").val());
    updateMyCart();

    /* 색상 선택시 이미지 전환 */
    $(".productColor").click(function(e) {
        $(".productColor").removeClass("colorSelected");

        var productName = $("input[name='thisProduct']").val();
        var colorName = $(e.target).attr("value");
        
        $("#bigProductImg").attr("src", "../images/" + productName + "/" + colorName + ".jpg");
        $(e.target).addClass("colorSelected");

        // value 변화
        $("input[name='productColor']").attr("value", colorName);
    });

    /* 전체 사진 보기 클릭시 */
    $("#totalImgButton").click(function(e) {
        $(".productColor").removeClass("colorSelected");

        var productName = $("input[name='thisProduct']").val();
        $("#bigProductImg").attr("src", "../images/" + productName + "/total.jpg");

    });

    /* 확대 사진 보기 클릭시 */
    $("#detailImgButton").click(function(e) {
        var imgPath = $("#bigProductImg").attr("src");

        $("#modalDetailImg").attr("src", imgPath);
    });

    /* 장바구니 담기 버튼 */
    $("#detailAddCartButton").click(function(e) {
        var canInsert = true;

        ($("input[name='productColor']").val() == 0) && (canInsert = false);
        ($("#productWeight").val() == 0) && (canInsert = false);

        if(canInsert) {
            var productName = $("input[name='thisProduct']").val();
            
            var colorName = $("img[class='productColor colorSelected']").attr("value");
            var colorID = $("input[name='" + colorName + "colorID']").val();

            var weightID = $("#productWeight").val();
            var productType = $("label[class='btn Detail radioInput active'] input").val();
            var productNum = $("#detailProductNum").val();

            console.log(colorID);
            console.log(weightID);
            console.log(productType);
            console.log(productNum);

            addProductToCart(productName, colorID, weightID, productType, productNum);
            updateMyCart();
            switchMyCart();
        }
        else {
            $("#moreOptionModal").modal();
        }
    });

    function setDetailPrice(target) {
        var typePrice = 0;

        /* 타입 별 금액 구하기 */
        if(target == 'num') {
            typePrice = Number($("#numPrice").val());
        }
        else {
            typePrice = Number($("#setPrice").val());
        }

        /* 갯수와 함께 계산 */
        var resultPrice = typePrice * $("#detailProductNum").val();

        return resultPrice;
    }
    /* 타입 변화시 금액 변동 */
    var targetType = "num";

    $(".Detail input[type='radio']").change(function(e) {
        targetType = $(e.target).val();
        var price = setDetailPrice(targetType);

        $("#detailPrice").html(setComma(price) + "원");
    });

    /* 상세 상품 갯수 인풋창 변화 */
    $("#detailProductNum").blur(function(e) {
        let tempNum = Number($("#detailProductNum").val());
        
        /* 숫자만 입력 */

        if(!tempNum) {
            $("#detailProductNum").val('1');
        }
        else if(tempNum < 1) {
            $("#detailProductNum").val('1');
        }
        else if(tempNum > 10) {
            $("#detailProductNum").val('10');
        }

        
        /* 수량 변화시 금액 변동 */
        var price = setDetailPrice(targetType);
        $("#detailPrice").html(setComma(price) + "원");
    });








    /* 공통 스크립트 */
    /* 나의 장바구니 직접 열기 */
    $("#myCartSwitchButton").click(function() {
        switchMyCart();
    });

    /* 상품명 인풋창 변화 */
    $("#productNameInput").change(function(e) {

        if($("#productNameInput").val() != "0") {
            setFooterInput($("#productNameInput").val());
        }
    });

    /* 상품 갯수 인풋창 변화 */
    $("#productNumInput").blur(function(e) {
        let tempNum = Number($("#productNumInput").val());
        
        /* 숫자만 입력 */

        if(!tempNum) {
            $("#productNumInput").val('1');
        }
        else if(tempNum < 1) {
            $("#productNumInput").val('1');
        }
        else if(tempNum > 10) {
            $("#productNumInput").val('10');
        }
    });

    /* 장바구니 추가 버튼 클릭 */
    $("#myCartPlusButton").click(function(e) {
        var canPlus = true;

        ($("#productNameInput").val() == "0") && (canPlus = false);
        ($("#weightInputBox").val() == "0") && (canPlus = false);

        if(canPlus) {
            /* 상품이름, 색상아이디, 중량아이디 */
            /* 세트-단품 */
            var productName = $("#productNameInput").val();
            var colorID = $(".colorBox[class='colorBox colorSelected']").attr("value");
            var weightID = $("#weightInputBox").val();
            var productType = $("label[class='btn radioInput active'] input").val();
            var productNum = $("#productNumInput").val();

            addProductToCart(productName, colorID, weightID, productType, productNum);
            updateMyCart();
        }
        else {
            $("#moreOptionModal").modal();
        }
    });
    
    /* 장바구니 목록 하나 삭제 */
    $("#myCartDeleteButton").click(function(e) {                 
        deleteCartList(deleteTarget);
        updateMyCart();
    });

    /* 모든 장바구니 삭제 */
    $("#myCartAllDeleteButton").click(function(e) {  
        let i = 0;
        while(i < $("#myCartList .myProduct").length) {
            deleteTarget = $($("#myCartList .myProduct")[i]).find(".deleteButton i").attr("value");
            
            deleteCartList(deleteTarget);
            i++;
        }               
        updateMyCart();
    });

    /* click 이벤트 안먹는 것.. */
    $(window).click(function(e) {
        switch($(e.target).attr("class")) {            
            /* 색상 선택 */
            case "colorBox" :
                $(".colorBox").removeClass("colorSelected");
                $(e.target).addClass("colorSelected");            
            break;

            /* 삭제 버튼 */
            case "xi-close-square-o xi-2x" :
                deleteTarget = $(e.target).attr("value");
            break;
        }
    });

}