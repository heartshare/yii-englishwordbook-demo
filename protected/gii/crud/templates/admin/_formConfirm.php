<ul>
	<li><?php echo "<?php echo l('index', array('index')); ?>"; ?></li>
	<li><?php echo "<?php echo l('admin', array('admin')); ?>"; ?></li>
</ul>

<div class="form">
	<?php echo "<?php echo CHtml::statefulForm(); ?>\n"; ?>

		<div class="row buttons">
			<?php echo "<?php echo CHtml::submitButton('back', array('name' => 'back')); ?>\n"; ?>
			<?php echo "<?php echo CHtml::submitButton('finish', array('name' => 'finish')); ?>\n"; ?>
		</div>
	</form>
</div><!-- form -->