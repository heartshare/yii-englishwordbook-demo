<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $data <?php echo $this->getModelClass(); ?> */
?>

<div class="view">
<?php
echo "    <b><?php echo CHtml::encode(\$data->getAttributeLabel('{$this->tableSchema->primaryKey}')); ?>:</b>\n";
echo "    <?php echo CHtml::link(CHtml::encode(\$data->{$this->tableSchema->primaryKey}), array('view', 'id' => \$data->{$this->tableSchema->primaryKey})); ?>\n    <br />\n\n";
$count=0;
foreach($this->tableSchema->columns as $column)
{
    if($column->isPrimaryKey)
        continue;
    if(++$count==7)
        echo "    <?php /*\n";
    echo "    <b><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?>:</b>\n";
    echo "    <?php echo CHtml::encode(\$data->{$column->name}); ?>\n    <br />\n";
}
if($count>=7)
    echo "    */ ?>\n";
?></div><!-- /.view -->
