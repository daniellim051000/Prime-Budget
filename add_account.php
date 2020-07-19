<?php
	include("conn.php");
	$sql="select * from user where username='$_GET[username]';";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	$userid=$row['user_id'];
	$account_sql="INSERT INTO `account`( `account_name`, `total_amount`, `user_id`, `account_no`)
	VALUES ('Account 1','0','$userid','1'),
	('Account 2','0','$userid','2'),
	('Account 3','0','$userid','3'),
	('Account 4','0','$userid','4');";
	if(mysqli_query($con,$account_sql))
	{
		mysqli_close($con);
		header('Location: login.html.php');
	}

?>