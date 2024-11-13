<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site</title>
    <!-- Ajout du CSS de Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Ajout de jQuery et Bootstrap JS (nécessaire pour l'alerte dynamique) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Inclure les fichiers CSS -->
    <link rel="stylesheet" href="/css/bookNavigation.css">
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
    <script src="/js/navigation.js"></script>
</body>
</html>
