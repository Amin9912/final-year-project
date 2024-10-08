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
  <link rel="stylesheet" type="text/css" href="Css/product.css">


  <!--Navigation and Footer Css-->
  <link rel="stylesheet" type="text/css" href="Css/navigationCSS.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

  <?php navigation(); ?>
  <main>

    <section id="product-list">
      <div class="container">
        <h3 class="product-list-heading">Product List</h3>
        <div class="product-container">

          <!-- List product -->
          <?php
          $sqlDisplayProduct = "SELECT * FROM `product_details`";
          $resDisplayProduct = mysqli_query($conn, $sqlDisplayProduct);
          $count = mysqli_num_rows($resDisplayProduct);

          if ($count > 0) {
            foreach ($resDisplayProduct as $row) {
              posting($row['productID'], $row['productName'], $row['productSize'], $row['unitSize'], $row['productDescription'], $row['productPrice'], $row['productPic']);
            }
          }else{
            echo "No Product Insert!";
          }

          ?>

        </div>
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

function posting($productID, $productName, $productSize, $unitSize, $productDescription, $productPrice, $productPic){

  ?>
  <div class="product">
    <img src="product image/<?php echo $productPic; ?>">
    <h4><?php echo $productName; ?></h4>
    <span class="productDetail">
      <details>
        <summary>Product description</summary><br>
        <p><?php echo$productDescription; ?></p>
      </details>
    </span>
    <p>Price: RM<?php echo $productPrice; ?> <?php echo "(".$productSize .$unitSize .")"; ?></p>
    <form method="post" action="orderNow.php">
      <input type="hidden" name="productID" value="<?php echo $productID; ?>">
      <input class="add-to-cart-btn" type="submit" name="submitOrder" value="Order Now">
    </form>
  </div>

  <?php
}
?>