<?php
include('includes/config.php');
error_reporting(0);
if (isset($_POST['submit'])) {
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$contactno = $_POST['contactno'];
	$status = 1;
	$query = mysqli_query($con, "insert into users(fullName,userEmail,password,contactNo,status) values('$fullname','$email','$password','$contactno','$status')");
	$msg = "Registration successfull. Now You can login !";
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
	<title>CMS | User Registration</title>

	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

	<link href="assets/css/style.css" rel="stylesheet">
	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'email=' + $("#email").val(),
				type: "POST",
				success: function(data) {
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-inverse navbar-light fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#"><img src="assets\img\11.png" height="71" class="d-inline-block align-top" alt=""></a>
			<div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav pull-right">
                    <a href="../" style="color: black;">
                            Back to Portal

                        </a>
                </ul>
            </div
		</div>
	</nav>
	<div id="login-page" style="padding-top: 6%;">
		<div class="container">
			<form class="form-login" method="post">
				<h2 class="form-login-heading">User Registration</h2>
				<p style="padding-left: 1%; color: green">
					<?php if ($msg) {
						echo htmlentities($msg);
					} ?>


				</p>
				<div class="login-wrap">
					<input type="text" class="form-control" placeholder="Full Name" name="fullname" required="required" autofocus>
					<br>
					<input type="email" class="form-control" placeholder="Email ID" id="email" onBlur="userAvailability()" name="email" required="required">
					<span id="user-availability-status1" style="font-size:12px;"></span>
					<br>
					<input type="password" class="form-control" placeholder="Password" required="required" name="password"><br>
					<input type="text" class="form-control" maxlength="10" name="contactno" placeholder="Contact no" required="required" autofocus>
					<br>

					<button class="btn btn-theme btn-block" type="submit" name="submit" id="submit"><i class="fa fa-user"></i> Register</button>
					<hr>

					<div class="registration">
						Already Registered<br />
						<a class="" href="index.php">
							Sign in
						</a>
					</div>

				</div>



			</form>

		</div>
	</div>

	<!-- js placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!--BACKSTRETCH-->
	<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
	<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
	<script>
		$.backstretch("assets/img/10.jpg", {
			speed: 500
		});
	</script>


</body>

</html>