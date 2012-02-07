<div class='actions'>
	<?php echo $this->Html->link("back", array('controller' => 'home', 'action' => 'index'), array('class' =>'btn_back'));?> 
</div>
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User');?>
	<fieldset>
	<legend><?php echo __('Please enter your username and password'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->end(__('Login'));
	?>
	</fieldset>
</div>
