<?php 

include "mohazDatabase.php";
include "navigation.php"; 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="Css/login.css">
    <title>signin-signup</title>
</head>
<body>
    <div class="container">
        <div class="signin-signup">
            <form action="loginAuthentication.php" method="POST" class="sign-in-form">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="userID" placeholder="Username" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="userPassword" placeholder="Password" required>
                </div>
                <input type="submit" value="Login" class="btn">
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
            </form>
            <form action="" method="POST" class="sign-up-form">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="userName" placeholder="Username" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="userEmail" placeholder="Email" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-mobile"></i>
                    <input type="tel" name="userPhoneNum" placeholder="Phone number" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="userPassword" placeholder="Password" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="userConfirmPassword" placeholder="Confirm Password" required>
                </div>
                <input type="submit" name="register" value="Sign up" class="btn">
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Register today!</h3>
                    <p>Discover professional printing solutions - Sign up now and bring your ideas to life!</p>
                    <button class="btn" id="sign-in-btn">Sign in</button>
                </div>
                <img src="signin.svg" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Welcome to Mohaz Marketing</h3>
                    <p>Print with Confidence - Trust in Our Professional Printing Services!</p>
                    <button class="btn" id="sign-up-btn">Sign up</button>
                </div>
                <img src="signup.svg" alt="" class="image">
            </div>
        </div>
    </div>
    <script src="Js/loginResponsiveForm.js"></script>
</body>
</html>

<?php 

if (isset($_POST['register'])) {
    if (isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userPassword']) && isset($_POST['userConfirmPassword']) && isset($_POST['userPhoneNum'])) {

        $cust_Name = $_POST['userName'];
        $custEmail = $_POST['userEmail'];
        $custPassword = $_POST['userPassword'];
        $custConfirmPassword = $_POST['userConfirmPassword'];
        $custPhoneNum = $_POST['userPhoneNum'];

        $sqlCheckEmail = "SELECT `custEmail` FROM `customer` WHERE `custEmail` = '$custEmail'";

        $resEmail = mysqli_query($conn, $sqlCheckEmail);
        $count = mysqli_num_rows($resEmail);

        if ($count < 1) {

            $sqlAddAccount = "INSERT INTO `customer`(`custName`, `custEmail`, `custPassword`, `custPhoneNum`) VALUES ('$cust_Name','$custEmail','$custPassword','$custPhoneNum')";

            if($custPassword === $custConfirmPassword){

                $res = mysqli_query($conn, $sqlAddAccount);

                if ($res) {
                    ?>

                    <script type="text/javascript">form</script>

                    <script type="text/javascript">

                        Swal.fire({
                            icon: 'success',
                            title: 'Register success!',
                            text: 'You can now login with your account.',
                            showConfirmButton: true,
                        }).then(function() {
                             // Redirect to the desired page
                            location.href = "login.php";
                        });
                    </script>
                    <?php

                }else{

                    ?>

                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Register failed!',
                            showConfirmButton: true,
                        })
                    </script>

                    <?php
                }

            }else{

                ?>

                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Your Password and Confirm Password does not match!',
                        showConfirmButton: true,
                    })
                </script>

                <?php

            }
        }else{

            ?>

            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'This email already been registered!',
                    showConfirmButton: true,
                })
            </script>

            <?php

        }
        mysqli_close($conn);
    }
}

?>