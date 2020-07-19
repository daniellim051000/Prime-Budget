<?php
session_start();
if (!isset($_SESSION['changing']))
{
header("location: loginpage.php");
}
?>