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
    <link rel="stylesheet" type="text/css" href="Css/orderNow.css">


    <!--Navigation and Footer Css-->
    <link rel="stylesheet" type="text/css" href="Css/navigationCSS.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Css/styles.css">

</head>

<body>

    <?php navigation(); ?>
    <main>
        <section id="order">
            <div class="container">
                <?php
					error_reporting(E_ALL);
					ini_set('display_errors', 1);
					mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

					if (
						isset($_POST['userID']) &&
						isset($_POST['productID']) &&
						isset($_POST['quantity']) &&
						isset($_POST['totalPrice']) &&
						isset($_POST['paymentMethod']) &&
						isset($_POST['address_Line1']) &&
						isset($_POST['address_Line2']) &&
						isset($_POST['postcode']) &&
						isset($_POST['city']) &&
						isset($_POST['state']) &&
						isset($_POST['country']) &&
						isset($_POST['pickup'])
					) {
    // INSERT order into database
						$userID = $_POST['userID'];
						$productID = $_POST['productID'];
						$productQuantity = $_POST['quantity'];
						$total_Price = $_POST['totalPrice'];
						$payment_method = $_POST['paymentMethod'];
						$deliveryType = $_POST['pickup'];

    // Address
						$address_Line1 = $_POST['address_Line1'];
						$address_Line2 = $_POST['address_Line2'];
						$postcode = $_POST['postcode'];
						$city = $_POST['city'];
						$state = $_POST['state'];
						$country = $_POST['country'];

						$address = "$address_Line1, $address_Line2, $postcode, $city, $state, $country";

    // Initialize variables for the file upload
						$new_img_name = null;
						$img_upload_path = null;

						if (isset($_FILES['productDesign']) && $_FILES['productDesign']['error'] === 0) {
							$img_name = $_FILES['productDesign']['name'];
							$img_size = $_FILES['productDesign']['size'];
							$tmp_name = $_FILES['productDesign']['tmp_name'];
							$error = $_FILES['productDesign']['error'];

							//50MB
							if ($img_size > 52428800) {
								echo "Sorry, your file is too large.";
							} else {
								$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
								$img_ex_lc = strtolower($img_ex);

								$allowed_exs = array("jpg", "jpeg", "png", "pdf", "psb");

								if (in_array($img_ex_lc, $allowed_exs)) {
									$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
									$img_upload_path = 'customer_design/' . $new_img_name;
									move_uploaded_file($tmp_name, $img_upload_path);
								} else {
									?>
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Cannot upload this type of file!',
                    showConfirmButton: false,
                    timer: 1500
                })
                </script>
                <?php
								}
							}
						}

    	// Fetch product details
		$sqlGetProduct = "SELECT * FROM `product_details` WHERE `productID` = '$productID'";
		$resDisplayProduct = mysqli_query($conn, $sqlGetProduct);
		$getProductData = mysqli_fetch_assoc($resDisplayProduct);

    	// Fetch user details
		$sqlGetCust = "SELECT * FROM `admin` WHERE `adminID` = '$userID'";
		$resDisplayCust = mysqli_query($conn, $sqlGetCust);
		$getCustData = mysqli_fetch_assoc($resDisplayCust);

		if ($new_img_name !== null && $img_upload_path !== null) {
        // File uploaded, proceed with creating the bill and inserting the order
        // Testing account data
		$secretKey = '84cj268l-rz6g-zed2-f8oi-n9kbdys8whh8';
        $categoryCode = 'zg63y5do'; // category name printing
        $billName = $getProductData['productName'];
        $billDescription = "Order " . $billName . " with Mohaz Marketing";
        $billAmount = $total_Price * 100;
        $billTo = $getCustData['custName'];
        $billEmail = $getCustData['custEmail'];
        $billPhone = $getCustData['custPhoneNum'];

        // Create bill
        $some_data = array(
        	'userSecretKey' => $secretKey,
        	'categoryCode' => $categoryCode,
        	'billName' => $billName,
        	'billDescription' => $billDescription,
        	'billPriceSetting' => 1,
        	'billPayorInfo' => 1,
            'billAmount' => $billAmount, // Put bill need to pay
            'billReturnUrl' => 'https://733c-103-107-87-132.ngrok-free.app/mohazmarketing2/customer/toyyibPay/response',
            'billCallbackUrl' => 'http://bizapp.my/paystatus',
            'billExternalReferenceNo' => time() . rand(),
            'billTo' => $billTo,
            'billEmail' => $billEmail,
            'billPhone' => $billPhone,
            'billSplitPayment' => 0,
            'billSplitPaymentArgs' => '',
            'billPaymentChannel' => '0',
            'billExpiryDays' => 1
          );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createBill');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

        $result = curl_exec($curl);
        $info = curl_getinfo($curl);
        curl_close($curl);
        $result = json_decode($result, true);

        if (isset($result[0]['BillCode'])) {
        	$some_data['BillCode'] = $result[0]['BillCode'];
        	$some_data['paymentURL'] = 'https://dev.toyyibpay.com/' . $result[0]['BillCode'];

        	$billCode = $result[0]['BillCode'];

            // Create verification data and insert the order
        	$sqlInsertOrder = "INSERT INTO `order_item`(`custID`, `productID`, `productQuantity`, `total_Price`, `address`, `payment_method`, `deliveryType`, `billCode`, `order_file_design`) VALUES ('$userID','$productID','$productQuantity','$total_Price','$address','$payment_method', '$deliveryType', '$billCode', '$new_img_name')";
        	$res = mysqli_query($conn, $sqlInsertOrder);

        	if ($res) {
        		?>
                <script type="text/javascript">
                console.log("Order successfully added");
                console.log("<?php echo $some_data['paymentURL']; ?>");
                Swal.fire({
                    icon: 'success',
                    title: 'Order successfully added',
                    text: 'You are now being redirected to the payment page',
                    showConfirmButton: false,
                    timer: 2000 // Show the success message for 2 seconds
                });

                function redirectToPayment() {
                    window.location.href = "<?php echo $some_data['paymentURL']; ?>";
                }

                setTimeout(redirectToPayment, 2000); // Redirect after 2 seconds
                </script>
                <?php
                } else {
                	?>
                <script type="text/javascript">
                console.log("Order failed to add");
                Swal.fire({
                    icon: 'warning',
                    title: 'Order failed to add!',
                    text: 'Please try again',
                    showConfirmButton: true,
                }).then(function() {
                    location.href = "orderNow.php";
                });
                </script>
                <?php
                }
              }
            } else {
        // File not uploaded, proceed with creating the bill and inserting the order without the file-related data
        // Testing account data
		$secretKey = 'l96k5snv-kjgj-eypq-ebji-8cimvphud5yd';
        $categoryCode = 'wfdi8hxv'; // category name printing
        $billName = $getProductData['productName'];
        $billDescription = "Order " . $billName . " with Mohaz Marketing!";
        $billAmount = $total_Price * 100;
        $billTo = $getCustData['adminName'];
        $billEmail = $getCustData['adminEmail'];
        $billPhone = $getCustData['adminPhoneNum'];

        // Create bill
        $some_data = array(
        	'userSecretKey' => $secretKey,
        	'categoryCode' => $categoryCode,
        	'billName' => $billName,
        	'billDescription' => $billDescription,
        	'billPriceSetting' => 1,
        	'billPayorInfo' => 1,
            'billAmount' => $billAmount, // Put bill need to pay
            'billReturnUrl' => 'http://localhost/MohazMarketing2/customer/toyyibPay/response',
            'billCallbackUrl' => 'http://bizapp.my/paystatus',
            'billExternalReferenceNo' => time() . rand(),
            'billTo' => $billTo,
            'billEmail' => $billEmail,
            'billPhone' => $billPhone,
            'billSplitPayment' => 0,
            'billSplitPaymentArgs' => '',
            'billPaymentChannel' => '0',
            'billExpiryDays' => 1
          );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/createBill');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

        $result = curl_exec($curl);
        $info = curl_getinfo($curl);
        curl_close($curl);
        $result = json_decode($result, true);

        if (isset($result[0]['BillCode'])) {
        	$some_data['BillCode'] = $result[0]['BillCode'];
        	$some_data['paymentURL'] = 'https://dev.toyyibpay.com/' . $result[0]['BillCode'];

        	$billCode = $result[0]['BillCode'];

            // Create verification data and insert the order
        	$sqlInsertOrder = "INSERT INTO `order_item`(`custID`, `productID`, `productQuantity`, `total_Price`, `address`, `payment_method`, `deliveryType`, `billCode`) VALUES ('$userID','$productID','$productQuantity','$total_Price','$address','$payment_method', '$deliveryType', '$billCode')";
        	$res = mysqli_query($conn, $sqlInsertOrder);

        	if ($res) {
        		?>
                <script type="text/javascript">
                console.log("Order successfully added");
                console.log("<?php echo $some_data['paymentURL']; ?>");
                Swal.fire({
                    icon: 'success',
                    title: 'Order successfully added',
                    text: 'You are now being redirected to the payment page',
                    showConfirmButton: false,
                    timer: 2000 // Show the success message for 2 seconds
                });

                function redirectToPayment() {
                    window.location.href = "<?php echo $some_data['paymentURL']; ?>";
                }

                setTimeout(redirectToPayment, 2000); // Redirect after 2 seconds
                </script>
                <?php
                } else {
                	?>
                <script type="text/javascript">
                console.log("Order failed to add");
                Swal.fire({
                    icon: 'warning',
                    title: 'Order failed to add!',
                    text: 'Please try again',
                    showConfirmButton: true,
                }).then(function() {
                    location.href = "orderNow.php";
                });
                </script>
                <?php
                }
              }
            }
          } else {
          	?>
                <script type="text/javascript">
                Swal.fire({
                    icon: 'warning',
                    title: 'Order failed to add!',
                    text: 'Please fill in all required fields',
                    showConfirmButton: true,
                }).then(function() {
                    location.href = "orderNow.php";
                });
                </script>
                <?php
          }
          ?>

            </div>
        </section>
    </main>


    <?php footer(); ?>
</body>

</html>

<?php 

//Check session user ID
}else{

  //Later change the location header to the visitor page
	header("Location: ../login.php");
}

?>