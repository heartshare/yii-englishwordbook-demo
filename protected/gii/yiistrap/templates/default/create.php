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
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs = array(
    '$label' => array('index'),
    'Create',
);\n";
?>
?>

<h1>
    Create <?php echo $this->modelClass . "\n"; ?>
    <?php echo "<?php"; ?> echo TbHtml::buttonDropdown('Action', array(
        array('label' => 'List <?php echo $this->modelClass; ?>', 'url' => array('index')),
        array('label' => 'Manage <?php echo $this->modelClass; ?>', 'url' => array('admin')),
    )); ?>
</h1>

<?php echo "<?php \$this->renderPartial('_form', compact('model')); ?>"; ?>
