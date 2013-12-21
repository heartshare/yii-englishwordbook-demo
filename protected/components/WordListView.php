<?php

Yii::import('zii.widgets.CListView');

/**
 * WordListView class file.
 */
class WordListView extends CListView
{
    public $summaryText = '{count} results';
    public $emptyText = '';
    public $enableHistory = true;
    public $ajaxVar = '';
    public $template = '{summary}{pager}{items}';
    public $pagerCssClass = 'text-center';

    public $pager = array(
        'class' => 'LinkPager',
    );
}

