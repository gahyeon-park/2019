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

    $("#searchModalButton").click(function(e) {
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
                        $("#searchBookListTable").append("<tr>");
                        $("#searchBookListTable").append(`<td class="text-center">${response['bookList'][i].ID}</td>`);
                        $("#searchBookListTable").append(`<td class="text-center">${response['bookList'][i].TITLE}</td>`);
                        $("#searchBookListTable").append(`<td class="text-center">${response['bookList'][i].AUTHOR}</td>`);
                        $("#searchBookListTable").append(`<td class="text-center">${response['bookList'][i].PUBLISHER}</td>`);
                        $("#searchBookListTable").append(`<td class="text-center">${response['bookList'][i].PUBLICATIONDATE}</td>`);
                        $("#searchBookListTable").append("</tr>");
                        i++;
                    }
                }
                else {
                    console.log(response);
                }
            }
        });

    });


}
