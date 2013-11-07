<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo bu(); ?>/css/main.css">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo bu(); ?>/favicon.ico">
    <title><?php echo h($this->pageTitle); ?></title>
</head>
<body>
<div id="container">

    <header id="header">
        <div id="logo">
            <?php echo app()->name . Yii::getVersion(); ?>
        </div><!-- /#logo -->
    </header><!-- /#header -->

    <div id="main">
        <?php $this->widget('zii.widgets.CMenu', array(
            'id' => 'menu',
            'items' => array(
                array('label' => 'Home', 'url' => array('/word/index')),
                array('label' => 'Admin', 'url' => array('/word/admin'), 'visible' => !user()->isGuest),
                array('label' => 'Create', 'url' => array('/word/create'), 'visible' => !user()->isGuest),
                array('label' => 'About', 'url' => array('/site/about')),
                array('label' => 'Login', 'url' => array('/site/login'), 'visible' => user()->isGuest),
                array('label' => 'Logout (' . user()->name . ')', 'url' => array('/site/logout'), 'visible' => !user()->isGuest),
            ),
        )); ?>
        <hr>
        <?php echo $content; ?>
    </div><!-- /#main -->

    <footer id="footer">
        &copy; <?php echo date('Y') . ' ' . app()->name; ?>
    </footer><!-- /#footer -->

</div><!-- /#container -->
</body>
</html>
