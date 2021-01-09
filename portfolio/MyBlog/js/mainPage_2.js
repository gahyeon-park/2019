window.onload = function() {
    /* 공통 변수 선언 */

    /* HOME 컨텐츠 */
    var myNameBoxClick = false; // 이름 부분 클릭 bool

    /* 공통 함수 선언 */
    // 클릭 언클릭 바꿔주는 함수
    function isClick(boolClick) {
        if(boolClick == true) return false;
        return true;
    }

    // 1차원 배열 타자 모션
    function typingMotion(typingId, typingString, typingTime) {
        var resultString = "";  // 화면에 출력 될 string
        var iString = 0;              // i 인덱스

            // 글자 하나씩 출력
            if(typingTimer == null) {
                typingTimer = setInterval(function() {
                    resultString += typingString[iString];
    
                    $("#" + typingId).html(resultString);
    
                    iString++;
                    if(iString == typingTimer.length) {
                        clearInterval(typingTimer);
                    }
                }, typingTime);

            }
        
    }

    // 2차원 배열 타자 모션 객체
    function typingArrMotion(typingId, typingString, typingTime) {
        this.typingId = typingId;
        this.stringArr = typingString;  // 화면에 출력 될 string
        this.typingTimer = null;            // 타이머 변수
        this.typingTime = typingTime;       // 타이핑 시간

        this.typeString = function() {
            // 글자 하나씩 출력
            var resultString = "";
            var iString = 0;
            var jString = 0;
            
            if(this.typingTimer == null) {

                this.typingTimer = setInterval(function() {
                    resultString += this.stringArr[iString][jString];

                    $("#" + this.typingId + (iString+1)).html(resultString);

                    jString++;
                    if(jString == this.stringArr[iString].length) {
                        iString++; jString = 0;
                        resultString = "";
                    }
                    if(iString == this.stringArr.length) {
                        clearInterval(this.typingTimer);
                    }
                }, this.typingTime);
            }
        }
    }
    // 메뉴 리셋
    function resetMenuDisplay() {
        $(".HOME, .ABOUT, .ABILITY, .PORTFOLIO, .CONTACT").css("display", "none");

        // HOME 컨텐츠 리셋
        myNameBoxClick = false;
        $("#myDiscBox").css("display", "none");
        for(i = 0; i < 3; i++) {
            $("#discList" + (i + 1 )).html("");
        }

        // ABOUT 컨텐츠 리셋
        for(i = 0; i< 5; i++) {
            $("#dateText" + (i + 1)).html("");
            $("#dateDisc" + (i + 1)).html("");
        }
    }

    // transition 설정
    function setTransitionStyle(idString, durationTime ,delayTime) {
        console.log(idString, durationTime, delayTime);
        $("#"+idString).css("transition-property", "all")
                        .css("transition-duration", durationTime + "s")
                        .css("transition-delay", delayTime + "s")
                        .css("transition-timing-function", "ease");
    }
    
    /* 본문 */
    
        /* 공통 사항 */
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
            // 이름 부분 hover 시
            // click 회색투명의 문구 출력
            $("#myNameBoxTransition").hover(function(e) {
                $("#myNameBoxTransition").css("color", "rgba(255, 255, 255, 1.0)")
                                         .css("background-color", "rgba(100, 100, 100, 0.5)");
            });
    
            // 이름 부분 mouseout 시
            // click 회색 투명의 문구 사라짐
            $("#myNameBoxTransition").mouseout(function(e) {
                $("#myNameBoxTransition").css("color", "rgba(255, 255, 255, 0.0)")
                                         .css("background-color", "rgba(100, 100, 100, 0.0)");
            });
            
            // 이름 부분 click 시
            // 설명 부분이 나타나고 글자가 하나씩 출력
            $("#myNameBoxTransition").click(function(e) {
                myNameBoxClick = isClick(myNameBoxClick);

                if(myNameBoxClick){
                    var discString = [
                        "1. 1997.11.08 생의 23세 여성을 뜻함.",
                        "2. 성실하고 열정이 넘치는 사람을 일컫음.",
                        "3. 자신이 맡은 바를 책임감있게 수행하는 사람을 말함."
                    ];  // 설명 리스트
                    var objTypingDisc = new typingArrMotion("discList", discString, 80);
                    $("#myDiscBox").css("display", "inline-block");
                    objTypingDisc.typeString();
                }
                else {
                    // 설명 부분 리셋
                    for(i = 0; i < 3; i++) {
                        $("#discList" + (i + 1 )).html("");
                    }
                    $("#myDiscBox").css("display", "none");
                }

            });
    
        /* ----- HOME 컨텐츠 */
            
    
        /* ABOUT 컨텐츠 ----- */
            /* ABOUT 컨텐츠 변수 */
            var about_timeOut;          // 시간 지연 타이머 변수

            /* ABOUT 컨텐츠 함수 */
            function translateDivisionLine(boolClick) { // 구분선 height 변화
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
                        setTransitionStyle("footPrintLeft"+(i+1), 1.0, (0.5 + i));
                        $("#footPrintLeft"+(i+1)).css("opacity", "1");

                        setTransitionStyle("footPrintRight"+(i+1), 1.0, (1.0 + i ));
                        $("#footPrintRight"+(i+1)).css("opacity", "1");
                    }
                }
            }

            /* ABOUT 본문 */
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
                var objTypingDateText = new typingArrMotion("dateText", dateText, 150);
                var objTypingDateDisc = new typingArrMotion("dateDisc", dateDisc, 80);

                // 구분 선 transtion 효과
                // 클릭 후 시간 지연하고 transition 효과 ( 로딩 에러 )
                about_timeOut = setTimeout(function() {

                    // 발자국 이미지 출력
                    translateFoot(true);

                    // 구분 선 height transition
                    translateDivisionLine(true);

                    // dataText 글자 타이핑
                    objTypingDateText.typeString();
                   
                    // dateDisc 글자 타이핑
                    objTypingDateDisc.typeString();
                        
                }, 500);
                // 클릭 해제 시 바로 리셋
            });
        /* ----- ABOUT 컨텐츠 */
}    
