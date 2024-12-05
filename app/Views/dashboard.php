<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/dashboard.css">
    <style>
        /* dashboard.css */
        .book-card {
            width: 210px; /* Largeur des cartes */
            padding: 20px; /* Espacement interne pour éviter que le contenu touche les bords */
            background-color: #fff; /* Fond blanc pour chaque carte */
            border: 2px solid #ddd; /* Bordure fine pour entourer la carte */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère pour donner de la profondeur */
            text-align: center; /* Centrer le texte */
            margin: 15px; /* Espacement externe entre les cartes */
            transition: transform 0.3s, box-shadow 0.3s; /* Animation pour l'effet au survol */
        }

        /* Effet de survol : agrandissement et ombre */
        .book-card:hover {
            transform: translateY(-5px); /* Légère translation vers le haut */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Ombre plus marquée au survol */
        }

        /* Pour les images */
        .book-photo {
            width: 100%; /* L'image prend toute la largeur de la carte */
            height: auto; /* L'image garde ses proportions */
            object-fit: cover; /* L'image se découpe pour remplir la zone sans déformer */
            border-radius: 8px; /* Coins arrondis de l'image */
        }

        /* Ajustement de la taille des boutons */
        .book-card .btn {
            display: inline-block; /* Pour qu'il ne prenne que la place nécessaire */
            padding: 10px 20px; /* Ajuster les marges internes pour réduire la taille */
            font-size: 14px; /* Réduire la taille de la police */
            background-color: #4CAF50; /* Couleur du bouton */
            color: white; /* Texte blanc */
            text-decoration: none; /* Retirer la décoration de texte (souligné) */
            border-radius: 5px; /* Arrondir les coins du bouton */
            transition: background-color 0.3s; /* Effet au survol */
        }

        .book-card .btn:hover {
            background-color: #45a049; /* Couleur au survol */
        }

        /* Augmenter la taille de la police dans les cartes */
        .book-card h4, .book-card p {
            font-size: 16px; /* Taille de la police pour le titre et la description */
            margin-bottom: 10px; /* Ajouter un espace entre les éléments */
        }

        .book-card h4 {
            font-weight: bold; /* Mettre en gras le titre */
        }

        /* Ajuster la taille de la description */
        .book-card .book-description {
            font-size: 14px; /* Taille de la police de la description */
            color: #555; /* Couleur légèrement plus claire pour la description */
            line-height: 1.4; /* Espacement entre les lignes de la description */
        }
        h1 {
    font-size: 36px; /* Augmenter la taille de la police */
    font-weight: bold; /* Optionnel : rendre le texte en gras */
    color: #333; /* Couleur du texte */
    margin-bottom: 20px; /* Espacement sous le titre */
}

    </style>
</head>
<body>
    <!-- header section starts -->
    <header class="header">
        <div class="header-1">
            <a href="#" class="logo"><i class="fas fa-book"></i>bookly</a>
            <form action="" class="search-form">
                <input type="search" name="" placeholder="search here..." id="search-box">
                <label for="search-box" class="fas fa-search"></label>
            </form>
            <div class="icons" style="display: flex; align-items: center;">
                <div id="search-btn" class="fas fa-search"></div>

                <a href="<?= site_url('dashboard') ?>" id="home-btn" class="fas fa-home" title="Accueil"></a>
                <a href="<?= site_url('accepter') ?>" class="fas fa-book-open"></a>

                
               <a href="<?= site_url('user/en_attente') ?>" class="fas fa-hourglass-half"></a>
                <form action="<?= site_url('logout') ?>" method="post" style="margin: 0;">
                    <button type="submit" class="fas fa-sign-out-alt" style="background: none; color: inherit; font-size: 24px; cursor: pointer; border: none; padding: 0; margin-left: 10px;"></button>
                </form>
            </div>
        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="#">Bienvenue sur votre tableau de bord</a>
            </nav>
        </div>
    </header>
    <!-- header section ends -->

    <!-- home section starts -->
    <section class="dashboard">
        <!-- Section des livres -->
        <div class="books-section">
            <h1>Liste des livres</h1>
            <div class="book-container">
                <?php if (!empty($books)): ?>
                    <?php foreach ($books as $book): ?>
                        <div class="book-card">
                            <img src="/uploads/<?= esc($book['photo']) ?>" alt="<?= esc($book['title']) ?>" class="book-photo" width="200" height="auto">
                            <h4 class="book-title"><?= esc($book['title']) ?></h4>
                            <p class="book-author"><?= esc($book['author']) ?></p>
                            <a href="<?= site_url('book/details/' . $book['id']) ?>" class="btn">Voir les détails</a>

                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aucun livre disponible.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- home section ends -->

    <!-- footer section starts -->
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
                <a href=""><i class="fas fa-arrow-right"></i>account info</a>
                <a href=""><i class="fas fa-arrow-right"></i>offered items</a>
                <a href=""><i class="fas fa-arrow-right"></i>privacy policy</a>
                <a href=""><i class="fas fa-arrow-right"></i>payment</a>
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
            </div>
        </div>
        <div class="share">
            <a href="" class="fab fa-facebook-f"></a>
            <a href="" class="fab fa-twitter"></a>
            <a href="" class="fab fa-instagram"></a>
            <a href="" class="fab fa-linkedin"></a>
            <a href="" class="fab fa-pinterest"></a>
        </div>
        <div class="credit">created by <span>mr. web designer</span> | all rights reserved!</div>
    </section>
    <!-- footer section ends -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/js/dashboard.js"></script>
</body>
</html>
