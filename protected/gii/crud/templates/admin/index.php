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
	param('{$label}'),
);";?> ?>

<h1><?php echo "<?php echo h(param('{$label}')); ?>"; ?></h1>

<ul>
	<li><?php echo "<?php echo l('作成', array('create')); ?>"; ?></li>
	<li><?php echo "<?php echo l('管理', array('admin')); ?>"; ?></li>
</ul>

<?php echo "<?php"; ?> $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>