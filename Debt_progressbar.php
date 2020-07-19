<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title></title>
</head>

<body>
	<?php 
	include("conn.php");
	
	$result = mysqli_query($con, "SELECT SUM(cash_OutIn) FROM debt");
	$result2 = mysqli_query($con, "SELECT SUM(return_back) FROM debt");
  $cash_out_in = ()

	//while($row=mysqli_fetch_array($result))
	//while($row=mysqli_fetch_array($result1))
  for($i=1; $i<=$result)
	?>
	<script>
	
$(document).ready(function() {

  var current_progress = "<?php while($row=mysqli_fetch_array($result));?>"

  var interval = setInterval(function() {
      current_progress += 10;

     // $("#dynamic")
      .css("width", current_progress + "%")
      .attr("aria-valuenow", current_progress)
      .text(current_progress + "% ");
      if (current_progress >= 100)
          clearInterval(interval);
  }, 1000);

   document.getElementById("dynamic");
});




</script>

</body>

</html>
