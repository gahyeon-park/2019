/* 공통 자바스크립트 */


// 소주 객체
function sojuObj (id, sojuName, sojuLogo, sojuImgAlt, alcoholNum, capacityNum, featureString, imageURL, tvCF, posterCF){
    this.id = id;
    this.sojuName = sojuName;
    this.sojuImgAlt = sojuImgAlt;
    this.sojuLogo = sojuLogo;
    this.alcoholNum = alcoholNum;
    this.capacityNum = capacityNum;
    this.featureString = featureString;
    this.imageURL = imageURL;
    this.tvCF = tvCF;
    this.posterCF = posterCF;

    /* 현재 메뉴 설정 */
    this.setSojuDiscTitle = function() {
        $("#sojuDiscTitle").html("<p>" + this.sojuName + "</p>");
    }

    /* 소주 로고 설정 */
    this.setSojuLogo = function() {
        $("#sojuLogo").attr("src", "../../images/" + this.sojuLogo + ".png")
                      .attr("alt", sojuImgAlt);
    }

    /* 알코올, 용량, 특징 설정 */
    this.setSojuDetailDisc = function() {
        $("#sojuAlcoholDisc").html("알코올 함량 : " + this.alcoholNum + "%");
        $("#sojuCapacityDisc").html("용량 : " + this.capacityNum + "ml");
        $("#sojuFeatureDisc").html(this.featureString);
    }

    /* 실물사진 설정 */
    this.setSojuImage = function() {
        $("#realSojuImage").attr("src", "../../images/" + this.imageURL + ".png")
                           .attr("alt", this.sojuImgAlt);
    }

    /* 테레비광고 설정 */
    this.setSojuTVCF = function(buttonState, nowButton) {
        let i = 0;
        let indexNum = buttonState * $("#CFListBox li").length; //e ex) 4개씩 끊기
        let nowIndexNum = nowButton + indexNum;

        if(this.tvCF != null) {
            while($("#CFListBox li").length >= ++i) {
                if(indexNum < this.tvCF.length) {
                    $("#CFListImg" + i).attr("src", "http://file.hitejinro.com/hitejinro2016/upFiles/brand/KR/TVCF/" + this.tvCF[indexNum].CFImgSrc)
                                        .attr("alt", this.tvCF[indexNum].CFTitle);
                    $("#CFTitle" + i).html(this.tvCF[indexNum++].CFTitle);
                }
                else {
                    $("#CFListImg" + i).attr("src", "")
                                        .attr("alt", "");
                    $("#CFTitle" + i).html("");
                }
            }
            $("#tvCFContents iframe").attr("src", "https://player.vimeo.com/video/" + this.tvCF[nowIndexNum].CFUrl);
        }
        /* tvCF가 없을 경우 */
        else { 
            while($("#CFListBox li").length >= ++i) {
                $("#CFListImg" + i).attr("src", "")
                                            .attr("alt", "noContents");
                $("#CFTitle").html("");
            }
            $("#tvCFContents iframe").attr("src", "");
        }
    }

    /* 광고포스타 설정 */
    this.setSojuPoster = function(buttonState) {
        let i = 0;
        let indexNum = buttonState * $("#posterListBox li").length; //e ex) 4개씩 끊기
        
        if(this.posterCF != null) {
            while($("#posterListBox li").length >= ++i) {
                if(indexNum < this.posterCF.length) {
                    $("#posterListImg" + i).attr("src", "http://file.hitejinro.com/hitejinro2016/upFiles/brand/KR/PRINT/" + this.posterCF[indexNum].posterImgSrc)
                                        .attr("alt", this.posterCF[indexNum].posterTitle);
                    $("#posterTitle" + i).html(this.posterCF[indexNum++].posterTitle);
                }
                else {
                    $("#posterListImg" + i).attr("src", "")
                                        .attr("alt", "");
                    $("#posterTitle" + i).html("");

                }
            }
        }
        /* poster가 없을 경우 */
        else { 
            while($("#posterListBox li").length >= ++i) {
                $("#posterListImg" + i).attr("src", "")
                                            .attr("alt", "noContents");
                $("#posterTitle" + i).html("");
            }
        }
    }

};
// 기본 소주 특징 객체 (소주객체를 상속)
function originalSojuObj(id, sojuName, sojuLogo, sojuImgAlt, alcoholNum, capacityNum, featureString, imageURL, tvCF, posterCF, flavorRange, gulpRange, alcoholRange) {
    this.base = sojuObj;
    this.base(id, sojuName, sojuLogo, sojuImgAlt, alcoholNum, capacityNum, featureString, imageURL, tvCF, posterCF);

    this.flavorRange = flavorRange;
    this.gulpRange = gulpRange;
    this.alcoholRange = alcoholRange;
};
// 과일 소주 특징 객체 (소주객체를 상속)
function fruitSojuObj(id, sojuName, sojuLogo, sojuImgAlt, alcoholNum, capacityNum, featureString, imageURL, tvCF, posterCF, sweetRange, alcoholRange) {
    this.base = sojuObj;
    this.base(id, sojuName, sojuLogo, sojuImgAlt, alcoholNum, capacityNum, featureString, imageURL, tvCF, posterCF);
    
    this.sweetRange = sweetRange;
    this.alcoholRange = alcoholRange;
}

