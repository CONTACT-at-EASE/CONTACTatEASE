<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{ ?>

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
                <a href="#" class="img logo mb-5" style="background-image: url(images/logo.png);"></a>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Dashboard</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="#">Home 1</a>
                            </li>
                            <li>
                                <a href="#">Home 2</a>
                            </li>
                            <li>
                                <a href="#">Home 3</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Lodge Grievance</a>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Account
                            Settings</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="#">Personal info</a>
                            </li>
                            <li>
                                <a href="#">Security</a>
                            </li>
                            < </ul>
                    </li>
                    <li>
                        <a href="#">Log Out</a>
                    </li>
                    </ul>

                    <div class="footer">
                        <p>

                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved
                        </p>
                    </div>

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
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="wrapper">


                <div class="counter col_fourth">
                    <i class="fas fa-cash-register fa-2x"></i>
                    <h2 class="timer count-title count-number" data-to="100" data-speed="1500"></h2>
                    <p class="count-text ">Total Grievance Registered</p>
                </div>

                <div class="counter col_fourth">
                    <i class="fas fa-hourglass-half fa-2x"></i>
                    <h2 class="timer count-title count-number" data-to="50" data-speed="1500"></h2>
                    <p class="count-text ">Number Of Grievance Pending</p>
                </div>

                <div class="counter col_fourth end">
                    <i class="fas fa-stamp fa-2x"></i>
                    <h2 class="timer count-title count-number" data-to="50" data-speed="1500"></h2>
                    <p class="count-text ">Number of Grievance Closed</p>
                </div>
            </div>

            <div class="container altern">
                <div class="info">
                    <h1>This Week Highlights</h1><span>Made with by<a href='http://andy.design'>Andy Tran</a> | Designed by <a href='http://justinkwak.com'>JustinKwak</a></span>
                </div>
                <div class="row featurette">
                    <figure class="snip1216">
                        <div class="image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample69.jpg" alt="sample69" /></div>
                        <figcaption>
                            <div class="date"><span class="day">28</span><span class="month">Oct</span></div>
                            <h3>The World Ended Yesterday</h3>
                            <p>
                                I don't need to compromise my principles, because they don't have the slightest bearing on what happens to me anyway.
                            </p>
                        </figcaption>
                        <footer>
                            <div class="views">
                                <ion-icon name="eye-outline"></ion-icon>2,907</div>
                            <div class="upvote">
                                <ion-icon name="arrow-up-outline"></ion-icon>623</div>
                            <div class="comments">
                                <ion-icon name="chatbox-ellipses-outline"></ion-icon>23</div>
                        </footer>
                        <a href="#"></a>
                    </figure>
                    <figure class="snip1216 hover">
                        <div class="image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample68.jpg" alt="sample68" /></div>
                        <figcaption>
                            <div class="date"><span class="day">17</span><span class="month">Nov</span></div>
                            <h3>An Abstract Post Heading</h3>
                            <p>
                                Sometimes the surest sign that intelligent life exists elsewhere in the universe is that none of it has tried to contact us.
                            </p>
                        </figcaption>
                        <footer>
                            <div class="views">
                                <ion-icon name="eye-outline"></ion-icon>2,907</div>
                            <div class="upvote">
                                <ion-icon name="arrow-up-outline"></ion-icon>623</div>
                            <div class="comments">
                                <ion-icon name="chatbox-ellipses-outline"></ion-icon>23</div>
                        </footer>
                        <a href="#"></a>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="message">
        Sorry, your browser does not support CSS Grid. 😅
    </div>
    <section class="section">
        <h1>Most Upvoted Grievance</h1>
        <div class="grid">
            <div class="item" style="background-image: url('images/up1.jpg');">
                <div class="item__details">
                    Overflowing Drainage
                </div>
            </div>
            <div class="item item--large" style="background-image: url('images/up2.jpg');">
                <div class="item__details">
                    A lot of garbage, health risk for the residents
                </div>
            </div>
            <div class="item item--medium" style="background-image: url('images/up3.jpg');">
                <div class="item__details">
                    Reckless Open Burning in Aarey
                </div>
            </div>
            <div class="item item--large" style="background-image: url('images/up4.jpg');">
                <div class="item__details">
                    Debris thrown on road
                </div>
            </div>
            <div class="item item--full" style="background-image: url('images/up5.jpg');">
                <div class="item__details">
                    zebra crossing used for parking.
                </div>
            </div>
            <div class="item item--medium" style="background-image: url('images/up6.jpg');">
                <div class="item__details">
                    FOOT STOP!
                </div>
            </div>
            <div class="item" style="background-image: url('images/up7.jpg');">
                <div class="item__details">
                    Spoiling Greenary
                </div>
            </div>
        </div>
        </div>
        <div class="container relate">
            <div class="info">
                <h1>This Week Highlights</h1><span>Made with by<a href='http://andy.design'>Andy Tran</a> | Designed by <a href='http://justinkwak.com'>JustinKwak</a></span>
            </div>
            <div class="row featurette">
                <figure class="snip1216">
                    <div class="image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample69.jpg" alt="sample69" /></div>
                    <figcaption>
                        <div class="date"><span class="day">28</span><span class="month">Oct</span></div>
                        <h3>The World Ended Yesterday</h3>
                        <p>
                            I don't need to compromise my principles, because they don't have the slightest bearing on what happens to me anyway.
                        </p>
                    </figcaption>
                    <footer>
                        <div class="views">
                            <ion-icon name="eye-outline"></ion-icon>2,907</div>
                        <div class="upvote">
                            <ion-icon name="arrow-up-outline"></ion-icon>623</div>
                        <div class="comments">
                            <ion-icon name="chatbox-ellipses-outline"></ion-icon>23</div>
                    </footer>
                    <a href="#"></a>
                </figure>
                <figure class="snip1216 hover">
                    <div class="image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample68.jpg" alt="sample68" /></div>
                    <figcaption>
                        <div class="date"><span class="day">17</span><span class="month">Nov</span></div>
                        <h3>An Abstract Post Heading</h3>
                        <p>
                            Sometimes the surest sign that intelligent life exists elsewhere in the universe is that none of it has tried to contact us.
                        </p>
                    </figcaption>
                    <footer>
                        <div class="views">
                            <ion-icon name="eye-outline"></ion-icon>2,907</div>
                        <div class="upvote">
                            <ion-icon name="arrow-up-outline"></ion-icon>623</div>
                        <div class="comments">
                            <ion-icon name="chatbox-ellipses-outline"></ion-icon>23</div>
                    </footer>
                    <a href="#"></a>
                </figure>
                <figure class="snip1216">
                    <div class="image"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample69.jpg" alt="sample69" /></div>
                    <figcaption>
                        <div class="date"><span class="day">28</span><span class="month">Oct</span></div>
                        <h3>The World Ended Yesterday</h3>
                        <p>
                            I don't need to compromise my principles, because they don't have the slightest bearing on what happens to me anyway.
                        </p>
                    </figcaption>
                    <footer>
                        <div class="views">
                            <ion-icon name="eye-outline"></ion-icon>2,907</div>
                        <div class="upvote">
                            <ion-icon name="arrow-up-outline"></ion-icon>623</div>
                        <div class="comments">
                            <ion-icon name="chatbox-ellipses-outline"></ion-icon>23</div>
                    </footer>
                    <a href="#"></a>
                </figure>
            </div>
        </div>
        <!-- <------------------>
        <footer class="l24-bar l24-bar--visual-footer text-color-white">

            <!-- Put any utility content here, such as social icons -->
            <div class="l24-bar__utilities w-full bg-color-black  m-a-0 foot">
                <div class="container">
                    <div class="row m-y">
                        <div class="col-sm-8">
                            <h4>Simple Modular Responsive Header</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <h4>Address</h4>
                            <address>
              <strong>Company, Inc.</strong><br>
              12345 Name Street, Suite 900<br>
              San Francisco, CA 94103<br>
              <abbr title="Phone">P:</abbr> (123) 555-2424
            </address>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Put any utility content here, such as social icons -->
            <div class="l24-bar__utilities w-full bg-color-black-secondary m-a-0 relate">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <p style="margin-top: 14px;">
                                Copyrights &copy; All Rights Reserved by <a class="l24-link l24-link--effect-alpha" href="#">Company</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </footer>
        <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
        <script src="https://kit.fontawesome.com/8d50908931.js" crossorigin="anonymous"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>
<?php } ?>
