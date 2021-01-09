<?php
include('./common.php');

/* 데이터베이스 수정 */

// 수정 버튼 클릭시
if(isset($_POST['modifyButton'])) {
    $sql = "SELECT * FROM `BAN_ID` WHERE `BAN_ID`='{$_POST['banIDText']}';";
    openDB($banIDConn, 'ganiLibrary', $sql, $banIDResult);
    
    // 중복되는 금지 아이디가 없다면
    if(mysqli_num_rows($banIDResult) == 0) {
        
        // 최종 DB 실행문
        $sql = "UPDATE `BAN_ID` SET `BAN_ID`='{$_POST['banIDText']}' WHERE `ID`='{$_POST['banID']}';";
        closeDB($banIDConn, $banIDResult);
    }
    // 중복되는 금지 아이디가 있다면
    else {
        closeDB($banIDConn, $banIDResult);
        echo '<script>alert("금지할 아이디가 중복되었습니다."); history.back();</script>';
        exit;
    }
}

// 삭제 버튼 클릭시
if(isset($_POST['deleteButton'])) {
    // 최종 DB 실행문
    $sql = "DELETE FROM `BAN_ID` WHERE `ID`={$_POST['banID']};";
}

// 추가 버튼 클릭시
if(isset($_POST['addButton'])) {

    $sql = "SELECT * FROM `BAN_ID` WHERE `BAN_ID`='{$_POST['addBanIDText']}';";
    openDB($banIDConn, 'ganiLibrary', $sql, $banIDResult);
    
    // 중복된 금지 아이디가 없다면
    if(mysqli_num_rows($banIDResult) == 0) {
        // 최종 DB 실행문
        $sql = "INSERT INTO `BAN_ID` VALUES ('','{$_POST['addBanIDText']}');";
        closeDB($banIDConn, $banIDResult);
    }
    // 중복된 금지 아이디가 있다면
    else {
        closeDB($banIDConn, $banIDResult);
        echo '<script>alert("금지할 아이디가 중복되었습니다."); history.back();</script>';
        exit;
    }
}

// 최종 sql 구문을 실행시키고 DB를 닫음
openDB($banIDConn, 'ganiLibrary', $sql, $banIDResult);
closeDB($banIDConn, $banIDResult);

// $conn= mysqli_connect("127.0.0.1", "gani", "gani", "ganiLibrary");
// if(!$conn){
//     echo "데이터베이스를 연결할 수 없습니다.".mysqli_error($conn);
//     mysqli_close($conn);
//     exit;
// }

// if(!mysqli_select_db($conn,"ganiLibrary")){
//     echo "데이터베이스를 찾을 수 없습니다.".mysqli_error($conn);
//     mysqli_close($conn);
//     exit;
// }

// // 수정 버튼 클릭시
// if(isset($_POST['modifyButton'])) {
//     // $sql = "UPDATE `BOOKLIST` SET `TITLE`='{$_POST['modifyBookTitle']}', `AUTHOR`='{$_POST['modifyBookAuthor']}', `PUBLISHER`='{$_POST['modifyBookPublisher']}', `PUBLICATIONDATE`='{$_POST['modifyBookPublicationDate']}', `TEMP_IMG_NAME`='" . pathinfo($uploadfile_temp, PATHINFO_BASENAME) . "' , `ORIGIN_IMG_NAME`='" . pathinfo($uploadfile, PATHINFO_BASENAME) .  "', `SUMMARY`='{$_POST['modifyBookSummary']}');";
//     $result = mysqli_query($conn,"SELECT * FROM `BAN_ID` WHERE `BAN_ID`='{$_POST['banIDText']}';");
//     if(!$result) {
//         echo mysqli_error($conn);
//     }
//     if(mysqli_num_rows($result) == 0) {
//         $sql = "UPDATE `BAN_ID` SET `BAN_ID`='{$_POST['banIDText']}' WHERE `ID`='{$_POST['banID']}';";
//         mysqli_free_result($result);
//     }
//     else {
//         mysqli_free_result($result);
//         mysqli_close($conn);
//         echo '<script>alert("금지할 아이디가 중복되었습니다."); history.back();</script>';
//         exit;
//     }
// }

// // 삭제 버튼 클릭시
// if(isset($_POST['deleteButton'])) {
//     $sql = "DELETE FROM `BAN_ID` WHERE `ID`={$_POST['banID']};";
// }

// // 추가 버튼 클릭시
// if(isset($_POST['addButton'])) {
//     $result = mysqli_query($conn,"SELECT * FROM `BAN_ID` WHERE `BAN_ID`='{$_POST['addBanIDText']}';");
//     if(!$result) {
//         echo mysqli_error($conn);
//     }
//     if(mysqli_num_rows($result) == 0) {
//         $sql = "INSERT INTO `BAN_ID` VALUES ('','{$_POST['addBanIDText']}');";
//         mysqli_free_result($result);
//     }
//     else {
//         mysqli_free_result($result);
//         mysqli_close($conn);
//         echo '<script>alert("금지할 아이디가 중복되었습니다."); history.back();</script>';
//         exit;
//     }
// }


// if(!mysqli_query($conn,$sql)){
//     echo "해당 데이터베이스에 저장할 수 없습니다.".mysqli_error($conn);
//     mysqli_close($conn);
//     exit;
// }

//     mysqli_close($conn);
?>
<meta http-equiv='refresh' content='0;url=../index.php'>