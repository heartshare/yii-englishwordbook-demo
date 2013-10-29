<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link rel="stylesheet" type="text/css" href="<?php echo bu(); ?>/css/main.css" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo bu(); ?>/favicon.ico" />
<title><?php echo h($this->pageTitle); ?></title>
</head>
<body>
<div id="container">

    <div id="header">
        <div id="logo">
            <?php echo app()->name.Yii::getVersion(); ?>
        </div><!-- /#logo -->
    </div><!-- /#header -->

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
            <p class="line"></p>
            <?php echo $content; ?>
        </div><!-- /.inner -->
    </div><!-- /#main -->

    <div id="footer">
        <div class="center">
            &copy; <?php echo date('Y').' '.app()->name; ?>
        </div><!-- /.center -->
    </div><!-- /#footer -->

</div><!-- /#container -->
</body>
</html>
