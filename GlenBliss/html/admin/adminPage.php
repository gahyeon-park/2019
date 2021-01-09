<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <title>GlenBliss Admin</title>
        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Raleway&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../../css/reset.css">
        <link rel="stylesheet" href="../../css/admin/adminPage.css">
    </head>
    <body>
        <div id="wrap">
            <form action="./adminLogin.php" method="POST">
                <h1 class="adminTitle">관리자 로그인</h1>
                <input class="inputBox" type="text" name="user_id" placeholder="아이디를 입력해 주세요.">
                <input class="inputBox" type="password" name="user_pw" placeholder="******">
                <input class="inputBox submitButton" type="submit" name="submit" value="관리자 로그인">
            </form>    
        </div>
    </body>
</html>