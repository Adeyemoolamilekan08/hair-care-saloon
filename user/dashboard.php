<?php
session_start();
include('includes/dbcon.php');
if (strlen($_SESSION['userid'] == 0)) {
    header('location:logout.php');
}
?>
<!DOCTYPE html>
<html>
<?php include("includes/head.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include("includes/header.php"); ?>
        <!-- Main Sidebar Container -->
        <?php include("includes/sidebar.php"); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <?php //$query1=mysqli_query($con,"Select * from tblusers");
                                // $totalcust=mysqli_num_rows($query1);
                                ?>
                                <div class="inner">
                                    <h3><?php // echo $totalcust;
                                        ?></h3>
                                    <p>User History</p>
                                </div>
                                <a href="User-history.php" class="small-box-footer">More info
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->



                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <?php //$query2=mysqli_query($con,"Select * from tblappointment");
                                //$totalappointment=mysqli_num_rows($query2);
                                ?>
                                <div class="inner">
                                    <h3><?php //echo $totalappointment;
                                        ?></h3>

                                    <p>Report</p>
                                </div>
                                <a href="report-staff.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                     
                        </div> 


                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <?php //$query4=mysqli_query($con,"Select * from tblappointment where Status='2'");
                                // $totalrejapt=mysqli_num_rows($query4);
                                ?>
                                <div class="inner">
                                    <h3><?php //echo $totalrejapt;
                                        ?></h3>

                                    <p>Book Appointments</p>
                                </div>
                                <a href="appointment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>




                </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
    </section>
    </div>
    <!-- /.content-wrapper -->
    <?php include("includes/footer.php"); ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php include("includes/foot.php"); ?>
</body>

</html>