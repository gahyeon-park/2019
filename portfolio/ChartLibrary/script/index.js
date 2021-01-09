window.onload = function() {
    /* 데이터 입력 칸 추가 */
    function addDataList() {
        /* 마지막 자식 선택해서 버튼 없애기 */
        $("#dataListBox li:last .dataButtonBox i:first").remove();
        $("#dataListBox li:last .dataButtonBox").append(`<i class="xi-close-square dataDelButton"></i>`);
        
        let appendHTML = `
        <li class="dataList">
            <input class="nameArr" type="text" placeholder="ex) gaHyeon" required>
            <input class="valueArr" type="text" placeholder="ex) 150" required>
            <input class="form-control colorArr" type="color" placeholder="ex) f9e3af" required>

            <div class="dataButtonBox">
                <i id="dataPlusButton" class="xi-plus-square-o"></i>
            </div>
        </li>        
    `;

        $("#dataListBox").append(appendHTML);
    }

    /* 데이터 입력 칸 삭제 */
    function delDataList(delTarget) {
        delTarget.parent().parent().remove();
    }

    /* input 값 다 채워졌는지 */
    function isInputEmpty() {
        let isEmpty = false;
        let i = 0;

        while(i < $("#dataListBox .dataList input").length) {
            if($($("#dataListBox .dataList input")[i]).val() == "") isEmpty = true;
            i++;
        }

        return isEmpty;
    }

    /* 이름 배열 가져오기 */
    function getNameArr() {
        let nameArr = [];
        let i = 0;
        
        while(i < $(".nameArr").length) {
            nameArr.push($($(".nameArr")[i]).val());

            i++;
        }
        
        return nameArr;
    }

    /* 값 배열 가져오기 */
    function getValueArr() {
        let valueArr = [];
        let i = 0;
        
        while(i < $(".valueArr").length) {
            valueArr.push($($(".valueArr")[i]).val());

            i++;
        }
        
        return valueArr;
    }

    /* 색상 배열 가져오기 */
    function getColorArr() {
        let colorArr = [];
        let i = 0;
        
        while(i < $(".colorArr").length) {
            colorArr.push($($(".colorArr")[i]).val());
            i++;
        }
        
        return colorArr;
    }

    /* 데이터 json 파일로 저장 */
    function storeData(type, nameArrary, valueArray, colorArray) {
        $.ajax({
            url:"./php/storeData.php",
            dataType: 'json',
            type: 'POST',
            data: { 
                'chartType':type,
                'nameArr':nameArrary,
                'valueArr':valueArray,
                'colorArr':colorArray
            },
            success: function(result) {
                console.log(result);
            }
        });


    }

    
    /* json파일에서 데이터 가져오기 */
    function getData() {
        var returnObj = null;

        $.ajax({
            url:"./php/getData.php",
            dataType: 'text',
            type: 'POST',
            async: false,
            data: { 
                'msg' : true
            },
            success: function(result) {
                returnObj = JSON.parse(result);
            }
        });

        return returnObj;
    }
    function getDataBase(dataIndex) {
        var returnObj = null;

        $.ajax({
            url:"./php/getDataBase.php",
            dataType: 'json',
            type: 'POST',
            async: false,
            data: { 
                'index' : dataIndex
            },
            success: function(result) {
                returnObj = result;
            }
        });

        return returnObj;
    }

    function chartRender(dataObj) {
        if(!isInputEmpty()) {
            /* chartType */
            /*
                1 : Strick
                2 : Circle
                3 : Pie
                4 : Line
            */
            let canvas = document.getElementById("preview");

            let chartObj = new o_Chart(canvas, dataObj.chartType, dataObj.nameArr, dataObj.valueArr, dataObj.colorArr);
            chartObj.drawChart();          
            
            let codeHTML = "";
            let nameArrString  = "";
            let valueArrString = "";
            let colorArrString = "";
            let i = 0;
            while(i < dataObj.nameArr.length) {
                nameArrString += `<span class="yellow">"` + dataObj.nameArr[i] + '"</span>';
                valueArrString += `<span class="yellow">"` + dataObj.valueArr[i] + `"</span>`;
                colorArrString += `<span class="yellow">"` + dataObj.colorArr[i] + `"</span>`;

                if(i < dataObj.nameArr.length - 1) {
                    nameArrString += ', ';
                    valueArrString += ', ';
                    colorArrString += ', ';
                }

                i++;
            }
            /* 코드 출력 */
            switch(dataObj.chartType) {
                case "stick" :
                    codeHTML = `
        <span class='blue'>var</span> canvas <span class='pink'>=</span> document.<span class='green'>getElementById</span><span class='purple'>(</span><span class='yellow'>"preview"</span><span class='purple'>)</span>;
        <span class='blue'>var</span> chartObj <span class='pink'>= new</span> <span class='green'>o_Chart</span><span class='purple'>(</span>
            canvas,    <span class='gray'>// Canvas Id Object</span>
            <span class='yellow'>"stick"</span>,    <span class='gray'>// Chart Type : Stick</span>
            <span class='blue'>[</span>${nameArrString}<span class='blue'>]</span>, <span class='gray'>// Name Array</span>
            <span class='blue'>[</span>${valueArrString}<span class='blue'>]</span>,    <span class='gray'>// Value Array</span>
            <span class='blue'>[</span>${colorArrString}<span class='blue'>]</span>   <span class='gray'>// Color Array</span>
            <span class='purple'>)</span>;
            
        chartObj.<span class='green'>drawChart</span><span class='purple'>()</purple>;   <span class='gray'>// Draw Chart</span>
                    `;

                    $("#codeText").html(codeHTML);
                break;
                case "horizon_stick" :
                    codeHTML = `
        <span class='blue'>var</span> canvas <span class='pink'>=</span> document.<span class='green'>getElementById</span><span class='purple'>(</span><span class='yellow'>"preview"</span><span class='purple'>)</span>;
        <span class='blue'>var</span> chartObj <span class='pink'>= new</span> <span class='green'>o_Chart</span><span class='purple'>(</span>
            canvas,    <span class='gray'>// Canvas Id Object</span>
            <span class='yellow'>"horizon_stick"</span>,    <span class='gray'>// Chart Type : Horizon Stick</span>
            <span class='blue'>[</span>${nameArrString}<span class='blue'>]</span>, <span class='gray'>// Name Array</span>
            <span class='blue'>[</span>${valueArrString}<span class='blue'>]</span>,    <span class='gray'>// Value Array</span>
            <span class='blue'>[</span>${colorArrString}<span class='blue'>]</span>   <span class='gray'>// Color Array</span>
            <span class='purple'>)</span>;
            
        chartObj.<span class='green'>drawChart</span><span class='purple'>()</purple>;   <span class='gray'>// Draw Chart</span>
                    `;
                
                    $("#codeText").html(codeHTML);
                
                break;
                case "circle" :
                    codeHTML = `
        <span class='gray'>// Only One Data</span>
        <span class='gray'>// Value is 0 to 100 (percent)</span>
                 
        <span class='blue'>var</span> canvas <span class='pink'>=</span> document.<span class='green'>getElementById</span><span class='purple'>(</span><span class='yellow'>"preview"</span><span class='purple'>)</span>;
        <span class='blue'>var</span> chartObj <span class='pink'>= new</span> <span class='green'>o_Chart</span><span class='purple'>(</span>
            canvas,    <span class='gray'>// Canvas Id Object</span>
            <span class='yellow'>"circle"</span>,    <span class='gray'>// Chart Type : Circle</span>
            <span class='blue'>[</span>${nameArrString}<span class='blue'>]</span>, <span class='gray'>// Name Array</span>
            <span class='blue'>[</span>${valueArrString}<span class='blue'>]</span>,    <span class='gray'>// Value Array</span>
            <span class='blue'>[</span>${colorArrString}<span class='blue'>]</span>   <span class='gray'>// Color Array</span>
            <span class='purple'>)</span>;
            
        chartObj.<span class='green'>drawChart</span><span class='purple'>()</purple>;   <span class='gray'>// Draw Chart</span>
                    `;

                    $("#codeText").html(codeHTML);
                break;
                case "doughnut" :
                    codeHTML = `   
        <span class='blue'>var</span> canvas <span class='pink'>=</span> document.<span class='green'>getElementById</span><span class='purple'>(</span><span class='yellow'>"preview"</span><span class='purple'>)</span>;
        <span class='blue'>var</span> chartObj <span class='pink'>= new</span> <span class='green'>o_Chart</span><span class='purple'>(</span>
            canvas,    <span class='gray'>// Canvas Id Object</span>
            <span class='yellow'>"doughnut"</span>,    <span class='gray'>// Chart Type : Doughnut</span>
            <span class='blue'>[</span>${nameArrString}<span class='blue'>]</span>, <span class='gray'>// Name Array</span>
            <span class='blue'>[</span>${valueArrString}<span class='blue'>]</span>,    <span class='gray'>// Value Array</span>
            <span class='blue'>[</span>${colorArrString}<span class='blue'>]</span>   <span class='gray'>// Color Array</span>
            <span class='purple'>)</span>;
            
        chartObj.<span class='green'>drawChart</span><span class='purple'>()</purple>;   <span class='gray'>// Draw Chart</span>
                    `;

                    $("#codeText").html(codeHTML);
                break;
                case "pie" :
                    codeHTML = `
        <span class='blue'>var</span> canvas <span class='pink'>=</span> document.<span class='green'>getElementById</span><span class='purple'>(</span><span class='yellow'>"preview"</span><span class='purple'>)</span>;
        <span class='blue'>var</span> chartObj <span class='pink'>= new</span> <span class='green'>o_Chart</span><span class='purple'>(</span>
            canvas,    <span class='gray'>// Canvas Id Object</span>
            <span class='yellow'>"pie"</span>,    <span class='gray'>// Chart Type : Pie</span>
            <span class='blue'>[</span>${nameArrString}<span class='blue'>]</span>, <span class='gray'>// Name Array</span>
            <span class='blue'>[</span>${valueArrString}<span class='blue'>]</span>,    <span class='gray'>// Value Array</span>
            <span class='blue'>[</span>${colorArrString}<span class='blue'>]</span>   <span class='gray'>// Color Array</span>
            <span class='purple'>)</span>;
            
        chartObj.<span class='green'>drawChart</span><span class='purple'>()</purple>;   <span class='gray'>// Draw Chart</span>
                    `;
                
                    $("#codeText").html(codeHTML);
                break;
                case "line" : 
                    codeHTML = `
        <span class='blue'>var</span> canvas <span class='pink'>=</span> document.<span class='green'>getElementById</span><span class='purple'>(</span><span class='yellow'>"preview"</span><span class='purple'>)</span>;
        <span class='blue'>var</span> chartObj <span class='pink'>= new</span> <span class='green'>o_Chart</span><span class='purple'>(</span>
            canvas,    <span class='gray'>// Canvas Id Object</span>
            <span class='yellow'>"line"</span>,    <span class='gray'>// Chart Type : Line</span>
            <span class='blue'>[</span>${nameArrString}<span class='blue'>]</span>, <span class='gray'>// Name Array</span>
            <span class='blue'>[</span>${valueArrString}<span class='blue'>]</span>,    <span class='gray'>// Value Array</span>
            <span class='blue'>[</span>${colorArrString}<span class='blue'>]</span>   <span class='gray'>// Color Array</span>
            <span class='purple'>)</span>;
            
        chartObj.<span class='green'>drawChart</span><span class='purple'>()</purple>;   <span class='gray'>// Draw Chart</span>
                    `;
        
                    $("#codeText").html(codeHTML);
                break;

                default : break;
            }
        }
        else {
            console.log("Empty");
        }
    }
    /* ================================================================================ */

    $(document).on("click", "#dataPlusButton", function(e) { addDataList(); })
    $(document).on("click", ".dataDelButton", function(e) { delDataList($(e.target)); })

    $(document).on("click", "#testButton", function(e) { 
        /* 새로운 데이터 저장 */
        console.log("newData");
        let nameArr = getNameArr();
        let valueArr = getValueArr();
        let colorArr = getColorArr();

        // json 파일로 데이터 저장
        console.log($("#chartType").val());
        storeData($("#chartType").val(), nameArr, valueArr, colorArr);

        // // json 파일에서 데이터 불러오기
        // let dataObj = getData();
        // chartRender(dataObj);
        // console.log(dataObj);
        // 그리기
        //dataObj.chartType, dataObj.nameArr, dataObj.valueArr, dataObj.colorArr
        chartRender({
            'chartType': $("#chartType").val(),
            'nameArr': nameArr,
            'valueArr': valueArr,
            'colorArr': colorArr
        });
        // 인덱스 증가
        var nowIndex = $("#chartId").attr("max");
        nowIndex++;
        $("#chartId").attr("max", nowIndex);
        $("#chartId").val(nowIndex);

        
    });

    
    $(document).on("click", "#savedDataButton", function(e) { 
        // /* 저장되어 있는 데이터 불러오기 */
        // var dataIndex = Number(prompt("숫자"));

        // if(dataIndex < Number($("#chartId").val())) {
        //     chartRender(getDataBase(dataIndex));
        // }
        // else {
        //     alert("저장된 데이터가 없습니다.");
        // }

    });

    $(document).on("click", "#loadDataButton", function(e) {
        /* 저장되어 있는 데이터 불러오기 */
        var dataIndex = Number($("#loadDataId").val());

        if(dataIndex < Number($("#chartId").val())) {
            chartRender(getDataBase(dataIndex));
        }

        else {
            $("#noDataModal").modal();
        }
    });

    
}