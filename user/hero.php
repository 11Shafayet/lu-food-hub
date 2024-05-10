<?php
session_start();
include "header.php";
include "../admin/db-connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <title>Food Template</title>
    <!-- Stylesheets -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <link href="assets/vendors/flat-icon/flaticon.css" rel="stylesheet">


    <!-- Rev slider css -->
    <link href="assets/vendors/revolution/css/settings.css" rel="stylesheet">
    <link href="assets/vendors/revolution/css/layers.css" rel="stylesheet">
    <link href="assets/vendors/revolution/css/navigation.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="assets/images/logo-02.png" type="image/x-icon">
    <link rel="icon" href="assets/images/logo-02.png" type="image/x-icon">

    <link
            href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&amp;family=Open+Sans:wght@400;600;700;800&amp;family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,700&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap"
            rel="stylesheet">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
</head>

<body>

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    
        <!-- Header Upper -->
        <div class="header-upper">
            <div class="inner-container">
                <div class="auto-container clearfix">


                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->

       

    </header>
    <!-- End Main Header -->

        <!-- Page Title -->
        <section class="page-title" style="background-image: url(assets/images/background/11.jpg)">
            <div class="auto-container">
                <h1>Checkout</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    
                    <li>Checkout</li>
                </ul>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- Checkout Page -->
        <div class="checkout-page">
            <div class="auto-container">

                <!--Billing Details-->
                <div class="billing-details">
                    <div class="shop-form">
                        <form action="checkout-action.php" method="post">
                            <div class="row clearfix">
                                <div class="col-lg-7 col-md-12 col-sm-12">

                                    <div class="sec-title">
                                        <h2>Billing Details</h2>
                                    </div>
                                    <div class="billing-inner">
                                        <div class="row clearfix">

                                            <!--Form Group-->
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Name <sup>*</sup></div>
                                                <input type="text" name="name" value="" placeholder="Name">
                                            </div>


                                            <!--Form Group-->
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Address <sup>*</sup></div>
                                                <input type="text" name="address" value=""
                                                    placeholder="Street Address">
                                                
                                            </div>

                                            

                                        
                                            <!--Form Group-->
                                          

                                            <!--Form Group-->
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Phone <sup>*</sup></div>
                                                <input type="text" name="phone" value=""
                                                    placeholder="Phone Number">
                                            </div>

                                            

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-md-12 col-sm-12">
                                    <div class="sec-title">
                                        <h2>Your Order</h2>
                                    </div>
                                    <div class="shop-order-box">


<?php
if(isset($_SESSION['cart'])) {
    // Assuming you have a loop to iterate through products in the cart
    foreach($_SESSION['cart'] as $product) {
        $nm_session = $product['nm']; // Product name
        $img_session = $product['img1']; // Image URL
        $price_session = $product['price']; // Product price
        $grand_total = $product['qty_total']*$price_session; // Grand total
?>
<!-- Your HTML code to display product details goes here -->
<div class="column-box">
    <figure class="prod-thumb"><img src="../admin/<?php echo $img_session ?>" alt=""></figure>
</div>
<h4 class="prod-title"><?php echo $nm_session ?></h4>
<p class="sub-total">৳<?php echo $grand_total?></p>
<?php
    }
}
?>
                                        
                                   

                                        <!--Place Order-->
                                        <div class="place-order">
                                            <!--Payment Options-->
                                            <div class="payment-options">
                                                <ul>

                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment-group" id="payment-1">
                                                            <label for="payment-1"><strong>Cash on Delivary</strong>
                                                                <span class="small-text">Make your payment directly into
                                                                    our bank account. Please use your Order ID as the
                                                                    payment reference. Your order won’t be shipped until
                                                                    the funds have cleared in our account.</span>
                                                            </label>
                                                        </div>
                                                    </li>

                                                   
                                                </ul>
                                            </div>

                                            <form method="post" action="checkout-action.php">
    <!-- Your form fields -->
    <div class="place-order">
        <!-- Your payment options -->
        <button type="submit" class="theme-btn btn-style-five"><span class="txt">Place Order</span></button>
    </div>
</form>

                                        </div>
                                        <!--End Place Order-->             

                                    </div>


                                </div>
                            </div>
                        </form>

                    </div>

                </div>
                <!--End Billing Details-->
            </div>
        </div>

       

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

    <!-- Search Popup -->
    <div id="search-popup" class="search-popup">
        <div class="close-search theme-btn"><span class="fas fa-window-close"></span></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <form method="post" action="http://designarc.biz/demos/wengdo/index.html">
                    <div class="form-group">
                        <fieldset>
                            <input type="search" class="form-control" name="search-input" value=""
                                placeholder="Search Here" required>
                            <input type="submit" value="Search Now!" class="theme-btn">
                        </fieldset>
                    </div>
                </form>

            
            </div>

        </div>
    </div>

    <!--Scroll to top-->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/parallax.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/jquery.bootstrap-touchspin.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>