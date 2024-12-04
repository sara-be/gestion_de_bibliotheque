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
    <title>Livres empruntés</title>
    <style>
        .card-img-top {
            width: 100%;
            height: auto;
            object-fit: contain; /* Affiche toute l'image sans la couper */
            max-height: 300px; /* Limite la hauteur si nécessaire */
        }

        .card {
            height: 100%; /* Assure que la carte s'étend selon le contenu */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Organise le contenu verticalement */
        }

        .card-body {
            flex-grow: 1; /* Permet au contenu textuel de s'adapter */
        }
    </style>
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
                Livres empruntés
            </h1>
        </div>
    </header>

    <div class="container mt-5">

        <?php if ($utilisateur && $livre): ?>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <?php if (!empty($livre['photo'])): ?>
                            <img src="http://localhost:8080/uploads/<?= esc($livre['photo']) ?>" class="card-img-top" alt="<?= esc($livre['title']) ?>">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/300x200?text=Pas+de+photo" class="card-img-top" alt="Pas de photo">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">Détails du livre :</h5>
                            <p><strong>Titre :</strong> <?= esc($livre['title']) ?></p>
                            <p><strong>Auteur :</strong> <?= esc($livre['author']) ?></p>
                            <p><strong>Catégorie :</strong> <?= esc($livre['categorie_id']) ?></p>
                            <p><strong>Date d'emprunt :</strong> <?= esc($utilisateur['debut_emprunt']) ?></p>
                            <p><strong>Date de retour prévue :</strong> <?= esc($utilisateur['fin_emprunt']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-info text-center">
                Aucun livre emprunté pour cet utilisateur.
            </div>
        <?php endif; ?>
    </div>

    <!-- Lien vers le JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
