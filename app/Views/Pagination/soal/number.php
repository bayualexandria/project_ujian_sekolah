<?php $pager->setSurroundCount(100) ?>

<?php foreach ($pager->links() as $link) : ?>
    <a href="<?= $link['uri'] ?>" class="btn btn-inverse-success text-white btn-xs <?= $link['active'] ? 'bg-success' : '' ?>">
        <?= $link['title'] ?>
    </a>
<?php endforeach ?>