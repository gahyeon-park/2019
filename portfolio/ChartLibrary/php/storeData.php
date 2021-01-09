<?php

$filePath = "./data.json";

isset($_POST) || exit;

file_exists($filePath) || die("is not exist");
is_file($filePath) || die("is not file");
is_readable($filePath) || die("can not read");
is_writable($filePath) || die("can not write");


/* json 파일로 저장 */
$fHandle = fopen($filePath, "w+");
fwrite($fHandle, json_encode($_POST));
fclose($fHandle);

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

$result = mysqli_query($conn, "INSERT INTO `CHART` VALUES ('', '{$_POST['chartType']}')");
if(!$result) {
    echo "can not query" . mysqli_error($conn);
    mysqli_free_result($result);
    mysqli_close($conn);
    exit;
}

$index = $conn->insert_id;

$i = 0;
while($i < count($_POST['nameArr'])) {
    $result = mysqli_query($conn, "INSERT INTO `CHART_DATA` VALUES ('', {$index}, '{$_POST['nameArr'][$i]}', '{$_POST['valueArr'][$i]}', '{$_POST['colorArr'][$i]}')");

    if(!$result) {
        echo "can not query" . mysqli_error($conn);
        mysqli_free_result($result);
        mysqli_close($conn);
        exit;
    }    

    $i++;
}

mysqli_free_result($result);
mysqli_close($conn);

echo "success";
?>