<!DOCTYPE html>
<html lang="en">
<?php 
include("conn.php");
include("session.php");

$sql = "SELECT sum(case type when 'income' then amount else 0 end) as type_income, sum(case type when 'expense' then amount else 0 end) as type_expense, `account`.`user_id`, extract(year from date) as year, extract(month from date) as month FROM `transaction` LEFT JOIN `account` ON `transaction`.`account_id` = `account`.`account_id` WHERE account.user_id='$_SESSION[mySession]' group by extract(year from date), extract(month from date) order by year, month";
$query = "SELECT `transaction`.`category`,SUM(amount), `account`.`user_id`
FROM `transaction` 
	LEFT JOIN `account` ON `transaction`.`account_id` = `account`.`account_id`
    WHERE account.user_id='$_SESSION[mySession]' AND transaction.type='expense' GROUP BY category";  
$result_chart = mysqli_query($con, $query);
$result= mysqli_query($con,$sql);

?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
          vAxis: {minValue: 0},
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
  </script>
	
<script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Category', 'Amount'],  
                          <?php  
                          while($row = mysqli_fetch_array($result_chart))  
                          {  
                               echo "['".$row["category"]."', ".$row["SUM(amount)"]."],";  
                          }  
                          ?>  
                     ]);  

                      // Set chart options
      				var options = {
                     'width':380,
                     'height':270
						};

                      
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data,options);  
           }  
