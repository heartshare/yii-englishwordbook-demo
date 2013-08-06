<?php $sorts = range('a', 'z'); ?>
<?php array_push($sorts, 'az', 'za', 'new', 'old', 'rnd'); ?>

<div class="sort-link">
    <?php foreach ($sorts as $sort): ?>
    <?php echo l($sort, array($this->action->id, 'sort' => $sort)); ?>
    <?php endforeach; ?>
</div><!-- /.sort-link -->

<?php $this->renderPartial('_actionLink'); ?>
