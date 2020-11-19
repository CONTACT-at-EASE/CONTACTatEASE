<?php session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else { ?>
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
        <section id="main-content" style="padding-left:5%; color:#000">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> Complaint Details</h3>
            <hr />

            <?php $query = mysqli_query($con, "select tblcomplaints.*,category.categoryName as catname from tblcomplaints join category on category.id=tblcomplaints.category where userId='" . $_SESSION['id'] . "' and complaintNumber='" . $_GET['cid'] . "'");
            while ($row = mysqli_fetch_array($query)) { ?>
              <div class="row mt">
                <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Number : </b></label>
                <div class="col-sm-4">
                  <p><?php echo htmlentities($row['complaintNumber']); ?></p>
                </div>
                <label class="col-sm-2 col-sm-2 control-label"><b>Reg. Date :</b></label>
                <div class="col-sm-4">
                  <p><?php echo htmlentities($row['regDate']); ?></p>
                </div>
              </div>


              <div class="row mt">
                <label class="col-sm-2 col-sm-2 control-label"><b>Category :</b></label>
                <div class="col-sm-4">
                  <p><?php echo htmlentities($row['catname']); ?></p>
                </div>
                <label class="col-sm-2 col-sm-2 control-label"><b>Sub Category :</b> </label>
                <div class="col-sm-4">
                  <p><?php echo htmlentities($row['subcategory']); ?></p>
                </div>
              </div>



              <div class="row mt">
                <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Type :</b></label>
                <div class="col-sm-4">
                  <p><?php echo htmlentities($row['complaintType']); ?></p>
                </div>
                <label class="col-sm-2 col-sm-2 control-label"><b>State :</b></label>
                <div class="col-sm-4">
                  <p><?php echo htmlentities($row['state']); ?></p>
                </div>
              </div>



              <div class="row mt">
                <label class="col-sm-2 col-sm-2 control-label"><b>Nature of Complaint:</b></label>
                <div class="col-sm-4">
                  <p><?php echo htmlentities($row['noc']); ?></p>
                </div>
                <label class="col-sm-2 col-sm-2 control-label"><b>File :</b></label>
                <div class="col-sm-4">
                  <p><?php $cfile = $row['complaintFile'];
                      if ($cfile == "" || $cfile == "NULL") {
                        echo htmlentities("File NA");
                      } else { ?>
                      <a href="complaintdocs/<?php echo htmlentities($row['complaintFile']); ?>" target='_blank'> View File</a>
                    <?php } ?>

                  </p>
                </div>
              </div>
              <div class="row mt">
                <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Details </label>
                <div class="col-sm-10">
                  <p><?php echo htmlentities($row['complaintDetails']); ?></p>
                </div>

              </div>



              <?php
              $ret = mysqli_query($con, "select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='" . $_GET['cid'] . "'");
              while ($rw = mysqli_fetch_array($ret)) {
              ?>
                <div class="row mt">

                  <label class="col-sm-2 col-sm-2 control-label"><b>Remark:</b></label>
                  <div class="col-sm-10">
                    <?php echo  htmlentities($rw['remark']); ?>&nbsp;&nbsp; <br /><b>Remark Date: <?php echo  htmlentities($rw['rdate']); ?></b>
                  </div>
                </div>
                <div class="row mt">

                  <label class="col-sm-2 col-sm-2 control-label"><b>Status:</b></label>
                  <div class="col-sm-10">
                    <?php echo  htmlentities($rw['sstatus']); ?>
                  </div>
                </div>

              <?php } ?>

              <div class="row mt">

                <label class="col-sm-2 col-sm-2 control-label"><b>Final Status :</b></label>
                <div class="col-sm-4">
                  <p style="color:red"><?php

                                        if ($row['status'] == "NULL" || $row['status'] == "") {
                                          echo "Not Process yet";
                                        } else {
                                          echo htmlentities($row['status']);
                                        }
                                        ?></p>
                </div>
              </div>





            <?php } ?>
          </section>
          <! --/wrapper -->
        </section </div> </div> <script src="js/jquery.min.js">
        </script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
  </body>

  </html>
<?php } ?>