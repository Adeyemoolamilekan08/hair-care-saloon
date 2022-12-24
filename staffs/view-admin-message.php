<?php
session_start();
error_reporting(0);
include('includes/dbcon.php');
if (strlen($_SESSION['staffid'] == 0)) {
    header('location:logout.php');
} else {



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
                                <h1>Customer list</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active">Admin Message</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Admin Message List</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div id="editData" class="modal fade">
                                        <div class="modal-dialog ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" id="info_update">
                                                    <?php include("edit_customer.php"); ?>
                                                </div>
                                                <div class="modal-footer ">
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>
                                    <!--   end modal -->
                                    <div id="editData2" class="modal fade">
                                        <div class="modal-dialog ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Customer List:</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" id="info_update2">
                                                    <?php include("assign_services.php"); ?>
                                                </div>
                                                <div class="modal-footer ">
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>
                                    <!--   end modal -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Message</th>
                                                    <th>Date Send</th>



                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $ret = mysqli_query($con, "select * from  tblpage");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($ret)) {

                                                ?>

                                                    <tr>
                                                        <th scope="row"><?php echo $cnt; ?></th>
                                                        <td><?php echo $row['Name']; ?></td>
                                                        <td><?php echo $row['Email']; ?></td>
                                                        <td><?php echo $row['Message']; ?></td>
                                                        <td><?php echo $row['date_send']; ?></td>
                                                    </tr>
                                                <?php
                                                    $cnt = $cnt + 1;
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
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
        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('click', '.edit_data', function() {
                    var edit_id = $(this).attr('id');
                    $.ajax({
                        url: "edit_customer.php",
                        type: "post",
                        data: {
                            edit_id: edit_id
                        },
                        success: function(data) {
                            $("#info_update").html(data);
                            $("#editData").modal('show');
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('click', '.edit_data2', function() {
                    var edit_id = $(this).attr('id');
                    $.ajax({
                        url: "assign_services.php",
                        type: "post",
                        data: {
                            edit_id: edit_id
                        },
                        success: function(data) {
                            $("#info_update2").html(data);
                            $("#editData2").modal('show');
                        }
                    });
                });
            });
        </script>
    </body>

    </html>
<?php } ?>