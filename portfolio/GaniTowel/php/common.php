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

// ppt 파일 다운로드
function downloadPPT($filePath_origin) {

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

?>