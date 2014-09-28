<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo bu(); ?>/css/styles.css" media="all">
    <!--[if lt IE 9]>
        <script src="<?php echo bu(); ?>/js/html5shiv.min.js"></script>
        <script src="<?php echo bu(); ?>/js/respond.min.js"></script>
    <![endif]-->
    <title><?php echo h($this->pageTitle); ?></title>
</head>
<body>
<?php $this->widget('\TbNavbar', array(
    'brandLabel' => '<span class="glyphicon glyphicon-list-alt"></span>',
    'display' => null,
    'items' => array(
        array(
            'class' => '\TbNav',
            'items' => array(
                array('label' => 'Home', 'url' => array('/word/index')),
                array('label' => 'Admin', 'url' => array('/word/admin'), 'visible' => !user()->isGuest),
                array('label' => 'Create', 'url' => array('/word/create'), 'visible' => !user()->isGuest),
            ),
        ),
        array(
            'class' => '\TbNav',
            'htmlOptions' => array(
                'class' => 'navbar-right',
            ),
            'items' => array(
                array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                array('label' => 'Login', 'url' => array('/site/login'), 'visible' => user()->isGuest),
                array('label' => 'Logout (' . user()->name . ')', 'url' => array('/site/logout'), 'visible' => !user()->isGuest),
            ),
        ),
    ),
)); ?>

<div class="container">
    <?php echo $content; ?>
</div><!-- /.container -->

<footer class="footer">
    &copy; <?php echo h(date_create()->format('Y') . ' ' . app()->name . ' ' . Yii::getVersion()); ?>
</footer><!-- /.footer -->

<?php cs()->registerPackage('jquery'); ?>
<script src="<?php echo bu(); ?>/js/bootstrap.min.js"></script>
</body>
</html>
