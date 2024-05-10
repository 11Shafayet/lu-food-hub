<?php
// session_start(); // Start the session if not already started
include "../admin/db-connection.php"; // Include the file for database connection
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout Details</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Checkout Details</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Product Name</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Status</th>
    </tr>
    <?php
    // Retrieve checkout details from the database
    $checkout_query = "SELECT * FROM checkout";
    $checkout_result = $conn->query($checkout_query);
    if ($checkout_result->num_rows > 0) {
        while($row = $checkout_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["product_name"] . "</td>";
            echo "<td><img src='../admin/" . $row["product_image"] . "' alt='Product Image' style='width:100px;'></td>";
            echo "<td>" . $row["product_price"] . "</td>";
            echo "<td>";
            echo "<form method='post' action='update_status.php'>";
            echo "<input type='hidden' name='checkout_id' value='" . $row["id"] . "'>";
            echo "<select name='status' onchange='this.form.submit()'>";
            echo "<option value='ordered' " . ($row["status"] == "ordered" ? "selected" : "") . ">Ordered</option>";
            echo "<option value='delivered' " . ($row["status"] == "delivered" ? "selected" : "") . ">Delivered</option>";
            echo "</select>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No checkout details found.</td></tr>";
    }
    ?>
</table>

</body>
</html>
