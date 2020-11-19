<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {

  if (isset($_POST['submit'])) {
    $uid = $_SESSION['id'];
    $category = $_POST['category'];
    $subcat = $_POST['subcategory'];
    $complaintype = $_POST['complaintype'];
    $state = $_POST['state'];
    $noc = $_POST['noc'];
    $complaintdetials = $_POST['complaindetails'];
    $compfile = $_FILES["compfile"]["name"];



    move_uploaded_file($_FILES["compfile"]["tmp_name"], "complaintdocs/" . $_FILES["compfile"]["name"]);
    $query = mysqli_query($con, "insert into tblcomplaints(userId,category,subcategory,complaintType,state,noc,complaintDetails,complaintFile) values('$uid','$category','$subcat','$complaintype','$state','$noc','$complaintdetials','$compfile')");
    // code for show complaint number
    $sql = mysqli_query($con, "select complaintNumber from tblcomplaints  order by complaintNumber desc limit 1");
    while ($row = mysqli_fetch_array($sql)) {
      $cmpn = $row['complaintNumber'];
    }
    $complainno = $cmpn;
    echo '<script> alert("Your complain has been successfully filled and your complaintno is  "+"' . $complainno . '")</script>';
  }
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5/css/bootstrap.min.css">
    <title>CMS | User Register Complaint</title>

    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script>
      function getCat(val) {
        //alert('val');

        $.ajax({
          type: "POST",
          url: "getsubcat.php",
          data: 'catid=' + val,
          success: function(data) {
            $("#subcategory").html(data);

          }
        });
      }
    </script>

  </head>

  <body>
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="p-4 pt-5">
          <a href="#" class="img logo mb-5" style="background-image: url(images/logo.png);"></a>
          <ul class="list-unstyled components mb-5">
            <li>
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
            <li class="active">
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
        <section id="container">
          <section id="main-content">
            <section class="wrapper">
              <h3><i class="fa fa-angle-right"></i> Register Complaint</h3>
              <!-- BASIC FORM ELELEMNTS -->
              <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                    <?php if ($successmsg) { ?>
                      <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Well done!</b> <?php echo htmlentities($successmsg); ?></div>
                    <?php } ?>

                    <?php if ($errormsg) { ?>
                      <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg); ?></div>
                    <?php } ?>
                    <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data">

                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Category</label>
                        <div class="col-sm-4">
                          <select name="category" id="category" class="form-control" onChange="getCat(this.value);" required="">
                            <option value="">Select Category</option>
                            <?php $sql = mysqli_query($con, "select id,categoryName from category ");
                            while ($rw = mysqli_fetch_array($sql)) {
                            ?>
                              <option value="<?php echo htmlentities($rw['id']); ?>"><?php echo htmlentities($rw['categoryName']); ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <label class="col-sm-2 col-sm-2 control-label">Sub Category </label>
                        <div class="col-sm-4">
                          <select name="subcategory" id="subcategory" class="form-control">
                            <option value="">Select Subcategory</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Complaint Type</label>
                        <div class="col-sm-4">
                          <select name="complaintype" class="form-control" required="">
                            <option value="First-time complaint">First-time complaint</option>
                            <option value="Serial complaint">Serial complaint</option>
                            <option value="Urgent Complaint">Urgent complaint</option>
                            <option value="Quality of service-related complaint">Quality of service-related complaint</option>
                            <option value="Others">Others</option>
                          </select>
                        </div>
                        <label class="col-sm-2 col-sm-2 control-label">State</label>
                        <div class="col-sm-4">
                          <select name="state" required="required" class="form-control">
                            <option value="">Select State</option>
                            <?php $sql = mysqli_query($con, "select stateName from state ");
                            while ($rw = mysqli_fetch_array($sql)) {
                            ?>
                              <option value="<?php echo htmlentities($rw['stateName']); ?>"><?php echo htmlentities($rw['stateName']); ?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nature of Complaint</label>
                        <div class="col-sm-4">
                          <input type="text" name="noc" required="required" value="" required="" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Complaint Details (max 2000 words) </label>
                        <div class="col-sm-6">
                          <textarea name="complaindetails" required="required" cols="10" rows="10" class="form-control" maxlength="2000"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Complaint Related Doc(if any) </label>
                        <div class="col-sm-6">
                          <input type="file" name="compfile" class="form-control" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-10" style="padding-left:25% ">
                          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </section>
          </section>
        </section>
      </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js " integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js " integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s " crossorigin="anonymous "></script>
    <script src="js/main.js"></script>
    <script>
      $(function() {
        $('select.styled').customSelect();
      });
    </script>

  </body>

  </html>
<?php } ?>