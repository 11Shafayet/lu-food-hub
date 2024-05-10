<?php
include "../admin/db-connection.php";

// Assuming you have a database connection named $conn

// Query to select reviews for a specific product (replace 1 with the actual product ID)
$product_id = 1;
$sql = "SELECT * FROM reviews WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Reviews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .reviews-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .review {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .review h3 {
            margin-top: 0;
            font-size: 18px;
            color: #333;
        }

        .review .author {
            font-size: 14px;
            color: #666;
        }

        .review .rating {
            margin-top: 10px;
            color: Red;
        }

        .review .comment {
            margin-top: 10px;
            color: #555;
        }

        .no-reviews {
            font-style: italic;
            color: #999;
        }
    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    echo '<div class="reviews-container">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="review">';
        echo "<h3>" . htmlspecialchars($row["author"]) . "</h3>";
        // echo "<div class='author'>" . htmlspecialchars($row["author"]) . "</div>";
        echo "<div class='rating'>Rating: " . htmlspecialchars($row["rating"]) . "</div>";
        echo "<div class='comment'>" . htmlspecialchars($row["comment"]) . "</div>";
        echo "</div>";
    }
    echo '</div>';
} else {
    echo '<div class="no-reviews">No reviews found.</div>';
}

$stmt->close();
$conn->close();
?>

</body>
</html>
