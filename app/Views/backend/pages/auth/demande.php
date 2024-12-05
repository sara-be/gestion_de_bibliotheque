<?= $this->extend('layouts/dashMain'); ?>

<?= $this->section('content'); ?>

<h1>La liste des demandes</h1>

<?php if (session()->getFlashdata('success') || session()->getFlashdata('error')): ?>
    <div class="alert <?= session()->getFlashdata('success') ? 'alert-success' : 'alert-danger' ?>">
        <?= session()->getFlashdata('success') ?: session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>



<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre du Livre</th>
                                        <th>Photo</th>
                                        <th>Nom de l'Utilisateur</th>
                                        <th>Email de l'Utilisateur</th>
                                        <th>Date d'Emprunt</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($emprunts)): ?>
                                        <?php foreach ($emprunts as $emprunt): ?>
                                            <tr>
                                                <td><?= esc($emprunt['id']) ?></td>
                                                <td><?= esc($emprunt['book_title']) ?></td>
                                                <td>
                                                    <img src="/uploads/<?= esc($emprunt['book_photo']) ?>" alt="<?= esc($emprunt['book_title']) ?>" width="80">
                                                </td>
                                                <td><?= esc($emprunt['user_name']) ?></td>
                                                <td><?= esc($emprunt['user_email']) ?></td>
                                                <td><?= esc($emprunt['borrow_date']) ?></td>
                                                <td>
                                                <form method="post" action="<?= base_url('demandes/accepter/' . $emprunt['id']) ?>" style="display:inline-block;">
                                                    <button type="submit" class="btn btn-success">Accepter</button>
                                                </form>

                                                <form method="post" action="<?= site_url('demandes/refuser/' . $emprunt['id']) ?>" style="display:inline-block;">
                                                      <button type="submit" class="btn btn-danger">Refuser</button>
                                                </form>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Aucune demande en attente.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
