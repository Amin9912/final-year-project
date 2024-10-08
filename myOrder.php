<?php 
include "mohazDatabase.php";
include "navigation.php";
session_start();

//Check session user ID
if(isset($_SESSION['userID'])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Printify - Printing Services</title>

	<!--Product content Css-->
	<link rel="stylesheet" type="text/css" href="Css/myOrder.css">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>


	<!--Navigation and Footer Css-->
	<link rel="stylesheet" type="text/css" href="Css/navigationCSS.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

	<?php navigation(); ?>
	<main>
		<section id="myOrder">
			<div class="container">
				<h2>My Order List</h2>
				<ul>
					<!-- Add more order items here -->
					<!-- List order -->
					<?php

					$custID = $_SESSION['userID'];
					$sqlDisplayOrder = "SELECT * FROM `order_item` WHERE `custID` = '$custID' ORDER BY `orderDateCreate` DESC";
					$resDisplayOrder = mysqli_query($conn, $sqlDisplayOrder);
					$count = mysqli_num_rows($resDisplayOrder);

					if ($count > 0) {
						foreach ($resDisplayOrder as $row) {

							$productID = $row['productID'];

							$sqlDisplayProduct = "SELECT * FROM `product_details` WHERE `productID` = '$productID'";
							$resDisplayProduct = mysqli_query($conn, $sqlDisplayProduct);
							$getProduct = mysqli_fetch_assoc($resDisplayProduct);

							orderList($row['orderID'], $row['shippingID'], $row['deliveryType'], $row['productQuantity'], $row['total_Price'], $row['orderDateCreate'], $row['orderStatusPayment'], $getProduct['productName'], $getProduct['unitSize'], $getProduct['productPic'], $row['billCode']);
						}
					}else{
						?>

						<section id="no-orders">
						  <div class="container">
						    <div class="no-orders-content">
						      <p><i class='fa fa-shopping-bag'> </i> You don't have any orders yet.</p>
						    </div>
						  </div>
						</section>

						<?php
					}

					?>
				</ul>
			</div>
		</section>
	</main>

	<footer>
		<div class="container">
			<p>&copy; 2023 Printify. All rights reserved.</p>
		</div>
	</footer>
</body>

</html>

<?php 
//Check session user ID
}else{

  //Later change the location header to the visitor page
  header("Location: login.php");
}
?>

<?php 

function orderList($orderID, $shippingID, $deliveryType, $productQuantity, $total_Price, $orderDateCreate, $orderStatusPayment, $productName, $unitSize, $productPic, $billCode){

	$payLink = "https://dev.toyyibpay.com/".$billCode;

	?>

	<div class="order-item">
		<div class="order-item-image">
			<img src="product image/<?php echo $productPic; ?>" alt="Order Image">
		</div>
		<div class="order-item-details">
			<h3>Order #<?php echo $orderID; ?></h3>
			<br>
			<p>Product: <?php echo $productName; ?></p>
			<p>Quantity: <?php echo $productQuantity.$unitSize; ?></p>
			<p>Total Price: RM<?php echo $total_Price; ?></p>
			<p>Delivery type: <?php echo $deliveryType; ?></p>
		</div>
		<div class="order-item-status">
			<br>
			<p>Order created: <?php echo $orderDateCreate; ?></p>
			<p>Tracking Number: <?php echo $shippingID; ?></p>
			<p>Status: <?php echo $orderStatusPayment; ?></p>
			<p>Bill ID: <?php echo $billCode; ?></p>
		</div>
		<div class="order-item-actions">
		
			<?php 

			if ($orderStatusPayment == "UNPAID" || $orderStatusPayment == "PENDING" || $orderStatusPayment == "FAIL") {

				?>
				<button class="btn btn-pay" onclick="location.href='<?php echo $payLink; ?>'">Pay</button>
				<?php
			}else{
				?>
				<button class="btn btn-pay" onclick="location.href='<?php echo $payLink; ?>'">View Bill</button>
				<?php
			}

			?>
			<!-- <button class="btn btn-cancel">Cancel</button> -->
		</div>
	</div>


	<?php
}


?>