/* CF 객체 */
function CFObj(CFUrl, CFImgSrc, CFTitle) {
    this.CFUrl = CFUrl;
    this.CFImgSrc = CFImgSrc;
    this.CFTitle = CFTitle;
};
/* 광고 포스타 객체 */
function posterObj(posterImgSrc, posterTitle) {
    this.posterImgSrc = posterImgSrc;
    this.posterTitle = posterTitle;
};

/* 기본 소주 객체 설정 함수 */
function setSojuObject() {
    // 참이슬 후레쉬
    var chamFreshCFArr = [
        /* https://player.vimeo.com/video/ http://file.hitejinro.com/hitejinro2016/upFiles/brand/KR/TVCF/ */
        new CFObj("311576328", "20190116_37743817.jpg", "소주는 깨끗함이다"),
        new CFObj("265676479", "20180419_44166072.png", "ALL NEW 참이슬fresh"),
        new CFObj("179980520", "20160824_93406523.jpg", "참이슬fresh_대학생편"),
        new CFObj("173707908", "20160824_88873645.jpg", "참이슬fresh_직장인편"),
        new CFObj("173707932", "20160727_78972387.jpg", "참이슬 메이킹"),
        new CFObj("173707842", "20160727_21736330.jpg", "참이슬 메이킹"),
        new CFObj("173707812", "20160727_80369414.jpg", "싸이슬 쇼2013"),
        new CFObj("173707775", "20160801_36696725.jpg", "깨끗한 참이슬"),
        new CFObj("173707713", "20160727_21074437.jpg", "김건모 2011"),
        new CFObj("173707697", "20160727_67126141.jpg", "윤도현 2011"),
        new CFObj("173707694", "20160810_51586590.jpg", "정엽 2011"),
        new CFObj("173707657", "20160810_85440757.jpg", "드라마 편"),
        new CFObj("173707628", "20160810_29400989.jpg", "뮤직비디오 편"),
        new CFObj("173707623", "20160728_29935386.jpg", "정재용 편"),
        new CFObj("173707618", "20160728_91142797.jpg", "이하늘 편"),
        new CFObj("173707614", "20160728_94880861.jpg", "김창렬 편"),
        new CFObj("173707600", "20160810_64787816.jpg", "송배틀 편"),
        new CFObj("173707597", "20160810_86322376.jpg", "카툰 편"),
        new CFObj("173707594", "20160812_81006892.jpg", "변화 편"),
        new CFObj("173707593", "20160728_95630915.jpg", "라이프 서포터즈 편"),
        new CFObj("173707584", "20160728_84142743.jpg", "19.8도 이야기#1"),
        new CFObj("173707496", "20160728_16205188.jpg", "돈춘호 랩 편"),
        new CFObj("173707479", "20160728_70191462.jpg", "가위바위보 편"),
        new CFObj("173707470", "20160728_46088001.jpg", "위하여 편"),
        new CFObj("173707370", "20160728_71351130.jpg", "박철민 랩 편"),
        new CFObj("173707364", "20160728_91243166.jpg", "비트박스 편"),
        new CFObj("173707345", "20160728_41485950.jpg", "태진아 이루 편"),
        new CFObj("173707274", "20160810_14629125.jpg", "김아중 편"),
        new CFObj("173707256", "20160812_67136992.jpg", "뽀샵 효과 편"),
        new CFObj("173707248", "20160812_66785701.jpg", "귀신이 곡할 노릇 편"),
        new CFObj("173707242", "20160728_67721573.jpg", "CSI 참이슬 수사대 편"),
        new CFObj("173707234", "20160810_11915095.jpg", "크라잉넛 편"),
        new CFObj("173707229", "20160810_58625978.jpg", "뮤지컬 편")
    ];
    var chamFreshPosterArr = [
        /* http://file.hitejinro.com/hitejinro2016/upFiles/brand/KR/PRINT/ 2016까지만*/
        new posterObj("20190624_31192710.jpg", "이슬같이 깨끗한 다음날"),
        new posterObj("20190429_79413196.jpg", "이슬같이 깨끗한 다음날"),
        new posterObj("20190306_12625816.jpg", "소주는 깨끗함이다"),        
        new posterObj("20181226_99401532.jpg", "소주는 깨끗함이다"),        
        new posterObj("20181122_26120010.jpg", "소주는 이슬이다"),        
        new posterObj("20180413_32496150.jpg", "더 깨끗해진 참이슬"),        
        new posterObj("20180413_90118763.jpg", "더 깨끗해진 참이슬"),        
        new posterObj("20180315_62850967.jpg", "깨끗한 이슬먹자"),        
        new posterObj("20180123_64832576.jpg", "겨울아 이슬먹자"),        
        new posterObj("20171018_66513077.jpg", "가을이다 이슬먹자"),        
        new posterObj("20170831_16089900.jpg", "참이슬 fresh"),        
        new posterObj("20170831_24988826.jpg", "참이슬 fresh"),        
        new posterObj("20170711_46578995.jpg", "참이슬 fresh"),        
        new posterObj("20170711_44414281.jpg", "참이슬 fresh"),        
        new posterObj("20170522_68152888.jpg", "참이슬 제주"),        
        new posterObj("20170308_90319501.jpg", "참이슬 fresh"),        
        new posterObj("20170202_36337296.jpg", "참이슬 fresh"),        
        new posterObj("20161108_23378854.jpg", "크리스마스 에디션"),        
        new posterObj("20161011_18357695.jpg", "참이슬 fresh"),        
        new posterObj("20160830_35358020.jpg", "참이슬 fresh"),        
        new posterObj("20160721_93340063.jpg", "참이슬 fresh"),        

        
    ]

    // 참이슬 오리지널
    var chamOriginalPosterArr = [
        new posterObj("20170919_83898602.jpg", "참이슬 오리지널"),
        new posterObj("20160722_53961536.jpg", "참이슬 클래식"),
        new posterObj("20160722_68877172.jpg", "참이슬 클래식"),
        new posterObj("20160722_94870011.jpg", "참이슬 클래식"),
        new posterObj("20170207_27156252.jpg", "참이슬 클래식-소주다운 소주")
    ];

    // 참이슬 16.9도
    var chamLightPosterArr = [
        new posterObj("20190306_31104548.jpg", "소주는 깨끗함이다"),
        new posterObj("20181226_44817113.jpg", "소주는 깨끗함이다"),
        new posterObj("20181122_56567059.jpg", "소주는 이슬이다"),
        new posterObj("20180413_27489911.jpg", "더 깨끗해진 참이슬"),
        new posterObj("20180413_11512263.jpg", "더 깨끗해진 참이슬"),
        new posterObj("20170103_66449329.jpg", "참이슬 16.9"),
        new posterObj("20170103_60725588.jpg", "참이슬 16.9"),
        new posterObj("20160830_45834366.jpg", "참이슬 16.9"),
        new posterObj("20160722_52503474.jpg", "참이슬 16.9"),
        new posterObj("20160722_40944772.jpg", "참이슬 16.9")
    ];

    // 진로 이즈백
    var jinroIsBackCFArr = [
        new CFObj("342162462", "20190515_93699492.jpg", "주점 편"),
        new CFObj("336279081", "20190515_23865779.jpg", "돌아온 진로 편")
    ];
    var jinroIsBackPosterArr = [
        new posterObj("20190614_19692330.jpg", "진로")
    ];

    // 참나무통 맑은 이슬
    var chamNamuCFArr = [
        new CFObj("260379513", "20180316_21698352.jpg", "참나무통 맑은이슬"),
        new CFObj("246372399", "20171221_24137046.jpg", "참나무통 맑은이슬")
    ];
    var chamNamuPosterArr = [
        new posterObj("20190417_25473038.jpg", "오크통 3년 숙성"),
        new posterObj("20190417_38092395.jpg", "오크통 3년 숙성"),
        new posterObj("20171213_89292754.jpg", "참나무통 맑은이슬")
    ];

    // 일품진로1924
    var jinro1924PosterArr = [
        new posterObj("20180612_31131675.jpg","일품진로 1924"),
        new posterObj("20161222_88261938.jpg","일품진로"),
        new posterObj("20160722_11208444.jpg","일품진로"),
        new posterObj("20160722_53831328.jpg","일품진로"),
        new posterObj("20160722_48136069.jpg","일품진로"),
        new posterObj("20160722_45192819.jpg","일품진로")
    ];

    sojuObjArr[0] = new originalSojuObj("originalMenu5", "참이슬<br>후레쉬",        "originalPage/chamFreshLogo", "참이슬 후레쉬", "17.0", 360, "청정지역의 선별된 대나무 숯으로 4번 걸러 깨끗한 목넘김과 이슬형태의 라벨로 트렌디한 맛", "originalPage/chamFreshImage", chamFreshCFArr, chamFreshPosterArr, 1, 1, 0);
    sojuObjArr[1] = new originalSojuObj("originalMenu4", "참이슬<br>오리지널",      "originalPage/chamOriginalLogo", "참이슬 오리지널", "20.1", 360, "한국 정통소주로서 대나무 숯으로 숙취 유발 물질을 깨끗하게 제거한 깊고 진한 맛", "originalPage/chamOriginalImage", null , chamOriginalPosterArr, 1, 1, 1);
    sojuObjArr[2] = new originalSojuObj("originalMenu3", "참이슬<br>16.9도",        "originalPage/chamLightLogo", "참이슬 16.9도", "16.9", 360, "청정지역의 선별된 대나무 숯으로 깨끗한 맛과 라이트 유저의 입맛에 맞춘 깔끔한 목넘김", "originalPage/chamLightImage", null, chamLightPosterArr, 0, 0, 0);
    sojuObjArr[3] = new originalSojuObj("originalMenu2", "진로<br>이즈백",          "originalPage/jinroIsBackLogo", "진로 이즈백", "16.9", 360, "편한 음용감을 즐기는 20대를 위한 16.9도의 순한 맛과 부드러운 목넘김, 마실수록 깔끔한 맛", "originalPage/jinroIsBackImage", jinroIsBackCFArr, jinroIsBackPosterArr, 0, 1, 0);
    sojuObjArr[4] = new originalSojuObj("originalMenu1", "참나무통<br>맑은이슬",    "originalPage/chamNamuLogo", "참나무통 맑은이슬", "16.0", 300, "참나무통의 숙성원액과 쌀증류원액 블렌딩으로 깨끗한 맛은 살려내고 은은한 맛", "originalPage/chamNamuImage", chamNamuCFArr, chamNamuPosterArr, 2, 2, 0);
    sojuObjArr[5] = new originalSojuObj("originalMenu8", "일품진로<br>1924",        "originalPage/jinro1924Logo", "일품진로 1924", "25.0", 375, "향과 풍미가 뛰어난 증류원액을 냉동여과공법으로 잡미와 불순물을 제거한 은은한 맛의 여운과 깊은 풍미", "originalPage/jinro1924Image", null, jinro1924PosterArr, 2, 2, 1);
    sojuObjArr[6] = new originalSojuObj("originalMenu7", "일품진로<br>18년산",      "originalPage/jinro18Logo", "일품진로 18년산", "31.0", 375, "순쌀 원액 중 가장 풍미가 뛰어난 중간층 원액만을 참나무통에 담아 18년 숙성시킨 깊은 풍미", "originalPage/jinro18Image", null, null, 2, 2, 2);
    sojuObjArr[7] = new originalSojuObj("originalMenu6", "진로<br>골드",            "originalPage/jinroGoldLogo", "진로 골드", "25.0", 360, "90여년 노하우로 블렌딩한 정통 소주이며, 초정밀 여과처리로 깨끗한 맛", "originalPage/jinroGoldImage", null, null, 2, 1, 1);
    
    console.log(sojuObjArr);
}
/* 과일 소주 객체 설정 함수 */
function setFruitObject() {
    // 이슬톡톡
    var toktokCFArr = [
        new CFObj("222634371", "20170622_54345379.jpg", "이슬톡톡"),
        new CFObj("173719661", "20160801_50882652.jpg", "이슬톡톡")
    ];
    var toktokPosterArr = [
        new posterObj("20161226_78602107.jpg", "이슬톡톡 파인애플"),
        new posterObj("20170103_66283856.jpg", "이슬톡톡 복숭아")
    ];

    // 자몽에 이슬
    var jamongPosterArr = [
        new posterObj("20170103_21833986.jpg", "자몽에이슬"),
        new posterObj("20180123_97158151.png", "자몽에이슬")
    ];

    // 청포도에 이슬
    var grapePosterArr = [
        new posterObj("20170103_36710288.jpg", "청포도에이슬"),
        new posterObj("20170103_65658585.jpg", "청포도에이슬")
    ];

    // 자두에이슬
    var pupplePosterArr = [
        new posterObj("20181018_58354711.jpg", "자두에이슬"),
        new posterObj("20181018_39344294.jpg", "자두에이슬"),
        new posterObj("20181015_83177031.jpg", "자두에이슬")
    ];

    // 매화수
    var mehuaCFArr = [
        new CFObj("173719458", "20160729_91049210.jpg", "매화수_옥탑방 편"),
        new CFObj("173719530", "20160810_33296388.jpg", "그녀들의 sweet time 매화수"),
        new CFObj("173719611", "20160810_78809626.jpg", "윤다훈 편")
    ];
    var mehuaPosterArr = [
        new posterObj("20160722_43399741.jpg", "매화수"),
        new posterObj("20160722_69180991.jpg", "매화수"),
        new posterObj("20160722_30648819.jpg", "매화수"),
        new posterObj("20160722_84348906.jpg", "매화수"),
        new posterObj("20160722_36768611.jpg", "매화수2012"),
        new posterObj("20160722_15978680.jpg", "매화수2012"),
        new posterObj("20160722_22170358.jpg", "매화수2012"),
        new posterObj("20160722_24381187.jpg", "달콤함이 화사하게 피어나다"),
        new posterObj("20160722_12320640.jpg", "너와있는시간이 가장 달콤해"),
        new posterObj("20160722_58764325.jpg", "매화수 2010 가을원고"),
        new posterObj("20160722_33270618.jpg", "매화수 2010"),
        new posterObj("20160722_49849123.jpg", "매화수 2009"),
        new posterObj("20160722_27422094.jpg", "매화수 2009"),
        new posterObj("20160713_62413035.jpg", "매화수 2009"),
        new posterObj("20160722_20866918.jpg", "매화수 2009"),
        new posterObj("20160722_15564997.jpg", "매화수 2009"),
        new posterObj("20160722_13073407.jpg", "매화수 2008"),
        new posterObj("20160722_87623103.jpg", "매화수 2007"),
        new posterObj("20160722_80005915.jpg", "매화수 2002"),
        new posterObj("20160722_82143502.jpg", "매화수 2002")
    ];

    fruitObjArr[0] = new fruitSojuObj("fruitMenu5", "이슬<br>톡톡",       "fruitPage/toktokLogo", "이슬톡톡", "3.0", 330, "톡톡 튀는 탄산을 타고 입안 가득 산뜻하게 퍼지는 새콤달콤한 맛", "fruitPage/toktokImage", toktokCFArr, toktokPosterArr, 1, 0);
    fruitObjArr[1] = new fruitSojuObj("fruitMenu4", "자몽에<br>이슬",     "fruitPage/jamongLogo", "자몽에이슬", "13.0", 360, "여성들이 사랑하는 대표 과일 자몽과 한국 대표 소주 참이슬이 만나 상큼하고 청량한 맛", "fruitPage/jamongImage", null, jamongPosterArr, 1, 1);
    fruitObjArr[2] = new fruitSojuObj("fruitMenu3", "청포도에<br>이슬",   "fruitPage/grapeLogo", "청포도에이슬", "13.0", 360, "달콤한 청포도가 깨끗한 이슬을 만나, 달콤함과 청량감이 한층 업그레이드된 맛", "fruitPage/grapeImage", null, grapePosterArr, 2, 1);
    fruitObjArr[3] = new fruitSojuObj("fruitMenu2", "자두에<br>이슬",     "fruitPage/puppleLogo", "자두에이슬", "13.0", 360, "비타민C와 식이섬유가 풍부하게 함유된 자두의 싱그럽고 상큼한 맛", "fruitPage/puppleImage", null, pupplePosterArr, 0, 1);
    fruitObjArr[4] = new fruitSojuObj("fruitMenu1", "매화수",             "fruitPage/mehuaLogo", "매화수", "14.0", 300, "젊은층이 선호하는 감각적이고 세련된 디자인과 저온냉동여과공법을 사용한 부드럽고 깨끗한 맛", "fruitPage/mehuaImage", mehuaCFArr, mehuaPosterArr, 1, 2);
}

