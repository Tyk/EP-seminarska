<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php
			if ($user['role'] == "client") echo __('Edit client');
			if ($user['role'] == "admin") echo __('Edit admin');
			if ($user['role'] == "salesman") echo __('Edit salesman');
		?></legend>
		<?php
			echo $this->Form->input('first_name');
			echo $this->Form->input('last_name');
			echo $this->Form->input('username');
			echo $this->Form->input('password');
			echo $this->Form->input('password_confirm');
	
			if ($user['role'] == "client")
			{
				echo $this->Form->input('email');
				echo $this->Form->input('address');
				echo $this->Form->input('city');
				echo $this->Form->input('phone');
				echo $this->Form->input('post', array('options' => $posts));
			}

			if (($user['role'] == "admin") or ($user['role'] == "salesman"))
			{
				echo $this->Form->input('emso');
			}

			if (AuthComponent::user('role') == "admin") 
			{        
				echo $this->Form->input('active', array('options' => array(true => 'YES',false => 'NO')));
			}
		?>
	</fieldset>
	<div style="text-align:center">
		<?php echo $this->Form->end(__('Submit'));?>
	</div>		
</div>
