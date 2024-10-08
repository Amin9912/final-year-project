<?php
include "../mohazDatabase.php";
include "../navigation.php";
session_start();

//Get order details

//Input sementara
if ($_POST['OID']) {

  $orderID = $_POST['OID'];

  //Get order details
  $sqlGetOrder = "SELECT * FROM `order_item` WHERE `orderID` = '$orderID'";
  $resDisplayOrder = mysqli_query($conn, $sqlGetOrder);
  $getOrderData = mysqli_fetch_assoc($resDisplayOrder);

  $productID = $getOrderData['productID'];
  $custID = $getOrderData['custID'];

  //get product details
  $sqlGetProduct = "SELECT * FROM `product_details` WHERE `productID` = '$productID'";
  $resDisplayProduct = mysqli_query($conn, $sqlGetProduct);
  $getProductData = mysqli_fetch_assoc($resDisplayProduct);

  //get user details
  $sqlGetCust = "SELECT * FROM `customer` WHERE `custID` = '$custID'";
  $resDisplayCust = mysqli_query($conn, $sqlGetCust);
  $getCustData = mysqli_fetch_assoc($resDisplayCust);

//Testing account data

$secretKey = 'l96k5snv-kjgj-eypq-ebji-8cimvphud5yd';
$categoryCode = 'wfdi8hxv	'; //category name printing
$billName = $getProductData['productName'];
$billDescription = "Order ". $billName . " with Mohaz Marketing";
$billAmount= $getOrderData['total_Price']*100;
$billTo = $getCustData['custName'];
$billEmail = $getCustData['custEmail'];
$billPhone = $getCustData['custPhoneNum'];

//$currentDateTime = date('m-d-y H:i:s A'); // Current date and time
//$plusMinutes = date('m-d-y H:i:s A', strtotime($currentDateTime . ' +5 minutes'));


//Create bill

  $some_data = array(
    'userSecretKey'=>$secretKey,
    'categoryCode'=>$categoryCode,
    'billName'=>$billName,
    'billDescription'=>$billDescription,
    'billPriceSetting'=>1,
    'billPayorInfo'=>1,
    'billAmount'=>$billAmount, //Put bill need to pay
    'billReturnUrl'=>'https://8090-103-107-87-132.ngrok-free.app/MohazMarketing2/toyyibPay/response',
    'billCallbackUrl'=>'http://bizapp.my/paystatus',
    'billExternalReferenceNo' => time().rand(),
    'billTo'=>$billTo,
    'billEmail'=>$billEmail,
    'billPhone'=>$billPhone,
    'billSplitPayment'=>0,
    'billSplitPaymentArgs'=>'',
    'billPaymentChannel'=>'0',
    //'billContentEmail'=>'Thank you for purchasing our product!',
    //'billChargeToCustomer'=>1,
    //'billExpiryDate'=>$plusMinutes
    'billExpiryDays'=>2
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
  //echo $result;

  $some_data['BillCode'] = $result[0]['BillCode'];
  $some_data['paymentURL'] = 'https://dev.toyyibpay.com/' . $result[0]['BillCode'];

  $billCode = $result[0]['BillCode'];

  //update order details
  /*$sqlUpdateOrder = "UPDATE `order_item` SET `billCode` = '$billCode' WHERE `orderID`='$orderID'";
  $resDisplayOrder = mysqli_query($conn, $sqlUpdateOrder);  */

  //echo $some_data['paymentURL'];
  //echo "<br>".$billCode;

  header('Location: ' . $some_data['paymentURL']);

}else{
  echo "No order ID input!";
}

?>