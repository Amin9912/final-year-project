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

      $sqlSelect = "SELECT * FROM `order_item` ORDER BY `order_item`.`orderDateCreate` DESC";
      $res = mysqli_query($conn, $sqlSelect);
      $count = mysqli_num_rows($res);
      $showDataArray = array();

      while ($row = mysqli_fetch_assoc($res)) {
        $showDataArray[] = $row["orderID"];
      }

      // Output the showDataArray as a JavaScript variable
      echo "<script>var showDataArray = " . json_encode($showDataArray) . ";</script>";


      ?>

      <div class="container" style="overflow-x: auto; white-space: nowrap; color: black;">
        <div class="table-wrapper" style="display: inline-block; height: fit-content; width: 100%;">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                <h2>Manage <b>Order</b></h2>
              </div>
              <div class="col-sm-6">
                <a href="#" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
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
                <th>OID</th>
                <th>CID</th>
                <th>PID</th>
                <th>SID</th>
                <th>Delivery Type</th>
                <th>Quantity</th>
                <th>PayMethod</th>
                <th>TotPrice</th>
                <th style="width: 600px;">Address</th>
                <th>File</th>
                <th>Date</th>
                <th>Status</th>
                <th>Bill ID</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="listOrder">

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
      <script src="Js/CRUDtblMO(paging).js"></script>

      <!-- Edit Modal HTML -->
      <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">                      
              <h4 class="modal-title">Update Order</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">                    
              <div class="form-group">
                <label>OID</label>
                <input type="text" class="form-control" value="" name="OID" id="OID" readonly>
              </div>
              <div class="form-group">
                <label>CID</label>
                <input type="text" class="form-control" value="" name="CID" id="CID" readonly>
              </div>
              <div class="form-group">
                <label>Shipping ID</label>
                <input type="number" class="form-control" value="" name="shippingID" id="shippingID">
              </div>
              <div class="form-group">
                <label>Status Order</label>
                <select class="form-control" name="orderStatus" id="orderStatus">
                  <option value="UNPAID">UNPAID</option>
                  <option value="IN PROCESS">IN PROCESS</option>
                  <option value="TO SHIP">TO SHIP</option>
                  <option value="DELIVERED">DELIVERED</option>
                </select>
              </div>                 
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <button class="btn btn-info" name="updateBtn" id="updateBtn">Save</button>
            </div>

          </div>
        </div>
      </div>

      <!--Update order-->
      <script src="Js/CRUDtblMO(update).js"></script>


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

          $orderDel = $_POST['prodID'];

          $sqlDel = "DELETE FROM `order_item` WHERE `orderID` = '$orderDel'";
          $resDel = mysqli_query($conn, $sqlDel);

          if($resDel){
            ?>
            <script>
              Swal.fire({
                icon: 'success',
                title: 'Successfully Deleted!',
                text: 'Order ID: <?php echo $orderDel ?> has been deleted.',
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
                text: 'Order ID: <?php echo $orderDel ?> could not be deleted.',
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