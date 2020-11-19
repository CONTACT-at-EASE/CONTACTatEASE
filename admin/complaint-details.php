<?php
session_start();
include('include/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {


?>
    <!doctype html>
    <html lang="en">

    <head>
        <title>Sidebar 01</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script language="javascript" type="text/javascript">
			var popUpWin = 0;

			function popUpWindow(URLStr, left, top, width, height) {
				if (popUpWin) {
					if (!popUpWin.closed) popUpWin.close();
				}
				popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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
                            <h3>Complaint Details</h3>
                        </div>
                        <div class="module-body table">
                            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">

                                <tbody>

                                    <?php $st = 'closed';
                                    $query = mysqli_query($con, "select tblcomplaints.*,users.fullName as name,category.categoryName as catname from tblcomplaints join users on users.id=tblcomplaints.userId join category on category.id=tblcomplaints.category where tblcomplaints.complaintNumber='" . $_GET['cid'] . "'");
                                    while ($row = mysqli_fetch_array($query)) {

                                    ?>
                                        <tr>
                                            <td><b>Complaint Number</b></td>
                                            <td><?php echo htmlentities($row['complaintNumber']); ?></td>
                                            <td><b>User Name</b></td>
                                            <td> <?php echo htmlentities($row['name']); ?></td>
                                            <td><b>Reg Date</b></td>
                                            <td><?php echo htmlentities($row['regDate']); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><b>Category </b></td>
                                            <td><?php echo htmlentities($row['catname']); ?></td>
                                            <td><b>SubCategory</b></td>
                                            <td> <?php echo htmlentities($row['subcategory']); ?></td>
                                            <td><b>Complaint Type</b></td>
                                            <td><?php echo htmlentities($row['complaintType']); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>State </b></td>
                                            <td><?php echo htmlentities($row['state']); ?></td>
                                            <td><b>Nature of Complaint</b></td>
                                            <td colspan="3"> <?php echo htmlentities($row['noc']); ?></td>

                                        </tr>
                                        <tr>
                                            <td><b>Complaint Details </b></td>
                                            <td colspan="5"> <?php echo htmlentities($row['complaintDetails']); ?></td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td><b>File(if any) </b></td>
                                            <td colspan="5"> <?php $cfile = $row['complaintFile'];
                                                                if ($cfile == "" || $cfile == "NULL") {
                                                                    echo "File NA";
                                                                } else { ?>
                                                    <a href="../users/complaintdocs/<?php echo htmlentities($row['complaintFile']); ?>" target="_blank" /> View File</a>
                                                <?php } ?></td>
                                        </tr>

                                        <tr>
                                            <td><b>Final Status</b></td>
                                            <td colspan="5"><?php if ($row['status'] == "") {
                                                                echo "Not Process Yet";
                                                            } else {
                                                                echo htmlentities($row['status']);
                                                            } ?></td>

                                        </tr>

                                        <?php $ret = mysqli_query($con, "select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='" . $_GET['cid'] . "'");
                                        while ($rw = mysqli_fetch_array($ret)) {
                                        ?>
                                            <tr>
                                                <td><b>Remark</b></td>
                                                <td colspan="5"><?php echo  htmlentities($rw['remark']); ?> <b>Remark Date :</b><?php echo  htmlentities($rw['rdate']); ?></td>
                                            </tr>

                                            <tr>
                                                <td><b>Status</b></td>
                                                <td colspan="5"><?php echo  htmlentities($rw['sstatus']); ?></td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td><b>Action</b></td>

                                            <td>
                                                <?php if ($row['status'] == "closed") {
                                                } else { ?>
                                                    <a href="javascript:void(0);" onClick="popUpWindow('updatecomplaint.php?cid=<?php echo htmlentities($row['complaintNumber']); ?>');" title="Update order">
                                                        <button type="button" class="btn btn-primary">Take Action</button></td>
                                            </a><?php } ?></td>
                                        <td colspan="4">
                                            <a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?uid=<?php echo htmlentities($row['userId']); ?>');" title="Update order">
                                                <button type="button" class="btn btn-primary">View User Detials</button></a></td>

                                        </tr>
                                    <?php  } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script>
			$(document).ready(function() {
				$('.datatable-1').dataTable();
				$('.dataTables_paginate').addClass("btn-group datatable-pagination");
				$('.dataTables_paginate > a').wrapInner('<span />');
				$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
				$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
			});
		</script>
    </body>

    </html>
<?php } ?>