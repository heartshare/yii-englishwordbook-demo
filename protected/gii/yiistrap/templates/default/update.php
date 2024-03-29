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
    '#' . \$model->{$nameColumn} => array('view', 'id' => \$model->{$this->tableSchema->primaryKey}),
    'Update',
);\n";
?>
?>

<h1>
    Update <?php echo $this->modelClass . " #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>\n"; ?>
    <?php echo "<?php"; ?> echo TbHtml::buttonDropdown('Action', array(
        array('label' => 'List <?php echo $this->modelClass; ?>', 'url' => array('index')),
        array('label' => 'Create <?php echo $this->modelClass; ?>', 'url' => array('create')),
        array('label' => 'View <?php echo $this->modelClass; ?>', 'url' => array('view', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>)),
        array('label' => 'Manage <?php echo $this->modelClass; ?>', 'url' => array('admin')),
    )); ?>
</h1>

<?php echo "<?php \$this->renderPartial('_form', compact('model')); ?>"; ?>
