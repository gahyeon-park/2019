<?php
	$conn= mysqli_connect("localhost", "st11", "c9st11", "st11");
	if(!$conn){
		echo "데이터베이스를 연결할 수 없습니다.".mysqli_error($conn);
		mysqli_close($conn);
		exit;
	}
	if(!mysqli_select_db($conn,"st11")){
		echo "데이터베이스를 찾을 수 없습니다.".mysqli_error($conn);
		mysqli_close($conn);
		exit;
	}
	// $inputVal="INSERT INTO `Li` (`name`,`writer`,`story`,`house`,`D-day`) VALUES ('{$_POST['Bname']}', '{$_POST['Bwriter']}', '{$_POST['Bstory']}', '{$_POST['Bhouse']}', '{$_POST['BDday']}')";	
	// $inputResult = mysqli_query($conn,$inputVal);
	$sql = "SELECT * FROM Li";
	$result = mysqli_query($conn,$sql);
	if(!$result){
		echo "해당 데이터베이스의 결과 값을 가져올 수 없습니다.".mysqli_error($conn);
		mysqli_free_result($result);
        mysqli_close($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "아무런 정보가 없습니다.";
		mysqli_free_result($result);
        mysqli_close($conn);
		exit;
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
			margin-left: 170px;
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
		.widthBox1{ width: 50px; }
		.widthBox2{ width: 700px; }
		.inputBox{
			width: 90px;
			height: 30px;
			background-color: SlateBlue;
			border: 5px solid SlateBlue;

			color: white;
			font-size: 16px;
			line-height: 17px;

			margin-left: 1537px;
			margin-top: 10px; 
		}
		.marginLBox{ margin-left: 10px; }
/* 팝업 */
		.BC_Box{
			width: 1600px;
			height: 500px;
			background-color: white;
			border: 5px solid SlateBlue;
				
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -800px;
			margin-top: -350px;

			display: none;
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
			margin-bottom: 70px;
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
			margin-top: -147px;
			margin-left: 620px;
		}
		.BC_taBox{
			width: 1404px;

			margin-top: 100px;
			margin-left: 88px;
		}
		.SbuttonBox{ margin-left: 1315px; } 
		.SButton{
			width: 80px;
			height: 40px;
			background-color: SlateBlue;
			border: 5px solid SlateBlue;

			color: white;
			font-size: 17px;
			text-align: center;
			line-height: 31px;

			margin-top: 20px;
			margin-right: 15px;
			float: left;
		}
/* 도서추가 */
		.DplueBox{ display: none; }
		.DplueText{
			color: SlateBlue;
			font-size: 20px;
			font-weight: bold;

			margin-left: 172px;
			margin-top: 30px;
		}
		.tableBox2{
			margin-top: 5px;
		}
		.trInput{	
			background-color: #f0f0f0;
			border: 3px solid #f0f0f0;
		}
		.trMargin{
			width: 747px;
		}
		.DpLastInput{
			width: 150px;
			height: 30px;
			background-color: SlateBlue;
			border: 5px solid SlateBlue;

			color: white;
			font-size: 16px;
			line-height: 17px;

			margin-top: 10px;
			margin-left: 1583px;
		}
		footer{
			height: 100px;
		}
	   </style>
	</head>
	<body>
<!-- 틀 -->
		<p class="mainText">도서관리<i class="xi-book xi-x"></i></p>
		<table>
			<tr>
				<th class="widthBox1">번호</th>
				<th>책제목</th>
				<th>저자</th>
				<th class="widthBox2">내용</th>
				<th>출판사</th>
				<th>출판일</th>
			</tr>
			<?php
				while($row = mysqli_fetch_assoc($result)){
					echo '<tr>
						<td class="widthBox1">'.$row['bookNum'].'</td>
						<td>'.$row['name'].'</td>
						<td>'.$row['writer'].'</td>
						<td class="widthBox2">'.$row['story'].'</td>
						<td>'.$row['house'].'</td>
						<td>'.$row['D-day'].'</td>
					</tr>';
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
				<input type="type" placeholder="도서명이나 저자를 입력해주세요." class="BCinputBox">
				<i class="xi-search xi-2x iconBox2"></i>
			</div>
			<table class="tableBox2 BC_taBox">
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
			<div class="SbuttonBox">
				<input type="button" class="SButton" value="수정">
				<input type="button" class="SButton" value="삭제">
			</div>
		</div>
<!-- 도서추가 -->
		<div class="DplueBox" id="DplueBox">
			<p class="DplueText">도서추가</p>
			<form method="POST" action="./Li.php">
				<table class="tableBox2">
					<tr>
						<th>책제목</th>
						<th>저자</th>
						<th class="widthBox">내용</th>
						<th>출판사</th>
						<th>출판일</th>
					</tr>
					<tr>
					
						<td><input type="text" name="Bname" value="책제목" class="trInput"></td>
						<td><input type="text" name="Bwriter" value="저자명" class="trInput"></td>
						<td class="widthBox"><input type="text" name="Bstory" value="줄거리및 소개" class="trInput trMargin"></td>
						<td><input type="text" name="Bhouse" value="출판사" class="trInput"></td>
						<td><input type="text" name="BDday" value="0000-00-00" class="trInput"></td>
					</tr>
				</table>
				<input type="submit" value="도서 등록하기" class="DpLastInput">
			</form>
		</div>
		<footer></footer>	
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
