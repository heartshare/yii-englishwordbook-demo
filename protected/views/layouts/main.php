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
            <?php echo $content; ?>
            <?php if (user()->id): ?>
            <div class="right">
                <?php echo h(user()->name); ?>
                <?php echo l('ログアウト', array('/site/logout')); ?>
            </div><!-- /.right -->
            <?php endif; ?>
        </div>
    </div><!-- /#main -->
    
    <div id="footer">
        <ul>
            <li><?php echo l('ホーム', array('/word/index')); ?></li>
            <li><?php echo l('このサイトについて', array('/site/about')); ?></li>
        </ul>
        <div class="center">
            &copy; <?php echo date('Y').' '.app()->name; ?>
        </div><!-- /.center -->
    </div><!-- /#footer -->

</div><!-- /#container -->
</body>
</html>
