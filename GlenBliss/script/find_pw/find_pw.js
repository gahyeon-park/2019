$(document).ready(function()
{
    var namePass = false;
    var idPass = false;
    var dayPass = false;

    var PassArry = [false, false, false];

    $("#SearchBox").prop("disabled", true);

    $("#NameInput").change(function(e)
    {
        var userName =  $("#NameInput").val();
        var regExp_Name = /^[가-힣]{2,4}$/;

        if(regExp_Name.test(userName))
        {
            userName.replace(/ /g,"");
            console.log(userName);
            namePass = true;
            regExpTrue("NameInput");
            $("#checkSuccessName").html("&nbsp;&nbsp;확인되었습니다.");
            
            PassArry[0] = true;
            AllSuccess(PassArry, "SearchBox");
        }
        else
        {
            console.log("regExp Check = false");
            
            namePass = false;
            $("#checkSuccessName").html("");
            regExpFalse("NameInput");

            if(userName == "")
            {
                inputVoide("NameInput","SearchBox");
            }
            else if(!regExp_Name.test(userName))
            {
                inputRetun("SearchBox");
            }
        }
        switchBoxCheck("SearchBox");
    });


    $("#IdInput").change(function(e)
    {
        var userId =  $("#IdInput").val();
        var regExp_Id = /^[A-za-z0-9]{4,8}$/g;
    
        if(regExp_Id.test(userId))
        {
            userId.replace(/ /g,"");
            console.log(userId);
            idPass = true;
            regExpTrue("IdInput");
            $("#checkSuccessId").html("&nbsp;&nbsp;확인되었습니다.");

            PassArry[1] = true;
            AllSuccess(PassArry, "SearchBox");
        }
        else
        {
            console.log("regExp Check = false");
            
            idPass = false;
            $("#checkSuccessId").html("");
            regExpFalse("IdInput");

            if(userId == "")
            {
                inputVoide("IdInput","SearchBox")
            }
            else if(!regExp_Id.test(userId))
            {
                inputRetun("SearchBox");
            }
        }
        switchBoxCheck("SearchBox");
    });

    $("#DayInput").change(function(e)
    {
        var userDay =  $("#DayInput").val();
        var regExp_Day = /^(19[0-9][0-9]|20\d{2})-(0[0-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
    
        if(regExp_Day.test(userDay))
        {
            userDay.replace(/ /g,"");
            console.log(userDay);
            dayPass = true;
            regExpTrue("DayInput");
            $("#checkSuccessDay").html("&nbsp;&nbsp;확인되었습니다.");

            PassArry[2] = true;
            AllSuccess(PassArry, "SearchBox");
        }
        else
        {
            console.log("regExp Check = false");
            
            dayPass = false;
            $("#checkSuccessDay").html("");
            regExpFalse("DayInput");

            if(userDay == "")
            {
                inputVoide("DayInput","SearchBox")
            }
            else if(!regExp_Day.test(userDay))
            {
                inputRetun("SearchBox");
            }
        }
        switchBoxCheck("SearchBox");
    });


});