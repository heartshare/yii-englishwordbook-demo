<?php

/**
 * LinkPager class file.
 */
class LinkPager extends CLinkPager
{
    /**
     * @see CLinkPager::init()
     */
    public function init()
    {
        $this->firstPageLabel = '&laquo;&laquo;';
        $this->prevPageLabel = '&laquo;';
        $this->nextPageLabel = '&raquo;';
        $this->lastPageLabel = '&raquo;&raquo;';
        $this->htmlOptions['id'] = $this->getId();
        $this->htmlOptions['class'] = 'pager';
    }

    /**
     * @see CLinkPager::run()
     */
    public function run()
    {
        $buttons = $this->createPageButtons();

        if (empty($buttons)) {
            return;
        }
        echo CHtml::tag('ul', $this->htmlOptions, implode("\n", $buttons));
    }
}

