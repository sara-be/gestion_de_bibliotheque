<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/Utilisateur/acceuil.css">
    <title>Livres en attente</title>
</head>
<body>
    
<header class="header">
        <div class="header-1">
            <a href="#" class="logo"><i class="fas fa-book"></i>bookly</a>

            <div class="search-bar-container">
                <input id="search-bar" type="text" class="form-control" placeholder="Rechercher un livre..."
                    aria-label="Search" />
            </div>

            <div class="icons">
                <div id="home-btn" class="fas fa-home" title="Accueil"></div>
                <a href="/utilisateur/livresEmpruntes" class="fas fa-book" title="Livres empruntés" style="text-decoration: none;"></a>
                <div id="pending-books-btn" class="fas fa-hourglass-half" title="Livres en cours d'acceptation"></div>
                <div id="search-btn" class="fas fa-search"></div>
                <div id="login-btn" class="fas fa-user"></div>
            </div>
        </div>

        <div class="header-2">

            <h1 class="text-center mb-4 p-3"
                style="color: white; font-family: 'Poppins', sans-serif; font-size: 2.5rem;">
                Livres en cours d'acceptation
            </h1>

            </nav>
        </div>
    </header>
    <div class="container mt-5">
        

        <?php if (!empty($livresEnAttente)): ?>
            <ul class="list-group">
                <?php foreach ($livresEnAttente as $livreId): ?>
                    <li class="list-group-item">Livre ID : <?= esc($livreId) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-center text-muted">Aucun livre en attente.</p>
        <?php endif; ?>
    </div>
</body>
</html>