<?php if ($this->action->id === 'update'): ?>
<?php $this->pageTitle = $word->en . ' - ' . $this->pageTitle; ?>
<?php endif; ?>

<?php $f = $this->beginWidget('\TbActiveForm'); ?>
<div class="row">
    <div class="col-md-6">
        <?php echo $f->textFieldControlGroup($word, 'en', array('maxlength' => 64)); ?>
        <?php echo $f->textFieldControlGroup($word, 'ja', array('maxlength' => 64)); ?>
    </div><!-- /.col-* -->
</div><!-- /.row -->
<?php echo TbHtml::submitButton($word->isNewRecord ? '登録する' : '更新する', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
<?php $this->endWidget(); ?>
