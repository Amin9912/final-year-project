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

  <!--Profile form css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="Css/profile.css">

  <!--Navigation and Footer Css-->
  <link rel="stylesheet" type="text/css" href="Css/navigationCSS.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

  <?php navigation(); ?>
  <main>

    <?php

    $userID = $_SESSION['userID'];

    $sqlSelectCust = "SELECT * FROM `customer`WHERE `custID` = '$userID'";
    $res = mysqli_query($conn, $sqlSelectCust);
    $row = mysqli_fetch_assoc($res);

    ?>
    <section id="profile">
      <div class="profile-container">
        <div class="row gutters">
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
              <div class="card-body">
                <div class="account-settings">
                  <div class="user-profile">
                    <div class="user-avatar">
                      <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Maxwell Admin">
                    </div>
                    <h5 class="user-name"><?php echo $row["custName"]; ?></h5>
                    <h6 class="user-email"><?php echo $row["custEmail"]; ?></h6>
                  </div>
                  <div class="about">
                    <h5 class="mb-2 text-primary">About</h5>
                    <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
              <div class="card-body">

                <!--User information form update-->
                <div class="row gutters">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-3 text-primary">Personal Details</h6>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="custFullName">Full Name</label>
                      <input type="text" class="form-control" id="custFullName" placeholder="Enter full name" value="<?php echo $row["custFullName"]; ?>">
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="custEmail">Email</label>
                      <input type="email" class="form-control" id="custEmail" name="custEmail" placeholder="<?php echo $row["custEmail"]; ?>" disabled>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="custPhoneNum">Phone</label>
                      <input type="text" class="form-control" id="custPhoneNum" name="custPhoneNum" placeholder="Enter phone number" value="<?php echo $row["custPhoneNum"]; ?>">
                    </div>
                  </div>
                </div>

                <div class="row gutters">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h6 class="mb-3 text-primary">Address</h6>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="address_Line1">Address line 1</label>
                      <input type="text" class="form-control" id="address_Line1" name="address_Line1" placeholder="Enter Address line 1" value="<?php echo $row["address_Line1"]; ?>">
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="address_Line2">Address line 2</label>
                      <input type="name" class="form-control" id="address_Line2" name="address_Line2" placeholder="Enter Address line 2" value="<?php echo $row["address_Line2"]; ?>">
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="postcode">Postcode</label>
                      <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Enter Postcode" value="<?php echo $row["postcode"]; ?>">
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="city">City</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $row["city"]; ?>">
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="state">State</label>
                      <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" value="<?php echo $row["state"]; ?>">
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="country">Country</label>
                      <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" value="<?php echo $row["country"]; ?>">
                    </div>
                  </div>
                </div>
                <div class="row gutters">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="text-right">
                      <button class="btn btn-primary" id="update" name="update">Update</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script src="Js/profileUpdate.js"></script>
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