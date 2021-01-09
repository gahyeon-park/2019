<?php
    $conn = mysqli_connect("localhost", "st07", "c9st07", "st07");

    if(!$conn) {
        echo "데이터베이스를 연결할 수 없습니다." . mysqli_error($conn);
        mysqli_close($conn);
        exit;
    }

    if(!mysqli_select_db($conn, "st07")) {
        echo "데이터 베이스를 찾을 수 없습니다." . mysqli_error($conn);
        mysqli_close($conn);
        exit;
    }

    $sql = "SELECT * FROM bookList;";
    $result = mysqli_query($conn, $sql);

    if(!$result) {
        echo "해당 데이터 베이스의 결과 값을 가져올 수 없습니다." . mysqli_error($conn);
        mysqli_free_result($result);
        mysqli_close($conn);
        exit;
    }

    if(mysqli_num_rows($result) == 0) {
        echo "아무런 정보가 없습니다." . mysqli_error($conn);
        mysqli_free_result($result);
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <style>
            * { margin: 0px; padding: 0px; font-size: 100%; }
        </style>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <style>
            .bookListBox {
                display: inline-block;
                width: 500px;
            }
                .bookListBox tbody {
                    display: inline-block;
                    width: 500px;
                }
                .bookListBox tr {
                    display: inline-block;
                    width: 500px;
                    text-align: center;
                    font-weight: bold;
                }
                .bookListBox td {
                    display: inline-block;
                    width: 500px;
                    text-align: center;
                    font-weight: bold;
                }
            
            button { 
                display: inline-block;

                margin-left: 50px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">도서 관리</h4>
                    <!-- 도서 목록 -->
                    <div>
                        <table class="table table-hover bookListBox">
                            <tbody>
                                <?php
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr><td>";
                                        
                                        echo $row['bookTitle'];

                                        echo "</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                        <!--팝업 버튼 -->
                            <button class="btn btn-primary" data-toggle="modal" data-target="#findBook">조회</button>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addBook">추가</button>
                    </div>
                    

                    <!-- 조회 팝업 -->
                    <div class="modal fade" id="findBook">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                            
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">조회하기</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="./bookList.php">
                                        <select name="dropDown" class="custom-select mb-3">
                                              <option value="authorName" selected>저자</option>
                                              <option value="bookTitle">책제목</option>
                                        </select>
                                        <input type="text" name="inputText">
                                        
                                        <button id="submitButton" type="submit" class="btn btn-primary" disabled>Submit</button>
                                    </form>
                                </div>
                            
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                    <!-- 추가 팝업 -->
                    <div class="modal fade" id="addBook">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                            
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Modal Heading</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                            
                                <!-- Modal body -->
                                <div class="modal-body">
                                    Modal body..
                                </div>
                            
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </body>
    <script>
        $("input[type='text']").change(function(e) {
		    if($("input[type='text']").val() == "") {
		    	$("#submitButton").prop("disabled",true);
	        	}
		    else {
		    	$("#submitButton").prop("disabled", false);
		    }
        });
    </script>
</html>
<?php
    mysqli_free_result($result);
    mysqli_close($conn);
?>