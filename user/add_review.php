
<?php
include "../admin/db-connection.php";

$submitMessage = ""; // Initialize variable for submit message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id']; // Assuming product ID is submitted via form
    $author = $_POST['author'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO reviews (product_id, author, rating, comment) VALUES (?, ?, ?, ?)");
    
    if ($stmt) {
        // Bind parameters and execute
        $stmt->bind_param("isss", $product_id, $author, $rating, $comment);
        if ($stmt->execute()) {
            $submitMessage = "Your review has been submitted successfully.";
        } else {
            $submitMessage = "Error: Unable to execute the statement.";
        }
        // Close statement
        $stmt->close();
    } else {
        $submitMessage = "Error: Unable to prepare the statement.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Review</title>
</head>
<body>
    <?php if (!empty($submitMessage)) : ?>
        <p><?php echo $submitMessage; ?></p>
    <?php endif; ?>
    
    <!-- Your HTML content goes here -->

</body>
</html>

  
   