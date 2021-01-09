    var isClick = true;    // 클릭 스위치
        
    /* 나의 장바구니 열고 닫기 */
    function switchMyCart() {
        if(isClick) {
            $("#myCartBox").css("bottom", "0px");
            $("#myCartSwitchButton").removeClass("xi-angle-up");
            $("#myCartSwitchButton").addClass("xi-angle-down");

            isClick = false;
        }
        else {
            $("#myCartBox").css("bottom", "-430px");
            $("#myCartSwitchButton").removeClass("xi-angle-down");
            $("#myCartSwitchButton").addClass("xi-angle-up");
        
            isClick = true;
        }
    }

    /* 해당 상품 중량 옵션 설정 */
    function setWeightInput(weightArr) {
        var i = 0;
        var htmlString = '<option id="productWeightInputNone" value="0">중량 선택</option>';

        while(i < weightArr.length) {
            htmlString += `
                <option value="${weightArr[i]['ID']}">${weightArr[i]['WEIGHT_NUM']}g</option>
            `;
            i++;
        }

        $("#weightInputBox").html(htmlString);
    }

    /* 해당 상품 색상 옵션 설정 */
    function setColorInput(colorArr) {
        var i = 0;
        var htmlString = "";
        while(i < colorArr.length) {
            if(i == 0) {
                htmlString += `
                    <img class='colorBox colorSelected' src="../images/color/${colorArr[i]['IMAGE']}" value="${colorArr[i]['ID']}">
                `;
            }
            else {
                htmlString += `
                    <img class='colorBox' src="../images/color/${colorArr[i]['IMAGE']}" value="${colorArr[i]['ID']}">
                `;
            }
            i++;
        }
        $("#productColorBox").html(htmlString);
    }

    /* 풋터 인풋 세팅 */
    function setFooterInput(productName) {
        $.ajax({
            url:"../php/setFooterInput.php",
            dataType: 'json',
            type: 'POST',
            data: {
                name: productName
            },
            success: function(result) {
                if(result['result'] == true) {
                    $("#productNameInput option[value='" + productName + "']").prop("selected", "true");
                    setWeightInput(result['weight']);
                    setColorInput(result['color']);
                }
            }
        });
    }
    /* 나의 장바구니 인풋값 리셋 */
    function resetInputMyCart() {
        $("#productNameInputNone").prop("selected", "true");
        $("#productWeightInputNone").prop("selected", "true");
        $("#numRadio").prop("selected", "true");
    }

    /* 나의 장바구니에 상품 추가 */
    function addProductToCart(Pname, Pcolor, Pweight, Ptype, Pnum) {
        $.ajax({
            url:"../php/addProduct.php",
            dataType: 'json',
            type: 'POST',
            data: {
                name: Pname,
                color: Pcolor,
                weight: Pweight,
                type: Ptype,
                num: Pnum
            },
            success: function(result) {
                if(result['result'] == true) {
                    $("#myCartAddModal").modal();
                }
            }
        }); 
    }

    /* 장바구니 갱신 */
    function updateMyCart() {
        $.ajax({
            url:"../php/updateMyCart.php",
            dataType: 'json',
            type: 'POST',
            data: {
                data: true
            },
            success: function(result) {
                $("#myCartList").html("");

                if(result.length == 0) {
                    $("#myCartList").html("");
                    $("#myCartTotalPrice").html(setComma(0));

                    return;
                }
                else if(result[0]['result'] == true) {
                    
                    var i = 0;
                    var htmlString = "";
                    var totalPrice = 0;     // 총 금액 변수

                    while(i < result.length) {
                        /* 총금액 더하기 */
                        totalPrice += Number(result[i]['price']);

                        /* 단품, 세트 문자열 */
                        var typeString = "";
                        if(result[i]['type'] == "num") {
                            typeString = "단품";
                        }
                        else {
                            typeString = "세트";
                        }

                        /* 가격 문자열 */
                        var priceString = setComma(result[i]['price']);
                        htmlString += `
                        <li class='myProduct'>
                            <p class='product productNum'>${i + 1}</p>
                            <p class='product productName'>${result[i]['name']}</p>
                            <p class='product productWeight'>${result[i]['weight']}g</p>
                            <p class='product productType'>${typeString}</p>
                            <p class='product productTypeNum'>${result[i]['num']}개</p>
                            <img class='product productColor' src="../images/color/${result[i]['colorImg']}">
                            <p class='product totalPriceNum'>${priceString}원</p>
    
                            <button class='deleteButton' data-toggle="modal" data-target="#myCartDeleteModal"><i class='xi-close-square-o xi-2x' value='${result[i]['ID']}' data-toggle="modal" data-target="#myCartDeleteModal"></i></button>
                        </li>
                        `;

                        i++;
                    }
                    $("#myCartList").html(htmlString);
                    $("#myCartTotalPrice").html(setComma(totalPrice));

                }
            }
        }); 
    }

    function deleteCartList(listID) {
        $.ajax({
            url:"../php/deleteProduct.php",
            dataType: 'json',
            type: 'POST',
            data: {
                ID: listID
            },
            success: function(result) {
                if(result['result'] == true) {
                    console.log("Complete Delete!");
                }
            }
        }); 
    }
    /* 가격 콤마 찍기 */
    function setComma(num) {
        var tempNum = String(num);
        var reverseNum = tempNum.split("").reverse().join("");
        var resultString = "";

        var i = 0;
        while(i < reverseNum.length) {
            if( i % 3 == 0 && i != 0) {
                resultString += ",";        
            }
            resultString += reverseNum[i];
            i++;
        }

        resultString = resultString.split("").reverse().join("");

        return resultString;
    }
    