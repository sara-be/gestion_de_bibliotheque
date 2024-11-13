<?= $this->extend('layouts/bookMain'); ?>

<?= $this->section('content'); ?>

<!-- Contenu spécifique à la page Books -->
<h1>Liste des Livres</h1>
<!-- Toast notifications (Bootstrap 5) -->
<div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?= session()->getFlashdata('success'); ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?= session()->getFlashdata('error'); ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>
</div>


<!-- Card contenant le formulaire -->
<div class="row">
            <div class="col-md-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="col-xl-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <a href="<?= route_to('categories.create') ?>" class="home__button" role="button"
                                       aria-pressed="true">Ajouter category</a>

                                       <a href="<?= route_to('books.create') ?>" class="home__button" role="button" aria-pressed="true">Ajouter un livre</a><br><br>

                                  
                                </div>
                                <div class="table-responsive">
                                    
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









<?= $this->endSection(); ?>

