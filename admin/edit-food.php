<?php
session_start();
include "db-connection.php";
include "header.php";
$id = $_GET["id"];
$food_name = "";
$food_category = "";
$food_description = "";
$food_original_price = "";
$food_discount_price = "";
$food_availibility = "";
$food_veg_nonveg = "";
$food_ingredients = "";
$food_image =  "";


$res = mysqli_query($conn, "SELECT * FROM `food` WHERE id = $id");
while ($row = mysqli_fetch_array($res)) {
    
    $food_name = $row["food_name"];
    $food_category = $row["food_category"];
    $food_description =$row["food_description"];
    $food_original_price = $row["food_original_price"];
    $food_discount_price = $row["food_discount_price"];
    $food_availibility = $row["food_availibility"];
    $food_veg_nonveg = $row["food_veg_nonveg"];
    $food_ingredients = $row["food_ingredients"];
    $food_image = $row["food_image"];
    
}
?>
<link rel="stylesheet" href="cropping_css/croppie.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- .content area -->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Food</h1>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <!-- You can add breadcrumb items here if needed -->
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Edit Food</strong>
                </div>
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <div class="alert alert-success" role="alert" id="success" style="display: none">
                                Food Updated Successfully!
                            </div>
                            <div class="alert alert-danger" role="alert" id="error" style="display: none">
                                Duplicate Food Found..
                            </div>
                            <form name="form1" action="" method="post">

                            <div class="form-group">
                                    <div id="uploaded_image" style="cursor: pointer" onclick="document.getElementById('upload_image').click();">
                                        <img src="<?php if($food_image != ""){echo $food_image;}else{?> images/camera.jpg <?php } ?>" id="image1" height="100" width="100">
                                    </div>
                                    <input type="file" name="upload_image" id="upload_image" style="display:none">
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Food Name</label>
                                    <input id="food_name" name="food_name" type="text" class="form-control" aria-invalid="false" placeholder="Enter Food Name" required value="<?php echo $food_name; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Food Category</label>
                                    <select name="food_category" class="form-control">

                                        <?php
                                        $res = mysqli_query($conn, "SELECT * FROM `food-categories` order by `food-categories` asc ");
                                        while ($row = mysqli_fetch_array($res)) {
                                            ?><option <?php if ($food_category==$row["food-categories"]) {echo "selected";} ?>> <?php
                                            echo $row["food-categories"];
                                            echo "</option>";
                                        }

                                        ?>


                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Food Description</label>
                                    <textarea name="food_description" class="form-control"><?php echo $food_description ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Food Original Price</label>
                                    <input id="food_original_price" name="food_original_price" type="text" class="form-control" aria-invalid="false" placeholder="Enter Food Original Price" required value="<?php echo $food_original_price ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Food Discount Price</label>
                                    <input id="food_discount_price" name="food_discount_price" type="text" class="form-control" aria-invalid="false" placeholder="Enter Food Discount Price" required value="<?php echo $food_discount_price ?>">
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Food Availibility</label>
                                    <select name="food_availibility" class="form-control">

                                        <option <?php if($food_availibility=="Yes"){echo "selected";}  ?>>Yes</option>
                                        <option <?php if($food_availibility=="No"){echo "selected";}  ?>>No</option>


                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Food Veg / Nonveg</label>
                                    <select name="food_veg_nonveg" class="form-control">

                                        <option <?php if($food_veg_nonveg=="Veg"){echo "selected";}  ?>>Veg</option>
                                        <option <?php if($food_veg_nonveg=="Nonveg"){echo "selected";}  ?>>Nonveg</option>


                                    </select>
                                </div>

                                <div class="form-group">


                                    <?php

                                    $res = mysqli_query($conn, "SELECT * FROM `food_ingredients` order by `food_ingredients` asc ");
                                    while ($row = mysqli_fetch_array($res)) {
                                        $mystring = $food_ingredients;
                                    ?>

                                        <div class="col-lg-4">
                                            <input type="checkbox" name="ingredients[]" value="<?php echo $row["food_ingredients"] ?>"  <?php if(strpos($mystring,$row["food_ingredients"])!=false) {echo "checked";}  ?>> &nbsp; <?php echo $row["food_ingredients"] ?>
                                        </div>

                                    <?php
                                    }

                                    ?>

                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit1">
                                        <span id="payment-button-amount">Submit</span>
                                    </button>
                                </div>
                                <br>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .card -->
        </div>
    </div>


</div>

<!-- .content area -->

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit1"])) {

    $count = 0;

    $ingredients = "";

    foreach ($_POST["ingredients"] as $check) {

        $count = $count + 1;
        if ($count == 1) {
            $ingredients = $check;
        } else {

            $ingredients = $ingredients . "," . $check;
        }
    }
    
        mysqli_query($conn, "UPDATE `food` SET food_name='$_POST[food_name]',food_category='$_POST[food_category]',food_description='$_POST[food_description]',food_original_price='$_POST[food_original_price]',food_discount_price='$_POST[food_discount_price]',	food_availibility='$_POST[food_availibility]',food_veg_nonveg='$_POST[food_veg_nonveg]',food_ingredients='$ingredients' WHERE id= $id") or die(mysqli_error($conn));

       if($_SESSION["image_name01"])
       {

        copy('temp_photo/' . $_SESSION["image_name01"], 'images/' . $_SESSION["image_name01"]);
    $dst1 = "images/" . $_SESSION["image_name01"];
    mysqli_query($conn, "UPDATE `food` SET food_image ='$dst1' WHERE id = $id") or die(mysqli_error($conn));

    unset($_SESSION["image_name01"]);


       }
       
        
    ?>
        <script type="text/javascript">
            document.getElementById("error").style.display = "none";
            document.getElementById("success").style.display = "block";
            setTimeout(function() {
                window.location.href ="display-food.php";
            }, 1000);
        </script>
<?php


    
}
?>

<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog" style="width:auto">
        <div class="modal-content" style="width: 1000px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload & Crop Image</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 text-center">
                        <div id="image_demo" style="width:350px;"></div>

                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-success crop_image">Crop & Upload Image</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    //https://foliotek.github.io/Croppie/
    $(document).ready(function() {
        $image_crop = $('#image_demo').croppie({
            enforceBoundary: false,
            enableOrientation: true,
            viewport: {
                width: 270,
                height: 230,
                type: 'square'
            },
            boundary: {
                width: 300,
                height: 250
            }
        });

        $('#upload_image').on('change', function() {

            var reader = new FileReader();
            reader.onload = function(event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });

        $('.crop_image').click(function(event) {
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response) {
                $.ajax({
                    url: "crop_and_upload01.php",
                    type: "POST",
                    data: {
                        "image": response
                    },
                    success: function(data) {
                        $('#uploadimageModal').modal('hide');
                        $('#uploaded_image').html(data);
                    }
                });
            })
        });

    });
</script>
<script src="cropping_js/bootstrap.min.js"></script>
<script src="cropping_js/croppie.js"></script>
<script src="cropping_js/exif.js"></script>

<?php
include "footer.php";
?>