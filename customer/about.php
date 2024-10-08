<?php 
include "navigation.php";
session_start();

// //Check session user ID
// if(isset($_SESSION['userID'])) {
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printify - Printing Services</title>

    <!--About content Css-->
    <link rel="stylesheet" type="text/css" href="Css/about.css">

    <!--Navigation and Footer Css-->
    <link rel="stylesheet" type="text/css" href="Css/navigationCSS.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  </head>

  <body>

    <?php navigation(); ?>
    <main><!--
      <section class="full-image-section">
        <div class="image-overlay">
          <h2>Welcome to Our Website</h2>
          <p>Discover our amazing services</p>
          <a href="#" class="btn">Learn More</a>
        </div>
      </section>-->

      <section class="about-section">
        <div class="container">
          <div class="about-content">
            <div class="title-and-text">
              <h2>About Our Company</h2>
              <br>
              <div class="about-text">
                <p>This thriving company, fully owned by Bumiputra, has flourished from humble beginnings, leveraging initial profits from small printing projects and steadily expanding since 2004, now standing as a testament to our remarkable growth and expertise.</p>
                <a href="#" class="btn">Learn More</a>
              </div>
            </div>
            <div class="about-image">
              <img src="../mohaz image/logo_1.jpg" alt="Company Image">
            </div>
          </div>
        </div>
      </section>

        <script type="text/javascript" src="Js/gallery.js"></script>
      </section>

      <section id="map-location">
        <div class="container">
          <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3984.29011455439!2d101.80151131475702!3d3.016499997803183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zM8KwMDAnNTkuNCJOIDEwMcKwNDgnMTMuMyJF!5e0!3m2!1sen!2smy!4v1689134423676!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="address-description">
            <h2>Location</h2>
            <p>165, Persiaran Tkp, Taman Kantan Permai, 43000 Kajang, Selangor</p>
          </div>
        </div>
      </section>

    </main>

    <?php footer(); ?>
  </body>

  </html>


  <?php 

// //Check session user ID
// }else{

//   //Later change the location header to the visitor page
//   header("Location: ../login.php");
// }

?>