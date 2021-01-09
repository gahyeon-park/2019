<?php
    /* 생년월일 성인검사 */
        $birthString = $_POST['yearText'] . " " . $_POST['monthText'] . " " . $_POST['dateText'];

        // 생년 월 일 합친 문자열 성인 검사
        if(preg_match('/((?:1\d\d\d)\s((0\d)|([1][0-2]))\s((0\d)|(([1-2][0-9]|[3][0-1]))))|((?:2[0][0][0])\s((0[1-5]\s((0[1-9])|([1-2][0-9]|[3][0-1])))|(0[6]\s((0[1-9])|([1][0-9]|[2][0-3])))))/', $birthString)){
            
            
            echo "<script language='javascript'>\n";
            echo "alert('잘못된 생년월일 양식이거나 미성년자 입니다.');";
            echo "</script>\n";
            include "../../index.html";
        }
?>