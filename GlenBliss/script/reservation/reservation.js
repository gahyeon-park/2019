window.onload = function() {
    /* year month date day */
    function parseDate(ObjDate) {
        // translate obj to string
        let dateString = String(ObjDate);

        // parse string to array
        let parseDateArr = dateString.split(' ');

        parseDateArr[0] = getDay(parseDateArr[0]);
        parseDateArr[1] = Number(getMonth(parseDateArr[1]));
        parseDateArr[2] = Number(parseDateArr[2]);
        parseDateArr[3] = Number(parseDateArr[3]);

        // 0 : day, 1 : month, 2 : date, 3 : year, 4 : time
        return parseDateArr;
    }
    
    /* get dayString to korean */
    function getDay(dayString) {
        switch(dayString) {
            case 'Mon' :
                return '월';
            break;
            case 'Tue' :
                return '화';
            break;
            case 'Wed' :
                return '수';
            break;
            case 'Thu' :
                return '목';
            break;
            case 'Fri' :
                return '금';
            break;
            case 'Sat' :
                return '토';
            break;
            case 'Sun' :
                return '일';
            break;
            default :
            break;
        }
    }

    /* get monthString to number */
    function getMonth(monthString) {
        switch(monthString) {
            case 'Jan' :
                return 1;
            break;
            case 'Feb' :
                return 2;
            break;
            case 'Mar' :
                return 3;
            break;
            case 'Apr' :
                return 4;
            break;
            case 'May' :
                return 5;
            break;
            case 'Jun' :
                return 6;
            break;
            case 'Jul' :
                return 7;
            break;
            case 'Aug' :
                return 8;
            break;
            case 'Sep' :
                return 9;
            break;
            case 'Oct' :
                return 10;
            break;
            case 'Nov' :
                return 11;
            break;
            case 'Dec' :
                return 12;
            break;
            default :
            break;
        }
    }

    /* get max dateNum of month*/
    function getMaxDate(yearNum, monthNum) {
        switch(monthNum) {
            case 1 :
            case 3 :
            case 5 :
            case 7 :
            case 8 :
            case 10 :
            case 12 :
                return 31;
            break;
            case 2 :
                if(isLeapMonth(yearNum)) return 29;
                return 28;
            break;
            case 4 :
            case 6 :
            case 9 :
            case 11 :
                return 30;
            break;
            default :
            break;
        }
    }

    /* get date start position */
    function getStartDateNum(dateNum, dayString) {
        let dayNum = 0;
        let calDay = 0;

        switch(dayString) {
            case '월' :
                dayNum = 1;
            break;
            case '화' :
                dayNum = 2;
            break;
            case '수' :
                dayNum = 3;
            break;
            case '목' :
                dayNum = 4;
            break;
            case '금' :
                dayNum = 5;
            break;
            case '토' :
                dayNum = 6;
            break;
            case '일' :
                dayNum = 0;
            break;
            default :
            break;
        }

        // if(dateNum > dayNum) calDay = (dateNum - (6 - dayNum)) % 7;
        // else calDay = ((6 - dayNum) - dateNum) % 7;

        // if(calDay == 0) calDay = 6;
        // else calDay -= 1;

        calDay = (dayNum + 1) - (dateNum % 7);
        if(calDay < 0) calDay += 7;
        if(calDay == 7) calDay = 0;

        console.log("startNum", calDay);
        return calDay;
    }

    /* is leap Month? */
    function isLeapMonth(yearNum) {
        isLeap = false;
        
        if(yearNum % 4 == 0) isLeap = true;
        if(yearNum % 100 == 0 ) isLeap = false;
        if(yearNum % 400 == 0) isLeap = true;

        return isLeap;
    }
    
    /* date inner html */
    function setDateHtml(dateArr) {
        $("#nowDate").html(dateArr[3] + '년 ' + dateArr[1] + '월');
        console.log("what day", dateArr[0]);

        let startDate = getStartDateNum(dateArr[2], dateArr[0]);
        console.log('startDate' + startDate);
        let endDate = getMaxDate(dateArr[3], dateArr[1]);

        let i = 1;
        let calDate = 1;
        /* calender Row insert */
        while(i < 6) {
            let j = 0;

            while(j < 7) {
                 
                if((j >= startDate || i != 1) &&  calDate <= endDate) {
                    if(isPublicHoliday(dateArr[1], calDate)) {
                        $("#calenderRow" + i).append("<td id='publicHoliday' class='calenderTD date"+ calDate +"'>" + calDate);
                    }
                    else {
                        $("#calenderRow" + i).append("<td class='calenderTD date"+ calDate +"'>" + calDate);
                    }
                    calDate++;
                }
                else {
                    $("#calenderRow" + i).append("<td>");                    
                }
                $("#calenderRow" + i).append("</td>");
                
                j++;
            }
            i++;
        }

        setSideDateHtml(dateArr);
    }

    /* side Date inner Html */
    function setSideDateHtml(dateArr) {

        $("#selectDate").html("선택일 " + changeDateToDot(dateArr) + "(" + dateArr[0] + ")");

    }
    function changeDateToDot(dateArr) {
        let dateString = String(dateArr[2]);
        let monthString = String(dateArr[1]);

        if(dateArr[1] < 10) monthString = '0' + monthString;
        if(dateArr[2] < 10) dateString = '0' + dateString;

        return dateArr[3] + "." + monthString + "." + dateString;
    }
    /* reset calender html */
    function resetCalender() {
        $("#calenderRow1").html("");
        $("#calenderRow2").html("");
        $("#calenderRow3").html("");
        $("#calenderRow4").html("");
        $("#calenderRow5").html("");
    }

    /* find public holidays */
    function isPublicHoliday(monthNum, dateNum) {
        
        
        if(monthNum == 1 && dateNum == 1) return true;
        if(monthNum == 3 && dateNum == 1) return true;
        if(monthNum == 5 && dateNum == 5) return true;
        if(monthNum == 6 && dateNum == 6) return true;
        if(monthNum == 8 && dateNum == 15) return true;
        if(monthNum == 10 && dateNum == 3) return true;
        if(monthNum == 10 && dateNum == 9) return true;
        if(monthNum == 12 && dateNum == 25) return true;

        // 추석 (can not)
        if(monthNum == 9 && dateNum == 12) return true;
        if(monthNum == 9 && dateNum == 13) return true;
        if(monthNum == 9 && dateNum == 14) return true;

        // 설날 (can not)
        if(monthNum == 2 && dateNum == 4) return true;
        if(monthNum == 2 && dateNum == 5) return true;
        if(monthNum == 2 && dateNum == 6) return true;

        // 석가탄신일 (can not)
        if(monthNum == 4 && dateNum == 8) return true;
 
        return false;
    }

    /* selected Date Background Color */
    function setCssSelectedDate(dateNum) {
        $(".date" + dateNum).addClass("selectedDate");
    }

    /* check reservation */
    function checkReservation(dateObj) {
        console.log(dateObj.getFullYear(), dateObj.getMonth() + 1, dateObj.getDate(), dateObj.getDay());
        console.log(changeDateToDot(parseDate(nowDate)));

        $.ajax({
            url : '../../php/checkReservation.php',
            dataType : 'json',
            type : 'POST',
            data : {
                    'dateObj' : dateObj,
                    'year' : dateObj.getFullYear(),
                    'month' : dateObj.getMonth() + 1,
                    'date' : dateObj.getDate(),
                    'day' : dateObj.getDay(),
                    'dateString' : changeDateToDot(parseDate(nowDate))
            },
            success : function(result) {
                console.log(result);
                if(result['isSuccess'] == true) {
                    $("#roomTable").html(result['roomHTMLString']);
                }
            },
            error : function(result) {
                $("#roomTable").html('');
                console.log(result);
                function checkReservation(dateObj) {
                    console.log(dateObj.getFullYear(), dateObj.getMonth() + 1, dateObj.getDate());
                    $.ajax({
                        url : '../../php/checkReservation.php',
                        dataType : 'json',
                        type : 'POST',
                        data : {
                                'dateObj' : dateObj,
                                'year' : dateObj.getFullYear(),
                                'month' : dateObj.getMonth() + 1,
                                'date' : dateObj.getDate(),
                                'dateString' : changeDateToDot(parseDate(nowDate))
                        },
                        success : function(result) {
                            if(result['isSuccess'] == true) {
                                console.log(result);
                                $("#roomTable").html(result['roomHTMLString']);
                            }
                        },
                        error : function() {
                            $("#roomTable").html('');
                        }
                    });
                }
            }
        });
    }

    function calOverNum(eventTarget, roomID) {
        let targetPersonNum = Number($(eventTarget).val());

        let adultNum = Number($("#adultNum" + roomID).val());
        let childNum = Number($("#childNum" + roomID).val());
        let babyNum = Number($("#babyNum" + roomID).val());

        let periodNum = Number($("#period" + roomID).val());

        let personTotalNum = adultNum + childNum + babyNum;
        let standardNum = Number($("#standardNum" + roomID).val());
        let maxNum = Number($("#maxNum" + roomID).val());

        overNum = 0;

        // if((standardNum - personTotalNum) < 0) {
        //     overNum = targetPersonNum - (targetPersonNum - (personTotalNum - standardNum));
        //     console.log("overNum" , overNum);
        // }

        let tempStandardNum = standardNum;
        let adultOverNum = 0;
        let childOverNum = 0;
        let babyOverNum = 0;

        console.log(adultNum, standardNum);

        if(adultNum > tempStandardNum) {
            adultOverNum = adultNum - tempStandardNum;
        }        
        tempStandardNum -= adultNum - adultOverNum;
        
        if(childNum > tempStandardNum) {
            console.log(childNum, tempStandardNum);
            childOverNum = childNum - tempStandardNum;
        }        
        tempStandardNum -= childNum - childOverNum;
        if(babyNum > tempStandardNum) {
            babyOverNum = babyNum - tempStandardNum;
        }        
        tempStandardNum -= babyNum - babyOverNum;


        console.log(adultOverNum, adultOverNum, babyOverNum);
        let originPrice = Number($("#originPrice" + roomID).val());
        $("#adultOverNum" + roomID).attr("value", adultOverNum);
        $("#childOverNum" + roomID).attr("value", childOverNum);
        $("#babyOverNum" + roomID).attr("value", babyOverNum);

        resultPrice = (originPrice * periodNum) + (adultOverNum * 25000) + (childOverNum * 20000) + (babyOverNum * 10000);
        
        return resultPrice;

    }

    var nowDate = new Date();
    const constDate = new Date();

    setDateHtml(parseDate(nowDate));

    setCssSelectedDate(nowDate.getDate());

    /* 현재 날짜보다 이전 날짜는 예약 불가능 */
    if(nowDate > constDate) {
        checkReservation(nowDate);
    }
    else {
        $("#roomTable").html('<p class="noRoomText">예약 가능한 방이 없습니다.<p>');
    }

    /* calender Prev Button Click */
    $("#prev").click(function(e) {
        resetCalender();

        nowDate.setMonth(nowDate.getMonth() - 1);
        setDateHtml(parseDate(nowDate));
        setCssSelectedDate(nowDate.getDate());
        
        /* 현재 날짜보다 이전 날짜는 예약 불가능 */
        if(nowDate > constDate) {
            
            checkReservation(nowDate);
        }
        else {
            $("#roomTable").html('<p class="noRoomText">예약 가능한 방이 없습니다.<p>');
        }

        // console.log(nowDate);

            /* calender recode Click */
        $(".calenderTD").click(function(e) {

            $(".calenderTD").removeClass("selectedDate");

            $(this).addClass("selectedDate");
            nowDate.setDate($(this).html());

            setSideDateHtml(parseDate(nowDate));
            setCssSelectedDate(nowDate.getDate());

            /* 현재 날짜보다 이전 날짜는 예약 불가능 */
            if(nowDate > constDate) {

                checkReservation(nowDate);
            }
            else {
                $("#roomTable").html('<p class="noRoomText">예약 가능한 방이 없습니다.<p>');
            }
        });
    });

    /* calender Next Button Click */
    $("#next").click(function(e) {
        resetCalender();
        
        nowDate.setMonth(nowDate.getMonth() + 1);
        setDateHtml(parseDate(nowDate));
        setCssSelectedDate(nowDate.getDate());

            /* 현재 날짜보다 이전 날짜는 예약 불가능 */
            if(nowDate > constDate) {
                checkReservation(nowDate);
            }
            else {
                $("#roomTable").html('<p class="noRoomText">예약 가능한 방이 없습니다.<p>');
            }
        // console.log(nowDate);

            /* calender recode Click */
        $(".calenderTD").click(function(e) {
            $(".calenderTD").removeClass("selectedDate");

            $(this).addClass("selectedDate");
            nowDate.setDate($(this).html());

            setSideDateHtml(parseDate(nowDate));
            setCssSelectedDate(nowDate.getDate());

            /* 현재 날짜보다 이전 날짜는 예약 불가능 */
            if(nowDate > constDate) {
                
                checkReservation(nowDate);
            }
            else {
                $("#roomTable").html('<p class="noRoomText">예약 가능한 방이 없습니다.<p>');
            }            console.log("a" + nowDate);
        });
    });

    /* calender recode Click */
    $(".calenderTD").click(function(e) {
        $(".calenderTD").removeClass("selectedDate");
        
        $(this).addClass("selectedDate");
        nowDate.setDate($(this).html());
        
        setSideDateHtml(parseDate(nowDate));
        setCssSelectedDate(nowDate.getDate());
        

            /* 현재 날짜보다 이전 날짜는 예약 불가능 */
            if(nowDate > constDate) {
                
                checkReservation(nowDate);
            }
            else {
                $("#roomTable").html('<p class="noRoomText">예약 가능한 방이 없습니다.<p>');
            }    });

    // money comma
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

    $(window).change(function(e) {
        /* reservation input change */
        switch($(e.target).attr("class")) {
            case 'adultInput' :
            case 'childInput' :
            case 'babyInput' : 
                let roomTypeNum = $(e.target).attr("name").substr(5, 1);
                let resultPrice = calOverNum(e.target, roomTypeNum);

                // roomTypeNum = $(e.target).attr("name").substr(5, 1);

                // adultNum = Number($(e.target).val());
                // periodNum = Number($("#period" + roomTypeNum).val());

                // standardNum = Number($("#standardNum" + roomTypeNum).val());
                // maxNum = Number($("#maxNum" + roomTypeNum).val());
                // console.log("standardNum" , standardNum);
                // overNum = 0;

                
                // if((standardNum - adultNum) < 0) {
                //     overNum = adultNum - standardNum;
                //     console.log("overNum" , overNum);
                // }

                // console.log(roomTypeNum);
                // originPrice = Number($("#originPrice" + roomTypeNum).val());

                // resultPrice = (originPrice * periodNum) + (overNum * 10000);

                $("#totalPriceNum" + roomTypeNum).attr("value", resultPrice);
                $("#totalPrice" + roomTypeNum).html(setMoneyComma(resultPrice) + "원");
            break;
            case 'periodInput' :
                    let roomID = $(e.target).attr("name").substr(6, 1);
                    let result = calOverNum(e.target, roomID);
                    
                    $("#totalPriceNum" + roomID).attr("value", result);
                    $("#totalPrice" + roomID).html(setMoneyComma(result) + "원");
            break;
            
        }
    });

    /* is checked? */
    function isCheckBox(boxNum) {
        if($(".checkBox" + boxNum).prop("checked")) {
            return true;
        }
        return false;
    }

    $(window).click(function(e) {
        switch(e.target.id) {
            case 'reservationButton' :

                var reservationArr = new Array();
                let i = 1; 
                existCheck = false;
                checkPerson = true;

                    while(i <= $(".checkBox").length) {
                        var totalPerson = Number($("#adultNum" + i).val()) + Number($("#childNum" + i).val()) + Number($("#babyNum" + i).val());

                        if(isCheckBox(i)) {
                            existCheck = true;

                            if(totalPerson > Number($("#maxNum" + i).val())) {
                                checkPerson = false;                                
                            }
                            if(totalPerson < Number($("#standardNum" + i).val())) {
                                checkPerson = false;                                
                            }
                        

                            console.log(nowDate.getFullYear());

                            let checkoutDateObj = new Date(nowDate);
                            checkoutDateObj.setDate(Number(checkoutDateObj.getDate()) + Number($("#period" + i).val()));
                            console.log(checkoutDateObj);
                            
                            
                            let reservationDateObj = new Date();

                            let temp = {
                                userID : $("#loginID").val(),
                                checkinDate : nowDate.getFullYear() + '-' + (nowDate.getMonth() + 1) + '-' + nowDate.getDate(),
                                checkoutDate : checkoutDateObj.getFullYear() + '-' + (checkoutDateObj.getMonth() + 1) + '-' + checkoutDateObj.getDate(),
                                reservationDate : reservationDateObj.getFullYear() + '-' + (reservationDateObj.getMonth() + 1) + '-' + reservationDateObj.getDate() + ' ' + reservationDateObj.getHours() + ':' + reservationDateObj.getMinutes(),
                                roomID : $("#roomID" + i).val(),
                                roomName : $("#roomName" + i).html(),
                                personAdultNum : Number($("#adultNum" + i).val()),
                                personChildNum : Number($("#childNum" + i).val()),
                                personBabyNum : Number($("#babyNum" + i).val()),
                                overAdultNum : Number($("#adultOverNum" + i).val()),
                                overChildNum : Number($("#childOverNum" + i).val()),
                                overBabyNum : Number($("#babyOverNum" + i).val()),
                                totalPrice : Number($("#totalPriceNum" + i).val())
                            };

                            reservationArr.push(temp);
                        }
                        i++;
                    }

                
               if(existCheck) {
                   if(checkPerson) {
                       let dataJSON = JSON.stringify(reservationArr);
                       console.log(dataJSON);
                       
                       var xhttp = new XMLHttpRequest();
                       xhttp.onreadystatechange = function() {
                           if(this.readyState == 4 && this.status == 200) {
                               console.log(this.responseText);
                               window.open('./reservation_pay.php', '_self');
                           }
                       };
                       xhttp.open('POST', '../../php/reservation_jsonData.php', true);
                       xhttp.setRequestHeader("Content-type", 'application/json');
                       xhttp.send(dataJSON);
                   }
                   else {
                       alert("최대 인원 수를 확인해 주세요");
                   }
               }
               else {
                   alert("예약할 방을 선택해 주세요.");
               }
            break;
        }
    });
}