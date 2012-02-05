<div class="users form">
<?php echo $this->Form->create('User',array('action' => 'add_client'));?>
    <fieldset>
        <legend><?php echo __('Add client'); ?></legend>
    <?php
		echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('username');
        echo $this->Form->input('password');
		echo $this->Form->input('password_confirm');
		echo $this->Form->input('email');
		echo $this->Form->input('address');
		echo $this->Form->input('city');
		echo $this->Form->input('post', array('options' => $posts));
		echo $this->Form->input('phone');
		echo $this->Form->input('active', array('options' => array(true => 'YES',false => 'NO')));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
