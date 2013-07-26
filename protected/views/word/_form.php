<?php if ($this->action->id === 'update'): ?>
<?php $this->pageTitle = $word->en.' - '.$this->pageTitle; ?>
<?php endif; ?>

<div class="form">
    <?php echo CHtml::form(); ?>
    <?php echo CHtml::errorSummary($word, ''); ?>
    <?php echo CHtml::activeTextField($word, 'en', array('maxlength' => 64)); ?>
    <?php echo CHtml::activeTextField($word, 'ja', array('maxlength' => 64)); ?>
    <?php echo CHtml::submitButton($word->isNewRecord ? 'Create' : 'Update'); ?>
    <?php echo CHtml::endForm(); ?>
</div><!-- /.form -->
