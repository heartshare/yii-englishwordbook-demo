<?php if ($this->action->id === 'update'): ?>
<?php $this->pageTitle = $word->en . ' - ' . $this->pageTitle; ?>
<?php endif; ?>

<div class="row">
    <?php $f = $this->beginWidget('\TbActiveForm'); ?>

    <div class="col-md-6 col-sx-12">
        <?php echo $f->textFieldControlGroup($word, 'en', array('maxlength' => 64)); ?>
        <?php echo $f->textFieldControlGroup($word, 'ja', array('maxlength' => 64)); ?>

    <div class="form-group">
        <?php echo TbHtml::submitButton($word->isNewRecord ? '登録する' : '更新する', array('color' => 'primary')); ?>
    </div><!-- /.form-group -->
    </div><!-- /.col -->

    <?php $this->endWidget(); ?>
</div><!-- /.row -->
