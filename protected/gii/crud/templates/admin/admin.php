<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
$label = $this->class2id($this->modelClass).'Label';
?>
<?php echo "<?php\n \$this->breadcrumbs = array(
	param('{$label}') => array('index'),
	'管理',
);\n"; ?>

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo "<?php echo h(param('{$label}').'の管理'); ?>"; ?></h1>
<?php echo "<?php \$this->widget('Flash'); ?>"; ?>

<ul>
	<li><?php echo "<?php echo l('一覧', array('index')); ?>"; ?></li>
	<li><?php echo "<?php echo l('作成', array('create')); ?>"; ?></li>
</ul>

<p>
	先頭に <, <=, >, >=, <>, = などの記号を入力して検索を絞り込めることが可能です
</p>

<?php echo "<?php echo CHtml::link('高度な検索', '#', array('class' => 'search-button')); ?>"; ?>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search', array('model' => \$model)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
	'id' => '<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class' => 'CButtonColumn',
			'template' => '{view}{update}',
		),
	),
)); ?>
