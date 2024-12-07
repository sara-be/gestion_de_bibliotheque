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
    <form action="<?= site_url('authenticate') ?>" method="post">

        <h3>Connexion</h3>
        <span>Email</span>
        <!-- Ajout de name="email" -->
        <input type="email" name="email" class="box" placeholder="entrer votre email" id="floatingEmailInput" inputmode="email" autocomplete="email" required>
       

        <span>Mot de passe</span>
        <input type="password" class="box" id="floatingPasswordInput" name="password" inputmode="text" placeholder="entrer votre mot de passe" required>
      


        <button type="submit" class="btn">S'authentifier</button>

   
        <p>Vous avez déja un compte? <a href="#" id="show-register">crée un compte</a></p>
    </form>
</div>

<!-- Formulaire d'inscription -->
<div class="register-form-container" id="register-form">
    <div id="close-register-btn" class="fas fa-times"></div>
    <form action="<?= site_url('register') ?>" method="post">
        <h3>S'inscrire</h3>

        <span>Nom</span>
        <input type="text" class="box" placeholder="entrer votre nom" id="floatingNameInput" name="nname" inputmode="text" autocomplete="nname" required>
     
        <span>Prénom</span>
        <input type="text" class="box" placeholder="entrer votre prénom" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" required>
     
        <span>email</span>
        <input type="email" class="box" placeholder="entrer votre email" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" required>
       
       
        <span>password</span>
        <input type="password" class="box" placeholder="entrer votre mot de passe" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="new-password" required>
       

        <span>confirmer password</span>
        <input type="password" class="box" placeholder="confirmer votre mot de passe" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" required>
       

        <input type="submit" value="sign up" class="btn">
        <p>Vous avez déja un compte? <a href="#" id="show-login">se connecter</a></p>
    </form>
</div>

</div>


 

























    <!--home section starts-->

<section class="home" id="home">
<div class="row">
   <div class="content">
    <h3>Un livre peut changer votre vie</h3>
   <p>Un livre a le pouvoir de transformer votre vie en ouvrant doucement votre esprit à de nouvelles idées et perspectives.</p>
          <a href="#" class="btn">Emprunter maintanant</a>
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
            <h3>Emprunt rapide</h3>
            <p>Empruntez des livres en moins de 10 minutes!</p>
        </div>
    </div>

        <div class="icons">
            <i class="fas fa-lock"></i>
            <div class="content">
                <h3>Gratuit pour les membres</h3>
                <p>Empruntez plus de 100 $ de livres gratuitement!</p>
            </div>
        </div>


        <div class="icons">
            <i class="fas fa-redo-alt"></i>
            <div class="content">
                <h3>Retours sécurisés</h3>
                <p>Retournez vos livres dans les 10 jours sans questions.</p>
            </div>
        </div>


        <div class="icons">
            <i class="fas fa-headset"></i>
            <div class="content">
                <h3>Assistance 24/7</h3>
                <p>Appelez-nous à tout moment pour obtenir de l'aide</p>
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