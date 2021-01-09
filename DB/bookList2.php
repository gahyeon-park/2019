<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<style>
			*{margin: 0px; padding: 0px;}
		</style>
	</head>
	<body>
		<?php
			$conn = mysqli_connect("localhost", "st07", "c9st07", "st07");
			if(!$conn)
			{
				echo "Unable to connect to DB: ".mysqli_error($conn);
				exit;
			}
			if(!mysqli_select_db($conn,"st07"))
			{
				echo "Unable to select myDB: ".mysqli_error($conn);
				exit;
			}

			$sql = "SELECT * FROM `bookList` where `id`='". $_GET["delNum"]. "';";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) == 0) {
				echo "삭제할수 없습니다..";
				exit;
			}
			else {
				mysqli_query($conn, "DELETE FROM `bookList` where `id`='".$_GET["delNum"]."';");
				echo "삭제되었습니다.";
			}
			mysqli_free_result($result);
			mysqli_close($conn);
		?>
	</body>
</html>
