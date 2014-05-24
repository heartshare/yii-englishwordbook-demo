<div class="form">
    <?php $f = $this->beginWidget('CActiveForm'); ?>
    <?php echo $f->errorSummary($loginForm, ''); ?>

    <div class="row">
        <?php echo $f->label($loginForm, 'username'); ?>
        <?php echo $f->textField($loginForm, 'username'); ?>
        <?php echo $f->error($loginForm, 'username'); ?>
    </div><!-- /.row -->

    <div class="row">
        <?php echo $f->label($loginForm, 'password'); ?>
        <?php echo $f->passwordField($loginForm, 'password'); ?>
        <?php echo $f->error($loginForm, 'password'); ?>
    </div><!-- /.row -->

    <div class="row">
        <?php echo CHtml::submitButton('ログイン', array('class' => 'btn')); ?>
        <?php echo $f->checkBox($loginForm, 'rememberMe'); ?>
        <?php echo $f->label($loginForm, 'rememberMe'); ?>
        <?php echo $f->error($loginForm, 'rememberMe'); ?>
    </div><!-- /.row -->

    <?php $this->endWidget(); ?>
</div><!-- /.form -->

<div class="alert alert-info">
    以下の 2 つのアカウントでログインできます。
    <hr>
    <?php echo h($loginForm->getAttributeLabel('username')); ?>: admin<br>
    <?php echo h($loginForm->getAttributeLabel('password')); ?>: adminadmin<br>
    <hr>
    <?php echo h($loginForm->getAttributeLabel('username')); ?>: demo<br>
    <?php echo h($loginForm->getAttributeLabel('password')); ?>: demodemo<br>
</div><!-- /.info -->
