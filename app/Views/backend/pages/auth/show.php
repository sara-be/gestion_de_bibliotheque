<?= $this->extend('layouts/bookMain'); ?>

<?= $this->section('content'); ?>

<!-- Détails du livre -->
<h1>Détails du livre</h1>
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-30">
                        <div class="d-flex align-items-start">
                            <!-- Affichage de l'image du livre à gauche -->
                            <div class="mr-4">
                                <img src="<?= base_url('uploads/' . $book['photo']); ?>" alt="Image du livre" class="img-fluid" style="max-width: 250px; height: auto;">
                            </div>

                            <!-- Affichage des informations du livre à droite -->
                            <div class="book-details">
                                <h3><?= esc($book['title']); ?></h3>
                                <p><strong>Auteur :</strong> <?= esc($book['author']); ?></p>
                                <p><strong>Année de publication :</strong> <?= esc($book['year']); ?></p>
                                <p><strong>Catégorie :</strong> <?= esc($category['category_name']); ?></p>
                                <p><strong>Description :</strong> <?= esc($book['description']); ?></p>
                                <p><strong>Nombre initiale d'exemplaires :</strong> <span class="badge custom-badge"><?= esc($book['nombre_livre']); ?></span></p>
                                <p><strong>Nombre restants d'exemplaires :</strong> <span class="badge custom-badge"><?= esc($book['remaining_copies']); ?></span></p>
                            </div>
                        </div>
                    </div>

                    <br><br><br><br>

                    <h1>Liste des emprunteurs</h1>
                    <br><br>
                    <!-- Recherche et bouton dans une nouvelle ligne -->
                    <div class="row mb-3">
                        <div class="col-md-8 d-flex">
                            <!-- Barre de recherche avec icône -->
                            <div class="search-container d-flex align-items-center ml-3">
                                <input type="text" class="form-control" id="searchUserInput" placeholder="Rechercher..." onkeyup="searchTable()">
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <!-- Bouton aligné à droite -->
                            <a href="<?= route_to('books.addUserForm', $book['id']); ?>" class="home__button">Ajouter un utilisateur</a>
                        </div>
                    </div>

                    <!-- Tableau des utilisateurs -->
                    <table class="table mt-3" id="usersTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Nom d'utilisateur</th>
                                <th>Email</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= esc($user['id']); ?></td>
                                        <td><?= esc($user['name']); ?></td>
                                        <td><?= esc($user['username']); ?></td>
                                        <td><?= esc($user['email']); ?></td>
                                        <td><?= esc($user['debut_emprunt']); ?></td>
                                        <td><?= esc($user['fin_emprunt']); ?></td>
                                        <td>
    <form id="deleteForm-<?= esc($user['id']); ?>" method="POST" action="<?= route_to('books.removeUser'); ?>" style="display: none;">
        <?= csrf_field(); ?>
        <input type="hidden" name="user_id" value="<?= esc($user['id']); ?>">
        <input type="hidden" name="book_id" value="<?= esc($book['id']); ?>">
    </form>
    <button type="button" class="btn btn-danger" title="Supprimer" onclick="confirmDelete('<?= esc($user['id']); ?>')">
        <i class="fas fa-trash-alt"></i>
    </button>
</td>



                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">Aucun utilisateur trouvé pour ce livre.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function searchTable() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById('searchUserInput');  // Mise à jour de l'ID
        filter = input.value.toUpperCase();
        table = document.getElementById('usersTable');
        tr = table.getElementsByTagName('tr');

        // Parcours de chaque ligne du tableau, en commençant par la ligne 1 (la première ligne est l'entête)
        for (i = 1; i < tr.length; i++) {
            tr[i].style.display = 'none'; // Cache la ligne par défaut
            td = tr[i].getElementsByTagName('td');
            
            // Recherche dans chaque colonne (tous les td) de la ligne
            for (j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = ''; // Affiche la ligne si la condition de recherche est remplie
                        break;
                    }
                }
            }
        }
    }
</script>

<?= $this->endSection(); ?>
