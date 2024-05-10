<?php
session_start(); // Start the session if not already started

// Check if the session contains the checkout confirmation message
if (isset($_SESSION['checkout_message'])) {
    $checkout_message = $_SESSION['checkout_message'];
    unset($_SESSION['checkout_message']); // Clear the session variable to avoid displaying the message again
} else {
    $checkout_message = "You have successfully placed your order...We will contact you very soon with your contact number that you have provided us.."; // Default to empty string if no message is set
}

// Check if the session contains any error message during checkout
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']); // Clear the session variable to avoid displaying the message again
} else {
    $error_message = ""; // Default to empty string if no error message is set
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirmation Page</title>
</head>
<body>

<h2>Confirmation Page</h2>

<?php if (!empty($checkout_message)): ?>
    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px;">
        <?php echo $checkout_message; ?>
    </div>
<?php endif; ?>

<?php if (!empty($error_message)): ?>
    <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 10px;">
        <?php echo $error_message; ?>
    </div>
<?php endif; ?>

<a href="index.php">Back to Homet</a>

</body>
</html>
