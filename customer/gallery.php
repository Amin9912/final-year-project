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
    <link rel="stylesheet" type="text/css" href="Css/gallery.css">
    <link rel="stylesheet" type="text/css" href="Css/gallery design_01.css">

    <!--Navigation and Footer Css-->
    <link rel="stylesheet" type="text/css" href="Css/navigationCSS.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  </head>

  <body>

    <?php navigation(); ?>
    <main>

      <section class="gallery">
        <div class="container">
          <h2>Gallery</h2>
          <div class="grid">
            <div class="column-xs-12 column-md-4">
              <figure class="img-container">
                <img src="../mohaz image/shirt_01.jpg" />
                <figcaption class="img-content">
                  <h2 class="title">T-shirt</h2>
                  <h3 class="category">Showcase</h3>
                </figcaption>
                <span class="img-content-hover">
                  <h2 class="title">T-shirt</h2>
                  <h3 class="category">Showcase</h3>
                </span>
              </figure>
            </div>
            <div class="column-xs-12 column-md-4">
              <figure class="img-container">
                <img src="../mohaz image/shirt_06.jpg" />
                <figcaption class="img-content">
                  <h2 class="title">T-shirt</h2>
                  <h3 class="category">Showcase</h3>
                </figcaption>
                <span class="img-content-hover">
                  <h2 class="title">T-shirt</h2>
                  <h3 class="category">Showcase</h3>
                </span>
              </figure>
            </div>
            <div class="column-xs-12 column-md-4">
              <figure class="img-container">
                <img src="../mohaz image/shirt_07.jpg">
                <figcaption class="img-content">
                  <h2 class="title">T-shirt</h2>
                  <h3 class="category">Showcase</h3>
                </figcaption>
                <span class="img-content-hover">
                  <h2 class="title">T-shirt</h2>
                  <h3 class="category">Showcase</h3>
                </span>
              </figure>
            </div>

            <!-- Gambar lebar -->
            <div class="column-xs-12">
              <figure class="img-container">
                <img src="../mohaz image/board_01.jpg" />
                <figcaption class="img-content">
                  <h2 class="title">Board Printing</h2>
                  <h3 class="category">Showcase</h3>
                </figcaption>
                <span class="img-content-hover">
                  <h2 class="title">Board Printing</h2>
                  <h3 class="category">Showcase</h3>
                </span>
              </figure>
            </div>
            <div class="column-xs-12 column-md-6">
              <figure class="img-container">
                <img src="../mohaz image/banner_02.jpg" />
                <figcaption class="img-content">
                  <h2 class="title">Banner</h2>
                  <h3 class="category">Showcase</h3>
                </figcaption>
                <span class="img-content-hover">
                  <h2 class="title">Banner</h2>
                  <h3 class="category">Showcase</h3>
                </span>
              </figure>
            </div>
            <div class="column-xs-12 column-md-6">
              <figure class="img-container">
                <img src="../mohaz image/board_03.jpg" />
                <figcaption class="img-content">
                  <h2 class="title">Book design</h2>
                  <h3 class="category">Showcase</h3>
                </figcaption>
                <span class="img-content-hover">
                  <h2 class="title">Book design</h2>
                  <h3 class="category">Showcase</h3>
                </span>
              </figure>
            </div>
          </div>
        </div>

        <script type="text/javascript" src="Js/gallery design_01.js"></script>
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