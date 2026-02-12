<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation" class="flex items-center gap-2">
    <?php if ($pager->hasPrevious()): ?>
        <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>"
            class="w-10 h-10 flex items-center justify-center rounded-xl border-2 border-slate-100 dark:border-slate-700 text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
            <span class="material-icons text-lg">first_page</span>
        </a>
        <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>"
            class="w-10 h-10 flex items-center justify-center rounded-xl border-2 border-slate-100 dark:border-slate-700 text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
            <span class="material-icons text-lg">chevron_left</span>
        </a>
    <?php endif ?>

    <?php foreach ($pager->links() as $link): ?>
        <a href="<?= $link['uri'] ?>"
            class="w-10 h-10 flex items-center justify-center rounded-xl <?= $link['active'] ? 'bg-primary text-white font-bold shadow-lg shadow-primary/30' : 'border-2 border-slate-100 dark:border-slate-700 text-slate-600 dark:text-slate-400 font-bold hover:bg-slate-50 dark:hover:bg-slate-800' ?> transition-all">
            <?= $link['title'] ?>
        </a>
    <?php endforeach ?>

    <?php if ($pager->hasNext()): ?>
        <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>"
            class="w-10 h-10 flex items-center justify-center rounded-xl border-2 border-slate-100 dark:border-slate-700 text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
            <span class="material-icons text-lg">chevron_right</span>
        </a>
        <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>"
            class="w-10 h-10 flex items-center justify-center rounded-xl border-2 border-slate-100 dark:border-slate-700 text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
            <span class="material-icons text-lg">last_page</span>
        </a>
    <?php endif ?>
</nav>