<!DOCTYPE html>
<html>

<head>
</head>

<body>
	<?php
	include("conn.php");
	
	
	if ($_POST['cashOutIn'] == NULL)
	{
	
	echo '<script>alert("Please insert the amount for your goal"); 
	header("location: DebtForm.php");
	</script>';
	
	}
	
	else if($_POST['returnback'] == NULL)
	{
	$sql="INSERT INTO debt (type,debt_name, cash_OutIn, return_back, remark, status, user_id)
	
	VALUES
	
	('$_POST[type]','$_POST[name]','$_POST[cashOutIn]','0','$_POST[description]','active','$_POST[userid]')";
	}

	else
	{
	$sql="INSERT INTO debt (type, debt_name, cash_OutIn, return_back, remark, status, user_id)
	
	VALUES
	
	('$_POST[type]','$_POST[name]','$_POST[cashOutIn]','$_POST[returnback]','$_POST[description]','active','$_POST[userid]')";
	}
	
	$result=mysqli_query($con,$sql);
	
	if($result){
			echo '<script>alert("New Debt has been added"); 
				window.location.href = "Debt.php"; 
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
