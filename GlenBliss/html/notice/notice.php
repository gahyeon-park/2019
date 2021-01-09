<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;

openDB($conn);


$sql = "SELECT * FROM NOTICE ORDER BY NOTICE_ID DESC";
sqlDB($conn, $result, $sql);
$limit_cnt = mysqli_num_rows($result); $rows_cnt = $limit_cnt;
while($row = mysqli_fetch_assoc($result)){
    @$table_list .= "<tr>";
    if(($rows_cnt-4) < $limit_cnt){
        $table_list .= "<td>공지</td>";
    }else{
        $table_list .= "<td>$limit_cnt</td>";
    }
    $table_list .= "
            <td><a href='./notice_answer.php?id=\"{$row['NOTICE_ID']}\"'>".$row['NOTICE_TITLE']."</a></td>
            <td>".$row['NOTICE_MEM_NICKNAME']."</td>
            <td>{$row['NOTICE_DATE']}</td>
            <td>{$row['NOTICE_LOOK']}</td>
        </tr>
    ";
    $limit_cnt--;
};
closeDB($conn, $result);
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

        <link rel="stylesheet" href="../../css/notice/notice.css">
        <script type="text/javascript" src="../../script/header.js"></script>
        <script type="text/javascript" src="../../script/notice.js"></script>
    </head>
    <body>
        <div id="wrap">
            <?php include("../../php/header.php"); ?>

            <div class='notice_nav'>
                <img src="../../images/notice/notice.jpg" alt='notice_img'>
                <div>
                    <h1><a href="./notice.php">공지사항</a>
                        <div class='underline'></div>
                    </h1>
                    <h1><a href="./question.php">이용문의</a>
                        <div class='underline'></div>
                    </h1>
                    <h1><a href="./review.php">여행후기</a>
                        <div class='underline'></div>
                    </h1>
                    <h1><a href="./guide.php">예약안내</a>
                        <div class='underline'></div>
                    </h1>
                </div>
            </div>

            <div class='contents'>
                <h2>공지사항</h2>
                <div class='horizon1'></div>
                
                <h4>Total <?=$rows_cnt?>건 1 페이지</h4>
                <table>
                    <tr>
                        <td>번호</td>
                        <td>제목</td>
                        <td>글쓴이</td>
                        <td>날짜</td>
                        <td>조회</td>
                    </tr>
                    <?=$table_list?>
                </table>

                <div class='page'>
                    <button>1</button>
                    <button>2</button>
                    <button>3</button>
                    <button>맨끝</button>
                </div>
                <div class='search'>
                    <form acrion='#' method='GET'>
                        <select name='select'>
                            <option value='title'>제목</option>
                            <option value='writer'>글쓴이</option>
                            <option value='article'>내용</option>
                        </select>
                        <input type="text" name='search'>
                        <input type="submit" value="검색">
                    </form>
                </div>
            </div>

            
            <?php include("../../php/footer.php"); ?>

        </div>
    </body>
</html>