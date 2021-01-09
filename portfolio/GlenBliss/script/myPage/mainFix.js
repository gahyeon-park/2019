window.onload = function() {

    function regExpTrue(myStrningT)
{
    $("#" + myStrningT).css("border", "1px solid #37b54a");
}

// 정규식이 틀리면 보더 레드
function regExpFalse(myStrningF)
{
    $("#" + myStrningF).css("border", "1px solid red");
}

// 인풋값 공백이면 다시 롤백
function inputVoide(voidInput, switchBox)
{    
    $("#" + switchBox).prop("disabled", true);
    $("#" + switchBox).css("background-color", "#999999");
    $("#" + voidInput).css("border","1px solid #a19385");
}

function inputRetun(switchBox)
{
    $("#" + switchBox).css("background-color", "#999999");
    $("#" + switchBox).prop("disabled", true);
}



function AllSuccess(passArr, switchBox)
{
    console.log("in function");
    let isPass = false;
    let i = 0;
    while(i < passArr.length) 
    {
        
        if(passArr[i] == true) 
        {
            console.log("passArr" + i + " : true");
            isPass = true;
        }
        else 
        {
            console.log("passArr" + i + " : false");
            isPass = false;
        }
        i++; 
    }

    if(isPass == true) {
        $("#" + switchBox).prop("disabled", false);
        $("#" + switchBox).css("background-color", "#3f3222");

    }
    else {
        $("#" + switchBox).prop("disabled", true);
        $("#" + switchBox).css("background-color", "#999999");

    }
}

function switchBoxCheck(switchBox)
{
    $("#" + switchBox).click(function(e) {
        if($("#" + switchBox).prop("disabled") == true) 
        {
            alert("disabled true");
        }
        else
        {
            alert("disabled false");  
        }
    });
}
    var passArry = [true, true, true, true];

    regExpTrue("userNick");
    regExpTrue("userPhone");
    regExpTrue("userEmail");
    regExpTrue("userAddr");

    $("#userEmail").change(function()
    {
        var Email_val = $("#userEmail").val();
        var regExp_Email = /^[_\.0-9a-zA-Z-]{1,63}@([0-9a-zA-Z][0-9a-zA-Z-]+\.){1,255}[a-zA-Z]{2,6}$/i;

        if(regExp_Email.test(Email_val))
        {
            passArry[3] = true;
            regExpTrue("userEmail");
            AllSuccess(passArry, "SearchBox");
        }
        else
        {
            regExpFalse("userEmail");
            passArry[3] = false;

            if(Email_val == "")
            {
                inputVoide("userEmail", "SearchBox");
                passArry[3] = false;
            }
            else if(!regExp_Email.test(Email_val))
            {
                inputRetun("SearchBox");
            }
        }
        //switchBoxCheck("SearchBox");
    });
    
    $("#userAddr").change(function()
    {
        var Addr_val = $("#userAddr").val();
        var regExp_Addr = /^[가-힣0-9a-zA-Z\s]{2,20}$/;
        Addr_val.replace(/ /g,"");

        if(regExp_Addr.test(Addr_val))
        {
            
            passArry[4] = true;
            regExpTrue("userAddr");
            AllSuccess(passArry, "SearchBox");
        }
        else
        {
            regExpFalse("userAddr");
            passArry[4] = false;

            if(Addr_val == "")
            {
                inputVoide("userAddr", "SearchBox");
                passArry[4] = false;
            }
            else if(!regExp_Addr.test(Addr_val))
            {
                inputRetun("SearchBox");
            }
        }
        //switchBoxCheck("SearchBox");
    });

    
    $("#userPhone").change(function()
    {
        var Phone_val = $("#userPhone").val();
        var regExp_Phone =  /^01(0|1[6-9])(\d{3}|\d{4})(\d{4})$/;

        if(regExp_Phone.test(Phone_val))
        {
            passArry[2] = true;
            regExpTrue("userPhone");
            AllSuccess(passArry, "SearchBox");
        }
        else
        {
            regExpFalse("userPhone");
            passArry[2] = false;

            if(Phone_val == "")
            {
                inputVoide("userPhone", "SearchBox");
                passArry[2] = false;
            }
            else if(!regExp_Phone.test(Phone_val))
            {
                inputRetun("SearchBox");
            }
        }
        //switchBoxCheck("SearchBox");
    });

    $("#userNick").change(function()
    {
        var Nick_val = $("#userNick").val();
        var regExp_Nick = /^[A-Za-z0-9가-힣]{2,6}$/;

        if(regExp_Nick.test(Nick_val))
        {
            passArry[1] = true;
            regExpTrue("userNick");
            AllSuccess(passArry, "SearchBox");
        }
        else
        {
            regExpFalse("userNick");
            passArry[1] = false;

            if(Nick_val == "")
            {
                inputVoide("userName", "SearchBox");
                passArry[1] = false;
            }
            else if(!regExp_Nick.test(Nick_val))
            {
                inputRetun("SearchBox");
            }
        }
        //switchBoxCheck("SearchBox");
    });
}