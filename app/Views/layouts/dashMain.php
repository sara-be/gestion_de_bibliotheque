<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site</title>
    
    <!-- Ajout du CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.0/dist/sweetalert2.min.css">
    <!-- Ajouter Font Awesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Ajouter Ionicons pour les icônes -->
    <link href="https://cdn.jsdelivr.net/npm/ionicons@5.0.0/dist/ionicons/ionicons.css" rel="stylesheet">

    <!-- Inclure les fichiers CSS personnalisés -->
    <link rel="stylesheet" href="/css/dashNavigation.css">
   
</head>
<body>
    <!-- Navigation -->
    <?= view('layouts/dashHeader'); ?>
    <?= view('layouts/dashNavigation'); ?>

    <!-- Contenu Principal -->
    <div class="main">
        <div class="content">
            <!-- C'est ici que le contenu dynamique de chaque page sera affiché -->
            <?= $this->renderSection('content'); ?>
        </div>
    </div>

   

    <!-- Chargement de jQuery avant Bootstrap JS pour la compatibilité -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Ajouter les fichiers JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Charger SweetAlert2 pour les alertes -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <!-- Charger ton script JavaScript personnalisé -->
    <script src="/js/dashNavigation.js"></script>
    <?php if (session()->getFlashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Succès',
            text: 'Livre mis à jour avec succès!',
            confirmButtonText: 'OK'
        });
    </script>
<?php elseif (session()->getFlashdata('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erreur',
            text: 'Une erreur s\'est produite. Veuillez réessayer.',
            confirmButtonText: 'OK'
        });
    </script>
<?php endif; ?>



<script>
    $(document).ready(function() {
        // Vérifier s'il y a un message de succès
        <?php if (session()->getFlashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '<?= session()->getFlashdata('success'); ?>',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>

        // Vérifier s'il y a un message d'erreur
        <?php if (session()->getFlashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: '<?= session()->getFlashdata('error'); ?>',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>
    });
</script>

<script>
    // Affichage de SweetAlert2 en cas de succès ou d'erreur
    $(document).ready(function() {
        // Vérifier si un message de succès existe dans la session
        <?php if (session()->getFlashdata('success')): ?>
            Swal.fire({
                title: 'Succès!',
                text: '<?= session()->getFlashdata('success'); ?>',
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        <?php endif; ?>

        // Vérifier si un message d'erreur existe dans la session
        <?php if (session()->getFlashdata('error')): ?>
            Swal.fire({
                title: 'Erreur!',
                text: '<?= session()->getFlashdata('error'); ?>',
                icon: 'error',
                confirmButtonText: 'Ok'
            });
        <?php endif; ?>
    });
</script>
</body>
</html>
