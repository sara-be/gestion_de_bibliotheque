<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>

<h1>Ajouter un livre</h1>
<br>
<!-- Card contenant le formulaire -->
<!-- Vérifier s'il y a un message de succès -->

<div class="row justify-content-center">
    <div class="col-md-9 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <form action="<?= route_to('books.store'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="title">Titre du livre</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="author">Auteur</label>
                                        <input type="text" class="form-control" id="author" name="author" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="year">Année de publication</label>
                                        <input type="number" class="form-control" id="year" name="year" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="categorie">Catégorie</label>
                                        <select class="form-control" id="categorie" name="categorie" required>
                                            <option value="">Sélectionnez une catégorie</option>
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?= $category['id']; ?>"><?= $category['category_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre_livre">Nombre d'exemplaires</label>
                                        <input type="number" class="form-control" id="nombre_livre" name="nombre_livre" required min="1" value="1">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="photo">Photo de couverture</label>
                                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                                </div>

                                <div class="text-right"> <!-- Aligner le bouton à droite -->
                                    <button type="submit" class="home__button">Ajouter le livre</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Vérifier s'il y a un message de succès
        <?php if (session()->getFlashdata('success')): ?>
            toastr.success('<?= session()->getFlashdata('success'); ?>', 'Succès', {
                "positionClass": "toast-top-right", // Positionner en haut à droite
                "timeOut": "3000", // Disparaît après 3 secondes
                "progressBar": true, // Barre de progression
                "closeButton": true, // Bouton de fermeture
                "toastClass": "toast-purple" // Classe personnalisée pour la couleur
            });
        <?php endif; ?>

        // Vérifier s'il y a un message d'erreur
        <?php if (session()->getFlashdata('error')): ?>
            toastr.error('<?= session()->getFlashdata('error'); ?>', 'Erreur', {
                "positionClass": "toast-top-right",
                "timeOut": "3000",
                "progressBar": true,
                "closeButton": true
            });
        <?php endif; ?>
    });
</script>

<?= $this->endSection(); ?>
