<?php if ($this->action->id === 'update'): ?>
<?php $this->pageTitle = $word->en . ' - ' . $this->pageTitle; ?>
<?php endif; ?>

<div class="form">
    <?php echo CHtml::form(); ?>
    <?php echo CHtml::errorSummary($word, ''); ?>

    <div class="row">
        <?php echo CHtml::activeLabel($word, 'en'); ?>
        <?php echo CHtml::activeTextField($word, 'en', array('maxlength' => 64)); ?>
    </div><!-- /.row -->

    <div class="row">
        <?php echo CHtml::activeLabel($word, 'ja'); ?>
        <?php echo CHtml::activeTextField($word, 'ja', array('maxlength' => 64)); ?>
    </div><!-- /.row -->

    <div class="row">
        <?php echo CHtml::submitButton($word->isNewRecord ? '登録する' : '更新する', array('class' => 'btn')); ?>
    </div><!-- /.row -->

    <?php echo CHtml::endForm(); ?>
</div><!-- /.form -->
