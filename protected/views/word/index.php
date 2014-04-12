<?php $this->renderPartial('_sort'); ?>

<?php $this->widget('WordListView', array(
    'dataProvider' => $dataProvider,
    'itemsCssClass' => 'words-hide',
)); ?>
