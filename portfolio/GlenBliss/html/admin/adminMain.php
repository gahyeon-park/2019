<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

if(isset($_GET['page'])){
    switch($_GET['page']){
        case 'user': $style_src = "<link rel='stylesheet' href='../../css/admin/adminUser.css'>";
            $title = "유저 관리";
            openDB($conn);
            $sql = "SELECT * FROM MEMBER";
            sqlDB($conn, $result, $sql);
            $table_list = "
            <table>
                <tr>
                    <td>No.</td><td>아이디</td><td>이름</td>
                    <td>성별</td><td>생년월일</td><td>닉네임</td>
                    <td>전화번호</td><td>주소</td><td>이메일</td>
                    <td></td><td></td>
                </tr>
            ";
            while($row = mysqli_fetch_assoc($result)){
                $table_list .= "
                    <tr>
                        <form method='POST' action='./mem_update.php'>
                        <td><input type='text' name='id' class='id' value='{$row['MEM_ID']}' readonly></td>
                        <td><input type='text' name='userid' class='userid' value='{$row['MEM_USERID']}' readonly></td>
                        <td><input type='text' name='name' class='name' value='{$row['MEM_NAME']}'></td>
                ";
                if($row['MEM_SEX'] == 'male'){
                    $table_list .= "<td><input type='text' class='sex' name='sex' value='남자' readonly></td>";
                }else{
                    $table_list .= "<td><input type='text' class='sex' name='sex' value='여자' readonly></td>";
                }
                $table_list .="
                        <td><input type='date' class='birth' name='birth' value='{$row['MEM_BIRTH']}'</td>
                        <td><input type='text' class='nick' name='nick' value='{$row['MEM_NICKNAME']}'</td>
                        <td><input type='text' class='phone' name='phone' value='{$row['MEM_PHONE']}'</td>
                        <td><input type='text' class='addr' name='addr' value='{$row['MEM_ADDRESS']}'</td>
                        <td><input type='email' class='email' name='email' value='{$row['MEM_EMAIL']}'</td>
                        <td><button class='user_update' type='submit'>수정</button></form></td>
                        <td>
                            <button class='user_delete' value='{$row['MEM_ID']}'>삭제</button>
                        </td>
                    </tr>
                ";
            };
            $table_list .= "</table><div class='space_box'></div>";
            break;

        case 'manager': $style_src = "<link rel='stylesheet' href='../../css/admin/adminManager.css'>";
            $title = "관리자 관리";
            openDB($conn);
            $sql = "SELECT * FROM ADMIN";
            sqlDB($conn, $result, $sql);
            $table_list = "
            <div class='create'>
                <h3>관리자 생성</h3>
                <form method='POST' action='./adm_create.php'>
                    <label>아이디: <input type='text' name='userid'></label>
                    <label>비밀번호: <input type='password' name='userpw'></label>
                    <label>이름: <input type='text' name='name'></label>
                    <label>닉네임: <input type='text' name='nick'></label>
                    <input class='crt_btn' type='submit' value='생성'>
                </form>
            </div>
            <table>
                <tr>
                    <td>No.</td><td>아이디</td><td>이름</td>
                    <td>닉네임</td><td></td><td></td>
                </tr>
            ";
            while($row = mysqli_fetch_assoc($result)){
                $table_list .= "
                    <tr>
                        <form method='POST' action='./adm_update.php'>
                        <td><input type='text' name='id' class='id' value='{$row['ADMIN_ID']}' readonly></td>
                        <td><input type='text' name='userid' class='userid' value='{$row['ADMIN_USERID']}'></td>
                        <td><input type='text' name='name' class='name' value='{$row['ADMIN_NAME']}'></td>
                        <td><input type='text' class='nick' name='nick' value='{$row['ADMIN_NICKNAME']}'</td>
                        <td><button class='manager_update' type='submit'>수정</button></form></td>
                        <td>
                            <button class='manager_delete' value='{$row['ADMIN_ID']}'>삭제</button>
                        </td>
                    </tr>
                ";
            };
            $table_list .= "</table><div class='space_box'></div>";
            break;

        case 'coupon': $style_src = "<link rel='stylesheet' href='../../css/admin/adminCoupon.css'>";
            $title = "쿠폰 관리";
            $nav_src = "
                <script>
                    $('.notice_nav').append(\"\
                        <div><h1><a href='./adminMain.php?page=coupon&cou_nav=cou_manage'>쿠폰생성/삭제</a><div class='underline'></div></h1>\
                        <h1><a href='./adminMain.php?page=coupon&cou_nav=cou_use'>쿠폰사용관리</a><div class='underline'></div></h1>\
                    \");
                </script>
            ";
            switch(@$_GET['cou_nav']){
                case 'cou_manage': $style_src = "<link rel='stylesheet' href='../../css/admin/adminCouponManage.css'>";
                $title = "쿠폰생성/삭제";
                openDB($conn);
                $sql = "SELECT * FROM COUPON";
                sqlDB($conn, $result, $sql);
                $table_list = "
                <div class='create'>
                    <h3>쿠폰 생성</h3>
                    <form method='POST' action='./cou_create.php' enctype='multipart/form-data'>
                        <label>쿠폰 이름: <input type='text' name='cou_name'></label>
                        <label>할인율(%): <input type='number' name='cou_sale'></label>
                        <input type='hidden' name='MAX_FILE_SIZE' value='7000000000'>
                        <label>배너 이미지: <input type='file' name='cou_img'></label>
                        <label>쿠폰함 이미지: <input type='file' name='cou_simg'></label>
                        <input class='crt_btn' type='submit' value='생성'>
                    </form>
                </div>
                ";
                while($row = mysqli_fetch_assoc($result)){
                    $table_list .= "
                        <div class='cou_box'>
                            <table>
                                <tr>
                                    <td>제목</td>
                                    <td>할인율(%)</td>
                                    <td>배너 이미지</td>
                                    <td>쿠폰함 이미지</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>{$row['COU_NAME']}</td>
                                    <td>{$row['COU_SALE']}</td>
                                    <td><img class='main_img' src='../../images/coupon/{$row['COU_IMG_REAL']}' alt='banner'></td>
                                    <td><img class='sub_img' src='../../images/coupon/{$row['COU_SIMG_REAL']}' alt='small banner'></td>
                                    <td><button class='cou_delete' value='{$row['COU_ID']}'>삭제</button></td>
                                </tr>
                            </table>
                        </div>
                    ";
                };
                $table_list .= "<div class='space_box'></div>";
                break;

                case 'cou_use': $style_src = "<link rel='stylesheet' href='../../css/admin/adminCouponUse.css'>";
                $title = "쿠폰사용관리";
                @openDB($conn);
                $table_list = "
                <div class='delete'>
                    <h3>지난 쿠폰이벤트 데이터 삭제</h3>
                    <form method='POST' action='./mem_cou_delete.php'>
                        <select>
                ";

                $sql = "SELECT * FROM COUPON";
                sqlDB($conn, $result, $sql);
                while($row = mysqli_fetch_assoc($result)){
                $table_list .= "
                            <option value='{$row['COU_ID']}'>{$row['COU_NAME']}</option>
                ";
                }

                $table_list .= "
                        </select>
                        <input type='submit' value='삭제' class='del_btn'>
                    </form>
                </div>
                <table>
                    <tr>
                        <td>No.</td><td>쿠폰 No.</td>
                        <td>유저 아이디</td>
                        <td>쿠폰사용여부</td>
                    </tr>
                ";
                $sql = "SELECT * FROM MEM_COUPON ORDER BY MEM_COU_ID DESC";
                sqlDB($conn, $result, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $table_list .= "
                        <tr>
                            <td>{$row['MEM_COU_ID']}</td>
                            <td>{$row['COU_ID']}</td>
                            <td>{$row['MEM_USERID']}</td>
                            <td>{$row['COU_USE']}</td>
                        </tr>
                    ";
                };
                $table_list .= "</table><div class='space_box'></div>";
            }
            break;

        case 'reservation': $style_src = "<link rel='stylesheet' href='../../css/admin/adminReservation.css'>";
            $title = "예약 관리";
            openDB($conn);
            $sql = "SELECT * FROM RESERVATION ORDER BY RES_ID DESC";
            sqlDB($conn, $result, $sql);
            $table_list = "
            <table>
                <tr>
                    <td>No.</td>
                    <td>아이디</td>
                    <td>체크인</td>
                    <td>체크아웃</td>
                    <td>예약한 날짜</td>
                    <td>방 번호</td>
                    <td>성인 인원</td>
                    <td>아동 인원</td>
                    <td>유아 인원</td>
                    <td>가격</td>
                    <td>입금상태</td>
                    <td></td>
                    <td></td>
                </tr>
            ";
            while($row = mysqli_fetch_assoc($result)){
                $table_list .= "
                    <tr>
                        <td>{$row['RES_ID']}</td>
                        <td>{$row['RES_MEM_USERID']}</td>
                        <td>{$row['RES_CHECKIN']}</td>
                        <td>{$row['RES_CHECKOUT']}</td>
                        <td>{$row['RES_DATE']}</td>
                        <td>{$row['RES_ROOM_ID']}</td>
                        <td>{$row['RES_PERSONNEL_ADULT']}</td>
                        <td>{$row['RES_PERSONNEL_CHILD']}</td>
                        <td>{$row['RES_PERSONNEL_BABY']}</td>
                        <td>{$row['RES_PRICE']}</td>
                        <td>{$row['RES_PERMIT']}</td>
                        <td>
                            <button class='res_permit' value='{$row['RES_ID']}'>확인</button>
                        </td>
                        <td>
                            <button class='res_delete' value='{$row['RES_ID']}'>삭제</button>
                        </td>
                    </tr>
                ";
            };
            $table_list .= "</table><div class='space_box'></div>";
            break;

        case 'notice': $style_src = "<link rel='stylesheet' href='../../css/admin/adminNotice.css'>";
            $title = "게시판 관리";
            $nav_src = "
                <script>
                    $('.notice_nav').append(\"\
                        <div class='nav_box'>\
                            <h1><a href='./adminMain.php?page=notice&notice_nav=notice'>공지사항</a><div class='underline'></div></h1>\
                            <h1><a href='./adminMain.php?page=notice&notice_nav=question'>이용문의</a><div class='underline'></div></h1>\
                            <h1><a href='./adminMain.php?page=notice&notice_nav=review'>여행후기</a><div class='underline'></div></h1>\
                        </div>\
                    \");
                </script>
            ";
            switch(@$_GET['notice_nav']){
                case 'notice': $style_src = "<link rel='stylesheet' href='../../css/admin/adminNotice.css'>";
                $title = "공지사항 관리";
                openDB($conn);
                $sql = "SELECT * FROM NOTICE ORDER BY NOTICE_ID DESC";
                sqlDB($conn, $result, $sql);
                $table_list = "
                <div class='create'>
                    <button class='notice_crt_btn'>글쓰기</button>
                </div>
                <table>
                    <tr>
                        <td>No.</td><td>제목</td><td>날짜</td>
                        <td>조회</td><td></td><td></td>
                    </tr>
                ";
                while($row = mysqli_fetch_assoc($result)){
                    $table_list .= "
                        <tr>
                            <td>{$row['NOTICE_ID']}</td>
                            <td><a href='./adminMain.php?page=notice&notice_nav=notice&notice_id={$row['NOTICE_ID']}'>{$row['NOTICE_TITLE']}</a></td>
                            <td>{$row['NOTICE_DATE']}</td>
                            <td>{$row['NOTICE_LOOK']}</td>
                            <td>
                                <button class='notice_update' value='{$row['NOTICE_ID']}'>수정</button>
                            </td>
                            <td>
                                <button class='notice_delete' value='{$row['NOTICE_ID']}'>삭제</button>
                            </td>
                        </tr>
                    ";
                };
                $table_list .= "</table><div class='space_box'></div>";
                if(isset($_GET['notice_id'])){
                    $style_src = "<link rel='stylesheet' href='../../css/admin/adminNoticeAnswer.css'>";
                    openDB($conn);
                    $count = $_GET['notice_id'];
                    $sql = "SELECT * FROM NOTICE";
                    sqlDB($conn, $result, $sql);
                    $max =  mysqli_num_rows($result);
                    $sql = "SELECT * FROM NOTICE WHERE NOTICE_ID='$count'";
                    sqlDB($conn, $result, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $title = $row['NOTICE_TITLE'];
                        $table_list = "
                        <div class='contents_head'>
                            <button><a href='./adminMain.php?page=notice&notice_nav=notice'>목록</a></button>
                            <button class='notice_update' value='{$row['NOTICE_ID']}'>수정</button>
                            <button class='notice_delete' value='{$row['NOTICE_ID']}'>삭제</button>
                        </div>
                        <div class='contents_body'>&nbsp;
                            <div class='write_date'>
                                <p>
                                    작성일 : {$row['NOTICE_DATE']}<br>
                                    작성자 : {$row['NOTICE_MEM_NICKNAME']}
                                </p>
                            </div>
                            <p>{$row['NOTICE_CONTENTS']}</p>
                        </div>
                        <div class='contents_foot'>
                            <div class='horizon2'></div>
                            <button id='not_prev'>이전글</button>
                            <button id='not_next'>다음글</button>
                            <div class='clear'></div>
                            <div class='horizon2'></div>
                        </div>
                        ";
                    }
                    closeDB($conn, $result);
                    $notice_script = "
                        <script>
                            var notice_num = $count; var notice_max = $max;
                            notice_num = Number(notice_num);
                            notice_max = Number(notice_max);
                            $(function(){
                                if(notice_num == 1){
                                    $('#not_next').click(function(){
                                        alert('마지막 글입니다.');
                                    });
                                }else{
                                    $('#not_next').click(function(){
                                        location = './adminMain.php?page=notice&notice_nav=notice&notice_id='+(notice_num-1);
                                    });
                                }
                                if(notice_max == notice_num){
                                    $('#not_prev').click(function(){
                                        alert('마지막 글입니다.');
                                    });
                                }else{
                                    $('#not_prev').click(function(){
                                        location = './adminMain.php?page=notice&notice_nav=notice&notice_id='+(notice_num+1);
                                    });
                                }
                            });
                        </script>
                    ";
                }
                break;
                
                case 'question': $style_src = "<link rel='stylesheet' href='../../css/admin/adminQuestion.css'>";
                $title = "이용문의 관리";
                openDB($conn);
                $sql = "SELECT * FROM INQUIRY ORDER BY INQ_ID DESC";
                sqlDB($conn, $result, $sql);
                $table_list = "
                <table>
                    <tr>
                        <td>No.</td><td>제목</td>
                        <td>아이디</td><td>닉네임</td>
                        <td>날짜</td><td>조회</td>
                        <td></td>
                    </tr>
                ";
                while($row = mysqli_fetch_assoc($result)){
                    $table_list .= "
                        <tr>
                            <td>{$row['INQ_ID']}</td>
                            <td><a href='./adminMain.php?page=notice&notice_nav=question&question_id={$row['INQ_ID']}'>{$row['INQ_TITLE']}</a></td>
                            <td>{$row['INQ_MEM_USERID']}</td>
                            <td>{$row['INQ_MEM_NICKNAME']}</td>
                            <td>{$row['INQ_DATE']}</td>
                            <td>{$row['INQ_LOOK']}</td>
                            <td>
                                <button class='question_delete' value='{$row['INQ_ID']}'>삭제</button>
                            </td>
                        </tr>
                    ";
                };
                $table_list .= "</table><div class='space_box'></div>";
                if(isset($_GET['question_id'])){
                    $style_src = "<link rel='stylesheet' href='../../css/admin/adminQuestionAnswer.css'>";
                    openDB($conn);
                    $count = $_GET['question_id'];
                    $sql = "SELECT * FROM INQUIRY";
                    sqlDB($conn, $result, $sql);
                    $max =  mysqli_num_rows($result);
                    $sql = "SELECT * FROM INQUIRY WHERE INQ_ID='$count'";
                    sqlDB($conn, $result, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $title = $row['INQ_TITLE'];
                        $table_list = "
                        <div class='contents_head'>
                            <button><a href='./adminMain.php?page=notice&notice_nav=question'>목록</a></button>
                            <button class='question_delete' value='{$row['INQ_ID']}'>삭제</button>
                        </div>
                        <div class='contents_body'>&nbsp;
                            <div class='write_date'>
                                <p>
                                    작성일 : {$row['INQ_DATE']}<br>
                                    작성자 : {$row['INQ_MEM_NICKNAME']}
                                </p>
                            </div>
                            <p>{$row['INQ_CONTENTS']}</p>
                        </div>
                        <div class='contents_foot'>
                            <div class='horizon2'></div>
                            <button id='que_prev'>이전글</button>
                            <button id='que_next'>다음글</button>
                            <div class='clear'></div>
                            <div class='horizon2'></div>
                        </div>
                        ";
                    }
                    closeDB($conn, $result);
                    $question_script = "
                        <script>
                            var que_num = $count; var que_max = $max;
                            que_num = Number(que_num);
                            que_max = Number(que_max);
                            $(function(){
                                if(que_num == 1){
                                    $('#que_next').click(function(){
                                        alert('마지막 글입니다.');
                                    });
                                }else{
                                    $('#que_next').click(function(){
                                        location = './adminMain.php?page=notice&notice_nav=question&question_id='+(que_num-1);
                                    });
                                }
                                if(que_max == que_num){
                                    $('#que_prev').click(function(){
                                        alert('마지막 글입니다.');
                                    });
                                }else{
                                    $('#que_prev').click(function(){
                                        location = './adminMain.php?page=notice&notice_nav=question&question_id='+(que_num+1);
                                    });
                                }
                            });
                        </script>
                    ";
                }
                break;
                
                case 'review': $style_src = "<link rel='stylesheet' href='../../css/admin/adminReview.css'>";
                $title = "여행후기 관리";
                openDB($conn); 
                $sql = "SELECT * FROM REVIEW ORDER BY REV_ID DESC";
                sqlDB($conn, $result, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    @$table_list .= "
                        <div class='ment'>
                            <div class='user'>
                                <h1>".$row['REV_MEM_NICKNAME']." <span>(".$row['REV_MEM_USERID'].")</span></h1>
                                <p>{$row['REV_DATE']}</p>
                            </div>
                            <div class='comment'>
                                <p>{$row['REV_CONTENTS']}</p>
                            </div>
                            <div class='ment_btn'>
                                <form method='POST' action='../../php/notice/review_del.php'>
                                    <input type='hidden' name='review_id' value='{$row['REV_ID']}'>
                                    <button type='submit' name='submit'>삭제</button>
                                </form>
                            </div>
                        </div>
                        <div class='clear'></div>
                    ";
                };
                closeDB($conn, $result);
                $table_list .= "<div class='space_box'></div>";
                
                break;
            }
        break;
    }
}else{
    $title = "메뉴를 선택해주세요.";
}
?>


<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>GlenBliss Admin</title>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Raleway&display=swap" rel="stylesheet">
        
        <!-- x icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
        
        <!-- reset css link -->
        <link rel="stylesheet" href="../../css/reset.css">
        <!-- header css link -->
        <link rel="stylesheet" href="../../css/admin/adminHeader.css">
        <!-- footer css link -->
        <link rel="stylesheet" href="../../css/footer_main.css">

        <link rel="stylesheet" href="../../css/admin/adminMain.css" >

        <?=@$style_src?>
        
        <script src="../../script/header.js"></script>

    </head>
    <body>
        <div id="wrap">
            <?php include("./adminHeader.php"); ?>
            
            <div class='notice_nav'>
                <img src="../../images/notice/notice.jpg" alt='notice_img'>
            </div>
            <div class='contents'>
                <h2><?=@$title?></h2>
                <div class='horizon1'></div>

                <?=@$table_list?>
            </div>
        </div>
        <?=@$nav_src?>
        <script>
            $(".user_delete").on('click', function(){
                location = './mem_delete.php?id='+$(this).val();
            });
            $(".manager_delete").on('click', function(){
                location = './adm_delete.php?id='+$(this).val();
            });
            $(".cou_delete").on('click', function(){
                location = './cou_delete.php?id='+$(this).val();
            });
            $(".res_permit").on('click', function(){
                location = './res_permit.php?id='+$(this).val();
            });
            $(".res_delete").on('click', function(){
                location = './res_delete.php?id='+$(this).val();
            });
            $(".notice_update").on('click', function(){
                location = './noticeUpdate.php?id='+$(this).val();
            });
            $(".notice_delete").on('click', function(){
                location = './notice_delete.php?id='+$(this).val();
            });
            $(".question_delete").on('click', function(){
                location = './question_delete.php?id='+$(this).val();
            });
            $(".notice_crt_btn").on('click', function(){
                location = './noticeCreate.php';
            });
        </script>
        <?=@$notice_script?>
        <?=@$question_script?>
    </body>
</html>