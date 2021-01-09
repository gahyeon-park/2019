<?php
	include("./common.php");

	/* 값넘김이 없을 때 종료 */
    if(!isset($_POST['modifyButton']) && !isset($_POST['deleteButton'])) exit;
	
	/* 수정및 삭제 버튼 경우에 따라 sql 실행문 설정 */
	/* 수정 버튼 클릭시 */
	if(isset($_POST['modifyButton'])) {
        $sql = "UPDATE `USERS` SET `NAME`='{$_POST['userName']}', `MOBILEPHONE`='{$_POST['userPhone']}', `EMAIL`='{$_POST['userEmail']}', `ADDRESS`='{$_POST['userAddress']}' WHERE `ID`={$_POST['userID']};";
	}
	/* 삭제 버튼 클릭시 */
    if(isset($_POST['deleteButton'])) {
        $sql = "DELETE FROM `USERS` WHERE `ID`={$_POST['userID']};";
	}
	
	/* sql 실행문 실행 */
	openDB($userDB, 'ganiLibrary', $sql, $userResult = -1);

	/* DB 닫기 */
	closeDB($userDB, $userResult);

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

    // if(isset($_POST['modifyButton'])) {
    //     $sql = "UPDATE `USERS` SET `NAME`='{$_POST['userName']}', `MOBILEPHONE`='{$_POST['userPhone']}', `EMAIL`='{$_POST['userEmail']}', `ADDRESS`='{$_POST['userAddress']}' WHERE `ID`={$_POST['userID']};";
    // }
    // if(isset($_POST['deleteButton'])) {
    //     $sql = "DELETE FROM `USERS` WHERE `ID`={$_POST['userID']};";
    // }
    // $result = mysqli_query($conn,$sql);
    
	// if(!$result){
	// 	echo "해당 데이터베이스의 결과 값을 수정할 수 없습니다..".mysqli_error($conn);
        
	// 	// echo "<script>alert('해당 아이디를 찾을 수 없습니다.')</script>";
	// 	// echo "<script>window.open('../index.php', '_self');</script>";
		
	// }

    // mysqli_free_result($result);
    // mysqli_close($conn);
?>
<meta http-equiv='refresh' content='0;url=../index.php'>