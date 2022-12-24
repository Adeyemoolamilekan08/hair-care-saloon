
<?php



//for countries and states
include("includes/dbcon.php");
if(isset($_GET['services'])){
$services= $_GET['services'];

 
 $query =$con->query("SELECT * FROM tblservices WHERE ServiceName ='$services'");
$rowCount=$query->num_rows;
// $row=$query->fetch_assoc();
while($row=$query->fetch_assoc()){ 
echo "<option value='".$row['StaffName']."'>". $row['StaffName'] ."</option>";
}
}

  else{
    echo "error";
  }   




?>