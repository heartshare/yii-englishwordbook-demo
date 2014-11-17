<?php cs()->registerScriptFile(bu() . '/js/jquery.placeholder.js', CClientScript::POS_END); ?>
<?php cs()->registerScript('placeholder', "$('#q').placeholder();"); ?>

<?php $this->widget('\TbAlert'); ?>
<?php $this->renderPartial('_sort'); ?>

<?php $this->widget('WordListView', array(
    'dataProvider' => $dataProvider,
    'itemsCssClass' => 'words',
)); ?>

<div class="text-right">
    <?php echo TbHtml::formTb(TbHtml::FORM_LAYOUT_INLINE, url($this->route), 'get'); ?>
    <div class="input-group">
        <?php echo TbHtml::textField('q', $q, array('placeholder' => 'Search')); ?>
        <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">
                <?php echo TbHtml::icon('search'); ?>
            </button><!-- /.btn -->
        </span><!-- /.input-group-btn -->
    </div><!-- /.input-group -->
    <?php echo TbHtml::endForm(); ?>
</div><!-- /.text-right -->
