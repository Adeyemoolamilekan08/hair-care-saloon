<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {

  $name = $_POST['servicess'];
  $services = $_POST['services'];
  for ($i = 0; $i < count($services); $i++) {
    $srv = $_POST['services'][$i];




    $query = mysqli_query($con, "insert into tblsets(Staff, Time) value('$name','$srv')");
  }
  if ($query) {

    $msg = " Message Sent Sucessfully";
  } else {
    $msg = "Invalid Details";
  }
}

?>
<!DOCTYPE html>
<html>
<?php include("includes/head.php"); ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include("includes/header.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("includes/sidebar.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Set Appointment</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row offset-md-1">
            <div class="col-md-8 mr-3">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Message Staff</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post">


                  <div class="card-body">

                    <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                            echo $msg;
                                                                          }  ?> </p>


                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Staff Name</label>
                      <select name="servicess" id="services" required="true" class="form-control">
                        <option value="">Select Staff</option>
                        <?php $query = mysqli_query($con, "select * from tblservices");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                          <option value="<?php echo $row['StaffName']; ?>"><?php echo $row['StaffName']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Time</label>
                      <select name="services[]" id="services" required="true" multiple='multiple[' class="form-control">
                        <option value="">Choose Time</option>
                        <?php $query = mysqli_query($con, "select * from tbltime");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                          <option value="<?php echo $row['time']; ?>"><?php echo $row['time']; ?></option>
                        <?php } ?>
                      </select>
                    </div>


                    <button type="submit" name="submit" class="btn btn-info">Assign Services</button>
                </form>






              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include("includes/footer.php"); ?>
  </div>
  <!-- ./wrapper -->
  <?php include("includes/foot.php"); ?>
</body>

</html>