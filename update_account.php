<?php
include("conn.php");
$sql="UPDATE `account` SET `account_name` = '$_POST[account_name]', `total_amount` = '$_POST[total_amount]' WHERE `account`.`account_id` = $_POST[account_id];";

if(mysqli_query($con,$sql)){

	header("Location: account.php?account_id=$_POST[account_id];");
}
else{
		die('Error: ' . mysqli_error($con));
}

	mysqli_close($con);
?>