<?php
include("../php/common.php");
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <!-- x icon -->
        <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">

        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">

        <!-- bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <!-- css -->
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/main/main.css">

        <!-- javascript -->
        <script src="../script/common.js"></script>
        <script src="../script/main.js"></script>
        <title>GANI TOWEL</title>
    </head>
    <body>
        <div id='wrap'>
            <?php include("./header.php") ?>

            <!-- 상품 목록 -->
            <section class='productList'>
                <!-- 가니 세면타월 -->
                <article class='productBox'>
                    <img class='productImg' src="../images/washTowel/total.jpg" alt="가니세면타월전체">
                    
                    <!-- 호버시 효과 -->
                    <div class='productHover'>
                        <a href="./detail.php?productName=washTowel"><i class='xi-search xi-3x iconBackground'></i></a>
                        <i class='xi-plus xi-3x iconBackground fastMyCartButton' value="washTowel"></i>
                        <p class='iconText'>자세히</p>
                        <p class='iconText'>빠른담기</p>
                    </div>

                    <h2 class='productTitle'>가니 세면타월</h2>
                </article>
                <!-- 가니 비치타월 -->
                <article class='productBox'>
                    <img class='productImg' src="../images/beachTowel/total.jpg" alt="가니비치타월전체">
                    
                    <!-- 호버시 효과 -->
                    <div class='productHover'>
                            <a href="./detail.php?productName=beachTowel"><i class='xi-search xi-3x iconBackground'></i></a>
                            <i class='xi-plus xi-3x iconBackground fastMyCartButton' value="beachTowel"></i>
                            <p class='iconText'>자세히</p>
                            <p class='iconText'>빠른담기</p>
                    </div>
                    
                    <h2 class='productTitle'>가니 비치타월</h2>
                </article>
                <!-- 가니 손수건 -->
                <article class='productBox'>
                    <img class='productImg' src="../images/handTowel/total.jpg" alt="가니손수건전체">
                                        
                    <!-- 호버시 효과 -->
                    <div class='productHover'>
                            <a href='./detail.php?productName=handTowel'><i id='detailButton' class='xi-search xi-3x iconBackground'></i></a>
                            <i class='xi-plus xi-3x iconBackground fastMyCartButton' value="handTowel"></i>
                            <p class='iconText'>자세히</p>
                            <p class='iconText'>빠른담기</p>
                    </div>
                    
                    <h2 class='productTitle'>가니 손수건</h2>
                </article>
            </section>

            <?php include("./footer.php") ?>
        </div>    
    </body>
</html>