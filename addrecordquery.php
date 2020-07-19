<?php

include("conn.php");
include("session.php");

//Next process is the insert query.*/

$sql="INSERT INTO transaction(type, date, category, amount, description,account_id)

VALUES

('$_POST[type]','$_POST[date]','$_POST[category]','$_POST[amount]','$_POST[description]','$_POST[account]')";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
;
}

		$user_id = intval($_SESSION['mySession']);
          $result = mysqli_query($con,"select * from account where user_id=$user_id and account_id=$_POST[account]");
          while($row=mysqli_fetch_array($result))
          {
           $current= $row['total_amount'];
            $amounts= $_POST['amount'];
            
            if ($_POST['type'] == "expense")
			{
				$math = $current - $amounts;
            }
            else
            {
            	$math = $amounts + $current;
            }	
            
            $sql2="UPDATE account SET total_amount='$math' WHERE user_id=$user_id and account_id=$_POST[account]";
			if (!mysqli_query($con,$sql2))
			{
			die('Error: ' . mysqli_error($con));
			;
			}

}

echo '<script>alert("Record successfully added!");
window.location.href = "client_dashboard.php";
</script>';

mysqli_close($con);

?>
