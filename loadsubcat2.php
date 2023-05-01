
<?php



//for countries and states
include("includes/dbcon.php");
if (isset($_GET['services'])) {
  $services = $_GET['services'];


  $query = $con->query("SELECT * FROM tblservices WHERE ServiceName ='$services'");
  $rowCount = $query->num_rows;
  // $row=$query->fetch_assoc();
  while ($row = $query->fetch_assoc()) {
    echo '<input type="text" class="form-control" name="" value="' . $row['Cost'] . '" disabled> ';
    echo '<input type="hidden" class="form-control" name="cost_work" value="' . $row['Cost'] . '" > ';
  }
} else {
  echo "error";
}

// $disabled = date('Y-m-d');

// $sql = "SELECT * FROM tblholiday WHERE date ='$disabled'";
// $result = mysqli_query($con, $sql);
// if (mysqli_num_rows($result) > 0) {
// }




?>