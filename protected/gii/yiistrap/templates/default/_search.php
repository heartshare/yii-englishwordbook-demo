<?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form TbActiveForm */
<?php echo "?>\n"; ?>

<div class="row">
    <div class="col-md-6 col-xs-12">
        <?php echo "<?php \$form = \$this->beginWidget('\\TbActiveForm', array(
            'enableClientValidation' => false,
            'action' => Yii::app()->createUrl(\$this->route),
            'method' => 'get',
        )); ?>\n"; ?>

<?php foreach ($this->tableSchema->columns as $column): ?>
<?php $field = $this->generateInputField($this->modelClass, $column); ?>
<?php if (strpos($field, 'password') !== false): ?>
<?php continue; ?>
<?php endif; ?>
        <?php echo "<?php echo " . $this->generateActiveControlGroup($this->modelClass, $column) . "; ?>\n"; ?>
<?php endforeach; ?>

        <div class="form-group">
            <?php echo "<?php echo TbHtml::submitButton('Search', array('color' => 'primary'));?>\n" ?>
        </div><!-- /.form-group -->

        <?php echo "<?php \$this->endWidget(); ?>\n"; ?>
    </div><!-- /.col -->
</div><!-- /.row -->
