<?= $this->extend('layouts/dashMain'); ?>

<?= $this->section('content'); ?>

<h1>Les emprunteurs qu'ont dépassé les dates d'empruntes</h1>

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <!-- Contenu spécifique à la page Books -->

                            <?php if (!empty($lateUsers)): ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nom d'utilisateur</th>
                                            <th>Email</th>
                                            <th>Nom du livre</th>
                                            <th>Date de début</th>
                                            <th>Date de fin</th>
                                            <th>Jours de retard</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($lateUsers as $user): ?>
                                            <tr>
                                                <td><?= esc($user['username']); ?></td>
                                                <td><?= esc($user['email']); ?></td>
                                                <td><?= esc($user['book_title']); ?></td>
                                                <td><?= esc($user['debut_emprunt']); ?></td>
                                                <td><?= esc($user['fin_emprunt']); ?></td>
                                                <td>
                                                    <span class="text-danger"><?= esc($user['days_late']); ?> jour(s)</span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p>Aucun utilisateur en retard actuellement.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
