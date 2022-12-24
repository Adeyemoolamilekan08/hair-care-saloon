<?php

session_start();

if(isset($_POST['pays'])){
     if(empty($_POST['parent_cat'])or($_POST['parent_cat']=="Select Location")){
       echo "<script>alert('Delivery Location Should not be Empty')</script>";
    }else{
     $email = $_POST['ltn__email'];
   // $chargeES = $_POST['ltn__subtotal'];
    $chargeES=$_POST['ship_total'];
     $name = $_POST['ltn__name'];
   $charged=($chargeES*100);
   // $url = "https://api.paystack.co/transaction/initialize";

   $curl = curl_init();
   
   $email = $email;
   $amount = $charged;  //the amount in kobo. This value is actually NGN 300
   
   // url to go to after payment
   $callback_url = 'http://localhost/training/ecommerce_cms_tutorial/order-tracking.php';  

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


 
  }
 //$fields = [
   // 'email' => $email,
   // 'amount' => $charged,
   // 'subaccount' => "ACCT_eboou4xgn7v7vjr",
  // 'bearer' => "subaccount"
  //];
 
 // $fields_string = http_build_query($fields);
  //open connection
 // $ch = curl_init();
  
  //set the url, number of POST vars, POST data
  //curl_setopt($ch,CURLOPT_URL, $url);
  //curl_setopt($ch,CURLOPT_POST, true);
  //curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  //curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //"Authorization: Bearer sk_live_f323fbe36fd9502780400539e7b5dda243bf7159",
   // "Cache-Control: no-cache",
 // ));
  
  //So that curl_exec returns the contents of the cURL; rather than echoing it
 // curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
  
  //execute post
  //$response = curl_exec($ch);
  
 // $response = curl_exec($ch);
 // $err = curl_error($ch);
 // curl_close($ch);
  
 // if ($err) {
   // echo "cURL Error #:" . $err;
 // } else {
    //echo $response;
   // $result = json_decode($response);
 // }
  
 // if($result->status == true){
   // $initializing_url =$result->data->authorization_url;
    
    
   //$reference =$result->data->reference;
   $name = $_POST['ltn__name'];
    $email = $_POST['ltn__email'];
    $quantity = $_POST['ltn__quantity'];
    $subtotal = $_POST['ltn__subtotal'];
    //$loaction = $_POST['parent_cat'];
    $ship_fee = $_POST['price'];
    if(($_POST['parent_cat']=="Ibadan")or($_POST['parent_cat']=="Lagos")){
        $location = $_POST['parent_cat'];
        $state = 'Nigeria';
    }elseif($_POST['parent_cat']=="Other South West states"){
         $location = $_POST['state'];
        $state = 'Nigeria';
    }elseif($_POST['parent_cat']=="Other states"){
         $location = $_POST['state'];
        $state = 'Nigeria';
        
    }elseif($_POST['parent_cat']=="Other Countries"){
         $location = 'Abroad';//$_POST['state'];
        $state = $_POST['country'];
    }
    $address = $_POST['address'];
    $telephone = $_POST['telephone'];
    $total = $_SESSION['add'];
    $rand= rand(0000000,9999999);
 // include "config.php";
   // $insert=mysqli_query($conn,"insert into cart_history (Full_name,email,quantity,subtotal,shipping_fee,total,state,country,address,phone)
   // value ('$name','$email','$quantity','$subtotal','$ship_fee','$total','$location','$state','$address','$telephone')");
   $insert1=mysqli_query($conn,"insert into cart_history 
    (Full_name,email,quantity,subtotal,shipping_fee,total,state,country,address,phone,date_time,random,reference,status,delivery_status)
    value 
    ('$name','$email','$quantity','$subtotal','$ship_fee','$total','$location','$state','$address','$telephone',now(),'$rand','','Transaction_Failed',' ')");
    //$totalfiles = count($_POST['hide']);
    if (!$insert1) {
        echo 'There was a problem on your code'.mysqli_error($conn);
        //die"failed".mysqli_connect_error();
      }
      else{
     


    }
    }
    ?>

<?php 
//include("functions/functions.php");

?>
<?php 
include "config.php";
$select = mysqli_query($conn,"select * from user where email= '".$_SESSION['user']."' ");
if(!$select){echo "no user found";}
?>

<?php if($_SESSION['logtocart'] !='true'){
    echo "<script>location.href='login2.php'</script>";
}
else{include "config.php";
$select = mysqli_query($conn,"select * from user where email= '".$_SESSION['user']."' ");
if(!$select){echo "no user found";}
}?>

<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from tunatheme.com/tf/html/broccoli-preview/broccoli/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 16:07:05 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>E-commerce Shopping Cart</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="img/log.jpg" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="css/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <script type="text/javascript" src="cart/js_drop/jquery.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
    
	$("#parent_cat").change(function() {
	//	$(this).after('<div id="loader"><img src="img_drop/loading.gif" alt="loading subcategory" /></div>');
		$.get('cart/loadsubcat.php?parent_cat=' + $(this).val(), function(data) {
			$("#sub_cat").html(data);
			$('#loader').slideUp(200, function() {
				//$(this).remove();
			});
		});	
    });
    //javascript for room
    
    	$("#room_cat").change(function() {
		$(this).after('<div id="loader"><img src="img_drop/loading.gif" alt="loading subcategory" /></div>');
		$.get('loadsubcat.php?room_cat=' + $(this).val(), function(datas) {
			$("#bunk_cat").html(datas);
			$('#loader').slideUp(200, function() {
			//	$(this).remove();
			});
		});	
    });

    
    //javascript for room ends herr

});
</script>
</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

