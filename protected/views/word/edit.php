<?php $this->widget('Flash'); ?>
<?php $this->renderPartial('_form', compact('word')); ?>
<?php $this->renderPartial('_sortArea', compact('pages')); ?>

<div class="words">
    <?php foreach ($words as $word): ?>
    <span class="word"><?php echo h($word->en); ?></span>
    <span class="word"><?php echo h($word->ja); ?></span>
    <?php echo l('update', array('update', 'id' => $word->id)); ?>
    <?php echo l('delete', '#', array('submit' => array('delete', 'id' => $word->id), 'confirm' => param('confirmDelete'), 'csrf' => true)); ?><br />
    <?php endforeach; ?>
</div><!-- /.words -->

<div class="right">
    <div class="form">
        <?php echo CHtml::form(url($this->route)); ?>
        <?php echo CHtml::textField('q', $q); ?>
        <?php echo CHtml::imageButton(bu().'/images/search.png', array('value' => 'Search')); ?>
        <?php echo CHtml::endForm(); ?>
    </div><!-- /.form -->
</div><!-- /.right -->
