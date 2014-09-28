<?php

/**
 * WordListView class file.
 */
class WordListView extends \TbListView
{
    public $summaryText = '<span class="label label-info">{count} results</span>';
    public $emptyText = '';
    public $enableHistory = true;
    public $ajaxVar = '';
    public $template = '<span class="text-right">{summary}</span>{pager}{items}';
    public $pagerCssClass = 'text-center';
    public $loadingCssClass = '';

    public function init()
    {
        $this->itemView = '_list' . ucfirst($this->getOwner()->getAction()->getId());
        parent::init();
    }
}

