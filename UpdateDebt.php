<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title></title>
</head>

<body>
	<?php
	include("conn.php");
	
	$sql = "UPDATE debt SET
	debt_name= '$_POST[name]',
	cash_OutIn='$_POST[cashOutIn]',
	return_back='$_POST[returnback]',
	remark='$_POST[description]'
	
	WHERE debt_id=$_POST[debt_id];";
		
	if (mysqli_query($con, $sql)) {
	mysqli_close($con); 
	header('Location: Debt.php');
	}
	?>


</body>

</html>
