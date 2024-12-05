<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/details.css">
    <style>
       table {
    width: 100%;
    border-collapse: collapse;
    font-size: 16px;  /* Augmente la taille de la police du tableau */
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 15px;  /* Augmente l'espace autour du texte */
    text-align: left;
}

th {
    background-color: #f4f4f4;
}

.book-photo {
    width: 70px;  /* Augmente la taille des images */
    height: 90px; /* Augmente la taille des images */
    object-fit: cover;
}

.badge {
    display: inline-block;
    padding: 6px 12px; /* Augmente l'espace du badge */
    background-color: #aaa;
    color: white;
    font-size: 16px;  /* Augmente la taille du texte du badge */
    border-radius: 12px;
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
            <a href="<?= site_url('dashboard') ?>" id="home-btn" class="fas fa-home" title="Accueil"></a>
                <div id="search-btn" class="fas fa-search"></div>
                <a href="<?= site_url('accepter') ?>" class="fas fa-book-open"></a>
                <a href="<?= site_url('user/en_attente') ?>" class="fas fa-hourglass-half"></a>
        
                <form action="<?= site_url('logout') ?>" method="post" style="margin: 0;">
                    <button type="submit" class="fas fa-sign-out-alt" style="background: none; color: inherit; font-size: 24px; cursor: pointer; border: none; padding: 0; margin-left: 10px;"></button>
                </form>
            </div>
        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="#">Livres en attentes</a>
            </nav>
        </div>
    </header>

    <?php if (!empty($borrowedBooks)): ?>
        <div class="book-table">
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($borrowedBooks as $emprunt): ?>
                        <tr>
                            <td>
                                <!-- Vérifiez si 'photo' existe avant d'essayer de l'afficher -->
                                <?php if (!empty($emprunt['photo'])): ?>
                                    <img src="/uploads/<?= esc($emprunt['photo']) ?>" alt="<?= esc($emprunt['title']) ?>" class="book-photo">
                                <?php else: ?>
                                    <img src="/uploads/default.jpg" alt="<?= esc($emprunt['title']) ?>" class="book-photo">
                                <?php endif; ?>
                            </td>
                            <td><?= esc($emprunt['title']) ?></td>
                            <td><?= esc($emprunt['author']) ?></td>
                            <td><span class="badge">En attente</span></td> <!-- Badge gris -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p>Aucun livre en attente.</p>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/js/details.js"></script>
</body>
</html>
