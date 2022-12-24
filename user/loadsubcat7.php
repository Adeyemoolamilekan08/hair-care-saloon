
<?php



//for countries and states
include("includes/dbcon.php");
if (isset($_GET['date_picker'])) {
    $services = $_GET['date_picker'];





    $query = $con->query("SELECT * FROM tblholiday WHERE date ='$services'");
    $rowCount = $query->num_rows;
    if (mysqli_num_rows($query) > 0) {
        // $row=$query->fetch_assoc();
        while ($row = $query->fetch_assoc()) {
            echo '
            <button type="submit" name="submit" class="btn btn-info" disabled >' . $row['reason'] . '</button>

            ';
        }
    } else {
        echo '
        <button type="submit" name="submit" class="btn btn-info">Book Appointment</button>
        
        ';
    }
}



?>