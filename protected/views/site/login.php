<div class="form">
    <?php echo CHtml::form(); ?>
    <?php echo CHtml::errorSummary($loginForm, ''); ?>
    <div class="row">
        <?php echo CHtml::activeLabel($loginForm, 'username'); ?>
        <?php echo CHtml::activeTextField($loginForm, 'username'); ?>
    </div><!-- /.row -->
    <div class="row">
        <?php echo CHtml::activeLabel($loginForm, 'password'); ?>
        <?php echo CHtml::activePasswordField($loginForm, 'password'); ?>
    </div><!-- /.row -->
    <div class="row">
        <?php echo CHtml::submitButton('ログイン'); ?>
        <?php echo CHtml::activeCheckBox($loginForm, 'rememberMe'); ?>
        <?php echo CHtml::activeLabel($loginForm, 'rememberMe'); ?>
    </div><!-- /.row -->
    <?php echo CHtml::endForm(); ?>
</div><!-- /.form -->

<div class="info">
    <p>以下の2つのアカウントでログインできます。</p>
    ユーザ名: admin<br />
    パスワード: adminadmin<br />
    <hr />
    ユーザ名: demo<br />
    パスワード: demodemo
</div><!-- /.info -->
