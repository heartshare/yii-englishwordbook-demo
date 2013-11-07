<?php $this->widget('Flash'); ?>
<?php $this->renderPartial('_sortArea'); ?>

<?php $this->widget('WordListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_listEdit',
    'itemsCssClass' => 'words',
)); ?>

<div class="right">
    <div class="form">
        <?php echo CHtml::form(url($this->route), 'get'); ?>
        <?php echo CHtml::textField('q', $q); ?>
        <?php echo CHtml::submitButton('', array('name' => null, 'class' => 'search-ico')); ?>
        <?php echo CHtml::endForm(); ?>
    </div><!-- /.form -->
</div><!-- /.right -->
