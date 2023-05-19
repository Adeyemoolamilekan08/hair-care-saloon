<?php
session_start();

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



    <div class="jumbotron">
        <div class="container">

            <h3>Create New Account</h3>



            <form role="form" id="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="feFirstName">First Name</label>
                            <input type="text" name="name" class="form-control" placeholder="First Name" value="" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="feLastName">Lastname</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="feLastName">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" value="" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-8">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" value="" required>
                        </div>

                        <input type="name" hidden="" name="permission" class="form-control" value="User" required>

                        <div class="form-group col-4">
                            <label for="exampleInputEmail1">Mobile</label>
                            <input type="text" name="mobile" class="form-control" placeholder="Enter mobile" value="" required>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="feFirstName">password</label>
                        <input type="password" name="password" class="form-control" placeholder="password" value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="feLastName">confirm password</label>
                        <input type="password" name="con_pass" class="form-control" placeholder="confirm password" value="" required>
                    </div>
                    <div class="form-group col-4">
                        <label class="" for="register1-email">Gender:</label>
                        <select name="sex" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="modal-footer text-right">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>

    <p><b>I already have an account<b><a href="login.php">Click
                    here</a></p>

    <?php

    include('includes/dbcon.php');

    if (isset($_POST['submit'])) {

        $fname = mysqli_real_escape_string($con, $_POST['name']);
        $last = mysqli_real_escape_string($con, $_POST['lastname']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $sex = mysqli_real_escape_string($con, $_POST['sex']);
        $per = mysqli_real_escape_string($con, $_POST['permission']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $con_pass = mysqli_real_escape_string($con, $_POST['con_pass']);
        $phone = mysqli_real_escape_string($con, $_POST['mobile']);
    
        if ($con_pass != $password) {
            echo "Password Does Not Match";
        } else {
            // Check if email already exists
            $select = "SELECT * FROM tblusers WHERE email = '$email'";
            $result = mysqli_query($con, $select);
    
            if (mysqli_num_rows($result) > 0) {
                echo "<script> 
                alert('Email already exists. Please enter another email.');
                location.href='register.php';
              </script>";
                // echo "Email already exists. Please enter another email.";
            } else {
                // Proceed with user registration
                $insert = "INSERT INTO tblusers(name, lastname, UserName, email, sex, Password, mobile, userimage, status)
                            VALUES ('$fname', '$last', '$username', '$email', '$sex', '$password', '$phone', 'patient.jpg', '0')";
    
                $result = mysqli_query($con, $insert);
                if ($result) {
                    echo "<script> 
                            alert('Registration Successful');
                            location.href='login.php';
                          </script>";
                } else {
                    echo "Registration failed. Please try again.";
                }
            }
        }
    }
    ?>
    </form>