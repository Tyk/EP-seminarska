<div>
	<div>
		<?php echo $this->Form->create(null, array('url' => array('controller' => 'cart', 'action' => 'edit'))); 
		foreach ($items as $kitem): ?>		
		<div>			
			<?php	
				$item = $kitem['Item'];
				$item_id = $item['Item']['id'];
				$item_image_url = "/img/no-image.gif";
				if(isset($item['Image'][0]['image_url'])){
				$item_image_url = $item['Image'][0]['image_url'];
				}
			?>
			<img width="20px" height="20px" src="<?php echo $item_image_url; ?>"/>
            <?php
				echo $item['Item']['name']; 
				echo " | ";				
				echo $item['Item']['price'];
				echo " | ";				
				echo $this->Form->input('remove', array('type' => 'checkbox', 'id' => 'remove_items['.$item_id.']', 'name' => 'remove_items['.$item_id.']'));
				echo $this->Form->input('|', array('id' => 'edit_items['.$item_id.']', 'name' => 'edit_items['.$item_id.']', 'value' => $kitem['Count']));
			?>
		</div>			
		<?php endforeach; 
			echo $this->Form->end(__('Accept cart changes'));	
		?>		
	</div>
	<div>
		<?php 
			echo $this->Form->postLink("Checkout", array('controller' => 'cart', 'action' => 'checkout'),
			array(),"Are you sure you wish to checkout?");
		?>
	</div>
</div>


