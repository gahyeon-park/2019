<?php
    include('./common.php');
    
    if(!isset($_GET['bookID'])) exit;

    $userIDNum = whoisIDNum();                // 현재 로그인 되어있는 회원 고유번호 가져오기
    $userID = whoisID();                // 현재 로그인 되어있는 회원 아이디 가져오기
    $bookID = $_GET['bookID'];          // 대출해야하는 책 고유번호 가져오기
    $rentalDate = date("Y-m-d H:i:s");  //
    $returnDate = date("Y-m-d H:i:s", strtotime("+1 month"));

    rentalBook($userIDNum, $userID, $bookID, $rentalDate, $returnDate);
?>
<meta http-equiv="refresh" content="0; url=../index.php">