/* 페이지 전환시 트렌지션 효과 */
function changePageTransition() {
    $("#mainTitleButton").css("top", "-70px").css("right", "-670px");
    $(".subTitle").css("top", "400px").css("right", "1900px");
    $(".nowTitle").css("left", "-500px");
    $(".sojuImage").css("margin-left", "-800px");
    $(".mainSection").css("left", "2000px");
}

/* 페이지 로드시 트렌지션 효과 */
function loadPageTransition() {
    $("#mainTitleButton").css("top", "70px").css("right", "20px");
    $(".subTitle").css("top", "210px").css("right", "650px");
    $(".nowTitle").css("left", "175px");
    $(".sojuImage").css("margin-left", "-200px");
    $(".mainSection").css("left", "715px"); 
}

/* 메뉴 색상 원래대로 전환 함수 */
function resetMenuColor(idText) {
    $("#" + idText).removeClass("menuSelected");
}
/* 메뉴 색상 전환 함수 */
function changeMenuColor(idText) {
    $("#" + idText).addClass("menuSelected");
}

/* 컨텐츠 현재 위치 색상 리셋 함수 */
function resetNowContentsColor(idText) {
    $("#" + idText).removeClass("CFSelected");
}
/* 컨텐츠 현재 위치 색상 전환 함수 */
function changeNowContentsColor(idText) {
    $("#" + idText).addClass("CFSelected");
}

