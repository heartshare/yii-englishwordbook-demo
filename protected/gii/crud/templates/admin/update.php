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
	\$model->{$nameColumn} => array('view', 'id' => \$model->{$pk}),
	'更新',
);"; ?> ?>

<h1><?php echo "<?php echo h(param('{$label}').'の更新 '.\$model->{$pk}); ?>" ?></h1>

<ul>
	<li><?php echo "<?php echo l('一覧', array('index')); ?>"; ?></li>
	<li><?php echo "<?php echo l('作成', array('create')); ?>"; ?></li>
	<li><?php echo "<?php echo l('表示', array('view', 'id' => \$model->{$pk})); ?>"; ?></li>
	<li><?php echo "<?php echo l('管理', array('admin')); ?>"; ?></li>
</ul>

<?php echo "<?php echo \$this->renderPartial('_form', array('model' => \$model)); ?>"; ?>