<?php
include("conn.php");
include("session2.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$target = $_SESSION['changing']; 
$codegiven = $_POST['vericode'];

$checkcode = "SELECT * FROM verification WHERE email = '$target' AND code = '$codegiven';";

if (!mysqli_query($con,$checkcode))
{
die('Error: ' . mysqli_error($con));
}
$result = mysqli_query($con,$checkcode);
$row = mysqli_num_rows($result);

if ($row == 0)
{
echo '<script> alert("Invalid verification code!");
window.location.href = "entercode.php";
</script>';
} 
else 
{
header("location:enterpassword.php");
}
}
?>