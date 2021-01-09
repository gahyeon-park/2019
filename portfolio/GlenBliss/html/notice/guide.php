<?php
include('../../php/common.php');
$login = false; // login or logout

session_start();
$loginMember = whoIsLogin();
$loginMember[0] && $login = true;
if($loginMember[0] == false){
    $loginMember[3] = 'none_nickname';
}

    

$res_btn = "
    <script>
        $(function(){
            $('#res_btn').click(function(){
                if('{$loginMember[3]}' == 'none_nickname'){
                    alert('로그인 후에 이용해주시기 바랍니다.');
                }else{
                    location = '../reservation/reservation.php';
                }
            });
        });
    </script>
";
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

        <link rel="stylesheet" href="../../css/notice/guide.css">
        <script type="text/javascript" src="../../script/header.js"></script>
        <script type="text/javascript" src="../../script/notice/notice.js"></script>
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
                <h2>예약안내</h2>
                <div class='horizon1'></div>
                <div class='left_head'>
                    <img src="../../images/notice/Phone.png" alt='question'>
                    <p>
                        <span>010-8734-6373, 010-2246-1662</span><br>
                        전화 예약, 기타사항 : 09:00 ~ 22:00</h5><br>
                        (부재중 시 1시간 이내에 펜션에서 연락을 드리며,<br>
                        상담 시간 외의 시간에는 글쓰기를 사용 부탁드립니다.)
                    </p>
                </div>
                <div class='right_head'>
                    <h4>&lt; 입금계좌안내 &gt;</h4>
                    <div class='account1'>
                        <p>
                            국민<br>
                            226-402041-58806<br>
                            (예금주 박가현)
                        </p>
                    </div>
                    <div class='account2'>
                        <p>
                            기업<br>
                            399-105598-01-011<br>
                            (예금주 지효남)
                        </p>
                    </div>
                </div>
                <div class='clear'></div>
                <div class='horizon2'></div>
                <table class='price'>
                    <tr>
                        <td></td>
                        <td>101</td>
                        <td>102</td>
                        <td>103</td>
                        <td>104</td>
                        <td>201</td>
                        <td>202</td>
                        <td>203</td>
                        <td>301</td>
                        <td>302</td>
                        <td>401</td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                비수기<br>
                                <span>
                                    (성수기, 준성수기<br>
                                    제외한 모든 날)
                                </span>
                            </p>
                        </td>
                        <td><h5>100,000</h5></td>
                        <td><h5>120,000</h5></td>
                        <td><h5>120,000</h5></td>
                        <td><h5>180,000</h5></td>
                        <td><h5>240,000</h5></td>
                        <td><h5>200,000</h5></td>
                        <td><h5>220,000</h5></td>
                        <td><h5>350,000</h5></td>
                        <td><h5>250,000</h5></td>
                        <td><h5>430,000</h5></td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                준성수기<br>
                                <span>
                                    (비수기, 성수기<br>
                                    제외한 모든 날)
                                </span>
                            </p>
                        </td>
                        <td><h5>120,000</h5></td>
                        <td><h5>140,000</h5></td>
                        <td><h5>140,000</h5></td>
                        <td><h5>200,000</h5></td>
                        <td><h5>260,000</h5></td>
                        <td><h5>220,000</h5></td>
                        <td><h5>240,000</h5></td>
                        <td><h5>370,000</h5></td>
                        <td><h5>270,000</h5></td>
                        <td><h5>450,000</h5></td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                성수기<br>
                                <span>
                                    (비수기, 준성수기<br>
                                    제외한 모든 날)
                                </span>
                            </p>
                        </td>
                        <td><h5>150,000</h5></td>
                        <td><h5>170,000</h5></td>
                        <td><h5>170,000</h5></td>
                        <td><h5>230,000</h5></td>
                        <td><h5>290,000</h5></td>
                        <td><h5>250,000</h5></td>
                        <td><h5>270,000</h5></td>
                        <td><h5>400,000</h5></td>
                        <td><h5>300,000</h5></td>
                        <td><h5>480,000</h5></td>
                    </tr>
                </table>

                
                <button id='res_btn'>예약하기</button>


                <div class='guide1'>
                    <h1>01.예약안내</h1>
                    <P>
                        예약 현황 및 예약에 관한 사항은 실시간 예약을 보시면 쉽게 아실 수 있습니다.<br>
                        만일 문의사항이 있으시면 전화 주세요. 전화예약 및 문의는 주말 새벽 1시까지/주 중 밤 12시까지(성수기 1시까지) 가능합니다.<br>
                        예약자와 입금자가 다를 경우 반드시 전화 연락을 주세요.<br>
                        예약 후"대기"상태에서, 입금하시면 매일 저녁에 확인하여 "완료"처리를 해 놓겠습니다. (만일 입금 다음날에도 "대기"일 경우 연락 주세요)<br>
                        실시간 예약시 도착시간 및 교통편을 적어보세요(픽업여부를 확인하고자 합니다.)<br>실시간 예약 시 도착시간 및 교통 편을 적어보세요(픽업 여부를 확인하고자 합니다.)<br>
                        당일 예약 시에는 전화를 먼저 주신 후 예약하시기 바랍니다.<br>
                        실시간 예약 후 4시간 이내 색실 요금을 입금하지 않으시면 자동으로 취소됩니다.<br>
                        단 주말이나 이틀 전 예약 시는 객실 요금을 2시간 이내 입금하셔야 합니다.<br>
                        무통장 입금 및 객실 요금 완납을 원칙으로 하고 있습니다.<br>
                        <br>
                        &nbsp;&nbsp;**객실 별 추가인원 공지**<br>
                        24개월 유아까지 10,000w 13세 중등까지는 20,000w 중등부터 성인까지는 추가 요금이 동일하게 적용됩니다.<br>
                        <br>
                        &nbsp;&nbsp;★풀빌라와 일반 객실 동시 이용 시 추가 인원에 대해서는 풀빌라 요금으로 적용됩니다. ★<br>
                        <br>
                        관리인의 허락 없이 예약인원 초과 또는 무단 입실(잠시 왔다 가는 것도 포함) 하는 경우는 환불 없이 퇴실 조치하오니 성숙한 레저문화를 위하여 무단 입실을 금합니다.<br>
                        1실 이상 예약은 사전 협의 후 예약하시기 바랍니다.<br>
                        <br>
                        <br>
                        기간 안내<br>
                        <br>
                        <br>
                        주말(금, 토, 공휴일 전날)은 주말 요금이 적용됩니다.<br>
                        동절기 (12월 1일 ~ 3월 31일)<br>
                        비수기 (~6월 20일 / 9월 1일~)<br>
                        준성수기 (6월 21일 ~ 7월 25일, 8월 18일 ~ 8월 31일)<br>
                        성수기 (7월 26일 ~ 8월 17일)
                    </P>
                </div>
    
                <div class='guide2'>
                    <h1>02.유의사항</h1>
                    <p>입실시간</p>
                    <ul>
                        <li>15시 이후부터 시작되며, 퇴실 시간 11시입니다.</li>
                        <li>바비큐 이용 시 숯과 석쇠를 글렌 블리스 내에서 구입하실 수 있습니다.</li>
                        <li>추가 요금 안내: 숯 4개 무료/ 숯 추가 1봉지 10,000원/ 번개탄 3,000원 / 석쇠 2인당 제공1개 추가3,000원 객실 내에서는 튀김 및 육류(삼겹살, 소고기) 등의 구이를 금하오니 야외 바비큐 시설을 이용하시기 바랍니다.</li>
                        <li>미성년자는 보호자 동반 없이 이용하실 수 없습니다ㅣ. (만 16세 이상 ~ 19세 이하 청소년은 법적 보호자 전원의 동의가 확인될 경우에 한해 펜션 이용이 가능합니다.</li>
                        <li>집기 파손 시에는 프런트 로비에 알려주시기 바랍니다. 오후 12시 이후의 고성방가는 타 객실 손님을 위하여 금하오니 양해 바랍니다.</li>
                        <li>퇴실 전 설거지 후 쓰레기는 분리수거하여 현관 밖에 놓아주시기 바랍니다.</li>
                        <li>폭죽, 앰프, 애완견 등은 사양합니다. 타 객실 손님을 위하여 금하오니 양해 바랍니다.</li>
                        <li>양초 등은 화재의 위험으로 불가합니다.</li>
                        <li>객실 취소 및 변경은 어떠한 경우(기상악화 포함)에도 환불 기준이 적용됩니다.</li>
                        <li>성수기 수영장 이용 시 비치타월은 개인적으로 가져오시면 도움이 됩니다.</li>
                        <li>음주 후에는 수영장 이용을 삼가시기 바랍니다. 사고를 방지하기 위해 다이빙은 절대 금합니다.</li>
                        <li>단체 예약은 전화로 문의하시면 더 많은 혜택을 드립니다.(단, 예약 후 입금하신 분에 한함)</li>
                    </ul>
                </div>
    
                <div class='guide3'>
                    <h1>03.환불기준</h1>
                    <ul>
                        <li>환불 적용은 입금 시에만 적용됩니다.(예약금 포함), 이용 당일은 이용 일자에서 제외됩니다.</li>
                        <li>예약 후 취소 시에는 10% 위약금이 있습니다.(당일 취소 포함하여 전체 객실 요금에서) 취소수수료 규정은 예약일(결제일)과 관계없이 입실일 기준으로 산정됩니다.</li>
                        <li>객실과 날짜는 예약 전 신중히 생각하시고 결정해 주시기 바랍니다. 올바른 예약문화의 정착을 위하여 불가피한 조치이오니 양해 부탁드립니다.</li>
                    </ul>
                    <table class='return'>
                        <tr>
                            <td>이용일 기준(취소 시)</td>
                            <td>숙박 당일 취소</td>
                            <td>1일 전</td>
                            <td>2일 전</td>
                            <td>3일 전</td>
                            <td>4일 전</td>
                            <td>5일 전</td>
                            <td>6일 전</td>
                            <td>7일 전</td>
                            <td>8일 전</td>
                            <td>9일 전</td>
                            <td>10일 전</td>
                        </tr>
                        <tr>
                            <td>환불금액(%)</td>
                            <td>0%</td>
                            <td>0%</td>
                            <td>0%</td>
                            <td>20%</td>
                            <td>40%</td>
                            <td>50%</td>
                            <td>60%</td>
                            <td>70%</td>
                            <td>80%</td>
                            <td>90%</td>
                            <td>90%</td>
                        </tr>
                    </table>
                </div>
            </div>

            <?php include("../../php/footer.php"); ?>
            
        </div>
        <?=$res_btn?>
    </body>
</html>