<?php
include("conn.php");

$sql="INSERT INTO customer_support (title,description,status,user_id)
VALUES
('$_POST[title]','$_POST[description]','pending','$_POST[user_id]')";
if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con) . mysqli_connect_error());
}

echo '<script>alert("1 record added!");
window.location.href = "custsupport.php";
</script>';
mysqli_close($con);
?>
