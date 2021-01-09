window.onload = function() {
    var deleteTarget = '';

    updateMyCart();
    
    $(".fastMyCartButton").click(function(e) {
        var productName = $(e.target).attr("value");

        /* 나의 장바구니에 인풋값 세팅 */
        setFooterInput(productName);

        // 나의 장바구니 열기
        switchMyCart();
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