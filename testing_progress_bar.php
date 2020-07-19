 <?php  
 $connect = mysqli_connect("localhost", "root", "", "prime");  
 $query = "SELECT amount_hold, count(*) as number FROM goal";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <html lang="en">
<head>
<title>Progress Bar</title>
</head>
<body>
<!-- Progress bar holder -->
<div id="progress" style="width:500px;border:1px solid #ccc; display: inline-block;"></div> &nbsp; <div style="display: inline-block;" id="somethn"></div> <br>
<!-- Progress information -->
<div id="information" style="width"></div>

<?php
// Total processes
$total = 300;
// Loop through process
for($i=1; $i<=$total; $i++){
// Calculate the percentation
$percent = intval($i/$total * 100)."%";

// Javascript for updating the progress bar and information
echo '<script language="javascript">
document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
document.getElementById("somethn").innerHTML="'.$percent.'";
document.getElementById("information").innerHTML="'.$i.' row(s) processed.";
</script>';

// This is for the buffer achieve the minimum size in order to flush data
echo str_repeat(' ',1024*64);

// Send output to browser immediately
flush();
}
// Tell user that the process is completed
// echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';
?>

</body>
</html>