<?php

// isset($_POST) || exit;

$data = [
    'chartType'=>null,
    'nameArr'=>array(),
    'valueArr'=>array(),
    'colorArr'=>array()
];

/* 데이터베이스로 저장 */
$conn = mysqli_connect("localhost", "st07", "c9st07", "st07");
if(!$conn) {
    echo "can not connect" . mysqli_error($conn);
    mysqli_close($conn);
    exit;
}

if(!mysqli_select_db($conn, 'st07')) {
    echo "can not select" . mysqli_error($conn);    
    mysqli_close($conn);
    exit;
}

/* 데이터 값 빼오기 */
$result = mysqli_query($conn, "SELECT * FROM `CHART_DATA` WHERE `CHART_ID`='{$_POST['index']}'");
if(!$result) {
    echo "can not query" . mysqli_error($conn);
    mysqli_free_result($result);
    mysqli_close($conn);
    exit;
}

if(mysqli_num_rows($result) == 0) {
    echo "no data" . mysqli_error($conn);
    mysqli_free_result($result);
    mysqli_close($conn);
    exit;
}

while($row = mysqli_fetch_assoc($result)) {    
    array_push($data['nameArr'], $row['NAME']);
    array_push($data['valueArr'], $row['VALUE']);
    array_push($data['colorArr'], $row['COLOR']);
}

/* 데이터 차트 타입 가져오기 */
$result = mysqli_query($conn, "SELECT * FROM `CHART` WHERE `ID`={$_POST['index']}");
if(!$result) {
    echo "can not query" . mysqli_error($conn);
    mysqli_free_result($result);
    mysqli_close($conn);
    exit;
}

if(mysqli_num_rows($result) == 0) {
    echo "no data" . mysqli_error($conn);
    mysqli_free_result($result);
    mysqli_close($conn);
    exit;
}

$row = mysqli_fetch_assoc($result);
$data['chartType'] = $row['TYPE'];

mysqli_free_result($result);
mysqli_close($conn);

echo json_encode($data);
?>