<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
$label = $this->class2id($this->modelClass).'Label';
?>
<?php echo "<?php \$this->breadcrumbs = array(
	param('{$label}') => array('index'),
	'作成',
);";?> ?>

<h1><?php echo "<?php echo h(param('{$label}').'の作成'); ?>"; ?></h1>

<ul>
	<li><?php echo "<?php echo l('一覧', array('index')); ?>"; ?></li>
	<li><?php echo "<?php echo l('管理', array('admin')); ?>"; ?></li>
</ul>

<?php echo "<?php echo \$this->renderPartial('_form', array('model' => \$model)); ?>"; ?>
