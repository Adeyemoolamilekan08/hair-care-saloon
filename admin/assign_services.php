<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['save'])) {
  $uid = $_SESSION['gid'];
  $invoiceid = mt_rand(100000000, 999999999);
  $sid = $_POST['sids'];
  $serv_id = $_POST['serv_id'];
  for ($i = 0; $i < count($sid); $i++) {
    $svid = $sid[$i];
    $ret = mysqli_query($con, "insert into tblinvoice(Userid,ServiceId,BillingId) values('$uid','$svid','$invoiceid');");
    $ret .= mysqli_query($con, "update  tblappointment  set  Assign='1'  where ID ='$serv_id'");
    if ($ret) {
      echo '<script>alert("Invoice created successfully. Invoice number is "+"' . $invoiceid . '")</script>';
      echo "<script>window.location.href ='invoices.php'</script>";
    }
  }
}
?>









<div class="card-body">
  <h4>Assign Services:</h4>
  <form method="post">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Service Name</th>
          <th>Service Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $eid = $_POST['edit_id'];
        $ret = mysqli_query($con, "select * from  tblusers where userId ='$eid'");
        $cnt = 1;
        while ($row = mysqli_fetch_array($ret)) {
          $_SESSION['gid'] = $row['userId '];
        }
        $ret = mysqli_query($con, "select *from  tblservices");
        $cnt = 1;
        while ($row = mysqli_fetch_array($ret)) {
        ?>
          <tr>
            <th scope="row"><?php echo $cnt; ?></th>
            <td><?php echo $row['ServiceName']; ?> <input type="hidden" name="serv_id" value="<?php echo $eid; ?>"> </td>
            <td><?php echo $row['Cost']; ?></td>
            <td><input type="checkbox" name="sids[]" value="<?php echo $row['ID']; ?>"></td>
          </tr>
        <?php
          $cnt = $cnt + 1;
        } ?>
        <tr>
          <td colspan="4" align="center">
            <button type="submit" name="save" class="btn btn-success">Submit</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>
<!-- /.card-body -->