<?php echo "<?php\n"; ?>

/**
 * Frontend <?php echo $this->controllerClass; ?> class file.
 */
class <?php echo $this->controllerClass; ?> extends <?php echo $this->baseClass."\n"; ?>
{
<?php foreach($this->getActionIDs() as $action): ?>
    public function action<?php echo ucfirst($action); ?>()
    {
        $this->render('<?php echo $action; ?>');
    }
<?php endforeach; ?>
}
