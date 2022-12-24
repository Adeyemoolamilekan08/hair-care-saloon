<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $eid = $_SESSION['adminid'];
    $adminimage = $_FILES["adminimage"]["name"];
    move_uploaded_file($_FILES["adminimage"]["tmp_name"], "admin_images/" . $_FILES["adminimage"]["name"]);
    $sql = "update tbladmin set adminimage=:adminimage where id=:eid";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo '<script>alert("updated successfuly")</script>';
      echo "<script>window.location.href ='update_userimage.php'</script>";
    } else {
      echo '<script>alert("something went wrong, please try again later")</script>';
    }
  }
?>

  <?php include("includes/head.php"); ?><?php
                                        //session_start();
                                        include('includes/dbconnection.php');
                                        if (strlen($_SESSION['adminid'] == 0)) {
                                          header('location:logout.php');
                                        } else {
                                          if (isset($_POST['submit'])) {
                                            $eid = $_SESSION['adminid'];
                                            $email = $_POST['email'];
                                            $mobile = $_POST['mobile'];
                                            $name = $_POST['firstname'];
                                            $password = $_POST['password'];
                                            $username = $_POST['username'];
                                            $sql = "update tbladmin set AdminName=:name,UserName=:username,MobileNumber=:mobile,Email=:email,Password=:password where id=:eid";
                                            $query = mysqli_query($con, $sql);
                                            echo '<script>alert("updated successfuly")</script>';
                                            echo "<script>window.location.href ='profile.php'</script>";
                                          }
                                        ?>

  <?php include("includes/head.php"); ?>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      <?php include("includes/header.php"); ?>
      <!-- /.navbar -->
      <!-- Side bar and Menu -->
      <?php include("includes/sidebar.php"); ?>
      <!-- /.sidebar and menu -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <br>
        <div class="col-lg-12">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Update Admin Profile</h6>
            </div>
            <div class="card-body">
              <form method="post">
                <?php
                                          $eid = $_SESSION['adminid'];
                                          $sql = "SELECT * from tbladmin where id='$eid' ";
                                          $query = mysqli_query($con, $sql);
                                          $results = mysqli_fetch_array($query);
                                          $cnt = 1;
                                          if (mysqli_num_rows($query) > 0) {
                                            $adimage =  $results['adminimage'];

                                            // foreach($results as $row => $answer)
                                            // {    
                ?>
                  <div class="container rounded bg-white mt-5">
                    <div class="row">
                      <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                          <?php
                                            if ($adimage == "true") { ?>

                          <?php
                                            } else { ?>
                            <img src="admin_images/<?php echo $results['adminimage']; ?>" width="100%" height="100%">
                          <?php
                                            } ?><span class="font-weight-bold"><?php echo $results['AdminName']; ?> <?php  //echo $row->Gender;
                                                                                                                    ?></span>
                          <span class="text-black-50"><?php echo $results['Email']; ?></span>
                          <span><?php echo $results['MobileNumber']; ?></span>
                          <div class="mt-3">
                            <a href="update_userimage.php?id=<?php echo $eid; ?>">Edit Image</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="p-3 py-5">
                          <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            </div>
                            <h6 class="text-right">Edit Profile</h6>
                          </div>

                          <div class="row mt-2">
                            <div class="col-md-6">
                              <input type="text" class="form-control" name="firstname" value="<?php echo $results['AdminName']; ?>" required='true'>
                            </div>
                            <div class="col-md-6">
                              <input type="text" class="form-control" value="<?php echo $results['Password']; ?> " name="password" required>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-md-6">
                              <input type="text" class="form-control" name="email" value="<?php echo $results['Email']; ?>" required>
                            </div>
                            <div class="col-md-6"><input type="text" class="form-control" value="0<?php echo $results['MobileNumber']; ?>" name="mobile" required>
                            </div>
                          </div>

                          <div class="row mt-3">
                            <div class="col-md-6">
                              <label class="form-group">User Name</label>
                              <input type="text" class="form-control" name="username" value="<?php echo $results['UserName']; ?>" required>
                            </div>
                            <div class="col-md-6">
                              <label class="form-group">Password</label>
                              <input type="text" class="form-control" name="permission" value="<?php echo $results['Password']; ?>" readonly="true">
                            </div>
                          </div>

                          <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit" name="submit">Update Profile</button></div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                                            //  }
                                          } ?>
              </form>
            </div>
          </div>
        </div>

        <!-- /.content-header -->
      </div>
      <!-- /.content-wrapper -->
      <?php include("includes/foot.php"); ?>
      <?php include("includes/footer.php"); ?>
  </body>

  </html>
<?php
                                        }
                                      } ?>