<?php
include("includes/dbconnection.php");
//  if(isset($_GET['id'])){
//   $id = $_GET['id'];
//   $select = mysqli_query($con,"SELECT * FROM tblusers WHERE id = '$id'")or die(mysqli_errno($con));
//   $row = mysqli_fetch_array($select);
//  }

?>

<?php include("includes/head.php"); ?><?php

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
            <h6 class="m-0 font-weight-bold text-primary">View Staff Profile</h6>
          </div>
          <div class="card-body">
            <form method="post">
              <?php

              if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $select = mysqli_query($con, "SELECT * FROM tblstaffs WHERE id = '$id'") or die(mysqli_errno($con));
                $row = mysqli_fetch_array($select);
              }


              ?>
              <div class="container rounded bg-white mt-5">
                <div class="row">
                  <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                      <img src="../staffs/staff_images/<?php echo $row['staffimage']; ?>" width="100%" height="100%">
                      <span class="font-weight-bold"><?php echo $row['Name']; ?><br> <?php echo $row['Gender']; ?></span>
                      <span class="text-black-50"><?php echo $row['Email']; ?></span>
                      <span><?php echo $row['MobileNumber']; ?></span>
                      <div class="mt-3">
                        <!-- <a href="update_userimage.php?id=<?php //echo $id;
                                                              ?>">Edit Image</a> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="p-3 py-5">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        </div>
                        <h6 class="text-right">Staff Profile</h6>
                      </div>

                      <div class="row mt-2">
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="firstname" value="<?php echo $row['UserName']; ?>" required='true'>
                        </div>
                        <div class="col-md-6">
                          <input type="text" class="form-control" value="<?php echo $row['Password']; ?> " name="password" required>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="email" value="<?php echo $row['Email']; ?>" required>
                        </div>
                        <div class="col-md-6"><input type="text" class="form-control" value="0<?php echo $row['MobileNumber']; ?>" name="mobile" required>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-md-6">
                          <label class="form-group">User Name</label>
                          <input type="text" class="form-control" name="username" value="<?php echo $row['UserName']; ?>" required>
                        </div>
                        <div class="col-md-6">
                          <label class="form-group">Password</label>
                          <input type="text" class="form-control" name="permission" value="<?php echo $row['Password']; ?>" readonly="true">
                        </div>
                      </div>

                      <!-- <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button></div> -->
                    </div>
                  </div>
                </div>
              </div>
              <?php
              // }
              // } 
              ?>
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
//} 
?>