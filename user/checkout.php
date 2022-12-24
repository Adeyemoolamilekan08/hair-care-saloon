<?php session_start();
// include ('includes/functions.php');
include('checkout-config.php');
//  if(isset($_POST['subscribe'])){
//   $conn = new connection();
//   $conn->subscribe($_POST['email']);
//     $_SESSION['successmsg'] = "<h3 id='succesmsg' class='successmsg' style=''><i class='fa fa-smile'></i> SUCCESSFULLY SUSCRIBED </h3>"; 
// }

validate();
//include ('checkout-config2.php');
if (!$_SESSION['cart']) {
  echo "<script> location.href='shop.php'</script>";
}
?>


<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from aaryaweb.info/html/stylexpo/stx005/checkout.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Aug 2022 13:15:34 GMT -->

<head>
  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Morazone</title>
  <!-- SEO Meta
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="distribution" content="global">
  <meta name="revisit-after" content="2 Days">
  <meta name="robots" content="ALL">
  <meta name="rating" content="8 YEARS">
  <meta name="Language" content="en-us">
  <meta name="GOOGLEBOT" content="NOARCHIVE">
  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- CSS
  ================================================== -->
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="css/fotorama.css">
  <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">
  <link rel="shortcut icon" href="morazone/favicon.png">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.php">
  <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.php">
  <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.php">
  <script src="history/js_drop/jquery.js"></script>
  <script src="js/password.js"></script>
  <!---------javascript query------->

</head>