/* 소주 메뉴 클릭 시 컨텐츠 전환 함수 */
function setSojuContents(idText) {
    for(i = 0; i < sojuObjArr.length; i++) {
        if(idText == sojuObjArr[i].id) {
            sojuObjArr[i].setSojuDiscTitle();
            sojuObjArr[i].setSojuLogo();
            sojuObjArr[i].setSojuDetailDisc();
            sojuObjArr[i].setSojuImage();
            sojuObjArr[i].setSojuTVCF(0, 0);
            sojuObjArr[i].setSojuPoster(0);

            nowMenuId = idText;
            break;
        }
    }
}

/* 과일 소주 메뉴 클릭시 컨텐츠 전환 함수 */
function setFruitContents(idText) {
    for(i = 0; i < fruitObjArr.length; i++) {
        if(idText == fruitObjArr[i].id) {
            fruitObjArr[i].setSojuDiscTitle();
            fruitObjArr[i].setSojuLogo();
            fruitObjArr[i].setSojuDetailDisc();
            fruitObjArr[i].setSojuImage();
            fruitObjArr[i].setSojuTVCF(0, 0);
            fruitObjArr[i].setSojuPoster(0);

            nowMenuId = idText;
            break;
        }
    }
}

/* 부가적인 소주 메뉴 클릭시 컨텐츠 전환 함수 */
function popUpBox(idText) {
    if($("#subMenuPopUp").css("display") == "none") {
        $("#subMenuPopUp").css("display", "block");

        /* 클릭 대상에 따라 팝업 컨텐츠 변화 */
        switch(idText) {
            case "subMenu1" :
                if($("#realImageContents realSojuImage").attr("src") != "") {
                    $("#realImageContents").css("display", "inline-block");
                }
                else { $("#noContents").css("display", "inline-block"); }
            break;
            case "subMenu2" :
                if($("#tvCFContents iframe").attr("src") != "" ) {
                    $("#tvCFContents").css("display", "inline-block");
                }
                else { $("#noContents").css("display", "inline-block"); }
            break;
            case  "subMenu3" :
                if($("#posterContents #posterListImg1").attr("src") != "" ) {
                    $("#posterContents").css("display", "inline-block");
                }
                else { $("#noContents").css("display", "inline-block"); }
            break;
        }
    }
    else {
        if(idText == "subMenuPopUp" || idText == "popUpBox") {
            /* 모두 display: none; 으로 초기화 */
            $("#subMenuPopUp").css("display", "none");
            $("#realImageContents").css("display", "none");
            $("#tvCFContents").css("display", "none");
            $("#posterContents").css("display", "none");
            $("#noContents").css("display", "none");
        }
    }

}

/* 전역 변수 및 함수 사용 */
var sojuObjArr = [];    // 소주 객체 배열
setSojuObject();

var fruitObjArr = [];   // 과일 소주 객체 배열

setFruitObject();

// 가니포차 제목 클릭 시 메뉴화면 전환
$("#mainTitleButton").click(function(e) {
    /* 이동 시 트렌지션 효과 */
    changePageTransition();

    setTimeout(function() {
        window.open("../../html/menuPage/menuPage.html", "_self");
    }, 500);
});
