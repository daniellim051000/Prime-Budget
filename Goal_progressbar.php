<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title></title>
</head>
	<?php 
	
	
  
  

 // $percent_current = ($result2 / result * 100);

	//while($row=mysqli_fetch_array($result))
	//while($row=mysqli_fetch_array($result1))
   
    <?php
    include("conn.php");

      $sql = "SELECT SUM(amount_needed) FROM goal";
      $sql3 = "SELECT SUM(amount_needed) FROM goal WHERE status = 'active'";
      while($row = mysqli_fetch_array($result))
      {
       
       $not_reach_goal_need_amount = ($sql3/$sql * 100);
       $result = mysqli_query($con, $not_reach_goal_need_amount);


       

    
      


//$result2 = mysqli_query($con, $not_reach_goal_hold_amount);
//while($row = mysqli_fetch_array($result2))
//{
 // $sql2 = "SELECT SUM(amount_hold) FROM goal";
  //$sql4 = "SELECT SUM(amount_hold) FROM goal WHERE status = 'active'";
  
//  echo'<script>
 // function progressbar() {
 // $not_reach_goal_hold_amount = ($sql4/$sql2 * 100);
  

// $("#dynamic1")
 //     .css("width", $not_reach_goal_hold_amount + "%")
    //  .attr("aria-valuenow", $not_reach_goal_hold_amount)
    //  .text($not_reach_goal_hold_amount + "% ");

    //  document.getElementById("dynamic1");

    //  </script>'

  
  }
	?>

	
<body>

</body>

</html>
