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


        <script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.10.0/js/md5.min.js"></script>
        <link rel="stylesheet" href="../../css/myPage/myPage.css">
        <script type="text/javascript" src="../../script/header.js"></script>
        <script type="text/javascript" src="../../script/notice.js"></script>
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
                <table class="myDataArea">
                    <tr>
                        <td class="leftTitles"><p class="leftTitle">닉네임</p></td>
                        <td class="rightBoxes"><div class="rightBox"><?=$memberData['MEM_NICKNAME']?></div></td>
                    </tr>
                    <tr>
                        <td class="leftTitles"><p class="leftTitle">아이디</p></td>
                        <td class="rightBoxes"><div class="rightBox"><?=$memberData['MEM_USERID']?></div></td>
                    </tr>
                    <tr>
                        <td class="leftTitles"><p class="leftTitle">이름</p></td>
                        <td class="rightBoxes"><div class="rightBox"><?=$memberData['MEM_NAME']?></div></td>
                    </tr>
                    <tr>
                        <td class="leftTitles"><p class="leftTitle">생년월일</p></td>
                        <td class="rightBoxes"><div class="rightBox"><?=$memberData['MEM_BIRTH']?></div></td>
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
                        <td class="rightBoxes"><div class="rightBox"><?=$memberData['MEM_PHONE']?></div></td>
                    </tr>
                    <tr>
                        <td class="leftTitles"><p class="leftTitle">이메일 주소</p></td>
                        <td class="rightBoxes"><div class="rightBox"><?=$memberData['MEM_EMAIL']?></div></td>
                    </tr>
                    <tr>
                        <td class="leftTitles"><p class="leftTitle">주소</p></td>
                        <td class="rightBoxes"><div class="rightBox"><?=$memberData['MEM_ADDRESS']?></div></td>
                    </tr>
                </table>   
                <div class="lowerButtons">
                    <input id='userPassword' type='hidden' value='<?=$memberData['MEM_USERPW']?>'>
                    <button id='dataFix' class="lowerBt dataFix">정보 수정</button>
                    <button id='deleteUser' class="lowerBt withDrawal">회원 탈퇴</button>
                </div>
            </div> 
            
            <?php include("../../php/footer.php"); ?>

        </div>
    </body>
</html>

<?php
    /* 회원 데이터 베이스 닫기 */
    closeDB($memberConn, $memberResult);
?>