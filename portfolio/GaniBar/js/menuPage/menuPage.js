window.onload = function() {
    /* 로드 시 트렌지션 효과 */
    loadPageTransition();
    
    /* 메뉴 클릭 시 페이지 이동 */
    
        // 기본 소주 메뉴 클릭
        $("#originalMenu").click(function() {
            /* 이동 시 트렌지션 효과 */
            changePageTransition();
        
            setTimeout(function() {
                window.open("../../html/originalPage/originalPage.html","_self");
            }, 500);
        });

        // 과일 소주 메뉴 클릭
        $("#fruitMenu").click(function() {
            /* 이동 시 트렌지션 효과 */
            changePageTransition();
        
            setTimeout(function() {
                window.open("../../html/fruitPage/fruitPage.html","_self");
            }, 500);
        });

        // 추천 소주 메뉴 클릭
        $("#recommendMenu").click(function() {
            /* 이동 시 트렌지션 효과 */
            changePageTransition();
        
            setTimeout(function() {
                window.open("../../html/recommendPage/recommendPage.html","_self");
            }, 500);
        });

}