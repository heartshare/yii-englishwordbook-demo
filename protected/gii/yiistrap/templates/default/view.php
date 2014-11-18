<?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
<?php echo "?>\n"; ?>

<?php
echo "<?php\n";
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs = array(
    '$label' => array('index'),
    '#' . \$model->{$nameColumn},
);\n";
?>
?>

<h1>
    View <?php echo $this->modelClass . " #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?>
    <?php echo "<?php"; ?> echo TbHtml::buttonDropdown('Action', array(
        array('label' => 'List <?php echo $this->modelClass; ?>', 'url' => array('index')),
        array('label' => 'Create <?php echo $this->modelClass; ?>', 'url' => array('create')),
        array('label' => 'Update <?php echo $this->modelClass; ?>', 'url' => array('update', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>)),
        array('label' => 'Delete <?php echo $this->modelClass; ?>', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>), 'confirm' => 'Are you sure you want to delete this item?', 'csrf' => true)),
        array('label' => 'Manage <?php echo $this->modelClass; ?>', 'url' => array('admin')),
    )); ?>
</h1>

<?php echo "<?php \$this->widget('\\TbAlert'); ?>\n"; ?>

<?php echo "<?php"; ?> $this->widget('\TbDetailView', array(
    'data' => $model,
    'attributes' => array(
<?php foreach ($this->tableSchema->columns as $column): ?>
        <?php echo "'" . $column->name . "',\n"; ?>
<?php endforeach; ?>
    ),
)); ?>
