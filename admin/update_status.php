<?php
// session_start();
include "../admin/db-connection.php";

if(isset($_POST['checkout_id']) && isset($_POST['status'])) {
    $checkout_id = $_POST['checkout_id'];
    $status = $_POST['status'];

    // Update the status in the database
    $update_query = "UPDATE checkout SET status='$status' WHERE id='$checkout_id'";
    if($conn->query($update_query) === TRUE) {
        header("Location: checkout_details.php"); // Redirect back to the checkout details page
        exit;
    } else {
        echo "Error updating status: " . $conn->error;
    }
} else {
    echo "Invalid request";
}
?>
