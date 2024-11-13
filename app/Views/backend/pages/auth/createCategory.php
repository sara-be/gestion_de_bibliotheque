<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>



<h1>Ajouter une catégorie</h1>
<br>
<!-- Card contenant le formulaire -->



<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                           
                            <form action="<?= route_to('categories.store') ?>" method="POST" class="category-form">
                                <div class="form-group">
                               <br>  <br>  <br>
                                    <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Entrez le nom de la catégorie" required>
                                </div>
                                <button type="submit" class="btn-submit">Créer la catégorie</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>
