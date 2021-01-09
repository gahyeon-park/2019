window.onload = function() {

    /* 랜덤 색상 뽑기 */
    function randomHex() {
        let randomArr = [
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
            'a', 'b', 'c', 'd', 'e', 'f'                    
        ];
        let randomHexString = "";

        let i = 0;
        while(i < 6) {
            let random = Math.floor(Math.random() * 16);
            randomHexString += randomArr[random];

            i++;
        }

        return "#" + randomHexString;
    }

    /* ability canvas 그리기 */
    function drawAbilityCanvas() {
        let abilitySkill = $(".AbilityBarBox input");
        let abilityCanvas = document.getElementsByClassName("AbilityBar");

        let i = 0;
        let chartObj = null;
        while(i < abilitySkill.length) {
            chartObj = new o_Chart(
                abilityCanvas[i],    // Canvas Id Object
                "circle",    // Chart Type : Circle
                ["gaHyeon"], // Name Array
                [$(abilitySkill[i]).val()],    // Value Array
                [randomHex()]   // Color Array
            );

            chartObj.drawChart();   // Draw Chart
            i++;
        }
    }

    /* file path 를 html ID로 바꿈 */
    function changePathToID(path) {
        return path.replace(/\//g, "_");
    }

    /* html ID를 file path로 바꿈 */
    function changeIDToPath(path) {
        return path.replace(/_/g, "/");
    }

    function loadFiles(directoryPath, appID) {
        let i = 0;
        let insertTarget = null;
        let directoryID = changePathToID(directoryPath);
        let directoryElement = $("#" + directoryID + ">.file");

        /* app 화면 초기화 */
        $(appID +  " .appContents .fileBox").html("");
        $(appID + " .appContents .fileDiscBox").html("");

        /* app 이름 */
        $(appID + " .appContentsBox .appTitle").html($("#" + directoryID + " .fileDisc .mainTitle").html());

        /* app 경로*/
        $(appID + " .appContentsBox .appPath").html(directoryPath);

        /* file 로드 */
        while(i < directoryElement.length) {
            insertTarget = $(directoryElement[i]);
    
            /* file 아이콘 및 타이틀 로드 */
            $(appID +  " .appContents .fileBox").append(
                `
                <li class="${insertTarget.attr("class")}">
                    <img class="fileImg" src="${insertTarget.find(".discImg").attr("src")}" alt="myPicture">
                    <h5 class="fileTitle">${insertTarget.find(".mainTitle").html()}</h5>
                </li>
                `
            );

            /* file 상세 정보 로드 */
            $(appID + " .appContents .fileDiscBox").append(
                `
                <li class="fileDisc">
                    ${insertTarget.find(".fileDisc").html()}
                </li>
                `
            );
    
            i++;
        }

        i = 0;
        directoryElement = $("#" + directoryID + ">.directory");

        /* directory 로드 */
        while(i < directoryElement.length) {
            insertTarget = $(directoryElement[i]);
    
            $(appID +  " .appContents .fileBox").append(
                `
                <li class="${insertTarget.attr("class")}">
                    <img class="fileImg" src="${insertTarget.find(".discImg").attr("src")}" alt="myPicture">
                    <h5 class="fileTitle">${insertTarget.find(".mainTitle").html()}</h5>
                </li>
                `
            );
    
            /* directory 상세 정보 로드 */
            $(appID + " .appContents .fileDiscBox").append(
                `
                <li class="fileDisc">
                    ${insertTarget.find(".fileDisc").html()}
                </li>
                `
            );

            i++;
        }
    }

    /* app 열기 */
    function openApp(target) {
        $(target).css("visibility", "visible");
        $(target).css("width", "60%");
        $(target).css("opacity", "1");
        $(target).css("z-index", maxZIndex);
        maxZIndex += 10;
    }

    /* app 닫기 */
    function closeApp(target) {
        $(target).css("visibility", "hidden");
        $(target).css("width", "30%");
        $(target).css("opacity", "0");
    }

    /* file 선택 */
    function selectFile(target) {
        resetSelectedFile(target);
        $(target).addClass("fileSelected");
        $($(target).parent().next().find(".fileDisc")[$(target).index()]).addClass("fileDiscSelected");
    }

    /* file 선택 리셋 */
    function resetSelectedFile(target) {
        $(target).parent().find(".file,.directory").removeClass("fileSelected");
        $(target).parent().next().find(".fileDisc").removeClass("fileDiscSelected");
    }

    /* 상위 디렉토리 리턴 */
    function getPrevDirectory(nowDirectory) {
        if(nowDirectory != "myPC") {
            let splitArray = nowDirectory.split("/");
            let returnDirectory = "";
    
            let i = 0;
            while(i < splitArray.length - 1) {
                if(i != 0)  returnDirectory += "/";
                returnDirectory += splitArray[i];
    
                i++;
            }
    
            return returnDirectory;
        }
        return "myPC";
    }
   
    /* 웹 url로 새 창 열기 */
    function openWebFile(url) {
        window.open("http://pager.kr/~st07/portfolio/" + url.split(".")[0]);
    }

    /* pdf파일 다운로드 php 로 이동 */
    function downloadPDF(url) {
        window.open("./PDF/" + url.split(".")[0] + ".pdf");
    }

    /* 시각 문자열 구하기 */
    function getTimeString(hours, minutes) {
        let isMorning = true;   // 오전이다!
        let resultString = "";  // return 할 시각 문자열

        /* 오전 오후 구하기 */
        if(hours >= 12 && hours < 24) isMorning = false;    // 오후이다!!

        /* resultString 오전 오후에 따라 다르게 생성 */
        if(isMorning) resultString = "오전 " + String(hours) + ":";
        else {
            if(Number(hours) == 12) resultString = "오후 " + String(Number(hours)) + ":"; 
            else resultString = "오후 " + String(Number(hours) - 12) + ":"; 
        }
        
        /* 7분을 07분 */
        if(Number(minutes) < 10) resultString += "0";

        resultString += String(minutes);

        return resultString;
        
    }

    /* 현재 날짜 문자열 구하기 */
    function getTodayString(year, month, date) {
        let resultString = "";  // return 할 현재 날짜 문자열

        resultString = String(year) + "-";

        /* 5월을 05월로 바꿔줌 */
        if((Number(month) + 1) < 10) resultString += "0";
        resultString += String(Number(month) + 1) + "-";

        /* 7일을 07일로 바꿔줌 */
        if(Number(date) < 10) resultString += "0";
        resultString += String(date);

        return resultString;
    }

/* ================ 로드 시 ================= */

    var maxZIndex = 10;
    drawAbilityCanvas();

    loadFiles("myPC/Information", "#InformationApp");
    loadFiles("myPC", "#myPCApp");
    loadFiles("myPC/Portfolio", "#PortfolioApp");
    loadFiles("myPC/Study", "#StudyApp");

    /* 시간 구하기 */
    var blogTime = new Date();
    $("#clockMenu p:nth-child(1)").html(getTimeString(blogTime.getHours(), blogTime.getMinutes()));
    $("#clockMenu p:nth-child(2)").html(getTodayString(blogTime.getFullYear(), blogTime.getMonth(), blogTime.getDate()));

    /* 1분마다 시간 체크 */
    setInterval(function() {
        blogTime = new Date();
        $("#clockMenu p:nth-child(1)").html(getTimeString(blogTime.getHours(), blogTime.getMinutes()));
        $("#clockMenu p:nth-child(2)").html(getTodayString(blogTime.getFullYear(), blogTime.getMonth(), blogTime.getDate()));    
    }, 60000);

    
/* =============== 이벤트 =================== */

    /* 아이콘 클릭시 앱 열기 */
    $("#InformationButton").on("dblclick", function() { openApp("#InformationApp"); });
    $("#myPCButton").on("dblclick", function() { openApp("#myPCApp"); });
    $("#PortfolioButton").on("dblclick", function() { openApp("#PortfolioApp"); });
    $("#StudyButton").on("dblclick", function() { openApp("#StudyApp"); });

    /* 밑에 있는 앱 클릭시 앱 최상단으로 && 클릭 이벤트 */
    $("#InformationApp").on("click", function(e) { 
        openApp("#InformationApp"); 

        // 닫기 버튼
        if($(e.target).attr("class") == "appButton closeButton") { 
            closeApp("#InformationApp"); 
            loadFiles("myPC/Information", "#InformationApp"); 
        }
        // prev 버튼
        else if($(e.target).attr("class") == "xi-arrow-left appPrevButton") { 
            let prevDirectoryPath = getPrevDirectory($(e.target).parent().parent().find(".appPath").html());
            loadFiles(prevDirectoryPath, "#InformationApp"); 
        }
        
        
        // next 버튼

    });
    $("#myPCApp").on("click", function(e) { 
        openApp("#myPCApp"); 

        // 닫기 버튼
        if($(e.target).attr("class") == "appButton closeButton") { 
            closeApp("#myPCApp"); 
            loadFiles("myPC", "#myPCApp"); 
        }
        // prev 버튼
        else if($(e.target).attr("class") == "xi-arrow-left appPrevButton") { 
            let prevDirectoryPath = getPrevDirectory($(e.target).parent().parent().find(".appPath").html());
            loadFiles(prevDirectoryPath, "#myPCApp"); 
        }
    });
    $("#PortfolioApp").on("click", function(e) { 
        openApp("#PortfolioApp"); 

        // 닫기 버튼
        if($(e.target).attr("class") == "appButton closeButton") { 
            closeApp("#PortfolioApp");
            loadFiles("myPC/Portfolio", "#PortfolioApp"); 
        }
        // prev 버튼
        else if($(e.target).attr("class") == "xi-arrow-left appPrevButton") { 
            let prevDirectoryPath = getPrevDirectory($(e.target).parent().parent().find(".appPath").html());
            loadFiles(prevDirectoryPath, "#PortfolioApp"); 
        }
    });
    $("#StudyApp").on("click", function(e) { 
        openApp("#StudyApp"); 

        // 닫기 버튼
        if($(e.target).attr("class") == "appButton closeButton") { 
            closeApp("#StudyApp"); 
            loadFiles("myPC/Study", "#StudyApp"); 
        }
        // prev 버튼
        else if($(e.target).attr("class") == "xi-arrow-left appPrevButton") { 
            let prevDirectoryPath = getPrevDirectory($(e.target).parent().parent().find(".appPath").html());
            loadFiles(prevDirectoryPath, "#StudyApp"); 
        }
    });

    /* webFile 더블 클릭시 해당 웹사이트로 이동 */
    $(document).on("dblclick", ".webFile", function(e) { openWebFile($(this).find(".fileTitle").html()); });
    /* pdfFile 더블 클릭시 해당 pdf 파일 다운로드 */
    $(document).on("dblclick", ".pdfFile", function(e) { downloadPDF($(this).parent().find(".fileTitle").html()); });


    /* file 한번 클릭시 선택 class 추가 및 미리보기창 띄우기 */
    $(document).on("click", ".fileBox .file,.directory", function(e) { selectFile(this); });
    /* directory 두번 클릭시 directory안에 들어가기 */
    $(document).on("dblclick", ".fileBox .directory", function(e) { loadFiles($(this).parent().parent().parent().find(".appPath").html() + "/" + $(this).find(".fileTitle").html(), 
                                                                            "#" + $(this).parent().parent().parent().parent().parent().attr("id")); } );

}