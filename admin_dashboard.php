<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">My Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="admin_dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Action
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="user_list.php">
          <i class="fas fa-users"></i>
          <span>User List</span></a>
      </li>

      <!-- Nav Item - Feedback -->
      <li class="nav-item">
        <a class="nav-link" href="feedback_admin.php">
          <i class="fas fa-fw fa-comments"></i>
          <span>Feedback</span></a>
      </li>

		 <!-- Nav Item - Customer Support -->
      <li class="nav-item">
        <a class="nav-link" href="customer_support_admin.php">
          <i class="fas fa-fw fa-headset"></i>
          <span>Customer Support</span></a>
      </li>

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
           <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
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

          <!-- Content Row -->
          <div class="row">

            <!-- Number of User card -->
			  <?php
			  include("conn.php");
			  $user=mysqli_query($con, "SELECT * from user where status='active'");
			  $row=mysqli_num_rows($user);
			  ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Number Of User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Number of Feedback Card -->
			<?php
			include("conn.php");
			$feedback=mysqli_query($con, "SELECT * from feedback");
			$row=mysqli_num_rows($feedback);
			?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Feedback</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row ?></div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Number of Customer Support -->
            <?php
			  include("conn.php");
			  $cusno=mysqli_query($con,"SELECT `customer_support`.`cus_sup_id`, `customer_support`.`title`, `customer_support`.`description`, `customer_support`.`respond`, `customer_support`.`status`, `user`.`name`, `customer_support`.`user_id` FROM `customer_support` 
	LEFT JOIN `user` ON `customer_support`.`user_id` = `user`.`user_id`
	where `customer_support`.`status`='pending';");
			  $row=mysqli_num_rows($cusno);
			  ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Customer Support</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-headset fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- User list -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
               	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">List of User</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Action</div>
                      <a class="dropdown-item" href="user_list.php">View All User</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
			<?php include("conn.php");
			$result=mysqli_query($con,"SELECT* FROM user where status='active'");
			?>
                <div class="card-body">
                  <div class="table-responsive">
                	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th scope="col">User ID</th>
								<th scope="col">Name</th>
								<th scope="col">Age</th>
								<th scope="col">Gender</th>
								<th scope="col">Email</th>
								<th scope="col">Phone Number</th>
								<th scope="col">Status</th>
								<th scope="col">Username</th>
								<th scope="col">Details</th>
							</tr>
						  </thead>
						   <tbody>
								<?php
								while($row=mysqli_fetch_array($result))
								{
									echo"<tr>";
									echo"<td>";
									echo $row['user_id'];
									echo"</td>";

									echo"<td>";
									echo $row['name'];
									echo"</td>";

									echo"<td>";
									echo $row['age'];
									echo"</td>";

									echo"<td>";
									echo $row ['gender'];
									echo"</td>";

									echo"<td>";
									echo $row ['email'];
									echo"</td>";

									echo"<td>";
									echo $row ['phone_no'];
									echo"</td>";

									echo"<td>";
									echo $row ['status'];
									echo"</td>";

									echo"<td>";
									echo $row ['username'];
									echo"</td>";

									echo "<td><a href=\"view_user.php?user_id=";
									echo $row['user_id'];
									echo "\">View</a></td></tr>"; 

								}
								mysqli_close($con);
								?>
						</tbody>
              		  </table>
              		</div>
                </div>
              </div>
            </div>

            <!-- Feedback -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Feedback</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Action:</div>
                      <a class="dropdown-item" href="feedback_admin.php">View All Feedback</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
				 <?php include("conn.php");
				  $result=mysqli_query($con,"SELECT* FROM feedback");
				 ?>
                <div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th scope="col">Feedback Description</th>
								<th scope="col">Rating</th>
							</tr>
						</thead>
						<tbody>
							<?php
							while($row=mysqli_fetch_array($result))
							{
							echo"<tr>";
							echo"<td>";
							echo $row['description'];
							echo"</td>";
							echo"<td>";
							echo $row['rating'];
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

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
				
				<!----customer Support----------->
				<div class="card shadow mb-4">
                <div class="card-header py-3  py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Customer Support</h6>
		          <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Action:</div>
                      <a class="dropdown-item" href="customer_support_admin.php">View All Customer Support</a>
                    </div>
                  </div>
                </div>
				  
				  <?php include("conn.php");
				  $result=mysqli_query($con,"SELECT* FROM customer_support where status='pending'");
				 ?>
                <div class="card-body">
					<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th scope="col">Title</th>
							<th scope="col">Description</th>
						</tr>
					  </thead>
						  <tbody>
							<?php
							while($row=mysqli_fetch_array($result))
							{
								echo"<tr>";
								echo"<td>";
								echo $row['title'];
								echo"</td>";

								echo"<td>";
								echo $row['description'];
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

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Menu</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="svg/admin.svg" alt="">
                  </div>
                  <p>This is an admin Side. It allow admin to perform administration right activity like delete user, view feedback and response to customer support</p>
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
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
	  
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

	  
</body>

</html>
