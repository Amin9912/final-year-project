<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


session_start();
include "mohazDatabase.php";

$editPID = $_POST['editPID'];
$editName = $_POST['editName'];
$editSize = $_POST['editSize'];
$editUnitSize = $_POST['editUnitSize'];
$editPrice = $_POST['editPrice'];
$editProductDescription = $_POST['editProductDescription'];

        // Escape the values to prevent SQL injection
$editName = mysqli_real_escape_string($conn, $editName);
$editSize = mysqli_real_escape_string($conn, $editSize);
$editUnitSize = mysqli_real_escape_string($conn, $editUnitSize);
$editProductDescription = mysqli_real_escape_string($conn, $editProductDescription);
$editPrice = mysqli_real_escape_string($conn, $editPrice);

$sqlUpdate = "UPDATE `product_details` SET `productName`='$editName', `productSize`='$editSize', `unitSize`='$editUnitSize', `productDescription`='$editProductDescription', `productPrice`='$editPrice' WHERE `productID`='$editPID'";
$resUpdate = mysqli_query($conn, $sqlUpdate);

if ($resUpdate) {
	echo "Data saved successfully!";
} else {
	error_log(mysqli_error($conn));
	echo "An error occurred while saving the data.";
}

?>