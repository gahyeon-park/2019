<?php
    include("./common.php");

    function practice($num) {
        echo $num;

        if($num == 1)  { echo "hi"; practice($num + 1);  echo "gahyeon"; }
        else if($num == 2) { echo "bye"; practice($num + 1); }
        else if($num == 3) return;
    }
    practice(1);

    $fileID = 1;
    openDB($structConn);
                    /* 파일 구조에 관한 sql */
                    $structSql = "SELECT * FROM `FILE` 
                    LEFT JOIN `FILE_STRUCTURE` 
                    ON `FILE`.`ID` = `FILE_STRUCTURE`.`FILE_ID`
                    WHERE `FILE_STRUCTURE`.`FILE_ID` = $fileID";
    
    sqlDB($structConn, $structResult, $structSql);
    var_dump(mysqli_fetch_assoc($structResult));
    closeDB($structConn, $structResult);
    // $conn = NULL;       // 데이터 베이스 핸들러
    // $result = NULL;     // 데이터 베이스 쿼리 결과값
    // $sql = "";          // sql 쿼리 구문

    // $lastFileID = NULL; // 파일의 마지막 primary key
    // $fileID = 1;        // where file_id 할때 인덱스

    // openDB($conn);

    // /* 파일의 갯수 (내림차순 정렬 후 첫행 PRIMARY KEY 가져오기) 구하기 */
    // $sql = "SELECT `ID` FROM `FILE` ORDER BY `ID` DESC LIMIT 1";  
    // sqlDB($conn, $result, $sql);
    // $temp = mysqli_fetch_assoc($result);
    // $lastFileID = $temp["ID"];

    // /* 파일 구조에 따라 꺼내기 */
    // $sql = "SELECT * FROM `FILE_STRUCTURE` WHERE `FILE_ID`={$fileID}";  
    // sqlDB($conn, $result, $sql);

    // while($fileID < $lastFileID) {
    //     /* 파일 구조 */
    //     sqlDB($conn, $result, $sql);
        

        
    //     $sql = "SELECT * FROM `FILE_STRUCTURE` WHERE `FILE_ID`={$fileID}";
    //     $fileID++;
    // }

    closeDB($conn, $result);
?>