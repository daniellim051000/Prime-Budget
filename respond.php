<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
include("conn.php");
$sql="UPDATE `customer_support` SET `respond`='$_POST[respond]',`status`='responded' WHERE cus_sup_id='$_POST[cus_sup_id]';";
	
if (!mysqli_query($con,$sql)) 
{ 
	die('Error: ' . mysqli_error($con));
}
mysqli_close($con); 
echo '<script>alert("Customer Support had been responded"); window.location.href = "customer_support_admin.php"; </script>';

?>
</body>
</html>