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

			$sql = "SELECT * FROM bookList where `{$_GET['dropDown']}`='"."{$_GET['inputText']}"."'";
			$result = mysqli_query($conn,$sql);
			if(!$result)
			{
				echo "Could not successfully run query ($sql) from DB: ".mysqli_error($conn);
				exit;
			}
			if(mysqli_num_rows($result) == 0)
			{
				echo "No rows found, no	thing to print so am exiting";
				exit;
			}
			echo '<div>';
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<p>id : {$row['id']}</p>";
				echo "<p>bookTitle : {$row['bookTitle']}</p>";
				echo "<p>authorName : {$row['authorName']}</p>";
				echo "<p>priceNum : {$row['priceNum']}</p>";
				echo "<p>summaryText : {$row['summaryText']}</p>";
				echo "<p>publicationDate : {$row['publicationDate']}</p>";
				echo "<p>dueDate : {$row['dueDate']}</p>";
			}
			echo '</div>';
			mysqli_free_result($result);
			mysqli_close($conn);
		?>
	</body>
</html>
