<?php

    $filePath = './reservationData.txt';

    $data = json_decode(file_get_contents('php://input'), true);

    file_exists($filePath) || die("not exist");
    is_file($filePath) || die("is not file");
    is_readable($filePath) || die("can not readable");
    is_writable($filePath) || die("can not writable");

    $fileHandle = fopen($filePath, "w+");

    var_dump($data);
    var_dump(json_encode($data));
    $dataString = json_encode($data);

    fwrite($fileHandle, $dataString);

    fclose($fileHandle);

    echo "Success";
?>