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

</head>

<body>

  <?php navigation(); ?>
  <main>

    <section id="order">
      <div class="container">
        
        <?php 

        orderForm();

        ?>

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
  header("Location: ../login.php");
}

?>

<?php 

function orderForm(){

  include "mohazDatabase.php";
  $userID = $_SESSION['userID'];

  //Display chosen product ID
$productID = $_POST['productID'];

$sqlDisplayProduct = "SELECT * FROM `product_details` WHERE `productID` = '$productID'";
$resDisplayProduct = mysqli_query($conn, $sqlDisplayProduct);
$count = mysqli_num_rows($resDisplayProduct);

if ($count > 0) {
  foreach ($resDisplayProduct as $row) {
    displayProduct2($userID, $row['productID'], $row['productName'], $row['productSize'], $row['unitSize'], $row['productDescription'], $row['productPrice'], $row['productPic']);
  }
}else{
  echo "No Product chosen!";
}
}
//End function orderForm()
?>

<?php

function displayProduct2($userID, $productID, $productName, $productSize, $unitSize, $productDescription, $productPrice, $productPic){

  include "mohazDatabase.php";

  $sqlSelectCust = "SELECT * FROM `customer`WHERE `custID` = '$userID'";

  $res = mysqli_query($conn, $sqlSelectCust);
  $row = mysqli_fetch_assoc($res);

  ?>
  <div class="mainscreen">
    <!-- <img src="https://image.freepik.com/free-vector/purple-background-with-neon-frame_52683-34124.jpg"  class="bgimg " alt="">--> 
    <div class="card">
      <div class="leftside">
        <img
        src="../product image/<?php echo $productPic; ?>"
        class="product"
        alt="product"
        />
      </div>
      <div class="rightside">
        <form action="createOrder.php" method="post" enctype="multipart/form-data">
          <h1>CheckOut</h1>
          <h2>Payment Information</h2>

          <input type="hidden" class="inputbox" id="productID" name="productID" value="<?= $productID ?>"/>
          <input type="hidden" class="inputbox" id="userID" name="userID" value="<?= $userID ?>"/>

          <p>Product name</p>
          <input type="text" class="inputbox" id="productName" name="productName" value="<?= $productName ?>" disabled />

          <p>Price</p>
          <input type="text" class="inputbox" id="productPrice" name="productPrice" value="<?= $productPrice ?>" disabled>

          <p>Quantity(<?= $unitSize ?>)*</p>
          <input type="number" class="inputbox" name="quantity" min="1" value="1" oninput="mult(this.value);" required>

          <p>Upload design(if any)</p>
          <input type="file" class="inputbox" name="productDesign" id="productDesign">
          <label><span class="red-line">*We'll contact for design consulting if you don't have design*</span></label><br><br>

          <p>Payment method*</p>
          <select class="inputbox" name="paymentMethod" id="paymentMethod" required>
            <option value="" disabled selected>-</option>
            <option value="fpx">fpx</option>
          </select>

          <p>Pickup*<span class="red-line"> RM4 will be charge for delivery*</span></p>
          <select class="inputbox" name="pickup" id="pickup" oninput="addPickup(this.value);" required>
            <option value="" disabled selected>-</option>
            <option value="DELIVERY">Delivery</option>
            <option value="SELF-PICKUP">Self-pickup</option>
          </select>

          <p>Address line 1*</p>
          <input type="text" class="inputbox" name="address_Line1" id="address_Line1" placeholder="Address line 1..." value="<?php echo $row['address_Line1'] ?>" required>

          <p>Address line 2*</p>
          <input type="text" class="inputbox" name="address_Line2" id="address_Line2" placeholder="Address line 2..." value="<?php echo $row['address_Line2'] ?>" required>

          <div class="expcvv">
            <p class="expcvv_text">Postcode*</p>
            <input type="text" class="inputbox" name="postcode" id="postcode" placeholder="Postcode..." value="<?php echo $row['postcode'] ?>" required>

            <p class="expcvv_text2">City*</p>
            <input type="text" class="inputbox" name="city" id="city" placeholder="City..." value="<?php echo $row['city'] ?>" required>
          </div>

          <div class="expcvv">
            <p class="expcvv_text">State*</p>
            <input type="text" class="inputbox" name="state" id="state" placeholder="State..." value="<?php echo $row['state'] ?>" required>

            <p class="expcvv_text2">Country*</p>
            <input type="text" class="inputbox" name="country" id="country" placeholder="Country..." value="<?php echo $row['country'] ?>" required>
          </div>

          <div class="expcvv">

            <p class="expcvv_text2">Total price(RM)</p>
            <input type="text" class="inputbox" id="totalPrice" value="<?= $productPrice ?>" disabled>
            <input type="hidden" class="inputbox" name="totalPrice" id="totalPrice" value="<?= $productPrice ?>">
          </div>
          <p></p>
          <input type="submit" class="button" name="checkout" value="CheckOut">
        </form>
      </div>
    </div>
  </div>

  <script src="Js/orderForm.js"></script>


  <?php

} 

?>