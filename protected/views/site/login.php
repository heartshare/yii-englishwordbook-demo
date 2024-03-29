<div class="row">
    <?php $f = $this->beginWidget('\TbActiveForm'); ?>

    <?php echo $f->errorSummary($loginForm, ''); ?>
    <div class="col-md-6 col-xs-12">
        <?php echo $f->textFieldControlGroup($loginForm, 'username'); ?>
        <?php echo $f->passwordFieldControlGroup($loginForm, 'password'); ?>
        <?php echo $f->checkBoxControlGroup($loginForm, 'rememberMe'); ?>

        <div class="form-group">
            <?php echo TbHtml::submitButton('ログイン', array('color' => 'primary')); ?>
        </div><!-- /.form-group -->
    </div><!-- /.col -->

    <?php $this->endWidget(); ?>
</div><!-- /.row -->

<?php $this->beginWidget('\TbPanel', array('title' => '以下の 2 つのアカウントでログインできます。')); ?>
    <?php echo h($loginForm->getAttributeLabel('username')); ?>: admin <?php echo h($loginForm->getAttributeLabel('password')); ?>: adminadmin |
    <?php echo h($loginForm->getAttributeLabel('username')); ?>: demo <?php echo h($loginForm->getAttributeLabel('password')); ?>: demodemo
<?php $this->endWidget(); ?>
