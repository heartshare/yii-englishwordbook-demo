<?php echo "<?php\n"; ?>

/**
 * Backend <?php echo $this->controllerClass; ?> class file.
 */
class <?php echo $this->controllerClass; ?> extends AdminController<?php echo "\n"; ?>
{
	/**
	 * @see CController::actions
	 */
	public function actions()
	{
		return array(
			'index' => 'IndexAction',
			'admin' => 'AdminAction',
			'view' => 'ViewAction',
			'create' => 'CreateAction',
			'update' => 'UpdateAction',
			'delete' => 'DeleteAction',
		);
	}
}