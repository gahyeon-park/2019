<?php
// open database
function openDB(&$conn) {

    $conn = @mysqli_connect("localhost", "st07", "c9st07", "st07");
    if(!$conn){
        echo "데이터베이스를 연결할 수 없습니다.".mysqli_error($conn);
        @mysqli_close($conn);
        exit;
    }
    if(!@mysqli_select_db($conn, "st07")){
        echo "데이터베이스를 찾을 수 없습니다.".mysqli_error($conn);
        @mysqli_close($conn);
        exit;
    }

}

// excute sql database
function sqlDB(&$conn, &$result, $sql) {
        $result = @mysqli_query($conn,$sql);

        if(!$result){
            echo "해당 데이터베이스의 결과 값을 가져올 수 없습니다.".mysqli_error($conn);
            @mysqli_free_result($result);
            @mysqli_close($conn);

            return -1;  // result error
        }

        if(@mysqli_num_rows($result) == 0) {
            // echo "해당 데이터베이스의 데이터가 없습니다.".mysqli_error($conn); 
            return 0;
        }

        return 1;   // complete result
}

// close database
function closeDB(&$conn, &$result) {
    @mysqli_free_result($result);
    @mysqli_close($conn);
}

// who is login?
function whoIsLogin() {
    /* member log in */
    if(@isset($_SESSION['memberID'])) {
        return [true, $_SESSION['memberID'], $_SESSION['memberName'], $_SESSION['memberNick']];        
        /*      login       member id           member name                 member nick name */
    }

    /* log out */
    else {
        return [false, '', '', ''];
    }

}

// money comma
function setMoneyComma($moneyNum) {
    $moneyString = (string)$moneyNum;

    $moneyString = strrev($moneyString);
    $moneyStringArr = str_split($moneyString, 3);

    $resultString = join(",", $moneyStringArr);
    $resultString = strrev($resultString);

    return $resultString;
}

// money comma remove
function removeMoneyComma($moneyString) {
    $resultNum = (int)str_replace(',', '', $moneyString);

    return $resultNum;
}

// set price : high, middle, low
function setPriceType($monthNum, $dateNum) {
    // low : ~ 06-20, 09-01 ~
    // middle : 06-21 ~ 07-25, 08-18 ~ 08-31
    // high : 07-26 ~ 08-17

    // low Date
    if(($monthNum == 6 && $dateNum <= 20) || ($monthNum <= 5) || ($monthNum >= 9)) return -1;

    // middle Date
    else if(($monthNum == 6 && $dateNum >= 21) || ($monthNum == 7 && $dateNum <= 25) || ($monthNum == 8 && $dateNum >= 18 && $dateNum <= 31)) return 0;

    // high Date
    else if(($monthNum == 7 && $dateNum >= 26) || ($monthNum == 8 && $dateNum <= 17)) return 1;
} 

// 이미지 파일 업로드 
function uploadImgFile($formFile) {
    // $formFile : input으로 넘어온 $_FILES['name']

    $uploaddir = '../../images/coupon/';   // 저장할 파일 디렉토리 경로
    
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
    $check = @getimagesize($formFile['tmp_name']);
    
    if($check !== false) {
        $uploadOk = true;
        echo "<script>alert('파일 업로드에 실패하였습니다').</script>";
    }
    else {
        $uploadOk = false;
        echo "<script>alert('파일 업로드에 실패하였습니다').</script>";
    }
    // }
    
    // 파일 상태 검사
    if(@file_exists($uploadfile_temp)) {
        $uploadOk = false;
        echo "<script>alert('파일 업로드에 실패하였습니다').</script>";
    }
    if($formFile['size'] > 500000) {
        $uploadOk = false;
        echo "<script>alert('파일 업로드에 실패하였습니다').</script>";
    }
    if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
        $uploadOk = false;
        echo "<script>alert('파일 업로드에 실패하였습니다').</script>";
    }
    
    if($uploadOk == false) {
        echo "<script>alert('파일 업로드에 실패하였습니다').</script>";
    }
    else {
        if(@move_uploaded_file($formFile['tmp_name'], $uploadfile_temp)) {
            $size = getimagesize($uploadfile);
            echo "<script>alert('파일 업로드에 성공하였습니다').</script>";
        }
        else {
            echo "<script>alert('파일 업로드에 실패하였습니다').</script>";
        }
    }

    return array('tempFileName'=>pathinfo($uploadfile_temp, PATHINFO_BASENAME), 'originFileName'=>pathinfo($uploadfile, PATHINFO_BASENAME));
}

// PDF 파일 다운로드
function downloadPDF($filePath_origin) {

    // 다운로드 파일 정보
    $fileSize = filesize($filePath_origin);
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

?>