<body>
  <div class="se-pre-con"></div>
  <div class="main">
    <?php
    //$_SESSION['successmsg'] ="";
    if (!empty($_SESSION['successmsgshop'])) {

      echo  $_SESSION['successmsgshop'];
    }
    ?>
    <!-- HEADER START -->
    <?php include('header.php'); ?>
    <!-- HEADER END -->

    <!-- Bread Crumb STRAT -->
    <div class="banner inner-banner1 ">
      <div class="container">
        <section class="banner-detail center-xs">
          <h1 class="banner-title">Checkout</h1>
          <div class="bread-crumb right-side float-none-xs">
            <ul>
              <li><a href="index.php">Home</a>/</li>
              <li><a href="cart.php">Cart</a>/</li>
              <li><span>Checkout</span></li>
            </ul>
          </div>
        </section>
      </div>
    </div>
    <!-- Bread Crumb END -->

    <!-- CONTAIN START -->
    <section class="checkout-section ptb-70">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="checkout-step mb-40">
              <ul>
                <li class="active">
                  <a href="checkout.php">
                    <div class="step">
                      <div class="line"></div>
                      <div class="circle">1</div>
                    </div>
                    <span>Shipping</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="step">
                      <div class="line"></div>
                      <div class="circle">2</div>
                    </div>
                    <span>Order Overview</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="step">
                      <div class="line"></div>
                      <div class="circle">3</div>
                    </div>
                    <span>Payment</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="step">
                      <div class="line"></div>
                      <div class="circle">4</div>
                    </div>
                    <span>Order Complete</span>
                  </a>
                </li>
                <li>
                  <div class="step">
                    <div class="line"></div>
                  </div>
                </li>
              </ul>
              <hr>
            </div>
            <div class="checkout-content">
              <div class="row">
                <div class="col-12">
                  <div class="heading-part align-center">
                    <!-- <h2 class="heading">Please fill up your Billing details</h2> -->
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <?php
                $erromessage = "";
                $mail = "";
                // $_SESSION['LOGGED'] = FALSE;
                if (isset($_POST['LOGIN'])) {
                  $email = $_POST['email'];
                  $word = md5($_POST['password']);
                  $status = "Active now";
                  date_default_timezone_set('Africa/Lagos');
                  $date_time = date('m/d/Y h:i:s a', time());
                  include("includes/db.php");


                  // require ("includes/functions");
                  //include ('includes/db.php');
                  $log = mysqli_query($con, "SELECT * fROM users WHERE email='$email' AND password='$word'");
                  if (!$log) {
                    die("faileds") . mysqli_connect_error();
                  }
                  if (mysqli_num_rows($log) > 0) {
                    while ($row = mysqli_fetch_array($log)) {
                      $mailler = $row['email'];
                      $pass = md5($row['password']);
                      $uniq = $row['unique_id'];
                    }
                    if (($email == $mailler) && (md5($word) ==  $pass)) {
                      $_SESSION['LOGGED'] = "true";
                      $_SESSION['email'] = $email;
                      $_SESSION['password'] = $word;
                      // $mail = $_SESSION['email'];
                      $mail = "logged";
                      echo "<script> location.href='checkout.php'</script>";
                    }
                  } else {

                    $erromessage = "Invalid Email or Password";
                    //echo md5(1234); 
                  }
                }
                ?>
                <?php if (!empty($erromessage)) {
                ?><center><button class="btn-error" style="color:red;">
                      <?php echo $erromessage;
                      ?>
                    </button></center><br /><br /><?php } ?>
                <div class="col-xl-12 col-lg-8 col-md-8">
                  <?php

                  if (!empty($mail)) {
                    echo "";
                  } else {
                    //if( $_SESSION['LOGGED'] !="true"){



                  ?>
                    <div class="col-md-12" id="billpass2">

                      <span>


                        <label>Returning customer? <button onclick="showlogin()">Login here!</button></label>
                      </span>


                    </div>
                    <div class="col-md-12" style="display:none;" id="loghide">

                      <span>


                        <label>Returning customer? <button onclick="hidelogin()">Login here!</button></label>
                      </span>


                    </div>
                  <?php } //} 
                  ?>
                  <form class="main-form full" method="POST" style="display:none;" id="login">
                    <div class="row">

                      <div class="col-12 mb-20">
                        <div class="heading-part heading-bg">

                          <h2 class="heading">Customer Login</h2>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="input-box">

                          <label for="login-email">Email address</label>
                          <input id="login-email" name="email" type="email" required="" placeholder="Email Address">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="input-box">
                          <label for="login-pass">Password</label>
                          <input id="login-pass" name="password" type="password" required="" placeholder="Enter your Password">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="check-box left-side">
                          <span>
                            <input type="checkbox" name="remember_me" id="remember_me" class="checkbox">
                            <label for="remember_me">Remember Me</label>
                          </span>
                        </div>
                        <button name="LOGIN" type="submit" class="btn-color right-side">Log In</button>
                      </div>
                      <div class="col-md-12"> <a title="Forgot Password" class="forgot-password mtb-20" href="#">Forgot your password?</a>
                        <hr>
                      </div>
                      <!-- <div class="col-12">
                    <div class="new-account align-center mt-20"> <span>New to Stylexpo?</span> <a class="link" title="Register with Stylexpo" href="register.php">Create New Account</a> </div>
                  </div> -->
                    </div>
                  </form>
                  <form class="main-form full" method="POST">


                    <div class="row">
                      <div class="col-12 mb-20">
                        <div class="heading-part">
                          <h3 class="sub-heading">Billing Address</h3>
                        </div>
                        <hr>
                      </div>
                      <?php if (isset($_SESSION['email'])) {
                        $session = $connected->session();
                        if (!$session) {
                        }
                        while ($rowed = mysqli_fetch_assoc($session)) {
                          $mailler = $rowed['email'];
                          $full = $rowed['fname'];
                          $last_name = $rowed['lname'];
                          $address = $rowed['address'];
                          $phone = $rowed['phone'];
                        }
                      } ?>
                      <div class="col-md-6">
                        <div class="input-box">
                          <label for="firstname">First Name</label>
                          <input type="text" name="name" required="" placeholder="First Name" value="<?php if (isset($_SESSION["name"])) {
                                                                                                        echo  $_SESSION["name"];
                                                                                                      } elseif (isset($full)) {
                                                                                                        echo $full;
                                                                                                      } ?>" required="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input-box">
                          <label for="lastname">Last Name</label>
                          <input type="text" name="last_name" required="" placeholder="last name" value="<?php if (isset($_SESSION["last_name"])) {
                                                                                                            echo  $_SESSION["last_name"];
                                                                                                          } elseif (isset($last_name)) {
                                                                                                            echo $last_name;
                                                                                                          } ?>" required="">
                        </div>
                      </div>
                      <!-- <div class="col-md-6">
                      <div class="input-box">
                        <input type="text" required=""placeholder="Company">
                      </div>
                    </div> -->
                      <div class="col-md-6">
                        <div class="input-box">
                          <label for="phone">Phone Number</label>
                          <input type="text" name="phone" required="" placeholder="Contact Number" value="<?php if (isset($_SESSION["phonepayment"])) {
                                                                                                            echo  $_SESSION["phonepayment"];
                                                                                                          } elseif (isset($phone)) {
                                                                                                            echo $phone;
                                                                                                          } ?>" required="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input-box select-dropdown">
                          <label for="country">Select country</label>
                          <fieldset>
                            <select name="country" class="option-drop" id="country_id" required="">
                              <option selected="" value="">Select Country</option>
                              <?php include('include/db.php');
                              $select = $con->query("select * from countries");
                              while ($row = $select->fetch_array()) {; ?>
                                <option value="<?php echo $row['countries_id']; ?>"><?php echo $row['countries_name']; ?></option>
                              <?php } ?>
                              <!-- <option value="AF">Afghanistan</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="PW">Belau</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia</option>
                            <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="VG">British Virgin Islands</option>
                            <option value="BN">Brunei</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos (Keeling) Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo (Brazzaville)</option>
                            <option value="CD">Congo (Kinshasa)</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="HR">Croatia</option>
                            <option value="CU">Cuba</option>
                            <option value="CW">Curaçao</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard Island and McDonald Islands</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran</option>
                            <option value="IQ">Iraq</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="CI">Ivory Coast</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Laos</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macao S.A.R., China</option>
                            <option value="MK">Macedonia</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia</option>
                            <option value="MD">Moldova</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="AN">Netherlands Antilles</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="KP">North Korea</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PS">Palestinian Territory</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="IE">Republic of Ireland</option>
                            <option value="RE">Reunion</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russia</option>
                            <option value="RW">Rwanda</option>
                            <option value="ST">São Tomé and Príncipe</option>
                            <option value="BL">Saint Barthélemy</option>
                            <option value="SH">Saint Helena</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="SX">Saint Martin (Dutch part)</option>
                            <option value="MF">Saint Martin (French part)</option>
                            <option value="PM">Saint Pierre and Miquelon</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia/Sandwich Islands</option>
                            <option value="KR">South Korea</option>
                            <option value="SS">South Sudan</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syria</option>
                            <option value="TW">Taiwan</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania</option>
                            <option value="TH">Thailand</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom (UK)</option>
                            <option value="US">United States (US)</option>
                            <option value="UM">United States (US) Minor Outlying Islands</option>
                            <option value="VI">United States (US) Virgin Islands</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VA">Vatican</option>
                            <option value="VE">Venezuela</option>
                            <option value="VN">Vietnam</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option> -->
                            </select>
                          </fieldset>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="input-box">
                          <label for="shippingaddress">Shipping Address</label>
                          <input type="text" name="address" required="" placeholder="shipping Address" value="<?php if (isset($_SESSION["addresspayment"])) {
                                                                                                                echo  $_SESSION["addresspayment"];
                                                                                                              } elseif (isset($address)) {
                                                                                                                echo $address;
                                                                                                              } ?>">
                          <span>Please provide the number and street.</span>
                        </div>
                      </div>
                      <!-- <div class="col-md-12">
                      <div class="input-box">
                        <input type="text" required=""placeholder="Billing Landmark">
                        <span>Please include landmark (e.g : Opposite Bank) as the carrier service may find it easier to locate your address.</span> 
                      </div>
                    </div> -->

                      <div class="col-md-6">
                        <div class="input-box select-dropdown">
                          <label for="state">Select state</label>
                          <fieldset>
                            <select name="zone" class="option-drop" id="state_id" required="">
                              <option value="">Select country first</option>
                              <!-- <option value="AP">Andhra Pradesh</option>
                            <option value="AR">Arunachal Pradesh</option>
                            <option value="AS">Assam</option>
                            <option value="BR">Bihar</option>
                            <option value="CT">Chhattisgarh</option>
                            <option value="GA">Goa</option>
                            <option value="GJ">Gujarat</option>
                            <option value="HR">Haryana</option>
                            <option value="HP">Himachal Pradesh</option>
                            <option value="JK">Jammu and Kashmir</option>
                            <option value="JH">Jharkhand</option>
                            <option value="KA">Karnataka</option>
                            <option value="KL">Kerala</option>
                            <option value="MP">Madhya Pradesh</option>
                            <option value="MH">Maharashtra</option>
                            <option value="MN">Manipur</option>
                            <option value="ML">Meghalaya</option>
                            <option value="MZ">Mizoram</option>
                            <option value="NL">Nagaland</option>
                            <option value="OR">Orissa</option>
                            <option value="PB">Punjab</option>
                            <option value="RJ">Rajasthan</option>
                            <option value="SK">Sikkim</option>
                            <option value="TN">Tamil Nadu</option>
                            <option value="TS">Telangana</option>
                            <option value="TR">Tripura</option>
                            <option value="UK">Uttarakhand</option>
                            <option value="UP">Uttar Pradesh</option>
                            <option value="WB">West Bengal</option>
                            <option value="AN">Andaman and Nicobar Islands</option>
                            <option value="CH">Chandigarh</option>
                            <option value="DN">Dadar and Nagar Haveli</option>
                            <option value="DD">Daman and Diu</option>
                            <option value="DL">Delhi</option>
                            <option value="LD">Lakshadeep</option>
                            <option value="PY">Pondicherry (Puducherry)</option> -->
                            </select>
                          </fieldset>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input-box">
                          <label for="city">Town/City</label>
                          <input type="text" name="city" required="" placeholder="Select City">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="input-box">
                          <label for="email">Email</label>
                          <input type="email" name="email" required="" placeholder="email" value="<?php if (isset($_SESSION["email"])) {
                                                                                                    echo  $_SESSION["email"];
                                                                                                  } elseif (isset($mailler)) {
                                                                                                    echo $mailler;
                                                                                                  } ?>">
                        </div>
                      </div>
                      <?php
                      // sesssion flash the purchased film
                      if (is_array($_SESSION['cart'])) {
                        $max = count($_SESSION['cart']);
                        for ($i = 0; $i < $max; $i++) {
                          $pid = $_SESSION['cart'][$i]['productid'];
                          $q = $_SESSION['cart'][$i]['qty'];
                          //$s=	$_SESSION['cart'][$i]['siz'];
                          $connected = new connection();

                          $pname = $connected->get_product_name($pid);
                          $files = $connected->get_files($pid);
                          $id = $connected->get_id($pid);
                          if ($q == 0) continue;


                      ?>

                          <input type="hidden" value="<?php
                                                      echo $connected->get_product_name($pid) ?>" name="brand[]">
                          <input type="hidden" value="<?php
                                                      echo $connected->get_price($pid) * $q; ?>" name="totally[]">
                          <input type="hidden" value="<?php
                                                      echo $connected->get_price($pid); ?>" name="price[]">
                          <input type="hidden" value="<?php
                                                      echo $connected->get_files($pid); ?>" name="file[]">
                          <!-- <input type="hidden" value="<?php //echo $s;
                                                            ?>" name="size[]" required=""> -->
                          <input type="hidden" value="<?php echo $q; ?>" name="qty[]">
                          <input type="hidden" value="<?php echo $id; ?>" name="id[]">
                      <?php }
                      } ?>
                      <div class="col-md-12">
                        <div class="check-box" id="billpass">
                          <span>
                            <input type="checkbox" class="checkbox" id="chk-billing-address" value="1" name="chk-billing-address" onclick="showpass()">

                            <label for="chk-billing-address">Create account with these infos?</label>
                          </span>
                        </div>
                      </div>
                      <div id='ship_fee' style='display:none;'></div>
                      <div class="col-md-12">

                        <div class="input-box" style="display:none;" id="pass-word">
                          <label for="password">Create a strong password</label>
                          <input type="password" name="password" placeholder="password for log in">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <input type="submit" class="btn btn-color right-side" name="submit" value="PROCEED" style="background:#007bff;">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- CONTAINER END -->

    <!-- News Letter Start -->
    <section>
      <div class="newsletter">
        <div class="container">
          <div class="newsletter-inner center-sm">
            <div class="row">
              <div class=" col-xl-12 col-md-12">
                <div class="newsletter-bg">
                  <div class="row justify-content-center">
                    <div class="col-lg-4">
                      <div class="newsletter-title mb-sm-15">
                        <h2 class="main_title">Subscribe for latest updates*</h2>
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <form>
                        <div class="newsletter-box">
                          <input type="email" name="email" placeholder="Email Here...">
                          <button title="Subscribe" type="submit" name="subscribe" class="btn-color">Subscribe</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- News Letter End -->

    <!-- FOOTER START -->
    <?php include('bars/footer.php'); ?>
    <!-- FOOTER END -->
  </div>

  < <script src="js/jquery-1.12.3.min.js">
    </script>
    <script src="../../../../cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.downCount.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/fotorama.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="history/js_drop/jquery.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {

        $("#country_id").change(function() {

          $.get('history/loadsubcat.php?country=' + $(this).val(), function(data) {
            $("#state_id").html(data);

          });
        });
        //shipping
        $("#state_id").change(function() {

          $.get('history/loadsubcat.php?zone=' + $(this).val(), function(data) {
            $("#ship_fee").html(data);

          });
        });
        //total
        $("#state_id").change(function() {

          $.get('history/second.php?zone=' + $(this).val(), function(data) {
            $("#total_fee").html(data);

          });
        });
        //   //show creat password
        //   	$("#createaccount").change(function() {

        // 	$.get('history/creatjs.php?createaccount=' + $(this).val(), function(data) {
        // 		$("#showcreateaccount").html(data);

        // 	});	
        //   });

        //   //show login detail
        //   	$("#showlogin").change(function() {

        // 	$.get('history/showlogin.php?showlogin=' + $(this).val(), function(data) {
        // 		$("#showlogindetails").html(data);

        // 	});	
        //   });
        //   //show payment
        //   	$("#codpayment").change(function() {

        // 	$.get('history/showpaymentjs.php?codpayment=' + $(this).val(), function(data) {
        // 		$("#showcodpayment").html(data);

        // 	});	
        //   });
        // $("#onlinepayment").change(function() {

        // 	$.get('history/onlinepaymentjs.php?onlinepayment=' + $(this).val(), function(data) {
        // 		$("#showonlinepayment").html(data);

        // 	});	
        // });
        //javascript for room


        //javascript for room ends herr

      });
    </script>
    <script type="text/javascript">
      window.setTimeout("document.getElementById('succesmsg').style.display='none';", 3500);
    </script>
    <div id="msgs">
      <?php unset($_SESSION['successmsgshop']); ?>
    </div>
</body>

<!-- Mirrored from aaryaweb.info/html/stylexpo/stx005/checkout.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Aug 2022 13:15:35 GMT -->

</html>