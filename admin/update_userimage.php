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
    $sql = $con->query("update tbladmin set adminimage = '$adminimage' where adminId = '$eid' ") or die(mysqli_errno($con));
    // $query= mysqli_query($con, $sql);
    if ($sql) {
      echo '<script>alert("updated successfuly")</script>';
      echo "<script>window.location.href ='update_userimage.php'</script>";
    } else {
      echo '<script>alert("something went wrong, please try again later")</script>';
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
        <div class="col-lg-12">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Update User Image</h6>
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                <?php

                $eid = $_SESSION['adminid'];
                $sql = "SELECT * from tbladmin where adminId='$eid' ";
                $query = mysqli_query($con, $sql);
                $results = mysqli_fetch_array($query);
                $cnt = 1;
                if (mysqli_num_rows($query) > 0) {
                  $adimage =  $results['adminimage'];

                  // foreach($results as $row => $answer)
                  // { 

                ?>
                  <div class="control-group">
                    <label class="control-label" for="basicinput">Names</label>
                    <div class="col-6">
                      <input type="text" class="form-control" name="productName" readonly value="<?php echo $results['AdminName']; ?>&nbsp;<?php  //echo $row->lastname;
                                                                                                                                            ?>" class="span6 tip" required>
                    </div>
                  </div>
                  <br>
                  <div class="control-group">
                    <label class="control-label" for="basicinput">Current Image</label>
                    <div class="controls">
                      <img src="admin_images/<?php echo $results['adminimage']; ?>" width="100" height="100">
                    </div>
                  </div>
                  <br>
                  <div class="form-group col-md-6">
                    <label>New Image</label>
                    <input type="file" name="adminimage" id="adminimage" class="file-upload-default">
                  </div>
              <?php
                }
              } ?>
              <div class="form-group row">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary " name="submit">
                    <i class="fa fa-plus "></i> Update
                  </button>
                </div>
              </div>
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