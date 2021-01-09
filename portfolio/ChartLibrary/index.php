<?php
$lastIndex = 1;

$conn = mysqli_connect("localhost", "st07", "c9st07", "st07");
if(!$conn) {
    echo "can not connect" . mysqli_error($conn);
    mysqli_close($conn);
    exit;
}

if(!mysqli_select_db($conn, 'st07')) {
    echo "can not select" . mysqli_error($conn);    
    mysqli_close($conn);
    exit;
}
$result = mysqli_query($conn, "SELECT `ID` FROM `CHART` ORDER BY `ID` DESC LIMIT 1");
if(!$result) {
    echo "can not query" . mysqli_error($conn);
    mysqli_free_result($result);
    mysqli_close($conn);
    exit;
}

if(mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $lastIndex = $row['ID'];
    $lastIndex++;
}

mysqli_free_result($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic+Coding&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">

    <link rel="stylesheet" href="./css/index.css">

    <script src="./script/chartLibrary.js"></script>
    <script src="./script/index.js"></script>
    <title>Chart Library</title>
</head>
<body>
    <div id="wrap">
        <header class="headerBox">
            <h1 class="headerTitle"><span>CHART</span> LIBRARY</h1>
        </header>
        <section class="sectionBox">
            <article class="inputArticle">
                <div class="inputBox">
                    <button id="testButton" class="testButton">SAVE DATA!</button>
                    <button id="savedDataButton" class="testButton" data-toggle="modal" data-target="#loadDataModal">LOAD DATA!</button>
                    
                    <!-- 차트 고유 아이디 -->
                    <label for="chartId" class="inputLabel">Chart ID</label>
                    <input class="chartId" type="number" id="chartId" value="<?=$lastIndex?>" max=<?=$lastIndex?> min=1 disabled>
                    
                    <!-- 차트 타입 Select -->
                    <label class="inputLabel" for="chartType">Chart Type</label>
                    <select class="chartTypeBox" name="chartType" id="chartType">
                        <option value="stick" selected>Stick</option>
                        <option value="horizon_stick">Horizon Stick</option>
                        <option value="circle">Circle</option>
                        <option value="doughnut">Doughnut</option>
                        <option value="pie">Pie</option>
                        <option value="line">Line</option>
                    </select>

                    <!-- 데이터 값 -->
                    <label class="inputLabel" for="dataBox">Data Insert<br><span>Name, Value, Color</span></label>
                    <div id="dataBox" class="dataBox">
                        <ul id="dataListBox" class="dataListBox">
                            <li class="dataList">
                                <input class="nameArr" type="text" placeholder="ex) gaHyeon" value="gaHyeon" required>
                                <input class="valueArr" type="text" placeholder="ex) 150" value="150" required>
                                <input class="form-control colorArr" type="color" placeholder="ex) f9e3af" required>

                                <div class="dataButtonBox">
                                    <i id="dataPlusButton" class="xi-plus-square-o"></i>
                                </div>
                            </li>
                        </ul>
                        
                    </div>
                    

                </div>
            </article>
            <article class="previewArticle">
                <div class="previewBox">
                    <canvas id="preview" width="700" height="550"></canvas>
                </div>
            </article>
            <article class="codeArticle">
                <div class="codeBox">
                    <pre class="codeTextBox"><code id="codeText" class='codeText'></code></pre>
                </div>
            </article>

        </section>
        <footer class="footerBox">
            <h5 class="footerTitle">From. Park Ga Hyeon</h5>
        </footer>

        <!-- The Modal -->
        <div class="modal" id="loadDataModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">INSERT YOUR DATA ID</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div id="modalBody" class="modal-body">
                        <input id="loadDataId" type="number" min='1'>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button id="loadDataButton" type="button" class="btn btn-primary" data-dismiss="modal">Load</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal" id="noDataModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">NO DATA!!</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>