$(document).ready(function()
{
    var passArry = [false, false, false, false, false, false, false, false];

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

    $("#SearchBox").prop("disabled", true);

    $("#userId").change(function()
    {
        var Id_val = $("#userId").val();
        var regExp_Id = /^[A-za-z0-9]{4,8}$/g;

        if(regExp_Id.test(Id_val))
        {
            passArry[0] = true;

            regExpTrue("userId");
            AllSuccess(passArry, "SearchBox");
        }
        else
        {
            regExpFalse("userId");
            
            if(Id_val == "")
            {
                inputVoide("userId", "SearchBox");
            }
            else if(!regExp_Id.test(Id_val))
            {
                inputRetun("SearchBox");
            }
        }
        //switchBoxCheck("SearchBox");
    });

    $("#userPw").change(function()
    {
        var Pw_val = $("#userPw").val();
        var regExp_Pw = /^[A-Za-z0-9]{6,12}$/;

        if(regExp_Pw.test(Pw_val))
        {
            passArry[1] = true;
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
            passArry[2] = true;
            regExpTrue("userPwAgain");
            AllSuccess(passArry, "SearchBox");

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

    $("#userName").change(function()
    {
        var Name_val = $("#userName").val();
        var regExp_Name = /^[가-힣]{2,4}$/;

        if(regExp_Name.test(Name_val))
        {
            passArry[3] = true;
            regExpTrue("userName");
            AllSuccess(passArry, "SearchBox");
        }
        else
        {
            regExpFalse("userName");

            if(Name_val == "")
            {
                inputVoide("userName", "SearchBox");
            }
            else if(!regExp_Name.test(Name_val))
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
            passArry[4] = true;
            regExpTrue("userNick");
            AllSuccess(passArry, "SearchBox");
        }
        else
        {
            regExpFalse("userNick");

            if(Nick_val == "")
            {
                inputVoide("userName", "SearchBox");
            }
            else if(!regExp_Nick.test(Nick_val))
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
            passArry[5] = true;
            regExpTrue("userPhone");
            AllSuccess(passArry, "SearchBox");
        }
        else
        {
            regExpFalse("userPhone");

            if(Phone_val == "")
            {
                inputVoide("userPhone", "SearchBox");
            }
            else if(!regExp_Phone.test(Phone_val))
            {
                inputRetun("SearchBox");
            }
        }
        //switchBoxCheck("SearchBox");
    });

    $("#userEmail").change(function()
    {
        var Email_val = $("#userEmail").val();
        var regExp_Email = /^[_\.0-9a-zA-Z-]{1,63}@([0-9a-zA-Z][0-9a-zA-Z-]+\.){1,255}[a-zA-Z]{2,6}$/i;

        if(regExp_Email.test(Email_val))
        {
            passArry[6] = true;
            regExpTrue("userEmail");
            AllSuccess(passArry, "SearchBox");
        }
        else
        {
            regExpFalse("userEmail");

            if(Email_val == "")
            {
                inputVoide("userEmail", "SearchBox");
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
            
            passArry[7] = true;
            regExpTrue("userAddr");
            AllSuccess(passArry, "SearchBox");
        }
        else
        {
            regExpFalse("userAddr");

            if(Addr_val == "")
            {
                inputVoide("userAddr", "SearchBox");
            }
            else if(!regExp_Addr.test(Addr_val))
            {
                inputRetun("SearchBox");
            }
        }
        //switchBoxCheck("SearchBox");
    });

});