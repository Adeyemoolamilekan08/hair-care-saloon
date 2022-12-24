
<?php 
session_start();
include('includes/dbcon.php');
if(isset($_POST['submit']))
  {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $services=$_POST['services'];
    
    $adate=$_POST['date_picker'];
    $atime=$_POST['servicess'];
    $staffs = $_POST['staffs'];
    $phone=$_POST['phone'];
    $aptnumber = mt_rand(100000000, 999999999);
    $selec=mysqli_query($con,"SELECT * FROM tblservices WHERE ServiceName	='$services' ");
    $count=mysqli_fetch_array($selec);
    if(!$selec)
    {
      echo "eror";
    }  
    $exp = $count['Expired'];
    $dated = $count['today'];
    $cost = $count['Cost'];
    $servicess=$count['StaffName'];
    //echo $cost;
    $today = date('Y-m-d');
	
	if(($today==$dated) && ($exp==5)){
		echo "<p style='color:red; font-family:verdana;'>This Staff has alredy been booked for this date</p> ";
	}else {
    if(($dated !=$today)){
      
      $update2=mysqli_query($con,"UPDATE tblappointment SET AptDate='$today',Expired=1 WHERE Staffs	='$services'");

      if($update2){
        $query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Staffs,Services) value
        ('$aptnumber','$name','$email','$phone','$adate','$atime','$staffs','$services')");
        if ($query) {
    $ret=mysqli_query($con,"select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'");
    $result=mysqli_fetch_array($ret);
    $_SESSION['aptno']=$result['AptNumber'];
     //echo "<script>window.location.href='checkout2.php'</script>";  
     ///paystack starts  here
    
     // echo "bnvnvnn".$count['StaffName'];


     $email = $_POST['email'];
     // $chargeES = $_POST['ltn__subtotal'];
      $chargeES=$cost;
     $charged=($chargeES*100);
     // $url = "https://api.paystack.co/transaction/initialize";
  
     $curl = curl_init();
     
     $email = $email;
     $amount = $charged;  //the amount in kobo. This value is actually NGN 300
     
     // url to go to after payment
     $callback_url = 'http://localhost/training/Gigs_project/project___/user/thank-you.php';  
  
     curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode([
        'amount'=>$amount,
        'email'=>$email,
        'callback_url' => $callback_url
      ]),
      CURLOPT_HTTPHEADER => [
        "authorization: Bearer sk_test_15dd52014734a3f196bd801d876a9eaf19139d23", //replace this with your own test key
        "content-type: application/json",
        "cache-control: no-cache"
      ],
    ));
  
    $response = curl_exec($curl);
  $err = curl_error($curl);
  
  if($err){
    // there was an error contacting the Paystack API
    die('Curl returned error: ' . $err);
  }
  
  $tranx = json_decode($response, true);
  
  if(!$tranx['status']){
    // there was an error from the API
    print_r('API returned error: ' . $tranx['message']);
  }
  
  // comment out this line if you want to redirect the user to the payment page
  print_r($tranx);
  // redirect to page so User can pay
  // uncomment this line to allow the user redirect to the payment page
  header('Location: ' . $tranx['data']['authorization_url']);
  




     //paystack ends*/
      }
      else
        {
         echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
        }
      }}
     elseif(($today==$dated) && ($exp < 5)){
    if($exp > 0){
      $exps = $exp +1;
      $update2=mysqli_query($con,"UPDATE tblservices SET today='$today',Expired='$exps' WHERE StaffName	='$services'");
    }
  if($update2){
    $query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Staffs,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$staffs','$services')");
    if ($query) {
$ret=mysqli_query($con,"select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'");
$result=mysqli_fetch_array($ret);
$_SESSION['aptno']=$result['AptNumber'];
 echo "<script>window.location.href='dashboard.php'</script>";  
  }
  else
    {
     echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
    }
  }else{
    echo "error <br />".$update2.mysqli_error($con);
  }
}
}
  
}
  
?>

  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HairCare Master </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="includes/js_drop/jquery.js"></script>
  
  
