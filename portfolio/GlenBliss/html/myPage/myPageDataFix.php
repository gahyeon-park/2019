<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

// 로그인이 안되어 있으면 페이지 로드 안함
if(!$login) exit;

/* 회원 데이터베이스 열기 */
openDB($memberConn);

/* 회원 자료 꺼내오기 */
$sql = "SELECT * FROM `MEMBER` WHERE `MEM_USERID` = '{$loginMember[1]}';";

sqlDB($memberConn, $memberResult, $sql);
$memberData = mysqli_fetch_assoc($memberResult);    // 회원 자료 연관배열

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

        <link rel="stylesheet" href="../../css/myPage/myPageDataFix.css">
        <script type="text/javascript" src="../../script/header.js"></script>
        <script type="text/javascript" src="../../script/notice.js"></script>
        <script type="text/javascript" src="../../script/regExp.js"></script>
        <script type="text/javascript" src="../../script/myPage/mainFix.js"></script>
    </head>
    <body>
        <div id="wrap">
            
            <?php include("../../php/header.php"); ?>

            <div class='notice_nav'>
                <img class="noticeImg" src="../../images/myPage/myPage.jpg" alt='notice_img'>
                <div class="noticeNav">
                    <h1><a href="./myPage.php">회원정보</a>
                        <div class='underline'></div>
                    </h1>
                    <h1><a href="./reservation.php">예약내역</a>
                        <div class='underline'></div>
                    </h1>
                    <h1><a href="./myCoupon.php">&nbsp;&nbsp;쿠폰함</a>
                        <div class='underline'></div>
                    </h1>
                    <h1><a href="./changePW.php">&nbsp;비밀번호 변경</a>
                        <div class='underline underline5'></div>
                    </h1>
                </div>
            </div>

            <div class='contents'>
                <h2>환영합니다 <span><?=$memberData['MEM_NAME']?></span>님</h2>
                <div class='horizon1'></div>
                <form action="../../php/myPage/memberDataUpdate.php" method='POST'>
                <table class="myDataArea">
                    <tr>
                        <td class="leftTitles"><p class="leftTitle">닉네임</p></td>
			<td class="rightBoxes"><input class='text' type='text' id="userNick" name='user_nickName' value='<?=$memberData['MEM_NICKNAME']?>' required></td>
                    </tr>
                    <tr>
                        <td class="leftTitles"><p class="leftTitle">성별</p></td>
                        <td class="rightBoxes">

                        <?php
                                if($memberData['MEM_SEX'] == 'male') {
                                    echo <<<END

                                    <input type="radio" class='radio' name="user_sex" value="male" checked> <span>남자</span>&nbsp;&nbsp;
                                    <input type="radio" class='radio' name="user_sex" value="female"> <span>여자</span>
END;
                                }
                                else {
                                    echo <<<END

                                    <input type="radio" class='radio' name="user_sex" value="male"> <span>남자</span>&nbsp;&nbsp;
                                    <input type="radio" class='radio' name="user_sex" value="female" checked> <span>여자</span>
END;
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="leftTitles"><p class="leftTitle">휴대폰 번호</p></td>
                        <td class="rightBoxes"><input class='text' type='text' name='user_hp' id="userPhone" value='<?=$memberData['MEM_PHONE']?>' required></td>
                    </tr>
                    <tr>
                        <td class="leftTitles"><p class="leftTitle">이메일 주소</p></td>
                        <td class="rightBoxes"><input class='text' type='email' name='user_email' id="userEmail" value='<?=$memberData['MEM_EMAIL']?>' required></td>
                    </tr>
                    <tr>
                        <td class="leftTitles"><p class="leftTitle">주소</p></td>
                        <td class="rightBoxes"><input class='text' type='text' name='user_addr' id="userAddr" value='<?=$memberData['MEM_ADDRESS']?>' required></td>
                    </tr>
                </table>   
                <div class="lowerButtons">
                    <button id="SearchBox" type='submit' name='submit' class="lowerBt dataFix">수정 완료</button>
                </div>
                </form>
            </div> 
            <?php include("../../php/footer.php"); ?>
        </div>
    </body>
</html>
<?php
    /* 회원 데이터 베이스 닫기 */
    closeDB($memberConn, $memberResult);
?>
