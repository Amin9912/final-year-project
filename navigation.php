<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!--Message box website css:https://sweetalert2.github.io/#examples-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../mohaz image/logo_1.jpg">

</head>
<body>

    <?php
function navigation(){
        ?>

        <header class="header">
        <a href="#" class="logo">Mohaz</a>
 
        <i class='bx bx-menu' id="menu-icon" style="cursor: pointer;"></i>
 
        <nav class="navbar">
            <a class="custom-link" href="home">Home</a>
            <a class="custom-link" href="products">Products</a>
            <a class="custom-link" href="about">About</a>
            <a class="custom-link" href="manageProduct">Manage Product</a>
            <a class="custom-link" href="manageOrder">Manage Order</a>
            <a class="custom-link" href="myOrder">My Order</a>
            <a class="custom-link" href="profile">Profile</a>
            <a class="custom-link" href="" id="logout-link"><i class='fa fa-power-off'></i></a>
        </nav>
    </header>
    <div class="nav-bg"></div>
 
 
    <script src="Js/navigation.js"></script>
    <script src="Js/logout.js"></script>


        <?php
    }

    function footer()
    {
        ?>
        <footer>
          <div class="container">
            <div class="social-icons">
              <a href="https://www.facebook.com/MohazMarketing" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook"></i></a>
              <a href="mailto:mohazmarketing@gmail.com"><i class="fas fa-envelope"></i></a>
              <a href="https://wa.me/0193888063" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp"></i></a>
              <a href="https://www.instagram.com/mohazmarketing" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
              <a href="https://www.tiktok.com/@ayiemohaz" target="_blank" rel="noopener noreferrer" class="tiktok"><i class="fab fa-tiktok"></i></a>
            </div>
            <p>&copy; 2023 MohazMarketing. All rights reserved.</p>
          </div>
        </footer>
        <?php
    }

    function insertImageProfile($imageFile, $dir, $dtbTable, $colName){

        include "mohazDatabase.php";
        
            $img_name = $_FILES['$imageFile']['name'];
            $img_size = $_FILES['$imageFile']['size'];
            $tmp_name = $_FILES['$imageFile']['tmp_name'];
            $error = $_FILES['$imageFile']['error'];

            if ($error === 0) {
                if ($img_size > 125000) {
                    echo "Sorry, your file is too large.";
                }else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg", "jpeg", "png", "pdf", "psb"); 

                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = '$dir/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                        $sql = "INSERT INTO $dtbTable ($colName) VALUES('$new_img_name')";
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

    ?>

</body>
</html>