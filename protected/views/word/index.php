<?php cs()->registerScript('popover', "
    $('[rel=popover]').popover('hide');
    $(document).ajaxComplete(function() {
        $('[rel=popover]').popover('hide');
    });
"); ?>

<?php $this->renderPartial('_sort'); ?>

<?php $this->widget('WordListView', array(
    'dataProvider' => $dataProvider,
    'itemsCssClass' => 'words-hide',
)); ?>
