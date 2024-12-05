<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/Utilisateur/acceuil.css">

    <title>Accueil</title>

</head>

<body>

    <header class="header">
        <div class="header-1">
            <a href="/utilisateur/acceuil" class="logo"><i class="fas fa-book"></i>bookly</a>
            <div class="search-bar-container">
                <input id="search-bar" type="text" class="form-control" placeholder="Rechercher un livre..."
                    aria-label="Search" />
            </div>

            <div class="icons">
                <a href="/utilisateur/acceuil" id="home-btn" class="fas fa-home" title="Accueil"></a>
                <a href="/utilisateur/livresEmpruntes" class="fas fa-book" title="Livres empruntés"
                    style="text-decoration: none;"></a>
                <a href="/utilisateur/livresEnAttente" class="fas fa-hourglass-half"
                    title="Livres en cours d'acceptation"></a>
                <a href="/utilisateur/profile" id="login-btn" class="fas fa-user"></a>
            </div>
        </div>

        <div class="header-2">

            <h1 class="text-center mb-4 p-3"
                style="color: white; font-family: 'Poppins', sans-serif; font-size: 2.5rem;">
                Acceuil
            </h1>

            </nav>
        </div>
    </header>

    <h1 class="text-center mb-4 p-3 text-success "
        style="color: black; font-family: 'Poppins', sans-serif; font-size: 2.5rem;">
        Livres Disponibles
    </h1>
    <div class="container mt-4">
        <?php if (!empty($livresDisponibles)): ?>
            <div class="row">
                <?php foreach ($livresDisponibles as $livre): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <?php if (!empty($livre['photo'])): ?>
                                <img src="<?= esc($livre['photo']) ?>" class="card-img-top" alt="<?= esc($livre['title']) ?>"
                                    style="width: 50%; height: auto; object-fit: contain;display: block; margin: 0 auto; margin: top 10px;">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/300x200?text=Pas+de+photo" class="card-img-top"
                                    alt="Pas de photo">
                            <?php endif; ?>

                            <div class="card-body">
                                <h5 class="card-title" style="display: block; margin: 0 auto;"><?= esc($livre['title']) ?></h5>
                                <p class="card-text">
                                    <strong style="display: inline;">Auteur : </strong><?= esc($livre['author']) ?><br>
                                    <strong style="display: inline;">Année :</strong> <?= esc($livre['year']) ?><br>
                                    <strong style="display: inline;">Catégorie :</strong> <?= esc($livre['categorie_id']) ?><br>
                                    <strong style="display: inline;">Description :</strong>
                                    <?= esc(substr($livre['description'], 0, 100)) . '...' ?>
                                </p>
                                <p class="text-muted"><strong>Copies restantes :</strong> <?= esc($livre['remaining_copies']) ?>
                                </p>
                                <form action="/utilisateur/emprunter" method="post" style="display:inline;">
                                    <input type="hidden" name="livre_id" value="<?= esc($livre['id']) ?>">
                                    <button type="submit" class="btn btn-success btn-emprunter">Emprunter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center">
                Aucun livre disponible pour le moment.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>