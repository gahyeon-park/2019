<?php
    include('./common.php');

    isset($_GET['downloadID']) || exit;
    $downloadID = $_GET['downloadID'];
    
    // header("Access-Control-Allow-Origin: *"); 

    /* DB */

    // DB열고 실행시키기
    $sql = "SELECT * FROM `BOOKLIST` WHERE `ID` = '" . $downloadID . "';";
    openDB($bookConn, 'ganiLibrary', $sql, $bookResult);

    // 정보를 연관배열로 변환
    $row = mysqli_fetch_assoc($bookResult);

    // 정보가 없다면
    if(!$row) {
        echo "해당 데이터를 읽을 수 없습니다." . mysqli_error($conn);

        // DB를 닫음
        closeDB($bookConn, $bookResult);
    }

	// $conn= mysqli_connect("127.0.0.1", "gani", "gani", "ganiLibrary");
	// if(!$conn){
	// 	echo "데이터베이스를 연결할 수 없습니다.".mysqli_error($conn);
	// 	mysqli_close($conn);
	// 	exit;
	// }
	// if(!mysqli_select_db($conn,"ganiLibrary")){
	// 	echo "데이터베이스를 찾을 수 없습니다.".mysqli_error($conn);
	// 	mysqli_close($conn);
	// 	exit;
	// }

    // $sql = "SELECT * FROM `BOOKLIST` WHERE `ID` = '" . $downloadID . "';";
    // $result = mysqli_query($conn,$sql);
    
	// if(!$result){
	// 	echo "해당 데이터베이스의 결과 값을 가져올 수 없습니다.".mysqli_error($conn);
	// 	mysqli_free_result($result);
    //     mysqli_close($conn);
	// 	exit;
	// }
    
    // if(mysqli_num_rows($result) == 0) {
    //     echo "해당 데이터베이스의 데이터가 없습니다.".mysqli_error($conn); 
    //     mysqli_free_result($result);
    //     mysqli_close($conn);
	// 	exit;
    // } 

    // $row = mysqli_fetch_assoc($result);
    // if(!$row) {
    //     echo "해당 데이터를 읽을 수 없습니다." . mysqli_error($conn);
    //     mysqli_free_result($result);
    //     mysqli_close($conn);
    // }

    /* 파일 다운로드 */

    $filePath_temp = '../files/' . $row['TEMP_IMG_NAME'];
    $filePath_origin = '../files/' . $row['ORIGIN_IMG_NAME'];

    // 임시파일을 원본파일 이름으로 하나 복사후 다운로드 후 복사된 파일 지우기
    downloadImg($filePath_temp, $filePath_origin);

    // // 파일 경로
    
    // $filePath_temp = '../files/' . $row['TEMP_IMG_NAME'];
    // $filePath_origin = '../files/' . $row['ORIGIN_IMG_NAME'];

    // copy($filePath_temp, $filePath_origin);

    // // 다운로드 파일 정보
    // $fileSize = filesize($filePath_origin);
    // $path_parts = pathinfo($filePath_origin);
    // $fileName = $path_parts['basename'];
    // $extension = $path_parts['extension'];

    // header("Pragma: public");
    // header("Expires: 0");
    // header("Content-Type: application/octet-stream");
    // header("Content-Disposition: attachment; filename=$fileName");
    // header("Content-Transfer-Encoding: binary");
    // header("Content-Length: $fileSize");
    
    // unlink($filePath_origin);
    
    closeDB($bookConn, $bookResult);
    // mysqli_free_result($result);
    // mysqli_close($conn);

?>
<!-- <meta http-equiv='refresh' content='0;url=../index.php'> -->