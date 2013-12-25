<span class="word"><?php echo h($data->en); ?></span>
<span class="word"><?php echo h($data->ja); ?></span>
<?php echo l('Update', array('update', 'id' => $data->id)); ?>
<?php echo l('Delete', '#', array('submit' => array('delete', 'id' => $data->id), 'confirm' => param('confirmDelete'), 'csrf' => true)); ?>
<br>
