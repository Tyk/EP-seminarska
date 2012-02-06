<div class="items form">
	<?php echo $this->Form->create('Item');?>
	<fieldset>
		<legend><?php echo __('Add Item'); ?></legend>
		<?php
			echo $this->Form->input('name');
			echo $this->Form->input('description');
			echo $this->Form->input('price');
			echo $this->Form->input('quantity');
			echo $this->Form->input('published', array('options' => array(true => 'YES',false => 'NO')));
		?>
	</fieldset>
	<div style="text-align:center">
		<?php echo $this->Form->end(__('Add item')); ?>
	</div>
</div>
