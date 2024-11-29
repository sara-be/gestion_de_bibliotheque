<?= $this->extend('layouts/dashMain'); ?>

<?= $this->section('content'); ?>

<!-- Contenu spécifique à la page Books -->
<h1>Dashboard</h1>
<div class="cardBox">
    <div class="card d-flex justify-content-center align-items-center">
        <div>
            <div class="numbers"><?= $userCount; ?></div>
            <div class="cardName">Utilisateurs</div>
        </div>
        <div class="iconBx">
            <ion-icon name="person-add-outline"></ion-icon>
        </div>
    </div>

    <div class="card d-flex justify-content-center align-items-center">
        <div>
        <div class="numbers"><?= $bookCount; ?></div>
            <div class="cardName">livres</div>
        </div>
        <div class="iconBx">
    <ion-icon name="book-outline"></ion-icon>
</div>

    </div>
</div>



<div class="chart-container" style="margin-top: 50px; margin-left: 10%; width: 80%; height: 400px;">
    <canvas id="userChart"></canvas>
</div>

<script>
    const labels = <?= json_encode($months); ?>;
    const data = <?= json_encode($userCounts); ?>;
</script>
<?= $this->endSection(); ?>


