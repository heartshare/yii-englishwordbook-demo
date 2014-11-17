<?php $f = $this->beginWidget('\TbActiveForm'); ?>
<?php echo $f->errorSummary($loginForm, ''); ?>
<div class="row">
    <div class="col-md-6">
        <?php echo $f->textFieldControlGroup($loginForm, 'username'); ?>
        <?php echo $f->passwordFieldControlGroup($loginForm, 'password'); ?>
    </div><!-- /.col-* -->
</div><!-- /.row -->
<?php echo $f->checkBoxControlGroup($loginForm, 'rememberMe'); ?>
<?php echo TbHtml::submitButton('ログイン', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
<?php $this->endWidget(); ?>
<hr>

<?php $this->beginWidget('\TbPanel', array('title' => '以下の 2 つのアカウントでログインできます。')); ?>
    <?php echo h($loginForm->getAttributeLabel('username')); ?>: admin <?php echo h($loginForm->getAttributeLabel('password')); ?>: adminadmin |
    <?php echo h($loginForm->getAttributeLabel('username')); ?>: demo <?php echo h($loginForm->getAttributeLabel('password')); ?>: demodemo
<?php $this->endWidget(); ?>
