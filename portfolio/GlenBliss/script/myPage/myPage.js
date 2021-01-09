window.onload = function() {

    $(".dataFix").click(function() {
        $(".confirm_modal").css('display', 'block');
    });
    $(".modalExit").click(function(){
        console.log("close");
        $(".confirm_modal").css('display', 'none');
    });
    $("#confirmBtn").click(function(){
        console.log("confirmBtn");
        $userPassword = $("#userPassword").val();
        $inputPassword = $("#confirmPw").val();

        if(md5($inputPassword) == $userPassword) {
            alert("비밀번호 확인이 완료되었습니다.");
            window.open("./myPageDataFix.php", "_self");
        }
        else {
            alert("비밀번호 확인에 실패하였습니다.");
        }
    });
}
