<?php

/**
 * Flash class file.
 */
class Flash extends CWidget
{
    private $hasFlash;

    /**
     * @var prefix of class selector.
     */
    public $prefix = 'flash-';

    /**
     * @var string key identifying the flash message.
     */
    public $key = 'success';

    /**
     * @var boolean whether to enable the effect.
     */
    public $enableEffect = false;

    /**
     * @see CWidget::init()
     */
    public function init()
    {
        $this->hasFlash = Yii::app()->getUser()->hasFlash($this->key);

        if ($this->enableEffect) {
            $this->registerScript();
        }
    }

    /**
     * @see CWidget::run()
     */
    public function run()
    {
        if ($this->hasFlash) {
            echo CHtml::openTag('div', array('class' => $this->prefix.$this->key));
            echo Yii::app()->getUser()->getFlash($this->key);
            echo CHtml::closeTag('div');
        }
    }

    /**
     * Registers the client scripts.
     */
    public function registerClientScript()
    {
        Yii::app()->getClientScript()->registerScript(
            'flashHideAuto',
            '$(".'.$this->prefix.$this->key.'").animate({opacity: 1.0}, 3000).fadeOut("slow");'
        );
    }
}

