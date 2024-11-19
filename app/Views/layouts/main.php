<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site</title>

    <!-- Ajout du CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Ajouter Font Awesome pour les icônes (si tu utilises des icônes FontAwesome en plus de Ionicons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Ajouter Ionicons pour les icônes (utilisé pour ion-icon) -->
    <link href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.min.css" rel="stylesheet">

    <!-- Inclure ton CSS personnalisé -->
    <link rel="stylesheet" href="/css/navigation.css">
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

    <!-- Ajout de jQuery (version complète pour éviter les conflits) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Ajouter les fichiers JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Charger SweetAlert2 pour les alertes -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script personnalisé pour ta navigation -->
    <script src="/js/navigation.js"></script>
</body>
</html>
