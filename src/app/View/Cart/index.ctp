<?php echo $this->Html->script('sortable'); ?>
<?php echo $this->Html->css('sortable'); ?>
<?php echo $this->Html->css('cart'); ?>
<div>
	<div>
		<?php 
			echo $this->Form->postLink("Checkout", array('controller' => 'cart', 'action' => 'checkout'),
			array(),"Are you sure you wish to checkout your cart?");

			echo $this->Form->postLink("Clear", array('controller' => 'cart', 'action' => 'clear'),
			array(),"Are you sure you wish to clear your cart?");

		?>
	</div>
	<div>
		<?php echo $this->Form->create(null, array('url' => array('controller' => 'cart', 'action' => 'edit'))); ?>
		<table class="sortable" id="cart_table" cellpadding="0" cellspacing="0">
		<tr>
			<th>Image</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Remove</th>
		</tr>
		<?php foreach ($items as $kitem): ?>		
		<tr>			
			<?php	
				$item = $kitem['Item'];
				$item_id = $item['Item']['id'];
				$item_image_url = "/img/no-image.gif";
				if(isset($item['Image'][0]['image_url'])) $item_image_url = $item['Image'][0]['image_url'];
			?>
			<td> <img class='cart_image' width="20px" height="20px" src="<?php echo $item_image_url; ?>"/></td>
            <td><?php echo $item['Item']['name']; ?></td>
			<td><?php echo $item['Item']['price'];?></td>
			<td><?php echo $this->Form->input(' ', array('id' => 'edit_items['.$item_id.']', 'name' => 'edit_items['.$item_id.']', 'value' => $kitem['Count']));?></td>
			<td><?php echo $this->Form->input(' ', array('type' => 'checkbox', 'id' => 'remove_items['.$item_id.']', 'name' => 'remove_items['.$item_id.']'));?></td>
		</tr>			
		<?php endforeach; ?>
		</table>
	</div>
	<div>
		<?php
			echo $this->Form->end(__('Accept cart changes'));	
		?>	
	</div>
</div>


