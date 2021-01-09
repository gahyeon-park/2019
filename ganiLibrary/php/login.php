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

    $sql = "SELECT * FROM `USERS` WHERE `USERID` = '". $_POST['loginID'] ."';";

	$result = mysqli_query($conn,$sql);
	if(!$result){
		echo "해당 데이터베이스의 결과 값을 가져올 수 없습니다.".mysqli_error($conn);
        
        mysqli_free_result($result);
        mysqli_close($conn);
        
		echo "<script>alert('해당 아이디를 찾을 수 없습니다.')</script>";
		echo "<script>window.open('../index.php', '_self');</script>";
		exit;
	}
    
    if(mysqli_num_rows($result) == 0) {
        echo "해당 데이터베이스의 데이터가 없습니다.".mysqli_error($conn); 
        
        mysqli_free_result($result);
        mysqli_close($conn);

        echo "<script>alert('해당 아이디를 찾을 수 없습니다.')</script>";
		echo "<script>window.open('../index.php', '_self');</script>";
		exit;
    }
    
    while($row = mysqli_fetch_assoc($result)) {
        if($row['USERPASSWORD'] == md5($_POST['loginPW'])) {
            setcookie("loginID", $row['USERID'], time() + (86400 * 30), '/');
            
            mysqli_free_result($result);
            mysqli_close($conn);

            echo "<script>alert('로그인 되었습니다.')</script>";
		    echo "<script>window.open('../index.php', '_self');</script>";
		    exit;
        }
        else {
            mysqli_free_result($result);
            mysqli_close($conn);

            echo "<script>alert('해당 아이디의 비밀번호가 잘못되었습니다.')</script>";
		    echo "<script>window.open('../index.php', '_self');</script>";
		    exit;
        }
    }
    mysqli_free_result($result);
    mysqli_close($conn);
?>