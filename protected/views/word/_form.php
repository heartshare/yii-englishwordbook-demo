<?php if ($this->action->id === 'update'): ?>
<?php $this->pageTitle = $word->en . ' - ' . $this->pageTitle; ?>
<?php endif; ?>

<div class="row">
    <div class="col-md-6 col-sx-12">
    <?php $f = $this->beginWidget('\TbActiveForm'); ?>

    <?php echo $f->textFieldControlGroup($word, 'en', array('maxlength' => 64)); ?>
    <?php echo $f->textFieldControlGroup($word, 'ja', array('maxlength' => 64)); ?>

    <div class="form-group">
        <?php echo TbHtml::submitButton($word->isNewRecord ? '登録する' : '更新する', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    </div><!-- /.form-group -->

    <?php $this->endWidget(); ?>
    </div><!-- /.col -->
</div><!-- /.row -->
