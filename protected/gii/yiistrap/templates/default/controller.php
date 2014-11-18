<?php
/**
 * This is the template for generating a controller class file for CRUD feature.
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>

/**
 * <?php echo $this->controllerClass; ?> class file.
 */
class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseControllerClass . "\n"; ?>
{
    /**
     * @see CController::layout
     */
    public $layout = '//layouts/main';

    /**
     * @see CController::accessRules()
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('<?php echo $this->modelClass; ?>', array(
            'pagination' => array(
                'pageVar' => 'page',
            ),
            'sort' => array(
                'sortVar' => 'sort',
                'defaultOrder' => array(
                    'id' => CSort::SORT_DESC,
                ),
            ),
        ));

        $this->render('index', compact('dataProvider'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new <?php echo $this->modelClass; ?>('search');
        $model->unsetAttributes();

        if (isset($_GET['<?php echo $this->modelClass; ?>'])) {
            $model->attributes = $_GET['<?php echo $this->modelClass; ?>'];
        }

        $this->render('admin', compact('model'));
    }

    /**
     * Creates a new model.
     */
    public function actionCreate()
    {
        $model = new <?php echo $this->modelClass; ?>;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['<?php echo $this->modelClass; ?>'])) {
            $model->attributes = $_POST['<?php echo $this->modelClass; ?>'];

            if ($model->save()) {
                user()->setFlash('success', 'Added a data.');
                $this->redirect(array('view', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));
            }
        }
        $this->render('create', compact('model'));
    }

    /**
     * Displays a particular model.
     */
    public function actionView()
    {
        $model = $this->loadModel();
        $this->render('view', compact('model'));
    }

    /**
     * Updates a particular model.
     */
    public function actionUpdate()
    {
        $model = $this->loadModel();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['<?php echo $this->modelClass; ?>'])) {
            $model->attributes = $_POST['<?php echo $this->modelClass; ?>'];

            if ($model->save()) {
                user()->setFlash('success', 'Updated a data.');
                $this->redirect(array('view', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>));
            }
        }

        $this->render('update', compact('model'));
    }

    /**
     * Deletes a particular model.
     */
    public function actionDelete()
    {
        $this->loadModel()->delete();
        user()->setFlash('success', 'Deleted a data.');

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!req()->isAjaxRequest) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else {
            $this->widget('\TbAlert');
            app()->end();
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * @return <?php echo $this->modelClass; ?> the loaded model
     * @throws CHttpException
     */
    public function loadModel()
    {
        $model = <?php echo $this->modelClass; ?>::model()->findByPk(req()->getQuery('id'));

        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param <?php echo $this->modelClass; ?> $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === '<?php echo $this->class2id($this->modelClass); ?>-form') {
            echo CActiveForm::validate($model);
            app()->end();
        }
    }
}
