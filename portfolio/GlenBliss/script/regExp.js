// 정규식이 맞으면 보더 녹색
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
        }
        else
        {
        }
    });
}