<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site</title>
    
    <!-- Ajout du CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Ajouter Font Awesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Ajouter Ionicons pour les icônes -->
    <link href="https://cdn.jsdelivr.net/npm/ionicons@5.0.0/dist/ionicons/ionicons.css" rel="stylesheet">

    <!-- Inclure les fichiers CSS personnalisés -->
    <link rel="stylesheet" href="/css/bookNavigation.css">
    <style>
      
.custom-btn-mauve {
    background-color: #9b59b6; /* Couleur mauve */
    color: white; /* Texte blanc */
    border: none; /* Retirer la bordure */
    padding: 8px 10px; /* Ajuster le padding */
    border-radius: 4px; /* Coins arrondis */
    transition: background-color 0.3s ease; /* Transition lors du survol */
    max-width: 150px; /* Limiter la largeur */
    display: inline-block; /* Empêcher l'élargissement sur toute la largeur */
    text-align: center; /* Centrer le texte */
}

.custom-btn-mauve:hover {
    background-color: #8e44ad; /* Teinte plus foncée au survol */
    color: white; /* Garde le texte blanc au survol */
} .badge-outline {
      display: inline-block;
      padding: 5px 10px;
      border: 1px solid #ADD8E6; /* Bleu clair */
      border-radius: 12px;
      color: #ADD8E6; /* Bleu clair pour le texte */
      font-size: 14px;
      text-align: center;
    }

    /* Icon Button */
    .icon-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: none;
      border: none;
      color: #ADD8E6; /* Bleu clair */
      font-size: 20px;
      cursor: pointer;
    }

    .icon-btn:hover {
      color: #007BFF; /* Bleu plus foncé au survol */
    }



    </style>

</head>
<body>
    <!-- Navigation -->
    <?= view('layouts/navigation'); ?>

    <!-- Contenu Principal -->
    <div class="main">
        <div class="content">
            <!-- C'est ici que le contenu dynamique de chaque page sera affiché -->
            <?= $this->renderSection('content'); ?>
        </div>
    </div>

    <?php if (session()->getFlashdata('success') || session()->getFlashdata('error')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Initialisation de tous les toasts
            var toastElements = [].slice.call(document.querySelectorAll('.toast'));
            var toastList = toastElements.map(function (toastEl) {
                return new bootstrap.Toast(toastEl, {
                    animation: true,
                    delay: 5000 // Toast disparait après 5 secondes
                });
            });
            toastList.forEach(function (toast) {
                toast.show(); // Affiche chaque toast
            });
        });
    </script>
    <?php endif; ?>

    <!-- Chargement de jQuery avant Bootstrap JS pour la compatibilité -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Ajouter les fichiers JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Charger SweetAlert2 pour les alertes -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Charger ton script JavaScript personnalisé -->
    <script src="/js/navigation.js"></script>
</body>
</html>
