<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


session_start();
include "mohazDatabase.php";

$OID = $_POST['OID'];
$CID = $_POST['CID'];
$shippingID = $_POST['shippingID'];
$orderStatus = $_POST['orderStatus'];

// Escape the values to prevent SQL injection
$OID = mysqli_real_escape_string($conn, $OID);
$CID = mysqli_real_escape_string($conn, $CID);
$shippingID = mysqli_real_escape_string($conn, $shippingID);
$orderStatus = mysqli_real_escape_string($conn, $orderStatus);

$sqlUpdate = "UPDATE `order_item` SET `shippingID`='$shippingID', `orderStatusPayment`='$orderStatus' WHERE `orderID`='$OID'";
$resUpdate = mysqli_query($conn, $sqlUpdate);

if ($resUpdate) {
	echo "Data saved successfully!";
} else {
	error_log(mysqli_error($conn));
	echo "An error occurred while saving the data.";
}

?>