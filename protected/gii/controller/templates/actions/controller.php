<?php echo "<?php\n"; ?>

/**
 * <?php echo $this->controllerClass; ?> class file.
 */
class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseClass . "\n"; ?>
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
     * @see CController::actions()
     */
    public function actions()
    {
        return array(
            'index' => array(
                'class' => 'IndexAction',
            ),
            'admin' => array(
                'class' => 'AdminAction',
            ),
            'create' => array(
                'class' => 'CreateAction',
            ),
            'view' => array(
                'class' => 'ViewAction',
            ),
            'update' => array(
                'class' => 'UpdateAction',
            ),
            'delete' => array(
                'class' => 'DeleteAction',
            ),
        );
    }
}
