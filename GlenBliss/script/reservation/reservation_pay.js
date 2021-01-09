window.onload = function() {
    function setMoneyComma(moneyNum) {
        let moneyString = String(moneyNum);
        moneyString = moneyString.split('').reverse().join('');
        
        let moneyStringArr = new Array();

        let i = 0;
        while(i < moneyString.length) {
            if(i % 3 == 0) {
                moneyStringArr.push(moneyString.substr(i, i + 3));
                i++;
            }
            i++;
        }

        let resultString = moneyStringArr.join(',');
        resultString = resultString.split('').reverse().join('');

        return resultString;
    }

    /* coupon select */
    $(".radioButton").change(function(e) {
        let couponNum = e.target.id[12];

        let discountNum = Number($(e.target).val());
        let reservationPrice = Number($("#totalPrice").val());
        
        let discountPrice = reservationPrice * (discountNum / 100);
        

        // 사용쿠폰이 무엇인지
        $("#couponID").attr("value", $("#couponID" + couponNum).val());
        // 할인 금액 띄우기
        $("#couponDiscount").html(setMoneyComma(discountPrice));

        // 할인 금액을 뺀 총가격
        $("#payPrice").html(setMoneyComma(reservationPrice - discountPrice));
        $("#payPrice2").html(setMoneyComma(reservationPrice - discountPrice));
        $("#totalReservationPrice0").attr('value', reservationPrice - discountPrice);
        
    });
}