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
        <!-- aboutPage -->
        <link rel="stylesheet" href="../../css/about/aboutPage.css">

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
        <!-- map API -->
        <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=pova8ckckb"></script>
        <script src="../../script/header.js"></script>
        <script src="../../script/about/aboutPage.js"></script>
    </head>
    <body>
        <div id="wrap">
            <?php include("../../php/header.php"); ?>
            
            
            <!-- fixed image -->
            <img class="backgroundImg" src="../../images/main/main8.jpg" alt="backgroundImg">
            <div class="overlay"></div> <!-- overlay -->

            <div class="sectionBox">
                <section>
                    <div class="aboutContents">
                        <!-- main Text -->
                        <h2 class="mainText">ABOUT</h2>
                        <h3 class="subText">글렌블리스와 함께 즐기는 장소들</h3>
        
                        <!-- contents -->
                        <div class="contentsBox">
                            <ul>
                                <li class="contentsList">
                                    <img class="contentsImg" src="../../images/main/main3.jpg" alt="discImg">
                                    <div class="contentsTextBox">
                                        <h4 class="contentsTitle">숲과 어울리는 GlenBliss</h4>
                                        <pre class="contentsDisc">
GlenBliss는 숲속의 의미를 지닌 Glen과
다시없을 행복이라는 Bliss라는 이름에 맞게
자연친화적 인테리어를 생각했습니다.
                                        </pre>
                                    </div>
                                </li>
                                <li class="contentsList">
                                    <div class="contentsTextBox">
                                        <h4 class="contentsTitle">전국에 단 한 곳 한옥 CU<h4>
                                        <pre class="contentsDisc">
전국에 단 한 곳 밖에 없는
한옥 인테리어 CU를 방문해보세요
건물 내부에는 테이블도 있습니다.
                                        </pre>
                                    </div>
                                    <img class="contentsImg" src="../../images/about/cu.jpg" alt="discImg">
                                </li>
                                <li class="contentsList">
                                    <img class="contentsImg" src="../../images/about/about7.jpg" alt="discImg">
                                    <div class="contentsTextBox">
                                        <h4 class="contentsTitle">인간이 만든 대자연 인공폭포</h4>
                                        <pre class="contentsDisc">
만든 게 맞는지 눈을 의심할 정도로
아름다운 인공폭포도 구경해보세요
바라보고 있으면 마음속 근심 걱정도 내려간답니다.
                                        </pre>
                                    </div>
                                </li>
                                <li class="contentsList">
                                    <div class="contentsTextBox">
                                        <h4 class="contentsTitle">넓은 GlenBliss 주차장</h4>
                                        <pre class="contentsDisc">
좁은 길 주차가 힘들지 않게 넓고 크게 되어있습니다.
최대 24대의 차량이 주차 가능합니다.
또한 cctv로 상시 관리하고 있습니다.
                                        </pre>
                                    </div>
                                    <img class="contentsImg" src="../../images/about/park1.jpg" alt="discImg">
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </section>

                <!-- LOCATION section -->
                <section>
                    <div class="aboutContents aboutMapBox">
                        <!-- main Text -->
                        <h2 class="mainText">LOCATION</h2>
                        <h3 class="subText">글렌블리스 찾아오시는 길</h3>
        
                        <!-- contents -->
                        <div class="mapContents">
                            <div id="map" class="mapBox">
                            <!-- 1da1be390c2570c9ed316789950b52f1 -->


                            </div>
                            <div class="contentsTextBox">
                                <p class="contentsSubtitle">오시는길</p>
                                <h4 class="locationTitle">LOCATION</h4>
                                <pre class="contentsDisc">
    경기도 가평군 상면 수목원로 164번길 29
                                </pre>
                            </div>
                        </div>
                    </div>
                </section>
                <?php include("../../php/footer.php"); ?>
            </div>
        </div>
    </body>
</html>



