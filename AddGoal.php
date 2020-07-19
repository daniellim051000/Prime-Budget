<!DOCTYPE html>
<html>

<head>
</head>

<body>
	<?php
	include("conn.php");
	
	if ($_POST['hold_amount'] == NULL)
	{
	$sql="INSERT INTO goal (goal_name, amount_needed, amount_hold, remark, status, user_id)
	
	VALUES
	
	('$_POST[name]','$_POST[need_amount]','0','$_POST[description]','active','$_POST[userid]')";

}

else {
			$sql="INSERT INTO goal (goal_name, amount_needed, amount_hold, remark, status, user_id)

			VALUES

			('$_POST[name]','$_POST[need_amount]','$_POST[hold_amount]','$_POST[description]','active','$_POST[userid]')";

			$result=mysqli_query($con,$sql);

	if($result){
					echo '<script>alert("1 record has added!"); 
			</script>';
			}

			else
			{ 
			die('Error: ' . mysqli_error($con)); 
			}

	mysqli_close($con); 
	?>

</body>

</html>
