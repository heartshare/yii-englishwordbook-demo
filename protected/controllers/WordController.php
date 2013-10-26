<?php

/**
 * Frontend WordController class file.
 */
class WordController extends Controller
{
    /**
     * @see CController::filters()
     */
    public function filters()
    {
        return array_merge(parent::filters(), array(
            'postOnly + delete',
        ));
    }

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
     * @param mixed $sort null or sorting strings
     */
    public function actionIndex($sort = null)
    {
        $dataProvider = Word::model()->findAllBySort($sort);
        $this->render('index', compact('dataProvider'));
    }

    /**
     * Lists all words and creates a new word.
     * @param mixed $sort null or sorting strings
     */
    public function actionEdit($sort = null)
    {
        $word = new Word();
        $this->save($word, '英単語の追加が完了いたしました。');

        $q = mb_trim(req()->getParam('q'));
        $dataProvider = $q !== '' ? $word->search($q) : $word->findAllBySort($sort);

        $this->render('edit', compact('word', 'q', 'dataProvider'));
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
        $this->redirect(array('edit'));
    }
}

