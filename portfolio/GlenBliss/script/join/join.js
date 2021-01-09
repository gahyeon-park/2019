window.onload = function() {
    var captchaString = "";
    var captchaNum = Math.floor(Math.random() * 10);
    captchaString += String(captchaNum);
    captchaNum = Math.floor(Math.random() * 10);
    captchaString += String(captchaNum);
    captchaNum = Math.floor(Math.random() * 10);
    captchaString += String(captchaNum);
    captchaNum = Math.floor(Math.random() * 10);
    captchaString += String(captchaNum);
    var canvas = document.getElementById("notBot");
    $("#notBotNum").attr("value", captchaString);
    console.log(captchaString);
    
    var ctx = canvas.getContext("2d");
    ctx.font = "90px Arial";
    ctx.textAlign = "center";
    ctx.strokeText(captchaString, canvas.width/2, canvas.height/2);

    $("#submit").click(function(e) {
        if($("#auto_confirm").val() != captchaString) {
            alert("자동등록방지를 잘 못 입력하셨습니다.");
            location.reload();
        }
    });
}