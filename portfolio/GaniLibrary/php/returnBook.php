<?php
    include("./common.php");
    
    $bookID = $_POST['rentalBookID'];
    returnBook($bookID);
?>
<meta http-equiv="refresh" content="0; url=../index.php">