<?php $pager->setSurroundCount(2) ?>

<div class="template-demo">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <?php if ($pager->hasPrevious()) : ?>
            <div class="btn-group" role="group" aria-label="First group">
                <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>" class="btn btn-outline-primary">
                    <span aria-hidden="true"><?= lang('Pager.first') ?></span>
                </a>
            </div>
        <?php endif ?>

        <div class="btn-group" role="group" aria-label="First group">
            <?php foreach ($pager->links() as $link) : ?>
                <a href="<?= $link['uri'] ?>" class="btn btn-outline-primary <?= $link['active'] ? 'btn-primary text-white' : '' ?>">
                    <?= $link['title'] ?>
                </a>
            <?php endforeach ?>
        </div>

        <?php if ($pager->hasNext()) : ?>
            <div class="btn-group" role="group" aria-label="First group">
                <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>" class="btn btn-outline-primary">
                    <span aria-hidden="true"><?= lang('Pager.last') ?></span>
                </a>
            </div>
        <?php endif ?>
    </div>
</div>