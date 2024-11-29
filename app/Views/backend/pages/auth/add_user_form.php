<?= $this->extend('layouts/bookMain'); ?>

<?= $this->section('content'); ?>

<h1>Ajouter un utilisateur</h1>

<div class="row justify-content-center">
    <div class="col-md-9 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                        <form action="<?= route_to('books.addUser') ?>" method="POST">
    <?= csrf_field() ?> <!-- Protection CSRF -->
    
    <!-- Champ pour l'ID du livre (caché) -->
    <input type="hidden" name="book_id" value="<?= $bookId ?>">

    <!-- Nom -->
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Entrez le nom" required>
    </div>

    <!-- Nom d'utilisateur -->
    <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Entrez le nom d'utilisateur" required>
    </div>

    <!-- Email -->
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Entrez l'email" required>
    </div>

    <!-- Mot de passe -->
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Entrez le mot de passe" required>
    </div>

    <button type="submit" class="home__button">Ajouter l'utilisateur</button>
</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
