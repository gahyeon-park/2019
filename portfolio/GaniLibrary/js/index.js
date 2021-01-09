window.onload = function() {

    $("table button").click(function(e) {
        let buttonID = e.target.id.substr(10, e.target.id.length - 10);

        if($("#bookInfo" + buttonID).css("display") == "none") {
            $("#bookInfo" + buttonID).css("display", "table-row");
            $("#bookDisc" + buttonID).collapse("toggle");
        }
        else {
            $("#bookDisc" + buttonID).collapse("toggle");
    
            setTimeout(() => {
                $("#bookInfo" + buttonID).css("display", "none");    
            }, 500);
        }
    });

    $("#logoutButton").click(function(e) {
        window.open('./php/logout.php', "_self");
    });

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    // $("#addForm input").change(function(e) {
    //     let i = 1;
    //     let isDisabled = false;

    //     while(i < $("#addForm input").length) {
    //         if($("#addForm input")[i]['value'] == '') {
    //             isDisabled = true;
    //         }
    //         i++;
    //     } 
    //     if(!isDisabled) {
    //         $("#addButton").attr("disabled", false);
    //     }
    // });


    /* 조회버튼 클릭시 컨텐츠 동적으로 생성 */
    $("#searchModalButton").click(function(e) {
        $("#searchBookListTable").html("");
        var searchData = {
            searchType : $("#searchType").val(),
            searchText : $("#searchText").val(),
            isAjax : 1
        }
    
        $.ajax({
            dataType : 'json',
            type : "POST",
            url : './php/searchBook.php',
            data : searchData,
            success : function(response) {
                if(response['result'] == true) {

                    console.log(response);
                    let i = 0;
                    while(i < response['bookList'].length) {
                        let appendText = `
                        <tr id="modifyButton${response['bookList'][i].ID}" class="modifyButton" data-toggle="modal" data-target="#modifyModal${response['bookList'][i].ID}">
                        <td class="text-center">${response['bookList'][i].ID}</td>
                        <td class="text-center">${response['bookList'][i].TITLE}</td>
                        <td class="text-center">${response['bookList'][i].AUTHOR}</td>
                        <td class="text-center">${response['bookList'][i].PUBLISHER}</td>
                        <td class="text-center">${response['bookList'][i].PUBLICATIONDATE}</td>
                        <td id="rentalButtonBox${response['bookList'][i].ID}"></td>
                        </tr>

                        <script>
                            /* 일반회원으로 로그인 했을 시 대출버튼 출력 */
                            if($("#loginType").val() == 1) {
                                $("#rentalButtonBox${response['bookList'][i].ID}").html('<button id="rentalButton" class="btn btn-primary">대출</button>');
                            }

                            /* 대출 버튼 클릭시 php이동 */
                            $("#rentalButtonBox${response['bookList'][i].ID}").click(function(e) {
                                window.open("./php/rentalBook.php?bookID=${response['bookList'][i].ID}", "_self");
                            });

                            /* 조회로 생성된 책정보 클릭시 수정/삭제 모달 띄우기 */
                            console.log($("#loginType").val());
                            $("#modifyButton${response['bookList'][i].ID}").click(function(e) {

                                if($("#loginType").val() == 0) {
                                    var modalId = $(this).attr("id").slice(12);
                                    console.log(modalId);
    
                                    $("#modifyModal").attr("id", "modifyModal" + modalId);
                                    $("#modifyID").attr("value", '${response['bookList'][i].ID}');
                                    $("#modifyFile").attr("value", '${response['bookList'][i].ORIGIN_IMG_NAME}');
                                    $("#modifyFileText").html('${response['bookList'][i].ORIGIN_IMG_NAME}');
                                    $("#modifyBookTitle").attr("value", '${response['bookList'][i].TITLE}');
                                    $("#modifyBookAuthor").attr("value", '${response['bookList'][i].AUTHOR}');
                                    $("#modifyBookPublisher").attr("value", '${response['bookList'][i].PUBLISHER}');
                                    $("#modifyBookPublicationDate").attr("value", '${response['bookList'][i].PUBLICATIONDATE}');
                                    $("#modifyBookSummary").html('${response['bookList'][i].SUMMARY}');
                                    $("#modifyModal").modal("show");
                                }
                            });

                        </script>
                        `;

                        $("#searchBookListTable").append(appendText);

                        i++;
                    }
                }
                else {
                    console.log(response);
                }
            }
        });

    });

    $(".bookImgDownLoadButton").click(function(e) {
        // var downloadData = {
        //     downloadID : $(this).attr("id").slice(21),
        //     isAjax : 1
        // }

        // $.ajax({
        //     type : "POST",
        //     url : './php/downloadBookImg.php',
        //     data : downloadData,
        //     success : function() {
        //         console.log("success");
        //     },
        //     error: function(request,status,error) {
        //         console.log("fail");
        //     }
        // });

        window.open("./php/downloadBookImg.php?downloadID=" + $(this).attr("id").slice(21), "_self");
    });

    /* 금지 아이디 버튼 눌렀을 때 금지 아이디모달 띄우기 */
    $("#banIDButton").click(function(e) {
        $("#banIDModal").modal("show");
    });0

}
