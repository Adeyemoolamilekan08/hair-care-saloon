<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['adminid'] == 0)) {
  header('location:logout.php');
}

if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $sex = mysqli_real_escape_string($con, $_POST['sex']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $phone = mysqli_real_escape_string($con, $_POST['mobile']);
  $cid = $_SESSION['edid'];
  $query = mysqli_query($con, "update  tblusers set name='$name',lastname='$lastname',UserName='$UserName',email='$email',sex='$sex',Password='$password',mobile='$mobile' where ID='$cid' ");
  if ($query) {
    echo '<script>alert("Customer Detail has been Updated.")</script>';
    echo "<script>window.location.href = 'customer_list.php'</script>";
  } else {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
}
?>
<h4 class="card-title">Update Customer Details </h4>
<form method="post">
  <p style="font-size:16px; color:red" align="center">
    <?php
    if (isset($msg)) {
      echo $msg;
    }  ?>
  </p>
  <?php
  $eid = $_POST['edit_id'];
  $ret = mysqli_query($con, "select * from  tblusers where ID='$eid'");
  $cnt = 1;
  while ($row = mysqli_fetch_array($ret)) {
    $_SESSION['edid'] = $row['ID'];
  ?>
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required="true">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">LastName</label>
        <input type="text" class="form-control" id="name" name="lastname" value="<?php echo $row['lastname']; ?>" required="true">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['UserName']; ?>" required="true">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input type="text" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required="true">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Gender</label>
        <?php
        if ($row['sex'] == "Male") {
        ?>
          <input type="radio" id="sex" name="sex" value="Male" checked="true">Male
          <input type="radio" name="sex" value="Female">Female
        <?php
        } ?>
        <?php
        if ($row['sex'] == "Female") {
        ?>
          <input type="radio" id="sex" name="sex" value="Male">Male
          <input type="radio" name="sex" value="Female" checked="true">Female
        <?php
        } ?>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['Password']; ?>" required="true" readonly='true'>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $row['mobile']; ?>" required="true">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Creation Date</label>
        <input type="text" id="" name="" class="form-control" value="<?php echo $row['CreationDate']; ?>" readonly='true'>
      </div>
    <?php
  } ?>
    <div class="card-footer">
      <button type="submit" name="submit" class="btn btn-primary">Update</button>
      <span style="float: right;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </span>
    </div>
    </div>
</form>