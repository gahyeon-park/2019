<?php
include('./common.php');
/* ganiLibrary에 정보 추가 */

// 파일을 업로드 하고
// 파일의 임시파일과 원본 파일 이름을 가져옴 (image.jpg)
$fileName = uploadImgFile($_FILES['inputFile']);


// /* 이미지 파일 업로드 */
//     $uploaddir = '../files/';   // 저장할 파일 디렉토리 경로
//     $inputFile = NULL;          // POST 로 넘겨온 파일 변수

//     $uploadfile = NULL;         // 저장하는 파일 전체 경로
//     $imageFileType = NULL;      // 저장하는 파일 타입

//     $uploadOk = true;           // 업로드 가능한 파일인지

//     var_dump($_FILES['inputFile']);

//     if($_FILES['inputFile']['name'] != '') {
//         $inputFile = $_FILES['inputFile'];
//         $uploadfile = $uploaddir . preg_replace('/^.+[\\\\\\/]/', '', $_FILES['inputFile']['name']);
//         $uploadfile_temp = $uploaddir . pathinfo(preg_replace('/^.+[\\\\\\/]/', '', $_FILES['inputFile']['tmp_name']), PATHINFO_FILENAME) . '.' . pathinfo($_FILES['inputFile']['name'], PATHINFO_EXTENSION);
//     }

//     $imageFileType =  pathinfo($uploadfile, PATHINFO_EXTENSION);

//     if(isset($_POST['submit'])) {
        
//         $check = getimagesize($_FILES['inputFile']['tmp_name']);
        
//         if($check !== false) {
//             echo '이미지 관련 파일입니다.' . $check['mime'];
//             $uploadOk = true;
//         }
//         else {
//             echo '이미지 관련 파일이 아닙니다.';
//             $uploadOk = false;
//         }
//     }

//     if(file_exists($uploadfile_temp)) {
//         echo "파일이 이미 존재합니다.";
//         $uploadOk = false;
//     }
//     if($_FILES['inputFile']['size'] > 500000) {
//         echo '파일의 크기가 너무 큽니다.';
//         $uploadOk = false;
//     }
//     if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
//         echo 'jpg, jpeg, png, gif 파일만 허용됩니다.';
//         $uploadOk = false;
//     }
    
//     if($uploadOk == false) {
//         echo '파일 업로드에 실패하였습니다.';
//     }
//     else {
//         if(move_uploaded_file($inputFile['tmp_name'], $uploadfile_temp)) {
//             $size = getimagesize($uploadfile);
//             echo 'inputFile' . '파일이 유효하고, 성공적으로 업로드 되었습니다.<br>';
//             // echo '======================================================================<br>';
//             // print_r($_FILES['inputFile']);
//             // echo '<br>======================================================================<br>';
//             // echo '<img src="' . $uploadfile_temp . '">';
//             // echo '<br>width : ' . $size[0];
//             // echo '<br>height : ' . $size[1];
//             // switch($size[2]) {
//             //     case 1 : 
//             //         echo '<br>type : GIF<br>'; 
//             //     break;
//             //     case 2 : 
//             //         echo '<br>type : JPEG / JPG<br>'; 
//             //     break;
//             //     case 3 : 
//             //         echo '<br>type : PNG<br>'; 
//             //     break;
//             //     default :
//             //         echo '<br>ERROR<br>';
//             //     break;
//             // }
//             // echo '======================================================================<br><br><br>';
//         }
//         else {
//             echo 'inputFile'. '파일 업로드 공격의 가능성이 있습니다.<br>';
//         }
//     }


/* 데이터베이스 추가 */
$sql = "INSERT INTO `BOOKLIST` VALUES ('', '{$_POST['addBookTitle']}', '{$_POST['addBookAuthor']}', '{$_POST['addBookPublisher']}', '{$_POST['addBookPublicationDate']}', '" . $fileName['tempFileName'] . "' , '" . $fileName['originFileName'] .  "' , NULL, NULL,'{$_POST['addBookSummary']}');";
openDB($bookConn, 'ganiLibrary', $sql, $bookResult = -1);
closeDB($bookConn, $bookResult);

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

// $sql = "INSERT INTO `BOOKLIST` VALUES ('', '{$_POST['addBookTitle']}', '{$_POST['addBookAuthor']}', '{$_POST['addBookPublisher']}', '{$_POST['addBookPublicationDate']}', '" . $fileName['tempFileName'] . "' , '" . $fileName['originFileName'] .  "' , NULL, NULL,'{$_POST['addBookSummary']}');";

// if(!mysqli_query($conn,$sql)){
//     echo "해당 데이터베이스에 저장할 수 없습니다.".mysqli_error($conn);
//     mysqli_close($conn);
//     exit;
// }

//     mysqli_close($conn);
?>
<meta http-equiv='refresh' content='0;url=../index.php'>