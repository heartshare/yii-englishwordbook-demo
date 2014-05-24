<?php if ($this->action->id === 'update'): ?>
<?php $this->pageTitle = $word->en . ' - ' . $this->pageTitle; ?>
<?php endif; ?>

<div class="form">
    <?php $f = $this->beginWidget('CActiveForm', array(
        'clientOptions' => array('hideErrorMessage' => true),
    )); ?>
    <?php echo $f->errorSummary($word, ''); ?>

    <div class="row">
        <?php echo $f->label($word, 'en'); ?>
        <?php echo $f->textField($word, 'en', array('maxlength' => 64)); ?>
        <?php echo $f->error($word, 'en'); ?>
    </div><!-- /.row -->

    <div class="row">
        <?php echo $f->label($word, 'ja'); ?>
        <?php echo $f->textField($word, 'ja', array('maxlength' => 64)); ?>
        <?php echo $f->error($word, 'ja'); ?>
    </div><!-- /.row -->

    <div class="row">
        <?php echo CHtml::submitButton($word->isNewRecord ? '登録する' : '更新する', array('class' => 'btn')); ?>
    </div><!-- /.row -->

    <?php $this->endWidget(); ?>
</div><!-- /.form -->
