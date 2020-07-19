	<?php
	include("conn.php");
			
	$result = mysqli_query($con, "SELECT * FROM debt WHERE debt_id='$_POST[debt_id]'");
	while($row=mysqli_fetch_array($result))
	{	
	 	
	$cash_out_in = $row['cash_OutIn'];
	$returnback = $row['return_back'];
	$amountadded = $_POST['addamount'];
	$final = ($returnback + $amountadded);	
			
	if ($final >= $cash_out_in)
	{	 	
	$final = ($returnback + $amountadded);
	
	$sql = "UPDATE debt SET
	return_back = $final

	WHERE debt_id=$_POST[debt_id];";
	
	$result2 = mysqli_query($con,$sql);

	
	$sql3 = "SELECT * FROM debt
 	WHERE return_back > cash_OutIn 
	AND debt_id=$_POST[debt_id];";

	
	$sql2 = "UPDATE debt SET
	status = 'inactive'

	WHERE debt_id=$_POST[debt_id];";
	
	$result3 = mysqli_query($con,$sql2);
	
	echo '<script>alert("Your debt amount is done!"); 
	window.location.href = "Debt.php"; 
	</script>';
	
	
	}
	
	else if ($returnback < $cash_out_in) 
	{
	$final = ($returnback + $amountadded);

	
	$sql4 = "UPDATE debt SET
	return_back = $final
		
	WHERE debt_id=$_POST[debt_id];";
	
	$result2 = mysqli_query($con,$sql4);
	
	echo '<script>alert("Return amount has increased successfully!"); 
	window.location.href = "Debt.php"; 
	</script>';

	}
	
	else
	{
	die('Error: ' . mysqli_error($con));	
	}
	}
	
	mysqli_close($con);
	?>