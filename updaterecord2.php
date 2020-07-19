<?php
          include("conn.php");
          
          
                    
          if ($_POST['type'] == NULL || $_POST['date'] == NULL || $_POST['category'] == NULL || $_POST['amount'] == NULL ||  $_POST['record_id'] == NULL)
		{
		echo '<script>alert("Please fill in the empty fields!");
		window.location.href = "updaterecord1.php";</script>';
		}
		else 
		{
          
          $result = mysqli_query($con,"SELECT * FROM transaction WHERE record_id='$_POST[record_id]'");
          while($row=mysqli_fetch_array($result))
          {
          $result2 = mysqli_query($con,"SELECT * FROM account WHERE account_id='$_POST[accountid]';");
			
			if(!$result2)
			{
			die('error:'.mysqli_error($con));
			}
			while($row2 = mysqli_fetch_array($result2))
			{
				$total = $row2['total_amount'];
				$change = $_POST['amount'];
				$current = $row['amount'];
				
				if ($row['type'] == 'income' && $_POST['type'] == 'expense')
				{
				$final = $total - ($current + $change);
				}
				else if ($row['type'] == 'expense' && $_POST['type'] == 'income')
				{
				$final = $total + ($current + $change);
				}
				else if ($row['type'] == 'income' && $_POST['type'] == 'income')
				{
				$final = $total + ($change - $current);
				}
				else if ($row['type'] == 'expense' && $_POST['type'] == 'expense')
				{
				$final = $total - ($change - $current);
				}
			
			$sql = "UPDATE account SET total_amount='$final' WHERE account_id='$_POST[accountid]';";
		
		$result3=mysqli_query($con, $sql);
		
		$sql2 = "UPDATE transaction SET type='$_POST[type]', date='$_POST[date]', category='$_POST[category]', amount='$change', description='$_POST[description]' WHERE record_id='$_POST[record_id]';";
		
		$result4=mysqli_query($con, $sql2);
		
		if(!$result3 || !$result4)
		{
		die('error:'.mysqli_error($con));
		}
		
		if ($result3 || $result4) {
		
		$accountid = $row['account_id'];
		echo '<script>alert("Update successful!");</script>';
		header("location: viewrecord1.php?account_id=$accountid");

				
		mysqli_close($con);
		
			}
			}
			}
			}
          ?>
