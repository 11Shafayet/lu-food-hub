<?php
include "db-connection.php";
include "header.php";
?>

<title> admin dashboard</title>

<!-- .content area -->

<!-- Include FontAwesome Icon Library -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<br><br>
<div class="row">
  <div class="col-xl-3 col-md-6">
    <div class="card bg-primary text-white">
      <div class="card-body">
        <h3 class="card-title">Total Categories</h3>
        <?php
        $categoryQuery = "SELECT * FROM `food-categories`";
        $res = mysqli_query($conn, $categoryQuery);
        if ($total = mysqli_num_rows($res)) {
          echo '<h4 class="mb-0">' . $total . '</h4>';
        } else {
          echo '<h4 class="mb-0">No Data</h4>';
        }
        ?>
          <br><br>
          <a class="small text-white stretched-link" href="food-categories.php" style="font-size: 1.1rem;">View details</a>

        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card bg-warning text-white">
      <div class="card-body">
        <h3 class="card-title">Total Food Ingredients</h3>
        <?php
        $ingredientQuery = "SELECT * FROM `food_ingredients`";
        $res = mysqli_query($conn, $ingredientQuery);
        if ($total = mysqli_num_rows($res)) {
          echo '<h4 class="mb-0">' . $total . '</h4>';
        } else {
          echo '<h4 class="mb-0">No Data</h4>';
        }
        ?>
          <br><br>
        <a class="small text-white stretched-link" href="food-ingredients.php" style="font-size: 1.1rem;">View details</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card bg-success text-white">
      <div class="card-body">
        <h3 class="card-title">Total Food</h3>
        <?php
        $foodQuery = "SELECT * FROM `food`";
        $res = mysqli_query($conn, $foodQuery);
        if ($total = mysqli_num_rows($res)) {
          echo '<h4 class="mb-0">' . $total . '</h4>';
        } else {
          echo '<h4 class="mb-0">No Data</h4>';
        }
        ?>
          <br><br>
        <a class="small text-white stretched-link" href="display-food.php" style="font-size: 1.1rem;">View details</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card bg-danger text-white">
      <div class="card-body">
        <h3 class="card-title">Total Order</h3>
        <?php
        $orderQuery = "SELECT * FROM `checkout` ";
        $res = mysqli_query($conn,  $orderQuery);
        if ($total = mysqli_num_rows($res)) {
          echo '<h4 class="mb-0">' . $total . '</h4>';
        } else {
          echo '<h4 class="mb-0">No Data</h4>';
        }
        ?>
        <br><br>
        <a class="small text-white stretched-link" href="checkout_details.php" style="font-size: 1.1rem;">View details</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
      </div>
    </div>
  </div>
</div>

<?php
include "footer.php";
?>
