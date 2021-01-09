window.onload = function() {
/* 공통 변수 선언 */
    var discListTimer = null;
    var dateDiscTimer = null;
    var dateTextTimer = null;

    /* HOME 컨텐츠 */
    var myNameBoxClick = false; // 이름 부분 클릭 bool

    /* ABOUT 컨텐츠 변수 */
    var about_timeOut;       // 시간 지연 타이머 변수
    
    /* ABILITY 컨텐츠 */
    // 그래프 객체
    function GraphPercent(id, perText, perStick) {
        this.textId = "percentText" + (id + 1);
        this.stickId = "percentStick" + (id + 1); 
        this.percentText = perText; // 50% 등등
        this.percentStick = perStick;   // 그래프 높이
        this.timer = null;

        this.printStick = function() {
            $("#" + this.stickId).css("height", this.percentStick)
                                .css("opacity", "1.0");
        }
        this.printText = function() {
            typingMotion(this.textId, this.percentText, this.timer, 150);
        }
    }

    /* CONTACT 컨텐츠 */
    var arrowIconTimer = null;  // 화살표 타이머
    var arrowTimerCount = true; // 화살표 타이머 카운트

/* 공통 함수 선언 */
    // 타이머 중지
    function stopTypingTimer(intervalId) {
        clearInterval(intervalId);
        typingTimer = null;
    }

    // 클릭 언클릭 바꿔주는 함수
    function isClick(boolClick) {
        if(boolClick == true) return false;
        return true;
    }

    // 1차원 배열 타자 모션
    function typingMotion(typingId, typingString, typingTimer, typingTime) {
        var resultString = "";  // 화면에 출력 될 string
        var iString = 0;              // i 인덱스
        
            // 글자 하나씩 출력
            if(typingTimer == null) {
                typingTimer = setInterval(function() {
                    resultString += typingString[iString];

                    $("#" + typingId).html(resultString);

                    iString++;
                    if(iString == typingString.length) {
                        stopTypingTimer(typingTimer);
                    }
                }, typingTime);
            }
    }

    // 2차원 배열 타자 모션
    function typingArrMotion(typingId, typingString, typingTimer, typingTime) {
        var resultString = "";  // 화면에 출력 될 string
        var iString = 0;              // i 인덱스
        var jString = 0;
        //var typingTimer;    // 타이머 변수

            // 글자 하나씩 출력
            if(typingTimer == null) {
                typingTimer = setInterval(function() {
                    
                    console.log(typingTimer, discListTimer);
                    resultString += typingString[iString][jString];

                    $("#" + typingId + (iString + 1)).html(resultString);

                    jString++;
                    if(jString == typingString[iString].length) {
                        iString++; jString = 0;
                        resultString = "";
                    }
                    console.log(iString, typingString.length);
                    if(iString == typingString.length) {
                        stopTypingTimer(typingTimer);
                    }
                }, typingTime);
            }
    }

    // 메뉴 리셋
    function resetMenuDisplay() {
        $(".HOME, .ABOUT, .ABILITY, .PORTFOLIO, .CONTACT").css("display", "none");

        // 타이머 종료
        if(discListTimer != null) {
            clearInterval(discListTimer);
            discListTimer = null;
        } 
        if(dateDiscTimer != null) {
            clearInterval(dateDiscTimer);
            dateDiscTimer = null;
        }
        if(dateTextTimer != null) {
            clearInterval(dateTextTimer);
            dateTextTimer = null;
        }

        // HOME 컨텐츠 리셋
        myNameBoxClick = false;

        for(i = 0; i < 3; i++) {
            $("#discList" + (i + 1 )).html("");
        }

        // ABOUT 컨텐츠 리셋
        for(i = 0; i< 5; i++) {
            $("#dateText" + (i + 1)).html("");
            $("#dateDisc" + (i + 1)).html("");
        }
    }

    // 메뉴 색상 리셋
    function resetMenuColor() {
        $("#homeButton").css("color", "#ffffff");
        $("#aboutButton").css("color", "#ffffff");
        $("#abilityButton").css("color", "#ffffff");
        $("#portfolioButton").css("color", "#ffffff");
        $("#contactButton").css("color", "#ffffff");

    }
    
    // transition 설정
    function setTransitionStyle(idString, durationTime ,delayTime) {
        console.log(idString, durationTime, delayTime);
        $("#"+idString).css("transition-property", "all")
                        .css("transition-duration", durationTime + "s")
                        .css("transition-delay", delayTime + "s")
                        .css("transition-timing-function", "ease");
    }

/* ABOUT 컨텐츠 함수 */
    // 구분선 height 변화
    function translateDivisionLine(boolClick) { 
        // 메뉴 ABOUT 클릭 해제 되었을 때
        if(!boolClick) {
            // delay 0 , duration 0  셋팅 후 height 초기화
            setTransitionStyle("divisionLine1", 0, 0);
            $("#divisionLine1").css("height", "0px");

            setTransitionStyle("divisionLine2", 0, 0);
            $("#divisionLine2").css("height", "0px");

            setTransitionStyle("divisionLine3", 0, 0);
            $("#divisionLine3").css("height", "0px");

            setTransitionStyle("divisionLine4", 0, 0);
            $("#divisionLine4").css("height", "0px");

            setTransitionStyle("divisionLine5", 0, 0);
            $("#divisionLine5").css("height", "0px");
        }
        // 메뉴 ABOUT 클릭 되었을 때
        else {
            setTransitionStyle("divisionLine1", 1.0, 0.5);
            $("#divisionLine1").css("height", "102.4px");

            setTransitionStyle("divisionLine2", 1.0, 1.5);
            $("#divisionLine2").css("height", "102.4px");

            setTransitionStyle("divisionLine3", 1.0, 2.5);
            $("#divisionLine3").css("height", "102.4px");

            setTransitionStyle("divisionLine4", 1.0, 3.5);
            $("#divisionLine4").css("height", "102.4px");

            setTransitionStyle("divisionLine5", 1.0, 4.5);
            $("#divisionLine5").css("height", "102.4px");
        }

    }

    // 발자국 opacity 변화
    function translateFoot(boolClick) {

        // 메뉴 ABOUT 클릭 해제 되었을 때
        if(!boolClick) {
            for(i = 0; i< 5; i++) {

                setTransitionStyle("footPrintLeft"+(i+1), 0, 0);
                $("#footPrintLeft"+(i+1)).css("opacity", "0");
                
                setTransitionStyle("footPrintRight"+(i+1), 0, 0);
                $("#footPrintRight"+(i+1)).css("opacity", "0");
            }
            
        }
        // 메뉴 ABOUT 클릭 되었을 때
        else {
            for(i = 0; i< 5; i++) {
                setTransitionStyle("footPrintLeft"+(i+1), 0.5, (0.5 + i));
                $("#footPrintLeft"+(i+1)).css("opacity", "1");

                setTransitionStyle("footPrintRight"+(i+1), 0.5, (1.0 + i ));
                $("#footPrintRight"+(i+1)).css("opacity", "1");
            }
        }
    }

/* ABILITY 컨텐츠 함수 */
    function resetABILITY() {
        for(i = 0; i< 10; i++) {
            $("#percentText" + (i + 1)).html("");
            $("#percentStick" + (i + 1)).css("height", "0px")
                                        .css("opacity", "0.0");

            setTransitionStyle("percentStick" + (i + 1), 1.5, 0.0);
        }
    }

/* CONTACT 컨텐츠 함수 */
    // display 리셋 함수
    function resetPhoneView() {
        console.log("none");
        $("#hoverMeText").css("display", "none");
        $("#myPhoneNumber").css("display", "none");
        $("#myKakaoId").css("display", "none");
        $("#myMailAddress").css("display", "none");
    }

    /* 본문 */

        /* 공통 사항 */
            // 메뉴 hover 시 색바뀜
            $(".bookMarkImg").hover(function(e) {
                var $this = $(e.target);

                switch($this.attr("id")) {
                    case "homeButton" :
                        $("#homeButton").css("color", "#515151");
                        break;
                    case "aboutButton" :
                        $("#aboutButton").css("color", "#515151");
                        break;
                    case "abilityButton" :
                        $("#abilityButton").css("color", "#515151");
                        break;
                    case "portfolioButton" :
                        $("#portfolioButton").css("color", "#515151");
                        break;
                    case "contactButton" :
                        $("#contactButton").css("color", "#515151");
                        break;
                }
            });

            // 메뉴 mouseout 시 색 리셋
            $(".bookMarkImg").mouseout(function(e) {
                var $this = $(e.target);

                resetMenuColor();
            });

            // 메뉴 클릭시 화면 전환
            $(".bookMarkImg").click(function(e) {
                var $this = $(e.target);
                
                /* ABOUT 컨텐츠 리셋 */
                // 발자국 이미지 리셋
                translateFoot(false);

                // 구분 선 height transition 리셋
                translateDivisionLine(false);

                switch($this.attr("id")) {
                    case "homeButton" :
                        resetMenuDisplay();
                        $(".HOME").css("display", "inline-block");
                        break;
                    case "aboutButton" :
                        resetMenuDisplay();
                        $(".ABOUT").css("display", "inline-block");
                        break;
                    case "abilityButton" :
                        resetMenuDisplay();
                        $(".ABILITY").css("display", "inline-block");
                        break;
                    case "portfolioButton" :
                        resetMenuDisplay();
                        $(".PORTFOLIO").css("display", "inline-block");
                        break;
                    case "contactButton" :
                        resetMenuDisplay();
                        $(".CONTACT").css("display", "inline-block");
                        break;
                }
            });
    
        /* HOME 컨텐츠 ----- */

            // 이름 hover 및 mouseout, click 기능 불필요 판단
            // // 이름 부분 hover 시
            // // click 회색투명의 문구 출력
            // $("#myNameBoxTransition").hover(function(e) {
            //     $("#myNameBoxTransition").css("color", "rgba(255, 255, 255, 1.0)")
            //                              .css("background-color", "rgba(100, 100, 100, 0.5)");
            // });
    
            // // 이름 부분 mouseout 시
            // // click 회색 투명의 문구 사라짐
            // $("#myNameBoxTransition").mouseout(function(e) {
            //     $("#myNameBoxTransition").css("color", "rgba(255, 255, 255, 0.0)")
            //                              .css("background-color", "rgba(100, 100, 100, 0.0)");
            // });
            
            // // 이름 부분 click 시
            // // 설명 부분이 나타나고 글자가 하나씩 출력
            // $("#myNameBoxTransition").click(function(e) {
            //     myNameBoxClick = isClick(myNameBoxClick);

            //     clearInterval(discListTimer);
                
            //     if(myNameBoxClick){
            //         var discString = [
            //             "1. 1997.11.08 생의 23세 여성을 뜻함.",
            //             "2. 성실하고 열정이 넘치는 사람을 일컫음.",
            //             "3. 자신이 맡은 바를 책임감있게 수행하는 사람을 말함."
            //         ];  // 설명 리스트
    
            //         $("#myDiscBox").css("display", "inline-block");

            //         typingArrMotion("discList", discString, discListTimer, 80);
            //     }
            //     else {
            //         // 설명 부분 리셋
            //         for(i = 0; i < 3; i++) {
            //             $("#discList" + (i + 1 )).html("");
            //         }
            //         $("#myDiscBox").css("display", "none");
            //     }

            // });

            // 처음 페이지 들어갔을때 타자모션 자동 실행
            var discString = [
                "1. 1997.11.08 생의 23세 여성을 뜻함.",
                "2. 성실하고 열정이 넘치는 사람을 일컫음.",
                "3. 자신이 맡은 바를 책임감있게 수행하는 사람을 말함."
            ];  // 설명 리스트
            $("#myDiscBox").css("display", "inline-block");
            typingArrMotion("discList", discString, discListTimer, 80);

                // homeButton 클릭 했을 때 타자모션 실행
                $("#homeButton").click(function(e) {
                    $("#myDiscBox").css("display", "inline-block");
                    typingArrMotion("discList", discString, discListTimer, 80);
                })
        /* ----- HOME 컨텐츠 */
            
    
        /* ABOUT 컨텐츠 ----- */

            // aboutButton (메뉴) 클릭 시
             $("#aboutButton").click(function(e) {
                var dateText = [
                    "2016.02",
                    "2016.03",
                    "2018.07",
                    "2019.03",
                    "미래",
                ];  // date텍스트 리스트
                var dateDisc = [
                    "안산 양지고등학교 졸업",
                    "한국산업기술대학교 게임공학부 입학",
                    "한국산업기술대학교 중퇴",
                    "라인아카데미  UI/UX 공부",
                    "웹 퍼블리셔 & 백앤드 취업 예정",
                ];  // date텍스트 리스트

                // 구분 선 transtion 효과
                // 클릭 후 시간 지연하고 transition 효과 ( 로딩 에러 )
                about_timeOut = setTimeout(function() {

                    // 발자국 이미지 출력
                    translateFoot(true);

                    // 구분 선 height transition
                    translateDivisionLine(true);

                    // dataText 글자 타이핑
                    typingArrMotion("dateText", dateText, dateTextTimer, 150);
                   
                    // dateDisc 글자 타이핑
                    typingArrMotion("dateDisc", dateDisc, dateDiscTimer, 80);
                        
                }, 0);
                // 클릭 해제 시 바로 리셋
            });

        /* ----- ABOUT 컨텐츠 */

        /* ABILITY 컨텐츠 ----- */

            // abilityButton (메뉴) 클릭 시
            $("#abilityButton").click(function(e) {
                resetABILITY();
                about_timeOut = setTimeout(function() {
                    var percentTextArr = [
                        "50%", "60%", "75%", "70%", "85%",
                        "90%", "80%", "90%", "85%", "85%"
                    ];
                    var percentStickArr = [
                        "200px", "245.5px", "312.75px", "291px", "359.25px",
                        "382px", "336.5px", "382px", "359.25px", "359.25px"
                    ];
                    var objPercentArr = [];

                    for(i = 0; i< 10; i++) {
                        objPercentArr[i] = new GraphPercent(i, percentTextArr[i], percentStickArr[i]);
                        objPercentArr[i].printStick();
                        objPercentArr[i].printText();
                    }
                }, 500); 
            });

        /* ----- ABILITY 컨텐츠 */

        /* PORTFOLIO 컨텐츠 ----- */
        var previeDiscArr = [
            '<span class="discTitle">마카롱 구입 사이트로, 사용자가 직접 색과 <br>필링, 토핑을 정하여 주문제작이 <br>가능하다는 차별점이 있는 사이트.</span><br><br>- 프로젝트 기획에서 조장으로 일정관리와 팀원관리를 맡음.<br>- MY PAGE 부분 HTML, CSS JAVASCRIPT 구현.',
            '<span class="discTitle">C언어를 활용해 제작한 오목게임으로, <br>가로, 세로줄에 놓인 돌에 따라 총 갯수나<br>최대 수를 계산하는 콘솔게임.</span><br><br>- 개인 프로젝트로 모든 작업물은 본인이 제작함.<br>- 게임 자체가 목적보단 계산 구조에 대한 탐구 목적.',
            '<span class="discTitle">Rations Please 게임을 모티브로 만든 <br>C#언어 기반 2D 게임으로, 주어진 조건에 <br>따라 사람을 가려내는 게임.</span><br><br>- 개인 프로젝트로 모든 작업물은 본인이 제작함.<br>- 디자인보다 기능 구현에 대한 언어적 역량을 중요시함.',
            '<span class="discTitle">DARK ECHO 게임을 모티브로 만든 C/C++<br>언어 기반 3D 게임으로, 어두운 배경과 시간<br>안에 복잡한 미로를 탈출하는 게임</span><br>- 2인 프로젝트로 조장으로 팀원관리를 맡음.<br>- 오프닝과 엔딩을 제외한 인게임 요소들을 맡음.<br>- 디자인보다 기능 구현에 대한 언어적 역량을 중요시함.'
        ];
            // 각 포트폴리오 마우스 hover 했을 시
            $(".portfolioImg").hover(function(e) {
                var $this = $(e.target);
                
                switch($this.attr("id")) {
                    // 꼬끄팩토리 이미지 삽입
                    case "coqueFactory1" :
                    case "coqueFactory2" : 
                        console.log("coque");
                        // 이미지 삽입
                        $("#previewImg").css("background-image", 'url("./images/portfolio/coqueFactoryImg.png")');
                        // 글자 색 바뀌기
                        $("#coqueFactory1, #coqueFactory2").css("color", "rgb(255, 255, 255)");
                        
                        // 설명글 삽입
                        $("#previewDisc").html(previeDiscArr[0]);
                        break;

                    // 오목게임 이미지 삽입
                    case "omok1" :
                    case "omok2" :
                        // 이미지 삽입
                        $("#previewImg").css("background-image", 'url("./images/portfolio/omokImg.png")');
                        // 글자 색 바뀌기
                        $("#omok1, #omok2").css("color", "rgb(255, 255, 255)");

                        // 설명글 삽입
                        $("#previewDisc").html(previeDiscArr[1]);
                        break;

                    // 진찰해주세요 이미지 삽입
                    case "healMe1" :
                    case "healMe2" :
                        // 이미지 삽입
                        $("#previewImg").css("background-image", 'url("./images/portfolio/healMeImg.png")');
                        // 글자 색 바뀌기
                        $("#healMe1, #healMe2").css("color", "rgb(255, 255, 255)");

                        // 설명글 삽입
                        $("#previewDisc").html(previeDiscArr[2]);
                        break;

                    // OUT OF BODY 이미지 삽입
                    case "outOfBody1" :
                    case "outOfBody2" :
                        // 이미지 삽입
                        $("#previewImg").css("background-image", 'url("./images/portfolio/outOfBody.png")');
                        // 글자 색 바뀌기
                        $("#outOfBody1, #outOfBody2").css("color", "rgb(255, 255, 255)");

                        // 설명글 삽입
                        $("#previewDisc").html(previeDiscArr[3]);
                        break;
                }
            });

            // 각 포트폴리오 마우스 out 했을 시
            $(".portfolioImg").mouseout(function(e) {
                var $this = $(e.target);
                
                switch($this.attr("id")) {
                    // 꼬끄팩토리 이미지 빼기
                    case "coqueFactory1" :
                    case "coqueFactory2" : 
                        // 이미지 삽입
                        $("#previewImg").css("background-image", 'url("")');
                        // 글자 색 바뀌기
                        $("#coqueFactory1, #coqueFactory2").css("color", "#515151");
                        
                        // 설명글 빼기
                        $("#previewDisc").html("");
                        break;

                    // 오목게임 이미지 빼기
                    case "omok1" :
                    case "omok2" :
                        // 이미지 삽입
                        $("#previewImg").css("background-image", 'url("")');
                        // 글자 색 바뀌기
                        $("#omok1, #omok2").css("color", "#515151");

                        // 설명글 빼기
                        $("#previewDisc").html("");
                        break;

                    // 오목게임 이미지 빼기
                    case "healMe1" :
                    case "healMe2" :
                        // 이미지 삽입
                        $("#previewImg").css("background-image", 'url("")');
                        // 글자 색 바뀌기
                        $("#healMe1, #healMe2").css("color", "#515151");
                        
                        // 설명글 빼기
                        $("#previewDisc").html("");
                        break;

                    // OUT OF BODY 이미지 빼기
                    case "outOfBody1" :
                    case "outOfBody2" :
                        // 이미지 삽입
                        $("#previewImg").css("background-image", 'url("")');
                        // 글자 색 바뀌기
                        $("#outOfBody1, #outOfBody2").css("color", "#515151");
                        
                        // 설명글 빼기
                        $("#previewDisc").html("");
                        break;
                }
            });

            // 각 포트폴리오 click 했을 시
            $(".portfolioImg").click(function(e) {
                var $this = $(e.target);
                
                switch($this.attr("id")) {
                    // 꼬끄팩토리 실행
                    case "coqueFactory1" :
                    case "coqueFactory2" : 
                        window.open("./portfolio/coqueFactory/team5/coqueFactory_main.html")
                        break;

                    // 오목게임 실행
                    case "omok1" :
                    case "omok2" :
                        // 오목 exe파일 실행시키기
                        /*
                        var path = "./portfolio/omok/Debug/04_06_TEST_omok.exe";
                        var filePath = String.fromCharCode(34) + path + String.fromCharCode(34);
                        var WshShell = new ActiveXObject("WScript.Shell", 1 ,true);
                        WshShell.Run(filePath);
                        */
                        alert("서비스 준비 중");
                        break;
                    
                    // 진찰해주세요 실행
                    case "healMe1" :
                    case "healMe2" :
                        // 진찰해주세요 exe파일 실행시키기
                        /*
                        var path = "./portfolio/healMe/Debug/04_06_TEST_omok.exe";
                        var filePath = String.fromCharCode(34) + path + String.fromCharCode(34);
                        var WshShell = new ActiveXObject("WScript.Shell", 1 ,true);
                        WshShell.Run(filePath);
                        */
                       alert("서비스 준비 중");
                    break;

                    // OUT OF BODY 실행
                    case "outOfBody1" :
                    case "outOfBody2" :
                        // OUT OF BODY exe파일 실행시키기
                        /*
                        var path = "./portfolio/healMe/Debug/04_06_TEST_omok.exe";
                        var filePath = String.fromCharCode(34) + path + String.fromCharCode(34);
                        var WshShell = new ActiveXObject("WScript.Shell", 1 ,true);
                        WshShell.Run(filePath);
                        */
                       alert("서비스 준비 중");
                    break;
                    default :
                        alert("서비스 준비 중");
                    break;
                }
            })
        /* ----- PORTFOLIO 컨텐츠 */

        /* CONTACT 컨텐츠 ----- */
            

            // transition 부여
            for(i = 0; i< 3; i++) setTransitionStyle("arrowIcon"+(i + 1), 0.5, 0);

            $("#contactButton").click(function() {
                resetPhoneView();
                $("#hoverMeText").css("display", "inline-block");
                // 화살표 움직임 타이머
                if(arrowIconTimer == null) {
                    arrowIconTimer = setInterval(function() {
                        if(arrowTimerCount) {
                            for(i = 0; i<3; i++) {
                                $("#arrowIcon" + (i + 1)).css("margin-top", "60px");
                            }
                        }
                        else {
                            for(i = 0; i<3; i++) {
                                $("#arrowIcon" + (i + 1)).css("margin-top", "20px");
                            }
                        }
                        if(arrowTimerCount) arrowTimerCount = false;
                        else arrowTimerCount = true;
                    }, 800);
                }
            });

            // 전화 아이콘 hover 시
            $("#callIcon").hover(function() {
                resetPhoneView();
                $("#myPhoneNumber").css("display", "inline-block");
            });
            // 전화 아이콘 mouseout 시
            $("#callIcon").mouseout(function() {
                resetPhoneView();
                $("#hoverMeText").css("display", "inline-block");
            });


            // 카카오톡 아이콘 hover 시
            $("#kakaoIcon").hover(function() {
                resetPhoneView();
                $("#myKakaoId").css("display", "inline-block");
            });
            // 카카오톡 아이콘 mouseout 시
            $("#kakaoIcon").mouseout(function() {
                resetPhoneView();
                $("#hoverMeText").css("display", "inline-block");
            });


            // 메일 아이콘 hover 시
            $("#mailIcon").hover(function() {
                resetPhoneView();
                $("#myMailAddress").css("display", "inline-block");
            });
            // 메일 아이콘 mouseout 시
            $("#mailIcon").mouseout(function() {
                resetPhoneView();
                $("#hoverMeText").css("display", "inline-block");
            });
        /* ----- CONTACT 컨텐츠 */
}    
