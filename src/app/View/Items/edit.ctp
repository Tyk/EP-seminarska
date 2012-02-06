<div class="items form">
	<?php echo $this->Form->create('Item');?>
	<fieldset>
		<legend><?php echo __('Edit Item'); ?></legend>
		<?php
			echo $this->Form->input('name');
			echo $this->Form->input('description');
			echo $this->Form->input('price');
			echo $this->Form->input('quantity');
			echo $this->Form->input('published', array('options' => array(true => 'YES',false => 'NO')));
		?>
	</fieldset>
	<div style="text-align:center">
		<?php echo $this->Form->end(__('Save item')); ?>
	</div>
	<fieldset>
		<legend><?php echo __('Images'); ?></legend>
		<?php
			echo $this->Form->create('Image', array('action' => 'add_to_item', 'type' => 'file')); 
			echo $this->Form->file('File/image');
			echo $this->Form->hidden('item_id', array('id' => 'item_id', 'name' => 'item_id', 'value' => $item['Item']['id']));
			echo $this->Form->end(__('Submit'));	
			foreach ($item['Image'] as $image):
		?>
		<div>
			<img width="50px" height="50px" src="<?php echo $image['image_url']?>"/>
			<?php
				echo $this->Form->postLink('delete', array('controller' => 'images', 'action' => 'delete_from_item', $image['id'],$item['Item']['id'])); 
			?>
		</div>			
		<?php 
			endforeach;
		?>
	</fieldset>
</div>
