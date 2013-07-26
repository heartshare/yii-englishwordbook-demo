<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->class2id($this->modelClass).'Label';
$pk = $this->tableSchema->primaryKey;
?>
<?php echo "<?php \$this->breadcrumbs = array(
	param('{$label}') => array('index'),
	\$model->{$nameColumn},
);";?> ?>

<h1><?php echo "<?php echo h(param('{$label}').' #'.\$model->{$pk}); ?>"; ?></h1>
<?php echo "<?php \$this->widget('Flash'); ?>"; ?>

<ul>
	<li><?php echo "<?php echo l('一覧', array('index')); ?>"; ?></li>
	<li><?php echo "<?php echo l('作成', array('create')); ?>"; ?></li>
	<li><?php echo "<?php echo l('更新', array('update', 'id' => \$model->{$pk})); ?>"; ?></li>
	<li><?php echo "<?php echo l('削除', '#', array('submit' => array('delete', 'id' => \$model->{$pk}), 'confirm' => param('deleteConfirm'))); ?>"; ?></li>
</ul>

<?php echo "<?php"; ?> $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
<?php
foreach ($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."', \n";
?>
	),
)); ?>