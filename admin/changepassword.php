<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $adminid = $_SESSION['adminid'];
    $cpassword = $_POST['currentpassword'];
    $newpassword = $_POST['newpassword'];
    $query = mysqli_query($con, "select * from tbladmin where ID='$adminid' and   Password='$cpassword'");
    $row = mysqli_num_rows($query);
    if ($row > 0) {
      $ret = mysqli_query($con, "update tbladmin set Password='$newpassword' where ID='$adminid'");
      $msg = "Your password successully changed";
    } else {

      $msg = "Your current password is wrong";
    }
  }
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
      <div class="card">
        <div class="col-md-10">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Change Password</h3>
            </div>
            <div class="card-body">
              <!-- Date -->

              <form role="form" id="" method="post" enctype="multipart/form-data" class="form-horizontal">

                <p style="font-size:16px; color:red" align="center"> <?php if (!isset($msg)) {
                                                                        echo "";
                                                                      } else {
                                                                        echo $msg;
                                                                      }  ?> </p>


                <?php
                $adminid = $_SESSION['adminid'];
                $ret = mysqli_query($con, "select * from tbladmin where ID='$adminid'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {

                ?>

                  <div class="card-body">
                    <div class="form-group  ">
                      <label for="exampleInputPassword1">Old Password</label>
                      <input type="password" name="currentpassword" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="form-group  ">
                      <label for="exampleInputPassword1">New Password</label>
                      <input type="password" name="newpassword" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="form-group ">
                      <label for="exampleInputPassword1">Confirm password</label>
                      <input type="password" name="confirmpassword" class="form-control" id="exampleInputPassword1">
                    </div>
                  </div>
            </div>
            <div class="modal-footer text-right">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>

            </form>

          </div>

          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("includes/footer.php"); ?>
  <?php include("includes/foot.php"); ?>

  <script type="text/javascript">
    function checkpass() {
      if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
        alert('New Password and Confirm Password field does not match');
        document.changepassword.confirmpassword.focus();
        return false;
      }
      return true;
    }
  </script>



</body>

</html>
<?php
                } ?>