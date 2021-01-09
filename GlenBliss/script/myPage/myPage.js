window.onload = function() {

    $(".lowerBt").click(function(e) {

        console.log("aaa");
        $inputPassword = prompt("비밀번호를 입력해 주세요.", "0");
        $userPassword = $("#userPassword").val();

        if(md5($inputPassword) == $userPassword) {
            alert("비밀번호 확인이 완료되었습니다.");

            if(e.target.id == 'dataFix') {
                window.open("./myPageDataFix.php", "_self");
            }
            if(e.target.id == 'deleteUser') {
                window.open("../../php/myPage/deleteMember.php", '_self');
            }
        }
        else {
            alert("비밀번호 확인에 실패하였습니다.");
        }
    });
}