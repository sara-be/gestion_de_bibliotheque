<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="/css/login.css">
    <style>
    .home {
        background: url('<?php echo base_url('img/stand2.jpeg'); ?>') no-repeat;
        background-size: cover;
        background-position: center;
    }
    .home .row{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 1.5rem;

}
</style>

 
</head>
<body>
    <!-- header section starts -->

    <header class="header">
        <div class="header-1">
            <a href="#" class="logo"><i class="fas fa-book"></i>bookly</a>
           
            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
              
                <div id="login-btn" class="fas fa-user"></div>
            </div>
        </div>



        <div class="header-2">
            <nav class="navbar">
                <a href="#home"></a>
                <a href="#featured"></a>
                <a href="#arrivals"></a>
                <a href="#reviews"></a>
                <a href="#blogs"></a>
                <a href="../logout"></a>
            </nav>
        </div>
    </header>
     <!-- header section ends -->

     <!--bottom navbar-->
   
     <nav class="bottom-navbar">
        <a href="#home" class="fas fa-home"></a>
        <a href="#featured"  class="fas fa-list"></a>
        <a href="#arrivals"  class="fas fa-tags"></a>
        <a href="#reviews"  class="fas fa-comments"></a>
        <a href="#blogs"  class="fas fa-blogs"></a>
    </nav>

    <!--login form-->
    <div class="form-container">

<!-- Formulaire de connexion -->
<div class="login-form-container active" id="login-form">
    <div id="close-login-btn" class="fas fa-times"></div>
    <form action="#" method="post">

        <h3>sign in</h3>
        <span>username</span>
        <!-- Ajout de name="email" -->
        <input type="email" name="email" class="box" placeholder="enter your email" id="floatingEmailInput" inputmode="email" autocomplete="email" required>
       

        <span>password</span>
        <input type="password" class="box" id="floatingPasswordInput" name="password" inputmode="text" placeholder="enter your password" required>
      


        <button type="submit" class="btn"><?= lang('Auth.login') ?></button>

        <p>forgot password? <a href="#">click here</a></p>
        <p>don't have an account? <a href="#" id="show-register">create one</a></p>
    </form>
</div>

<!-- Formulaire d'inscription -->
<div class="register-form-container" id="register-form">
    <div id="close-register-btn" class="fas fa-times"></div>
    <form action="#" method="post">
        <h3>sign up</h3>

        <span>email</span>
        <input type="email" class="box" placeholder="enter your email" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" required>
       
        <span>username</span>
        <input type="text" class="box" placeholder="enter your username" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" required>
     
        <span>password</span>
        <input type="password" class="box" placeholder="enter your password" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="new-password" required>
       

        <span>confirm password</span>
        <input type="password" class="box" placeholder="confirm password" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" required>
       

        <input type="submit" value="sign up" class="btn">
        <p>already have an account? <a href="#" id="show-login">sign in</a></p>
    </form>
</div>

</div>


 

























    <!--home section starts-->

<section class="home" id="home">
<div class="row">
   <div class="content">
    <h3>A book can change your life</h3>
    <p>A book has the power to change your life, 
        gently opening your mind to new ideas and guiding 
        you toward fresh perspectives..</p>
          <a href="#" class="btn">borrow now</a>
   </div>
   
   <div class="swiper books-slider">
    <div class="swiper-wrapper">

        <a href="#" class="swiper-slide"><img src="<?php echo base_url('img/img7.jpeg'); ?>" alt=""></a>
        <a href="#" class="swiper-slide"><img src="<?php echo base_url('img/img2.jpeg'); ?>" alt=""></a>
        <a href="#" class="swiper-slide"><img src="<?php echo base_url('img/img8.jpeg'); ?>" alt=""></a>
        <a href="#" class="swiper-slide"><img src="<?php echo base_url('img/img4.jpeg'); ?>" alt=""></a>
        <a href="#" class="swiper-slide"><img src="<?php echo base_url('img/img5.jpeg'); ?>" alt=""></a>
        <a href="#" class="swiper-slide"><img src="<?php echo base_url('img/img6.jpeg'); ?>" alt=""></a>

    </div>
  <img src=""  class="stand" alt="">

   </div>
</div>
</section>
 <!--home section ends-->

<!--icons section starts-->
<section class="icons-container">
    <div class="icons">
        <i class="fas fa-plane"></i>
        <div class="content">
            <h3>Fast Borrowing</h3>
            <p>Borrow books in under 10 minutes!</p>
        </div>
    </div>

        <div class="icons">
            <i class="fas fa-lock"></i>
            <div class="content">
                <h3>Free for Members</h3>
                <p>Borrow over $100 worth of books for free!</p>
            </div>
        </div>


        <div class="icons">
            <i class="fas fa-redo-alt"></i>
            <div class="content">
                <h3>secure returns</h3>
                <p>Return your books within 10 days, no questions asked.</p>
            </div>
        </div>


        <div class="icons">
            <i class="fas fa-headset"></i>
            <div class="content">
                <h3>24/7 support</h3>
                <p>Call us anytime for assistance with your borrowings!</p>
            </div>
        </div>
       
    </div>
</section>
<!--icons section ends-->




<!--footer section starts-->
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>pur location</h3>
            <a href=""><i class="fas fa-map-marker-alt"></i>india</a>
            <a href=""><i class="fas fa-map-marker-alt"></i>usa</a>
            <a href=""><i class="fas fa-map-marker-alt"></i>russia</a>
            <a href=""><i class="fas fa-map-marker-alt"></i>morocco</a>
            <a href=""><i class="fas fa-map-marker-alt"></i>africa</a>
        </div>


        <div class="box">
            <h3>extra links</h3>
            <a href=""><i class="fas fa-arrow-right"></i>acount info</a>
            <a href=""><i class="fas fa-arrow-right"></i>ofred itesm</a>
            <a href=""><i class="fas fa-arrow-right"></i>privacy policy</a>
            <a href=""><i class="fas fa-arrow-right"></i>payement</a>
            <a href=""><i class="fas fa-arrow-right"></i>services</a>
        </div>



        <div class="box">
            <h3>quick links</h3>
            <a href=""><i class="fas fa-arrow-right"></i>home</a>
            <a href=""><i class="fas fa-arrow-right"></i>featured</a>
            <a href=""><i class="fas fa-arrow-right"></i>arrivals</a>
            <a href=""><i class="fas fa-arrow-right"></i>reviews</a>
            <a href=""><i class="fas fa-arrow-right"></i>blog</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href=""><i class="fas fa-phone"></i>+123-456-7890</a>
            <a href=""><i class="fas fa-phone"></i>+123-456-7890</a>
            <a href=""><i class="fas fa-envelope"></i>shaik@gmail.com</a>
            <img src="" class="map" alt="">
        </div>
    </div>
    <div class="share">
        <a href="" class="fab fa-facebook-f"></a>
        <a href="" class="fab fa-twitter"></a>
        <a href="" class="fab fa-instagram"></a>
        <a href="" class="fab fa-linkedin"></a>
        <a href="" class="fab fa-pinterest"></a>
    </div>
    <div class="credit">created by <span>mr . web designer</span>| all right reserved!</div>
</section>
<!--footer section ends-->




 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 <script src="/js/welcome_message.js"></script>

</body>
</html>