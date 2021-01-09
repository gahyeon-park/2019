<?php
	include("./common.php");
	
	// 아이디 중복 확인 및 금지 아이디 확인
	$sql = "SELECT * FROM `USERS` WHERE `USERID` = '{$_POST['userID']}';";
	openDB($userConn, 'ganiLibrary', $sql, $userResult);

	if(mysqli_num_rows($userResult) == 0){

		/* 사용할 수 없는 아이디를 적었을 때 */
		$banID = strtolower($_POST['userID']);

		$sql = "SELECT * FROM `BAN_ID` WHERE `BAN_ID`='{$banID}'";
		openDB($banIDConn, 'ganiLibrary', $sql, $banIDResult);

		/* 금지 아이디를 사용했을 때 */
		if(mysqli_num_rows($banIDResult) != 0) {
			closeDB($userConn, $userResult);
			closeDB($banIDConn, $banIDResult);

			echo "<script>alert('회원가입을 할 수 없습니다. 다른 아이디를 선택해 주세요.')</script>";
			echo "<script>history.back();</script>";	
			
			exit;
		}
		closeDB($userConn, $userResult);
		closeDB($banIDConn, $banIDResult);

		/* 회원가입 하기 */	
		$sql = "INSERT INTO `USERS` VALUES ('', '" . $_POST['userID'] . "', '" . (@md5($_POST['userPW'])) . "' , '" . $_POST['userName'] . "', '" . $_POST['userPhone'] . "' ,'" . $_POST['userEmail'] . "', '" . $_POST['userAddress'] . "');";
		openDB($userConn, 'ganiLibrary', $sql, $userResult);


		// INSERT 오류가 없다면
		if($userResult) {

			closeDB($userConn, $userResult);
			echo "<script>alert('회원가입이 정상적으로 되었습니다.')</script>";
			echo "<script>history.back();</script>";

			exit;
		}
		// 오류가 있다면
		else {

			closeDB($userConn, $userResult);
			echo "<script>alert('회원가입이 불가능합니다.')</script>";
			echo "<script>history.back();</script>";

			exit;
		}
	}
	else {
		closeDB($userConn, $userResult);

		echo "<script>alert('아이디가 중복되었습니다.')</script>";
        echo "<script>history.back();</script>";
		exit;
	}

	// 혹시의 경우의 DB 닫기
	closeDB($userConn, $userResult);
	closeDB($banIDConn, $banIDResult);
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

    // $sql = "SELECT * FROM `USERS` WHERE `USERID` = '{$_POST['userID']}';";

	// $result = mysqli_query($conn,$sql);
	// if(!$result){
	// 	echo "해당 데이터베이스의 결과 값을 가져올 수 없습니다.".mysqli_error($conn);
	// 	mysqli_free_result($result);
    //     mysqli_close($conn);
	// 	exit;
	// }

    // if(mysqli_num_rows($result) == 0){
	// 	/* 사용할 수 없는 아이디를 적었을 때 */
	// 	$banID = strtolower($_POST['userID']);
	// 	$sql = "SELECT * FROM `BAN_ID` WHERE `BAN_ID`='{$banID}'";

	// 	$banRow = mysqli_query($conn, $sql);

	// 	if(mysqli_num_rows($banRow) != 0) {
	// 		mysqli_free_result($result);
	// 		mysqli_close($conn);

	// 		echo "<script>alert('회원가입을 할 수 없습니다. 다른 아이디를 선택해 주세요.')</script>";
	// 		echo "<script>history.back();</script>";	
			
	// 		exit;
	// 	}

	// 	/* 회원가입 하기 */
	// 	$sql = "INSERT INTO `USERS` VALUES ('', '" . $_POST['userID'] . "', '" . (@md5($_POST['userPW'])) . "' , '" . $_POST['userName'] . "', '" . $_POST['userPhone'] . "' ,'" . $_POST['userEmail'] . "', '" . $_POST['userAddress'] . "');";

	// 	if(mysqli_query($conn, $sql)) {
	// 		mysqli_free_result($result);
	// 		mysqli_close($conn);

	// 		echo "<script>alert('회원가입이 정상적으로 되었습니다.')</script>";
	// 		echo "<script>history.back();</script>";

	// 		exit;
	// 	}
	// 	else {
	// 		mysqli_free_result($result);
	// 		mysqli_close($conn);

	// 		echo "<script>alert('회원가입이 불가능합니다.')</script>";
	// 		echo "<script>history.back();</script>";

	// 		exit;
	// 	}
	// }
	// else {
	// 	mysqli_free_result($result);
    //     mysqli_close($conn);

	// 	echo "<script>alert('아이디가 중복되었습니다.')</script>";
    //     echo "<script>history.back();</script>";
	// 	exit;
	// }
    // mysqli_free_result($result);
    // mysqli_close($conn);
?>