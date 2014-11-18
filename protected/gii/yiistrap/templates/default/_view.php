<?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $data <?php echo $this->getModelClass(); ?> */
<?php echo "?>\n"; ?>

<?php
echo "<strong><?php echo h(\$data->getAttributeLabel('{$this->tableSchema->primaryKey}')); ?>:</strong>\n";
echo "<?php echo l(h(\$data->{$this->tableSchema->primaryKey}), array('view', 'id' => \$data->{$this->tableSchema->primaryKey})); ?>\n<br>\n\n";
$count = 0;
foreach ($this->tableSchema->columns as $column) {
    if ($column->isPrimaryKey) {
        continue;
    }
    if (++$count == 7) {
        echo "<?php /*\n";
    }
    echo "<strong><?php echo h(\$data->getAttributeLabel('{$column->name}')); ?>:</strong>\n";
    echo "<?php echo h(\$data->{$column->name}); ?>\n<br>\n\n";
}
if ($count >= 7) {
    echo "*/ ?>\n";
}
?>
<hr>
