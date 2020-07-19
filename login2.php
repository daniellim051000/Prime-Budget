<?php
include("conn.php");
session_start();
// username and password sent from form
$username=mysqli_real_escape_string($con, $_POST['username']);
$password=mysqli_real_escape_string($con, $_POST['password']);

$sql="SELECT * FROM user WHERE username='$username' and password=MD5('$password') and status='active'";
$sql2="SELECT `user`.`username`, `account`.`account_id`,`user`.`user_id` FROM `user` LEFT JOIN `account` ON `account`.`user_id` = `user`.`user_id` where username='$username';";
$result=mysqli_query($con,$sql);
$result2=mysqli_query($con,$sql2);
while($row = mysqli_fetch_array($result2))
{
	$accid = $row['account_id'];
	if($accid == NULL)
	{
		$sql3="INSERT INTO `account`(`account_name`, `total_amount`, `user_id`, `account_no`)
		VALUES 
		('Account 1','0',$row[user_id],'1'),
		('Account 2',0,$row[user_id],'2'),
		('Account 3',0,$row[user_id],'3'),
		('Account 4',0,$row[user_id],'4');";
		
		$result3 = mysqli_query($con,$sql3);
		
	}
	
}
if(mysqli_num_rows($result) <=0)
{
        echo "<script>alert('Wrong username or password.');";
        die("window.history.go(-1);</script>");
}
if($row=mysqli_fetch_array($result))
{
    $_SESSION['username']=$row['username'];
    $_SESSION['usertype']=$row['usertype'];
    $_SESSION['mySession']=$row['user_id'];
    $_SESSION['name']=$row['name'];

}

if($_SESSION['usertype']==="user")
{
    echo "<script>alert('Welcome back ".$_SESSION['username']."');";
    echo "window.location.href='client_dashboard.php';</script>";
}
else if($_SESSION['usertype']==="admin")
{
    echo "<script>alert('Welcome back admin!');";
    echo "window.location.href='admin_dashboard.php';</script>";
}
?>
