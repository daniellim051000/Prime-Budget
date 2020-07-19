<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<?php
include("conn.php");
	$user_id = intval($_POST['user_id']);
	
$sql="INSERT INTO feedback (rating, description, user_id)
VALUES
('$_POST[rating]','$_POST[description]','$user_id')";


if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else
{

  echo '<div class="alert alert-success">Thank you for submitting your feedback</div>';
  header("Refresh: 3; URL=feedback.php.?userid=$user_id");

}
mysqli_close($con);

?>

</html>