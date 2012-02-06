<div class="users form">
	<?php echo $this->Form->create('User', array('action' => 'register'));?>
	<fieldset>
	<legend><?php echo __('Register User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirm');
	?>
	</fieldset>
	<div style="text-align:center">
		<?php echo $this->Form->end(__('Register')); ?>
	</div>
</div>
