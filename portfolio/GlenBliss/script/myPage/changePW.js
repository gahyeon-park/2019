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


var passArry = [false, false];

$("#SearchBox").prop("disabled", true);

$("#userPw").change(function()
    {
        var Pw_val = $("#userPw").val();
        var regExp_Pw = /^[A-Za-z0-9]{6,12}$/;

        if(regExp_Pw.test(Pw_val))
        {
            passArry[0] = true;
            regExpTrue("userPw");
            AllSuccess(passArry, "SearchBox");
        }
        else
        {
            regExpFalse("userPw");
            
            if(Pw_val == "")
            {
                inputVoide("userPw", "SearchBox");
            }
            else if(!regExp_Pw.test(Pw_val))
            {
                inputRetun("SearchBox");
            }
        }
        //switchBoxCheck("SearchBox");
    });

    $("#userPwAgain").change(function()
    {
        var PwAgain_val = $("#userPwAgain").val();
        var regExp_PwAgain = /^[A-Za-z0-9]{6,12}$/;

        if($("#userPw").val() == $("#userPwAgain").val())
        {
            if(regExp_PwAgain.test(PwAgain_val))
            {
                passArry[1] = true;
                regExpTrue("userPwAgain");
                AllSuccess(passArry, "SearchBox");
            }

            if(PwAgain_val == "")
            {
                inputVoide("userPwAgain", "SearchBox");
            }
        }
        else
        {
            regExpFalse("userPwAgain");

            if(PwAgain_val == "")
            {
                inputVoide("userPwAgain", "SearchBox");
            }
            else if(!regExp_PwAgain.test(PwAgain_val))
            {
                inputRetun("SearchBox");
            }
        }
        //switchBoxCheck("SearchBox");
    });
};