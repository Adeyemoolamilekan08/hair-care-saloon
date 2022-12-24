<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
} else {

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $mobilenum = $_POST['mobilenum'];
    $gender = $_POST['gender'];
    $details = $_POST['details'];


    $query = mysqli_query($con, "insert into  tblstaffs (Name,UserName,Email,Password,MobileNumber,Gender,Details) value('$name','$uname','$email','$pass','$mobilenum','$gender','$details')");
    if ($query) {
      echo "<script>alert('New Staff has been added.');</script>";
      echo "<script>window.location.href = 'add_staff.php'</script>";
    } else {
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";
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
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active">Add Staff</li>
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
                    <h3 class="card-title text-center pt-10">Add Staff</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="post">

                    <p style="font-size:16px; color:red" align="center"> <?php if (!isset($msg)) {
                                                                            echo "";
                                                                          } else {
                                                                            echo $msg;
                                                                          }  ?> </p>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="" required="true">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">UserName</label>
                        <input type="text" class="form-control" id="uname" name="uname" placeholder="User Name" value="" required="true">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="" required="true">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" value="" required="true">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Mobile Number</label>
                        <input type="text" class="form-control" id="mobilenum" name="mobilenum" placeholder="Mobile Number" value="" required="true">
                      </div>
                      <div class="radio">
                        <p style="padding-top: 20px; font-size: 15px"> <strong>Gender:</strong>
                          <label>
                            <input type="radio" name="gender" id="gender" value="Female" checked="true">
                            Female
                          </label>
                          <label>
                            <input type="radio" name="gender" id="gender" value="Male">
                            Male
                          </label>
                          <label>
                            <input type="radio" name="gender" id="gender" value="Male">
                            Transgender
                          </label>
                        </p>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address/Details</label>
                        <textarea type="text" class="form-control" id="details" name="details" placeholder="Details" required="true" rows="4" cols="4"></textarea>
                      </div>
                      <button type="submit" name="submit" class="btn btn-info">Add</button>
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
<?php
} ?>