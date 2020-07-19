<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Debt</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
	<script>
	function setdebt(id){
	document.getElementById("exampleFormControlInput2").value = id;
	}
	//function goalname(id1){
	//document.getElementById("exampleFormControlInput3").value = id1;

	//}
	</script>
</head>

<body id="page-top">

		<?php
		include ("session.php");
			error_reporting(0);
		?>
		
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
            <h1 class="h3 mb-0 text-gray-800">Debt</h1>
			<p class="mb-4">“Some debts are fun when you are acquiring them, but none are fun when you set about retiring them.”</p>

		
  <!-- Content Row -->

          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <form action="DebtForm.php">
                  	<h6 class="m-0 font-weight-bold text-primary">List of Debts &nbsp;&nbsp;
						<button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add New Debt</span>
                  </button>
                  <a type="button" class="btn btn-success btn-icon-split" href="#reached_debt" >
				   <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Reached Debts</span>
                  </a>
                   	</h6>
                   </form>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     
                    </a>
                   </div>
                </div>
                
                <!-- Card Body -->
			<?php include("conn.php");
			$result=mysqli_query($con,"SELECT * FROM debt WHERE status='active' and user_id='$_SESSION[mySession]'");
			?>                <div class="card-body">
                  <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
                    <tr>
						<th scope="col">Debt Name</th>
						<th scope="col">Type</th>
						<th scope="col">Cash Out / In</th>
						<th scope="col">Return Amount</th>
						<th scope="col">Remark</th>
						<th scope="col">Status</th>
						<th scope="col">Details</th>
						<th scope="col">Add Amount</th>
						
	                    </tr>
                  </thead>
					  <tbody>
						<?php
						while($row=mysqli_fetch_array($result))
						{
							echo"<tr>";							
							echo"<td class='debtname'>";
							echo $row['debt_name'];
							echo"</td>";

							echo"<td>";
							echo $row['type'];
							echo"</td>";
							
							echo"<td>";
							echo $row['cash_OutIn'];
							echo"</td>";

							echo"<td>";
							echo $row['return_back'];
							echo"</td>";

							echo"<td>";
							echo $row ['remark'];
							echo"</td>";
							
							echo"<td>";
							echo $row ['status'];
							echo"</td>";
																
							echo "<td><a href=\"View_debt.php?debt_id=";
							echo $row['debt_id'];
							echo "\">View</a></td>";
							
							echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#exampleModalCenter' onclick=\"setdebt('";
							echo $row['debt_id'];
							echo "')\" value=''";
							//echo "'onclick=\"goalname('";
							//echo $row['goal_name'];
							//echo "')\" value=''";
							echo ">Add</button></td>";
							
							echo"</tr>";
			
							}
						mysqli_close($con);
						?>

                </table>
              
              </div>
                </div>
              </div>
            
            <!-- Content Row -->
			</div>
             
			 <!--Card Body -->			
               <div class="col-xl-4 col-lg-5">                     
 			
			<!--Card Body -->			
             
            <!-- Borrow Progress Bar -->
		   <?php
          include("conn.php");
          $user_id = intval($_SESSION['mySession']);
          $result6 = mysqli_query($con,"select * from user where user_id=$user_id");
          while($row=mysqli_fetch_array($result6))
          {
           include("conn.php");
				$result2 = mysqli_query($con,"SELECT SUM(return_back) AS totalhold FROM debt where user_id='$user_id' and status='active' and type='Borrow'");
				$result3 = mysqli_query($con,"SELECT SUM(cash_OutIn) AS totalneeded FROM debt where user_id='$user_id' and status='active' and type='Borrow'");


				}
					
			 ?>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Overall</h6>
                </div>
                <div class="card-body">
			 <?php
                while(($row2 = mysqli_fetch_array($result2)) && ($row3 = mysqli_fetch_array($result3)))
			{
			 $amounthold = $row2['totalhold'];
			 $amountneeded = $row3['totalneeded'];
			 
			 $divided = $amounthold / $amountneeded;
			 
			 $percent = $divided * 100;
			 
			?>

                  <h4 class="small font-weight-bold">Remaining Borrow Amount<span class="float-right" id="current_progress1"><?php echo $percent ?>%</span></h4>
                  <div class="progress mb-4" id="dynamic1">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percent ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
				  <?php
			        }
              
              mysqli_close($con);
				?>
					
			<!---------Lend Progress Bar--------------->
		   <?php
          include("conn.php");
          $user_id = intval($_SESSION['mySession']);
          $result61 = mysqli_query($con,"select * from user where user_id=$user_id");
          while($row=mysqli_fetch_array($result61))
          {
           include("conn.php");
				$result21 = mysqli_query($con,"SELECT SUM(return_back) AS totalhold1 FROM debt where user_id='$user_id' and status='active' and type='Lent'");
				$result31 = mysqli_query($con,"SELECT SUM(cash_OutIn) AS totalneeded1 FROM debt where user_id='$user_id' and status='active' and type='Lent'");


				}
		           while(($row21 = mysqli_fetch_array($result21)) && ($row31 = mysqli_fetch_array($result31)))
			{
			 $amounthold1 = $row21['totalhold1'];
			 $amountneeded1 = $row31['totalneeded1'];
			 
			 $divided1 = $amounthold1 / $amountneeded1;
			 
			 $percent1 = $divided1 * 100;
			 ?>
			       <h4 class="small font-weight-bold">Remaining Lend Amount<span class="float-right" id="current_progress"><?php echo $percent1 ?>%</span></h4>
                  <div class="progress mb-4" id="dynamic">
                    <div class="progress-bar bg-info" role="progressbar" style="width:<?php echo $percent1 ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
				  <?php
			        }
              
              mysqli_close($con);
				?>
					
                  </div>

                  </div>
                  
                  </div>
                  </div>
                  
           <div class="row" id="reached_debt">
            <!-- Area Chart -->
            <div class="col-lg-6 mb-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <form action="GoalForm.php">
                  	<h6 class="m-0 font-weight-bold text-primary">Finished Debt &nbsp;&nbsp;
                   	</h6>
                   </form>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     
                    </a>
                   </div>
                </div>
                
                <!-- Card Body -->
			<?php include("conn.php");
			$result2=mysqli_query($con,"SELECT * FROM debt WHERE status='inactive' and user_id='$_SESSION[mySession]'");
			?>                <div class="card-body">
                  <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
                    <tr>
						<th scope="col">Debt Name</th>
						<th scope="col">Type</th>
						<th scope="col">Cash Out / In</th>
						<th scope="col">Return Amount</th>
						<th scope="col">Remark</th>
						<th scope="col">Status</th>
	                    </tr>
                  </thead>
					  <tbody>
						<?php
						while($row=mysqli_fetch_array($result2))
						{
							echo"<tr>";							
							echo"<td class='goalname'>";
							echo $row['debt_name'];
							echo"</td>";
							
							echo"<td>";
							echo $row['type'];
							echo"</td>";

							echo"<td>";
							echo $row['cash_OutIn'];
							echo"</td>";

							echo"<td>";
							echo $row['return_back'];
							echo"</td>";

							echo"<td>";
							echo $row ['remark'];
							echo"</td>";
							
							echo"<td>";
							echo $row ['status'];
							echo"</td>";
							
							echo"</tr>";
			
							}
						mysqli_close($con);
						?>

                </table>
              </div>
                </div>
              </div>
            </div>
			   
			   <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Instruction</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="svg/debt.svg.svg" alt="">
                  </div>
                  <p>Plan your work, work you plan. Add your goal that you want to achieve and keep track here.</p>
                  <a target="_blank" rel="nofollow" href="GoalForm.php">Start add you goal now</a>
                </div>
              </div>


            </div>
			   
            </div>
                  
      <!-- /.container-fluid -->
      </div>
		<!-- End of Main Content -->
 		</div>
 		
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
  
  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Amount</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      <div class="modal-body">
      
      
         <form action="Add_DebtAmount.php" method="post">
         
                <div class="form-group">
                <input name="userid" type="hidden" class="form-control" id="exampleFormControlInput1" value="<?php echo $_SESSION['mySession']?>">
      			<input name="debt_id" type="hidden" class="form-control" id="exampleFormControlInput2" value="">
             	<div class="form-group">

      			<!--<input name="goal_name" type="text" class="form-control" id="exampleFormControlInput3" value="">-->
			    			    
			  </div>
			  
             	
          		<input name="addamount" type="number" class="form-control" id="exampleFormControlInput4" placeholder="RM">
          		</div>
          		<button name="submit "type="submit" class="btn btn-success btn-icon-split btn-block">
                     <span class="text">Add Amount</span>
                  </button>
                  
				</form>

      
      </div>
    </div>
  </div>
</div>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
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
  <script src="js/demo/datatables-demo.js"></script>
	
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>
