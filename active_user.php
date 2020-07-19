<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php 
	include("conn.php");
	$userid=intval($_GET['user_id']);
	$sql="UPDATE `user` SET `status`='active' WHERE `user_id` = '$userid';";
	if(mysqli_query($con,$sql))
	{
		mysqli_close($con);
		header('Location: user_list.php');
	}
	?>
</body>
</html>