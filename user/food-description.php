<?php
    include "header.php";
    include "../admin/db-connection.php";

    $id = $_GET["id"];
    $food_name = "";
    $food_description = "";
    $food_image = "";
    $food_price = "";
    $food_ingredients = "";
    $food_category = "";

    $res = mysqli_query($conn, "SELECT * FROM `food`WHERE id = $id");

    while ($row = mysqli_fetch_array($res)) {
        $food_name = $row["food_name"];
        $food_description = $row["food_description"];
        $food_image = $row["food_image"];
        $food_price = $row["food_discount_price"];
        $food_ingredients = $row["food_ingredients"];
        $food_category = $row["food_category"];
    }
?>


<link href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"  rel = "stylesheet">
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
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->


<title>Food Description</title>

<!-- Page Title -->
<section class="page-title" style="background-image: url(assets/images/background/11.jpg)">
    <div class="auto-container">
        <h1>Food Details</h1>
    </div>
</section>
<!-- End Page Title -->

<!--Shop Single Section-->
<section class="shop-single-section">
    <div class="auto-container">
        <div class="shop-single">
            <div class="product-details">
                <!--Basic Details-->
                <div class="basic-details">
                    <div class="row clearfix">
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <figure class="image-box">
                                <a href="#" class="lightbox-image" title="Image Caption Here">
                                    <img src="../admin/<?php echo $food_image; ?>" alt="">
                                </a>
                            </figure>
                        </div>
                        <div class="info-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <h2><?php echo $food_name; ?></h2>
                                <div class="text"><?php echo $food_description; ?></div>
                                <div class="text">Ingredients: <?php echo $food_ingredients; ?></div>
                                <div class="price">Price: <span>৳<?php echo $food_price; ?></span></div>
                                <div class="other-options clearfix">
                                    <div class="item-quantity">
                                        <label class="field-label">Quantity :</label>
                                        <input class="quantity-spinner" type="text" value="2" name="quantity" id="qty">
                                    </div>
                                    <button type="button" class="theme-btn btn-style-five" onclick="add_to_cart('<?php echo $id ?>',document.getElementById('qty').value);">
                                        <span class="txt">Add to cart</span>
                                    </button>
                                   
                                    <button type="button" class="theme-btn btn-style-five" onclick="location.href='view-cart.php';"> <span class="txt"> View Cart</span> </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Basic Details-->
            </div>
        </div>
    </div>
</section>
<!--End Shop Single Section-->

<!-- Similar Products Section -->
<section class="similar-products-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>Similar Products</h2>
        </div>
        <div class="row clearfix">
            <?php
                $res = mysqli_query($conn, "SELECT * FROM `food` WHERE food_category = '$food_category'  &&  id!=$id");
                while ($row = mysqli_fetch_array($res)) {
            ?>
            <div class="product-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box">
                    <figure class="image-box">
                        <img src="../admin/<?php echo $row["food_image"] ?>" alt="">
                    </figure>
                    <div class="lower-content">
                        <h4><a href="food-description.php?id=<?php echo $row["id"]; ?>"><?php echo $row["food_name"]; ?></a></h4>
                        <div class="text"><?php echo substr($row["food_description"], 0, 30); ?>..</div>
                        <div class="price">৳<?php echo $row["food_discount_price"]; ?></div>
                        <div class="lower-box">
                            <a href="food-description.php?id=<?php echo $row["id"]; ?>" class="theme-btn btn-style-five">
                                <span class="txt">Order Now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
            <!-- Products Block -->
        </div>
    </div>
</section>
<!-- End Similar Products Section -->

<script type="text/javascript">
    function add_to_cart(id, qty) {
        var xmlhttp1 = new XMLHttpRequest();
        xmlhttp1.onreadystatechange = function () {
            if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
                alert("Product Added To Cart Successfully!");
            }
        };
        xmlhttp1.open("GET", "add_to_cart.php?id=" + id + "&qty=" + qty, true);
        xmlhttp1.send();
    }
</script>
<div class="auto-container">
    <h2>User Review</h2>
   
</div>
<?php
  
    include "get_review.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Review Form</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .container {
        max-width: 1100px; /* Increase the maximum width */
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    form {
        margin-top: 20px;
    }
    input[type="text"],
    input[type="number"],
    textarea {
        width: calc(100% - 20px); /* Adjust the width of the input fields */
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    textarea {
        width: calc(100% - 20px); /* Adjust the width of the text area */
        height: 170px;
        resize: vertical;
    }
    button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 15px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
    }
    button[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

</head>
<body>

<div class="container">
    <h2>Add Your Review</h2>
    <form method="post" action="add_review.php">
        <input type="hidden" name="product_id" value="1"> <!-- Assuming product ID is 1 -->
        <input type="text" name="author" placeholder="Your Name" required><br>
        <input type="number" name="rating" placeholder="Rating (1-5)" min="1" max="5" required><br>
        <textarea name="comment" placeholder="Your Review" required></textarea><br>
        <button type="submit">Submit Review</button>
    </form>
</div>

</body>
</html>

                </div>
            </div>
        </div>
    </div>
</div>




<?php
    include "delivery.php";
    include "footer.php";
?>

<script>
		document.getElementById('seeCartPage').addEventListener('submit', function (event) {
			// Prevent the default form submission behavior
			event.preventDefault();
	
			// Redirect to the "order.php" page
			window.location.href = 'view-cart.php';
		});
	</script>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script src="assets/js/parallax.min.js"></script>
<script src="assets/js/jquery.fancybox.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/jquery.bootstrap-touchspin.js"></script>
<script src="assets/js/appear.js"></script>
<script src="assets/js/script.js"></script>
