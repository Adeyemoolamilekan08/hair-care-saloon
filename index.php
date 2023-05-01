<?php
session_start();
include('includes/dbcon.php');
// if (strlen($_SESSION['userid'] == 0)) {
// //   header('location:logout.php');
// }

if (isset($_POST['submit'])) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$services = $_POST['services'];
	$pricess = $_POST['cost_work'];
	$to_date = date('M');
	$pays = $_POST['pays'];

	$adate = $_POST['date_picker'];
	$atime = $_POST['servicess'];
	$staffs = $_POST['staffs'];
	$phone = $_POST['phone'];
	$aptnumber = mt_rand(100000000, 999999999);
	$today = date('Y-m-d');

	$sql = "SELECT * FROM tblholiday WHERE date = '$adate'";
	$result = mysqli_query($con, $sql);
	$row = (mysqli_fetch_array($result));
	// $reason = $row['reason']
	if ($row > 0) {
		$reason = $row['reason'];
		$msg =  $reason;
		//echo "done";
	} else {



		$selec = mysqli_query($con, "SELECT * FROM tblservices WHERE ServiceName	='$services' and Expired='5' and today ='$today' ");
		$getservice = mysqli_query($con, "SELECT * FROM tblservices WHERE ServiceName	='$services'  ");
		$rower = mysqli_fetch_array($getservice);

		$count = mysqli_fetch_array($selec);
		if (!$selec) {
			echo "eror";
		}

		// $mmm = $rower['Expired'];
		// echo $mmm;
		// $exptime = $mmm + 1;

		$exptime = ($rower['Expired'] + 1);
		// $exp = $count['Expired'];
		// $dated = $count['today'];
		$cost = $rower['Cost'];
		$servicess = $rower['StaffName'];
		//echo $cost;
		// $today = date('Y-m-d');

		if (mysqli_num_rows($selec) == 1) {

			$msg = "This Staff has already been booked for today ";
		} else {
			if ((mysqli_num_rows($selec) < 1)) {

				$update2 = mysqli_query($con, "UPDATE tblservices SET today='$today', Expired ='$exptime' WHERE ServiceName	='$services'");

				if ($update2) {
					$gettime = mysqli_query($con, "SELECT * FROM tblappointment WHERE AptDate='$adate' AND AptTime='$atime' AND Staffs='$staffs'");
					$countgettime = mysqli_num_rows($gettime);
					if ($countgettime > 0) {
						echo "<h4 style='background:#000;color:red;text-align:center'>someone has already chosen this time</h4>";
					} elseif ($countgettime < 1) {

						$query = mysqli_query($con, "insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Staffs,Services,Cost,Month,payment_method) value
        ('$aptnumber','$name','$email','$phone','$adate','$atime','$staffs','$services','$pricess','$to_date', '$pays')");
						if ($pays == "pay_online") {
							if ($query) {
								$ret = mysqli_query($con, "select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'");
								$result = mysqli_fetch_array($ret);
								$_SESSION['aptno'] = $result['AptNumber'];
								//echo "<script>window.location.href='checkout2.php'</script>";  
								///paystack starts  here

								// echo "bnvnvnn".$count['StaffName'];


								$email = $_POST['email'];
								// $chargeES = $_POST['ltn__subtotal'];
								$chargeES = $cost;
								$charged = ($chargeES * 100);
								// $url = "https://api.paystack.co/transaction/initialize";

								$curl = curl_init();

								$email = $email;
								$amount = $charged;  //the amount in kobo. This value is actually NGN 300

								// url to go to after payment
								$callback_url = 'http://localhost/test/Haircare_Saloon/user/thank-you.php';

								curl_setopt_array($curl, array(
									CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
									CURLOPT_RETURNTRANSFER => true,
									CURLOPT_CUSTOMREQUEST => "POST",
									CURLOPT_POSTFIELDS => json_encode([
										'amount' => $amount,
										'email' => $email,
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

								if ($err) {
									// there was an error contacting the Paystack API
									die('Curl returned error: ' . $err);
								}

								$tranx = json_decode($response, true);

								if (!$tranx['status']) {
									// there was an error from the API
									print_r('API returned error: ' . $tranx['message']);
								}

								// comment out this line if you want to redirect the user to the payment page
								print_r($tranx);
								// redirect to page so User can pay
								// uncomment this line to allow the user redirect to the payment page
								header('Location: ' . $tranx['data']['authorization_url']);

								// Online payment ends
							}
							//yeah

							//paystack ends*/
						}
					} else {
						echo "<script>alert('Something Went Wrong. Please try again.');</script>";
					}
				}
			} elseif (($today == $dated) && ($exp < 5)) {
				if ($exp > 0) {
					$exps = $exp + 1;
					$update2 = mysqli_query($con, "UPDATE tblservices SET today='$today',Expired='$exps' WHERE StaffName	='$services'");
				}
				if ($update2) {
					$query = mysqli_query($con, "insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Staffs,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$staffs','$services')");
					if ($query) {
						$ret = mysqli_query($con, "select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'");
						$result = mysqli_fetch_array($ret);
						$_SESSION['aptno'] = $result['AptNumber'];
						echo "<script>window.location.href='dashboard.php'</script>";
					} else {
						echo "<script>alert('Something Went Wrong. Please try again.');</script>";
					}
				} else {
					echo "error <br />" . $update2 . mysqli_error($con);
				}
			}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Beauty Salon Management System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include('includes/header.php') ?>

	<!-- END nav -->

	<section class="hero-wrap">
		<div class="home-slider owl-carousel js-fullheight">
			<div class="slider-item js-fullheight" style="background-image:url(images/bg_1.png);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
						<div class="col-md-12 ftco-animate">
							<div class="text w-100 mt-5 text-center">
								<span class="subheading">Beauty Salon</span>
								<h2 style="color: #ffffff; font-size: 70px;">Serving Since 2022</h2>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slider-item js-fullheight" style="background-image:url(images/bg_2.png);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
						<div class="col-md-12 ftco-animate">
							<div class="text w-100 mt-5 text-center">
								<span class="subheading">Beauty Salon</h2></span>
								<h2 style="color: #ffffff; font-size: 70px;">Best Latest Fashions</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



	<section class="ftco-section ftco-wrap-about ftco-no-pb ftco-no-pt">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-sm-4 p-4 p-md-5 d-flex align-items-center justify-content-center bg-primary">
					<form action="#" method="post" class="appointment-form">
						<h3 class="mb-3">Book your Service</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required="true">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="email" name="email" placeholder="Enter email address" required="true">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Mobile Number" required="true">
								</div>
							</div>


							<div class="col-md-12">
								<div class="form-group">
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><span class="fa fa-chevron-down"></span></div>
											<select name="services" id="servicename" class="form-control" required>
												<option value="">Select Service</option>
												<?php $query = mysqli_query($con, "select * from tblservices");
												while ($row = mysqli_fetch_array($query)) {
												?>
													<option style="color: red;" value="<?php echo $row['ServiceName']; ?>"><?php echo $row['ServiceName']; ?></option>
												<?php
												} ?>
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><span class="fa fa-chevron-down"></span></div>
											<selectname="staffs" id="staffid" class="form-control" required>
												<option value="">Select service first*</option>

												<option></option>

												</select>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="fa fa-clock-o"></span></div>
										<div id="price">
											<input type="text" class="form-control" name="" placeholder="select service first" disabled>

										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="fa fa-clock-o"></span></div>
										<input type="date" class="form-control appointment_date" name="date_picker" id='date_picker' required="true">
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><span class="fa fa-chevron-down"></span></div>
											<select name="servicess" id="services" required="true" class="form-control">
												<option value="">Choose Time</option>
												<?php $query = mysqli_query($con, "select * from tbltime");
												while ($row = mysqli_fetch_array($query)) {
												?>
													<option value="<?php echo $row['time']; ?>"><?php echo $row['time']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="fa fa-clock-o"></span></div>
										<input type="checkbox" name="pays" value="pay_online">
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="fa fa-clock-o"></span></div>
										<input type="checkbox" name="pays" value="pay_offline">
									</div>
								</div>
							</div>

							<!-- <input type="checkbox" name="sids[]" value="<?php echo $row['ID']; ?>"> -->

							<div class="col-md-12">
								<div class="form-group">
									<div id="able">

										<button type="submit" name="submit" class="btn btn-white py-3 px-4">Book Now</button>

									</div>
									<!-- <div id="able">
									<input type="submit" name="submit" value="Book Now" class="btn btn-white py-3 px-4">
								</div> -->
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-8 wrap-about py-5 ftco-animate img" style="background-image: url(images/stylist-3.jpg);">
					<div class="row pb-5 pb-md-0">
						<div class="col-md-12 col-lg-7">
							<div class="heading-section mt-5 mb-4">
								<div class="pl-lg-3 ml-md-5">
									<span class="subheading">About</span>
									<h2 class="mb-4">Welcome to Beauty Saloon</h2>
								</div>
							</div>
							<div class="pl-lg-3 ml-md-5">
								<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-intro" style="background-image: url(images/saloncover2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<span>Now Booking</span>
					<h2>Beautiful fashions &amp; Happy Hours</h2>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb">
		<div class="container">
			<div class="row d-flex">
				<div class="col-md-6 d-flex">
					<div class="img img-2 w-100 mr-md-2" style="background-image: url(images/services-1.jpg);">

					</div>
				</div>
				<div class="col-md-6 ftco-animate makereservation p-4 p-md-5">
					<div class="heading-section ftco-animate mb-5">
						<span class="subheading">This is our secrets</span>
						<h2 class="mb-4">Perfect fashions</h2>
						<p>Our main focus is on quality and hygiene. Our Parlour is well equipped with advanced technology equipments and provides best quality services. Our staff is well trained and experienced, offering advanced services in Skin, Hair and Body Shaping that will provide you with a luxurious experience that leave you feeling relaxed and stress free. The specialities in the parlour are, apart from regular bleachings and Facials, many types of hairstyles, Bridal and cine make-up and different types of Facials & fashion hair colourings.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<span class="subheading">Fashions</span>
					<h2 class="mb-4">Recent Fashions</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
						<a href="#" class="block-20" style="background-image: url('images/3.png');">
						</a>
					</div>
				</div>
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
						<a href="#" class="block-20" style="background-image: url('images/work-7.jpg');">
						</a>
					</div>
				</div>
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
						<a href="#" class="block-20" style="background-image: url('images/salon3.jpg');">
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
						<a href="#" class="block-20" style="background-image: url('images/salon4.jpg');">
						</a>
					</div>
				</div>
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
						<a href="#" class="block-20" style="background-image: url('images/salon7.jpg');">
						</a>
					</div>
				</div>
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
						<a href="#" class="block-20" style="background-image: url('images/salon6.jpg');">
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb ftco-intro bg-primary">
		<div class="container py-5">
			<div class="row py-2">
				<div class="col-md-12 text-center">
					<h2>We Make Beauty &amp; Latest Designs</h2>
					<a href="#" class="btn btn-white btn-outline-white">Book Now</a>
				</div>
			</div>
		</div>
	</section>

	<?php include('includes/footer.php') ?>

	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/jquery.timepicker.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

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

		});

		$(document).ready(function() {

			$("#date_picker").change(function() {

				$.get('loadsubcat7.php?date_picker=' + $(this).val(), function(data) {
					$("#able").html(data);

				});
			});
		});
	</script>

</body>

</html>