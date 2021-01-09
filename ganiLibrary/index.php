<?php
	$conn= mysqli_connect("localhost", "st07", "c9st07", "st07");
	if(!$conn){
		echo "데이터베이스를 연결할 수 없습니다.".mysqli_error($conn);
		mysqli_close($conn);
		exit;
	}
	if(!mysqli_select_db($conn,"st07")){
		echo "데이터베이스를 찾을 수 없습니다.".mysqli_error($conn);
		mysqli_close($conn);
		exit;
	}

    $sql = "SELECT * FROM `BOOKLIST`";

	$result = mysqli_query($conn,$sql);
	if(!$result){
		echo "해당 데이터베이스의 결과 값을 가져올 수 없습니다.".mysqli_error($conn);
		mysqli_free_result($result);
        mysqli_close($conn);
		exit;
	}
    
    if(mysqli_num_rows($result) == 0) {
        echo "해당 데이터베이스의 데이터가 없습니다.".mysqli_error($conn); 
        mysqli_free_result($result);
        mysqli_close($conn);
		exit;
	}
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        
        <style>
            * { margin: 0px; padding: 0px; font-size: 100%; font-family: 'Do Hyeon', sans-serif; }
        </style>

        <!-- bootstrap 로드 -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
        <!-- google font 로드 -->
        <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="./css/index.css">
        <script src="./js/index.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="card-header">
                <h2 class="pageTitle">가니 도서관</h2>
                <?php
                    if(!@(isset($_COOKIE['loginID']))) {
                        echo '<button id="loginButton" class="btn btn-success float-right" data-toggle="modal" data-target="#loginModal">로그인</button>';
                    }
                    else {
                        echo $_COOKIE['loginID'];      
                        echo "<script> $('#logoutButton').click(function(e) { window.open('./php/logout.php', '_self'); } ); </script>";
                        echo '<button id="logoutButton" class="btn btn-success float-right">로그아웃</button>';
                    }
                ?>
                <button id="joinButton" class="btn btn-danger float-right" data-toggle="modal" data-target="#joinModal">회원가입</button>
            </div>

            <!-- 도서 목록 -->
            <div class="card-body">
            
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">번호</th>
                            <th class="text-center">제목</th>
                            <th class="text-center">저자</th>
                            <th class="text-center">출판사</th>
                            <th class="text-center">출판일</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($result)) {

                                echo <<<END
                                <tr>
                                    <td class="text-center">{$row['ID']}</td>
                                    <td class="text-center">{$row['TITLE']}</td>
                                    <td class="text-center">{$row['AUTHOR']}</td>
                                    <td class="text-center">{$row['PUBLISHER']}</td>
                                    <td class="text-center">{$row['PUBLICATIONDATE']}</td>

                                    <td>
                                        <button id="moreButton{$row['ID']}" class="btn btn-primary">더보기</button>
                                    </td>
                                </tr>
                                <tr id="bookInfo{$row['ID']}" class="bookInfoCommon bg-light">
                                    <td colspan="6">
                                        <div id="bookDisc{$row['ID']}">
                                            동해물과 백두산이 마마마마마
                                        </div>
                                    </td>
                                </tr>
END;

                            }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <div class="footerButtonBox">
                    <button class="btn btn-info footerButton" data-toggle="modal" data-target="#searchModal">조회</button>
                    <button class="btn btn-warning footerButton" data-toggle="modal" data-target="#addModal">추가</button>
                </div>
            </div>

            <!-- 회원가입 modal -->
            <div class="modal" id="joinModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">회원가입</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <form action="./php/join_ok.php" method="POST">
                            <div class="modal-body">
            
                                <!-- 아이디 input -->                    
                                <div class="form-group">
                                    <label for="idInput">아이디</label>
                                    <input id="idInput" class="form-control" type="text" placeholder="gani0000" name="userID">
                                </div>
                                <!-- 비밀번호 input -->
                                <div class="form-group">
                                    <label for="pwInput">비밀번호</label>
                                    <input id="pwInput" class="form-control" type="password" placeholder="******" name="userPW">
                                </div>

                                <!-- 성함 input -->
                                <div class="form-group">
                                    <label for="nameInput">이름</label>
                                    <input id="nameInput" class="form-control" type="text" placeholder="박가니" name="userName">
                                </div>

                                <!-- 핸드폰 번호 input -->
                                <div class="form-group">
                                    <label for="phoneInput">핸드폰 번호</label>
                                    <input type="number" id="phoneInput" class="form-control" placeholder="01012345678" name="userPhone">
                                </div>

                                <!-- 이메일 input -->
                                <div class="form-group">
                                    <label for="emailInput">이메일</label>
                                    <input type="text" id="emailInput" class="form-control" placeholder="gainEmail@naver.com" name="userEmail">
                                </div>

                                <!-- 주소 input -->
                                <div class="form-group">
                                    <label for="addressInput">주소</label>
                                    <input type="text" id="addressInput" class="form-control" placeholder="사랑시 고백구 행복동" name="userAddress">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="가입하기">
                            </div>                    
                        </form>
                    </div>
                </div>
            </div>

            <!-- 로그인 modal -->
            <div class="modal" id="loginModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">로그인</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <form action="./php/login.php" method="POST">
                            <div class="modal-body">
                                <!-- 아이디 input -->
                                <div class="form-group">
                                    <label for="loginID">아이디</label>
                                    <input id="loginID" class="form-control" type="text" placeholder="gani0000" name="loginID">
                                </div>
                                <!-- 비밀번호 input -->
                                <div class="form-group">
                                    <label for="loginPW">비밀번호</label>
                                    <input id="loginPW" class="form-control" type="password" placeholder="******" name="loginPW">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="로그인">
                            </div>                    
                        </form>
                    </div>
                </div>
            </div>

            <!-- 조회 modal -->
            <div class="modal" id="searchModal">
                <div class="modal-dialog">
                    <div class="modal-content searchModalBox">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">조회</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                            <div class="modal-body">
                                <!-- type input -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <select id="searchType" name="searchType" class="custom-select mb-3 col-3">
                                              <option class="text-center" value="TITLE" selected>제목</option>
                                              <option class="text-center" value="AUTHOR">저자</option>
                                        </select>
                                        <div class="col-1"></div>
                                        <input id="searchText" class="form-control col-6" type="text" placeholder="검색할 단어를 입력해 주세요." name="searchText">
                                        <div class="col-1"></div>
                                    </div>

                                    <div class="row">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">번호</th>
                                                <th class="text-center">제목</th>
                                                <th class="text-center">저자</th>
                                                <th class="text-center">출판사</th>
                                                <th class="text-center">출판일</th>
                                                <th class="text-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="searchBookListTable">

                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input id="searchModalButton" type="submit" class="btn btn-primary" value="조회">
                            </div>    
                    </div>
                </div>
            </div>

            <!-- 추가 modal -->
            <div class="modal" id="addModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">추가</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <form enctype="multipart/form-data" action="./php/addBook.php" method="POST">
                        <div class="modal-body">
                                <!-- type input -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        
                                        <div class="col-1"></div>
                                        
                                        <div class="col-1"></div>
                                    </div>
                                </div>
                                <!-- 파일업로드 input -->                    
                                <div class="form-group">
                                    <div class="custom-file mb-3">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="300000">
                                        <input type="file" class="custom-file-input" id="inputFile" name="inputFile">
                                        <label for="inputFile" class="custom-file-label">사진을 등록해 주세요.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="추가">
                            </div>                    
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </body>
</html>
<?php
    mysqli_free_result($result);
    mysqli_close($conn);
?>