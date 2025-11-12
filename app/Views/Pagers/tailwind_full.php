<?php
// app/Views/Pagers/tailwind_links.php
$pager->setSurroundCount(2);
?>

<nav aria-label="Pagination" class="isolate inline-flex -space-x-px rounded-md">
    <?php if ($pager->hasPreviousPage()): ?>
        <a href="<?= $pager->getPreviousPage() ?>"
            class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 hover:bg-white/5">
            <span class="sr-only">Previous</span>&lt;
        </a>
    <?php else: ?>
        <span class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-600 bg-gray-100">&#60;</span>
    <?php endif ?>

    <?php foreach ($pager->links() as $link): ?>
        <a href="<?= $link['uri'] ?>"
            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold <?= $link['active'] ? 'bg-blue-600 text-white' : 'text-black-200 hover:bg-white/5' ?>">
            <?= $link['title'] ?>
        </a>
    <?php endforeach ?>

    <?php if ($pager->hasNextPage()): ?>
        <a href="<?= $pager->getNextPage() ?>"
            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-black-400 hover:bg-white/5">
            <span class="sr-only">Next</span>&gt;
        </a>
    <?php else: ?>
        <span class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-600 bg-gray-100">&#62;</span>
    <?php endif ?>
</nav>