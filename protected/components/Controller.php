<?php

/**
 * Controller class file.
 */
class Controller extends CController
{
    const PAGE_SIZE = 10;

    private $modelClass;

    /**
     * @see CController::layout
     */
    public $layout = '//layouts/main';

    /**
     * @see CController::init()
     */
    public function init()
    {
        $this->modelClass = ucfirst($this->getId());
    }

    /**
     * @see CController::filters()
     */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    /**
     * Saves the current record.
     * @param CActiveRecord $model a particular model
     * @param string $message flash message
     */
    public function save($model, $message)
    {
        if (isset($_POST[$this->modelClass])) {
            $model->attributes = $_POST[$this->modelClass];

            if ($model->save()) {
                Yii::app()->getUser()->setFlash('success', $message);
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
    }

    /**
     * Returns a particular data model based on the primary key.
     * @return CActiveRecord
     * @throws CHttpException if model is null
     */
    public function loadModel()
    {
        $modelClass = new $this->modelClass();
        $model = $modelClass->findByPk(Yii::app()->getRequest()->getQuery('id'));

        if ($model === null) {
            throw new CHttpException(404, 'データがありません。');
        }
        return $model;
    }

    /**
     * Returns a data provider based on ActiveRecord.
     * @param CActiveRecord $model
     * @return CActiveDataProvider
     */
    public function loadActiveDataProvider($model)
    {
        $dataProvider = new CActiveDataProvider($model);
        $dataProvider->getPagination()->pageSize = static::PAGE_SIZE;
        $dataProvider->getPagination()->pageVar = 'page';

        return $dataProvider;
    }
}

