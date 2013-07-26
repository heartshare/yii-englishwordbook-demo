<?php $this->renderPartial('_sortArea', compact('pages')); ?>

<div class="words-hide">
    <?php foreach ($words as $word): ?>
    <span class="word"><?php echo h($word->en); ?></span>
    <span onmouseover="this.style.color='#555';" onmouseout="this.style.color='#fff';"><?php echo h($word->ja); ?></span><br />
    <?php endforeach; ?>
</div><!-- /.words-hide -->
