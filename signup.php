<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php

include("conn.php");

//Next process is the insert query.*/
$username=$_POST[username];

$sql="INSERT INTO `user`(`name`, `age`, `gender`, `email`, `phone_no`, `status`, `username`, `password`, `usertype`) 
VALUES ('$_POST[name]','$_POST[age]','$_POST[gender]','$_POST[email]','$_POST[phone_no]','active','$username', MD5('$_POST[password]'), 'user')";


if ($_POST["password"] === $_POST["confirm_password"])
{
	if(!mysqli_query($con,$sql)) 
		{ 
			die('Error: ' . mysqli_error($con));
		}
	else{

		echo '<script>alert("Sign Up Successful. Please Login Again");</script>';
		
		header("location: login.html");

		}
	}
	
else
	{
		echo '<script>alert("Sign Up Unsuccessful. Please make sure your password is the same.");
		window.location.href = "signuppage.php";
		</script>';
	}


mysqli_close($con);

?>

</body>
</html>