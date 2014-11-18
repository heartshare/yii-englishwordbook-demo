<?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
<?php
echo "\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs = array(
    '$label' => array('index'),
    'Manage',
);\n";
?>

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function() {
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function() {
    $('#<?php echo $this->class2id($this->modelClass); ?>-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<h1>
    Manage <?php echo $this->pluralize($this->class2name($this->modelClass)) . "\n"; ?>
    <?php echo "<?php"; ?> echo TbHtml::buttonDropdown('Action', array(
        array('label' => 'List <?php echo $this->modelClass; ?>', 'url' => array('index')),
        array('label' => 'Create <?php echo $this->modelClass; ?>', 'url' => array('create')),
    )); ?>

    <?php echo "<?php echo l('Advanced Search', '#', array('class' => 'search-button btn btn-default')); ?>\n"; ?>
    <?php echo "<?php echo l('Refresh', array(\$this->route), array('class' => 'btn btn-default')); ?>\n"; ?>
</h1>

<div id="status-msg"></div>

<?php echo "<?php \$this->widget('\\TbAlert'); ?>\n" ?>

<p>You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.</p>

<div class="search-form" style="display:none">
    <?php echo "<?php \$this->renderPartial('_search', compact('model')); ?>\n"; ?>
</div><!-- /.search-form -->

<?php echo "<?php"; ?> $this->widget('\TbGridView', array(
    'id' => '<?php echo $this->class2id($this->modelClass); ?>-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
<?php $count = 0; ?>
<?php foreach ($this->tableSchema->columns as $column): ?>
<?php if (++$count == 7): ?>
        <?php echo "/*\n"; ?>
<?php endif; ?>
        <?php echo "'" . $column->name . "',\n"; ?>
<?php endforeach; ?>
<?php if ($count >= 7): ?>
        <?php echo "*/\n"; ?>
<?php endif; ?>
        array(
            'class' => '\TbButtonColumn',
            'afterDelete' => 'function (link, success, data) { if (success) { $("#status-msg").html(data); }}',
        ),
    ),
)); ?>
