<?php
session_start(); // Start the session if not already started
include "../admin/db-connection.php"; // Include the file for database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the form data
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';

    // Set the default status to 'ordered'
    $status = 'ordered';

    // Initialize an array to store the values for multi-row insert
    $values = array();

    // Insert data into the checkout table for billing and order details
    if(isset($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $product) {
            $product_name = $product['nm']; // Product name
            $img_session = $product['img1']; // Product image
            $grand_total = $product['qty_total'];
            $price_session = $product['price']*$grand_total;

            // Add values for each product to the array
            $values[] = "('$name', '$address', '$phone', '$status', '$product_name', '$img_session', '$price_session')";
        }
    }

    // Prepare the SQL query with placeholders for multiple rows
    $sql = "INSERT INTO checkout (name, address, phone, status, product_name, product_image, product_price) VALUES " . implode(", ", $values);

    // Execute the combined insert query
    if ($conn->query($sql) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();

    // Redirect user to a confirmation page or any other page as per your requirement
    header("Location:confirmation.php");
    exit();
} else {
    // If someone tries to access this page directly without submitting the form, redirect them to the checkout page
    header("Location: checkout.php");
    exit();
}
?>