</head>
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
                  <li class="breadcrumb-item active">Book Appointment</li>
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
                  <h3 class="card-title">Book your appointment to save salon rush.</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post">

     
                  <div class="card-body">
                  
                  <p style="font-size:16px; color:red" align="center"> <?php if(!isset($msg)){
    echo "";
  }else{ echo $msg;}  ?> </p>


                    <div class="form-group col-md-12"> 
                      <label for="exampleInputEmail1">Name</label> 
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="<?php echo $results['name']; ?>" required="true"> 
                    </div> 
                    <div class="form-group col-md-12"> 
                      <label for="exampleInputEmail1">Email</label> 
                      <input type="text" class="form-control" id="email" name="email" placeholder="Enter email address" value="<?php echo $results['email']; ?>" required="true"> 
                    </div> 

                    <div class="form-group col-md-12"> 
                      <label for="exampleInputEmail1">Phone Number</label> 
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter email address" value="<?php echo $results['mobile']; ?>" required="true"> 
                    </div> 

                    
                 


                                    <div class="form-group col-md-12"> 
                                        <label class="exampleInputEmail1" for="Subject">ServiceName</label>
                                        <select name="services" id="servicename" required="true" class="form-control">
                                <option value="">Select Service</option>
                                <?php $query=mysqli_query($con,"select * from tblservices");
              while($row=mysqli_fetch_array($query))
              {
              ?>
                               <option value="<?php echo $row['ServiceName'];?>"><?php echo $row['ServiceName'];?></option>
                               <?php } ?> 
                              </select>
              </div>
              <div class="form-group col-md-12"> 
                                        <label class="exampleInputEmail1" for="Subject">StaffName</label>
                                        <select name="staffs" id="staffid" required="true" class="form-control">
                                <option value="">Select service first*</option>
                               
                              </select>
                                    </div>
                                    <div class="form-group col-md-12"> 
                      <label for="exampleInputEmail1"  >Price</label> 
                      <div id="price">
                      <input type="text" class="form-control"  name="" placeholder="select service first" disabled> 
                      </div>

                    </div> 
                                    <div class="form-group col-md-12"> 
                                        <div class="form-group">
                                            <label class="exampleInputEmail1" for="textarea">Appointment Date</label>
         <input type="date" class="form-control appointment_date" name="date_picker"   id='date_picker' required="true">
                                        </div>
                                    </div>


                                   
                                    <script type="text/javascript" src="csss.css"></script>
    <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min',today);
    </script>


                                    <div class="form-group col-md-12"> 
                                        <div class="form-group">
                                        <label class="control-label" for="Subject">Appointment Time</label>
                                        <select name="servicess" id="services" required="true" class="form-control">
                                <option value="">Choose Time</option>
                                <?php $query=mysqli_query($con,"select * from tbltime");
              while($row=mysqli_fetch_array($query))
              {
              ?>
                               <option value="<?php echo $row['time'];?>"><?php echo $row['time'];?></option>
                               <?php } ?> 
                              </select>
                                    </div>
                   
                    <button type="submit" name="submit" class="btn btn-info">Book Appointment</button>
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
      <script type="text/javascript">
      $(document).ready(function() {
    
	$("#servicename").change(function() {
		
		$.get('loadsubcat.php?services=' + $(this).val(), function(data) {
			$("#staffid").html(data);
		
		});	
    });
    
    $("#servicename").change(function() {
		
		$.get('loadsubcat2.php?services=' + $(this).val(), function(data) {
			$("#price").html(data);
		
		});	
    });
    //shipping
    //price
    // 	$("#state_id").change(function() {
		
		// $.get('history/loadsubcat.php?zone=' + $(this).val(), function(data) {
		// 	$("#ship_fee").html(data);
		
		// });	
    // });
    // //total
    // 	$("#state_id").change(function() {
		
		// $.get('history/second.php?zone=' + $(this).val(), function(data) {
		// 	$("#total_fee").html(data);
		
		// });	
    // });
  

});
        </script>
      <?php include("includes/footer.php"); ?>
      
    </div>
    <!-- ./wrapper -->
    <?php include("includes/foot.php"); ?>



  </body>
  </html>
  