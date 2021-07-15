<?php $pager->setSurroundCount(0) ?>

<div class="template-demo">
    <div class="btn-toolbar row justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
        <div class="col-md-4">
            <?php if ($pager->hasPrevious()) : ?>
                <div class="btn-group" role="group" aria-label="First group">
                    <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>" class="btn btn-outline-primary">
                        <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
                    </a>
                </div>
            <?php endif ?>
        </div>

        <div class="col-md-4">
            <?php if ($pager->hasNext()) : ?>
                <div class="btn-group float-right" role="group" aria-label="First group">
                    <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="btn btn-outline-primary">
                        <span aria-hidden="true"><?= lang('Pager.next') ?></span>
                    </a>
                </div>
            <?php endif ?>
        </div>

    </div>
</div>