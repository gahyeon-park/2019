<?php
    isset($_POST['searchType']) || exit;
    isset($_POST['searchText']) || exit;

    $searchType = $_POST['searchType'];
    $searchText = $_POST['searchText'];
    $bookList = array();

    /* DB */
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

    $sql = "SELECT * FROM `BOOKLIST` WHERE `". $searchType . "` = '" . $searchText . "';";
    $result = mysqli_query($conn,$sql);
    
	if(!$result){
		echo "해당 데이터베이스의 결과 값을 가져올 수 없습니다.".mysqli_error($conn);
		mysqli_free_result($result);
        mysqli_close($conn);
		exit;
	}
    
    if(mysqli_num_rows($result) == 0) {
        echo "해당 데이터베이스의 데이터가 없습니다.".mysqli_error($conn); 
        mysqli_free_result($result);
        mysqli_close($conn);
		exit;
    } 

    $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $bookList[$i] = $row;
        $i++;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    
    echo json_encode(array('result'=>true, 'bookList'=>$bookList));
?>