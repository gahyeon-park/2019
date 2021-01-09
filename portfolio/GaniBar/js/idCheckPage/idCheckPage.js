window.onload = function() {
    /* 로드 시 트렌지션 효과 */
    $("#mainTitleButton").css("top", "70px").css("right", "20px");
    $(".subTitle").css("top", "210px").css("right", "650px");
    $(".nowTitle").css("left", "175px");
    $(".sojuImage").css("margin-left", "-200px");
    $(".mainSection").css("left", "715px");

    /* 증명사진 업로드 */
    $("#fileInputButton").change(function() {
        console.log($("#fileInputButton").val()); 
        var filePath = $("#fileInputButton").val();
        var phpCall = '<?php echo $abc; ?>';
        console.log(phpCall);
    });

    /* 민증 검사 */
    $("#submitButton").click(function() {

        var birthString = $("#yearText").val() + " " + $("#monthText").val() + " " + $("#dateText").val();
        console.log(birthString);
        var birthStringCheck = /((1\d\d\d)\s((0\d)|([1][0-2]))\s((0\d)|(([1-2][0-9])|([3][0-1]))))|((2[0][0][0])\s((0[6-9]\s((0[1-9])|([1-2][0-9]|[3][0-1])))|(1[1-2]\s((0[1-9])|([1][0-9]|[2][0-3])))))/
    
        if(!birthStringCheck.test(birthString)) {
            alert("미성년자이거나 잘못된 생년월일 양식입니다.");
            $("#yearText").val("");
            $("#monthText").val("");
            $("#dateText").val("");
        }
        else {
            /* 이동 시 트렌지션 효과 */
            $("#mainTitleButton").css("top", "-70px").css("right", "-670px");
            $(".subTitle").css("top", "400px").css("right", "1900px");
            $(".nowTitle").css("left", "-500px");
            $(".sojuImage").css("margin-left", "-800px");
            $(".mainSection").css("left", "2000px");

            /* 트렌지션 후 페이지 이동 */
            setTimeout(function() {
                window.open("./html/menuPage/menuPage.html","_self");
            }, 500)
        }
    });

    $("#fileInput").change(function(e) {
        console.log($("#fileInput").val());

        console.log($("#idPicture").attr("src"));
    });

}
