<?php
session_start();
error_reporting(0);
include("include/config.php");
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $ret = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' and password='$password'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $extra = "change-password.php"; //
        $_SESSION['alogin'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        $_SESSION['errmsg'] = "Invalid username or password";
        $extra = "index.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
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
    <title>CMS | User Login</title>

    <!-- Bootstrap core CSS -->

    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- <link href="assets/css/style-responsive.css" rel="stylesheet"> -->
    <script type="text/javascript">
        function valid() {
            if (document.forgot.password.value != document.forgot.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.forgot.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body>

    <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <nav class="navbar navbar-expand-lg navbar-inverse navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="images\11.png" height="71" class="d-inline-block align-top" alt=""></a>
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav pull-right">
                    <a href="../" style="color: black;">
                            Back to Portal
                        </a>
                </ul>
            </div>
        </div>
    </nav>
    <div id="login-page">

        <div class="container pd">
            <form class="form-login" name="login" method="post">
                <h2 class="form-login-heading">Admin Sign in</h2>
                <p style="color:red; background: #ffffff7a;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg'] = ""); ?>
                </p>
                <div class="login-wrap">
                    <input id="inputEmail" type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                    <br>
                    <input id="inputPassword" type="password" class="form-control" name="password" required placeholder="Password">
                    <br>
                    <button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
            </form>
        </div>
    </div>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("images/3.jpeg", {
            speed: 500
        });
    </script>



</body>

</html>