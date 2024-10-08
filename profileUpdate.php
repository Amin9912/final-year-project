<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


session_start();
include "mohazDatabase.php";

$custFullName = $_POST['custFullName'];
$custPhoneNum = $_POST['custPhoneNum'];
$address_Line1 = $_POST['address_Line1'];
$address_Line2 = $_POST['address_Line2'];
$postcode = $_POST['postcode'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$userID = $_SESSION['userID'];

$sqlUpdateUserInfo = "UPDATE `admin` SET `adminName`='$custFullName',`adminPhoneNum`='$custPhoneNum',`address_Line1`='$address_Line1',`address_Line2`='$address_Line2',`postcode`='$postcode',`state`='$state', `city`='$city', `country`='$country' WHERE `adminID` = '$userID'";

$res = mysqli_query($conn, $sqlUpdateUserInfo);

if ($res) {
	echo "Data saved successfully!";
} else {
	error_log(mysqli_error($conn));
	echo "An error occurred while saving the data.";
}

?>