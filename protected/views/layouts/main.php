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

    <header>
        <div id="logo">
            <?php echo app()->name . Yii::getVersion(); ?>
        </div><!-- /#logo -->
    </header><!-- /header -->

    <div id="main">
        <div class="inner">
            <div class="menu">
                <?php $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array('label' => 'Home', 'url' => array('/word/index')),
                        array('label' => 'Admin', 'url' => array('/word/admin'), 'visible' => !user()->isGuest),
                        array('label' => 'Create', 'url' => array('/word/create'), 'visible' => !user()->isGuest),
                        array('label' => 'About', 'url' => array('/site/about')),
                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => user()->isGuest),
                        array('label' => 'Logout (' . user()->name . ')', 'url' => array('/site/logout'), 'visible' => !user()->isGuest),
                    ),
                )); ?>
            </div><!-- /.menu -->
            <hr>
            <?php echo $content; ?>
        </div><!-- /.inner -->
    </div><!-- /#main -->

    <footer>
        <div class="center">
            &copy; <?php echo date('Y') . ' ' . app()->name; ?>
        </div><!-- /.center -->
    </footer><!-- /footer -->

</div><!-- /#container -->
</body>
</html>
