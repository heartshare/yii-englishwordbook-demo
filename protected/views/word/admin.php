<?php cs()->registerScriptFile(bu() . '/js/jquery.placeholder.js', CClientScript::POS_END); ?>
<?php cs()->registerScript('placeholder', "$('#q').placeholder();"); ?>

<?php $this->widget('Flash'); ?>
<?php $this->renderPartial('_sortArea'); ?>

<?php $this->widget('WordListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_listEdit',
    'itemsCssClass' => 'words',
)); ?>

<div class="text-right">
    <div class="form">
        <?php echo CHtml::form(url($this->route), 'get'); ?>
        <?php echo CHtml::textField('q', $q, array('placeholder' => 'Search')); ?>
        <?php echo CHtml::submitButton('', array('name' => null, 'class' => 'btn btn-search')); ?>
        <?php echo CHtml::endForm(); ?>
    </div><!-- /.form -->
</div><!-- /.text-right -->
