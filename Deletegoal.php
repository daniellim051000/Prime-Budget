<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Untitled 1</title>
</head>

<body>
	<?php 
	include("conn.php");
	
	//intval — Get the integer value of a variable 
	$id = intval($_GET['goal_id']);
	$result = mysqli_query($con,"DELETE FROM goal WHERE goal_id=$id ");
	mysqli_close($con); 
	//close database connection
	header('Location: Goal.php'); 
	?>
</body>

</html>
