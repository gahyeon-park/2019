<?php
    $conn = mysqli_connect("localhost", "st07", "c9st07", "st07");

    if(!$conn) {
        echo "데이터베이스를 연결할 수 없습니다." . mysqli_error($conn);
        mysqli_close($conn);
        exit;
    }

    if(!mysqli_select_db($conn, "st07")) {
        echo "데이터 베이스를 찾을 수 없습니다." . mysqli_error($conn);
        mysqli_close($conn);
        exit;
    }

    $sql = "SELECT * FROM bookList;";
    $result = mysqli_query($conn, $sql);

    if(!$result) {
        echo "해당 데이터 베이스의 결과 값을 가져올 수 없습니다." . mysqli_error($conn);
        mysqli_free_result($result);
        mysqli_close($conn);
        exit;
    }

    if(mysqli_num_rows($result) == 0) {
        echo "아무런 정보가 없습니다." . mysqli_error($conn);
        mysqli_free_result($result);
        mysqli_close($conn);
    }
?>

<!DOCTYPE HTML>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR:300&display=swap&subset=korean" rel="stylesheet">
		<link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
	   <style>
		*{ margin: 0px; padding: 0px; font-size: 100%; font-family: 'Noto Sans KR', sans-serif; }
/* 틀 */
		.mainText{
			color: SlateBlue;
			font-size: 40px;
			font-weight: bold;
			text-align: center;

			margin-top: 30px;
		}
		table { 
			margin-top: 50px; 
			margin-left: 200px;
		}
		th {
			width: 200px;
			height: 35px;
			background-color: SlateBlue;

			color: white;
			font-size: 16px;
		}
		td {
			width: 200px;
			height: 35px;
			background-color: #f0f0f0;

			color: #070707;
			font-size: 15px;
		}
		.widthBox{ width: 700px; }
		.inputBox{
			width: 90px;
			height: 30px;
			background-color: SlateBlue;
			border: 5px solid SlateBlue;

			color: white;
			font-size: 16px;
			line-height: 17px;

			margin-left: 1516px;
			margin-top: 10px; 
		}
		.marginLBox{ margin-left: 10px; }
/* 팝업 */
		.BC_Box{
			display: none;
			width: 1600px;
			height: 600px;
			background-color: white;
			border: 5px solid SlateBlue;
				
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -800px;
			margin-top: -350px;
		}
		.iconBox1{
			color: SlateBlue;
			margin-left: 1550px;
		}
		.divPBox{
			width: 1400px;
			height: 60px;
			background-color: SlateBlue;

			margin-left: 90px;
			margin-top: 40px;
		}
		.selectBox{
			width: 120px;
			height: 40px;
			background-color: white;

			margin-top: 10px;
			margin-left: 30px;
			float: left;
		}
		.BCinputBox{
			width: 1100px;
			height: 30px;
			background-color: white;
			border: 5px solid white;
			
			margin-top: -40px;
			margin-left: 180px;
			float: left;
		}
		.iconBox2{
			color: white;

			position: absolute;
			left: 50%;
			top: 50%;
			margin-top: -197px;
			margin-left: 620px;
		}
		.SBox{
			width: 80px;
			height: 40px;
			background-color: SlateBlue;

			color: white;
			font-size: 17px;
			text-align: center;
			line-height: 39px;

			margin-top: 300px;
			margin-right: 15px;
			float: left;
		}
/* 도서추가 */
		.DplueBox{ display: none; }
		.DplueText{
			color: SlateBlue;
			font-size: 20px;
			font-weight: bold;

			margin-left: 200px;
			margin-top: 100px;
		}
		.tableBox2{
			margin-top: 5px;
		}
		.trInput{	
			background-color: #f0f0f0;
			border: 3px solid #f0f0f0;
		}
		.trMargin{
			width: 690px;
		}
	   </style>
	</head>
	<body>
<!-- 틀 -->
		<p class="mainText">도서관리<i class="xi-book xi-x"></i></p>
		<table>
			<tr>
				<th>책제목</th>
				<th>저자</th>
				<th class="widthBox">내용</th>
				<th>출판사</th>
				<th>출판일</th>
			</tr>
				<?php
                    while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						        
                        echo "<td>" . $row['bookTitle'] . "</td>";
                        echo "<td>" . $row['authorName'] . "</td>";
                        echo "<td class='widthBox'>" . $row['summaryText'] . "</td>";
                        echo "<td>" . $row['priceNum'] . "</td>";
						echo "<td>" . $row['publicationDate'] . "</td>";
						
                        echo "</tr";
                    }
                ?>
		</table>
		<input type="button" value="조회" class="inputBox" id="inputBox1">
		<input type="button" value="도서추가" class="inputBox marginLBox" id="inputBox2">
<!-- 팝업 -->
		<div class="BC_Box" id="BC_Box">
			<i class="xi-close-square xi-3x iconBox1" id="iconBox"></i>
			<div class="divPBox">
				<select class="selectBox" name="selectBox">
					<option value="책제목" selected>책제목</option>
					<option value="저자">저자</option>
				</select>
				<input type="type" value="도서명이나 저자를 입력해주세요." class="BCinputBox">
				<i class="xi-search xi-2x iconBox2" id="iconBox"></i>
			</div>
			<table class="tableBox2">
				<tr>
					<th>책제목</th>
					<th>저자</th>
					<th class="widthBox">내용</th>
					<th>출판사</th>
					<th>출판일</th>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<p class="SBox">수정</p>
			<p class="SBox">삭제</p>
		</div>
<!-- 도서추가 -->
		<div class="DplueBox" id="DplueBox">
			<p class="DplueText">도서추가</p>
			<table class="tableBox2">
				<tr>
					<th>책제목</th>
					<th>저자</th>
					<th class="widthBox">내용</th>
					<th>출판사</th>
					<th>출판일</th>
				</tr>
				<tr>
					<td><input type="text" value="책제목" class="trInput"></td>
					<td><input type="text" value="저자명" class="trInput"></td>
					<td class="widthBox"><input type="text" value="줄거리및 소개" class="trInput trMargin"></td>
					<td><input type="text" value="출판사" class="trInput"></td>
					<td><input type="text" value="0000-00-00" class="trInput"></td>
				</tr>
			</table>
		</div>
	   <script>
		this.onclick = function(e){
			var inputBox1 = document.getElementById( "inputBox1" );
			var inputBox2 = document.getElementById( "inputBox2" );
			var BC_Box = document.getElementById( "BC_Box" );
			var iconBox = document.getElementById( "iconBox" );
			var DplueBox = document.getElementById( "DplueBox" );

			if(e.target.id=='inputBox1') {
				if ( BC_Box.style.display == "block" ){
					BC_Box.style.display = "none";
				} else {
					BC_Box.style.display= "block";
				}
			}

			if(e.target.id=='iconBox') {
				if ( BC_Box.style.display == "none" ){
					BC_Box.style.display = "block";
				} else {
					BC_Box.style.display= "none";
				}
			}

			if(e.target.id=='inputBox2') {
				if ( DplueBox.style.display == "block" ){
					DplueBox.style.display = "none";
				} else {
					DplueBox.style.display= "block";
				}
			}
		}
	   </script>
	</body>
</html>

<?php
    mysqli_free_result($result);
    mysqli_close($conn);
?>
