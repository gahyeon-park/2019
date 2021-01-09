<?php
// ==================================================================================
// 함수 정의


// DB 열기
function openDB(&$conn, $dataBase, $sql, &$result) {

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

    // result 반환이 필요한 상태면
    if(@($result != -1)) {
    $result = mysqli_query($conn,$sql);
        if(!$result){
            echo "해당 데이터베이스의 결과 값을 가져올 수 없습니다.".mysqli_error($conn);
            mysqli_free_result($result);
            mysqli_close($conn);
            exit;
        }

        if(mysqli_num_rows($result) == 0) {
            // echo "해당 데이터베이스의 데이터가 없습니다.".mysqli_error($conn); 
            return;
        }
    }
    else {
        mysqli_query($conn,$sql);
    }

}

// DB 닫기
function closeDB(&$conn, &$result) {
    mysqli_free_result($result);
    mysqli_close($conn);
}

// 회원 로그인 타입 반환
function whoIsLogin() {
    /* 회원 타입 (관리자, 일반, 로그아웃) */
    $loginType =  -1;    // 로그아웃
                        // 0 : 관리자
                        // 1 : 일반 회원
    
    // 현재 로그인 되어있는 SESSION
    @session_start();
    
    if(@!(isset($_SESSION['memberID'])) && @!(isset($_SESSION['adminID']))) {
        $loginType = -1;    // 로그아웃
    }
    if(@isset($_SESSION['memberID'])) {
        $loginType = 1;     // 일반 회원
    }
    if(@isset($_SESSION['adminID'])) {
        $loginType = 0;     // 일반 회원
    }

    return $loginType;
}

// 로그인 되어있는 회원 아이디 반환
function whoIsID() {
    @session_start();
    if(@isset($_SESSION['memberID'])) return $_SESSION['memberID'];
    if(@isset($_SESSION['adminID'])) return $_SESSION['adminID'];
    return;
}

// 로그인 되어있는 회원 primary ID 반환
function whoIsIDNum() {
    @session_start();
    if(@isset($_SESSION['memberID'])) return $_SESSION['memberIDNum'];
    if(@isset($_SESSION['adminID'])) return $_SESSION['adminIDNum'];
    return;
}



// DB 결과 출력
function printDBResult($result, $printString) {
    while($row = mysqli_fetch_assoc($result)) {
        echo $printString;
    }
}

// 이미지 파일 업로드 
function uploadImgFile($formFile) {
    // $formFile : input으로 넘어온 $_FILES['name']

    $uploaddir = '../files/';   // 저장할 파일 디렉토리 경로
    
    $uploadfile = NULL;         // 저장하는 파일 전체 경로
    $imageFileType = NULL;      // 저장하는 파일 타입
    
    $uploadOk = true;           // 업로드 가능한 파일인지
    
    // if($formFile['name'] != '') {

    // 한글 파일, 영어 파일 가능케
    $uploadfile = $uploaddir . preg_replace('/^.+[\\\\\\/]/', '', $formFile['name']);
    $uploadfile_temp = $uploaddir . pathinfo(preg_replace('/^.+[\\\\\\/]/', '', $formFile['tmp_name']), PATHINFO_FILENAME) . '.' . pathinfo($formFile['name'], PATHINFO_EXTENSION);
    $imageFileType =  pathinfo($uploadfile, PATHINFO_EXTENSION);

    // }
        
    // if(isset($_POST['submit'])) {
    
    // 이미지 파일인지 검사
    $check = getimagesize($formFile['tmp_name']);
    
    if($check !== false) {
        echo '이미지 관련 파일입니다.' . $check['mime'];
        $uploadOk = true;
    }
    else {
        echo '이미지 관련 파일이 아닙니다.';
        $uploadOk = false;
    }
    // }
    
    // 파일 상태 검사
    if(file_exists($uploadfile_temp)) {
        echo "파일이 이미 존재합니다.";
        $uploadOk = false;
    }
    if($formFile['size'] > 500000) {
        echo '파일의 크기가 너무 큽니다.';
        $uploadOk = false;
    }
    if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
        echo 'jpg, jpeg, png, gif 파일만 허용됩니다.';
        $uploadOk = false;
    }
    
    if($uploadOk == false) {
        echo '파일 업로드에 실패하였습니다.';
    }
    else {
        if(move_uploaded_file($formFile['tmp_name'], $uploadfile_temp)) {
            $size = getimagesize($uploadfile);
            echo 'inputFile' . '파일이 유효하고, 성공적으로 업로드 되었습니다.<br>';
        }
        else {
            echo 'inputFile'. '파일 업로드 공격의 가능성이 있습니다.<br>';
        }
    }

    return array('tempFileName'=>pathinfo($uploadfile_temp, PATHINFO_BASENAME), 'originFileName'=>pathinfo($uploadfile, PATHINFO_BASENAME));
}

