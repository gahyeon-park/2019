window.onload = function() {

    /* btn-active all Element class remove */
    function resetBtnActiveClass() {
        $("#buttonBox button").removeClass("btn-active");
    }
    /* all contents display none */
    function resetContentsDisplay() {
        $("#roomTypeContents").css("display", "none");
        $("#informationContents").css("display", "none");
    }

    function imgSilde(roomNum) {
        setImgIndex();

        $("#roomImg").css("opacity", '0');

        setTimeout(function() {
            $("#roomImg").attr("src", "../../images/room/RoomImg/" + roomNum + "/room" + imgIndex + ".jpg");
            console.log($("#roomImg").attr("src"));
            $("#roomImg").css("opacity", '1');
        }, 300);

        setTimeout(function() {
            imgSilde(roomNum);
        }, 3000);
    }

    function setImgIndex() {
        if(imgIndex >= 4) imgIndex = 1;
        else imgIndex++;
    }

    /* 이미지 슬라이드 */
    var roomNum = Number($("#roomNum").val());
    console.log(roomNum);
    var imgIndex = 1;

    imgSilde(roomNum);

    /* when roomTypeButton Click */
    $("#buttonBox button").click(function(e) {
        
        
        switch(e.target.id) {
            case "roomTypeButton" :
                // remove class - btn-active
                resetBtnActiveClass();
                
                // add class - btn-active
                $("#" + e.target.id).addClass("btn-active");                
                
                // all contents display none
                resetContentsDisplay();
                $("#roomTypeContents").css("display", "block");
            break;
            case "informationButton" :
                // remove class - btn-active
                resetBtnActiveClass();

                // add class - btn-active
                $("#" + e.target.id).addClass("btn-active");

                // all contents display none
                resetContentsDisplay();
                $("#informationContents").css("display", "block");
            break;
            case "reservationButton" :
                // location link
                
            break;
            default :
            break;
        }
    });

    $("#roomImg").click(function(e) {
        
        $("#roomImg").css("opacity", '0');

        setTimeout(function() {
            setImgIndex();
            $("#roomImg").attr("src", "../../images/room/RoomImg/" + roomNum + "/room" + imgIndex + ".jpg");
            $("#roomImg").css("opacity", '1');
        }, 300);

    });
}