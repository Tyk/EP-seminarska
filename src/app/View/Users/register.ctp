<div class='actions'>
	<?php echo $this->Html->link("back", array('controller' => 'home', 'action' => 'index'), array('class' =>'btn_back'));?> 
</div>
<div class="users form">
	<?php echo $this->Form->create('User', array('action' => 'register'));?>
	<fieldset>
	<legend><?php echo __('Register user'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirm');
		echo $this->Form->input('email');
		echo $this->Form->input('address');
		echo $this->Form->input('city');
		echo $this->Form->input('phone');
		echo $this->Form->input('post', array('options' => $posts));
	?>
	</fieldset>
	<div style="text-align:center">
		<?php echo $this->Form->end(__('Register')); ?>
	</div>
</div>
