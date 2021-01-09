<?php
    include("./common.php");

    /* 값 넘김이 없을 시 종료 */
    isset($_POST['searchType']) || exit;
    isset($_POST['searchText']) || exit;

    $searchType = $_POST['searchType'];
    $searchText = $_POST['searchText'];
    $bookList = array();

    /* 조회 sql 실행문 */
    $sql = "SELECT * FROM `BOOKLIST` WHERE `". $searchType . "` LIKE '%" . $searchText . "%';";
    openDB($bookConn, 'ganiLibrary', $sql, $bookResult);

    /* DB 결과를 bookList 배열에 담음 */
    $i = 0;
    while($row = mysqli_fetch_assoc($bookResult)) {
        $bookList[$i] = $row;
        $i++;
    }

    /* DB 닫기 */
    closeDB($bookConn, $bookResult);

    /* ajax 값 넘기기 */
    echo json_encode(array('result'=>true, 'bookList'=>$bookList));
    
    // /* DB */
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

    // $sql = "SELECT * FROM `BOOKLIST` WHERE `". $searchType . "` LIKE '%" . $searchText . "%';";
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

    // $i = 0;
    // while($row = mysqli_fetch_assoc($result)) {
    //     $bookList[$i] = $row;
    //     $i++;
    // }
    // mysqli_free_result($result);
    // mysqli_close($conn);
    
    // echo json_encode(array('result'=>true, 'bookList'=>$bookList));
?>