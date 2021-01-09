<?php
include('./php/common.php');

// 파일 데이터 베이스 헨들러
openDB($fileConn);

// 파일 상세 정보 데이터베이스 핸들러
openDB($discConn);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="./css/index/index.css">
        <script src="./script/chartLibrary.js"></script>
        <script src="./script/index.js"></script>

        <title>GANI BLOG</title>
    </head>
    <body>
        <div id="wrap" class="container-fluid">

            <div class="row backgroundImgBox">
                <img class="col-sm-12" src="./images/index/backgroundImg.png" alt="backgroundImg">
            </div>

            <div class="row monitorBox">
                <section class="row sectionBox">
                    <div id="InformationButton" class="folderBox col-sm-1">
                        <img src="./images/index/user.png" alt="folderImg">
                        <p>Information</p>
                    </div>
                    <div id="myPCButton" class="folderBox col-sm-1">
                        <img src="./images/index/desktop.png" alt="folderImg">
                        <p>myPC</p>
                    </div>
                    <div id="PortfolioButton" class="folderBox col-sm-1">
                        <img src="./images/index/folder.png" alt="folderImg">
                        <p>Portfolio</p>
                    </div>
                    <div id="StudyButton" class="folderBox col-sm-1">
                        <img src="./images/index/folder.png" alt="folderImg">
                        <p>Study</p>
                    </div>
                </section>

                <section id="InformationApp" class="appBox">
                    <div class="appBrowserBox">
                        <img src="./images/index/app.png" usemap="#appMap" alt="appBroswer">

                        <div class="appContentsBox">
                            <p class="appTitle">Information</p>
                            <button class="appButton closeButton"></button>

                            <button class="appPrevButtonBox"><i class="xi-arrow-left appPrevButton"></i></button>
                            <p class="appPath">myPC/Information</p>

                            <div class="appContents">
                                <!-- 파일들 -->
                                <ol class="fileBox">

                                </ol>

                                <!-- 파일들 세부 정보 -->
                                <ol class="fileDiscBox">

                                </ol>
                            </div>
                        </div>

                    </div>
                </section>

                <section id="myPCApp" class="appBox">
                    <div class="appBrowserBox">
                        <img src="./images/index/app.png" alt="appBroswer">

                        <div class="appContentsBox">
                            <p class="appTitle">myPC</p>
                            <button class="appButton closeButton"></button>

                            <button class="appPrevButtonBox"><i class="xi-arrow-left appPrevButton"></i></button>
                            <p class="appPath">myPC</p>

                            <div class="appContents">
                                <!-- 파일들 -->
                                <ol class="fileBox">

                                </ol>

                                <!-- 파일들 세부 정보 -->
                                <ol class="fileDiscBox">

                                </ol>
                            </div>
                        </div>

                    </div>
                </section>

                <section id="PortfolioApp" class="appBox">
                    <div class="appBrowserBox">
                        <img src="./images/index/app.png" alt="appBroswer">

                        <div class="appContentsBox">
                            <p class="appTitle">Portfolio</p>
                            <button class="appButton closeButton"></button>

                            <button class="appPrevButtonBox"><i class="xi-arrow-left appPrevButton"></i></button>
                            <p class="appPath">myPC/Portfolio</p>

                            <div class="appContents">
                                <!-- 파일들 -->
                                <ol class="fileBox">

                                </ol>

                                <!-- 파일들 세부 정보 -->
                                <ol class="fileDiscBox">

                                </ol>
                            </div>
                        </div>

                    </div>
                </section>

                <section id="StudyApp" class="appBox">
                    <div class="appBrowserBox">
                        <img src="./images/index/app.png" alt="appBroswer">

                        <div class="appContentsBox">
                            <p class="appTitle">Study</p>
                            <button class="appButton closeButton"></button>

                            <button class="appPrevButtonBox"><i class="xi-arrow-left appPrevButton"></i></button>
                            <p class="appPath">myPC/Study</p>

                            <div class="appContents">
                                <!-- 파일들 -->
                                <ol class="fileBox">

                                </ol>

                                <!-- 파일들 세부 정보 -->
                                <ol class="fileDiscBox">

                                </ol>
                            </div>
                        </div>

                    </div>
                </section>

                <!-- 하단 메뉴 -->
                <footer class="row footerBox">
                    <ul class="appMenuList leftMenuList col-sm-8">
                        <li class="footerMenu windowMenu"><img class="footerIcon" src="./images/index/windows.png" alt="windowMenu"></li>
                        <li class="footerMenu appMenu"><img class="footerIcon" src="./images/index/chrome.png" alt="chromeMenu"></li>
                        <li class="footerMenu appMenu"><img class="footerIcon" src="./images/index/folder.png" alt="folderMenu"></li>

                        <li id="photoshopMenu" class="footerMenu appMenu AbilityMenu">
                            <img class="footerIcon" src="./images/index/photoshop.png" alt="photoshopMenu">
                            <div class="footerPreviewBox">
                                <h4 class="AbilityTitle"><img class="previewIcon" src="./images/index/photoshop.png" alt="photoshopMenu">Photoshop Skill</h4>
                                <div class="AbilityBarBox">
                                    <input type="hidden" name="photoshopSkill" value="85">
                                    <p class="AbilityBarPercent">85%</p>
                                    <canvas id="photoshopBar" class="AbilityBar" width=250 height=300></canvas>
                                </div>
                            </div>
                        </li>

                        <li id="illustratorMenu" class="footerMenu appMenu AbilityMenu">
                            <img class="footerIcon" src="./images/index/illustrator.png" alt="illustratorMenu">
                            <div class="footerPreviewBox">
                                    <h4 class="AbilityTitle"><img class="previewIcon" src="./images/index/illustrator.png" alt="illustratorMenu">Illustrator Skill</h4>
                                    <div class="AbilityBarBox">
                                        <input type="hidden" name="photoshopSkill" value="75">
                                        <p class="AbilityBarPercent">75%</p>
                                        <canvas id="illustratorBar" class="AbilityBar" width=250 height=300></canvas>        
                                    </div>
                            </div>
                        </li>

                        <li id="htmlMenu" class="footerMenu appMenu AbilityMenu">
                            <img class="footerIcon" src="./images/index/html-5.png" alt="html-5Menu">
                            <div class="footerPreviewBox">
                                <h4 class="AbilityTitle"><img class="previewIcon" src="./images/index/html-5.png" alt="htmlMenu">HTML Skill</h4>
                                <div class="AbilityBarBox">
                                    <input type="hidden" name="htmlSkill" value="90">
                                    <p class="AbilityBarPercent">90%</p>
                                    <canvas id="htmlBar" class="AbilityBar" width=250 height=300></canvas>        
                                </div>
                            </div>
                        </li>

                        <li id="cssMenu" class="footerMenu appMenu AbilityMenu">
                            <img class="footerIcon" src="./images/index/css-3.png" alt="css-3Menu">
                            <div class="footerPreviewBox">
                                <h4 class="AbilityTitle"><img class="previewIcon" src="./images/index/css-3.png" alt="cssMenu">CSS Skill</h4>
                                <div class="AbilityBarBox">
                                    <input type="hidden" name="cssSkill" value="85">
                                    <p class="AbilityBarPercent">85%</p>
                                    <canvas id="cssBar" class="AbilityBar" width=250 height=300></canvas>  
                                </div>
                            </div>
                        </li>

                        <li id="javascriptMenu" class="footerMenu appMenu AbilityMenu">
                            <img class="footerIcon" src="./images/index/javascript.png" alt="javascriptMenu">
                            <div class="footerPreviewBox">
                                <h4 class="AbilityTitle"><img class="previewIcon" src="./images/index/javascript.png" alt="javascriptMenu">JavaScript Skill</h4>
                                <div class="AbilityBarBox">
                                    <input type="hidden" name="javascriptSkill" value="95">
                                    <p class="AbilityBarPercent">95%</p>
                                    <canvas id="javascriptBar" class="AbilityBar" width=250 height=300></canvas> 
                                </div>
                            </div>                        
                        </li>

                        <li id="jQueryMenu" class="footerMenu appMenu AbilityMenu">
                            <img class="footerIcon" src="./images/index/jQuery.png" alt="jQueryMenu">
                            <div class="footerPreviewBox">
                                <h4 class="AbilityTitle"><img class="previewIcon" src="./images/index/jQuery.png" alt="jQueryMenu">jQuery Skill</h4>
                                <div class="AbilityBarBox">
                                    <input type="hidden" name="jQuerySkill" value="95">
                                    <p class="AbilityBarPercent">95%</p>
                                    <canvas id="jQueryBar" class="AbilityBar" width=250 height=300></canvas>     
                                </div>
                            </div>   
                        </li>

                        <li id="ajaxMenu" class="footerMenu appMenu AbilityMenu">
                            <img class="footerIcon" src="./images/index/ajax.png" alt="ajaxMenu">
                            <div class="footerPreviewBox">
                                <h4 class="AbilityTitle"><img class="previewIcon" src="./images/index/ajax.png" alt="ajaxMenu">AJAX Skill</h4>
                                <div class="AbilityBarBox">
                                    <input type="hidden" name="ajaxSkill" value="87">
                                    <p class="AbilityBarPercent">87%</p>
                                    <canvas id="ajaxBar" class="AbilityBar" width=250 height=300></canvas>         
                                </div>
                            </div>   
                        </li>

                        <li id="nodejsMenu" class="footerMenu appMenu AbilityMenu">
                            <img class="footerIcon" src="./images/index/nodejs.png" alt="nodejsMenu">
                            <div class="footerPreviewBox">
                                <h4 class="AbilityTitle"><img class="previewIcon" src="./images/index/nodejs.png" alt="nodejsMenu">nodeJS Skill</h4>
                                <div class="AbilityBarBox">
                                    <input type="hidden" name="nodejsSkill" value="80">
                                    <p class="AbilityBarPercent">80%</p>
                                    <canvas id="nodejsBar" class="AbilityBar" width=250 height=300></canvas>             
                                </div>
                            </div>   
                        </li>
                        <li id="jsonMenu" class="footerMenu appMenu AbilityMenu">
                            <img class="footerIcon" src="./images/index/json.png" alt="jsonMenu">
                            <div class="footerPreviewBox">
                                <h4 class="AbilityTitle"><img class="previewIcon" src="./images/index/json.png" alt="jsonMenu">JSON Skill</h4>
                                <div class="AbilityBarBox">
                                    <input type="hidden" name="jsonSkill" value="78">
                                    <p class="AbilityBarPercent">78%</p>
                                    <canvas id="jsonBar" class="AbilityBar" width=250 height=300></canvas>                 
                                </div>
                            </div> 
                        </li>
                        <li id="mysqlMenu" class="footerMenu appMenu AbilityMenu">
                            <img class="footerIcon" src="./images/index/mysql.png" alt="mysqlMenu">
                            <div class="footerPreviewBox">
                                <h4 class="AbilityTitle"><img class="previewIcon" src="./images/index/mysql.png" alt="mysqlMenu">MySql Skill</h4>
                                <div class="AbilityBarBox">
                                    <input type="hidden" name="mysqlSkill" value="83">
                                    <p class="AbilityBarPercent">83%</p>
                                    <canvas id="mysqlBar" class="AbilityBar" width=250 height=300></canvas>                     
                                </div>
                            </div> 
                        </li>
                        <li id="phpMenu" class="footerMenu appMenu AbilityMenu">
                            <img class="footerIcon" src="./images/index/php.png" alt="phpMenu">
                            <div class="footerPreviewBox">
                                <h4 class="AbilityTitle"><img class="previewIcon" src="./images/index/php.png" alt="mysqlMenu">PHP Skill</h4>
                                <div class="AbilityBarBox">
                                    <input type="hidden" name="phpSkill" value="92">
                                    <p class="AbilityBarPercent">92%</p>
                                    <canvas id="phpBar" class="AbilityBar" width=250 height=300></canvas>                     
                                </div>
                            </div> 
                        </li>
                    </ul>
                    
                    <ul class="appMenuList rightMenuList col-sm-4">
                        <li id="clockMenu" class="footerMenu clockMenu">
                            <p>오후 12:50</p>
                            <p>2019-10-24</p>
                        </li>
                        <li id="snsMenu" class="footerMenu snsMenu">
                            <img class="footerIcon" src="./images/index/phone.png" alt="phoneMenu">
                            <div class="footerPreviewBox">
                                <h4 class="snsTitle"><img class="previewIcon" src="./images/index/phone.png" alt="phoneMenu">연락처</h4>
                                <div class="snsContents">
                                    <ul class="snsListBox">
                                        <li class="snsList">
                                            <img src="./images/index/phone.png" alt="phone">
                                            <p>010-2246-1662</p>
                                        </li>
                                        <li class="snsList">
                                            <img src="./images/index/gmail.png" alt="gmail">
                                            <p>rhd5656@gamil.com</p>
                                        </li>
                                        <li class="snsList">
                                            <img src="./images/index/kakao-talk.png" alt="gmail">
                                            <p>bbaga1108</p>
                                        </li>
                                    </ul>
                                </div>
                            </div> 
                        </li>

                    </ul>
    
                </footer>


            </div>
        </div>


        <!-- 파일 모음 -->
        <?php

            function setFileStructure($fileID, $filePath, $file, $fileD) {
                $fileName = explode(".", $file[$fileID - 1]['MAIN_TITLE'])[0];
                
                openDB($structConn);

                /* 파일 구조에 관한 sql */
                $structSql = "SELECT * FROM `FILE_STRUCTURE` WHERE `FILE_ID` = {$fileID} ORDER BY `ID` ASC";

                sqlDB($structConn, $structResult, $structSql);


                if($filePath == "") $fileNameID = $fileName;
                else $fileNameID = $filePath . "_" . $fileName;

                /* 파일마다 상세설명 html 코드 */
                echo <<<END
                <div id="{$fileNameID}" class="{$file[$fileID - 1]['TYPE']}">
                    <div class="fileDisc">
                        <h2 class="mainTitle">{$file[$fileID - 1]['MAIN_TITLE']}</h2>
                        <h3 class="subTitle">{$file[$fileID - 1]['SUB_TITLE']}</h3>
                        <img class="discImg" src="./images/myFiles/{$file[$fileID - 1]['IMG_NAME']}" alt="fileIcon">
                        <ol class="discBox">
END;

                /* 파일마다 상세설명 여러개 html 코드 */
                $i = 0;
                while($i < count($fileD[$fileID - 1])) {
                    echo <<<END
                        <li class="disc">
                            <p class="discTitle">{$fileD[$fileID - 1][$i]['DISC_TITLE']}</p>
                            <p class="discText">{$fileD[$fileID - 1][$i]['DISC_TEXT']}</p>
                        </li>
END;
                    $i++;
                }
                /* 닫힘 태그 */
                echo "</ol></div>";

                /* 파일의 타입이 directory 라면 재귀함수 호출 */
                if(strpos($file[$fileID - 1]['TYPE'], 'directory') !== false) {

                    /* 여기다 child 갯수만큼 반복 */
                    while($structRow = mysqli_fetch_assoc($structResult)) {
                        $childID = $structRow['CHILD_ID'];
                        
                        
                        if($filePath != "") setFileStructure($childID, $filePath . "_" . $fileName, $file, $fileD);
                        else setFileStructure($childID, $fileName, $file, $fileD);
                    }

                    closeDB($structConn, $structResult);
                    echo <<<END
                    </div>
END;
                    return;
                }
                /* 파일 타입이 일반 file 이라면 재귀함수 호출 안함 */
                else if(strpos($file[$fileID - 1]['TYPE'], 'file') !== false) {
                    closeDB($structConn, $structResult);
                    echo <<<END
                    </div>
END;
                    return;
                }

            }

            /* 파일에 대한 sql */
            $fileSql = "SELECT * FROM `FILE` ORDER BY `ID` ASC";
            
            /* 파일 상세정보에 관한 sql */
            $discSql = "SELECT * FROM `FILE_DISC` ORDER BY `FILE_ID` ASC";

            sqlDB($fileConn, $fileResult, $fileSql);
            sqlDB($discConn, $discResult, $discSql);
            
            $file = array();
            $fileDisc = array();

            /* 파일 데이터베이스를 $file 에 배열로 push 작업 */
            while($fileRow = @mysqli_fetch_assoc($fileResult)) { array_push($file, $fileRow); }

            $tempDisc = array();
            $index = 0;
            /* 파일 데이터베이스 인덱스에 맞춰 2차원 배열로 push 작업 */
            while($discRow = @mysqli_fetch_assoc($discResult)) {
                /* tempDisc 배열에 저장되 있던 것을 $fileDisc에 통으로 push */
                if($discRow['FILE_ID'] != ($index + 1)) { array_push($fileDisc, $tempDisc); $index++; $tempDisc = array(); }

                /* FILE_ID 가 인덱스와 일치할 때 tempDisc 배열에 임시 저장 */
                if($discRow['FILE_ID'] == ($index + 1)) { array_push($tempDisc, $discRow); }

            }
            /* 마지막 배열 push */
            array_push($fileDisc, $tempDisc);

            /* 데이터 베이스에서 file 구조 불러오기 */
            setFileStructure(1, "", $file, $fileDisc);

        ?>


        </div>
    </body>
</html>

<?php
closeDB($fileConn, $fileResult);
closeDB($discConn, $discResult);
?>