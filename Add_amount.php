	<?php
	include("conn.php");
			
	$result = mysqli_query($con, "SELECT * FROM goal WHERE goal_id='$_POST[goal_id]'");
	while($row=mysqli_fetch_array($result))
	{	
	 	
	$amountneeded = $row['amount_needed'];
	$current = $row['amount_hold'];
	$amountadded = $_POST['addamount'];
	$final = ($current + $amountadded);		
	
	
	
	if ($final >= $amountneeded)
	{	 	
	$final = ($current + $amountadded);
	
	$sql = "UPDATE goal SET
	amount_hold = $final
		
	WHERE goal_id=$_POST[goal_id];";
	
	$result2 = mysqli_query($con,$sql);
	
	$sql3 = "SELECT amount_hold FROM goal 
	WHERE amount_hold > amount_needed
	AND goal_id=$_POST[goal_id];";
	
	$sql2 = "UPDATE goal SET
	status = 'inactive'
	
	WHERE goal_id=$_POST[goal_id];";
	
	$result3 = mysqli_query($con,$sql2);
	
	echo '<script>alert("Your goal amount is reached!"); 
	window.location.href = "Goal.php"; 
	</script>';
	
	
	}
	
	else if ($current < $amountneeded) 
	{
	$final = ($current + $amountadded);
	
	$sql4 = "UPDATE goal SET
	amount_hold = $final
		
	WHERE goal_id=$_POST[goal_id];";
	
	$result2 = mysqli_query($con,$sql4);
	
	echo '<script>alert("Amount has increased successfully!"); 
	window.location.href = "Goal.php"; 
	</script>';

	}
	
	else
	{
	die('Error: ' . mysqli_error($con));	
	}
	}
	
	mysqli_close($con);
	?>
	
