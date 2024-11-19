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
                <form action="<?= route_to('books.update', $book['id']); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="title">Titre du livre</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= esc($book['title']); ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="author">Auteur</label>
                            <input type="text" class="form-control" id="author" name="author" value="<?= esc($book['author']); ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="year">Année de publication</label>
                            <input type="number" class="form-control" id="year" name="year" value="<?= esc($book['year']); ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="categorie">Catégorie</label>
                            <select class="form-control" id="categorie" name="categorie" required>
                                <option value="">Sélectionnez une catégorie</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['id']; ?>" <?= $category['id'] == $book['categorie_id'] ? 'selected' : ''; ?>>
                                        <?= esc($category['category_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre_livre">Nombre d'exemplaires</label>
                            <input type="number" class="form-control" id="nombre_livre" name="nombre_livre" value="<?= esc($book['nombre_livre']); ?>" required min="1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="2"><?= esc($book['description']); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="photo">Photo de couverture</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                        <small>Actuellement: <?= esc($book['photo']); ?></small>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="home__button">Mettre à jour le livre</button>
                    </div>
                </form>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Succès!',
            text: '<?= session()->getFlashdata('success'); ?>',
            showConfirmButton: false,
            timer: 3000 // L'alerte disparaît après 3 secondes
        }).then(() => {
            // Redirige vers la liste des livres après la fermeture de l'alerte
            window.location.href = "<?= base_url('books.index'); ?>";
        });
    </script>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erreur!',
            text: '<?= session()->getFlashdata('error'); ?>',
            showConfirmButton: true // L'utilisateur doit confirmer pour fermer
        });
    </script>
<?php endif; ?>

<?= $this->endSection(); ?>
