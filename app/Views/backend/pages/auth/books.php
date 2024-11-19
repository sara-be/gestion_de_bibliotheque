<?= $this->extend('layouts/bookMain'); ?>

<?= $this->section('content'); ?>

<!-- Contenu spécifique à la page Books -->
<h1>Liste des Livres</h1>

<!-- Card contenant le formulaire -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <!-- Barre de recherche avec icône -->
                            <div class="search-container d-flex align-items-center ml-3">
                                <input type="text" class="form-control" id="searchInput" placeholder="Rechercher...">
                            </div>
                            <!-- Boutons -->
                            <div class="button-group">
                                <a href="<?= route_to('books.create') ?>" class="home__button" role="button" aria-pressed="true">Ajouter un livre</a>
                                <a href="<?= route_to('categories.create') ?>" class="home__button" role="button" aria-pressed="true">Ajouter catégorie</a>
                            </div>
                        </div>

                        <div class="product_wrap">
                            <?php foreach ($books as $book): ?>
                                <div class="product_item" data-title="<?= esc($book['title']); ?>">
                                    <div class="product_one">
                                        <img src="<?= base_url('uploads/' . $book['photo']); ?>" alt="Image du livre">
                                    </div>
                                    <div class="product_two">
                                        <h3><?= esc($book['title']); ?></h3>
                                        <p>Auteur : <?= esc($book['author']); ?></p>

                                        <!-- Badge affichant le nombre d'exemplaires -->
                                        <p>Nombre d'exemplaires : 
                                            <span class="badge-outline"><?= esc($book['nombre_livre']); ?></span>
                                        </p>

                                        <div class="d-flex justify-content-end mt-2">
                                            <!-- Bouton de voir les détails -->
                                            <a href="<?= route_to('books.show', $book['id']); ?>" 
                                               class="icon-btndetail" 
                                               title="Voir les détails">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <!-- Bouton de modification -->
                                            <a href="<?= route_to('books.edit', $book['id']); ?>" 
                                               class="icon-btnmodify" 
                                               title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- Bouton de suppression -->
                                            <a href="<?= route_to('books.delete', $book['id']); ?>" 
                                               class="icon-btndanger deleteBtn" 
                                               title="Supprimer" 
                                               data-book-id="<?= $book['id']; ?>" 
                                               data-url="<?= route_to('books.delete', $book['id']); ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Pagination -->
                        <div class="pagination_wrap">
                            <?= $pager->links() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert pour les messages de succès ou d'erreur -->
<?php if (session()->getFlashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Succès!',
            text: '<?= session()->getFlashdata('success'); ?>',
            showConfirmButton: false,
            timer: 3000 // Ferme l'alerte après 3 secondes
        });
    </script>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erreur!',
            text: '<?= session()->getFlashdata('error'); ?>',
            showConfirmButton: true
        });
    </script>
<?php endif; ?>

<!-- Styles personnalisés -->
<style>
    /* Badge outline */
    .badge-outline {
        display: inline-block;
        padding: 2px 10px;
        border: 1px solid #11aadd; /* Bleu clair */
        border-radius: 12px;
        color: #11aadd; /* Texte bleu clair */
        font-size: 14px;
    }
    .icon-btndanger{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: none;
        border: none;
        color:#d13743; /* Bleu clair */
        font-size: 20px;
        cursor: pointer;
        margin-left: 8px;
    }
    .icon-btnmodify{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: none;
        border: none;
        color:#f8ac49; /* Bleu clair */
        font-size: 20px;
        cursor: pointer;
        margin-left: 8px;
    }
    /* Bouton d'icône */
    .icon-btndetail {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: none;
        border: none;
        color:#683585; /* Bleu clair */
        font-size: 20px;
        cursor: pointer;
        margin-left: 8px;
       
    }

    .icon-btn:hover {
        color: #007BFF; /* Bleu plus foncé au survol */
    }
</style>





<?= $this->endSection(); ?>
