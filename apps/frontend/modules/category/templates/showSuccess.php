<?php use_stylesheet('jobs.css') ?>

<?php slot('title', sprintf('Trabajos de la categoria %s', $category->getName())) ?>

<div class="category">
    <div class="feed">
        <a href="<?php echo url_for('category', array('sf_subject' => $category, 'sf_format' => 'atom')) ?>">Feed</a>
    </div>
    <h1><?php echo $category ?></h1>
</div>

<?php include_partial('job/list', array('jobs' => $pager->getResults())) ?>

<hr />

<?php if ($pager->haveToPaginate()): ?>
    <div class="pagination">
        <a href="<?php echo url_for('category', $category) ?>?page=1">
            <img src="/legacy/images/first.png" alt="First page" title="First page" />
        </a>

        <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $pager->getPreviousPage() ?>">
            <img src="/legacy/images/previous.png" alt="Previous page" title="Previous page" />
        </a>

        <?php foreach ($pager->getLinks() as $page): ?>
            <?php if ($page == $pager->getPage()): ?>
                <?php echo $page ?>
            <?php else: ?>
                <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
            <?php endif; ?>
        <?php endforeach; ?>

        <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $pager->getNextPage() ?>">
            <img src="/legacy/images/next.png" alt="Next page" title="Next page" />
        </a>

        <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $pager->getLastPage() ?>">
            <img src="/legacy/images/last.png" alt="Last page" title="Last page" />
        </a>
    </div>
<?php endif; ?>

<div class="pagination_desc">
    <strong><?php echo $pager->getNbResults() ?></strong> Trabajos en esta categoria

    <?php if ($pager->haveToPaginate()): ?>
        - pagina <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
    <?php endif; ?>
</div>

