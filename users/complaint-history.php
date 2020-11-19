<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.png);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
            <a href="dashboard.php">Dashboard</a>
	          </li>
	          <li>
	              <a href="#">About</a>
	          </li>
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Account settings</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="profile.php">Profile</a>
                </li>
                <li>
                    <a href="change-password.php">Change Password</a>
                </li>
              </ul>
	          </li>
	          <li>
              <a href="register-complaint.php">Lodge Complaint</a>
	          </li>
	          <li>
              <a href="complaint-history.php">Complaint History</a>
	          </li>
	        </ul>
	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <section id="main-content">
        <section class="wrapper">
          <h3><i class="fa fa-angle-right"></i>Your Complaint History</h3>
          <div class="row mt">
            <div class="col-lg-12">
              <div class="content-panel">
                <section id="unseen">
                  <table class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr style="text-align: center">
                        <th style="text-align: center">Complaint Number</th>
                        <th style="text-align: center">Reg Date</th>
                        <th style="text-align: center">last Updation date</th>
                        <th style="text-align: center">Status</th>
                        <th style="text-align: center">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php $query = mysqli_query($con, "select * from tblcomplaints where userId='" . $_SESSION['id'] . "'");
                      while ($row = mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td align="center"><?php echo htmlentities($row['complaintNumber']); ?></td>
                          <td align="center"><?php echo htmlentities($row['regDate']); ?></td>
                          <td align="center"><?php echo  htmlentities($row['lastUpdationDate']);

                                              ?></td>
                          <td align="center"><?php
                                              $status = $row['status'];
                                              if ($status == "" or $status == "NULL") { ?>
                              <button type="button" class="btn btn-theme04">Not Process Yet</button>
                            <?php }
                                              if ($status == "in process") { ?>
                              <button type="button" class="btn btn-warning">In Process</button>
                            <?php }
                                              if ($status == "closed") {
                            ?>
                              <button type="button" class="btn btn-success">Closed</button>
                            <?php } ?>
                          <td align="center">
                            <a href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']); ?>">
                              <button type="button" class="btn btn-primary">View Details</button></a>
                          </td>
                        </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </section>
              </div><!-- /content-panel -->
            </div><!-- /col-lg-4 -->
          </div><!-- /row -->



        </section>
        <! --/wrapper -->
      </section>
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<?php } ?>
