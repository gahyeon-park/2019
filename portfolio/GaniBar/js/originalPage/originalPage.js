/* 변수 선언 */
var nowMenuId = "originalMenu5";     // 현재 소주 메뉴 (ex 5 : 참이슬후레쉬)

var nowButton = 0;  // 팝업창 컨텐츠 현재 위치
var ButtonState = 0;    // 팝업창 왼쪽 오른쪽 버튼 상태
/* 본문 */

window.onload = function() {
    /* 로드 시 트렌지션 효과 */
    loadPageTransition();

    /* 메뉴 관련 코드 */
        /* 소주 종류 메뉴 마우스 호버 색상 전환 */
        $("#originalMenuBox").mouseover(function(e) {
            // 메뉴 색상 리셋
            for(i = 1; i <= $("#originalMenuBox li").length; i++) resetMenuColor("originalMenu" + i);

            // 타깃 메뉴 색상 전환
            changeMenuColor(e.target.id);
        });
        /* 메뉴 마우스 아웃 시 현재 소주 메뉴 색상 전환 */
        $("#originalMenuBox").mouseout(function(e) {
            // 메뉴 색상 리셋
            for(i = 1; i <= $("#originalMenuBox li").length; i++) resetMenuColor("originalMenu" + i);

            // 타깃 메뉴 색상 전환
            changeMenuColor(nowMenuId);
        });

        /* 부가적인 소주 메뉴 마우스 호버 색상 전환 */
        $("#subMenuBox").mouseover(function(e) {
            // 메뉴 색상 리셋
            for(i = 1; i <= $("#subMenuBox li").length; i++) resetMenuColor("subMenu" + i);
        
            // 타깃 메뉴 색상 전환
            changeMenuColor(e.target.id);
        });
        /* 부가적인 소주 메뉴 마우스 아웃 색상 리셋 */
        $("#subMenuBox").mouseout(function(e) {
            // 메뉴 색상 리셋
            for(i = 1; i <= $("#subMenuBox li").length; i++) resetMenuColor("subMenu" + i);
        });

    /* 소주 컨텐츠 관련 코드 */
        /* 소주 메뉴 클릭 시 컨텐츠 전환 */
        $("#originalMenuBox").click(function(e) {
            nowButton = 0;  
            ButtonState = 0;
            setSojuContents(e.target.id);
        });

        /* 부가적인 소주 메뉴 클릭 시 팝업 */
        $("#subMenuBox").click(function(e) {
            popUpBox(e.target.id);
        });
        /* 부가적인 소주 컨텐츠 클릭 시 팝업 닫힘 */
        $("#subMenuPopUp").click(function(e) {
            popUpBox(e.target.id);
        });

        /* 왼쪽 오른쪽 버튼 제어 */
        /* CF 컨텐츠 */
        $("#CFListBox .rightButton").click(function() {
            let idText = $("#originalMenuBox .menuSelected").attr("id");
            let idIndex = 0;
            for(i = 0; i < sojuObjArr.length; i++) {
                if(idText == sojuObjArr[i].id) {
                    idIndex = i;
                    break;
                }
            }

            if(sojuObjArr[idIndex].tvCF.length > ((ButtonState + 1) * $("#CFListBox li").length)) {
                ButtonState++;
                nowButton = 0;
                sojuObjArr[idIndex].setSojuTVCF(ButtonState, nowButton);
            }
        });
        $("#CFListBox .leftButton").click(function() {
            let idText = $("#originalMenuBox .menuSelected").attr("id");
            let idIndex = 0;
            for(i = 0; i < sojuObjArr.length; i++) {
                if(idText == sojuObjArr[i].id) {
                    idIndex = i;
                    break;
                }
            }

            if(sojuObjArr[idIndex].tvCF.length > ((ButtonState - 1) * $("#CFListBox li").length) && ButtonState != 0) {
                ButtonState--;
                nowButton = 0;

                sojuObjArr[idIndex].setSojuTVCF(ButtonState, nowButton);
            }
        });
        /* Poster 컨텐츠 */
        $("#posterListBox .rightButton").click(function() {
            let idText = $("#originalMenuBox .menuSelected").attr("id");
            let idIndex = 0;
            for(i = 0; i < sojuObjArr.length; i++) {
                if(idText == sojuObjArr[i].id) {
                    idIndex = i;
                    break;
                }
            }

            if(sojuObjArr[idIndex].posterCF.length > ((ButtonState + 1) * $("#posterListBox li").length)) {
                ButtonState++;
                sojuObjArr[idIndex].setSojuPoster(ButtonState);
            }
        });
        $("#posterListBox .leftButton").click(function() {
            let idText = $("#originalMenuBox .menuSelected").attr("id");
            let idIndex = 0;
            for(i = 0; i < sojuObjArr.length; i++) {
                if(idText == sojuObjArr[i].id) {
                    idIndex = i;
                    break;
                }
            }

            if(sojuObjArr[idIndex].posterCF.length > ((ButtonState - 1) * $("#posterListBox li").length) && ButtonState != 0) {
                ButtonState--;
                sojuObjArr[idIndex].setSojuPoster(ButtonState);
            }
        });

        /* 현재 광고 컨텐츠 전환 */
        $("#CFListBox").click(function(e) {
            let idText = $("#originalMenuBox .menuSelected").attr("id");
            let idIndex = 0;
            for(i = 0; i < sojuObjArr.length; i++) {
                if(idText == sojuObjArr[i].id) {
                    idIndex = i;
                    break;
                }
            }
            
            switch(e.target.id) {
                case "CFListImg1" :
                    nowButton = 0;
                break;
                case "CFListImg2" :
                    nowButton = 1;
                break;
                case "CFListImg3" :
                    nowButton = 2;
                break;
                case "CFListImg4" :
                    nowButton = 3;
                break;
            }
            $("#tvCFContents iframe").attr("src", "https://player.vimeo.com/video/" + sojuObjArr[idIndex].tvCF[nowButton + (ButtonState * $("#CFListBox li").length)].CFUrl);
            // 현재 컨텐츠 글귀 색상 전환
            for(i = 1; i <= $("#CFListBox li").length; i++) {
                resetNowContentsColor("CFTitle" + i);
            }
            changeNowContentsColor("CFTitle" + (nowButton + 1));
        });
}
        


        
        