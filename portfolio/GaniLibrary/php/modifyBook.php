<?php


print_r($_POST);

/* 데이터베이스 수정 */
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

/* 이미지 파일 삭제 및 수정 */
$uploaddir = '../files/';   // 저장할 파일 디렉토리 경로
$modifyFile = NULL;          // POST 로 넘겨온 파일 변수

$uploadfile = NULL;         // 저장하는 파일 전체 경로
$imageFileType = NULL;      // 저장하는 파일 타입

$delFile = NULL;            // 삭제해야하는 파일

$uploadOk = true;           // 업로드 가능한 파일인지

var_dump($_FILES['modifyFile']);

if($_FILES['modifyFile']['name'] != '') {
    $modifyFile = $_FILES['modifyFile'];
    $uploadfile = $uploaddir . preg_replace('/^.+[\\\\\\/]/', '', $_FILES['modifyFile']['name']);
    $uploadfile_temp = $uploaddir . pathinfo(preg_replace('/^.+[\\\\\\/]/', '', $_FILES['modifyFile']['tmp_name']), PATHINFO_FILENAME) . '.' . pathinfo($_FILES['modifyFile']['name'], PATHINFO_EXTENSION);
}

$imageFileType =  pathinfo($uploadfile, PATHINFO_EXTENSION);

if(isset($_POST['submit'])) {
    
    $check = getimagesize($_FILES['modifyFile']['tmp_name']);
    
    if($check !== false) {
        echo '이미지 관련 파일입니다.' . $check['mime'];
        $uploadOk = true;
    }
    else {
        echo '이미지 관련 파일이 아닙니다.';
        $uploadOk = false;
    }
}

if(file_exists($uploadfile_temp)) {
    echo "파일이 이미 존재합니다.";
    $uploadOk = false;
}
if($_FILES['modifyFile']['size'] > 500000) {
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
    if(move_uploaded_file($modifyFile['tmp_name'], $uploadfile_temp)) {
        $size = getimagesize($uploadfile);
        echo 'modifyFile' . '파일이 유효하고, 성공적으로 업로드 되었습니다.<br>';
        // echo '======================================================================<br>';
        // print_r($_FILES['modifyFile']);
        // echo '<br>======================================================================<br>';
        // echo '<img src="' . $uploadfile_temp . '">';
        // echo '<br>width : ' . $size[0];
        // echo '<br>height : ' . $size[1];
        // switch($size[2]) {
        //     case 1 : 
        //         echo '<br>type : GIF<br>'; 
        //     break;
        //     case 2 : 
        //         echo '<br>type : JPEG / JPG<br>'; 
        //     break;
        //     case 3 : 
        //         echo '<br>type : PNG<br>'; 
        //     break;
        //     default :
        //         echo '<br>ERROR<br>';
        //     break;
        // }
        // echo '======================================================================<br><br><br>';
    }
    else {
        echo 'modifyFile'. '파일 업로드 공격의 가능성이 있습니다.<br>';
    }
}

/* 원래 임시 이미지 파일 삭제 */
$sql = "SELECT `TEMP_IMG_NAME` FROM `BOOKLIST` WHERE `ID`='{$_POST['modifyID']}'";

$delFile = mysqli_query($conn,$sql);
if(!$delFile){
    echo "해당 데이터베이스에 데이터가 없습니다.".mysqli_error($conn);
    mysqli_close($conn);
    exit;
}
$delFilePath = mysqli_fetch_assoc($delFile);

unlink('../files/' . $delFilePath['TEMP_IMG_NAME']);

// 수정 버튼 클릭시
if(isset($_POST['modifyButton'])) {
    // $sql = "UPDATE `BOOKLIST` SET `TITLE`='{$_POST['modifyBookTitle']}', `AUTHOR`='{$_POST['modifyBookAuthor']}', `PUBLISHER`='{$_POST['modifyBookPublisher']}', `PUBLICATIONDATE`='{$_POST['modifyBookPublicationDate']}', `TEMP_IMG_NAME`='" . pathinfo($uploadfile_temp, PATHINFO_BASENAME) . "' , `ORIGIN_IMG_NAME`='" . pathinfo($uploadfile, PATHINFO_BASENAME) .  "', `SUMMARY`='{$_POST['modifyBookSummary']}');";
    $sql = "UPDATE `BOOKLIST` SET `TITLE`='{$_POST['modifyBookTitle']}', `AUTHOR`='{$_POST['modifyBookAuthor']}', `PUBLISHER`='{$_POST['modifyBookPublisher']}', `PUBLICATIONDATE`='{$_POST['modifyBookPublicationDate']}', `SUMMARY`='{$_POST['modifyBookSummary']}', `TEMP_IMG_NAME`='". pathinfo($uploadfile_temp, PATHINFO_BASENAME) ."', `ORIGIN_IMG_NAME`='". pathinfo($uploadfile, PATHINFO_BASENAME) ."' WHERE `ID`={$_POST['modifyID']};";
    echo $sql;
}

// 삭제 버튼 클릭시
if(isset($_POST['deleteButton'])) {
    $sql = "DELETE FROM `BOOKLIST` WHERE `ID`={$_POST['modifyID']};";
}


if(!mysqli_query($conn,$sql)){
    echo "해당 데이터베이스에 저장할 수 없습니다.".mysqli_error($conn);
    mysqli_close($conn);
    exit;
}

    mysqli_close($conn);
?>
<meta http-equiv='refresh' content='0;url=../index.php'>