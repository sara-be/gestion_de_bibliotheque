<?php
use App\Models\EmpruntEnCoursModel;

// Vérifier si l'utilisateur a déjà emprunté ce livre
$session = session();
$userId = $session->get('user_id');
$empruntEnCoursModel = new EmpruntEnCoursModel();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/details.css">
</head>
<style>
    /* Style pour le tableau */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-family: 'Arial', sans-serif;
    background-color: #f9f9f9;
}

th, td {
    padding: 12px 15px;
    text-align: left;
    border: 1px solid #ddd;
    font-size: 16px;
}

th {
    background-color: #f4f4f4;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

h1 {
    text-align: center;
    margin-top: 40px;
    font-size: 2em;
    color: #333;
}

/* Message lorsqu'il n'y a aucun livre */
p {
    text-align: center;
    font-size: 1.2em;
    color: #666;
}

</style>
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
                <a href="#" class="fas fa-book-open"></a>
                <a href="<?= site_url('user/en_attente') ?>" class="fas fa-hourglass-half"></a>

                <form action="<?= site_url('logout') ?>" method="post" style="margin: 0;">
                    <button type="submit" class="fas fa-sign-out-alt" style="background: none; color: inherit; font-size: 24px; cursor: pointer; border: none; padding: 0; margin-left: 10px;"></button>
                </form>
            </div>
        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="#">Livres Empruntés</a>
            </nav>
        </div>
    </header>
    <!-- header section ends -->
    
  

<?php if (!empty($livres)): ?>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date d'emprunt</th>
                <th>Date de retour</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livres as $livre): ?>
                <tr>
                    <td><?= esc($livre['title']) ?></td>
                    <td><?= esc($livre['author']) ?></td>
                    <td><?= esc($livre['debut_emprunt']) ?></td>
                    <td><?= esc($livre['fin_emprunt']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun livre emprunté.</p>
<?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/js/details.js"></script>
</body>
</html>
