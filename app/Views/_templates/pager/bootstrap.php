<ul class="pagination">
    <?php if ($pager->hasPreviousPage()): ?>
        <li class="page-item"><a class="page-link" href="<?= $pager->getPreviousPage() ?>">&laquo; Précédent</a></li>
    <?php endif; ?>

    <?php foreach ($pager->getLinks() as $link): ?>
        <li class="page-item<?= $link['active'] ? ' active' : '' ?>">
            <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
        </li>
    <?php endforeach; ?>

    <?php if ($pager->hasNextPage()): ?>
        <li class="page-item"><a class="page-link" href="<?= $pager->getNextPage() ?>">Suivant &raquo;</a></li>
    <?php endif; ?>
</ul>
