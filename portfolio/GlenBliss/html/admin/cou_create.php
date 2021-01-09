<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

$img = @uploadImgFile($_FILES['cou_img']);
$simg = @uploadImgFile($_FILES['cou_simg']);
$img_real = $img['originFileName'];
$simg_real = $simg['originFileName'];
$img_temp = $img['tempFileName'];
$simg_temp = $simg['tempFileName'];

openDB($conn);
$sql = "INSERT INTO COUPON 
    (`COU_NAME`, `COU_SALE`, `COU_IMG_REAL`,
        `COU_IMG_TEMP`, `COU_SIMG_REAL`, `COU_SIMG_TEMP`)
            VALUE
                ('{$_POST['cou_name']}', '{$_POST['cou_sale']}', '$img_real',
                '$img_temp', '$simg_real', '$simg_temp')
";

sqlDB($conn, $reuslt, $sql);


echo "<script>history.back();</script>";
?>