<?php
include("conn.php");
include("session2.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

if ($_POST['password'] == $_POST['password2'])
{

$currentuser = $_SESSION['changing'];
$updatedpassword= $_POST['password'];

$updatequery = "UPDATE user SET password =MD5('$updatedpassword') WHERE email = '$currentuser';";
$result = mysqli_query($con,$updatequery);
echo '<script>alert("Password changed successfully! Please login again.");
window.location.href = "login.html";
</script>';
session_destroy();
}
elseif ($_POST['password'] != $_POST['password2'])
{
echo '<script>alert("Please make sure you re-entered your password correctly");
window.location.href = "enterpassword.php";
</script>';

}

}
?>