// 이미지 파일 다운로드
function downloadImg($filePath_temp, $filePath_origin) {

    // 서버에 저장되어 있는 임시파일을 원본 이름으로 복사
    copy($filePath_temp, $filePath_origin);

    // 다운로드 파일 정보
    $fileSize = filesize($filePath_temp);
    $path_parts = pathinfo($filePath_origin);
    $fileName = $path_parts['basename'];
    $extension = $path_parts['extension'];

    print_r($fileSize);
    print_r($path_parts);
    print_r($fileName);
    print_r($extension);

    header("Pragma: public");
    header("Expires: 0");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$fileName");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: $fileSize");
    ob_clean();
    flush();
    readfile($filePath_origin);
    unlink($filePath_origin);

}

// 대출하기
function rentalBook($userIDNum, $userID, $bookID, $rentalDate, $returnDate) {
    // 대출 정보 DB 열기
    echo $userID;
    $rentalResult = openDB($rentalConn, "ganiLibrary", "SELECT * FROM `BOOK_SYSTEM` WHERE `BOOK_ID`='$bookID'", $rentalResult = -1);
    // 대출된 책이 아니라면
    if(mysqli_num_rows($rentalResult) == 0) {
        // DB닫고
        closeDB($rentalConn, $rentalResult);
        
        // 다시열고
        openDB($rentalConn, "ganiLibrary", "INSERT INTO `BOOK_SYSTEM` VALUES ('', '$userIDNum', '$userID', '$bookID', '$rentalDate', '$returnDate', NULL, NULL);", $rentalResult);
    }

    closeDB($rentalConn, $rentalResult);
}

// 대출 목록 보기
function showRentalList($userID, $loginType) {

    if($loginType == 1) { // 일반 회원이라면
        $sql = "SELECT * FROM `BOOK_SYSTEM` WHERE `USER_ID_NUM`='$userID';";
    }
    if($loginType == 0) {
        $sql = "SELECT * FROM `BOOK_SYSTEM`;";
    }

    // DB열기
    openDB($bookSystemConn, 'ganiLibrary', $sql, $bookSystemResult);

    $listNum = 1;

    while($bookSystemRow = mysqli_fetch_assoc($bookSystemResult)) {
        
        // 해당 책 정보 불러오기
        $sql = "SELECT * FROM `BOOKLIST` WHERE `ID`='{$bookSystemRow['BOOK_ID']}';";
        openDB($bookConn, 'ganiLibrary', $sql, $bookResult);
        $bookRow = mysqli_fetch_assoc($bookResult);

        echo <<<END

        <tr>
            <form action="./php/returnBook.php" method="POST">
                <input class="form-control text-center" type="hidden" name="rentalBookID" value="{$bookSystemRow['ID']}">
                <td class="text-center">$listNum</td>
                <td class="text-center">{$bookSystemRow['USER_ID']}</td>
                <td class="text-center">{$bookRow['TITLE']}</td>
                <td class="text-center">{$bookRow['AUTHOR']}</td>
                <td class="text-center">{$bookRow['PUBLISHER']}</td>
                <td class="text-center">{$bookRow['PUBLICATIONDATE']}</td>
                <td class="text-center">{$bookSystemRow['RENTAL_DATE']}</td>
                <td class="text-center">{$bookSystemRow['RETURN_DATE']}</td>
                <td class="text-center">{$bookSystemRow['DELAY_DATE']}</td>
                <td>
                    <input type="submit" class="btn btn-danger" value="반납">
                </td>
            </form>
        </tr>
END;
        $listNum++;

        closeDB($bookConn, $bookResult);
    }

    // DB 닫기
    closeDB($bookSystemConn, $bookSystemResult);
}

// 도서 반납하기
function returnBook($bookID) {
    $sql = "DELETE FROM `BOOK_SYSTEM` WHERE `ID`=$bookID;";
    openDB($bookSystemConn, 'ganiLibrary', $sql, $bookSystemResult = -1);
    closeDB($bookSystemConn, $bookSystemResult);
}

//  ==============================================================
// 전역 변수, 상수, 함수 콜


// 누가 로그인 했는지
define('LOGIN_TYPE', whoIsLogin()); // -1 : 로그아웃
                                    // 0 : 관리자
                                    // 1 : 일반 회원
define('LOGIN_ID_NUM', whoIsIDNum());  // 로그인 primary 아이디
define('LOGIN_ID', whoIsID());          // 로그인 아이디
?>