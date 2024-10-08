<?php
// Assuming you have a database connection established
include "mohazDatabase.php";

// Retrieve data from the database
$query = "SELECT `productID`, `productName`, `productSize`, `unitSize`, `productPrice`, `productDescription` FROM `product_details`";
$result = mysqli_query($conn, $query);

// Create an array to store the data
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
