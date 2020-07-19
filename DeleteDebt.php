<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title></title>
</head>

<body>
	<?php 
	include("conn.php");
	
	//intval — Get the integer value of a variable 
	$id = intval($_GET['debt_id']);
	$result = mysqli_query($con,"DELETE FROM debt WHERE debt_id=$id ");
	mysqli_close($con); 
	//close database connection
	header('Location: Debt.php'); 
	?>
</body>

</html>
