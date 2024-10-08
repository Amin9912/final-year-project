<?php 

include "mohazDatabase.php";
include "navigation.php"; 
session_start();

if (isset($_POST['userID']) && isset($_POST['userPassword'])) {

	$userID = $_POST['userID'];
	$userPassword = $_POST['userPassword'];

	//find query to select 2 table
	$sqlSelect = "SELECT * FROM `admin`WHERE `adminID` = '$userID' AND `adminPassword` = '$userPassword'";

	$sqlSelectCust = "SELECT * FROM `customer`WHERE `custName` = '$userID' AND `custPassword` = '$userPassword'";

	$res = mysqli_query($conn, $sqlSelect); 
	$resSelectCust = mysqli_query($conn, $sqlSelectCust); 

	$countAdmin = mysqli_num_rows($res);
	$countCust = mysqli_num_rows($resSelectCust);

	$rowAdmin = mysqli_fetch_assoc($res);
	$rowCust = mysqli_fetch_assoc($resSelectCust);

	if ($countAdmin === 1) {

		//create select statement if input id is admin or customer to access different interface
		$_SESSION['userID'] = $rowAdmin['adminID'];
		$_SESSION['role'] = "<br>Role: Admin";
		header("Location: home.php");

	}elseif($countCust === 1) {
		$_SESSION['userID'] = $rowCust['custID'];
		$_SESSION['role'] = "<br>Role: Customer";
		header("Location: customer/home.php");

	}else{

		?>

		<script type="text/javascript">

			Swal.fire({
				icon: 'warning',
				title: 'Login failed!',
				text: 'Please try again',
				showConfirmButton: true,
			}).then(function() {
       			 // Redirect to the desired page
				location.href = "login.php";
			});
		</script>

		<?php
	}
}
?>