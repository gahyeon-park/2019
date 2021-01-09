<?php

$filePath = "./data.json";

isset($_POST) || exit;

file_exists($filePath) || die("is not exist");
is_file($filePath) || die("is not file");
is_readable($filePath) || die("can not read");
is_writable($filePath) || die("can not write");

$fHandle = fopen($filePath, "r+");

$fileText = fgets($fHandle, filesize($filePath) + 1);

fclose($fHandle);

echo $fileText;

?>