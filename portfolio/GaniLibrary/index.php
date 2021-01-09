<?php
    include('./php/common.php');

    /* 책정보 DB 열기 */
    openDB($bookConn, "ganiLibrary", "SELECT * FROM `BOOKLIST`;", $bookResult);

    /* 회원정보 DB 열기 */
    openDB($userConn, "ganiLibrary", "SELECT * FROM `USERS`;", $userResult);
    openDB($adminConn, "ganiLibrary", "SELECT * FROM `ADMIN`;", $adminResult);
    openDB($banIDConn, "ganiLibrary", "SELECT * FROM `BAN_ID`;", $banIDResult);

    // LOGIN_TYPE = -1 : 로그아웃
    // LOGIN_TYPE = 0 : 관리자
    // LOGIN_TYPE = 1 : 일반회원
    
    // 로그인 상태 출력
    echo "<input id='loginType' type='hidden' name='loginType' value=". LOGIN_TYPE . "";

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
        <link rel="stylesheet" href="./css/index.css">
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
                <?php
                    if(LOGIN_TYPE != -1 ) { // 로그아웃 되어 있을 때
                        echo "<button id='rentalListButton' class='btn btn-warning float-left' data-toggle='modal' data-target='#rentalListModal'>대출 목록</button>";
                    }
                ?>
                <h2 class="pageTitle">가니 도서관</h2>
                <?php
                    if(LOGIN_TYPE == -1 ) { // 로그아웃 되어 있을 때
                        echo '<button id="loginButton" class="btn btn-success float-right" data-toggle="modal" data-target="#loginModal">로그인</button>';
                        echo '<button id="joinButton" class="btn btn-danger float-right" data-toggle="modal" data-target="#joinModal">회원가입</button>';
                    }
                    else {

                        if(LOGIN_TYPE == 1) {
                            echo @$_SESSION['memberID'] . " (일반 회원)";      
                            echo '<button id="logoutButton" class="btn btn-success float-right">로그아웃</button>';
                            echo '<button id="joinButton" class="btn btn-danger float-right" data-toggle="modal" data-target="#joinModal">회원가입</button>';
                        } 
                        if(LOGIN_TYPE == 0) { 
                            echo @$_SESSION['adminID'] . " (관리자)";
                            echo '<button id="logoutButton" class="btn btn-success float-right">로그아웃</button>';
                            echo '<button id="manageButton" class="btn btn-danger float-right" data-toggle="modal" data-target="#manageMentModal">회원관리</button>';   

                        }

                        echo "<script> $('#logoutButton').click(function(e) { window.open('./php/logout.php', '_self'); } ); </script>";
                    }
                ?>
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
                            while($row = mysqli_fetch_assoc($bookResult)) {
                                $nbspString = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
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
                                            <div class="bookImgBox">
                                                <img class="bookImg" src="./files/{$row['TEMP_IMG_NAME']}">
                                                <p class="bookImgPath">{$row['ORIGIN_IMG_NAME']}</p>
                                                <button id="bookImgDownLoadButton{$row['ID']}" class="btn btn-primary bookImgDownLoad bookImgDownLoadButton">다운</button>
                                            </div>
                                            <textarea class="summaryText" disabled>{$row['SUMMARY']}</textarea>
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
                    <button id="main_searchButton" class="btn btn-info footerButton" data-toggle="modal" data-target="#searchModal">조회</button>
                    <?php
                        if(LOGIN_TYPE == 1) {   // 일반 회원이면
                            echo '<button id="bookServiceButton" class="btn btn-warning footerButton" data-toggle="modal" data-target="">대출/반납</button>';
                        }
                        if(LOGIN_TYPE == 0) {   // 관리자 이면
                            echo '<button id="main_addButton" class="btn btn-warning footerButton" data-toggle="modal" data-target="#addModal">추가</button>';
                        }
                        
                    ?>
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
                                    <input id="idInput" class="form-control" type="text" placeholder="gani0000" name="userID" required>
                                </div>
                                <!-- 비밀번호 input -->
                                <div class="form-group">
                                    <label for="pwInput">비밀번호</label>
                                    <input id="pwInput" class="form-control" type="password" placeholder="******" name="userPW" required>
                                </div>

                                <!-- 성함 input -->
                                <div class="form-group">
                                    <label for="nameInput">이름</label>
                                    <input id="nameInput" class="form-control" type="text" placeholder="박가니" name="userName" required>
                                </div>

                                <!-- 핸드폰 번호 input -->
                                <div class="form-group">
                                    <label for="phoneInput">핸드폰 번호</label>
                                    <input type="number" id="phoneInput" class="form-control" placeholder="01012345678" name="userPhone" required>
                                </div>

                                <!-- 이메일 input -->
                                <div class="form-group">
                                    <label for="emailInput">이메일</label>
                                    <input type="text" id="emailInput" class="form-control" placeholder="gainEmail@naver.com" name="userEmail" required>
                                </div>

                                <!-- 주소 input -->
                                <div class="form-group">
                                    <label for="addressInput">주소</label>
                                    <input type="text" id="addressInput" class="form-control" placeholder="사랑시 고백구 행복동" name="userAddress" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="가입">
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
                                    <input id="loginID" class="form-control" type="text" placeholder="gani0000" name="loginID" required>
                                </div>
                                <!-- 비밀번호 input -->
                                <div class="form-group">
                                    <label for="loginPW">비밀번호</label>
                                    <input id="loginPW" class="form-control" type="password" placeholder="******" name="loginPW" required>
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
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="searchBookListTable"></tbody>
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

                        <form id="addForm" enctype="multipart/form-data" action="./php/addBook.php" method="POST">
                        <div class="modal-body">
                                <!-- type input -->
                                <!-- 파일업로드 input -->                    
                                <div class="form-group">
                                    <div class="custom-file mb-3">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="300000">
                                        <input type="file" class="custom-file-input" id="inputFile" name="inputFile" value="" required>
                                        <label for="inputFile" class="custom-file-label">사진을 등록해 주세요.</label>
                                    </div>
                                </div>
                                <!-- 책제목 -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <label for="addBookTitle" class="col-3 mt-2">책 제목</label>
                                        <input id="addBookTitle" class="form-control col-7" type="text" placeholder="책 제목" name="addBookTitle" value="" required>
                                        <div class="col-1"></div>
                                    </div>
                                </div>
                                <!-- 저자 -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <label for="addBookAuthor" class="col-3 mt-2">책 저자</label>
                                        <input id="addBookAuthor" class="form-control col-7" type="text" placeholder="책 저자" name="addBookAuthor" value="" required>
                                        <div class="col-1"></div>
                                    </div>
                                </div>
                                <!-- 출판사 -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <label for="addBookPublisher" class="col-3 mt-2">출판사</label>
                                        <input id="addBookPublisher" class="form-control col-7" type="text" placeholder="출판사" name="addBookPublisher" value="" required>
                                        <div class="col-1"></div>
                                    </div>
                                </div>
                                <!-- 출판일 -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <label for="addBookPublicationDate" class="col-3 mt-2">출판일</label>
                                        <input id="addBookPublicationDate" class="form-control col-7" type="date" name="addBookPublicationDate" value="" required>
                                        <div class="col-1"></div>
                                    </div>
                                </div>

                                <!-- 요약 -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <label for="addBookSummary" class="col-3 mt-2">책 요약</label>
                                        <textarea name="addBookSummary" id="addBookSummary" class="form-control col-7" cols="30" rows="10" placeholder="책 내용 요약" value=""></textarea>
                                        <div class="col-1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input id="addButton" type="submit" class="btn btn-primary" value="추가">
                            </div>                    
                        </form>
                    </div>
                </div>
            </div>

            <!-- 수정 및 삭제 modal -->
            <div class="modal" id="modifyModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">수정 및 삭제</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <form id="modifyForm" enctype="multipart/form-data" action="./php/modifyBook.php" method="POST">
                        <div class="modal-body">
                                <!-- type input -->
                                <!-- 파일업로드 input -->    
                                <input id="modifyID" type="hidden" name="modifyID">                
                                <div class="form-group">
                                    <div class="custom-file mb-3">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="300000">
                                        <input type="file" class="custom-file-input" id="modifyFile" name="modifyFile" value="" required>
                                        <label id="modifyFileText" for="modifyFile" class="custom-file-label">사진을 등록해 주세요.</label>
                                    </div>
                                </div>
                                <!-- 책제목 -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <label for="modifyBookTitle" class="col-3 mt-2">책 제목</label>
                                        <input id="modifyBookTitle" class="form-control col-7" type="text" placeholder="책 제목" name="modifyBookTitle" value=""  required>
                                        <div class="col-1"></div>
                                    </div>
                                </div>
                                <!-- 저자 -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <label for="modifyBookAuthor" class="col-3 mt-2">책 저자</label>
                                        <input id="modifyBookAuthor" class="form-control col-7" type="text" placeholder="책 저자" name="modifyBookAuthor" value=""  required>
                                        <div class="col-1"></div>
                                    </div>
                                </div>
                                <!-- 출판사 -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <label for="modifyBookPublisher" class="col-3 mt-2">출판사</label>
                                        <input id="modifyBookPublisher" class="form-control col-7" type="text" placeholder="출판사" name="modifyBookPublisher" value=""  required>
                                        <div class="col-1"></div>
                                    </div>
                                </div>
                                <!-- 출판일 -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <label for="modifyBookPublicationDate" class="col-3 mt-2">출판일</label>
                                        <input id="modifyBookPublicationDate" class="form-control col-7" type="date" name="modifyBookPublicationDate" value=""  required>
                                        <div class="col-1"></div>
                                    </div>
                                </div>

                                <!-- 요약 -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <label for="modifyBookSummary" class="col-3 mt-2">책 요약</label>
                                        <textarea name="modifyBookSummary" id="modifyBookSummary" class="form-control col-7" cols="30" rows="10" placeholder="책 내용 요약" value=""  required></textarea>
                                        <div class="col-1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input id="modifyButton" name="modifyButton" type="submit" class="btn btn-primary" value="수정">
                                <input id="deleteButton" name="deleteButton" type="submit" class="btn btn-danger" value="삭제">
                            </div>                    
                        </form>
                    </div>
                </div>
            </div>


            <!-- 회원관리 modal -->
            <div class="modal" id="manageMentModal">
                <div class="modal-dialog">
                    <div class="modal-content manageMentBox">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">회원 관리</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                        <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">번호</th>
                            <th class="text-center">아이디</th>
                            <th class="text-center">비밀번호</th>
                            <th class="text-center">이름</th>
                            <th class="text-center">전화번호</th>
                            <th class="text-center">이메일</th>
                            <th class="text-center">주소</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            while($row = mysqli_fetch_assoc($userResult)) {
                                echo <<<END
                                <tr>
                                    <form action='./php/manageMent.php' method='POST'>
                                        <input type="hidden" name="userID" value="{$i}">

                                        <td class="text-center">{$row['ID']}</td>
                                        <td class="text-center">{$row['USERID']}</td>
                                        <td class="text-center">{$row['USERPASSWORD']}</td>
                                        <td class="text-center">
                                        <input class="form-control text-center" type="text" name="userName" value='{$row['NAME']}' required>
                                        </td>
                                        <td class="text-center">
                                        <input class="form-control text-center" type="text" name="userPhone" value='{$row['MOBILEPHONE']}' required>
                                        </td>
                                        <td class="text-center">
                                        <input class="form-control text-center" type="text" name="userEmail" value='{$row['EMAIL']}' required>
                                        </td>
                                        <td class="text-center">
                                        <input class="form-control text-center" type="text" name="userAddress" value='{$row['ADDRESS']}' required>
                                        </td>
                                        <td>
                                        <input id="userModifyButton" name="modifyButton" type="submit" class="btn btn-primary" value="수정">
                                        <input id="userDeleteButton" name="deleteButton" type="submit" class="btn btn-danger" value="삭제">
                                        </td>
                                    </form>
                                </tr>
END;

                            $i++;
                            }
                        ?>
                    </tbody>
                </table>
                            </div>
                            <div class="modal-footer">
                                <button id="banIDButton" class="btn btn-warning">금지아이디</button>
                            </div>                    
                    </div>
                </div>
            </div>

            <!-- 금지아이디 목록 modal -->
            <div class="modal" id="banIDModal">
                <div class="modal-dialog">
                    <div class="modal-content banIDBox">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">금지 아이디</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                        <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">번호</th>
                            <th class="text-center">아이디</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($banIDResult)) {
                                echo <<<END
                                <tr>
                                    <form action='./php/banIDModify.php' method='POST'>
                                    <input class="form-control text-center" type="hidden" name="banID" value='{$row['ID']}'>
                                        <td class="text-center">{$row['ID']}</td>
                                        <td class="text-center">
                                            <input class="form-control text-center" type="text" name="banIDText" value='{$row['BAN_ID']}' required>
                                        </td>
                                        <td>
                                        <input id="banIDModifyButton" name="modifyButton" type="submit" class="btn btn-primary" value="수정">
                                        <input id="banIDDeleteButton" name="deleteButton" type="submit" class="btn btn-danger" value="삭제">
                                        </td>
                                    </form>
                                </tr>
END;

                            }
                        ?>
                    </tbody>
                </table>
                            </div>
                            <div class="modal-footer">
                                <form class="addBanIDBox" action='./php/banIDModify.php' method='POST'>
                                    <input class="form-control text-center addBanIDText" type="text" name="addBanIDText" placeholder='추가할 금지 아이디' required>
                                    <input id="addBanIDButton" name="addButton" type="submit" class="btn btn-warning addBanIDButton" value="추가">
                                </form>
                            </div>                    
                    </div>
                </div>
            </div>

            <!-- 대출 목록 modal -->
            <div class="modal" id="rentalListModal">
                <div class="modal-dialog">
                    <div class="modal-content rentalListBox">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">대출 목록</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                            <div class="modal-body">
                                <div class="row">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">번호</th>
                                                <th class="text-center">아이디</th>
                                                <th class="text-center">제목</th>
                                                <th class="text-center">저자</th>
                                                <th class="text-center">출판사</th>
                                                <th class="text-center">출판일</th>
                                                <th class="text-center">대여일</th>
                                                <th class="text-center">반납일</th>
                                                <th class="text-center">연체일</th>
                                                <th class="text-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                showRentalList(LOGIN_ID_NUM, LOGIN_TYPE);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>    
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
<?php
    closeDB($bookConn, $bookResult);
    closeDB($userConn, $userResult);
    closeDB($adminConn, $adminResult);
    closeDB($banIDConn, $banIDResult);
?>