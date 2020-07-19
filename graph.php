<!DOCTYPE html>
<html>

<?php 
include("conn.php");
include("session.php");

$sql = "select sum(case type when 'income' then amount else 0 end) as type_income, sum(case type when 'expense' then amount else 0 end) as type_expense, `user`.`user_id`,`user`.`name`, extract(year from date) as year, extract(month from date) as month from transaction,`user` WHERE user.user_id='$_SESSION[mySession]' group by extract(year from date), extract(month from date) order by year, month";


$result= mysqli_query($con,$sql);

?>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Untitled 1</title>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Incomes', 'Expenses'],
           <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row['month']."', ".$row['type_income'].", ".$row['type_expense']."],";  
                          }  
                          ?>        ]);

        var options = {
          title: 'Record Report',
          hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
  </script>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
  </body>
</html>
