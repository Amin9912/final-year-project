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

  <!--manage product content Css including CRUD table-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="Css/manageProduct.css">

  <!--Navigation and Footer Css-->
  <link rel="stylesheet" type="text/css" href="Css/navigationCSS.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

  <?php navigation(); ?>
  <main>
    <section>

      <?php

        $sqlSelect = "SELECT * FROM `product_details`";
        $res = mysqli_query($conn, $sqlSelect);
        $count = mysqli_num_rows($res);
        $showDataArray = array();

        while ($row = mysqli_fetch_assoc($res)) {
          $showDataArray[] = $row["productID"];
        }

    // Output the showDataArray as a JavaScript variable
        echo "<script>var showDataArray = " . json_encode($showDataArray) . ";</script>";


        ?>

        <div class="container" style="overflow-x: auto; white-space: nowrap; color: black;">
          <div class="table-wrapper" style="display: inline-block; height: fit-content;">
            <div class="table-title">
              <div class="row">
                <div class="col-sm-6">
                  <h2>Manage <b>Product</b></h2>
                </div>
                <div class="col-sm-6">
                  <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
                  <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>            
                </div>
              </div>
            </div>
            <table class="table table-striped table-hover" >
              <thead>
                <tr>
                  <th>
                    <span class="custom-checkbox">
                      <input type="checkbox" id="selectAll">
                      <label for="selectAll"></label>
                    </span>
                  </th>
                  <th>PID</th>
                  <th>Name</th>
                  <th>Size</th>
                  <th>Unit Size</th>
                  <th>Price</th>
                  <th style="width: 600px;">Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody id="listproduct">

                <!--List Product-->

              </tbody>
            </table>
            <div class="clearfix">
              <div class="hint-text">Showing <b><label id="numDataShow">0</label></b> out of <b><label id="totData"><?php echo $count; ?></label></b> entries</div>
              <ul class="pagination" id="pagination">
                <li><button class="prev" disabled>Previous</button></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li><button class="next">Next</button></li>
              </ul>
            </div>
          </div>
        </div>

        <!--JS for paging and output-->
        <script src="Js/CRUDtblMP(paging).js"></script>


        <!-- Edit Modal HTML (ADD PRODUCT) -->
        <div id="addEmployeeModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="POST" action="" enctype="multipart/form-data">
                <div class="modal-header">            
                  <h4 class="modal-title">Add Product</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">          
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="productName" id="productName" placeholder="Product name..." required>
                  </div>
                  <div class="form-group">
                    <label>Product Price(RM)</label>
                    <input type="number" class="form-control" name="productPrice" id="productPrice" min="0.00" step="any" placeholder="Product price(RM)..." required>
                  </div>
                  <div class="form-group">
                    <label>Product Size</label>
                    <input type="number" class="form-control" name="productSize" id="productSize" placeholder="Product size..." required>

                    <br>
                    <label>Unit: </label>

                    <select class="form-control" name="unitSize" id="unitSize" required>
                      <option value="unit">unit</option>
                      <option value="mm">mm</option>
                      <option value="cm">cm</option>
                      <option value="inches">inches</option>
                      <option value="feet">feet</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Product Description</label>
                    <textarea class="form-control" id="productDescription" name="productDescription" rows="4" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Product Picture</label>
                    <input class="form-control" type="file" name="productImg" id="productImg" required>
                  </div>            
                </div>
                <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">

                  <input type="submit" class="btn btn-success" name="productSubmit" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div>

        <?php 

        if (isset($_POST['productSubmit'])) {

          if (isset($_POST['productName']) && isset($_POST['productPrice']) && isset($_POST['productSize']) && isset($_POST['unitSize']) && isset($_POST['productDescription']) && isset($_FILES['productImg'])) {

            $productName = $_POST['productName'];
            $productPrice = $_POST['productPrice'];
            $productSize = $_POST['productSize'];
            $unitSize = $_POST['unitSize'];
            $productDescription = $_POST['productDescription'];

            $img_name = $_FILES['productImg']['name'];
            $img_size = $_FILES['productImg']['size'];
            $tmp_name = $_FILES['productImg']['tmp_name'];
            $error = $_FILES['productImg']['error'];

            if ($error === 0) {

              //50MB size
              if ($img_size > 52428800) {
                echo "Sorry, your file is too large.";
              }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png"); 

                if (in_array($img_ex_lc, $allowed_exs)) {
                  $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                  $img_upload_path = 'product image/'.$new_img_name;
                  move_uploaded_file($tmp_name, $img_upload_path);

          // Escape the values to prevent SQL injection
                  $productName = mysqli_real_escape_string($conn, $productName);
                  $productPrice = mysqli_real_escape_string($conn, $productPrice);
                  $productSize = mysqli_real_escape_string($conn, $productSize);
                  $unitSize = mysqli_real_escape_string($conn, $unitSize);
                  $productDescription = mysqli_real_escape_string($conn, $productDescription);
                  $new_img_name = mysqli_real_escape_string($conn, $new_img_name);

        // Insert into Database
                  $sql = "INSERT INTO `product_details`(`productName`, `productSize`, `unitSize`, `productDescription`, `productPrice`,`productPic`) VALUES('$productName','$productSize','$unitSize', '$productDescription', '$productPrice','$new_img_name')";
                  mysqli_query($conn, $sql);
                  ?>
                  <script>
                    Swal.fire({
                      icon: 'success',
                      title: 'Successfully uploaded!',
                      showConfirmButton: false,
                      timer: 1500
                    })
                  </script>
                  <?php
                }else {
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
            }else {

              ?>
              <script>
                Swal.fire({
                  icon: 'error',
                  title: 'Unknown error!',
                  showConfirmButton: false,
                  timer: 1500
                })
              </script>
              <?php
            }
          }
        }

        ?>

        <!-- Edit Modal HTML -->
        <div id="editEmployeeModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">            
                <h4 class="modal-title">Edit Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">          
                <div class="form-group">
                  <label>PID</label>
                  <input type="text" class="form-control" value="" name="editPID" id="editPID" disabled>
                </div>
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" value="" name="editName" id="editName" required>
                </div>
                <div class="form-group">
                  <label>Size</label>
                  <input type="number" class="form-control" value="" name="editSize" id="editSize" required>
                </div>
                <div class="form-group">
                  <label>Unit Size</label>
                  <select class="form-control" name="editUnitSize" id="editUnitSize" required>
                    <option value="mm">mm</option>
                    <option value="cm">cm</option>
                    <option value="inches">inches</option>
                    <option value="feet">feet</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Price</label>
                  <input type="number" class="form-control" value="" name="editPrice" id="editPrice" required>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="editProductDescription" id="editProductDescription" rows="4" required></textarea>
                </div>          
              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <button class="btn btn-info" name="updateBtn" id="updateBtn">Save</button>
              </div>

            </div>
          </div>
        </div>

        <!--Edit product script-->
        <script src="Js/CRUDtblMP(edit).js"></script>

        <!-- Delete Modal HTML -->
        <div id="deleteEmployeeModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="POST">
                <div class="modal-header">            
                  <h4 class="modal-title">Delete Employee</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">          
                  <p>Are you sure you want to delete these Records?</p>
                  <p class="text-warning"><small>This action cannot be undone.</small></p>
                  <input type="hidden" name="prodID" value="">
                </div>
                <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                  <input type="submit" class="btn btn-danger" value="Delete" name="deleteCurrentProduct" id="deleteCurrentProduct">
                </div>
              </form>
            </div>
          </div>
        </div>

        <?php
        if(isset($_POST['deleteCurrentProduct'])) {

          if (isset($_POST['prodID'])) {

            $productDel = $_POST['prodID'];

            $sqlDel = "DELETE FROM `product_details` WHERE `productID` = '$productDel'";
            $resDel = mysqli_query($conn, $sqlDel);

            if($resDel){
              ?>
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Successfully Deleted!',
                  text: 'Product ID: <?php echo $productDel ?> has been deleted.',
                  showConfirmButton: true,
                })
              </script>
              <?php
            }else{
              ?>
              <script>
                Swal.fire({
                  icon: 'error',
                  title: 'Delete failed!',
                  text: 'Product ID: <?php echo $productDel ?> could not be deleted.',
                  showConfirmButton: true,
                })
              </script>
              <?php
            }
          }
        }
        ?>
      
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