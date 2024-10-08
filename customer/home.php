<?php 
include "mohazDatabase.php";
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


  <!--Home content Css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <!--<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <script src="Js/slider.js" defer></script>
  <script src="Js/slider2.js"></script>

  <!--Navigation and Footer Css-->
  <link rel="stylesheet" type="text/css" href="Css/navigationCSS.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="Css/styles.css">

</head>

<body>
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v17.0" nonce="jkmQVgsE"></script>

  <?php navigation(); ?>
  <main>
    <section id="promotion">
      <div class="container">
        <h3 class="animated" style="color: #fff;">Special Promotion</h3>
        <div class="promotion-slider">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="promotion-item">
                <img src="../mohaz image/Promotion/tepungPelita.jpg" alt="Promotion Image">
                <div class="promotion-caption">
                  <h4>Tepung Pelita</h4>
                  <p>Reservations open anytime to serve at your event, contact us for get it!</p>
                  <a href="https://wa.me/0193888063" target="_blank" rel="noopener noreferrer" class="promotion-btn">Contact us</a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="promotion-item">
                <img src="https://source.unsplash.com/random/400x300" alt="Promotion Image">
                <div class="promotion-caption">
                  <h4>Get your design</h4>
                  <p>Enjoy a complimentary design service when you place your printing order with us!</p>
                  <a href="products" class="promotion-btn">Get now</a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="promotion-item">
                <img src="https://source.unsplash.com/random/400x300" alt="Promotion Image">
                <div class="promotion-caption">
                  <h4>Limited Edition</h4>
                  <p>Discover our exclusive collection of limited edition products.</p>
                  <a href="products" class="promotion-btn">Get now</a>
                </div>
              </div>
            </div>
            <a class="prev" onclick="plusSlides(-1)" style="">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
          </div>
        </div>
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
      </div>
    </section>

    <section class="about-section">
        <div class="container">
          <div class="about-content">
            <div class="title-and-text">
              <h2>Welcome to Our Company</h2>
              <div class="about-text">
                <p>Welcome to Kerja Printing, your one-stop printing solution. We offer a variety of high-quality printing services, including banners, buntings, name cards, wedding invitations, PVC counters, flyers, and brochures. Our team is committed to delivering personalized and creative prints to meet your needs. Experience excellence in print with Kerja Printing.</p>
              </div>
            </div>
            <div class="about-image">
              <img src="../mohaz image/logo_1.jpg" alt="Company Image">
            </div>
          </div>
        </div>
      </section>

    <!-- <section id="multimedia">
      <div class="container">
        <h3 class="animated">Multimedia Marketing</h3>
        <p class="animated">Experience the power of multimedia to enhance your marketing efforts.</p>
        <div class="multimedia-grid">
          <div class="multimedia-card animated">
            <div class="multimedia-row">
              <div class="multimedia-description">
                <h4>Video Marketing</h4>
                <p>Create engaging video content to attract and captivate your audience.</p>
              </div>
              <div class="multimedia-thumbnail">
                <img src="https://source.unsplash.com/random/400x225" alt="Video Thumbnail">
                <button class="play-btn"></button>
              </div>
            </div>
          </div>
          <div class="multimedia-card animated">
            <div class="multimedia-row">
              <div class="multimedia-description">
                <h4>Podcasts</h4>
                <p>Reach your target audience through informative and entertaining podcasts.</p>
              </div>
              <div class="multimedia-thumbnail">
                <img src="https://source.unsplash.com/random/400x225" alt="Audio Thumbnail">
                <button class="play-btn"></button>
              </div>
            </div>
          </div>
          <div class="multimedia-card animated">
            <div class="multimedia-row">
              <div class="multimedia-description">
                <h4>Visual Content</h4>
                <p>Utilize compelling images and graphics to communicate your message effectively.</p>
              </div>
              <div class="multimedia-thumbnail">
                <img src="https://source.unsplash.com/random/400x225" alt="Image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <section id="services">
      <div class="container">
        <h3 class="animated">Our Services</h3>
        <div class="services-container">
          <div class="service-card animated">
            <img src="../mohaz image/our service/soundwave.jpg" alt="Service 1">
            <h4>Public Address System (PA system)</h4>
            <p>Elevate your events in the Klang Valley area with our top-notch PA system services, perfect for parties and a wide range of occasions.</p>
          </div>
          <div class="service-card animated">
            <img src="../mohaz image/our service/photographer.png" alt="Service 2">
            <h4>Photographer</h4>
            <p>Capture the moments that matter with our exceptional photography service, preserving memories that will last a lifetime.</p>
          </div>
          <div class="service-card animated">
            <img src="../mohaz image/our service/printing.jpg" alt="Service 3">
            <h4>Printing Services</h4>
            <p>Transform your marketing materials with our comprehensive range of services, including free design for banners, buntings, PVC counters, name cards, flyers, and even custom wedding invitations.</p>
          </div>
          <div class="service-card animated">
            <img src="../mohaz image/our service/pvc.jpg" alt="Service 3">
            <h4>PVC Counter</h4>
            <p>Introducing our stylish PVC Counters – perfect for your business needs! Enhance your brand's visibility with these sleek and modern counters. Ideal for trade shows, exhibitions, and retail spaces. Durable and customizable to fit your requirements. Elevate your business presence with our stunning PVC Counters today!</p>
          </div>
        </div>
      </div>
    </section>

    <!-- <section id="pricing">
      <div class="container">
        <h3 class="animated">Pricing</h3>
        <div class="pricing-container">
          <div class="price-card animated">
            <h4>Standard Package</h4>
            <p>Starting at $19.99</p>
            <ul>
              <li>100 business cards</li>
              <li>Full-color printing</li>
              <li>High-quality cardstock</li>
              <li>Free shipping</li>
            </ul>
            <a href="#contact" class="btn">Order Now</a>
          </div>
          <div class="price-card animated highlight">
            <h4>Premium Package</h4>
            <p>Starting at $49.99</p>
            <ul>
              <li>500 flyers</li>
              <li>Double-sided printing</li>
              <li>Custom design</li>
              <li>Fast delivery</li>
            </ul>
            <a href="#contact" class="btn">Order Now</a>
          </div>
        </div>
      </div>
    </section> -->

    <section id="testimonials">
      <div class="container">
        <h3 class="section-title">Testimonials</h3>
        <div class="wrapper">
          <i id="left" class="fa-solid fa-angle-left"></i>
          <ul class="carousel">
            <li class="card">
              <div class="img"><img src="../mohaz image/Testimony/makcik_01.jpg" alt="testimonial-image" draggable="false"></div>
              <h2>Cik Kiah</h2>
              <span>Customer</span>
              <p>They have enough patience to re-edit our designs and deliver it as per customer's request. Good Job!</p>
            </li>
            <li class="card">
              <div class="img"><img src="../mohaz image/Testimony/makcik_02.jpg" alt="testimonial-image" draggable="false"></div>
              <h2>Kak Salmah</h2>
              <span>Customer</span>
              <p>Highly recommended. Always give their best shot in accommodating our needs.👍</p>
            </li>
            <li class="card">
              <div class="img"><img src="../mohaz image/Testimony/pakcik_01.jpg" alt="testimonial-image" draggable="false"></div>
              <h2>Pak Samad</h2>
              <span>Customer</span>
              <p>Very cheerful and high quality service...Thank You Vintech Fast Prints (^∆^)</p>
            </li>
            <li class="card">
              <div class="img"><img src="../mohaz image/Testimony/pakcik_02.jpg" alt="testimonial-image" draggable="false"></div>
              <h2>Badrul Ahmad</h2>
              <span>Customer</span>
              <p>For a better deal, please be free to discuss with them, plenty of ideas are there to be given to us. Always my first choice ❤️</p>
            </li>
          </ul>
          <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
      </div>
    </section>

    <section class="facebook-section">
      <div class="container">
        <div class="facebook-content">
          <h2>Latest Updates from Our Facebook Page</h2>
        </div>
        <div class="facebook-plugin">
          <!-- Add the generated Facebook Page Plugin code here -->
          <!-- Replace the data-href attribute with the URL of your Facebook page -->
          <!-- Replace other attributes with the desired settings from the generator -->
          <!-- Example: -->
          <div class="fb-page" data-href="https://www.facebook.com/MohazMarketing" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/MohazMarketing" class="fb-xfbml-parse-ignore">
              <a href="https://www.facebook.com/MohazMarketing">Facebook</a>
            </blockquote>
          </div>
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <h3 class="animated">Contact Us</h3>
        <p class="animated">Ready to place an order or have any questions? Get in touch with us.</p>
        <form action="send_email.php" method="post">
          <input type="text" name="name" placeholder="Your Name" required class="animated">
          <input type="email" name="email" placeholder="Your Email" required class="animated">
          <textarea name="message" placeholder="Your Message" required class="animated"></textarea>
          <button type="submit" class="btn animated">Submit</button>
        </form>
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