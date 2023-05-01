<?php
session_start();
include('includes/dbcon.php');

if (strlen($_SESSION['userid'] == 0)) {
  header('location:logout.php');
}
if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $staffname = $_POST['staffname'];
  $message = $_POST['message'];


  $query = mysqli_query($con, "insert into tblpage(Name, Email, StaffName, Message) value('$name','$email','$staffname','$message')");

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
                <li class="breadcrumb-item active">Report</li>
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
                  <h3 class="card-title">Message Admin</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post">


                  <div class="card-body">

                    <p style="font-size:16px; color:red" align="center"> <?php if (!isset($msg)) {
                                                                            echo "";
                                                                          } else {
                                                                            echo $msg;
                                                                          }  ?> </p>


                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="<?php //echo $row['name']; 
                                                                                                                          ?>" required="true">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Email Address</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" value="<?php //echo $row['email']; 
                                                                                                                                ?>" required="true">
                    </div>

                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1">Staff Name</label>
                      <input type="text" class="form-control" id="staffname" name="staffname" placeholder="Enter Staff name" value="<?php //echo $row['email']; 
                                                                                                                                    ?>" required="true">
                    </div>

                    <div class="form-group col-md-12">
                      <label for="exampleInputPassword1">Text Message</label>

                      <textarea name="message" class="form-control" id="message" placeholder="Enter message" value=""></textarea>
                    </div>

                    <button type="submit" name="submit" class="btn btn-info">Send Message</button>
                </form>

                <?php


                if (isset($_POST['submit'])) {


                  //mail
                  $mail = 'adeyemoolamilekan08@gmail.com';
                  $sender = $_POST['email'];
                  $mes = $_POST['message'];
                  $subject = 'MESSAGE FROM COSTOMERS';
                  // To send HTML mail, the Content-type header must be set
                  $headers  = 'MIME-Version: 1.0' . "\r\n";
                  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                  // Create email headers
                  $headers .= 'From: Customer ' . '<' . $sender . '>' . "\r\n" .
                    //$headers .= 'From: '.$sender."\r\n".
                    'Reply-To: ' . $sender . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                  // Compose a simple HTML email message
                  //  $message = '<html><body>';


                  // $message .= '<p style="font-size:18px;text-align:center;color:#777">© 2022 GigsTech. All Rights Reserved.</p>';
                  //  $message .= '</body></html>';
                  // if($sender)
                }
                ?>
                <?php

                // header("location: report-staff.php");

                ?>
                <?php

                // mail($mail, $mes, $message, $headers);
                //  }else{
                //  $messages= "Invalid Details";

                //   }}
                ?>




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