<div class='actions'>
	<?php echo $this->Html->link("back", array('controller' => 'home', 'action' => 'index'), array('class' =>'btn_back'));?> 
</div>
<div class="users form">
	<?php echo $this->Form->create('User',array('action' => 'add_salesman'));?>
	<fieldset>
		<legend><?php echo __('Add salesman'); ?></legend>
		<?php
			echo $this->Form->input('first_name');
			echo $this->Form->input('last_name');
			echo $this->Form->input('username');
			echo $this->Form->input('password');
			echo $this->Form->input('password_confirm');
			echo $this->Form->input('emso');
			echo $this->Form->input('active', array('options' => array(true => 'YES',false => 'NO')));
		?>
	</fieldset>
	<div style="text-align:center">
		<?php echo $this->Form->end(__('Add client')); ?>
	</div>
</div>
