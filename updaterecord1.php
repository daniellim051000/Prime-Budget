<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Record</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">


</head>

<body id="page-top">

<?php 
	include("session.php");
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
          <h1 class="h3 mb-2 text-gray-800">Record</h1>
          <p class="mb-4">“Budgeting has only one rule: Do not go over budget.”</p>

          <!-- DataTales Example -->
          <?php
          include("conn.php");
          $user_id = intval($_SESSION['mySession']);
          $result = mysqli_query($con,"select * from user where user_id=$user_id");
          while($row=mysqli_fetch_array($result))
          {
           $recordid = intval($_GET['recid']);
          $result2 = mysqli_query($con,"SELECT * FROM transaction WHERE record_id=$recordid;");
			
			if(!$result2)
			{
			die('error:'.mysqli_error($con));
			}
			while($row = mysqli_fetch_array($result2))
			{
			

          ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Record Information</h6>
            </div>
            <div class="card-body">
             <form class="user" action="updaterecord2.php" method="post">
                    <div class="form-group">
                      <label  for="type">Type of Record</label><br>
                      <select name="type" class="form-control">
  						<option value="expense" <?php if ($row['type'] == "expense") { ?> selected="selected" <?php } ?> >Expense</option>
  						<option value="income" <?php if ($row['type'] == "income") { ?> selected="selected" <?php } ?> >Income</option>
					</select>
                    </div>
                     
                    <div class="form-group">
                      <label  for="date">Date</label><br>
                    <input class="form-control" type="date" name="date" value="<?php echo $row['date'] ?>">
					</div>
					
                    <div class="form-group">
                      <label  for="category">Category</label><br>
                      <select name="category" class="form-control">
  						<option value="Food" <?php if ($row['category'] == "Food") { ?> selected="selected" <?php } ?>>Food</option>
  						<option value="Shopping" <?php if ($row['category'] == "Shopping") { ?> selected="selected" <?php } ?>>Shopping</option>
  						<option value="Housing"<?php if ($row['category'] == "Housing") { ?> selected="selected" <?php } ?>>Housing</option>
  						<option value="Transportation" <?php if ($row['category'] == "Transportation") { ?> selected="selected" <?php } ?>>Transportation</option>
  						<option value="Vehicle" <?php if ($row['category'] == "Vehicle") { ?> selected="selected" <?php } ?> >Vehicle</option>
  						<option value="Entertainment" <?php if ($row['category'] == "Entertainment") { ?> selected="selected" <?php } ?>>Entertainment</option>
  						<option value="Communication" <?php if ($row['category'] == "Communication") { ?> selected="selected" <?php } ?>>Communication & PC</option>
						<option value="Investment" <?php if ($row['category'] == "Investment") { ?> selected="selected" <?php } ?>>Investment</option>
  						<option value="Income" <?php if ($row['category'] == "Income") { ?> selected="selected" <?php } ?>>Income</option>
  						<option value="Others" <?php if ($row['category'] == "Others") { ?> selected="selected" <?php } ?>>Others</option>
					</select>
					</div>
					
					<div class="form-group">
                      <label  for="type">Amount</label><br>
                      <input type="number" class="form-control" id="exampleInputEmail" name="amount" placeholder="Enter Amount" value="<?php echo $row['amount'] ?>" required>
                    </div>
                    
                    <div class="form-group">
                      <label  for="type">description</label><br>
                      <input type="text" class="form-control" id="exampleInputEmail" name="description" placeholder="Enter Details" value="<?php echo $row['description'] ?>" >
                    </div>
                    
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="record_id" value="<?php echo $row['record_id'] ?>">
                    </div>
                     <div class="form-group">
                      <input type="hidden" class="form-control" name="accountid" value="<?php echo $row['account_id'] ?>">
                    </div>
                   
					<button class="btn btn-success btn-icon-split" type="submit">
					 <span class="icon text-white-50">
					<i class="fas fa-check"></i>
					 </span>
					  <span class="text">Save Changes</span>
					</button>
				 
                    <hr>
              </form>
              <?php
              }}
              mysqli_close($con);
              ?>
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
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
