var o_RGB = function(r, g, b) {
    this.r = r;
    this.g = g;
    this.b = b;
}
var o_Data = function(name, value, percent, color) {
    this.name = name,
    this.value = value,
    this.percent = percent,
    this.hexColor = color
}

var o_Chart = function(canvas, type, nameArr, valueArr, colorArr) {
    this.canvas = canvas,
    this.type = type,
    this.nameArr = nameArr;
    this.valueArr = valueArr;
    this.colorArr = colorArr;
    this.dataArr = getDataToObjArr(nameArr, valueArr, colorArr),

    this.drawChart = function() {
        switch(this.type) {
            case "stick" : this.drawStick(); break;
            case "horizon_stick" : this.drawHorizonStick(); break;
            case "circle" : this.drawCircle(); break;
            case "doughnut" : this.drawDoughnut(); break;
            case "pie" : this.drawPie(); break;
            case "line" : this.drawLine(); break;
            default : break;
        }
    }

    this.drawStick = function() {
        // setTimeout(function() {e.drawStick();}, 10);

        if(this.canvas.getContext) {
            let chartWidth = 650;
            let chartHeight = 450;
            let chartGap = 60;

            let maxValue = getMaxValue(this.valueArr);
            let ctx = this.canvas.getContext("2d");

            // 픽셀 정리
            ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
            // 컨텍스트 리셋
            ctx.beginPath();


            /* 기준 선 그리기 */
            ctx.lineWidth = 1;
            ctx.strokeStyle = "#333333";
            ctx.moveTo(50, 51);
            ctx.lineTo(50, chartHeight + 1);

            ctx.moveTo(50, 451);
            ctx.lineTo(chartWidth, chartHeight + 1);
            ctx.stroke();

            /* 그래프 그리기 */
            let i = 0;
            let height = 0;
            let width = 50;

            while(i < this.dataArr.length) {
                let percent = this.dataArr[i].value / maxValue;
                height = (chartHeight - 50) * percent;

                ctx.fillStyle = this.dataArr[i].hexColor;
                // ctx.fillRect(50 + ((i + 1) * width), 50 + (maxValue - height), 50 + ((i + 1) * width), maxValue - (50 + (maxValue - height)));
                ctx.fillRect((chartGap * (i + 1)), chartHeight - height, width, height);

                /* 데이터 이름 출력 */
                ctx.font = "bold 15px Arial";
                ctx.fillStyle = "#333333";
                ctx.textAlign = "center";
                ctx.fillText(this.dataArr[i].name, (chartGap * (i + 1)) + 25, chartHeight + 20);

                /* 데이터 퍼센트 출력 */
                ctx.font = "11px Arial";
                ctx.fillStyle = "#555555";
                ctx.textAlign = "center";
                ctx.fillText((percent * 100).toFixed(2) + "%", (chartGap * (i + 1)) + 25, chartHeight - 10);

                /* 데이터 값 출력 */
                ctx.font = "15px Arial";
                ctx.fillStyle = "#333333";
                ctx.textAlign = "center";
                ctx.fillText(this.dataArr[i].value, (chartGap * (i + 1)) + 25, chartHeight - height - 10);


                i++;
            }
        }
    }
    this.drawHorizonStick = function() {
        if(this.canvas.getContext) {
            let chartWidth = 650;
            let chartHeight = 450;
            let chartGap = 60;

            let maxValue = getMaxValue(this.valueArr);
            let ctx = this.canvas.getContext("2d");

            // 픽셀 정리
            ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
            // 컨텍스트 리셋
            ctx.beginPath();


            /* 기준 선 그리기 */
            ctx.lineWidth = 1;
            ctx.strokeStyle = "#333333";
            ctx.moveTo(49, 51);
            ctx.lineTo(49, chartHeight + 1);

            ctx.moveTo(49, 451);
            ctx.lineTo(chartWidth, chartHeight + 1);
            ctx.stroke();

            /* 그래프 그리기 */
            let i = 0;
            let height = 50;
            let width = 0;

            while(i < this.dataArr.length) {
                let percent = this.dataArr[i].value / maxValue;
                width = (chartWidth - 50) * percent;

                ctx.fillStyle = this.dataArr[i].hexColor;
                ctx.fillRect(50, chartHeight - (chartGap * (i + 1)), width, height);

                /* 데이터 이름 출력 */
                ctx.font = "bold 15px Arial";
                ctx.fillStyle = "#333333";
                ctx.textAlign = "center";
                ctx.fillText(this.dataArr[i].name, 100, chartHeight - (chartGap * (i + 1)) + (chartGap / 2) - 5);

                /* 데이터 퍼센트 출력 */
                ctx.font = "11px Arial";
                ctx.fillStyle = "#555555";
                ctx.textAlign = "center";
                ctx.fillText((percent * 100).toFixed(2) + "%", 100, chartHeight - (chartGap * (i + 1)) + (chartGap / 2) + 10);

                /* 데이터 값 출력 */
                ctx.font = "15px Arial";
                ctx.fillStyle = "#333333";
                ctx.textAlign = "center";

                ctx.setTransform(1, 0, 0, 1, 0, 0);
                ctx.translate(70 + width, chartHeight - (chartGap * (i + 1)) + (chartGap / 2));
                ctx.rotate(90 * Math.PI / 180);
                ctx.translate((70 + width) * -1, (chartHeight - (chartGap * (i + 1)) + (chartGap / 2)) * -1);
                ctx.fillText(this.dataArr[i].value, 70 + width, chartHeight - (chartGap * (i + 1)) + (chartGap / 2));
                ctx.setTransform(1, 0, 0, 1, 0, 0);
                
                i++;
            }
        }
    }

    this.drawCircle = function() {
        if(this.canvas.getContext) {
            let ctx = this.canvas.getContext("2d");

            // 픽셀 정리
            ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
            // 컨텍스트 리셋
            ctx.beginPath();

            let i = 0;
            let x = 0;
            let y = 0;
            let circleStart = 1.5;
            let circleEnd = 0;

            while(i < this.dataArr.length) {
                circleEnd = circleStart + ((this.dataArr[i].value * 2) / 100);
    
                /* 호 그리기 */
                ctx.beginPath();
                ctx.lineWidth = 35;
                ctx.strokeStyle = this.dataArr[i].hexColor;
                ctx.arc(120 + (x * 230), 150 + (y * 200), 80, circleStart * Math.PI, circleEnd * Math.PI);
                ctx.stroke();
    
                /* 정보 텍스트 */
                ctx.beginPath();
    
                ctx.font = "bold 15px Arial";
                ctx.fillStyle = "#333333";
                ctx.textAlign = "center";
                ctx.fillText(this.dataArr[i].name, 120 + (x * 230), 150 + (y * 200) - 2);
    
                ctx.font = "11px Arial";
                ctx.fillStyle = "#777777";
                ctx.textAlign = "center";
                ctx.fillText(Number(this.dataArr[i].value).toFixed(2) + "%", 120 + (x * 230), 150 + (y * 200) + 11);

                x++;
                i++;
            }

        }
    }

    this.drawDoughnut = function() {
        if(this.canvas.getContext) {
            let ctx = this.canvas.getContext("2d");

            // 픽셀 정리
            ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
            // 컨텍스트 리셋
            ctx.beginPath();

            let i = 0;
            let circleStart = 1.5;
            let circleEnd = 0;

            while(i < this.dataArr.length) {
                let textX = 0;
                let textY = 0;

                circleEnd = circleStart + ((this.dataArr[i].percent * 2) / 100);

                /* 호 그리기 */
                ctx.beginPath();
                ctx.lineWidth = 80;
                ctx.strokeStyle = this.dataArr[i].hexColor;
                ctx.arc(390, 280, 200, circleStart * Math.PI, circleEnd * Math.PI);
                ctx.stroke();

                /* 정보 텍스트 */
                ctx.beginPath();
                textX = 390 + (200 * Math.cos((circleStart - ((circleStart - circleEnd) / 2)) * Math.PI));
                textY = 280 + (200 * Math.sin((circleStart - ((circleStart - circleEnd) / 2)) * Math.PI));

                ctx.font = "bold 18px Arial";
                ctx.fillStyle = "#333333";
                ctx.textAlign = "center";
                ctx.fillText(this.dataArr[i].name, textX, textY - 5);

                ctx.font = "15px Arial";
                ctx.fillStyle = "#777777";
                ctx.textAlign = "center";
                ctx.fillText(this.dataArr[i].percent.toFixed(2) + "%", textX, textY + 15);

                circleStart = circleEnd;

                i++;
            }
        }
    }

    this.drawPie = function() {
        if(this.canvas.getContext) {
            let ctx = this.canvas.getContext("2d");

            // 픽셀 정리
            ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
            // 컨텍스트 리셋
            ctx.beginPath();

            let i = 0;
            let circleStart = 1.5;
            let circleEnd = 0;

            while(i < this.dataArr.length) {
                let textX = 0;
                let textY = 0;

                circleEnd = circleStart + ((this.dataArr[i].percent * 2) / 100);

                /* 파이 그리기 */
                ctx.beginPath();
                ctx.moveTo(390, 280);
                ctx.arc(390, 280, 200, circleStart * Math.PI, circleEnd * Math.PI);
                ctx.closePath();
                ctx.fillStyle = this.dataArr[i].hexColor;
                ctx.fill();

                /* 정보 텍스트 */
                ctx.beginPath();
                textX = 390 + (100 * Math.cos((circleStart - ((circleStart - circleEnd) / 2)) * Math.PI));
                textY = 280 + (100 * Math.sin((circleStart - ((circleStart - circleEnd) / 2)) * Math.PI));

                ctx.font = "bold 18px Arial";
                ctx.fillStyle = "#333333";
                ctx.textAlign = "center";
                ctx.fillText(this.dataArr[i].name, textX, textY - 5);

                ctx.font = "15px Arial";
                ctx.fillStyle = "#777777";
                ctx.textAlign = "center";
                ctx.fillText(this.dataArr[i].percent.toFixed(2) + "%", textX, textY + 15);

                circleStart = circleEnd;

                i++;
            }
        }
    }

    this.drawLine = function() {
        if(this.canvas.getContext) {
            let chartWidth = 650;
            let chartHeight = 450;
            let chartGap = 60;

            let maxValue = getMaxValue(this.valueArr);
            let ctx = this.canvas.getContext("2d");

            // 픽셀 정리
            ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
            // 컨텍스트 리셋
            ctx.beginPath();


            /* 기준 선 그리기 */
            ctx.lineWidth = 1;
            ctx.strokeStyle = "#333333";
            ctx.moveTo(50, 51);
            ctx.lineTo(50, chartHeight + 1);

            ctx.moveTo(50, 451);
            ctx.lineTo(chartWidth, chartHeight + 1);
            ctx.stroke();

            /* 그래프 그리기 */
            let i = 0;
            let height = 0;
            let beforeX = 0;
            let beforeY = 0;

            while(i < this.dataArr.length) {
                let percent = this.dataArr[i].value / maxValue;
                height = (chartHeight - 50) * percent;


                /* 위치 그리기 */
                ctx.beginPath();
                ctx.arc((chartGap * (i + 1)) + (chartGap / 2) - 5, chartHeight - height, 10, 0, 2 * Math.PI);
                ctx.fillStyle = this.dataArr[i].hexColor;
                ctx.fill();
                ctx.closePath();

                /* 선 그리기 */
                if(i != 0) {
                    ctx.globalCompositeOperation = "destination-over";

                    ctx.beginPath();
                    ctx.strokeStyle = "#555555";
                    ctx.lineWidth = 3;
                    ctx.moveTo(beforeX, beforeY);
                    ctx.lineTo((chartGap * (i + 1)) + (chartGap / 2) - 5, chartHeight - height);
                    ctx.stroke();

                    ctx.globalCompositeOperation = "source-over";
                    ctx.closePath();
                }

                /* 데이터 이름 출력 */
                ctx.font = "bold 15px Arial";
                ctx.fillStyle = "#333333";
                ctx.textAlign = "center";
                ctx.fillText(this.dataArr[i].name, (chartGap * (i + 1)) + 25, chartHeight + 20);

                /* 데이터 퍼센트 출력 */
                ctx.font = "11px Arial";
                ctx.fillStyle = "#555555";
                ctx.textAlign = "center";
                ctx.fillText((percent * 100).toFixed(2) + "%", (chartGap * (i + 1)) + 25, chartHeight - 10);

                /* 데이터 값 출력 */
                ctx.font = "15px Arial";
                ctx.fillStyle = "#555555";
                ctx.textAlign = "center";
                ctx.fillText(this.dataArr[i].value, (chartGap * (i + 1)) + 25, chartHeight - height - 15);

                beforeX = (chartGap * (i + 1)) + (chartGap / 2) - 5;
                beforeY = chartHeight - height;

                i++;
            }

            ctx.closePath();
        }
    }

}

function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
      r: parseInt(result[1], 16),
      g: parseInt(result[2], 16),
      b: parseInt(result[3], 16)
    } : null;
}

function getDataToObjArr(nameArr, valueArr, colorArr) {
    let i = 0;
    let objArr = [];
    let percentArr = getValueArrToPercentArr(valueArr);

    while(i < nameArr.length) {
        objArr.push(new o_Data(nameArr[i], valueArr[i], percentArr[i], colorArr[i]));
        i++;
    }

    return objArr;
}

function getValueArrToPercentArr(valueArr) {
    /* x = 100 / arrSum */

    let mulNum = 0;
    let percentArr = [];

    let i = 0;
    let sum = 0;
    while(i < valueArr.length) {
        sum += Number(valueArr[i]);
        i++;
    }

    mulNum = 100 / sum;

    i = 0;
    while(i < valueArr.length) {
        percentArr.push(mulNum * valueArr[i]);
        i++;
    }

    return percentArr;
}

function getMaxValue(valueArr) {
    let max = 0;
    let i = 0;

    while(i < valueArr.length) {
        if(max < Number(valueArr[i])) {
            max = Number(valueArr[i]);
        }

        i++;
    }

    return max;
}