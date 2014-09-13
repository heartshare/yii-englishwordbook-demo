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
        $this->prevPageLabel = 'Prev';
        $this->nextPageLabel = 'Next';
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

