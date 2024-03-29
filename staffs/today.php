<?php
session_start();
include('includes/dbcon.php');
if (strlen($_SESSION['staffid'] == 0)) {
  header('location:logout.php');

  echo ['staffid'];
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
              <h1>Today Customer</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">All Today Customer</li>
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
                  <h3 class="card-title">DataTable with Recent Appointment</h3>
                </div>
                <!-- /.card-header -->
                <div id="editData" class="modal fade">
                  <div class="modal-dialog  ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">View Recent Appointment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="info_update">
                        <?php include("view_appointment.php"); ?>
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
                        <th>Date</th>
                        <th>Time</th>
                        <th>Number</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include('includes/dbcon.php');
                      $real = $_SESSION['staffid'];
                      $query = mysqli_query($con, "SELECT * FROM tblstaffs WHERE staffId='$real' ");
                      $col = mysqli_fetch_array($query);
                      $stfname = $col['UserName'];
                      $query2 = mysqli_query($con, "SELECT * FROM tblappointment WHERE Staffs='$stfname' ");

                      while ($row = mysqli_fetch_array($query2)) {


                      ?>


                        <tr>
                          <th scope="row"><?php echo $cnt; ?></th>
                          <td><?php echo $row['Name']; ?></td>
                          <td><?php echo $row['AptDate']; ?></td>
                          <td><?php echo $row['AptTime']; ?></td>
                          <td><?php echo $row['PhoneNumber']; ?></td>
                          <!-- <td><?php //echo $row['AptNumber']; ?></td> -->

                          <!-- <td><a href="#" id="<?php echo  $row['ID']; ?>" title="click for edit">View</a></td>  -->
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
          url: "view_appointment.php",
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
</body>

</html>