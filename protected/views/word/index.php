<?php $this->renderPartial('_sortArea'); ?>

<?php $this->widget('WordListView', array(
    'dataProvider' => $dataProvider,
    'itemsCssClass' => 'words-hide',
)); ?>
