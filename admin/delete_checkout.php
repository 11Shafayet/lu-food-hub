<?php
// session_start(); // Start the session if not already started
include "../admin/db-connection.php"; // Include the file for database connection

// Check if tb_id is provided via GET parameter
if(isset($_GET["id"])) {
    // Sanitize the input to prevent SQL injection
    $tb_id = mysqli_real_escape_string($conn, $_GET["id"]);

    // Construct the DELETE query
    $delete_query = "DELETE FROM checkout WHERE id = '$tb_id'";

    // Execute the DELETE query
    if(mysqli_query($conn, $delete_query)) {
        // Redirect back to the checkout details page after successful deletion
        header("Location: checkout_details.php");
        exit;
    } else {
        // If deletion fails, display an error message
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // If tb_id is not provided, display an error message
    echo "Error: tb_id not provided";
}
?>
