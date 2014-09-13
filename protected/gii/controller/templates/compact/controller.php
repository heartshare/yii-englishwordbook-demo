<?php echo "<?php\n"; ?>

/**
 * <?php echo $this->controllerClass; ?> class file.
 */
class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseClass."\n"; ?>
{
    /**
     * @see CController::accessRules()
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'users' => array('*'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     *
     */
    public function actionIndex()
    {
        $this->render('index');
    }
}