<!-- Body main wrapper start -->
<div class="body-wrapper">

    <!-- HEADER AREA START (header-5) -->
    <header class="ltn__header-area ltn__header-5 ltn__header-transparent gradient-color-2">
        <!-- ltn__header-top-area start -->
        <div class="ltn__header-top-area d-none">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li><a href="locations.html"><i class="icon-placeholder"></i> 15/A, Nest Tower, NYC</a></li>
                                <li><a href="mailto:info@webmail.com?Subject=Flower%20greetings%20to%20you"><i class="icon-mail"></i> info@webmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="top-bar-right text-right">
                            <div class="ltn__top-bar-menu">
                                <ul>
                                    <li>
                                        <!-- ltn__language-menu -->
                                        <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                                            <ul>
                                                <li><a href="#" class="dropdown-toggle"><span class="active-currency">English</span></a>
                                                    
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <!-- ltn__social-media -->
                                        <div class="ltn__social-media">
                                            <ul>
                                                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                
                                                <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-top-area end -->

        <!-- ltn__header-middle-area start -->
        <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-black plr--9---">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="site-logo-wrap">
                            <div class="site-logo">
                                <a href="index.html"><img src="img/log.jpg" alt="Log"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col header-menu-column menu-color-white">
                        <div class="header-menu d-none d-xl-block">
                            <nav>
                                <div class="ltn__main-menu">
                                    <ul>
                                        <li class="menu-icon"><a href="index.php">Home</a>
                                            
                                        </li>
                                        <li class="menu-icon"><a href="about.php">About</a>
                                           
                                        </li>
                                        <li class="menu-icon"><a href="shop.php">Shop</a>
                                            
                                        </li>
                                        
                                    
                                    
                                        
                                       
                                        <li><a href="cart/cart.php">cart</a></li>
                                        
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="ltn__header-options ltn__header-options-2">
                        <!-- header-search-1 -->
                        <div class="header-search-wrap">
                            <div class="header-search-1">
                                <div class="search-icon">
                                    <i class="icon-search for-search-show"></i>
                                    <i class="icon-cancel  for-search-close"></i>
                                </div>
                            </div>
                            <div class="header-search-1-form">
                                <form id="#" method="get"  action="#">
                                    <input type="text" name="search" value="" placeholder="Search here..."/>
                                    <button type="submit">
                                        <span><i class="icon-search"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- user-menu -->
                        <div class="ltn__drop-menu user-menu">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-user"></i></a>
                                    <ul>
                                        <li><a href="login2.php">Sign in</a></li>
                                        <li><a href="register.php">Register</a></li>
                                        <li><a href="login.php">Admin</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- mini-cart -->
                        <!--div class="mini-cart-icon">
                            <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                <i class="icon-shopping-cart"></i>
                                <sup>2</sup>
                            </a>
                        </div>
                        <!-- mini-cart -->
                        <!-- Mobile Menu Button -->
                        <div class="mobile-menu-toggle d-xl-none">
                            <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ltn__header-middle-area end -->
    </header>
    <!-- HEADER AREA END -->
    
    <!-- Utilize Cart Menu Start -->
    <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <span class="ltn__utilize-menu-title">Cart</span>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="mini-cart-product-area ltn__scrollbar">
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="img/product/1.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Red Hot Tomato</a></h6>
                        <span class="mini-cart-quantity">1 x $65.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="img/product/2.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Vegetables Juices</a></h6>
                        <span class="mini-cart-quantity">1 x $85.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="img/product/3.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Orange Sliced Mix</a></h6>
                        <span class="mini-cart-quantity">1 x $92.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="img/product/4.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Orange Fresh Juice</a></h6>
                        <span class="mini-cart-quantity">1 x $68.00</span>
                    </div>
                </div>
            </div>
            <div class="mini-cart-footer">
                <div class="mini-cart-sub-total">
                    <h5>Subtotal: <span>$310.00</span></h5>
                </div>
                <div class="btn-wrapper">
                    <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                    <a href="cart.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                </div>
                <p>Free Shipping on All Orders Over $100!</p>
            </div>

        </div>
    </div>
    <!-- Utilize Cart Menu End -->

    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a href="index.html"><img src="img/logo.png" alt="Logo"></a>
                </div>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="ltn__utilize-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="ltn__utilize-menu">
                <ul>
                     <ul>
                                        <li class="menu-icon"><a href="index.php">Home</a>
                                            
                                        </li>
                                        <li class="menu-icon"><a href="about.php">About</a>
                                           
                                        </li>
                                        <li class="menu-icon"><a href="shop.php">Shop</a>
                                            
                                        </li>
                                        
                                    
                                    
                                        
                                       
                                        <li><a href="cart/cart.php">cart</a></li>
                                        
                                    </ul>
                </ul>
            </div>
            <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
                <ul>
                                        <li><a href="login2.php">Sign in</a></li>
                                        <li><a href="register.php">Register</a></li>
                                        <li><a href="login.php">Admin</a></li>
                                        
                                    </ul>
                
            </div>
            <div class="ltn__social-media-2">
                <ul>
                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Utilize Mobile Menu End -->

    <div class="ltn__utilize-overlay"></div>

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="img/bg/9.jpg"><div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">//  Welcome to our company</h6>
                            <h1 class="section-title white-color">Checkout</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- WISHLIST AREA START -->
    <div class="ltn__checkout-area mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__checkout-inner">
                        <!---div class="ltn__checkout-single-content ltn__returning-customer-wrap">
                            <h5>Returning customer? <a class="ltn__secondary-color" href="#ltn__returning-customer-login" data-toggle="collapse">Click here to login</a></h5>
                            <div id="ltn__returning-customer-login" class="collapse ltn__checkout-single-content-info">
                                <div class="ltn_coupon-code-form ltn__form-box">
                                    <p>Please login your accont.</p>
                                    <form action="#" >
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="text" name="ltn__name" placeholder="Enter your name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-email ltn__custom-icon">
                                                    <input type="email" name="ltn__email" placeholder="Enter email address">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase">Login</button>
                                        <label class="input-info-save mb-0"><input type="checkbox" name="agree"> Remember me</label>
                                        <p class="mt-30"><a href="register.html">Lost your password?</a></p>
                                    </form>
                                </div>
                            </div>
                        </div-->
                        <!--div class="ltn__checkout-single-content ltn__coupon-code-wrap">
                            <h5>Have a coupon? <a class="ltn__secondary-color" href="#ltn__coupon-code" data-toggle="collapse">Click here to enter your code</a></h5>
                            <div id="ltn__coupon-code" class="collapse ltn__checkout-single-content-info">
                                <div class="ltn__coupon-code-form">
                                    <p>If you have a coupon code, please apply it below.</p>
                                    <form action="#" >
                                        <input type="text" name="coupon-code" placeholder="Coupon code">
                                        <button class="btn theme-btn-2 btn-effect-2 text-uppercase">Apply Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div--->
                        
                        <div class="ltn__checkout-single-content mt-50">
                            <h4 class="title-2">Billing Details</h4>
                            <div class="ltn__checkout-single-content-info">
                                <form method="post" action="" >
                                    <h6>Personal Information</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="ltn__name" placeholder="First name">
                                            </div-->
                                             <?php while($row=mysqli_fetch_array($select)){?>
                                                <input type="text" name="" value="<?php echo $row['full_name'];?>" disabled=""/>
                                                <input type="hidden" name="ltn__name" value="<?php echo $row['full_name'];?>" />
                                        </div>
                                        <!--div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" name="ltn__lastname" placeholder="Last name">
                                            </div>
                                        </div-->
                                        <div class="col-md-6">
                                            <!--div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" name="ltn__email" placeholder="email address">
                                            </div-->
                                            <input type="email" name="" value="<?php echo $row['email'];?>" disabled=""/>
                                                 <input type="hidden" name="ltn__email" value="<?php echo $row['email'];?>" />
                                            <?php  }?>
                                        </div>
                                        <!--div class="col-md-6">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" name="ltn__phone" placeholder="phone number">
                                            </div>
                                        </div-->
                                         <div class="col-md-6">
                                            <div class="input-item input-item ">
                                            <label>Total Quantity of product </label>
                                            <?php $quan =0;
                                                   //$sub = 0;
                                            $select2 = mysqli_query($conn,"select * from tbl_cart where buyer= '".$_SESSION['users']."' ");
                                            while($row2=mysqli_fetch_array($select2)){
                                            $quan += $row2['quantity']; 
                                            }
                                            $quat = $quan;
                                            //;//$sub +=$row2[''];?>
                              <input type="text" name="" value="<?php echo $quat;?>" disabled=""/>
                                          <input type="hidden" name="ltn__quantity" value="<?php echo $quat;?>" />
                                          
                                            </div>
                                        </div>
                                         <?php $s =mysqli_query($conn,"select * from tbl_cart where buyer='".$_SESSION['user']."'") ;
                                        while($c = mysqli_fetch_array($s)){?>
                                        <input type="hidden" name="hide[]" value="<?php echo $c['product_id'];?>"/>
                                        <input type="hidden" name="p_quantity[]" value="<?php echo $c['quantity'];?>"/>
                                        <input type="hidden" name="p_name[]" value="<?php echo $c['p_name'];?>"/>
                                        <input type="hidden" name="p_code[]" value="<?php echo $c['p_code'];?>"/>
                                        <input type="hidden" name="p_price[]" value="<?php echo $c['p_price'];?>"/>
                              
                                        <?php } ?>
                                         <div class="col-md-6">
                                            <div class="input-item input-item">
                                            <label>Subtotal</label>
                                           
                                            
                                           
                         <input type="text" name="ltn__subtotal" value="# <?php echo  $_SESSION['amount'];?>" disabled=""/>
                          <input type="hidden" name="ltn__subtotal" value="<?php echo $_SESSION['amount'];?>" />
                        
                                            </div>
                                        </div>
                                        
                                        <!--div class="col-md-6">
                                            <div class="input-item input-item-website ltn__custom-icon">
                                                <input type="text" name="ltn__company" placeholder="Company name (optional)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-website ltn__custom-icon">
                                                <input type="text" name="ltn__phone" placeholder="Company address (optional)">
                                            </div>
                                        </div>
                                    </div-->
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <h6>Reciever's Destination</h6>
                                            <div class="input-item">
                                                <select name="parent_cat" id="parent_cat" class="nice-select" required="">
                                                   <option></option>
                                                    <option>Ibadan</option>
        <option>Lagos</option>
         <option>Other South West states</option>
          <option>Other states</option>
           <option>Other Countries</option>
                                                </select>
                                               
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="col-lg-12 col-md-12" id="sub_cat">
                                            
                                            <!--div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-item">
                                                        <input type="text" placeholder="House number and street name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-item">
                                                        <input type="text" placeholder="Apartment, suite, unit etc. (optional)">
                                                    </div>
                                                </div>
                                            </div-->
                                        </div>
                                        <!--div class="col-lg-4 col-md-6">
                                            <h6>Town / City</h6>
                                            <div class="input-item">
                                                <input type="text" placeholder="City">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <h6>State </h6>
                                            <div class="input-item">
                                                <input type="text" placeholder="State">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <h6>Zip</h6>
                                            <div class="input-item">
                                                <input type="text" placeholder="Zip">
                                            </div>
                                        </div>
                                    </div>
                                    <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> Create an account?</label></p>
                                    <h6>Order Notes (optional)</h6>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea name="ltn__message" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div-->
  
                                      
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" name="pays" type="submit">
                                       Place order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        include "config.php";
  if(isset($_POST['place_order'])){
    if(empty($_POST['parent_cat'])or($_POST['parent_cat']=="Select Location")){
        echo "<script>alert('delivery location not chosen')</script>";
    }else{
    $name = $_POST['ltn__name'];
    $email = $_POST['ltn__email'];
    $quantity = $_POST['ltn__quantity'];
    $subtotal = $_POST['ltn__subtotal'];
    //$loaction = $_POST['parent_cat'];
    $ship_fee = $_POST['price'];
    if(($_POST['parent_cat']=="Ibadan")or($_POST['parent_cat']=="Lagos")){
        $location = $_POST['parent_cat'];
        $state = 'Nigeria';
    }elseif($_POST['parent_cat']=="Other South West states"){
         $location = $_POST['state'];
        $state = 'Nigeria';
    }elseif($_POST['parent_cat']=="Other states"){
         $location = $_POST['state'];
        $state = 'Nigeria';
        
    }elseif($_POST['parent_cat']=="Other Countries"){
         $location = 'Abroad';//$_POST['state'];
        $state = $_POST['country'];
    }
    $address = $_POST['address'];
    $telephone = $_POST['telephone'];
    $total = $_SESSION['add'];
    
    //$state = $_POST['state'];
    //$fee = $_POST['']
    $insert=mysqli_query($conn,"insert into cart_history (Full_name,email,quantity,subtotal,shipping_fee,total,state,country,address,phone)
    value ('$name','$email','$quantity','$subtotal','$ship_fee','$total','$location','$state','$address','$telephone')");
    if($insert){
        echo "<script>alert('order successfully placed')
        location.href='checkout2.php'</script>";
    }
    
    }
    
  }
                        
                        
                        
                        
                        ?>
                <!--div class="col-lg-6">
                    <div class="ltn__checkout-payment-method mt-50">
                        <h4 class="title-2">Payment Method</h4>
                        <div id="checkout_accordion_1">
                            <card >
                            <div class="card">
                                <h5 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-1" aria-expanded="false">
                                    Check payments
                                </h5>
                                <div id="faq-item-2-1" class="collapse" data-parent="#checkout_accordion_1">
                                    <div class="card-body">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div>
                            < card>
                            <div class="card">
                                <h5 class="ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-2" aria-expanded="true"> 
                                    Cash on delivery 
                                </h5>
                                <div id="faq-item-2-2" class="collapse show" data-parent="#checkout_accordion_1">
                                    <div class="card-body">
                                        <p>Pay with cash upon delivery.</p>
                                    </div>
                                </div>
                            </div>                          
                            < card >
                            <div class="card">
                                <h5 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-3" aria-expanded="false" >
                                    PayPal <img src="img/icons/payment-3.png" alt="#">
                                </h5>
                                <div id="faq-item-2-3" class="collapse" data-parent="#checkout_accordion_1">
                                    <div class="card-body">
                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ltn__payment-note mt-30 mb-30">
                            <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                        </div>
                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Place order</button>
                    </div>
                </div-->
                <!--div class="col-lg-6">
                    <div class="shoping-cart-total mt-50">
                        <h4 class="title-2">Cart Totals</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Vegetables Juices <strong>× 2</strong></td>
                                    <td>$298.00</td>
                                </tr>
                                <tr>
                                    <td>Orange Sliced Mix <strong>× 2</strong></td>
                                    <td>$170.00</td>
                                </tr>
                                <tr>
                                    <td>Red Hot Tomato <strong>× 2</strong></td>
                                    <td>$150.00</td>
                                </tr>
                                <tr>
                                    <td>Shipping and Handing</td>
                                    <td>$15.00</td>
                                </tr>
                                <tr>
                                    <td>Vat</td>
                                    <td>$00.00</td>
                                </tr>
                                <tr>
                                    <td><strong>Order Total</strong></td>
                                    <td><strong>$633.00</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div-->
            </div>
        </div>
    </div>
    </div>
    </div>
    
    <!-- WISHLIST AREA START -->

    <!-- FEATURE AREA START ( Feature - 3) -->
    <?php include "footer.php";?>
    <!-- FOOTER AREA END -->
</div>
<!-- Body main wrapper end -->

    <!-- All JS Plugins -->
    <script src="js/plugins.js"></script>
    <!-- Main JS -->
    <script src="js/main.js"></script>
  
</body>

<!-- Mirrored from tunatheme.com/tf/html/broccoli-preview/broccoli/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 16:07:05 GMT -->
</html>

