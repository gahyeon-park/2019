$(document).ready(function()
{
    var namePass = false;
    var emailPass = false;

    var userName = $("#NameInput").val();
    var userEmail = $("#EmailInput").val();
    $("#SearchBox").prop("disabled", true);

    $("#NameInput").change(function(e)
    {
        var regExp_Name = /^[가-힣]{2,4}$/;
        

        if(regExp_Name.test($("#NameInput").val()))
        {
            userName.replace(/ /g,"");
            namePass = true;
            $(e.target).css("border", "1px solid #37b54a");
            
            // 이메일에도 똑같이 적용
            $("#checkSuccessName").html("&nbsp;&nbsp;확인되었습니다.");
            if(emailPass == true && namePass == true) 
            {
                $(".SearchBox").prop("disabled", false);
                $("#SearchBox").css("background-color", "#3f3222");
            }
            else {
                $(".SearchBox").prop("disabled", true);
                $(".SearchBox").css("background-color", "#999999");
            }
        }
        else
        {
            namePass = false;
            $("#checkSuccessName").html("");
            $(e.target).css("border", "1px solid red");
            if($("#NameInput").val()=="")
            {
                $(".SearchBox").css("background-color", "#999999");
                $(".SearchBox").prop("disabled", true);
                $("#NameInput").css("border","1px solid #a19385");
            }
            else if(!regExp_Name.test($("#NameInput").val()))
            {
                $(".SearchBox").css("background-color", "#999999");
                $(".SearchBox").prop("disabled", true);
            }
        }

        $(".SearchBox").click(function(e) {
            if($(".SearchBox").prop("disabled") == true) alert("disabled true");
            else alert("disabled false");
        });

    });

    
     $("#EmailInput").change(function(e)
    {
        var regExp_Email = /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i;
        
        if(regExp_Email.test($("#EmailInput").val()))
        {
            userName.replace(/ /g,"");
            emailPass = true;
            $(e.target).css("border", "1px solid #37b54a");

            $("#checkSuccessEmail").html("&nbsp;&nbsp;확인되었습니다.");

            // 이메일에도 똑같이 적용
            if(emailPass == true && namePass == true) 
            {
                
                $(".SearchBox").prop("disabled", false);
                $("#SearchBox").css("background-color", "#3f3222");
            }
            else 
            {
                $(".SearchBox").css("background-color", "#999999");
                $(".SearchBox").prop("disabled", true);
            }
        }
        else
        {
            emailPass = false;
            $("#checkSuccessEmail").html("");
            $(e.target).css("border", "1px solid red");
            $("#SearchBox").css("backgorund-color", "#999999");
            if($("#EmailInput").val()=="")
            {
                $(".SearchBox").css("background-color", "#999999");
                $(".SearchBox").prop("disabled", true);
                $("#EmailInput").css("border","1px solid #a19385");
            }
            else if(!regExp_Email.test($("#EmailInput").val()))
            {
                $(".SearchBox").css("background-color", "#999999");
                $(".SearchBox").prop("disabled", true);
            }
        }

        $(".SearchBox").click(function(e) {
            if($(".SearchBox").prop("disabled") == true) 
            {
                alert("disabled true");
            }
            else
            { 
                alert("disabled false");
            }
        });
    });
});
