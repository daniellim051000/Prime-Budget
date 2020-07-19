<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title></title>
</head>

<body>
	<?php
	include("conn.php");
	
	$sql = "UPDATE goal SET
	goal_name= '$_POST[name]',
	amount_needed='$_POST[need_amount]',
	amount_hold='$_POST[hold_amount]',
	remark='$_POST[description]'
	
	WHERE goal_id=$_POST[goal_id];";
		
	if (mysqli_query($con, $sql)) {
	mysqli_close($con); 
	header('Location: Goal.php');
	}
	?>


</body>

</html>
