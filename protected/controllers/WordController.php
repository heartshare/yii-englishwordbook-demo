<?php

/**
 * Frontend WordController class file.
 */
class WordController extends Controller
{
    /**
     * @see CController::accessRules()
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Lists all words.
     * @param string $sort strings of sort
     */
    public function actionIndex($sort = null)
    {
        $word = Word::model()->sort($sort);
        $dataProvider = $this->loadActiveDataProvider($word, param('wordPerPage'));

        $this->render('index', compact('dataProvider'));
    }

    /**
     * Manages the words.
     * @param string $sort strings of sort
     * @param string $q strings of search
     */
    public function actionAdmin($sort = null, $q = null)
    {
        $q = mb_trim($q);

        $word = $q === ''
            ? Word::model()->sort($sort)
            : Word::model()->search($q);

        $dataProvider = $this->loadActiveDataProvider($word, param('wordPerPage'));

        $this->render('admin', compact('q', 'dataProvider'));
    }

    /**
     * Creates a new word.
     */
    public function actionCreate()
    {
        $word = new Word();
        $this->save($word, '英単語の追加が完了いたしました。');

        $this->render('_form', compact('word'));
    }

    /**
     * Displays a particular word.
     */
    public function actionView()
    {
        $word = $this->loadModel();
        $this->render('view', compact('word'));
    }

    /**
     * Updates a particular word.
     */
    public function actionUpdate()
    {
        $word = $this->loadModel();
        $this->save($word, '英単語の更新が完了いたしました。');

        $this->render('_form', compact('word'));
    }

    /**
     * Deletes a particular word.
     */
    public function actionDelete()
    {
        $this->loadModel()->delete();

        user()->setFlash('success', '英単語の削除が完了いたしました。');
        $this->redirect(array('admin'));
    }
}

