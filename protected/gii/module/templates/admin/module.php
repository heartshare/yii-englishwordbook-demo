<?php echo "<?php\n"; ?>

/**
 * <?php echo $this->moduleClass; ?> class file.
 */
class <?php echo $this->moduleClass; ?> extends CWebModule
{
    /**
     * @see CWebModule::init()
     */
    public function init()
    {
        $this->setImport(array(
            '<?php echo $this->moduleID; ?>.models.*',
            '<?php echo $this->moduleID; ?>.components.*',
            '<?php echo $this->moduleID; ?>.components.actions.*',
        ));
    }

    /**
    * @see CWebModule::beforeControllerAction()
     */
    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        } else {
            return false;
        }
    }
}
