<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());


    if (isset($_POST['submit'])) {
        $fname = $_POST['fullname'];
        $contactno = $_POST['contactno'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $pincode = $_POST['pincode'];
        $query = mysqli_query($con, "update users set fullName='$fname',contactNo='$contactno',address='$address',State='$state',country='$country',pincode='$pincode' where userEmail='" . $_SESSION['login'] . "'");
        if ($query) {
            $successmsg = "Profile Successfully !!";
        } else {
            $errormsg = "Profile not updated !!";
        }
    }
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
                        <h3><i class="fa fa-angle-right"></i> Profile info</h3>
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
                                    <?php $query = mysqli_query($con, "select * from users where userEmail='" . $_SESSION['login'] . "'");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <h4 class="mb"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo htmlentities($row['fullName']); ?>'s Profile</h4>
                                        <h5><b>Last Updated at :</b>&nbsp;&nbsp;<?php echo htmlentities($row['updationDate']); ?></h5>
                                        <form class="form-horizontal style-form" method="post" name="profile">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Full Name</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="fullname" required="required" value="<?php echo htmlentities($row['fullName']); ?>" class="form-control">
                                                </div>
                                                <label class="col-sm-2 col-sm-2 control-label">User Email </label>
                                                <div class="col-sm-4">
                                                    <input type="email" name="useremail" required="required" value="<?php echo htmlentities($row['userEmail']); ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Contact</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="contactno" required="required" value="<?php echo htmlentities($row['contactNo']); ?>" class="form-control">
                                                </div>
                                                <label class="col-sm-2 col-sm-2 control-label">Address </label>
                                                <div class="col-sm-4">
                                                    <textarea name="address" required="required" class="form-control"><?php echo htmlentities($row['address']); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">State</label>
                                                <div class="col-sm-4">
                                                    <select name="state" required="required" class="form-control">
                                                        <option value="<?php echo htmlentities($row['State']); ?>"><?php echo htmlentities($st = $row['State']); ?></option>
                                                        <?php $sql = mysqli_query($con, "select stateName from state ");
                                                        while ($rw = mysqli_fetch_array($sql)) {
                                                            if ($rw['stateName'] == $st) {
                                                                continue;
                                                            } else {
                                                        ?>
                                                                <option value="<?php echo htmlentities($rw['stateName']); ?>"><?php echo htmlentities($rw['stateName']); ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <label class="col-sm-2 col-sm-2 control-label">Country </label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="country" required="required" value="<?php echo htmlentities($row['country']); ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Pincode</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="pincode" maxlength="6" required="required" value="<?php echo htmlentities($row['pincode']); ?>" class="form-control">
                                                </div>
                                                <label class="col-sm-2 col-sm-2 control-label">Reg Date </label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="regdate" required="required" value="<?php echo htmlentities($row['regDate']); ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">User Photo</label>
                                                <div class="col-sm-4">
                                                    <?php $userphoto = $row['userImage'];
                                                    if ($userphoto == "") :
                                                    ?>
                                                        <img src="userimages/noimage.png" width="256" height="256">
                                                        <a href="update-image.php">Change Photo</a>
                                                    <?php else : ?>
                                                        <img src="userimages/<?php echo htmlentities($userphoto); ?>" width="256" height="256">
                                                        <a href="update-image.php">Change Photo</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php } ?>
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
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            //custom select box

            $(function() {
                $('select.styled').customSelect();
            });
        </script>
    </body>

    </html>
<?php } ?>