window.onload = function() {
    /* 서브 설문지 전환 함수 */
    function resetSubContents() {
        $("#defaultSubSurvey").css("display", "none");
        $("#kindOriginalSubSurvey").css("display", "none");
        $("#kindFruitSubSurvey").css("display", "none");

        $("#kindOriginalButton").css("color", "#515151");
        $("#kindFruitButton").css("color", "#515151");
    }
    /* sumitButton 클릭시 메인섹션 트렌지션 함수 */
    function loadMainSectionTransition(isLoad) {
        if(!isLoad) {
            $(".mainSection").css("left", "2000px");
        }
        else {
            $(".mainSection").css("left", "715px");
        }
    }
    /* 기본 소주 종류 추천 함수 */
    function setRecommendOriginal(flavorRange, gulpRange, alcoholRange) {
        var recommendSoju = null;

        let i = 0;
        while(i < sojuObjArr.length) {
            console.log(sojuObjArr[i].flavorRange);
            if(sojuObjArr[i].flavorRange == flavorRange
                && sojuObjArr[i].gulpRange == gulpRange
                && sojuObjArr[i].alcoholRange == alcoholRange) {
                    recommendSoju = sojuObjArr[i];
                }
            i++;
        }
        
        if(recommendSoju ==  null) return false;
        else {
            return recommendSoju;
        }
    }

    /* 과일 소주 종류 추천 함수 */
    function setRecommendFruit(sweetRange, alcoholRange) {
        var recommendSoju = null;

        let i = 0;
        while(i < fruitObjArr.length) {
            if(fruitObjArr[i].sweetRange == sweetRange
                && fruitObjArr[i].alcoholRange == alcoholRange) {
                    recommendSoju = fruitObjArr[i];
                }
            i++;
        }
        
        if(recommendSoju ==  null) return false;
        else {
            return recommendSoju;
        }
    }
    /* 로드 시 트렌지션 효과 */
    loadPageTransition();
    
    /* 기본 소주 종류 선택 시 서브 설문지 전환 */
    $("#kindOriginalButton").click(function(e) {
        console.log(e.target.id);
        resetSubContents();
        $("#kindOriginalSubSurvey").css("display", "block");
        $("#kindOriginalButton").css("color", "#ffffff");
    });
    /* 과일 소주 종류 선택 시 서브 설문지 전환 */
    $("#kindFruitButton").click(function(e) {
        resetSubContents();
        $("#kindFruitSubSurvey").css("display", "block");
        $("#kindFruitButton").css("color", "#ffffff");
    });

    /* 기본 소주 종류 추천 */
    $("#submitOriginalButton").click(function(e) {
        // 컨텐츠 로드 전 트렌지션
        loadMainSectionTransition(false);
        var recommendSoju = setRecommendOriginal($("#flavorRange").val(), $("#gulpRange").val(), $("#alcoholRange").val());
        
        $(".flavorText").html($($("#kindOriginalSubSurvey p")[parseInt($("#flavorRange").val())]).html());
        $(".gulpText").html($($("#kindOriginalSubSurvey p")[parseInt($("#gulpRange").val()) + 3]).html());
        $(".alcoholText").html($($("#kindOriginalSubSurvey p")[parseInt($("#alcoholRange").val()) + 6]).html());

        if(!recommendSoju) {
            setTimeout(function() {
                // 맞는 추천소주 없을 때 컨텐츠 표시
                $("#surveyContents").css("display", "none");
                
                $("#recommendContentsBox").css("display", "block");
                $("#recommendOriginalContents").css("display", "block");
                $("#noRecommendContents").css("display", "block");

                loadMainSectionTransition(true);
            }, 1000);

        }
        else {
            setTimeout(function() {
                // 맞는 추천소주 있을 때 컨텐츠 표시
                $("#surveyContents").css("display", "none");

                $("#sojuLogoImg").attr("src", "../../images/" + recommendSoju.sojuLogo + ".png");
                $("#sojuText").html(recommendSoju.sojuImgAlt);
                
                $("#recommendContentsBox").css("display", "block");
                $("#recommendOriginalContents").css("display", "block");
                $("#recommendContents").css("display", "block");
                
                loadMainSectionTransition(true);
            }, 500);
        }
    });

    /* 과일 소주 종류 추천 */
    $("#submitFruitButton").click(function(e) {
        // 컨텐츠 로드 전 트렌지션
        loadMainSectionTransition(false);
        var recommendSoju = setRecommendFruit($("#sweetRange").val(), $("#alcoholFruitRange").val());
        
        $(".sweetText").html($($("#kindFruitSubSurvey p")[parseInt($("#sweetRange").val())]).html());
        $(".alcoholFruitText").html($($("#kindFruitSubSurvey p")[parseInt($("#alcoholFruitRange").val()) + 3]).html());

        if(!recommendSoju) {
            setTimeout(function() {
                // 맞는 추천소주 없을 때 컨텐츠 표시
                $("#surveyContents").css("display", "none");
                
                $("#recommendContentsBox").css("display", "block");
                $("#recommendFruitContents").css("display", "block");
                $("#noRecommendContents").css("display", "block");

                loadMainSectionTransition(true);
            }, 1000);

        }
        else {
            setTimeout(function() {
                // 맞는 추천소주 있을 때 컨텐츠 표시
                $("#surveyContents").css("display", "none");
                
                $("#sojuLogoImg").attr("src", "../../images/" + recommendSoju.sojuLogo + ".png");
                $("#sojuText").html(recommendSoju.sojuImgAlt);

                $("#recommendContentsBox").css("display", "block");
                $("#recommendFruitContents").css("display", "block");
                $("#recommendContents").css("display", "block");
                
                loadMainSectionTransition(true);
            }, 1000);
        }
    });

    // 다시 추천받기 버튼 클릭시 다시 추천소주 창 열기
    $(".returnButton").click(function(e) {
        // 창 닫히기 전 트렌지션
        changePageTransition();

        setTimeout(function() {
            window.open("./recommendPage.html", "_self");
        }, 500);
    });
}