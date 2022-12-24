<?php
session_start();
include('includes/dbcon.php');
if (isset($_POST['login'])) {
  $password1 = ($_POST['password']);
  $password2 = ($_POST['password1']);

  if ($password1 != $password2) {
    echo "<script>alert('Password and Confirm Password Field do not match  !!');</script>";
  } else {
    $username = $_POST['username'];
    $mobile = $_POST['phone'];
    $newpassword = $_POST['password'];
    $sql = "SELECT UserName FROM tblusers WHERE UserName='$username' and mobile='$mobile' ";
    $query = mysqli_query($con, $sql);

    if (mysqli_fetch_array($query) > 0) {
      $update = "update tblusers set password='$newpassword' where UserName='$username' and mobile='$mobile'";
      $chngpwd1 = mysqli_query($con, $update);
      echo "<script>alert('Your Password succesfully changed');</script>";
      echo "<script>window.location.href = 'login.php'</script>";
    } else {
      echo "<script>alert('Username or Mobile is invalid');</script>";
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
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <link rel="stylesheet" href="css/nice-select.css">
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/gijgo.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/slicknav.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>

  <form role="form" method="post" action="">

    <div class="container-fluid">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6 my-5 jumbotron">

            <p style="font-size:16px; color:red" align="center"> <?php if (!isset($msg)) {
                                                                    echo "";
                                                                  } else {
                                                                    echo $msg;
                                                                  }  ?> </p>
            <h5 class="text-center my-3">Don't worry, we'have got you back</h5>

            <form method="post">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Enter Username">
              </div>
              <div class="form-group">
                <label>Mobile</label>
                <input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Enter Mobile">
              </div>
              <div class="form-group">
                <label>New Password</label>
                <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password">
              </div>
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password1" class="form-control" autocomplete="off" placeholder="Enter Password">
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