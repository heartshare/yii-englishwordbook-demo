<?php cs()->registerScriptFile(bu() . '/js/jquery.placeholder.js', CClientScript::POS_END); ?>
<?php cs()->registerScript('placeholder', "$('#q').placeholder();"); ?>

<?php $this->widget('\TbAlert'); ?>
<?php $this->renderPartial('_sort'); ?>

<?php $this->widget('WordListView', array(
    'dataProvider' => $dataProvider,
    'itemsCssClass' => 'words',
)); ?>

<div class="text-right">
    <?php echo TbHtml::formTb('inline', url($this->route), 'get'); ?>
    <?php echo TbHtml::textField('q', $q, array(
        'placeholder' => 'Search',
        'append' => TbHtml::submitButton(TbHtml::icon('search') , array('name' => '', 'color' => 'primary')),
    )); ?>
    <?php echo TbHtml::endForm(); ?>
</div><!-- /.text-right -->
