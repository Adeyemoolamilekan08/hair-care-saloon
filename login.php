<?php
session_start();
include('includes/dbcon.php');

if (isset($_POST['login'])) {
    // $name =mysqli_real_escape_string($con, $_POST['name']);
    $adminuser = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = mysqli_query($con, "select * from tbladmin where  UserName='$adminuser' && Password='$password' ");
    if (mysqli_num_rows($query) > 0) {
        $ret = mysqli_fetch_array($query);
        $_SESSION['adminid'] = $ret['ID'];
        $_SESSION['type'] = "Admin";
        $adminuser = $_SESSION['username'];
        // $password = $_SESSION['password'];
        header('location:admin/dashboard.php');
    } else {
        $query = mysqli_query($con, "select * from tblstaffs where  UserName='$adminuser' && Password='$password' ");
        if (mysqli_num_rows($query) > 0) {
            $star = mysqli_fetch_array($query);
            $_SESSION['staffid'] = $star['ID'];
            // $_SESSION['staffname'] = $star['Name'];
            $_SESSION['type'] = "Staff";
            $_SESSION['username'] = $adminuser;
            header('location:staffs/dashboard.php');
        } else {
            $query = mysqli_query($con, "select * from tblusers where  UserName='$adminuser' && Password='$password' ");
            if (mysqli_num_rows($query) > 0) {
                $users = mysqli_fetch_array($query);
                $_SESSION['userid'] = $users['ID'];
                $_SESSION['type'] = "User";
                $adminuser = $_SESSION['UserName'];
                // $password = $_SESSION['password'];

                header('location:user/dashboard.php');
            } else {
                $msg = "invalid details";
            }
        }
    }
}
?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Barber</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            background: gray;
            ;
        }

        .test {
            position: static;
            margin-top: 100px;
        }
    </style>


</head>

<body>

    <?php include('includes/header.php') ?>

    <div class="container-fluid">
        <div class="col-md-12">

            <form class="test" method="post">


                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 my-5 jumbotron">

                        <p style="font-size:16px; color:red" align="center"> <?php if (!isset($msg)) {
                                                                                    echo "";
                                                                                } else {
                                                                                    echo $msg;
                                                                                }  ?> </p>
                        <h5 class="text-center my-3">Login</h5>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-info my-3" value="Login">

                        <p>I dont have an account <a href="register.php">Click here.</a></p>

                        <div class="forgot-grid">

                            <div class="forgot">
                                <a href="forgot-password.php">forgot password?</a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>

            </form>
        </div>
    </div>
    </div>


    <?php include('includes/footer.php') ?>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>