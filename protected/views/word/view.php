<?php $this->pageTitle = $word->en . ' - ' . $this->pageTitle; ?>
<?php $this->widget('Flash'); ?>

<div class="text-center">
    <span class="word"><?php echo h($word->en); ?></span>
    <span class="word"><?php echo h($word->ja); ?></span>
</div><!-- /.text-center -->
