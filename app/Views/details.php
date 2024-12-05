
<?php
use App\Models\EmpruntEnCoursModel;

// Vérifier si l'utilisateur a déjà emprunté ce livre
$session = session();
$userId = $session->get('user_id');
$empruntEnCoursModel = new EmpruntEnCoursModel();
$existingBorrow = $empruntEnCoursModel->where('user_id', $userId)
                                      ->where('book_id', esc($book['id']))
                                      ->where('status', 'pending')
                                      ->first();
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
                <a href="#">Details</a>
            </nav>
        </div>
    </header>
    <!-- header section ends -->
    <div class="book-details">
        <img src="/uploads/<?= esc($book['photo']) ?>" alt="<?= esc($book['title']) ?>" class="book-photo">
    
        <div class="book-info">
            <h1><?= esc($book['title']) ?></h1>
            <p><strong>Auteur :</strong> <?= esc($book['author']) ?></p>
            <p><strong>Description :</strong> <?= esc($book['description']) ?></p>
            <p><strong>Année :</strong> <?= esc($book['year']) ?></p>
         
            <!-- Bouton pour emprunter -->
            <?php if ($existingBorrow): ?>
                <a href="#" class="btn" style="background-color: gray; pointer-events: none;">En cours</a>
            <?php else: ?>
                <a href="<?= site_url('book/borrow/' . esc($book['id'])) ?>" class="btn">Emprunter</a>
            <?php endif; ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const borrowBtn = document.querySelector('.btn');
    if (borrowBtn) {
        borrowBtn.addEventListener('click', function(event) {
            event.preventDefault();  // Empêcher la redirection par défaut du lien
            
            const bookId = <?= esc($book['id']) ?>;
            const url = "<?= site_url('book/borrow/') ?>" + bookId;  // URL du contrôleur
            
            // Effectuer la requête AJAX
            fetch(url, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Si la demande est envoyée avec succès, mettre à jour l'interface
                    borrowBtn.style.backgroundColor = 'gray';
                    borrowBtn.textContent = 'En cours';
                    borrowBtn.style.pointerEvents = 'none';  // Désactiver le bouton
                } else if (data.error) {
                    alert(data.error);  // Afficher l'erreur
                }
            })
            .catch(error => {
                console.error('Erreur AJAX:', error);
            });
        });
    }
});
</script>

    <script src="/js/details.js"></script>
</body>
</html>
