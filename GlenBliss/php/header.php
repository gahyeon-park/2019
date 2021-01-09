<header>
                <!-- left Navigation Menu -->
                <nav class="leftMenuBox">
                    <ul>
                        <li class="leftMenu">
                            <a class="leftMenuText" href="../about/aboutPage.php">ABOUT</a>
                        </li>
                        <li class="leftMenu">
                            <a class="leftMenuText" href="../room/room_main.php">ROOM</a>
                        </li>
                        <li class="leftMenu">
                            <a class="leftMenuText" href="../special/specialPage.php">SPECIAL</a>
                        </li>
                        <li class="leftMenu">
                            <a class="leftMenuText" href="../notice/notice.php">NOTICE</a>
                        </li>
                        <li class="leftMenu">
                            <a class="leftMenuText" href="../event/event.php">EVENT</a>
                        </li>
                    </ul>
                </nav>

                <!-- logo -->
                <a href="../main/main.php"><img class="logoImg" src="../../images/logo.png" alt="GlenBlissLogo"></a>

                <!-- right Button Menu -->
    <div class="rightButtonMenuBox">
        <?php
            if(@$login) {
                echo '
                    <div class="helloMember">어서오세요, '.$loginMember[2].'( '.$loginMember[1].' )님</div>
                    <a href="../../php/logout.php" class="buttonMenu loginButton">
                    <img class="loginIcon" src="../../images/loginIcon.png" alt="loginIcon">
                    </img>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGOUT</a>
                    <button class="buttonMenu reservationButton"><i class="xi-calendar-check reservationButton"></i>&nbsp;&nbsp;reservation</button>
                    </div>
                    <div class="myPageBox">
                        <a href="../myPage/myPage.php" class="myPage">MY PAGE</a>
                    </div>
                ';
                $list = '
                    <script>
                        $(".reservationButton").click(function(){
                            location = "../reservation/reservation.php";
                        });
                    </script>
                ';
            }
            else {
                echo '
                    <div class="helloMember"></div>
                    <button class="buttonMenu loginButton click_login">
                    <img class="loginIcon" src="../../images/loginIcon.png" alt="loginIcon">
                    </img>&nbsp;&nbsp;&nbsp;&nbsp;LOGIN</button>
                    <button class="buttonMenu reservationButton"><i class="xi-calendar-check reservationButton"></i>&nbsp;&nbsp;reservation</button>
                    </div>
                ';
                $list = '
                    <script>
                        $(".reservationButton").click(function(){
                            alert("로그인 후 이용가능합니다. 로그인 해주세요.");
                        });
                    </script>
                ';
            }
        ?>
        
</header>
<div id="goTop"></div>
<?=$list?>

<div class='modal'>
    <div class='login_box'>&nbsp;
        <div class='exit_box'>
            <i class='xi-close xi-2x exit_icon'></i>
        </div>
        <div class='title_box'>
            <h1>글렌블리스에 오신 것을<br>환영합니다.</h1>
            <h4>로그인 정보를 확인하십시오.</h4>
        </div>
        <div class='input_box'>
            <form action='../../php/login.php' method='POST'>
                <label for='id'>아이디</label><br>
                <input type='text' id='id' name='user_id' required><br><br>
                <label for='pw'>비밀번호</label><br>
                <input type='password' id='pw' name='user_pw' required><br>
                <input type='submit' value='로그인' name="submit">
            </form>
            <button><a href="../join/join.php">회원가입</a></button>
            <div class='find_user'>
                <button><a href="../../html/find_id/find_id.php">아이디 찾기</a></button>
                <button><a href="../..//html/find_pw/find_pw.php">비밀번호 찾기</a></button>
            </div>
        </div>
    </div>
</div>