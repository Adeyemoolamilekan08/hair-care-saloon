<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['adminid'] == 0)) {
    header('location:logout.php');
} else {

    if (isset($_POST['add_holiday'])) {
        $date = $_POST['date'];
        $reason = $_POST['reason'];


        $query = mysqli_query($con, "insert into  tblholiday (reason,date) value('$reason','$date')");
        if ($query) {
            $msg = "Holiday Added sucessfully";
        } else {
            $msg = "Something Went Wrong. Please try again";
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
                                    <li class="breadcrumb-item active">Add Holiday</li>
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
                                        <h3 class="card-title text-center pt-10">Add Holiday</h3>
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
                                                <label for="exampleInputEmail1">Holiday Date</label>
                                                <input type="date" class="form-control" id="date" name="date" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Holiday Reason</label>
                                                <textarea class="form-control" name="reason" id="reason" required="true"></textarea>
                                            </div>

                                            <button type="submit" name="add_holiday" class="btn btn-info">Add Holiday</button>
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