<?php
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

    $sql = "SELECT * FROM `USERS` WHERE `USERID` = '{$_POST['userID']}';";

	$result = mysqli_query($conn,$sql);
	if(!$result){
		echo "해당 데이터베이스의 결과 값을 가져올 수 없습니다.".mysqli_error($conn);
		mysqli_free_result($result);
        mysqli_close($conn);
		exit;
	}

    if(mysqli_num_rows($result) == 0){

		$sql = "INSERT INTO `USERS` VALUES ('', '" . $_POST['userID'] . "', '" . (@md5($_POST['userPW'])) . "' , '" . $_POST['userName'] . "', '" . $_POST['userPhone'] . "' ,'" . $_POST['userEmail'] . "', '" . $_POST['userAddress'] . "');";

		if(mysqli_query($conn, $sql)) {
			mysqli_free_result($result);
			mysqli_close($conn);

			echo "<script>alert('회원가입이 정상적으로 되었습니다.')</script>";
			echo "<script>history.back();</script>";

			exit;
		}
		else {
			mysqli_free_result($result);
			mysqli_close($conn);

			echo "<script>alert('회원가입이 불가능합니다.')</script>";
			echo "<script>history.back();</script>";

			exit;
		}
	}
	else {
		mysqli_free_result($result);
        mysqli_close($conn);

		echo "<script>alert('아이디가 중복되었습니다.')</script>";
        echo "<script>history.back();</script>";
		exit;
	}
    mysqli_free_result($result);
    mysqli_close($conn);
?>