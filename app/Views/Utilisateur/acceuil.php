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
    <title>Acceuil</title>
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
                <a href="/utilisateur/livresEmpruntes" class="fas fa-book" title="Livres empruntés"
                    style="text-decoration: none;"></a>
                <div id="pending-books-btn" class="fas fa-hourglass-half" title="Livres en cours d'acceptation"></div>
                <div id="search-btn" class="fas fa-search"></div>
                <div id="login-btn" class="fas fa-user"></div>
            </div>
        </div>

        <div class="header-2">

            <h1 class="text-center mb-4 p-3"
                style="color: white; font-family: 'Poppins', sans-serif; font-size: 2.5rem;">
                Livres Disponibles
            </h1>

            </nav>
        </div>
    </header>
    <?php if (!empty($livresDisponibles)): ?>
        <div class="row">
            <?php foreach ($livresDisponibles as $livre): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">

                        <?php if (!empty($livre['photo'])): ?>
                            <img src="<?= esc($livre['photo']) ?>" class="card-img-top" alt="<?= esc($livre['title']) ?>"
                                style="height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/300x200?text=Pas+de+photo" class="card-img-top"
                                alt="Pas de photo">
                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title"><?= esc($livre['title']) ?></h5>
                            <p class="card-text">
                                <strong>Auteur :</strong> <?= esc($livre['author']) ?><br>
                                <strong>Année :</strong> <?= esc($livre['year']) ?><br>
                                <strong>Catégorie :</strong> <?= esc($livre['categorie_id']) ?><br>
                                <strong>Description :</strong> <?= esc($livre['description']) ?>
                            </p>
                            <p class="text-muted"><strong>Copies restantes :</strong> <?= esc($livre['remaining_copies']) ?></p>
                            <button class="btn btn-success btn-emprunter" data-livre-id="<?= esc($livre['id']) ?>">
                                Emprunter
                            </button>
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

    <!-- Lien vers le JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.btn-emprunter');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const livreId = button.getAttribute('data-livre-id');

                fetch(`/utilisateur/emprunterLivre/${livreId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        button.textContent = 'En attente';
                        button.classList.remove('btn-success');
                        button.classList.add('btn-secondary');
                        button.disabled = true;
                    } else {
                        alert(data.message || 'Erreur lors de l\'emprunt.');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                });
            });
        });
    });

    </script>

</body>

</html>