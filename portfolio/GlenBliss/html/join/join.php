<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;
?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>GlenBliss</title>

        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Raleway&display=swap" rel="stylesheet">
        
        <!-- x icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
        
        <!-- reset css link -->
        <link rel="stylesheet" href="../../css/reset.css">
        <!-- header css link -->
        <link rel="stylesheet" href="../../css/header.css">
        <!-- footer css link -->
        <link rel="stylesheet" href="../../css/footer.css">

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <link rel="stylesheet" href="../../css/join/join.css">
        <script type="text/javascript" src="../../script/header.js"></script>
        <script type="text/javascript" src="../../script/join/join.js"></script>
        <script type="text/javascript" src="../../script/joinRegExp/joinRegExp.js"></script>
        <script type="text/javascript" src="../../scrip/RegExp.js"></script>


    </head>
    <body>
        <div id="wrap">
            <?php include("../../php/header.php"); ?>

            <div class='banner'>
                <div>
                    <h1>JOIN</h1>
                    <p>회원가입을 완료하시면 객실 예약이 가능합니다.</p>
                </div>
            </div>

            <div class='input'>
                <h4><span class='star'>*</span>표시된 항목은 필수 입력 사항입니다.</h4>
                <div class='horizon1'></div>
                <form action="../../php/join/join.php" method='POST'>
                    <table>
                        <tr>
                            <td><p>아이디 <span class='star'>*</span></p></td>
                            <td><input id="userId" class='text' type='text' name='user_id' placeholder=" (4~8)영문,숫자" tabindex="1" required></td>
                            
                        </tr>
                        <tr>
                            <td><p>비밀번호 <span class='star'>*</span></p></td>
                            <td><input id="userPw" class='text' type='password' id='user_pw' name='user_pw' placeholder=" (6~12)영문,숫자" tabindex="2" required></td>
                        </tr>
                        <tr>
                            <td><p>비밀번호 확인 <span class='star'>*</span></p></td>
                            <td><input id="userPwAgain"  class='text' type='password' id='confirm_pw' placeholder=" 비밀번호 재입력" tabindex="3" required></td>
                        </tr>
                        <tr>
                            <td><p>이름 <span class='star'>*</span></p></td>
                            <td><input id="userName" class='text' type='text' name='user_name' placeholder=" (2~4)한글" tabindex="4" required></td>
                        </tr>
                        <tr>
                            <td><p>닉네임 <span class='star'>*</span></p></td>
                            <td><input id="userNick" class='text' type='text' name='user_nickName' placeholder=" (2~6)한글,영문,숫자" tabindex="5" required></td>
                        </tr>
                        <tr>
                            <td><p>생년월일 <span class='star'>*</span></p></td>
                            <td>
                                <select name='user_year'>
                                    <?php
                                    $i = 1950;
                                    while($i < 2019) {
                                        echo "<option value='". $i . "'>" . $i . "</option>";
                                        $i++;
                                    }
                                    ?>
                                </select>
                                <select name='user_month'>
                                    <?php
                                    $i = 1;
                                    while($i < 13) {
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                        $i++;
                                    }
                                    ?>
                                </select>
                                <select name='user_date'>
                                    <?php
                                    $i = 1;
                                    while($i < 31) {
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                        $i++;
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><p>성별 <span class='star'>*</span></p></td>
                            <td>
                                <input type="radio" class='radio' name="user_sex" value="male" checked> <span>남자</span>&nbsp;&nbsp;
                                <input type="radio" class='radio' name="user_sex" value="female"> <span>여자</span>
                            </td>
                        </tr>
                        <tr>
                            <td><p>휴대폰 번호 <span class='star'>*</span></p></td>
                            <td><input id="userPhone" class='text' type='text' name='user_hp' placeholder="(010-(0)000-0000) '-'를 제외하고 입력해주세요." tabindex="6" required></td>
                        </tr>
                        <tr>
                            <td><p>이메일 주소 <span class='star'>*</span></p></td>
                            <td><input id="userEmail" class='text' type='email' name='user_email' placeholder="이메일 주소를 입력해주세요.(Gani@glenbliss.com)" tabindex="7" required></td>
                        </tr>
                        <tr>
                            <td><p>주소 <span class='star'>*</span></p></td>
                            <td><input id="userAddr" class='text' type='text' name='user_addr' placeholder="(2~20)한글,숫자 (안산시 단원구 화정천서로 7길 000호)" tabindex="8" required></td>
                        </tr>
                        <tr>
                            <td><p>자동등록 방지 <span class='star'>*</span></p></td>
                            <td>
                                <input id="notBotNum" type="hidden" name="notBot" required>
                                <canvas id="notBot"></canvas>
                                <input id="notBot" class='confirm' type='text' id='auto_confirm' name="notBotInput" placeholder="그림에 있는 숫자를 입력해주세요." tabindex="9" required>
                            </td>
                        </tr>
                    </table>
                    <div class='horizon2'></div>
                    <input type='submit' id="SearchBox" class='submit' value='회원가입' name="submit">
                </form>
            </div>

            <?php include("../../php/footer.php"); ?>

        </div>
    </body>
</html>
