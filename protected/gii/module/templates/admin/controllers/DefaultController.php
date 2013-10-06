<?php echo "<?php\n"; ?>

/**
 * DefaultController class file.
 */
class DefaultController extends AdminController
{
    public function actionIndex()
    {
        $this->render('index');
    }
}
