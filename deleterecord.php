<?php 
include("conn.php");

 $recordid = intval($_GET['recid']);
 $result = mysqli_query($con,"select * from transaction where record_id=$recordid");
 
 while($row=mysqli_fetch_array($result))
          {
          $result2 = mysqli_query($con,"SELECT * FROM account WHERE account_id='$row[account_id]';");
			
			if(!$result2)
			{
			die('error:'.mysqli_error($con));
			}
			while($row2 = mysqli_fetch_array($result2))
			{
				$total = $row2['total_amount'];
				$change = $row['amount'];
				
				if($row['type'] == 'income')
				{
					$final = $total - $change;
				}
				else if($row['type'] == 'expense')
				{
					$final = $total + $change;
				}
				
			$sql = "UPDATE account SET total_amount='$final' WHERE account_id='$row[account_id]';";
		
		$result3=mysqli_query($con, $sql); 
		
		$sql2 = "DELETE FROM transaction WHERE record_id=$recordid";
		$result4=mysqli_query($con, $sql2);
		
		if(!$result3 || !$result4)
		{
		die('error:'.mysqli_error($con));
		}
		
		if ($result3 || $result4) {
		
		             

		$accountid = $row['account_id'];
		echo '<script>alert("delete successful!");"</script>';
		header("location: viewrecord1.php?account_id=$accountid");
				
		mysqli_close($con);
		
			}
			}
			}

 ?>


				
				
