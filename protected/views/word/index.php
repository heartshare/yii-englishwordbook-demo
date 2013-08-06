<?php $this->renderPartial('_sortArea'); ?>

<?php $this->widget('WordListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_listIndex',
    'itemsCssClass' => 'words-hide',
)); ?>
