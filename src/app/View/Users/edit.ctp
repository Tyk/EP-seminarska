<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
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
			echo $this->Form->input('post', array('options' => $posts));
			echo $this->Form->input('phone');
		}

		if (($user['role'] == "admin") or ($user['role'] == "salesman"))
		{
        	echo $this->Form->input('emso');
		}
		if (AuthComponent::user('role') == "admin") 
		{        
			//echo $this->Form->input('role', array('options' => $roles));
			echo $this->Form->input('active', array('options' => array(true => 'YES',false => 'NO')));
		}
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
