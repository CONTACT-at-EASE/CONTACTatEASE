<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());


    if (isset($_POST['submit'])) {
        $sql = mysqli_query($con, "SELECT password FROM  admin where password='" . md5($_POST['password']) . "' && username='" . $_SESSION['alogin'] . "'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {
            $con = mysqli_query($con, "update admin set password='" . md5($_POST['newpassword']) . "', updationDate='$currentTime' where username='" . $_SESSION['alogin'] . "'");
            $_SESSION['msg'] = "Password Changed Successfully !!";
        } else {
            $_SESSION['msg'] = "Old Password not match !!";
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
        <script type="text/javascript">
            function valid() {
                if (document.chngpwd.password.value == "") {
                    alert("Current Password Filed is Empty !!");
                    document.chngpwd.password.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value == "") {
                    alert("New Password Filed is Empty !!");
                    document.chngpwd.newpassword.focus();
                    return false;
                } else if (document.chngpwd.confirmpassword.value == "") {
                    alert("Confirm Password Filed is Empty !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                    alert("Password and Confirm Password Field do not match  !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>
    </head>

    <body>

        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="p-4 pt-5">
                    <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.png);"></a>
                    <ul class="list-unstyled components mb-5">
                        <li class="active">
                        <li>
                            <a class="collapsed" data-toggle="collapse" href="#togglePages">
                                <i class="menu-icon icon-cog"></i>
                                <i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
                                Manage Complaint
                            </a>
                            <ul id="togglePages" class="collapse unstyled">
                                <li>
                                    <a href="notprocess-complaint.php">
                                        <i class="icon-tasks"></i>
                                        Grievance Pending
                                        <?php
                                        $rt = mysqli_query($con, "SELECT * FROM tblcomplaints where status is null");
                                        $num1 = mysqli_num_rows($rt); { ?>

                                            <b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
                                        <?php } ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="inprocess-complaint.php">
                                        <i class="icon-tasks"></i>
                                        Grievance in process
                                        <?php
                                        $status = "in Process";
                                        $rt = mysqli_query($con, "SELECT * FROM tblcomplaints where status='$status'");
                                        $num1 = mysqli_num_rows($rt); { ?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
                                        <?php } ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="closed-complaint.php">
                                        <i class="icon-inbox"></i>
                                        Grievance Closed
                                        <?php
                                        $status = "closed";
                                        $rt = mysqli_query($con, "SELECT * FROM tblcomplaints where status='$status'");
                                        $num1 = mysqli_num_rows($rt); { ?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
                                        <?php } ?>

                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="manage-users.php">
                                <i class="menu-icon icon-group"></i>
                                Manage users
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled components mb-5">
                        <li><a href="category.php"><i class="menu-icon icon-tasks"></i> Add Category </a></li>
                        <li><a href="subcategory.php"><i class="menu-icon icon-tasks"></i>Add Sub-Category </a></li>
                        <li><a href="state.php"><i class="menu-icon icon-paste"></i>Add State</a></li>


                    </ul>
                    <!--/.widget-nav-->
                    <ul class="list-unstyled components mb-5">
                        <li><a href="user-logs.php"><i class="menu-icon icon-tasks"></i>User Login Log </a></li>
                        <li>
                            <a href="logout.php">
                                <i class="menu-icon icon-signout"></i>
                                Logout
                            </a>
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
                                <a href="#" style="color: black;">
                                    Admin
                                </a>
                                <li class="nav-user dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="images/icon.jpg" class="nav-avatar" style="width: 34px;height: 34px; margin: -7px 5px 0 0;-webkit-border-radius: 50%;  -moz-border-radius: 50%; border-radius: 50%;">
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <a href="change-password.php">Change Password</a>
                                        <li class="divider"></li>
                                        <a href="logout.php">Logout</a>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="content">
                    <div class="module">
                        <div class="module-head">
                            <h3>Admin Change Password</h3>
                        </div>
                        <div class="module-body">
                            <?php if (isset($_POST['submit'])) { ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                </div>
                            <?php } ?>
                            <br />
                            <form class="form-horizontal row-fluid" name="chngpwd" method="post" onSubmit="return valid();">
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Current Password</label>
                                    <div class="controls">
                                        <input type="password" placeholder="Enter your current Password" name="password" class="span8 tip" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">New Password</label>
                                    <div class="controls">
                                        <input type="password" placeholder="Enter your new current Password" name="newpassword" class="span8 tip" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Current Password</label>
                                    <div class="controls">
                                        <input type="password" placeholder="Enter your new Password again" name="confirmpassword" class="span8 tip" required>
                                    </div>
                                </div>
                                <br>
                                <div class="controls">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>
<?php } ?>