</script>

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="client_dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PRIME BUDGET</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="client_dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-wallet"></i>
          <span>Account</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Account Component:</h6>
            <a class="collapse-item" href="viewrecord.php">Record</a>
            <a class="collapse-item" href="account_information.php">Account Information</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-money-bill"></i>
          <span>Goal And Debt</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action:</h6>
            <a class="collapse-item" href="Goal.php">Goal</a>
            <a class="collapse-item" href="Debt.php">Debt</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Report
      </div>
		
		 <!-- Nav Item - Report -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true" aria-controls="collapseReport">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Report</span>
        </a>
        <div id="collapseReport" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Report Type:</h6>
            <a class="collapse-item" href="expense_report.php">Expenses Report</a>
			<a class="collapse-item" href="cashflow_report.php">Cash Flow Report</a>
          </div>
        </div>
      </li>
		
	 <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Others
      </div>
		
      <!-- Nav Item - Feedback -->
        <li class="nav-item">
        <a class="nav-link" href="feedback.php">
          <i class="fas fa-fw fa-comments"></i>
          <span>Feedback</span></a>
      </li>	
      <!-- Nav Item - Customer Support -->
      <li class="nav-item">
        <a class="nav-link" href="custsupport.php">
          <i class="fas fa-fw fa-headset"></i>
          <span>Customer Support</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'] ?></span>
                <img class="img-profile rounded-circle" src="img/user icon.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="user_detail.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>
			
		<!-----Account Card Php---------->
		<?php
		  include("conn.php");
          $user_id = intval($_SESSION['mySession']);
          $result = mysqli_query($con,"select * from user where user_id=$user_id");
          while($row=mysqli_fetch_array($result))
          {
				$result2 = mysqli_query($con,"SELECT * FROM account where user_id='$user_id' and account_no='1'");
				$result3 = mysqli_query($con,"SELECT * FROM account where user_id='$user_id' and account_no='2'");
				$result4 = mysqli_query($con,"SELECT * FROM account where user_id='$user_id' and account_no='3'");
				$result5 = mysqli_query($con,"SELECT * FROM account where user_id='$user_id' and account_no='4'");
			}
			 ?>
			
          <!-- Content Row -->
          <div class="row">
			<?php
			while($row = mysqli_fetch_array($result2))
			{
			?>
            <!-- Account 1 Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $row['account_name']; ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">RM<?php echo $row['total_amount']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-wallet fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<?php
			}
			?>
            <!-- Account 2 Card Example -->
			<?php
			while($row = mysqli_fetch_array($result3))
			{
			?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><?php echo $row['account_name']; ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">RM<?php echo $row['total_amount']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-wallet fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<?php
			}
			?>
			  
            <!-- Earnings (Monthly) Card Example -->
			<?php
			while($row = mysqli_fetch_array($result4))
			{
			?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $row['account_name']; ?></div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">RM<?php echo $row['total_amount']; ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-wallet fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<?php
			}
			?>
            <!-- Pending Requests Card Example -->
			 <?php
			while($row = mysqli_fetch_array($result5))
			{
			?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><?php echo $row['account_name']; ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">RM<?php echo $row['total_amount']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-wallet fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
			<?php
			}
			?>
          <!-- Content Row -->
		<div class="row">
		<div class="col-xl-3 col-md-6 mb-4">
		<a class="btn btn-primary btn-icon-split" href="addrecord.php">
		 <span class="icon text-white-50">
		<i class="fas fa-list-ul"></i>
         </span>
          <span class="text">Add Record</span>
		</a>
		</div>
		</div>

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Income and Expense Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area"  id="chart_div" style="width: 100%;">
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Expenses Category</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
					  <div id="piechart"></div>
					</div>
                  </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
			<div class="col-lg-6 mb-4">
            
            <?php
          include("conn.php");
          $user_id = intval($_SESSION['mySession']);
          $result6 = mysqli_query($con,"select * from user where user_id=$user_id");
          while($row=mysqli_fetch_array($result6))
          {
           include("conn.php");
				$result7 = mysqli_query($con,"SELECT * FROM goal where user_id='$user_id' and status='active' ORDER BY amount_hold DESC LIMIT 0,1");
				$result8 = mysqli_query($con,"SELECT * FROM goal where user_id='$user_id' and status='active' ORDER BY amount_hold DESC LIMIT 1,1");
				$result9 = mysqli_query($con,"SELECT * FROM goal where user_id='$user_id' and status='active' ORDER BY amount_hold DESC LIMIT 2,1");
				$result10 = mysqli_query($con,"SELECT * FROM goal where user_id='$user_id' and status='active' ORDER BY amount_hold DESC LIMIT 3,1");
				$result11 = mysqli_query($con,"SELECT * FROM goal where user_id='$user_id' and status='active' ORDER BY amount_hold DESC LIMIT 4,1");


				}
					
			 ?>
			

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Goals</h6>
                </div>
                <div class="card-body">
                <?php
                while($row7 = mysqli_fetch_array($result7))
			{
			 $amounthold = $row7['amount_hold'];
			 $amountneeded = $row7['amount_needed'];
			 
			 $divided = $amounthold / $amountneeded;
			 
			 $percent = $divided * 100;
			 
			?>
			
                  <h4 class="small font-weight-bold"> <?php echo $row7['goal_name']; ?> <span class="float-right"><?php echo $percent ?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $percent ?>% " aria-valuenow="<?php echo $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  
                  <?php
                  }
					?>
					
					<?php
                while($row8 = mysqli_fetch_array($result8))
			{
			 $amounthold = $row8['amount_hold'];
			 $amountneeded = $row8['amount_needed'];
			 
			 $divided = $amounthold / $amountneeded;
			 
			 $percent = $divided * 100;
			 
			?>
			
                  <h4 class="small font-weight-bold"> <?php echo $row8['goal_name']; ?> <span class="float-right"><?php echo $percent ?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo $percent ?>% " aria-valuenow="<?php echo $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  
                  <?php
                  }
					?>                  			

				<?php
                while($row9 = mysqli_fetch_array($result9))
			{
			 $amounthold = $row9['amount_hold'];
			 $amountneeded = $row9['amount_needed'];
			 
			 $divided = $amounthold / $amountneeded;
			 
			 $percent = $divided * 100;
			 
			?>
			
                  <h4 class="small font-weight-bold"> <?php echo $row9['goal_name']; ?> <span class="float-right"><?php echo $percent ?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $percent ?>% " aria-valuenow="<?php echo $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  
                  <?php
                  }
					?>
                  <?php
                while($row10 = mysqli_fetch_array($result10))
			{
			 $amounthold = $row10['amount_hold'];
			 $amountneeded = $row10['amount_needed'];
			 
			 $divided = $amounthold / $amountneeded;
			 
			 $percent = $divided * 100;
			 
			?>
			
                  <h4 class="small font-weight-bold"> <?php echo $row10['goal_name']; ?> <span class="float-right"><?php echo $percent ?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $percent ?>% " aria-valuenow="<?php echo $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  
                  <?php
                  }
					?>
					
					 <?php
                while($row11 = mysqli_fetch_array($result11))
			{
			 $amounthold = $row11['amount_hold'];
			 $amountneeded = $row11['amount_needed'];
			 
			 $divided = $amounthold / $amountneeded;
			 
			 $percent = $divided * 100;
			 
			?>
			
                  <h4 class="small font-weight-bold"> <?php echo $row11['goal_name']; ?> <span class="float-right"><?php echo $percent ?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $percent ?>% " aria-valuenow="<?php echo $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  
                  <?php
                  }
					?>


                                       
                </div>
              </div>
 				<?php
              
              mysqli_close($con);
              ?>
			  </div>
			<!-- Debt -->

            <div class="col-lg-6 mb-4">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Debt</h6>
                </div>
                <div class="card-body">
					<?php include("conn.php");
					$result=mysqli_query($con,"SELECT* FROM debt where status='active' and user_id='$_SESSION[mySession]'");
					?>
					<div class="table-responsive">
                	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th scope="col">Name</th>
								<th scope="col">Borrow/Lend</th>
								<th scope="col">Repay Amount</th>
							</tr>
						  </thead>
						   <tbody>
								<?php
								while($row=mysqli_fetch_array($result))
								{
									echo"<tr>";
									echo"<td>";
									echo $row['debt_name'];
									echo"</td>";

									echo"<td>";
									echo $row['cash_OutIn'];
									echo"</td>";

									echo"<td>";
									echo $row['return_back'];
									echo"</td>";


								}
								mysqli_close($con);
								?>
						</tbody>
              		  </table>
              		</div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Prime Budget 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>
