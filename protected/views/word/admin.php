<?php $this->widget('Flash'); ?>
<?php $this->renderPartial('_sortArea'); ?>

<?php $this->widget('WordListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_listEdit',
    'itemsCssClass' => 'words',
)); ?>

<div class="right">
    <div class="form">
        <?php echo CHtml::form(url($this->route)); ?>
        <?php echo CHtml::textField('q', $q); ?>
        <?php echo CHtml::imageButton(bu().'/images/search.png', array('value' => 'Search')); ?>
        <?php echo CHtml::endForm(); ?>
    </div><!-- /.form -->
</div><!-- /.right -->
